-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/04/2024 às 02:42
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd2504204`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbautor`
--

CREATE TABLE `tbautor` (
  `id` int(11) NOT NULL,
  `codAutor` varchar(50) DEFAULT NULL,
  `nomeAutor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbautor`
--

INSERT INTO `tbautor` (`id`, `codAutor`, `nomeAutor`) VALUES
(1, '220023199', 'Tiago Santos'),
(2, '01052002', 'Lucas Rafael'),
(3, '24052002', 'Nicolas Ribeiro'),
(4, '4819682', 'Carlos Augusto'),
(5, '4567821', 'gustavo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbgenero`
--

CREATE TABLE `tbgenero` (
  `id` int(11) NOT NULL,
  `codGenero` varchar(50) DEFAULT NULL,
  `nomeGenero` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbgenero`
--

INSERT INTO `tbgenero` (`id`, `codGenero`, `nomeGenero`) VALUES
(2, '2', 'Aventura'),
(3, '3', 'Comedia'),
(4, '4', 'Terror'),
(5, '5', 'Documentario'),
(7, '1', 'Ação');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblivro`
--

CREATE TABLE `tblivro` (
  `id` int(11) NOT NULL,
  `codLivro` varchar(50) DEFAULT NULL,
  `nomeLivro` varchar(100) DEFAULT NULL,
  `anoLancamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblivro`
--

INSERT INTO `tblivro` (`id`, `codLivro`, `nomeLivro`, `anoLancamento`) VALUES
(2, '10', 'Harry Potter', 2001),
(3, '12', 'A arte da Guerra', 1578),
(4, '25', 'Inception', 2006),
(5, '20', 'Pinoquio ', 1995),
(6, '52', 'Breaking Bad', 2009);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbautor`
--
ALTER TABLE `tbautor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tblivro`
--
ALTER TABLE `tblivro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbautor`
--
ALTER TABLE `tbautor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tblivro`
--
ALTER TABLE `tblivro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
