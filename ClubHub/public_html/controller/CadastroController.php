<?php

/**
* 
*/
class CadastroController
{
	private $dao;
	private $pessoa;

	function __construct(string $tipo)
	{
		require_once "../model/".$tipo.".php";
		require_once "../model/".$tipo."Dao.php";
		$objDao = $tipo."Dao";
		$this->pessoa = new $tipo;
		$this->dao = new $objDao;
	}

	public function getAssinante(){
		return $this->assinante;
	}

	public function cadastro($post){
		$this->pessoa = $this->dao->setter($post, $this->pessoa);
	
		return $this->dao->create($this->pessoa);

	}
}

?>