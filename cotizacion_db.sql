# SQL Manager 2010 for MySQL 4.5.0.9
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : cotizacion_db


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `cotizacion_db`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `cotizacion_db`;

#
# Structure for the `area_tb` table : 
#

CREATE TABLE `area_tb` (
  `idArea` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idArea`),
  UNIQUE KEY `idArea` (`idArea`),
  UNIQUE KEY `nombre` (`nombre`),
  UNIQUE KEY `nombre_2` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Structure for the `persona_tb` table : 
#

CREATE TABLE `persona_tb` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `area` int(11) NOT NULL,
  `fechaAlta` date NOT NULL,
  `fechaBaja` date DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idPersona`),
  UNIQUE KEY `idPersona` (`idPersona`),
  KEY `area` (`area`),
  CONSTRAINT `persona_tb_fk` FOREIGN KEY (`area`) REFERENCES `area_tb` (`idArea`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

#
# Structure for the `tipo_tb` table : 
#

CREATE TABLE `tipo_tb` (
  `idTipoPago` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`idTipoPago`),
  UNIQUE KEY `idTipoPago` (`idTipoPago`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `cuota_tb` table : 
#

CREATE TABLE `cuota_tb` (
  `tipoPago` int(11) NOT NULL,
  `persona` int(11) NOT NULL,
  `saldoAnual` double(15,3) NOT NULL,
  `fechaAct` date NOT NULL,
  PRIMARY KEY (`tipoPago`,`persona`),
  KEY `persona` (`persona`),
  KEY `tipoPago` (`tipoPago`),
  CONSTRAINT `cuota_tb_fk` FOREIGN KEY (`persona`) REFERENCES `persona_tb` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cuota_tb_fk1` FOREIGN KEY (`tipoPago`) REFERENCES `tipo_tb` (`idTipoPago`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `trans_tb` table : 
#

CREATE TABLE `trans_tb` (
  `idTrans` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idTrans`),
  UNIQUE KEY `idTrans` (`idTrans`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `pagotb` table : 
#

CREATE TABLE `pagotb` (
  `tipoPago` int(11) NOT NULL,
  `persona` int(11) NOT NULL,
  `saldo` double(15,3) NOT NULL,
  `fecha` date NOT NULL,
  `trans` int(11) NOT NULL,
  PRIMARY KEY (`tipoPago`,`persona`,`saldo`,`fecha`),
  KEY `persona` (`persona`),
  KEY `tipoPago` (`tipoPago`),
  KEY `trans` (`trans`),
  CONSTRAINT `pago_tb_fk` FOREIGN KEY (`persona`) REFERENCES `persona_tb` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pago_tb_fk1` FOREIGN KEY (`tipoPago`) REFERENCES `tipo_tb` (`idTipoPago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pago_tb_fk2` FOREIGN KEY (`trans`) REFERENCES `trans_tb` (`idTrans`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;