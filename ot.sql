-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ot
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.12.04.1

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_01_11_065035_create_users_table',1),('2014_01_11_140951_create_ots_table',2),('2014_01_13_120831_create_ots_table',3),('2014_01_13_121628_create_ots_table',4),('2014_01_14_121628_create_ots_table',5),('2014_01_14_150550_add_ampm_to_ots_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ots`
--

DROP TABLE IF EXISTS `ots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ots` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `beod` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eod` int(11) NOT NULL,
  `aeod` int(11) NOT NULL,
  `starttime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `endtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) unsigned NOT NULL,
  `ampm` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ots_user_id_foreign` (`user_id`),
  CONSTRAINT `ots_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ots`
--

LOCK TABLES `ots` WRITE;
/*!40000 ALTER TABLE `ots` DISABLE KEYS */;
INSERT INTO `ots` VALUES (1,'Ok',0,0,'2014-01-16 14:01:00','2014-01-15 22:35:00','2014-01-16 07:35:40','2014-01-16 07:35:40',1,NULL),(2,'Ok',0,0,'2014-01-16 14:01:00','2014-01-15 23:35:00','2014-01-16 07:38:15','2014-01-16 07:38:15',1,NULL),(3,'Ok',0,0,'2014-01-16 14:01:00','2014-01-15 23:19:00','2014-01-16 08:08:25','2014-01-16 08:08:25',1,NULL),(4,'Ok',0,0,'2014-01-16 14:13:00','2014-01-15 23:10:00','2014-01-16 08:10:04','2014-01-16 08:10:04',1,NULL),(5,'Ok',0,0,'2014-01-16 14:01:00','2014-01-15 21:28:00','2014-01-16 08:29:00','2014-01-16 08:29:00',1,NULL),(6,'Ok',0,0,'2014-01-16 14:01:00','2014-01-15 21:28:00','2014-01-16 08:29:03','2014-01-16 08:29:03',1,NULL),(7,'Ok',0,0,'2014-01-16 14:01:00','2014-01-15 23:50:00','2014-01-16 08:38:05','2014-01-16 08:38:05',1,NULL),(8,'Ok',0,0,'2014-01-18 14:01:00','2014-01-18 08:29:00','2014-01-18 17:29:16','2014-01-18 17:29:16',1,NULL),(9,'Ok',0,0,'2014-01-19 14:01:00','2014-01-19 09:27:00','2014-01-18 21:27:41','2014-01-18 21:27:41',1,NULL),(10,'Ok',0,0,'2014-01-16 14:01:00','2014-01-16 05:15:00','2014-01-16 14:15:55','2014-01-16 14:15:55',1,NULL),(11,'Ok',0,0,'2014-01-17 14:01:00','2014-01-17 01:15:00','2014-01-17 04:14:31','2014-01-17 04:14:31',1,NULL);
/*!40000 ALTER TABLE `ots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Tekeste','abel.adam6@gmail.com','$2y$10$v7d.6uV8RHUQPpaMMyjTi.KzqX495AemnG5j.U5yu5D4nY2Dk.7S.','2014-01-11 05:51:38','2014-01-11 05:51:38'),(2,'Abel Abadi','abel.abadi2@gmail.com','$2y$10$mtY2BWoCfg4mWLlWu1N.VuILxZSAyXT1qYfONdGgDQm6xqayh5fvS','2014-01-11 05:54:41','2014-01-11 05:54:41'),(3,'Abel Abadi','abel.abadi2@gmail.com','$2y$10$dGHUE3C.A969YM4FHTOsyu67orzlujfWEeNtnoAORxzuLkjORMT1G','2014-01-11 05:55:09','2014-01-11 05:55:09'),(4,'take','p@g.com','$2y$10$YxJ5Tuej3678z.aAWS0l7.vr4HmrOa1byeNp6d9FUzmD8mrQqK546','2014-01-11 10:50:42','2014-01-11 10:50:42'),(5,'mis','m@gmail.com','$2y$10$s4U5w3tYF3AYpx.XZn9cWeBrnlB2TTR/OmmTyNedA6J8s77ck0ni.','2014-01-13 09:22:50','2014-01-13 09:22:50');
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

-- Dump completed on 2014-01-22 13:53:13
