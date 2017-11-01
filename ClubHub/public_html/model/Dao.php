<?php

/**
* 
*/
class Dao
{

    public function binder($stmt, $campos, $object){
        foreach ($campos as $index => $campo) {
            $getter = 'get'.ucfirst($campo);
            $token = $index + 1;
            $stmt->bindValue($token, $object->$getter());
        }

        return $stmt;
    }

    public function setter($row, $object){
        foreach ($row as $coluna => $valor) {
            $setter = 'set'.ucfirst($coluna);

            $object->$setter($valor);
        }

        return $object;
    }

    public function create($pdo, $tabela, $colunas, $object){
        try {
            
            $tokens = '';

            $limite = count($colunas) - 1;

            for ($i=0; $i <= $limite; $i++) { 
                $tokens = ($i == $limite) ? $tokens.'?' : $tokens.'?,' ;
            }

            $colunas_ = implode($colunas, ', ');

            $query = "INSERT INTO {$tabela} ({$colunas_}) VALUES ({$tokens});";

            $stmt = $pdo->prepare($query);

            $stmt = $this->binder($stmt, $colunas, $object);

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
            $query = "SELECT * FROM {$tabela}";

            $stmt = $this->pdo->prepare($query);

            $stmt->execute();
            if ($stmt->rowCount() == 0) {
                return false;
            } else {
                $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $resultado = array();
                foreach ($resultSet as $indice => $row) {
                    $clube = new Clube;

                    $resultado[] = $this->setter($row, $clube);
                }
                return print_r($resultado);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;           
        }
    }
}

?>