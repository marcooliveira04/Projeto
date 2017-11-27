<?php
require_once 'Dao.php';
require_once 'Assinatura.php';
/**
* 
*/
class AssinaturaDao extends Dao
{
	function __construct() {
		$this->setTabela('assinatura');
		// Id deve ficar por último para poder ser utilizado e _popped_ em funções como update e delete.
		$this->setColunas(['idAssinante', 'idPacote', 'data', 'codRastreio', 'transportadora', 'id']);
		parent::__construct();
	}
}

?>