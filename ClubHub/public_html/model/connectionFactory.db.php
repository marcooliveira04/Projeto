<?php
require_once 'database/ConnectionFactory.class.php';

/**
 * The test file is in Core folder
 * Place the class on Core/lib/db
 * directory to use autoloading
 */

class Conn{

	private $pdo;
	private $arguments;
	private $connectionFactory;

	function __construct(){
		$this->arguments = [
			'driver'   => 'mysql',
		    'host'	   => '127.0.0.1',
		    'user'     => 'root',
		    'password' => '',
		    'database' => 'clubhub'
		];
		$this->connectionFactory = new ConnectionFactory($this->arguments);
		$this->pdo = $this->connectionFactory->getLink();
	}

	public function getPDO(){
		return $this->pdo;
	}

}

?>