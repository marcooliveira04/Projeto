-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 03:06 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clubhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `assinantes`
--

CREATE TABLE `assinantes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(9) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(60) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `uf` int(11) NOT NULL,
  `cepEntrega` varchar(8) DEFAULT NULL,
  `ruaEntrega` varchar(255) DEFAULT NULL,
  `numeroEntrega` varchar(10) DEFAULT NULL,
  `complementoEntrega` varchar(50) DEFAULT NULL,
  `bairroEntrega` varchar(60) NOT NULL,
  `cidadeEntrega` varchar(60) DEFAULT NULL,
  `ufEntrega` char(2) DEFAULT NULL,
  `telefone` varchar(11) NOT NULL,
  `celular` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assinantes`
--

INSERT INTO `assinantes` (`id`, `nome`, `cpf`, `rg`, `nascimento`, `sexo`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cepEntrega`, `ruaEntrega`, `numeroEntrega`, `complementoEntrega`, `bairroEntrega`, `cidadeEntrega`, `ufEntrega`, `telefone`, `celular`, `email`, `senha`) VALUES
(1, 'Marco Antonio de Oliveira Junior', '39299476845', '417407518', '1994-04-23', 'M', '17052330', 'Rua Fortunato Resta', '640', '', 'Vila Giunta', 'Bauru', 0, '', '', '', '', '', '0', NULL, '1432430816', '14981047450', 'marco_oliveira94@live.com', 'd90c7638025bb8e4d6dbda0c7051d9e7'),
(2, 'Marco Antonio de Oliveira Junior', '21786482584', '417407519', '1994-04-23', 'M', '17052330', 'Rua Fortunato Resta', '640', '', 'Vila Giunta', '0', 0, '', '', '', '', '', '0', NULL, '1432430816', '14981047450', 'marquinho_loco80@hotmail.com', 'd90c7638025bb8e4d6dbda0c7051d9e7'),
(5, 'Marco Antonio de Oliveira Junior', '48160884826', '417407511', '1994-04-23', 'M', '17052330', 'Rua Fortunato Resta', '640', '', 'Vila Giunta', '0', 0, '', '', '', '', '', '0', NULL, '1432430816', '14981047450', 'teste@teste.com.br', 'd90c7638025bb8e4d6dbda0c7051d9e7'),
(6, 'Teste', '15716472281', '123456777', '1994-04-23', 'M', '17052330', 'Rua Fortunato Resta', '640', '', 'Vila Giunta', '0', 0, '', '', '', '', '', '0', NULL, '1431042050', '14991850101', 'mais@teste.com.br', 'd90c7638025bb8e4d6dbda0c7051d9e7'),
(7, 'Marco Oliveira', '23973534233', '123456789', '1994-04-23', 'M', '17052330', 'Rua Fortunato Resta', '640', '', 'Vila Giunta', '0', 0, '', '', '', '', '', '0', NULL, '1431042050', '14991850101', 'onelastime@teste.com', 'd90c7638025bb8e4d6dbda0c7051d9e7'),
(8, 'Ariana Grande', '15957604070', '123555555', '1994-04-23', 'M', '17052330', 'Rua Fortunato Resta', '640', '', 'Vila Giunta', '0', 0, '', '', '', '', '', '0', NULL, '1431042050', '14991850101', 'ariana@grande.com', 'd90c7638025bb8e4d6dbda0c7051d9e7');

-- --------------------------------------------------------

--
-- Table structure for table `assinatura`
--

CREATE TABLE `assinatura` (
  `id` int(11) NOT NULL,
  `idAssinante` int(11) NOT NULL,
  `idPacote` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `codRastreio` varchar(45) DEFAULT NULL,
  `transportadora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assinatura`
--

INSERT INTO `assinatura` (`id`, `idAssinante`, `idPacote`, `data`, `codRastreio`, `transportadora`) VALUES
(1, 1, 1, '2017-11-27 00:00:00', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Nerd'),
(2, 'Alimentação'),
(3, 'Bebidas'),
(4, 'Livros');

-- --------------------------------------------------------

--
-- Table structure for table `cidade`
--

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nomeFantasia` varchar(255) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `razaoSocial` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `nomeFantasia`, `cnpj`, `razaoSocial`, `categoria`) VALUES
(0, 'Clube de Assinatura de Testes', '50391122000124', 'Testes Marco LTDA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clubes`
--

CREATE TABLE `clubes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `razaoSocial` varchar(255) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(60) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `celular` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL,
  `banco` varchar(11) NOT NULL,
  `agencia` varchar(10) NOT NULL,
  `conta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubes`
--

INSERT INTO `clubes` (`id`, `nome`, `razaoSocial`, `cnpj`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `telefone`, `celular`, `email`, `senha`, `categoria`, `banco`, `agencia`, `conta`) VALUES
(1, 'Clube Nerd', 'Clube de Testes Comércio Online', '72332796000190', '17052330', 'Rua Fortunato Resta', '640', '', 'Vila Giunta', 'Bauru', 'SP', '1432430816', '14981047450', 'marco_oliveira94@live.com', 'd90c7638025bb8e4d6dbda0c7051d9e7', 1, '02563', '12345-X', '252565-3');

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pacotes`
--

CREATE TABLE `pacotes` (
  `id` int(11) NOT NULL,
  `idClube` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL,
  `valor` decimal(5,2) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `detalhes` text NOT NULL,
  `proximoEnvio` date DEFAULT NULL,
  `dataCadastro` date DEFAULT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pacotes`
--

INSERT INTO `pacotes` (`id`, `idClube`, `nome`, `categoria`, `valor`, `imagem`, `descricao`, `detalhes`, `proximoEnvio`, `dataCadastro`, `status`) VALUES
(1, 1, 'Thor Ragnarok', 1, '89.99', 'clubeNerdTeste.jpg', 'O Clube Nerd todo mês traz novidades dos seus super heróis favoritos, das séries que parecem sair do mundo invertido e dos cartoons aventureiros (Finn pode confirmar isso).', 'teste', '2018-01-01', '2017-11-28', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `periodicidade`
--

CREATE TABLE `periodicidade` (
  `id` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `id_pacote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transportadoras`
--

CREATE TABLE `transportadoras` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportadoras`
--

INSERT INTO `transportadoras` (`id`, `nome`, `link`) VALUES
(1, 'Correios', 'http://www2.correios.com.br/sistemas/rastreamento/'),
(2, 'UPS', 'https://www.ups.com/WebTracking/track?loc=pt_BR');

-- --------------------------------------------------------

--
-- Table structure for table `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `valor_total` decimal(8,2) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_assinante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assinantes`
--
ALTER TABLE `assinantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `rg` (`rg`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `assinatura`
--
ALTER TABLE `assinatura`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubes`
--
ALTER TABLE `clubes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj` (`cnpj`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacotes`
--
ALTER TABLE `pacotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periodicidade`
--
ALTER TABLE `periodicidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportadoras`
--
ALTER TABLE `transportadoras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assinantes`
--
ALTER TABLE `assinantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `assinatura`
--
ALTER TABLE `assinatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `clubes`
--
ALTER TABLE `clubes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pacotes`
--
ALTER TABLE `pacotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transportadoras`
--
ALTER TABLE `transportadoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
