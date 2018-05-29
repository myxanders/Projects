-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: corporate_directory
-- ------------------------------------------------------
-- Server version	10.1.28-MariaDB

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
-- Current Database: `corporate_directory`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `corporate_directory` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `corporate_directory`;

--
-- Table structure for table `access_log`
--

DROP TABLE IF EXISTS `access_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_log` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `ad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`logid`),
  KEY `FOREIGN_KEY` (`eid`) COMMENT 'foreign_key',
  CONSTRAINT `access_log_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_log`
--

LOCK TABLES `access_log` WRITE;
/*!40000 ALTER TABLE `access_log` DISABLE KEYS */;
INSERT INTO `access_log` VALUES (1,1,'2017-11-01 04:00:00');
/*!40000 ALTER TABLE `access_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application` (
  `appid` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(96) NOT NULL,
  PRIMARY KEY (`appid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
INSERT INTO `application` VALUES (1,'Skype'),(2,'Salesforce'),(3,'Assets'),(4,'Outlook'),(5,'Teamcity'),(6,'Artifactory');
/*!40000 ALTER TABLE `application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_access_log`
--

DROP TABLE IF EXISTS `application_access_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_access_log` (
  `appid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  KEY `FOREIGN_KEY` (`appid`) COMMENT 'foreign_key',
  KEY `FOREIGN_KEY2` (`eid`) COMMENT 'foreign_key',
  CONSTRAINT `application_access_log_ibfk_1` FOREIGN KEY (`appid`) REFERENCES `application` (`appid`),
  CONSTRAINT `application_access_log_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_access_log`
--

LOCK TABLES `application_access_log` WRITE;
/*!40000 ALTER TABLE `application_access_log` DISABLE KEYS */;
INSERT INTO `application_access_log` VALUES (4,3),(3,5),(5,3),(4,3),(5,5),(2,3);
/*!40000 ALTER TABLE `application_access_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_request`
--

DROP TABLE IF EXISTS `application_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_request` (
  `reqid` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` int(11) NOT NULL,
  `e_id` int(11) DEFAULT NULL,
  `rd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` text,
  PRIMARY KEY (`reqid`),
  KEY `foreign_key` (`app_id`),
  KEY `foreign_key2` (`e_id`),
  CONSTRAINT `application_request_ibfk_1` FOREIGN KEY (`app_id`) REFERENCES `application` (`appid`),
  CONSTRAINT `application_request_ibfk_2` FOREIGN KEY (`e_id`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_request`
--

LOCK TABLES `application_request` WRITE;
/*!40000 ALTER TABLE `application_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `application_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `did` int(11) NOT NULL,
  `description` varchar(96) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'Marketing'),(2,'Sales'),(3,'Plant and Infrastructure'),(4,'Information Technology'),(5,'Product Development'),(6,'Human Resources');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `did` int(11) DEFAULT NULL,
  `username` varchar(96) NOT NULL,
  `reportsTo` int(11) DEFAULT NULL,
  `firstname` varchar(96) NOT NULL,
  `lastname` varchar(96) NOT NULL,
  `picture` varchar(96) DEFAULT NULL,
  `dob` date NOT NULL,
  `hireDate` date NOT NULL,
  `homePhone` bigint(30) NOT NULL,
  `workExt` int(11) NOT NULL,
  `email` varchar(96) NOT NULL,
  `streetAddress` varchar(96) NOT NULL,
  `city_town` varchar(96) NOT NULL,
  `state` varchar(96) DEFAULT NULL,
  `country` varchar(96) NOT NULL,
  `zip` int(11) NOT NULL,
  PRIMARY KEY (`eid`),
  UNIQUE KEY `eid` (`eid`),
  KEY `FOREIGN_KEY` (`oid`) COMMENT 'foreign_key',
  KEY `FOREIGN_KEY3` (`username`) COMMENT 'foreign_key3',
  KEY `FOREIGN_KEY2` (`tid`) COMMENT 'foreign_key2',
  KEY `did` (`did`),
  CONSTRAINT `did` FOREIGN KEY (`did`) REFERENCES `department` (`did`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `organization` (`oid`),
  CONSTRAINT `tid` FOREIGN KEY (`tid`) REFERENCES `title` (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,1,1,6,'kaimanners',NULL,'kai','manners',NULL,'1996-02-22','2001-08-09',2147483647,324,'somethingweird102@gmail.com','8721 Nero St.','Hollis','NY','USA',11423),(3,3,4,3,'barackobama',1,'barack','obama',NULL,'2017-02-05','2017-11-05',985059483,898,'barackobama@gmail.com','21 Pennsylvania Avenue','Washington DC','Virginia','USA',9281),(5,5,2,4,'Hideki.Kamiya',3,'Hideki ','Kamiya',NULL,'2017-03-26','2017-11-07',7189098282,898,'viewtifuljoe@gmail.com','87 Nanako Street','Nagano Perfecture',NULL,'JP',11433),(6,2,2,2,'kwest',5,'Kanye ','West',NULL,'1980-11-11','2017-08-21',7489830493,321,'iamagod@gmail.com','76 Chitown St.','Chicago','Illinois','USA',54672),(7,5,4,5,'quentintarantino',6,'quentin','tarantino',NULL,'1975-11-09','2017-08-21',7489580293,758,'killbill@hotmail.com','87 Pulp Lane','Los Angeles','California','USA',64785),(8,1,2,2,'hov',1,'shawn','carter',NULL,'1967-08-07','2017-05-22',7890987364,758,'younghov@gmail.com','87 Magna Carta St.','New York City','New York','USA',64785),(9,3,3,6,'HR',1,'Human','Resources',NULL,'1990-01-01','2017-11-01',7185909384,876,'hr@gmail.com','76 Utopia Lane','Astoria','New York','USA',11423),(10,3,4,3,'georgebush',NULL,'George','Bush',NULL,'1990-02-09','2011-08-09',7489507584,839,'georgebush@president.com','900 Rockland St','Clarke','','USA',73849),(11,2,2,2,'richardgere',NULL,'Richard','Gere',NULL,'1970-08-09','2017-02-03',7485940392,748,'richardgere@gmail.com','98 Apple Road','Rockland','Oregon','USA',92830),(12,2,4,5,'levarburton',1,'levar','burton',NULL,'1980-11-09','2017-01-01',8379405930,29,'levarburton@gmail.com','80 Karoake Street','Portis','Utah','USA',9827),(13,4,5,3,'miyamoto',11,'shigeru','miyamoto',NULL,'1987-02-09','2017-11-05',8179483029,827,'nintendo@gmail.com','90 Kirbyville','Tontsu',NULL,'JP',16273),(14,2,2,3,'opethalice',NULL,'opeth','alice',NULL,'1970-01-01','2017-08-01',8394098978,231,'opethalice@gmail.com','89 Polle Ave','Hollywood','New York','USA',32143),(15,1,1,1,'mickjagger',6,'mick','jagger',NULL,'2017-07-17','2017-11-15',7182983049,617,'mickjagger@gmail.com','8721 popopo','hollis',NULL,'USA',15245),(16,1,2,5,'asdasd',NULL,'asd','asd',NULL,'1990-02-09','1970-01-01',7648589879,321,'somethingweird102@gmail.com','12318273','asd','asdasd','USA',11423),(17,2,1,2,'willywonka',NULL,'willy','wonka',NULL,'1970-01-01','1990-02-22',7584938123,321,'willywonka@gmail.com','90 Rick Lane','Mew York','','USA',11423),(18,5,3,3,'ninjaturtle',NULL,'leonardo','theturtle',NULL,'2017-11-08','2017-01-10',98789798797,876,'ninjaturtle@gmail.com','78 Poop','Hollis','','USA',11423),(19,4,3,4,'hellomyguy',NULL,'qwe','qwe',NULL,'2017-11-23','2017-11-01',8768768123,312,'password@gmail.com','87 popop','asda','','iuio',12332),(20,2,3,2,'poopooman',NULL,'bitch','mcconnell',NULL,'2017-11-01','2017-11-22',918273912873,132,'poo@gmail.com','90 KAKAKA','NEW','','USA',82822),(21,2,1,4,'billburr',NULL,'bill','burr','','2017-11-01','2017-11-14',87632111111,321,'somethingweird102@gmail.com','87 bill burr lane','Hollis','New York','USA',11423),(22,6,3,2,'johnnydepp',NULL,'johnny','depp','','2017-11-14','2017-11-06',87629382732,313,'jdepp@gmail.com','09 Poop Box','Hollis','','USA',11123),(23,6,3,2,'hannahmontana',NULL,'hannah','montana','','2017-11-01','2017-11-22',9728374938,910,'hm@gmail.com','87 Kentucky Road','Derby','Kentucky','USA',17283),(24,3,1,3,'ellaella',NULL,'ella','ella','20171016_211753.jpg','2017-11-30','2017-11-01',123123817231,321,'ella@gmail.com','98798 asdadasd','Loooo','','USA',32123),(25,2,4,5,'ryanreynolds',NULL,'ryan','reynolds','superior-foes-team-meeting.jpg','2017-11-02','2017-11-01',12312313123,123,'ryan@gmail.com','efqewfqefqefqwq','kjhg','kjgh','gkghkjgh',654654),(26,1,2,2,'carlmaster',NULL,'carl','master','14799808_1094667763961989_670887834_o.jpg','2017-11-02','2017-11-01',7182930293,321,'carl@gmail.com','87 Crook Street','Hollis','New York','USA',11423),(27,2,1,4,'jimmorrison',NULL,'jim','morrison','14787032_1094672630628169_1857272555_o.jpg','2017-11-02','2017-11-01',32131231,313,'jim@gmail.com','90 Loop Lane','Newton','Colorado','USA',23132);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `username` varchar(96) NOT NULL,
  `pwd` varchar(96) NOT NULL,
  `pwdset` date NOT NULL,
  PRIMARY KEY (`username`),
  CONSTRAINT `login_ibfk_1` FOREIGN KEY (`username`) REFERENCES `employee` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('asdasd','b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af','0000-00-00'),('barackobama','password','2017-11-01'),('billburr','$2y$10$GrBLhw0ap/WUY4ZkaQC3te/9c1dRyWirYTT.0iIE6QIJKS4jZa6Ba','0000-00-00'),('carlmaster','$2y$10$gyJdDuG6s6bD9iLchWlysOSIkv4ozNu/NPvdHY/dO0/lAbCzlSTme','0000-00-00'),('ellaella','$2y$10$4NByO7fJXkrFnPDjhq1CteYOn5n7lK1DkC79KLdrxHRamDue5OfQm','0000-00-00'),('georgebush','password','0000-00-00'),('hannahmontana','$2y$10$QFOBd3u.stJM7Qjpb.R8..rOygMZyJFFTeoGYLaEv0ofPbQaQD.XO','0000-00-00'),('hellomyguy','$2y$11$FDnnEDq9e5MRHRHlXVOiSu9V.527P26G5opvKFAY0Z5GaArt/qvWq','0000-00-00'),('Hideki.Kamiya','bayonetta123','2017-07-18'),('HR','password','2017-11-15'),('jimmorrison','$2y$10$9bxTLx2fSMQ2MBusAvgzN.e9dN2BzGKZvIeR2ySbnhUgqqq1AiysW','0000-00-00'),('johnnydepp','$2y$10$kfG6f604R6y74e9/p0a95.jF5H9BFyuXSqOGxdP4izE7bjdiyLyiW','0000-00-00'),('kaimanners','ihatemylife647','2017-07-10'),('levarburton','password','2017-11-01'),('mickjagger','password','2017-11-01'),('miyamoto','password','2017-11-01'),('ninjaturtle','$2y$11$H4tgy7zzO9pP5N3gYOLRY.xhtoS71Qvjgkdn9dL/5d9zhJRdIV0Zq','0000-00-00'),('opethalice','','0000-00-00'),('poopooman','$2y$11$LRIHmDkdUKvcMvn1.HpwYeNtgoSV4tZwfqrxThkl/3bfk8bycIclq','0000-00-00'),('richardgere','password','0000-00-00'),('ryanreynolds','$2y$10$OfrtdfaqNjDv57TR4w/E2uGTod3OyBaAceZ0zTcVSnNm5TS/gWxCS','0000-00-00'),('willywonka','b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af','0000-00-00');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organization` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(96) NOT NULL,
  PRIMARY KEY (`oid`),
  UNIQUE KEY `location` (`location`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` VALUES (2,'Chicago'),(6,'London'),(3,'Los Angeles'),(1,'New York City'),(5,'Paris'),(4,'Tokyo');
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_mgmt`
--

DROP TABLE IF EXISTS `system_mgmt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_mgmt` (
  `sysid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  KEY `FOREIGN_KEY` (`eid`) COMMENT 'foreign_key',
  KEY `sysid` (`sysid`),
  CONSTRAINT `system_mgmt_ibfk_1` FOREIGN KEY (`sysid`) REFERENCES `systems` (`sysid`),
  CONSTRAINT `system_mgmt_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_mgmt`
--

LOCK TABLES `system_mgmt` WRITE;
/*!40000 ALTER TABLE `system_mgmt` DISABLE KEYS */;
INSERT INTO `system_mgmt` VALUES (2,3),(3,1),(4,5);
/*!40000 ALTER TABLE `system_mgmt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systems`
--

DROP TABLE IF EXISTS `systems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systems` (
  `sysid` int(11) NOT NULL AUTO_INCREMENT,
  `descrip` varchar(96) NOT NULL,
  PRIMARY KEY (`sysid`),
  KEY `descrip` (`descrip`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systems`
--

LOCK TABLES `systems` WRITE;
/*!40000 ALTER TABLE `systems` DISABLE KEYS */;
INSERT INTO `systems` VALUES (2,'email'),(4,'instant messaging'),(1,'phone'),(3,'web server');
/*!40000 ALTER TABLE `systems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `title`
--

DROP TABLE IF EXISTS `title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `title` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `posname` varchar(96) NOT NULL,
  PRIMARY KEY (`tid`),
  UNIQUE KEY `posname` (`posname`),
  KEY `tid` (`tid`),
  KEY `posname_2` (`posname`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `title`
--

LOCK TABLES `title` WRITE;
/*!40000 ALTER TABLE `title` DISABLE KEYS */;
INSERT INTO `title` VALUES (2,'Administrator'),(1,'CEO/Board'),(5,'Employee'),(3,'HR'),(4,'Manager');
/*!40000 ALTER TABLE `title` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-29 19:52:25
