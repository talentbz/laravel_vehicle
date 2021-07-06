/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.8-MariaDB : Database - vehicle_ad
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vehicle_ad` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `vehicle_ad`;

/*Table structure for table `bulletin` */

DROP TABLE IF EXISTS `bulletin`;

CREATE TABLE `bulletin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bulletin` */

/*Table structure for table `company_details` */

DROP TABLE IF EXISTS `company_details`;

CREATE TABLE `company_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `company_details` */

insert  into `company_details`(`id`,`user_id`,`company_member`,`site_url`,`description`,`created_at`,`updated_at`,`member`) values 
(7,16,NULL,NULL,'company1 description.\r\ncompany1 description.\r\ncompany1 description.\r\ncompany1 description.','2021-07-05 16:33:09','2021-07-05 16:33:09','member1');

/*Table structure for table `company_media` */

DROP TABLE IF EXISTS `company_media`;

CREATE TABLE `company_media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `company_media` */

insert  into `company_media`(`id`,`company_id`,`path`,`created_at`,`updated_at`) values 
(62,7,'http://localhost:8000/uploads/company/16/1625503033361.jpg','2021-07-05 16:37:13','2021-07-05 16:37:13'),
(63,7,'http://localhost:8000/uploads/company/16/1625503033639.jpg','2021-07-05 16:37:13','2021-07-05 16:37:13');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2021_06_13_135348_create_company_details_table',1),
(5,'2021_06_13_234500_create_company_media_table',1),
(13,'2021_06_20_151542_create_vehicle_fee_table',5),
(17,'2021_06_20_151742_create_vehicle_equipment',6),
(18,'2021_06_20_151412_create_vehicle_table',7),
(19,'2021_06_20_151503_create_vehicle_media_table',7),
(20,'2021_06_20_151620_create_bulletin_table',8);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `dob` date DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`company_name`,`location`,`phone`,`status`,`dob`,`avatar`,`role`,`email_verified_at`,`password`,`path`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Shinji Ohashi','sin7sin4@gmail.com','Shinji Ohashi','yui','123',1,NULL,NULL,1,NULL,'$2y$10$/FioGTAGf.aJ0dtAfMIiqurvY1CVTKkgI4CpFc8FviIwVwac3LPU2',NULL,NULL,NULL,'2021-06-23 13:57:10'),
(16,NULL,'admin1@admin.com','company1','location1','12345678',1,NULL,'http://localhost:8000/uploads/avatar/1625501194114.jpg',2,NULL,'$2y$10$VtczvPms.rEd4uZKzr5X4.tOxUcn5UXM71yHgG5NYY35pDbDGGJ3S',NULL,NULL,'2021-07-05 16:06:34','2021-07-05 16:06:34'),
(17,NULL,'admin2@admin.com','company2','location2','12345678',1,NULL,'http://localhost:8000/uploads/avatar/1625501279452.jpg',2,NULL,'$2y$10$v8Zem5tdU2b2LQl8N0KIFOgE.OCCJ3oGkpx3usoGSCcEdYVHpPOCi',NULL,NULL,'2021-07-05 16:07:59','2021-07-05 16:07:59');

/*Table structure for table `vehicle` */

DROP TABLE IF EXISTS `vehicle`;

CREATE TABLE `vehicle` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `car_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engine_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `displacement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shape` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mileage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `require_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `loading_capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vehicle` */

insert  into `vehicle`(`id`,`company_id`,`car_category`,`car_name`,`area`,`model`,`body_number`,`engine_model`,`displacement`,`fule`,`mission`,`shape`,`class`,`max_capacity`,`mileage`,`require_path`,`start_year`,`start_month`,`end_year`,`end_month`,`created_at`,`updated_at`,`loading_capacity`) values 
(4,7,'三菱ふそう','キャンター','青森県','model1','car-1','engine1','2500','軽油','フロアオートマ(AT)','ウィング','小型','3人','3000','http://localhost:8000/uploads/vehicle/16/1/1625530549194.jpg','昭和50年(1975年)','1月',NULL,NULL,'2021-07-06 00:15:49','2021-07-06 00:15:49','2500');

/*Table structure for table `vehicle_equipment` */

DROP TABLE IF EXISTS `vehicle_equipment`;

CREATE TABLE `vehicle_equipment` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `power_set` tinyint(1) NOT NULL DEFAULT 0,
  `power_window` tinyint(1) NOT NULL DEFAULT 0,
  `air_set` tinyint(1) NOT NULL DEFAULT 0,
  `door_set` tinyint(1) NOT NULL DEFAULT 0,
  `etc_set` tinyint(1) NOT NULL DEFAULT 0,
  `tacograph_set` tinyint(1) NOT NULL DEFAULT 0,
  `adblue_set` tinyint(1) NOT NULL DEFAULT 0,
  `air_sus_set` tinyint(1) NOT NULL DEFAULT 0,
  `leaf_sus_set` tinyint(1) NOT NULL DEFAULT 0,
  `cruise_set` tinyint(1) NOT NULL DEFAULT 0,
  `redtarder_set` tinyint(1) NOT NULL DEFAULT 0,
  `lane_set` tinyint(1) NOT NULL DEFAULT 0,
  `disc_set` tinyint(1) NOT NULL DEFAULT 0,
  `air_bag_set` tinyint(1) NOT NULL DEFAULT 0,
  `abs_set` tinyint(1) NOT NULL DEFAULT 0,
  `asr_set` tinyint(1) NOT NULL DEFAULT 0,
  `camera_set` tinyint(1) NOT NULL DEFAULT 0,
  `immobilizer_set` tinyint(1) NOT NULL DEFAULT 0,
  `dvd_set` tinyint(1) NOT NULL DEFAULT 0,
  `cd_set` tinyint(1) NOT NULL DEFAULT 0,
  `md_set` tinyint(1) NOT NULL DEFAULT 0,
  `radio_set` tinyint(1) NOT NULL DEFAULT 0,
  `navigation_set` tinyint(1) NOT NULL DEFAULT 0,
  `tv_set` tinyint(1) NOT NULL DEFAULT 0,
  `repaire_set` tinyint(1) NOT NULL DEFAULT 0,
  `owner_set` tinyint(1) NOT NULL DEFAULT 0,
  `unused_set` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hill_set` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vehicle_equipment` */

insert  into `vehicle_equipment`(`id`,`vehicle_id`,`power_set`,`power_window`,`air_set`,`door_set`,`etc_set`,`tacograph_set`,`adblue_set`,`air_sus_set`,`leaf_sus_set`,`cruise_set`,`redtarder_set`,`lane_set`,`disc_set`,`air_bag_set`,`abs_set`,`asr_set`,`camera_set`,`immobilizer_set`,`dvd_set`,`cd_set`,`md_set`,`radio_set`,`navigation_set`,`tv_set`,`repaire_set`,`owner_set`,`unused_set`,`created_at`,`updated_at`,`hill_set`) values 
(5,4,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2021-07-06 00:15:49','2021-07-06 00:15:49',0);

/*Table structure for table `vehicle_fee` */

DROP TABLE IF EXISTS `vehicle_fee`;

CREATE TABLE `vehicle_fee` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxExc_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxInc_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vehicle_fee` */

insert  into `vehicle_fee`(`id`,`vehicle_id`,`fee`,`taxExc_price`,`taxInc_price`,`note`,`created_at`,`updated_at`) values 
(5,4,'5000','300','350','description1\r\ndescription1\r\ndescription1\r\ndescription1','2021-07-06 00:15:49','2021-07-06 00:15:49');

/*Table structure for table `vehicle_media` */

DROP TABLE IF EXISTS `vehicle_media`;

CREATE TABLE `vehicle_media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `car_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vehicle_media` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
