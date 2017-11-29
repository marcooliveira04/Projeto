<?php
/**
 * Class ConnectionFactory
 * Use this to make a connection
 *
 * @package Core
 * @subpackage Core\lib\db
 * @author raul dot 3k at gmail dot com
 */
class ConnectionFactory
{
    /**
     * Target server
     * @var String
     */

    private $host;
    /**
     * Driver to connect (see php manual for available drivers)
     * @var String
     */
    private $driver;

    /**
     * Server's username
     * @var String
     */
    private $user;
    /**
     * Server's password
     * @var String
     */
    private $password;
    /**
     * Database
     * @var String
     */
    private $dbName;
    /**
     * Connection DSN
     * @var String
     */
    private $dsn;

    /**
     * Drivers options
     * @var Array
     */
    private $driversOptions = array();

    /**
     * Attributes to the PDO (like result, column cases, etc.)
     * @var Array
     */
    private $attributes = array();

    /**
     * Errors occurred
     * @var Array
     */
    private $error = array();
    /**
     * Connection handler
     * @var Object Connection
     */
    private $handler;

    /**
     * Connection parameters: host, driver, user, password, database, dns
     * Paramters driver, host and database are optional if the parameter
     * dns is informed.
     * @param mixed $parameters
     * @throws \InvalidArgumentException
     */
    public function __construct($parameters)
    {
        // If dsn has been informed
        if (!array_key_exists('dsn', $parameters)) {
            if (!array_key_exists('driver', $parameters)) {
                $this->error[] = 'Parameter driver missing';
            }
            if (!array_key_exists('host', $parameters)) {
                $this->error[] = 'Parameter host missing';
            }
            if (!array_key_exists('database', $parameters)) {
                $this->error[] = 'Parameter database missing';
            }
        } else {
            $this->dsn = $parameters['dsn'];
        }

        if (!array_key_exists('user', $parameters)) {
            $this->error[] = 'Parameter user missing';
        }
        if (!array_key_exists('password', $parameters)) {
            $this->error[] = 'Parameter password missing';
        }

        if (count($this->error)>0) {
            $msgError = "Check if the arguments informed are correct."
                . "\nAdditionally some errors messages can be seen:\n"
                . implode("\n", $this->error);
            throw new \InvalidArgumentException($msgError);
        }

        $this->user     = $parameters['user'];
        $this->password = $parameters['password'];

        if (empty($this->dsn)) {
            $this->host     = $parameters['host'];
            $this->driver   = $parameters['driver'];
            $this->dbName   = $parameters['database'];

            if ($this->host=='localhost') {
                // We have a little issue in unix systems when you set the host as localhost
                $this->host = '127.0.0.1';
            }
            $this->dsn = $this->driver.':host='.$this->host.';dbname='.$this->dbName;

            // Drivers options
            $this->addDriverOption(PDO::MYSQL_ATTR_INIT_COMMAND,"SET NAMES UTF8");
            if (array_key_exists('drivers_option', $parameters)) {
                $this->driversOptions = array_merge($this->driversOptions, $parameters['drivers_option']);
            }
        }
    }

    /**
     * Add a driver option to the pdo connection
     * @param $option String|Integer
     * @param $value String|Integer
     */
    public function addDriverOption($option, $value)
    {
        $this->driversOptions[$option] = $value;
    }

    /**
     * Add a attribute to the connection
     * Ex: setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     * The only default attribute is ERROR MODE that
     * is set to ERRMODE_EXCEOPTION
     * @param $name String|Integer
     * @param $value String|Integer
     */
    public function addAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /**
     * Connect to the server
     * @return void
     */
    public function connect()
    {
        try {
            $this->handler = new \PDO($this->dsn, $this->user, $this->password, $this->driversOptions);
            if (count($this->attributes) > 0) {
                foreach ($this->attributes as $name => $value) {
                    if ($name != \PDO::ATTR_ERRMODE) {
                        $this->handler->setAttribute($name, $value);
                    }
                }
            }
            $this->handler->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            $this->handler = null;
            $this->error[] = $e->getMessage();
        } catch (\Exception $e) {
            $this->handler = null;
            $this->error[] = $e->getMessage();
        }
    }

    /**
     * Returns connection object
     * Can be called in PHP 5.4+ (new ConnectionFactory($args))->getLink();
     * @return Object PDO
     */
    public function getLink()
    {
        if (is_null($this->handler)) {
            $this->connect();
        }
        return $this->handler;
    }

    /**
     * Alias to @getLink()
     * @return Object PDO
     */
    public function getConnection()
    {
        return $this->getLink();
    }
}
