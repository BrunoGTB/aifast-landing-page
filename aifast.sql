-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Fev-2022 às 21:26
-- Versão do servidor: 10.5.12-MariaDB-cll-lve
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aifast`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comerciante`
--

CREATE TABLE `comerciante` (
  `comercianteId` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `cpfComerciante` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contabancaria`
--

CREATE TABLE `contabancaria` (
  `cpf` varchar(14) NOT NULL,
  `banco` varchar(30) NOT NULL,
  `tipoConta` varchar(8) NOT NULL,
  `agencia` int(4) NOT NULL,
  `conta` int(5) NOT NULL,
  `digito` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrega`
--

CREATE TABLE `entrega` (
  `entregaId` int(11) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `enderecoInicial` varchar(500) NOT NULL,
  `enderecoFinal` varchar(500) NOT NULL,
  `valor` float NOT NULL,
  `comercianteId` int(11) NOT NULL,
  `entregadorId` int(14) DEFAULT NULL,
  `distanciaTotal` float NOT NULL,
  `entregaStatus` enum('nova','aguardando','progresso','concluida') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entregador`
--

CREATE TABLE `entregador` (
  `entregadorId` int(11) NOT NULL,
  `cpfEntregador` varchar(14) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dataNascimento` varchar(10) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `situacao` enum('livre','entregando') NOT NULL,
  `saldoDevedor` double NOT NULL,
  `rg` varchar(13) NOT NULL,
  `cnh` varchar(11) NOT NULL,
  `renavam` int(9) NOT NULL,
  `verificado` enum('preCadastro','cadastroFinalizado','validado') NOT NULL,
  `entregasTotais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comerciante`
--
ALTER TABLE `comerciante`
  ADD PRIMARY KEY (`comercianteId`);

--
-- Índices para tabela `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`entregaId`);

--
-- Índices para tabela `entregador`
--
ALTER TABLE `entregador`
  ADD PRIMARY KEY (`entregadorId`),
  ADD KEY `cpf` (`cpfEntregador`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comerciante`
--
ALTER TABLE `comerciante`
  MODIFY `comercianteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `entrega`
--
ALTER TABLE `entrega`
  MODIFY `entregaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT de tabela `entregador`
--
ALTER TABLE `entregador`
  MODIFY `entregadorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
