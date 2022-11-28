-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Nov-2022 às 22:42
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
  (3, 'infantil'),
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
--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (
    `id`,
    `nome`,
    `email`,
    `data_nascimento`,
    `cpf`,
    `endereco`,
    `bairro`,
    `id_estados`,
    `data_cadastro`
  )
VALUES (
    1,
    'Anderson Teixeira',
    'anderson@gmail.com',
    '07/08/1990',
    '78945612322',
    'Rua das Neves',
    'Centro',
    19,
    '2022-10-20'
  ),
  (
    3,
    'Jose da Silva',
    'jose.silva@gmail.com',
    '08/09/1981',
    '11122233344',
    'Rua A',
    'centro',
    19,
    '2022-11-02'
  );
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
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
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
--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (
    `id`,
    `razao_social`,
    `nome_fantasia`,
    `cnpj`,
    `representante`,
    `email`,
    `endereco`,
    `bairro`,
    `id_estados`,
    `atividade`,
    `data_cadastro`
  )
VALUES (
    1,
    'OOBJ TECNOLOGIA DA INFORMAÇÃO',
    'OOBJ',
    '99.999.999/9999',
    'JORGE CALDAS',
    'FINANCEIRO@ESALRES.COM.BR',
    'R 111 ESQ. C/RUA 88, 335',
    'SETOR SUL',
    9,
    'DESENVOLVIMENTO DE PROGRAMAS DE COMPUTADOR',
    '2022-10-20'
  ),
  (
    2,
    'Amanda Alves Pereira',
    'Shein Store',
    '40.355.838/0001',
    'Amanda Alves Pereira',
    'sheinstory@gmail.com',
    '',
    '',
    14,
    'Promoção de vendas',
    '2022-10-26'
  );
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
--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (
    `id`,
    `nome`,
    `email`,
    `data_nascimento`,
    `cpf`,
    `endereco`,
    `bairro`,
    `id_estados`,
    `id_cargo`,
    `ativo`,
    `data_cadastro`
  )
VALUES (
    3,
    'Marcello de Souza Bandeira',
    'msbandeira@firjan.com.br',
    '08/09/1981',
    '05335069724',
    'Travessa João Ribeiro',
    'Muquca',
    19,
    1,
    'S',
    '2022-10-20'
  ),
  (
    4,
    'Julio da Silva',
    'julio.silva@hotmail.com',
    '16/06/1997',
    '12345678900',
    'Endereço da minha casa',
    'no meu bairro',
    19,
    1,
    'S',
    '2022-10-20'
  );
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
--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (
    `id`,
    `id_pedido`,
    `id_vendedor`,
    `id_cliente`,
    `id_produto`,
    `quantidade`,
    `valor`,
    `venda`,
    `data_cadastro`
  )
VALUES (1, 2, 1, 3, 1, 99, 29.8, 'S', '2022-11-02'),
  (2, 2, 1, 3, 1, 99, 29.8, 'S', '2022-11-02'),
  (3, 3, 1, 3, 1, 99, 29.8, 'S', '2022-11-02'),
  (4, 3, 1, 3, 1, 99, 29.8, 'S', '2022-11-02'),
  (5, 4, 1, 3, 1, 99, 29.8, 'S', '2022-11-02'),
  (6, 4, 1, 3, 1, 99, 29.8, 'S', '2022-11-02'),
  (7, 5, 1, 1, 1, 99, 29.8, 'S', '2022-11-02'),
  (8, 5, 1, 3, 1, 99, 29.8, 'S', '2022-11-02'),
  (9, 6, 1, 1, 1, 99, 29.8, 'S', '2022-11-02'),
  (10, 6, 1, 1, 1, 99, 29.8, 'S', '2022-11-02'),
  (11, 6, 1, 1, 1, 99, 29.8, 'S', '2022-11-02'),
  (12, 6, 1, 1, 1, 99, 29.8, 'S', '2022-11-02'),
  (13, 6, 1, 1, 1, 99, 29.8, 'S', '2022-11-02'),
  (14, 6, 1, 1, 1, 99, 29.8, 'S', '2022-11-02'),
  (15, 6, 1, 1, 1, 99, 29.8, 'S', '2022-11-02'),
  (16, 6, 1, 1, 1, 99, 29.8, 'S', '2022-11-02'),
  (17, 7, 1, 3, 1, 99, 29.8, 'S', '2022-11-02'),
  (18, 7, 1, 3, 1, 99, 29.8, 'S', '2022-11-02');
-- --------------------------------------------------------
--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) COLLATE latin1_bin NOT NULL,
  `codigo` varchar(20) COLLATE latin1_bin NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `id_sub_categoria` int(10) NOT NULL,
  `id_fornecedor` int(10) NOT NULL,
  `ativo` varchar(2) COLLATE latin1_bin NOT NULL,
  `data_cadastro` date NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_bin;
--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (
    `id`,
    `nome`,
    `codigo`,
    `id_categoria`,
    `id_sub_categoria`,
    `id_fornecedor`,
    `ativo`,
    `data_cadastro`
  )
VALUES (
    1,
    'Camisa Polo Ultimato - M',
    '06Z-0052-040',
    1,
    3,
    1,
    'S',
    '2022-10-25'
  ),
  (
    2,
    'GAVEN Calça Mom Jeans Feminina Cintura Alta Tecido Grosso 10',
    '2207281511712314',
    2,
    2,
    2,
    'S',
    '2022-10-26'
  ),
  (
    3,
    'Regata Masculina Camiseta Lisa Básica Algodão - Masculino - ',
    '70P-0017-006-02',
    1,
    3,
    2,
    'S',
    '2022-10-27'
  );
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
  (4, 'Acessorios', 1),
  (5, 'Tenis', 2),
  (6, 'Calça', 2),
  (7, 'Roupa', 2),
  (8, 'Acessorios', 2),
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
  `senha` varchar(30) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) DEFAULT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (
    `id`,
    `senha`,
    `data_cadastro`,
    `email`,
    `id_cargo`
  )
VALUES (
    1,
    '123456',
    '2022-11-12 13:12:15',
    'kachingadmin@kaching.com',
    1
  ),
  (
    2,
    'senha',
    '2022-11-15 01:28:37',
    'fulana@hotmail.com',
    2
  );
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
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
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
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;
--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;
--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;
--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 19;
--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 7;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;