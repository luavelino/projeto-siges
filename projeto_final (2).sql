-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 28-Jun-2017 às 03:12
-- Versão do servidor: 5.6.31-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto_final`
--
CREATE DATABASE IF NOT EXISTS `projeto_final` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projeto_final`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `login` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `cpf` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`login`, `nome`, `senha`, `idGrupo`, `idUser`, `cpf`) VALUES
('aluno', 'Aluno01', '5c530cb09c2de594046dfe0dac945303', 3, 7, '45613893454'),
('luiza', 'Luiza Avelino', '5c530cb09c2de594046dfe0dac945303', 3, 9, '1236549874'),
('mada', 'Mada Almeida', '5c530cb09c2de594046dfe0dac945303', 3, 8, '794654616591');

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

DROP TABLE IF EXISTS `arquivo`;
CREATE TABLE IF NOT EXISTS `arquivo` (
  `id` int(11) NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  `nome` varchar(255) NOT NULL,
  `idGrupo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`id`, `arquivo`, `data`, `nome`, `idGrupo`) VALUES
(2, 'cf6ceeff6a89fe1c495d7bb730bc84e1.pdf', '2017-06-27 00:37:06', 'ApostiladeTeste', 3),
(3, 'ceaa3851e58f92265eab9055106c653f.php', '2017-06-27 20:01:11', 'Material1', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `assistente`
--

DROP TABLE IF EXISTS `assistente`;
CREATE TABLE IF NOT EXISTS `assistente` (
  `login` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `loginProf` varchar(255) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `assistente`
--

INSERT INTO `assistente` (`login`, `nome`, `senha`, `cpf`, `loginProf`, `idUser`) VALUES
('assistente', 'Assis', '5c530cb09c2de594046dfe0dac945303', '79845612302', 'professor', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

DROP TABLE IF EXISTS `atividade`;
CREATE TABLE IF NOT EXISTS `atividade` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `dataEntrega` datetime NOT NULL,
  `obs` varchar(255) NOT NULL,
  `loginAluno` varchar(255) DEFAULT NULL,
  `arquivo` varchar(255) DEFAULT NULL,
  `dataAlunoEntregou` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`id`, `nome`, `idGrupo`, `dataEntrega`, `obs`, `loginAluno`, `arquivo`, `dataAlunoEntregou`) VALUES
(3, 'At1', 3, '2017-06-30 00:00:00', 'Olhem as apostilas', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avisos`
--

DROP TABLE IF EXISTS `avisos`;
CREATE TABLE IF NOT EXISTS `avisos` (
  `id` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `loginProf` varchar(255) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  `titulo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avisos`
--

INSERT INTO `avisos` (`id`, `idGrupo`, `loginProf`, `texto`, `data`, `titulo`) VALUES
(3, 3, 'professor', 'Não haverá Aula nesse dia!', '2017-06-27 19:58:06', 'Aula 28/06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faltas`
--

DROP TABLE IF EXISTS `faltas`;
CREATE TABLE IF NOT EXISTS `faltas` (
  `id` int(11) NOT NULL,
  `falta` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `loginAluno` varchar(255) NOT NULL,
  `dia` date NOT NULL,
  `obs` varchar(255) NOT NULL,
  `qtAula` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `faltas`
--

INSERT INTO `faltas` (`id`, `falta`, `idGrupo`, `loginAluno`, `dia`, `obs`, `qtAula`) VALUES
(9, 2, 3, 'aluno', '2017-06-28', 'Dia 1', 2),
(10, 0, 3, 'luiza', '2017-06-28', 'Dia 1', 2),
(11, 2, 3, 'mada', '2017-06-28', 'Dia 1', 2),
(12, 0, 3, 'aluno', '2017-06-15', 'Dia 2', 2),
(13, 2, 3, 'luiza', '2017-06-15', 'Dia 2', 2),
(14, 2, 3, 'mada', '2017-06-15', 'Dia 2', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `loginProf` varchar(255) NOT NULL,
  `tipoGrupo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id`, `nome`, `codigo`, `loginProf`, `tipoGrupo`) VALUES
(3, 'grupo01', '12345#6', 'professor', 'Técnico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
CREATE TABLE IF NOT EXISTS `mensagem` (
  `id` int(11) NOT NULL,
  `texto` longtext NOT NULL,
  `data` datetime DEFAULT NULL,
  `loginDe` varchar(255) NOT NULL,
  `loginPara` varchar(255) NOT NULL,
  `idGrupo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`id`, `texto`, `data`, `loginDe`, `loginPara`, `idGrupo`) VALUES
(1, 'sacou?', '2017-06-27 16:25:54', 'professor', '', 3),
(2, 'kvdlkgdkh', '2017-06-27 16:36:37', 'professor', 'aluno', 3),
(3, 'foi', '2017-06-28 02:28:37', 'aluno', 'professor', 3),
(4, '', '2017-06-28 02:40:41', '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

DROP TABLE IF EXISTS `notas`;
CREATE TABLE IF NOT EXISTS `notas` (
  `id` int(11) NOT NULL,
  `nota` float NOT NULL,
  `loginAluno` varchar(255) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `peso` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notas`
--

INSERT INTO `notas` (`id`, `nota`, `loginAluno`, `idGrupo`, `descricao`, `peso`) VALUES
(16, 16, 'aluno', 3, 'Prova 1', 0.2),
(17, 10, 'luiza', 3, 'Prova 1', 0.2),
(18, 14, 'mada', 3, 'Prova 1', 0.2),
(19, 8, 'aluno', 3, 'Atividade 3', 0.1),
(20, 3, 'luiza', 3, 'Atividade 3', 0.1),
(21, 1, 'mada', 3, 'Atividade 3', 0.1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `login` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`login`, `nome`, `senha`, `cpf`, `idUser`) VALUES
('professor', 'Luiza Avelino', '5c530cb09c2de594046dfe0dac945303', '789456123', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `regras`
--

DROP TABLE IF EXISTS `regras`;
CREATE TABLE IF NOT EXISTS `regras` (
  `id` int(11) NOT NULL,
  `cargaHoraria` varchar(255) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `cargaMinima` varchar(255) NOT NULL,
  `mediaNota` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `regras`
--

INSERT INTO `regras` (`id`, `cargaHoraria`, `idGrupo`, `cargaMinima`, `mediaNota`) VALUES
(2, '60', 3, '0.75', 60);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `login` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipoUsuario` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`login`, `nome`, `senha`, `tipoUsuario`, `id`) VALUES
('professor', 'Luiza Avelino', '5c530cb09c2de594046dfe0dac945303', 'professor', 1),
('assistente', 'Assis', '5c530cb09c2de594046dfe0dac945303', 'assistente', 4),
('aluno', 'Aluno01', '5c530cb09c2de594046dfe0dac945303', 'aluno', 7),
('mada', 'Mada Almeida', '5c530cb09c2de594046dfe0dac945303', 'aluno', 8),
('luiza', 'Luiza Avelino', '5c530cb09c2de594046dfe0dac945303', 'aluno', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`login`),
  ADD KEY `id_grupo` (`idGrupo`),
  ADD KEY `fk_id_user` (`idUser`);

--
-- Indexes for table `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idgrupo` (`idGrupo`);

--
-- Indexes for table `assistente`
--
ALTER TABLE `assistente`
  ADD PRIMARY KEY (`login`),
  ADD KEY `fk_prof_resp` (`loginProf`),
  ADD KEY `fk_idUser` (`idUser`);

--
-- Indexes for table `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_groupID` (`idGrupo`),
  ADD KEY `alunoID` (`loginAluno`);

--
-- Indexes for table `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Grupo` (`idGrupo`),
  ADD KEY `prof` (`loginProf`);

--
-- Indexes for table `faltas`
--
ALTER TABLE `faltas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aluno` (`loginAluno`),
  ADD KEY `fk_id_grupo` (`idGrupo`) USING BTREE;

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prof` (`loginProf`);

--
-- Indexes for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alunoLogin` (`loginAluno`),
  ADD KEY `fk_grupo` (`idGrupo`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`login`),
  ADD KEY `fk_idUsuario` (`idUser`);

--
-- Indexes for table `regras`
--
ALTER TABLE `regras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grupoID` (`idGrupo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `atividade`
--
ALTER TABLE `atividade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `avisos`
--
ALTER TABLE `avisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `faltas`
--
ALTER TABLE `faltas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `regras`
--
ALTER TABLE `regras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `id_grupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`id`);

--
-- Limitadores para a tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD CONSTRAINT `idgrupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`id`);

--
-- Limitadores para a tabela `assistente`
--
ALTER TABLE `assistente`
  ADD CONSTRAINT `fk_idUser` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_prof_resp` FOREIGN KEY (`loginProf`) REFERENCES `professor` (`login`);

--
-- Limitadores para a tabela `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `alunoID` FOREIGN KEY (`loginAluno`) REFERENCES `aluno` (`login`),
  ADD CONSTRAINT `fk_groupID` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`id`);

--
-- Limitadores para a tabela `avisos`
--
ALTER TABLE `avisos`
  ADD CONSTRAINT `Grupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `prof` FOREIGN KEY (`loginProf`) REFERENCES `professor` (`login`);

--
-- Limitadores para a tabela `faltas`
--
ALTER TABLE `faltas`
  ADD CONSTRAINT `fk_aluno` FOREIGN KEY (`loginAluno`) REFERENCES `aluno` (`login`),
  ADD CONSTRAINT `fk_grupo_id` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`id`);

--
-- Limitadores para a tabela `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `fk_prof` FOREIGN KEY (`loginProf`) REFERENCES `professor` (`login`);

--
-- Limitadores para a tabela `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `fk_alunoLogin` FOREIGN KEY (`loginAluno`) REFERENCES `aluno` (`login`),
  ADD CONSTRAINT `fk_grupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
