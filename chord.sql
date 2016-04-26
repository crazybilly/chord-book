-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (armv7l)
--
-- Host: localhost    Database: chord
-- ------------------------------------------------------
-- Server version	5.5.31-0+wheezy1

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
-- Table structure for table `KEYS`
--


DROP TABLE IF EXISTS `KEYS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `KEYS` (
  `Key` varchar(2) DEFAULT NULL,
  `0` varchar(2) DEFAULT NULL,
  `1` varchar(2) DEFAULT NULL,
  `2` varchar(2) DEFAULT NULL,
  `3` varchar(2) DEFAULT NULL,
  `4` varchar(2) DEFAULT NULL,
  `5` varchar(2) DEFAULT NULL,
  `6` varchar(2) DEFAULT NULL,
  `7` varchar(2) DEFAULT NULL,
  `8` varchar(2) DEFAULT NULL,
  `9` varchar(2) DEFAULT NULL,
  `10` varchar(2) DEFAULT NULL,
  `11` varchar(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `KEYS`
--

LOCK TABLES `KEYS` WRITE;
/*!40000 ALTER TABLE `KEYS` DISABLE KEYS */;
INSERT INTO `KEYS` VALUES ('A','A','Bb','B','C','C#','D','Eb','E','F','F#','G','G#'),('Bb','Bb','B','C','C#','D','Eb','E','F','F#','G','G#','A'),('B','B','C','C#','D','Eb','E','F','F#','G','G#','A','Bb'),('C','C','C#','D','Eb','E','F','F#','G','G#','A','Bb','B'),('C#','C#','D','Eb','E','F','F#','G','G#','A','Bb','B','C'),('D','D','Eb','E','F','F#','G','G#','A','Bb','B','C','C#'),('Eb','Eb','E','F','F#','G','G#','A','Bb','B','C','C#','D'),('E','E','F','F#','G','G#','A','Bb','B','C','C#','D','Eb'),('F','F','F#','G','G#','A','Bb','B','C','C#','D','Eb','E'),('F#','F#','G','G#','A','Bb','B','C','C#','D','Eb','E','F'),('G','G','G#','A','Bb','B','C','C#','D','Eb','E','F','F#'),('G#','G#','A','Bb','B','C','C#','D','Eb','E','F','F#','G');
/*!40000 ALTER TABLE `KEYS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SETLISTS`
--

DROP TABLE IF EXISTS `SETLISTS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SETLISTS` (
  `lID` int(3) NOT NULL AUTO_INCREMENT,
  `Name` varchar(199) NOT NULL,
  `Date` date NOT NULL,
  `Type` int(11) NOT NULL,
  PRIMARY KEY (`lID`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `SONGS`
--

DROP TABLE IF EXISTS `SONGS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SONGS` (
  `sID` int(2) NOT NULL AUTO_INCREMENT,
  `Song` varchar(50) DEFAULT NULL,
  `Key` varchar(1) DEFAULT NULL,
  `Songname` varchar(50) DEFAULT NULL,
  `JakeT` varchar(1) DEFAULT NULL,
  `Sebok` varchar(1) DEFAULT NULL,
  `Tempo` int(1) DEFAULT NULL,
  `Harmonica` varchar(1) DEFAULT NULL,
  `OneMic` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`sID`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `SONGS_IN_SETS`
--

DROP TABLE IF EXISTS `SONGS_IN_SETS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SONGS_IN_SETS` (
  `lID` int(3) NOT NULL,
  `sID` int(3) NOT NULL,
  `Key` varchar(2) NOT NULL,
  `SONG_ORDER` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-26 21:36:05
