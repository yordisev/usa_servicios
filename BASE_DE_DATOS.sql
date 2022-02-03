-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para servicios_db
CREATE DATABASE IF NOT EXISTS `servicios_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `servicios_db`;

-- Volcando estructura para tabla servicios_db.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_doc` varchar(5) DEFAULT NULL,
  `numero_doc` int(11) DEFAULT NULL,
  `p_nombre` varchar(30) DEFAULT NULL,
  `s_nombre` varchar(30) DEFAULT NULL,
  `p_apellido` varchar(30) DEFAULT NULL,
  `s_apellido` varchar(30) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `referido` varchar(50) DEFAULT NULL,
  `cedula_ref` int(11) DEFAULT NULL,
  `telefono_ref` int(11) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  PRIMARY KEY (`id_cliente`) USING BTREE,
  UNIQUE KEY `numero_doc` (`numero_doc`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla servicios_db.clientes: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id_cliente`, `tipo_doc`, `numero_doc`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `telefono`, `direccion`, `referido`, `cedula_ref`, `telefono_ref`, `estado`, `fecha_registro`) VALUES
	(1, 'CC', 24234, 'emil', 'nombre', 'primera', 'segundo', 319210920, 'calle 45 # 32-45', 'carlos freile', 31313, 31313, 'A', '2022-01-17'),
	(2, 'CC', 2148124, 'DGSDG', 'ASDGSDG', 'SDGSDG', 'SDGSDG', 232523, 'DS', 'ASFASF', 2352, 325235, 'A', '2022-01-17'),
	(3, 'CC', 234234, 'dsgsdgs', 'sdgsdg', 'sdgsdg', 'sdgsdg', 25235, 'dgsdgdsg', 'sdhsdh', 46346, 436346, 'A', '2022-01-17'),
	(16, 'CC', 14812498, 'nata', 'isabel', 'perez', 'tejeda', 24832798, 'calle 54 # 32', 'carla', 24324324, 2347980, 'A', '2022-01-18'),
	(17, 'CC', 12345, 'carlos', 'jiraldo', 'sobrino', 'escorcia', 234327407, 'carrera 455', 'usted', 35798797, 987907987, 'A', '2022-01-18'),
	(18, 'CC', 987654321, 'avis', 'manuel', 'canate', 'perez', 2147483647, 'calle 23 # 32-11', 'talivan', 123434223, 2147483647, 'I', '2022-01-19'),
	(19, 'CC', 2138127, 'prueeab3', 'pruebaas', 'prueba323', 'prueba3287', 37131313, 'calle65', 'nuevorefe', 1212312312, 313131313, NULL, '2022-01-19'),
	(20, 'CC', 91919191, 'pablo', 'emilio', 'ariza', 'acuna', 300000002, 'calle 99', 'yefe', 1043333333, 313313313, 'I', '2022-01-19'),
	(21, 'CC', 1231313123, 'pacho', 'aguilar', 'ramos', 'ramos', 324242424, 'calle8787', 'emil', 1023565666, 321321321, 'A', '2022-01-19'),
	(22, 'CC', 1271273197, 'carlos', 'alfonso', 'romero', 'carrascal', 311311311, 'calle 22-12', 'ingrid', 10101010, 300300300, 'A', '2022-01-19'),
	(23, 'CC', 12, 'fj', 'jfjhf', 'kjffg', 'dh', 8768796, 'khjkhl', 'jkjg', 798797, 6544786, NULL, '2022-01-19'),
	(24, 'CC', 9999999, 'yyyyyy', 'tttttt', 'rrrrrrr', 'dddddd', 787878787, 'calle 45 # 32-45', 'uuuuuuu', 13333333, 6556566, NULL, '2022-01-19');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla servicios_db.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_doc` varchar(5) DEFAULT NULL,
  `numero_doc` int(11) DEFAULT NULL,
  `p_nombre` varchar(30) DEFAULT NULL,
  `s_nombre` varchar(30) DEFAULT NULL,
  `p_apellido` varchar(30) DEFAULT NULL,
  `s_apellido` varchar(30) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  PRIMARY KEY (`id_empleado`) USING BTREE,
  UNIQUE KEY `numero_doc` (`numero_doc`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla servicios_db.empleados: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` (`id_empleado`, `tipo_doc`, `numero_doc`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `telefono`, `direccion`, `estado`, `fecha_registro`) VALUES
	(1, 'CC', 24234, 'dayana', 'nombre', 'primera', 'segundo', 319210920, 'calle 45 # 32-45', 'I', '2022-01-17'),
	(2, 'CC', 2148124, 'DGSDG', 'ASDGSDG', 'SDGSDG', 'SDGSDG', 232523, 'DS', 'A', '2022-01-17'),
	(3, 'CC', 234234, 'dsgsdgs', 'sdgsdg', 'sdgsdg', 'sdgsdg', 25235, 'dgsdgdsg', 'A', '2022-01-17'),
	(16, 'CC', 14812498, 'nata', 'isabel', 'perez', 'tejeda', 24832798, 'calle 54 # 32', 'A', '2022-01-18'),
	(17, 'CC', 12345, 'carlos', 'jiraldo', 'sobrino', 'escorcia', 234327407, 'carrera 455', 'A', '2022-01-18'),
	(18, 'CC', 987654321, 'avis', 'manuel', 'canate', 'perez', 2147483647, 'calle 23 # 32-11', 'I', '2022-01-19'),
	(19, 'CC', 2138127, 'prueeab3', 'pruebaas', 'prueba323', 'prueba3287', 37131313, 'calle65', NULL, '2022-01-19'),
	(20, 'CC', 91919191, 'pablo', 'emilio', 'ariza', 'acuna', 300000002, 'calle 99', 'I', '2022-01-19'),
	(21, 'CC', 1231313123, 'pacho', 'aguilar', 'ramos', 'ramos', 324242424, 'calle8787', 'A', '2022-01-19'),
	(22, 'CC', 1271273197, 'carlos', 'alfonso', 'romero', 'carrascal', 311311311, 'calle 22-12', 'A', '2022-01-19'),
	(23, 'CC', 12, 'fj', 'jfjhf', 'kjffg', 'dh', 8768796, 'khjkhl', NULL, '2022-01-19'),
	(24, 'CC', 9999999, 'yyyyyy', 'tttttt', 'rrrrrrr', 'dddddd', 787878787, 'calle 45 # 32-45', NULL, '2022-01-19');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;

-- Volcando estructura para tabla servicios_db.ingresos
CREATE TABLE IF NOT EXISTS `ingresos` (
  `id_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` int(11) DEFAULT NULL,
  `valor` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `tipo_trabajo` varchar(50) NOT NULL,
  `horas_del_trabajo` int(11) NOT NULL DEFAULT 0,
  `observacion` int(11) NOT NULL DEFAULT 0,
  `fecha` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_ingreso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla servicios_db.ingresos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ingresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingresos` ENABLE KEYS */;

-- Volcando estructura para tabla servicios_db.pagos_realizados
CREATE TABLE IF NOT EXISTS `pagos_realizados` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `valor_pago` varchar(50) DEFAULT NULL,
  `empleado` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `observacion` varchar(50) DEFAULT NULL,
  `fecha_pago` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla servicios_db.pagos_realizados: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `pagos_realizados` DISABLE KEYS */;
INSERT INTO `pagos_realizados` (`id_pago`, `valor_pago`, `empleado`, `tipo`, `observacion`, `fecha_pago`) VALUES
	(1, '200', '104530', 'CHEQUE', NULL, NULL),
	(2, '100', '154654', 'EFECTIVO', NULL, NULL);
/*!40000 ALTER TABLE `pagos_realizados` ENABLE KEYS */;

-- Volcando estructura para tabla servicios_db.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `cobro_por_hora` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla servicios_db.servicios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` (`id_servicio`, `nombre`, `cobro_por_hora`, `estado`) VALUES
	(1, 'Limpieza Ventanas', 20, 'A'),
	(2, 'Limpieza Piscina', 50, 'I'),
	(3, 'Limpieza Casa', 235234, 'A'),
	(4, 'prueba', 500, 'A');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;

-- Volcando estructura para tabla servicios_db.servicios_a_realizar
CREATE TABLE IF NOT EXISTS `servicios_a_realizar` (
  `id_ser_rea` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` int(11) DEFAULT NULL,
  `servicio` varchar(50) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `total_a_pagar` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado_servicio` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_ser_rea`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla servicios_db.servicios_a_realizar: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios_a_realizar` DISABLE KEYS */;
INSERT INTO `servicios_a_realizar` (`id_ser_rea`, `cliente`, `servicio`, `fecha_inicio`, `hora_inicio`, `fecha_fin`, `hora_fin`, `total_a_pagar`, `fecha`, `estado_servicio`) VALUES
	(1, 2148124, '4', '2022-01-31', '16:37:00', '2022-01-31', '16:40:00', 200, '2022-01-31', 'A'),
	(2, 24234, '2', '2022-01-31', NULL, '2022-01-31', NULL, 300, '2022-01-31', 'T'),
	(3, 12345, '3', '2022-01-21', '14:30:00', '2022-01-28', '14:30:00', NULL, '2022-01-31', 'A'),
	(4, 987654321, '3', '2022-01-21', '14:39:00', '2022-01-31', '14:38:00', NULL, '2022-01-31', 'A'),
	(5, 1271273197, '3', '2022-01-13', '14:45:00', '2022-01-19', '14:44:00', NULL, '2022-01-31', 'A'),
	(6, 1271273197, '2', '2022-01-11', '14:45:00', '2022-01-27', '14:44:00', NULL, '2022-01-31', 'T'),
	(7, 2138127, '2', '2022-01-06', '14:48:00', '2022-01-19', '14:47:00', NULL, '2022-01-31', 'A'),
	(10, 12345, '2', '2022-01-26', '14:51:00', '2022-01-31', '14:48:00', NULL, '2022-01-31', 'A'),
	(11, 24234, '2', '2022-01-13', '18:48:00', '2022-01-31', '14:50:00', NULL, '2022-01-31', 'A');
/*!40000 ALTER TABLE `servicios_a_realizar` ENABLE KEYS */;

-- Volcando estructura para tabla servicios_db.servicios_a_realizar_trabajadore
CREATE TABLE IF NOT EXISTS `servicios_a_realizar_trabajadore` (
  `id_servicioarealizar` int(11) NOT NULL AUTO_INCREMENT,
  `id_servicio` int(11) NOT NULL,
  `trabajador` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `fecha` date NOT NULL,
  `estadoservi` varchar(50) NOT NULL,
  `estadoemple` varchar(50) NOT NULL,
  PRIMARY KEY (`id_servicioarealizar`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla servicios_db.servicios_a_realizar_trabajadore: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios_a_realizar_trabajadore` DISABLE KEYS */;
INSERT INTO `servicios_a_realizar_trabajadore` (`id_servicioarealizar`, `id_servicio`, `trabajador`, `fecha_inicio`, `hora_inicio`, `fecha_fin`, `hora_fin`, `fecha`, `estadoservi`, `estadoemple`) VALUES
	(1, 2, 24234, '2022-02-03', '16:37:00', '2022-02-03', '16:37:00', '0000-00-00', 'T', 'Termino'),
	(2, 2, 2148124, '2021-12-29', '06:00:00', '2022-02-23', '15:00:00', '0000-00-00', 'T', ''),
	(3, 2, 12345, '2022-01-12', '07:31:00', '2022-02-02', '07:30:00', '0000-00-00', '', ''),
	(4, 2, 14812498, NULL, NULL, NULL, NULL, '0000-00-00', '', ''),
	(5, 6, 14812498, '2022-02-25', '06:55:00', '2022-02-10', '14:55:00', '2022-02-01', '', ''),
	(6, 6, 12345, '2022-02-01', '06:57:00', '2022-02-05', '16:57:00', '2022-02-01', '', ''),
	(7, 6, 1271273197, NULL, NULL, NULL, NULL, '2022-02-01', '', ''),
	(8, 7, 12345, NULL, NULL, NULL, NULL, '2022-02-01', '', ''),
	(9, 7, 14812498, NULL, NULL, NULL, NULL, '2022-02-01', '', ''),
	(10, 1, 2148124, NULL, NULL, NULL, NULL, '2022-02-02', 'D', ''),
	(11, 7, 24234, '2022-02-03', '16:08:00', '2022-02-03', '16:17:00', '0000-00-00', 'I', '');
/*!40000 ALTER TABLE `servicios_a_realizar_trabajadore` ENABLE KEYS */;

-- Volcando estructura para tabla servicios_db.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_doc` varchar(50) DEFAULT NULL,
  `numero_doc` int(11) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `estado` varchar(60) DEFAULT 'A',
  `fecha_registro` timestamp NULL DEFAULT NULL,
  `editado` datetime DEFAULT NULL,
  `nivel` int(11) DEFAULT 1,
  PRIMARY KEY (`id_admin`) USING BTREE,
  UNIQUE KEY `usuario` (`usuario`) USING BTREE,
  UNIQUE KEY `numero_doc` (`numero_doc`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla servicios_db.usuarios: 6 rows
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_admin`, `tipo_doc`, `numero_doc`, `usuario`, `nombres`, `apellidos`, `password`, `estado`, `fecha_registro`, `editado`, `nivel`) VALUES
	(3, 'TI', 1234, 'dairo@redes.com', 'Dairo Rafael', 'Barrios Ramos', '$2y$12$nuYWSX12NkjZ99T35a0KnudJKyM7d.7o9u4pXTz2vElQuYQlBWHUq', 'A', NULL, NULL, 1),
	(5, 'CC', 123456, 'yordis@redes.com', 'Yordis', 'Escorcia', '$2y$12$5keXTBZQhRWC9RddHhs/IOTeVGaqFbXD6zKCmsYxi3ODDUCZulh9W', 'A', NULL, NULL, 1),
	(6, 'CC', 987654, 'regina@redes.com', 'Regina Marina', 'TRILLO PRUEBA', '$2y$12$9aybpvrXNTT/Qf2JjmrHMulOQOAhE5XBquZc.DIROCzB8VssEoO6q', 'A', NULL, NULL, 1),
	(7, 'CC', 12345, 'carlos@redes.com', 'Carlos', 'Sobrino', '$2y$12$PEgV1VqS.z3T0yMIQ24NwuMXE9vFY1cOksU5amGOtsChjv7teFDjG', 'A', NULL, NULL, 3),
	(8, 'TI', 123, 'angie@redes.com', 'angie', 'Escorcia Vasquez', '$2y$12$tz/CAxQvS7sWR8nJGQ5eb.vEWkAzgrIoOYEQf48b5OZQ5HHLPa8PG', 'A', NULL, NULL, 1),
	(9, 'CC', 24234, 'dayana@redes.com', 'Dayana', 'prima', '$2y$12$T8mD4bLqFe3znRAt4o.isuc0rXpv9keO65x4qHfq8rd9IhORdS4ri', 'A', NULL, NULL, 3);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
