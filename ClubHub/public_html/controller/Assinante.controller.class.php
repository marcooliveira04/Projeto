<?php

require_once '../model/Assinante.class.php';
require_once '../model/Assinante.dao.php';

/**
* 
*/
class AssinanteController
{
	private $dao;
	private $assinante;
	private $action;

	function __construct()
	{
		$this->action = $this->getAction();
		$this->dao = new AssinanteDao;
		$this->assinante = new Assinante;
	}

	public function getAction(){
		if (isset($_POST['action'])) {
			return $_POST['action'];
		}
	}

	public function executaMetodo(){
		
	}

	public function login($email, $senha){
		if (isset($email)) {
			$this->assinante->setEmail($email);
		}

		if (isset($senha)) {
			$this->assinante->setSenha($senha);
		}

		return $this->dao->readLogin($this->assinante);
	}

	public function busca(){
		return $this->dao->read(null, null);
	}

	public function insere(){
		return $this->dao->create($this->assinante);
	}

	public function update(){
		return $this->dao->update(self);
	}

	public function delete(){
		return $this->dao->delete(self);
	}
}

?>