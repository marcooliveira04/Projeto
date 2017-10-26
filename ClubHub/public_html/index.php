<?php
    ini_set('display_errors', 'On');
    ini_set('error_reporting', E_ALL);
    ini_set('date.timezone', 'America/Sao_Paulo');


?>
<html lang="en">
    <?php require_once 'view/head.php'; ?>

    <body>

        <?php require_once 'view/navbar.php'; ?>

        <main role="main" class="py-3">
            <?php
            //Por meio do método GET, pega o valor de "page" e sobrepõe a inclusão padrão de view/home para dar sensação de atualização dinâmica da página.
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            }

            $pages = array(
                'home',
                'cadastro'
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
        <script type="text/javascript">
    (function($) {
    "use strict";

    // manual carousel controls
    $('.next').click(function(){ $('.carousel').carousel('next');return false; });
    $('.prev').click(function(){ $('.carousel').carousel('prev');return false; });
    
})(jQuery);
</script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

    $('#login').submit(function(){
        ajaxSubmete(this);
        return false;
    });
        
    

    function ajaxSubmete(form){
        var email = $(form).find('#email').val();
        var senha = $(form).find('#senha').val();

        var data = {
            "email" : email,
            "senha" : senha
        };

        console.log(data);

        var settings = {
            "async": true,
            "url": "controller/Rotas.ajax.php",
            "method": "POST",
            "headers": {
            "cache-control": "no-cache"
            },
            "mimeType": "multipart/form-data",
            "data": data
        }

        $.ajax(settings).done(function (response) {
          if (response == 0) {
            $('#errorLogin').removeClass('d-none').addClass('d-block');
            $('#modalLogin').effect( "shake" );
          }
        });      
    }

    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#logradouro, #cidade, #uf, #bairro").val("...");


                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        var labelCepSuccess = "<label class='pull-right text-success' id='ceperro' for='cep'><span class='glyphicon glyphicon-ok-circle'></span></label>";
                        $("#ceperro").remove();
                        $("#logradouro").val(dados.logradouro);
                        $("#cidade").val(dados.localidade);
                        $('#bairro').val(dados.bairro)
                        $("#uf").val(dados.uf);
                        $("#cep").parent('div').prepend(labelCepSuccess);

                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        var labelNotFound = "<label class='pull-right text-danger' id='ceperro'>CEP não encontrado <span class='glyphicon glyphicon-remove-circle'></span></label>";
                        $("#ceperro").remove();
                        $("#cep").parent('div').prepend(labelNotFound);
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                var labelCepInvalido = "<label class='pull-right text-danger' id='ceperro'>Formato de CEP inválido <span class='glyphicon glyphicon-remove-circle'></span></label>";
                $("#ceperro").remove();
                $("#cep").parent('div').parent('div').prepend(labelCepInvalido);
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });

    function limpa_formulário_cep() {
        $("#ceperro").remove();
        // Limpa valores do formulário de cep.
        $("#endereco").val("");

        $("#cidade").val("");
        $("#uf").val("");
    }

    $('input[type=radio][name=mesmoEndereco]').change(function(e){
        console.log($(this));
        if ($(this).val() == 0) {
            console.log($(this));
            console.log("É igual a 0");
            $('#enderecoEntrega').toggle( "fold" );
        } else if ($(this).val() == 1){
            console.log($(this));
            console.log("É igual a 1");

                $('#enderecoEntrega').toggle( "fold" );
    
        }
        e.preventDefault();
    })
</script>
    </body>
</html>