# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 8.0.22-0ubuntu0.20.04.3)
# Database: timetracker
# Generation Time: 2020-12-26 20:43:46 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table log
# ------------------------------------------------------------

CREATE TABLE `log` (
  `record_no` bigint unsigned NOT NULL AUTO_INCREMENT,
  `record_no_source` bigint DEFAULT NULL,
  `log_date` datetime NOT NULL,
  `P21_location_id` int NOT NULL,
  `P21_loc_short_name_ud` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `P21_technician_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `technician_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_comment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_hours` double(18,2) NOT NULL,
  `date_created` datetime NOT NULL,
  `delete_flag` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `date_edited` datetime DEFAULT NULL,
  `edited_by` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edited_flag` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`record_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;

INSERT INTO `log` (`record_no`, `record_no_source`, `log_date`, `P21_location_id`, `P21_loc_short_name_ud`, `P21_technician_id`, `technician_name`, `job_type`, `job_name`, `job_comment`, `log_hours`, `date_created`, `delete_flag`, `date_edited`, `edited_by`, `edited_flag`)
VALUES
	(1,NULL,'2020-12-26 00:00:00',100003,'COL-SHOP','65192','Josh Wilson','HPU','Testing','Cool Test 3',4.00,'2020-12-26 03:42:24','N',NULL,NULL,'N'),
	(2,NULL,'2020-12-26 00:00:00',100003,'COL-SHOP','65192','Josh Wilson','INSPECT','Another Test','Cool Test 3',4.00,'2020-12-26 03:43:10','Y','2020-12-26 03:45:03','Andrew Rogers','Y'),
	(3,2,'2020-12-26 00:00:00',100003,'COL-SHOP','65192','Josh Wilson','INSPECT','Another Test','Cool Test 3',2.00,'2020-12-26 03:45:03','Y','2020-12-26 03:45:48','Andrew Rogers','Y'),
	(4,3,'2020-12-26 00:00:00',100003,'COL-SHOP','65201','Brian Horner','INSPECT','Another Test','Cool Test 3',2.00,'2020-12-26 03:45:48','N',NULL,NULL,'N'),
	(5,NULL,'2020-12-26 00:00:00',100003,'COL-SHOP','65193','Nick Maffe','CYLINDER','Trx 1','Col-shop, NM, CR',1.00,'2020-12-26 13:57:32','N',NULL,NULL,'N'),
	(6,NULL,'2020-12-26 00:00:00',100003,'COL-SHOP','65193','Nick Maffe','HPU','Trx 2 - Edit','Col-shop, NM, HPU - edit',6.25,'2020-12-26 13:58:05','N',NULL,NULL,'N'),
	(7,NULL,'2020-12-26 00:00:00',100003,'COL-SHOP','65193','Nick Maffe','INSPECT','Trx 3','Col-shop, NM, Insp',1.50,'2020-12-26 13:58:36','N',NULL,NULL,'N'),
	(8,NULL,'2020-12-26 00:00:00',100003,'COL-SHOP','65193','Nick Maffe','SERVICE','Trx 4','Col-shop, NM, Srvc',1.75,'2020-12-26 13:59:00','Y','2020-12-26 14:06:50','Barry Hallman','Y'),
	(9,NULL,'2020-12-26 00:00:00',100008,'COL-SVC','65194','Brian Horner','CYLINDER','Trx 5','Col-svc, BH, CR',2.00,'2020-12-26 13:59:49','N',NULL,NULL,'N'),
	(10,NULL,'2020-12-26 00:00:00',100008,'COL-SVC','65194','Brian Horner','HPU','Trx 6','Col-svc, BH, HPU',2.25,'2020-12-26 14:00:28','N',NULL,NULL,'N'),
	(11,NULL,'2020-12-26 00:00:00',100008,'COL-SVC','65194','Brian Horner','INSPECT','Trx 7','Col-svc, BH, Insp',2.50,'2020-12-26 14:00:51','N',NULL,NULL,'N'),
	(12,NULL,'2020-12-26 00:00:00',100008,'COL-SVC','65194','Brian Horner','SERVICE','Trx 8','Col-svc, BH, Svc',2.75,'2020-12-26 14:01:31','N',NULL,NULL,'N'),
	(13,8,'2020-12-26 00:00:00',100003,'COL-SHOP','65193','Nick Maffe','SERVICE','Trx 4 - edited','Col-shop, NM, Srvc - EDIT',6.50,'2020-12-26 14:06:50','N',NULL,NULL,'N'),
	(14,NULL,'2020-12-25 00:00:00',124339,'RHM-GR','34286','Jeff Hernandez','SERVICE','Trx 9 - edit 2','Col-shop, NM, Srvc - EDIT; edited in Admin',8.00,'2020-12-26 16:41:57','N',NULL,NULL,'N');

/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table log_view_job_type
# ------------------------------------------------------------

CREATE TABLE `log_view_job_type` (
  `job_type` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type_description` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`job_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `log_view_job_type` WRITE;
/*!40000 ALTER TABLE `log_view_job_type` DISABLE KEYS */;

INSERT INTO `log_view_job_type` (`job_type`, `job_type_description`)
VALUES
	('CYLINDER','CYLINDER REPAIR'),
	('HPU','HPU SERVICE'),
	('INSPECT','INSPECTION'),
	('SERVICE','SERVICE - GENERAL');

/*!40000 ALTER TABLE `log_view_job_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table log_view_location
# ------------------------------------------------------------

CREATE TABLE `log_view_location` (
  `location_id` int NOT NULL,
  `loc_short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `log_view_location` WRITE;
/*!40000 ALTER TABLE `log_view_location` DISABLE KEYS */;

INSERT INTO `log_view_location` (`location_id`, `loc_short_name`)
VALUES
	(100002,'INDY'),
	(100003,'COL-SHOP'),
	(100004,'BREA'),
	(100008,'COL-SVC'),
	(124339,'RHM-GR'),
	(125102,'SPRINGBORO'),
	(128640,'NAHI'),
	(153801,'RHM-WL');

/*!40000 ALTER TABLE `log_view_location` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table log_view_technician
# ------------------------------------------------------------

CREATE TABLE `log_view_technician` (
  `location_id` int NOT NULL,
  `contact_id` int NOT NULL,
  `technician_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `log_view_technician` WRITE;
/*!40000 ALTER TABLE `log_view_technician` DISABLE KEYS */;

INSERT INTO `log_view_technician` (`location_id`, `contact_id`, `technician_name`)
VALUES
	(128640,33053,'ROBERT MCINTYRE'),
	(128640,33054,'DAVID GRAHAM'),
	(128640,33213,'BURNELL WILSON'),
	(124339,34286,'Jeff Hernandez'),
	(124339,34287,'Outside Contractor'),
	(124339,34330,'Trip Charge'),
	(124339,34331,'Vibration  Testing'),
	(128640,36472,'SAM WESLEY'),
	(128640,36473,'CHARIESE HENRY'),
	(128640,36498,'SERVICE  DEPARTMENT'),
	(124339,37003,'Tim Goodyke'),
	(153801,37162,'Tim Bowles'),
	(153801,37164,'Alana Doe'),
	(153801,37166,'Jim Ferriby'),
	(153801,37168,'John Kellar'),
	(153801,37170,'Megan Olsen'),
	(153801,37172,'Matt Schweiss'),
	(153801,37174,'Duane Smithey'),
	(153801,37176,'Rob Walter'),
	(153801,37178,'Fred Shagena'),
	(153801,37180,'Andy Raczy'),
	(124339,37843,'Brian LaShure'),
	(128640,38215,'PHILLIP  ENSMINGER'),
	(153801,38758,'TOMMY MCLELLAND'),
	(128639,40582,'ANDREW JENSEN'),
	(128639,40583,'CURTIS JACKSON'),
	(128639,40584,'BLAKE CYR'),
	(128639,40585,'JOHN OLIVIER'),
	(128640,41165,'CHRIS GRAHAM'),
	(128640,41690,'CASEY REED'),
	(153801,42402,'GARY RYS (CONTRACTOR)'),
	(153801,42870,'MIKE SMITH'),
	(153801,43172,'CHRIS STEVENSON JR.'),
	(153801,43936,'NEIL GIST (RHM)'),
	(153801,44072,'Tim Goodyke (Westland)'),
	(100008,45046,'Chad Williamson'),
	(124339,45427,'TIM GOODYKE (warranty)'),
	(124339,45428,'JEFF HERNANDEZ (warranty)'),
	(124339,47494,'MATT GOODYKE'),
	(153801,49094,'ADRIAN  FRATILA'),
	(153801,49826,'JEFF CARRIER (CONTRACTOR)'),
	(153801,50000,'DON THORNTON (CONTRACTOR)'),
	(153801,51186,'DAN GIRARDIN'),
	(153801,52668,'BOBBY PERRY'),
	(153801,52874,'CHRIS LAPHAM  (CONTRACTOR)'),
	(153801,53734,'GARRETT BAKER'),
	(153801,54596,'WILLIAM JORDAN'),
	(153801,55964,'KYLE CEJMER'),
	(153801,56940,'DAVID GORDON (CONTRACTOR)'),
	(153801,57950,'FRED NETZEL (CONTRACTOR)'),
	(124339,59264,'JEFF BELLINGER'),
	(153801,61314,'ADAM ASKREN'),
	(153801,62072,'GARY PHILLIPS (CONTRACTOR)'),
	(153801,64692,'ANTHONY BIZON'),
	(153801,64694,'NEELIMA SARIKONDA'),
	(153801,64696,'KYLE SWINDLEHURST'),
	(100003,65192,'Josh Wilson'),
	(100003,65193,'Nick Maffe'),
	(100008,65194,'Brian Horner'),
	(100008,65195,'Paul Ballard'),
	(100008,65196,'Roland Heyder'),
	(100008,65197,'David Kirk'),
	(100008,65198,'Gary White'),
	(100008,65199,'Dale Williamson'),
	(100008,65200,'Kevin Mehling'),
	(100003,65201,'Brian Horner');

/*!40000 ALTER TABLE `log_view_technician` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(6,'2020_11_26_140032_create_log_table',1),
	(7,'2020_11_26_150433_create_log_view_technician_view',1),
	(8,'2020_11_26_151107_create_log_view_location_view',1),
	(9,'2020_11_26_153134_create_log_view_job_type_view',1),
	(10,'2020_12_24_171819_add_record_no_source_to_log',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
