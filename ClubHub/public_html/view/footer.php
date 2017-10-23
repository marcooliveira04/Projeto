<footer class="footer">
	<div class="d-flex flex-row">
		<div class="col-md-3">
			<a href="">
				<p class="mb-0">Perguntas Frequentes</p>
			</a>
			<a href="">
				<p class="mb-0">Políticas de Privacidade</p>
			</a>
		</div>
		<div class="col text-right">
			<a href="">
				<p class="mb-0">Perguntas Frequentes</p>
			</a>
			<a href="">
				<p class="mb-0">Políticas de Privacidade</p>
			</a>
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
	  background-color: #f5f5f5;
	}

</style>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
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
</script>