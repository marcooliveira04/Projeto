<?php

/**
* 
*/
class Assinatura
{
	
    private $idPacote;
    private $idAssinante;

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
}

?>