-- MySQL dump 10.13  Distrib 5.5.16, for Linux (i686)
--
-- Host: localhost    Database: sipkandb_dev
-- ------------------------------------------------------
-- Server version	5.5.16

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
-- Table structure for table `t_p16a`
--

DROP TABLE IF EXISTS `t_p16a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_p16a` (
  `kd_perkara` varchar(11) NOT NULL,
  `tgl_dikeluarkan` datetime NOT NULL,
  `tmp_dikeluarkan` varchar(30) NOT NULL,
  `no_surat` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_p16a`
--

LOCK TABLES `t_p16a` WRITE;
/*!40000 ALTER TABLE `t_p16a` DISABLE KEYS */;
INSERT INTO `t_p16a` VALUES ('KNS20130010','2013-04-09 00:00:00','Surabaya','0001');
/*!40000 ALTER TABLE `t_p16a` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_t7`
--

DROP TABLE IF EXISTS `t_t7`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_t7` (
  `uraian_singkat` text NOT NULL,
  `no_surat` varchar(4) NOT NULL,
  `tgl_dikeluarkan` datetime NOT NULL,
  `kd_perkara` varchar(11) NOT NULL,
  `tmp_dikeluarkan` varchar(30) NOT NULL,
  `no_spp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_t7`
--

LOCK TABLES `t_t7` WRITE;
/*!40000 ALTER TABLE `t_t7` DISABLE KEYS */;
INSERT INTO `t_t7` VALUES ('pada suatu hari','0001','2013-04-04 00:00:00','KNS20130010','Surabaya','');
/*!40000 ALTER TABLE `t_t7` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_p31`
--

DROP TABLE IF EXISTS `t_p31`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_p31` (
  `no_surat` int(4) NOT NULL,
  `kd_perkara` varchar(11) NOT NULL,
  `tgl_dikeluarkan` datetime NOT NULL,
  `tmp_dikeluarkan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_p31`
--

LOCK TABLES `t_p31` WRITE;
/*!40000 ALTER TABLE `t_p31` DISABLE KEYS */;
INSERT INTO `t_p31` VALUES (1,'KNS20130010','2013-04-03 00:00:00','Surabaya'),(1,'KNS20130010','2013-04-02 00:00:00','Surabaya');
/*!40000 ALTER TABLE `t_p31` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_p32`
--

DROP TABLE IF EXISTS `t_p32`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_p32` (
  `kd_perkara` varchar(11) NOT NULL,
  `no_surat` int(4) NOT NULL,
  `tgl_dikeluarkan` datetime NOT NULL,
  `tmp_dikeluarkan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_p32`
--

LOCK TABLES `t_p32` WRITE;
/*!40000 ALTER TABLE `t_p32` DISABLE KEYS */;
INSERT INTO `t_p32` VALUES ('KNS20130010',1,'2013-04-03 00:00:00','Surabaya');
/*!40000 ALTER TABLE `t_p32` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-04-15  6:47:10
