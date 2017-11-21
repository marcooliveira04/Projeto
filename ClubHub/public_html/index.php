<?php
    // Define que erros podem ser exibidos.
    ini_set('display_errors', 'On');
    ini_set('error_reporting', E_ALL);
    // Define o fuso horário para uso na aplicação web.
    ini_set('date.timezone', 'America/Sao_Paulo');
    // Inicia a sessão.
    session_start();

    #excluir no release
    function printPre($whatever){
        print("<pre>");print_r($whatever);print("<pre>");
    }

    // $url = '/Projeto/ClubHub/public_html/?';

    // switch($_SERVER['REQUEST_URI']) {
    //     case $url.'controller/cadastrar':
            
    //             $controller = new \controller\AssinanteController();
    //             $method = 'teste';
    //             echo $controller->$method();
    //         break;

    //     case $url.'cadastrar':
    //         require_once 'view/cadastro.php';
    //         break;
    // }
?>
<html lang="en">
    <?php require_once 'view/head.php'; ?>

    <body>

        <?php require_once 'view/navbar.php'; ?>
        <div class="loading" style="display: none;">Loading&#8230;</div>
        <main role="main" class="py-3">
            <?php
            //Por meio do método GET, pega o valor de "page" e sobrepõe a inclusão padrão de view/home para dar sensação de atualização dinâmica da página.
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            }

            $pages = array(
                'home',
                'cadastro',
                'minhaPagina',
                'logout',
                'clube',
                'pacote',
                'checkout'
            );

            if (!empty($page)) {
                if(in_array($page,$pages)) {
                        $page .= '.php';
                        include("view/".$page);
                }
                else {
                    include 'view/404.php';
                }
            }
            else {
                $_GET['page'] = "home";
                include 'view/home.php';
            }
            ?>
        </main> <!-- end .container -->
        <?php require_once 'view/footer.php'; ?>
    </body>
</html>