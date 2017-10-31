<?php
require_once 'connectionFactory.db.php';
require_once 'Clube.php';
/**
* 
*/
class ClubeDao
{
	private $conn;
	private $pdo;
	private $campos;
	private $stmt;
	
	function __construct() {
		$this->conn = new criaConn;
		$this->pdo = $this->conn->getConn();
		$this->campos = ['nome', 'cep', 'rua', 'numero', 'complemento', 'cidade', 'uf', 'razaoSocial', 'cnpj', 'telefone', 'celular', 'email', 'senha', 'categoria'];
	}

	public function getImplodedFieldsAssociative(Clube $clube){

	}

	public function create(Clube $clube){
		try {
			(string) $campos = implode($this->campos, ', ');
			$query = "INSERT INTO clubes ({$campos}) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

			$this->stmt = $this->pdo->prepare($query);

			foreach ($this->campos as $index => $campo) {
				$getter = 'get'.ucfirst($campo);
				$token = $index + 1;
				$this->stmt->bindValue($token, $clube->$getter());
			}

			// $stmt->bindValue(':nome', $clube->getNome());
			// $stmt->bindValue(':cep', $clube->getCep());
			// $stmt->bindValue(':rua', $clube->getRua());
			// $stmt->bindValue(':numero', $clube->getNumero());
			// $stmt->bindValue(':complemento', $clube->getComplemento());
			// $stmt->bindValue(':cidade', $clube->getCidade());
			// $stmt->bindValue(':uf', $clube->getUf());
			// $stmt->bindValue(':razaoSocial', $clube->getRazaoSocial());
			// $stmt->bindValue(':cnpj', $clube->getCnpj());
			// $stmt->bindValue(':telefone', $clube->getTelefone());
			// $stmt->bindValue(':celular', $clube->getCelular());
			// $stmt->bindValue(':email', $clube->getEmail());
			// $stmt->bindValue(':senha', $clube->getSenha());
			// $stmt->bindValue(':categoria', $clube->getCategoria());

			$this->stmt->execute();
			$this->stmt->closeCursor();
			unset($this->stmt);
			return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
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
				foreach ($resultSet as $row => $col) {
					$clube = new Clube;
					foreach ($col as $coluna => $valor) {
						$setter = 'set'.ucfirst($coluna);

						$clube->$setter($valor);
					}
					$resultado[] = $clube;
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