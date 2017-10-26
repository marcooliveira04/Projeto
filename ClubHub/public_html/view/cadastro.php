<?php



?>

<div class="container">
	<div class="row-fluid">
		<h1>Cadastro</h1>
		<p class="text-muted">Preencha o formulário abaixo para cadastrar-se e ficar por dentro das novidades de seus clubes de assinatura favoritos.</p>
	</div>
	<hr/>
	<form action="" method="POST">
		<h5>Dados Pessoais</h5>
		<hr/>
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
		<h5>Endereço Residencial</h5>
		<hr/>
		<div class="row">
			<div class="form-group col-md-2">
				<label for="cep">CEP *</label>
				<input class="form-control" type="text" name="cepResidencial" id="cepResidencial" placeholder="CEP">
			</div>
			<div class="form-group col-md-6">
				<label for="logradouro">Logradouro *</label>
				<input class="form-control" type="text" name="logradouroResidencial" id="logradouroResidencial" placeholder="Logradouro">
			</div>
			<div class="form-group col-md-2">
				<label for="numero">Número *</label>
				<input class="form-control" type="text" name="numeroResidencial" id="numeroResidencial" placeholder="Número">
			</div>
			<div class="form-group col-md-2">
				<label for="complemento">Complemento</label>
				<input class="form-control" type="text" name="complementoResidencial" id="complementoResidencial" placeholder="Complemento">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3">
				<label for="bairro">Bairro *</label>
				<input class="form-control" type="text" name="bairroResidencial" id="bairroResidencial" placeholder="Bairro">
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label for="uf">UF *</label>
	                <select class="form-control" name="ufResidencial" id="ufResidencial">
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
					<input class="form-control" type="text" name="cidadeResidencial" id="cidadeResidencial" placeholder="Cidade">
				</div>
			</div>
			<div class="col">
				<label for="mesmoEndereco">O endereço de entrega é o mesmo do residencial?</label>
				<div class="form-group">
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="mesmoEndereco" id="mesmoEndereco" value="1"> Sim
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
		<div class="" id="enderecoEntrega">
			<h5>Endereço de Entrega</h5>
			<hr/>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="cep">CEP *</label>
					<input class="form-control" type="text" name="cepEntrega" id="cepEntrega" placeholder="CEP">
				</div>
				<div class="form-group col-md-6">
					<label for="logradouro">Logradouro *</label>
					<input class="form-control" type="text" name="logradouroEntrega" id="logradouroEntrega" placeholder="Logradouro">
				</div>
				<div class="form-group col-md-2">
					<label for="numero">Número *</label>
					<input class="form-control" type="text" name="numeroEntrega" id="numeroEntrega" placeholder="Número">
				</div>
				<div class="form-group col-md-2">
					<label for="complemento">Complemento</label>
					<input class="form-control" type="text" name="complementoEntrega" id="complementoEntrega" placeholder="Complemento">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-3">
					<label for="bairro">Bairro *</label>
					<input class="form-control" type="text" name="bairroEntrega" id="bairroEntrega" placeholder="Bairro">
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="uf">UF *</label>
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
						<label for="cidade">Cidade *</label>
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
</div>