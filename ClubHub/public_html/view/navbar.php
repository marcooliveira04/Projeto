<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Ícone</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHome" aria-controls="navbarHome" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarHome">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Missão <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <!-- 
            Carrinho de Compras
            toDo: pegar link que salvei nos favoritos e fazer o dropdown. Como? Não faço ideia.
        -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="" class="nav-link p-2">
                    <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
                </a>                
            </li>
        </ul>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-light ml-md-3" data-toggle="modal" data-target="#modalLogin">
            Login
        </button>
    </div>
</nav>



<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <h5>Seja bem vindo!</h5>
            <p>Se você já tem um cadastro conosco, preencha os campos abaixo para logar. Caso não, <a href="?page=cadastro">clique aqui</a></p>
            <hr>
            <form>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                </div>
                <button type="submit" class="btn btn-block btn-primary">Logar</button>
                <a href="">
                    <p class="text-muted">Esqueceu sua senha?</p>
                </a>
            </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>