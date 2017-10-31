<?php

require_once 'DAO.php';

/**
/* Class PeriodicidadeDAO
*/
abstract class PeriodicidadeDAO extends EntityBase
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
   * @var date $data_inicio
   */
  protected $data_inicio;

  public function getDataInicio() {return $this->data_inicio;}

  public function setDataInicio($data_inicio) {$this->data_inicio=$data_inicio;}

  /**
   * Protected variable
   * @var date $data_fim
   */
  protected $data_fim;

  public function getDataFim() {return $this->data_fim;}

  public function setDataFim($data_fim) {$this->data_fim=$data_fim;}

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
    $this->table='periodicidade';
    $this->primkeys=['id'];
    $this->fields=['data_inicio','data_fim','id_pacote'];
    $this->sql="SELECT * FROM {$this->table}";
    if($id) $this->read($id);
  }

  /**
  /* Primary Key Finder
  /* @return object
   */
  public function findById($id)
  {
    $sql="SELECT * FROM periodicidade WHERE id='$id' LIMIT 1";
    return $this->getSelfObject($sql);
  }

  // ==========!!!DO NOT PUT YOUR OWN CODE (BUSINESS LOGIC) HERE!!!========== //
  // EXTEND THIS DAO CLASS WITH YOUR ONW CLASS CONTAINING YOUR BUSINESS LOGIC //
  // BECAUSE THIS CLASS FILE WILL BE RECREATED/OVERWRITTEN ON NEXT PHPDAO RUN //
  // ======================================================================== //
}

