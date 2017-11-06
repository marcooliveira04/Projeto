<?php

    // Não pode retirar esse iniciador de sessão senão o login não funciona. Talvez por causa de ser requisitado pelo Ajax e não incluso no código - abaixo da primeira session_start.
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if ($_POST['action'] == 'login') {
            require_once 'SessionController.php';

            $controller = new SessionController($_POST['tipo']);
            if (isset($_POST['email']) and isset($_POST['senha'])) {

                $login = $controller->login($_POST['email'], $_POST['senha']);

                if (!$login) {
                    echo 0;
                } else {
                    $_SESSION['logado'] = 'S';
                    $_SESSION['tipoPessoa'] = $_POST['tipo'];
                    $_SESSION['nome'] = $login[0]->getNome();
                    $_SESSION['id'] = $login[0]->getId();
                    echo 1;
                }
            }  
        }

        if ($_POST['action'] == 'cadastro') {

            unset($_POST['action']);
            require_once 'CadastroController.php';

            $controller = new CadastroController($_POST['tipo']);
            $_SESSION['tipoPessoa'] = $_POST['tipo'];
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
                $_SESSION['logado'] = 'S';
                echo 1;
            }
        }
 
    }

?>