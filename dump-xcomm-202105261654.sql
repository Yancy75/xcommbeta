-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: xcomm
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `bancotipopagoinfo`
--

DROP TABLE IF EXISTS `bancotipopagoinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bancotipopagoinfo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `entidad_id` bigint(20) unsigned DEFAULT NULL,
  `tipo_pago` enum('efectivo','cheque','transferencia') COLLATE utf8mb4_unicode_ci DEFAULT 'efectivo',
  `comentario_efectivo` text COLLATE utf8mb4_unicode_ci,
  `nombre_cheque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `comentario_cheque` text COLLATE utf8mb4_unicode_ci,
  `numero_cuenta` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `nombre_transferencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `rnc` int(11) DEFAULT '0',
  `comentario_transferencia` text COLLATE utf8mb4_unicode_ci,
  `estatus` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bancotipopagoinfo_entidad_id_foreign` (`entidad_id`),
  CONSTRAINT `bancotipopagoinfo_entidad_id_foreign` FOREIGN KEY (`entidad_id`) REFERENCES `entidadbancarias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bancotipopagoinfo`
--

LOCK TABLES `bancotipopagoinfo` WRITE;
/*!40000 ALTER TABLE `bancotipopagoinfo` DISABLE KEYS */;
INSERT INTO `bancotipopagoinfo` VALUES (1,3,'efectivo','Procedimientos pagos efectivo','Carlos Tejada','Procedimientos pagos en cheques','123456789','Juan Perez',987654321,'Procedimientos pagos en transferencia','active','2019-11-22 20:31:06','2019-11-22 22:52:56'),(2,1,'efectivo','Pagar en efectivo en la surcusal','BHD Cheque','Deposita el cheque','99998888','BHD Transferencia',1728394,'Transferir al BHD','active','2021-01-18 22:36:09','2021-01-18 22:36:09');
/*!40000 ALTER TABLE `bancotipopagoinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cambiodivisas`
--

DROP TABLE IF EXISTS `cambiodivisas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cambiodivisas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `entidadbancarias_id` bigint(20) unsigned NOT NULL,
  `dolar_venta` double(8,2) NOT NULL,
  `dolar_compra` double(8,2) NOT NULL,
  `inventario_dolar` decimal(10,2) DEFAULT NULL,
  `euro_venta` double(8,2) NOT NULL,
  `euro_compra` double(8,2) NOT NULL,
  `inventario_euro` decimal(10,2) DEFAULT NULL,
  `rango_inicial` double(14,2) DEFAULT NULL,
  `rango_final` double(14,2) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cambiodivisas_entidadbancarias_id_foreign` (`entidadbancarias_id`),
  CONSTRAINT `cambiodivisas_entidadbancarias_id_foreign` FOREIGN KEY (`entidadbancarias_id`) REFERENCES `entidadbancarias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cambiodivisas`
--

LOCK TABLES `cambiodivisas` WRITE;
/*!40000 ALTER TABLE `cambiodivisas` DISABLE KEYS */;
INSERT INTO `cambiodivisas` VALUES (1,5,50.00,40.00,NULL,70.00,60.00,NULL,100.00,1000.00,'active','2019-09-18 08:13:13','2020-08-12 02:37:00'),(2,1,12.00,10.00,3000000.00,14.00,13.00,2000000.00,200.00,3000.00,'active','2019-09-24 05:07:34','2021-02-18 03:00:37'),(3,3,81.00,80.00,0.00,83.00,82.00,1000.00,300.00,3000.00,'active','2019-09-24 05:08:24','2021-02-18 04:11:08'),(4,5,102.00,100.00,NULL,202.00,200.00,NULL,5000.00,10000.00,'active','2020-08-12 02:21:48','2020-08-12 02:21:48'),(5,1,102.00,100.00,NULL,202.00,200.00,NULL,5000.00,16000.00,'active','2021-01-15 03:22:32','2021-01-22 00:50:51');
/*!40000 ALTER TABLE `cambiodivisas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cancelinfos`
--

DROP TABLE IF EXISTS `cancelinfos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cancelinfos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transaccion_id` bigint(20) unsigned DEFAULT NULL,
  `cliente_id` bigint(20) unsigned DEFAULT NULL,
  `cambiodivisa_id` bigint(20) unsigned DEFAULT NULL,
  `info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_transaccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cancelinfos_transaccion_id_foreign` (`transaccion_id`),
  KEY `cancelinfos_cliente_id_foreign` (`cliente_id`),
  KEY `cancelinfos_cambiodivisa_id_foreign` (`cambiodivisa_id`),
  CONSTRAINT `cancelinfos_cambiodivisa_id_foreign` FOREIGN KEY (`cambiodivisa_id`) REFERENCES `cambiodivisas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cancelinfos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cancelinfos_transaccion_id_foreign` FOREIGN KEY (`transaccion_id`) REFERENCES `transaccions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cancelinfos`
--

LOCK TABLES `cancelinfos` WRITE;
/*!40000 ALTER TABLE `cancelinfos` DISABLE KEYS */;
INSERT INTO `cancelinfos` VALUES (1,NULL,1,1,'No tengo','creado_cliente','active','2019-10-20 20:00:46','2019-10-20 20:00:46'),(2,NULL,1,2,'No tienen lo que necesito','creado_cliente','active','2019-10-20 20:04:29','2019-10-20 20:04:29'),(3,2,1,3,'Monto Incorrecto','creado_cliente','active','2019-11-13 01:17:50','2019-11-13 01:17:50'),(4,3,1,3,'No lo quiero','autorizado_banco','active','2019-11-18 00:42:41','2019-11-18 00:42:41'),(5,NULL,1,3,'Error','creado_cliente','active','2019-11-22 23:08:56','2019-11-22 23:08:56'),(6,NULL,1,3,'Prueba','creado_cliente','active','2019-11-22 23:42:18','2019-11-22 23:42:18'),(7,5,1,3,'Prueba nueva','creado_cliente','active','2019-12-11 23:00:58','2019-12-11 23:00:58'),(8,NULL,1,1,'pueba','creado_cliente','active','2020-01-28 02:15:26','2020-01-28 02:15:26'),(9,NULL,1,3,'Prueba Load File','creado_cliente','active','2020-02-11 23:06:26','2020-02-11 23:06:26'),(10,NULL,1,3,'Prueba Load File','creado_cliente','active','2020-02-11 23:06:39','2020-02-11 23:06:39'),(11,NULL,1,3,'PUreba upload','creado_cliente','active','2020-02-11 23:10:40','2020-02-11 23:10:40'),(12,NULL,1,3,'Prueba','creado_cliente','active','2020-02-11 23:12:01','2020-02-11 23:12:01'),(13,NULL,1,2,'confirmacion','creado_cliente','active','2020-03-19 23:49:15','2020-03-19 23:49:15'),(14,NULL,1,2,'confirmar','creado_cliente','active','2020-03-20 00:04:40','2020-03-20 00:04:40'),(15,14,1,1,'ds','creado_cliente','active','2020-03-22 02:00:50','2020-03-22 02:00:50'),(16,15,1,1,'Probando cancelacio desde Xcomm','Activo','active','2020-04-14 23:26:23','2020-04-14 23:26:23'),(17,16,1,3,'Probando Xcomm 2 cancelacion','creado_cliente','active','2020-04-14 23:48:25','2020-04-14 23:48:25'),(18,17,1,2,'Cancelado por tiempo','cancelado_por_tiempo','active','2020-04-16 23:26:33','2020-04-16 23:26:33'),(19,21,1,3,'quise','creado_cliente','active','2020-08-31 17:13:12','2020-08-31 17:13:12'),(20,22,1,3,'jjjjj','autorizado_banco','active','2020-08-31 17:16:09','2020-08-31 17:16:09'),(21,22,1,3,'sasfasd','autorizado_banco','active','2020-08-31 17:23:24','2020-08-31 17:23:24'),(22,22,1,3,'sds','autorizado_banco','active','2020-08-31 17:24:30','2020-08-31 17:24:30'),(23,23,1,3,'dfasdfadsfadsf','autorizado_banco','active','2020-08-31 17:26:19','2020-08-31 17:26:19'),(24,24,1,3,'yuiyuiyi','autorizado_banco','active','2020-08-31 17:38:56','2020-08-31 17:38:56');
/*!40000 ALTER TABLE `cancelinfos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cedula` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'09300579787','Jose Ernesto Tejada','8098044777','jet_thunder@hotmail.com','$2y$10$ZQQvseuN7WZkW7geunSgzOA8ktfH54Ii4udGx/EysCWlumzrdXXQq','active','2019-09-04 00:17:52','2021-01-13 05:18:51'),(6,'09300579786','Ernesto','7187906017','hitmatous@hotmail.com','$2y$10$yW9BVJChOQjgeTK1iEhuH.HdsfvDbghagFBspMOC/vjrkP31zDFMW','inactive','2021-01-18 13:16:52','2021-01-19 05:34:26'),(7,'22826440','yancy','22826440','yanci.marine@gmail.com','$2y$10$XeIuahr5qYrXLefTBiUzgumcsMcDA6etnCsIzp8UNzQXq9HNEriUO','inactive','2021-05-24 16:29:02','2021-05-24 16:29:02');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientetipopagoinfos`
--

DROP TABLE IF EXISTS `clientetipopagoinfos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientetipopagoinfos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transaccion_id` bigint(20) unsigned DEFAULT NULL,
  `tipo_pago` enum('efectivo','cheque','transferencia') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario_efectivo` text COLLATE utf8mb4_unicode_ci,
  `nombre_cheque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario_cheque` text COLLATE utf8mb4_unicode_ci,
  `numero_cuenta` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_transferencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rnc` int(11) DEFAULT NULL,
  `comentario_transferencia` text COLLATE utf8mb4_unicode_ci,
  `estatus` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientetipopagoinfos_transaccion_id_foreign` (`transaccion_id`),
  CONSTRAINT `clientetipopagoinfos_transaccion_id_foreign` FOREIGN KEY (`transaccion_id`) REFERENCES `transaccions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientetipopagoinfos`
--

LOCK TABLES `clientetipopagoinfos` WRITE;
/*!40000 ALTER TABLE `clientetipopagoinfos` DISABLE KEYS */;
INSERT INTO `clientetipopagoinfos` VALUES (1,4,'transferencia',NULL,NULL,NULL,'1212121212','Diego',1010101010,'Prueba 1','active','2019-11-28 04:52:07','2019-11-28 04:52:07'),(2,5,'efectivo','Quiero mi dinero en billetes de 50',NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-11 05:41:36','2019-12-11 05:41:36'),(3,6,'efectivo','mi cualto',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-02-09 21:21:49','2020-02-09 21:21:49'),(4,7,'efectivo','Prueba 1',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-02-09 23:26:17','2020-02-09 23:26:17'),(5,8,'efectivo','combrar',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 08:23:59','2020-03-09 08:23:59'),(6,9,'efectivo','Prieba como recibir el dinero del banco',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 08:42:07','2020-03-09 08:42:07'),(7,10,'efectivo','Prueba 2 recibir pago',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 08:44:51','2020-03-09 08:44:51'),(8,11,'efectivo','Preuba 3 exito',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 08:52:57','2020-03-09 08:52:57'),(9,12,'efectivo','Pruebas Compra',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-20 04:06:57','2020-03-20 04:06:57'),(10,13,'efectivo','Venta Euro',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-20 04:12:16','2020-03-20 04:12:16'),(11,14,'efectivo','f',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-22 05:57:09','2020-03-22 05:57:09'),(12,15,'efectivo','m',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-22 06:32:35','2020-03-22 06:32:35'),(13,16,'efectivo','Prueba xcomm 2',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-04-15 03:29:56','2020-04-15 03:29:56'),(14,17,'efectivo','d',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-04-16 03:28:54','2020-04-16 03:28:54'),(15,18,'efectivo','ok',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-06 23:41:59','2020-08-06 23:41:59'),(16,19,'efectivo','dfadfa',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-11 00:04:06','2020-08-11 00:04:06'),(17,20,'efectivo','si',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-13 23:15:55','2020-08-13 23:15:55'),(18,21,'efectivo','tu',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-31 21:09:17','2020-08-31 21:09:17'),(19,22,'efectivo','tert',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-31 21:14:23','2020-08-31 21:14:23'),(20,23,'efectivo','dfdf',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-31 21:25:24','2020-08-31 21:25:24'),(21,24,'efectivo','qqqqq',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-31 21:29:24','2020-08-31 21:29:24'),(22,25,'efectivo','Viendo',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-11-07 04:18:16','2020-11-07 04:18:16'),(23,26,'efectivo','Inventario',NULL,NULL,NULL,NULL,NULL,NULL,'active','2021-02-18 04:11:08','2021-02-18 04:11:08');
/*!40000 ALTER TABLE `clientetipopagoinfos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comisions`
--

DROP TABLE IF EXISTS `comisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comisions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comision` decimal(8,2) NOT NULL,
  `comision_euro` decimal(8,2) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comisions`
--

LOCK TABLES `comisions` WRITE;
/*!40000 ALTER TABLE `comisions` DISABLE KEYS */;
INSERT INTO `comisions` VALUES (1,1.00,2.00,'active','2021-02-09 17:36:28','2021-02-09 17:36:28');
/*!40000 ALTER TABLE `comisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entidadbancarias`
--

DROP TABLE IF EXISTS `entidadbancarias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entidadbancarias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entidadbancarias`
--

LOCK TABLES `entidadbancarias` WRITE;
/*!40000 ALTER TABLE `entidadbancarias` DISABLE KEYS */;
INSERT INTO `entidadbancarias` VALUES (1,'bhd','BHD Leon','active','2019-08-07 08:34:52','2019-08-07 08:34:52'),(2,'popular','Banco Popular','active','2019-08-07 08:36:01','2019-08-07 08:36:01'),(3,'bsc','Banco Santa Cruz','active','2019-08-07 08:38:26','2019-08-07 08:38:26'),(4,'scotia','Scotia Bank','active','2019-08-08 12:48:14','2019-08-08 12:48:14'),(5,'apap','Asociacion Popular de Ahorros y Prestamos','active','2019-08-29 09:49:38','2021-01-16 00:37:28');
/*!40000 ALTER TABLE `entidadbancarias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filetransactions`
--

DROP TABLE IF EXISTS `filetransactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filetransactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transaccion_id` bigint(20) unsigned DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `filetransactions_transaccion_id_foreign` (`transaccion_id`),
  CONSTRAINT `filetransactions_transaccion_id_foreign` FOREIGN KEY (`transaccion_id`) REFERENCES `transaccions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filetransactions`
--

LOCK TABLES `filetransactions` WRITE;
/*!40000 ALTER TABLE `filetransactions` DISABLE KEYS */;
INSERT INTO `filetransactions` VALUES (1,10,'Information Turno Romana_1583729091.txt','2020-03-09 04:44:51','2020-03-09 04:44:51'),(2,14,'Information Turno Romana_1584842229.txt','2020-03-22 01:57:09','2020-03-22 01:57:09'),(3,15,'Information Turno Romana_1584844355.txt','2020-03-22 02:32:35','2020-03-22 02:32:35');
/*!40000 ALTER TABLE `filetransactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formapagoclientealbancos`
--

DROP TABLE IF EXISTS `formapagoclientealbancos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formapagoclientealbancos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transaccion_id` bigint(20) unsigned DEFAULT NULL,
  `tipo_pago` enum('efectivo','cheque','transferencia') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario_efectivo` text COLLATE utf8mb4_unicode_ci,
  `numero_cheque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_cheque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario_cheque` text COLLATE utf8mb4_unicode_ci,
  `numero_cuenta` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_transferencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario_transferencia` text COLLATE utf8mb4_unicode_ci,
  `rnc` int(11) DEFAULT NULL,
  `nombre_banco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formapagoclientealbancos_transaccion_id_foreign` (`transaccion_id`),
  CONSTRAINT `formapagoclientealbancos_transaccion_id_foreign` FOREIGN KEY (`transaccion_id`) REFERENCES `transaccions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formapagoclientealbancos`
--

LOCK TABLES `formapagoclientealbancos` WRITE;
/*!40000 ALTER TABLE `formapagoclientealbancos` DISABLE KEYS */;
INSERT INTO `formapagoclientealbancos` VALUES (1,5,'cheque',NULL,'0000000','Michelle','Voy a pagar con cheque',NULL,NULL,NULL,123456,'Popular','active','2019-12-11 05:41:37','2019-12-11 05:41:37'),(2,6,'efectivo','dinero',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-02-09 21:21:49','2020-02-09 21:21:49'),(3,7,'efectivo','Prueba 1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-02-09 23:26:17','2020-02-09 23:26:17'),(4,8,'efectivo','pagar',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 08:24:00','2020-03-09 08:24:00'),(5,9,'efectivo','Prueba como pagar al banco',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 08:42:07','2020-03-09 08:42:07'),(6,10,'efectivo','Prueba 2 pagar al banco',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 08:44:51','2020-03-09 08:44:51'),(7,11,'efectivo','Prueba 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 08:52:57','2020-03-09 08:52:57'),(8,12,'efectivo','Prueba Compra',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-20 04:06:57','2020-03-20 04:06:57'),(9,13,'efectivo','Venta Euro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-20 04:12:16','2020-03-20 04:12:16'),(10,14,'efectivo','f',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-22 05:57:09','2020-03-22 05:57:09'),(11,15,'efectivo','n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-22 06:32:35','2020-03-22 06:32:35'),(12,16,'efectivo','Prueba xcomm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-04-15 03:29:56','2020-04-15 03:29:56'),(13,17,'efectivo','d',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-04-16 03:28:54','2020-04-16 03:28:54'),(14,18,'efectivo','si',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-06 23:41:59','2020-08-06 23:41:59'),(15,19,'efectivo','safas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-11 00:04:06','2020-08-11 00:04:06'),(16,20,'efectivo','si',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-13 23:15:55','2020-08-13 23:15:55'),(17,21,'efectivo','Yo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-31 21:09:18','2020-08-31 21:09:18'),(18,22,'efectivo','wer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-31 21:14:23','2020-08-31 21:14:23'),(19,23,'efectivo','dfdfd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-31 21:25:24','2020-08-31 21:25:24'),(20,24,'efectivo','qqqqq',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-31 21:29:24','2020-08-31 21:29:24'),(21,25,'efectivo','Prueba ver metodos de pago',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-11-07 04:18:16','2020-11-07 04:18:16'),(22,26,'efectivo','Inventario',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2021-02-18 04:11:08','2021-02-18 04:11:08');
/*!40000 ALTER TABLE `formapagoclientealbancos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historicotransaccions`
--

DROP TABLE IF EXISTS `historicotransaccions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historicotransaccions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transaccion_id` bigint(20) unsigned NOT NULL,
  `usuario_id` bigint(20) unsigned DEFAULT NULL,
  `usuario_banco` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `historicotransaccions_transaccion_id_foreign` (`transaccion_id`),
  KEY `historicotransaccions_usuario_id_foreign` (`usuario_id`),
  CONSTRAINT `historicotransaccions_transaccion_id_foreign` FOREIGN KEY (`transaccion_id`) REFERENCES `transaccions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `historicotransaccions_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios_bancos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historicotransaccions`
--

LOCK TABLES `historicotransaccions` WRITE;
/*!40000 ALTER TABLE `historicotransaccions` DISABLE KEYS */;
INSERT INTO `historicotransaccions` VALUES (1,18,NULL,NULL,'transaccion cliente','active','2020-08-10 19:59:21','2020-08-10 19:59:21'),(2,18,NULL,NULL,'transaccion completada','active','2020-08-10 20:02:23','2020-08-10 20:02:23'),(3,19,NULL,NULL,'creado cliente','active','2020-08-10 20:04:06','2020-08-10 20:04:06'),(4,19,5,'Maria','autorizado banco','active','2020-08-10 20:06:42','2020-08-10 20:06:42'),(5,19,NULL,NULL,'Transferencia Realizada','active','2020-08-10 20:10:28','2020-08-10 20:10:28'),(6,19,NULL,NULL,'Transferencia Realizada','active','2020-08-10 20:10:57','2020-08-10 20:10:57'),(7,19,5,'Maria','Deposito al cliente','active','2020-08-10 20:12:28','2020-08-10 20:12:28'),(8,19,NULL,NULL,'transaccion completada','active','2020-08-10 20:13:17','2020-08-10 20:13:17'),(9,20,NULL,NULL,'creado cliente','active','2020-08-13 19:15:55','2020-08-13 19:15:55'),(10,20,1,'Jose Ernesto Tejada','Transaccion autorizada','active','2020-08-13 19:16:54','2020-08-13 19:16:54'),(11,20,NULL,NULL,'Transferencia Realizada','active','2020-08-13 19:17:12','2020-08-13 19:17:12'),(12,20,1,'Jose Ernesto Tejada','Deposito al cliente','active','2020-08-13 19:17:37','2020-08-13 19:17:37'),(13,20,NULL,NULL,'transaccion completada','active','2020-08-13 19:17:58','2020-08-13 19:17:58'),(14,21,NULL,NULL,'creado cliente','active','2020-08-31 17:09:18','2020-08-31 17:09:18'),(15,21,7,'Pedro','Transaccion cancelada','active','2020-08-31 17:13:12','2020-08-31 17:13:12'),(16,22,NULL,NULL,'creado cliente','active','2020-08-31 17:14:23','2020-08-31 17:14:23'),(17,22,7,'Pedro','Transaccion autorizada','active','2020-08-31 17:15:42','2020-08-31 17:15:42'),(18,22,NULL,NULL,'cancelado por cliente','active','2020-08-31 17:16:09','2020-08-31 17:16:09'),(19,22,NULL,NULL,'cancelado por cliente','active','2020-08-31 17:23:24','2020-08-31 17:23:24'),(20,22,NULL,NULL,'cancelado por cliente','active','2020-08-31 17:24:30','2020-08-31 17:24:30'),(21,23,NULL,NULL,'creado cliente','active','2020-08-31 17:25:24','2020-08-31 17:25:24'),(22,23,7,'Pedro','Transaccion autorizada','active','2020-08-31 17:26:03','2020-08-31 17:26:03'),(23,23,NULL,NULL,'cancelado por cliente','active','2020-08-31 17:26:19','2020-08-31 17:26:19'),(24,24,NULL,NULL,'creado cliente','active','2020-08-31 17:29:24','2020-08-31 17:29:24'),(25,24,7,'Pedro','Transaccion autorizada','active','2020-08-31 17:30:05','2020-08-31 17:30:05'),(26,24,NULL,NULL,'cancelado por cliente','active','2020-08-31 17:38:57','2020-08-31 17:38:57'),(27,25,NULL,NULL,'creado cliente','active','2020-11-07 00:18:16','2020-11-07 00:18:16'),(28,25,5,'Maria','Transaccion autorizada','active','2021-01-18 21:38:05','2021-01-18 21:38:05'),(29,25,NULL,NULL,'Transferencia Realizada','active','2021-01-19 22:10:38','2021-01-19 22:10:38'),(30,25,5,'Maria','Deposito al cliente','active','2021-01-19 22:33:54','2021-01-19 22:33:54'),(31,25,NULL,NULL,'transaccion completada','active','2021-01-19 22:35:53','2021-01-19 22:35:53'),(32,26,NULL,NULL,'creado cliente','active','2021-02-18 00:11:08','2021-02-18 00:11:08'),(33,26,7,'Pedro','Transaccion autorizada','active','2021-02-18 00:15:24','2021-02-18 00:15:24'),(34,26,NULL,NULL,'Transferencia Realizada','active','2021-02-18 00:15:55','2021-02-18 00:15:55'),(35,26,7,'Pedro','Deposito al cliente','active','2021-02-18 00:16:10','2021-02-18 00:16:10'),(36,26,NULL,NULL,'transaccion completada','active','2021-02-18 00:16:21','2021-02-18 00:16:21');
/*!40000 ALTER TABLE `historicotransaccions` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (5,'2014_10_12_000000_create_users_table',1),(6,'2014_10_12_100000_create_password_resets_table',1),(7,'2019_08_04_151747_create_tasageneral_table',2),(8,'2019_08_07_185649_create_entidadbancarias_table',3),(9,'2019_08_29_220140_create_usuarios_bancos_table',4),(10,'2019_09_03_223158_create_clientes_table',5),(11,'2019_09_16_153401_create_cambiodivisas_table',6),(13,'2019_10_04_001420_create_transaccions_table',7),(16,'2019_10_18_035615_create_cancelinfos_table',8),(17,'2019_11_21_005237_create_bancotipopagoinfo_table',9),(18,'2019_11_27_213552_create_clientetipopagoinfos_table',10),(19,'2019_12_10_235143_create_formapagoclientealbancos_table',11),(20,'2020_03_08_225202_create_filetransactions_table',12),(21,'2020_08_10_183650_create_historicotransaccions_table',13),(23,'2020_08_14_024310_create_comisions_table',14);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicidad`
--

DROP TABLE IF EXISTS `publicidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicidad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicidad`
--

LOCK TABLES `publicidad` WRITE;
/*!40000 ALTER TABLE `publicidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasageneral`
--

DROP TABLE IF EXISTS `tasageneral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasageneral` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `banco` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compra_dolar` float(5,2) unsigned DEFAULT NULL,
  `venta_dolar` float(5,2) unsigned DEFAULT NULL,
  `compra_euro` float(5,2) unsigned DEFAULT NULL,
  `venta_euro` float(5,2) unsigned DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasageneral`
--

LOCK TABLES `tasageneral` WRITE;
/*!40000 ALTER TABLE `tasageneral` DISABLE KEYS */;
INSERT INTO `tasageneral` VALUES (1,'BHD',50.00,51.00,60.00,61.00,'active','2019-08-05 14:50:00','2020-07-26 04:51:11'),(2,'Popular',50.50,51.50,60.50,61.50,'active','2019-08-05 14:50:00','2020-07-26 04:51:11'),(3,'Banco Santa Cruz',52.00,53.00,65.00,66.00,'active','2019-08-06 14:14:40','2020-07-26 04:51:11');
/*!40000 ALTER TABLE `tasageneral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaccions`
--

DROP TABLE IF EXISTS `transaccions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaccions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` bigint(20) unsigned NOT NULL,
  `entidadbancaria_id` bigint(20) unsigned NOT NULL,
  `cambiodivisa_id` bigint(20) unsigned NOT NULL,
  `nombre_banco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rango_incial` double(12,2) NOT NULL,
  `rango_final` double(12,2) NOT NULL,
  `valor_dolar` double(12,2) NOT NULL,
  `cantidad` double(12,2) NOT NULL,
  `tipo_transaccion` enum('venta_dolar','compra_dolar','venta_euro','compra_euro') COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaccion` enum('creado_cliente','autorizado_banco','cancelado_banco','cancelado_por_tiempo','cancelado_por_xcomm','transaccion_completada','validado_cliente','validado_banco','transaccion_cliente','transaccion_banco','cancelado_por_cliente') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'creado_cliente',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_last_transaccion` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaccions_entidadbancaria_id_foreign` (`entidadbancaria_id`),
  KEY `transaccions_cliente_id_foreign` (`cliente_id`),
  KEY `transaccions_cambiodivisa_id_foreign` (`cambiodivisa_id`),
  CONSTRAINT `transaccions_cambiodivisa_id_foreign` FOREIGN KEY (`cambiodivisa_id`) REFERENCES `cambiodivisas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaccions_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaccions_entidadbancaria_id_foreign` FOREIGN KEY (`entidadbancaria_id`) REFERENCES `entidadbancarias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccions`
--

LOCK TABLES `transaccions` WRITE;
/*!40000 ALTER TABLE `transaccions` DISABLE KEYS */;
INSERT INTO `transaccions` VALUES (1,1,3,3,'Banco Santa Cruz',300.00,3000.00,81.00,300.00,'venta_dolar','transaccion_completada','active','2019-10-20 16:05:47','2019-10-20 20:05:47','2019-10-29 01:10:05'),(2,1,3,3,'Banco Santa Cruz',300.00,3000.00,81.00,500.00,'venta_dolar','cancelado_banco','inactive','2019-11-10 20:51:32','2019-11-11 00:51:32','2019-11-13 05:17:49'),(3,1,3,3,'Banco Santa Cruz',300.00,3000.00,81.00,600.00,'venta_dolar','cancelado_por_cliente','inactive','2019-11-17 18:27:16','2019-11-17 22:27:16','2019-11-18 04:42:41'),(4,1,3,3,'Banco Santa Cruz',300.00,3000.00,81.00,300.00,'venta_dolar','transaccion_completada','active','2019-11-27 20:52:07','2019-11-28 00:52:07','2019-12-02 20:47:26'),(5,1,3,3,'Banco Santa Cruz',300.00,3000.00,81.00,500.00,'venta_dolar','cancelado_banco','inactive','2019-12-10 21:41:36','2019-12-11 01:41:36','2019-12-12 03:00:57'),(6,1,5,1,'Asociacion Popular de Ahorros y Prestamos',100.00,2000.00,50.00,500.00,'venta_dolar','transaccion_completada','active','2020-02-09 13:21:49','2020-02-09 17:21:49','2020-02-09 21:26:43'),(7,1,3,3,'Banco Santa Cruz',300.00,3000.00,81.00,300.00,'venta_dolar','transaccion_completada','active','2020-02-09 15:26:16','2020-02-09 19:26:16','2020-02-09 23:40:57'),(8,1,1,2,'BHD Leon',200.00,3000.00,12.00,500.00,'venta_dolar','transaccion_completada','active','2020-03-09 00:23:59','2020-03-09 04:23:59','2020-03-09 08:33:12'),(9,1,1,2,'BHD Leon',200.00,3000.00,12.00,500.00,'venta_dolar','transaccion_completada','active','2020-03-09 00:42:07','2020-03-09 04:42:07','2020-03-09 08:44:00'),(10,1,1,2,'BHD Leon',200.00,3000.00,12.00,300.00,'venta_dolar','transaccion_completada','active','2020-03-09 00:44:51','2020-03-09 04:44:51','2020-03-09 08:46:47'),(11,1,1,2,'BHD Leon',200.00,3000.00,12.00,400.00,'venta_dolar','transaccion_completada','active','2020-03-09 00:52:57','2020-03-09 04:52:57','2020-03-09 08:58:32'),(12,1,5,1,'Asociacion Popular de Ahorros y Prestamos',100.00,2000.00,50.00,500.00,'compra_dolar','transaccion_completada','active','2020-03-19 20:06:57','2020-03-20 00:06:57','2020-03-20 04:09:24'),(13,1,5,1,'Asociacion Popular de Ahorros y Prestamos',100.00,2000.00,50.00,500.00,'venta_euro','transaccion_completada','active','2020-03-19 20:12:16','2020-03-20 00:12:16','2020-03-20 04:23:22'),(14,1,5,1,'Asociacion Popular de Ahorros y Prestamos',100.00,2000.00,50.00,500.00,'venta_dolar','cancelado_banco','inactive','2020-03-21 21:57:09','2020-03-22 01:57:09','2020-03-22 06:00:50'),(15,1,5,1,'Asociacion Popular de Ahorros y Prestamos',100.00,2000.00,40.00,500.00,'compra_dolar','cancelado_por_xcomm','inactive','2020-03-21 22:32:35','2020-03-22 02:32:35','2020-04-15 03:26:22'),(16,1,3,3,'Banco Santa Cruz',300.00,3000.00,82.00,500.00,'compra_euro','cancelado_por_xcomm','inactive','2020-04-14 19:29:56','2020-04-14 23:29:56','2020-04-15 03:48:25'),(17,1,1,2,'BHD Leon',200.00,3000.00,14.00,400.00,'venta_euro','cancelado_por_tiempo','inactive','2020-04-15 19:28:54','2020-04-15 23:28:54','2020-04-17 03:26:32'),(18,1,5,1,'Asociacion Popular de Ahorros y Prestamos',100.00,2000.00,50.00,500.00,'venta_dolar','transaccion_completada','active','2020-08-06 15:41:59','2020-08-06 19:41:59','2020-08-11 00:02:23'),(19,1,1,2,'BHD Leon',200.00,3000.00,14.00,400.00,'venta_euro','transaccion_completada','active','2020-08-10 16:04:06','2020-08-10 20:04:06','2020-08-11 00:13:17'),(20,1,5,4,'Asociacion Popular de Ahorros y Prestamos',5000.00,10000.00,202.00,8000.00,'venta_euro','transaccion_completada','active','2020-08-13 15:15:55','2020-08-13 19:15:55','2020-08-13 23:17:58'),(21,1,3,3,'Banco Santa Cruz',300.00,3000.00,83.00,400.00,'venta_euro','cancelado_banco','inactive','2020-08-31 13:09:17','2020-08-31 17:09:17','2020-08-31 21:13:12'),(22,1,3,3,'Banco Santa Cruz',300.00,3000.00,83.00,1000.00,'venta_euro','cancelado_por_cliente','inactive','2020-08-31 13:14:23','2020-08-31 17:14:23','2020-08-31 21:16:09'),(23,1,3,3,'Banco Santa Cruz',300.00,3000.00,82.00,600.00,'compra_euro','cancelado_por_cliente','inactive','2020-08-31 13:25:24','2020-08-31 17:25:24','2020-08-31 21:26:19'),(24,1,3,3,'Banco Santa Cruz',300.00,3000.00,82.00,400.00,'compra_euro','cancelado_por_cliente','inactive','2020-08-31 13:29:24','2020-08-31 17:29:24','2020-08-31 21:38:56'),(25,1,1,2,'BHD Leon',200.00,3000.00,14.00,1000.00,'venta_euro','transaccion_completada','active','2020-11-06 20:18:16','2020-11-07 00:18:16','2021-01-20 02:35:53'),(26,1,3,3,'Banco Santa Cruz',300.00,3000.00,81.00,1000.00,'venta_dolar','transaccion_completada','active','2021-02-17 20:11:08','2021-02-18 00:11:08','2021-02-18 04:16:21');
/*!40000 ALTER TABLE `transaccions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','jet_thunder@hotmail.com','2019-07-25 06:36:00','$2y$10$5aTN3walbyKee1o0tPhqJeCSowfL9oMZiXmBFrNMSK2i4rgc9B.fS','admin','1','aqF6qoRAkChqMrMZhRktATkBoReSxjDjhP3YRK2XoWmr1afXF4zXZG1Bop9k','2019-07-25 06:36:00','2019-07-25 06:36:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_bancos`
--

DROP TABLE IF EXISTS `usuarios_bancos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_bancos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `entidadbancarias_id` bigint(20) unsigned NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entidadBanco` (`entidadbancarias_id`),
  CONSTRAINT `entidadBanco` FOREIGN KEY (`entidadbancarias_id`) REFERENCES `entidadbancarias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_bancos`
--

LOCK TABLES `usuarios_bancos` WRITE;
/*!40000 ALTER TABLE `usuarios_bancos` DISABLE KEYS */;
INSERT INTO `usuarios_bancos` VALUES (1,5,'Jose Ernesto Tejada','jet_thunder@hotmail.com','$2y$10$lwhIwfOGWi3CURNQTlR0s.uZySqBcLigUCoy.veCro2foqviidRX6','admin','active','2019-09-01 19:32:12','2019-09-09 02:46:39'),(2,5,'Airlin','A@gmail.com','$2y$10$yPXatvQRmRUZekekg2NxbunSXjz6Sfzo.Y25JeEFPCc5XFSMNHQyW','user','active','2019-09-01 19:34:56','2019-09-02 01:58:29'),(3,5,'Peppa','p@g.com','$2y$10$wGBIy/x4sImmEHbCYVTZbOQ/JQVExrFji9xcbBbqGpzr2CGLTC2oy','user','active','2019-09-10 04:12:45','2019-09-12 08:45:13'),(4,5,'Alberto','a@g.com','$2y$10$fZv7mZNqT5oRpbczYJ6XR.TDLuHGKNBDinWCXmuaBiVh1cF5Sz83e','user','active','2019-09-15 18:10:17','2019-09-15 18:10:17'),(5,1,'Maria','m@g.com','$2y$10$3yXhZoKNju7vRT/WC3MTRuUYXIZpz7nU5giRMFb9WkxCsZOXAQsIy','admin','active','2019-09-15 18:11:38','2019-09-15 18:11:38'),(6,1,'Alex','al@g.com','$2y$10$nRV24x3aQrCVB0TfsXcqaufkODsWySFaJpy9igvkvBqJLS8jeXkEm','user','active','2019-09-15 18:12:29','2019-09-15 18:12:29'),(7,3,'Pedro','p@g.com','$2y$10$gXS9HpMfJfecCcKR58Qou.8hamik7KtDcRygf.tZS6..XoBFRXYYu','admin','active','2019-09-24 01:05:55','2019-10-02 03:33:13'),(8,4,'Susan','s@g.com','$2y$10$IDzQ7Try3YCQz5NH7q2VMuzoKiMA4mUpO/pi45..g2kX4db0nIlwS','user','active','2020-08-31 19:45:39','2020-08-31 19:45:39');
/*!40000 ALTER TABLE `usuarios_bancos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'xcomm'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-26 16:54:36
