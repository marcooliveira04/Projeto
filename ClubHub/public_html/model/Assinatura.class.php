<?php

	/**
	* 
	*/
	class Assinatura
	{
		
		private $pacote;
		private $assinante;
		private $periodo;
	
    /**
     * @return mixed
     */
    public function getPacote()
    {
        return $this->pacote;
    }

    /**
     * @param mixed $pacote
     *
     * @return self
     */
    public function setPacote(Pacote $pacote)
    {
        $this->pacote = $pacote;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAssinante()
    {
        return $this->assinante;
    }

    /**
     * @param mixed $assinante
     *
     * @return self
     */
    public function setAssinante(Assinante $assinante)
    {
        $this->assinante = $assinante;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param mixed $periodo
     *
     * @return self
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }
}

?>