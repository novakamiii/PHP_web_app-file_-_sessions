/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.0.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: shop
-- ------------------------------------------------------
-- Server version	12.0.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `dateadded` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `description` blob DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `products` VALUES
(1,'Bonnie',90.00,'vision',500,NULL,'bonnie','2025-10-14 01:18:55'),
(2,'Clyde',80.00,'vision',321,NULL,'clyde','2025-10-14 01:19:47'),
(3,'Clyden',79.00,'vision',231,NULL,'clyden','2025-10-14 01:20:32'),
(4,'korange',67.00,'vision',273,NULL,'korange','2025-10-14 01:21:09'),
(5,'one',79.00,'vision',122,NULL,'one','2025-10-14 01:21:57'),
(6,'masahiro',59.00,'vision',90,NULL,'masahiro','2025-10-14 01:22:22'),
(7,'Aria',68.00,'vision',122,NULL,'aria','2025-10-14 01:32:37'),
(8,'Cappture',95.00,'protection',331,NULL,'cappture','2025-10-14 01:50:05'),
(9,'G-fly',105.00,'protection',22,NULL,'g-fly','2025-10-14 01:50:41'),
(10,'Copper',130.00,'protection',130,NULL,'copper','2025-10-14 01:53:44'),
(11,'Aspalt',90.00,'protection',23,NULL,'aspalt','2025-10-14 01:53:44'),
(12,'Moto',90.00,'protection',151,NULL,'moto','2025-10-14 01:53:44'),
(13,'Vission',90.00,'protection',500,NULL,'vission','2025-10-14 01:53:44'),
(14,'Sojos',179.00,'sunglasses',122,NULL,'sojos','2025-10-14 01:57:18'),
(15,'Berlin',199.00,'sunglasses',100,NULL,'berlin','2025-10-14 01:57:18'),
(16,'Seine',299.00,'sunglasses',199,NULL,'seine','2025-10-14 01:57:18'),
(17,'Barbara',399.00,'sunglasses',10,NULL,'barbara','2025-10-14 01:57:18'),
(18,'Jess',389.00,'sunglasses',143,NULL,'jess','2025-10-14 01:57:18'),
(19,'Liv',599.00,'sunglasses',222,NULL,'liv','2025-10-14 01:57:18'),
(20,'Jean Paula',899.00,'fashion',10,NULL,'jeanpaula','2025-10-14 01:58:09'),
(21,'Flora',980.00,'fashion',299,NULL,'flora','2025-10-14 02:00:36'),
(22,'Monster',689.00,'fashion',60,NULL,'monster','2025-10-14 02:00:36'),
(23,'Riri',989.00,'fashion',11,NULL,'riri','2025-10-14 02:00:36'),
(24,'Bling',659.00,'fashion',9,NULL,'bling','2025-10-14 02:00:36'),
(25,'Audrey',675.00,'fashion',67,NULL,'audrey','2025-10-14 02:00:36'),
(26,'Pucci',579.00,'fashion',69,NULL,'pucci','2025-10-14 02:00:36');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_session` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Dumping routines for database 'shop'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2025-10-14  3:37:50
