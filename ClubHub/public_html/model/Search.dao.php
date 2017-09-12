<?php

class SearchDao
{
	private $conn;
	private $pdo;
	private $gf;

	function __construct(){
		require_once 'connectionFactory.db.php';
		require_once 'GeneralFunctions.class.php';
		$this->gf = new GeneralFunctions;
		$this->conn = new criaConn;
		$this->pdo = $this->conn->getConn();
	}

	/**
	* Método para retornar dados do banco de dados.
	*
	* @param array $where - Deve conter condições para adicionar-se à query SELECT
	* @param array $orderby - Deve conter parâmetros para ordenar dados retornados do banco de dados
	*
	* @return array $resultado - array de objetos do tipo Curso
	*/
	public function readAulas($search){
		try{
			require_once 'Aula.class.php';
			$sql = "SELECT * FROM aulas where nomeAula like '%".$search->getTerm()."%'";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$resultado = array();
			foreach ($resultSet as $row => $col) {
				$aula = new Aula;
				$aula->setIdAula($col['idAula']);
				$aula->setNomeAula($col['nomeAula']);
				$aula->setDescricaoAula($col['descricaoAula']);
				$aula->setLinkAula($col['linkAula']);
				$aula->setMaterialAula($col['materialAula']);
				$aula->setIdDisciplina($col['idDisciplina']);
				$aula->setStatusAula($col['statusAula']);
				array_push($resultado, $aula);
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
	public function readArquivos($search){
		try{
			require_once 'Arquivos.class.php';
			$sql = "SELECT * FROM arquivos where nomeApresentacao like '%".$search->getTerm()."%'";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$resultado = array();
			foreach ($resultSet as $row => $col) {
				$arquivo = new Arquivo;
				$arquivo->setIdArquivo($col['idArquivo']);
				$arquivo->setNomeArquivo($col['nomeArquivo']);
				$arquivo->setCaminhoArquivo($col['caminhoArquivo']);
				$arquivo->setNomeApresentacao($col['nomeApresentacao']);
				array_push($resultado, $arquivo);
			}
		} catch(PDOException $e){
			$e->getMessage();
		}
	    return $resultado;
	}

	/**
	* Método para atualizar dados do banco de dados.
	*
	* @param object $aula - Deve conter dados do aula a ser alterado
	*
	* @return true|false
	*/
	public function update($aula){
		try{
			$stmt = $this->pdo->prepare("update aulas set nomeCurso = ?, descricaoCurso = ?, bannerCurso=?, statusCurso = ? where idCurso = ?");
			$stmt->bindParam(1, $aula->getNomeCurso());
			$stmt->bindParam(2, $aula->getDescricaoCurso());
			$stmt->bindParam(3, $aula->getBannerCurso());
			$stmt->bindParam(4, $aula->getStatusCurso());
			$stmt->bindParam(5, $aula->getIdCurso());
			$stmt->execute();
			$stmt->closeCursor();
			return true;
		} catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}

	/**
	* Método para excluir informações do banco de dados
	* @param object $aula - Deve conter no mínimo ID do aula a ser excluído
	*
	* @return true|false
	*/
	public function delete($aula){
		try{
			$stmt = $this->pdo->prepare("delete from aulas where idCurso = ?");
			$stmt->bindParam(1, $aula->getIdCurso());
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