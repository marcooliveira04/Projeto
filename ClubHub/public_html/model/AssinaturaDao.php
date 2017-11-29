<?php
require_once 'Dao.php';
require_once 'Assinatura.php';
/**
* 
*/
class AssinaturaDao extends Dao
{
	function __construct() {
		$this->setTabela('assinatura');
		// Id deve ficar por último para poder ser utilizado e _popped_ em funções como update e delete.
		$this->setColunas(['idAssinante', 'idPacote', 'data', 'codRastreio', 'transportadora', 'status', 'id']);
		parent::__construct();
	}

	public function readAssinaturasPagas($pacote = null, $periodoIni = null, $periodoFinal = null, $ordenar = null){
        require_once 'Assinatura.php';
        $classe = "Assinatura";
        try {
            $query = "
	            SELECT 
				    a.id,
				    b.id AS idPacote,
				    SUM(b.valor) AS total,
				    COUNT(a.idPacote) AS quantidade,
				    a.status AS status
				FROM
				    assinatura a
				        INNER JOIN
				    pacotes b ON a.idPacote = b.id
				";

				$where = [];

				if ($pacote !== null) {
					$where[] = "a.id = ".$pacote;
				}

				if ($periodoIni !== null) {
					$betweenFirst = "'".$periodoIni."'";
				} else {
					$betweenFirst = 'DATE_SUB(NOW(), INTERVAL 30 DAY)';
				}

				if ($periodoFinal !== null) {
					$betweenLast = "'".$periodoFinal."'";
				} else {
					$betweenLast = 'NOW()';
				}

				$where[] = "a.`data` BETWEEN ".$betweenFirst." AND ".$betweenLast;

				$where[] = "a.status = 'P' ";

				switch ($ordenar) {
					case 1:
						$order = "a.idPacote";
						break;
					case 2:
						$order = "MAX(quantidadesVendidos)";
						break;
					case 3:
						$order = "MAX(totalVendidos)";
						break;
					case 4:
						$order = "MIN(quantidadesVendidos)";
						break;
					case 5:
						$order = "MIN(totalVendidos)";
						break;
					
					default:
						$order = "a.`data`";
						break;
				}

				$where = implode(' AND ', $where);

			$query .= "
				WHERE ".$where."
				GROUP BY a.idPacote
				ORDER BY ".$order
			;

            $stmt = parent::getPdo()->prepare($query);

            $stmt->execute();
            if ($stmt->rowCount() == 0) {
                return false;
            } else {
                $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $resultado = array();
                foreach ($resultSet as $indice => $row) {
                    $object = new $classe;

                    $resultado[] = $this->setter($row, $object);
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