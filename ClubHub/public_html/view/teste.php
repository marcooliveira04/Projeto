<?php
require_once '../controller/Assinante.controller.class.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['email']) && isset($_POST['senha'])) {
		$controller = new AssinanteController;
		print_r($controller->login($_POST['email'], $_POST['senha']));
	}
}


?>

<form action="" method="POST">
	<input type="email" name="email">
	<input type="password" name="senha">
	<button type="submit">Enviar</button>
</form>