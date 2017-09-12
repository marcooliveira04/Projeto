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
		private $cep;
		private $rua;
		private $numero;
		private $complemento;
		private $cidade;
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

		public function getCep(){
			return $this->cep;
		}

		public function setCep($cep){
			$this->cep = $cep;
		}

		public function getRua(){
			return $this->rua;
		}

		public function setRua($rua){
			$this->rua = $rua;
		}

		public function getNumero(){
			return $this->numero;
		}

		public function setNumero($numero){
			$this->numero = $numero;
		}

		public function getComplemento(){
			return $this->complemento;
		}

		public function setComplemento($complemento){
			$this->complemento = $complemento;
		}

		public function getCidade(){
			return $this->cidade;
		}

		public function setCidade($cidade){
			$this->cidade = $cidade;
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
			$this->senha = $senha;
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

		public function testeBinding(){
			$arrayOfFields = array(
								'id',
								'nome',
								'cpf',
								'rg',
								'nascimento',
								'sexo',
								'cep',
								'rua',
								'numero',
								'complemento',
								'cidade',
								'telefone',
								'celular',
								'email',
								'senha'
							);
			$arrayOfValues = array(
								$this->id,
								$this->nome,
								$this->cpf,
								$this->rg,
								$this->nascimento, 
								$this->sexo,
								$this->cep,
								$this->rua, 
								$this->numero,
								$this->complemento,
								$this->cidade,
								$this->telefone,
								$this->celular,
								$this->email,
								$this->senha
							);
			$arrayAll = array('names' => $arrayOfFields, 'values' => $arrayOfValues);

			return $arrayAll;
		}
	}

?>