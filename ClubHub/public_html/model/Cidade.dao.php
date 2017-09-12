<?php

	/**
	* 
	*/
	class CidadeDao
	{
		
		private $conn;
		private $pdo;
		private $gf;

		function __construct(){
			require_once 'connectionFactory.db.php';
			// require_once 'GeneralFunctions.class.php';
			// $this->gf = new GeneralFunctions;
			$this->conn = new criaConn;
			$this->pdo = $this->conn->getConn();
		}

		/**
		* Método para adicionar dados ao banco de dados.
		*
		* @param object $cidade - O objeto da classe Cidade deve conter o nome do Cidade a ser incluso
		*
		* @return array bool - Retorna verdadeiro se a execução não foi interrompida por erros, senão, retorna falso.
		*/

		public function create($cidade){
			try {
				$stmt = $this->pdo->prepare("INSERT INTO cidades(nome, estado) VALUES(:nome, :idEstado)");
				$nome = $cidade->getNome();
				$idEstado = $cidade->getEstado();
				$stmt->bindParam(':nome', $nome);
				$stmt->bindParam(':idEstado', $idEstado);
				$stmt->execute();
				$stmt->closeCursor();
				return true;
			} catch (PDOException $e) {
				echo $e->getMessage();
				return false;
			}
		}

		/**
		* Método para retornar dados do banco de dados.
		*
		* @param array $where - Deve conter condições para adicionar-se à query SELECT
		* @param array $orderby - Deve conter parâmetros para ordenar dados retornados do banco de dados
		*
		* @return array $resultado - array de objetos do tipo Curso
		*/
		public function read($cidade = null){
			try{
				require_once 'Cidade.class.php';
				$sql = "SELECT * FROM cidades";
				// $sql .= $this->gf->buildQuery($where, $orderby); //Faltando o arquivo - Pegar no trabalho
				$stmt = $this->pdo->prepare($sql);
				$stmt->execute();
				$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
				if ($stmt->rowCount() <= 0) {
					return false;
				} else {
					$resultado = array();
					foreach ($resultSet as $row => $col) {
						$cidade = new Cidade;
						$cidade->setId($col['id']);
						$cidade->setNome($col['nome']);
						$cidade->setEstado($col['estado']);
						array_push($resultado, $cidade);
					}
				}
			} catch(PDOException $e){
				$e->getMessage();
			}
		    return $resultado;
		}

		public function update($cidade){
			try {
				$sql = "UPDATE cidades SET nome = :nome, estado = :idEstado WHERE id = :id";
				$nome = $cidade->getNome();
				$id = $cidade->getId();
				$idEstado = $cidade->getEstado();
				$stmt = $this->pdo->prepare($sql);
				$stmt->bindParam(':nome', $nome);
				$stmt->bindParam(':idEstado', $idEstado);
				$stmt->bindParam(':id', $id);
				$stmt->execute();
				$stmt->closeCursor();
				return true;
			} catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function delete($cidade){
			try {
				$sql = "DELETE FROM cidades WHERE id = :id";
				$id = $cidade->getId();
				$stmt = $this->pdo->prepare($sql);
				$stmt->bindParam(':id', $id);
				$stmt->execute();
				$stmt->closeCursor();
				return true;
			} catch (PDOException $e) {
				echo $e->getMessage();
				return false;
			}
		}
	}

?>