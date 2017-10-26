<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['action'])) {
            require_once 'Assinante.controller.class.php';

            $controller = new AssinanteController;

            if ($_POST['action'] == 'cadastro') {
                $cadastro = $controller->cadastro($_POST);

                if (!$cadastro) {
                	print_r("ERROR! ERROR! ERROR! ERROR!");
                } else {
                	print_r($cadastro);
                }
            }
        }

    }

?>