<?php

	/**
	* 
	*/
	class AssinanteDao
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
		* @param object $assinante - O objeto da classe Assinante deve conter o nome do Assinante a ser incluso
		*
		* @return array bool - Retorna verdadeiro se a execução não foi interrompida por erros, senão, retorna falso.
		*/

		public function create($assinante){
			try {

				$sql = "
					INSERT INTO assinante(nome, cpf, rg, nascimento, sexo, cep, rua, numero, complemento, cidade, telefone, celular, email, senha) 
					VALUES(:nome, :cpf, :rg, :nascimento, :sexo, :cep, :rua, :numero, :complemento, :cidade, :telefone, :celular, :email, :senha)
				";

				$stmt = $this->pdo->prepare();

				$stmt->bindParam(':nome', $assinante->getNome());
				$stmt->bindParam(':cpf', $assinante->getCpf());
				$stmt->bindParam(':rg', $assinante->getRg());
				$stmt->bindParam(':nascimento', $assinante->getNascimento());
				$stmt->bindParam(':sexo', $assinante->getSexo());
				$stmt->bindParam(':cep', $assinante->getCep());
				$stmt->bindParam(':rua', $assinante->getRua());
				$stmt->bindParam(':numero', $assinante->getNumero());
				$stmt->bindParam(':complemento', $assinante->getComplemento());
				$stmt->bindParam(':cidade', $assinante->getCidade());
				$stmt->bindParam(':telefone', $assinante->getTelefone());
				$stmt->bindParam(':celular', $assinante->getCelular());
				$stmt->bindParam(':email', $assinante->getEmail());
				$stmt->bindParam(':senha', $assinante->getSenha());


				$stmt->execute();
				$stmt->closeCursor();
				return true;
			} catch (PDOException $e) {
	            print "Ocorreu um erro ao tentar executar esta ação.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
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
		public function read($assinante = null){
			try{
				require_once 'Assinante.class.php';
				$sql = "SELECT * FROM assinante";
				// $sql .= $this->gf->buildQuery($where, $orderby); //Faltando o arquivo - Pegar no trabalho
				$stmt = $this->pdo->prepare($sql);
				$stmt->execute();
				$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
				if ($stmt->rowCount() <= 0) {
					return false;
				} else {
					$resultado = array();
					foreach ($resultSet as $row => $col) {
						$assinante = new Assinante;
						$assinante->setId($col['id']);
						$assinante->setNome($col['nome']);
						$assinante->setCpf($col['cpf']);
						$assinante->setRg($col['rg']);
						$assinante->setNascimento($col['nascimento']);
						$assinante->setSexo($col['sexo']);
						$assinante->setCep($col['cep']);
						$assinante->setRua($col['rua']);
						$assinante->setNumero($col['numero']);
						$assinante->setCidade($col['cidade']);
						$assinante->setTelefone($col['telefone']);
						$assinante->setCelular($col['celular']);
						$assinante->setEmail($col['email']);
						$assinante->setSenha($col['senha']);
						array_push($resultado, $assinante);
					}
				}
			} catch(PDOException $e){
				$e->getMessage();
			}
		    return $resultado;
		}

		public function update($assinante){
			try {
				$sql = "UPDATE assinantes SET nome = :nome WHERE id = :id";
				$nome = $assinante->getNome();
				$id = $assinante->getId();
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

		public function delete($assinante){
			try {
				$sql = "DELETE FROM assinantes WHERE id = :id";
				$id = $assinante->getId();
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