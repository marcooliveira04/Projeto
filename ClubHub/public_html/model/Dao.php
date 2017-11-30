<?php
require_once 'ConnectionFactory.db.php';
/**
* 
*/
class Dao 
{

    private $conn;
    private $pdo;
    private $tabela;
    private $colunas;

    function __construct() {
        $this->conn = new Conn;
        $this->pdo = $this->conn->getPDO();
    }

    public function create($object){
        try {
            
            $tokens = '';
            //Remove coluna id
            $colunas = $this->colunas;
            $pop = array_pop($this->colunas);

            $limite = count($this->colunas) - 1;

            for ($i=0; $i <= $limite; $i++) { 
                $tokens = ($i == $limite) ? $tokens.'?' : $tokens.'?,' ;
            }

            $colunas_ = implode($this->colunas, ', ');

            $query = "INSERT INTO {$this->tabela} ({$colunas_}) VALUES ({$tokens});";

            $stmt = $this->pdo->prepare($query);



            $stmt = $this->binder($stmt, $object);

            $stmt->execute();
            $stmt->closeCursor();
            array_push($this->colunas, $pop);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function read(string $classe, array $where = null, array $orderby = null){
        ucfirst($classe);
        require_once $classe.'.php';
        try {
            $query = "SELECT * FROM {$this->tabela}";
            $query .= $this->buildQuery($where, $orderby);

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

    public function update($object){
        try {
            $args = $this->stringfyForUpdate($this->colunas);

            $query = "UPDATE {$this->tabela} SET {$args} WHERE id = ?;";

            $stmt = $this->pdo->prepare($query);

            $stmt = $this->binder($stmt, $object);

            $stmt->execute();
            $stmt->closeCursor();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($object){
        try {
            $query = "DELETE FROM {$this->tabela} WHERE id = ?";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(1, $object->getId());

            $stmt->execute();
            $stmt->closeCursor();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
    * Método para configurar condições e ordenação do select.
    *
    * @param array $where - Deve conter condições para adicionar-se à 
    * query SELECT.
    * @param array $orderby - Deve conter parâmetros para ordenar dados 
    * retornados do banco de dados.
    *
    * @return array $concatenado - Deve conter as condições e ordenação 
    * concatenadas
    */
    public function buildQuery($where, $orderby){
        $concatenado = '';
        if(is_array($where) && !is_null($where) && !empty($where)){
            $concatenado .= " WHERE ";
            $contagem = count($where);
            foreach ($where as $chave => $grupo) {
                /**
                * Precisa ter um espaço no fim da string para que não ocorra erro na query!
                */
                $concatenado .= "$grupo[coluna] = $grupo[valor] $grupo[operador] ";
                $contagem --;
            }
        }

        if(is_array($orderby) && !is_null($orderby) && !empty($orderby)){

            $concatenado .= " ORDER BY ";
            $contagem = count($orderby);
            foreach ($orderby as $chave => $grupo) {
                // print_r($grupo);
                $coluna = implode(",", $grupo['colunas']);
                $concatenado .= "$coluna $grupo[ordem]";
                $contagem --;
            }
        }
        return $concatenado;
    }

    /**
     * @return mixed
     */
    public function getTabela() { return $this->tabela; }

    /**
     * @param mixed $tabela
     *
     * @return self
     */
    public function setTabela($tabela) { $this->tabela = $tabela; return $this; }

    /**
     * @return mixed
     */
    public function getColunas() { return $this->colunas; }

    /**
     * @param mixed $colunas
     *
     * @return self
     */
    public function setColunas($colunas) { $this->colunas = $colunas; return $this; }

    public function binder($stmt, $object){
        $campos = $this->colunas;
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
        //Remove a coluna ID
        array_pop($colunas);

        return $string = implode(' = ?, ', $colunas)." = ?";
    }

    /**
     * @return mixed
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @param mixed $pdo
     *
     * @return self
     */
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;

        return $this;
    }

    public function inativaPacote($status, $id){
        try {
            $query = "UPDATE pacotes SET status = ? WHERE id = ?";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(1, $status);
            $stmt->bindValue(2, $id);

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