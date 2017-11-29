<?php
require_once './model/CategoriaDao.php';
/**
* 
*/
class CategoriaController
{
	private $dao;

	function __construct(){
		$this->dao = new CategoriaDao;
	}

	public function geraSelect($select = null){
		$categorias = $this->buscaCategorias();		

		$options = array();

		foreach ($categorias as $indice => $objeto) {
			if ($select !== null and $select == $objeto->getId()) {
				$options[] = "<option selected='' value='".$objeto->getId()."'>".$objeto->getNome()."</option>";;
			} else {
				$options[] = "<option value='".$objeto->getId()."'>".$objeto->getNome()."</option>";;
			}
		}

		return $options;
	}

	public function buscaCategorias(){
		return $this->dao->read('Categoria', null, null);
	}
}

?>