<?php
require_once './model/AssinaturaDao.php';
/**
* 
*/
class AssinaturaController
{
	private $dao;

	function __construct(){
		$this->dao = new AssinaturaDao;
	}

	public function buscaAssinaturaAssinante($idAssinante){
		$where = [
			[
				'coluna'	=>	'idAssinante',
				'valor'		=>	$idAssinante,
				'operador'	=>	''
			]
		];

		$order = [
			[
				'colunas'	=> [
					'data'
				],

				'ordem'		=> 'DESC'
			]
		];

		return $this->dao->read('Assinatura', $where, $order);
	}
}

?>