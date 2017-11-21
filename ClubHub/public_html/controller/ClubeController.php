<?php
require_once './model/ClubeDao.php';
/**
* 
*/
class ClubeController
{
	private $clube;
	private $daoClube;

	function __construct(){
		$this->daoClube = new ClubeDao;
	}

	public function buscaClube($idClube){
		$where = [
			[
				'coluna'	=> 'id',
				'valor'		=> $idClube,
				'operador'	=> ''
			]
		];
		return $this->clube = $this->daoClube->read('Clube', $where, null)[0];
	}

	public function getClube(){
		return $this->clube;
	}
}

?>