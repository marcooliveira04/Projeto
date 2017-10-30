<?php
require_once 'Dao.php';
/**
* 
*/
class ClienteDao
{
	private $dao;

	function __construct(){
		$this->dao = new Dao;
	}

	public function create(Cliente $cliente){
		try {
			$sql = "INSERT INTO cliente (nomeFantasia, cnpj, razaoSocial, categoria) values (:nomeFantasia, :cnpj, :razaoSocial, :categoria);";

			$stmt = $this->dao->getPdo()->prepare($sql);

			$stmt->bindValue(':nomeFantasia', $cliente->getNomeFantasia());
			$stmt->bindValue(':cnpj', $cliente->getCnpj());
			$stmt->bindValue(':razaoSocial', $cliente->getRazaoSocial());
			$stmt->bindValue(':categoria', $cliente->getCategoria());

			$stmt->execute();
			$stmt->closeCursor();

			return true;
		} catch (PDOException $e) {
            print "Ocorreu um erro ao tentar executar esta ação.";
            if ((int)$e->getCode()) {
            	print "Entre em contato conosco e informe o código de erro: $e->getCode()";
            }
			echo $e->getMessage();
			return false;
		}
	}

	public function read(){
		try{
			$sql = "SELECT * FROM cliente";

			$stmt = $this->dao->getPdo()->prepare($sql);
			$stmt->execute();
			$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if ($stmt->rowCount() <= 0) {
				return false;
			} else {
				$resultado = array();
				foreach ($resultSet as $row => $col) {
					$cliente = new Cliente;
					$cliente->setId($col['id']);
					$cliente->setNomeFantasia($col['nomeFantasia']);
					$cliente->setCnpj($col['cnpj']);
					$cliente->setRazaoSocial($col['razaoSocial']);
					$cliente->setCategoria($col['categoria']);
					array_push($resultado, $cliente);
				}
			}
		} catch(PDOException $e){
			$e->getMessage();
		}
	    return $resultado;
	}
}

?>