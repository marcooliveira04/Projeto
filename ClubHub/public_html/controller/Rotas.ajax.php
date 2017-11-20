<?php
    session_start();
// unset($_SESSION);
    if(!isset($_SESSION['carrinho']['total']) or empty($_SESSION['carrinho']['total'])){
        $_SESSION['carrinho']['total'] = '';
    } 

    if(!isset($_SESSION['carrinho']['itens']) or empty($_SESSION['carrinho']['itens'])){
        $_SESSION['carrinho']['itens'] = [];
    } 

    // print_r($_SESSION);
    // Não pode retirar esse iniciador de sessão senão o login não funciona. Talvez por causa de ser requisitado pelo Ajax e não incluso no código - abaixo da primeira session_start.
    require_once 'SessionController.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if ($_POST['action'] == 'login') {


            $controller = new SessionController($_POST['tipo']);
            if (isset($_POST['email']) and isset($_POST['senha'])) {

                $login = $controller->login($_POST['email'], $_POST['senha']);

                echo $login;
            }  
        }

        if ($_POST['action'] == 'cadastro') {

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

        if ($_POST['action'] == 'carrinho') {
            unset($_POST['action']);
            $ponto = "..";
            require_once 'CarrinhoController.php';

            $controller = new CarrinhoController();

            $controller->defineControlador($_POST['idPacote']);

            $metodo = $_POST['metodo'];

            $controller->$metodo();

            echo $controller->fazListaNavbar();
        }
 
    }

?>