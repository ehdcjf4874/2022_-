-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: voice
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `fingerprint`
--

DROP TABLE IF EXISTS `fingerprint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fingerprint` (
  `X` int DEFAULT NULL,
  `Y` int DEFAULT NULL,
  `A8` float DEFAULT NULL,
  `B0` float DEFAULT NULL,
  `C8` float DEFAULT NULL,
  `08` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fingerprint`
--

LOCK TABLES `fingerprint` WRITE;
/*!40000 ALTER TABLE `fingerprint` DISABLE KEYS */;
INSERT INTO `fingerprint` VALUES (0,0,-61,-63,-61,-47),(1,0,-62,-64,-54,-51),(2,0,-62,-68,-50,-57),(3,0,-61,-70,-30,-59),(0,1,-60,-61,-63,-53),(1,1,-60,-61,-55,-54),(2,1,-61,-62,-53,-58),(3,1,-60,-63,-50,-60),(0,2,-59,-59,-64,-58),(1,2,-59,-59,-58,-59),(2,2,-59,-61,-56,-59),(3,2,-58,-62,-55,-61),(0,3,-58,-56,-64,-60),(1,3,-56,-55,-63,-61),(2,3,-57,-58,-63,-62),(3,3,-55,-57,-61,-62),(0,4,-58,-52,-65,-63),(1,4,-51,-53,-65,-63),(2,4,-49,-54,-64,-65),(3,4,-48,-56,-63,-66),(0,5,-57,-49,-66,-66),(1,5,-51,-50,-66,-66),(2,5,-46,-53,-67,-66),(3,5,-47,-54,-68,-67),(0,6,-57,-38,-69,-68),(1,6,-50,-47,-70,-69),(2,6,-45,-52,-69,-69),(3,6,-38,-51,-70,-70);
/*!40000 ALTER TABLE `fingerprint` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-11  2:11:26
