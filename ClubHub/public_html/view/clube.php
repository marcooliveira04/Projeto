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
	<div class="container text-white">
		<h1 class="display-3"><?=$cd->getNome();?></h1>
		<p class="lead">Clube de assinaturas do gênero nerd</p>
	</div>
</div>
<div class="container">
	<div class="row-fluid">
		<h1 class="display-3">Pacotes disponíveis</h1>
		<p>
			O melhor dos artigos <em>geek</em> você só encontra aqui!
		</p>
		<hr class="mb-5" />
	</div>

		<div class="row-fluid bg-dark">
			<div class="col p-0 img-100-porcento">
				<img class="img-fluid" src="view/layout/images/<?=$cd->getPacotes()[0]->getImagem();?>">
			</div>
			<div class="col p-2 text-white">
				<h1 class="display-4 text-center"><?=$cd->getPacotes()[0]->getNome();?></h1>
				<p class="p-5">
					O Clube Nerd todo mês traz novidades dos seus super heróis favoritos, das séries que parecem sair do mundo invertido e dos cartoons aventureiros (Finn pode confirmar isso). O tema deste mês é Thor Ragnarok. Clique em "Assine já" para comprar e visualizar maiores detalhes.
				</p>
				<div class="container-fluid">
					<div class="row">
						<div class="col">
							<h4 class="text-center">Mensal</h4>
							<hr class="white" />
							<h1 class="display-4 text-center">
								R$<?=$cd->getPacotes()[0]->getValor();?>
								<p class="lead">
									Frete incluso!
								</p>
							</h1>
							<a class="btn btn-info btn-lg btn-block rounded-0" href="?page=pacote&id=<?=$cd->getPacotes()[0]->getId();?>">Assine já</a>
						</div>
						<div class="col">
			
							<h4 class="text-center">Trimestral</h4>
							<hr class="white" />
							<h1 class="display-4 text-center">
								R$75.00
								<p class="lead">
									Frete incluso!
								</p>
							</h1>
							<a class="btn btn-info btn-lg btn-block rounded-0" href="?page=pacote&id=<?=$cd->getPacotes()[0]->getId();?>">Assine já</a>
						</div>
						<div class="col">
			
							<h4 class="text-center">Anual</h4>
							<hr class="white" />
							<h1 class="display-4 text-center">
								R$60,00
								<p class="lead">
									Frete incluso!
								</p>
							</h1>
							<a class="btn btn-info btn-lg btn-block rounded-0" href="?page=pacote&id=<?=$cd->getPacotes()[0]->getId();?>">Assine já</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--
			Adicionar no banco de dados, na parte de produtos um campo de ativo/inativo. Para ficar mais fácil a manutenção de produtos. Talvez colocar um marcador de produto esgotado? Dependeria da parte de administrativa.
			Como é melhor fazer a criação de páginas de cada clube? Assim talvez tenha pouca personalização. 
			Precisaremos por descrição do clube.

			Depois que usuário clicar no produto -> Página de Produtos -> Precisaremos por imagens relacionadas ao pacote oferecido no momento, descrição do pacote. 

		-->

</div>

<style type="text/css">
	.jumbotron{
		background: url('https://wallpapers.wallhaven.cc/wallpapers/full/wallhaven-353119.jpg') no-repeat center; 
    -webkit-background-size: 100% 100%;
    -moz-background-size: 100% 100%;
    -o-background-size: 100% 100%;
    background-size: 100% 100%;
    min-height: 540px;
	}

	.img-100-porcento{
		max-height: 270px;
		overflow: hidden;
	}

	.white{
		border-top: 1px solid white;
	}
</style>