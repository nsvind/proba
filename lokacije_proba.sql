-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: lokacije_proba
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `datum_registracije` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Nenad','Svind','nsvind@gmail.com','123','::1','2017-01-06 13:16:14');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `komentari`
--

DROP TABLE IF EXISTS `komentari`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `komentari` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `datum` datetime NOT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_com`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `komentari`
--

LOCK TABLES `komentari` WRITE;
/*!40000 ALTER TABLE `komentari` DISABLE KEYS */;
INSERT INTO `komentari` VALUES (1,'juju@gmail.com','Jako Lepo','2016-12-28 16:01:37','::1'),(2,'jksadh@gmail.com','cool','2017-01-05 17:27:12','::1');
/*!40000 ALTER TABLE `komentari` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lokacije`
--

DROP TABLE IF EXISTS `lokacije`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lokacije` (
  `id_lok` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_nepo` int(11) NOT NULL,
  `id_ponuda` int(11) NOT NULL,
  PRIMARY KEY (`id_lok`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lokacije`
--

LOCK TABLES `lokacije` WRITE;
/*!40000 ALTER TABLE `lokacije` DISABLE KEYS */;
INSERT INTO `lokacije` VALUES (1,'Beograd',0,0),(2,'Novi Sad',0,0);
/*!40000 ALTER TABLE `lokacije` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nepokretnosti`
--

DROP TABLE IF EXISTS `nepokretnosti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nepokretnosti` (
  `id_nepo` int(11) NOT NULL AUTO_INCREMENT,
  `nepokretnost` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_ponuda` int(11) NOT NULL,
  `id_lok` int(11) NOT NULL,
  PRIMARY KEY (`id_nepo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nepokretnosti`
--

LOCK TABLES `nepokretnosti` WRITE;
/*!40000 ALTER TABLE `nepokretnosti` DISABLE KEYS */;
INSERT INTO `nepokretnosti` VALUES (1,'Stan',NULL,0,0),(2,'Kuća','Pomocni objekti + povrišine',0,0),(3,'Kuća','Plac površina',0,0),(4,'Zemljište','Tip zemljišta - poljoprivredno + klasa 1',0,0),(5,'Zemljište','Tip zemljišta - poljoprivredno + klasa 2',0,0),(6,'Zemljište','Tip zemljišta - poljoprivredno + klasa 3',0,0),(7,'Zemljište','Tip zemljišta - poljoprivredno + klasa 4',0,0),(8,'Zemljište','Tip zemljišta - poljoprivredno + klasa 5',0,0);
/*!40000 ALTER TABLE `nepokretnosti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ponuda`
--

DROP TABLE IF EXISTS `ponuda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ponuda` (
  `id_ponuda` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nepokretnost` varchar(100) CHARACTER SET utf8 NOT NULL,
  `opis` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `datum` datetime NOT NULL,
  PRIMARY KEY (`id_ponuda`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ponuda`
--

LOCK TABLES `ponuda` WRITE;
/*!40000 ALTER TABLE `ponuda` DISABLE KEYS */;
INSERT INTO `ponuda` VALUES (4,'nsvind87@gmail.com','stan',NULL,'Novi Sad','::1','2016-12-21 18:20:45'),(5,'anaana@gmail.com','kuca','Plac površina','Beograd','::1','2016-12-21 18:21:52'),(8,'Gajama@gmail.com','stan',NULL,'Novi Sad','::1','2016-12-25 18:18:41'),(10,'juju@gmail.com','kuca','Plac površina','Beograd','::1','2016-12-28 16:01:37'),(11,'jksadh@gmail.com','kuca','Pomocni objekti + povrišine','Novi Sad','::1','2017-01-05 17:27:12');
/*!40000 ALTER TABLE `ponuda` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-06 13:35:59
