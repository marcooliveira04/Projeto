<?php
require_once './model/ClubeDao.php';
require_once './model/PacoteDao.php';
/**
* 
*/
class ClubeVenda
{
	private $clube;
	private $daoClube;
	private $daoPacote;

	function __construct($idClube)
	{
		$this->daoClube = new ClubeDao;
		$this->daoPacote = new PacoteDao;
		$this->buscaClube($idClube);
	}

	public function buscaClube($idClube){
		$where = [
			[
				'coluna'	=> 'id',
				'valor'		=> $idClube,
				'operador'	=> ''
			]
		];
		$this->clube = $this->daoClube->read('Clube', $where, null)[0];
		$this->clube->setPacotes($this->buscaPacotes($idClube));
	}

	public function buscaPacotes($idClube){
		$where = [
			[
				'coluna'	=> 'idClube',
				'valor'		=> $idClube,
				'operador'	=> ''
			]
		];

		$pacote = $this->daoPacote->read('Pacote', $where, null);

		return $pacote;
	}

	public function getClube(){
		return $this->clube;
	}
}

?>