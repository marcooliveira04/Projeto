<?php


/**
* 
*/
class Assinante
{
	
	private $id;
	private $nome;
	private $cpf;
	private $rg;
	private $nascimento;
	private $sexo;
	private $cepResidencial;
	private $ruaResidencial;
	private $numeroResidencial;
	private $complementoResidencial;
	private $bairroResidencial;
	private $cidadeResidencial;
	private $ufResidencial;
	private $cepEntrega;
	private $ruaEntrega;
	private $numeroEntrega;
	private $complementoEntrega;
	private $bairroEntrega;
	private $cidadeEntrega;
	private $ufEntrega;
	private $telefone;
	private $celular;
	private $email;
	private $senha;



	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getRg(){
		return $this->rg;
	}

	public function setRg($rg){
		$this->rg = $rg;
	}

	public function getNascimento(){
		return $this->nascimento;
	}

	public function setNascimento($nascimento){
		$this->nascimento = $nascimento;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getCepResidencial(){
		return $this->cepResidencial;
	}

	public function setCepResidencial($cepResidencial){
		$this->cepResidencial = $cepResidencial;
	}

	public function getRuaResidencial(){
		return $this->ruaResidencial;
	}

	public function setRuaResidencial($ruaResidencial){
		$this->ruaResidencial = $ruaResidencial;
	}

	public function getNumeroResidencial(){
		return $this->numeroResidencial;
	}

	public function setNumeroResidencial($numeroResidencial){
		$this->numeroResidencial = $numeroResidencial;
	}

	public function getComplementoResidencial(){
		return $this->complementoResidencial;
	}

	public function setComplementoResidencial($complementoResidencial){
		$this->complementoResidencial = $complementoResidencial;
	}

	public function getBairroResidencial(){
		return $this->bairroResidencial;
	}

	public function setBairroResidencial($bairroResidencial){
		$this->bairroResidencial = $bairroResidencial;
	}

	public function getCidadeResidencial(){
		return $this->cidadeResidencial;
	}

	public function setCidadeResidencial($cidadeResidencial){
		$this->cidadeResidencial = $cidadeResidencial;
	}

	public function getUfResidencial(){
		return $this->ufResidencial;
	}

	public function setUfResidencial($ufResidencial){
		$this->ufResidencial = $ufResidencial;
	}

	public function getCepEntrega(){
		return $this->cepEntrega;
	}

	public function setCepEntrega($cepEntrega){
		$this->cepEntrega = $cepEntrega;
	}

	public function getRuaEntrega(){
		return $this->ruaEntrega;
	}

	public function setRuaEntrega($ruaEntrega){
		$this->ruaEntrega = $ruaEntrega;
	}

	public function getNumeroEntrega(){
		return $this->numeroEntrega;
	}

	public function setNumeroEntrega($numeroEntrega){
		$this->numeroEntrega = $numeroEntrega;
	}

	public function getComplementoEntrega(){
		return $this->complementoEntrega;
	}

	public function setComplementoEntrega($complementoEntrega){
		$this->complementoEntrega = $complementoEntrega;
	}

	public function getBairroEntrega(){
		return $this->bairroEntrega;
	}

	public function setBairroEntrega($bairroEntrega){
		$this->bairroEntrega = $bairroEntrega;
	}

	public function getCidadeEntrega(){
		return $this->cidadeEntrega;
	}

	public function setCidadeEntrega($cidadeEntrega){
		$this->cidadeEntrega = $cidadeEntrega;
	}

	public function getUfEntrega(){
		return $this->ufEntrega;
	}

	public function setUfEntrega($ufEntrega){
		$this->ufEntrega = $ufEntrega;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function getCelular(){
		return $this->celular;
	}

	public function setCelular($celular){
		$this->celular = $celular;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = md5($senha);
	}

	public function validaCpf(){
		$regEx = preg_match(
					'/^[0-9]{3}(\.[0-9]{3}){2}\-[0-9]{2}|[0-9]{11}$/',
					$this->cpf
				);
		if ($regEx === false) {
			print_r("Error: ".$regEx);
		} else if ($regEx === 0) {
			print_r("Not a match");
		} else if ($regEx === 1) {
			print_r("Ok");
		}
	}

	public function validaCep(){
		$regEx = preg_match(
					'/^[0-9]{5}\-?[0-9]{3}$/',
					$this->cep
				);

		if ($regEx === false) {
			print_r("Error: ".$regEx);
		} else if ($regEx === 0) {
			print_r("Not a match");
		} else if ($regEx === 1) {
			print_r("Ok");
		}
	}

	public function validaTelefone(){
		$regEx = preg_match(
					'/^(\([1-9]{2}\)|[1-9]{2})\s?[2-9][0-9]{3,4}\-?[0-9]{4}$/',
					$this->telefone
				);

		if ($regEx === false) {
			print_r("Error: ".$regEx);
		} else if ($regEx === 0) {
			print_r("Not a match");
		} else if ($regEx === 1) {
			print_r("Ok");
		}
	}

	public function validaCelular(){
		$regEx = preg_match(
					'/^(\([1-9]{2}\)|[1-9]{2})\s?[2-9][0-9]{3,4}\-?[0-9]{4}$/',
					$this->celular
				);

		if ($regEx === false) {
			print_r("Error: ".$regEx);
		} else if ($regEx === 0) {
			print_r("Not a match");
		} else if ($regEx === 1) {
			print_r("Ok");
		}
	}
}

?>