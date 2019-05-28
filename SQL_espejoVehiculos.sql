SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `espejovehiculos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `espejovehiculos`;

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


ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`idVehiculo`),
  ADD UNIQUE KEY `placa` (`placa`),
  ADD UNIQUE KEY `niv` (`niv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
