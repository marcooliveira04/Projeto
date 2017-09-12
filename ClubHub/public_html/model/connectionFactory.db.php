<?php
/**
 * The test file is in Core folder
 * Place the class on Core/lib/db
 * directory to use autoloading
 */
class criaConn{

	public function getConn(){
		require_once 'database/ConnectionFactory.class.php';

		$arguments = array(
		    'driver'   => 'mysql',
		    // 'host'     => '187.45.250.72',
		    'host'	   => '127.0.0.1',
		    'user'     => 'root',
		    'password' => '',
		    'database' => 'clubhub'
		);

		/*PHP 5.3- style - just connect*/
		$connectionFactory = new ConnectionFactory($arguments);

		$pdo = $connectionFactory->getLink();

		return $pdo;
	}

}


?>