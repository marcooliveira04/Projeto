<footer class="footer">
	<div class="d-flex flex-row">
        <div class="container mx-auto text-center text-white">
            <div class="col">
                <p class="mb-0">ClubHub - Central de Clubes de Assinatura</p>
                <p class="mb-0">Desenvolvido por Marco e Sandra.</p>
            </div>
        </div>
	</div>
</footer>

<style type="text/css">
	/* Sticky footer styles
	-------------------------------------------------- */
	html {
	  position: relative;
	  min-height: 100%;
	}
	body {
	  /* Margin bottom by footer height */
	  margin-bottom: 120px;
	}
	.footer {
	  position: absolute;
	  bottom: 0;
	  width: 100%;
	  /* Set the fixed height of the footer here */
	  height: 120px;
	  line-height: 60px; /* Vertically center the text there */
	  background-color: #343a40!important;
	}

</style>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="view/layout/js/bootstrap.min.js"></script>


<script type="text/javascript">
	$('.card').hover(function(){
		$(this).find(".card-img-overlay").fadeIn( "fast", function(){
			$(this).removeClass("d-none");
		})
	}, function(){
		$(this).find(".card-img-overlay").fadeOut( 500, function(){
			$(this).addClass("d-none");
		})
	});

    (function($) {
        "use strict";

        // manual carousel controls
        $('.next').click(function(){ $('.carousel').carousel('next');return false; });
        $('.prev').click(function(){ $('.carousel').carousel('prev');return false; });

    })(jQuery);

    $('#login').submit(function(){
        login(this);
        return false;
    });
        
    function login(form){
        var settings = {
            "async": true,
            "url": "controller/Rotas.ajax.php",
            "method": "POST",
            "headers": {
            "cache-control": "no-cache"
            },
            "mimeType": "multipart/form-data",
            "data": $(form).serialize()
        }

        $.ajax(settings).done(function (response) {
            console.log(response);
          if (response == 0) {
            $('#errorLogin').removeClass('d-none').addClass('d-block');
            $('#modalLogin').effect( "shake" );
          } else if (response == 1){
            $('#modalLogin').toggle();
            window.location.reload();
          }
        });      
    }

    $('#cadastro').submit(function(){
        form = $(this);
        $('.loading').fadeIn("slow");
        setTimeout(function(){
            cadastro(form);
        }, 1000);

        return false;
    });

    function cadastro(form){
        var settings = {
            "async": true,
            "url": "controller/Rotas.ajax.php",
            "method": "POST",
            "headers": {
            "cache-control": "no-cache"
            },
            "mimeType": "multipart/form-data",
            "data": $(form).serialize()
        }

        $.ajax(settings).done(function (response) {
            $('.loading').fadeOut("slow");
            console.log(response);
            if (response != 1) {
                alert("Ocorreu um erro ao realizar seu cadastro. Por favor, tente novamente mais tarde.");
            } else if (response == 1){
                alert("Seu cadastro foi realizado com sucesso.");
                window.location.href='?page=home';
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
                $("#rua, #cidade, #uf, #bairro").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        if ($(this).hasClass('is-invalid')) {
                            $(this).removeClass('is-invalid');
                            $(this).addClass('is-valid');
                        }
                        $("#rua").val(dados.logradouro);
                        $("#cidade").val(dados.localidade);
                        $('#bairro').val(dados.bairro)
                        $("#uf").val(dados.uf);

                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        $('#invalid-feedback-cep').text('CEP não encontrado.');
                        $(this).addClass('is-invalid');
                        $(this).parent('div').prepend(labelNotFound);
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                $('#invalid-feedback-cep').text('CEP inválido.');
                $(this).addClass('is-invalid');
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });

    function limpa_formulário_cep() {
        // Limpa valores do formulário que são relacionados ao endereço.
        $("#endereco").val("");
        $("#cidade").val("");
        $("#uf").val("");
    }

    $('input[type=radio][name=mesmoEndereco]').change(function(e){
        console.log($(this));
        if ($(this).val() == 0) {
            console.log($(this));
            console.log("É igual a 0");
            $('#enderecoEntrega').toggle("fold", true);
        } else if ($(this).val() == 1){
            console.log($(this));
            console.log("É igual a 1");
            $('#enderecoEntrega').toggle("fold", true);
        }
        e.preventDefault();
    })

    $('#assinar_continuar').click(function(){
        var form = new FormData();
        form.append("action", "carrinho");
        form.append("metodo", "adiciona");
        form.append("idPacote", ""+$(this).val()+"");

        var settings = {
          "async": true,
          "crossDomain": true,
          "url": "controller/Rotas.ajax.php",
          "method": "POST",
          "processData": false,
          "contentType": false,
          "mimeType": "multipart/form-data",
          "data": form
        }

        $.ajax(settings).done(function (response) {
            $('#navbarDropdown').find($('.dropdown-menu')).empty();
            $('#badge-carrinho').empty().text("<?=$_SESSION['carrinho']['contagemItens'];?>");
            $('#navbarDropdown').find($('.dropdown-menu').append(response));
        });
    })

    $('#navbarDropdown').on("click", "#removeItem", function(){
        var form = new FormData();
        form.append("action", "carrinho");
        form.append("metodo", "removeItem");
        form.append("idPacote", ""+$(this).val()+"");

        var settings = {
          "async": true,
          "crossDomain": true,
          "url": "controller/Rotas.ajax.php",
          "method": "POST",
          "processData": false,
          "contentType": false,
          "mimeType": "multipart/form-data",
          "data": form
        }

        $.ajax(settings).done(function (response) {
            $('#navbarDropdown').find($('.dropdown-menu')).empty();
            $('#badge-carrinho').empty().text("<?=$_SESSION['carrinho']['contagemItens'];?>");
            console.log("<?=$_SESSION['carrinho']['contagemItens'];?>");
            $('#navbarDropdown').find($('.dropdown-menu').append(response));
        });        
    })
</script>

