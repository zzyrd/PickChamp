-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: us-cdbr-azure-central-a.cloudapp.net    Database: pickcham-zgjmyy
-- ------------------------------------------------------
-- Server version	5.5.40-log

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
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game` (
  `gameID` int(11) NOT NULL,
  `home` varchar(30) DEFAULT NULL,
  `guest` varchar(30) DEFAULT NULL,
  `gameTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`gameID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,'lakers','bulls','2015-09-14 18:00:00'),(112,'Yy','Gg','2015-09-18 12:00:00'),(888,'zzh','gcy','2015-12-02 18:00:00'),(1001,'Tigers','Giants','2015-09-01 14:00:00'),(1002,'Tigers','Giants','2015-09-15 14:00:00'),(1003,'Tigers','Jets','2015-09-08 11:00:00'),(1004,'Giants','Tigers','2015-10-02 15:00:00'),(2001,'Suns','Lakers','2015-02-01 20:00:00'),(2002,'Bulls','Suns','2015-04-15 14:00:00'),(2003,'Bulls','Suns','2015-05-08 11:00:00'),(2004,'Suns','Bulls','2015-05-02 15:00:00');
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logins`
--

DROP TABLE IF EXISTS `logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logins` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_of_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_of_logout` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `userName` varchar(20) DEFAULT NULL,
  `loginTimes` int(11) DEFAULT '0',
  `logoutTimes` int(11) DEFAULT '0',
  PRIMARY KEY (`login_id`),
  KEY `userName` (`userName`),
  CONSTRAINT `logins_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `users` (`userName`)
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logins`
--

LOCK TABLES `logins` WRITE;
/*!40000 ALTER TABLE `logins` DISABLE KEYS */;
INSERT INTO `logins` VALUES (1,'2015-12-06 22:31:08','2015-12-06 16:30:38','12345678',14,3),(11,'2015-12-06 05:13:05','0000-00-00 00:00:00','123456789',1,1),(21,'2015-12-06 22:03:30','2015-12-06 16:03:00','qqq',1,1),(31,'2015-12-06 22:36:06','0000-00-00 00:00:00','789',0,0),(51,'2015-12-16 02:09:11','2015-12-15 20:08:22','admin',77,40),(61,'2015-12-06 23:04:43','2015-12-06 17:04:13','111',1,1),(71,'2015-12-06 23:04:43','2015-12-06 17:04:13','111',1,1),(81,'2015-12-11 02:28:47','0000-00-00 00:00:00','889',1,0),(91,'2015-12-11 21:15:16','0000-00-00 00:00:00','1234',0,0),(101,'2015-12-11 21:15:30','0000-00-00 00:00:00','1234',0,0),(111,'2015-12-11 22:29:56','2015-12-11 15:16:53','123',4,1),(121,'2015-12-11 23:01:08','0000-00-00 00:00:00','zzh',0,0),(131,'2015-12-16 02:08:26','2015-12-15 20:07:37','zzyrd',14,9),(141,'2015-12-13 23:43:17','2015-12-13 12:08:50','yyf',6,1),(151,'2015-12-13 23:43:17','2015-12-13 12:08:50','yyf',6,1),(161,'2015-12-15 01:55:26','2015-12-14 19:54:40','madden',4,2),(171,'2015-12-13 21:49:43','0000-00-00 00:00:00','test',3,0),(181,'2015-12-13 21:49:43','0000-00-00 00:00:00','test',3,0),(191,'2015-12-14 23:01:57','0000-00-00 00:00:00','1',1,0),(201,'2015-12-14 23:01:57','0000-00-00 00:00:00','1',1,0),(221,'2015-12-16 01:52:33','2015-12-15 19:51:45','12',1,1);
/*!40000 ALTER TABLE `logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pick`
--

DROP TABLE IF EXISTS `pick`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pick` (
  `pick_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) DEFAULT NULL,
  `leagueName` varchar(20) DEFAULT NULL,
  `week` int(11) DEFAULT NULL,
  `pick1` varchar(1) DEFAULT NULL,
  `pick2` varchar(1) DEFAULT NULL,
  `pick3` varchar(1) DEFAULT NULL,
  `pick4` varchar(1) DEFAULT NULL,
  `pick5` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`pick_id`)
) ENGINE=InnoDB AUTO_INCREMENT=431 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pick`
--

LOCK TABLES `pick` WRITE;
/*!40000 ALTER TABLE `pick` DISABLE KEYS */;
INSERT INTO `pick` VALUES (11,'zzyrd','NFL',14,'A','A','A','B','A'),(21,'zzyrd','NFL',15,'B','B','B','B','A'),(31,'zzyrd','NFL',16,'B','B','B','B','B'),(41,'1','NHL',5,'B','A','B','A','B'),(51,'1','NHL',5,'B','A','B','A','B'),(61,'1','NHL',5,'B','A','B','A','B'),(71,'zzyrd','NHL',6,'A','A','A','A','A'),(91,'zzyrd','MLB',12,'A','B','A','B','A'),(101,'zzyrd','MLB',11,'A','A','A','A','A'),(112,'zzyrd','NHL',6,'A','A','B','A','B'),(121,'zzyrd','NHL',6,'A','A','B','A','A'),(131,'zzyrd','NHL',6,'A','A','A','B','A'),(141,'zzyrd','NFL',16,'B','A','A','B','A'),(151,'1','MLB',10,'B','B','B','B','B'),(161,'1','MLB',10,'B','B','B','B','B'),(171,'1','MLB',10,'B','B','B','B','B'),(181,'1','MLB',10,'B','B','B','B','B'),(191,'1','MLB',10,'B','B','B','B','B'),(201,'1','MLB',12,'B','B','B','B','B'),(211,'1','NHL',7,'B','B','B','B','B'),(221,'zzyrd','NFL',14,'B','B','A','B','A'),(231,'zzyrd','NFL',15,'B','A','B','A','B'),(241,'zzyrd','NFL',16,'A','A','B','A','A'),(251,'zzyrd','NHL',6,'B','B','A','A','B'),(261,'zzyrd','NHL',6,'B','A','A','A','B'),(271,'zzyrd','NHL',7,'B','B','A','A','B'),(282,'zzyrd','MLB',10,'A','B','A','B','A'),(291,'zzyrd','MLB',11,'A','B','A','B','A'),(301,'zzyrd','MLB',12,'B','A','B','A','A'),(312,'zzyrd','MLB',10,'A','A','A','A','A'),(321,'zzyrd','MLB',11,'A','A','A','A','A'),(331,'zzyrd','MLB',12,'B','B','B','B','B'),(341,'zzyrd','MLB',11,'A','A','A','A','A'),(351,'zzyrd','MLB',10,'A','B','A','B','A'),(361,'zzyrd','NFL',14,'B','B','A','B','B'),(371,'zzyrd','NFL',15,'B','B','A','A','B'),(381,'zzyrd','NFL',16,'B','A','B','A','A'),(391,'zzyrd','NHL',6,'B','A','B','A','B'),(401,'zzyrd','NHL',6,'A','A','A','A','A'),(411,'zzyrd','NHL',7,'B','B','B','B','B'),(421,'zzyrd','MLB',12,'B','B','B','B','A');
/*!40000 ALTER TABLE `pick` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sport`
--

DROP TABLE IF EXISTS `sport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sport` (
  `leagueName` varchar(20) NOT NULL,
  `sport` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`leagueName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sport`
--

LOCK TABLES `sport` WRITE;
/*!40000 ALTER TABLE `sport` DISABLE KEYS */;
INSERT INTO `sport` VALUES ('CollegeFootball','football'),('MLB','baseball'),('NBA','basketball'),('NFL','football'),('NHL','hockey');
/*!40000 ALTER TABLE `sport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `teamName` varchar(20) NOT NULL,
  `league` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`teamName`),
  KEY `league` (`league`),
  CONSTRAINT `team_ibfk_1` FOREIGN KEY (`league`) REFERENCES `sport` (`leagueName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES ('12345','CollegeFootball'),('123;34234','CollegeFootball'),('Giants','CollegeFootball'),('test-team','CollegeFootball'),('Test-Team-name-1','CollegeFootball'),('Jets','MLB'),('Test-Team-name-2','MLB'),('Suns','NBA'),('Test-Team-name-3','NBA'),('Tigers','NBA'),('Cardinals','NFL'),('Test-Team-name-4','NFL'),('Lakers','NHL'),('Test-Team-name-5','NHL');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_game`
--

DROP TABLE IF EXISTS `team_game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_game` (
  `teamname` varchar(30) NOT NULL DEFAULT '',
  `game_ID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`teamname`,`game_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_game`
--

LOCK TABLES `team_game` WRITE;
/*!40000 ALTER TABLE `team_game` DISABLE KEYS */;
INSERT INTO `team_game` VALUES ('blue',111),('bulls',1),('Bulls',2002),('Bulls',2003),('Bulls',2004),('d',1),('f',1),('gcy',888),('Gg',112),('Giants',1001),('Giants',1002),('Giants',1004),('Jets',1003),('lakers',1),('Lakers',2001),('red',111),('Suns',2001),('Suns',2002),('Suns',2003),('Suns',2004),('Tigers',1001),('Tigers',1002),('Tigers',1003),('Tigers',1004),('Yy',112),('zzh',888);
/*!40000 ALTER TABLE `team_game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userName` varchar(20) NOT NULL,
  `userType` varchar(20) DEFAULT NULL,
  `salt` varchar(20) DEFAULT NULL,
  `hashed_password` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('1','c','1937212295','5cc4b319fe50282714c13164d0407eb60511e114'),('111','c','1159143733','1c266b7da7637336251ea8129443290838471ca9'),('12','s','225568006','9991cdde5bb8a78bd68fd168a44bfcc28438ffae'),('123','c','2039464871','c79482664e908aad6bed29f117a06669708a27ed'),('1234','c','447246468','88b580f83824d7d8cfc113f114a49f44080e6899'),('123456','c','246741477','625a366ab8621e6cd8335b0c3504aecb0bdda8eb'),('1234567','s','1477500609','dd18fbff0d584529388eb24fc0fd3f8f73141367'),('12345678','c','1680536432','2c9f0210cd90c16978767d2ad2f80f5f08a71039'),('123456789','s','25383559','44985b8ce5f9502cdfa5d3f31090b58f71c9a19b'),('789','s','1618740882','3d63bb180fd3cf85e4f2ba1da6fd2cd8ecc194b5'),('889','c','55581291','793c480c2b6e52d5df7b00c109c764c5f19a9913'),('admin','a','552723083','b4cc889a6ca7ec5bc3b483619d0d6438922fcbed'),('madden','c','781654588','3e021771153559ee4d7fb93b55e2c14c239f16b6'),('qqq','s','1044155451','33d46c7c3914cdf91987ab8535a04fbc7e86a623'),('test','s','1909747918','bd526cb1300218eacaba4d94305928e5260c99ff'),('yyf','c','1425595472','0357a5e89d9c78c490e5809a3d9c1f712d9c2aa7'),('zzh','s','171202051','9e3a5280a69d931feaf5c87222011960f61ba6f1'),('zzyrd','c','734918126','be9d268fc8c3417ebe72df0da070823e68c53f41');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-16  2:15:31
