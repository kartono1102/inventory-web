/*
SQLyog Community v12.3.2 (64 bit)
MySQL - 10.1.16-MariaDB : Database - db_inventory
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_customer` */

insert  into `tbl_customer`(`id_customer`,`nama_customer`,`alamat_customer`,`telp_customer`,`telp2_customer`,`id_kota`,`id_sales`,`keterangan_customer`,`created`) values 
(2,'ada123','dada','123','456',9,1,'adada','2017-04-04 23:04:58'),
(3,'tes','122121','123','456',3,3,'asda','2017-04-04 23:07:34');

/*Table structure for table `tbl_kategori` */

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) DEFAULT NULL,
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kategori` */

insert  into `tbl_kategori`(`id_kategori`,`nama_kategori`) values 
(1,'Charger'),
(2,'Head Set'),
(3,'Handphone');

/*Table structure for table `tbl_kota` */

CREATE TABLE `tbl_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kota` */

insert  into `tbl_kota`(`id_kota`,`nama_kota`) values 
(1,'tes123'),
(2,'Jakarta'),
(3,'Bandung'),
(4,'Surabaya'),
(5,'Medan'),
(9,'aaabbcc'),
(10,'bb'),
(11,'ccc'),
(12,'dd'),
(14,'momo');

/*Table structure for table `tbl_login` */

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

/*Table structure for table `tbl_merk` */

CREATE TABLE `tbl_merk` (
  `id_merk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_merk` varchar(50) DEFAULT NULL,
  KEY `id_merk` (`id_merk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_merk` */

insert  into `tbl_merk`(`id_merk`,`nama_merk`) values 
(1,'Apple'),
(2,'Xiaomi'),
(3,'Samsung'),
(4,'Oppo'),
(5,'Asus');

/*Table structure for table `tbl_sales` */

CREATE TABLE `tbl_sales` (
  `id_sales` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sales` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_sales`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_sales` */

insert  into `tbl_sales`(`id_sales`,`nama_sales`) values 
(1,'Andi'),
(2,'Budi'),
(3,'Cindy'),
(4,'Dedi'),
(5,'Edy');

/*Table structure for table `tbl_supplier` */

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
