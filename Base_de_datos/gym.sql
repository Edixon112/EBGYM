-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2021 a las 20:27:19
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
-- Base de datos: `gym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api`
--

CREATE TABLE `api` (
  `id` int(11) NOT NULL,
  `token` text NOT NULL,
  `instanceid` text NOT NULL,
  `idgym` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `fechainicio` datetime NOT NULL,
  `fechafin` datetime NOT NULL,
  `idpago` int(11) DEFAULT NULL,
  `idgym` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id`, `idcliente`, `fechainicio`, `fechafin`, `idpago`, `idgym`) VALUES
(31, 32, '2021-05-23 12:29:12', '2021-05-23 13:24:09', 26, 16),
(32, 31, '2021-05-23 12:29:30', '2021-05-23 13:22:52', 25, 16),
(33, 30, '2021-05-23 12:59:07', '2021-05-23 13:19:03', 19, 16),
(38, 32, '2021-05-23 13:24:03', '0000-00-00 00:00:00', NULL, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gym`
--

CREATE TABLE `gym` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `idadmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gym`
--

INSERT INTO `gym` (`id`, `nombre`, `idadmin`) VALUES
(16, 'GIMNASIO1', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idasistencia` int(11) DEFAULT NULL,
  `idgym` int(11) DEFAULT NULL,
  `fechainicio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `idcliente`, `idasistencia`, `idgym`, `fechainicio`) VALUES
(14, 32, 31, 16, '2021-05-23 12:53:07'),
(17, 32, 31, 16, '2021-05-23 12:59:39'),
(19, 30, 33, 16, '2021-05-23 13:19:03'),
(20, 32, 31, 16, '2021-05-23 13:19:10'),
(21, 32, 31, 16, '2021-05-23 13:19:18'),
(22, 31, 32, 16, '2021-05-23 13:19:24'),
(23, 32, 31, 16, '2021-05-23 13:22:42'),
(24, 32, 31, 16, '2021-05-23 13:22:46'),
(25, 31, 32, 16, '2021-05-23 13:22:52'),
(26, 32, 31, 16, '2021-05-23 13:24:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `telefono` text NOT NULL,
  `rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `cedula`, `nombre`, `apellido`, `telefono`, `rol`) VALUES
(1, 1047493078, 'BENJAMIN', 'JIMENEZ', '3015256417', 1),
(22, 25551271, 'Edixon Enrique', 'Araujo', '3004572853', 2),
(30, 333, 'LOL3', 'LOL3', '333', 3),
(31, 4444, 'LOL4', 'LOL4', '4444', 3),
(32, 55555, 'LOL5', 'LOL5', '55555', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_gym`
--

CREATE TABLE `persona_gym` (
  `id` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idgym` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona_gym`
--

INSERT INTO `persona_gym` (`id`, `idpersona`, `idgym`) VALUES
(5, 30, 16),
(6, 31, 16),
(7, 32, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idprecio` int(11) NOT NULL,
  `idgym` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`id`, `idcliente`, `idprecio`, `idgym`) VALUES
(8, 32, 6, 16),
(9, 31, 10, 16),
(10, 30, 6, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `precio` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `precio` text NOT NULL,
  `idgym` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`id`, `nombre`, `precio`, `idgym`) VALUES
(6, 'DIARIO', '4000', 16),
(7, 'PAGO MENSUAL', '60000', 16),
(8, 'PAGO VIP', '100000', 16),
(10, 'PLAN VIP', '100000', 16),
(11, 'PLAN VIP2', '100000', 16),
(12, 'precio prueba', '120000', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'SU'),
(2, 'ADMIN'),
(3, 'CLIENTE'),
(4, 'ENTRENADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `rol` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `rol`, `idpersona`) VALUES
(1, 'BENJAMIN', '7e21ea21b239f1b37f26c8f2c62fa5391beab87d', 1, 1),
(20, 'EDIXON', '10470c3b4b1fed12c3baac014be15fac67c6e815', 2, 22);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idgym` (`idgym`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idgym` (`idgym`),
  ADD KEY `idpago` (`idpago`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `gym`
--
ALTER TABLE `gym`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idadmin` (`idadmin`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idgym` (`idgym`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona_gym`
--
ALTER TABLE `persona_gym`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpersona` (`idpersona`),
  ADD KEY `idgym` (`idgym`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idprecio` (`idprecio`),
  ADD KEY `idgym` (`idgym`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idgym` (`idgym`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpersona` (`idpersona`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `api`
--
ALTER TABLE `api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `gym`
--
ALTER TABLE `gym`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `persona_gym`
--
ALTER TABLE `persona_gym`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `precio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `api`
--
ALTER TABLE `api`
  ADD CONSTRAINT `api_ibfk_1` FOREIGN KEY (`idgym`) REFERENCES `gym` (`id`);

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`idgym`) REFERENCES `gym` (`id`),
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `asistencia_ibfk_3` FOREIGN KEY (`idpago`) REFERENCES `pago` (`id`);

--
-- Filtros para la tabla `gym`
--
ALTER TABLE `gym`
  ADD CONSTRAINT `gym_ibfk_1` FOREIGN KEY (`idadmin`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`idgym`) REFERENCES `gym` (`id`),
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `persona_gym`
--
ALTER TABLE `persona_gym`
  ADD CONSTRAINT `persona_gym_ibfk_1` FOREIGN KEY (`idgym`) REFERENCES `gym` (`id`),
  ADD CONSTRAINT `persona_gym_ibfk_2` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`idgym`) REFERENCES `gym` (`id`),
  ADD CONSTRAINT `plan_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `plan_ibfk_3` FOREIGN KEY (`idprecio`) REFERENCES `precio` (`id`);

--
-- Filtros para la tabla `precio`
--
ALTER TABLE `precio`
  ADD CONSTRAINT `precio_ibfk_1` FOREIGN KEY (`idgym`) REFERENCES `gym` (`id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
