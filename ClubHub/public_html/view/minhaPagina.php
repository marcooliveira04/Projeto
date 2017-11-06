<div class="container">
	<?php
	//Para assinantes apenas!
	if ($_SESSION['tipo'] == 'Assinante') {
		require_once './controller/MinhaPaginaAssinanteController.php';
		$controller = new MinhaPaginaAssinanteController;
		echo $controller->constroiNavegacao();
		echo $controller->constroiTabs();
	} else if ($_SESSION['tipo'] == 'Clube') {
		require_once './controller/MinhaPaginaClubeController.php';
		$controller = new MinhaPaginaClubeController;
	}
	?>
</div>

