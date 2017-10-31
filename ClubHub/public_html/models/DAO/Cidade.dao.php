<?php

require_once 'DAO.php';

/**
/* Class CidadeDAO
*/
abstract class CidadeDAO extends EntityBase
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
   * @var int $estado
   */
  protected $estado;

  public function getEstado() {return $this->estado;}

  public function setEstado($estado) {$this->estado=$estado;}

  /**
  /* Constructor
  /* @var mixed $id
   */
  public function __construct($id=0)
  {
    parent::__construct();
    $this->table='cidade';
    $this->primkeys=['id'];
    $this->fields=['nome','estado'];
    $this->sql="SELECT * FROM {$this->table}";
    if($id) $this->read($id);
  }

  /**
  /* Primary Key Finder
  /* @return object
   */
  public function findById($id)
  {
    $sql="SELECT * FROM cidade WHERE id='$id' LIMIT 1";
    return $this->getSelfObject($sql);
  }

  // ==========!!!DO NOT PUT YOUR OWN CODE (BUSINESS LOGIC) HERE!!!========== //
  // EXTEND THIS DAO CLASS WITH YOUR ONW CLASS CONTAINING YOUR BUSINESS LOGIC //
  // BECAUSE THIS CLASS FILE WILL BE RECREATED/OVERWRITTEN ON NEXT PHPDAO RUN //
  // ======================================================================== //
}

