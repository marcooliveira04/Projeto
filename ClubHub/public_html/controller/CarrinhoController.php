<?php

require_once 'PacoteController.php';
/**
* 
*/

# to-do
# O carrinho só está adicionando 1 item, badge não soma ainda (jQuery) e preciso mudar a necessidade de parametro no construct da classe pacote para poder ser passado um array ao invés de um único número. A navbar terá de ser reconstruída toda vez em que a página for atualizada. Ou seja, como eu já salvei os itens do carrinho na sessão, preciso usar ela para construir os itens do carrinho que estiverem presentes. E também, inclusive, mostrar "Não há nada aqui [smileyFace]" quando o carrinho estiver vazio.
class CarrinhoController
{
	private $pacoteController;
	private $pacote;
	private $lista;
	private $total = 0;

	function __construct(){

	}

	public function defineControlador($idPacote){
		$this->pacoteController = new PacoteController();
		$this->pacoteController->setPacote($this->pacoteController->buscaPacote($idPacote)[0]);
		$this->pacote = $this->pacoteController->getPacote();
	}

	public function adiciona(){
		$_SESSION['carrinho']
			['itens']
				[$this->pacote->getIdClube()]
					[$this->pacote->getId()]
						['id'] = $this->pacote->getId();

		$_SESSION['carrinho']['itens'][$this->pacote->getIdClube()][$this->pacote->getId()]['idClube'] = $this->pacote->getIdClube();
		$_SESSION['carrinho']['itens'][$this->pacote->getIdClube()][$this->pacote->getId()]['nome'] = $this->pacote->getNome();
		$_SESSION['carrinho']['itens'][$this->pacote->getIdClube()][$this->pacote->getId()]['categoria'] = $this->pacote->getCategoria();
		$_SESSION['carrinho']['itens'][$this->pacote->getIdClube()][$this->pacote->getId()]['valor'] = $this->pacote->getValor();
		$_SESSION['carrinho']['itens'][$this->pacote->getIdClube()][$this->pacote->getId()]['imagem'] = $this->pacote->getImagem();
		$_SESSION['carrinho']['itens'][$this->pacote->getIdClube()][$this->pacote->getId()]['descricao'] = $this->pacote->getDescricao();
		$_SESSION['carrinho']['itens'][$this->pacote->getIdClube()][$this->pacote->getId()]['detalhes'] = $this->pacote->getDetalhes();

		$_SESSION['carrinho']['total'] = (int)$this->total + (int)$this->pacote->getValor();

		return;
	}

	public function criaDropdownCarrinho(){
		if (!isset($_SESSION['carrinho']) or !isset($_SESSION['carrinho']['itens']) or count($_SESSION['carrinho']['itens']) < 1) {
			$dropdown = "

                <div class='itens'>
			        <div class='carrinho_vazio px-4 py-2'>
			            <div class='d-flex flex-row'>
			                <p>Você não possui itens adicionados ao carrinho</p>
			            </div>
			        </div>
                </div>
		    ";
		} else {
			$dropdown = "
                <div class='itens'>
        			".$this->fazListaNavbar()."
                </div>
				<div class='dropdown-divider'></div>                
                <div class='px-3 py-2'>
                	<div class='d-flex flex-row'>
                		<div class='col p-0'>
                    		<a href='?page=checkout' class='btn btn-orange btn-block'>Finalizar</a>
                    	</div>
                    </div>
                </div>
		    ";			
		}

		return $dropdown;		
	}

	public function fazListaNavbar(){
		$dividerCount = count($_SESSION['carrinho']['itens']);
		$_SESSION['carrinho']['contagemItens'] = $dividerCount;
		$listaNavbar = "";

		foreach ($_SESSION['carrinho']['itens'] as $clube => $pack) {
			foreach ($pack as $chave => $objeto) {
				$listaNavbar .= "
			        <div class='item_carrinho px-3 py-2'>
			            <div class='d-flex flex-row'>
			            	<div class='col-md-2 p-0'>
			                	<img class='img-thumbnail img-fluid' src='view/layout/images/miniatura.jpg'>
			                </div>
			                <div class='col-md-8'>
			                	<p class='mr-4'>".$objeto['nome']."<br/>R$".$objeto['valor']."</p>
			                </div>
			                <div class='col-md-2 p-0 excluir'>
			                	<button class='btn btn-danger btn-excluir btn-block' id='removeItem' onclick='removerDoCarrinho(this)' value='".$objeto['id']."'><i class='fa fa-trash fa-lg' aria-hidden='true'></i></button>
			                </div>
			            </div>
			        </div>
			    ";		
				if ($dividerCount > 1) {
					$listaNavbar .= "<div class='dropdown-divider'></div>";
					$dividerCount--;
				}
			}
		}	

		return $listaNavbar;
	}

	public function removeItem(){
		unset($_SESSION['carrinho']['itens'][$this->pacote->getIdClube()][$this->pacote->getId()]);
		if (empty($_SESSION['carrinho']['itens'][$this->pacote->getIdClube()])) {
			unset($_SESSION['carrinho']['itens'][$this->pacote->getIdClube()]);
		}

		if (empty($_SESSION['carrinho']['itens'])) {
			$_SESSION['carrinho']['contagemItens'] = 0;
		} else {
			$_SESSION['carrinho']['contagemItens'] = count($_SESSION['carrinho']['itens']);
		}

		return;
	}
}

?>