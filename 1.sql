/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.11-MariaDB : Database - tomcleandb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tomcleandb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `tomcleandb`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `mailtemplate` */

DROP TABLE IF EXISTS `mailtemplate`;

CREATE TABLE `mailtemplate` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `mailtemplate` */

insert  into `mailtemplate`(`id`,`status`,`header`,`content`) values 
(1,'0','Status \"New\"','Your order is NEW.'),
(2,'1','Status \"Accepted\"','Your order status is \"Accepted\" now.'),
(3,'2','Status \"On Service\"','Your order status is \"On Service\" now.'),
(4,'3','Status \"Payment Requested\"','Your order status is \"Payment Requested\"now.'),
(5,'4','Status \"Payment Finished\"','Your order status is \"Payment Finished\" now.'),
(6,'5','Status \"Finished\"','Your order status is \"Finished\" now.'),
(7,'','',''),
(8,'','','');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2019_08_19_000000_create_failed_jobs_table',1),
(3,'2020_07_13_090714_orderlist',1),
(4,'2020_07_17_043118_create_products_table',1),
(5,'2020_07_17_070442_create_orders_table',1),
(6,'2020_07_17_222724_create_services_table',2),
(7,'2020_07_18_134428_mail_template',3),
(8,'2020_07_18_140218_mail_template',4);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` smallint(6) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`service_id`,`name`,`status`,`email`,`address`,`mobile_number`,`pay_email`,`start_date`,`end_date`,`start_time`,`end_time`,`created_at`,`updated_at`) values 
(1,1,'First',3,'2343','Earth','11111111','firstpay@pay.com','2020-07-18','2020-07-25','16:31:00','21:56:00','2020-07-18 19:04:03',NULL),
(3,3,'Room Man',5,'root@outlook.com','12332','12323','123@out.com','2020-07-18','2020-07-18','04:29:00','23:36:00','2020-07-18 19:04:03',NULL),
(4,1,'Angry',4,'234234','1324123','2134324','3432@dfsdf.com','2020-07-18','2020-07-18','14:10:00','14:10:00','2020-07-18 19:04:03',NULL),
(6,1,'12:03user',1,'234234','Sun','010101010','paypal@pay.com','2020-07-16','2020-07-23','02:00:00','04:22:00','2020-07-18 19:04:03','2020-07-18 19:04:03'),
(7,1,'01:33PM',1,'tom@tom.com','1234 Main Street','12341234','paypal@pay.com','2020-07-16','2020-07-25','02:00:00','04:22:00','2020-07-18 20:34:12','2020-07-18 20:34:12');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

/*Table structure for table `service` */

DROP TABLE IF EXISTS `service`;

CREATE TABLE `service` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `service` */

insert  into `service`(`id`,`name`,`summary`,`detail`,`image_path`,`price`,`created_at`,`updated_at`) values 
(1,'Clean1','ClockRent currently serves around 60 companies with office cleaning in mainly…','ClockRent currently serves around 60 companies with office cleaning in mainly…ClockRent currently serves around 60 companies with office cleaning in mainly…ClockRent currently serves around 60 companies with office cleaning in mainly…','s_4.jpg',4,NULL,NULL),
(2,'Garden Service','Summary 2','ClockRent currently serves around 60 companies with office cleaning in mainly…','s_2.jpg',5,NULL,NULL),
(3,'Shop Cleaning','summary 3','ClockRent currently serves around 60 companies with office cleaning in mainly…','s_3.jpg',2,NULL,NULL),
(4,'Room Cleaning','Our cleaning moves follow a manual-based checklist to insure both of you.','ClockRent currently serves around 60 companies with office cleaning, primarily in the Malmö-Lund region and its surroundings. We are absolutely competitive with other cleaning companies. Our goal to live up to our name is of course to maintain a high qual','s_1.jpg',2,NULL,NULL),
(5,'Building','Construction cleaning is extremely important as we are the last link in the chain from start of construction to occupancy. It is therefore extra important','Our attitude is that there is neither too small nor too large customers in our concept. ClockRent adjusts the cleaning surfaces and frequency according to your specific needs. Because even though most office cleaners have similar parts, with floor cleanin','s_5.jpg',3,NULL,NULL),
(6,'Office Cleaning','Building cleaning is about ClockRent entering the apartment / premises when the craftsmen are finished with their work.','Construction cleaning is extremely important as we are the last link in the chain from start of construction to occupancy. It is therefore extra important that we ensure that both builders / craftsmen are satisfied, but also you who will then use the prem','s_6.jpg',2,NULL,NULL),
(7,'Window Cleaning','ClockRent provides construction cleaning for both large construction companies and private individuals. As a private person, you can also ','ClockRent provides construction cleaning for both large construction companies and private individuals. As a private person, you can also use the RUT deduction with services close to home, so the labor cost will then only be half as large. We handle all h','s_7.jpg',1,NULL,NULL),
(8,'House Clenaing','only be half as large. We handle all handling around the RUT deduction.\r\n\r\nWhat is included in a building cleaning? Cleaning away construction dust places other demands than ordinary cleaning. For example. Type of vacuum cleaner. Often there are joints / ','Cleaning away construction dust places other demands than ordinary cleaning. For example. Type of vacuum cleaner. Often there are joints / tape residues and sometimes also paint splashes and the like. Everything is completely cleaned here: Not only floors','s_8.jpg',3,NULL,NULL),
(9,'Stay Cleaning','Often there are joints / tape residues and sometimes also paint splashes and the like. Everything is completely cleaned here: Not only floors and surface layers but also inside cabinets, moldings, plinths, ','Construction cleaning is extremely important as we are the last link in the chain from start of construction to occupancy. It is therefore extra important that we ensure that both builders / craftsmen are satisfied, but also you who will then use the prem','s_9.jpg',1,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'tomcat@outlook.com','tomcat@outlook.com',NULL,'tomcattomcat',NULL,'2020-07-19 01:53:52','2020-07-19 01:53:52'),
(2,'root','root',NULL,'$2y$10$4BLapahPdRTWSpxuUpmcS.qok4Lc.1qZGOdGDa0FwKIvhcgx5tLZS',NULL,'2020-07-19 04:22:54','2020-07-19 04:22:54');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
