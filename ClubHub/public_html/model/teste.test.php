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
	require_once 'Assinante.dao.php';

	$assinante = new Assinante;
	$assinanteDao = new AssinanteDao;

	// $assinante->setId("null");
	// $assinante->setNome('Marco Oliveira');
	// $assinante->setCpf('39299476845');
	// $assinante->setRg('417407518');
	// $assinante->setNascimento('1994-04-23');
	// $assinante->setSexo('M');
	// $assinante->setCep('17052330');
	// $assinante->setRua('Fortunato');
	// $assinante->setNumero('6');
	// $assinante->setCidade('1');
	// $assinante->setTelefone('14981047450');
	// $assinante->setCelular('14981047450');
	// $assinante->setEmail('teste@teste.com.br');
	// $assinante->setSenha(md5('a'));


	// $assinanteDao->create($assinante);

	print_r($assinanteDao->read());

	// $assinante->setCep('17052330');

	// $assinante->validaCep();

	// $assinante->setCpf('392994.768-45');

	// $assinante->validaCpf();

	// $assinante->testeBinding();

?>