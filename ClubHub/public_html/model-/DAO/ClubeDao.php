<?php
require_once 'Dao.php';
/**
* 
*/
class ClubeDao
{
    private $conn;
    private $pdo;
	
	function __construct() {
        $this->conn = new Conn;
        $this->pdo = $this->conn->getPDO();
		$this->setTabela('clubes');
		// Id deve ficar por último para poder ser utilizado e _popped_ em funções como update e delete.
		$this->setColunas(['nome', 'cep', 'rua', 'numero', 'bairro', 'complemento', 'cidade', 'uf', 'razaoSocial', 'cnpj', 'telefone', 'celular', 'email', 'senha', 'categoria', 'id']);
	}

	public function create(Clube $clube){
		try {
			$sql = "INSERT INTO clube (nome, cep, rua, numero, bairro, complemento, cidade, uf, razaoSocial, cnpj, telefone, celular, email, senha, categoria) values (:nomeFantasia, :cnpj, :razaoSocial, :categoria);";

			$stmt = $this->dao->getPdo()->prepare($sql);

			$stmt->bindValue(':cnpj', $clube->getCnpj());
			$stmt->bindValue(':razaoSocial', $clube->getRazaoSocial());
			$stmt->bindValue(':categoria', $clube->getCategoria());

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
			$sql = "SELECT * FROM clube";

			$stmt = $this->dao->getPdo()->prepare($sql);
			$stmt->execute();
			$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if ($stmt->rowCount() <= 0) {
				return false;
			} else {
				$resultado = array();
				foreach ($resultSet as $row => $col) {
					$clube = new Clube;
					$clube->setId($col['id']);
					$clube->setNomeFantasia($col['nomeFantasia']);
					$clube->setCnpj($col['cnpj']);
					$clube->setRazaoSocial($col['razaoSocial']);
					$clube->setCategoria($col['categoria']);
					array_push($resultado, $clube);
				}
			}
		} catch(PDOException $e){
			$e->getMessage();
		}
	    return $resultado;
	}
}

?>