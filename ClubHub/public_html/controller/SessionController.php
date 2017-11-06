<?php
/**
* 
*/
class SessionController
{
	private $dao;
	private $pessoa;

	function __construct($tipo)
	{
		$this->setObjects($tipo);
	}

	public function setObjects($tipo){
		$class = $tipo;
		$dao = $tipo."Dao";
		require_once "../model/".$class.".php";
		require_once "../model/".$dao.".php";
		$this->pessoa = new $tipo;
		$this->dao = new $dao;

		return;
	}

	public function login($email, $senha){
		if (isset($email)) {
			$this->pessoa->setEmail($email);
		}

		if (isset($senha)) {
			$this->pessoa->setSenha(md5($senha));
		}

		$where = [
			[
				'coluna' => 'email',
				'valor' => "'".$this->pessoa->getEmail()."'",
				'operador' => 'AND'
			],
			[
				'coluna' => 'senha',
				'valor' => "'".$this->pessoa->getSenha()."'",
				'operador' => ''
			]
		];

		return $this->dao->read(get_class($this->pessoa), $where, null);
	}

	public function logout(){
		session_destroy();
	}
}

?>