<?php
require_once 'connectionFactory.db.php';
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
        $this->conn = new criaConn;

        $this->pdo = $this->conn->getConn();

		$this->tabela = 'clubes';
		$this->colunas = ['nome', 'cep', 'rua', 'numero', 'complemento', 'cidade', 'uf', 'razaoSocial', 'cnpj', 'telefone', 'celular', 'email', 'senha', 'categoria'];
	}

	public function getImplodedFieldsAssociative(Clube $clube){

	}

	public function insere(Clube $clube){
		return $this->create($this->pdo, $this->tabela, $this->colunas, $clube);
	}

	public function read(){
		try {
			$query = "SELECT * FROM clubes";

			$stmt = $this->pdo->prepare($query);

			$stmt->execute();
			if ($stmt->rowCount() == 0) {
				return false;
			} else {
				$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$resultado = array();
				foreach ($resultSet as $indice => $row) {
					$clube = new Clube;

					$resultado[] = $this->setter($row, $clube);
				}
				return print_r($resultado);
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;			
		}
	}

	public function update(Clube $clube){
		try {
			$query = "UPDATE clubes SET cep = :cep, rua = :rua, numero = :numero, complemento = :complemento, cidade = :cidade, uf = :uf, nomeFantasia = :nomeFantasia, razaoSocial = :razaoSocial, cnpj = :cnpj, telefone = :telefone, celular = :celular, email = :email, senha = :senha, categoria = :categoria WHERE id = :id";
		} catch (PDOException $e) {
			
		}
	}
}

?>