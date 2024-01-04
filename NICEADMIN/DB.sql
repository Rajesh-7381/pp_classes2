CREATE DATABASE  IF NOT EXISTS `pp_classes` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pp_classes`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: pp_classes
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `about` text,
  `company` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `profileimage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'John Doe','Lorem ipsum dolor sit amet, consectetur adipiscing elit.','ABC Company','Developer','123 Main St, City','123-456-7890','john@example.com','profile.jpg');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_pass`
--

DROP TABLE IF EXISTS `admin_pass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_pass` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_pass`
--

LOCK TABLES `admin_pass` WRITE;
/*!40000 ALTER TABLE `admin_pass` DISABLE KEYS */;
INSERT INTO `admin_pass` VALUES (1,'admin1@gmail.com','123456'),(2,'admin@gmail.com','123456'),(3,'admin3@gmail.com','123456');
/*!40000 ALTER TABLE `admin_pass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `all_pages`
--

DROP TABLE IF EXISTS `all_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `all_pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `regular` text,
  `shortterm` text,
  `crash` text,
  `contact` varchar(100) DEFAULT NULL,
  `contactus_description` text,
  `course_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `all_pages`
--

LOCK TABLES `all_pages` WRITE;
/*!40000 ALTER TABLE `all_pages` DISABLE KEYS */;
INSERT INTO `all_pages` VALUES (1,'Regular course content','Short-term course content','Crash course content','Contact information','Description for contact us',NULL),(2,'Regular course content','Short-term course content','Crash course content','Contact information','Description for contact us','regular'),(3,'Regular course content','Short-term course content','Crash course content','Contact information','Description for contact us','shortterm'),(4,'Regular course content','Short-term course content','Crash course content','Contact information','Description for contact us','crash');
/*!40000 ALTER TABLE `all_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `altphone` varchar(20) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'John Doe','john@example.com','1234567890','9876543210','This is a sample message.'),(2,'Alice Smith','alice@example.com','1112223333','9998887777','Another message here.'),(3,'Bob Johnson','bob@example.com','4445556666',NULL,'One more message for testing.');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `course_id` int NOT NULL AUTO_INCREMENT,
  `course_type` varchar(50) DEFAULT NULL,
  `board` varchar(50) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL,
  `program` varchar(100) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `status` int DEFAULT '0',
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'regular','CBSE','Grade 10','Science','1 year',0),(2,'shortterm','State Board','Grade 12','Mathematics','6 months',0),(3,'crash course','ICSE','Grade 8','English','3 months',0);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `header_footer`
--

DROP TABLE IF EXISTS `header_footer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `header_footer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `home` varchar(100) DEFAULT NULL,
  `register` varchar(100) DEFAULT NULL,
  `explore` varchar(100) DEFAULT NULL,
  `regular` varchar(100) DEFAULT NULL,
  `shortterm` varchar(100) DEFAULT NULL,
  `crash` varchar(100) DEFAULT NULL,
  `resource` varchar(100) DEFAULT NULL,
  `galleryname` varchar(100) DEFAULT NULL,
  `contactus` varchar(100) DEFAULT NULL,
  `aboutus_Head` varchar(100) DEFAULT NULL,
  `Alumni_Speaks` varchar(100) DEFAULT NULL,
  `Company_Header` varchar(100) DEFAULT NULL,
  `Service_Header` varchar(100) DEFAULT NULL,
  `Reach_Us_At` varchar(100) DEFAULT NULL,
  `copyright` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `header_footer`
--

LOCK TABLES `header_footer` WRITE;
/*!40000 ALTER TABLE `header_footer` DISABLE KEYS */;
INSERT INTO `header_footer` VALUES (1,'Home','Register','Explore','Regular','Short-term','Crash','Resource','Gallery Name','Contact Us','About Us','Alumni Speaks','Company Header','Service Header','Reach Us At','Copyright','Address','Phone','Email');
/*!40000 ALTER TABLE `header_footer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home`
--

DROP TABLE IF EXISTS `home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home` (
  `id` int NOT NULL AUTO_INCREMENT,
  `our_learnershead` varchar(100) DEFAULT NULL,
  `our_learners` text,
  `time_managementhead` varchar(100) DEFAULT NULL,
  `time_management` text,
  `for_learnershead` varchar(100) DEFAULT NULL,
  `for_learners` text,
  `image` varchar(255) DEFAULT NULL,
  `introductionhead` varchar(100) DEFAULT NULL,
  `introduction` text,
  `achievementhead` varchar(100) DEFAULT NULL,
  `achievement` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home`
--

LOCK TABLES `home` WRITE;
/*!40000 ALTER TABLE `home` DISABLE KEYS */;
INSERT INTO `home` VALUES (1,'Our Learners Head','Our Learners Content','Time Management Head','Time Management Content','For Learners Head','For Learners Content','image.jpg','Introduction Head','Introduction Content','Achievement Head','Achievement Content');
/*!40000 ALTER TABLE `home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagechangess`
--

DROP TABLE IF EXISTS `imagechangess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagechangess` (
  `id` int NOT NULL AUTO_INCREMENT,
  `slider_image` varchar(255) DEFAULT NULL,
  `slider_image_heading` varchar(100) DEFAULT NULL,
  `slider_image_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagechangess`
--

LOCK TABLES `imagechangess` WRITE;
/*!40000 ALTER TABLE `imagechangess` DISABLE KEYS */;
INSERT INTO `imagechangess` VALUES (1,'slider1.jpg','Slider 1 Heading','Description for Slider 1');
/*!40000 ALTER TABLE `imagechangess` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `register` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fatherName` varchar(100) DEFAULT NULL,
  `fathernumber` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text,
  `standard` varchar(50) DEFAULT NULL,
  `schoolname` varchar(100) DEFAULT NULL,
  `Board` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `submission_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `register`
--

LOCK TABLES `register` WRITE;
/*!40000 ALTER TABLE `register` DISABLE KEYS */;
INSERT INTO `register` VALUES (1,'John Doe','1234567890','Tom Doe','9876543210','johndoe@example.com','123 Main St, City','10th','ABC School','State Board','Male','2023-12-15 15:42:09');
/*!40000 ALTER TABLE `register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registerpage`
--

DROP TABLE IF EXISTS `registerpage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registerpage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `studentregistration` text,
  `our_tutorialHead` varchar(100) DEFAULT NULL,
  `our_tutorial` text,
  `our_tutorial_image` varchar(100) DEFAULT NULL,
  `our_missionhead` varchar(100) DEFAULT NULL,
  `our_mission` text,
  `our_vissionhead` varchar(100) DEFAULT NULL,
  `our_vission` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registerpage`
--

LOCK TABLES `registerpage` WRITE;
/*!40000 ALTER TABLE `registerpage` DISABLE KEYS */;
INSERT INTO `registerpage` VALUES (1,'Student Registration Information','Our Tutorial Headline','Details about our tutorial...','tutorial_image.jpg','Our Mission Headline','Details about our mission...','Our Vision Headline','Details about our vision...');
/*!40000 ALTER TABLE `registerpage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resource_gallery_img`
--

DROP TABLE IF EXISTS `resource_gallery_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resource_gallery_img` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_type` varchar(50) DEFAULT NULL,
  `image_source` varchar(100) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource_gallery_img`
--

LOCK TABLES `resource_gallery_img` WRITE;
/*!40000 ALTER TABLE `resource_gallery_img` DISABLE KEYS */;
INSERT INTO `resource_gallery_img` VALUES (1,'Type A','image1.jpg','Description for image 1'),(2,'Type B','image2.jpg','Description for image 2'),(3,'Type C','image3.jpg','Description for image 3');
/*!40000 ALTER TABLE `resource_gallery_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonial`
--

DROP TABLE IF EXISTS `testimonial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonial` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `passing_year` int DEFAULT NULL,
  `present_status` varchar(100) DEFAULT NULL,
  `working_place` varchar(100) DEFAULT NULL,
  `memorable_event` text,
  `status` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonial`
--

LOCK TABLES `testimonial` WRITE;
/*!40000 ALTER TABLE `testimonial` DISABLE KEYS */;
INSERT INTO `testimonial` VALUES (1,'John Doe','1234567890','john@example.com',2022,'Working at ABC Corp','XYZ Corporation','Memorable event description',1),(2,'Jane Smith','9876543210','jane@example.com',2021,'Freelancer','Freelance','Another memorable event description',1),(3,'Alex Johnson','5555555555','alex@example.com',2020,'Retired','Retirement','Yet another memorable event description',0);
/*!40000 ALTER TABLE `testimonial` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-15 21:13:39
