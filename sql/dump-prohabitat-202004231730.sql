-- MariaDB dump 10.17  Distrib 10.4.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: prohabitat
-- ------------------------------------------------------
-- Server version	10.4.12-MariaDB-1:10.4.12+maria~eoan-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aseguradora`
--

DROP TABLE IF EXISTS `aseguradora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aseguradora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propietario` varchar(100) DEFAULT NULL,
  `titular` varchar(100) DEFAULT NULL COMMENT 'Nombre del propietario',
  `compania` varchar(100) DEFAULT NULL COMMENT 'Nombre de la compañia',
  `tel1` varchar(15) DEFAULT NULL,
  `contacto1` varchar(50) DEFAULT NULL,
  `email1` varchar(100) DEFAULT NULL,
  `tel2` varchar(15) DEFAULT NULL,
  `contacto2` varchar(50) DEFAULT NULL,
  `email2` varchar(100) DEFAULT NULL,
  `dir` varchar(100) DEFAULT NULL,
  `pob` varchar(50) DEFAULT NULL,
  `prov` varchar(50) DEFAULT NULL,
  `cp` decimal(5,0) unsigned zerofill NOT NULL,
  `obs` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `edificios`
--

DROP TABLE IF EXISTS `edificios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edificios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `poblacion` varchar(50) DEFAULT NULL,
  `notas` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `razonsocial` varchar(100) DEFAULT NULL,
  `nif` varchar(12) DEFAULT NULL,
  `tel1` varchar(15) DEFAULT NULL,
  `contacto1` varchar(50) DEFAULT NULL,
  `email1` varchar(100) DEFAULT NULL,
  `tel2` varchar(15) DEFAULT NULL,
  `contacto2` varchar(50) DEFAULT NULL,
  `email2` varchar(100) DEFAULT NULL,
  `dir` varchar(100) DEFAULT NULL,
  `pob` varchar(50) DEFAULT NULL,
  `prov` varchar(50) DEFAULT NULL,
  `cp` decimal(5,0) unsigned zerofill NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `obs` text DEFAULT NULL,
  `nomcorto` varchar(15) DEFAULT NULL,
  `tienelogo` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Bandera que nos permite verificar si hay logo o no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Tabla de configuracion, datos y logo de la empresa';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entsal`
--

DROP TABLE IF EXISTS `entsal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entsal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idinquilino` int(11) DEFAULT NULL,
  `idpiso` int(11) DEFAULT NULL,
  `ocupado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Estado de ocupacion del Piso o Habitacion 1=ocupado 2=desocupado',
  `fechaE` date DEFAULT NULL COMMENT 'FECHA DE ENTRADA AL PISO O HABITACION',
  `lgasE` int(11) DEFAULT NULL COMMENT 'LECTURA DEL MEDIDOR DE GAS A LA ENTRADA',
  `lluzE` int(11) DEFAULT NULL COMMENT 'LECTURA DE LUZ A LA ENTRADA',
  `laguaE` int(11) DEFAULT NULL COMMENT 'LECTURA DEL AGUA A LA ENTRADA',
  `fechaS` date DEFAULT NULL COMMENT 'FECHA DE SALIDA DEL PISO O HABITACION',
  `lgasS` int(11) DEFAULT 0 COMMENT 'LECTURA MEDIDOR DE GAS A LA SALIDA',
  `lluzS` int(11) DEFAULT 0 COMMENT 'LECTURA MEDIDOR DE LUZ A LA SALIDA',
  `laguaS` int(11) DEFAULT 0 COMMENT 'LECTURA MEDIDOR DE AGUA A LA SALIDA',
  `notas` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_es_inq` (`idinquilino`),
  KEY `FK_es_pis` (`idpiso`),
  CONSTRAINT `FK_es_inq` FOREIGN KEY (`idinquilino`) REFERENCES `inquilinos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_es_pis` FOREIGN KEY (`idpiso`) REFERENCES `pisos` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `des` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Tipo de estado: ABIERTA, INFORMADA, EN TRAMITE, CERRADA...';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `fac_pagadas`
--

DROP TABLE IF EXISTS `fac_pagadas`;
/*!50001 DROP VIEW IF EXISTS `fac_pagadas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `fac_pagadas` (
  `idfactura` tinyint NOT NULL,
  `numfac` tinyint NOT NULL,
  `ffactura` tinyint NOT NULL,
  `servicio` tinyint NOT NULL,
  `impusr` tinyint NOT NULL,
  `impfac` tinyint NOT NULL,
  `pagado` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `fac_ptes`
--

DROP TABLE IF EXISTS `fac_ptes`;
/*!50001 DROP VIEW IF EXISTS `fac_ptes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `fac_ptes` (
  `idfactura` tinyint NOT NULL,
  `numfac` tinyint NOT NULL,
  `ffactura` tinyint NOT NULL,
  `servicio` tinyint NOT NULL,
  `imppte` tinyint NOT NULL,
  `impfac` tinyint NOT NULL,
  `pagado` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(30) DEFAULT NULL,
  `fechaf` date DEFAULT NULL,
  `importe` decimal(15,2) DEFAULT NULL,
  `fdes` date DEFAULT NULL,
  `fhas` date DEFAULT NULL,
  `lant` int(11) DEFAULT NULL,
  `lact` int(11) DEFAULT NULL,
  `periodo` varchar(30) DEFAULT NULL,
  `idservicio` int(11) DEFAULT NULL,
  `idpiso` int(11) DEFAULT NULL,
  `facdoc` varchar(100) NOT NULL DEFAULT 'No ha subido Archivo' COMMENT 'Este campo gurada la ruta del cdocumente (Factura real escaneada)',
  `docu` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Booleano que nos indica si hay documento subido on',
  PRIMARY KEY (`id`),
  KEY `FK_fac_serv` (`idservicio`),
  KEY `FK_fac_pis` (`idpiso`),
  CONSTRAINT `FK_fac_pis` FOREIGN KEY (`idpiso`) REFERENCES `pisos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_fac_serv` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='facturas de Servicios Luz, Gas, Agua';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hisinc`
--

DROP TABLE IF EXISTS `hisinc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hisinc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idinc` int(11) DEFAULT NULL,
  `idestado` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `nota` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_his_inc` (`idinc`),
  KEY `FK_his_est` (`idestado`),
  CONSTRAINT `FK_his_est` FOREIGN KEY (`idestado`) REFERENCES `estados` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_his_inc` FOREIGN KEY (`idinc`) REFERENCES `incidencias` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla con el historial del proceso de la incidencia';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `img`
--

DROP TABLE IF EXISTS `img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idincidencia` int(11) DEFAULT NULL,
  `nompath` varchar(200) DEFAULT NULL COMMENT 'Nombre y ruta donde se guarda la imagen',
  `estado` varchar(50) DEFAULT NULL COMMENT 'Estado de la imagen. ANTES, DESPUES o DURANTE',
  `comentario` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_img_inc` (`idincidencia`),
  CONSTRAINT `FK_img_inc` FOREIGN KEY (`idincidencia`) REFERENCES `incidencias` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Imagenes correspondientes a la incidencia, antes y despues';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `incidencias`
--

DROP TABLE IF EXISTS `incidencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpiso` int(11) DEFAULT NULL,
  `idtipologia` int(11) DEFAULT NULL,
  `idseguro` int(11) DEFAULT NULL,
  `falta` datetime NOT NULL COMMENT 'Fecha en que entra la incidencia',
  `idprof` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_inc_pis` (`idpiso`),
  KEY `FK_inc_tip` (`idtipologia`),
  KEY `FK_inc_pro` (`idprof`),
  CONSTRAINT `FK_inc_pis` FOREIGN KEY (`idpiso`) REFERENCES `pisos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_inc_pro` FOREIGN KEY (`idprof`) REFERENCES `profesionales` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_inc_tip` FOREIGN KEY (`idtipologia`) REFERENCES `tipologia` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `inqui_entsal`
--

DROP TABLE IF EXISTS `inqui_entsal`;
/*!50001 DROP VIEW IF EXISTS `inqui_entsal`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `inqui_entsal` (
  `id` tinyint NOT NULL,
  `idinqui` tinyint NOT NULL,
  `nick` tinyint NOT NULL,
  `nomape` tinyint NOT NULL,
  `dni` tinyint NOT NULL,
  `telefono` tinyint NOT NULL,
  `fechaE` tinyint NOT NULL,
  `fechaS` tinyint NOT NULL,
  `tienepiso` tinyint NOT NULL,
  `idpiso` tinyint NOT NULL,
  `edipiso` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `inquilinos`
--

DROP TABLE IF EXISTS `inquilinos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inquilinos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `nick` varchar(25) DEFAULT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `pax` decimal(3,1) DEFAULT 1.0,
  `comentario` text DEFAULT NULL,
  `piso` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de piso asignado 1=Asignado y 0=SinPiso',
  `descuento` decimal(6,2) DEFAULT 0.00 COMMENT 'Descuento en €uros del pago del servicio',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `materiales`
--

DROP TABLE IF EXISTS `materiales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materiales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idincidencia` int(11) DEFAULT NULL,
  `des` varchar(100) DEFAULT NULL,
  `imp` decimal(8,2) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_mat_inc` (`idincidencia`),
  CONSTRAINT `FK_mat_inc` FOREIGN KEY (`idincidencia`) REFERENCES `incidencias` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!50001 DROP VIEW IF EXISTS `pagos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `pagos` (
  `idinqui` tinyint NOT NULL,
  `idfactura` tinyint NOT NULL,
  `numfac` tinyint NOT NULL,
  `servicio` tinyint NOT NULL,
  `fpago` tinyint NOT NULL,
  `ffactura` tinyint NOT NULL,
  `fdes` tinyint NOT NULL,
  `fhas` tinyint NOT NULL,
  `descuento` tinyint NOT NULL,
  `impusr` tinyint NOT NULL,
  `impfac` tinyint NOT NULL,
  `pax` tinyint NOT NULL,
  `pagado` tinyint NOT NULL,
  `preuni` tinyint NOT NULL,
  `confac` tinyint NOT NULL,
  `conusr` tinyint NOT NULL,
  `nick` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomusr` varchar(100) DEFAULT NULL,
  `psw` varchar(64) DEFAULT NULL,
  `idtecnico` int(11) DEFAULT NULL,
  `nivel` int(11) NOT NULL DEFAULT 1 COMMENT 'Nivel de Acceso a la APP 0=Admin, 1=Tecnico, 2=Oficina',
  `descnivel` varchar(20) DEFAULT 'TECNICO' COMMENT 'Descripcion del nivel ADMINISTRADOR, TECNICO, OFICINA',
  PRIMARY KEY (`id`),
  KEY `FK_usu_tec` (`idtecnico`),
  CONSTRAINT `FK_usu_tec` FOREIGN KEY (`idtecnico`) REFERENCES `tecnicos` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pisos`
--

DROP TABLE IF EXISTS `pisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEdificio` int(11) DEFAULT NULL,
  `planta` varchar(30) DEFAULT NULL,
  `puerta` varchar(5) DEFAULT NULL,
  `escalera` varchar(5) DEFAULT NULL,
  `notas` text DEFAULT NULL,
  `habitaciones` int(11) NOT NULL DEFAULT 1,
  `idTecnico` int(11) DEFAULT NULL COMMENT 'Tecnico que lo gestiona',
  `idProyecto` int(11) DEFAULT NULL COMMENT 'Proyecto al que pertenece',
  `idpoliza` int(11) DEFAULT NULL COMMENT 'Poliza de seguro delpiso',
  PRIMARY KEY (`id`),
  KEY `FK_pis_edi` (`idEdificio`),
  KEY `FK_pis_tec` (`idTecnico`),
  KEY `FK_pis_pro` (`idProyecto`),
  KEY `FK_pis_seg` (`idpoliza`),
  CONSTRAINT `FK_pis_edi` FOREIGN KEY (`idEdificio`) REFERENCES `edificios` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_pis_pro` FOREIGN KEY (`idProyecto`) REFERENCES `proyectos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_pis_seg` FOREIGN KEY (`idpoliza`) REFERENCES `poliza` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_pis_tec` FOREIGN KEY (`idTecnico`) REFERENCES `tecnicos` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `poliza`
--

DROP TABLE IF EXISTS `poliza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poliza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idaseg` int(11) DEFAULT NULL COMMENT 'ID de la aseguradora',
  `npoliza` varchar(50) DEFAULT NULL COMMENT 'Nro de la poliza',
  `referencia` varchar(50) DEFAULT NULL,
  `titular` varchar(100) DEFAULT NULL,
  `femision` date DEFAULT NULL COMMENT 'Fecha de emision de la poliza',
  `fvencimiento` date DEFAULT NULL COMMENT 'Fecha de vencimiento de la poliza',
  `cobertura` text DEFAULT NULL COMMENT 'Breve descripcion de la cobertura de la poliza',
  PRIMARY KEY (`id`),
  KEY `FK_seg_ase` (`idaseg`),
  CONSTRAINT `FK_seg_ase` FOREIGN KEY (`idaseg`) REFERENCES `aseguradora` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `profesionales`
--

DROP TABLE IF EXISTS `profesionales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesionales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razonsocial` varchar(100) DEFAULT NULL,
  `cif` varchar(15) DEFAULT NULL,
  `idsector` int(11) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL COMMENT 'Persona responsable de la empresa',
  `apellidos` varchar(100) DEFAULT NULL,
  `tel1` varchar(15) DEFAULT NULL,
  `tel2` varchar(15) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `dir` varchar(100) DEFAULT NULL,
  `pob` varchar(50) DEFAULT NULL,
  `prov` varchar(50) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pro_sec` (`idsector`),
  CONSTRAINT `FK_pro_sec` FOREIGN KEY (`idsector`) REFERENCES `sector` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `proyectecnic`
--

DROP TABLE IF EXISTS `proyectecnic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyectecnic` (
  `idtecnic` int(11) DEFAULT NULL,
  `idproyec` int(11) DEFAULT NULL,
  KEY `FK_tec_pro` (`idtecnic`),
  KEY `FK_pro_tec` (`idproyec`),
  CONSTRAINT `FK_pro_tec` FOREIGN KEY (`idproyec`) REFERENCES `proyectos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tec_pro` FOREIGN KEY (`idtecnic`) REFERENCES `tecnicos` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de Relacion Muchos a Muchos entre Proyectos y Tecnicos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `notas` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `recpagos`
--

DROP TABLE IF EXISTS `recpagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recpagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idinqui` int(11) DEFAULT NULL COMMENT 'ID de inquilino',
  `idfactura` int(11) DEFAULT NULL COMMENT 'ID de factura',
  `fecha` datetime DEFAULT NULL COMMENT 'FECHA Y HORA DEL PAGO, si campo=null pago no realizado',
  `fdes` date DEFAULT NULL COMMENT 'Fecha inicio del periodo que paga',
  `fhas` date DEFAULT NULL COMMENT 'Fecha fin del periodo que paga',
  `descuento` decimal(6,2) NOT NULL DEFAULT 0.00 COMMENT 'Descuento en €uros',
  `importe` decimal(6,2) NOT NULL DEFAULT 0.00 COMMENT 'Importe a pagar',
  `pax` decimal(5,2) NOT NULL DEFAULT 1.00 COMMENT 'PAX o cantidad de usuarios por habitacion',
  `pagado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Bandera 1=pagado 2=pte pago',
  `preuni` decimal(6,2) NOT NULL DEFAULT 0.00 COMMENT 'Precio por unidad de consumo',
  `confac` int(11) NOT NULL DEFAULT 0 COMMENT 'Consumo correspondiente a la factura',
  `conusr` int(11) NOT NULL DEFAULT 0 COMMENT 'Consumo correspondiente al usuario',
  PRIMARY KEY (`id`),
  KEY `FK_recpaginq` (`idinqui`),
  KEY `FK_recpagfac` (`idfactura`),
  CONSTRAINT `FK_recpagfac` FOREIGN KEY (`idfactura`) REFERENCES `facturas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_recpaginq` FOREIGN KEY (`idinqui`) REFERENCES `inquilinos` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1 COMMENT='Recibos de Pagos, esta tabla se genera cada vez que se añade una factura, aqui se generan los recibos correspondientes a cada usuario del piso';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sector`
--

DROP TABLE IF EXISTS `sector`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `des` varchar(100) DEFAULT NULL COMMENT 'Tipo de sector al que pertenece la empresa, ELECTRICIDAD, FONTANERIA, REFORMAS, ETC',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `des` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `tec_perfiles`
--

DROP TABLE IF EXISTS `tec_perfiles`;
/*!50001 DROP VIEW IF EXISTS `tec_perfiles`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `tec_perfiles` (
  `idtecnico` tinyint NOT NULL,
  `nombres` tinyint NOT NULL,
  `apellidos` tinyint NOT NULL,
  `nomcorto` tinyint NOT NULL,
  `dni` tinyint NOT NULL,
  `telefono` tinyint NOT NULL,
  `mail` tinyint NOT NULL,
  `idperfil` tinyint NOT NULL,
  `nomusr` tinyint NOT NULL,
  `psw` tinyint NOT NULL,
  `nivel` tinyint NOT NULL,
  `descnivel` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `tecnicos`
--

DROP TABLE IF EXISTS `tecnicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tecnicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `nomcorto` varchar(25) DEFAULT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipologia`
--

DROP TABLE IF EXISTS `tipologia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipologia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `des` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Tipo de incidencia: SINIESTRO, INCIDENCIA, REPARACION...';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `todo_edificios`
--

DROP TABLE IF EXISTS `todo_edificios`;
/*!50001 DROP VIEW IF EXISTS `todo_edificios`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `todo_edificios` (
  `id` tinyint NOT NULL,
  `nombre` tinyint NOT NULL,
  `direccion` tinyint NOT NULL,
  `cp` tinyint NOT NULL,
  `poblacion` tinyint NOT NULL,
  `notas` tinyint NOT NULL,
  `idpisos` tinyint NOT NULL,
  `planta` tinyint NOT NULL,
  `puerta` tinyint NOT NULL,
  `escalera` tinyint NOT NULL,
  `habitaciones` tinyint NOT NULL,
  `notaspiso` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `todo_facturas`
--

DROP TABLE IF EXISTS `todo_facturas`;
/*!50001 DROP VIEW IF EXISTS `todo_facturas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `todo_facturas` (
  `id` tinyint NOT NULL,
  `numero` tinyint NOT NULL,
  `fechaf` tinyint NOT NULL,
  `importe` tinyint NOT NULL,
  `fdes` tinyint NOT NULL,
  `fhas` tinyint NOT NULL,
  `lant` tinyint NOT NULL,
  `lact` tinyint NOT NULL,
  `periodo` tinyint NOT NULL,
  `servicio` tinyint NOT NULL,
  `facdoc` tinyint NOT NULL,
  `docu` tinyint NOT NULL,
  `idservicio` tinyint NOT NULL,
  `idpiso` tinyint NOT NULL,
  `escalera` tinyint NOT NULL,
  `puerta` tinyint NOT NULL,
  `planta` tinyint NOT NULL,
  `edificio` tinyint NOT NULL,
  `edi_dir` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `todo_pisos`
--

DROP TABLE IF EXISTS `todo_pisos`;
/*!50001 DROP VIEW IF EXISTS `todo_pisos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `todo_pisos` (
  `id` tinyint NOT NULL,
  `idedificio` tinyint NOT NULL,
  `planta` tinyint NOT NULL,
  `puerta` tinyint NOT NULL,
  `escalera` tinyint NOT NULL,
  `habitaciones` tinyint NOT NULL,
  `nom_edificio` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `todo_profesional`
--

DROP TABLE IF EXISTS `todo_profesional`;
/*!50001 DROP VIEW IF EXISTS `todo_profesional`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `todo_profesional` (
  `id` tinyint NOT NULL,
  `razonsocial` tinyint NOT NULL,
  `cif` tinyint NOT NULL,
  `idsector` tinyint NOT NULL,
  `nombres` tinyint NOT NULL,
  `apellidos` tinyint NOT NULL,
  `tel1` tinyint NOT NULL,
  `tel2` tinyint NOT NULL,
  `mail` tinyint NOT NULL,
  `dir` tinyint NOT NULL,
  `pob` tinyint NOT NULL,
  `prov` tinyint NOT NULL,
  `cp` tinyint NOT NULL,
  `comentario` tinyint NOT NULL,
  `cargo` tinyint NOT NULL,
  `sector` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'prohabitat'
--
/*!50003 DROP PROCEDURE IF EXISTS `userxfactura` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `userxfactura`(
  IN finicio DATE,
  IN ffinal  DATE,
  IN piso    INT
)
BEGIN
	SELECT entsal.id AS id, idinquilino, idpiso, inquilinos.descuento , inquilinos.nick AS usuario, inquilinos.pax AS pax, ocupado, fechaE, lgasE, lluzE, laguaE, fechaS, lgasS, lluzS, laguaS, notas
	FROM entsal
	INNER JOIN inquilinos ON inquilinos.id = entsal.idinquilino
	WHERE idpiso = piso AND ((fechaE BETWEEN finicio AND ffinal) OR (fechaS BETWEEN finicio AND ffinal) OR (fechaE <= finicio AND fechaS IS NULL) OR (fechaE <= finicio and fechaS >= ffinal ));
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `fac_pagadas`
--

/*!50001 DROP TABLE IF EXISTS `fac_pagadas`*/;
/*!50001 DROP VIEW IF EXISTS `fac_pagadas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `fac_pagadas` AS select `pagos`.`idfactura` AS `idfactura`,`pagos`.`numfac` AS `numfac`,`pagos`.`ffactura` AS `ffactura`,`pagos`.`servicio` AS `servicio`,sum(`pagos`.`impusr`) AS `impusr`,`pagos`.`impfac` AS `impfac`,`pagos`.`pagado` AS `pagado` from `pagos` group by `pagos`.`idfactura`,`pagos`.`pagado` having `pagos`.`pagado` <> 0 and abs(`impusr`) = abs(`pagos`.`impfac`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `fac_ptes`
--

/*!50001 DROP TABLE IF EXISTS `fac_ptes`*/;
/*!50001 DROP VIEW IF EXISTS `fac_ptes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `fac_ptes` AS select `pagos`.`idfactura` AS `idfactura`,`pagos`.`numfac` AS `numfac`,`pagos`.`ffactura` AS `ffactura`,`pagos`.`servicio` AS `servicio`,sum(`pagos`.`impusr`) AS `imppte`,`pagos`.`impfac` AS `impfac`,`pagos`.`pagado` AS `pagado` from `pagos` group by `pagos`.`idfactura`,`pagos`.`pagado` having !`pagos`.`pagado` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `inqui_entsal`
--

/*!50001 DROP TABLE IF EXISTS `inqui_entsal`*/;
/*!50001 DROP VIEW IF EXISTS `inqui_entsal`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `inqui_entsal` AS select `entsal`.`id` AS `id`,`inquilinos`.`id` AS `idinqui`,`inquilinos`.`nick` AS `nick`,concat(`inquilinos`.`nombres`,', ',`inquilinos`.`apellidos`) AS `nomape`,`inquilinos`.`dni` AS `dni`,`inquilinos`.`telefono` AS `telefono`,`entsal`.`fechaE` AS `fechaE`,`entsal`.`fechaS` AS `fechaS`,`inquilinos`.`piso` AS `tienepiso`,`pisos`.`id` AS `idpiso`,concat(`edificios`.`nombre`,', ',`pisos`.`planta`,'-',`pisos`.`puerta`) AS `edipiso` from (((`inquilinos` left join `entsal` on(`inquilinos`.`id` = `entsal`.`idinquilino`)) left join `pisos` on(`entsal`.`idpiso` = `pisos`.`id`)) left join `edificios` on(`pisos`.`idEdificio` = `edificios`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `pagos`
--

/*!50001 DROP TABLE IF EXISTS `pagos`*/;
/*!50001 DROP VIEW IF EXISTS `pagos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `pagos` AS select `recpagos`.`idinqui` AS `idinqui`,`recpagos`.`idfactura` AS `idfactura`,`facturas`.`numero` AS `numfac`,`servicios`.`des` AS `servicio`,`recpagos`.`fecha` AS `fpago`,`facturas`.`fechaf` AS `ffactura`,`recpagos`.`fdes` AS `fdes`,`recpagos`.`fhas` AS `fhas`,`recpagos`.`descuento` AS `descuento`,`recpagos`.`importe` AS `impusr`,`facturas`.`importe` AS `impfac`,`recpagos`.`pax` AS `pax`,`recpagos`.`pagado` AS `pagado`,`recpagos`.`preuni` AS `preuni`,`recpagos`.`confac` AS `confac`,`recpagos`.`conusr` AS `conusr`,`inquilinos`.`nick` AS `nick` from (((`recpagos` left join `inquilinos` on(`inquilinos`.`id` = `recpagos`.`idinqui`)) left join `facturas` on(`recpagos`.`idfactura` = `facturas`.`id`)) left join `servicios` on(`facturas`.`idservicio` = `servicios`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tec_perfiles`
--

/*!50001 DROP TABLE IF EXISTS `tec_perfiles`*/;
/*!50001 DROP VIEW IF EXISTS `tec_perfiles`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tec_perfiles` AS select `tecnicos`.`id` AS `idtecnico`,`tecnicos`.`nombres` AS `nombres`,`tecnicos`.`apellidos` AS `apellidos`,`tecnicos`.`nomcorto` AS `nomcorto`,`tecnicos`.`dni` AS `dni`,`tecnicos`.`telefono` AS `telefono`,`tecnicos`.`mail` AS `mail`,`perfiles`.`id` AS `idperfil`,`perfiles`.`nomusr` AS `nomusr`,`perfiles`.`psw` AS `psw`,`perfiles`.`nivel` AS `nivel`,`perfiles`.`descnivel` AS `descnivel` from (`tecnicos` left join `perfiles` on(`perfiles`.`idtecnico` = `tecnicos`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `todo_edificios`
--

/*!50001 DROP TABLE IF EXISTS `todo_edificios`*/;
/*!50001 DROP VIEW IF EXISTS `todo_edificios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `todo_edificios` AS select `edificios`.`id` AS `id`,`edificios`.`nombre` AS `nombre`,`edificios`.`direccion` AS `direccion`,`edificios`.`cp` AS `cp`,`edificios`.`poblacion` AS `poblacion`,`edificios`.`notas` AS `notas`,`pisos`.`id` AS `idpisos`,`pisos`.`planta` AS `planta`,`pisos`.`puerta` AS `puerta`,`pisos`.`escalera` AS `escalera`,`pisos`.`habitaciones` AS `habitaciones`,`pisos`.`notas` AS `notaspiso` from (`edificios` left join `pisos` on(`edificios`.`id` = `pisos`.`idEdificio`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `todo_facturas`
--

/*!50001 DROP TABLE IF EXISTS `todo_facturas`*/;
/*!50001 DROP VIEW IF EXISTS `todo_facturas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `todo_facturas` AS select `facturas`.`id` AS `id`,`facturas`.`numero` AS `numero`,`facturas`.`fechaf` AS `fechaf`,`facturas`.`importe` AS `importe`,`facturas`.`fdes` AS `fdes`,`facturas`.`fhas` AS `fhas`,`facturas`.`lant` AS `lant`,`facturas`.`lact` AS `lact`,`facturas`.`periodo` AS `periodo`,`servicios`.`des` AS `servicio`,`facturas`.`facdoc` AS `facdoc`,`facturas`.`docu` AS `docu`,`servicios`.`id` AS `idservicio`,`facturas`.`idpiso` AS `idpiso`,`pisos`.`escalera` AS `escalera`,`pisos`.`puerta` AS `puerta`,`pisos`.`planta` AS `planta`,`edificios`.`nombre` AS `edificio`,`edificios`.`direccion` AS `edi_dir` from (((`facturas` left join `servicios` on(`facturas`.`idservicio` = `servicios`.`id`)) left join `pisos` on(`facturas`.`idpiso` = `pisos`.`id`)) left join `edificios` on(`pisos`.`idEdificio` = `edificios`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `todo_pisos`
--

/*!50001 DROP TABLE IF EXISTS `todo_pisos`*/;
/*!50001 DROP VIEW IF EXISTS `todo_pisos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `todo_pisos` AS select `pisos`.`id` AS `id`,`edificios`.`id` AS `idedificio`,`pisos`.`planta` AS `planta`,`pisos`.`puerta` AS `puerta`,`pisos`.`escalera` AS `escalera`,`pisos`.`habitaciones` AS `habitaciones`,`edificios`.`nombre` AS `nom_edificio` from (`pisos` left join `edificios` on(`pisos`.`idEdificio` = `edificios`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `todo_profesional`
--

/*!50001 DROP TABLE IF EXISTS `todo_profesional`*/;
/*!50001 DROP VIEW IF EXISTS `todo_profesional`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `todo_profesional` AS select `profesionales`.`id` AS `id`,`profesionales`.`razonsocial` AS `razonsocial`,`profesionales`.`cif` AS `cif`,`profesionales`.`idsector` AS `idsector`,`profesionales`.`nombres` AS `nombres`,`profesionales`.`apellidos` AS `apellidos`,`profesionales`.`tel1` AS `tel1`,`profesionales`.`tel2` AS `tel2`,`profesionales`.`mail` AS `mail`,`profesionales`.`dir` AS `dir`,`profesionales`.`pob` AS `pob`,`profesionales`.`prov` AS `prov`,`profesionales`.`cp` AS `cp`,`profesionales`.`comentario` AS `comentario`,`profesionales`.`cargo` AS `cargo`,`sector`.`des` AS `sector` from (`profesionales` left join `sector` on(`sector`.`id` = `profesionales`.`idsector`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-23 17:30:59
