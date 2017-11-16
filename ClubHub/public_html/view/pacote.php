<?php

require_once './controller/PacoteController.php';

$controller = new PacoteController($_GET['id']);
$pacote = $controller->getPacote();

?>

<div class="container">
	<h1 class="display-3 text-center"><?=$pacote->getNome();?></h1>
	<hr/>
	<div class="row">
		<div class="col-md-7">
			<img class="img-thumbnail" src="view/layout/images/<?=$pacote->getImagem();?>">
		</div>
		<div class="col-md">
			<p class="p-2">
				<?=$pacote->getDescricao();?>
			</p>
			<h1 class="display-4 text-center">R$<?=$pacote->getValor();?><small>/mês</small></h1>
			<div class="btn-group special">
				<button class="btn btn-primary" id="assinar_continuar" value="<?=$pacote->getId();?>" type="button">Assinar e continuar comprando</button>
				<button class="btn btn-info"  type="button">Assinar e finalizar</button>
			</div>
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col">
			<h1 class="text-center">Detalhes do Pacote</h1>
		</div>
	</div>
</div>

<style type="text/css">
.btn-group.special {
  display: flex;
}

.special .btn {
  flex: 1
}

hr{
	margin-top: 2em;
	margin-bottom: 2em;
}
</style>

