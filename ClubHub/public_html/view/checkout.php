<?php

$ponto = ".";
require_once './controller/CarrinhoController.php';
$carrinhoController = new CarrinhoController;

$total = 0;
// printPre($_SESSION['carrinho']);

?>
<div class="container">
	<h1 class="display-4 text-center">Checkout</h1>
	<hr/>
	<div class="row">
		<div class="col-md-10">
			Produtos
		</div>
		<div class="col-md-1">
			Remover
		</div>
		<div class="col-md-1">
			Valor
		</div>
	</div>
	<form name="pagamento" method="POST">
		<?php
		foreach ($_SESSION['carrinho']['itens'] as $item => $clube) {
			foreach ($clube as $id => $pacote) {
				?>
				<div class="row">
					<div class="col-md-1">
						<img class="float-left img-thumbnail mr-4" alt="imagem" src="view/layout/images/<?=$pacote['imagem'];?>">
					</div>
					<div class="col-md-9">
						<p><?=$pacote['nome'];?></p>
					</div>
					<div class="col-md-1">
						<p>Lata</p>
					</div>
					<div class="col-md-1">
						<p><?=$pacote['valor'];?></p>
					</div>
				</div>
				<hr/>
				<?php

				$total = $total + $pacote['valor'];
			}
		}
		?>

		<div class="row">
			<div class="col-md-2 ml-auto">
				<p>Subtotal: <?=$total;?></p>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2 ml-auto">
				<p>Desconto?</p>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2 ml-auto">
				<h4>Total: <?=$total;?></h4>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-3 ml-auto">
				<button type="submit" class="btn btn-success btn-block">Finalizar</button>
			</div>
		</div>
	</form>	
</div>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require_once('./PagSeguroLibrary/PagSeguroLibrary.php');
	require_once './controller/PessoaController.php';
	require_once './controller/ClubeController.php';
	$ponto = ".";
	require_once './controller/PacoteController.php';

	$pessoaController = new PessoaController($_SESSION['tipo']);
	$clubeController = new ClubeController;
	$pacoteController = new PacoteController;
	$paymentRequest = new PagSeguroPaymentRequest();

	$i = 0;
	$pessoa = $pessoaController->buscaPessoaPorId($_SESSION['id']);
	$referencia = "CLB";

	foreach ($_SESSION['carrinho']['itens'] as $idClube => $pacote) {
		$i++;
		$clubeObject = $clubeController->buscaClube($idClube);
		$referencia .= $clubeObject->getId();
		foreach ($pacote as $chave => $value) {
			$pacoteObject = $pacoteController->buscaPacote($value['id']);
			$referencia .= $pacoteObject->getId();
		}

		$campos = [
			'referencia' 	=> $referencia,
			'valor'			=> $pacoteObject->getValor(),
			'nome'			=> $pessoa->getNome(),
			'email'			=> $pessoa->getEmail(),
			'cpf'			=> $pessoa->getCpf(),
			'descricao'		=> $pacoteObject->getNome()
		];
		
    	$paymentRequest->addItem($i, $clubeObject->getNome(), 1, $pacoteObject->getValor());

	    $ddd = substr($pessoa->getTelefone(), 0, 2);
	    $numero = substr($pessoa->getTelefone(), 2);

	    $paymentRequest->setSender(
	        $pessoa->getNome(),
	        $pessoa->getEmail(),
	        $ddd,
	        $numero,
	        $pessoa->getCpf()
	    );

	    $paymentRequest->setCurrency("BRL");
	    $paymentRequest->setReference($referencia);

	    $credentials = PagSeguroConfig::getAccountCredentials();
	    $onlyCheckoutCode = true;
	    $code = $paymentRequest->register($credentials, $onlyCheckoutCode);
	}
    ?>
    <script type="text/javascript">
		PagSeguroLightbox({
		    code: '<?=$code;?>'
		    }, {
		    success : function(transactionCode) {
		        alert("success - " + transactionCode);
		    },
		    abort : function() {
		        alert("abort");
		    }
		});
    </script>
    <?php
}
