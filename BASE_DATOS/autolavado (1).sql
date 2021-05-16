-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2021 a las 20:53:00
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `autolavado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `cc` int(11) NOT NULL,
  `celular` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `cc`, `celular`) VALUES
(2, 'benjamin', 'jinez', 0, 1234),
(7, 'edixon', 'Araujo', 22, 33333333),
(9, 'Douglas', 'Araujo', 27590364, 2147483647),
(10, 'Emily', 'Araujo', 2312324, 2147483647),
(12, 'loquisss', 'rafuchp', 21212121, 2147483647),
(13, 'el nop', 'dota', 12345678, 123456789012);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lavado`
--

CREATE TABLE `lavado` (
  `id` int(11) NOT NULL,
  `fechadeentrada` datetime NOT NULL,
  `fechadesalida` datetime NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lavado`
--

INSERT INTO `lavado` (`id`, `fechadeentrada`, `fechadesalida`, `idcliente`, `idvehiculo`, `estado`) VALUES
(17, '2021-04-15 19:41:36', '2021-04-15 20:30:39', 13, 24, 1),
(18, '2021-04-15 20:06:23', '2021-04-15 20:29:59', 12, 21, 1),
(19, '2021-04-15 20:06:33', '2021-04-15 21:49:11', 7, 13, 1),
(20, '2021-04-15 20:06:44', '2021-04-18 13:32:17', 9, 21, 1),
(21, '2021-04-18 13:30:22', '0000-00-00 00:00:00', 2, 22, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `precio` (
  `id` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`id`, `id_tipo`, `precio`) VALUES
(2, 3, 50000),
(3, 10, 80000),
(4, 1, 30000),
(5, 11, 60000),
(9, 1, 30000),
(11, 12, 100000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`) VALUES
(1, 'moto'),
(3, 'carro'),
(10, 'Gandola'),
(11, 'camion'),
(12, 'Trailer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(11) NOT NULL,
  `placa` text NOT NULL,
  `marca` text NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `placa`, `marca`, `id_tipo`) VALUES
(10, '3434', 'lambo', 1),
(11, '3emo342', 'ford', 1),
(13, '2832', 'mostangxdd', 3),
(21, '9872', 'ferrary', 3),
(22, '1111', 'ferrary', 3),
(23, '2222', 'godd', 10),
(24, '333', 'prooo', 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lavado`
--
ALTER TABLE `lavado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcliente` (`idcliente`,`idvehiculo`),
  ADD KEY `idvehiculo` (`idvehiculo`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`id_tipo`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `lavado`
--
ALTER TABLE `lavado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `precio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lavado`
--
ALTER TABLE `lavado`
  ADD CONSTRAINT `lavado_ibfk_1` FOREIGN KEY (`idvehiculo`) REFERENCES `vehiculo` (`id`),
  ADD CONSTRAINT `lavado_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `precio`
--
ALTER TABLE `precio`
  ADD CONSTRAINT `precio_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
