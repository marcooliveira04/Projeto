<?php
session_start();
   $path = $_SERVER['DOCUMENT_ROOT']."/Projeto/ClubHub/public_html/";
            require_once '../controller/GeraPDF.php';
	        if (isset($_POST['action']) and $_POST['action'] == "pesquisar") {
	            unset($_POST['action']);
	            $ponto = ".";
	            require_once '../controller/MinhaPaginaClubeController.php';

	            $controller = new MinhaPaginaClubeController;

	            $method = "buscaResultados".$_POST['tipo'];

	            $html = $controller->constroiTrsResultadoVendasPacotes($controller->$method($_POST));
	        }



$html = <<<EOD
<table><thead><th>Pacotes</th><th>Quantidade</th><th>Valor Total</th></thead><tbody>
$html
</tbody></table>
EOD;
            $controller = new GeraPDF();

            $controller->criaPdf($html);


?>