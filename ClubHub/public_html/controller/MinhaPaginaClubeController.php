<?php
require_once './model/AssinanteDao.php';
require_once './controller/AssinaturaController.php';
require_once './controller/PacoteController.php';
require_once './controller/ClubeController.php';
/**
* 
*/
class MinhaPaginaClubeController
{
	
	private $navigation;
	private $assinaturas;
	private $pacoteController;
	private $clubeController;
	private $transportadoras;
	private $clube;
	private $pacotes;

	function __construct(){
		$this->dao = new AssinanteDao;
		$this->pacoteController = new PacoteController;
		$this->clubeController = new ClubeController;
		$this->clube = $this->clubeController->buscaClube($_SESSION['id']);
		$this->pacotes = $this->pacoteController->buscaPacoteClube($this->clube->getId());
	}

	public function geraTrsPacotes(){
		$tr = "";
		foreach ($this->pacotes as $chave => $objeto) {
			$tr .= "
				<tr>
					<th scope='row'>".$objeto->getNome()."</th>
					<td>R$".$objeto->getValor()."</td>
					<td>".$objeto->getDataCadastro()."</td>
					<td>".$objeto->getStatus()."</td>
					<td><i class=\"fa fa-refresh\" aria-hidden=\"true\"></i></td>
					<td><i class=\"fa fa-times-circle\" aria-hidden=\"true\"></i></td>
				</tr>
			";
		}

		return $tr;
	}

    public function geraOptionsPacotes(){ 
        $options = "";

        foreach ($this->pacotes as $indice => $objeto) {
            $options.= "<option value='".$objeto->getId()."'>".$objeto->getNome()."</option>";;
        }

        return $options;
    }

    /**
     * @return mixed
     */
    public function getClube()
    {
        return $this->clube;
    }

    /**
     * @param mixed $clube
     *
     * @return self
     */
    public function setClube($clube)
    {
        $this->clube = $clube;

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
     * @param mixed $pacotes
     *
     * @return self
     */
    public function setPacotes($pacotes)
    {
        $this->pacotes = $pacotes;

        return $this;
    }
}

?>