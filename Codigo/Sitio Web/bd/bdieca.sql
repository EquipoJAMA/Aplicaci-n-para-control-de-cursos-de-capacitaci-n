-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: bdieca
-- ------------------------------------------------------
-- Server version	5.6.17-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAdmin` varchar(30) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `nick` varchar(20) DEFAULT NULL,
  `pass` varchar(180) DEFAULT NULL,
  `privilegios` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Super','Administrador','IECA','admin','12345',1),(2,'Administrador','Base','IECA','adminb','12345',2),(3,'Administrador','BASIC','IECA','adminc','12345',3);
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnos` (
  `curp` varchar(19) NOT NULL,
  `telefonoAl_idTel` int(11) DEFAULT NULL,
  `nombreAlumno` varchar(50) DEFAULT NULL,
  `apellido1` varchar(30) DEFAULT NULL,
  `apellido2` varchar(30) DEFAULT NULL,
  `correoAl` varchar(100) DEFAULT NULL,
  `cpAl` int(5) DEFAULT NULL,
  PRIMARY KEY (`curp`),
  KEY `fk_alu_tel` (`telefonoAl_idTel`),
  CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`telefonoAl_idTel`) REFERENCES `telefono` (`idTel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES ('ADFGTYHJUYTREDFRES',47,'Alberto','Parra','Sandobal','Alb@mail.com',31245),('TAMA981217HGTPNN03',48,'Antonio','Tapia','Montero','atm@mail.com',43124);
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER tg_updAlumnoTel BEFORE INSERT ON alumnos
FOR EACH ROW
BEGIN
SET NEW.telefonoAl_idTel = (SELECT MAX(idTel) FROM telefono);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER tg_delAluTel AFTER DELETE ON alumnos
FOR EACH ROW
BEGIN
DELETE FROM telefono WHERE idTel = OLD.telefonoAl_idTel;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `aulas`
--

DROP TABLE IF EXISTS `aulas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aulas` (
  `idAula` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAula` varchar(50) DEFAULT NULL,
  `estatusAula` varchar(15) NOT NULL DEFAULT 'Disponible',
  PRIMARY KEY (`idAula`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
INSERT INTO `aulas` VALUES (1,'UTU','Disponible');
/*!40000 ALTER TABLE `aulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autbec`
--

DROP TABLE IF EXISTS `autbec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autbec` (
  `idaut` int(10) NOT NULL AUTO_INCREMENT,
  `autsol` int(10) DEFAULT NULL,
  `pagosb_idPago` int(11) DEFAULT NULL,
  `monpag` double(9,2) DEFAULT NULL,
  PRIMARY KEY (`idaut`),
  KEY `fk_aut_sol` (`autsol`),
  KEY `fk_pag_aub` (`pagosb_idPago`),
  CONSTRAINT `autbec_ibfk_1` FOREIGN KEY (`autsol`) REFERENCES `solbeca` (`idSol`),
  CONSTRAINT `autbec_ibfk_2` FOREIGN KEY (`pagosb_idPago`) REFERENCES `pagos` (`idPago`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autbec`
--

LOCK TABLES `autbec` WRITE;
/*!40000 ALTER TABLE `autbec` DISABLE KEYS */;
INSERT INTO `autbec` VALUES (3,312,1,-122811.00);
/*!40000 ALTER TABLE `autbec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `becas`
--

DROP TABLE IF EXISTS `becas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `becas` (
  `idBeca` int(10) NOT NULL,
  `nomBeca` varchar(25) DEFAULT NULL,
  `mondes` int(5) DEFAULT NULL,
  PRIMARY KEY (`idBeca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `becas`
--

LOCK TABLES `becas` WRITE;
/*!40000 ALTER TABLE `becas` DISABLE KEYS */;
INSERT INTO `becas` VALUES (1,'AMLO',123123);
/*!40000 ALTER TABLE `becas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `idCursos` int(10) NOT NULL,
  `ins_idInstructor` int(11) DEFAULT NULL,
  `nombre_curso` varchar(100) DEFAULT NULL,
  `imgCurso` varchar(200) DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaTermino` date DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `costo` double(9,2) DEFAULT NULL,
  PRIMARY KEY (`idCursos`),
  KEY `fk_cur_ins` (`ins_idInstructor`),
  CONSTRAINT `fk_inst_curs` FOREIGN KEY (`ins_idInstructor`) REFERENCES `instructor` (`idInstructor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (12,1,'Cocina','uploads/cocina050420113738.jpg','2020-04-13','2020-04-30','Aprende a cocinar grandes platillos de cocina; desde postres a platillos 5 estrellas y con ello obtener un titulo con el que puedas desempeÃ±arte como chef en un restaurante o en tu propio negocio',123.00),(1312,2,'Bufandas y Gorros','uploads/Bufandas160420102454.jpg','2020-04-20','2020-04-09','Aprende a cocer bufandas y gorros de manera profesional, obteniendo de esta manera un titulo con el cual desempeÃ±arte, ademas de tener la posibilidad de crear tu propio negocio',200.00);
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidad` (
  `idEspInst` int(11) NOT NULL AUTO_INCREMENT,
  `especialidad` varchar(50) DEFAULT NULL,
  `descripcionEsp` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idEspInst`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidad`
--

LOCK TABLES `especialidad` WRITE;
/*!40000 ALTER TABLE `especialidad` DISABLE KEYS */;
INSERT INTO `especialidad` VALUES (1,'TICS','Sabe de pc\'s');
/*!40000 ALTER TABLE `especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `idGrupo` int(10) NOT NULL,
  `cursos_idCursos` int(11) DEFAULT NULL,
  `aulas_idAula` int(11) DEFAULT NULL,
  `horario_idHorario` int(11) DEFAULT NULL,
  `estatusGr` varchar(11) DEFAULT 'inactivo',
  `cupo` int(11) DEFAULT '0',
  PRIMARY KEY (`idGrupo`),
  KEY `grupo_ibfk_1` (`cursos_idCursos`),
  KEY `grupo_ibfk_2` (`horario_idHorario`),
  KEY `fk_gru_aul` (`aulas_idAula`),
  CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`cursos_idCursos`) REFERENCES `cursos` (`idCursos`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `grupo_ibfk_2` FOREIGN KEY (`horario_idHorario`) REFERENCES `horario` (`idHorario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `grupo_ibfk_3` FOREIGN KEY (`aulas_idAula`) REFERENCES `aulas` (`idAula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES (1,12,1,1,'inactivo',12),(2,12,1,1,'inactivo',3);
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario` (
  `idHorario` int(10) NOT NULL,
  `horaInicio` time DEFAULT NULL,
  `horaTermino` time DEFAULT NULL,
  `dias` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idHorario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario`
--

LOCK TABLES `horario` WRITE;
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
INSERT INTO `horario` VALUES (1,'11:22:00','23:00:00','Miercoles');
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscritos`
--

DROP TABLE IF EXISTS `inscritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscritos` (
  `idInscrito` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_idGrupo` int(10) DEFAULT NULL,
  `alumnos_curp` varchar(18) DEFAULT NULL,
  `pagos_idPago` int(11) DEFAULT NULL,
  PRIMARY KEY (`idInscrito`),
  KEY `inscritos_ibfk_1` (`grupo_idGrupo`),
  KEY `inscritos_ibfk_2` (`alumnos_curp`),
  KEY `fk_pag_inc` (`pagos_idPago`),
  CONSTRAINT `inscritos_ibfk_1` FOREIGN KEY (`grupo_idGrupo`) REFERENCES `grupo` (`idGrupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `inscritos_ibfk_2` FOREIGN KEY (`alumnos_curp`) REFERENCES `alumnos` (`curp`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `inscritos_ibfk_3` FOREIGN KEY (`pagos_idPago`) REFERENCES `pagos` (`idPago`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscritos`
--

LOCK TABLES `inscritos` WRITE;
/*!40000 ALTER TABLE `inscritos` DISABLE KEYS */;
INSERT INTO `inscritos` VALUES (2,1,'ADFGTYHJUYTREDFRES',1),(6,2,'TAMA981217HGTPNN03',1);
/*!40000 ALTER TABLE `inscritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructor`
--

DROP TABLE IF EXISTS `instructor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructor` (
  `idInstructor` int(11) NOT NULL,
  `especialidadIns_idEspInst` int(11) DEFAULT NULL,
  `tipoIns_idTipInst` int(11) DEFAULT NULL,
  `telefonoIns_idTel` int(11) DEFAULT NULL,
  `nombreInstructor` varchar(50) DEFAULT NULL,
  `apellidoI1` varchar(30) DEFAULT NULL,
  `apellidoI2` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idInstructor`),
  KEY `fk_ins_tel` (`telefonoIns_idTel`),
  KEY `fk_ins_esp` (`especialidadIns_idEspInst`),
  KEY `fk_ins_tip` (`tipoIns_idTipInst`),
  CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`telefonoIns_idTel`) REFERENCES `telefono` (`idTel`),
  CONSTRAINT `instructor_ibfk_2` FOREIGN KEY (`especialidadIns_idEspInst`) REFERENCES `especialidad` (`idEspInst`),
  CONSTRAINT `instructor_ibfk_3` FOREIGN KEY (`tipoIns_idTipInst`) REFERENCES `tipo` (`idTipInst`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructor`
--

LOCK TABLES `instructor` WRITE;
/*!40000 ALTER TABLE `instructor` DISABLE KEYS */;
INSERT INTO `instructor` VALUES (1,1,1,8,'Antonio','Tapia','Montero'),(2,1,1,9,'Hector','Mendoza','Sanchez'),(512,1,1,36,'Pepe grillo','Mendoza','Sanchez');
/*!40000 ALTER TABLE `instructor` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER tg_updInsTel BEFORE INSERT ON instructor
FOR EACH ROW
BEGIN
SET NEW.telefonoIns_idTel = (SELECT MAX(idTel) FROM telefono);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `tg_delInsTel` AFTER DELETE ON `instructor`
 FOR EACH ROW BEGIN
DELETE FROM telefono WHERE idTel = OLD.telefonoIns_idTel;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `idPago` int(11) NOT NULL AUTO_INCREMENT,
  `id_cur` int(10) DEFAULT NULL,
  `pago` double(9,2) DEFAULT NULL,
  `fechaP` date DEFAULT NULL,
  `estatusP` varchar(10) DEFAULT 'No pagado',
  PRIMARY KEY (`idPago`),
  KEY `fk_pag_cur` (`id_cur`),
  CONSTRAINT `fk_pag_cur` FOREIGN KEY (`id_cur`) REFERENCES `cursos` (`idCursos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES (1,12,312.00,'2020-04-15','Pagado');
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solbeca`
--

DROP TABLE IF EXISTS `solbeca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solbeca` (
  `idSol` int(10) NOT NULL,
  `solalu` varchar(19) DEFAULT NULL,
  `becsol` int(10) DEFAULT NULL,
  `estsol` varchar(30) DEFAULT 'Sin autorizar',
  PRIMARY KEY (`idSol`),
  KEY `fk_sol_alu` (`solalu`),
  KEY `fk_sol_bec` (`becsol`),
  CONSTRAINT `solbeca_ibfk_1` FOREIGN KEY (`solalu`) REFERENCES `alumnos` (`curp`),
  CONSTRAINT `solbeca_ibfk_2` FOREIGN KEY (`becsol`) REFERENCES `becas` (`idBeca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solbeca`
--

LOCK TABLES `solbeca` WRITE;
/*!40000 ALTER TABLE `solbeca` DISABLE KEYS */;
INSERT INTO `solbeca` VALUES (312,'ADFGTYHJUYTREDFRES',1,'Sin autorizar');
/*!40000 ALTER TABLE `solbeca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefono`
--

DROP TABLE IF EXISTS `telefono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefono` (
  `idTel` int(11) NOT NULL AUTO_INCREMENT,
  `tipoTel_idTipTel` int(11) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT '() - -',
  PRIMARY KEY (`idTel`),
  KEY `fk_tel_tip` (`tipoTel_idTipTel`),
  CONSTRAINT `telefono_ibfk_1` FOREIGN KEY (`tipoTel_idTipTel`) REFERENCES `tipotel` (`idTipTel`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefono`
--

LOCK TABLES `telefono` WRITE;
/*!40000 ALTER TABLE `telefono` DISABLE KEYS */;
INSERT INTO `telefono` VALUES (8,1,'1234561260'),(9,1,'1234512345'),(36,1,'1123124562'),(47,1,'6123124561'),(48,2,'4123123410');
/*!40000 ALTER TABLE `telefono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `idTipInst` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(12) DEFAULT NULL,
  `descripcionTip` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idTipInst`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (1,'Nomina','De planta');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipotel`
--

DROP TABLE IF EXISTS `tipotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipotel` (
  `idTipTel` int(11) NOT NULL AUTO_INCREMENT,
  `tipoTelefono` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idTipTel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipotel`
--

LOCK TABLES `tipotel` WRITE;
/*!40000 ALTER TABLE `tipotel` DISABLE KEYS */;
INSERT INTO `tipotel` VALUES (1,'Celular'),(2,'Casa');
/*!40000 ALTER TABLE `tipotel` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-19 22:08:48
