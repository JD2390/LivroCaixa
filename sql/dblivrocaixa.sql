-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Maio-2022 às 22:37
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblivrocaixa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcheque`
--

CREATE TABLE `tbcheque` (
  `id_cheque` int(11) NOT NULL,
  `ncheque` varchar(150) NOT NULL,
  `entrada` date NOT NULL,
  `vencimento` date NOT NULL,
  `compensacao` date NOT NULL,
  `problema` varchar(3) NOT NULL,
  `valor` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL,
  `banco` varchar(60) NOT NULL,
  `agencia` varchar(30) NOT NULL,
  `conta` varchar(30) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `pessoa` varchar(12) NOT NULL,
  `cpfcnpj` varchar(11) DEFAULT NULL,
  `telefone` varchar(11) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbregistro`
--

CREATE TABLE `tbregistro` (
  `id_registro` int(11) UNSIGNED NOT NULL,
  `cliente` varchar(150) DEFAULT NULL,
  `item` varchar(150) DEFAULT NULL,
  `fornecedor` varchar(150) DEFAULT NULL,
  `valor` varchar(50) NOT NULL,
  `tipo` varchar(2) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbregistro`
--

INSERT INTO `tbregistro` (`id_registro`, `cliente`, `item`, `fornecedor`, `valor`, `tipo`, `data`, `hora`) VALUES
(28, 'Michel', '2 toneladas de manga', 'Silva Almeida ltda', '5114.52', 'cp', '2022-05-14', '17:13:47'),
(27, 'Joaquim', '5 toneladas de laranja', 'Michel Silva', '4951256', 'vd', '2022-05-14', '11:29:28'),
(29, 'Joaquim', '5 toneladas de laranja', 'Michel Silva', '5615615', 'cp', '2022-05-14', NULL),
(30, 'Michel', '5 toneladas de laranja', 'Michel Silva', '56125151.55', 'vd', '2022-05-14', '13:41:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`id_usuario`, `nome`, `email`, `senha`) VALUES
(1, 'admin', 'admin@admin.com', '123456'),
(2, 'Luciana Lima', 'lucia@lima.net', '123'),
(4, 'testes', 'teste@teste.com.br', '654'),
(6, 'Guilherme Guilherme', 'guilhermesilpie@gmail.com', '123'),
(7, 'jojo', 'jojo@star.com', '147852369');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbcheque`
--
ALTER TABLE `tbcheque`
  ADD PRIMARY KEY (`id_cheque`);

--
-- Indexes for table `tbregistro`
--
ALTER TABLE `tbregistro`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indexes for table `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbcheque`
--
ALTER TABLE `tbcheque`
  MODIFY `id_cheque` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbregistro`
--
ALTER TABLE `tbregistro`
  MODIFY `id_registro` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `id_usuario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
