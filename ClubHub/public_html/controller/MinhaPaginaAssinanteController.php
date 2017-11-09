<?php
require_once './model/Assinante.php';
require_once './model/AssinanteDao.php';
/**
* 
*/
class MinhaPaginaAssinanteController
{
	private $navigation;
	private $pessoa;

	function __construct(){
		$this->pessoa = new Assinante;
		$this->dao = new AssinanteDao;
	}


	public function pegaCadastro(){
		$where = [
			[
				'coluna' => 'id',
				'valor' => $_SESSION['id'],
				'operador' => ''
			]
		];
		$this->pessoa = $this->dao->read(get_class($this->pessoa), $where, null)[0];

		return;
	}

	public function constroiFormCadastro(){
		$this->pegaCadastro();
		$form = "
			<form name='atualizacao' id='atualizacao' method='POST'>
				<input type='hidden' name='action' value='atualiza'>
				<input type='hidden' name='tipo' value='Assinante'>
				<h5>Dados Pessoais</h5>
				<hr/>
				<div class='row'>
					<div class='form-group col-md-6'>
						<label for='email'>E-mail *</label>
						<input class='form-control' type='email' name='email' id='email' required='' value='".$this->pessoa->getEmail()."'>
					</div>
					<div class='form-group col-md-6'>
						<label for='Senha'>Senha *</label>
						<input class='form-control' type='password' name='senha' id='senha' required=''> 
					</div>
				</div>
				<div class='row'>
					<div class='form-group col-md-6'>
						<label for='nome'>Nome Completo *</label>
						<input class='form-control' type='text' name='nome' id='nome' required='' value='".$this->pessoa->getNome()."'>
					</div>
					<div class='form-group col-md-3'>
						<label for='cpf'>CPF *</label>
						<input class='form-control' type='text' name='cpf' id='cpf' required='' value='".$this->pessoa->getCpf()."'>
					</div>
					<div class='form-group col-md-3'>
						<label for='rg'>RG *</label>
						<input class='form-control' type='text' name='rg' id='rg' required='' value='".$this->pessoa->getRg()."'>
					</div>
				</div>
				<div class='row'>
					<div class='form-group col-md-3'>
						<label for='nascimento'>Nascimento *</label>
						<input class='form-control' type='date' name='nascimento' id='nascimento' placeholder=''>
					</div>
					<div class='form-group col-md-3'>
						<label for='sexo'>Genêro *</label>
						<select class='form-control' name='sexo' id='sexo'>
							<option disabled='' value='0' selected=''>Escolha seu gênero</option>
							<option value='M'>Masculino</option>
							<option value='F'>Feminino</option>
						</select>
					</div>
					<div class='form-group col-md-3'>
						<label for='telefone'>Telefone *</label>
						<input class='form-control' type='text' name='telefone' id='telefone' value='".$this->pessoa->getTelefone()."'>
					</div>
					<div class='form-group col-md-3'>
						<label for='celular'>Celular</label>
						<input class='form-control' type='text' name='celular' id='celular' value='".$this->pessoa->getCelular()."'>
					</div>
				</div>
				<h5>Endereço </h5>
				<hr/>
				<div class='row'>
					<div class='form-group col-md-2'>
						<label for='cep'>CEP *</label>
						<input class='form-control' type='text' name='cep' id='cep' value='".$this->pessoa->getCep()."'>
						<div class='invalid-feedback' id='invalid-feedback-cep'></div>
					</div>
					<div class='form-group col-md-6'>
						<label for='rua'>Logradouro *</label>
						<input class='form-control' type='text' name='rua' id='rua' value='".$this->pessoa->getRua()."'>
					</div>
					<div class='form-group col-md-2'>
						<label for='numero'>Número *</label>
						<input class='form-control' type='text' name='numero' id='numero' value='".$this->pessoa->getNumero()."'>
					</div>
					<div class='form-group col-md-2'>
						<label for='complemento'>Complemento</label>
						<input class='form-control' type='text' name='complemento' id='complemento' value='".$this->pessoa->getComplemento()."'>
					</div>
				</div>
				<div class='row'>
					<div class='form-group col-md-3'>
						<label for='bairro'>Bairro *</label>
						<input class='form-control' type='text' name='bairro' id='bairro' value='".$this->pessoa->getBairro()."'>
					</div>
					<div class='col-md-2'>
						<div class='form-group'>
							<label for='uf'>UF *</label>
			                <select class='form-control' name='uf' id='uf'>
			                  <option disabled='' selected='' value='0'>Estado</option>
			                  <option value='AC'>Acre</option>
			                  <option value='AL'>Alagoas</option>
			                  <option value='AM'>Amazonas</option>
			                  <option value='AP'>Amapá</option>
			                  <option value='BA'>Bahia</option>
			                  <option value='CE'>Ceará</option>
			                  <option value='DF'>Distrito Federal</option>
			                  <option value='ES'>Espirito Santo</option>
			                  <option value='GO'>Goiás</option>
			                  <option value='MA'>Maranhão</option>
			                  <option value='MG'>Minas Gerais</option>
			                  <option value='MS'>Mato Grosso do Sul</option>
			                  <option value='MT'>Mato Grosso</option>
			                  <option value='PA'>Pará</option>
			                  <option value='PB'>Paraíba</option>
			                  <option value='PE'>Pernambuco</option>
			                  <option value='PI'>Piauí</option>
			                  <option value='PR'>Paraná</option>
			                  <option value='RJ'>Rio de Janeiro</option>
			                  <option value='RN'>Rio Grande do Norte</option>
			                  <option value='RO'>Rondônia</option>
			                  <option value='RR'>Roraima</option>
			                  <option value='RS'>Rio Grande do Sul</option>
			                  <option value='SC'>Santa Catarina</option>
			                  <option value='SE'>Sergipe</option>
			                  <option value='SP'>São Paulo</option>
			                  <option value='TO'>Tocantins</option>
			                </select>
						</div>
					</div>
					<div class='col-md-2'>
						<div class='form-group'>
							<label for='cidade'>Cidade *</label>
							<input class='form-control' type='text' name='cidade' id='cidade' value='".$this->pessoa->getCidade()."'>
						</div>
					</div>

					<div class='col'>
						<label for='mesmoEndereco'>O endereço de entrega é o mesmo do residencial?</label>
						<div class='form-group'>
							<div class='form-check form-check-inline'>
								<label class='form-check-label'>
									<input class='form-check-input' checked type='radio' name='mesmoEndereco' id='mesmoEndereco' value='1'> Sim
								</label>
							</div>
							<div class='form-check form-check-inline'>
								<label class='form-check-label'>
									<input class='form-check-input' type='radio' name='mesmoEndereco' id='mesmoEndereco' value='0'> Não
								</label>
							</div>		
						</div>
					</div>
				</div>
				<!-- Adicionado estilo display:none para começar fechada e só aparecer se o usuário clicar em 'não' -->
				<div id='enderecoEntrega' style='display: none;'>
					<h5>Endereço de Entrega</h5>
					<hr/>
					<div class='row'>
						<div class='form-group col-md-2'>
							<label for='cepEntrega'>CEP *</label>
							<input class='form-control' type='text' name='cepEntrega' id='cepEntrega' value='".$this->pessoa->getCepEntrega()."'>
						</div>
						<div class='form-group col-md-6'>
							<label for='ruaEntrega'>Logradouro *</label>
							<input class='form-control' type='text' name='ruaEntrega' id='ruaEntrega' value='".$this->pessoa->getRuaEntrega()."'>
						</div>
						<div class='form-group col-md-2'>
							<label for='numeroEntrega'>Número *</label>
							<input class='form-control' type='text' name='numeroEntrega' id='numeroEntrega' value='".$this->pessoa->getNumeroEntrega()."'>
						</div>
						<div class='form-group col-md-2'>
							<label for='complementoEntrega'>Complemento</label>
							<input class='form-control' type='text' name='complementoEntrega' id='complementoEntrega' value='".$this->pessoa->getComplementoEntrega()."'>
						</div>
					</div>
					<div class='row'>
						<div class='form-group col-md-3'>
							<label for='bairroEntrega'>Bairro *</label>
							<input class='form-control' type='text' name='bairroEntrega' id='bairroEntrega' value='".$this->pessoa->getBairroEntrega()."'>
						</div>
						<div class='col-md-2'>
							<div class='form-group'>
								<label for='ufEntrega'>UF *</label>
				                <select class='form-control' name='ufEntrega' id='ufEntrega'>
				                  <option disabled='' selected='' value='0'>Estado</option>
				                  <option value='AC'>Acre</option>
				                  <option value='AL'>Alagoas</option>
				                  <option value='AM'>Amazonas</option>
				                  <option value='AP'>Amapá</option>
				                  <option value='BA'>Bahia</option>
				                  <option value='CE'>Ceará</option>
				                  <option value='DF'>Distrito Federal</option>
				                  <option value='ES'>Espirito Santo</option>
				                  <option value='GO'>Goiás</option>
				                  <option value='MA'>Maranhão</option>
				                  <option value='MG'>Minas Gerais</option>
				                  <option value='MS'>Mato Grosso do Sul</option>
				                  <option value='MT'>Mato Grosso</option>
				                  <option value='PA'>Pará</option>
				                  <option value='PB'>Paraíba</option>
				                  <option value='PE'>Pernambuco</option>
				                  <option value='PI'>Piauí</option>
				                  <option value='PR'>Paraná</option>
				                  <option value='RJ'>Rio de Janeiro</option>
				                  <option value='RN'>Rio Grande do Norte</option>
				                  <option value='RO'>Rondônia</option>
				                  <option value='RR'>Roraima</option>
				                  <option value='RS'>Rio Grande do Sul</option>
				                  <option value='SC'>Santa Catarina</option>
				                  <option value='SE'>Sergipe</option>
				                  <option value='SP'>São Paulo</option>
				                  <option value='TO'>Tocantins</option>
				                </select>
							</div>
						</div>
						<div class='col-md-2'>
							<div class='form-group'>
								<label for='cidadeEntrega'>Cidade *</label>
								<input class='form-control' type='text' name='cidadeEntrega' id='cidadeEntrega' value='".$this->pessoa->getCidadeEntrega()."'>
							</div>
						</div>
					</div>
				</div>
				<hr/>
				<div class='row'>
					<button type='submit' class='btn btn-success mx-auto'>Atualizar</button>
				</div>
			</form>
		";

		return $form;
	}

	public function constroiNavegacao(){
		$this->navigation = "
			<ul class='nav nav-pills justify-content-center nav-fill'>
				<li class='nav-item'>
					<a class='nav-link active' id='perfil-pill' data-toggle='pill' href='#perfil'>Perfil</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' id='pedido-pill' data-toggle='pill' href='#pedidos' href='#'>Pedidos (Produtos Avulsos)</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' href='#'>Assinaturas Agendadas</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' href='#'>Pontos</a>
				</li>
			</ul>
			<hr/>
		";

		return $this->navigation;
	}

	public function constroiTabs(){
		$tabs = "
		<div class='tab-content' id='nav-tabContent'>
		  <div class='tab-pane fade show active' id='perfil' role='tabpanel' aria-labelledby='nav-home-tab'>
		  	".$this->constroiFormCadastro()."
		  </div>
		  <div class='tab-pane fade' id='pedidos' role='tabpanel' aria-labelledby='nav-profile-tab'>...</div>
		  <div class='tab-pane fade' id='nav-contact' role='tabpanel' aria-labelledby='nav-contact-tab'>...</div>
		</div>
		";

		return $tabs;
	}
}

?>