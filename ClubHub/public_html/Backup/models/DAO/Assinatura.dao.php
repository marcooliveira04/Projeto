<?php

require_once 'DAO.php';

/**
/* Class AssinaturaDAO
*/
abstract class AssinaturaDAO extends EntityBase
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
   * @var int $id_assinante
   */
  protected $id_assinante;

  public function getIdAssinante() {return $this->id_assinante;}

  public function setIdAssinante($id_assinante) {$this->id_assinante=$id_assinante;}

  /**
   * Protected variable
   * @var int $id_pacote
   */
  protected $id_pacote;

  public function getIdPacote() {return $this->id_pacote;}

  public function setIdPacote($id_pacote) {$this->id_pacote=$id_pacote;}

  /**
  /* Constructor
  /* @var mixed $id
   */
  public function __construct($id=0)
  {
    parent::__construct();
    $this->table='assinatura';
    $this->primkeys=['id'];
    $this->fields=['id_assinante','id_pacote'];
    $this->sql="SELECT * FROM {$this->table}";
    if($id) $this->read($id);
  }

  /**
  /* Primary Key Finder
  /* @return object
   */
  public function findById($id)
  {
    $sql="SELECT * FROM assinatura WHERE id='$id' LIMIT 1";
    return $this->getSelfObject($sql);
  }

  // ==========!!!DO NOT PUT YOUR OWN CODE (BUSINESS LOGIC) HERE!!!========== //
  // EXTEND THIS DAO CLASS WITH YOUR ONW CLASS CONTAINING YOUR BUSINESS LOGIC //
  // BECAUSE THIS CLASS FILE WILL BE RECREATED/OVERWRITTEN ON NEXT PHPDAO RUN //
  // ======================================================================== //
}

