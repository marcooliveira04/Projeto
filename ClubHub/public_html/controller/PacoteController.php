<?php
require_once $ponto.'/model/PacoteDao.php';
/**
* 
*/
class PacoteController
{
	private $pacote;
	private $daoPacote;

	function __construct(){
		$this->daoPacote = new PacoteDao;
	}

	public function buscaPacote($idPacote){
		$where = [
			[
				'coluna'	=> 'id',
				'valor'		=> $idPacote,
				'operador'	=> ''
			]
		];

		return $this->daoPacote->read('Pacote', $where, null)[0];
	}

    /**
     * @return mixed
     */
    public function getPacote(){
        return $this->pacote;
    }

    /**
     * @param mixed $pacote
     *
     * @return self
     */
    public function setPacote($pacote){
        $this->pacote = $pacote;

        return $this;
    }
}

?>