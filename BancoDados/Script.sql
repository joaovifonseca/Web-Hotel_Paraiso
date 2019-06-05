-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Maio-2019 às 01:04
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HotelParaiso`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluga`
--

CREATE TABLE `aluga` (
  `ID_ALUGA` int(11) NOT NULL,
  `ID_USU_ALUGA` int(11) DEFAULT NULL,
  `ID_QRT_ALUGA` int(11) DEFAULT NULL,
  `DT_ENTRADA` datetime DEFAULT NULL,
  `DT_SAIDA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

CREATE TABLE `quarto` (
  `ID_QRT` int(11) NOT NULL,
  `NUM_QRT` int(11) DEFAULT NULL,
  `CAPACIDADE_QRT` int(11) DEFAULT NULL,
  `TIPO_QRT` varchar(100) DEFAULT NULL,
  `QTDCAMA_QRT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `quarto`
--

INSERT INTO `quarto` (`ID_QRT`, `NUM_QRT`, `CAPACIDADE_QRT`, `TIPO_QRT`, `QTDCAMA_QRT`) VALUES
(1, 1, 2, 'CASAL', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_USU` int(11) NOT NULL,
  `CPF_USU` varchar(20) NOT NULL,
  `NOME_USU` varchar(300) NOT NULL,
  `SENHA_USU` varchar(50) NOT NULL,
  `SEXO_USU` varchar(1) DEFAULT NULL,
  `TIPO_USU` varchar(1) NOT NULL,
  `TELEFONE_USU` varchar(14) DEFAULT NULL,
  `CELULAR_USU` varchar(14) NOT NULL,
  `ENDERECO_USU` varchar(100) NOT NULL,
  `CIDADE_USU` varchar(100) NOT NULL,
  `EMAIL_USU` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID_USU`, `CPF_USU`, `NOME_USU`, `SENHA_USU`, `SEXO_USU`, `TIPO_USU`, `TELEFONE_USU`, `CELULAR_USU`, `ENDERECO_USU`, `CIDADE_USU`, `EMAIL_USU`) VALUES
(1, '000.000.001-91', 'SUPERVISOR', '12345', 'M', 'F', '', '011 99999-9990', 'RUA CHERNOBYL 39', 'SP', 'ADM@PROJETO.COM.BR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluga`
--
ALTER TABLE `aluga`
  ADD PRIMARY KEY (`ID_ALUGA`),
  ADD KEY `FK_USUARIO` (`ID_USU_ALUGA`),
  ADD KEY `FK_QUARTO` (`ID_QRT_ALUGA`);

--
-- Indexes for table `quarto`
--
ALTER TABLE `quarto`
  ADD PRIMARY KEY (`ID_QRT`),
  ADD UNIQUE KEY `NUM_QRT` (`NUM_QRT`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USU`),
  ADD UNIQUE KEY `CPF_USU` (`CPF_USU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quarto`
--
ALTER TABLE `quarto`
  MODIFY `ID_QRT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluga`
--
ALTER TABLE `aluga`
  ADD CONSTRAINT `FK_QUARTO` FOREIGN KEY (`ID_QRT_ALUGA`) REFERENCES `quarto` (`ID_QRT`),
  ADD CONSTRAINT `FK_USUARIO` FOREIGN KEY (`ID_USU_ALUGA`) REFERENCES `usuario` (`ID_USU`);
  
ALTER TABLE `aluga`
  MODIFY `ID_ALUGA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

