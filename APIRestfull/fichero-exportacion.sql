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
  `ocupado` int(11) NOT NULL,
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
  `Tipo_centro_medico` int(11) NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centro_medico`
--

LOCK TABLES `centro_medico` WRITE;
/*!40000 ALTER TABLE `centro_medico` DISABLE KEYS */;
INSERT INTO `centro_medico` VALUES (1,'Cormier','Iowa',3,2),(2,'Harber','Virginia',3,2),(3,'Carter','Wyoming',1,2),(4,'Stiedemann','Missouri',1,2),(5,'Altenwerth','Florida',0,2),(6,'Kovacek','New York',0,2),(7,'Daniel','Florida',1,2),(8,'Olson','Rhode Island',1,2),(9,'Greenfelder','South Carolina',0,2),(10,'Rosenbaum','Florida',0,2),(11,'AlexMedic','Priv. Emperador Numero 5',3,2);
/*!40000 ALTER TABLE `centro_medico` ENABLE KEYS */;
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
INSERT INTO `enfermeras` VALUES (1,'Armstrong','Schamberger','M',28,'1tmgUipTOX','Georgia',7,1),(2,'Rohan','Legros','F',39,'D1r0BMWqUp','Hawaii',5,1),(3,'Cronin','Mitchell','F',27,'cxiSkCG8vk','Illinois',9,1),(4,'Wyman','Torphy','M',26,'ZmHyo5SjmK','Connecticut',4,1),(5,'Goldner','Kris','F',35,'84fOYv30E8','Connecticut',7,1),(6,'D\'Amore','Heaney','M',30,'2GMF8ZD6ii','South Dakota',7,1),(7,'Beatty','Kuhlman','M',31,'XENwNeYYDz','West Virginia',3,1),(8,'Yundt','Sanford','M',33,'2AZnJkmpEm','Texas',5,1),(9,'Schultz','Altenwerth','F',40,'Et9Omzrsqa','Wyoming',4,1),(10,'Adams','Welch','M',26,'ccK1I9VMcL','Idaho',6,1),(11,'Gibson','Heathcote','F',30,'0XzAH6Vwvc','Tennessee',9,1),(12,'Wolff','Glover','M',40,'kh6TYRMYcq','Rhode Island',3,1),(13,'Cummerata','Sporer','M',34,'9J2BXb3IYf','Massachusetts',9,1),(14,'Goodwin','Turcotte','F',23,'WP3tQVOoOC','Delaware',8,1),(15,'Crona','Koelpin','F',37,'pTflVb4Cqz','Arkansas',7,1),(16,'O\'Conner','Runolfsdottir','M',29,'eK5m6IvPwJ','Kansas',5,1),(17,'Predovic','Bauch','M',35,'6XHcLdSPcO','Maine',5,1),(18,'McLaughlin','Bashirian','F',29,'8Jpt3Hb7PA','Wyoming',7,1),(19,'Emmerich','Schmidt','M',22,'g1KJYOaPJT','Massachusetts',2,1),(20,'Maggio','Yundt','F',20,'AmLer9XtQi','Georgia',10,1),(21,'Considine','Walter','F',34,'OExLNCiblh','Wyoming',5,1),(22,'Gislason','Schaden','M',27,'RTAILnmQGs','Wisconsin',6,1),(23,'Schinner','Bergstrom','F',34,'1nEYgJb80L','New Jersey',2,1),(24,'Wyman','Sawayn','M',33,'NfKQPKhmOr','Kentucky',7,1),(25,'Hudson','Lubowitz','F',40,'XQjsEvi1cq','Georgia',4,1),(26,'Rohan','Moen','F',29,'fiy37JHDEL','Michigan',5,1),(27,'Dooley','Treutel','F',27,'S6cPzJ8oPt','District of Columbia',2,1),(28,'Champlin','Mann','M',34,'1eLFPcIqpz','Massachusetts',7,1),(29,'Cruickshank','Kuhlman','F',20,'rrNkM2sekM','Maine',2,1),(30,'Bergnaum','Bosco','M',31,'vDtYKGeeiS','Indiana',4,1),(31,'Cremin','Gusikowski','F',25,'UNkaT4ZOSs','California',8,1),(32,'Macejkovic','Gusikowski','F',36,'VsEJcuV1F3','Utah',2,1),(33,'Cummings','Cassin','F',24,'gwrdE67NU3','Washington',4,1),(34,'Moen','Johnson','M',24,'fwXh6J4fSM','Maine',7,1),(35,'Borer','Ryan','F',37,'jGqX2GUCah','Iowa',1,1),(36,'Stoltenberg','Welch','M',25,'gxD9ss8U3u','Ohio',3,1),(37,'Kautzer','Gottlieb','M',29,'l0S76K9AkH','Wisconsin',5,1),(38,'Becker','Turcotte','M',22,'YDIa9rd9kp','District of Columbia',3,1),(39,'Abbott','Dare','M',21,'1cY6tupZDj','Maryland',4,1),(40,'Nienow','Harvey','M',31,'cS7urVyCtV','Alaska',2,1),(41,'Feest','Senger','F',28,'abxZAlcMFt','Massachusetts',5,1),(42,'Gusikowski','Hagenes','M',26,'8auCk19Ers','Illinois',3,1),(43,'Lind','Lueilwitz','F',30,'xuqLWR5oYi','West Virginia',8,1),(44,'Bednar','Bogan','M',40,'AEAaVZ0jpI','Idaho',7,1),(45,'Balistreri','Herman','F',31,'orwCYTIH7j','Kansas',4,1),(46,'Goodwin','Larkin','M',27,'eXtHCxeZiH','Oklahoma',4,1),(47,'McCullough','Romaguera','F',28,'mG0O6e5hla','North Dakota',5,1),(48,'Wisoky','Runte','F',20,'Up4ndLfbng','Alabama',2,1),(49,'Schroeder','Stoltenberg','F',34,'ZpzyoCFe9f','New York',8,1),(50,'Kassulke','Schroeder','F',37,'fQNA8Ack6E','Pennsylvania',3,1);
/*!40000 ALTER TABLE `enfermeras` ENABLE KEYS */;
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
INSERT INTO `medicos` VALUES (1,'Kuhlman','Steuber','Kautzer, Lebsack and Volkman','M',26,'qXAM8eSaf4','Alaska',1,1),(2,'Streich','Will','Heaney Ltd','F',34,'Bkm2e9kLVD','Nebraska',7,0),(3,'Stark','Greenfelder','Robel-Barton','F',35,'KDjquSXH10','Arizona',8,1),(4,'Lehner','Crist','O\'Hara LLC','M',23,'tO55zkGW07','North Carolina',10,1),(5,'Bosco','Deckow','Rogahn-Runte','M',37,'YD5iZVStsg','Nebraska',8,1),(6,'Dibbert','Greenholt','Jast Group','F',23,'3YPTztTYIi','Massachusetts',1,1),(7,'Johnson','Reinger','Bogan-Rice','F',26,'BHBcDaHgYZ','Massachusetts',10,0),(8,'Padberg','Sanford','Ullrich Inc','F',36,'HTozNgSRyq','Louisiana',4,1),(9,'Howell','Gleichner','Kerluke Ltd','M',29,'gjrLCXZ59h','North Dakota',4,0),(10,'Lesch','Schneider','Schaefer-Reinger','M',32,'CxXHsR68NM','Massachusetts',10,0),(11,'Bosco','Pagac','Hayes Group','F',29,'rWn94EUz91','Louisiana',4,1),(12,'Rosenbaum','Mitchell','Cummerata-Ziemann','F',20,'x4gdobiPB8','Oklahoma',5,0),(13,'Goyette','Waters','Von PLC','F',21,'3BxaEWn0wz','Connecticut',8,1),(14,'Paucek','Blanda','Kshlerin PLC','F',37,'pns8pX5BRF','West Virginia',6,0),(15,'Herzog','Brakus','Herzog, Brakus and Boyer','M',29,'LT1O86VkrP','Kansas',5,1),(16,'Hudson','Bergstrom','Beahan Group','F',39,'JFiiW4xvhn','Montana',9,0),(17,'Murazik','Walter','Kohler, Hermiston and Schmeler','F',38,'9e5OSc5oLF','Iowa',6,0),(18,'Kunde','Bednar','Powlowski PLC','F',34,'K2ZdmluqPu','Tennessee',2,1),(19,'Windler','Mitchell','Upton, Koelpin and Prohaska','F',38,'NxDzfHwGdq','Delaware',2,1),(20,'Skiles','Gaylord','Greenfelder, Deckow and Schoen','F',21,'qJrlwaYsvo','Oregon',3,0),(21,'Ritchie','O\'Hara','Tillman-Gorczany','M',36,'ceTOgtjEBA','Connecticut',1,0),(22,'Osinski','Rodriguez','Heidenreich-Schinner','F',23,'0N4bSf61DV','New Mexico',10,1),(23,'Ratke','Prohaska','Fritsch Ltd','M',31,'fc4XPNKgPX','Florida',8,1),(24,'Johnson','Becker','Nader-Satterfield','F',35,'WuhdXekY0q','Washington',6,1),(25,'Quitzon','Morissette','Renner, Buckridge and Reinger','F',39,'yRQlZLa5k2','Wyoming',1,0),(26,'Davis','Donnelly','Mills, Ledner and Gaylord','F',28,'N91aCAY9Be','New Mexico',5,0),(27,'Schamberger','Pagac','Bogisich-O\'Kon','F',23,'nCN9N71fGy','Hawaii',10,1),(28,'Upton','Boyle','Lueilwitz-Towne','F',38,'EtAvaBm7Do','Oklahoma',10,0),(29,'Welch','Hettinger','Bernier, Schroeder and Wisozk','M',20,'Cgt57bopzb','Hawaii',5,0),(30,'Cronin','Koch','Marks PLC','M',29,'sN1U5tQMHf','Alaska',4,0),(31,'Hilpert','Weissnat','Zieme, West and Haag','M',27,'zSFqgdKp6M','Ohio',6,0),(32,'Predovic','Cruickshank','Rogahn, Dickinson and O\'Hara','F',37,'dtNXDH1u5o','Wyoming',3,0),(33,'Rosenbaum','Fahey','Gottlieb, Schuster and Spencer','M',27,'LkHzPaceTb','Virginia',4,1),(34,'Berge','Morar','Bosco and Sons','M',40,'k3gdzXBRlK','Connecticut',4,1),(35,'Carter','Weissnat','Skiles-Kassulke','M',32,'stoZgHDvMM','Alabama',10,1),(36,'Fisher','Rau','Bruen, Schaefer and Gutkowski','F',20,'UBfnNGcqnl','New Jersey',10,1),(37,'Zulauf','Greenholt','Satterfield, Pfannerstill and Bernhard','F',40,'qimDndihfT','Iowa',4,1),(38,'Parisian','Smith','Feest Ltd','F',26,'ugb2qw2HhN','Indiana',9,1),(39,'Bailey','Kuhlman','Bauch, Feeney and Heaney','F',39,'wxAHS0trXB','Wisconsin',1,1),(40,'Windler','Veum','Bailey LLC','F',22,'RCvEQjxfbg','Ohio',6,1),(41,'Quigley','Barton','Stracke-Hilpert','M',22,'2ezZ11Hu50','Missouri',7,0),(42,'Bosco','Hoeger','Lindgren and Sons','F',26,'nTRbwaxAYy','Minnesota',8,1),(43,'Dickens','Skiles','Keebler-Quigley','F',31,'z1DHE3BIYD','Hawaii',4,1),(44,'Rippin','Trantow','Aufderhar LLC','F',39,'jmD7OaEjOU','Nevada',6,1),(45,'Satterfield','Nitzsche','Vandervort-Erdman','M',35,'VLBnua6hL4','Connecticut',1,0),(46,'Jones','Larkin','Schmeler, Stokes and Walsh','M',23,'0mPwENdbjG','Kentucky',10,0),(47,'Walker','Goldner','Rowe PLC','F',33,'8g0WI8rZsD','Massachusetts',1,0),(48,'Halvorson','Beahan','McDermott Ltd','F',40,'oIulcvgUc3','Michigan',8,0),(49,'Wilderman','Runolfsdottir','Schultz-Hermann','F',24,'6vK6FaL5Xm','Illinois',7,1),(50,'Maggio','Crooks','Waelchi, Rohan and Ziemann','F',22,'1mfkqRnKfh','Pennsylvania',10,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2018_04_03_014247_create_centro_medicos_table',1),(2,'2018_04_03_014417_create_infrestructura__centro_medicos_table',1),(3,'2018_04_03_015257_create_camas_x_pisos_table',1),(4,'2018_04_03_015333_create_medicos_table',1),(5,'2018_04_08_195846_create_tipo_usuarios_table',1),(6,'2018_04_08_222201_create_enfermeras_table',1),(7,'2018_04_09_003924_create_pacientes_table',1),(8,'2018_04_09_496414_create_usuarios_sistemas_table',1),(9,'2018_04_09_502529_create_suscripciones_table',1);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (1,'Rosenbaum','Monahan','2221714946','M',37,'South Dakota','7uXV','1973-09-06',5,0),(2,'Schimmel','McLaughlin','2221034037','M',33,'New Jersey','Vgs4','2006-09-27',2,0),(3,'Koelpin','Stoltenberg','2461034037','F',23,'Oregon','ckUJ','2005-09-01',4,0),(4,'Bayer','Stamm','2461034037','M',28,'South Carolina','nZH6','1982-07-16',3,0),(5,'Moen','Larson','2221714946','F',20,'Alaska','TlUS','1996-02-08',2,1),(6,'Ratke','Pfeffer','2461034037','M',28,'New Hampshire','Muu1','1983-04-09',4,0),(7,'Hodkiewicz','Leuschke','2221714946','M',34,'Montana','6Dve','2011-12-24',5,1),(8,'Stanton','Cronin','2221034037','M',22,'Missouri','TuWK','1991-09-07',4,0),(9,'Osinski','Johns','2221034037','M',20,'South Carolina','MZJD','1992-05-25',2,1),(10,'Lakin','Steuber','2221034037','M',20,'Michigan','negZ','2007-10-07',5,1),(11,'Yost','Herzog','2221034037','F',37,'Illinois','G32V','1977-09-14',3,1),(12,'DuBuque','Jenkins','2221714946','M',29,'Wisconsin','TIIQ','2002-07-26',6,0),(13,'Berge','Haley','2461034037','M',39,'Rhode Island','c3Fm','1988-06-09',8,1),(14,'Pollich','Ledner','2221714946','F',26,'Idaho','JGmz','2003-05-09',6,1),(15,'Dibbert','Schmitt','2461034037','M',37,'Hawaii','3c33','1980-05-16',7,0),(16,'Quitzon','Dach','2461034037','F',25,'New Jersey','321P','1989-02-14',6,0),(17,'Thiel','McLaughlin','2461034037','F',23,'Rhode Island','AUWJ','1984-08-15',3,0),(18,'Gutkowski','Rodriguez','2461034037','F',27,'Maine','c9DJ','2005-05-05',2,1),(19,'Feil','Runolfsdottir','2221714946','M',35,'Iowa','vZaC','2008-02-13',8,0),(20,'Olson','McDermott','2221034037','F',29,'Florida','MkUX','2003-03-31',1,1),(21,'Aufderhar','Schinner','2221714946','F',38,'Utah','1WWL','1971-12-19',2,1),(22,'Homenick','Wuckert','2221034037','M',26,'North Dakota','i1WZ','1970-10-03',8,1),(23,'Streich','Robel','2221714946','F',24,'New Mexico','0suw','2008-11-16',8,1),(24,'Shields','Wyman','2221714946','F',34,'Maryland','cvgt','1978-11-04',3,0),(25,'Goyette','Boyle','2221034037','M',36,'Oklahoma','pevd','1989-12-04',5,0),(26,'Fritsch','Kautzer','2221034037','F',20,'North Carolina','RWP7','1981-09-02',7,1),(27,'Reichert','Kilback','2221714946','M',35,'Mississippi','4a63','1980-01-16',6,0),(28,'Senger','Towne','2221714946','M',33,'North Dakota','GsPL','1973-10-31',6,0),(29,'Ebert','Kovacek','2461034037','M',34,'Maine','OeYt','1981-06-04',10,0),(30,'Harber','Douglas','2221034037','M',34,'Tennessee','J5is','1984-06-15',6,0),(31,'Mills','Robel','2221034037','M',32,'Virginia','sUWU','1999-12-16',7,0),(32,'Spencer','Senger','2221034037','M',38,'Maine','vz2I','1978-02-13',6,0),(33,'Langosh','Kuhn','2461034037','M',30,'Wyoming','XdMs','1991-10-21',9,0),(34,'Steuber','McClure','2461034037','M',25,'Michigan','DLhG','2006-05-21',1,1),(35,'Howe','Gutkowski','2221714946','F',37,'Connecticut','VmTP','1991-10-04',10,1),(36,'Daniel','Hessel','2221034037','M',20,'California','kTsF','1980-07-06',2,0),(37,'Gleason','Hamill','2221034037','F',26,'Nevada','RMUi','1999-10-11',4,1),(38,'Ruecker','Gaylord','2221034037','F',39,'New Mexico','BUjL','2013-08-08',3,1),(39,'Schulist','Kuvalis','2461034037','M',20,'Michigan','Okqx','2013-08-25',8,0),(40,'Schaefer','Runolfsdottir','2221034037','F',36,'Colorado','90aP','1972-11-29',2,0),(41,'Kihn','Hagenes','2461034037','F',31,'Arizona','3lrI','2005-01-07',9,0),(42,'Ratke','Feil','2221034037','F',32,'Florida','f93S','1980-03-07',2,1),(43,'Keeling','Kuphal','2461034037','F',40,'Colorado','PfF5','2002-11-09',1,1),(44,'Schumm','Lindgren','2221034037','M',20,'Connecticut','rDKd','1973-02-21',3,0),(45,'Abernathy','Denesik','2221034037','F',30,'South Dakota','1y34','1970-02-21',10,0),(46,'Nienow','Halvorson','2221714946','M',27,'Wisconsin','1Eiy','1991-12-16',10,0),(47,'Block','Ledner','2221034037','F',32,'North Dakota','CBGy','1978-08-27',7,1),(48,'Jenkins','Luettgen','2221714946','F',35,'Maryland','PZAY','1988-08-12',7,0),(49,'Hills','Krajcik','2221714946','F',25,'Ohio','xGHz','1993-09-10',2,1),(50,'Murphy','Mosciski','2461034037','F',23,'Arizona','lsKF','1994-03-15',4,1);
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suscripciones`
--

DROP TABLE IF EXISTS `suscripciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suscripciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Tipo_suscripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  CONSTRAINT `suscripciones_idusuarios_sistema_foreign` FOREIGN KEY (`idUsuarios_sistema`) REFERENCES `usuarios_sistema` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suscripciones`
--

LOCK TABLES `suscripciones` WRITE;
/*!40000 ALTER TABLE `suscripciones` DISABLE KEYS */;
INSERT INTO `suscripciones` VALUES (1,'1','Stanton','Roob','1975-10-05','FVzIua8wgX',2,23,0),(2,'1','Price','Witting','1989-05-29','kZZaGtLdbl',6,15,2),(3,'1','Walter','Kulas','2004-11-28','BqqaJPu03j',3,22,0),(4,'2','Donnelly','Pouros','2008-11-19','iLOHhjODNx',1,12,0),(5,'2','Boyer','Mayert','2002-08-26','S4fYgqJVPf',7,21,1),(6,'2','Torphy','Kris','2003-11-14','eOq9vlS4YN',1,10,0),(7,'2','Keebler','Auer','1983-07-29','hHMMyUcnAV',5,34,0),(8,'3','Mann','Bauch','1975-11-05','iYCHgmg6lT',8,2,0),(9,'3','Anderson','Green','2003-08-06','VTMCaqEmWr',3,0,1),(10,'2','Considine','Hettinger','1998-07-13','55i3wZJA85',9,30,0),(11,'2','Alejandro','Rodriguez','2018-02-02','qwertyu',2,2,1),(12,'2','Alejandro','Rodriguez','2018-02-02','qwertyu',2,2,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Administrador',1),(2,'Medico',1),(3,'Enfermera',1),(4,'Paciente',1);
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_sistema`
--

DROP TABLE IF EXISTS `usuarios_sistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_sistema` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  KEY `usuarios_sistema_idcentro_medico_foreign` (`idCentro_medico`),
  KEY `usuarios_sistema_idmedico_foreign` (`idMedico`),
  KEY `usuarios_sistema_idenfermera_foreign` (`idEnfermera`),
  KEY `usuarios_sistema_idpaciente_foreign` (`idPaciente`),
  KEY `usuarios_sistema_idtipo_usuario_foreign` (`idTipo_usuario`),
  CONSTRAINT `usuarios_sistema_idcentro_medico_foreign` FOREIGN KEY (`idCentro_medico`) REFERENCES `centro_medico` (`id`),
  CONSTRAINT `usuarios_sistema_idenfermera_foreign` FOREIGN KEY (`idEnfermera`) REFERENCES `enfermeras` (`id`),
  CONSTRAINT `usuarios_sistema_idmedico_foreign` FOREIGN KEY (`idMedico`) REFERENCES `medicos` (`id`),
  CONSTRAINT `usuarios_sistema_idpaciente_foreign` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`id`),
  CONSTRAINT `usuarios_sistema_idtipo_usuario_foreign` FOREIGN KEY (`idTipo_usuario`) REFERENCES `tipo_usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_sistema`
--

LOCK TABLES `usuarios_sistema` WRITE;
/*!40000 ALTER TABLE `usuarios_sistema` DISABLE KEYS */;
INSERT INTO `usuarios_sistema` VALUES (1,'Stiedemann','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','kenton96@example.net','2007-12-08','jSxQ67bYIHagzn86OKDxGAVlNG89wy2ECuJSeZDO',0,31,34,0,38,1,0),(2,'Champlin','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','qrippin@example.com','1982-11-05','tUtj4KKVuceMIWpccX0SzG380SIZeKPQJKsVcyyV',1,19,5,23,1,3,1),(3,'Beahan','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','russel.syble@example.net','2018-01-24','MT78WvNwNyxEM7QPP9bBqj1JBu4VdFl3TKyYgjaJ',0,23,26,38,36,2,0),(4,'Rogahn','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','gina.bins@example.net','2008-05-29','5JIjdNNYJKuch3v3djJkYKHshLeR70dVBtMIDtoz',1,10,45,13,47,3,1),(5,'Purdy','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','america.oreilly@example.com','1991-05-14','k6eSLgIIVFmrtjeiOopd5caR3nKDzQ64g53YUqtP',1,8,35,9,12,3,1),(6,'Feest','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','anais.fadel@example.net','2000-06-11','fFqI17aKci8ImaZgKrdN5h07P6UG3tEL1WqTLMfs',1,12,14,3,38,3,0),(7,'Stanton','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','kiehn.lina@example.com','1996-12-03','46fbV58iEin3gwTyvxIiYIKUTiPN8xnJnXrCsqhv',0,17,2,27,9,5,0),(8,'Krajcik','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','annamae85@example.org','1977-03-14','7Ntyd5EywLF9ZCy0JMLC0qy81SUOKlw8pZtf0EnE',0,1,18,29,19,4,0),(9,'Fadel','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','fritchie@example.net','2012-12-13','SHIzdPhPNyHP32xJYDouRAk9wdOTHVEIBwJchJuO',0,13,39,19,21,3,0),(10,'O\'Keefe','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','stehr.kaleigh@example.com','2010-12-28','p2Z7EnBf2i9smhfXtmjppIug4UjIFdpVJBBb0wTP',0,6,48,37,38,2,1),(11,'Glover','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','dina46@example.org','2008-10-05','pGhw7s82sSuO1U4kAR1mznHq6ryJ4hInAOy7CzsL',1,31,37,10,25,0,0),(12,'Mueller','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','bruce77@example.com','1971-12-01','NYJAoaJnTqRnTdBlIV8fECwW2uESd6mZysOaWIhG',1,12,28,19,21,3,1),(13,'Bogan','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','lynch.jaron@example.net','2005-10-30','a2vwEdtUi8sNGFPgykskOs5Dg5uYz0t3NfkjOiPX',0,22,42,46,50,2,0),(14,'Walter','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','osborne91@example.net','1976-04-05','PHvmefbWdC9ayDkQswsEeSEpKkCQVWXXTXhW1C1H',1,13,11,42,28,1,0),(15,'Marks','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','chyna76@example.net','1987-01-24','2EDshRgZbs78robU3YNOrN4uYqRULtGB0WPdlenm',1,13,23,16,33,1,1),(16,'Kovacek','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','kole.rohan@example.org','1977-04-04','BJeqVHaByx4CAA9rlFIeX0PEy1KpMFR7vjHgWNHx',1,13,37,4,41,1,1),(17,'Stokes','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','dina.jast@example.org','2016-11-27','Xgq4Ey5kyPYJ8AKlVuqhFSG1edqAQasAqDYVOG0J',1,45,38,7,48,2,1),(18,'Armstrong','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','olson.osbaldo@example.net','1987-06-25','GaH7Xr94ZQjQ2y7kmEHBX6BcNIgsYeNeDeDwQJci',0,0,26,16,44,2,1),(19,'Beier','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','jamison.feest@example.net','1971-12-25','oS5dUdHmf7L00DQy5AzLqUUzDuvfv6pV2IorSM0R',0,42,26,3,28,4,1),(20,'McDermott','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','scot26@example.com','2012-12-27','pi6OuJrMCRFdttPF3D3UrAYJ74DQaCFWV9MH5rMn',1,39,34,27,32,4,1),(21,'Gottlieb','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','buckridge.javon@example.net','2008-02-22','TjUcU6T2v7AKYzhTtIzvsq6OYmPwTPCO4mzNo1bR',1,39,11,34,0,2,0),(22,'Oberbrunner','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','wehner.stefan@example.org','2000-02-06','lbo050JI48PV2605xLE0586fblbEOQLsFD3KlIMU',1,34,50,9,10,3,0),(23,'Connelly','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','terence28@example.org','1975-03-04','NTs0GN77Xkao3HFBpFQW19WugQxhGQJFvz51Fce2',0,31,23,33,5,4,1),(24,'Hamill','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','wilford99@example.net','2005-12-12','6kQ1bvHP6XpmUHV8F3Pl9Vqf1N8d6V63qQKueOL9',0,27,40,19,15,5,0),(25,'Hartmann','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','reinger.sean@example.org','1995-05-01','Rqhlz8ey9zv8A6o6apKhcUjYbct7NRSzw7rrmLkX',1,14,37,39,44,2,1),(26,'Wilkinson','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','muriel.okuneva@example.net','2006-11-20','Xh22uF3uxvbtuADcEFLDuRyeE71RMLwD7xILOs4h',1,41,0,46,33,3,0),(27,'Barton','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','alexa.hammes@example.com','1996-07-30','FF1kUIlBGBHTxkohz3FOMTjW7a0Eb4dlb3PQA6ct',0,18,38,41,4,5,1),(28,'Raynor','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','charity.feeney@example.org','1999-04-03','0ohx6NMpXnBH5RJHuf4rmpKTyCxE9UYdEJmUO5q7',1,36,40,34,2,0,1),(29,'Gottlieb','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','bratke@example.org','1978-03-24','ZqWuMLVdh9f7Dve4TWBmZG1QkPlZD4pgcdEbaATk',0,40,36,11,9,3,0),(30,'Gislason','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','hyatt.avery@example.org','1976-01-18','lhktcVPc8CG5XlGJuqSogd0iZfHCz8G6xoXxmVVC',0,31,19,20,41,5,0),(31,'Lynch','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','earnest01@example.com','2008-08-30','ry1s3J8AihtwieV1LXmjCfQNvexBR9AlDTTAF70i',0,2,44,35,26,5,1),(32,'Jacobson','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','omari.jacobi@example.net','1998-10-19','XrakP7kS9yN5b7fA3UGjwcsM938mfa0049pXCQsV',0,15,21,20,30,5,1),(33,'Lind','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','ireilly@example.net','2016-08-30','tiMlF0kL6qUn5JzOfLJwZKuCk7uHqQXkCJsGgJfj',1,15,11,37,15,3,1),(34,'Nader','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','drew80@example.com','1990-02-11','swP0txgRQDsu4KwW15tmDm9IpNJ5NRLJ8YchLfrY',1,44,5,14,20,5,1),(35,'Koss','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','oconnell.viviane@example.net','1972-09-21','gKp9wJFHHREPYigbQcFPXePhXeo5afgM51bkAlCr',0,42,9,20,16,0,1),(36,'Russel','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','schamberger.elisa@example.org','2010-11-30','AonrQaVt6PnxPnDCmY8uihUe7aPdzZ62qh2QWyWJ',0,17,45,16,13,5,1),(37,'Bartoletti','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','kautzer.valerie@example.com','1982-05-23','Jfp1pEoXywBU7KrlGugYPs82YLnOm5qm1ODklmBW',0,20,29,35,22,1,0),(38,'Halvorson','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','frami.edwardo@example.org','1974-04-27','1ybhjh30GKsIBdRzaP1HEbwZgeOPTfXVRkfXjS6R',0,21,44,44,50,1,1),(39,'Bogisich','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','oryan@example.net','2016-03-10','3bOGRVlGa8YPtV9R8LtNNPopD4vjzFllvBz4Igei',1,39,0,35,10,5,1),(40,'Ortiz','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','laurine.lowe@example.com','1976-10-18','Zme0prJU2MveKT83MDlBb3YR3pnVvtyVIsxiowEu',1,21,47,31,42,4,1),(41,'Lesch','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','ryley20@example.net','2002-11-19','9GXpGEYjNUOJohM09FVrWQnOLhOjFjzS9JF1QBl9',0,17,25,14,13,4,1),(42,'Zboncak','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','zachariah.blick@example.org','1978-01-25','0u2q14m8jZP5PGmL1FfeSgJPNgnIJmhvTQywDJKW',1,49,16,6,12,0,1),(43,'Barton','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','nwilkinson@example.net','2002-06-01','5UfQMkCsEU59F3ICN6b96N0bSARvwPTHnUGdmGBc',0,36,2,1,27,2,1),(44,'Goyette','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','wolff.clay@example.net','1975-09-02','i6eDwSFXidTBOIb4jfm5ZyimOxnjCuANPisQhqG5',1,30,25,48,27,3,1),(45,'Mosciski','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','burnice26@example.net','1971-09-28','dnf34Q78PiVCPEwyiHkNXMOdzrnmvMnNSqhuKe4s',0,30,21,40,41,4,1),(46,'Kuvalis','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','celia75@example.com','1986-12-31','F6GZArzjJGfcW3qVdv63MCFp5IzDanwXztUB5TUD',0,7,13,24,34,0,0),(47,'Koepp','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','marietta.mann@example.org','1997-08-11','uvONeAT31bRlgeH76Hw3moIPEB3apshXjZ0IYnIY',0,16,21,39,1,1,1),(48,'Kihn','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','green72@example.org','2001-09-23','Ikdng6nGSRFkPeJlMkp0at8TRklh5xUIYz5m5vmQ',1,20,11,12,42,3,0),(49,'Koepp','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','addison65@example.net','1975-09-07','PXMXuP5372Qxkmntg57aGLuQTtRxSUwMDYL1owMW',1,16,34,28,25,2,0),(50,'Buckridge','$2y$10$h0ITxLLNdlDMeCn3qZprIuZCu7fuFBbItg.U/f3L/FZcQVeUb5kIm','feest.reagan@example.org','1993-12-23','7VjcpQzqh6zZ0X9FfEVY4UV0bQrOuBn0RtscUTUL',1,28,9,11,31,2,0);
/*!40000 ALTER TABLE `usuarios_sistema` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-20  1:11:19
