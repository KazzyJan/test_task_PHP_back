-- MySQL dump 10.13  Distrib 8.0.41, for Linux (x86_64)
--
-- Host: localhost    Database: my_database
-- ------------------------------------------------------
-- Server version	8.0.41

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (3,'User 1','user1@example.com','+79160000001','2025-01-26 15:59:34'),(4,'User 2','user2@example.com','+79160000002','2025-01-26 15:59:34'),(5,'User 3','user3@example.com','+79160000003','2025-01-26 15:59:34'),(6,'User 4','user4@example.com','+79160000004','2025-01-26 15:59:34'),(7,'User 5','user5@example.com','+79160000005','2025-01-26 15:59:34'),(8,'User 6','user6@example.com','+79160000006','2025-01-26 15:59:34'),(9,'User 7','user7@example.com','+79160000007','2025-01-26 15:59:34'),(10,'User 8','user8@example.com','+79160000008','2025-01-26 15:59:34'),(11,'User 9','user9@example.com','+79160000009','2025-01-26 15:59:34'),(12,'User 10','user10@example.com','+79160000010','2025-01-26 15:59:34'),(13,'User 11','user11@example.com','+79160000011','2025-01-26 15:59:34'),(14,'User 12','user12@example.com','+79160000012','2025-01-26 15:59:34'),(15,'User 13','user13@example.com','+79160000013','2025-01-26 15:59:34'),(16,'User 14','user14@example.com','+79160000014','2025-01-26 15:59:34'),(17,'User 15','user15@example.com','+79160000015','2025-01-26 15:59:34'),(18,'User 16','user16@example.com','+79160000016','2025-01-26 15:59:34'),(19,'User 17','user17@example.com','+79160000017','2025-01-26 15:59:34'),(20,'User 18','user18@example.com','+79160000018','2025-01-26 15:59:34'),(21,'User 19','user19@example.com','+79160000019','2025-01-26 15:59:34'),(22,'User 20','user20@example.com','+79160000020','2025-01-26 15:59:34');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (20,3,100.50,'Order 1 for User 1','2025-01-26 16:04:12','user1@example.com','+79160000001','unpaid'),(21,3,150.75,'Order 2 for User 1','2025-01-26 16:04:12','user1@example.com','+79160000001','paid'),(22,3,200.00,'Order 3 for User 1','2025-01-26 16:04:12','user1@example.com','+79160000001','unpaid'),(23,3,130.20,'Order 4 for User 1','2025-01-26 16:04:12','user1@example.com','+79160000001','paid'),(24,3,220.10,'Order 5 for User 1','2025-01-26 16:04:12','user1@example.com','+79160000001','unpaid'),(25,4,110.60,'Order 1 for User 2','2025-01-26 16:04:12','user2@example.com','+79160000002','unpaid'),(26,4,160.80,'Order 2 for User 2','2025-01-26 16:04:12','user2@example.com','+79160000002','paid'),(27,4,210.90,'Order 3 for User 2','2025-01-26 16:04:12','user2@example.com','+79160000002','unpaid'),(28,4,120.40,'Order 4 for User 2','2025-01-26 16:04:12','user2@example.com','+79160000002','paid'),(29,4,230.00,'Order 5 for User 2','2025-01-26 16:04:12','user2@example.com','+79160000002','unpaid'),(30,5,105.25,'Order 1 for User 3','2025-01-26 16:04:12','user3@example.com','+79160000003','unpaid'),(31,5,155.50,'Order 2 for User 3','2025-01-26 16:04:12','user3@example.com','+79160000003','paid'),(32,5,205.75,'Order 3 for User 3','2025-01-26 16:04:12','user3@example.com','+79160000003','unpaid'),(33,5,135.90,'Order 4 for User 3','2025-01-26 16:04:12','user3@example.com','+79160000003','paid'),(34,5,215.30,'Order 5 for User 3','2025-01-26 16:04:12','user3@example.com','+79160000003','unpaid'),(35,6,115.00,'Order 1 for User 4','2025-01-26 16:04:12','user4@example.com','+79160000004','unpaid'),(36,6,165.40,'Order 2 for User 4','2025-01-26 16:04:12','user4@example.com','+79160000004','paid'),(37,6,215.60,'Order 3 for User 4','2025-01-26 16:04:12','user4@example.com','+79160000004','unpaid'),(38,6,125.30,'Order 4 for User 4','2025-01-26 16:04:12','user4@example.com','+79160000004','paid'),(39,6,225.80,'Order 5 for User 4','2025-01-26 16:04:12','user4@example.com','+79160000004','unpaid'),(40,7,120.10,'Order 1 for User 5','2025-01-26 16:04:12','user5@example.com','+79160000005','unpaid'),(41,7,170.90,'Order 2 for User 5','2025-01-26 16:04:12','user5@example.com','+79160000005','paid'),(42,7,220.30,'Order 3 for User 5','2025-01-26 16:04:12','user5@example.com','+79160000005','unpaid'),(43,7,130.50,'Order 4 for User 5','2025-01-26 16:04:12','user5@example.com','+79160000005','paid'),(44,7,225.60,'Order 5 for User 5','2025-01-26 16:04:12','user5@example.com','+79160000005','unpaid'),(45,18,105.00,'Order 1 for User 16','2025-01-26 16:13:06','user16@example.com','+79160000016','unpaid'),(46,18,150.00,'Order 2 for User 16','2025-01-26 16:13:06','user16@example.com','+79160000016','paid'),(47,18,190.00,'Order 3 for User 16','2025-01-26 16:13:06','user16@example.com','+79160000016','unpaid'),(48,18,120.00,'Order 4 for User 16','2025-01-26 16:13:06','user16@example.com','+79160000016','paid'),(49,18,200.00,'Order 5 for User 16','2025-01-26 16:13:06','user16@example.com','+79160000016','unpaid'),(50,19,110.00,'Order 1 for User 17','2025-01-26 16:13:06','user17@example.com','+79160000017','unpaid'),(51,19,155.00,'Order 2 for User 17','2025-01-26 16:13:06','user17@example.com','+79160000017','paid'),(52,19,205.00,'Order 3 for User 17','2025-01-26 16:13:06','user17@example.com','+79160000017','unpaid'),(53,19,130.00,'Order 4 for User 17','2025-01-26 16:13:06','user17@example.com','+79160000017','paid'),(54,19,215.00,'Order 5 for User 17','2025-01-26 16:13:06','user17@example.com','+79160000017','unpaid'),(55,20,100.00,'Order 1 for User 18','2025-01-26 16:13:06','user18@example.com','+79160000018','unpaid'),(56,20,145.00,'Order 2 for User 18','2025-01-26 16:13:06','user18@example.com','+79160000018','paid'),(57,20,195.00,'Order 3 for User 18','2025-01-26 16:13:06','user18@example.com','+79160000018','unpaid'),(58,20,125.00,'Order 4 for User 18','2025-01-26 16:13:06','user18@example.com','+79160000018','paid'),(59,20,210.00,'Order 5 for User 18','2025-01-26 16:13:06','user18@example.com','+79160000018','unpaid'),(60,21,115.00,'Order 1 for User 19','2025-01-26 16:13:06','user19@example.com','+79160000019','unpaid'),(61,21,160.00,'Order 2 for User 19','2025-01-26 16:13:06','user19@example.com','+79160000019','paid'),(62,21,210.00,'Order 3 for User 19','2025-01-26 16:13:06','user19@example.com','+79160000019','unpaid'),(63,21,130.00,'Order 4 for User 19','2025-01-26 16:13:06','user19@example.com','+79160000019','paid'),(64,21,220.00,'Order 5 for User 19','2025-01-26 16:13:06','user19@example.com','+79160000019','unpaid'),(65,22,125.00,'Order 1 for User 20','2025-01-26 16:13:06','user20@example.com','+79160000020','unpaid'),(66,22,170.00,'Order 2 for User 20','2025-01-26 16:13:06','user20@example.com','+79160000020','paid'),(67,22,220.00,'Order 3 for User 20','2025-01-26 16:13:06','user20@example.com','+79160000020','unpaid'),(68,22,140.00,'Order 4 for User 20','2025-01-26 16:13:06','user20@example.com','+79160000020','paid'),(69,22,225.00,'Order 5 for User 20','2025-01-26 16:13:06','user20@example.com','+79160000020','unpaid');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-26 16:17:30
