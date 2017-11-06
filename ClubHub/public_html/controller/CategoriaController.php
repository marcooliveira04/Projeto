<?php
require_once './model/CategoriaDao.php';
/**
* 
*/
class CategoriaController
{
	private $categorias;
	private $dao;

	function __construct(){
		$this->categorias = new Categoria;
		$this->dao = new CategoriaDao;
	}

	public function geraSelect(){
		$this->categorias = $this->dao->read(get_class($this->categorias), null, null);

		$options = array();

		foreach ($this->categorias as $indice => $objeto) {
			$options[] = "<option value='".$objeto->getId()."'>".$objeto->getNome()."</option>";
		}

		return $options;
	}
}

?>