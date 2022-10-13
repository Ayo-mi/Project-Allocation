-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: project_allocation
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(95) NOT NULL,
  `userID` varchar(15) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userID_UNIQUE` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Admin','admin','2022-05-05 13:30:12',NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `custom_projects`
--

DROP TABLE IF EXISTS `custom_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `custom_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_id` varchar(45) NOT NULL,
  `grp_id` varchar(45) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `descr` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  `stud_id` varchar(45) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`custom_id`),
  KEY `std_idx` (`stud_id`),
  CONSTRAINT `std` FOREIGN KEY (`stud_id`) REFERENCES `students` (`matric_number`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `custom_projects`
--

LOCK TABLES `custom_projects` WRITE;
/*!40000 ALTER TABLE `custom_projects` DISABLE KEYS */;
INSERT INTO `custom_projects` VALUES (1,'CUS_1_1653205771','CUS_GRP_1653205771','Point of sales software','<p>To manage stock inventory of stores</p>',1,'111','2022-05-22 07:49:30',NULL),(2,'CUS_2_1653205771','CUS_GRP_1653205771','Design and Implementation of a Barcode Security System','<p>For signing in and out of an organization</p>',0,'111','2022-05-22 07:49:30',NULL),(3,'CUS_3_1653205771','CUS_GRP_1653205771','Text to Speech Software','<p>Convert text to an audio speech</p>',0,'111','2022-05-22 07:49:30',NULL);
/*!40000 ALTER TABLE `custom_projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_details`
--

DROP TABLE IF EXISTS `login_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(15) NOT NULL,
  `password` varchar(155) NOT NULL,
  `acct_type` tinyint(4) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId_UNIQUE` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_details`
--

LOCK TABLES `login_details` WRITE;
/*!40000 ALTER TABLE `login_details` DISABLE KEYS */;
INSERT INTO `login_details` VALUES (1,'admin','$2y$10$9IkgdAw.4Qx9enGW0t7Ysehqt6oxj7u0FhLZrvvRxzOEaEMjkwdiC',1,'2022-05-04 23:50:15',NULL),(2,'111','$2y$10$udtiBjbBezIuxDbgzlkGA.BvIKlWPUbtcDQ9O098FPC5brpSIIwwi',2,'2022-05-05 12:36:20','2022-05-06 15:34:46'),(4,'123','$2y$10$UOdp63PWkf3gLuRhdZkUC.X92NFxQ.TLpagPZBgKlGIW5XmC9Q1hW',2,'2022-05-28 16:04:40',NULL),(5,'333','$2y$10$vkWcqMk2tqvxdRuJa4sccOr4FyOLK/02GHnWTb1SGVK2MBqIECNMa',3,'2022-05-28 16:08:32',NULL);
/*!40000 ALTER TABLE `login_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proj_id` varchar(45) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `descr` mediumtext NOT NULL,
  `dept` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `level` varchar(10) NOT NULL,
  `stud_id` varchar(45) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `proj_id_UNIQUE` (`proj_id`),
  UNIQUE KEY `Topic_UNIQUE` (`topic`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'1651766910','Design and Implementation of Project Allocation System to avoid duplication','                               <span style=\"font-family: Verdana;\">Design and Implementation of Project Allocation System to avoid duplication is to manage student project to avoid more than one student having the same project topic</span>                               \r\n                                                        ','Computer Science',0,'High','','2022-05-05 16:08:29','2022-06-02 15:24:41'),(2,'1652004681','Design and Implementation of a Barcode Security System','Design and Implementation of a Barcode Security System is a system use to login and out of an organization to monitor the movement of staff in an organization','Computer Science',0,'Low','','2022-05-08 10:11:20','2022-07-17 10:58:57'),(3,'1652004840','Design and Implementation of an online quiz examination','Design and Implementation of an online quiz examination allow schools to take examination to the digital by allowing student to take their examination in a computer based environment.','Computer Science',0,'Medium',NULL,'2022-05-08 10:14:00',NULL),(4,'1652004937','Design and Implementation of a Battery based kettle','                               Design and Implementation of a Battery based kettle allows you to boil water without electricity and these is possible with cause of the built-in battery                            ','Computer Science',0,'Medium',NULL,'2022-05-08 10:15:37','2022-06-04 16:29:08');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `matric_number` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `dept` varchar(45) DEFAULT NULL,
  `img` varchar(155) DEFAULT NULL,
  `address` varchar(115) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `sup_id` varchar(15) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`matric_number`),
  UNIQUE KEY `matric_number_UNIQUE` (`matric_number`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'James','Hart','111','teststudent@pa.com','Computer Science','//localhost/projectallocation/student/uploads/111_1651853514.jpeg','','Rivers','Nigeria','','2022-05-05 12:36:20','2022-07-17 11:32:02'),(2,'Yemi','Samuel','123','testing@email.com','Computer Science',NULL,'','Ondo','Nigeria','333','2022-05-28 16:04:40','2022-05-28 16:21:11');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supervisors`
--

DROP TABLE IF EXISTS `supervisors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supervisors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(55) DEFAULT NULL,
  `last_name` varchar(55) DEFAULT NULL,
  `user_id` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `dept` varchar(45) DEFAULT NULL,
  `img` varchar(155) DEFAULT NULL,
  `address` varchar(115) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supervisors`
--

LOCK TABLES `supervisors` WRITE;
/*!40000 ALTER TABLE `supervisors` DISABLE KEYS */;
INSERT INTO `supervisors` VALUES (3,'Lambert','October','333','suypervisor@acct.com','Computer Science',NULL,'','Bayelsa','Nigeria','2022-05-28 16:08:31','2022-05-28 16:09:36');
/*!40000 ALTER TABLE `supervisors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tic_id` varchar(45) NOT NULL,
  `subject` varchar(65) NOT NULL,
  `msg` mediumtext NOT NULL,
  `reply` mediumtext,
  `status` tinyint(4) DEFAULT NULL,
  `stud_id` varchar(15) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,'TIC_1651927743','I want to change my Project Topic','<p>Good day sir/ma</p><p>I want to change my project topic titled:&nbsp;Design and Implementation of Project Allocation System to avoid duplication with id:&nbsp;1651766910.</p><p>My reasons for this is because its too hard and it cost a fortune to make it possible.</p><p>Thank you in advance :)</p>',NULL,0,'111','2022-05-07 12:49:02','2022-05-07 13:56:39'),(2,'TIC_1651927924','I want to change my Project Topic','<p>Good day sir/ma</p><p>I want to change my project topic titled:&nbsp;Design and Implementation of Project Allocation System to avoid duplication with id:&nbsp;1651766910.</p><p>My reasons for this is because its too hard and it cost a fortune to make it possible.</p><p>Thank you in advance :)</p>','<p>You\'re a lazy student! I won\'t approve your request don\'t you know that great things don\'t come easy<br></p>',2,'111','2022-05-07 12:52:03','2022-05-28 16:19:49'),(3,'TIC_1651927999','I want to change my Project Topic','<p>Good day sir/ma</p><p>I want to change my project topic titled:&nbsp;Design and Implementation of Project Allocation System to avoid duplication with id:&nbsp;1651766910.</p><p>My reasons for this is because its too hard and it cost a fortune to make it possible.</p><p>Thank you in advance :)</p>',NULL,0,'111','2022-05-07 12:53:18','2022-05-07 13:56:39');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-17 17:15:17
