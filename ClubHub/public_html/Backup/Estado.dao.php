<?php

	/**
	* 
	*/
	class EstadoDao
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
		* @param object $estado - O objeto da classe Estado deve conter o nome do Estado a ser incluso
		*
		* @return array bool - Retorna verdadeiro se a execução não foi interrompida por erros, senão, retorna falso.
		*/

		public function create($estado){
			try {
				$stmt = $this->pdo->prepare("INSERT INTO estados(nome) VALUES(:nome)");
				$nome = $estado->getNome();
				$stmt->bindParam(':nome', $nome);
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
		public function read($estado = null){
			try{
				require_once 'Estado.class.php';
				$sql = "SELECT * FROM estados";
				// $sql .= $this->gf->buildQuery($where, $orderby); //Faltando o arquivo - Pegar no trabalho
				$stmt = $this->pdo->prepare($sql);
				$stmt->execute();
				$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
				if ($stmt->rowCount() <= 0) {
					return false;
				} else {
					$resultado = array();
					foreach ($resultSet as $row => $col) {
						$estado = new Estado;
						$estado->setId($col['id']);
						$estado->setNome($col['nome']);
						array_push($resultado, $estado);
					}
				}
			} catch(PDOException $e){
				$e->getMessage();
			}
		    return $resultado;
		}

		public function update($estado){
			try {
				$sql = "UPDATE estados SET nome = :nome WHERE id = :id";
				$nome = $estado->getNome();
				$id = $estado->getId();
				$stmt = $this->pdo->prepare($sql);
				$stmt->bindParam(':nome', $nome);
				$stmt->bindParam(':id', $id);
				$stmt->execute();
				$stmt->closeCursor();
				return true;
			} catch(PDOException $e){
				echo $e->getMessage();
				return false;
			}
		}

		public function delete($estado){
			try {
				$sql = "DELETE FROM estados WHERE id = :id";
				$id = $estado->getId();
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