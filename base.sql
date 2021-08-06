-- MySQL dump 10.15  Distrib 10.0.38-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: indbound
-- ------------------------------------------------------
-- Server version	10.0.38-MariaDB-0ubuntu0.16.04.1

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
-- Table structure for table `indbound`
--

DROP TABLE IF EXISTS `indbound`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indbound` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is` char(15) DEFAULT NULL,
  `tipo` char(5) DEFAULT NULL,
  `fecha_agendada` datetime DEFAULT NULL,
  `fecha_llegada` datetime DEFAULT NULL,
  `v_declarados` int(5) DEFAULT NULL,
  `v_recibidos` int(5) DEFAULT NULL,
  `codigo` int(5) DEFAULT NULL,
  `unidades` double DEFAULT NULL,
  `origen` varchar(200) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `atributo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11245 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indbound`
--

LOCK TABLES `indbound` WRITE;
/*!40000 ALTER TABLE `indbound` DISABLE KEYS */;
INSERT INTO `indbound` VALUES (11226,'772882','SPD','2020-05-17 22:59:59','2020-10-11 08:39:59',1,1,1,5,'LOPEZRIVERALUISALBERTO','En Stage In','-'),(11227,'805246','SPD','2020-05-30 22:59:59','2020-10-11 08:39:59',2,1,7,65,'COMESTIBLESMX','En Stage In','-'),(11228,'1056303','SPD','2020-08-20 22:59:59','2020-10-11 12:11:59',2,1,1,100,'YOYIMX1','En Stage In','-'),(11229,'1082899','SPD','2020-08-26 22:59:59','2020-10-11 08:39:59',2,1,1,20,'BELLA_ARTE_MÃ‰XICO','En Stage In','-'),(11230,'1085837','SPD','2020-08-27 22:59:59','2020-10-11 08:39:59',24,1,1,15,'MEXPAL2008','En Stage In','-'),(11231,'1177685','SPD','2020-09-18 22:59:59','2020-10-12 08:17:59',1,2,2,30,'NICOVAF','En Stage In','-'),(11232,'1177833','SPD','2020-09-19 22:59:59','2020-10-12 08:30:59',6,1,2,100,'MXSU5865801','Cerrado','-'),(11233,'1177658','SPD','2020-09-22 22:59:59','2020-10-12 09:15:00',9,1,4,250,'LOVEBUYINGMX1','En Put away','-'),(11234,'1187199','SPD','2020-09-22 22:59:59','2020-10-12 08:30:59',8,1,1,50,'MXSU5865801','Cerrado','-'),(11235,'1190455','SPD','2020-09-22 22:59:59','2020-10-12 08:30:59',10,1,1,1000,'TOPSTORETTMX1','Cerrado','-'),(11236,'1191346','SPD','2020-09-23 22:59:59','2020-10-12 08:15:00',3,1,7,187,'POCKETELVESMX1','Cerrado','-'),(11237,'1161082','SPD','2020-09-27 22:59:59','2020-10-12 12:11:59',1,1,6,44,'AUOSBNKMX','En Stage In','-'),(11238,'1212199','SPD','2020-09-27 22:59:59','2020-10-12 08:08:00',2,1,1,40,'ITECHNOLOGYLIFEMX1','En Stage In','-'),(11239,'1222890','SPD','2020-09-30 22:59:59','2020-10-12 08:10:59',8,1,11,160,'MERCADO-AGIL','En Stage In','-'),(11240,'1222984','SPD','2020-09-30 22:59:59','2020-10-12 08:10:59',8,1,13,160,'MERCADO-AGIL','En Stage In','-'),(11241,'1224999','SPD','2020-10-01 22:59:59','2020-10-12 12:11:59',4,2,1,200,'MICARMX1','En Stage In','-'),(11242,'1225123','SPD','2020-10-01 22:59:59','2020-10-11 15:33:59',40,2,2,40,'SUNSKYMX1','Cerrado','-'),(11243,'1231968','SPD','2020-10-02 22:59:59','2020-10-12 11:44:59',3,3,1,100,'ALPA2724669','En Stage In','-'),(11244,'1238093','SPD','2020-10-03 22:59:59','2020-10-12 11:44:59',1,1,1,30,'RAMIREZCASTELLANOSJOSE','En Stage In','-');
/*!40000 ALTER TABLE `indbound` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proceso`
--

DROP TABLE IF EXISTS `proceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `nomesa` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `indbound_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proceso_indbound_idx` (`indbound_id`),
  CONSTRAINT `fk_proceso_indbound` FOREIGN KEY (`indbound_id`) REFERENCES `indbound` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proceso`
--

LOCK TABLES `proceso` WRITE;
/*!40000 ALTER TABLE `proceso` DISABLE KEYS */;
INSERT INTO `proceso` VALUES (5,'2020-10-12 19:21:14',3,1,11237);
/*!40000 ALTER TABLE `proceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recibo`
--

DROP TABLE IF EXISTS `recibo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recibo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is` char(15) NOT NULL,
  `stage` char(15) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `pallet` char(15) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=466 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recibo`
--

LOCK TABLES `recibo` WRITE;
/*!40000 ALTER TABLE `recibo` DISABLE KEYS */;
INSERT INTO `recibo` VALUES (464,'1056303','wqeqwe','123','123','2020-10-12 18:01:43'),(465,'1177685','80808080','879','79','2020-10-12 18:07:03');
/*!40000 ALTER TABLE `recibo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stage`
--

DROP TABLE IF EXISTS `stage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is` char(15) NOT NULL,
  `mesa` char(15) NOT NULL,
  `stage` char(15) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `pallet` char(15) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stage`
--

LOCK TABLES `stage` WRITE;
/*!40000 ALTER TABLE `stage` DISABLE KEYS */;
INSERT INTO `stage` VALUES (3,'1056303','23','90909090','aws','qwe','2020-10-12 18:05:56');
/*!40000 ALTER TABLE `stage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'indbound'
--

--
-- Dumping routines for database 'indbound'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-21 15:14:35
