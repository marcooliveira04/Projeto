<?php

require_once 'Dao.php';
require_once 'Clube.php';
/**
* 
*/
class ClubeDao extends Dao
{
	function __construct() {
		$this->setTabela('clubes');
		// Id deve ficar por último para poder ser utilizado e _popped_ em funções como update e delete.
		$this->setColunas(['nome', 'cep', 'rua', 'numero', 'bairro', 'complemento', 'cidade', 'uf', 'razaoSocial', 'cnpj', 'telefone', 'celular', 'email', 'senha', 'categoria', 'banco', 'agencia', 'conta', 'id']);
		parent::__construct();
	}
}

?>