-- MySQL dump 10.13  Distrib 5.5.16, for Linux (i686)
--
-- Host: localhost    Database: myresto
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
-- Table structure for table `adm_artikel`
--

DROP TABLE IF EXISTS `adm_artikel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_artikel` (
  `artikel_id` bigint(20) NOT NULL,
  `artikel_judul` varchar(255) NOT NULL,
  `artikel_preview` text NOT NULL,
  `artikel_lengkap` text NOT NULL,
  `artikel_tgl` date NOT NULL,
  `artikel_wkt` varchar(255) NOT NULL,
  `id_login` bigint(20) NOT NULL,
  `artikel_gambar` varchar(255) NOT NULL,
  `id_member` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_artikel`
--

LOCK TABLES `adm_artikel` WRITE;
/*!40000 ALTER TABLE `adm_artikel` DISABLE KEYS */;
/*!40000 ALTER TABLE `adm_artikel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_login`
--

DROP TABLE IF EXISTS `adm_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_user` varchar(255) NOT NULL,
  `login_pass` varchar(255) NOT NULL,
  `login_nama` varchar(255) NOT NULL,
  `login_email` varchar(255) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_login`
--

LOCK TABLES `adm_login` WRITE;
/*!40000 ALTER TABLE `adm_login` DISABLE KEYS */;
INSERT INTO `adm_login` VALUES (1,'admin','admin','Admin Resto','admin@resto.com'),(2,'admin','liya','Admin menu','admin@menu.com'),(3,'admin','mega','Admin harga','admin@harga.com'),(4,'admin','ade','Admin upload foto','admin@uploadfoto.com'),(5,'ade','1234','nurhadi','ade@gmail.com'),(6,'ade','1234','ade sueb','adehhh');
/*!40000 ALTER TABLE `adm_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_resto`
--

DROP TABLE IF EXISTS `adm_resto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_resto` (
  `resto_id` bigint(20) NOT NULL,
  `resto_nama` varchar(255) NOT NULL,
  `resto_alamat` varchar(255) NOT NULL,
  `resto_email` varchar(255) NOT NULL,
  `resto_website` varchar(255) NOT NULL,
  `resto_long` varchar(255) NOT NULL,
  `resto_lat` varchar(255) NOT NULL,
  `resto_cp` varchar(255) NOT NULL,
  `resto_cp_telp` varchar(255) NOT NULL,
  `resto_telp` varchar(255) NOT NULL,
  `id_member` bigint(20) NOT NULL,
  `id_login` bigint(20) NOT NULL,
  `resto_kategori` varchar(255) NOT NULL,
  `resto_tgl` date NOT NULL,
  `resto_wkt` varchar(255) NOT NULL,
  `resto_suggest_tgl` date NOT NULL,
  `resto_suggest_wkt` varchar(255) NOT NULL,
  `resto_suggest_lat` varchar(255) NOT NULL,
  `resto_suggest_long` varchar(255) NOT NULL,
  `resto_verification` varchar(255) NOT NULL,
  `resto_verification_tgl` date NOT NULL,
  `resto_verification_wkt` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_resto`
--

LOCK TABLES `adm_resto` WRITE;
/*!40000 ALTER TABLE `adm_resto` DISABLE KEYS */;
INSERT INTO `adm_resto` VALUES (1,'Warung Doa Bundo','Jl. Diponegoro 1','-','-','112.73330688473379','-7.282122378520979','-','-','-',0,1,'1','2013-03-10','20:26:20','0000-00-00','','','','','0000-00-00',''),(2,'Kampoeng Steak','Jl.Raya Nginden 30 A','-','-','112.76204109191895','-7.303217280849074','-','031 5030025','031 5030025',0,1,'','2013-03-11','22:48:48','0000-00-00','','','','','0000-00-00',''),(3,'Kampoeng Steak','Jl. Rungkut Asri Utara/ G-1','-','-','','','-','031 8783581','031 8783581',0,1,'','2013-03-11','22:58:44','0000-00-00','','','','','0000-00-00',''),(4,'Kampoeng Steak','Jl. Raya Mulyosari 63 A ','-','-','112.79598712921143','-7.265373454327827','-','031 5925112','031 5925112',0,1,'','2013-03-12','09:05:18','0000-00-00','','','','','0000-00-00',''),(5,'Kampoeng Steak','Jl. Raya Dukuh Kupang 62','-','-','112.71373987197876','-7.288595213780775','-','031 5634897','031 5634897',0,1,'','2013-03-12','09:15:17','0000-00-00','','','','','0000-00-00',''),(6,'Kampoeng Steak','Jl. Raya Ketintang No 194','-','','112.72956490516663','-7.310017336950018','-','031 8280167','031 8280167',0,1,'','2013-03-12','09:58:48','0000-00-00','','','','','0000-00-00',''),(7,'Kampoeng Steak','Jl. Kusuma Bangsa no. 48','-','-','112.75118350982666','-7.259839218966298','-','031 5341626','031 5341626',0,1,'','2013-03-12','10:46:23','0000-00-00','','','','','0000-00-00',''),(8,'Kampoeng Steak','Jl. Gayungsari Barat No.39','-','-','112.71921157836914','-7.3369079364586005','-','031 8287301','031 8287301',0,1,'','2013-03-12','10:50:27','0000-00-00','','','','','0000-00-00',''),(9,'Nasi Pecel Yu Limboenk','Jl. Tunjungan no. 50 Surabaya Kota','-','-','112.73830890655518','-7.258519506630316','-','031 5346861','031 5346861',0,1,'9','2013-03-12','10:59:18','0000-00-00','','','','','0000-00-00',''),(10,'Depot Gudeg Bu Har','Jl. Pasar besar wetan no 1 A Surabaya Timur','-','-','112.7430510520935','-7.258349220885571','-','031 5354137','031 5354137',0,1,'','2013-03-12','11:09:42','0000-00-00','','','','','0000-00-00',''),(11,'Bubur Madura','Jl. Bunguran  no.45 surabaya','-','-','112.7440595626831','-7.242086635460702','-','-','-',0,1,'','2013-03-14','22:11:34','0000-00-00','','','','','0000-00-00',''),(12,'Dream Cars Resto Cafe','Jl. Raya Menganti 68 Surabaya','-','-','112.69243240356445','-7.313263023633524','-','031 7669284','031 7669284',0,1,'12','2013-03-14','22:15:14','0000-00-00','','','','','0000-00-00',''),(13,'Rawon Setan','Jl.Embong Malang bubutan (seberang hotel JW Marriot utara) ','-','-','112.73487567901611','-7.259136791914618','-','-','-',0,1,'','2013-03-14','22:23:41','0000-00-00','','','','','0000-00-00',''),(14,'Bukit telaga golf citraland ','bukit telaga golf citraland surabaya barat','-','-','112.6358699798584','-7.2918516980095385','-','031 81901856','031 81901856',0,1,'','2013-03-14','22:37:39','0000-00-00','','','','','0000-00-00',''),(15,'GUILIN restoran','Jl. Musi no.34','-','www.guilinrestoran.com','112.7353048324585','-7.2862007249798495','-','031 567760','031 567760',0,1,'15','2013-03-14','22:54:10','0000-00-00','','','','','0000-00-00',''),(16,'Kepiting Cak Gundul 1992','Jl. Raya kupang ','-','-','','','-','031 73275554','031 73275554',0,1,'16','2013-03-15','20:23:29','0000-00-00','','','','','0000-00-00',''),(17,'Ayam Bakar Primarasa','Jl. Ahmad Yani no 116','-','-','112.73011207580566','-7.334205116157904','-','8298667','8298667',0,1,'17','2013-03-15','20:28:09','0000-00-00','','','','','0000-00-00',''),(18,'Depot Mie 55','Jl. Jendral 238 gayungan','-','-','112.7291464805603','-7.340930213439024','-','031 8291767','031 8291767',0,1,'18','2013-03-15','20:44:48','0000-00-00','','','','','0000-00-00',''),(19,'KFC ','Jl. Ahmad Yani no 116','-','-','112.7332878112793','-7.318924296056828','-','9968125','9968125',0,1,'19','2013-03-15','20:56:23','0000-00-00','','','','','0000-00-00',''),(20,'Waroeng Jangkring','Wonokromo','-','-','112.75191307067871','-7.303472683887236','-','-','031 7153555',0,1,'20','2013-03-15','21:01:52','0000-00-00','','','','','0000-00-00',''),(21,'WOK NOODLE','Jl. Siwalankerto 146-148','-','-','112.7311635017395','-7.337546395550184','-','-','031 2982900',0,1,'21','2013-03-15','21:10:33','0000-00-00','','','','','0000-00-00',''),(22,'BAKERZIN','Tunjungan Plaza IV lantai 2','-','-','112.74021059274673','-7.2627180941319285','-','-','031 5475570',0,1,'22','2013-03-15','21:21:57','0000-00-00','','','','','0000-00-00',''),(23,'Jittlada Thai Cuisine','Jl. Adityawarman no. 55 (Sutos lantai 1)','-','-','112.73115277290344','-7.294522848765402','-','-','031 56344882',0,1,'23','2013-03-15','21:37:12','0000-00-00','','','','','0000-00-00',''),(24,'SUSHI TEI','Jl.Basuki Rachmat no 8-12','-','-','112.71193742752075','-7.3554228778831945','-','-','031 5318118',0,1,'24','2013-03-15','21:42:43','0000-00-00','','','','','0000-00-00',''),(25,'Ayam tulang lunak Malioboro','Jl. Kartini no. 47','-','-','112.73028373718262','-7.278133864128821','-','','031 5687164',0,1,'25','2013-03-15','21:48:36','0000-00-00','','','','','0000-00-00',''),(26,'Rujak cingur','Jl. Ahmad Jais no 40','-','-','112.74191379547119','-7.255624640204443','-','-','031 5328443',0,1,'26','2013-03-15','22:04:05','0000-00-00','','','','','0000-00-00',''),(27,'Bakso Pak Kus','Jl. Residen Sudirman','-','-','112.75371551513672','-7.2595199340787975','-','-','0858 50816981',0,1,'9','2013-03-15','22:11:42','0000-00-00','','','','','0000-00-00',''),(28,'Gudeg Bu Toeggijo','Jl. Kertajaya VI/46A','-','-','112.75328636169434','-7.278272215208115','-','-','-',0,1,'28','2013-03-15','22:18:06','0000-00-00','','','','','0000-00-00',''),(31,'Nasi Goreng Jawa Pak Sutopo','Jln. Pucang Anom Timur 17 A ','-','-','112.75573253631592','-7.281826759074194','-','-','-',0,1,'31','2013-03-15','22:26:02','0000-00-00','','','','','0000-00-00',''),(32,'Thu Teck-teck Pak H.Ali','Jl. Dinoyo 147 A','-','-','112.74367332458496','-7.2798047166169','-','-','-',0,1,'32','2013-03-16','15:04:50','0000-00-00','','','','','0000-00-00',''),(33,'Bakso Pak Heri Brengos','Jl. Raya Menganti Lidah Wetan no.14','-','-','112.69054412841797','-7.31300762619231','Pak Heri','031 70801842','031 70801842',0,1,'9','2013-03-16','15:10:08','0000-00-00','','','','','0000-00-00',''),(34,'Soto Otot Jimerto','Jl. Jimerto 02 ','-','-','112.7475357055664','-7.258115077881322','-','-','081 731118888',0,1,'34','2013-03-16','15:14:17','0000-00-00','','','','','0000-00-00',''),(35,'Warung Barokah Soto Madura Tidar H.Kurdi','Jl. Tidar Pojok','-','-','112.72616386413574','-7.257072075745552','H. Kurdi','031 531779','031 531779',0,1,'35','2013-03-16','15:24:49','0000-00-00','','','','','0000-00-00',''),(36,'Depot Wijaya','Ir. Anwari 7 ','-','-','112.73159265518188','-7.27897461233706','-','-','031 5676469, 5687928',0,1,'36','2013-03-16','15:28:12','0000-00-00','','','','','0000-00-00',''),(37,'Soto Ayam Pak Pardi','Jl. Embong Malang No. 20','-','-','112.73528337478638','-7.259413505732583','-','-','081 332740685',0,1,'37','2013-03-16','15:31:23','0000-00-00','','','','','0000-00-00',''),(38,'Tahu Campur Pak Sugeng','Jl. Diponegoro (Depan MUsholla Ukhuwah) ','-','-','112.73045539855957','-7.279634438941146','Pak Sugeng','0856 45942394','0856 45942394',0,1,'38','2013-03-16','15:34:54','0000-00-00','','','','','0000-00-00',''),(39,'Bebek Goreng Palupi','Jl. Rungkut asri tengah no.10','-','-','112.77551651000977','-7.324330105676155','-','-','-',0,1,'39','2013-03-18','08:42:04','0000-00-00','','','','','0000-00-00',''),(40,'Nasi bebek tugu pahlawan','Jl. Tembaan no.17','-','-','112.73584127426147','-7.246876070436495','-','-','-',0,1,'','2013-03-18','09:46:07','0000-00-00','','','','','0000-00-00',''),(41,'Special Belut Surabaya','Jl. Raya Banyu Urip Surabaya','-','-','112.72382497787476','-7.2724614331515145','-','-','-',0,1,'','2013-03-18','09:58:54','0000-00-00','','','','','0000-00-00',''),(42,'Sate Klopo Ondomohen','Jl. Walikota mustajab Surabaya','-','-','112.74438142776489','-7.260052075432053','-','-','-',0,1,'','2013-03-18','10:38:33','0000-00-00','','','','','0000-00-00',''),(43,'Pempek Ny.Farina','ITC Pojok Tengah','-','-','112.74740695953369','-7.2412777480865556','-','-','-',0,1,'','2013-03-18','11:02:58','0000-00-00','','','','','0000-00-00',''),(44,'Sambel mantab','Royal Plaza foodcurt','-','-','112.73461818695068','-7.308772263995206','-','-','-',0,1,'','2013-03-19','10:13:23','0000-00-00','','','','','0000-00-00',''),(45,'Semanggi Surabaya','Jl. Raya Karah Agung (Selatan kantor jawa pos)','-','-','112.71923303604126','-7.310368510745667','-','031 34355579','031 34355579',0,1,'','2013-03-19','10:19:48','0000-00-00','','','','','0000-00-00',''),(46,'Rawon Pak Pangat','jl. Ketintang Madya','-','-','112.7227520942688','-7.324021508072045','-','-','-',0,1,'','2013-03-19','10:38:05','0000-00-00','','','','','0000-00-00',''),(47,'Mie Mapan','Jl. Rungkut Mapan Tengah','-','-','112.77530193328857','-7.332651519108394','-','-','8704120',0,1,'','2013-03-19','10:53:53','0000-00-00','','','','','0000-00-00',''),(48,'Desa Cafe','Jl. Kutai no.29','-','-','112.73511171340942','-7.2910003318697765','-','08155130397','031 5664748',0,1,'','2013-03-19','11:00:26','0000-00-00','','','','','0000-00-00',''),(49,'Depot Wahyu Putra Solo','Jl. Ketintang no.6','-','-','112.72691488265991','-7.309123438769728','-','-','-',0,1,'49','2013-03-19','11:27:21','0000-00-00','','','','','0000-00-00',''),(50,'Toby s','jl. Ketintang Madya','-','-','112.72539138793945','-7.308963813906448','-','-','-',0,1,'','2013-03-19','11:47:50','0000-00-00','','','','','0000-00-00',''),(51,'CITARASA','Jl. Jetis  besar perempatan ','-','-','112.73275136947632','-7.308644564008752','-','-','-',0,1,'','2013-03-19','12:03:14','0000-00-00','','','','','0000-00-00',''),(52,'','','','','','','','','',2,1,'','2013-04-14','08:38:31','2013-04-01','23:37:29','','','Verified','2013-04-14','08:38:31'),(53,'Steak Moen-Moen ','Royal Plaza foodcurt','-','-','','','-','-','-',2,1,'4','2013-04-14','08:38:20','2013-04-12','07:59:42','','','Verified','2013-04-14','08:38:20'),(54,'Mie HIjau Ayam','jl. Ketintang','-','-','112.72639989852905','-7.308538147325479','-','087852780060','031 5466988',2,1,'1','2013-04-14','08:35:43','2013-04-13','21:08:13','','','Verified','2013-04-14','08:35:43'),(55,'','','','','','','','','',2,1,'','2013-04-14','08:40:51','2013-04-13','21:18:03','0','','Verified','2013-04-14','08:40:51');
/*!40000 ALTER TABLE `adm_resto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_resto_foto`
--

DROP TABLE IF EXISTS `adm_resto_foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_resto_foto` (
  `foto_id` bigint(20) NOT NULL,
  `id_resto` bigint(20) NOT NULL,
  `foto_url` varchar(255) NOT NULL,
  `foto_ket` varchar(255) NOT NULL,
  `id_member` bigint(20) NOT NULL,
  `id_login` bigint(20) NOT NULL,
  `foto_tgl` date NOT NULL,
  `foto_wkt` varchar(255) NOT NULL,
  `foto_verification` varchar(255) NOT NULL,
  `foto_verification_tgl` date NOT NULL,
  `foto_verification_wkt` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_resto_foto`
--

LOCK TABLES `adm_resto_foto` WRITE;
/*!40000 ALTER TABLE `adm_resto_foto` DISABLE KEYS */;
INSERT INTO `adm_resto_foto` VALUES (1,1,'1.png','aaaa1',1,1,'2013-03-04','08:15:33','Verified','2013-03-11','09:35:23'),(3,4,'3.png','',0,1,'2013-03-12','09:06:20','','0000-00-00',''),(4,9,'4.png','Nasi pecel',0,1,'2013-03-12','11:00:53','','0000-00-00',''),(2,2,'2.png','Steak',0,1,'2013-03-11','22:49:31','','0000-00-00',''),(5,10,'5.png','nasi gudeg',0,1,'2013-03-12','11:11:44','','0000-00-00',''),(6,11,'6.','bubur',0,1,'2013-03-14','22:11:57','','0000-00-00',''),(7,11,'7.png','',0,1,'2013-03-14','22:12:43','','0000-00-00',''),(8,12,'8.png','',0,1,'2013-03-14','22:18:41','','0000-00-00',''),(9,13,'9.png','',0,1,'2013-03-14','22:24:18','','0000-00-00',''),(10,14,'10.png','',0,1,'2013-03-14','22:38:22','','0000-00-00',''),(11,15,'11.png','GUILIN ',0,1,'2013-03-15','20:00:54','','0000-00-00',''),(12,16,'12.png','Tempatnya',0,1,'2013-03-15','20:25:15','','0000-00-00',''),(13,17,'13.png','Tempatnyua',0,1,'2013-03-15','20:28:55','','0000-00-00',''),(14,18,'14.png','Tempatnya',0,1,'2013-03-15','20:46:21','','0000-00-00',''),(15,19,'15.png','Tempatnya',0,1,'2013-03-15','20:57:09','','0000-00-00',''),(16,20,'16.png','Tempatnya',0,1,'2013-03-15','21:02:51','','0000-00-00',''),(17,21,'17.png','Tempatnya',0,1,'2013-03-15','21:12:05','','0000-00-00',''),(18,22,'18.png','Logo',0,1,'2013-03-15','21:23:55','','0000-00-00',''),(19,23,'19.png','Tempatnya',0,1,'2013-03-15','21:39:26','','0000-00-00',''),(20,24,'20.png','simbol',0,1,'2013-03-15','21:44:09','','0000-00-00',''),(21,25,'21.png','Tempatnya',0,1,'2013-03-15','21:49:35','','0000-00-00',''),(22,26,'22.png','Tempatnya',0,1,'2013-03-15','22:05:25','','0000-00-00',''),(23,27,'23.png','Tempatnya',0,1,'2013-03-15','22:13:09','','0000-00-00',''),(24,32,'24.png','Tempatnya',0,1,'2013-03-16','15:05:38','','0000-00-00',''),(25,33,'25.png','Tempatnya',0,1,'2013-03-16','15:10:34','','0000-00-00',''),(26,34,'26.png','Tempatnya',0,1,'2013-03-16','15:15:10','','0000-00-00',''),(27,35,'27.png','Tempat soto',0,1,'2013-03-16','15:25:46','','0000-00-00',''),(28,36,'28.png','Logonya',0,1,'2013-03-16','15:28:58','','0000-00-00',''),(29,37,'29.png','Tempatnya',0,1,'2013-03-16','15:32:00','','0000-00-00',''),(30,38,'30.png','Tempatnya',0,1,'2013-03-16','15:35:41','','0000-00-00',''),(31,39,'31.jpg','Tempatnya',0,1,'2013-03-18','09:36:52','','0000-00-00',''),(32,40,'32.jpg','Tempatnya',0,1,'2013-03-18','09:49:41','','0000-00-00',''),(33,41,'33.','',0,1,'2013-03-18','09:59:22','','0000-00-00',''),(34,42,'34.jpg','tempat sate',0,1,'2013-03-18','10:39:28','','0000-00-00',''),(35,43,'35. farina','Tempatnya',0,1,'2013-03-18','11:03:50','','0000-00-00',''),(36,44,'36.jpg','Tempatnya',0,1,'2013-03-19','10:14:07','','0000-00-00',''),(37,45,'.jpg','Semanggi',0,1,'2013-03-19','10:20:32','','0000-00-00',''),(38,46,'38.jpg','Tempatnya',0,1,'2013-03-19','10:40:38','','0000-00-00',''),(39,47,'.JPG','Tempatnya',0,1,'2013-03-19','10:54:26','','0000-00-00',''),(40,48,'40.jpg','Tempatnya',0,1,'2013-03-19','11:01:11','','0000-00-00',''),(41,49,'41.JPG','Tempatnya',0,1,'2013-03-19','11:28:48','','0000-00-00',''),(42,50,'42.JPG','Tempatnya',0,1,'2013-03-19','11:49:25','','0000-00-00',''),(43,51,'43.JPG','Tempatnya',0,1,'2013-03-19','12:07:07','','0000-00-00',''),(44,53,'44.','Steak ayam enak',2,1,'2013-04-12','12:06:57','Verified','2013-04-13','23:02:38'),(45,53,'45.JPG','steak ayam enak',2,0,'2013-04-12','12:20:51','','0000-00-00',''),(46,54,'46.JPG','Tempatnya',2,1,'2013-04-13','21:17:42','Verified','2013-04-13','23:03:23'),(47,0,'47.','',2,0,'2013-04-13','21:17:47','','0000-00-00',''),(48,0,'48.','',0,1,'2013-04-13','23:03:29','','0000-00-00',''),(49,0,'49.','',0,1,'2013-04-13','23:04:08','','0000-00-00',''),(50,52,'50.','',0,1,'2013-04-14','08:44:56','','0000-00-00',''),(51,0,'51.','',0,1,'2013-04-14','08:48:55','','0000-00-00',''),(52,0,'52.','',0,1,'2013-04-14','08:51:04','','0000-00-00','');
/*!40000 ALTER TABLE `adm_resto_foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_resto_menu`
--

DROP TABLE IF EXISTS `adm_resto_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_resto_menu` (
  `menu_id` bigint(20) NOT NULL,
  `id_resto` bigint(20) NOT NULL,
  `menu_nama` varchar(255) NOT NULL,
  `menu_harga` varchar(255) NOT NULL,
  `menu_url` varchar(255) NOT NULL,
  `id_member` bigint(20) NOT NULL,
  `id_login` bigint(20) NOT NULL,
  `menu_tgl` date NOT NULL,
  `menu_wkt` varchar(255) NOT NULL,
  `menu_verification` varchar(255) NOT NULL,
  `menu_verification_tgl` date NOT NULL,
  `menu_verification_wkt` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_resto_menu`
--

LOCK TABLES `adm_resto_menu` WRITE;
/*!40000 ALTER TABLE `adm_resto_menu` DISABLE KEYS */;
INSERT INTO `adm_resto_menu` VALUES (78,49,'mie ayam bakso','7500','78.',0,1,'2013-03-19','11:29:43','','0000-00-00',''),(3,2,'Steak','12.000-30.000','3.png',0,1,'2013-03-11','22:50:30','','0000-00-00',''),(4,4,'Steak','12.000-30.000','4.png',0,1,'2013-03-12','09:07:44','','0000-00-00',''),(5,9,'Nasi pecel','-','5.png',0,1,'2013-03-12','11:01:58','','0000-00-00',''),(6,10,'Nasi gudeg','-','6.png',0,1,'2013-03-12','11:12:49','','0000-00-00',''),(7,12,'Steak','15.000 - 40.000','7.',0,1,'2013-03-14','22:19:35','','0000-00-00',''),(8,13,'Rawon','12.000 - 21.000','8.png',0,1,'2013-03-14','22:24:53','','0000-00-00',''),(9,14,'cumi goreng tepung','23.500','9.',0,1,'2013-03-14','22:39:13','','0000-00-00',''),(10,14,'Gurami saus mangga thailand','40.000','10.',0,1,'2013-03-14','22:40:22','','0000-00-00',''),(11,14,'Papakulu sambal dabu','22.000','11.',0,1,'2013-03-14','22:41:03','','0000-00-00',''),(12,15,'Gurami saus thailand','52.000','12.',0,1,'2013-03-15','20:03:44','','0000-00-00',''),(13,15,'Daging sapi ala kanton','40.000','13.',0,1,'2013-03-15','20:04:12','','0000-00-00',''),(14,16,'Kepiting Asap','45.000','14.',0,1,'2013-03-15','20:26:05','','0000-00-00',''),(15,16,'Kepiting Asam Manis','75.000','15.',0,1,'2013-03-15','20:26:38','','0000-00-00',''),(16,19,'Paket hemat','16.000','16.',0,1,'2013-03-15','20:59:04','','0000-00-00',''),(17,20,'Sego goreng jangkring besar','30.000','17.',0,1,'2013-03-15','21:04:00','','0000-00-00',''),(18,21,'Bihun Kwangtong','30.000','18.png',0,1,'2013-03-15','21:12:47','','0000-00-00',''),(19,21,'Capcay','24.000','19.png',0,1,'2013-03-15','21:13:26','','0000-00-00',''),(20,21,'Ko Lo Kee','25.000','20.png',0,1,'2013-03-15','21:14:08','','0000-00-00',''),(21,21,'kwetiau siram sapi','22.000','21.png',0,1,'2013-03-15','21:14:50','','0000-00-00',''),(22,21,'nasi goreng finna','20.000','22.png',0,1,'2013-03-15','21:15:33','','0000-00-00',''),(23,22,'Warm chocolate cake ','50.000','23.png',0,1,'2013-03-15','21:27:24','','0000-00-00',''),(24,22,'Oxtail fried rice','49.500','24.png',0,1,'2013-03-15','21:28:31','','0000-00-00',''),(25,22,'aglio olio spaghetti','38.500','25.png',0,1,'2013-03-15','21:29:32','','0000-00-00',''),(26,22,'strawberry shortcake','28.000','26.png',0,1,'2013-03-15','21:31:02','','0000-00-00',''),(27,23,'tom yam','25.000','27.png',0,1,'2013-03-15','21:40:15','','0000-00-00',''),(28,24,'Nigri sushi','23.000','28.png',0,1,'2013-03-15','21:45:01','','0000-00-00',''),(29,25,'Ayam Presto Telur Asin','14.500','29.png',0,1,'2013-03-15','21:53:35','','0000-00-00',''),(30,25,'Bebek Presto','15.000','30.png',0,1,'2013-03-15','21:57:35','','0000-00-00',''),(31,25,'Asinan Betawi','11.500','31.png',0,1,'2013-03-15','21:58:23','','0000-00-00',''),(32,25,'Tahu telur','13.500','32.png',0,1,'2013-03-15','21:59:42','','0000-00-00',''),(33,25,'Gurami goreng terbang','27.500','33.png',0,1,'2013-03-15','22:00:36','','0000-00-00',''),(34,26,'Rujak','45.000','34.png',0,1,'2013-03-15','22:06:13','','0000-00-00',''),(35,27,'Bakso','12.000','35.png',0,1,'2013-03-15','22:14:56','','0000-00-00',''),(36,28,'gudeg','9000-18.000','36.png',0,1,'2013-03-15','22:19:18','','0000-00-00',''),(37,31,'nasgor','7000','37.png',0,1,'2013-03-15','22:27:35','','0000-00-00',''),(38,32,'Tahu tek','9000','38.',0,1,'2013-03-16','15:08:23','','0000-00-00',''),(39,33,'Bakso campur','5000','39.png',0,1,'2013-03-16','15:12:39','','0000-00-00',''),(40,34,'Soto Otot JImerto','13.000','40.png',0,1,'2013-03-16','15:20:47','','0000-00-00',''),(41,35,'Soto Sapi','15.000-30.000','41.png',0,1,'2013-03-16','15:26:50','','0000-00-00',''),(42,36,'Lontong Cap Gomeh','22.500','42.png',0,1,'2013-03-16','15:29:47','','0000-00-00',''),(43,37,'Soto Ayam','8000-16.000','43.png',0,1,'2013-03-16','15:32:57','','0000-00-00',''),(44,38,'Tahu Campur','8000','44.png',0,1,'2013-03-16','15:36:24','','0000-00-00',''),(45,39,'Bebek goreng','10.000','45.',0,1,'2013-03-18','09:39:10','','0000-00-00',''),(46,40,'nasi bebek','15.000','46.',0,1,'2013-03-18','09:55:00','','0000-00-00',''),(47,41,'Nasi penyet belut','25.000','47.Poer2',0,1,'2013-03-18','10:06:13','','0000-00-00',''),(48,42,'Sate Klopo','20.000','48.jpg',0,1,'2013-03-18','10:47:07','','0000-00-00',''),(49,43,'pempek','9000','49. farina',0,1,'2013-03-18','11:04:35','','0000-00-00',''),(50,44,'Penyet empal daging','17.000','50.',0,1,'2013-03-19','10:14:48','','0000-00-00',''),(51,44,'Bebek penyet','17.000','51.jpg',0,1,'2013-03-19','10:16:05','','0000-00-00',''),(52,45,'Semanggi','5000','52.jpg',0,1,'2013-03-19','10:21:06','','0000-00-00',''),(53,25,'Ayam bakar wijen','16.000','53.jpg',0,1,'2013-03-19','10:24:50','','0000-00-00',''),(54,25,'Ayam petasan','16.000','54.jpg',0,1,'2013-03-19','10:26:03','','0000-00-00',''),(55,25,'Ayam goreng kremes','16.000','55.jpg',0,1,'2013-03-19','10:27:00','','0000-00-00',''),(56,46,'Nasi rawon krengsengan','-','56.jpg',0,1,'2013-03-19','10:42:49','','0000-00-00',''),(57,47,'mie pangsit','9500','57.JPG',0,1,'2013-03-19','10:55:17','','0000-00-00',''),(58,47,'mie ayam ','9000','58.',0,1,'2013-03-19','10:56:25','','0000-00-00',''),(59,47,'Mie bakso','9000','59.',0,1,'2013-03-19','10:57:03','','0000-00-00',''),(60,48,'Sop Iga Bakar','20.000','60.jpg',0,1,'2013-03-19','11:02:09','','0000-00-00',''),(61,48,'Sop Igo Goreng','20.000','61.',0,1,'2013-03-19','11:02:36','','0000-00-00',''),(62,48,'Rawon Igo bakar','20.000','62.',0,1,'2013-03-19','11:03:08','','0000-00-00',''),(63,48,'Rawon Igo goreng','20.000','63.',0,1,'2013-03-19','11:04:25','','0000-00-00',''),(64,48,'Sop kikil goreng','20.000','64.',0,1,'2013-03-19','11:04:53','','0000-00-00',''),(65,48,'Kikil sapi asli','20.000','65.',0,1,'2013-03-19','11:05:37','','0000-00-00',''),(66,48,'Martabak numplek','20.000','66.',0,1,'2013-03-19','11:06:05','','0000-00-00',''),(67,48,'Nasi bebek Ukep bakar Lunamaya','15.000','67.',0,1,'2013-03-19','11:06:42','','0000-00-00',''),(68,48,'Nasi ayam ukep pasha ungu','12.000','68.',0,1,'2013-03-19','11:08:22','','0000-00-00',''),(69,48,'Nasi Sayur asem bandeng presto','15.000','69.',0,1,'2013-03-19','11:09:04','','0000-00-00',''),(70,48,'Nasi krengsengan granat','12.000','70.',0,1,'2013-03-19','11:09:40','','0000-00-00',''),(71,48,'Nasi rawon basoka','12.000','71.',0,1,'2013-03-19','11:10:28','','0000-00-00',''),(72,48,'Nasi pecel ayam','12.000','72.',0,1,'2013-03-19','11:11:00','','0000-00-00',''),(73,48,'Nasi urap ayam bakar ','12.000','73.',0,1,'2013-03-19','11:11:37','','0000-00-00',''),(74,48,'Nasi soto ayam','12.000','74.',0,1,'2013-03-19','11:12:18','','0000-00-00',''),(75,48,'Nasi sayur asem empal','12.000','75.',0,1,'2013-03-19','11:12:56','','0000-00-00',''),(76,48,'Nasi sayur lodeh empal','12.000','76.',0,1,'2013-03-19','11:14:12','','0000-00-00',''),(77,48,'Nasi sayur sop empal','12.000','77.',0,1,'2013-03-19','11:14:46','','0000-00-00',''),(79,49,'mie ayam ','5000','79.',0,1,'2013-03-19','11:30:13','','0000-00-00',''),(80,49,'Bakso','6000','80.',0,1,'2013-03-19','11:30:59','','0000-00-00',''),(81,50,'Paket 1','10.500','81.',0,1,'2013-03-19','11:50:30','','0000-00-00',''),(82,50,'Paket 2','8000','82.',0,1,'2013-03-19','11:51:54','','0000-00-00',''),(83,50,'Paket 3 ','9000','83.',0,1,'2013-03-19','11:52:52','','0000-00-00',''),(84,51,'Nasi goreng jawa ','6000','84.',0,1,'2013-03-19','12:07:53','','0000-00-00',''),(85,51,'Aneka penyet','6000','85.',0,1,'2013-03-19','12:08:24','','0000-00-00',''),(86,51,'bakso urat','5000','86.',0,1,'2013-03-19','12:08:51','','0000-00-00',''),(87,51,'Soto ayam lamongan','6000','87.JPG',0,1,'2013-03-19','12:09:55','','0000-00-00',''),(88,51,'mie ayam ','4000','88.',0,1,'2013-03-19','12:10:53','','0000-00-00',''),(89,0,'','','89.',2,0,'2013-04-13','21:18:10','','0000-00-00',''),(90,54,'mie hijau ayam','6000','90.JPG',2,1,'2013-04-13','22:02:24','Verified','2013-04-14','08:56:14'),(91,0,'','','91.',0,1,'2013-04-14','08:55:58','','0000-00-00','');
/*!40000 ALTER TABLE `adm_resto_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `kategori_id` bigint(20) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL,
  `kategori_kode` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'Makanan Indonesia','01'),(2,'Masakan Padang','0101'),(3,'Warung Tegal','0102'),(4,'Makanan Luar','02'),(5,'Fast Food','0201'),(6,'Chinese Food','0202'),(7,'Rawon','03'),(8,'Soto','04'),(9,'Bakso','05'),(10,'Sego Kucing','0301');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `member_id` bigint(20) NOT NULL,
  `member_username` varchar(255) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_reemail` varchar(255) NOT NULL,
  `member_repassword` varchar(255) NOT NULL,
  `member_nama_depan` varchar(255) NOT NULL,
  `member_nama_belakang` varchar(255) NOT NULL,
  `member_tgl_daftar` date NOT NULL,
  `member_wkt` varchar(255) NOT NULL,
  `member_alamat_long` varchar(255) NOT NULL,
  `member_alamat_lat` varchar(255) NOT NULL,
  `member_alamat_kota` varchar(255) NOT NULL,
  `member_foto` varchar(255) NOT NULL,
  `member_banned` varchar(255) NOT NULL,
  `member_tgl_banned` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'soffan11','soffan','soffan@me.com','soffan@me.com','soffan','Soffan','P','2013-02-26','11:48:55','','','sda','1.jpg','','0000-00-00'),(2,'lia','lia','aprilia@yahoo.com','aprilia@yahoo.com','lia','aprilia ade','megahati','2013-04-01','23:36:27','','','Surabaya','2.jpg','','0000-00-00'),(3,'mulia','mulia','mulia@yahoo.com','mulia@yahoo.com','mulia','muliamulia','puji','2013-04-02','16:36:56','','','gresiki','3.jpg','','0000-00-00'),(4,'lia','lia','aprilia@yahoo.com','aprilia@yahoo.com','lia','aprilia ade','megahati','2013-04-12','07:14:32','','','Surabaya','4.jpg','','0000-00-00'),(5,'lia','lia','aprilia@yahoo.com','aprilia@yahoo.com','lia','aprilia ade','megahati','2013-04-12','07:33:00','','','Surabaya','5.jpg','','0000-00-00'),(6,'mulia','','','','','mulia','puji','2013-04-12','13:03:53','','','','6.','','0000-00-00'),(7,'jeje','99','mulia@yahoo.com','mulia@yahoo.com','99','mdks','jdkk','2013-04-12','13:05:28','','','gresik','7.JPG','','0000-00-00'),(8,'','','','','','','','2013-04-12','13:05:49','','','','8.','','0000-00-00'),(9,'','','','','','','','2013-04-13','17:31:01','','','','9.','','0000-00-00'),(10,'sasa','sasa','sasa@gmail.com','sasa@gmail.com','sasa','sasa','cantik','2013-04-13','17:35:00','','','kertosono','10.jpg','','0000-00-00'),(11,'nakcn','ncakak','','','','sacsnkc','','2013-04-13','17:35:20','','','','11.','','0000-00-00');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_comment`
--

DROP TABLE IF EXISTS `member_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_comment` (
  `comment_id` bigint(20) NOT NULL,
  `id_member` bigint(20) NOT NULL,
  `id_foto` bigint(20) NOT NULL,
  `id_menu` bigint(20) NOT NULL,
  `id_resto` bigint(20) NOT NULL,
  `comment_isi` text NOT NULL,
  `comment_tgl` date NOT NULL,
  `comment_wkt` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_comment`
--

LOCK TABLES `member_comment` WRITE;
/*!40000 ALTER TABLE `member_comment` DISABLE KEYS */;
INSERT INTO `member_comment` VALUES (1,1,0,3,0,'sipppp','2013-04-11','19:59:50'),(2,1,0,0,1,'enak loh...','2013-04-11','20:03:50'),(3,1,0,0,1,'','2013-04-11','20:04:33'),(4,1,0,0,1,'sipppp','2013-04-11','20:05:11'),(5,2,0,0,1,'mantep rasane','2013-04-12','12:48:21'),(6,7,0,3,0,'','2013-04-12','13:08:21'),(7,7,0,0,2,'steaknya enak...','2013-04-12','14:06:29'),(8,7,0,0,2,'steaknya enak...','2013-04-12','14:07:58'),(9,2,0,0,2,'steaknya yummy....','2013-04-12','14:11:15');
/*!40000 ALTER TABLE `member_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_complain`
--

DROP TABLE IF EXISTS `member_complain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_complain` (
  `complain_id` bigint(20) NOT NULL,
  `id_member` bigint(20) NOT NULL,
  `id_resto` bigint(20) NOT NULL,
  `id_comment` bigint(20) NOT NULL,
  `id_foto` bigint(20) NOT NULL,
  `id_menu` bigint(20) NOT NULL,
  `complain_isi` text NOT NULL,
  `complain_tgl` date NOT NULL,
  `complain_wkt` varchar(255) NOT NULL,
  `complain_accept` varchar(255) NOT NULL,
  `complain_accept_tgl` date NOT NULL,
  `complain_accept_id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_complain`
--

LOCK TABLES `member_complain` WRITE;
/*!40000 ALTER TABLE `member_complain` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_complain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_like`
--

DROP TABLE IF EXISTS `member_like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_like` (
  `like_id` bigint(20) NOT NULL,
  `id_member` bigint(20) NOT NULL,
  `id_menu` bigint(20) NOT NULL,
  `id_foto` bigint(20) NOT NULL,
  `id_resto` bigint(20) NOT NULL,
  `like_tgl` date NOT NULL,
  `like_wkt` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_like`
--

LOCK TABLES `member_like` WRITE;
/*!40000 ALTER TABLE `member_like` DISABLE KEYS */;
INSERT INTO `member_like` VALUES (1,1,3,0,0,'2013-04-11','19:59:40'),(2,1,4,0,0,'2013-04-11','19:59:42'),(3,1,5,0,0,'2013-04-11','19:59:43'),(4,1,6,0,0,'2013-04-11','19:59:44'),(5,1,0,0,1,'2013-04-11','20:03:38'),(6,7,3,0,0,'2013-04-12','13:08:04'),(7,7,0,0,1,'2013-04-12','13:19:45'),(8,7,0,0,2,'2013-04-12','13:21:57'),(9,2,72,0,0,'2013-04-12','14:39:12'),(10,2,72,0,0,'2013-04-12','14:39:25'),(11,1,8,0,0,'2013-05-03','09:12:38'),(12,1,7,0,0,'2013-05-03','09:12:44');
/*!40000 ALTER TABLE `member_like` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-06-05 20:40:49
