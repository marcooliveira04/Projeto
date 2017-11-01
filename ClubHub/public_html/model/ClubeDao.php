<?php

require_once 'Dao.php';
require_once 'Clube.php';
/**
* 
*/
class ClubeDao extends Dao
{
    private $conn;
    private $pdo;
	private $tabela;
	private $colunas;
	
	function __construct() {
        $this->conn = new Conn;
        $this->pdo = $this->conn->getPDO();
		$this->tabela = 'clubes';
		$this->colunas = ['nome', 'cep', 'rua', 'numero', 'complemento', 'cidade', 'uf', 'razaoSocial', 'cnpj', 'telefone', 'celular', 'email', 'senha', 'categoria'];
	}

	public function insere(Clube $clube){
		return $this->create($this->tabela, $this->colunas, $clube);
	}

	public function busca(){
		return $this->read($this->tabela, 'Clube');
	}

	public function atualizar(){
            print_r($this->stringfyForUpdate($this->colunas));
            exit();
		return;
	}
}

?>