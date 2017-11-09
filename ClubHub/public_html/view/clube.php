<?php

if (!isset($_GET['id'])) {
	#javascript pra voltar pra home e mostrar alerta de página errada
} else {
	require_once './controller/ClubeVenda.php';
	$clube = new ClubeVenda($_GET['id']);
	$cd = $clube->getClube();
}

?>

<div class="container">
	<div class="row-fluid">
		<h1 class="text-center"><?=$cd->getNome();?></h1>
		<!--

			Como é melhor fazer a criação de páginas de cada clube? Assim talvez tenha pouca personalização. 
			Precisaremos por descrição do clube.

			Depois que usuário clicar no produto -> Página de Produtos -> Precisaremos por imagens relacionadas ao pacote oferecido no momento, descrição do pacote. 

		-->
	</div>
</div>