<?php

	/**
	* @test Testes da classe Estado e EstadoDao.
	*/

	// require_once 'Estado.class.php';
	// require_once 'Estado.dao.php';

	// $estado = new Estado;

	// $estado->setId(4);
	// $estado->setNome("São Paulo");

	// $estadoDao = new EstadoDao;

	// $estadoDao->create($estado);
	// $estadoDao->update($estado);
	// $estadoDao->delete($estado);

	// print("<pre>");print_r($estadoDao->read());print("</pre>");

	/**
	* @test Testes da classe Cidade e CidadeDao.
	*/

	// require_once 'Cidade.class.php';
	// require_once 'Cidade.dao.php';

	// $cidade = new Cidade;
	// $cidadeDao = new CidadeDao;

	// $cidade->setId(0);
	// $cidade->setNome('Teste Dois');
	// $cidade->setEstado(2);

	// $cidadeDao->create($cidade);
	// $cidadeDao->update($cidade);
	// $cidadeDao->delete($cidade);

	// print("<pre>");print_r($cidadeDao->read());print("</pre>");

	require_once 'Assinante.class.php';
	// require_once 'Assinante.dao.php';

	$assinante = new Assinante;
	// $assinanteDao = new AssinanteDao;

	$assinante->setId("null");
	$assinante->setNome('Marco Oliveira');
	$assinante->setCpf('39299476845');
	$assinante->setRg('417407518');
	$assinante->setNascimento('1994-04-23');
	$assinante->setSexo('M');
	$assinante->setCep('17052330');
	$assinante->setRua('Fortunato');
	$assinante->setNumero('6');
	$assinante->setCidade('1');
	$assinante->setTelefone('14981047450');
	$assinante->setCelular('14981047450');
	$assinante->setEmail('teste@teste.com.br');
	$assinante->setSenha(md5('a'));

	print("<pre>");print_r($assinante);print("</pre>");

	print("<pre>");print_r($assinante->insere());print("</pre>");

	// print_r($assinante->busca());

	// $assinanteDao->create($assinante);

	// print_r($assinanteDao->read());

	// $assinante->setCep('17052330');

	// $assinante->validaCep();

	// $assinante->setCpf('392994.768-45');

	// $assinante->validaCpf();

	// $assinante->testeBinding();

	/*

		About classes:

			Assinante faz uma Assinatura.
			
			Assinatura é composta de um Pacote, um Assinante. *REMOVER PERÍODO*
			
			Pacote é composto por um campo identificador (ID), nome, valor, clube e período - este, sendo por quanto tempo ele deve se repetir/uma quantidade de meses base para repetição da cobrança da assinatura.
			
			Periodo é composto de quantidade de repetição e, identificação do pacote ligado à este.
			
			Categoria é composta de apenas um campo identificador (ID) e um campo de nome.
			
			PacoteCategoria é onde é definido a ligação entre um pacote e uma ou mais categorias.

		End About classes
	*/

	/*
	 	To-do:
	 		Verificar se ponho ou não o identificador de classe nos comandos read.
	 		Lembrar de pegar e melhorar as funções geradoras de condições SQL.
	 		Verificar se nesting de objetos - Assinatura + Pacote, por exemplo - é a melhor opção à ser usada, já que vai ficar confuso no select e eu não sei como fazer.

	 		Se, em Assinatura eu não for usar nesting de objetos, talvez seja melhor usar apenas o modelo do banco de dados. Se eu for usar, remover atributo ID da classe e remover o seu getter e setter.

	 		Remover a classe PeriodicidadeValor!
	 			Esta classe não precisa existir, as regras de descontos baseados em valor podem ser definidas na classe do Pacote! E devem ser.

	 		Ver como vai ser o tipo de dados do periodo. Se vai ser usado n para representar a quantidade de meses ou se preciso usar uma data de início de outra de fim. 
	 			Data de início e fim vão - potencialmente - ter que ser registradas em bancos de dados na classe/tabela de assinatura.
	*/

	 /*
		Untested:
			Assinatura
			Pacote
			Categoria
	 */

?>