<?php

$ponto = ".";
require_once './controller/CarrinhoController.php';
$carrinhoController = new CarrinhoController;

$navbar = $carrinhoController->criaDropdownCarrinho();

if (!isset($_SESSION['carrinho']['contagemItens']) or $_SESSION['carrinho']['contagemItens'] == 0) {
    $_SESSION['carrinho']['contagemItens'] = 0;
    $countBadge = '';
} else {
    $countBadge = $_SESSION['carrinho']['contagemItens'];
}


?>
<script type="text/javascript"
src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js">
</script>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="?page=home"><img src="http://www.theimplanthub.com/wp-content/themes/implanthub/images/icons/icon-hub.png" width="30" height="30"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHome" aria-controls="navbarHome" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarHome">
            <!-- 
                Carrinho de Compras
                toDo: pegar link que salvei nos favoritos e fazer o dropdown. Como? Não faço ideia.
            -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown" id="navbarDropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Carrinho <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                      <span class="badge badge-light" id="badge-carrinho"><?=$countBadge?></span>
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <?=$navbar;?>
                    </div>
                </li>
                <?php if (!isset($_SESSION['logado']) or $_SESSION['logado'] == 'N'): ?>
                    <li class="nav-item">
                        <!-- Button trigger modal -->
                        <a class="nav-link ml-md-3 py-2" data-toggle="modal" data-target="#modalLogin" href="">
                            Login
                        </a>  
                    </li>
          
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=minhaPagina">Minha página</a>                
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>                
                    </li>
                <?php endif ?>
            </ul>


        </div>
    </div>
</nav>



<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog  modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="" method="POST" name="login" id="login">
                <input type="hidden" name="action" value="login">
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                    <a href="">
                        <p class="text-muted text-right"><small>Esqueceu sua senha?</small></p>
                    </a>
                </div>
                <div class="form-group">
                    <select class="form-control" name="tipo" id="tipo">
                        <option selected="" value="Assinante">Assinante</option>
                        <option value="Clube">Clube</option>
                    </select>
                </div>
                <button type="submit" name="action" value="login" class="btn btn-block btn-primary">Entrar</button>
            </form>
            <div class='alert alert-danger fade show mt-3 d-none' id="errorLogin">
                <i class='fa fa-times-circle mr-2' aria-hidden='true'></i> Usuário ou senha inválidos
            </div>
            <hr/>
            <a href="?page=cadastro">
                <p class="text-muted text-center">Registro</p>
            </a>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .dropdown-menu{
        width: 300;
    }

    .img-item-carrinho, .btn-excluir{
        max-height: 50px; max-width: 50px;
    }
</style>