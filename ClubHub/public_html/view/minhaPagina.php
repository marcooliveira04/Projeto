<div class="container">
	<?php
	//Para assinantes apenas!
	if ($_SESSION['tipo'] == 'Assinante') {
		require_once './controller/MinhaPaginaAssinanteController.php';
		$controller = new MinhaPaginaAssinanteController;
		echo $controller->constroiNavegacao();
		echo $controller->constroiTabs();
	} else if ($_SESSION['tipo'] == 'Clube') {
		require_once './controller/MinhaPaginaClubeController.php';
		require_once './controller/CategoriaController.php';
		require_once './model/Estados.php';
		$modeloEstados = new Estados;
		$controller = new MinhaPaginaClubeController;
		$categoria = new CategoriaController;
		$clube = $controller->getClube();

		?>
		<ul class='nav nav-pills justify-content-center nav-fill'>
			<li class='nav-item'>
				<a class='nav-link active' id='perfil-pill' data-toggle='pill' href='#perfil'>Perfil</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' id='minhasAssinaturas-pill' data-toggle='pill' href='#minhasAssinaturas'>Meus Pacotes</a>
			</li>
			<li class='nav-item'>
				<a class='nav-link' id='minhasAssinaturas-pill' data-toggle='pill' href='#relatorio'>Relatórios</a>
			</li>
		</ul>
		<hr/>
		<div class='tab-content' id='nav-tabContent'>
		  	<div class='tab-pane fade show active' id='perfil' role='tabpanel'>
				<form name="cadastro" id="cadastro" method="POST">
					<input type="hidden" name="action" value="atualizar">
					<input type="hidden" name="tipo" value="Clube">
					<h5>Dados</h5>
					<hr/>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="email">E-mail *</label>
							<input class="form-control" type="email" name="email" id="email" placeholder="E-mail" required="" value="<?=$clube->getEmail();?>">
						</div>
						<div class="form-group col-md-6">
							<label for="Senha">Senha *</label>
							<input class="form-control" type="password" name="senha" id="senha" placeholder="Senha" required="">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="nome">Nome Fantasia *</label>
							<input class="form-control" type="text" name="nome" id="nome" placeholder="Nome Fantasia" required="" value="<?=$clube->getNome();?>">
						</div>
						<div class="form-group col-md-3">
							<label for="razaoSocial">Razão Social *</label>
							<input class="form-control" type="text" name="razaoSocial" id="razaoSocial" placeholder="Razão Social" required="" value="<?=$clube->getRazaoSocial();?>">
						</div>
						<div class="form-group col-md-3">
							<label for="cnpj">CNPJ *</label>
							<input class="form-control" type="text" name="cnpj" id="cnpj" placeholder="CNPJ" required="" value="<?=$clube->getCnpj();?>">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-3">
							<label for="telefone">Telefone *</label>
							<input class="form-control" type="text" name="telefone" id="telefone" placeholder="Telefone" value="<?=$clube->getTelefone();?>">
						</div>
						<div class="form-group col-md-3">
							<label for="celular">Celular</label>
							<input class="form-control" type="text" name="celular" id="celular" placeholder="Celular" value="<?=$clube->getCelular();?>">
						</div>
						<div class="form-group col">
							<label for="categoria">Categoria</label>
							<select class="form-control" name="categoria" id="categoria" required="">
								<option disabled="" selected="" value="0">Categoria</option>
								<?php foreach ($categoria->geraSelect($clube->getCategoria()) as $chave => $option): ?>
									<?=$option;?>
								<?php endforeach ?>
								<option value="99">Outra</option>
							</select>
						</div>
					</div>
					<h5>Endereço </h5>
					<hr/>
					<div class="row">
						<div class="form-group col-md-2">
							<label for="cep">CEP *</label>
							<input class="form-control" type="text" name="cep" id="cep" placeholder="CEP" value="<?=$clube->getCep();?>">
							<div class="invalid-feedback" id="invalid-feedback-cep"></div>
						</div>
						<div class="form-group col-md-6">
							<label for="rua">Logradouro *</label>
							<input class="form-control" type="text" name="rua" id="rua" placeholder="Logradouro" value="<?=$clube->getRua();?>">
						</div>
						<div class="form-group col-md-2">
							<label for="numero">Número *</label>
							<input class="form-control" type="text" name="numero" id="numero" placeholder="Número" value="<?=$clube->getNumero();?>">
						</div>
						<div class="form-group col-md-2">
							<label for="complemento">Complemento</label>
							<input class="form-control" type="text" name="complemento" id="complemento" placeholder="Complemento" value="<?=$clube->getComplemento();?>">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-3">
							<label for="bairro">Bairro *</label>
							<input class="form-control" type="text" name="bairro" id="bairro" placeholder="Bairro" value="<?=$clube->getBairro();?>">
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="uf">UF *</label>
				                <select class="form-control" name="uf" id="uf">
				                  <option disabled="" selected="" value="0">Estado</option>
				                  <?=$modeloEstados->geraOptions($clube->getUf());?>
				                </select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="cidade">Cidade *</label>
								<input class="form-control" type="text" name="cidade" id="cidade" placeholder="Cidade" value="<?=$clube->getCidade();?>">
							</div>
						</div>
					</div>
					<hr/>
					<h5>Dados Bancários</h5>
					<hr/>
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label for="banco">Banco *</label>
								<input class="form-control" type="text" name="banco" id="banco" required="" value="<?=$clube->getBanco();?>">
							</div>
						</div>
						<div class="form-group col-md-2">
							<label for="agencia">Agência</label>
							<input class="form-control" type="text" name="agencia" id="agencia" placeholder="Agência" value="<?=$clube->getAgencia();?>">
						</div>
						<div class="form-group col-md-3">
							<label for="conta">Conta Corrente *</label>
							<input class="form-control" type="text" name="conta" id="conta" placeholder="Conta Corrente" value="<?=$clube->getConta();?>">
						</div>
					</div>
					<div class="row">
						<button type="submit" class="btn btn-success mx-auto">Atualizar</button>
					</div>
				</form>
		  	</div>
		 	<div class='tab-pane fade' id='minhasAssinaturas' role='tabpanel'>
		  		<h5 class='mb-5'>Meus Pacotes</h5>
			  	<div class='table-responsive-sm'>
					<table class='table table-striped table-hover'>
						<thead class='thead-light'>
							<tr>
								<th scope='col'>Nome</th>
								<th scope='col'>Preço</th>
								<th scope='col'>Data de Cadastro</th>
								<th scope='col'>Status</th>
								<th scope='col'>Alterar</th>
								<th scope='col'>Inativar</th>
							</tr>
						</thead>
						<tbody>
							<?=$controller->geraTrsPacotes();?>
						</tbody>
					</table>
				</div>
		  	</div>
		  	<div class='tab-pane fade' id='relatorio' role='tabpanel'>
			  	<div class="row">
				  	<div class="col-md-2">
						<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#vendas">
							Vendas
						</button>
						<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#assinantes">
							Associados
						</button>
					</div>
					<div class="col">
						<div class="collapse show" id="vendas">
							<ul class="nav nav-tabs card-header-tabs">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home">Vendas por Pacotes</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile">Vendas por Associado</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
									<h4 class="card-title">Filtros</h4>
									<hr/>
									<form id="vendasPacotes" method="POST" name="vendasPacotes">
										<input type="hidden" name="action" value="pesquisar">
										<input type="hidden" name="tipo" value="VendasPacotes">
										<div class="row">
											<div class="col-md-2">
												<div class="form-group">
													<label for="pacotes">Pacotes</label>
													<select class="form-control" name="pacotes" id="pacotes">
														<option selected="" disabled="">Pacotes</option>
														<?=$controller->geraOptionsPacotes();?>
													</select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<span class="float-left">
														<label for="inicioPeriodo">
															Período (Ínicio)
														</label>
													</span>
													<span class="float-right py-1">
														<a href="#" class="text-dark" data-toggle="tooltip" title="Define a data inicial para pesquisa de vendas"><i class="fa fa-question-circle" aria-hidden="true"></i></a>			
													</span>
													<input type="date" class="form-control" name="inicioPeriodo">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<span class="float-left">
														<label for="fimPeriodo">
															Período (Final)
														</label>
													</span>
													<span class="float-right py-1">
														<a href="#" class="text-dark" data-toggle="tooltip" title="Define a data final para pesquisa de vendas"><i class="fa fa-question-circle" aria-hidden="true"></i></a>			
													</span>
													<input type="date" class="form-control" name="fimPeriodo">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label for="ordenar">Ordenar</label>
													<select class="form-control" name="ordenar" id="ordenar">
														<option selected="" value="0" disabled="">Ordenar</option>
														<option value="1">Pacote</option>
														<option value="2">Mais vendidos</option>
														<option value="3">Maior valor</option>
														<option value="4">Menor valor</option>
														<option value="5">Menos vendido</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col mx-auto">
												<div class="form-group">
													<button type="submit" class="btn btn-success">Pesquisa</button>
												</div>
											</div>
										</div>
									</form>
									<hr/>
									<div class="wrapper">
										<div class="row-fluid termos">
											<p>Exibindo resultados referentes aos ultimos 30 dias.</p>
										</div>
										<div class="row-fluid tabela">
											<div class="table-responsive-sm">
												<table class="table table-striped table-hover">
													<thead>
														<th>Pacotes</th>
														<th>Quantidade</th>
														<th>Valor Total</th>
													</thead>
													<tbody class="resultadosVendasPacotes">
														<?=$controller->constroiTrsResultadoVendasPacotes($controller->buscaResultadosVendasPacotes());?>
													</tbody>
												</table>
											</div>
										</div>
									</div>		
								</div>
								<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
									<h4 class="card-title">Filtros</h4>
									<hr/>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="pesquisa">Pesquisar por nome</label>
												<input type="text" class="form-control" name="nome" placeholder="Digite o nome para pesquisar">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label for="pacotes">
													Pacotes 
												</label>
												<select class="form-control" name="pacotes" id="pacotes">
													<option disabled="">Pacotes</option>
													<?=$controller->geraOptionsPacotes();?>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<span class="float-left">
													<label for="inicioPeriodo">
														Período (Ínicio)
													</label>
												</span>
												<span class="float-right py-1">
													<a href="#" class="text-dark" data-toggle="tooltip" title="Define a data inicial para pesquisa de vendas"><i class="fa fa-question-circle" aria-hidden="true"></i></a>			
												</span>
												<input type="date" class="form-control" name="inicioPeriodo">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<span class="float-left">
													<label for="fimPeriodo">
														Período (Final)
													</label>
												</span>
												<span class="float-right py-1">
													<a href="#" class="text-dark" data-toggle="tooltip" title="Define a data final para pesquisa de vendas"><i class="fa fa-question-circle" aria-hidden="true"></i></a>			
												</span>
												<input type="date" class="form-control" name="fimPeriodo">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="estado">UF</label>
												<select class="form-control" name="estado" id="estado">
													<option selected="">UF</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="ordenar">Ordenar</label>
												<select class="form-control" name="ordenar" id="ordenar">
													<option selected="">Ordenar</option>

												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col mx-auto">
											<div class="form-group">
												<button class="btn btn-success">Pesquisa</button>
											</div>
										</div>
									</div>
										<p class="card-text">Últimos 30 dias</p>
									<div class="table-responsive-sm">
										<table class="table table-striped table-hover">
											<thead>
												<th>ID</th>
												<th>Nome</th>
												<th>UF</th>
												<th>Última Compra</th>
												<th>Data</th>
												<th>Valor</th>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Marco Junior</td>
													<td>SP</td>
													<td>Thor Ragnarok</td>
													<td>01/01/2017</td>
													<td>R$89,99</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="collapse" id="assinantes">
							<h4 class="card-title">Filtros</h4>
							<hr/>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="pesquisa">Pesquisar por nome</label>
										<input type="text" class="form-control" name="nome" placeholder="Digite o nome para pesquisar">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="pacotes">Estado</label>
										<select class="form-control" name="pacotes" id="pacotes">
											<option selected="">Estado</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="inicioPeriodo">Status</label>
										<input type="date" class="form-control" name="inicioPeriodo">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="fimPeriodo">Status Pagamentos</label>
										<input type="date" class="form-control" name="fimPeriodo">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="ordenar">Ordenar</label>
										<select class="form-control" name="ordenar" id="ordenar">
											<option selected="">Ordenar</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col mx-auto">
									<div class="form-group">
										<button class="btn btn-success">Pesquisa</button>
									</div>
								</div>
							</div>
								<p class="card-text">Últimos 30 dias</p>
							<div class="table-responsive-sm">
								<table class="table table-striped table-hover">
									<thead>
										<th>ID </th>
										<th>Nome</th>
										<th>Telefone</th>
										<th>E-mail</th>
										<th>UF</th>
										<th>Data de Cadastro</th>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Marco Antonio de Oliveira Junior</td>
											<td>(14)0000-0000</td>
											<td>teste@teste.com.br</td>
											<td>SP</td>
											<td>21/02/2017</td>
										</tr>
									</tbody>
								</table>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
	}
	?>
</div>

