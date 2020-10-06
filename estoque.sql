-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Out-2020 às 21:10
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `id` int(11) NOT NULL,
  `atividade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`id`, `atividade`) VALUES
(1, 'Empunhar'),
(2, 'Tecer'),
(3, 'Trança'),
(4, 'Apregar Varanda'),
(5, 'Puxar Corda'),
(6, 'Apregar Etiqueta'),
(7, 'Gradear'),
(8, 'Torcer');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `endereco` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL DEFAULT '0',
  `cidade` varchar(30) NOT NULL,
  `telefone1` varchar(50) NOT NULL,
  `telefone2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `endereco`, `estado`, `cidade`, `telefone1`, `telefone2`) VALUES
(3, 'FRANCISCO ADALBERTO REBOUCAS F', 'rua sao', 'CE', 'Jaguaruana', '88992573851', '88944'),
(5, 'betinho', 'ddfd', 'ds', 'cascavel', 'dsas', 'sds'),
(6, 'Vanessa da Silva', 'yujn', '', 'pacajus', '', ''),
(7, 'AMANDA NIKAELE', 'NAO SEI', 'CEARA', 'JAGUAR', '123456', '123456789'),
(19, 'ivelto silva', 'fdgfdg', 'fgdf', 'fortaleza', 'gfdg', '88992062877'),
(21, 'MARIA ANTONIETA DA SILVA', 'SITIO SANTA LUZIA', 'CEARA', 'JAGUARUANA', '889547545', '8895445'),
(22, 'MARIA GISLENE DA SILVA', 'KLJASLK', 'LKJ', 'LKJLK', '', ''),
(23, 'MARIA DO CARMO', '', '', '', '', ''),
(24, 'ANA MARIA DA SILVA', '', '', '', '', ''),
(25, 'Amanda Jorgiana Oliveira Batista', '', '', '', '', ''),
(26, 'Francisco Adalberto Rebouças Filho', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `endereco` varchar(30) DEFAULT NULL,
  `funcao` varchar(30) DEFAULT NULL,
  `preco` varchar(30) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `telefone1` varchar(50) DEFAULT NULL,
  `telefone2` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordens`
--

CREATE TABLE `ordens` (
  `id` int(11) NOT NULL,
  `ordem` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `desconto` float DEFAULT NULL,
  `data_ordem` date DEFAULT NULL,
  `forma_pagamento` varchar(30) DEFAULT NULL,
  `parcelas` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ordens`
--

INSERT INTO `ordens` (`id`, `ordem`, `total`, `desconto`, `data_ordem`, `forma_pagamento`, `parcelas`, `id_cliente`) VALUES
(11, 102, 100, 0, '2020-10-02', 'parcelado', 2, 7),
(12, 103, 60, 0, '2020-10-02', 'avista', 0, 6),
(13, 104, 600, 0, '2020-10-02', 'avista', 0, 3),
(17, 105, 10, 0, '2020-10-06', 'avista', 0, 5),
(18, 106, 10, 0, '2020-10-06', 'avista', 0, 5),
(19, 107, 10, 0, '2020-10-06', 'avista', 0, 5),
(20, 108, 10, 0, '2020-10-06', 'avista', 0, 5),
(21, 109, 60, 0, '2020-10-06', 'avista', 0, 5),
(22, 110, 60, 0, '2020-10-06', 'avista', 0, 5),
(23, 111, 60, 0, '2020-10-06', 'avista', 0, 5),
(24, 112, 60, 0, '2020-10-06', 'avista', 0, 5),
(25, 113, 60, 0, '2020-10-06', 'avista', 0, 5),
(26, 114, 60, 0, '2020-10-06', 'avista', 0, 5),
(27, 115, 120, 0, '2020-10-06', 'avista', 0, 5),
(28, 116, 10, 0, '2020-10-06', 'cartao', 10, 5),
(29, 117, 10, 0, '2020-10-06', 'cartao', 8, 5),
(30, 118, 10, 0, '2020-10-06', 'cartao', 8, 5),
(31, 119, 10, 0, '2020-10-06', 'cartao', 8, 5),
(32, 120, 65, 0, '2020-10-06', 'cartao', 7, 5),
(33, 121, 65, 0, '2020-10-06', 'cartao', 4, 5),
(34, 122, 100, 0, '2020-10-28', 'avista', 0, 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `producao`
--

CREATE TABLE `producao` (
  `id` int(11) NOT NULL,
  `data_entrega` datetime DEFAULT NULL,
  `data_levada` datetime DEFAULT NULL,
  `setor` varchar(30) DEFAULT NULL,
  `id_colaborador` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `cor` varchar(30) DEFAULT NULL,
  `tamanho` varchar(30) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `varanda` varchar(30) DEFAULT NULL,
  `punho` varchar(30) DEFAULT NULL,
  `acabamento` varchar(20) DEFAULT NULL,
  `comprimento` varchar(10) DEFAULT NULL,
  `largura` varchar(10) DEFAULT NULL,
  `peso` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `cor`, `tamanho`, `quantidade`, `preco`, `varanda`, `punho`, `acabamento`, `comprimento`, `largura`, `peso`) VALUES
(1, 'REDE TIJUBANA', 'VERMELHA', 'GRANDE', 0, 60, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'REDE GIGANTE', 'AZUL', 'GIGANTE', 4, 100, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'REDE GIGANTE', 'VERDE', 'GIGANTE', 4, 100, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '$nome', '$cor', '$tamanho', 0, 60, '$varanda', '$punho', '$acabamento', '$comprimen', '$largura', '$peso'),
(5, 'Maria Bonita', 'Vemerlho/Preto', '15,8', 8, 65, '6 rosas', 'Corda', '1 grade', '5', '4', '2'),
(6, 'Jeans', 'Verde', 'PP', 0, 10, '6 rosas', 'Corda', 'tranca', '5', '4', '2'),
(7, 'Jeans', 'Verde', 'Média', 2, 10, '6 rosas', 'Corda', 'tranca', '5', '4', '2'),
(8, 'Jeans', 'Verde', 'Média', 5, 10, '6 rosas', 'Corda', 'tranca', '5', '4', '2'),
(9, 'Tijubana', 'Vemerlho/Preto', 'Média', 10, 65, '3 pano', 'Corda', '1 grade', '5', '4', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `token`) VALUES
(1, 'betinho', NULL, '$2y$10$4cZvruuTtznV050WJE4aLeYoaJH/yzY1YnsnndZxa/TTrx1Cfuuae', 'be0f0872d9117ae00efb9c4d11b0698d');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `ordem` int(11) NOT NULL DEFAULT 0,
  `preco_un` float DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `data_venda` date DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `ordem`, `preco_un`, `quantidade`, `total`, `data_venda`, `id_produto`, `id_cliente`) VALUES
(23, 100, 100, 2, 200, '2020-10-02', 3, 3),
(24, 100, 100, 1, 100, '2020-10-02', 2, 3),
(25, 100, 60, 3, 180, '2020-10-02', 1, 3),
(26, 101, 100, 2, 200, '2020-10-02', 2, 19),
(27, 101, 100, 1, 100, '2020-10-02', 3, 19),
(28, 101, 60, 3, 180, '2020-10-02', 1, 19),
(29, 102, 100, 1, 100, '2020-10-02', 2, 7),
(30, 103, 60, 1, 60, '2020-10-02', 1, 6),
(31, 104, 100, 5, 500, '2020-10-02', 2, 3),
(32, 104, 100, 1, 100, '2020-10-02', 3, 3),
(33, 106, 60, 3, 180, '2020-10-03', 1, 3),
(34, 107, 100, 1, 100, '2020-10-03', 2, 7),
(35, 106, 10, 1, 10, '2020-10-06', 6, 5),
(36, 107, 10, 1, 10, '0000-00-00', 6, 5),
(37, 108, 10, 1, 10, '0000-00-00', 7, 5),
(38, 109, 60, 1, 60, '0000-00-00', 4, 5),
(39, 114, 60, 1, 60, '2020-10-28', 4, 5),
(40, 115, 60, 2, 120, '2020-10-20', 4, 5),
(41, 116, 10, 1, 10, '0000-00-00', 6, 5),
(42, 117, 10, 1, 10, '0000-00-00', 6, 5),
(43, 118, 10, 1, 10, '0000-00-00', 7, 5),
(44, 119, 10, 1, 10, '0000-00-00', 7, 5),
(45, 120, 65, 1, 65, '0000-00-00', 5, 5),
(46, 121, 65, 1, 65, '2020-11-05', 5, 5),
(47, 122, 100, 1, 100, '2020-10-28', 3, 24);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ordens`
--
ALTER TABLE `ordens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `producao`
--
ALTER TABLE `producao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atividades`
--
ALTER TABLE `atividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ordens`
--
ALTER TABLE `ordens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `producao`
--
ALTER TABLE `producao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
