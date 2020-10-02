-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Out-2020 às 12:19
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
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id`, `id_produto`, `id_cliente`, `quantidade`) VALUES
(21, 3, 3, 2),
(22, 2, 3, 1),
(23, 1, 3, 3),
(24, 1, 3, 3),
(25, 2, 19, 1),
(26, 3, 19, 1),
(28, 1, 19, 3);

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
(19, 'ivelto silva', 'fdgfdg', 'fgdf', 'fortaleza', 'gfdg', '88992062877');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `funcao` varchar(30) DEFAULT NULL
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
  `total_desconto` float DEFAULT NULL,
  `data_ordem` datetime DEFAULT NULL,
  `forma_pagamento` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `tamanho` varchar(30) DEFAULT NULL,
  `cor` varchar(30) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `tamanho`, `cor`, `quantidade`, `preco`) VALUES
(1, 'REDE TIJUBANA', 'GRANDE', 'VERMELHA', 3, 60),
(2, 'REDE GIGANTE', 'GIGANTE', 'AZUL', 5, 100),
(3, 'REDE GIGANTE', 'GIGANTE', 'VERDE', 5, 100);

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
(1, 'betinho', NULL, '$2y$10$4cZvruuTtznV050WJE4aLeYoaJH/yzY1YnsnndZxa/TTrx1Cfuuae', 'f85e2d6938b37edb63b8994b25cbd9be');

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
  `data_venda` datetime DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

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
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ordens`
--
ALTER TABLE `ordens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `producao`
--
ALTER TABLE `producao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
