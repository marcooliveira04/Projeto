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
			<button onclick="PagSeguroLightbox('30DD2E8C334044028EC28C6B67BC23B1')" class="btn btn-success btn-block">Finalizar</button>
		</div>
	</div>	
</div>
