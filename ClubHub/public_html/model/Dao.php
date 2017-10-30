<?php
require_once 'connectionFactory.db.php';
/**
* 
*/
class Dao
{
	private $conn;
	private $pdo;
	
	function __construct()
	{
		$this->conn = new criaConn();
		$this->pdo = $this->conn->getConn();
	}

    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @return mixed
     */
    public function getPdo()
    {
        return $this->pdo;
    }
}

?>