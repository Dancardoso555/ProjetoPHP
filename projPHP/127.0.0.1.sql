-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 10/04/2025 às 22h20min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `escola`
--
CREATE DATABASE `escola` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `escola`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `telefone` int(15) NOT NULL,
  `codcurso` int(5) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codcurso` (`codcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`codigo`, `nome`, `telefone`, `codcurso`) VALUES
(1, 'dan', 12343213, 1),
(2, 'designer', 11111111, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `coordenador` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`codigo`, `nome`, `coordenador`) VALUES
(1, 'informatica', 'max'),
(2, 'design', 'solange'),
(3, 'psicologia', 'kenji'),
(4, 'gastronomia', 'kevao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `telefone` int(15) NOT NULL,
  `codcurso` int(5) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codcurso` (`codcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`codigo`, `nome`, `telefone`, `codcurso`) VALUES
(1, 'cris', 0, 1),
(2, 'cachoeira', 2222222, 2);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`codcurso`) REFERENCES `curso` (`codigo`);

--
-- Restrições para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`codcurso`) REFERENCES `curso` (`codigo`);
--
-- Banco de Dados: `loja`
--
CREATE DATABASE `loja` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `loja`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`codigo`, `nome`) VALUES
(1, 'Masc'),
(2, 'Fem'),
(3, 'Infantil'),
(4, 'Agenero');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`codigo`, `nome`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Puma'),
(4, 'Versace');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `codigo` int(5) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `tamanho` varchar(10) NOT NULL,
  `preco` float(10,2) NOT NULL,
  `codmarca` int(5) NOT NULL,
  `codcategoria` int(5) NOT NULL,
  `codtipo` int(5) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `foto2` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codmarca` (`codmarca`),
  KEY `codcategoria` (`codcategoria`),
  KEY `codtipo` (`codtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codigo`, `descricao`, `cor`, `tamanho`, `preco`, `codmarca`, `codcategoria`, `codtipo`, `foto1`, `foto2`) VALUES
(1, 'camisa da Nike', 'Branca', 'G', 100.00, 1, 1, 1, '857b266d1ebf90f7f968f92f86092efd', '3c2a4bed53bb8bef677b3fbff795fc1d'),
(2, 'Tenis da adidas', 'Branco e Preto', '39-40', 250.00, 2, 2, 3, '8d92dd397f1694ef613a4671f098172e', 'a3e973b43d6c4a6d8dcee55286d4cebe'),
(3, 'calÃ§as azuis', 'Azul', '40', 100.00, 3, 3, 2, '69e3d18b1c3e7d6425d1b1c60a148f51', 'c254c2568ee6fd728352f0a9d381ccfa'),
(4, 'Chinelo da Versace', 'Preto e dourado', '39-40', 50.00, 4, 4, 4, '5ba4d5606a0973b216f8f526746fbc55', '51929928128d9e7b01f931fdb5a31113'),
(5, 'calÃ§a ', 'Preto', '40', 100.00, 1, 4, 2, '92b52d167fb37de913fc173255838f54', 'c89aa9eaa8aa928a0c4bf14413ee972f');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`codigo`, `nome`) VALUES
(1, 'Camisas'),
(2, 'Calcas'),
(3, 'Tenis'),
(4, 'chinelo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(5) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` int(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `login`, `senha`) VALUES
(1, 'dan', 123);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`codmarca`) REFERENCES `marca` (`codigo`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`codcategoria`) REFERENCES `categoria` (`codigo`),
  ADD CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`codtipo`) REFERENCES `tipo` (`codigo`);
--
-- Banco de Dados: `satc`
--
CREATE DATABASE `satc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `satc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `codaluno` int(5) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `fone` int(15) NOT NULL,
  `codcurso` int(5) NOT NULL,
  PRIMARY KEY (`codaluno`),
  KEY `codcurso` (`codcurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE IF NOT EXISTS `coordenador` (
  `codcoordenador` int(5) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codcoordenador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `coordenador`
--

INSERT INTO `coordenador` (`codcoordenador`, `nome`) VALUES
(1, 'dan'),
(2, 'nad'),
(3, 'nadan');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `codcurso` int(5) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `codcoordenador` int(5) NOT NULL,
  PRIMARY KEY (`codcurso`),
  KEY `codcoordenador` (`codcoordenador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`codcurso`, `nome`, `codcoordenador`) VALUES
(1, 'info', 1),
(2, 'qui', 2),
(3, 'mec', 3),
(5, 'sssss', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `senha` int(10) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `login`, `senha`) VALUES
(1, 'dan', 123);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`codcurso`) REFERENCES `curso` (`codcurso`);

--
-- Restrições para a tabela `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`codcoordenador`) REFERENCES `coordenador` (`codcoordenador`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
