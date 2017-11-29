<?php

/**
* 
*/
class Estados
{
	
	public $estados = [
		'AC'=>'Acre',
		'AL'=>'Alagoas',
		'AP'=>'Amapá',
		'AM'=>'Amazonas',
		'BA'=>'Bahia',
		'CE'=>'Ceará',
		'DF'=>'Distrito Federal',
		'ES'=>'Espírito Santo',
		'GO'=>'Goiás',
		'MA'=>'Maranhão',
		'MT'=>'Mato Grosso',
		'MS'=>'Mato Grosso do Sul',
		'MG'=>'Minas Gerais',
		'PA'=>'Pará',
		'PB'=>'Paraíba',
		'PR'=>'Paraná',
		'PE'=>'Pernambuco',
		'PI'=>'Piauí',
		'RJ'=>'Rio de Janeiro',
		'RN'=>'Rio Grande do Norte',
		'RS'=>'Rio Grande do Sul',
		'RO'=>'Rondônia',
		'RR'=>'Roraima',
		'SC'=>'Santa Catarina',
		'SP'=>'São Paulo',
		'SE'=>'Sergipe',
		'TO'=>'Tocantins'
	];

	public function geraOptions($select = null){
		$options = "";
		foreach ($this->estados as $sigla => $nome) {
			if ($select !== null and $select == $sigla) {
				$options.="<option selected=\"\" value=\"$sigla\">$nome</option>";
			} else {
				$options.="<option value=\"$sigla\">$nome</option>";
			}
			
		}

		return $options;
	}
}

?>