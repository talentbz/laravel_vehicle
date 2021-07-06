

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

insert  into `bulletin`(`id`,`company_id`,`category`,`title`,`deadline_date`,`content`,`created_at`,`updated_at`) values 
(2,3,'求人','5月10日東京方面配達','2021-06-24T11:45','5月10日名古屋から東京方面への配達できる方を募集します。荷物は冷凍食品です。詳細は052-945-7788　小林まで\r\n5月10日名古屋から東京方面への配達できる方を募集します。荷物は冷凍食品です。詳細は052-945-7788　小林まで\r\n5月10日名古屋から東京方面への配達できる方を募集します。荷物は冷凍食品です。詳細は052-945-7788　小林まで','2021-06-23 00:44:12','2021-07-05 08:44:19'),
(3,3,'仕事求む','5月2日名古屋ー大阪配達仕事求む','2021-06-18T00:51','5月2日名古屋から大阪方面へ4トントラックにての配達予定。','2021-06-23 00:47:31','2021-06-23 00:56:12');

/*Table structure for table `company_details` */

DROP TABLE IF EXISTS `company_details`;

CREATE TABLE `company_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `company_details` */

insert  into `company_details`(`id`,`user_id`,`company_member`,`site_url`,`description`,`created_at`,`updated_at`,`member`) values 
(3,13,'','http://truckerjapan.com/','company3','2021-06-19 07:01:45','2021-07-02 15:01:42','member3'),
(4,8,NULL,'http://truckerjapan.com/company','<p>compan5 content</p>','2021-06-23 13:50:05','2021-06-23 13:50:05','company5'),
(5,11,NULL,'http://truckerjapan.com/company','678','2021-06-23 16:58:44','2021-07-03 00:21:42','member6');

/*Table structure for table `company_media` */

DROP TABLE IF EXISTS `company_media`;

CREATE TABLE `company_media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `company_media` */

insert  into `company_media`(`id`,`company_id`,`path`,`created_at`,`updated_at`) values 
(55,3,'http://truckerjapan.com/uploads/company/2/1624365747291.png','2021-06-22 12:42:27','2021-06-22 12:42:27'),
(56,3,'http://truckerjapan.com/uploads/company/2/1624365747478.png','2021-06-22 12:42:27','2021-06-22 12:42:27'),
(57,4,'http://truckerjapan.com/uploads/company/8/1624460050514.png','2021-06-23 14:54:10','2021-06-23 14:54:10'),
(58,4,'http://truckerjapan.com/uploads/company/8/1624460050759.png','2021-06-23 14:54:10','2021-06-23 14:54:10'),
(61,5,'http://truckerjapan.com/uploads/company/11/1625271616456.jpg','2021-07-03 00:20:16','2021-07-03 00:20:16');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`company_name`,`location`,`phone`,`status`,`dob`,`avatar`,`role`,`email_verified_at`,`password`,`path`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Shinji Ohashi','sin7sin4@gmail.com','Shinji Ohashi','yui','123',1,NULL,NULL,1,NULL,'$2y$10$/FioGTAGf.aJ0dtAfMIiqurvY1CVTKkgI4CpFc8FviIwVwac3LPU2',NULL,NULL,NULL,'2021-06-23 13:57:10'),
(11,'admin6','admin6@gmail.com','company5','yui','yui',1,NULL,'http://truckerjapan.com/uploads/avatar/1624464554651.jpg',2,NULL,'$2y$10$DsnTm6/kk5FlV.RmRGsxWeCvcDzj.GrFxcMYjFhvDSkJ3eDPxG7/C',NULL,NULL,'2021-06-23 15:56:38','2021-06-23 16:58:44'),
(12,'admin2','admin2@admin.com','company2','location2 location2 location2 location2 location2 location2 location2 ','12345678',1,NULL,'http://truckerjapan.com/uploads/avatar/1625043615275.jpg',2,NULL,'$2y$10$/Ka7Y/jckXR3FYndv0T4k.p70JOBjtsCLY3dlS/cpFPd5JMeACTg2',NULL,NULL,'2021-06-30 09:00:15','2021-06-30 09:00:15'),
(13,'admin1','admin1@admin.com','company1','location3','12345678',1,NULL,'http://truckerjapan.com/uploads/avatar/1625134319820.jpg',2,NULL,'$2y$10$tqGtcdEtSslv6Aidu7NlGeswOdBnVBkwotB8WLcOT0Mb8gMheEVCS',NULL,NULL,'2021-07-01 10:12:00','2021-07-02 15:01:41'),
(15,NULL,'admin3@admin.com','company3','location3','123456789',1,NULL,'http://truckerjapan.com/uploads/avatar/1625234585445.jpg',2,NULL,'$2y$10$MQnvdi6YYvq2GjVChRMN9OY8Ar8Nkc.zcYzk5wyDOTBe/paG0n4z6',NULL,NULL,'2021-07-02 14:03:05','2021-07-02 14:03:05');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vehicle` */

insert  into `vehicle`(`id`,`company_id`,`car_category`,`car_name`,`area`,`model`,`body_number`,`engine_model`,`displacement`,`fule`,`mission`,`shape`,`class`,`max_capacity`,`mileage`,`require_path`,`start_year`,`start_month`,`end_year`,`end_month`,`created_at`,`updated_at`,`loading_capacity`) values 
(1,3,'いすゞ','コモ','北海道','789','567','yui','567000','軽油','フロアオートマ(AT)','ウィング','バス','2人','256000','http://truckerjapan.com/uploads/vehicle/2/1/1624520737678.jpg','昭和50年(1975年)','1月','令和4年(2022年)','1月','2021-06-22 02:42:21','2021-06-24 07:45:37','256'),
(3,3,'いすゞ','エルフ','北海道','123','123','123','123','軽油','フロアオートマ(AT)','バン','大型','2人','123','http://truckerjapan.com/uploads/vehicle/2/1/1624522509244.jpg','昭和50年(1975年)','1月','令和6年(2024年)','1月','2021-06-24 08:15:09','2021-06-24 08:15:09','123');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vehicle_equipment` */

insert  into `vehicle_equipment`(`id`,`vehicle_id`,`power_set`,`power_window`,`air_set`,`door_set`,`etc_set`,`tacograph_set`,`adblue_set`,`air_sus_set`,`leaf_sus_set`,`cruise_set`,`redtarder_set`,`lane_set`,`disc_set`,`air_bag_set`,`abs_set`,`asr_set`,`camera_set`,`immobilizer_set`,`dvd_set`,`cd_set`,`md_set`,`radio_set`,`navigation_set`,`tv_set`,`repaire_set`,`owner_set`,`unused_set`,`created_at`,`updated_at`,`hill_set`) values 
(2,1,0,1,0,0,1,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,'2021-06-22 02:42:21','2021-06-24 07:45:37',0),
(4,3,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,'2021-06-24 08:15:09','2021-06-24 08:15:09',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vehicle_fee` */

insert  into `vehicle_fee`(`id`,`vehicle_id`,`fee`,`taxExc_price`,`taxInc_price`,`note`,`created_at`,`updated_at`) values 
(2,1,'123','123','12300000','123','2021-06-22 02:42:21','2021-06-24 06:55:03'),
(4,3,'123','213','123','123','2021-06-24 08:15:09','2021-06-24 08:15:09');

/*Table structure for table `vehicle_media` */

DROP TABLE IF EXISTS `vehicle_media`;

CREATE TABLE `vehicle_media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `car_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vehicle_media` */

insert  into `vehicle_media`(`id`,`vehicle_id`,`car_path`,`created_at`,`updated_at`) values 
(109,3,'http://truckerjapan.com/uploads/vehicle/2/3/1624948394292.jpg','2021-06-29 06:33:15','2021-06-29 06:33:15'),
(110,3,'http://truckerjapan.com/uploads/vehicle/2/3/1624948395688.jpg','2021-06-29 06:33:17','2021-06-29 06:33:17'),
(111,3,'http://truckerjapan.com/uploads/vehicle/2/3/1624948397506.jpg','2021-06-29 06:33:20','2021-06-29 06:33:20'),
(112,3,'http://truckerjapan.com/uploads/vehicle/2/3/1624948400712.jpg','2021-06-29 06:33:21','2021-06-29 06:33:21'),
(113,3,'http://truckerjapan.com/uploads/vehicle/2/3/1624948402191.jpg','2021-06-29 06:33:23','2021-06-29 06:33:23'),
(114,3,'http://truckerjapan.com/uploads/vehicle/2/3/1624948403956.jpg','2021-06-29 06:33:24','2021-06-29 06:33:24'),
(115,3,'http://truckerjapan.com/uploads/vehicle/2/3/1624948405109.jpg','2021-06-29 06:33:26','2021-06-29 06:33:26'),
(116,3,'http://truckerjapan.com/uploads/vehicle/2/3/1624948406509.jpg','2021-06-29 06:33:27','2021-06-29 06:33:27'),
(117,3,'http://truckerjapan.com/uploads/vehicle/2/3/1624948407578.jpg','2021-06-29 06:33:28','2021-06-29 06:33:28');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
