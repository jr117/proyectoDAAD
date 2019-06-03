SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `controlvehicular` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `controlvehicular`;

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

INSERT INTO `conductores` (`rfc`, `nombre`, `fechaNac`, `firma`, `domicilio`, `antiguedad`, `sexo`, `tipoSangre`, `restriccion`, `telEmergencia`) VALUES
('0', '0', '1111-01-01', '0-Firma.png', '0', 0, 0, '0', '0', '0');

CREATE TABLE `licencias` (
  `folio` char(8) NOT NULL,
  `conductor` char(8) NOT NULL,
  `tipo` char(1) NOT NULL,
  `fechaExpedicion` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `estadoEmision` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `licencias` (`folio`, `conductor`, `tipo`, `fechaExpedicion`, `fechaVencimiento`, `estadoEmision`) VALUES
('0', '0', '0', '0001-01-01', '0001-01-01', '0');

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

INSERT INTO `multas` (`folio`, `vehiculo`, `verificacion`, `licencia`, `descripcion`, `monto`, `fecha`, `motivo`, `emisor`, `garantia`) VALUES
(0, 0, 0, '0', '0', '0.00', '0001-01-01 00:00:00', '0', '0', '0');

CREATE TABLE `propietarios` (
  `rfc` char(13) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `correo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `propietarios` (`rfc`, `nombre`, `direccion`, `telefono`, `correo`) VALUES
('0', '0', '0', '0', '0@0');

CREATE TABLE `usuarios` (
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `llave` varchar(66) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `intento` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usuarios` (`username`, `pass`, `llave`, `tipo`, `estado`, `intento`) VALUES
('Admin', 'Administrador963', '@#k&QFOM8YuU@bIjGnKCXwXeBkQxcR&hL2U66PygIvTAoY4bWh5Xzq1HK0Z1ka2%4J', 'OTR', 1, 0),
('Usuario1', 'Usuario741', 'yEvrfbbR6U^MX8cvcI$tdjgL5HEn^DHBA&Qc2W2tIpw9yG#0!gFfcs5%hCL%gJ#nzR', 'USU', 1, 0),
('Usuario2', 'Usuario852', 'fg&06L!qZsn6iTpzaF1Tk^VF8fjbP%It7tc^sWGVmvr9U3NoNwcgq2t^Ix&ZG3twXT', 'USU', 1, 0);

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

INSERT INTO `vehiculos` (`idVehiculo`, `propietario`, `niv`, `placa`, `uso`, `tipo`, `color`, `origen`, `linea`, `transmision`, `numeroCilindro`, `ano`, `combustible`, `modelo`, `numSerie`, `numMotor`, `marca`, `numPuerta`) VALUES
(0, '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, 0000, '0', '0', '0', '0', '0', 0);

CREATE TABLE `verificaciones` (
  `idVerificacion` int(8) NOT NULL,
  `vehiculo` int(8) NOT NULL,
  `periodo` char(7) NOT NULL,
  `centroVerificacion` varchar(15) NOT NULL,
  `tipo` varchar(2) NOT NULL,
  `dictamen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `verificaciones` (`idVerificacion`, `vehiculo`, `periodo`, `centroVerificacion`, `tipo`, `dictamen`) VALUES
(0, 0, '0', '0', '0', '0');


ALTER TABLE `conductores`
  ADD PRIMARY KEY (`rfc`);

ALTER TABLE `licencias`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `conductor` (`conductor`);

ALTER TABLE `multas`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `vehiculo` (`vehiculo`),
  ADD KEY `verificacion` (`verificacion`),
  ADD KEY `licencia` (`licencia`);

ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`rfc`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`);

ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`idVehiculo`),
  ADD UNIQUE KEY `placa` (`placa`),
  ADD UNIQUE KEY `niv` (`niv`),
  ADD KEY `propietario` (`propietario`);

ALTER TABLE `verificaciones`
  ADD PRIMARY KEY (`idVerificacion`),
  ADD KEY `vehiculo` (`vehiculo`);

ALTER TABLE `licencias`
  ADD CONSTRAINT `licencias_ibfk_1` FOREIGN KEY (`conductor`) REFERENCES `conductores` (`rfc`);

ALTER TABLE `multas`
  ADD CONSTRAINT `multas_ibfk_1` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculos` (`idVehiculo`),
  ADD CONSTRAINT `multas_ibfk_2` FOREIGN KEY (`verificacion`) REFERENCES `verificaciones` (`idVerificacion`),
  ADD CONSTRAINT `multas_ibfk_3` FOREIGN KEY (`licencia`) REFERENCES `licencias` (`folio`);

ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`propietario`) REFERENCES `propietarios` (`rfc`);

ALTER TABLE `verificaciones`
  ADD CONSTRAINT `verificaciones_ibfk_1` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculos` (`idVehiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
