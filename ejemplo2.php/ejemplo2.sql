-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2024 a las 00:34:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejemplo2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE `artista` (
  `idArtista` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`idArtista`, `nombre`, `nacionalidad`) VALUES
(1, 'dur', 'colombia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE `cancion` (
  `idCancion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `duracion` time NOT NULL,
  `idArtista` int(11) NOT NULL,
  `idGenero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`idCancion`, `nombre`, `duracion`, `idArtista`, `idGenero`) VALUES
(1, 'jh', '12:02:00', 1, 1),
(4, 'adelante', '04:02:00', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idEstudiante` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `correoElectronico` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idEstudiante`, `nombre`, `direccion`, `documento`, `fechaNacimiento`, `correoElectronico`) VALUES
(2, 'jo', 'barbosa', '54258', '2012-05-14', 'jh@jg'),
(3, 'dumar', 'velez', '65458225', '2007-05-23', 'dum@kj'),
(4, 'jhonny', 'chipata', '10963254', '2001-06-14', 'jhonn@jj.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta`
--

CREATE TABLE `fruta` (
  `idFruta` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `colorFruta` varchar(50) DEFAULT NULL,
  `idTipoFruta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fruta`
--

INSERT INTO `fruta` (`idFruta`, `nombre`, `peso`, `colorFruta`, `idTipoFruta`) VALUES
(1, 'pera', 2, 'verde', 2),
(2, 'manzana', 1, 'rojo', 5),
(4, 'durasno', 2, 'amarillo', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generomusical`
--

CREATE TABLE `generomusical` (
  `idGenero` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generomusical`
--

INSERT INTO `generomusical` (`idGenero`, `descripcion`) VALUES
(1, 'banda'),
(2, 'electronica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipofruta`
--

CREATE TABLE `tipofruta` (
  `idTipoFruta` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipofruta`
--

INSERT INTO `tipofruta` (`idTipoFruta`, `descripcion`) VALUES
(2, 'fruta madura'),
(3, 'fruta verde'),
(5, 'fruta podrida');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`idArtista`);

--
-- Indices de la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`idCancion`),
  ADD UNIQUE KEY `idArtista` (`idArtista`,`idGenero`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idEstudiante`);

--
-- Indices de la tabla `fruta`
--
ALTER TABLE `fruta`
  ADD PRIMARY KEY (`idFruta`),
  ADD KEY `idTipoFruta` (`idTipoFruta`);

--
-- Indices de la tabla `generomusical`
--
ALTER TABLE `generomusical`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `tipofruta`
--
ALTER TABLE `tipofruta`
  ADD PRIMARY KEY (`idTipoFruta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `idArtista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
  MODIFY `idCancion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `fruta`
--
ALTER TABLE `fruta`
  MODIFY `idFruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `generomusical`
--
ALTER TABLE `generomusical`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipofruta`
--
ALTER TABLE `tipofruta`
  MODIFY `idTipoFruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fruta`
--
ALTER TABLE `fruta`
  ADD CONSTRAINT `fruta_ibfk_1` FOREIGN KEY (`idTipoFruta`) REFERENCES `tipofruta` (`idTipoFruta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
