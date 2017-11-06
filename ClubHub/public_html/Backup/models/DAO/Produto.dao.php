<?php

require_once 'DAO.php';

/**
/* Class ProdutoDAO
*/
abstract class ProdutoDAO extends EntityBase
{

  /**
   * Protected variable
   * (PK)->Primary key
   * @var int $id
   */
  protected $id;

  public function getId() {return $this->id;}

  public function setId($id) {$this->id=$id;}

  /**
   * Protected variable
   * @var varchar $nome
   */
  protected $nome;

  public function getNome() {return $this->nome;}

  public function setNome($nome) {$this->nome=$nome;}

  /**
   * Protected variable
   * @var decimal $valor
   */
  protected $valor;

  public function getValor() {return $this->valor;}

  public function setValor($valor) {$this->valor=$valor;}

  /**
   * Protected variable
   * @var int $id_cliente
   */
  protected $id_cliente;

  public function getIdCliente() {return $this->id_cliente;}

  public function setIdCliente($id_cliente) {$this->id_cliente=$id_cliente;}

  /**
  /* Constructor
  /* @var mixed $id
   */
  public function __construct($id=0)
  {
    parent::__construct();
    $this->table='produto';
    $this->primkeys=['id'];
    $this->fields=['nome','valor','id_cliente'];
    $this->sql="SELECT * FROM {$this->table}";
    if($id) $this->read($id);
  }

  /**
  /* Primary Key Finder
  /* @return object
   */
  public function findById($id)
  {
    $sql="SELECT * FROM produto WHERE id='$id' LIMIT 1";
    return $this->getSelfObject($sql);
  }

  // ==========!!!DO NOT PUT YOUR OWN CODE (BUSINESS LOGIC) HERE!!!========== //
  // EXTEND THIS DAO CLASS WITH YOUR ONW CLASS CONTAINING YOUR BUSINESS LOGIC //
  // BECAUSE THIS CLASS FILE WILL BE RECREATED/OVERWRITTEN ON NEXT PHPDAO RUN //
  // ======================================================================== //
}

