<?php
require_once 'Dao.php';
require_once 'Transportadora.php';
/**
* 
*/
class TransportadoraDao extends Dao
{
	function __construct() {
		$this->setTabela('transportadoras');
		// Id deve ficar por último para poder ser utilizado e _popped_ em funções como update e delete.
		$this->setColunas(['nome', 'link', 'id']);
		parent::__construct();
	}
}

?>