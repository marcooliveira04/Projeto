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

		$pessoa = $this->dao->read(get_class($this->pessoa), $where, null)[0];

		if (!$pessoa or count($pessoa) > 1) {
			return 0;
		} else {
			return $this->createSession($pessoa);
		}
	}

	static function logout(){
		session_destroy();

		return;
	}

	public function createSession($pessoa){
		if (!isset($_SESSION)) {
			session_start();
		} else {
			$_SESSION['logado'] = 'S';
			$_SESSION['id'] = $pessoa->getId();
			$_SESSION['nome'] = $pessoa->getNome();
			$_SESSION['tipo'] = get_class($this->pessoa);
		}

		return 1;
	}
}

?>