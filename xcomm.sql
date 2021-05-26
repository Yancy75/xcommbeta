
#
# Structure for table "clientes"
#

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cedula` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inative') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "clientes"
#

INSERT INTO `clientes` VALUES (1,'09300579787','Jose Ernesto Tejada','8098044777','jet_thunder@hotmail.com','$2y$10$ZQQvseuN7WZkW7geunSgzOA8ktfH54Ii4udGx/EysCWlumzrdXXQq','active','2019-09-03 20:17:52','2019-09-05 04:37:33');

#
# Structure for table "comisions"
#

DROP TABLE IF EXISTS `comisions`;
CREATE TABLE `comisions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comision` decimal(8,2) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "comisions"
#

/*!40000 ALTER TABLE `comisions` DISABLE KEYS */;
INSERT INTO `comisions` VALUES (1,30.00,'active','2020-08-13 23:34:20','2020-08-13 23:34:20');
/*!40000 ALTER TABLE `comisions` ENABLE KEYS */;

#
# Structure for table "entidadbancarias"
#

DROP TABLE IF EXISTS `entidadbancarias`;
CREATE TABLE `entidadbancarias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "entidadbancarias"
#

INSERT INTO `entidadbancarias` VALUES (1,'bhd','BHD Leon','active','2019-08-07 04:34:52','2019-08-07 04:34:52'),(2,'popular','Banco Popular','active','2019-08-07 04:36:01','2019-08-07 04:36:01'),(3,'bsc','Banco Santa Cruz','active','2019-08-07 04:38:26','2019-08-07 04:38:26'),(4,'scotia','Scotia Bank','active','2019-08-08 08:48:14','2019-08-08 08:48:14'),(5,'apap','Asociacion Popular de Ahorros y Prestamos','active','2019-08-29 05:49:38','2019-08-29 05:49:38');

#
# Structure for table "cambiodivisas"
#

DROP TABLE IF EXISTS `cambiodivisas`;
CREATE TABLE `cambiodivisas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `entidadbancarias_id` bigint(20) unsigned NOT NULL,
  `dolar_venta` double(8,2) NOT NULL,
  `dolar_compra` double(8,2) NOT NULL,
  `euro_venta` double(8,2) NOT NULL,
  `euro_compra` double(8,2) NOT NULL,
  `rango_inicial` double(14,2) DEFAULT NULL,
  `rango_final` double(14,2) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cambiodivisas_entidadbancarias_id_foreign` (`entidadbancarias_id`),
  CONSTRAINT `cambiodivisas_entidadbancarias_id_foreign` FOREIGN KEY (`entidadbancarias_id`) REFERENCES `entidadbancarias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "cambiodivisas"
#

INSERT INTO `cambiodivisas` VALUES (1,5,50.00,40.00,70.00,60.00,100.00,1000.00,'active','2019-09-18 04:13:13','2020-08-11 22:37:00'),(2,1,12.00,10.00,14.00,13.00,200.00,3000.00,'active','2019-09-24 01:07:34','2019-10-01 23:29:57'),(3,3,81.00,80.00,83.00,82.00,300.00,3000.00,'active','2019-09-24 01:08:24','2019-10-01 23:34:08'),(4,5,102.00,100.00,202.00,200.00,5000.00,10000.00,'active','2020-08-11 22:21:48','2020-08-11 22:21:48');

#
# Structure for table "bancotipopagoinfo"
#

DROP TABLE IF EXISTS `bancotipopagoinfo`;
CREATE TABLE `bancotipopagoinfo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `entidad_id` bigint(20) unsigned DEFAULT NULL,
  `tipo_pago` enum('efectivo','cheque','transferencia') COLLATE utf8mb4_unicode_ci DEFAULT 'efectivo',
  `comentario_efectivo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_cheque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `comentario_cheque` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_cuenta` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `nombre_transferencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `rnc` int(11) DEFAULT 0,
  `comentario_transferencia` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bancotipopagoinfo_entidad_id_foreign` (`entidad_id`),
  CONSTRAINT `bancotipopagoinfo_entidad_id_foreign` FOREIGN KEY (`entidad_id`) REFERENCES `entidadbancarias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "bancotipopagoinfo"
#

INSERT INTO `bancotipopagoinfo` VALUES (1,3,'efectivo','Procedimientos pagos efectivo','Carlos Tejada','Procedimientos pagos en cheques','123456789','Juan Perez',987654321,'Procedimientos pagos en transferencia','active','2019-11-22 16:31:06','2019-11-22 18:52:56');

#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (5,'2014_10_12_000000_create_users_table',1),(6,'2014_10_12_100000_create_password_resets_table',1),(7,'2019_08_04_151747_create_tasageneral_table',2),(8,'2019_08_07_185649_create_entidadbancarias_table',3),(9,'2019_08_29_220140_create_usuarios_bancos_table',4),(10,'2019_09_03_223158_create_clientes_table',5),(11,'2019_09_16_153401_create_cambiodivisas_table',6),(13,'2019_10_04_001420_create_transaccions_table',7),(16,'2019_10_18_035615_create_cancelinfos_table',8),(17,'2019_11_21_005237_create_bancotipopagoinfo_table',9),(18,'2019_11_27_213552_create_clientetipopagoinfos_table',10),(19,'2019_12_10_235143_create_formapagoclientealbancos_table',11),(20,'2020_03_08_225202_create_filetransactions_table',12),(21,'2020_08_10_183650_create_historicotransaccions_table',13),(23,'2020_08_14_024310_create_comisions_table',14);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "password_resets"
#


#
# Structure for table "tasageneral"
#

DROP TABLE IF EXISTS `tasageneral`;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "tasageneral"
#

INSERT INTO `tasageneral` VALUES (1,'BHD',50.00,51.00,60.00,61.00,'active','2019-08-05 10:50:00','2020-07-26 00:51:11'),(2,'Popular',50.50,51.50,60.50,61.50,'active','2019-08-05 10:50:00','2020-07-26 00:51:11'),(3,'Banco Santa Cruz',52.00,53.00,65.00,66.00,'active','2019-08-06 10:14:40','2020-07-26 00:51:11'),(4,'Scotia Bank',90.00,91.00,93.00,94.00,'active','2019-08-29 05:44:37','2020-07-26 00:51:12'),(5,'BOA',45.00,46.00,67.00,68.00,'active','2020-07-26 00:51:12','2020-07-26 00:51:12');

#
# Structure for table "transaccions"
#

DROP TABLE IF EXISTS `transaccions`;
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "transaccions"
#

INSERT INTO `transaccions` VALUES (1,1,3,3,'Banco Santa Cruz',300.00,3000.00,81.00,300.00,'venta_dolar','transaccion_completada','active','2019-10-20 16:05:47','2019-10-20 16:05:47','2019-10-28 21:10:05'),(2,1,3,3,'Banco Santa Cruz',300.00,3000.00,81.00,500.00,'venta_dolar','cancelado_banco','inactive','2019-11-10 20:51:32','2019-11-10 20:51:32','2019-11-13 01:17:49'),(3,1,3,3,'Banco Santa Cruz',300.00,3000.00,81.00,600.00,'venta_dolar','cancelado_por_cliente','inactive','2019-11-17 18:27:16','2019-11-17 18:27:16','2019-11-18 00:42:41'),(4,1,3,3,'Banco Santa Cruz',300.00,3000.00,81.00,300.00,'venta_dolar','transaccion_completada','active','2019-11-27 20:52:07','2019-11-27 20:52:07','2019-12-02 16:47:26'),(5,1,3,3,'Banco Santa Cruz',300.00,3000.00,81.00,500.00,'venta_dolar','cancelado_banco','inactive','2019-12-10 21:41:36','2019-12-10 21:41:36','2019-12-11 23:00:57'),(6,1,5,1,'Asociacion Popular de Ahorros y Prestamos',100.00,2000.00,50.00,500.00,'venta_dolar','transaccion_completada','active','2020-02-09 13:21:49','2020-02-09 13:21:49','2020-02-09 17:26:43'),(7,1,3,3,'Banco Santa Cruz',300.00,3000.00,81.00,300.00,'venta_dolar','transaccion_completada','active','2020-02-09 15:26:16','2020-02-09 15:26:16','2020-02-09 19:40:57'),(8,1,1,2,'BHD Leon',200.00,3000.00,12.00,500.00,'venta_dolar','transaccion_completada','active','2020-03-09 00:23:59','2020-03-09 00:23:59','2020-03-09 04:33:12'),(9,1,1,2,'BHD Leon',200.00,3000.00,12.00,500.00,'venta_dolar','transaccion_completada','active','2020-03-09 00:42:07','2020-03-09 00:42:07','2020-03-09 04:44:00'),(10,1,1,2,'BHD Leon',200.00,3000.00,12.00,300.00,'venta_dolar','transaccion_completada','active','2020-03-09 00:44:51','2020-03-09 00:44:51','2020-03-09 04:46:47'),(11,1,1,2,'BHD Leon',200.00,3000.00,12.00,400.00,'venta_dolar','transaccion_completada','active','2020-03-09 00:52:57','2020-03-09 00:52:57','2020-03-09 04:58:32'),(12,1,5,1,'Asociacion Popular de Ahorros y Prestamos',100.00,2000.00,50.00,500.00,'compra_dolar','transaccion_completada','active','2020-03-19 20:06:57','2020-03-19 20:06:57','2020-03-20 00:09:24'),(13,1,5,1,'Asociacion Popular de Ahorros y Prestamos',100.00,2000.00,50.00,500.00,'venta_euro','transaccion_completada','active','2020-03-19 20:12:16','2020-03-19 20:12:16','2020-03-20 00:23:22'),(14,1,5,1,'Asociacion Popular de Ahorros y Prestamos',100.00,2000.00,50.00,500.00,'venta_dolar','cancelado_banco','inactive','2020-03-21 21:57:09','2020-03-21 21:57:09','2020-03-22 02:00:50'),(15,1,5,1,'Asociacion Popular de Ahorros y Prestamos',100.00,2000.00,40.00,500.00,'compra_dolar','cancelado_por_xcomm','inactive','2020-03-21 22:32:35','2020-03-21 22:32:35','2020-04-14 23:26:22'),(16,1,3,3,'Banco Santa Cruz',300.00,3000.00,82.00,500.00,'compra_euro','cancelado_por_xcomm','inactive','2020-04-14 19:29:56','2020-04-14 19:29:56','2020-04-14 23:48:25'),(17,1,1,2,'BHD Leon',200.00,3000.00,14.00,400.00,'venta_euro','cancelado_por_tiempo','inactive','2020-04-15 19:28:54','2020-04-15 19:28:54','2020-04-16 23:26:32'),(18,1,5,1,'Asociacion Popular de Ahorros y Prestamos',100.00,2000.00,50.00,500.00,'venta_dolar','transaccion_completada','active','2020-08-06 15:41:59','2020-08-06 15:41:59','2020-08-10 20:02:23'),(19,1,1,2,'BHD Leon',200.00,3000.00,14.00,400.00,'venta_euro','transaccion_completada','active','2020-08-10 16:04:06','2020-08-10 16:04:06','2020-08-10 20:13:17'),(20,1,5,4,'Asociacion Popular de Ahorros y Prestamos',5000.00,10000.00,202.00,8000.00,'venta_euro','transaccion_completada','active','2020-08-13 15:15:55','2020-08-13 15:15:55','2020-08-13 19:17:58');

#
# Structure for table "formapagoclientealbancos"
#

DROP TABLE IF EXISTS `formapagoclientealbancos`;
CREATE TABLE `formapagoclientealbancos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transaccion_id` bigint(20) unsigned DEFAULT NULL,
  `tipo_pago` enum('efectivo','cheque','transferencia') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario_efectivo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_cheque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_cheque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario_cheque` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_cuenta` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_transferencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario_transferencia` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rnc` int(11) DEFAULT NULL,
  `nombre_banco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formapagoclientealbancos_transaccion_id_foreign` (`transaccion_id`),
  CONSTRAINT `formapagoclientealbancos_transaccion_id_foreign` FOREIGN KEY (`transaccion_id`) REFERENCES `transaccions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "formapagoclientealbancos"
#

INSERT INTO `formapagoclientealbancos` VALUES (1,5,'cheque',NULL,'0000000','Michelle','Voy a pagar con cheque',NULL,NULL,NULL,123456,'Popular','active','2019-12-11 01:41:37','2019-12-11 01:41:37'),(2,6,'efectivo','dinero',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-02-09 17:21:49','2020-02-09 17:21:49'),(3,7,'efectivo','Prueba 1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-02-09 19:26:17','2020-02-09 19:26:17'),(4,8,'efectivo','pagar',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 04:24:00','2020-03-09 04:24:00'),(5,9,'efectivo','Prueba como pagar al banco',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 04:42:07','2020-03-09 04:42:07'),(6,10,'efectivo','Prueba 2 pagar al banco',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 04:44:51','2020-03-09 04:44:51'),(7,11,'efectivo','Prueba 3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 04:52:57','2020-03-09 04:52:57'),(8,12,'efectivo','Prueba Compra',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-20 00:06:57','2020-03-20 00:06:57'),(9,13,'efectivo','Venta Euro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-20 00:12:16','2020-03-20 00:12:16'),(10,14,'efectivo','f',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-22 01:57:09','2020-03-22 01:57:09'),(11,15,'efectivo','n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-22 02:32:35','2020-03-22 02:32:35'),(12,16,'efectivo','Prueba xcomm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-04-14 23:29:56','2020-04-14 23:29:56'),(13,17,'efectivo','d',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-04-15 23:28:54','2020-04-15 23:28:54'),(14,18,'efectivo','si',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-06 19:41:59','2020-08-06 19:41:59'),(15,19,'efectivo','safas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-10 20:04:06','2020-08-10 20:04:06'),(16,20,'efectivo','si',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-13 19:15:55','2020-08-13 19:15:55');

#
# Structure for table "filetransactions"
#

DROP TABLE IF EXISTS `filetransactions`;
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

#
# Data for table "filetransactions"
#

INSERT INTO `filetransactions` VALUES (1,10,'Information Turno Romana_1583729091.txt','2020-03-09 00:44:51','2020-03-09 00:44:51'),(2,14,'Information Turno Romana_1584842229.txt','2020-03-21 21:57:09','2020-03-21 21:57:09'),(3,15,'Information Turno Romana_1584844355.txt','2020-03-21 22:32:35','2020-03-21 22:32:35');

#
# Structure for table "cancelinfos"
#

DROP TABLE IF EXISTS `cancelinfos`;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "cancelinfos"
#

INSERT INTO `cancelinfos` VALUES (1,NULL,1,1,'No tengo','creado_cliente','active','2019-10-20 16:00:46','2019-10-20 16:00:46'),(2,NULL,1,2,'No tienen lo que necesito','creado_cliente','active','2019-10-20 16:04:29','2019-10-20 16:04:29'),(3,2,1,3,'Monto Incorrecto','creado_cliente','active','2019-11-12 21:17:50','2019-11-12 21:17:50'),(4,3,1,3,'No lo quiero','autorizado_banco','active','2019-11-17 20:42:41','2019-11-17 20:42:41'),(5,NULL,1,3,'Error','creado_cliente','active','2019-11-22 19:08:56','2019-11-22 19:08:56'),(6,NULL,1,3,'Prueba','creado_cliente','active','2019-11-22 19:42:18','2019-11-22 19:42:18'),(7,5,1,3,'Prueba nueva','creado_cliente','active','2019-12-11 19:00:58','2019-12-11 19:00:58'),(8,NULL,1,1,'pueba','creado_cliente','active','2020-01-27 22:15:26','2020-01-27 22:15:26'),(9,NULL,1,3,'Prueba Load File','creado_cliente','active','2020-02-11 19:06:26','2020-02-11 19:06:26'),(10,NULL,1,3,'Prueba Load File','creado_cliente','active','2020-02-11 19:06:39','2020-02-11 19:06:39'),(11,NULL,1,3,'PUreba upload','creado_cliente','active','2020-02-11 19:10:40','2020-02-11 19:10:40'),(12,NULL,1,3,'Prueba','creado_cliente','active','2020-02-11 19:12:01','2020-02-11 19:12:01'),(13,NULL,1,2,'confirmacion','creado_cliente','active','2020-03-19 19:49:15','2020-03-19 19:49:15'),(14,NULL,1,2,'confirmar','creado_cliente','active','2020-03-19 20:04:40','2020-03-19 20:04:40'),(15,14,1,1,'ds','creado_cliente','active','2020-03-21 22:00:50','2020-03-21 22:00:50'),(16,15,1,1,'Probando cancelacio desde Xcomm','Activo','active','2020-04-14 19:26:23','2020-04-14 19:26:23'),(17,16,1,3,'Probando Xcomm 2 cancelacion','creado_cliente','active','2020-04-14 19:48:25','2020-04-14 19:48:25'),(18,17,1,2,'Cancelado por tiempo','cancelado_por_tiempo','active','2020-04-16 19:26:33','2020-04-16 19:26:33');

#
# Structure for table "clientetipopagoinfos"
#

DROP TABLE IF EXISTS `clientetipopagoinfos`;
CREATE TABLE `clientetipopagoinfos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transaccion_id` bigint(20) unsigned DEFAULT NULL,
  `tipo_pago` enum('efectivo','cheque','transferencia') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario_efectivo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_cheque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario_cheque` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_cuenta` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_transferencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rnc` int(11) DEFAULT NULL,
  `comentario_transferencia` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientetipopagoinfos_transaccion_id_foreign` (`transaccion_id`),
  CONSTRAINT `clientetipopagoinfos_transaccion_id_foreign` FOREIGN KEY (`transaccion_id`) REFERENCES `transaccions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "clientetipopagoinfos"
#

INSERT INTO `clientetipopagoinfos` VALUES (1,4,'transferencia',NULL,NULL,NULL,'1212121212','Diego',1010101010,'Prueba 1','active','2019-11-28 00:52:07','2019-11-28 00:52:07'),(2,5,'efectivo','Quiero mi dinero en billetes de 50',NULL,NULL,NULL,NULL,NULL,NULL,'active','2019-12-11 01:41:36','2019-12-11 01:41:36'),(3,6,'efectivo','mi cualto',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-02-09 17:21:49','2020-02-09 17:21:49'),(4,7,'efectivo','Prueba 1',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-02-09 19:26:17','2020-02-09 19:26:17'),(5,8,'efectivo','combrar',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 04:23:59','2020-03-09 04:23:59'),(6,9,'efectivo','Prieba como recibir el dinero del banco',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 04:42:07','2020-03-09 04:42:07'),(7,10,'efectivo','Prueba 2 recibir pago',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 04:44:51','2020-03-09 04:44:51'),(8,11,'efectivo','Preuba 3 exito',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-09 04:52:57','2020-03-09 04:52:57'),(9,12,'efectivo','Pruebas Compra',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-20 00:06:57','2020-03-20 00:06:57'),(10,13,'efectivo','Venta Euro',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-20 00:12:16','2020-03-20 00:12:16'),(11,14,'efectivo','f',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-22 01:57:09','2020-03-22 01:57:09'),(12,15,'efectivo','m',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-03-22 02:32:35','2020-03-22 02:32:35'),(13,16,'efectivo','Prueba xcomm 2',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-04-14 23:29:56','2020-04-14 23:29:56'),(14,17,'efectivo','d',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-04-15 23:28:54','2020-04-15 23:28:54'),(15,18,'efectivo','ok',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-06 19:41:59','2020-08-06 19:41:59'),(16,19,'efectivo','dfadfa',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-10 20:04:06','2020-08-10 20:04:06'),(17,20,'efectivo','si',NULL,NULL,NULL,NULL,NULL,NULL,'active','2020-08-13 19:15:55','2020-08-13 19:15:55');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
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

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'admin','jet_thunder@hotmail.com','2019-07-25 02:36:00','$2y$10$5aTN3walbyKee1o0tPhqJeCSowfL9oMZiXmBFrNMSK2i4rgc9B.fS','admin','1','VDkZLOWcD3gcGxlh3hAjCml7Toh8ZtJiPuJw4kpLpEi0FfIgAtmseyjn4o2U','2019-07-25 02:36:00','2019-07-25 02:36:00');

#
# Structure for table "usuarios_bancos"
#

DROP TABLE IF EXISTS `usuarios_bancos`;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "usuarios_bancos"
#

INSERT INTO `usuarios_bancos` VALUES (1,5,'Jose Ernesto Tejada','jet_thunder@hotmail.com','$2y$10$lwhIwfOGWi3CURNQTlR0s.uZySqBcLigUCoy.veCro2foqviidRX6','admin','active','2019-09-01 15:32:12','2019-09-08 22:46:39'),(2,5,'Airlin','A@gmail.com','$2y$10$yPXatvQRmRUZekekg2NxbunSXjz6Sfzo.Y25JeEFPCc5XFSMNHQyW','user','active','2019-09-01 15:34:56','2019-09-01 21:58:29'),(3,5,'Peppa','p@g.com','$2y$10$wGBIy/x4sImmEHbCYVTZbOQ/JQVExrFji9xcbBbqGpzr2CGLTC2oy','user','active','2019-09-10 00:12:45','2019-09-12 04:45:13'),(4,5,'Alberto','a@g.com','$2y$10$fZv7mZNqT5oRpbczYJ6XR.TDLuHGKNBDinWCXmuaBiVh1cF5Sz83e','user','active','2019-09-15 14:10:17','2019-09-15 14:10:17'),(5,1,'Maria','m@g.com','$2y$10$3yXhZoKNju7vRT/WC3MTRuUYXIZpz7nU5giRMFb9WkxCsZOXAQsIy','admin','active','2019-09-15 14:11:38','2019-09-15 14:11:38'),(6,1,'Alex','al@g.com','$2y$10$nRV24x3aQrCVB0TfsXcqaufkODsWySFaJpy9igvkvBqJLS8jeXkEm','user','active','2019-09-15 14:12:29','2019-09-15 14:12:29'),(7,3,'Pedro','p@g.com','$2y$10$gXS9HpMfJfecCcKR58Qou.8hamik7KtDcRygf.tZS6..XoBFRXYYu','admin','active','2019-09-23 21:05:55','2019-10-01 23:33:13');

#
# Structure for table "historicotransaccions"
#

DROP TABLE IF EXISTS `historicotransaccions`;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "historicotransaccions"
#

INSERT INTO `historicotransaccions` VALUES (1,18,NULL,NULL,'transaccion cliente','active','2020-08-10 15:59:21','2020-08-10 15:59:21'),(2,18,NULL,NULL,'transaccion completada','active','2020-08-10 16:02:23','2020-08-10 16:02:23'),(3,19,NULL,NULL,'creado cliente','active','2020-08-10 16:04:06','2020-08-10 16:04:06'),(4,19,5,'Maria','autorizado banco','active','2020-08-10 16:06:42','2020-08-10 16:06:42'),(5,19,NULL,NULL,'Transferencia Realizada','active','2020-08-10 16:10:28','2020-08-10 16:10:28'),(6,19,NULL,NULL,'Transferencia Realizada','active','2020-08-10 16:10:57','2020-08-10 16:10:57'),(7,19,5,'Maria','Deposito al cliente','active','2020-08-10 16:12:28','2020-08-10 16:12:28'),(8,19,NULL,NULL,'transaccion completada','active','2020-08-10 16:13:17','2020-08-10 16:13:17'),(9,20,NULL,NULL,'creado cliente','active','2020-08-13 15:15:55','2020-08-13 15:15:55'),(10,20,1,'Jose Ernesto Tejada','Transaccion autorizada','active','2020-08-13 15:16:54','2020-08-13 15:16:54'),(11,20,NULL,NULL,'Transferencia Realizada','active','2020-08-13 15:17:12','2020-08-13 15:17:12'),(12,20,1,'Jose Ernesto Tejada','Deposito al cliente','active','2020-08-13 15:17:37','2020-08-13 15:17:37'),(13,20,NULL,NULL,'transaccion completada','active','2020-08-13 15:17:58','2020-08-13 15:17:58');
