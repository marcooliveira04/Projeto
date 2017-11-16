<?php
$ponto = "..";
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
	private $total;

	function __construct($idPacote){
		$this->pacoteController = new PacoteController($idPacote);
		$this->pacote = $this->pacoteController->getPacote();
		$this->lista = $_SESSION['carrinho']['itens'];
		$this->total = $_SESSION['carrinho']['total'];
	}

	public function adiciona(){
		$this->lista[$this->pacote->getIdClube()][$this->pacote->getId()] = $this->pacote;
		$this->total = (int)$this->total + (int)$this->pacote->getValor();

		return;
	}

	public function fazListaNavbar(){
		$dividerCount = count($this->lista);

		foreach ($this->lista as $clube => $pack) {
			foreach ($pack as $chave => $objeto) {
				$listaNavbar = "
			        <div class='item_carrinho px-4 py-2'>
			            <div class='d-flex flex-row'>
			                <img class='float-left img-thumbnail mr-4 img-item-carrinho' src='view/layout/images/miniatura.jpg'>
			                <p class='mr-4'>".$objeto->getNome()."<br/>R$".$objeto->getValor()."</p>
			                <button class='btn btn-danger btn-excluir float-right'><i class='fa fa-trash fa-lg' aria-hidden='true'></i></button>
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
}

?>