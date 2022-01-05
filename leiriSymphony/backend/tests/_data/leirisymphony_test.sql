-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05-Jan-2022 às 15:13
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `leirisymphony_test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `albuns`
--

DROP TABLE IF EXISTS `albuns`;
CREATE TABLE IF NOT EXISTS `albuns` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `datalancamento` date NOT NULL,
  `idimagem` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_albuns_imagens1_idx` (`idimagem`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `albuns`
--

INSERT INTO `albuns` (`id`, `nome`, `preco`, `datalancamento`, `idimagem`) VALUES
(1, 'Musicas do Bernardo', '5.90', '2022-01-04', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `albunsartistas`
--

DROP TABLE IF EXISTS `albunsartistas`;
CREATE TABLE IF NOT EXISTS `albunsartistas` (
  `idalbum` int NOT NULL,
  `idartista` int NOT NULL,
  PRIMARY KEY (`idalbum`,`idartista`),
  KEY `fk_albuns_has_artistas_artistas1_idx` (`idartista`),
  KEY `fk_albuns_has_artistas_albuns1_idx` (`idalbum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `albunsartistas`
--

INSERT INTO `albunsartistas` (`idalbum`, `idartista`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `artistas`
--

DROP TABLE IF EXISTS `artistas`;
CREATE TABLE IF NOT EXISTS `artistas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `artistas`
--

INSERT INTO `artistas` (`id`, `nome`) VALUES
(1, 'Bernardo Santos'),
(2, 'João Antunes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Administrador', '1', 1641262329),
('Apoio ao cliente', '3', 1641262329),
('Cliente', '4', 1641262548),
('Gestor de loja', '2', 1641262329);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Administrador', 1, NULL, NULL, NULL, 1641262329, 1641262329),
('Apoio ao cliente', 1, NULL, NULL, NULL, 1641262329, 1641262329),
('Cliente', 1, NULL, NULL, NULL, 1641262329, 1641262329),
('criarAlbum', 2, 'Criar um album', NULL, NULL, 1641262329, 1641262329),
('criarArtista', 2, 'Criar um Artista', NULL, NULL, 1641262329, 1641262329),
('criarCategoria', 2, 'Criar uma categoria', NULL, NULL, 1641262329, 1641262329),
('criarDemonstracao', 2, 'Criar uma Demonstração', NULL, NULL, 1641262329, 1641262329),
('criarEncomenda', 2, 'Criar uma encomenda', NULL, NULL, 1641262329, 1641262329),
('criarEvento', 2, 'Criar um evento', NULL, NULL, 1641262329, 1641262329),
('criarImagem', 2, 'Criar uma Imagem', NULL, NULL, 1641262329, 1641262329),
('criarMarca', 2, 'Criar uma marca', NULL, NULL, 1641262329, 1641262329),
('criarMusica', 2, 'Criar uma musica', NULL, NULL, 1641262329, 1641262329),
('criarPerfil', 2, 'Criar um Perfil', NULL, NULL, 1641262329, 1641262329),
('criarProduto', 2, 'Criar um produto', NULL, NULL, 1641262329, 1641262329),
('criarSubCategoria', 2, 'Criar uma Subcategoria', NULL, NULL, 1641262329, 1641262329),
('criarTipoInformacao', 2, 'Criar uma TipoInformacao', NULL, NULL, 1641262329, 1641262329),
('criarUtilizador', 2, 'Criar um Utilizador', NULL, NULL, 1641262329, 1641262329),
('editarAlbum', 2, 'Editar um album', NULL, NULL, 1641262329, 1641262329),
('editarArtista', 2, 'Editar um Artista', NULL, NULL, 1641262329, 1641262329),
('editarCategoria', 2, 'Editar uma categoria', NULL, NULL, 1641262329, 1641262329),
('editarDemonstracao', 2, 'Editar uma Demonstração', NULL, NULL, 1641262329, 1641262329),
('editarEncomenda', 2, 'Editar uma encomenda', NULL, NULL, 1641262329, 1641262329),
('editarEvento', 2, 'Editar um evento', NULL, NULL, 1641262329, 1641262329),
('editarImagem', 2, 'Editar uma Imagem', NULL, NULL, 1641262329, 1641262329),
('editarMarca', 2, 'Editar uma marca', NULL, NULL, 1641262329, 1641262329),
('editarMusica', 2, 'Editar uma musica', NULL, NULL, 1641262329, 1641262329),
('editarPerfil', 2, 'Editar um Perfil', NULL, NULL, 1641262329, 1641262329),
('editarProduto', 2, 'Editar um produto', NULL, NULL, 1641262329, 1641262329),
('editarSubCategoria', 2, 'Editar uma Subcategoria', NULL, NULL, 1641262329, 1641262329),
('editarTipoInformacao', 2, 'Editar uma TipoInformacao', NULL, NULL, 1641262329, 1641262329),
('editarUtilizador', 2, 'Editar um Utilizador', NULL, NULL, 1641262329, 1641262329),
('eliminarAlbum', 2, 'Eliminar um album', NULL, NULL, 1641262329, 1641262329),
('eliminarArtista', 2, 'Eliminar um Artista', NULL, NULL, 1641262329, 1641262329),
('eliminarCategoria', 2, 'Eliminar uma categoria', NULL, NULL, 1641262329, 1641262329),
('eliminarDemonstracao', 2, 'Eliminar uma Demonstração', NULL, NULL, 1641262329, 1641262329),
('eliminarEncomenda', 2, 'Eliminar uma encomenda', NULL, NULL, 1641262329, 1641262329),
('eliminarEvento', 2, 'Eliminar um evento', NULL, NULL, 1641262329, 1641262329),
('eliminarImagem', 2, 'Eliminar uma Imagem', NULL, NULL, 1641262329, 1641262329),
('eliminarMarca', 2, 'Eliminar uma marca', NULL, NULL, 1641262329, 1641262329),
('eliminarMusica', 2, 'Eliminar uma musica', NULL, NULL, 1641262329, 1641262329),
('eliminarPerfil', 2, 'Eliminar um Perfil', NULL, NULL, 1641262329, 1641262329),
('eliminarProduto', 2, 'Eliminar um produto', NULL, NULL, 1641262329, 1641262329),
('eliminarSubCategoria', 2, 'Eliminar uma Subcategoria', NULL, NULL, 1641262329, 1641262329),
('eliminarTipoInformacao', 2, 'Eliminar uma TipoInformacao', NULL, NULL, 1641262329, 1641262329),
('eliminarUtilizador', 2, 'Eliminar um Utilizador', NULL, NULL, 1641262329, 1641262329),
('Gestor de loja', 1, NULL, NULL, NULL, 1641262329, 1641262329),
('verAlbum', 2, 'Ver um album', NULL, NULL, 1641262329, 1641262329),
('verArtista', 2, 'Ver um Artista', NULL, NULL, 1641262329, 1641262329),
('verCategoria', 2, 'Ver uma categoria', NULL, NULL, 1641262329, 1641262329),
('verDemonstracao', 2, 'Ver uma Demonstração', NULL, NULL, 1641262329, 1641262329),
('verEncomenda', 2, 'Ver uma encomenda', NULL, NULL, 1641262329, 1641262329),
('verEvento', 2, 'Ver um evento', NULL, NULL, 1641262329, 1641262329),
('verImagem', 2, 'Ver uma Imagem', NULL, NULL, 1641262329, 1641262329),
('verMarca', 2, 'Ver uma marca', NULL, NULL, 1641262329, 1641262329),
('verMusica', 2, 'Ver uma musica', NULL, NULL, 1641262329, 1641262329),
('verPerfil', 2, 'Ver um Perfil', NULL, NULL, 1641262329, 1641262329),
('verProduto', 2, 'Ver um produto', NULL, NULL, 1641262329, 1641262329),
('verSubCategoria', 2, 'Ver uma Subcategoria', NULL, NULL, 1641262329, 1641262329),
('verTipoInformacao', 2, 'Ver uma TipoInformacao', NULL, NULL, 1641262329, 1641262329),
('verUtilizador', 2, 'Ver um Utilizador', NULL, NULL, 1641262329, 1641262329);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Administrador', 'criarAlbum'),
('Gestor de loja', 'criarAlbum'),
('Administrador', 'criarArtista'),
('Gestor de loja', 'criarArtista'),
('Administrador', 'criarCategoria'),
('Gestor de loja', 'criarCategoria'),
('Administrador', 'criarDemonstracao'),
('Gestor de loja', 'criarDemonstracao'),
('Administrador', 'criarEncomenda'),
('Administrador', 'criarEvento'),
('Administrador', 'criarImagem'),
('Gestor de loja', 'criarImagem'),
('Administrador', 'criarMarca'),
('Gestor de loja', 'criarMarca'),
('Administrador', 'criarMusica'),
('Gestor de loja', 'criarMusica'),
('Administrador', 'criarPerfil'),
('Administrador', 'criarProduto'),
('Gestor de loja', 'criarProduto'),
('Administrador', 'criarSubCategoria'),
('Gestor de loja', 'criarSubCategoria'),
('Administrador', 'criarTipoInformacao'),
('Apoio ao cliente', 'criarTipoInformacao'),
('Cliente', 'criarTipoInformacao'),
('Administrador', 'criarUtilizador'),
('Administrador', 'editarAlbum'),
('Gestor de loja', 'editarAlbum'),
('Administrador', 'editarArtista'),
('Gestor de loja', 'editarArtista'),
('Administrador', 'editarCategoria'),
('Gestor de loja', 'editarCategoria'),
('Administrador', 'editarDemonstracao'),
('Gestor de loja', 'editarDemonstracao'),
('Administrador', 'editarEncomenda'),
('Apoio ao cliente', 'editarEncomenda'),
('Cliente', 'editarEncomenda'),
('Gestor de loja', 'editarEncomenda'),
('Administrador', 'editarEvento'),
('Administrador', 'editarImagem'),
('Gestor de loja', 'editarImagem'),
('Administrador', 'editarMarca'),
('Gestor de loja', 'editarMarca'),
('Administrador', 'editarMusica'),
('Gestor de loja', 'editarMusica'),
('Administrador', 'editarPerfil'),
('Cliente', 'editarPerfil'),
('Administrador', 'editarProduto'),
('Gestor de loja', 'editarProduto'),
('Administrador', 'editarSubCategoria'),
('Gestor de loja', 'editarSubCategoria'),
('Administrador', 'editarTipoInformacao'),
('Apoio ao cliente', 'editarTipoInformacao'),
('Administrador', 'editarUtilizador'),
('Administrador', 'eliminarAlbum'),
('Gestor de loja', 'eliminarAlbum'),
('Administrador', 'eliminarArtista'),
('Gestor de loja', 'eliminarArtista'),
('Administrador', 'eliminarCategoria'),
('Gestor de loja', 'eliminarCategoria'),
('Administrador', 'eliminarDemonstracao'),
('Gestor de loja', 'eliminarDemonstracao'),
('Administrador', 'eliminarEncomenda'),
('Apoio ao cliente', 'eliminarEncomenda'),
('Gestor de loja', 'eliminarEncomenda'),
('Administrador', 'eliminarEvento'),
('Administrador', 'eliminarImagem'),
('Gestor de loja', 'eliminarImagem'),
('Administrador', 'eliminarMarca'),
('Gestor de loja', 'eliminarMarca'),
('Administrador', 'eliminarMusica'),
('Gestor de loja', 'eliminarMusica'),
('Administrador', 'eliminarPerfil'),
('Administrador', 'eliminarProduto'),
('Gestor de loja', 'eliminarProduto'),
('Administrador', 'eliminarSubCategoria'),
('Gestor de loja', 'eliminarSubCategoria'),
('Administrador', 'eliminarTipoInformacao'),
('Apoio ao cliente', 'eliminarTipoInformacao'),
('Administrador', 'eliminarUtilizador'),
('Administrador', 'verAlbum'),
('Apoio ao cliente', 'verAlbum'),
('Cliente', 'verAlbum'),
('Gestor de loja', 'verAlbum'),
('Administrador', 'verArtista'),
('Apoio ao cliente', 'verArtista'),
('Cliente', 'verArtista'),
('Gestor de loja', 'verArtista'),
('Administrador', 'verCategoria'),
('Apoio ao cliente', 'verCategoria'),
('Cliente', 'verCategoria'),
('Gestor de loja', 'verCategoria'),
('Administrador', 'verDemonstracao'),
('Cliente', 'verDemonstracao'),
('Gestor de loja', 'verDemonstracao'),
('Administrador', 'verEncomenda'),
('Apoio ao cliente', 'verEncomenda'),
('Cliente', 'verEncomenda'),
('Gestor de loja', 'verEncomenda'),
('Administrador', 'verEvento'),
('Apoio ao cliente', 'verEvento'),
('Cliente', 'verEvento'),
('Administrador', 'verImagem'),
('Apoio ao cliente', 'verImagem'),
('Cliente', 'verImagem'),
('Gestor de loja', 'verImagem'),
('Administrador', 'verMarca'),
('Apoio ao cliente', 'verMarca'),
('Cliente', 'verMarca'),
('Gestor de loja', 'verMarca'),
('Administrador', 'verMusica'),
('Apoio ao cliente', 'verMusica'),
('Cliente', 'verMusica'),
('Gestor de loja', 'verMusica'),
('Administrador', 'verPerfil'),
('Cliente', 'verPerfil'),
('Administrador', 'verProduto'),
('Apoio ao cliente', 'verProduto'),
('Cliente', 'verProduto'),
('Gestor de loja', 'verProduto'),
('Administrador', 'verSubCategoria'),
('Apoio ao cliente', 'verSubCategoria'),
('Cliente', 'verSubCategoria'),
('Gestor de loja', 'verSubCategoria'),
('Administrador', 'verTipoInformacao'),
('Apoio ao cliente', 'verTipoInformacao'),
('Administrador', 'verUtilizador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `idproduto` int NOT NULL,
  `idperfil` int NOT NULL,
  `estrelas` int DEFAULT NULL,
  `comentario` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idproduto`,`idperfil`),
  KEY `fk_produtos_has_perfis_perfis1_idx` (`idperfil`),
  KEY `fk_produtos_has_perfis_produtos1_idx` (`idproduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `idperfil` int NOT NULL,
  `idproduto` int NOT NULL,
  `quantidade` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`idperfil`,`idproduto`),
  KEY `fk_perfis_has_produtos_produtos2_idx` (`idproduto`),
  KEY `fk_perfis_has_produtos_perfis2_idx` (`idperfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Guitarras'),
(2, 'Baterias'),
(3, 'Teclas'),
(4, 'Sopros'),
(5, 'Clássicos'),
(6, 'Tradicionais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `demonstracoes`
--

DROP TABLE IF EXISTS `demonstracoes`;
CREATE TABLE IF NOT EXISTS `demonstracoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idproduto` int NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_demonstracoes_produtos1_idx` (`idproduto`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `demonstracoes`
--

INSERT INTO `demonstracoes` (`id`, `idproduto`, `nome`) VALUES
(1, 3, '010422023241.mp3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas`
--

DROP TABLE IF EXISTS `encomendas`;
CREATE TABLE IF NOT EXISTS `encomendas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idperfil` int NOT NULL,
  `estado` enum('Em Processamento','Expedido','Entregue','Pronto para Levantamento','Cancelada','Erro') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pago` tinyint NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `tipoexpedicao` enum('Levantamento em loja','Envio') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_encomendas_perfis1_idx` (`idperfil`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendasprodutos`
--

DROP TABLE IF EXISTS `encomendasprodutos`;
CREATE TABLE IF NOT EXISTS `encomendasprodutos` (
  `idencomenda` int NOT NULL,
  `idproduto` int NOT NULL,
  `quantidade` int NOT NULL,
  PRIMARY KEY (`idencomenda`,`idproduto`),
  KEY `fk_encomendas_has_produtos_produtos1_idx` (`idproduto`),
  KEY `fk_encomendas_has_produtos_encomendas1_idx` (`idencomenda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lotacao` int NOT NULL,
  `descricao` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL,
  `horainicio` time NOT NULL,
  `horafim` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `lotacao`, `descricao`, `data`, `horainicio`, `horafim`) VALUES
(1, 25, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-01-04', '09:00:00', '11:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventosperfis`
--

DROP TABLE IF EXISTS `eventosperfis`;
CREATE TABLE IF NOT EXISTS `eventosperfis` (
  `idevento` int NOT NULL,
  `idperfil` int NOT NULL,
  PRIMARY KEY (`idevento`,`idperfil`),
  KEY `fk_eventos_has_perfis_perfis1_idx` (`idperfil`),
  KEY `fk_eventos_has_perfis_eventos1_idx` (`idevento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

DROP TABLE IF EXISTS `imagens`;
CREATE TABLE IF NOT EXISTS `imagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `idproduto` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_imagens_produtos1_idx` (`idproduto`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `nome`, `idproduto`) VALUES
(1, '010422022358.jpg', 1),
(2, '010422022452.jpg', 2),
(3, '010422022525.jpg', 3),
(4, '010422022706.jpg', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`id`, `nome`) VALUES
(1, 'Yamaha'),
(2, 'Roland'),
(3, 'Casio'),
(4, 'Marca branca');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1641262299),
('m130524_201442_init', 1641262300),
('m190124_110200_add_verification_token_column_to_user_table', 1641262300),
('m140506_102106_rbac_init', 1641262324),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1641262324),
('m180523_151638_rbac_updates_indexes_without_prefix', 1641262324),
('m200409_110543_rbac_update_mssql_trigger', 1641262324),
('m211204_144735_init_rbac', 1641262329);

-- --------------------------------------------------------

--
-- Estrutura da tabela `musicas`
--

DROP TABLE IF EXISTS `musicas`;
CREATE TABLE IF NOT EXISTS `musicas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ficheiro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idalbuns` int NOT NULL,
  PRIMARY KEY (`id`,`idalbuns`),
  KEY `fk_musicas_albuns1_idx` (`idalbuns`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `musicas`
--

INSERT INTO `musicas` (`id`, `nome`, `ficheiro`, `idalbuns`) VALUES
(1, 'Nós Pimba', '010422022742.ogg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

DROP TABLE IF EXISTS `notificacoes`;
CREATE TABLE IF NOT EXISTS `notificacoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mensagem` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `datatime` datetime NOT NULL,
  `expiracao` datetime NOT NULL,
  `idperfil` int NOT NULL,
  `idproduto` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notificacoes_produtosfavoritos1_idx` (`idperfil`,`idproduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='	';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidosdecontacto`
--

DROP TABLE IF EXISTS `pedidosdecontacto`;
CREATE TABLE IF NOT EXISTS `pedidosdecontacto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idproblema` int NOT NULL,
  `idperfil` int NOT NULL,
  `mensagem` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_problemas_has_perfis_perfis1_idx` (`idperfil`),
  KEY `fk_problemas_has_perfis_problemas1_idx` (`idproblema`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfis`
--

DROP TABLE IF EXISTS `perfis`;
CREATE TABLE IF NOT EXISTS `perfis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `iduser` int NOT NULL,
  `nome` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nif` varchar(9) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `endereco` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `cidade` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `codigopostal` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `telefone` varchar(9) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`,`iduser`),
  UNIQUE KEY `telefone_UNIQUE` (`telefone`),
  KEY `fk_perfis_user1_idx` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `perfis`
--

INSERT INTO `perfis` (`id`, `iduser`, `nome`, `nif`, `endereco`, `cidade`, `codigopostal`, `telefone`) VALUES
(1, 1, 'admin', NULL, NULL, NULL, NULL, NULL),
(2, 2, 'gestor', NULL, NULL, NULL, NULL, NULL),
(3, 3, 'apoio', NULL, NULL, NULL, NULL, NULL),
(4, 4, 'cliente', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idsubcategoria` int NOT NULL,
  `idmarca` int NOT NULL,
  `nome` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `descricao` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `usado` tinyint NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produtos_table11_idx` (`idmarca`),
  KEY `fk_subcategorias_table13_idx` (`idsubcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `idsubcategoria`, `idmarca`, `nome`, `descricao`, `usado`, `preco`, `stock`) VALUES
(1, 1, 1, 'Guitarra Clássica Yamaha C40II', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '200.00', 18),
(2, 1, 4, 'Guitarra Clássica, Exemplo 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '50.00', 300),
(3, 5, 2, 'Piano Digital RSP20CR', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '799.00', 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtosfavoritos`
--

DROP TABLE IF EXISTS `produtosfavoritos`;
CREATE TABLE IF NOT EXISTS `produtosfavoritos` (
  `idperfil` int NOT NULL,
  `idproduto` int NOT NULL,
  PRIMARY KEY (`idperfil`,`idproduto`),
  KEY `fk_perfis_has_produtos_produtos1_idx` (`idproduto`),
  KEY `fk_perfis_has_produtos_perfis1_idx` (`idperfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategorias`
--

DROP TABLE IF EXISTS `subcategorias`;
CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idcategoria` int NOT NULL,
  `nome` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subcategoria_categorias_idx` (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `idcategoria`, `nome`) VALUES
(1, 1, 'Guitarras Clássicas'),
(2, 1, 'Guitarras Acústicas'),
(3, 1, 'Guitarras Elétricas'),
(4, 3, 'Piano'),
(5, 3, 'Piano Digital'),
(6, 3, 'Sintetizador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoinformacoes`
--

DROP TABLE IF EXISTS `tipoinformacoes`;
CREATE TABLE IF NOT EXISTS `tipoinformacoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tipo` enum('Problema','Informação') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tipoinformacoes`
--

INSERT INTO `tipoinformacoes` (`id`, `nome`, `tipo`) VALUES
(1, 'Erro no site', 'Problema'),
(2, 'Encomenda', 'Problema'),
(3, 'Encomenda', 'Informação'),
(4, 'Produto', 'Informação'),
(5, 'Produto', 'Problema'),
(6, 'Duvida Geral', 'Informação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'hfV3hXbi8MV46rXT53JM7kdnJr4fzZyO', '$2y$13$/rPY6pf6CtCu8CLIn9wdzeu35P/XKkjcexbQYYIdfn2H.rukYaFUu', NULL, 'admin@leirisymphony.com', 10, 1641262495, 1641262495, NULL),
(2, 'gestor', 'A0UDCGqC4qSHD4WkC7G4ZLwyvr6XlqjQ', '$2y$13$rs7anpKdARoLTk3QQVottOdfG6L2I3RZf7LfU.uVBXMxG4sCN9jnS', NULL, 'gestor@leirisymphony.com', 10, 1641262515, 1641262515, NULL),
(3, 'apoio', 'tjjzeiH-4QeYd6ukDP8zGnXIb6zNpWpO', '$2y$13$wQqzP9JiLALKPW/Dhv8BeuCBgdneglegRxImjbA.FNXL7ZWA5mVWy', NULL, 'apoio@leirisymphony.com', 10, 1641262532, 1641262532, NULL),
(4, 'cliente', '2lRPMgXme5pS8FOV4HwfbteQWSnKmJgq', '$2y$13$eWF.QcZsskvAEM6O58KooeKKbsa1wls9IKxqgLRLyw2xXTpgwJfkm', NULL, 'cliente@gmail.com', 10, 1641262548, 1641262548, NULL);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `albuns`
--
ALTER TABLE `albuns`
  ADD CONSTRAINT `fk_albuns_imagens1` FOREIGN KEY (`idimagem`) REFERENCES `imagens` (`id`);

--
-- Limitadores para a tabela `albunsartistas`
--
ALTER TABLE `albunsartistas`
  ADD CONSTRAINT `fk_albuns_has_artistas_albuns1` FOREIGN KEY (`idalbum`) REFERENCES `albuns` (`id`),
  ADD CONSTRAINT `fk_albuns_has_artistas_artistas1` FOREIGN KEY (`idartista`) REFERENCES `artistas` (`id`);

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fk_produtos_has_perfis_perfis1` FOREIGN KEY (`idperfil`) REFERENCES `perfis` (`id`),
  ADD CONSTRAINT `fk_produtos_has_perfis_produtos1` FOREIGN KEY (`idproduto`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `fk_perfis_has_produtos_perfis2` FOREIGN KEY (`idperfil`) REFERENCES `perfis` (`id`),
  ADD CONSTRAINT `fk_perfis_has_produtos_produtos2` FOREIGN KEY (`idproduto`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `demonstracoes`
--
ALTER TABLE `demonstracoes`
  ADD CONSTRAINT `fk_demonstracoes_produtos1` FOREIGN KEY (`idproduto`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `encomendas`
--
ALTER TABLE `encomendas`
  ADD CONSTRAINT `fk_encomendas_perfis1` FOREIGN KEY (`idperfil`) REFERENCES `perfis` (`id`);

--
-- Limitadores para a tabela `encomendasprodutos`
--
ALTER TABLE `encomendasprodutos`
  ADD CONSTRAINT `fk_encomendas_has_produtos_encomendas1` FOREIGN KEY (`idencomenda`) REFERENCES `encomendas` (`id`),
  ADD CONSTRAINT `fk_encomendas_has_produtos_produtos1` FOREIGN KEY (`idproduto`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `eventosperfis`
--
ALTER TABLE `eventosperfis`
  ADD CONSTRAINT `fk_eventos_has_perfis_eventos1` FOREIGN KEY (`idevento`) REFERENCES `eventos` (`id`),
  ADD CONSTRAINT `fk_eventos_has_perfis_perfis1` FOREIGN KEY (`idperfil`) REFERENCES `perfis` (`id`);

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `fk_imagens_produtos1` FOREIGN KEY (`idproduto`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `musicas`
--
ALTER TABLE `musicas`
  ADD CONSTRAINT `fk_musicas_albuns1` FOREIGN KEY (`idalbuns`) REFERENCES `albuns` (`id`);

--
-- Limitadores para a tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD CONSTRAINT `fk_notificacoes_produtosfavoritos1` FOREIGN KEY (`idperfil`,`idproduto`) REFERENCES `produtosfavoritos` (`idperfil`, `idproduto`);

--
-- Limitadores para a tabela `pedidosdecontacto`
--
ALTER TABLE `pedidosdecontacto`
  ADD CONSTRAINT `fk_problemas_has_perfis_perfis1` FOREIGN KEY (`idperfil`) REFERENCES `perfis` (`id`),
  ADD CONSTRAINT `fk_problemas_has_perfis_problemas1` FOREIGN KEY (`idproblema`) REFERENCES `tipoinformacoes` (`id`);

--
-- Limitadores para a tabela `perfis`
--
ALTER TABLE `perfis`
  ADD CONSTRAINT `fk_perfis_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_table11` FOREIGN KEY (`idmarca`) REFERENCES `marcas` (`id`),
  ADD CONSTRAINT `fk_subcategorias_table13` FOREIGN KEY (`idsubcategoria`) REFERENCES `subcategorias` (`id`);

--
-- Limitadores para a tabela `produtosfavoritos`
--
ALTER TABLE `produtosfavoritos`
  ADD CONSTRAINT `fk_perfis_has_produtos_perfis1` FOREIGN KEY (`idperfil`) REFERENCES `perfis` (`id`),
  ADD CONSTRAINT `fk_perfis_has_produtos_produtos1` FOREIGN KEY (`idproduto`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `fk_subcategoria_categorias` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
