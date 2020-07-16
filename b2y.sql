-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jul-2020 às 21:09
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `b2y`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `convidados`
--

CREATE TABLE `convidados` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `convidados`
--

INSERT INTO `convidados` (`id`, `nome`) VALUES
(10, 'Ana'),
(11, 'André'),
(12, 'Bia'),
(13, 'João'),
(14, 'Julia'),
(15, 'Marcelo'),
(16, 'Murilo'),
(17, 'Pedro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista`
--

CREATE TABLE `lista` (
  `id` int(11) NOT NULL,
  `produto` varchar(50) NOT NULL DEFAULT '',
  `preco` float NOT NULL DEFAULT 0,
  `qnt` int(11) NOT NULL,
  `comprado` tinyint(4) DEFAULT 0,
  `dividido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lista`
--

INSERT INTO `lista` (`id`, `produto`, `preco`, `qnt`, `comprado`, `dividido`) VALUES
(1, 'Pepsi', 4.39, 2, 0, 5),
(2, 'Coca-cola', 6.49, 2, 0, 4),
(3, 'Tang - Morango', 0.79, 3, 0, 2),
(4, 'Romarinho', 1.89, 24, 0, 4),
(5, 'Monster', 5.79, 6, 0, 6),
(6, 'Skol beats', 3.99, 7, 0, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `produto` int(11) NOT NULL,
  `preco` float NOT NULL,
  `dividido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `nome`, `produto`, `preco`, `dividido`) VALUES
(41, 'Ana', 1, 8.78, 5),
(42, 'Ana', 2, 12.98, 4),
(43, 'Ana', 3, 0, 2),
(44, 'Ana', 4, 45.36, 4),
(45, 'Ana', 5, 0, 6),
(46, 'Ana', 6, 0, 3),
(56, 'André', 1, 8.78, 5),
(57, 'André', 2, 0, 4),
(58, 'André', 3, 0, 2),
(59, 'André', 4, 0, 4),
(60, 'André', 5, 34.74, 6),
(61, 'André', 6, 0, 3),
(62, 'Bia', 1, 8.78, 5),
(63, 'Bia', 2, 12.98, 4),
(64, 'Bia', 3, 0, 2),
(65, 'Bia', 4, 0, 4),
(66, 'Bia', 5, 34.74, 6),
(67, 'Bia', 6, 27.93, 3),
(68, 'João', 1, 0, 5),
(69, 'João', 2, 12.98, 4),
(70, 'João', 3, 0, 2),
(71, 'João', 4, 0, 4),
(72, 'João', 5, 34.74, 6),
(73, 'João', 6, 0, 3),
(74, 'Julia', 1, 0, 5),
(75, 'Julia', 2, 0, 4),
(76, 'Julia', 3, 2.37, 2),
(77, 'Julia', 4, 0, 4),
(78, 'Julia', 5, 0, 6),
(79, 'Julia', 6, 0, 3),
(80, 'Marcelo', 1, 8.78, 5),
(81, 'Marcelo', 2, 0, 4),
(82, 'Marcelo', 3, 0, 2),
(83, 'Marcelo', 4, 45.36, 4),
(84, 'Marcelo', 5, 34.74, 6),
(85, 'Marcelo', 6, 0, 3),
(86, 'Murilo', 1, 0, 5),
(87, 'Murilo', 2, 0, 4),
(88, 'Murilo', 3, 2.37, 2),
(89, 'Murilo', 4, 45.36, 4),
(90, 'Murilo', 5, 34.74, 6),
(91, 'Murilo', 6, 27.93, 3),
(92, 'Pedro', 1, 8.78, 5),
(93, 'Pedro', 2, 12.98, 4),
(94, 'Pedro', 3, 0, 2),
(95, 'Pedro', 4, 45.36, 4),
(96, 'Pedro', 5, 34.74, 6),
(97, 'Pedro', 6, 27.93, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `precos`
--

CREATE TABLE `precos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `id_produto` int(11) NOT NULL DEFAULT 0,
  `produto` varchar(255) NOT NULL DEFAULT '0',
  `preco` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `convidados`
--
ALTER TABLE `convidados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `precos`
--
ALTER TABLE `precos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `convidados`
--
ALTER TABLE `convidados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `lista`
--
ALTER TABLE `lista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
