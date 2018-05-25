-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: homestead
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `almacenes`
--

DROP TABLE IF EXISTS `almacenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `almacenes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descricion` text COLLATE utf8mb4_unicode_ci,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `almacenes_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `almacenes_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `almacenes`
--

LOCK TABLES `almacenes` WRITE;
/*!40000 ALTER TABLE `almacenes` DISABLE KEYS */;
INSERT INTO `almacenes` VALUES (1,'Aletha Hauck','2188 Bogisich Club Suite 720\nCorwinfort, DE 36099-7596','Illum nihil sed ea modi aut. Incidunt ut iste incidunt quia eaque. Nihil autem natus rerum repellendus ipsum.',2,1),(2,'Daron Deckow','983 Maryjane Union Suite 403\nSchustertown, VT 13817','Beatae cum cum ut nam voluptatem ut voluptatibus. Quia voluptatem sit animi. Sit neque impedit necessitatibus pariatur quisquam blanditiis.',10,1),(3,'Miss Stella Maggio PhD','32757 Elfrieda Meadows\nDeanchester, CT 84777','Possimus voluptate veniam velit qui assumenda. Porro amet voluptatem dolor voluptatibus. Nihil in esse vel magnam accusamus odit.',4,1),(4,'Mrs. Sharon Will','75583 Feeney Lake\nAufderharfurt, NV 55645','Ut repellendus autem dolorem aut sunt sed aut. Quis in natus nesciunt accusamus et nostrum. Labore perspiciatis molestiae earum provident. Ea consequatur adipisci dolor autem.',1,1),(5,'Dr. Dahlia Hartmann DVM','71618 Elda Pike\nWalterfurt, MA 57836','Consequatur provident aut dolores aliquam voluptatem iure. Enim et impedit at asperiores enim. Et maxime eaque placeat voluptas. Quas expedita occaecati consequatur et rem.',6,1),(6,'Keven Harber I','838 Breitenberg Falls\nRusselburgh, MA 91328-7883','Saepe quo sed dolorem quas modi aut quia. Natus debitis ut perspiciatis rem.',9,0),(7,'Amely Nader','24126 Deckow Drive\nArnochester, NJ 99908','Veniam qui nisi quia laudantium. Asperiores inventore ut omnis aut voluptatibus voluptatem ea.',9,0),(8,'Kamren Rutherford','791 Cronin Mountain Apt. 417\nEast Dana, IL 58396-8803','Suscipit vitae a assumenda vel a quia. Consequatur nostrum qui culpa autem et reprehenderit quia. Officia minima nihil dolores debitis nobis repudiandae at. Dolores velit neque maxime quia fugiat.',9,1),(9,'Granville Kovacek','76375 Boehm Fall Apt. 928\nDoylemouth, CT 80304-4161','Veritatis quos eveniet aut molestias a molestias. Laborum optio est ut veritatis. Molestias sunt magni cupiditate dicta. Et animi cum nihil optio dolor vero exercitationem.',10,0),(10,'Dr. Jerrold Walker','569 Lamont Row Apt. 566\nWest Rickeymouth, NY 37195-6029','Aspernatur in voluptatem quos accusamus voluptatem. Quod omnis aut error blanditiis voluptas vitae dolorem. Neque est aut quod id. Tempore molestias a unde neque.',3,0),(11,'Jeanette Sawayn','63930 Tania Canyon\nEast Katarina, NJ 75085-3000','Accusantium voluptate vero eius aut ratione nesciunt. Perspiciatis nemo natus quam aperiam incidunt vel aut. Officiis est ut repellendus.',8,1),(12,'Mrs. Naomie Halvorson II','89803 Morar Dale Suite 990\nNorth Louberg, CO 08285-2999','Voluptatum qui quod incidunt natus aut ut. Ut et ut sit in exercitationem. Hic aut cupiditate delectus enim enim impedit. Provident ipsa modi soluta dolor iure blanditiis.',8,0),(13,'Lonnie Toy','711 Corkery Mall\nWest Verona, UT 92134-1243','Dolorem maiores non facilis labore laborum soluta. Voluptatem minima voluptatum incidunt accusantium velit soluta. Voluptas porro et ex facere quibusdam sunt.',1,0),(14,'Leda Murazik','131 Torp Mount Suite 149\nWest Montyberg, ND 96054','Non deleniti ducimus et ducimus ipsam pariatur. Sed velit ut aut. Corrupti saepe accusamus libero voluptates autem qui aut et. Ea in expedita voluptatem consequatur omnis aut sit non.',10,0),(15,'Ms. Melyssa Schamberger','10985 Domenico Points Apt. 890\nPort Maritza, AZ 20294-3491','Quisquam ea ut doloribus. Voluptas accusantium natus quisquam doloremque perferendis numquam non. Sit modi vel autem quasi et error. Corrupti vel facere sapiente aliquid.',7,1),(16,'Terrance Johns','9380 Willa Spring Suite 028\nHettingerview, SC 26964-7901','Sed veniam nobis earum rerum. Quos unde vel eius. Harum non natus facere sit blanditiis illo vitae natus.',8,0),(17,'Dr. Onie Koepp V','583 Lueilwitz Vista\nWest Graciela, CA 15046','Eum quisquam temporibus modi quas et aut. Exercitationem similique deleniti ut et assumenda mollitia aut. Ab ipsum earum amet ipsam veritatis consequatur.',4,1),(18,'Lonie Kunde','27531 Amanda Ville\nToyberg, RI 40557','Tenetur rem et architecto minima. Omnis dolorem rerum temporibus amet. Quia a voluptatem veniam reiciendis non. Voluptatem voluptatibus recusandae vel cum laudantium rerum.',9,1),(19,'Dr. Shirley O\'Reilly','10290 Hackett Avenue Suite 780\nRathfort, AR 75564-0495','Voluptate fuga repudiandae voluptatem voluptatem. Dolorum ea velit nemo aut est velit ducimus. Inventore iste voluptatem ipsam quis. Quas provident vitae quidem non.',4,0),(20,'Mr. Ignacio Reichert','849 Amalia Lakes\nMitchellburgh, MS 04109','Quos et consequatur molestias aliquam. Rerum optio hic minus voluptate. Delectus distinctio illo est. Fugiat quidem sed qui. Sit debitis libero odio tempore fugiat magni.',9,1);
/*!40000 ALTER TABLE `almacenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cajas`
--

DROP TABLE IF EXISTS `cajas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cajas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Monto` double(8,2) NOT NULL,
  `Fecha` date NOT NULL,
  `idUsuario_sistema` int(10) unsigned NOT NULL,
  `idPaciente` int(10) unsigned NOT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `cajas_idusuario_sistema_foreign` (`idUsuario_sistema`),
  KEY `cajas_idpaciente_foreign` (`idPaciente`),
  KEY `cajas_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `cajas_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`),
  CONSTRAINT `cajas_idpaciente_foreign` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`id`),
  CONSTRAINT `cajas_idusuario_sistema_foreign` FOREIGN KEY (`idUsuario_sistema`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cajas`
--

LOCK TABLES `cajas` WRITE;
/*!40000 ALTER TABLE `cajas` DISABLE KEYS */;
INSERT INTO `cajas` VALUES (1,6251.00,'2018-05-09',35,45,5,0),(2,8195.00,'2018-05-09',9,27,9,2),(3,7628.00,'2018-05-09',36,19,9,0),(4,4822.00,'2018-05-09',12,23,3,3),(5,7361.00,'2018-05-09',26,18,9,2),(6,4087.00,'2018-05-09',9,36,4,2),(7,7086.00,'2018-05-09',47,47,4,0),(8,9666.00,'2018-05-09',4,38,4,1),(9,4860.00,'2018-05-09',45,36,8,2),(10,8239.00,'2018-05-09',15,32,10,3),(11,6747.00,'2018-05-09',37,14,3,0),(12,8027.00,'2018-05-09',23,49,4,2),(13,9601.00,'2018-05-09',40,11,8,3),(14,8826.00,'2018-05-09',40,38,6,0),(15,5874.00,'2018-05-09',10,44,4,0),(16,4555.00,'2018-05-09',27,30,8,0),(17,9612.00,'2018-05-09',46,14,2,2),(18,6029.00,'2018-05-09',14,5,4,2),(19,5094.00,'2018-05-09',6,33,3,2),(20,5906.00,'2018-05-09',42,22,3,3),(21,5108.00,'2018-05-09',42,40,4,3),(22,5747.00,'2018-05-09',45,17,8,0),(23,7985.00,'2018-05-09',22,1,7,3),(24,9440.00,'2018-05-09',50,48,1,3),(25,7513.00,'2018-05-09',46,9,6,1),(26,7331.00,'2018-05-09',33,21,9,2),(27,6784.00,'2018-05-09',8,25,4,1),(28,7216.00,'2018-05-09',34,3,4,1),(29,7640.00,'2018-05-09',5,24,7,1),(30,4835.00,'2018-05-09',41,28,2,0),(31,4720.00,'2018-05-09',14,13,2,0),(32,9223.00,'2018-05-09',30,32,6,0),(33,4160.00,'2018-05-09',3,2,1,1),(34,4736.00,'2018-05-09',28,13,7,1),(35,9487.00,'2018-05-09',25,9,2,3),(36,9779.00,'2018-05-09',7,12,6,1),(37,7428.00,'2018-05-09',35,34,7,2),(38,4204.00,'2018-05-09',4,25,4,0),(39,8653.00,'2018-05-09',48,15,9,1),(40,6412.00,'2018-05-09',5,32,4,0);
/*!40000 ALTER TABLE `cajas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `camas_x_piso`
--

DROP TABLE IF EXISTS `camas_x_piso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `camas_x_piso` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Piso` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Seccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ocupado` int(11) NOT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `camas_x_piso_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `camas_x_piso_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `camas_x_piso`
--

LOCK TABLES `camas_x_piso` WRITE;
/*!40000 ALTER TABLE `camas_x_piso` DISABLE KEYS */;
/*!40000 ALTER TABLE `camas_x_piso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centro_medico`
--

DROP TABLE IF EXISTS `centro_medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centro_medico` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Direccion` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tipo_centro_medico` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centro_medico`
--

LOCK TABLES `centro_medico` WRITE;
/*!40000 ALTER TABLE `centro_medico` DISABLE KEYS */;
INSERT INTO `centro_medico` VALUES (1,'Klocko','South Dakota','Hospital',2),(2,'Murazik','Louisiana','Hospital',2),(3,'Mueller','Minnesota','Hospital',2),(4,'Nienow','Idaho','Clinica',2),(5,'Ullrich','Vermont','Clinica',2),(6,'Kihn','Nevada','Hospital',2),(7,'Donnelly','Rhode Island','Hospital',2),(8,'Tillman','Pennsylvania','Hospital',2),(9,'Gulgowski','Georgia','Consultorio',2),(10,'Schoen','Alabama','Clinica',2);
/*!40000 ALTER TABLE `centro_medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cirugias`
--

DROP TABLE IF EXISTS `cirugias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cirugias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Riesgos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Costos` double(8,2) unsigned NOT NULL,
  `Duracion` int(10) unsigned NOT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `cirugias_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `cirugias_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cirugias`
--

LOCK TABLES `cirugias` WRITE;
/*!40000 ALTER TABLE `cirugias` DISABLE KEYS */;
INSERT INTO `cirugias` VALUES (1,'Vasectomia','3',217.00,55,1,0),(2,'Riñon','4',253.00,71,6,0),(3,'Vesicula','4',342.00,80,5,0),(4,'Vesicula','2',386.00,86,5,0),(5,'Riñon','3',229.00,69,7,0),(6,'Riñon','4',375.00,56,4,1),(7,'Pulmon','4',346.00,70,5,0),(8,'Riñon','4',277.00,67,4,1),(9,'Cerebro','1',217.00,82,3,1),(10,'Vasectomia','1',393.00,84,7,1),(11,'Vesicula','4',214.00,90,2,0),(12,'Cerebro','3',211.00,48,2,1),(13,'Riñon','1',283.00,90,9,0),(14,'Pulmon','1',252.00,88,8,0),(15,'Cerebro','4',279.00,88,3,0),(16,'Vesicula','4',302.00,88,9,0),(17,'Cerebro','3',340.00,40,2,1),(18,'Vasectomia','3',208.00,77,8,1),(19,'Cerebro','1',210.00,46,7,1),(20,'Riñon','4',298.00,56,8,0),(21,'Pulmon','1',227.00,72,5,1),(22,'Pulmon','2',249.00,50,7,0),(23,'Vasectomia','1',229.00,73,4,1),(24,'Pulmon','4',262.00,99,2,0),(25,'Riñon','4',273.00,82,2,0),(26,'Vesicula','2',245.00,80,2,0),(27,'Vasectomia','1',217.00,78,8,1),(28,'Riñon','4',313.00,61,8,1),(29,'Cerebro','4',323.00,75,4,1),(30,'Pulmon','1',302.00,40,6,1),(31,'Vesicula','3',270.00,50,3,1),(32,'Pulmon','4',366.00,77,10,0),(33,'Pulmon','2',377.00,75,5,0),(34,'Pulmon','4',369.00,41,8,1),(35,'Vasectomia','1',381.00,62,3,1),(36,'Pulmon','4',237.00,99,8,1),(37,'Riñon','2',338.00,68,8,0),(38,'Vesicula','3',325.00,82,4,0),(39,'Riñon','1',221.00,75,3,1),(40,'Vasectomia','4',234.00,46,9,1);
/*!40000 ALTER TABLE `cirugias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citas_agendadas`
--

DROP TABLE IF EXISTS `citas_agendadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas_agendadas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Hora_inicio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hora_termino` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idPaciente` int(10) unsigned NOT NULL,
  `idMedico` int(10) unsigned NOT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `citas_agendadas_idpaciente_foreign` (`idPaciente`),
  KEY `citas_agendadas_idmedico_foreign` (`idMedico`),
  KEY `citas_agendadas_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `citas_agendadas_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`),
  CONSTRAINT `citas_agendadas_idmedico_foreign` FOREIGN KEY (`idMedico`) REFERENCES `medicos` (`id`),
  CONSTRAINT `citas_agendadas_idpaciente_foreign` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas_agendadas`
--

LOCK TABLES `citas_agendadas` WRITE;
/*!40000 ALTER TABLE `citas_agendadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `citas_agendadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Peso` int(11) DEFAULT NULL,
  `Talla` int(11) DEFAULT NULL,
  `Perimetro_cefalitico` int(11) DEFAULT NULL,
  `Perimetro_Torasico` int(11) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `Costo` int(11) NOT NULL,
  `idMedico` int(10) unsigned NOT NULL,
  `idPaciente` int(10) unsigned NOT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `consultas_idmedico_foreign` (`idMedico`),
  KEY `consultas_idpaciente_foreign` (`idPaciente`),
  KEY `consultas_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `consultas_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`),
  CONSTRAINT `consultas_idmedico_foreign` FOREIGN KEY (`idMedico`) REFERENCES `medicos` (`id`),
  CONSTRAINT `consultas_idpaciente_foreign` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
INSERT INTO `consultas` VALUES (1,82,83,89,41,'2018-05-09',862,28,15,9,1),(2,63,41,37,57,'2018-05-09',681,37,25,9,0),(3,98,45,34,91,'2018-05-09',642,14,43,10,1),(4,70,35,47,83,'2018-05-09',639,37,48,6,0),(5,86,43,36,92,'2018-05-09',752,12,6,8,0),(6,24,66,40,25,'2018-05-09',668,27,3,5,0),(7,51,28,22,88,'2018-05-09',539,29,32,3,0),(8,97,91,46,71,'2018-05-09',971,23,38,10,1),(9,77,60,82,33,'2018-05-09',705,43,15,2,1),(10,33,92,97,91,'2018-05-09',681,26,13,10,1),(11,38,58,50,60,'2018-05-09',734,29,2,8,1),(12,93,69,40,64,'2018-05-09',717,18,35,7,0),(13,85,43,48,51,'2018-05-09',563,47,24,3,0),(14,64,69,41,73,'2018-05-09',889,26,7,8,0),(15,22,64,83,80,'2018-05-09',938,33,28,5,0),(16,76,60,38,62,'2018-05-09',936,34,11,1,0),(17,83,87,76,80,'2018-05-09',850,29,41,2,0),(18,94,31,49,86,'2018-05-09',620,42,2,7,0),(19,28,45,73,43,'2018-05-09',823,2,12,5,1),(20,38,48,60,85,'2018-05-09',813,30,9,2,1),(21,28,39,51,33,'2018-05-09',643,28,45,9,0),(22,31,93,55,73,'2018-05-09',979,29,27,9,1),(23,82,39,81,53,'2018-05-09',638,19,48,8,0),(24,65,55,30,46,'2018-05-09',888,12,14,7,0),(25,63,75,54,43,'2018-05-09',608,40,22,1,0),(26,82,47,59,40,'2018-05-09',558,37,9,5,1),(27,34,25,100,100,'2018-05-09',909,25,50,5,1),(28,24,77,53,89,'2018-05-09',991,32,29,5,0),(29,44,83,69,32,'2018-05-09',668,9,6,1,0),(30,21,27,66,43,'2018-05-09',769,18,4,2,1),(31,95,40,60,58,'2018-05-09',591,2,14,9,0),(32,66,94,51,84,'2018-05-09',583,28,1,8,1),(33,38,23,68,30,'2018-05-09',609,13,39,4,0),(34,70,29,48,99,'2018-05-09',622,26,29,4,1),(35,100,47,86,35,'2018-05-09',540,38,14,8,1),(36,59,100,73,68,'2018-05-09',863,45,40,5,1),(37,69,40,79,44,'2018-05-09',791,49,28,5,0),(38,96,73,49,48,'2018-05-09',641,47,32,4,0),(39,55,79,56,41,'2018-05-09',733,43,20,7,1),(40,53,60,82,83,'2018-05-09',993,9,19,6,0);
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enfermeras`
--

DROP TABLE IF EXISTS `enfermeras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enfermeras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Apellido` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sexo` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Edad` int(11) NOT NULL,
  `Cedula` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Direccion` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enfermeras_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `enfermeras_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enfermeras`
--

LOCK TABLES `enfermeras` WRITE;
/*!40000 ALTER TABLE `enfermeras` DISABLE KEYS */;
INSERT INTO `enfermeras` VALUES (1,'McDermott','Terry','F',35,'Ltlg0DoNYv','Rhode Island',7,0),(2,'Kuvalis','Brakus','F',38,'j31CqdVQb7','North Dakota',6,0),(3,'Luettgen','Schoen','M',36,'njCOe5AldO','Maryland',9,1),(4,'Schaden','Lowe','F',25,'59WdJpjSnZ','Virginia',1,0),(5,'Thompson','Blick','M',32,'taXQlsIiyo','Arizona',9,1),(6,'Bailey','Kreiger','M',21,'YNhIPxG65d','Florida',6,0),(7,'Zulauf','Waelchi','M',38,'SOuLrvENXi','Washington',3,0),(8,'Reilly','Sanford','F',39,'uh0ItOULNN','South Dakota',2,1),(9,'Roberts','Will','F',25,'flWVpcHI50','Idaho',4,1),(10,'Mohr','Kemmer','M',36,'azEWE1cV3r','Arizona',8,1),(11,'McClure','Willms','F',21,'rEfT8PgwYx','Iowa',3,0),(12,'Luettgen','Abbott','F',35,'oeok2JCa2G','Pennsylvania',8,1),(13,'Heathcote','Fay','M',22,'KIC6lXXXlE','Alaska',4,1),(14,'Schultz','Brakus','M',33,'dxID4Qgob5','Hawaii',10,1),(15,'Mayert','Schuster','M',25,'GH72KVO0cn','Alaska',3,1),(16,'McClure','Casper','F',33,'B0vkmqMJR3','Rhode Island',4,1),(17,'Lynch','Baumbach','F',31,'waXEqE6iXD','Missouri',9,0),(18,'Roob','Fritsch','F',23,'z7oOPCBZds','Indiana',2,0),(19,'Collins','Grady','M',33,'GHYxCO1qlt','Maine',7,1),(20,'Senger','Heller','M',26,'bjm1Fgzf4V','Florida',10,0),(21,'Lockman','Green','M',34,'Jh5fv3bflN','Utah',10,0),(22,'Raynor','Emard','M',25,'KVWX3gXHwE','South Carolina',1,0),(23,'Metz','Schamberger','F',38,'LRpm8M2r4l','Mississippi',5,1),(24,'Skiles','Connelly','F',34,'9C4Ir7chxT','California',10,1),(25,'Klocko','Parker','F',25,'BcdXHm9CbQ','South Carolina',8,1),(26,'Huels','Little','F',23,'Dq4QzfhuMw','District of Columbia',9,1),(27,'Leffler','Auer','F',40,'UVOKqJM2bZ','Kentucky',1,0),(28,'Price','Rutherford','M',39,'jwS30LYfOs','Arkansas',5,0),(29,'Jenkins','Schaefer','F',24,'qzx4d0rrFv','South Dakota',5,1),(30,'Nolan','Reynolds','F',32,'zRTx19vV96','District of Columbia',6,1),(31,'Lehner','Treutel','M',21,'R7M1mwLzB8','Delaware',5,0),(32,'Oberbrunner','Pfannerstill','F',37,'4pZu4JRnAx','New Hampshire',3,1),(33,'Howe','Purdy','F',32,'dzoU4HeSlF','Texas',1,1),(34,'Medhurst','Strosin','M',37,'e0wYq2sRLx','New York',7,0),(35,'Beer','Weissnat','F',27,'CUaifGrJ9i','District of Columbia',2,1),(36,'Green','Yost','F',36,'0y9nTr1lKk','West Virginia',4,1),(37,'Heller','Veum','F',34,'gojmWpO6xW','Utah',5,1),(38,'Kautzer','Davis','M',34,'OTd4ZOFzYI','Arkansas',4,1),(39,'Weimann','Blick','M',26,'eLgXBNwxjz','Nevada',7,1),(40,'Jakubowski','Schumm','M',31,'cPkM9l4b9J','Connecticut',4,1),(41,'Okuneva','Nolan','F',34,'VUn5weJVhr','Missouri',1,1),(42,'Bailey','Ankunding','M',30,'S8IzltHJOy','New Hampshire',10,1),(43,'Skiles','Fahey','M',21,'Lg25403PSE','North Dakota',7,1),(44,'Lindgren','Flatley','M',31,'jwVQCeTIvl','Wisconsin',9,0),(45,'Swift','Bruen','F',32,'rEFaOVrlcj','New Hampshire',6,0),(46,'Goyette','Krajcik','M',35,'Epi4noAnJJ','California',10,1),(47,'Gottlieb','Huel','F',27,'edzWuH14hV','Massachusetts',3,1),(48,'Reilly','Pfeffer','M',35,'uAZiNRRsoI','Mississippi',4,1),(49,'Gibson','Jacobs','M',33,'h6q8rgTl8a','Nebraska',5,1),(50,'Maggio','Schneider','F',37,'6jLGnkNENN','Kansas',8,1);
/*!40000 ALTER TABLE `enfermeras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `farmacias`
--

DROP TABLE IF EXISTS `farmacias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `farmacias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre_marca` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nombre_compuesto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Precentacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Precio` int(10) unsigned NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Codigo_barras` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lote` int(11) DEFAULT NULL,
  `Caducidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dosis_precentacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `idAlmacen` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `farmacias_idcentro_medico_foreign` (`idCentro_medico`),
  KEY `farmacias_idalmacen_foreign` (`idAlmacen`),
  CONSTRAINT `farmacias_idalmacen_foreign` FOREIGN KEY (`idAlmacen`) REFERENCES `almacenes` (`id`),
  CONSTRAINT `farmacias_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `farmacias`
--

LOCK TABLES `farmacias` WRITE;
/*!40000 ALTER TABLE `farmacias` DISABLE KEYS */;
INSERT INTO `farmacias` VALUES (1,'Aspirina','Sodio','Gotas','Est odio veritatis.',46,68,'F5Wy3cm9P6',21,'1987','191',5,18,0),(2,'Buscapina','Paracetamol','Suspencion','Optio in magnam.',55,70,'x9DvqfcOtW',13,'1989','250',8,18,0),(3,'Buscapina','Penisilina','Tabletas','Repellat soluta et.',76,95,'BUW2aHfXv0',11,'1979','234',3,1,1),(4,'Aspirina','Penisilina','Tabletas','Hic suscipit.',44,92,'gYVrzIYIhU',22,'1979','420',9,19,1),(5,'Buscapina','Paracetamol','Pastillas','Ut exercitationem.',51,57,'9i9YibHYNF',20,'1975','242',2,11,0),(6,'Buscapina','Penisilina','Jarabe','Odio culpa beatae.',83,70,'oYVr922xmb',18,'2009','434',10,2,0),(7,'Genoprasol','Sodio','Jarabe','Voluptas accusamus.',53,93,'BI5ngZCb9I',19,'2012','224',3,9,1),(8,'Genoprasol','Mitrozin','Suspencion','Inventore voluptate.',86,81,'Ow26eTwiVo',18,'1985','118',1,17,1),(9,'Aspirina','Sodio','Jarabe','Magnam ut nobis ut.',91,47,'Nua8bJMfKf',19,'1982','444',8,1,0),(10,'Clorox','Paracetamol','Tabletas','Voluptatem sequi.',89,96,'6CZNw0CcMZ',13,'2014','371',5,2,1),(11,'Buscapina','Paracetamol','Jarabe','Aut inventore quo.',77,64,'0DSrP4u9Bb',13,'1989','219',1,17,0),(12,'Clorox','Sodio','Pastillas','In laborum cumque.',75,59,'Ao1TPzalew',26,'1979','327',9,8,1),(13,'Genoprasol','Mitrozin','Suspencion','Voluptatibus.',77,66,'fOys6u8Ffy',24,'1998','165',5,1,0),(14,'Clorox','Paracetamol','Suspencion','Aut facere quia non.',67,92,'SDcrEkuDMj',20,'2005','165',10,11,1),(15,'Genoprasol','Mitrozin','Tabletas','Quisquam tenetur.',57,73,'Tk3UhfTDxX',25,'2010','397',8,6,0),(16,'Buscapina','Sodio','Gotas','Est eos quis non.',53,82,'nQDxCzxrSa',12,'2002','110',10,10,1),(17,'Genoprasol','Mitrozin','Pastillas','Maxime officia.',77,69,'IaZuhblJa6',11,'1987','221',2,7,1),(18,'Buscapina','Paracetamol','Gotas','Voluptatem eius.',99,73,'sDrPSIpRdl',20,'1990','360',10,18,1),(19,'Genoprasol','Paracetamol','Tabletas','Sed ut consequatur.',99,95,'QumBuKL9dY',25,'1981','311',1,20,0),(20,'Aspirina','Paracetamol','Jarabe','Similique eaque et.',51,54,'1LCNcopsJb',25,'2001','273',10,18,1),(21,'Aspirina','Sodio','Tabletas','Provident dolorum.',53,97,'CqZlZzP24K',13,'2015','228',1,1,0),(22,'Genoprasol','Penisilina','Suspencion','Est dignissimos.',64,98,'Cl9tPLHJ1L',25,'1990','280',6,5,1),(23,'Buscapina','Sodio','Gotas','Eos rerum nihil in.',44,40,'yp9Lc3V13s',25,'1996','163',9,4,1),(24,'Buscapina','Sodio','Pastillas','Natus id et unde.',98,72,'reygBuWCOk',27,'2001','366',1,16,0),(25,'Aspirina','Paracetamol','Suspencion','Corrupti labore.',94,78,'piSbMJ2FEf',28,'1992','290',1,6,0),(26,'Aspirina','Sodio','Tabletas','Ea ratione.',58,52,'k0nDOGjXWK',10,'2000','385',5,10,1),(27,'Genoprasol','Sodio','Suspencion','Qui voluptatibus.',58,42,'LsAUL88Afd',27,'1974','113',7,4,1),(28,'Buscapina','Paracetamol','Suspencion','Iusto assumenda.',66,90,'yV6yM4VeJE',24,'2014','432',6,9,0),(29,'Buscapina','Mitrozin','Suspencion','Exercitationem.',65,48,'GThd1fw47r',10,'1993','321',6,8,0),(30,'Clorox','Paracetamol','Pastillas','Accusamus vitae sed.',100,99,'edtJyBsaLO',16,'1974','363',6,5,1),(31,'Aspirina','Sodio','Suspencion','Laborum at quam id.',68,62,'9FtaMmUJqy',15,'1978','264',3,10,0),(32,'Buscapina','Penisilina','Tabletas','Et velit.',46,74,'fC3musUBpP',28,'1988','193',6,16,0),(33,'Aspirina','Sodio','Jarabe','Officiis quia quo.',46,69,'NMFseEmU26',24,'2002','476',4,3,1),(34,'Genoprasol','Penisilina','Suspencion','Aliquid illum.',68,82,'VyecqJhOsL',14,'1993','371',10,3,1),(35,'Buscapina','Mitrozin','Suspencion','Consectetur et.',55,91,'exDVzu92pi',19,'2016','157',6,2,1),(36,'Buscapina','Penisilina','Jarabe','Quia non natus.',72,58,'VNw6YczElp',14,'1977','431',6,9,1),(37,'Clorox','Sodio','Tabletas','Repellat.',44,44,'gxknGyRNy3',21,'1985','354',10,8,0),(38,'Clorox','Mitrozin','Tabletas','Architecto.',69,52,'dJlUA3OUoF',19,'1974','314',4,2,1),(39,'Buscapina','Sodio','Suspencion','Maxime dolorum.',79,54,'RevifwrA1V',29,'1989','382',8,18,1),(40,'Buscapina','Paracetamol','Jarabe','Est quas possimus.',43,43,'YfKtyRI5nj',14,'2002','491',3,7,1);
/*!40000 ALTER TABLE `farmacias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historia_clinicas`
--

DROP TABLE IF EXISTS `historia_clinicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historia_clinicas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Cardiovasculares` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pulmonares` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Digestivos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Diabetes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Renales` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quirurjicos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alergicos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Transfuncionales` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Medicamentos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Espesifique` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alcohol` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tabaquismo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Drogas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Inmunizadores` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Otros_adicciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Padre_vivo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Enfermedades_padre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Madre_vivo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Enfermedades_madre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hermanos_cantidad` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Enfermedades_hermanos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hermanos_otro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Menarquia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ritmo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `F_U_M` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `G` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `P` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `A` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `C` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `I_V_S_A` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Metodos_anticonceptiovos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tipo_metodos_anticonceptivos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `PEEAR` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DNR` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DPR` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `I_P_A_S` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `TA_derecho` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `TA_izquierdo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `FC` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Frecuencia_respiratoria` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Temperatura` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Peso` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Talla` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `IMC` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cabeza_cuello` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Torax` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Adbomen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Extremidades` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Estado_mental` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Laboratorio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Estudios` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Otros` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Listado_problemas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `idConsulta` int(10) unsigned NOT NULL,
  `idPaciente` int(10) unsigned NOT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `historia_clinicas_idconsulta_foreign` (`idConsulta`),
  KEY `historia_clinicas_idpaciente_foreign` (`idPaciente`),
  KEY `historia_clinicas_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `historia_clinicas_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`),
  CONSTRAINT `historia_clinicas_idconsulta_foreign` FOREIGN KEY (`idConsulta`) REFERENCES `consultas` (`id`),
  CONSTRAINT `historia_clinicas_idpaciente_foreign` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historia_clinicas`
--

LOCK TABLES `historia_clinicas` WRITE;
/*!40000 ALTER TABLE `historia_clinicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `historia_clinicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicaciones_medicas`
--

DROP TABLE IF EXISTS `indicaciones_medicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicaciones_medicas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Dieta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Esquema_soluciones` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lista_medicamentos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Medias_generales` int(11) NOT NULL,
  `Hemocomponentes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idConsulta` int(10) unsigned NOT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `indicaciones_medicas_idconsulta_foreign` (`idConsulta`),
  KEY `indicaciones_medicas_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `indicaciones_medicas_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`),
  CONSTRAINT `indicaciones_medicas_idconsulta_foreign` FOREIGN KEY (`idConsulta`) REFERENCES `consultas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicaciones_medicas`
--

LOCK TABLES `indicaciones_medicas` WRITE;
/*!40000 ALTER TABLE `indicaciones_medicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicaciones_medicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infrestructura_centro_medico`
--

DROP TABLE IF EXISTS `infrestructura_centro_medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infrestructura_centro_medico` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Infrestructura_centro_medico` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Estado` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `infrestructura_centro_medico_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `infrestructura_centro_medico_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infrestructura_centro_medico`
--

LOCK TABLES `infrestructura_centro_medico` WRITE;
/*!40000 ALTER TABLE `infrestructura_centro_medico` DISABLE KEYS */;
/*!40000 ALTER TABLE `infrestructura_centro_medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicos`
--

DROP TABLE IF EXISTS `medicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Apellidos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Especialidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sexo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Edad` int(10) unsigned NOT NULL,
  `Cedula` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `medicos_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `medicos_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicos`
--

LOCK TABLES `medicos` WRITE;
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` VALUES (1,'Tremblay','Purdy','Cormier-VonRueden','M',25,'FpeRd6XtW1','Florida',2,0),(2,'Swaniawski','Ryan','Lakin-Schaefer','M',27,'sMpSLnsJbk','Iowa',7,0),(3,'Beahan','Daniel','Schmeler-Rosenbaum','M',27,'uplZTSxIkb','Alaska',3,1),(4,'Kuvalis','Farrell','Ryan, Kihn and O\'Kon','M',33,'ySVoku1F8u','Delaware',7,1),(5,'Strosin','Schuppe','Moore Group','M',22,'7BMkvwAl9O','Virginia',10,1),(6,'Frami','Tillman','Schoen Ltd','F',28,'9qiwuctbbc','Vermont',9,1),(7,'Jacobi','Ryan','Howell-Effertz','F',36,'zP9jZ8OMiP','Wisconsin',3,0),(8,'Corwin','Gottlieb','Ward Group','F',26,'2dLueEYey2','Wisconsin',2,0),(9,'Daniel','Johns','Koelpin Ltd','F',23,'3TnwV6tjHV','Illinois',3,0),(10,'Kovacek','Baumbach','Sanford-Lueilwitz','M',28,'JFMh3SDbWA','Virginia',3,1),(11,'Schmeler','Hickle','Labadie Group','F',29,'uM5arSaAWC','Illinois',3,1),(12,'Hills','Kemmer','Feil-Keebler','M',22,'hjue4L8vMV','South Carolina',7,1),(13,'Hills','Collier','Weber Ltd','F',30,'RgD2WjNoiT','Florida',6,1),(14,'Reichel','Hills','Hoppe PLC','F',21,'ujWHKA27OX','Connecticut',5,0),(15,'Smith','Luettgen','Huels, Okuneva and DuBuque','M',34,'Ql6eMg0mvv','Arizona',7,0),(16,'Strosin','Quigley','Gibson, Thiel and Streich','F',29,'LLT9fyQhKj','Tennessee',3,1),(17,'Sporer','Witting','Maggio, Wuckert and Becker','F',28,'lsVvgFzlOM','Illinois',9,0),(18,'Bailey','Kerluke','Murray-Beier','F',28,'OAw5WtCONU','South Dakota',4,0),(19,'Gerlach','Abshire','Lebsack, Gutkowski and Rosenbaum','M',40,'ojcmKTEs9V','South Carolina',5,1),(20,'Upton','Howe','Botsford-Carter','F',20,'2r3EL2lmxV','Illinois',2,0),(21,'Bins','Fritsch','Hyatt PLC','M',30,'HsxjW1oHpl','South Dakota',10,0),(22,'Stracke','Franecki','Ledner, Kirlin and Cummings','F',23,'bETqRGCsKF','Montana',5,1),(23,'Ziemann','Padberg','Wisoky-Brakus','F',33,'PbpQ3ElbII','Kentucky',6,1),(24,'Collins','Franecki','Hane and Sons','F',33,'YGuQDrmQjt','Virginia',9,0),(25,'Macejkovic','Hamill','Bernhard PLC','F',24,'rLzoVneqmD','South Carolina',8,1),(26,'Schaden','Pagac','Labadie-Kirlin','F',30,'dfaCYLnWoO','North Dakota',5,1),(27,'Keebler','Lowe','Doyle, Ullrich and Moen','F',34,'unzQsHLHwm','Colorado',3,1),(28,'Zboncak','Koepp','Jaskolski-Spencer','M',36,'OcO0tCqRZs','Alaska',9,1),(29,'Becker','Wuckert','Bernier, Farrell and Rolfson','M',30,'7GE92cWTng','Florida',4,1),(30,'Hickle','Pouros','Halvorson-Weber','F',21,'gG7M9LvqFp','California',1,1),(31,'Greenfelder','Wiegand','Braun, Jast and Leuschke','F',34,'f1aGAxdrII','Idaho',5,0),(32,'Wilkinson','Rolfson','Harris, Stark and Lockman','F',29,'3Cs7YSe88W','Alaska',6,1),(33,'Graham','Kozey','Homenick LLC','M',40,'Z0eNPEyzfJ','Indiana',10,1),(34,'Prosacco','Witting','Lindgren Group','F',20,'IczeUvi3ar','Hawaii',6,1),(35,'Rath','Beatty','Langosh-Waelchi','M',20,'4drLx8jeJW','Illinois',2,0),(36,'Grant','Bergnaum','West-Franecki','F',29,'7mMuJ5z1TI','Oregon',3,0),(37,'Pfannerstill','Cormier','Dibbert, Dach and Predovic','F',40,'3LhgIqj1pP','Ohio',5,0),(38,'Casper','Blanda','Runolfsson Group','F',25,'6tb4kWOjs2','Maryland',5,0),(39,'Hoeger','Ernser','Strosin, Gottlieb and Little','M',28,'OVejCXM9nv','California',1,0),(40,'Hills','Bashirian','Douglas Ltd','F',24,'kdTCJ6z0UB','North Carolina',3,1),(41,'Rodriguez','Ledner','Greenholt LLC','M',25,'l4C20QoyP4','Florida',9,0),(42,'Kerluke','Gislason','Kozey Inc','M',32,'I9plMaGe2F','Indiana',6,0),(43,'Schowalter','Lakin','Considine-Mayert','M',35,'5iqZxfsnVl','Rhode Island',7,0),(44,'Wolff','Ziemann','Boyle, Kassulke and Rice','F',33,'KY3XEBe78F','Wisconsin',8,0),(45,'Lebsack','Conn','Cronin, Stoltenberg and Crona','M',37,'CWXfGElizP','Ohio',9,0),(46,'Dicki','Abernathy','Macejkovic-Walsh','M',26,'xWDkgsjuUf','Hawaii',9,0),(47,'Botsford','Gleason','Barton, Flatley and Johnson','F',24,'oloQMbjbfG','Montana',10,1),(48,'Marquardt','Trantow','Bailey-Howell','F',39,'7vvd0TStO1','Wisconsin',6,1),(49,'Erdman','Kihn','Durgan-Block','M',26,'Jxc5mxv9dP','Maine',8,0),(50,'Macejkovic','Carroll','Kling, Schaden and Wisoky','M',29,'nVPdmwuqIl','New Jersey',1,1);
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2018_04_03_014247_create_centro_medicos_table',1),(2,'2018_04_03_014417_create_infrestructura__centro_medicos_table',1),(3,'2018_04_03_015257_create_camas_x_pisos_table',1),(4,'2018_04_03_015333_create_medicos_table',1),(5,'2018_04_08_195846_create_tipo_usuarios_table',1),(6,'2018_04_08_222201_create_enfermeras_table',1),(7,'2018_04_09_003924_create_pacientes_table',1),(8,'2018_04_09_496414_create_usuarios_sistemas_table',1),(9,'2018_04_09_502529_create_suscripciones_table',1),(10,'2018_05_01_022215_create_consultas_table',1),(11,'2018_05_01_023636_create_almacenes_table',1),(12,'2018_05_01_031928_create_recetas_table',1),(13,'2018_05_01_032039_create_farmacias_table',1),(14,'2018_05_01_171757_create_indicaciones_medicas_table',1),(15,'2018_05_01_172749_create_vacunas_table',1),(16,'2018_05_01_173910_create_vacunas_x_pacientes_table',1),(17,'2018_05_01_175934_create_cajas_table',1),(18,'2018_05_01_181642_create_pago_plazos_table',1),(19,'2018_05_01_184058_create_historia_clinicas_table',1),(20,'2018_05_01_193547_create_citas_agendadas_table',1),(21,'2018_05_01_195025_create_cirugias_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Apellidos` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telefono` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sexo` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Edad` int(11) NOT NULL,
  `Direccion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tipo_sangre` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Fecha_inscripcion` date NOT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pacientes_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `pacientes_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (1,'Swaniawski','Bartell','2461034037','F',28,'West Virginia','EqhH','1984-12-25',3,0),(2,'Cartwright','Reinger','2461034037','M',34,'South Dakota','fC1v','1988-10-02',4,0),(3,'Will','Will','2221034037','F',38,'Montana','qqqQ','2012-06-10',1,0),(4,'Ledner','Roob','2221034037','M',38,'Arkansas','4QxT','2013-08-20',3,0),(5,'Lubowitz','Langosh','2461034037','F',33,'South Carolina','plvH','2011-03-18',7,1),(6,'Morissette','McKenzie','2461034037','F',26,'Pennsylvania','EwMU','1978-06-12',4,1),(7,'Torphy','Cremin','2221034037','F',26,'Mississippi','n124','1978-10-15',6,1),(8,'Dickinson','Schuppe','2221714946','F',27,'Alabama','oZBE','1988-03-29',5,0),(9,'Gibson','Runte','2461034037','F',22,'Delaware','dvAA','2008-09-03',7,0),(10,'Kertzmann','Bins','2221034037','M',39,'California','dC2h','2012-12-12',6,0),(11,'Lindgren','Murphy','2221714946','F',39,'Washington','enQj','1972-03-22',6,1),(12,'Fahey','Sipes','2461034037','M',31,'Missouri','7IPz','2008-08-13',2,1),(13,'Kovacek','Hackett','2221714946','F',37,'Alabama','ULWu','1972-07-27',2,1),(14,'Schulist','Reinger','2221034037','M',36,'Kansas','oRWZ','2017-08-20',2,0),(15,'Kulas','Paucek','2221714946','F',30,'Vermont','WXFo','1982-05-24',3,1),(16,'Kuvalis','Pagac','2461034037','F',31,'Alabama','dUzk','1987-07-08',5,0),(17,'Ryan','Tremblay','2221714946','M',28,'Georgia','dkOv','1989-07-02',3,0),(18,'Barton','Streich','2461034037','M',27,'Montana','s23l','1982-12-21',10,0),(19,'Stokes','Harvey','2221714946','F',29,'New Mexico','FpoB','1987-11-27',10,1),(20,'Homenick','Hickle','2221034037','F',27,'New York','sK3c','1977-10-11',5,0),(21,'Beahan','Torp','2221034037','F',34,'Rhode Island','hP1Q','1995-01-21',6,0),(22,'Koepp','Rohan','2461034037','M',35,'New Jersey','9Q8B','1988-10-31',4,0),(23,'Klocko','Turner','2461034037','F',29,'Washington','AHti','2017-06-13',2,0),(24,'Haley','Schmeler','2221034037','F',37,'Louisiana','Trjt','1979-09-29',3,0),(25,'Goyette','Purdy','2221034037','F',33,'Colorado','ROlk','1981-09-18',4,0),(26,'Pouros','Thiel','2221714946','M',26,'Illinois','1bCU','1996-12-23',9,0),(27,'Thompson','Towne','2221034037','M',34,'Hawaii','jrko','2000-02-03',10,0),(28,'Hayes','Abbott','2221714946','M',31,'Nebraska','5HQR','2013-08-24',5,0),(29,'Murphy','Baumbach','2221034037','M',20,'Alabama','FgNT','1985-04-03',7,0),(30,'Smitham','Medhurst','2461034037','M',29,'Missouri','7HX6','1987-04-12',5,1),(31,'Bernhard','McKenzie','2461034037','M',29,'New Mexico','W5Gy','1996-11-03',5,0),(32,'Heller','Eichmann','2461034037','F',33,'North Carolina','72Ij','2016-05-08',9,1),(33,'VonRueden','Welch','2461034037','M',34,'Tennessee','4vYY','2012-07-23',5,1),(34,'Stokes','Schneider','2221714946','M',26,'Kentucky','60o8','1977-02-28',7,0),(35,'Kertzmann','O\'Connell','2461034037','F',30,'Wisconsin','iNBD','1987-09-24',3,1),(36,'Koch','Klein','2221034037','F',40,'Pennsylvania','LxB0','1982-02-18',9,0),(37,'Collins','Veum','2221034037','F',26,'Idaho','u7m0','2015-04-21',9,1),(38,'Keeling','Langworth','2221034037','F',34,'Maryland','8X62','1977-07-17',10,1),(39,'Johns','Reichert','2221034037','M',32,'District of Columbia','ZKuz','2015-12-03',1,0),(40,'O\'Hara','Sanford','2221034037','M',34,'Minnesota','qDys','2006-03-30',3,0),(41,'Collins','Mills','2461034037','F',24,'Mississippi','McoA','1979-05-11',9,0),(42,'Schmeler','Lind','2221034037','M',29,'Wisconsin','eGtm','1980-04-25',7,0),(43,'Parisian','Windler','2221714946','F',30,'Oklahoma','KMBk','2004-07-23',2,0),(44,'Dare','Hodkiewicz','2461034037','M',33,'Louisiana','xg9j','2012-08-09',6,1),(45,'Witting','Emmerich','2461034037','M',37,'West Virginia','zTla','1972-05-18',2,1),(46,'Sauer','Rippin','2221034037','F',39,'North Dakota','aedh','2016-10-10',10,0),(47,'Strosin','Gerhold','2461034037','F',37,'Utah','fd7a','2016-11-24',10,0),(48,'Larkin','West','2221714946','F',21,'Rhode Island','WstU','2011-09-29',3,0),(49,'Russel','Bergnaum','2461034037','M',34,'Oklahoma','0QK0','1992-11-26',3,1),(50,'Macejkovic','Schuppe','2221714946','F',35,'Georgia','hOc8','2010-08-22',7,1);
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago_plazos`
--

DROP TABLE IF EXISTS `pago_plazos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago_plazos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Cantidad_pagos` int(10) unsigned NOT NULL,
  `Monto_pagos` double(8,2) unsigned NOT NULL,
  `Dia_corte` int(10) unsigned NOT NULL,
  `Pagos` text COLLATE utf8mb4_unicode_ci,
  `Fecha_limite` date NOT NULL,
  `idCaja` int(10) unsigned NOT NULL,
  `idUsuario_sistema` int(10) unsigned NOT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pago_plazos_idusuario_sistema_foreign` (`idUsuario_sistema`),
  KEY `pago_plazos_idcaja_foreign` (`idCaja`),
  KEY `pago_plazos_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `pago_plazos_idcaja_foreign` FOREIGN KEY (`idCaja`) REFERENCES `cajas` (`id`),
  CONSTRAINT `pago_plazos_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`),
  CONSTRAINT `pago_plazos_idusuario_sistema_foreign` FOREIGN KEY (`idUsuario_sistema`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago_plazos`
--

LOCK TABLES `pago_plazos` WRITE;
/*!40000 ALTER TABLE `pago_plazos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pago_plazos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recetas`
--

DROP TABLE IF EXISTS `recetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recetas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Medicamentos` text COLLATE utf8mb4_unicode_ci,
  `idConsulta` int(10) unsigned NOT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `recetas_idconsulta_foreign` (`idConsulta`),
  KEY `recetas_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `recetas_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`),
  CONSTRAINT `recetas_idconsulta_foreign` FOREIGN KEY (`idConsulta`) REFERENCES `consultas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recetas`
--

LOCK TABLES `recetas` WRITE;
/*!40000 ALTER TABLE `recetas` DISABLE KEYS */;
INSERT INTO `recetas` VALUES (1,'Miss Abbie Schuster','Nihil ut dolore ab.','{\'id\' : 20}',16,8,1),(2,'Prof. Irving Goodwin','Aut enim magnam.','{\'id\' : 3s0}',7,10,1),(3,'Prof. Murl Williamson','Hic ea architecto.','{\'id\' : 3s0}',10,6,1),(4,'Gilda Considine','Pariatur ea veniam.','{\'id\' : 10}',6,10,1),(5,'Daron Jacobi','Qui in voluptas.','{\'id\' : 3s0}',20,4,1),(6,'Garrick Funk','Sed commodi tempore.','{\'id\' : 3s0}',8,1,0),(7,'Javonte Fay','Amet eos aperiam.','{\'id\' : 3s0}',39,1,1),(8,'Prof. Kathryne Lueilwitz Jr.','Est enim et sunt et.','{\'id\' : 10}',37,6,0),(9,'Kenyon Huels','Aut autem quo vel.','{\'id\' : 20}',10,9,1),(10,'Craig Rohan','Nam ea sed nisi eum.','{\'id\' : 20}',1,9,0),(11,'Jessica Bruen DDS','Dolores eum ipsam.','{\'id\' : 20}',20,9,1),(12,'Greyson Rogahn IV','Reprehenderit nobis.','{\'id\' : 20}',12,5,1),(13,'Kyleigh Kuhlman','Temporibus non.','{\'id\' : 10}',16,6,0),(14,'Dayne Sanford IV','Id consequuntur aut.','{\'id\' : 20}',20,9,0),(15,'Prof. Elza Beatty','Aut sit voluptatem.','{\'id\' : 10}',27,1,0),(16,'Dr. Macie Ruecker MD','Voluptatem.','{\'id\' : 3s0}',20,6,1),(17,'Dr. Bret Rau','Aspernatur nihil.','{\'id\' : 20}',32,8,1),(18,'Casimer Fritsch','Rerum eum voluptate.','{\'id\' : 20}',28,9,1),(19,'Ima Pouros','Ipsa qui optio.','{\'id\' : 10}',18,8,1),(20,'Dr. Christy Pollich IV','Quae quia.','{\'id\' : 3s0}',23,8,1),(21,'Ethyl White PhD','Est voluptatibus.','{\'id\' : 10}',8,3,1),(22,'Nola Stokes','Facere qui nobis.','{\'id\' : 10}',35,1,0),(23,'Nicolas Deckow MD','Molestiae ratione.','{\'id\' : 20}',23,9,0),(24,'Mr. Florian Cremin DVM','Qui sed itaque et.','{\'id\' : 20}',18,3,0),(25,'Mr. Dereck Hahn IV','A quia distinctio.','{\'id\' : 20}',7,3,0),(26,'Rosendo Runolfsson','Est inventore quia.','{\'id\' : 10}',25,1,1),(27,'Prof. Brady Donnelly','Molestiae et aut.','{\'id\' : 3s0}',6,4,0),(28,'Renee Roob','Ab unde quibusdam.','{\'id\' : 20}',26,8,1),(29,'Weston Prohaska','Eveniet adipisci et.','{\'id\' : 10}',5,5,0),(30,'Billie Metz','Quo dolor ut beatae.','{\'id\' : 3s0}',11,1,1),(31,'Belle Ward','Illum voluptatum.','{\'id\' : 10}',2,5,1),(32,'Reta Conn','Recusandae in ipsa.','{\'id\' : 10}',22,10,1),(33,'Caleigh Rau','Perferendis ipsum.','{\'id\' : 3s0}',17,8,0),(34,'Ed Haag','Dolorem reiciendis.','{\'id\' : 3s0}',12,1,1),(35,'Larry Roberts','Eos quia distinctio.','{\'id\' : 3s0}',11,7,1),(36,'Rickie Kunze V','Et voluptatibus ut.','{\'id\' : 10}',11,10,0),(37,'Alivia Rau PhD','Quia est et animi.','{\'id\' : 10}',11,7,0),(38,'Fritz Satterfield','Repellendus rem.','{\'id\' : 10}',6,7,1),(39,'Moises Schoen','Quam qui animi sit.','{\'id\' : 10}',24,3,0),(40,'Isadore Purdy','Non eius fugit.','{\'id\' : 20}',9,10,0);
/*!40000 ALTER TABLE `recetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suscripciones`
--

DROP TABLE IF EXISTS `suscripciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suscripciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Tipo_suscripcion` int(11) NOT NULL,
  `Nombre_persona` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Apellidos_persona` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fecha_inscripcion` date NOT NULL,
  `Cedula` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `idUsuarios_sistema` int(10) unsigned NOT NULL,
  `Estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `suscripciones_idcentro_medico_foreign` (`idCentro_medico`),
  KEY `suscripciones_idusuarios_sistema_foreign` (`idUsuarios_sistema`),
  CONSTRAINT `suscripciones_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`),
  CONSTRAINT `suscripciones_idusuarios_sistema_foreign` FOREIGN KEY (`idUsuarios_sistema`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suscripciones`
--

LOCK TABLES `suscripciones` WRITE;
/*!40000 ALTER TABLE `suscripciones` DISABLE KEYS */;
INSERT INTO `suscripciones` VALUES (1,2,'Ruecker','Pfannerstill','1974-08-27','1WM5SYi98m',1,37,0),(2,3,'Bogan','Torp','1984-08-11','YeAkKA7BIH',9,14,1),(3,3,'Bechtelar','Hand','2009-07-04','JnybgCaxZl',9,14,1),(4,1,'Mueller','Daugherty','2013-03-29','24M2qa3E4z',4,11,1),(5,1,'Hills','Kerluke','2017-07-22','kYX9EOCjKz',3,33,0),(6,3,'Nader','Beier','1972-03-18','OMhDLtqiwc',2,50,0),(7,3,'Gutkowski','Bayer','1989-12-29','mxVBg60Zj4',9,9,1),(8,3,'Schamberger','Green','1996-06-22','kRHT3bRYxg',1,27,2),(9,1,'Huel','Stanton','2010-05-29','5M3dMk9NYV',7,45,0),(10,1,'Keebler','Lind','1985-09-14','jajV0uQXYp',8,39,1);
/*!40000 ALTER TABLE `suscripciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Tipo_usuario` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fecha_registro` date NOT NULL,
  `Token_verificacion` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Verificada` int(11) DEFAULT '0',
  `idCentro_medico` int(10) unsigned NOT NULL,
  `idMedico` int(10) unsigned DEFAULT '1',
  `idEnfermera` int(10) unsigned DEFAULT '1',
  `idPaciente` int(10) unsigned DEFAULT '1',
  `idTipo_usuario` int(10) unsigned NOT NULL DEFAULT '1',
  `Estado` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_user_unique` (`user`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_idcentro_medico_foreign` (`idCentro_medico`),
  KEY `users_idmedico_foreign` (`idMedico`),
  KEY `users_idenfermera_foreign` (`idEnfermera`),
  KEY `users_idpaciente_foreign` (`idPaciente`),
  KEY `users_idtipo_usuario_foreign` (`idTipo_usuario`),
  CONSTRAINT `users_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`),
  CONSTRAINT `users_idenfermera_foreign` FOREIGN KEY (`idEnfermera`) REFERENCES `enfermeras` (`id`),
  CONSTRAINT `users_idmedico_foreign` FOREIGN KEY (`idMedico`) REFERENCES `medicos` (`id`),
  CONSTRAINT `users_idpaciente_foreign` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`id`),
  CONSTRAINT `users_idtipo_usuario_foreign` FOREIGN KEY (`idTipo_usuario`) REFERENCES `tipo_usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'heathcote.marcos','secret','pacocha.alvena@example.net','1984-12-21','oDSQRV8FnTNfaLUdLLdFvRaKtwASonXIkiv44MRE',1,15,44,4,12,2,0),(2,'green.kaitlyn','secret','myles.zboncak@example.com','2001-06-12','QjNgY6tqBgTxM5GI5eKraRPxRDyRoluD2j8PMFjB',1,41,26,13,50,2,1),(3,'haley32','secret','mireille.wolf@example.net','1971-11-13','USUqw7H8w5mhuEzcfRK3BIg1K9pVKRZFdS8nKfKd',1,21,4,18,20,6,1),(4,'delpha.greenfelder','secret','rylee.carroll@example.org','2015-05-30','QoX6QxWySY9sYgxytfIqD8119QMe2DiMNuPelb8b',1,11,26,34,49,6,0),(5,'johnpaul21','secret','theodora.welch@example.net','1993-06-07','CLtSD4urlZhLy71fAOhMcuG9UFQ0kaC9QFlEBgII',1,37,37,50,5,4,1),(6,'jfarrell','secret','newell.emmerich@example.net','1999-08-19','cJgzxhFebXhDSr1czOMSMCkKCVJU05tv1dtV7Yyo',1,29,36,28,43,1,0),(7,'jacobi.marcellus','secret','yolanda.turcotte@example.com','1981-08-21','0piFOOxNcy187DRYtOwRlfrPr2qZdhciNdXkaBFr',0,50,42,15,18,2,0),(8,'hkeebler','secret','dorn@example.org','1983-11-27','ADcrPuYNCtWnek4Z5L77NKrsibOEulGLZ7dCYCTt',1,37,42,42,12,4,1),(9,'ila38','secret','langworth.aurelie@example.net','1982-05-12','gZrR0H3Q28Mc60tppKPpxZlNhuGfEi3q1QFhzN81',1,45,39,24,29,5,1),(10,'brandy.gutkowski','secret','jamar47@example.org','1995-06-15','bTQCnHDXaWdnSXa7pD4YH1YEfxRuOS0yx5CzNQjw',1,37,34,14,48,6,0),(11,'bartoletti.misty','secret','thelma30@example.org','1976-03-16','H3WfXVlGLbzOU311moopbgOxI8q0vXBaGdt7Wr2L',1,38,13,35,12,2,0),(12,'block.judd','secret','hudson.moses@example.com','1983-03-10','5DVs6VbANuxfxkFuEP8CxZeish0WjHhjRDztGpxO',0,46,17,22,48,5,1),(13,'edna.bernier','secret','fay.dolores@example.org','1994-06-29','44B2XEAgD8SoNQDhEbs0G0peOR7IWiDaOoSGasML',1,33,15,14,3,4,1),(14,'emard.coby','secret','zgoldner@example.com','2007-11-21','WABfhJhQIEdKCQVFNYo9GikQlDmIMxwHunVENUMB',0,9,15,25,33,6,0),(15,'witting.nelle','secret','barton.ezra@example.com','1985-12-11','qqUcW3sguQbirQitGWBoKSu9dffYSYoeE9oqdYF5',1,32,23,12,29,4,1),(16,'daugherty.silas','secret','korbin60@example.net','2002-10-21','c5Vpg1HSDUG35crflUYRjjDulqIqEGezZB7Wnnhz',0,44,47,5,42,2,1),(17,'nikolas71','secret','vanessa.wunsch@example.org','1998-04-19','Gp2sjmWsN9k5iIRe5mmbTy3WXzeALiEx1ZbKeb4j',0,50,1,21,15,3,1),(18,'larkin.eloisa','secret','kuvalis.verlie@example.com','1999-02-02','N4SLgCaPKTvd5sQSrw2PyAwIYIl5zF1kSwWK8UuG',1,20,28,34,21,5,1),(19,'obie.bartell','secret','delmer72@example.net','1996-07-20','ZLfd2bgmwq8m5ePwJFAU6ntM5CekIOUImFmqMHVx',1,37,38,37,36,6,1),(20,'bernita01','secret','oberbrunner.eden@example.net','1989-04-21','IGN58Oru0yNx7VQCMW4USJzn0ParxydNdFffC02U',1,26,10,23,2,3,1),(21,'vmosciski','secret','cfahey@example.com','1976-08-02','1RfH6M3ullQpRumUosZOmqpMCojY1vHbRmizVKvy',1,4,31,38,38,5,0),(22,'murazik.marquis','secret','keeling.megane@example.com','2015-09-23','8HFqcvwmnMZBeRYjPiy5AP25mj5JcZHPgXmPZeqd',1,34,29,42,42,3,1),(23,'ashleigh.tillman','secret','beer.florencio@example.com','1989-03-04','TltXMOkjrDy2fM3P24t1qcyagSwEZfHhwslupQa9',1,25,27,27,11,4,1),(24,'qarmstrong','secret','labadie.cydney@example.com','2000-07-07','13aqs9TZECfDsv3oyl43Arh6pY2L6ZXwNSWZeOBZ',0,17,35,24,13,3,0),(25,'runolfsson.charlotte','secret','haleigh.windler@example.net','1972-04-07','IoYCdNrEeCyuzO0Wrez0BEi50ar5YWnqHK0MOyl1',0,17,24,22,1,6,0),(26,'ygutkowski','secret','flangosh@example.net','1987-04-04','Vm0N71Gum3e4GMYshdOX3s2nXSkhTZb4aGgXq5NX',1,33,12,18,45,5,0),(27,'myriam28','secret','ametz@example.org','1981-08-09','XpBNQXthgohL8KdXCrvHkWHDFpYuvlYF2lT7rnEH',1,46,15,26,6,5,1),(28,'collin.jast','secret','lpouros@example.com','1987-07-20','DmqspgXFWUQNVwMCTvJlmV54763rrjhxtVSW2e9F',0,9,47,14,23,3,1),(29,'jimmy09','secret','amitchell@example.net','2007-04-12','VmmvBRdSIcPerjTOkvcQw1ZgXc9A5TOdsGxeWPRW',1,22,30,20,22,2,1),(30,'nikolaus.patsy','secret','winnifred.beier@example.org','1981-09-16','BxCPZCWHNJVRMrGM2lz0DBOQvF8C6N0V6T2glziW',0,34,17,0,30,3,0),(31,'aryanna70','secret','schoen.valentina@example.net','1982-07-22','bMpQvm8Fr7zFsWJii3Uou7vPbYi3xiKMNcRRywya',1,26,50,32,44,3,1),(32,'qkuhlman','secret','schmitt.dakota@example.org','1992-03-02','sis0qVL44OUQE7VSdGhuSLB7nZUPI80eKFrjsPhf',0,20,45,47,45,2,1),(33,'forn','secret','jarrett71@example.net','1985-06-14','0e8E0DMEr61E3HU41wQPYmOFatB2cgKep9DfQjqE',0,1,13,11,8,2,1),(34,'ziemann.carol','secret','keely10@example.com','2007-06-09','HXeN8lsGGaFgPotacxaMeRi7mCvOyxLysUtj3zBV',0,22,26,25,48,6,1),(35,'lebsack.zelma','secret','tom70@example.com','1975-01-20','xUtutbxtvUq9qtAk1cRLfbDxahT5S4CitcgVy91X',1,30,50,40,33,2,0),(36,'rhyatt','secret','dkoch@example.org','1976-08-31','NxH9Yy32jFTuwQFthLS2VJQA2Un2K3WzlsDuOqBM',1,30,38,10,0,1,0),(37,'charlotte39','secret','johnson.ima@example.org','1998-01-08','xgYmcNYfEJuCYc6Od0krBFysKKwUGgRh5qWExDAZ',1,17,10,9,18,3,1),(38,'rossie95','secret','reuben65@example.net','2003-02-21','s2r7HquXCwQSnEoTkVZkSy5njXar6SZoxos8eOuN',0,29,10,40,4,3,1),(39,'gabrielle.shanahan','secret','irma54@example.com','1981-06-22','t5qZGxEoMdfIJjV7SrqFmpsN6g4efcpcLtLnoYEs',0,5,18,49,15,5,0),(40,'jcollier','secret','odach@example.net','1993-11-24','st6CMKZsnCPR9UJ8ogjQooXTE6DlBtA6aXwq6AJM',0,39,1,31,47,1,0),(41,'llind','secret','mayert.ola@example.net','2000-07-02','0lehGOGIpJfDaMb2BQD4gbO63L1pFjPnTiN3VQUb',0,37,41,19,1,1,1),(42,'susana62','secret','stanford29@example.org','1970-02-15','vjU0PRHAX7vyWatX2le9s5UiFXAIjr7K5GFN38Nh',0,19,14,5,19,2,0),(43,'abashirian','secret','corkery.franco@example.com','2003-05-14','u4mKyLLhfccQnffGqGnskT7TNb9Ma3o6m0gL41im',1,21,13,40,31,1,1),(44,'zola.schuster','secret','kunze.emanuel@example.org','1970-12-25','Lbf0bpjLplWsubG0bFPF9o3asIdSlB1H8eOcGAMo',0,11,40,43,16,6,0),(45,'celine54','secret','schmeler.coy@example.org','1993-09-28','Eh0azv8UhVZM6kxkqxQaBbrOj1Z2NyZLSz8JPwrU',0,42,9,9,37,3,0),(46,'walter.heathcote','secret','paxton.dickinson@example.net','2017-05-26','cR9ddLUOQeCXbT6rEuabduQ7a5SZ4ejF0jDGhkmJ',0,18,24,31,47,1,1),(47,'camren73','secret','shanon63@example.net','1999-11-14','0FnGf3lThVC4jYkffOjLlpaCBGgnioMKeK7La2Ra',0,22,6,37,47,1,1),(48,'lambert.franecki','secret','kaylie65@example.net','2006-03-17','6k0CyerjpwAirBKY63cI91ngTiKDwD5SME7Mu02G',1,17,37,3,25,1,0),(49,'destini41','secret','mavis46@example.net','1977-08-28','F1pEGz3GBUx7ulBEiJsN5a3BGvZ5ahLrmKrZgoJU',0,8,39,4,37,4,1),(50,'pearl09','secret','walker.kody@example.com','1974-07-07','wUHFmN3ygw3DoBOHoXKSMoyVJZUfs4owSVFySGbP',1,48,30,5,38,5,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacunas`
--

DROP TABLE IF EXISTS `vacunas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vacunas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Edad_aplicar` int(10) unsigned NOT NULL,
  `Costo` int(10) unsigned NOT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `vacunas_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `vacunas_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacunas`
--

LOCK TABLES `vacunas` WRITE;
/*!40000 ALTER TABLE `vacunas` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacunas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacunas_x_pacientes`
--

DROP TABLE IF EXISTS `vacunas_x_pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vacunas_x_pacientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idPaciente` int(10) unsigned NOT NULL,
  `idConsulta` int(10) unsigned NOT NULL,
  `idCentro_medico` int(10) unsigned NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `vacunas_x_pacientes_idpaciente_foreign` (`idPaciente`),
  KEY `vacunas_x_pacientes_idconsulta_foreign` (`idConsulta`),
  KEY `vacunas_x_pacientes_idcentro_medico_foreign` (`idCentro_medico`),
  CONSTRAINT `vacunas_x_pacientes_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`),
  CONSTRAINT `vacunas_x_pacientes_idconsulta_foreign` FOREIGN KEY (`idConsulta`) REFERENCES `consultas` (`id`),
  CONSTRAINT `vacunas_x_pacientes_idpaciente_foreign` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacunas_x_pacientes`
--

LOCK TABLES `vacunas_x_pacientes` WRITE;
/*!40000 ALTER TABLE `vacunas_x_pacientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacunas_x_pacientes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-09  3:24:37
