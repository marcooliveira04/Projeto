<?php
    session_start();
// unset($_SESSION);

    $path = $_SERVER['DOCUMENT_ROOT']."/Projeto/ClubHub/public_html/";
    // print_r($_SESSION);
    // Não pode retirar esse iniciador de sessão senão o login não funciona. Talvez por causa de ser requisitado pelo Ajax e não incluso no código - abaixo da primeira session_start.
    require_once 'SessionController.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['action']) and $_POST['action'] == 'login') {


            $controller = new SessionController($_POST['tipo']);
            if (isset($_POST['email']) and isset($_POST['senha'])) {

                $login = $controller->login($_POST['email'], $_POST['senha']);

                echo $login;
            }  
        }

        if (isset($_POST['action']) and $_POST['action'] == 'cadastro') {

            unset($_POST['action']);
            require_once 'CadastroController.php';

            $controller = new CadastroController($_POST['tipo']);
            $_SESSION['tipo'] = $_POST['tipo'];
            unset($_POST['tipo']);

            if (isset($_POST['mesmoEndereco'])){
                unset($_POST['mesmoEndereco']);
            }
            // São removidos com o comando unset os campos que não precisam/podem ser passados para a inclusão
            $_POST['senha'] = md5($_POST['senha']);
            $cadastro = $controller->cadastro($_POST);

            if (!$cadastro) {
                session_destroy();
                echo 0;
            } else {
                $sessionController = new SessionController($_SESSION['tipo']);
                $session = $sessionController->createSession($controller->getPessoa());
                echo $session;
            }
        }

        if (isset($_POST['action']) and $_POST['action'] == 'carrinho') {
            unset($_POST['action']);
            $ponto = "..";
            require_once 'CarrinhoController.php';

            $controller = new CarrinhoController();

            $controller->defineControlador($_POST['idPacote']);

            $metodo = $_POST['metodo'];

            $controller->$metodo();

            echo $controller->criaDropdownCarrinho();
        }

        if (isset($_POST['action']) and $_POST['action'] == "pesquisar") {
            unset($_POST['action']);
            $ponto = ".";
            require_once 'MinhaPaginaClubeController.php';

            $controller = new MinhaPaginaClubeController;

            $method = "buscaResultados".$_POST['tipo'];

            echo $controller->constroiTrsResultadoVendasPacotes($controller->$method($_POST));
        }
 
    }

?>