<?php
    ini_set('display_errors', 'On');
    ini_set('error_reporting', E_ALL);
    ini_set('date.timezone', 'America/Sao_Paulo');
?>
<html lang="en">
    <?php require_once 'view/head.php'; ?>

    <body class="">

        <?php require_once 'view/navbar.php'; ?>
        <?php require_once 'view/slider.php'; ?>
        <main role="main" class="container">
            <?php require_once 'view/home.php'; ?>        
        </main>

        <?php require_once 'view/footer.php'; ?>
    </body>
</html>