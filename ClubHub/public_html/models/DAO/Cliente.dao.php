<?php

require_once 'DAO.php';

/**
/* Class ClienteDAO
*/
abstract class ClienteDAO extends EntityBase
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
   * @var varchar $nomeFantasia
   */
  protected $nomeFantasia;

  public function getNomeFantasia() {return $this->nomeFantasia;}

  public function setNomeFantasia($nomeFantasia) {$this->nomeFantasia=$nomeFantasia;}

  /**
   * Protected variable
   * @var varchar $cnpj
   */
  protected $cnpj;

  public function getCnpj() {return $this->cnpj;}

  public function setCnpj($cnpj) {$this->cnpj=$cnpj;}

  /**
   * Protected variable
   * @var varchar $razaoSocial
   */
  protected $razaoSocial;

  public function getRazaoSocial() {return $this->razaoSocial;}

  public function setRazaoSocial($razaoSocial) {$this->razaoSocial=$razaoSocial;}

  /**
   * Protected variable
   * @var int $categoria
   */
  protected $categoria;

  public function getCategoria() {return $this->categoria;}

  public function setCategoria($categoria) {$this->categoria=$categoria;}

  /**
  /* Constructor
  /* @var mixed $id
   */
  public function __construct($id=0)
  {
    parent::__construct();
    $this->table='cliente';
    $this->primkeys=['id'];
    $this->fields=['nomeFantasia','cnpj','razaoSocial','categoria'];
    $this->sql="SELECT * FROM {$this->table}";
    if($id) $this->read($id);
  }

  /**
  /* Primary Key Finder
  /* @return object
   */
  public function findById($id)
  {
    $sql="SELECT * FROM cliente WHERE id='$id' LIMIT 1";
    return $this->getSelfObject($sql);
  }

  // ==========!!!DO NOT PUT YOUR OWN CODE (BUSINESS LOGIC) HERE!!!========== //
  // EXTEND THIS DAO CLASS WITH YOUR ONW CLASS CONTAINING YOUR BUSINESS LOGIC //
  // BECAUSE THIS CLASS FILE WILL BE RECREATED/OVERWRITTEN ON NEXT PHPDAO RUN //
  // ======================================================================== //
}

