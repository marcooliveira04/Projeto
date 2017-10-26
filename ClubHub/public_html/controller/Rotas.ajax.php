<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['email']) and isset($_POST['senha'])) {
            require_once 'Assinante.controller.class.php';

            $controller = new AssinanteController;

            $login = $controller->login($_POST['email'], $_POST['senha']);
            
            if (!$login) {
            	echo 0;
            } else {
            	echo 1;
            }
        }
    }

?>