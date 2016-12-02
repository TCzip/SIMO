-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Dez-2016 às 19:05
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciccr`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

CREATE TABLE `permissions` (
  `idPermission` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `records`
--

CREATE TABLE `records` (
  `idRecord` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `idSchedule` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `records`
--

INSERT INTO `records` (`idRecord`, `IdUser`, `idSchedule`, `date`) VALUES
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
-- Estrutura da tabela `schedule`
--

CREATE TABLE `schedule` (
  `idSchedule` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `schedule`
--

INSERT INTO `schedule` (`idSchedule`, `name`, `duration`) VALUES
(1, '07:00-13:00', 0),
(2, '13:00-18:00', 0),
(3, '18:00-23:00', 0),
(4, '23:00-07:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `idUser` int(5) NOT NULL,
  `username` varchar(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `fullname` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `idPermission` int(11) NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastLogin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nickname` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`idUser`, `username`, `fullname`, `email`, `password`, `idPermission`, `registerDate`, `lastLogin`, `nickname`) VALUES
(20, 'cris', 'Cristian Leandro da Fonseca', 'cristian_frod@hotmail.com', '202cb962ac59075b964b07152d234b70', 3, '2016-11-05 02:00:00', '2016-11-30 16:25:50', 'DA FONSECA'),
(24, 'camila.fonseca', 'Camila Lopes Rothert da Fonseca', 'cristian_frod@hotmail.com', '6bd6980badbf74193814788295b4b246', 1, '2016-11-18 23:56:25', '2016-11-20 00:49:43', 'BALTAZAR'),
(31, 'd', 'Diandra de Bastos', 'diandra.bastos@gmail.com', 'ed8550f27e6ee0481c75cebb0156ea13', 2, '2016-11-29 23:50:24', '2016-11-29 22:22:31', 'D'),
(32, 'teste', 'Teste', 'teste@yahoo.com.br', '202cb962ac59075b964b07152d234b70', 3, '2016-11-30 00:10:29', '2016-11-29 22:47:20', 'TESTE'),
(33, 'a', 'a', 'a', '202cb962ac59075b964b07152d234b70', 3, '0000-00-00 00:00:00', '2016-11-29 22:48:34', 'a'),
(34, 'balt', 'balt', 'balt@hotmail.com', '202cb962ac59075b964b07152d234b70', 3, '2016-11-30 19:29:16', '2016-11-30 17:29:26', 'BALT'),
(35, 'b', 'b', 'b@hotmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 3, '2016-12-01 11:38:03', '2016-12-01 10:15:36', 'B'),
(36, 'ana', 'ana', 'ana@hotmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 3, '2016-12-01 12:18:16', '2016-12-01 10:18:23', 'ANA'),
(37, 'car', 'car', 'car@hotmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 2, '2016-12-01 14:54:58', '2016-12-01 12:55:05', 'CAR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`idPermission`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`idRecord`),
  ADD KEY `IdUser` (`IdUser`),
  ADD KEY `idEscala` (`idSchedule`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`idSchedule`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `idPermission` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `idRecord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `idSchedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
