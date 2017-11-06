<?php

	/**
	* 
	*/
	class Cidade
	{
		private $id;
		private $nome;
		private $estado;

		public function getId(){
			return $this->id;
		}

		public function setId(int $id){
			$this->id = $id;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome(string $nome){
			$this->nome = $nome;
		}

		public function getEstado(){
			return $this->estado;
		}

		public function setEstado(int $estado){
			$this->estado = $estado;
		}
	}

?>