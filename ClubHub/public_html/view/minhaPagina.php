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
		$controller = new MinhaPaginaClubeController;

		?>
			<ul class='nav nav-pills justify-content-center nav-fill'>
				<li class='nav-item'>
					<a class='nav-link active' id='perfil-pill' data-toggle='pill' href='#perfil'>Perfil</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' id='minhasAssinaturas-pill' data-toggle='pill' href='#minhasAssinaturas'>Meus Planos</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' id='minhasAssinaturas-pill' data-toggle='pill' href='#relatorio'>Relatórios</a>
				</li>
			</ul>
			<hr/>
		<div class='tab-content' id='nav-tabContent'>
		  <div class='tab-pane fade show active' id='perfil' role='tabpanel'>
			<form name="cadastro" id="cadastro" method="POST">
				<input type="hidden" name="action" value="cadastro">
				<input type="hidden" name="tipo" value="Clube">
				<h5>Dados</h5>
				<hr/>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="email">E-mail *</label>
						<input class="form-control" type="email" name="email" id="email" placeholder="E-mail" required="">
					</div>
					<div class="form-group col-md-6">
						<label for="Senha">Senha *</label>
						<input class="form-control" type="password" name="senha" id="senha" placeholder="Senha" required="">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="nome">Nome Fantasia *</label>
						<input class="form-control" type="text" name="nome" id="nome" placeholder="Nome Fantasia" required="">
					</div>
					<div class="form-group col-md-3">
						<label for="razaoSocial">Razão Social *</label>
						<input class="form-control" type="text" name="razaoSocial" id="razaoSocial" placeholder="Razão Social" required="">
					</div>
					<div class="form-group col-md-3">
						<label for="cnpj">CNPJ *</label>
						<input class="form-control" type="text" name="cnpj" id="cnpj" placeholder="CNPJ" required="">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-3">
						<label for="telefone">Telefone *</label>
						<input class="form-control" type="text" name="telefone" id="telefone" placeholder="Telefone">
					</div>
					<div class="form-group col-md-3">
						<label for="celular">Celular</label>
						<input class="form-control" type="text" name="celular" id="celular" placeholder="Celular">
					</div>
					<div class="form-group col">
						<label for="categoria">Categoria</label>
						<select class="form-control" name="categoria" id="categoria" required="">
							<option disabled="" selected="" value="0">Categoria</option>
							<?php foreach ($categorias as $indice => $option): ?>
								<?php echo $option; ?>
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
						<input class="form-control" type="text" name="cep" id="cep" placeholder="CEP">
						<div class="invalid-feedback" id="invalid-feedback-cep"></div>
					</div>
					<div class="form-group col-md-6">
						<label for="rua">Logradouro *</label>
						<input class="form-control" type="text" name="rua" id="rua" placeholder="Logradouro">
					</div>
					<div class="form-group col-md-2">
						<label for="numero">Número *</label>
						<input class="form-control" type="text" name="numero" id="numero" placeholder="Número">
					</div>
					<div class="form-group col-md-2">
						<label for="complemento">Complemento</label>
						<input class="form-control" type="text" name="complemento" id="complemento" placeholder="Complemento">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-3">
						<label for="bairro">Bairro *</label>
						<input class="form-control" type="text" name="bairro" id="bairro" placeholder="Bairro">
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="uf">UF *</label>
			                <select class="form-control" name="uf" id="uf">
			                  <option disabled="" selected="" value="0">Estado</option>
			                  <option value="AC">Acre</option>
			                  <option value="AL">Alagoas</option>
			                  <option value="AM">Amazonas</option>
			                  <option value="AP">Amapá</option>
			                  <option value="BA">Bahia</option>
			                  <option value="CE">Ceará</option>
			                  <option value="DF">Distrito Federal</option>
			                  <option value="ES">Espirito Santo</option>
			                  <option value="GO">Goiás</option>
			                  <option value="MA">Maranhão</option>
			                  <option value="MG">Minas Gerais</option>
			                  <option value="MS">Mato Grosso do Sul</option>
			                  <option value="MT">Mato Grosso</option>
			                  <option value="PA">Pará</option>
			                  <option value="PB">Paraíba</option>
			                  <option value="PE">Pernambuco</option>
			                  <option value="PI">Piauí</option>
			                  <option value="PR">Paraná</option>
			                  <option value="RJ">Rio de Janeiro</option>
			                  <option value="RN">Rio Grande do Norte</option>
			                  <option value="RO">Rondônia</option>
			                  <option value="RR">Roraima</option>
			                  <option value="RS">Rio Grande do Sul</option>
			                  <option value="SC">Santa Catarina</option>
			                  <option value="SE">Sergipe</option>
			                  <option value="SP">São Paulo</option>
			                  <option value="TO">Tocantins</option>
			                </select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="cidade">Cidade *</label>
							<input class="form-control" type="text" name="cidade" id="cidade" placeholder="Cidade">
						</div>
					</div>
				</div>
				<hr/>
				<h5>Dados Bancários</h5>
				<hr/>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="uf">Banco *</label>
			                <select class="form-control" name="uf" id="uf">
			                  <option disabled="" selected="" value="0">Banco</option>
			                  <option value="AC">Itaú</option>
			                  <option value="AL">Santander</option>
			                  <option value="AM">Bradesco</option>
			                  <option value="AP">HSBCS</option>
			                </select>
						</div>
					</div>
					<div class="form-group col-md-2">
						<label for="complemento">Agência</label>
						<input class="form-control" type="text" name="complemento" id="complemento" placeholder="Agência">
					</div>
					<div class="form-group col-md-3">
						<label for="bairro">Conta Corrente *</label>
						<input class="form-control" type="text" name="bairro" id="bairro" placeholder="Conta Corrente">
					</div>
				</div>
				<div class="row">
					<button type="submit" class="btn btn-success mx-auto">Atualizar</button>
				</div>
			</form>
		  </div>
		  <div class='tab-pane fade' id='minhasAssinaturas' role='tabpanel'>
		  	<h5 class='mb-5'>Meus Planos</h5>
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
						<th scope='col'>Excluir</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope='row'>Thor Ragnarok</th>
							<td>R$25.90</td>
							<td>01/01/2017</td>
							<td>A</td>
							<td><i class="fa fa-refresh" aria-hidden="true"></i></td>
							<td><i class="fa fa-times-circle" aria-hidden="true"></i></td>
							<td><i class='fa fa-trash' aria-hidden='true'></i></td>
						</tr>
					</tbody>
				</table>
			</div>
		  </div>
		  <div class='tab-pane fade' id='relatorio' role='tabpanel'>
		  	<div class="row d-sm-block d-md-none d-lg-none">
		  		<div class="button-group">
						<button class="btn btn-primary btn-block active" type="button" data-toggle="collapse" data-target="#vendas" aria-expanded="false" aria-controls="collapseExample">
							Vendas
						</button>
						<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#assinantes" aria-expanded="false" aria-controls="collapseExample">
							Associados
						</button>
		  		</div>
		  	</div>
		  	<div class="row">
			  	<div class="col-md-2">
					<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#vendas" aria-expanded="false" aria-controls="collapseExample">
						Vendas
					</button>
					<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#assinantes" aria-expanded="false" aria-controls="collapseExample">
						Associados
					</button>
				</div>
				<div class="col">
					<div class="collapse show" id="vendas">
						<div class="card-header">
							<ul class="nav nav-tabs card-header-tabs">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home">Vendas por Planos</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile">Vendas por Associado</a>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
									<h4 class="card-title">Filtros</h4>
									<hr/>
									<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												<label for="pacotes">Planos</label>
												<select class="form-control" name="pacotes" id="pacotes">
													<option selected="">Planos</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="inicioPeriodo">Período (Ínicio)</label>
												<input type="date" class="form-control" name="inicioPeriodo">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="fimPeriodo">Período (Final)</label>
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
												<th>Planos</th>
												<th>Quantidade</th>
												<th>Valor Total</th>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Thor Ragnarok</td>
													<td>20</td>
													<td>R$985,45</td>
												</tr>
											</tbody>
										</table>
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
													<label for="pacotes">Planos</label>
													<select class="form-control" name="pacotes" id="pacotes">
														<option selected="">Planos</option>
													</select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label for="inicioPeriodo">Período (Ínicio)</label>
													<input type="date" class="form-control" name="inicioPeriodo">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label for="fimPeriodo">Período (Final)</label>
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

