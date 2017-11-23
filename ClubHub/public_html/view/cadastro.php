<?php
if (isset($_SESSION['logado']) and $_SESSION['logado'] == 'S') {
	?><script type="text/javascript">window.location.href='?page=minhaPagina';</script><?php
}
?>
<div class="container">
<?php
	if (isset($_GET['tipo'])) {
		if ($_GET['tipo'] == 'assinante') {
			?>
			<div class="row-fluid">
				<h3>Cadastro</h3>
				<p class="text-muted">Faça seu cadastro para ficar por dentro de seus clubes prediletos, controlar suas assinaturas e comprar novos produtos.</p>
			</div>
			<hr/>
			<form name="cadastro" id="cadastro" method="POST">
				<input type="hidden" name="action" value="cadastro">
				<input type="hidden" name="tipo" value="Assinante">
				<h5>Dados Pessoais</h5>
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
						<label for="nome">Nome Completo *</label>
						<input class="form-control" type="text" name="nome" id="nome" placeholder="Nome Completo" required="">
					</div>
					<div class="form-group col-md-3">
						<label for="cpf">CPF *</label>
						<input class="form-control" type="text" name="cpf" id="cpf" placeholder="CPF" required="">
					</div>
					<div class="form-group col-md-3">
						<label for="rg">RG *</label>
						<input class="form-control" type="text" name="rg" id="rg" placeholder="RG" required="">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-3">
						<label for="nascimento">Nascimento *</label>
						<input class="form-control" type="date" name="nascimento" id="nascimento" placeholder="">
					</div>
					<div class="form-group col-md-3">
						<label for="sexo">Genêro *</label>
						<select class="form-control" name="sexo" id="sexo">
							<option disabled="" value="0" selected="">Escolha seu gênero</option>
							<option value="M">Masculino</option>
							<option value="F">Feminino</option>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label for="telefone">Telefone *</label>
						<input class="form-control" type="text" name="telefone" id="telefone" placeholder="Telefone">
					</div>
					<div class="form-group col-md-3">
						<label for="celular">Celular</label>
						<input class="form-control" type="text" name="celular" id="celular" placeholder="Celular">
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
					<div class="col">
						<label for="mesmoEndereco">O endereço de entrega é o mesmo do residencial?</label>
						<div class="form-group">
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input class="form-check-input" type="radio" checked="" name="mesmoEndereco" id="mesmoEndereco" value="1"> Sim
								</label>
							</div>
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input class="form-check-input" type="radio" name="mesmoEndereco" id="mesmoEndereco" value="0"> Não
								</label>
							</div>		
						</div>
					</div>
				</div>
				<!-- Adicionado estilo display:none para começar fechada e só aparecer se o usuário clicar em "não" -->
				<div id="enderecoEntrega" style="display: none;">
					<h5>Endereço de Entrega</h5>
					<hr/>
					<div class="row">
						<div class="form-group col-md-2">
							<label for="cepEntrega">CEP *</label>
							<input class="form-control" type="text" name="cepEntrega" id="cepEntrega" placeholder="CEP">
						</div>
						<div class="form-group col-md-6">
							<label for="ruaEntrega">Logradouro *</label>
							<input class="form-control" type="text" name="ruaEntrega" id="ruaEntrega" placeholder="Logradouro">
						</div>
						<div class="form-group col-md-2">
							<label for="numeroEntrega">Número *</label>
							<input class="form-control" type="text" name="numeroEntrega" id="numeroEntrega" placeholder="Número">
						</div>
						<div class="form-group col-md-2">
							<label for="complementoEntrega">Complemento</label>
							<input class="form-control" type="text" name="complementoEntrega" id="complementoEntrega" placeholder="Complemento">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-3">
							<label for="bairroEntrega">Bairro *</label>
							<input class="form-control" type="text" name="bairroEntrega" id="bairroEntrega" placeholder="Bairro">
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="ufEntrega">UF *</label>
				                <select class="form-control" name="ufEntrega" id="ufEntrega">
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
								<label for="cidadeEntrega">Cidade *</label>
								<input class="form-control" type="text" name="cidadeEntrega" id="cidadeEntrega" placeholder="Cidade">
							</div>
						</div>
					</div>
				</div>
				<hr/>
				<div class="row text-center">
					<div class="col form-group">
						<div class="form-check">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" value="1">
								Eu li e aceito termos e condições.
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<button type="submit" class="btn btn-success mx-auto">Cadastrar-se</button>
				</div>
			</form>
			<?php
		} else if ($_GET['tipo'] == 'clube') {
			require_once './controller/CategoriaController.php';
			$controllerCategoria =  new CategoriaController;
			$categorias = $controllerCategoria->geraSelect();
			?>
			<div class="row-fluid">
				<h3>Cadastro</h3>
				<p class="text-muted">Faça seu cadastro para se tornar um de nossos parceiros. O seu cadastro passará por avaliação e classifcação e, logo entraremos em contato.</p>
			</div>
			<hr/>
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
				<hr/>
				<div class="row text-center">
					<div class="col form-group">
						<div class="form-check">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" value="1">
								Eu li e aceito os <a href="">termos e condições</a>.
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<button type="submit" class="btn btn-success mx-auto">Cadastrar-se</button>
				</div>
			</form>
			<?php
		}
	} else {
		?>
		<div class="row-fluid">
			<h3>Você é um...</h3>
		</div>
		<hr/>
		<div class="row-fluid text-center">
			<a href="?page=cadastro&tipo=assinante" class="btn btn-sq-lg btn-secondary py-auto">
				<i class="fa fa-user fa-5x"></i><br/>
                <p class="mt-2">Assinante</p>
            </a>
			<a href="?page=cadastro&tipo=clube" class="btn btn-sq-lg btn-secondary" style="vertical-align: middle;">
				<i class="fa fa-building-o fa-5x" aria-hidden="true"></i><br/>
				<p class="mt-2">Clube</p>
			</a>
		</div>
		<?php
	}

?>

</div>
