-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Maio-2018 às 10:37
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetopw`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoutilizadores`
--

CREATE TABLE `tipoutilizadores` (
  `tipoUt_id` int(9) NOT NULL,
  `tipoUt_tipo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipoutilizadores`
--

INSERT INTO `tipoutilizadores` (`tipoUt_id`, `tipoUt_tipo`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `ut_id` int(9) NOT NULL,
  `ut_name` varchar(40) NOT NULL,
  `ut_email` varchar(50) NOT NULL,
  `ut_password` varchar(100) NOT NULL,
  `ut_gender` varchar(6) NOT NULL,
  `ut_birthday` date NOT NULL,
  `ut_idTipoUtilizador` int(9) NOT NULL,
  `ut_image` varchar(200) DEFAULT NULL,
  `ut_about` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`ut_id`, `ut_name`, `ut_email`, `ut_password`, `ut_gender`, `ut_birthday`, `ut_idTipoUtilizador`, `ut_image`, `ut_about`) VALUES
(1, 'Super User', 'superuser@gmail.com', '202cb962ac59075b964b07152d234b70', 'Female', '2018-05-01', 2, 'https://d30y9cdsu7xlg0.cloudfront.net/png/17241-200.png', 'asd'),
(2, 'Super Admin', 'superadmin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Female', '2018-04-12', 1, 'usersImages/image-1465348_960_720.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tipoutilizadores`
--
ALTER TABLE `tipoutilizadores`
  ADD PRIMARY KEY (`tipoUt_id`);

--
-- Indexes for table `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`ut_id`),
  ADD KEY `ut_idTipoUtilizador` (`ut_idTipoUtilizador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tipoutilizadores`
--
ALTER TABLE `tipoutilizadores`
  MODIFY `tipoUt_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `ut_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD CONSTRAINT `utilizadores_ibfk_1` FOREIGN KEY (`ut_idTipoUtilizador`) REFERENCES `tipoutilizadores` (`tipoUt_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
