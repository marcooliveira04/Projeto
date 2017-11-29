<?php

/**
* 
*/
class Assinatura
{
	private $id;
    private $idPacote;
    private $idAssinante;
    private $data;
    private $codRastreio;
    private $transportadora;
    private $status;
    private $total;
    private $quantidade;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdPacote()
    {
        return $this->idPacote;
    }

    /**
     * @param mixed $idPacote
     *
     * @return self
     */
    public function setIdPacote($idPacote)
    {
        $this->idPacote = $idPacote;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdAssinante()
    {
        return $this->idAssinante;
    }

    /**
     * @param mixed $idAssinante
     *
     * @return self
     */
    public function setIdAssinante($idAssinante)
    {
        $this->idAssinante = $idAssinante;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     *
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodRastreio()
    {
        return $this->codRastreio;
    }

    /**
     * @param mixed $codRastreio
     *
     * @return self
     */
    public function setCodRastreio($codRastreio)
    {
        $this->codRastreio = $codRastreio;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getTransportadora()
    {
        return $this->transportadora;
    }

    /**
     * @param mixed $transportadora
     *
     * @return self
     */
    public function setTransportadora($transportadora)
    {
        $this->transportadora = $transportadora;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     *
     * @return self
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param mixed $quantidade
     *
     * @return self
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }
}

?>