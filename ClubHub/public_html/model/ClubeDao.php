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
	private $gf;
	
	function __construct() {
		$this->conn = new criaConn;
		$this->pdo = $this->conn->getConn();
	}

	public function create(Clube $clube){
		try {
			$query = "INSERT INTO clubes (cep, rua, numero, complemento, cidade, uf, nomeFantasia, razaoSocial, cnpj, telefone, celular, email, senha, categoria) VALUES (:cep, :rua, :numero, :complemento, :cidade, :uf, :nomeFantasia, :razaoSocial, :cnpj, :telefone, :celular, :email, :senha, :categoria);";

			$stmt = $this->pdo->prepare($query);

			$stmt->bindValue(':nome', $clube->getNome());
			$stmt->bindValue(':cep', $clube->getCep());
			$stmt->bindValue(':rua', $clube->getRua());
			$stmt->bindValue(':numero', $clube->getNumero());
			$stmt->bindValue(':complemento', $clube->getComplemento());
			$stmt->bindValue(':cidade', $clube->getCidade());
			$stmt->bindValue(':uf', $clube->getUf());
			$stmt->bindValue(':razaoSocial', $clube->getRazaoSocial());
			$stmt->bindValue(':cnpj', $clube->getCnpj());
			$stmt->bindValue(':telefone', $clube->getTelefone());
			$stmt->bindValue(':celular', $clube->getCelular());
			$stmt->bindValue(':email', $clube->getEmail());
			$stmt->bindValue(':categoria', $clube->getCategoria());

			$stmt->execute();
			$stmt->closeCursor();
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

			$stmt->excute();
			if ($stmt->rowCount() == 0) {
				return false;
			} else {
				$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$resultado = array();
				foreach ($resultSet as $row => $col) {
					$clube = new Clube;
					$clube->setId($col['id']);
					$clube->setNome($col['nome']);
					$clube->setCep($col['cep']);
					$clube->setRua($col['rua']);
					$clube->setNumero($col['numero']);
					$clube->setComplemento($col['complemento']);
					$clube->setBairro($col['bairro']);
					$clube->setCidade($col['cidade']);
					$clube->setUf($col['uf']);
					$clube->setTelefone($col['telefone']);
					$clube->setCelular($col['celular']);
					$clube->setEmail($col['email']);
					$clube->setSenha($col['senha']);
					$clube->setCnpj($col['cnpj']);
					$clube->setRazaoSocial($col['razaoSocial']);
					$clube->setCategoria($col['categoria']);
					$resultado[] = $clube;
				}
				return $resultado;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;			
		}
	}
}

?>