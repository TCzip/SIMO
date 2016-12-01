-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Dez-2016 às 20:58
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ciccr`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `escalas`
--

CREATE TABLE IF NOT EXISTS `escalas` (
  `idEscala` int(1) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `escalas`
--

INSERT INTO `escalas` (`idEscala`, `descricao`) VALUES
(1, '07:00-13:00'),
(2, '13:00-18:00'),
(3, '18:00-23:00'),
(4, '23:00-07:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
`idRegistro` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `idEscala` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Extraindo dados da tabela `registro`
--

INSERT INTO `registro` (`idRegistro`, `IdUser`, `idEscala`, `data`) VALUES
(97, 20, 1, '2016-11-12'),
(98, 20, 3, '2016-11-12'),
(99, 20, 2, '2016-11-12'),
(100, 20, 3, '2016-11-13'),
(101, 20, 4, '2016-11-01'),
(102, 20, 1, '2016-11-13'),
(103, 20, 4, '2016-11-13'),
(104, 20, 3, '2016-11-29'),
(105, 19, 2, '2016-11-12'),
(106, 22, 2, '2016-11-12'),
(107, 20, 1, '2016-11-25'),
(108, 20, 4, '2016-11-25'),
(109, 20, 3, '2016-11-16'),
(110, 20, 3, '2016-11-16'),
(111, 20, 1, '2016-11-18'),
(112, 20, 4, '2016-11-18'),
(113, 20, 3, '2016-11-17'),
(114, 20, 1, '2016-10-19'),
(115, 20, 4, '2016-10-19'),
(116, 20, 1, '2016-11-19'),
(117, 20, 2, '2016-11-19'),
(118, 20, 1, '2016-11-04'),
(119, 20, 4, '2016-11-04'),
(120, 20, 4, '2016-11-20'),
(121, 20, 2, '2016-11-22'),
(122, 20, 3, '2016-11-22'),
(123, 20, 4, '2016-11-22'),
(124, 24, 2, '2016-11-22'),
(125, 24, 3, '2016-11-22'),
(126, 24, 4, '2016-11-22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`user_id` int(5) NOT NULL,
  `username` varchar(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `fullname` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_level` enum('0','1','2') COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `data_cadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `data_ultimo_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nomedeguerra` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=38 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `username`, `fullname`, `email`, `password`, `user_level`, `data_cadastro`, `data_ultimo_login`, `nomedeguerra`) VALUES
(20, 'cris', 'Cristian Leandro da Fonseca', 'cristian_frod@hotmail.com', '202cb962ac59075b964b07152d234b70', '2', '2016-11-05 00:00:00', '2016-11-30 16:25:50', 'DA FONSECA'),
(24, 'camila.fonseca', 'Camila Lopes Rothert da Fonseca', 'cristian_frod@hotmail.com', '6bd6980badbf74193814788295b4b246', '0', '2016-11-18 21:56:25', '2016-11-20 00:49:43', 'BALTAZAR'),
(31, 'd', 'Diandra de Bastos', 'diandra.bastos@gmail.com', 'ed8550f27e6ee0481c75cebb0156ea13', '1', '2016-11-29 21:50:24', '2016-11-29 22:22:31', 'D'),
(32, 'teste', 'Teste', 'teste@yahoo.com.br', '202cb962ac59075b964b07152d234b70', '2', '2016-11-29 22:10:29', '2016-11-29 22:47:20', 'TESTE'),
(33, 'a', 'a', 'a', '202cb962ac59075b964b07152d234b70', '2', '0000-00-00 00:00:00', '2016-11-29 22:48:34', 'a'),
(34, 'balt', 'balt', 'balt@hotmail.com', '202cb962ac59075b964b07152d234b70', '2', '2016-11-30 17:29:16', '2016-11-30 17:29:26', 'BALT'),
(35, 'b', 'b', 'b@hotmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', '2', '2016-12-01 09:38:03', '2016-12-01 10:15:36', 'B'),
(36, 'ana', 'ana', 'ana@hotmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', '2', '2016-12-01 10:18:16', '2016-12-01 10:18:23', 'ANA'),
(37, 'car', 'car', 'car@hotmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', '1', '2016-12-01 12:54:58', '2016-12-01 12:55:05', 'CAR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `escalas`
--
ALTER TABLE `escalas`
 ADD PRIMARY KEY (`idEscala`);

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
 ADD PRIMARY KEY (`idRegistro`), ADD KEY `IdUser` (`IdUser`), ADD KEY `idEscala` (`idEscala`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
MODIFY `idRegistro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
