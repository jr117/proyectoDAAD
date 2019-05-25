-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2019 a las 23:57:03
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controlvehicular2019-2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

CREATE TABLE `conductores` (
  `rfc` char(13) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fechaNac` date NOT NULL,
  `firma` varchar(50) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `antiguedad` int(2) NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `tipoSangre` char(3) DEFAULT NULL,
  `restriccion` varchar(20) DEFAULT NULL,
  `telEmergencia` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conductores`
--

INSERT INTO `conductores` (`rfc`, `nombre`, `fechaNac`, `firma`, `domicilio`, `antiguedad`, `sexo`, `tipoSangre`, `restriccion`, `telEmergencia`) VALUES
('0', '0', '1111-01-01', '0-Firma.png', '0', 0, 0, '0', '0', '0'),
('1', 'Jose', '1997-03-18', '1', '1', 1, 1, '1', '1', '1'),
('123', 'Luis', '1997-02-17', 'franc', 'ignacio', 2, 1, 'O+', '', '4422456541'),
('2', 'Luis', '1997-02-17', '2-Firma.png', 'Soler', 1, 1, 'O', '3', '123213');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias`
--

CREATE TABLE `licencias` (
  `folio` char(8) NOT NULL,
  `conductor` char(8) NOT NULL,
  `tipo` char(1) NOT NULL,
  `fechaExpedicion` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `estadoEmision` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `licencias`
--

INSERT INTO `licencias` (`folio`, `conductor`, `tipo`, `fechaExpedicion`, `fechaVencimiento`, `estadoEmision`) VALUES
('0', '0', '0', '0001-01-01', '0001-01-01', '0'),
('1', '1', 'B', '2008-07-12', '2018-07-12', 'Queretaro'),
('128s3', '1', '1', '1212-12-12', '1222-12-12', 'Queretaro'),
('13', '123', 'A', '2008-07-12', '2018-07-12', 'Queretaro'),
('2', '1', 'B', '2008-07-12', '2018-07-12', 'Queretaro'),
('3', '1', 'B', '2008-07-12', '2018-07-12', 'Queretaro'),
('4', '123', 'B', '2008-07-12', '2018-07-12', 'Queretaro'),
('5', '123', 'B', '2008-07-12', '2018-07-12', 'Queretaro'),
('6', '1', 'A', '1212-12-12', '1213-12-12', 'Qro'),
('7', '1', '3', '0001-01-01', '0000-00-00', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multas`
--

CREATE TABLE `multas` (
  `folio` int(8) NOT NULL,
  `vehiculo` int(8) DEFAULT NULL,
  `verificacion` int(8) DEFAULT NULL,
  `licencia` char(8) DEFAULT NULL,
  `descripcion` varchar(250) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `emisor` varchar(50) NOT NULL,
  `garantia` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `multas`
--

INSERT INTO `multas` (`folio`, `vehiculo`, `verificacion`, `licencia`, `descripcion`, `monto`, `fecha`, `motivo`, `emisor`, `garantia`) VALUES
(0, 0, 0, '0', '0', '0.00', '0001-01-01 00:00:00', '0', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `rfc` char(13) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `correo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`rfc`, `nombre`, `direccion`, `telefono`, `correo`) VALUES
('0', '0', '0', '0', '0@0'),
('123452', 'Luis Jose', 'Ignacio centeno', '421-453', 'jlse@you.com'),
('3', 'Jos', 'dasd', '61168', 'sdf@sdc.com'),
('4', '1', '1', '1', '1'),
('556', '1', '2', '1235', '123@721.com'),
('asdf', 'asd', 'adsf', 'asdf', 'asdf@asdf.com'),
('dfsc615d', 'Luis', 'Ignacio centeno', '46106147819', 'jose@live.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `robos`
--

CREATE TABLE `robos` (
  `idReporte` int(8) NOT NULL,
  `vehiculo` int(8) NOT NULL,
  `lugar` varchar(70) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tenencias`
--

CREATE TABLE `tenencias` (
  `folio` char(8) NOT NULL,
  `vehiculo` int(8) NOT NULL,
  `periodo` char(8) NOT NULL,
  `fechaPago` date NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `antiguedad` int(2) DEFAULT NULL,
  `descuento` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `llave` varchar(66) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `intento` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `pass`, `llave`, `tipo`, `estado`, `intento`) VALUES
('Andrea', '1234', '321', 'USU', 1, 0),
('Anonimo', 'anonimo123', '', 'USU', 1, 0),
('Beto', '4321', '', 'ADM', 1, 0),
('Daniel', 'Daniel123', '', 'OTR', 1, 0),
('Jovan', '1234', '', 'OTR', 1, 0),
('Marco', '12345678', '', 'ADM', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `idVehiculo` int(8) NOT NULL,
  `propietario` char(13) DEFAULT NULL,
  `niv` char(17) DEFAULT NULL,
  `placa` varchar(10) NOT NULL,
  `uso` varchar(20) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `color` varchar(15) NOT NULL,
  `origen` varchar(25) DEFAULT NULL,
  `linea` varchar(10) DEFAULT NULL,
  `transmision` varchar(10) DEFAULT NULL,
  `numeroCilindro` int(2) DEFAULT NULL,
  `ano` year(4) DEFAULT NULL,
  `combustible` varchar(15) DEFAULT NULL,
  `modelo` varchar(15) DEFAULT NULL,
  `numSerie` char(17) DEFAULT NULL,
  `numMotor` char(10) DEFAULT NULL,
  `marca` varchar(15) DEFAULT NULL,
  `numPuerta` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`idVehiculo`, `propietario`, `niv`, `placa`, `uso`, `tipo`, `color`, `origen`, `linea`, `transmision`, `numeroCilindro`, `ano`, `combustible`, `modelo`, `numSerie`, `numMotor`, `marca`, `numPuerta`) VALUES
(0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, 0000, '0', '0', '0', '0', '0', 0),
(1, '123452', '', 'fgas', 'personal', 'sedan', 'rojo', 'queretaro', 'sedan', 'estandar', 4, 2005, '2', '2005', '1234', '2317654', 'Ford', 4),
(5, 'dfsc615d', '5', 'sd18513', 'domestico', '3', 'rojo', 'queretaro', 'sedan', 'automatico', 8, 2010, '1', '1238', '8762', '1296', 'Nissan', 4),
(15, 'dfsc615d', '2', '2', '2', '2', '2', '2', '2', '2', 2, 2002, '2', '2', '2', '2', '2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verificaciones`
--

CREATE TABLE `verificaciones` (
  `idVerificacion` int(8) NOT NULL,
  `vehiculo` int(8) NOT NULL,
  `periodo` char(7) NOT NULL,
  `centroVerificacion` varchar(15) NOT NULL,
  `tipo` varchar(2) NOT NULL,
  `dictamen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `verificaciones`
--

INSERT INTO `verificaciones` (`idVerificacion`, `vehiculo`, `periodo`, `centroVerificacion`, `tipo`, `dictamen`) VALUES
(0, 0, '0', '0', '0', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`rfc`);

--
-- Indices de la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `conductor` (`conductor`);

--
-- Indices de la tabla `multas`
--
ALTER TABLE `multas`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `vehiculo` (`vehiculo`),
  ADD KEY `verificacion` (`verificacion`),
  ADD KEY `licencia` (`licencia`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`rfc`);

--
-- Indices de la tabla `robos`
--
ALTER TABLE `robos`
  ADD PRIMARY KEY (`idReporte`),
  ADD KEY `vehiculo` (`vehiculo`);

--
-- Indices de la tabla `tenencias`
--
ALTER TABLE `tenencias`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `vehiculo` (`vehiculo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`idVehiculo`),
  ADD UNIQUE KEY `placa` (`placa`),
  ADD UNIQUE KEY `niv` (`niv`),
  ADD KEY `propietario` (`propietario`);

--
-- Indices de la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  ADD PRIMARY KEY (`idVerificacion`),
  ADD KEY `vehiculo` (`vehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `idVehiculo` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  MODIFY `idVerificacion` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD CONSTRAINT `licencias_ibfk_1` FOREIGN KEY (`conductor`) REFERENCES `conductores` (`rfc`);

--
-- Filtros para la tabla `multas`
--
ALTER TABLE `multas`
  ADD CONSTRAINT `multas_ibfk_1` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculos` (`idVehiculo`),
  ADD CONSTRAINT `multas_ibfk_2` FOREIGN KEY (`verificacion`) REFERENCES `verificaciones` (`idVerificacion`),
  ADD CONSTRAINT `multas_ibfk_3` FOREIGN KEY (`licencia`) REFERENCES `licencias` (`folio`);

--
-- Filtros para la tabla `robos`
--
ALTER TABLE `robos`
  ADD CONSTRAINT `robos_ibfk_1` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculos` (`idVehiculo`);

--
-- Filtros para la tabla `tenencias`
--
ALTER TABLE `tenencias`
  ADD CONSTRAINT `tenencias_ibfk_1` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculos` (`idVehiculo`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`propietario`) REFERENCES `propietarios` (`rfc`);

--
-- Filtros para la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  ADD CONSTRAINT `verificaciones_ibfk_1` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculos` (`idVehiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
