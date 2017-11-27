# Exporting metadata from `clubhub`
DROP DATABASE IF EXISTS `clubhub`;
CREATE DATABASE `clubhub`;
USE `clubhub`;
# TABLE: `clubhub`.`assinantes`
CREATE TABLE `assinantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `rg` (`rg`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
# TABLE: `clubhub`.`assinatura`
CREATE TABLE `assinatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAssinante` int(11) NOT NULL,
  `idPacote` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `codRastreio` varchar(45) DEFAULT NULL,
  `transportadora` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
# TABLE: `clubhub`.`categorias`
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
# TABLE: `clubhub`.`cidade`
CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
# TABLE: `clubhub`.`cliente`
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nomeFantasia` varchar(255) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `razaoSocial` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
# TABLE: `clubhub`.`clubes`
CREATE TABLE `clubes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `razaoSocial` varchar(255) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(60) NOT NULL,
  `cidade` int(11) NOT NULL,
  `uf` int(11) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `celular` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj` (`cnpj`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
# TABLE: `clubhub`.`estados`
CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
# TABLE: `clubhub`.`pacotes`
CREATE TABLE `pacotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idClube` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL,
  `valor` decimal(5,2) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `detalhes` text NOT NULL,
  `proximoEnvio` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
# TABLE: `clubhub`.`periodicidade`
CREATE TABLE `periodicidade` (
  `id` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `id_pacote` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
# TABLE: `clubhub`.`transportadoras`
CREATE TABLE `transportadoras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
# TABLE: `clubhub`.`vendas`
CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `valor_total` decimal(8,2) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_assinante` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
#...done.
USE `clubhub`;
# Exporting data from `clubhub`
# Data for table `clubhub`.`assinantes`:
INSERT INTO `clubhub`.`assinantes` VALUES (1, 'Marco Antonio de Oliveira Junior', '39299476845', '417407518', '1994-04-23', 'M', '17052330', 'Rua Fortunato Resta', '640', '', 'Vila Giunta', 'Bauru', 0, '', '', '', '', '', '0', NULL, '1432430816', '14981047450', 'marco_oliveira94@live.com', 'd90c7638025bb8e4d6dbda0c7051d9e7');
INSERT INTO `clubhub`.`assinantes` VALUES (2, 'Marco Antonio de Oliveira Junior', '21786482584', '417407519', '1994-04-23', 'M', '17052330', 'Rua Fortunato Resta', '640', '', 'Vila Giunta', '0', 0, '', '', '', '', '', '0', NULL, '1432430816', '14981047450', 'marquinho_loco80@hotmail.com', 'd90c7638025bb8e4d6dbda0c7051d9e7');
INSERT INTO `clubhub`.`assinantes` VALUES (5, 'Marco Antonio de Oliveira Junior', '48160884826', '417407511', '1994-04-23', 'M', '17052330', 'Rua Fortunato Resta', '640', '', 'Vila Giunta', '0', 0, '', '', '', '', '', '0', NULL, '1432430816', '14981047450', 'teste@teste.com.br', 'd90c7638025bb8e4d6dbda0c7051d9e7');
INSERT INTO `clubhub`.`assinantes` VALUES (6, 'Teste', '15716472281', '123456777', '1994-04-23', 'M', '17052330', 'Rua Fortunato Resta', '640', '', 'Vila Giunta', '0', 0, '', '', '', '', '', '0', NULL, '1431042050', '14991850101', 'mais@teste.com.br', 'd90c7638025bb8e4d6dbda0c7051d9e7');
INSERT INTO `clubhub`.`assinantes` VALUES (7, 'Marco Oliveira', '23973534233', '123456789', '1994-04-23', 'M', '17052330', 'Rua Fortunato Resta', '640', '', 'Vila Giunta', '0', 0, '', '', '', '', '', '0', NULL, '1431042050', '14991850101', 'onelastime@teste.com', 'd90c7638025bb8e4d6dbda0c7051d9e7');
INSERT INTO `clubhub`.`assinantes` VALUES (8, 'Ariana Grande', '15957604070', '123555555', '1994-04-23', 'M', '17052330', 'Rua Fortunato Resta', '640', '', 'Vila Giunta', '0', 0, '', '', '', '', '', '0', NULL, '1431042050', '14991850101', 'ariana@grande.com', 'd90c7638025bb8e4d6dbda0c7051d9e7');
# Data for table `clubhub`.`assinatura`:
INSERT INTO `clubhub`.`assinatura` VALUES (1, 1, 1, '2017-11-27 00:00:00', '123456', 1);
# Data for table `clubhub`.`categorias`:
INSERT INTO `clubhub`.`categorias` VALUES (1, 'Nerd');
INSERT INTO `clubhub`.`categorias` VALUES (2, 'Alimentação');
INSERT INTO `clubhub`.`categorias` VALUES (3, 'Bebidas');
INSERT INTO `clubhub`.`categorias` VALUES (4, 'Livros');
# Data for table `clubhub`.`cidade`:
# Data for table `clubhub`.`cliente`:
INSERT INTO `clubhub`.`cliente` VALUES (0, 'Clube de Assinatura de Testes', '50391122000124', 'Testes Marco LTDA', 1);
# Data for table `clubhub`.`clubes`:
INSERT INTO `clubhub`.`clubes` VALUES (1, 'Clube Nerd', 'Clube de Testes Comércio Online', '72332796000190', '17052330', 'Rua Fortunato Resta', '640', '', 'Vila Giunta', 0, 0, '1432430816', '14981047450', 'marco_oliveira94@live.com', 'd90c7638025bb8e4d6dbda0c7051d9e7', 1);
# Data for table `clubhub`.`estados`:
# Data for table `clubhub`.`pacotes`:
INSERT INTO `clubhub`.`pacotes` VALUES (1, 1, 'Thor Ragnarok', 1, 89.99, 'clubeNerdTeste.jpg', NULL, NULL, '2018-01-01');
# Blob data for table `pacotes`:
UPDATE `clubhub`.`pacotes` SET `descricao` = 'O Clube Nerd todo mês traz novidades dos seus super heróis favoritos, das séries que parecem sair do mundo invertido e dos cartoons aventureiros (Finn pode confirmar isso).' WHERE `id` = '1' AND `idClube` = '1' AND `nome` = 'Thor Ragnarok' AND `categoria` = '1' AND `valor` = '89.99' AND `imagem` = 'clubeNerdTeste.jpg' AND `proximoEnvio` = '2018-01-01';
# Data for table `clubhub`.`periodicidade`:
# Data for table `clubhub`.`transportadoras`:
INSERT INTO `clubhub`.`transportadoras` VALUES (1, 'Correios', 'http://www2.correios.com.br/sistemas/rastreamento/');
INSERT INTO `clubhub`.`transportadoras` VALUES (2, 'UPS', 'https://www.ups.com/WebTracking/track?loc=pt_BR');
# Data for table `clubhub`.`vendas`:
#...done.
