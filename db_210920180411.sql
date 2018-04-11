/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.5-10.1.28-MariaDB : Database - bellman
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bellman` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bellman`;

/*Table structure for table `baitap` */

DROP TABLE IF EXISTS `baitap`;

CREATE TABLE `baitap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tieude` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sogiaidoan` int(11) DEFAULT NULL,
  `sophuongan` int(11) DEFAULT NULL,
  `maxmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `baitap` */

insert  into `baitap`(`id`,`tieude`,`sogiaidoan`,`sophuongan`,`maxmin`) values (1,'123',3,3,NULL),(2,'123',3,3,NULL),(3,'123',3,3,NULL),(4,'123',3,3,NULL),(5,'Bai 1',3,3,0),(6,'Bai 1',3,3,0),(7,'Bai 1',3,3,0),(8,'123321',3,3,0),(9,'bai 2',3,3,0),(10,'bai 3',3,3,0),(11,'bai3',3,3,0),(12,'bai4',3,3,0),(13,'bai4',3,3,0),(14,'bai5',3,3,0),(15,'bai5',3,3,0);

/*Table structure for table `chiphi` */

DROP TABLE IF EXISTS `chiphi`;

CREATE TABLE `chiphi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_baitap` int(11) DEFAULT NULL,
  `giaidoan` int(11) DEFAULT NULL,
  `phuongan` int(11) DEFAULT NULL,
  `giatri` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=352 DEFAULT CHARSET=latin1;

/*Data for the table `chiphi` */

insert  into `chiphi`(`id`,`id_baitap`,`giaidoan`,`phuongan`,`giatri`) values (271,11,0,0,12),(272,11,0,1,45),(273,11,0,2,78),(274,11,1,0,23),(275,11,1,1,56),(276,11,1,2,89),(277,11,2,0,34),(278,11,2,1,67),(279,11,2,2,90),(280,11,0,0,12),(281,11,0,1,45),(282,11,0,2,78),(283,11,1,0,23),(284,11,1,1,56),(285,11,1,2,89),(286,11,2,0,34),(287,11,2,1,67),(288,11,2,2,90),(289,11,0,0,12),(290,11,0,1,45),(291,11,0,2,78),(292,11,1,0,23),(293,11,1,1,56),(294,11,1,2,89),(295,11,2,0,34),(296,11,2,1,67),(297,11,2,2,90),(298,11,0,0,12),(299,11,0,1,45),(300,11,0,2,78),(301,11,1,0,23),(302,11,1,1,56),(303,11,1,2,89),(304,11,2,0,34),(305,11,2,1,67),(306,11,2,2,90),(307,11,0,0,12),(308,11,0,1,45),(309,11,0,2,78),(310,11,1,0,23),(311,11,1,1,56),(312,11,1,2,89),(313,11,2,0,34),(314,11,2,1,67),(315,11,2,2,90),(316,12,0,0,12),(317,12,0,1,45),(318,12,0,2,78),(319,12,1,0,23),(320,12,1,1,56),(321,12,1,2,89),(322,12,2,0,34),(323,12,2,1,67),(324,12,2,2,90),(325,13,0,0,1),(326,13,0,1,4),(327,13,0,2,7),(328,13,1,0,2),(329,13,1,1,5),(330,13,1,2,8),(331,13,2,0,3),(332,13,2,1,6),(333,13,2,2,9),(334,14,0,0,1),(335,14,0,1,4),(336,14,0,2,7),(337,14,1,0,2),(338,14,1,1,5),(339,14,1,2,8),(340,14,2,0,3),(341,14,2,1,6),(342,14,2,2,9),(343,15,0,0,140),(344,15,0,1,100),(345,15,0,2,100),(346,15,1,0,110),(347,15,1,1,120),(348,15,1,2,90),(349,15,2,0,150),(350,15,2,1,120),(351,15,2,2,100);

/*Table structure for table `duongdi` */

DROP TABLE IF EXISTS `duongdi`;

CREATE TABLE `duongdi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_baitap` int(11) DEFAULT NULL,
  `id_giaidoan` int(11) DEFAULT NULL,
  `duongdi` text,
  `chon` tinyint(1) DEFAULT NULL,
  `tongchiphi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `duongdi` */

/*Table structure for table `giaidoan` */

DROP TABLE IF EXISTS `giaidoan`;

CREATE TABLE `giaidoan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_baitap` int(11) DEFAULT NULL,
  `giaidoan` int(11) DEFAULT NULL,
  `tunut` int(11) DEFAULT NULL,
  `dennut` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `giaidoan` */

insert  into `giaidoan`(`id`,`id_baitap`,`giaidoan`,`tunut`,`dennut`) values (1,1,0,0,0),(2,13,0,0,0),(3,13,0,0,0),(4,13,0,0,0),(5,13,0,0,2),(6,14,0,0,0),(7,14,0,0,0),(8,14,0,0,0),(9,14,0,0,2),(10,14,0,0,2),(11,15,0,0,0),(12,15,0,0,1),(13,15,0,0,2),(14,15,1,0,0),(15,15,1,0,1),(16,15,1,0,2),(17,15,1,1,1),(18,15,1,1,2),(19,15,1,2,0),(20,15,1,2,1),(21,15,2,0,0),(22,15,2,0,1),(23,15,2,0,2),(24,15,2,1,0),(25,15,2,1,1),(26,15,2,1,2),(27,15,2,2,0),(28,15,2,2,1),(29,15,2,2,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
