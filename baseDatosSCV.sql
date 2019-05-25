-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2019 a las 01:03:22
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
CREATE DATABASE IF NOT EXISTS `controlvehicular2019` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `controlvehicular2019`;

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
('Anonimo', 'anonimo123', '', 'USU', 0, 0),
('Beto', '4321', '', 'ADM', 0, 0),
('Daniel', 'Daniel123', '', 'OTR', 0, 4),
('Jovan', '1234', '', 'OTR', 0, 0),
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
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `idVehiculo` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  MODIFY `idVerificacion` int(8) NOT NULL AUTO_INCREMENT;

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
--
-- Base de datos: `examen1`
--
CREATE DATABASE IF NOT EXISTS `examen1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `examen1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `claveDept` int(6) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `clave` int(6) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `salario` float(9,2) NOT NULL,
  `isr` float(9,2) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `dept` int(6) DEFAULT NULL,
  `fechaIngreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`claveDept`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`clave`),
  ADD KEY `dept` (`dept`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `claveDept` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `clave` int(6) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`dept`) REFERENCES `departamento` (`claveDept`);
--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Volcado de datos para la tabla `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"angular_direct\":\"direct\",\"relation_lines\":\"true\",\"snap_to_grid\":\"off\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"controlvehicular2019-2\",\"table\":\"users\"},{\"db\":\"controlvehicular2019-2\",\"table\":\"usuarios\"},{\"db\":\"controlvehicular2019-2\",\"table\":\"conductores\"},{\"db\":\"controlvehicular2019-2\",\"table\":\"licencias\"},{\"db\":\"controlvehicular2019-2\",\"table\":\"vehiculos\"},{\"db\":\"controlvehicular2019-2\",\"table\":\"verificaciones\"},{\"db\":\"controlvehicular2019-2\",\"table\":\"multas\"},{\"db\":\"controlvehicular2019-2\",\"table\":\"propietarios\"},{\"db\":\"controlvehicular2019-2\",\"table\":\"tenencias\"},{\"db\":\"controlvehicular2019-2\",\"table\":\"robos\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'controlvehicular2019-2', 'usuarios', '{\"sorted_col\":\"`usuarios`.`intento`  DESC\"}', '2019-05-17 20:53:49'),
('root', 'controlvehicular2019-2', 'vehiculos', '{\"CREATE_TIME\":\"2019-02-11 19:55:03\",\"col_order\":[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17],\"col_visib\":[1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1]}', '2019-05-05 18:16:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2019-05-25 22:57:31', '{\"lang\":\"es\",\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
