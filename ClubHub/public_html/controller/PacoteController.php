<?php
require_once $path.'model/PacoteDao.php';
require_once $path.'model/Pacote.php';
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
                'coluna'    => 'id',
                'valor'     => $idPacote,
                'operador'  => ''
            ]
        ];

        return $this->daoPacote->read('Pacote', $where, null);
    }

	public function buscaPacoteClube($idClube){
		$where = [
			[
				'coluna'	=> 'idClube',
				'valor'		=> $idClube,
				'operador'	=> ''
			]
		];

		return $this->daoPacote->read('Pacote', $where, null);
	}

    public function alterar($post){
        $this->pacote = $this->daoPacote->setter($post, new Pacote);
        $update = $this->daoPacote->update($this->pacote);
        if (!$update) {
            return false;
        } else {
            return true;
        }   
    }

    public function ativarInativar($post){
        return $this->daoPacote->inativaPacote($post['status'], $post['id']);
    }

    public function cadastrar($post){
        $this->pacote = $this->daoPacote->setter($post, new Pacote);

        return $this->daoPacote->create($this->pacote);
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

    public function constroiCards(){
    	$this->pacote = $this->daoPacote->read('Pacote', null, null);

    	foreach ($this->pacote as $chave => $pacote) {
    		$html = "
				<div class='col row mb-3'>
					<div class='card-deck'>";

					
    	}
    }
}

?>