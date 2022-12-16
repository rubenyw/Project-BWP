/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.24-MariaDB : Database - db_actionfigure
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_actionfigure` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_actionfigure`;

/*Table structure for table `actionfigure` */

DROP TABLE IF EXISTS `actionfigure`;

CREATE TABLE `actionfigure` (
  `af_id` varchar(5) NOT NULL,
  `af_name` varchar(500) NOT NULL,
  `af_price` double NOT NULL,
  `af_stock` int(10) NOT NULL,
  `af_status` int(10) NOT NULL,
  `af_se_id` varchar(5) NOT NULL,
  `af_desc` varchar(255) NOT NULL,
  `af_image_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`af_id`),
  KEY `FKSERIES_ACTIONFIGURE` (`af_se_id`),
  CONSTRAINT `FKSERIES_ACTIONFIGURE` FOREIGN KEY (`af_se_id`) REFERENCES `series` (`se_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `actionfigure` */

insert  into `actionfigure`(`af_id`,`af_name`,`af_price`,`af_stock`,`af_status`,`af_se_id`,`af_desc`,`af_image_path`) values 
('AF001','Luffy D. Monkey Gear 3 Deluxe Edition 7cm',1000000,11,1,'SE001','',NULL),
('AF002','Sasuke Uchiha Susanoo Matakao 3x5cm',2000000,5,1,'SE002','',NULL),
('AF003','Son Goku Super Saiyan Anniversary Edition 8cm',500000,71,1,'SE003','',NULL),
('AF004','Asta Full Body Figure 7cm',900000,28,1,'SE004','',NULL),
('AF005','Doraemon 8cm',300000,7,1,'SE005','',NULL),
('AF006','Sanji - One Piece 12cm',800000,29,1,'SE001','',NULL),
('AF007','Attack Titan 16cm',560000,8,1,'SE006','',NULL),
('AF008','Colossal Titan 12cm',400000,41,1,'SE006','',NULL),
('AF009','Denji full body 12cm',450000,22,1,'SE007','',NULL),
('AF010','Naruto - Rasengan 12cm',250000,56,1,'SE002','',NULL),
('AF011','Milizé Vladilena full body 10cm',350000,29,1,'SE009','',NULL),
('AF012','Ogiso Setsuna - White Dress 14cm',680000,27,1,'SE008','',NULL),
('AF013','Ryuk 8cm',270000,71,1,'SE010','',NULL),
('AF014','Kurosaki Ichigo - Bankai 12cm',800000,16,1,'SE011','',NULL),
('AF015','Sakata Gintoki 12cm',120000,99,1,'SE012','',NULL),
('AF016','Touma Kazusa - White Dress',3900000,2,1,'SE008','',NULL),
('AF017','Violet Evergarden - chibi 4.5cm',190000,77,1,'SE013','',NULL),
('AF018','Kamado Tanjirou - Water Breathing Technique 14cm',900000,8,1,'SE014','',NULL),
('AF019','Megumin 12cm',475000,22,1,'SE020','',NULL),
('AF020','Saber - Combat Outfit 12cm',745000,4,1,'SE017','',NULL),
('AF021','Astolfo full body 12cm',690000,6,1,'SE017','',NULL),
('AF022','Emperor Lelouch 14cm',721000,20,1,'SE015','',NULL),
('AF023','Lelouch Lamperouge 12cm',820000,9,1,'SE015','',NULL),
('AF024','Nanachi - Fishing 12cm',480000,16,1,'SE016','',NULL),
('AF025','Gojou Satoru - Hello 12cm',590000,91,1,'SE018','',NULL),
('AF026','Vegeta - Super Saiyan 12cm',610000,32,1,'SE003','',NULL),
('AF027','Miyazono Kaori Complete Set 12cm',500000,25,1,'SE019','',NULL),
('AF028','Gon Freecss Standing on Rock 16cm',290000,61,1,'SE021','',NULL),
('AF029','Senkuu full body 12cm',720000,7,1,'SE022','',NULL),
('AF030','Emilia - White 10cm',380000,21,1,'SE023','',NULL),
('AF031','Esdeath - Standing on Ice 14cm',420000,6,1,'SE024','',NULL),
('AF032','Ayanami - Chibi 6cm',200000,164,1,'SE025','',NULL);

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `ca_us_id` varchar(5) NOT NULL,
  `ca_af_id` varchar(5) NOT NULL,
  `ca_status` varchar(11) NOT NULL,
  PRIMARY KEY (`ca_us_id`,`ca_af_id`),
  KEY `ca_af_id` (`ca_af_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`ca_us_id`) REFERENCES `users` (`us_id`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ca_af_id`) REFERENCES `actionfigure` (`af_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `cart` */

insert  into `cart`(`ca_us_id`,`ca_af_id`,`ca_status`) values 
('US001','AF001','Requested'),
('US001','AF003','Requested');

/*Table structure for table `discount` */

DROP TABLE IF EXISTS `discount`;

CREATE TABLE `discount` (
  `di_id` varchar(5) NOT NULL,
  `di_nama` varchar(255) NOT NULL,
  `di_value` double NOT NULL,
  PRIMARY KEY (`di_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `discount` */

insert  into `discount`(`di_id`,`di_nama`,`di_value`) values 
('DI001','Oktoberbahagia',10),
('DI002','Cuci Gudang',15),
('DI003','Promo 11.11',20),
('DI004','Tahun Baru',25);

/*Table structure for table `dtrans_beli` */

DROP TABLE IF EXISTS `dtrans_beli`;

CREATE TABLE `dtrans_beli` (
  `db_id` varchar(5) NOT NULL,
  `db_amount` int(10) NOT NULL,
  `db_hb_id` varchar(5) NOT NULL,
  `db_subtotal` double NOT NULL,
  PRIMARY KEY (`db_id`),
  KEY `FKHTRANS_DTRANSBELI` (`db_hb_id`),
  CONSTRAINT `FKHTRANS_DTRANSBELI` FOREIGN KEY (`db_hb_id`) REFERENCES `htrans_beli` (`hb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `dtrans_beli` */

insert  into `dtrans_beli`(`db_id`,`db_amount`,`db_hb_id`,`db_subtotal`) values 
('DB001',1,'HB001',300000),
('DB002',1,'HB002',20900),
('DB003',2,'HB003',15691500),
('DB004',1,'HB003',300000),
('DB005',3,'HB004',28500000),
('DB006',1,'HB004',180000),
('DB007',1,'HB005',185000),
('DB008',1,'HB005',260000),
('DB009',2,'HB005',5392170);

/*Table structure for table `htrans_beli` */

DROP TABLE IF EXISTS `htrans_beli`;

CREATE TABLE `htrans_beli` (
  `hb_id` varchar(5) NOT NULL,
  `hb_date` date NOT NULL,
  `hb_invoice_number` varchar(10) NOT NULL,
  `hb_total` double NOT NULL,
  `hb_customerid` varchar(5) NOT NULL,
  `hb_status` int(10) NOT NULL,
  `hb_employeeid` varchar(5) NOT NULL,
  `hb_di_id` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`hb_id`),
  KEY `FKCUSTOMER_HTRANSBELI` (`hb_customerid`),
  KEY `FKDISCOUNT_HTRANSBELI` (`hb_di_id`),
  KEY `FKEMPLOYEE_HTRANSBELI` (`hb_employeeid`),
  CONSTRAINT `FKCUSTOMER_HTRANSBELI` FOREIGN KEY (`hb_customerid`) REFERENCES `users` (`us_id`),
  CONSTRAINT `FKDISCOUNT_HTRANSBELI` FOREIGN KEY (`hb_di_id`) REFERENCES `discount` (`di_id`),
  CONSTRAINT `FKEMPLOYEE_HTRANSBELI` FOREIGN KEY (`hb_employeeid`) REFERENCES `users` (`us_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `htrans_beli` */

insert  into `htrans_beli`(`hb_id`,`hb_date`,`hb_invoice_number`,`hb_total`,`hb_customerid`,`hb_status`,`hb_employeeid`,`hb_di_id`) values 
('HB001','2022-10-26','B221026001',275000,'US005',1,'US001','DI001'),
('HB002','2022-10-26','B221026002',20900,'US007',1,'US002',NULL),
('HB003','2022-10-28','B221028001',15991500,'US004',1,'US002',NULL),
('HB004','2022-11-02','B221102001',28680000,'US008',1,'US001',NULL),
('HB005','2022-11-11','B221111001',0,'US004',1,'US003','DI003'),
('HB006','2022-11-11','B221111002',102350,'US009',1,'US003','DI003'),
('HB007','2022-11-15','B221115001',10568225,'US010',1,'US001','DI002'),
('HB008','2022-11-16','B221116001',5148670,'US007',1,'US006',NULL),
('HB009','2022-11-16','B221116002',16000000,'US008',1,'US001',NULL),
('HB010','2022-11-18','B221118003',20760000,'US009',1,'US010',NULL),
('HB011','2022-11-20','B221120004',52573175,'US005',1,'US009',NULL),
('HB012','2022-11-23','B221123005',7811855,'US006',1,'US001',NULL),
('HB013','2022-11-23','B221123006',2282000,'US010',1,'US007',NULL),
('HB014','2022-11-24','B221124007',910900,'US005',1,'US001',NULL),
('HB015','2022-11-26','B221126008',1800000,'US004',1,'US006',NULL),
('HB016','2022-11-30','B221130009',166098375,'US005',1,'US005',NULL),
('HB017','2022-11-30','B221130010',230000,'US009',1,'US008',NULL),
('HB018','2022-12-02','B221202011',50123175,'US006',1,'US006',NULL),
('HB019','2022-12-07','B221207012',12115000,'US010',1,'US007',NULL),
('HB020','2022-12-07','B221207013',10278000,'US007',1,'US004','DI004');

/*Table structure for table `series` */

DROP TABLE IF EXISTS `series`;

CREATE TABLE `series` (
  `se_id` varchar(5) NOT NULL,
  `se_name` varchar(255) NOT NULL,
  PRIMARY KEY (`se_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `series` */

insert  into `series`(`se_id`,`se_name`) values 
('SE001','One Piece'),
('SE002','Naruto'),
('SE003','Dragon Ball'),
('SE004','Black Clover'),
('SE005','Doraemon'),
('SE006','Attack on Titan'),
('SE007','Chainsaw Man'),
('SE008','White Album'),
('SE009','86'),
('SE010','Death Note'),
('SE011','Bleach'),
('SE012','Gintama'),
('SE013','Violet Evergarden'),
('SE014','Kimetsu no Yaiba'),
('SE015','Code Geass'),
('SE016','Made in Abyss'),
('SE017','Fate'),
('SE018','Jujutsu Kaisen'),
('SE019','Shigatsu wa Kimi no Uso'),
('SE020','Kono Subarashii Sekai ni Shukufuku wo! (Konosuba)'),
('SE021','Hunter x Hunter'),
('SE022','Dr. Stone'),
('SE023','Re:Zero kara Hajimeru Isekai Seikatsu'),
('SE024','Akame Ga Kill'),
('SE025','Azur Lane'),
('SE026','Darling in The Franxx'),
('SE027','Domestic na Kanojo'),
('SE028','Enen no Shouboutai');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `tr_id` varchar(5) NOT NULL,
  `tr_af_id` varchar(5) NOT NULL,
  `tr_us_id` varchar(5) NOT NULL,
  `tr_status` varchar(10) NOT NULL,
  PRIMARY KEY (`tr_id`),
  KEY `tr_af_id` (`tr_af_id`),
  KEY `tr_us_id` (`tr_us_id`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`tr_af_id`) REFERENCES `actionfigure` (`af_id`),
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`tr_us_id`) REFERENCES `users` (`us_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `us_id` varchar(5) NOT NULL,
  `us_username` varchar(255) NOT NULL,
  `us_email` varchar(255) NOT NULL,
  `us_gender` tinyint(1) NOT NULL COMMENT '1=Male, 0=Female',
  `us_password` varchar(30) NOT NULL,
  PRIMARY KEY (`us_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`us_id`,`us_username`,`us_email`,`us_gender`,`us_password`) values 
('US001','arsa','arsa@gmail.com',1,'123'),
('US002','yesnt','ruben@gmail.com',1,'123'),
('US003','badut','vincent@gmail.com',0,'123'),
('US004','Yurtin','yurtan@gmail.com',1,'123'),
('US005','vithunchan','vithun@gmail.com',0,'123'),
('US006','Ken','ken@gmail.com',1,'123'),
('US007','gajelas','nich@gmail.com',0,'123'),
('US008','quarter','rz@gmail.com',1,'123'),
('US009','kampus4life','kampus4life@gmail.com',1,'123'),
('US010','transgender','tim@gmail.com',0,'123'),
('US011','rubenyw','rubenyasonwinarta@gmail.com',0,'123'),
('US012','FlyingTable','mejapeot@gmail.com',1,'aaa');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
