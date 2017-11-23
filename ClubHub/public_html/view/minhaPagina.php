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
		  	<h5 class='mb-5'>Minhas Assinaturas</h5>
		  	<div class='table-responsive-sm'>
				<table class='table table-striped table-hover'>
					<thead class='thead-light'>
						<tr>
						<th scope='col'>Clube</th>
						<th scope='col'>Pacote</th>
						<th scope='col'>Preço</th>
						<th scope='col'>Data da Primeira Assinautra</th>
						<th scope='col'>Data de Cobrança</th>
						<th scope='col'>Próxima Entrega</th>
						<th scope='col'>Código de Rastreio</th>
						<th scope='col'>Transportadora</th>
						<th scope='col'>Cancelar</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<th scope='row'>Nerd</th>
						<td>Thor Ragnarok</td>
						<td>R$25.90</td>
						<td>01/01/2017</td>
						<td>20/02/2017</td>
						<td>-</td>
						<td>123456</td>
						<td><a href='#'>Correios</a></td>
						<td><i class='fa fa-trash' aria-hidden='true'></i></td>
					</tr>
					<tr>
						<th scope='row'>Alimentação</th>
						<td>Cereais Internacionais</td>
						<td>R$15,90</td>
						<td>01/01/2017</td>
						<td>10/11/2017</td>
						<td>30/11/2017</td>
						<td>654321</td>
						<td><a href='#'>UPS</a></td>
						<td><i class='fa fa-trash' aria-hidden='true'></i></td>
					</tr>
					<tr>
						<th scope='row'>Bebidas</th>
						<td>Cachaça Brasileira</td>
						<td>R$75.80</td>
						<td>05/06/2017</td>
						<td>06/06/2017</td>
						<td>11/11/2017</td>
						<td>9876541112</td>
						<td><a href='#'>Transporte de Bebidas</a></td>
						<td><i class='fa fa-trash' aria-hidden='true'></i></td>
					</tr>
					</tbody>
				</table>
			</div>
		  </div>
		  <div class='tab-pane fade' id='relatorio' role='tabpanel'>
		  	<div class="row d-sm-block d-md-none d-lg-none">
		  		<div class="button-group">
						<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#vendas" aria-expanded="false" aria-controls="collapseExample">
							Vendas
						</button>
						<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#assinantes" aria-expanded="false" aria-controls="collapseExample">
							Associados
						</button>
		  		</div>
		  	</div>
		  	<div class="row d-sm-none">
			  	<div class="col-md-2">
						<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#vendas" aria-expanded="false" aria-controls="collapseExample">
							Vendas
						</button>
						<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#assinantes" aria-expanded="false" aria-controls="collapseExample">
							Associados
						</button>

				</div>
				<div class="col">
					<div class="collapse" id="vendas">
						<div class="card card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
						</div>
					</div>
					<div class="collapse" id="assinantes">
						<div class="card card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
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

