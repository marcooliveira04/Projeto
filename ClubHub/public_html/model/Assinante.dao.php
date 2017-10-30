<?php

	/**
	* 
	*/
	class AssinanteDao
	{
		
		private $conn;
		private $pdo;
		private $gf;
		private $where;

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
					INSERT INTO assinante(nome, cpf, rg, nascimento, sexo, cepResidencial, ruaResidencial, numeroResidencial, complementoResidencial, cidadeResidencial, ufResidencial, cepEntrega, ruaEntrega, numeroEntrega, complementoEntrega, cidadeEntrega, ufEntrega, telefone, celular, email, senha) 
					VALUES(:nome, :cpf, :rg, :nascimento, :sexo, :cepResidencial, :ruaResidencial, :numeroResidencial, :complementoResidencial, :cidadeResidencial, :ufResidencial, :cepEntrega, :ruaEntrega, :numeroEntrega, :complementoEntrega, :cidadeEntrega, :ufEntrega, :telefone, :celular, :email, :senha)
				";

				$stmt = $this->pdo->prepare($sql);

				$stmt->bindValue(':nome', $assinante->getNome());
				$stmt->bindValue(':cpf', $assinante->getCpf());
				$stmt->bindValue(':rg', $assinante->getRg());
				$stmt->bindValue(':nascimento', $assinante->getNascimento());
				$stmt->bindValue(':sexo', $assinante->getSexo());
				$stmt->bindValue(':cepResidencial', $assinante->getCepResidencial());
				$stmt->bindValue(':ruaResidencial', $assinante->getRuaResidencial());
				$stmt->bindValue(':numeroResidencial', $assinante->getNumeroResidencial());
				$stmt->bindValue(':complementoResidencial', $assinante->getComplementoResidencial());
				$stmt->bindValue(':cidadeResidencial', $assinante->getCidadeResidencial());
				$stmt->bindValue(':ufResidencial', $assinante->getUfResidencial());
				$stmt->bindValue(':cepEntrega', $assinante->getCepEntrega());
				$stmt->bindValue(':ruaEntrega', $assinante->getRuaEntrega());
				$stmt->bindValue(':numeroEntrega', $assinante->getNumeroEntrega());
				$stmt->bindValue(':complementoEntrega', $assinante->getComplementoEntrega());
				$stmt->bindValue(':cidadeEntrega', $assinante->getCidadeEntrega()); 
				$stmt->bindValue(':ufEntrega', $assinante->getUfEntrega());
				$stmt->bindValue(':telefone', $assinante->getTelefone());
				$stmt->bindValue(':celular', $assinante->getCelular());
				$stmt->bindValue(':email', $assinante->getEmail());
				$stmt->bindValue(':senha',$assinante->getSenha());

				$stmt->execute();
				$stmt->closeCursor();
				return true;
			} catch (PDOException $e) {
	            print "Ocorreu um erro ao tentar executar esta ação.";
	            if ($e->getCode()) {
	            	print "Entre em contato conosco e informe o código de erro: $e->getCode()";
	            }
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
						$assinante->setCepResidencial($col['cepResidencial']);
						$assinante->setRuaResidencial($col['ruaResidencial']);
						$assinante->setNumeroResidencial($col['numeroResidencial']);
						$assinante->setComplementoResidencial($col['complementoResidencial']);
						$assinante->setBairroResidencial($col['bairroResidencial']);
						$assinante->setCidadeResidencial($col['cidadeResidencial']);
						$assinante->setUfResidencial($col['ufResidencial']);
						$assinante->setCepEntrega($col['cepEntrega']);
						$assinante->setRuaEntrega($col['ruaEntrega']);
						$assinante->setNumeroEntrega($col['numeroEntrega']);
						$assinante->setComplementoEntrega($col['complementoEntrega']);
						$assinante->setBairroEntrega($col['bairroEntrega']);
						$assinante->setCidadeEntrega($col['cidadeEntrega']);
						$assinante->setUfEntrega($col['ufEntrega']);
						$assinante->setTelefone($col['telefone']);
						$assinante->setCelular($col['celular']);
						$assinante->setEmail($col['email']);
						array_push($resultado, $assinante);
					}
				}
			} catch(PDOException $e){
				$e->getMessage();
			}
		    return $resultado;
		}

		/**
		* Método para retornar dados do banco de dados.
		*
		* @param array $where - Deve conter condições para adicionar-se à query SELECT
		* @param array $orderby - Deve conter parâmetros para ordenar dados retornados do banco de dados
		*
		* @return array $resultado - array de objetos do tipo Curso
		*/
		public function readLogin(Assinante $assinante){
			try{
				require_once 'Assinante.class.php';
				$sql = "SELECT * FROM assinante where email = :email and senha = :senha";
				// $sql .= $this->gf->buildQuery($where, $orderby); //Faltando o arquivo - Pegar no trabalho
				$stmt = $this->pdo->prepare($sql);

				$stmt->bindValue(':email', $assinante->getEmail());
				$stmt->bindValue(':senha', $assinante->getSenha());

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