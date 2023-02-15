-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Fev-2023 às 14:40
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `superbicho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `observacao` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `valor` float NOT NULL,
  `cliente` int(11) NOT NULL,
  `profissional` int(11) NOT NULL,
  `horario` time NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `observacao`, `data`, `valor`, `cliente`, `profissional`, `horario`, `status`) VALUES
(32, 'ee', '2023-02-16', 5, 15, 33, '03:21:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_servico`
--

CREATE TABLE `agenda_servico` (
  `id` int(11) NOT NULL,
  `agenda` int(11) NOT NULL,
  `servico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `agenda_servico`
--

INSERT INTO `agenda_servico` (`id`, `agenda`, `servico`) VALUES
(14, 32, 7),
(15, 32, 8),
(16, 32, 7),
(17, 32, 7),
(18, 32, 7),
(19, 32, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `pessoa`) VALUES
(10, 74),
(14, 82),
(15, 85);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `endereco` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `cpf`, `nome`, `telefone`, `email`, `endereco`) VALUES
(74, '78945612312', 'Lucas Carvalho', '92992929292', 'lucas@gmail.com', 'Av. Armindo Auzier'),
(80, 'erfasdfa', 'asdfasdf', 'asdfa', 'sdfasdfasdf', 'asdfasdf'),
(81, '00000000000', 'Waleson', '12312312312', 'walesonmelo23@gmail.com', 'Rua João Meireles, Francesa'),
(82, '45678912345', 'William Melo', '92996369365', 'wiliam@gmail.com', 'Av. Armindo Auzier'),
(85, '00000100000', 'Waleson Melo', '92992646326', 'walesonmelo@gmail.com', 'Rua João Meireles, Francesa'),
(86, '32145678998', 'Conceição Neves', '789456123', 'com6sao@gmail.com', 'Bem ali');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissional`
--

CREATE TABLE `profissional` (
  `id` int(11) NOT NULL,
  `pessoa` int(11) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `tipo-usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `profissional`
--

INSERT INTO `profissional` (`id`, `pessoa`, `senha`, `tipo-usuario`) VALUES
(32, 81, 'wasdwasd', 'admin'),
(33, 86, '123', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `valor` float NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `nome`, `valor`, `descricao`) VALUES
(7, 'Banho', 20, 'Banho com shampoo'),
(8, 'Tosa Simples', 20, 'Com maquina'),
(9, 'Tosa Higiênica', 50, 'Com tesoura'),
(10, 'Corte de Unha', 25, ''),
(11, 'Limpeza de Ouvido', 10, ''),
(12, 'Penteados Simples', 10, ''),
(13, 'Penteados Artísticos', 25, ''),
(14, 'Pintar Pelos', 35, '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `profissional_p` (`profissional`);

--
-- Índices para tabela `agenda_servico`
--
ALTER TABLE `agenda_servico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servico` (`servico`),
  ADD KEY `agenda` (`agenda`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pessoa` (`pessoa`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `profissional`
--
ALTER TABLE `profissional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pessoa` (`pessoa`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `agenda_servico`
--
ALTER TABLE `agenda_servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de tabela `profissional`
--
ALTER TABLE `profissional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `cliente` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `profissional_p` FOREIGN KEY (`profissional`) REFERENCES `profissional` (`id`);

--
-- Limitadores para a tabela `agenda_servico`
--
ALTER TABLE `agenda_servico`
  ADD CONSTRAINT `agenda` FOREIGN KEY (`agenda`) REFERENCES `agenda` (`id`),
  ADD CONSTRAINT `servico` FOREIGN KEY (`servico`) REFERENCES `servico` (`id`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`pessoa`) REFERENCES `pessoa` (`id`);

--
-- Limitadores para a tabela `profissional`
--
ALTER TABLE `profissional`
  ADD CONSTRAINT `pessoa` FOREIGN KEY (`pessoa`) REFERENCES `pessoa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
