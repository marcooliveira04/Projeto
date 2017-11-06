<?php
require_once 'Dao.php';
require_once 'Categoria.php';
/**
* 
*/
class CategoriaDao extends Dao
{
	function __construct() {
		$this->setTabela('categorias');
		// Id deve ficar por último para poder ser utilizado e _popped_ em funções como update e delete.
		$this->setColunas(['nome', 'id']);
		parent::__construct();
	}
}

?>