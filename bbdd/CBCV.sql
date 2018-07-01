-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-06-2018 a las 14:08:13
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `CBCV`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
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
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`ID_Equipo`, `Nombre`, `Genero`, `Entrenadores`, `Dorsal`, `Jugadores`, `Categoria`) VALUES
(2, 'Senior A', 'Mixto', '', 0, '', 'Senior'),
(3, 'Senior', 'Femenino', '', 0, '', 'Senior'),
(4, 'Junior A', 'Masculino', '', 0, '', 'Junior'),
(6, 'Junior Fem', 'Femenino', '', 0, '', 'Junior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Equipo_Jugador`
--

CREATE TABLE `Equipo_Jugador` (
  `ID_Equipo` int(11) NOT NULL,
  `ID_Persona` int(11) NOT NULL,
  `Dorsal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Equipo_Jugador`
--

INSERT INTO `Equipo_Jugador` (`ID_Equipo`, `ID_Persona`, `Dorsal`) VALUES
(2, 24, 5),
(2, 25, 1),
(3, 24, 3),
(3, 25, 5),
(4, 24, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
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
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`ID_Persona`, `DNI`, `Nombre`, `Apellido1`, `Apellido2`, `Fecha_Nacimiento`, `Telefono`, `eMail`, `Direccion`, `Tipo`, `Categoria`) VALUES
(24, '12345678J', 'Reyes', 'Zudaire', 'Galdeano', '1955-12-31', 87, 'galzumare@gmail.com', 'ribera', 'Jugador', '--'),
(25, '14270331G', 'Xavi', 'Gallardo', 'Zudaire', '1981-12-29', 636764943, 'xavigallardo@gmail.com', 'Aiguader 15', 'Jugador', 'Senior'),
(27, '11111111A', 'A', 'AA', 'AAA', '2018-01-01', 11111111, 'a@a', 'a', 'Jugador', '--'),
(28, '22222222B', 'B', 'BB', 'BBB', '2018-02-02', 222222222, 'B@B', 'BBBBB', 'Jugador', '--'),
(29, '33333333C', 'C', 'CC', 'CCC', '2018-03-03', 333333333, 'C@C', 'CCCCCCCC', 'Jugador', '--'),
(30, '44444444D', 'D', 'DD', 'DDD', '2018-04-04', 444444444, 'D@D', 'DDDDDDDD', 'Jugador', '--'),
(31, '55555555E', 'E', 'EE', 'EEE', '2018-05-05', 555555555, 'E@E', 'EEEEEEEEEE', 'Jugador', '--'),
(32, '66666666F', 'F', 'FF', 'FFF', '2018-06-06', 666666666, 'F@F', 'FFFFFFFFFFFF', 'Jugador', '--'),
(33, '77777777G', 'G', 'GG', 'GGG', '2018-07-07', 77777777, 'G@G', 'GGGGGGGGGG', 'Jugador', '--'),
(34, '12345678Q', 'Alex', 'wola', 'wola2', '1024-02-01', 635632562, 'wola@alex', 'wola', 'Jugador', '--');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `User` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Pswd` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `Role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`User`, `Pswd`, `Role`) VALUES
('admin', '12345', 5),
('xavi', '1234', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`ID_Equipo`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD KEY `ID_Equipo` (`ID_Equipo`);

--
-- Indices de la tabla `Equipo_Jugador`
--
ALTER TABLE `Equipo_Jugador`
  ADD PRIMARY KEY (`ID_Equipo`,`ID_Persona`),
  ADD KEY `ID_Equipo` (`ID_Equipo`),
  ADD KEY `ID_Persona` (`ID_Persona`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`ID_Persona`),
  ADD UNIQUE KEY `DNI` (`DNI`),
  ADD KEY `ID_Persona` (`ID_Persona`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`User`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `ID_Equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `ID_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Equipo_Jugador`
--
ALTER TABLE `Equipo_Jugador`
  ADD CONSTRAINT `equipo_jugador_ibfk_1` FOREIGN KEY (`ID_Equipo`) REFERENCES `equipos` (`ID_Equipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_jugador_ibfk_2` FOREIGN KEY (`ID_Persona`) REFERENCES `personas` (`ID_Persona`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
