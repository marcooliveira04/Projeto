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

	function __construct()
	{
		$this->dao = new AssinanteDao;
		$this->assinante = new Assinante;
	}

	public function getAction(){
		if (isset($_POST['action'])) {
			return $_POST['action'];
		}
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

	public function cadastro($post){
		$this->assinante->setNome($post['nome']);
		$this->assinante->setCpf($post['cpf']);
		$this->assinante->setRg($post['rg']);
		$this->assinante->setNascimento($post['nascimento']);
		$this->assinante->setSexo($post['sexo']);
		$this->assinante->setCepResidencial($post['cepResidencial']);
		$this->assinante->setRuaResidencial($post['logradouroResidencial']);
		$this->assinante->setNumeroResidencial($post['numeroResidencial']);
		$this->assinante->setComplementoResidencial($post['complementoResidencial']);
		$this->assinante->setBairroResidencial($post['bairroResidencial']);
		$this->assinante->setCidadeResidencial($post['cidadeResidencial']);
		$this->assinante->setUfResidencial($post['ufResidencial']);
		$this->assinante->setCepEntrega($post['cepEntrega']);
		$this->assinante->setRuaEntrega($post['logradouroEntrega']);
		$this->assinante->setNumeroEntrega($post['numeroEntrega']);
		$this->assinante->setComplementoEntrega($post['complementoEntrega']);
		$this->assinante->setBairroEntrega($post['bairroEntrega']);
		$this->assinante->setCidadeEntrega($post['cidadeEntrega']);
		$this->assinante->setUfEntrega($post['ufEntrega']);
		$this->assinante->setTelefone($post['telefone']);
		$this->assinante->setCelular($post['celular']);
		$this->assinante->setEmail($post['email']);

		return $this->assinante;

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