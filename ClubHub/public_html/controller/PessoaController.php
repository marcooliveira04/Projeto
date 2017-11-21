<?php

/**
* 
*/
class PessoaController
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
		require_once "./model/".$class.".php";
		require_once "./model/".$dao.".php";
		$this->pessoa = new $tipo;
		$this->dao = new $dao;

		return;
	}

	public function buscaPessoaPorId($id){
		if (!isset($id)) {
			return false;
		} else {
			$where = [
				[
					'coluna' => 'id',
					'valor' => $id,
					'operador' => ''
				]
			];

			$this->pessoa = $this->dao->read(get_class($this->pessoa), $where, null)[0];
			if (!$this->pessoa or count($this->pessoa) > 1) {
				return false;
			} else {
				return $this->pessoa;
			}
		}
	}
}

?>