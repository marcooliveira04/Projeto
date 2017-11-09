<?php

if (!isset($_GET['id'])) {
	#javascript pra voltar pra home e mostrar alerta de página errada
} else {
	require_once './controller/ClubeVenda.php';
	$clube = new ClubeVenda($_GET['id']);
	$cd = $clube->getClube();
}

?>
<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-3"><?=$cd->getNome();?></h1>
		<p class="lead">Descrição do Clube - Background deve ser incluso com a imagem do clube ou coisa do tipo</p>
	</div>
</div>
<div class="row-fluid">
	<p>Lorem ipsum nulla dolor dolor labore cillum reprehenderit veniam nostrud dolor est ea anim voluptate ea dolor officia ut enim proident consectetur ut ut sit qui exercitation culpa irure nulla mollit proident sunt esse enim aute elit pariatur nostrud.</p>
</div>
<div class="container-fluid bg-dark ">
	<div class="row">
		<div class="col p-0 ">
			<img class="img-fluid" src="view/layout/images/<?=$cd->getPacotes()[0]->getImagem();?>">
		</div>
		<div class="col-md-4 p-0 text-white">
			<h1 class="display-4 text-center"><?=$cd->getPacotes()[0]->getNome();?></h1>
			<p class="p-5">
				Descrição do item? Conteúdo e etc? Aliqua proident dolore amet proident deserunt voluptate aute non dolore duis voluptate ut ut minim veniam aliquip ex dolore est dolor enim pariatur sint ut cupidatat dolor sed.
			</p>
			<p>
				<h1 class="display-4 text-center">
					R$<?=$cd->getPacotes()[0]->getValor();?>
					<p class="lead">
						Frete incluso!
					</p>
				</h1>
			<a class="btn btn-info btn-lg btn-block rounded-0" href="?page=pacote&id=<?=$cd->getPacotes()[0]->getId();?>">Assine já</a>
			</p>
		</div>
	</div>
	<!--
		Adicionar no banco de dados, na parte de produtos um campo de ativo/inativo. Para ficar mais fácil a manutenção de produtos. Talvez colocar um marcador de produto esgotado? Dependeria da parte de administrativa.
		Como é melhor fazer a criação de páginas de cada clube? Assim talvez tenha pouca personalização. 
		Precisaremos por descrição do clube.

		Depois que usuário clicar no produto -> Página de Produtos -> Precisaremos por imagens relacionadas ao pacote oferecido no momento, descrição do pacote. 

	-->
</div>
