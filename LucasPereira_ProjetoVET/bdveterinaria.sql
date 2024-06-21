-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/06/2024 às 04:52
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdveterinaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbanimal`
--

CREATE TABLE `tbanimal` (
  `codAnimal` int(11) NOT NULL,
  `nomeAnimal` varchar(255) NOT NULL,
  `fotoAnimal` varchar(255) DEFAULT NULL,
  `codTipoAnimal` int(11) DEFAULT NULL,
  `codCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbanimal`
--

INSERT INTO `tbanimal` (`codAnimal`, `nomeAnimal`, `fotoAnimal`, `codTipoAnimal`, `codCliente`) VALUES
(1, 'toto', 'toto.jpg', 1, 1),
(2, 'paçoca', 'paçoca.jpg', 2, 5),
(3, 'Mami', 'Mami.jpg', 5, 2),
(4, 'Kopa', 'Kopa.jpg', 3, 4),
(5, 'tonhão', 'tonhão', 4, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbatendimento`
--

CREATE TABLE `tbatendimento` (
  `codAtendimento` int(11) NOT NULL,
  `DataAtendimento` date NOT NULL,
  `HoraAtendimento` time NOT NULL,
  `codAnimal` int(11) DEFAULT NULL,
  `codVet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbatendimento`
--

INSERT INTO `tbatendimento` (`codAtendimento`, `DataAtendimento`, `HoraAtendimento`, `codAnimal`, `codVet`) VALUES
(1, '2024-05-01', '05:15:00', 1, 1),
(2, '2024-05-02', '09:15:00', 2, 2),
(3, '2024-05-02', '10:24:00', 3, 3),
(4, '2024-05-03', '09:58:00', 4, 4),
(5, '2024-05-03', '08:45:00', 5, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `codCliente` int(11) NOT NULL,
  `nomeCliente` varchar(255) NOT NULL,
  `telefoneCliente` varchar(20) DEFAULT NULL,
  `EmailCliente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbcliente`
--

INSERT INTO `tbcliente` (`codCliente`, `nomeCliente`, `telefoneCliente`, `EmailCliente`) VALUES
(1, 'Lucas Pereira', '48196922', 'lucas134@gmail.com'),
(2, 'Felipe Alvez', '40063282', 'felipe@gmail.com'),
(3, 'João Mario', '9554251542', 'joao123@gmail.com'),
(4, 'Luis Felipe', '48196922', 'luisfelipe@gmail.com'),
(5, 'Flavia ', '9768454813', 'flaviacampos@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbtipoanimal`
--

CREATE TABLE `tbtipoanimal` (
  `codTipoAnimal` int(11) NOT NULL,
  `tipoAnimal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbtipoanimal`
--

INSERT INTO `tbtipoanimal` (`codTipoAnimal`, `tipoAnimal`) VALUES
(1, 'Cachorro'),
(2, 'Gato'),
(3, 'Papagaio'),
(4, 'Porco'),
(5, 'Hamister');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbveterinario`
--

CREATE TABLE `tbveterinario` (
  `codVet` int(11) NOT NULL,
  `nomeVet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbveterinario`
--

INSERT INTO `tbveterinario` (`codVet`, `nomeVet`) VALUES
(1, 'Marcoo'),
(2, 'Luca'),
(3, 'Edgard'),
(4, 'Eduardo'),
(5, 'Ederlei');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD PRIMARY KEY (`codAnimal`),
  ADD KEY `codTipoAnimal` (`codTipoAnimal`),
  ADD KEY `codCliente` (`codCliente`);

--
-- Índices de tabela `tbatendimento`
--
ALTER TABLE `tbatendimento`
  ADD PRIMARY KEY (`codAtendimento`),
  ADD KEY `codAnimal` (`codAnimal`),
  ADD KEY `codVet` (`codVet`);

--
-- Índices de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`codCliente`),
  ADD UNIQUE KEY `EmailCliente` (`EmailCliente`);

--
-- Índices de tabela `tbtipoanimal`
--
ALTER TABLE `tbtipoanimal`
  ADD PRIMARY KEY (`codTipoAnimal`);

--
-- Índices de tabela `tbveterinario`
--
ALTER TABLE `tbveterinario`
  ADD PRIMARY KEY (`codVet`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbanimal`
--
ALTER TABLE `tbanimal`
  MODIFY `codAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbatendimento`
--
ALTER TABLE `tbatendimento`
  MODIFY `codAtendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `codCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbtipoanimal`
--
ALTER TABLE `tbtipoanimal`
  MODIFY `codTipoAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbveterinario`
--
ALTER TABLE `tbveterinario`
  MODIFY `codVet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD CONSTRAINT `tbanimal_ibfk_1` FOREIGN KEY (`codTipoAnimal`) REFERENCES `tbtipoanimal` (`codTipoAnimal`),
  ADD CONSTRAINT `tbanimal_ibfk_2` FOREIGN KEY (`codCliente`) REFERENCES `tbcliente` (`codCliente`);

--
-- Restrições para tabelas `tbatendimento`
--
ALTER TABLE `tbatendimento`
  ADD CONSTRAINT `tbatendimento_ibfk_1` FOREIGN KEY (`codAnimal`) REFERENCES `tbanimal` (`codAnimal`),
  ADD CONSTRAINT `tbatendimento_ibfk_2` FOREIGN KEY (`codVet`) REFERENCES `tbveterinario` (`codVet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
