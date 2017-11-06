<?php
require_once 'Pessoa.php';
/**
* 
*/
class Assinante extends Pessoa
{
	private $cpf;
	private $rg;
	private $nascimento;
	private $sexo;
    private $cepEntrega;
    private $ruaEntrega;
    private $numeroEntrega;
    private $complementoEntrega;
    private $bairroEntrega;
    private $cidadeEntrega;
    private $ufEntrega;

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     *
     * @return self
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * @param mixed $rg
     *
     * @return self
     */
    public function setRg($rg)
    {
        $this->rg = $rg;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNascimento()
    {
        return $this->nascimento;
    }

    /**
     * @param mixed $nascimento
     *
     * @return self
     */
    public function setNascimento($nascimento)
    {
        $this->nascimento = $nascimento;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     *
     * @return self
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCepEntrega()
    {
        return $this->cepEntrega;
    }

    /**
     * @param mixed $cepEntrega
     *
     * @return self
     */
    public function setCepEntrega($cepEntrega)
    {
        $this->cepEntrega = $cepEntrega;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRuaEntrega()
    {
        return $this->ruaEntrega;
    }

    /**
     * @param mixed $ruaEntrega
     *
     * @return self
     */
    public function setRuaEntrega($ruaEntrega)
    {
        $this->ruaEntrega = $ruaEntrega;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroEntrega()
    {
        return $this->numeroEntrega;
    }

    /**
     * @param mixed $numeroEntrega
     *
     * @return self
     */
    public function setNumeroEntrega($numeroEntrega)
    {
        $this->numeroEntrega = $numeroEntrega;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getComplementoEntrega()
    {
        return $this->complementoEntrega;
    }

    /**
     * @param mixed $complementoEntrega
     *
     * @return self
     */
    public function setComplementoEntrega($complementoEntrega)
    {
        $this->complementoEntrega = $complementoEntrega;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBairroEntrega()
    {
        return $this->bairroEntrega;
    }

    /**
     * @param mixed $bairroEntrega
     *
     * @return self
     */
    public function setBairroEntrega($bairroEntrega)
    {
        $this->bairroEntrega = $bairroEntrega;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidadeEntrega()
    {
        return $this->cidadeEntrega;
    }

    /**
     * @param mixed $cidadeEntrega
     *
     * @return self
     */
    public function setCidadeEntrega($cidadeEntrega)
    {
        $this->cidadeEntrega = $cidadeEntrega;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUfEntrega()
    {
        return $this->ufEntrega;
    }

    /**
     * @param mixed $ufEntrega
     *
     * @return self
     */
    public function setUfEntrega($ufEntrega)
    {
        $this->ufEntrega = $ufEntrega;

        return $this;
    }

}

?>