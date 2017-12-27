-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2017 at 03:04 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Barberia`
--

-- --------------------------------------------------------

--
-- Table structure for table `barberos`
--

CREATE TABLE `barberos` (
  `Id` int(11) NOT NULL,
  `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Dui` varchar(9) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `barberos`
--

INSERT INTO `barberos` (`Id`, `Nombres`, `Apellidos`, `Dui`) VALUES
(33, 'asdf', 'lkj', '838383838'),
(34, '', '', ''),
(35, '', '', '6');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Id` int(11) NOT NULL,
  `Usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Clave` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id`, `Usuario`, `Clave`) VALUES
(0, 'Admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_serviciosproductos`
--

CREATE TABLE `tbl_serviciosproductos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,6) NOT NULL,
  `esproducto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tbl_serviciosproductos`
--

INSERT INTO `tbl_serviciosproductos` (`id`, `codigo`, `nombre`, `precio`, `esproducto`) VALUES
(1, '112041000', 'Corte de Cabello premiun', '5.000000', 0),
(2, '1120455', 'facial exfoliante', '4.990000', 0),
(3, '254201452', 'Cera Suavecito', '4.770000', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barberos`
--
ALTER TABLE `barberos`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Dui` (`Dui`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_serviciosproductos`
--
ALTER TABLE `tbl_serviciosproductos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barberos`
--
ALTER TABLE `barberos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_serviciosproductos`
--
ALTER TABLE `tbl_serviciosproductos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
