<?php
require_once $path.'model/AssinanteDao.php';
require_once $path.'model/AssinaturaDao.php';
require_once $path.'controller/PacoteController.php';
require_once $path.'controller/ClubeController.php';
/**
* 
*/
class MinhaPaginaClubeController
{
	
	private $navigation;
	private $assinaturaDao;
	private $pacoteController;
	private $clubeController;
	private $transportadoras;
	private $clube;
	private $pacotes;

	function __construct(){
		$this->dao = new ClubeDao;
        $this->assinaturaDao = new AssinaturaDao;
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
					<td><button type='button' class='btn btn-link' data-toggle='modal' data-target='#alteracao".$objeto->getId()."'><i class=\"fa fa-refresh\" aria-hidden=\"true\"></i></button</td>
					<td>
                        <button type='button' id='inativar' class='btn btn-link' value='".$objeto->getId()."'>
                            <i class=\"fa fa-times-circle\" aria-hidden=\"true\"></i>
                        </button>
                        <input type='hidden' name='statusAtual' value='".$objeto->getStatus()."'>
                    </td>
				</tr>
			";
		}

		return $tr;
	}

    public function geraFormAlteracao(){
        $form = "



";
        foreach ($this->pacotes as $chave => $objeto) {
            $form .= "
            <div>
<div class='modal fade' id='alteracao".$objeto->getId()."' tabindex='-1' role='dialog' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Alteração de Produto</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <form id='alteracaoProduto".$objeto->getId()."'>
                
                    <input class='form-control' type='hidden' name='id' value='".$objeto->getId()."'>
                    <input class='form-control' type='hidden' name='idClube' value='".$objeto->getIdClube()."'>
                    <input class='form-control' type='hidden' name='descricao' value='".$objeto->getDescricao()."'>
                    <input class='form-control' type='hidden' name='detalhes' value='".$objeto->getDetalhes()."'>
                    <input class='form-control' type='hidden' name='proximoEnvio' value='".$objeto->getProximoEnvio()."'>
                    <input class='form-control' type='hidden' name='dataCadastro' value='".$objeto->getDataCadastro()."'>
                    <input class='form-control' type='hidden' name='categoria' value='".$objeto->getCategoria()."'>
                    <input class='form-control' type='hidden' name='action' value='alterar'>

               
                <div class='form-group'><label for=\"nome\">Nome</label>
                                       <input class='form-control' type='text' name='nome' value='".$objeto->getNome()."'>
                    

                </div>
                <div class='form-group'><label for=\"valor\">Valor (R$)</label>
                                       <input class='form-control' type='text' name='valor' value='".$objeto->getValor()."'>
                    

                </div>
                <div class='form-group'><label for=\"status\">Status</label>
                   <input class='form-control' type='text' name='status' value='".$objeto->getStatus()."'>

                </div>
        </form>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='button' id='salvarAlteracoes' value='".$objeto->getId()."' class='btn btn-primary'>Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>

            ";


        }   

        return $form;  
    }

    public function geraOptionsPacotes(){ 
        $options = "";

        foreach ($this->pacotes as $indice => $objeto) {
            $options.= "<option value='".$objeto->getId()."'>".$objeto->getNome()."</option>";;
        }

        return $options;
    }

    public function buscaResultadosVendasPacotes($post = null){
        if (!isset($post['pacotes']) or $post['pacotes'] == 0 or $post['pacotes'] == '') {
            $pacote = null;
        } else {
            $pacote = $post['pacotes'];
        }
        
        if (!isset($post['inicioPeriodo']) or $post['inicioPeriodo'] == 0 or $post['inicioPeriodo'] == '') {
            $inicioPeriodo = null;
        } else {
            $inicioPeriodo = $post['inicioPeriodo'];
        }

        if (!isset($post['fimPeriodo']) or $post['fimPeriodo'] == 0 or $post['fimPeriodo'] == '') {
            $fimPeriodo = null;
        } else {
            $fimPeriodo = $post['fimPeriodo'];
        }

        if (!isset($post['ordenar']) or $post['ordenar'] == 0 or $post['ordenar'] == '') {
            $ordenar = null;
        } else {
            $ordenar = $post['ordenar'];
        }

        $resultado = $this->assinaturaDao->readAssinaturasPagas($pacote, $inicioPeriodo, $fimPeriodo, $ordenar);

        if ($resultado === false) {
            return 0;
        } else {
            return $resultado;
        }

    }

    public function buscaResultadosVendasAssociados($post = null){
        if (!isset($post['pacotes']) or $post['pacotes'] == 0 or $post['pacotes'] == '') {
            $pacote = null;
        } else {
            $pacote = $post['pacotes'];
        }
        
        if (!isset($post['inicioPeriodo']) or $post['inicioPeriodo'] == 0 or $post['inicioPeriodo'] == '') {
            $inicioPeriodo = null;
        } else {
            $inicioPeriodo = $post['inicioPeriodo'];
        }

        if (!isset($post['fimPeriodo']) or $post['fimPeriodo'] == 0 or $post['fimPeriodo'] == '') {
            $fimPeriodo = null;
        } else {
            $fimPeriodo = $post['fimPeriodo'];
        }

        if (!isset($post['ordenar']) or $post['ordenar'] == 0 or $post['ordenar'] == '') {
            $ordenar = null;
        } else {
            $ordenar = $post['ordenar'];
        }

        $resultado = $this->assinaturaDao->readAssinaturasPagas($pacote, $inicioPeriodo, $fimPeriodo, $ordenar);

        if ($resultado === false) {
            return 0;
        } else {
            return $resultado;
        }        
    }

    public function constroiTrsResultadoVendasPacotes($elementos){
        if ($elementos == 0 or $elementos == '' or is_null($elementos) or count($elementos) < 1) {
            return "Não foram encontrados pacotes com os termos selecionados.";
        } else {
            $trs = "";
            foreach ($elementos as $chave => $objeto) {
                $trs .= "
                    <tr>
                        <td>".$objeto->getNomePacote()."</td>
                        <td>".$objeto->getQuantidade()."</td>
                        <td>R$".$objeto->getTotal()."</td>
                    </tr>
                ";
            }

            return $trs;
        }
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