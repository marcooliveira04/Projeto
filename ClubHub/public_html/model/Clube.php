<?php
require_once 'Pessoa.php';
/**
* 
*/
class Clube extends Pessoa
{

    # ao invés de Nome Fantasia, será utilizado o atributo "nome" da classe Pessoa
	// private $nomeFantasia;
    private $razaoSocial;
	private $cnpj;
    private $categoria;
    private $pacotes;
    private $banco;
    private $agencia;
    private $conta;

    /**
     * @return mixed
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    /**
     * @param mixed $razaoSocial
     *
     * @return self
     */
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cnpj
     *
     * @return self
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     *
     * @return self
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }



    /**
     * @return mixed
     */
    public function getPacotes()
    {
        return $this->pacotes;
    }

    /**
     * @param mixed $pacote
     *
     * @return self
     */
    public function setPacotes(Array $pacotes)
    {
        $this->pacotes = $pacotes;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * @param mixed $banco
     *
     * @return self
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * @param mixed $agencia
     *
     * @return self
     */
    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * @param mixed $conta
     *
     * @return self
     */
    public function setConta($conta)
    {
        $this->conta = $conta;

        return $this;
    }
}

?>