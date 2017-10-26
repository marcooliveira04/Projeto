<?php

    // Não pode retirar esse iniciador de sessão senão o login não funciona. Talvez por causa de ser requisitado pelo Ajax e não incluso no código - abaixo da primeira session_start.
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['action'])) {
            require_once 'Assinante.controller.class.php';

            $controller = new AssinanteController;
            if ($_POST['action'] == 'login') {
                if (isset($_POST['email']) and isset($_POST['senha'])) {

                    $login = $controller->login($_POST['email'], $_POST['senha']);

                    if (!$login) {
                        echo 0;
                    } else {
                        $_SESSION['logado'] = 'S';
                        $_SESSION['nome'] = $login[0]->getNome();
                        echo 1;
                    }
                }   
            }

            if ($_POST['action'] == 'cadastro') {
                $cadastro = $controller->cadastro($_POST);

                if (!$cadastro) {
                    # code...
                }
            }
        }

    }

?>