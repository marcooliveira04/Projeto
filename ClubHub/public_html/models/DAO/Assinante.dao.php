<?php

require_once 'DAO.php';

/**
/* Class AssinanteDAO
*/
abstract class AssinanteDAO extends EntityBase
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
   * @var varchar $cpf
   */
  protected $cpf;

  public function getCpf() {return $this->cpf;}

  public function setCpf($cpf) {$this->cpf=$cpf;}

  /**
   * Protected variable
   * @var varchar $rg
   */
  protected $rg;

  public function getRg() {return $this->rg;}

  public function setRg($rg) {$this->rg=$rg;}

  /**
   * Protected variable
   * @var date $nascimento
   */
  protected $nascimento;

  public function getNascimento() {return $this->nascimento;}

  public function setNascimento($nascimento) {$this->nascimento=$nascimento;}

  /**
   * Protected variable
   * @var char $sexo
   */
  protected $sexo;

  public function getSexo() {return $this->sexo;}

  public function setSexo($sexo) {$this->sexo=$sexo;}

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
  /* Constructor
  /* @var mixed $id
   */
  public function __construct($id=0)
  {
    parent::__construct();
    $this->table='assinante';
    $this->primkeys=['id'];
    $this->fields=['nome','cpf','rg','nascimento','sexo','cep','rua','numero','complemento','cidade','telefone','celular','email','senha'];
    $this->sql="SELECT * FROM {$this->table}";
    if($id) $this->read($id);
  }

  /**
  /* Primary Key Finder
  /* @return object
   */
  public function findById($id)
  {
    $sql="SELECT * FROM assinante WHERE id='$id' LIMIT 1";
    return $this->getSelfObject($sql);
  }

  // ==========!!!DO NOT PUT YOUR OWN CODE (BUSINESS LOGIC) HERE!!!========== //
  // EXTEND THIS DAO CLASS WITH YOUR ONW CLASS CONTAINING YOUR BUSINESS LOGIC //
  // BECAUSE THIS CLASS FILE WILL BE RECREATED/OVERWRITTEN ON NEXT PHPDAO RUN //
  // ======================================================================== //
}

