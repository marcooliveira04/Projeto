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
                <li class="nav-item">
                    <a href="" class="nav-link p-2">
                        <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
                    </a>                
                </li>
            </ul>

            <?php if (!isset($_SESSION['logado']) or $_SESSION['logado'] == 'N'): ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-light ml-md-3" data-toggle="modal" data-target="#modalLogin">
                    Login
                </button>            
            <?php else: ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="?page=minhaPagina">Minha página</a>                
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>                
                    </li>
                </ul>
            <?php endif ?>
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

