<?php
require_once 'ConnectionFactory.db.php';
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

    public function stringfyForUpdate($colunas){
        return $string = implode(' = ?, ', $colunas)." = ?";
    }

    public function create($tabela, $colunas, $object){
        try {
            
            $tokens = '';

            $limite = count($colunas) - 1;

            for ($i=0; $i <= $limite; $i++) { 
                $tokens = ($i == $limite) ? $tokens.'?' : $tokens.'?,' ;
            }

            $colunas_ = implode($colunas, ', ');

            $query = "INSERT INTO {$tabela} ({$colunas_}) VALUES ({$tokens});";

            $stmt = $this->pdo->prepare($query);

            $stmt = $this->binder($stmt, $colunas, $object);

            $stmt->execute();
            $stmt->closeCursor();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function read(string $tabela, string $classe){
        ucfirst($classe);
        require_once $classe.'.php';
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

    public function update($tabela, $colunas, $object){
        try {
            $colunas_ = $this->stringfyForUpdate($colunas);



            $query = "UPDATE {$tabela} SET ({$colunas_}) WHERE id = ({$tokens});";

            $stmt = $this->pdo->prepare($query);

            $stmt = $this->binder($stmt, $colunas, $object);

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