<?php

require_once 'DAO.php';

/**
/* Class VendaDAO
*/
abstract class VendaDAO extends EntityBase
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
   * @var decimal $valor_total
   */
  protected $valor_total;

  public function getValorTotal() {return $this->valor_total;}

  public function setValorTotal($valor_total) {$this->valor_total=$valor_total;}

  /**
   * Protected variable
   * @var int $id_cliente
   */
  protected $id_cliente;

  public function getIdCliente() {return $this->id_cliente;}

  public function setIdCliente($id_cliente) {$this->id_cliente=$id_cliente;}

  /**
   * Protected variable
   * @var int $id_assinante
   */
  protected $id_assinante;

  public function getIdAssinante() {return $this->id_assinante;}

  public function setIdAssinante($id_assinante) {$this->id_assinante=$id_assinante;}

  /**
  /* Constructor
  /* @var mixed $id
   */
  public function __construct($id=0)
  {
    parent::__construct();
    $this->table='vendas';
    $this->primkeys=['id'];
    $this->fields=['valor_total','id_cliente','id_assinante'];
    $this->sql="SELECT * FROM {$this->table}";
    if($id) $this->read($id);
  }

  /**
  /* Primary Key Finder
  /* @return object
   */
  public function findById($id)
  {
    $sql="SELECT * FROM vendas WHERE id='$id' LIMIT 1";
    return $this->getSelfObject($sql);
  }

  // ==========!!!DO NOT PUT YOUR OWN CODE (BUSINESS LOGIC) HERE!!!========== //
  // EXTEND THIS DAO CLASS WITH YOUR ONW CLASS CONTAINING YOUR BUSINESS LOGIC //
  // BECAUSE THIS CLASS FILE WILL BE RECREATED/OVERWRITTEN ON NEXT PHPDAO RUN //
  // ======================================================================== //
}

