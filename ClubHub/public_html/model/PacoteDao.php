<?php

require_once 'Dao.php';
require_once 'Pacote.php';
/**
* 
*/
class PacoteDao extends Dao
{
	function __construct() {
		$this->setTabela('Pacotes');
		// Id deve ficar por último para poder ser utilizado e _popped_ em funções como update e delete.
		$this->setColunas(['idClube', 'nome', 'categoria', 'valor', 'descricao', 'id']);
		parent::__construct();
	}
}

?>