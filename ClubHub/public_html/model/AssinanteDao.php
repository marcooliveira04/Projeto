<?php

require_once 'Dao.php';

/**
* 
*/
class AssinanteDao extends Dao
{
	function __construct() {
		$this->setTabela('assinantes');
		// Id deve ficar por último para poder ser utilizado e _popped_ em funções como update e delete.
		$this->setColunas(['nome', 'cpf', 'rg', 'nascimento', 'sexo', 'cep', 'rua', 'numero', 'complemento', 'bairro', 'cidade', 'uf', 'cepEntrega', 'ruaEntrega', 'numeroEntrega', 'complementoEntrega', 'bairroEntrega', 'cidadeEntrega', 'ufEntrega', 'telefone', 'celular', 'email', 'senha', 'id']);
		parent::__construct();
	}
}

?>