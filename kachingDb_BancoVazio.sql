-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Nov-2022 às 00:34
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Banco de dados: `kaching_db`
--

-- --------------------------------------------------------
--
-- Estrutura da tabela `aux`
--

CREATE TABLE `aux` (
  `id` int(11) NOT NULL,
  `id_aux` int(20) NOT NULL,
  `data_cadastro` date NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_bin;
--
-- Extraindo dados da tabela `aux`
--

INSERT INTO `aux` (`id`, `id_aux`, `data_cadastro`)
VALUES (1, 1, '2022-11-02'),
  (2, 1, '2022-11-02'),
  (3, 1, '2022-11-02'),
  (4, 1, '2022-11-02'),
  (5, 1, '2022-11-02'),
  (6, 1, '2022-11-02'),
  (7, 1, '2022-11-15');
-- --------------------------------------------------------
--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id` int(10) NOT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id`, `nome`)
VALUES (1, 'Gerente'),
  (2, 'Vendedor');
-- --------------------------------------------------------
--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) COLLATE latin1_bin NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_bin;
--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`)
VALUES (1, 'Masculino'),
  (2, 'Feminino'),
  (3, 'Infantil'),
  (4, 'Esportes'),
  (5, 'Calçados'),
  (6, 'Roupas'),
  (7, 'Suplementos');
-- --------------------------------------------------------
--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) COLLATE latin1_bin NOT NULL,
  `email` varchar(60) COLLATE latin1_bin NOT NULL,
  `data_nascimento` varchar(10) COLLATE latin1_bin NOT NULL,
  `cpf` varchar(14) COLLATE latin1_bin NOT NULL,
  `endereco` varchar(60) COLLATE latin1_bin NOT NULL,
  `bairro` varchar(30) COLLATE latin1_bin NOT NULL,
  `id_estados` int(11) NOT NULL,
  `data_cadastro` date NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_bin;
-- --------------------------------------------------------
--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nome` varchar(75) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `ibge` int(2) DEFAULT NULL,
  `pais` int(3) DEFAULT NULL,
  `ddd` varchar(50) DEFAULT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COMMENT = 'Unidades Federativas';
--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id`, `nome`, `uf`, `ibge`, `pais`, `ddd`)
VALUES (1, 'Acre', 'AC', 12, 1, '68'),
  (2, 'Alagoas', 'AL', 27, 1, '82'),
  (3, 'Amazonas', 'AM', 13, 1, '97,92'),
  (4, 'Amapá', 'AP', 16, 1, '96'),
  (5, 'Bahia', 'BA', 29, 1, '77,75,73,74,71'),
  (6, 'Ceará', 'CE', 23, 1, '88,85'),
  (7, 'Distrito Federal', 'DF', 53, 1, '61'),
  (8, 'Espírito Santo', 'ES', 32, 1, '28,27'),
  (9, 'Goiás', 'GO', 52, 1, '62,64,61'),
  (10, 'Maranhão', 'MA', 21, 1, '99,98'),
  (
    11,
    'Minas Gerais',
    'MG',
    31,
    1,
    '34,37,31,33,35,38,32'
  ),
  (12, 'Mato Grosso do Sul', 'MS', 50, 1, '67'),
  (13, 'Mato Grosso', 'MT', 51, 1, '65,66'),
  (14, 'Pará', 'PA', 15, 1, '91,94,93'),
  (15, 'Paraíba', 'PB', 25, 1, '83'),
  (16, 'Pernambuco', 'PE', 26, 1, '81,87'),
  (17, 'Piauí', 'PI', 22, 1, '89,86'),
  (18, 'Paraná', 'PR', 41, 1, '43,41,42,44,45,46'),
  (19, 'Rio de Janeiro', 'RJ', 33, 1, '24,22,21'),
  (20, 'Rio Grande do Norte', 'RN', 24, 1, '84'),
  (21, 'Rondônia', 'RO', 11, 1, '69'),
  (22, 'Roraima', 'RR', 14, 1, '95'),
  (
    23,
    'Rio Grande do Sul',
    'RS',
    43,
    1,
    '53,54,55,51'
  ),
  (24, 'Santa Catarina', 'SC', 42, 1, '47,48,49'),
  (25, 'Sergipe', 'SE', 28, 1, '79'),
  (
    26,
    'São Paulo',
    'SP',
    35,
    1,
    '11,12,13,14,15,16,17,18,19'
  ),
  (27, 'Tocantins', 'TO', 17, 1, '63'),
  (99, 'Exterior', 'EX', 99, NULL, NULL);
-- --------------------------------------------------------
--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(10) NOT NULL,
  `id_produto` int(10) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `id_sub_categoria` int(10) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `movimentacao` varchar(10) COLLATE latin1_bin NOT NULL,
  `data_cadastro` date NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_bin;
--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (
    `id`,
    `id_produto`,
    `id_categoria`,
    `id_sub_categoria`,
    `quantidade`,
    `movimentacao`,
    `data_cadastro`
  )
VALUES (1, 2, 2, 2, 10, 'ENTRADA', '2022-10-27'),
  (2, 3, 1, 3, 20, 'ENTRADA', '2022-10-27'),
  (3, 2, 2, 2, 15, 'ENTRADA', '2022-10-27'),
  (4, 3, 1, 3, 30, 'ENTRADA', '2022-10-27');
-- --------------------------------------------------------
--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `razao_social` varchar(100) COLLATE latin1_bin NOT NULL,
  `nome_fantasia` varchar(100) COLLATE latin1_bin NOT NULL,
  `cnpj` varchar(18) COLLATE latin1_bin NOT NULL,
  `representante` varchar(60) COLLATE latin1_bin NOT NULL,
  `email` varchar(60) COLLATE latin1_bin NOT NULL,
  `endereco` varchar(60) COLLATE latin1_bin NOT NULL,
  `bairro` varchar(30) COLLATE latin1_bin NOT NULL,
  `id_estados` int(11) NOT NULL,
  `atividade` varchar(60) COLLATE latin1_bin NOT NULL,
  `data_cadastro` date NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_bin;
-- --------------------------------------------------------
--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_nascimento` varchar(10) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `id_estados` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `ativo` varchar(1) NOT NULL,
  `data_cadastro` date NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_pedido` int(20) NOT NULL,
  `id_vendedor` int(20) NOT NULL,
  `id_cliente` int(20) NOT NULL,
  `id_produto` int(20) NOT NULL,
  `quantidade` int(20) NOT NULL,
  `valor` float NOT NULL,
  `venda` varchar(2) COLLATE latin1_bin NOT NULL,
  `data_cadastro` date NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_bin;
-- --------------------------------------------------------
--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) COLLATE latin1_bin NOT NULL,
  `codigo` varchar(20) COLLATE latin1_bin NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `id_sub_categoria` int(10) NOT NULL,
  `id_fornecedor` int(10) NOT NULL,
  `ativo` varchar(2) COLLATE latin1_bin NOT NULL,
  `data_cadastro` date NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_bin;
-- --------------------------------------------------------
--
-- Estrutura da tabela `sub_categorias`
--

CREATE TABLE `sub_categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) COLLATE latin1_bin NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_bin;
--
-- Extraindo dados da tabela `sub_categorias`
--

INSERT INTO `sub_categorias` (`id`, `nome`, `id_categoria`)
VALUES (1, 'Tenis', 1),
  (2, 'Calça', 1),
  (3, 'Roupa', 1),
  (4, 'Acessórios', 1),
  (5, 'Tenis', 2),
  (6, 'Calça', 2),
  (7, 'Roupa', 2),
  (8, 'Acessórios', 2),
  (9, 'Meninos', 3),
  (10, 'Meninas', 3),
  (11, 'Tenis', 3);
-- --------------------------------------------------------
--
-- Estrutura da tabela `tb_precos`
--

CREATE TABLE `tb_precos` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor` float NOT NULL,
  `data_cadastro` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_bin;
-- --------------------------------------------------------
--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_cargo` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aux`
--
ALTER TABLE `aux`
ADD PRIMARY KEY (`id`);
--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
ADD PRIMARY KEY (`id`);
--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
ADD PRIMARY KEY (`id`);
--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
ADD PRIMARY KEY (`id`);
--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
ADD PRIMARY KEY (`id`);
--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
ADD PRIMARY KEY (`id`);
--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
ADD PRIMARY KEY (`id`);
--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
ADD PRIMARY KEY (`id`);
--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
ADD PRIMARY KEY (`id`);
--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
ADD PRIMARY KEY (`id`);
--
-- Índices para tabela `sub_categorias`
--
ALTER TABLE `sub_categorias`
ADD PRIMARY KEY (`id`);
--
-- Índices para tabela `tb_precos`
--
ALTER TABLE `tb_precos`
ADD PRIMARY KEY (`id`);
--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aux`
--
ALTER TABLE `aux`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 8;
--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 8;
--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;
--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `sub_categorias`
--
ALTER TABLE `sub_categorias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 12;
--
-- AUTO_INCREMENT de tabela `tb_precos`
--
ALTER TABLE `tb_precos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;