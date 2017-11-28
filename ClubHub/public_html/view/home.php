<?php require_once 'view/slider.php'; ?>
<?php

require_once 'controller/PacoteController.php';
$pacoteController = new PacoteController;

?>
<div class="container">
	<h3>
		Novidades<br/>
		<small>Confira abaixo os planos lançados por nossos parceiros recentementes</small>
	</h3>
	<hr/>
	<div class="row mt-3">
		<div class="card-deck">
			<div class="col-md-3">
				<a href="?page=clube&id=1">
					<div class="card bg-dark text-white">
						<img class="card-img" src="view/layout/images/thorQuadradoHome.jpg" alt="Card image cap">
						<div class="card-img-overlay text-center d-sm-block d-md-none d-lg-none">
							<h4 class="card-title">Mystery Nerd</h4>
							<h4 class="middle">R$129,90</h4>
							<p class="card-text">
								Clique para saber mais
							</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="?page=clube&id=1">
					<div class="card bg-dark text-white">
						<img class="card-img" src="view/layout/images/thorQuadradoHome.jpg" alt="Card image cap">
						<div class="card-img-overlay text-center d-sm-block d-md-none d-lg-none">
							<h4 class="card-title">Mystery Nerd</h4>
							<h4 class="middle">R$129,90</h4>
							<p class="card-text">
								Clique para saber mais
							</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="?page=clube&id=1">
					<div class="card bg-dark text-white">
						<img class="card-img" src="view/layout/images/thorQuadradoHome.jpg" alt="Card image cap">
						<div class="card-img-overlay text-center d-sm-block d-md-none d-lg-none">
							<h4 class="card-title">Mystery Nerd</h4>
							<h4 class="middle">R$129,90</h4>
							<p class="card-text">
								Clique para saber mais
							</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="?page=clube&id=1">
					<div class="card bg-dark text-white">
						<img class="card-img" src="view/layout/images/thorQuadradoHome.jpg" alt="Card image cap">
						<div class="card-img-overlay text-center d-sm-block d-md-none d-lg-none">
							<h4 class="card-title">Mystery Nerd</h4>
							<h4 class="middle">R$129,90</h4>
							<p class="card-text">
								Clique para saber mais
							</p>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>


<style type="text/css">
	.card-img-overlay{
		background: rgba(130, 130, 130, 0.80);
	}

	.card-img-overlay > .middle {
		position: absolute;
	    top: 50%;
	    left: 50%;
	    transform: translate(-50%, -50%);
	}


	.card-img-overlay > .card-text {
		position: absolute;
	    left: 50%;
	    bottom: 0;
	    transform: translate(-50%, -50%);
	}
</style>