<?php

require_once 'DAO.php';

/**
/* Class ClubeDAO
*/
abstract class ClubeDAO extends EntityBase
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
   * @var varchar $razaoSocial
   */
  protected $razaoSocial;

  public function getRazaoSocial() {return $this->razaoSocial;}

  public function setRazaoSocial($razaoSocial) {$this->razaoSocial=$razaoSocial;}

  /**
   * Protected variable
   * (UQ)->Unique key
   * @var varchar $cnpj
   */
  protected $cnpj;

  public function getCnpj() {return $this->cnpj;}

  public function setCnpj($cnpj) {$this->cnpj=$cnpj;}

  /**
   * Protected variable
   * @var varchar $cep
   */
  protected $cep;

  public function getCep() {return $this->cep;}

  public function setCep($cep) {$this->cep=$cep;}

  /**
   * Protected variable
   * @var varchar $rua
   */
  protected $rua;

  public function getRua() {return $this->rua;}

  public function setRua($rua) {$this->rua=$rua;}

  /**
   * Protected variable
   * @var varchar $numero
   */
  protected $numero;

  public function getNumero() {return $this->numero;}

  public function setNumero($numero) {$this->numero=$numero;}

  /**
   * Protected variable
   * @var varchar $complemento
   */
  protected $complemento;

  public function getComplemento() {return $this->complemento;}

  public function setComplemento($complemento) {$this->complemento=$complemento;}

  /**
   * Protected variable
   * @var int $cidade
   */
  protected $cidade;

  public function getCidade() {return $this->cidade;}

  public function setCidade($cidade) {$this->cidade=$cidade;}

  /**
   * Protected variable
   * @var int $uf
   */
  protected $uf;

  public function getUf() {return $this->uf;}

  public function setUf($uf) {$this->uf=$uf;}

  /**
   * Protected variable
   * @var varchar $telefone
   */
  protected $telefone;

  public function getTelefone() {return $this->telefone;}

  public function setTelefone($telefone) {$this->telefone=$telefone;}

  /**
   * Protected variable
   * @var varchar $celular
   */
  protected $celular;

  public function getCelular() {return $this->celular;}

  public function setCelular($celular) {$this->celular=$celular;}

  /**
   * Protected variable
   * (UQ)->Unique key
   * @var varchar $email
   */
  protected $email;

  public function getEmail() {return $this->email;}

  public function setEmail($email) {$this->email=$email;}

  /**
   * Protected variable
   * @var varchar $senha
   */
  protected $senha;

  public function getSenha() {return $this->senha;}

  public function setSenha($senha) {$this->senha=$senha;}

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
    $this->table='clubes';
    $this->primkeys=['id'];
    $this->fields=['nome','razaoSocial','cnpj','cep','rua','numero','complemento','cidade','uf','telefone','celular','email','senha','categoria'];
    $this->sql="SELECT * FROM {$this->table}";
    if($id) $this->read($id);
  }

  /**
  /* Primary Key Finder
  /* @return object
   */
  public function findById($id)
  {
    $sql="SELECT * FROM clubes WHERE id='$id' LIMIT 1";
    return $this->getSelfObject($sql);
  }

  /**
  /* Unique Key Finder
  /* @return object
   */
  public function findByCnpj($cnpj)
  {
    $sql="SELECT * FROM clubes WHERE cnpj='$cnpj' LIMIT 1";
    return $this->getSelfObject($sql);
  }

  /**
  /* Unique Key Finder
  /* @return object
   */
  public function findByEmail($email)
  {
    $sql="SELECT * FROM clubes WHERE email='$email' LIMIT 1";
    return $this->getSelfObject($sql);
  }

  // ==========!!!DO NOT PUT YOUR OWN CODE (BUSINESS LOGIC) HERE!!!========== //
  // EXTEND THIS DAO CLASS WITH YOUR ONW CLASS CONTAINING YOUR BUSINESS LOGIC //
  // BECAUSE THIS CLASS FILE WILL BE RECREATED/OVERWRITTEN ON NEXT PHPDAO RUN //
  // ======================================================================== //
}

