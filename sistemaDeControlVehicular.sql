SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `controlVehicular2019-2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `controlVehicular2019-2`;

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

CREATE TABLE `licencias` (
  `folio` char(8) NOT NULL,
  `conductor` char(8) NOT NULL,
  `tipo` char(1) NOT NULL,
  `fechaExpedicion` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `estadoEmision` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `propietarios` (
  `rfc` char(13) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `correo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `robos` (
  `idReporte` int(8) NOT NULL,
  `vehiculo` int(8) NOT NULL,
  `lugar` varchar(70) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tenencias` (
  `folio` char(8) NOT NULL,
  `vehiculo` int(8) NOT NULL,
  `periodo` char(8) NOT NULL,
  `fechaPago` date NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `antiguedad` int(2) DEFAULT NULL,
  `descuento` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `usuarios` (
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `llave` varchar(66) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `intento` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `verificaciones` (
  `idVerificacion` int(8) NOT NULL,
  `vehiculo` int(8) NOT NULL,
  `periodo` char(7) NOT NULL,
  `centroVerificacion` varchar(15) NOT NULL,
  `tipo` varchar(2) NOT NULL,
  `dictamen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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

ALTER TABLE `robos`
  ADD PRIMARY KEY (`idReporte`),
  ADD KEY `vehiculo` (`vehiculo`);

ALTER TABLE `tenencias`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `vehiculo` (`vehiculo`);

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


ALTER TABLE `vehiculos`
  MODIFY `idVehiculo` int(8) NOT NULL AUTO_INCREMENT;

ALTER TABLE `verificaciones`
  MODIFY `idVerificacion` int(8) NOT NULL AUTO_INCREMENT;


ALTER TABLE `licencias`
  ADD CONSTRAINT `licencias_ibfk_1` FOREIGN KEY (`conductor`) REFERENCES `conductores` (`rfc`);

ALTER TABLE `multas`
  ADD CONSTRAINT `multas_ibfk_1` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculos` (`idVehiculo`),
  ADD CONSTRAINT `multas_ibfk_2` FOREIGN KEY (`verificacion`) REFERENCES `verificaciones` (`idVerificacion`),
  ADD CONSTRAINT `multas_ibfk_3` FOREIGN KEY (`licencia`) REFERENCES `licencias` (`folio`);

ALTER TABLE `robos`
  ADD CONSTRAINT `robos_ibfk_1` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculos` (`idVehiculo`);

ALTER TABLE `tenencias`
  ADD CONSTRAINT `tenencias_ibfk_1` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculos` (`idVehiculo`);

ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`propietario`) REFERENCES `propietarios` (`rfc`);

ALTER TABLE `verificaciones`
  ADD CONSTRAINT `verificaciones_ibfk_1` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculos` (`idVehiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
