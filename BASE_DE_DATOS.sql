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
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla servicios_db.clientes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla servicios_db.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla servicios_db.empleados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
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
  `nombre` int(11) DEFAULT NULL,
  `cobro_por_hora` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla servicios_db.servicios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;

-- Volcando estructura para tabla servicios_db.servicios_a_realizar
CREATE TABLE IF NOT EXISTS `servicios_a_realizar` (
  `id` int(11) DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `servicio` int(11) DEFAULT NULL,
  `fecha_inicio` int(11) DEFAULT NULL,
  `fecha_fin` int(11) DEFAULT NULL,
  `total_a_pagar` int(11) DEFAULT NULL,
  `fecha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla servicios_db.servicios_a_realizar: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios_a_realizar` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicios_a_realizar` ENABLE KEYS */;

-- Volcando estructura para tabla servicios_db.servicios_a_realizar_trabajadore
CREATE TABLE IF NOT EXISTS `servicios_a_realizar_trabajadore` (
  `id_servicoarealizar` int(11) NOT NULL AUTO_INCREMENT,
  `trabajador` int(11) NOT NULL DEFAULT 0,
  `hora_inicio` int(11) NOT NULL DEFAULT 0,
  `hora_fin` int(11) NOT NULL DEFAULT 0,
  `fecha` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_servicoarealizar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla servicios_db.servicios_a_realizar_trabajadore: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios_a_realizar_trabajadore` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicios_a_realizar_trabajadore` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
