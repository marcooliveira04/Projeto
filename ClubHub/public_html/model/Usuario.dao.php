<?php

/**
* 
*/
class UsuarioDao
{
	
	function __construct()
	{
		require_once 'connectionFactory.db.php';
		require_once 'GeneralFunctions.class.php';
		$this->gf = new GeneralFunctions;
		$this->conn = new criaConn;
		$this->pdo = $this->conn->getConn();
	}

	public function create($usuario){
		try {
			$stmt = $this->pdo->prepare("INSERT INTO usuarios(nomeUsuario, emailUsuario, statusUsuario) VALUES(?,?,?)");
			$stmt->bindParam(1, $usuario->getNomeUsuario());
			// $stmt->bindParam(2, $usuario->getCpfUsuario());
			$stmt->bindParam(2, $usuario->getEmailUsuario());
			$stmt->bindParam(3, $usuario->getStatusUsuario());
			$stmt->execute();
			$stmt->closeCursor();
			return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

	public function read($where = array(), $orderby = array()){
		try{
			$sql = "SELECT * FROM usuarios";
			$sql .= $this->gf->buildQuery($where, $orderby);
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if ($stmt->rowCount() <= 0) {
				return false;
			} else {
				$resultado = array();
				foreach ($resultSet as $row => $col) {
					$usuario = new Usuario;
					$usuario->setIdUsuario($col['idUsuario']);
					$usuario->setNomeUsuario($col['nomeUsuario']);
					$usuario->setCpfUsuario($col['cpfUsuario']);
					$usuario->setEmailUsuario($col['emailUsuario']);
					$usuario->setDataUsuario($col['dataUsuario']);
					$usuario->setStatusUsuario($col['statusUsuario']);
					array_push($resultado, $usuario);
				}
			}
		} catch(PDOException $e){
			$e->getMessage();
		}
	    return $resultado;
	}

	public function update($usuario){
		try{
			/* dataUsuario não pode ser atualizado, sendo a data de cadastro do usuário. Portanto, a coluna não se encontra na instrução. */
			$stmt = $this->pdo->prepare("update usuarios set nomeUsuario = ?, cpfUsuario = ?, emailUsuario = ?, statusUsuario = ? where idUsuario = ?");

			$nomeUsuario 	= $usuario->getNomeUsuario();
			$cpfUsuario 	= $usuario->getCpfUsuario();
			$emailUsuario 	= $usuario->getEmailUsuario();
			$statusUsuario 	= $usuario->getStatusUsuario();
			$idUsuario 		= $usuario->getIdUsuario();

			$stmt->bindParam(1, $nomeUsuario);
			$stmt->bindParam(2, $cpfUsuario);
			$stmt->bindParam(3, $emailUsuario);
			$stmt->bindParam(4, $statusUsuario);
			$stmt->bindParam(5, $idUsuario);
			$stmt->execute();
			$stmt->closeCursor();
			return true;
		} catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}

	public function delete($usuario){
		try{
			$stmt = $this->pdo->prepare("delete from usuarios where idUsuario = ?");
			$stmt->bindParam(1, $usuario->getIdUsuario());
			$stmt->execute();
			$stmt->closeCursor();
			return true;
		} catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}
}

?>