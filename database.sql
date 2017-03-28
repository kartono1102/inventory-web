/*
SQLyog Community v12.4.1 (64 bit)
MySQL - 10.1.21-MariaDB : Database - db_inventory
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_inventory` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_inventory`;

/*Table structure for table `tbl_customer` */

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(35) DEFAULT NULL,
  `alamat_customer` varchar(50) DEFAULT NULL,
  `telp_customer` varchar(16) DEFAULT NULL,
  `telp2_customer` varchar(16) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `keterangan_customer` text,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_customer` */

/*Table structure for table `tbl_login` */

DROP TABLE IF EXISTS `tbl_login`;

CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_login` */

insert  into `tbl_login`(`id_login`,`username`,`password`,`level`,`created`) values 
(1,'admin','827ccb0eea8a706c4c34a16891f84e7b','Administrator','2017-03-28 13:30:30');

/*Table structure for table `tbl_supplier` */

DROP TABLE IF EXISTS `tbl_supplier`;

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(35) DEFAULT NULL,
  `alamat_supplier` varchar(50) DEFAULT NULL,
  `telp_supplier` varchar(16) DEFAULT NULL,
  `telp2_supplier` varchar(16) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `keterangan_supplier` text,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_supplier` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
