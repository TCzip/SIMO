-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Jan-2017 às 00:58
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
-- Estrutura da tabela `exchangentries`
--

CREATE TABLE `exchangentries` (
  `idRecord` int(21) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `idSchedule` int(11) NOT NULL,
  `scheduledate` date NOT NULL,
  `idManager` int(11) NOT NULL,
  `entryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exchanges`
--

CREATE TABLE `exchanges` (
  `idRecord` int(21) NOT NULL,
  `idOwner` int(11) NOT NULL,
  `idManager` int(11) NOT NULL,
  `idOccupier` int(11) NOT NULL,
  `idScheduleOwner` int(11) NOT NULL,
  `idScheduleOccupier` int(11) NOT NULL,
  `scheduleDateOwner` date NOT NULL,
  `scheduleDateOccupier` date NOT NULL,
  `entryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `groupentries`
--

CREATE TABLE `groupentries` (
  `idRecord` int(11) NOT NULL,
  `IdGroup` int(11) NOT NULL,
  `idSchedule` int(11) NOT NULL,
  `scheduleDate` date NOT NULL,
  `entryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `idGroup` int(5) NOT NULL,
  `groupName` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `memberentries`
--

CREATE TABLE `memberentries` (
  `idRecord` int(21) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `idSchedule` int(11) NOT NULL,
  `scheduledate` date NOT NULL,
  `idManager` int(11) NOT NULL,
  `entryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '07:00-13:00', 6),
(2, '13:00-18:00', 5),
(3, '18:00-23:00', 5),
(4, '23:00-07:00', 8);

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
  `nickname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `idGroup` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`idUser`, `username`, `fullname`, `email`, `password`, `idPermission`, `registerDate`, `lastLogin`, `nickname`, `idGroup`) VALUES
(1, 'administrador', 'Cristian Leandro da Fonseca', 'cristian_frod@hotmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 2, '2016-12-10 06:14:01', '2016-12-10 05:18:02', 'DA FONSECA', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exchangentries`
--
ALTER TABLE `exchangentries`
  ADD PRIMARY KEY (`idRecord`);

--
-- Indexes for table `exchanges`
--
ALTER TABLE `exchanges`
  ADD PRIMARY KEY (`idRecord`);

--
-- Indexes for table `groupentries`
--
ALTER TABLE `groupentries`
  ADD PRIMARY KEY (`idRecord`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`idGroup`);

--
-- Indexes for table `memberentries`
--
ALTER TABLE `memberentries`
  ADD PRIMARY KEY (`idRecord`),
  ADD KEY `IdUser` (`IdUser`),
  ADD KEY `idEscala` (`idSchedule`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`idPermission`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`idSchedule`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idGroup` (`idGroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exchangentries`
--
ALTER TABLE `exchangentries`
  MODIFY `idRecord` int(21) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exchanges`
--
ALTER TABLE `exchanges`
  MODIFY `idRecord` int(21) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groupentries`
--
ALTER TABLE `groupentries`
  MODIFY `idRecord` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `idGroup` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memberentries`
--
ALTER TABLE `memberentries`
  MODIFY `idRecord` int(21) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `idPermission` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `idSchedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
