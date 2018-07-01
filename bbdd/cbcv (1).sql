-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2018 at 09:24 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbcv`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `ID_Equipo` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Genero` varchar(50) NOT NULL,
  `Entrenadores` varchar(50) NOT NULL,
  `Dorsal` int(11) NOT NULL,
  `Jugadores` varchar(50) NOT NULL,
  `Categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`ID_Equipo`, `Nombre`, `Genero`, `Entrenadores`, `Dorsal`, `Jugadores`, `Categoria`) VALUES
(2, 'Senior A', 'Masculino', '', 0, '', 'Senior'),
(3, 'Senior', 'Femenino', '', 0, '', 'Senior'),
(4, 'Junior A', 'Masculino', '', 0, '', 'Junior'),
(6, 'Junior Fem', 'Femenino', '', 0, '', 'Junior');

-- --------------------------------------------------------

--
-- Table structure for table `equipo_jugador`
--

CREATE TABLE `equipo_jugador` (
  `ID_Equipo` int(11) NOT NULL,
  `ID_Persona` int(11) NOT NULL,
  `Dorsal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipo_jugador`
--

INSERT INTO `equipo_jugador` (`ID_Equipo`, `ID_Persona`, `Dorsal`) VALUES
(2, 24, 5),
(2, 25, 1),
(2, 35, 2),
(3, 24, 3),
(3, 25, 5),
(4, 24, 5),
(6, 24, 1),
(6, 27, 6),
(6, 29, 2);

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `ID_Persona` int(11) NOT NULL,
  `DNI` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Apellido1` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Apellido2` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `eMail` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Direccion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Tipo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Categoria` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`ID_Persona`, `DNI`, `Nombre`, `Apellido1`, `Apellido2`, `Fecha_Nacimiento`, `Telefono`, `eMail`, `Direccion`, `Tipo`, `Categoria`) VALUES
(24, '12345678J', 'Reyes', 'Zudaire', 'Galdeano', '1955-12-31', 87, 'galzumare@gmail.com', 'ribera', 'Jugador', '--'),
(25, '14270331G', 'Xavi', 'Gallardo', 'Zudaire', '1981-12-29', 636764943, 'xavigallardo@gmail.com', 'Aiguader 15', 'Entrenador', 'Senior'),
(27, '11111111A', 'A', 'AA', 'AAA', '2018-01-01', 11111111, 'a@a', 'a', 'Jugador', '--'),
(28, '22222222B', 'B', 'BB', 'BBB', '2018-02-02', 222222222, 'B@B', 'BBBBB', 'Jugador', '--'),
(29, '33333333C', 'C', 'CC', 'CCC', '2018-03-03', 333333333, 'C@C', 'CCCCCCCC', 'Jugador', '--'),
(30, '44444444D', 'D', 'DD', 'DDD', '2018-04-04', 444444444, 'D@D', 'DDDDDDDD', 'Jugador', '--'),
(31, '55555555E', 'E', 'EE', 'EEE', '2018-05-05', 555555555, 'E@E', 'EEEEEEEEEE', 'Jugador', '--'),
(32, '66666666F', 'F', 'FF', 'FFF', '2018-06-06', 666666666, 'F@F', 'FFFFFFFFFFFF', 'Jugador', '--'),
(34, '12345678Q', 'Alex', 'wola', 'wola2', '1024-02-01', 635632562, 'wola@alex', 'wola', 'Jugador', '--'),
(35, '12345678P', 'Noe', 'Bellido', 'Palleja', '1982-09-29', 635251213, 'noe@noe', 'aiguader 15', 'Jugador', '--'),
(39, '87654321A', 'xavi', 'pepe', 'pepito', '1981-12-29', 636764943, 'xavi@xavi', 'ribera', 'Entren/Jugador', '--'),
(41, '14270332G', 'xavi', 'gallardo', 'zudaire', '1981-12-29', 636764943, 'xsvi@cad', 'aiguader 15', 'Entren/Jugador', '--');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `User` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Pswd` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `Role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`User`, `Pswd`, `Role`) VALUES
('admin', '12345', 5),
('xavi', '1234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`ID_Equipo`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD KEY `ID_Equipo` (`ID_Equipo`);

--
-- Indexes for table `equipo_jugador`
--
ALTER TABLE `equipo_jugador`
  ADD PRIMARY KEY (`ID_Equipo`,`ID_Persona`),
  ADD KEY `ID_Equipo` (`ID_Equipo`),
  ADD KEY `ID_Persona` (`ID_Persona`);

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`ID_Persona`),
  ADD UNIQUE KEY `DNI` (`DNI`),
  ADD KEY `ID_Persona` (`ID_Persona`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `ID_Equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `ID_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipo_jugador`
--
ALTER TABLE `equipo_jugador`
  ADD CONSTRAINT `equipo_jugador_ibfk_1` FOREIGN KEY (`ID_Equipo`) REFERENCES `equipos` (`ID_Equipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_jugador_ibfk_2` FOREIGN KEY (`ID_Persona`) REFERENCES `personas` (`ID_Persona`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
