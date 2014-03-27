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
-- Dumping data for table `SETLISTS`
--

LOCK TABLES `SETLISTS` WRITE;
/*!40000 ALTER TABLE `SETLISTS` DISABLE KEYS */;
INSERT INTO `SETLISTS` VALUES (1,'Test','2012-09-08',1),(2,'Prairie Pedal','2012-09-30',2),(3,'Demo','2012-12-31',0),(4,'Keri\'s Birthday Party','2012-11-10',2),(6,'China Coffeehouse','2013-01-11',2),(7,'Donnie\'s','2013-03-30',3),(8,'IL Marathon 5K','2013-04-26',2),(9,'Tori & Diana\'s Graduation Party','2013-05-19',1),(10,'Farmer\'s Market Opening','2013-06-08',2),(11,'Wick\'s Adoption Benefit','2013-05-11',2),(12,'MusiCAMP','2013-06-11',1),(13,'Farmers market ','2013-08-03',1),(14,'Arts in Central Park ','2013-09-21',1),(15,'Porch Party','2013-09-20',1),(16,'Phillipines Coffeehouse ','2013-10-11',1),(17,'Kate Shields Wedding ','2013-11-18',2);
/*!40000 ALTER TABLE `SETLISTS` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `SONGS`
--

LOCK TABLES `SONGS` WRITE;
/*!40000 ALTER TABLE `SONGS` DISABLE KEYS */;
INSERT INTO `SONGS` VALUES (1,'New Madrid','G','NewMadrid','1','2',6,'',''),(2,'Maggie\'s Farm','G','MaggiesFarm','3','2',7,'',''),(3,'Swing Low Sweet Chariot','D','SwingLow','1','3',3,'',''),(4,'Along in the Sun and The Rain','C','alonginthesunandtherain','1','2',4,'1',''),(12,'All My Tears','F','allmytears','3','2',4,'',''),(13,'Angel from Montgomery','G','angelfrommontgomery','1','2',3,'',''),(14,'Atomic Power','A','atomicpower','3','2',9,'',''),(15,'Beg Steal Borrow','A','begstealborrow','1','2',6,'',''),(16,'Betrayal','D','betrayal','2','1',2,'',''),(17,'Blood Wine','E','bloodwine','3','2',8,'',''),(18,'Baby Let Me Follow You Down','G','babyletmefollowyoudown','1','2',6,'',''),(19,'California Stars','A','california-stars','3','2',8,'',''),(20,'City of New Orleans','E','city-of-new-orleans','1','2',7,'',''),(21,'Consider the Ravens','G','consider-the-ravens','1','2',6,'',''),(22,'Crawdad Hole','D','crawdad-hole','4','2',6,'1','2'),(23,'Cripple Creek','G','cripple-creek','1','4',8,'','2'),(24,'E-RI-E Canal','E','the-e-ri-e-canal','3','2',8,'',''),(25,'Forget the Flowers','C','forget-the-flowers','1','2',5,'',''),(26,'Fox','G','fox','1','2',8,'',''),(27,'Froggie Went A\'Courtin','D','froggie-went-acourtin','1','2',7,'','3'),(28,'From This Valley','G','from-this-valley','1','4',7,'','1'),(29,'Getting Tired','G','getting-tired','1','2',3,'',''),(30,'Girl From The North Country','G','girl-from-the-north-country','4','3',4,'',''),(31,'Goin\' to Acapulco','A','goin-to-acapulco','1','2',2,'',''),(32,'Goodnight Irene','A','goodnight-irene','1','2',4,'',''),(33,'Got Me','A','got-me','3','3',3,'',''),(34,'Hard, Ain\'t It Hard','G','hard-aint-it-hard','1','5',7,'','2'),(35,'Hard Luck and Heart Attack','G','hard-luck-and-heart-attack','3','2',6,'',''),(36,'House Where Nobody Lives','D','house-where-nobody-lives','1','2',2,'',''),(37,'If I Give My Soul','D','if-i-give-my-soul','3','2',6,'',''),(38,'It Ain\'t Over','D','it-aint-over','1','2',3,'',''),(39,'I\'ve Been Working on the Railroad','E','ive-been-working-on-the-railroad','5','1',8,'','1'),(40,'Jesse James','G','jesse-james','4','1',6,'','2'),(41,'Jesus Christ','G','jesus-christ','1','4',9,'','2'),(42,'Jesus In New Orleans','G','jesus-in-new-orleans','1','2',4,'',''),(43,'John Henry','E','john-henry','3','2',8,'',''),(44,'John Saw That Number','D','john-saw-that-number','1','4',6,'',''),(45,'Keep on The Sunny Side','G','keep-on-the-sunny-side','1','2',7,'','2'),(46,'Last Fair Deal Gone Down','E','last-fair-deal-gone-down','3','2',7,'',''),(47,'Last Train to Glory','C','last-train-to-glory','3','2',6,'',''),(48,'Lighthouse Tale','D','lighthouse-tale','1','2',8,'',''),(49,'Long Black Veil','C','long-black-veil','5','3',5,'','2'),(50,'Miss Ferris','D','miss-ferris','4','2',6,'','3'),(51,'Motel Rooms','C','motel-rooms','1','2',6,'',''),(52,'New Redemption Song','C','new-redemption-song','5','2',4,'',''),(53,'Nothing Like A Train','C','nothing-like-a-train','5','2',8,'',''),(54,'On This Cold Prison Wall','C','on-this-cold-prison-wall','3','2',4,'1',''),(55,'Opposite\'s True','G','opposites-true','1','2',8,'',''),(56,'Paradise','C','paradise','1','3',3,'',''),(57,'Pay Me My Money Down','F','pay-me-my-money-down','3','2',8,'',''),(58,'Poughkeepsie','G','poughkeepsie','1','2',3,'',''),(59,'Promenade','G','promenade','1','2',6,'',''),(60,'Question','C','question','1','2',5,'',''),(61,'Red Clay Halo','G','red-clay-halo','1','2',7,'','2'),(62,'Red Georgia Clay','D','red-georgia-clay','4','2',5,'',''),(63,'Red River Valley','G','red-river-valley','5','3',5,'1','1'),(64,'River That Flows Both Ways','G','river-that-flow-both-ways','1','3',6,'',''),(65,'Shame','G','shame','4','3',4,'','1'),(66,'Sink The Bismark','D','sink-the-bismark','3','2',6,'',''),(67,'Sixteen Days','C','sixteen-days','3','2',7,'',''),(68,'Solar System','C','solar-system','2','3',7,'',''),(69,'Song for Bill','C','song-for-bill','1','2',2,'',''),(70,'Song for Woody','A','song-for-woody','1','3',6,'',''),(71,'Stagger Lee','C','stagger-lee','3','4',8,'',''),(72,'Step It Out Nancy','C','step-it-out-nancy','1','5',7,'',''),(73,'Sympathy for Jesus','C','sympathy-for-jesus','1','2',4,'',''),(74,'Tennessee Waltz','G','tennessee-waltz','1','2',3,'',''),(75,'The Weight','A','the-weight','4','3',5,'','1'),(76,'This Land Is Your Land','C','this-land-is-your-land','4','3',6,'','2'),(77,'This Time Isn\'t One of Them','C','this-time-isnt-one-of-them','1','2',2,'',''),(78,'Trail of the Lonesome Pine','D','train-of-the-lonesome-pine','3','2',6,'',''),(79,'Vigilante Man','C','vigilante-man','3','2',8,'',''),(80,'Wabash Cannonball','G','wabash-cannonball','5','2',6,'1','2'),(81,'Wagon Wheel','G','wagon-wheel','4','1',6,'','2'),(82,'Waltzing Matlida','D','waltzing-matlida','1','2',7,'',''),(83,'Wayside','G','wayside','1','5',5,'',''),(84,'When the World\'s on Fire','D','when-the-worlds-on-fire','1','2',7,'',''),(85,'When You Come Back Down','D','when-you-come-back-down','1','2',4,'',''),(86,'Will The Circle Be Unbroken','C','will-the-circle-be-unbroken','3','2',6,'','1'),(87,'With You','C','with-you','1','2',7,'','3'),(88,'Worried Man\'s Blues','E','worried-mans-blues','3','2',6,'',''),(89,'You Are My Sunshine','C','you-are-my-sunshine','5','2',6,'1','2'),(90,'BREAK---------------BREAK','A','break','1','1',1,'',''),(91,'Casino Queen','G','casino-queen','3','2',9,'',''),(92,'Black Dresses','A','black-dresses','4','1',7,'','3'),(93,'Someone Else\'s Song','A','someone-elses-song','1','2',4,'',''),(94,'Pine Box','E','pine-box','1','2',3,'','3'),(95,'Testing','B','testing','2','4',4,'1',''),(96,'The General','B','the-general','3','2',9,'','3'),(97,'Duncan and Brady','C','duncan-and-brady','1','2',6,'','3'),(98,'Apology Song','E','apology-song','3','1',4,'','3'),(99,'Ohio River Boat Song','E','ohio-river-boat-song','2','1',3,'','3'),(100,'Run Through My Veins ','G','run-through-my-veins','3','2',8,'','3'),(101,'Good Ole Mountain Dew','G','good-ole-mountain-dew','4','2',10,'','2'),(102,'I\'ve Got A River of Life','D','ive-got-a-river-of-life','1','1',7,'','3'),(103,'Erie Canal','G','erie-canal','1','2',3,'','2'),(105,'She\'ll Be Coming Round the Mountain','G','shell-be-coming-round-the-mountain','1','1',7,'','1'),(106,'Highway 51','D','highway-51','4','2',6,'','3'),(107,'Buffalo Skinners','G','buffalo-skinners','4','2',6,'','2'),(108,'Little Joe Wrangler','D','little-joe-wrangler','1','3',5,'','2'),(109,'Harrisburg','C','harrisburg','2','1',8,'','3'),(110,'Summertime','G','summertime','1','2',6,'','2'),(111,'Still Hangin\' Around','E','still-hangin-around','1','1',5,'','3'),(112,'Fixin\' To Die','D','fixin-to-die','1','1',0,'','3'),(116,'Bakersfiled','C','bakersfiled','1','3',5,'','2'),(114,'Fifty Way to Leave Your Lover','G','fifty-way-to-leave-your-lover','1','1',6,'','3'),(115,'Rainbow','C','rainbow','1','1',5,'','3'),(117,'CC Rider','C','cc-rider','4','1',8,'','2'),(118,'Man of Constant Sorrows','D','man-of-constant-sorrows','1','1',5,'','2'),(119,'I\'ll Fly Away','G','ill-fly-away','1','1',8,'','1'),(120,'Christmas Time Is Here','A','christmas-time-is-here','1','1',1,'','3');
/*!40000 ALTER TABLE `SONGS` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Dumping data for table `SONGS_IN_SETS`
--

LOCK TABLES `SONGS_IN_SETS` WRITE;
/*!40000 ALTER TABLE `SONGS_IN_SETS` DISABLE KEYS */;
INSERT INTO `SONGS_IN_SETS` VALUES (2,0,'E',36),(3,50,'D',11),(3,49,'C',10),(14,74,'G',53),(14,69,'C',52),(2,32,'E',35),(2,67,'C',34),(2,68,'Eb',33),(2,16,'E',32),(2,78,'E',31),(2,69,'Eb',30),(2,74,'G',29),(2,57,'F',28),(2,56,'C',27),(2,71,'A',26),(2,44,'D',25),(2,41,'G',24),(2,23,'G',23),(2,76,'G',22),(2,75,'G',21),(2,49,'D',20),(2,81,'G',19),(2,89,'G',18),(2,63,'G',17),(2,80,'G',16),(2,53,'C',15),(2,45,'G',14),(2,43,'E',13),(2,37,'D',12),(2,24,'E',11),(2,50,'D',10),(2,62,'D',9),(2,22,'G',8),(2,40,'G',7),(2,92,'A',6),(2,19,'A',5),(1,108,'D',17),(2,4,'D',4),(1,109,'C',16),(2,14,'A',3),(2,55,'B',2),(2,1,'G',1),(3,47,'C',9),(3,43,'E',8),(3,24,'E',7),(3,91,'G',6),(1,98,'E',15),(1,106,'D',14),(3,19,'A',5),(4,76,'C',34),(4,67,'C',33),(4,55,'G',32),(4,69,'C',31),(4,53,'C',30),(4,45,'G',29),(4,43,'E',28),(4,1,'G',27),(4,4,'C',26),(4,37,'D',25),(4,84,'E',24),(4,68,'C',23),(4,16,'D',22),(4,41,'G',21),(4,71,'C',20),(4,44,'D',19),(4,34,'G',18),(4,81,'G',17),(4,40,'G',16),(4,75,'A',15),(4,65,'G',14),(4,32,'A',13),(4,96,'B',12),(4,79,'C',11),(4,27,'D',10),(4,78,'D',9),(4,54,'C',8),(4,89,'C',7),(4,57,'F',6),(4,24,'E',5),(4,19,'A',4),(4,14,'A',3),(4,92,'A',2),(4,50,'D',1),(1,103,'G',13),(8,87,'C',32),(8,80,'G',31),(8,89,'C',30),(8,59,'E',29),(8,67,'C',28),(7,76,'G',40),(1,18,'G',12),(6,76,'C',26),(6,75,'A',25),(6,65,'G',24),(6,40,'G',23),(6,22,'D',22),(6,92,'A',21),(6,89,'C',20),(6,45,'G',19),(6,41,'G',18),(6,34,'G',17),(6,90,'A',16),(6,68,'C',15),(6,43,'E',14),(6,57,'F',13),(6,79,'C',12),(6,37,'D',11),(6,67,'C',10),(6,54,'C',9),(6,32,'A',8),(6,50,'D',7),(6,24,'E',6),(6,71,'C',5),(6,44,'D',4),(6,55,'G',3),(6,1,'G',2),(6,19,'A',1),(7,75,'G',39),(7,65,'G',38),(7,89,'C',37),(7,77,'Eb',36),(7,56,'D',35),(7,55,'B',34),(7,1,'G',33),(7,45,'G',32),(7,69,'Eb',31),(7,32,'E',30),(7,78,'E',29),(7,37,'D',28),(7,67,'C',27),(7,79,'Eb',26),(7,68,'Eb',25),(7,54,'D',24),(7,71,'A',23),(7,44,'D',22),(7,41,'G',21),(7,87,'C',20),(7,34,'G',19),(7,80,'G',18),(7,47,'D',17),(7,84,'E',16),(7,49,'D',15),(7,92,'A',14),(7,62,'D',13),(7,81,'G',12),(7,16,'E',11),(7,99,'E',10),(7,4,'D',9),(7,57,'F',8),(7,53,'C',7),(7,43,'E',6),(7,24,'E',5),(7,19,'A',4),(7,14,'A',3),(7,91,'G',2),(3,92,'A',4),(3,16,'D',3),(3,14,'A',2),(3,4,'C',1),(3,53,'C',12),(3,54,'C',13),(3,57,'F',14),(3,94,'E',15),(3,62,'D',16),(3,68,'C',17),(3,78,'D',18),(3,79,'C',19),(3,80,'G',20),(3,87,'C',21),(3,67,'C',22),(3,32,'A',23),(3,34,'G',24),(3,37,'D',25),(3,41,'G',26),(3,44,'D',27),(3,45,'G',28),(3,47,'C',29),(3,56,'C',30),(3,1,'G',31),(3,55,'G',32),(3,94,'E',33),(3,59,'G',34),(3,65,'G',35),(3,69,'C',36),(3,71,'C',37),(3,75,'A',38),(3,77,'C',39),(3,75,'A',40),(3,76,'C',41),(3,81,'G',42),(3,84,'D',43),(3,89,'C',44),(3,99,'E',45),(1,107,'G',11),(1,101,'G',10),(7,50,'D',1),(8,79,'E',27),(8,55,'B',26),(8,57,'F',25),(8,54,'D',24),(8,53,'C',23),(8,76,'C',22),(8,75,'G',21),(8,81,'G',20),(8,92,'A',19),(8,40,'G',18),(8,50,'D',17),(8,45,'G',16),(8,47,'D',15),(8,99,'E',14),(8,68,'Eb',13),(8,1,'G',12),(8,43,'E',11),(8,37,'D',10),(8,100,'G',9),(8,27,'D',8),(8,24,'E',7),(8,71,'A',6),(8,34,'G',5),(8,41,'G',4),(8,23,'G',3),(8,19,'A',2),(8,14,'A',1),(14,56,'C',51),(14,54,'C',50),(14,99,'E',49),(14,32,'A',48),(10,63,'G',42),(10,100,'G',41),(10,69,'Eb',40),(10,59,'E',39),(10,84,'E',38),(10,89,'C',37),(10,71,'A',36),(10,44,'D',35),(10,41,'G',34),(10,23,'G',33),(10,57,'F',32),(10,55,'B',31),(10,80,'G',30),(10,78,'E',29),(10,54,'D',28),(10,53,'C',27),(10,1,'G',26),(10,67,'C',25),(10,47,'D',24),(10,45,'G',23),(10,43,'E',22),(10,99,'E',21),(10,16,'E',20),(10,68,'Eb',19),(10,76,'G',18),(10,75,'G',17),(10,65,'G',16),(10,22,'G',15),(10,62,'D',14),(10,40,'G',13),(10,34,'G',12),(10,49,'G',11),(10,92,'A',10),(10,81,'G',9),(10,27,'D',8),(10,37,'D',7),(10,32,'E',6),(10,24,'E',5),(10,19,'A',4),(1,33,'A',9),(9,76,'C',34),(11,76,'C',34),(11,22,'D',33),(11,75,'A',32),(11,86,'C',31),(11,32,'A',30),(11,39,'E',29),(11,27,'D',28),(11,89,'C',27),(11,63,'G',26),(11,57,'F',25),(11,56,'C',24),(11,96,'B',23),(11,90,'A',22),(11,59,'G',21),(11,47,'C',20),(11,24,'E',19),(11,37,'D',18),(11,54,'C',17),(11,74,'G',16),(11,44,'D',15),(11,68,'C',14),(11,71,'C',13),(11,34,'G',12),(11,41,'G',11),(11,99,'E',10),(11,92,'A',9),(11,81,'G',8),(11,55,'G',7),(11,67,'C',6),(11,1,'G',5),(11,53,'C',4),(11,43,'E',3),(11,19,'A',2),(11,50,'D',1),(9,74,'G',33),(9,71,'C',32),(9,100,'G',31),(9,55,'G',30),(9,54,'C',29),(9,4,'C',28),(9,99,'E',27),(9,51,'C',26),(9,78,'D',25),(9,50,'D',24),(9,53,'C',23),(9,47,'C',22),(9,46,'E',21),(9,45,'G',20),(9,90,'A',19),(9,19,'A',18),(9,14,'A',17),(9,43,'E',16),(9,37,'D',15),(9,89,'C',14),(9,32,'A',13),(9,27,'D',12),(9,24,'E',11),(9,56,'C',10),(9,44,'D',9),(9,41,'G',8),(9,23,'G',7),(9,34,'G',6),(9,28,'G',5),(9,82,'D',4),(9,81,'G',3),(9,57,'F',2),(9,1,'G',1),(14,4,'C',47),(14,90,'A',46),(14,89,'C',45),(14,86,'C',44),(14,82,'D',43),(14,80,'G',42),(14,78,'D',41),(14,75,'A',40),(14,110,'G',39),(14,66,'D',38),(14,63,'G',37),(14,65,'G',36),(14,60,'C',35),(14,53,'C',34),(14,49,'C',33),(14,47,'C',32),(14,45,'G',31),(1,88,'E',8),(1,86,'C',7),(1,63,'G',6),(1,12,'F',5),(1,35,'G',4),(10,14,'A',3),(10,91,'G',2),(10,50,'D',1),(1,38,'D',3),(12,71,'C',18),(12,32,'A',17),(12,80,'G',16),(12,76,'C',15),(12,86,'C',14),(12,63,'G',13),(12,105,'G',12),(12,78,'E',11),(12,45,'G',10),(12,43,'E',9),(12,89,'G',8),(12,41,'G',7),(12,101,'G',6),(12,103,'G',5),(12,27,'D',4),(12,39,'E',3),(12,57,'F',2),(12,102,'D',1),(14,40,'G',30),(14,37,'D',29),(14,39,'E',28),(14,27,'D',27),(14,25,'Eb',26),(14,103,'G',25),(14,24,'E',24),(14,107,'G',23),(14,90,'A',22),(14,84,'D',21),(14,81,'G',20),(14,79,'C',19),(14,76,'C',18),(1,4,'C',2),(1,59,'G',1),(14,71,'C',17),(13,32,'A',42),(13,86,'C',41),(13,49,'C',40),(13,81,'G',39),(13,76,'C',38),(13,24,'E',37),(13,80,'G',36),(13,56,'C',35),(13,74,'G',34),(13,69,'C',33),(13,89,'C',32),(13,67,'C',31),(13,90,'A',30),(13,66,'D',29),(13,78,'D',28),(13,108,'D',27),(13,40,'G',26),(13,90,'A',25),(13,57,'F',24),(13,55,'G',23),(13,54,'C',22),(13,45,'G',21),(13,16,'D',20),(13,99,'E',19),(13,1,'G',18),(13,63,'G',17),(13,22,'D',16),(13,53,'C',15),(13,62,'D',14),(13,50,'D',13),(13,101,'G',12),(13,92,'A',11),(13,37,'D',10),(14,105,'G',16),(14,109,'C',15),(14,59,'G',14),(14,57,'F',13),(14,55,'G',12),(14,50,'D',11),(14,46,'E',10),(14,41,'G',9),(14,43,'E',8),(14,34,'G',7),(14,101,'G',6),(14,23,'G',5),(14,22,'D',4),(13,103,'G',9),(13,71,'C',8),(13,41,'G',7),(13,34,'G',6),(13,23,'G',5),(13,47,'C',4),(13,43,'E',3),(13,27,'D',2),(13,14,'A',1),(14,19,'A',3),(14,92,'A',2),(14,14,'A',1),(15,112,'D',5),(15,111,'E',4),(15,114,'G',3),(15,115,'C',2),(15,96,'Bb',1),(17,89,'C',34),(17,65,'G',33),(17,67,'C',32),(17,81,'G',31),(17,76,'G',30),(17,75,'G',29),(17,119,'G',28),(17,40,'G',27),(17,117,'C',26),(17,86,'D',25),(17,118,'D',24),(17,57,'F',23),(17,110,'G',22),(17,68,'Eb',21),(17,103,'G',20),(17,43,'E',19),(17,90,'A',18),(17,63,'G',17),(17,1,'G',16),(17,53,'C',15),(17,50,'D',14),(17,92,'A',13),(17,109,'C',12),(17,99,'E',11),(17,79,'E',10),(17,71,'A',9),(17,41,'G',8),(17,23,'G',7),(17,34,'G',6),(17,37,'D',5),(17,32,'E',4),(17,27,'D',3),(17,24,'E',2),(17,14,'A',1),(16,32,'A',42),(16,84,'D',41),(16,82,'D',40),(16,79,'C',39),(16,74,'G',38),(16,69,'C',37),(16,59,'G',36),(16,57,'F',35),(16,56,'C',34),(16,77,'C',33),(16,55,'G',32),(16,89,'C',31),(16,4,'C',30),(16,54,'C',29),(16,63,'G',28),(16,1,'G',27),(16,71,'C',26),(16,41,'G',25),(16,23,'G',24),(16,103,'G',23),(16,34,'G',22),(16,45,'G',21),(16,99,'E',20),(16,90,'A',19),(16,43,'E',18),(16,47,'C',17),(16,37,'D',16),(16,16,'D',15),(16,25,'C',14),(16,24,'E',13),(16,110,'G',12),(16,27,'D',11),(16,76,'C',10),(16,81,'G',9),(16,50,'D',8),(16,49,'C',7),(16,40,'G',6),(16,92,'A',5),(16,101,'G',4),(16,22,'D',3),(16,19,'A',2),(16,14,'A',1);
/*!40000 ALTER TABLE `SONGS_IN_SETS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-26 21:36:05
