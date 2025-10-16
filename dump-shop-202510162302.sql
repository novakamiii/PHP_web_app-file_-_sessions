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
  `frame_size` varchar(255) DEFAULT NULL,
  `dateadded` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
(1,'Bonnie',90.00,'vision',500,'Sleek and lightweight eyeglasses designed for lasting comfort and clear vision. Ideal for daily wear with a minimalist yet modern frame style.','bonnie','2025-10-14 01:18:55'),
(2,'Clyde',80.00,'vision',321,'Classic square-frame glasses combining clarity and durability for everyday use. A reliable choice for professional and casual looks alike.','clyde','2025-10-14 01:19:47'),
(3,'Clyden',79.00,'vision',231,'A refined eyewear piece blending simplicity and elegance, offering sharp vision and a timeless appeal.','clyden','2025-10-14 01:20:32'),
(4,'korange',67.00,'vision',273,'Vibrant and youthful glasses with a bold edge. Perfect for those who want to stand out while maintaining crystal-clear vision.','korange','2025-10-14 01:21:09'),
(5,'one',79.00,'vision',122,'Streamlined optical frames built for functionality and comfort, making them your go-to pair for daily routines.','one','2025-10-14 01:21:57'),
(6,'masahiro',59.00,'vision',90,'Japanese-inspired minimalist eyewear that emphasizes precision, balance, and lightweight comfort.','masahiro','2025-10-14 01:22:22'),
(7,'Aria',68.00,'vision',122,'Elegant vision correction glasses designed for everyday comfort and style. Features premium materials and precision craftsmanship for optimal clarity.','aria','2025-10-14 01:32:37'),
(8,'Cappture',95.00,'protection',331,'Advanced blue light protection glasses that reduce digital eye strain during long hours of screen use.','cappture','2025-10-14 01:50:05'),
(9,'G-FLY',105.00,'protection',22,'Sports-grade protective eyewear built to withstand active lifestyles while providing reliable eye safety.','g-fly','2025-10-14 01:50:41'),
(10,'Copper',130.00,'protection',130,'Durable anti-glare safety glasses offering both UV and impact protection—ideal for work or outdoor environments.','copper','2025-10-14 01:53:44'),
(11,'Aspalt',90.00,'protection',23,'Heavy-duty protective eyewear crafted for performance and resilience in industrial or outdoor conditions.','aspalt','2025-10-14 01:53:44'),
(12,'Moto',90.00,'protection',151,'Motorcycle-inspired protective glasses that combine rugged design with excellent wind and dust resistance.','moto','2025-10-14 01:53:44'),
(13,'Vission',90.00,'protection',500,'All-purpose protective eyewear ensuring maximum visibility and comfort in both indoor and outdoor conditions.','vission','2025-10-14 01:53:44'),
(14,'Sojos',179.00,'sunglasses',122,'Trendy, high-contrast sunglasses with UV400 protection and fashion-forward lens tint.','sojos','2025-10-14 01:57:18'),
(15,'Berlin',199.00,'sunglasses',100,'European-inspired premium sunglasses that merge contemporary design with urban sophistication.','berlin','2025-10-14 01:57:18'),
(16,'Seine',299.00,'sunglasses',199,'Parisian chic sunglasses offering elegance, UV protection, and refined craftsmanship for sunny days.','seine','2025-10-14 01:57:18'),
(17,'Barbara',399.00,'sunglasses',10,'Luxurious designer sunglasses that exude confidence with bold frames and timeless appeal.','barbara','2025-10-14 01:57:18'),
(18,'Jess',389.00,'sunglasses',143,'Lightweight yet stylish sunglasses for a modern aesthetic—perfect for travel and leisure.','jess','2025-10-14 01:57:18'),
(19,'Liv',599.00,'sunglasses',222,'High-end polarized sunglasses designed to deliver crystal-clear outdoor vision with a luxury finish.','liv','2025-10-14 01:57:18'),
(20,'Jean Paula',899.00,'fashion',10,'Haute couture eyewear piece that embodies exclusivity and sophistication, crafted for bold personalities.','jeanpaula','2025-10-14 01:58:09'),
(21,'Flora',980.00,'fashion',299,'Graceful fashion glasses with floral-inspired design elements and refined detailing for an elegant touch.','flora','2025-10-14 02:00:36'),
(22,'Monster',689.00,'fashion',60,'Edgy designer eyewear that pushes boundaries with avant-garde styling and oversized frames.','monster','2025-10-14 02:00:36'),
(23,'Riri',989.00,'fashion',11,'Glamorous and bold sunglasses with celebrity-inspired flair, perfect for turning heads anywhere.','riri','2025-10-14 02:00:36'),
(24,'Bling',659.00,'fashion',9,'Sparkling designer eyewear featuring subtle crystal accents and a luxe polished finish.','bling','2025-10-14 02:00:36'),
(25,'Audrey',675.00,'fashion',67,'Classic Hollywood-inspired frames that capture timeless elegance and effortless charm.','audrey','2025-10-14 02:00:36'),
(26,'Pucci',579.00,'fashion',69,'Contemporary fashion eyewear infused with Italian artistry and a vibrant, playful design.','pucci','2025-10-14 02:00:36');
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

-- Dump completed on 2025-10-16 23:02:11
