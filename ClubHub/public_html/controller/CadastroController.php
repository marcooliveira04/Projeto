<?php

/**
* 
*/
class CadastroController
{
	private $dao;
	private $pessoa;

	function __construct(string $tipo)
	{
		require_once "../model/".$tipo.".php";
		require_once "../model/".$tipo."Dao.php";
		$objDao = $tipo."Dao";
		$this->pessoa = new $tipo;
		$this->dao = new $objDao;
	}



	public function cadastro($post){
		$this->pessoa = $this->dao->setter($post, $this->pessoa);
		$create = $this->dao->create($this->pessoa);
		if (!$create) {
			return false;
		} else {
			$this->pessoa->setId($create);
			return true;
		}
	}

	public function atualiza($post){
		$this->pessoa = $this->dao->setter($post, $this->pessoa);
		$update = $this->dao->update($this->pessoa);
		if (!$update) {
			return false;
		} else {
			return true;
		}		
	}

	public function valida($post){
		if (!isset($post['email']) or $post['email'] == '' or !filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
			return "email";
		}

		if (!isset($post['Senha']) or $post['Senha'] == '') {
			return "senha";
		}

		if (!isset($post['nome']) or $post['nome'] == '') {
			return "nome";
		}

		if (!isset($post['telefone']) or $post['telefone'] == '') {
			return "telefone";
		}

		if (!isset($post['celular']) or $post['celular'] == '') {
			return "celular";
		}

		if (!isset($post['cep']) or $post['cep'] == '') {
			return "cep";
		}

		if (!isset($post['rua']) or $post['rua'] == '') {
			return "rua";
		}

		if (!isset($post['numero']) or $post['numero'] == '') {
			return "numero";
		}

		
		if (!isset($post['bairro']) or $post['bairro'] == '') {
			return "bairro";
		}

		if (!isset($post['uf']) or $post['uf'] == '') {
			return "uf";
		}

		if (!isset($post['cidade']) or $post['cidade'] == '') {
			return "cidade";
		}

		if (get_class($this->pessoa) == 'Assinante') {
			if (!isset($post['cpf']) or $post['cpf'] == '') {
				return "cpf";
			}

			if (!isset($post['rg']) or $post['rg'] == '') {
				return "rg";
			}

			if (!isset($post['nascimento']) or $post['nascimento'] == '') {
				return "nascimento";
			}

			if (!isset($post['sexo']) or $post['sexo'] == '') {
				return "sexo";
			}

			if (!isset($post['mesmoEndereco']) or $post['mesmoEndereco'] == '') {
				return "mesmoEndereco";
			}

			if (!isset($post['cepEntrega']) or $post['cepEntrega'] == '') {
				return "cepEntrega";
			}

			if (!isset($post['ruaEntrega']) or $post['ruaEntrega'] == '') {
				return "ruaEntrega";
			}

			if (!isset($post['numeroEntrega']) or $post['numeroEntrega'] == '') {
				return "numeroEntrega";
			}

			if (!isset($post['bairroEntrega']) or $post['bairroEntrega'] == '') {
				return "bairroEntrega";
			}

			if (!isset($post['ufEntrega']) or $post['ufEntrega'] == '') {
				return "ufEntrega";
			}

			if (!isset($post['cidadeEntrega']) or $post['cidadeEntrega'] == '') {
				return "cidadeEntrega";
			}
		}


		if (get_class($this->pessoa) == 'Clube') {

			if (!isset($post['razaoSocial']) or $post['razaoSocial'] == '') {
				return "razaoSocial";
			}

			if (!isset($post['cnpj']) or $post['cnpj'] == '') {
				return "cnpj";
			}

			if (!isset($post['categoria']) or $post['categoria'] == '') {
				return "categoria";
			}

			if (!isset($post['banco']) or $post['banco'] == '') {
				return "banco";
			}

			if (!isset($post['agencia']) or $post['agencia'] == '') {
				return "agencia";
			}

			if (!isset($post['conta']) or $post['conta'] == '') {
				return "conta";
			}
		}
	}

    /**
     * @return mixed
     */
    public function getPessoa(){
        return $this->pessoa;
    }

}

?>