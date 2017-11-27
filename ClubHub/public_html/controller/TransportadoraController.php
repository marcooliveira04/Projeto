<?php
require_once './model/TransportadoraDao.php';
/**
* 
*/
class TransportadoraController
{
	
	private $dao;

	function __construct(){
		$this->dao = new TransportadoraDao;
	}

	public function buscaTransportadoraId($idTransportadora){
		$where = [
			[
				'coluna'	=>	'id',
				'valor'		=>	$idTransportadora,
				'operador'	=>	''
			]
		];

		return $this->dao->read('Transportadora', $where, null)[0];
	}
}

?>