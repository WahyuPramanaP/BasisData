/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.24-MariaDB : Database - wahcompany
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`wahcompany` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `wahcompany`;

/*Table structure for table `gaji` */

DROP TABLE IF EXISTS `gaji`;

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL AUTO_INCREMENT,
  `gaji` varchar(100) NOT NULL,
  PRIMARY KEY (`id_gaji`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `gaji` */

insert  into `gaji`(`id_gaji`,`gaji`) values 
(1,'1.000.000'),
(2,'1.500.000'),
(3,'2.000.000');

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jabatan` */

insert  into `jabatan`(`id_jabatan`,`nama_jabatan`) values 
(1,'Manager'),
(2,'Senior Developer'),
(3,'Junior Developer');

/*Table structure for table `jeniskelamin` */

DROP TABLE IF EXISTS `jeniskelamin`;

CREATE TABLE `jeniskelamin` (
  `id_jeniskelamin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jeniskelamin` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jeniskelamin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jeniskelamin` */

insert  into `jeniskelamin`(`id_jeniskelamin`,`nama_jeniskelamin`) values 
(1,'Laki-Laki'),
(2,'Perempuan');

/*Table structure for table `mulaikerja` */

DROP TABLE IF EXISTS `mulaikerja`;

CREATE TABLE `mulaikerja` (
  `id_mulai` int(11) NOT NULL AUTO_INCREMENT,
  `mulai_kerja` varchar(100) NOT NULL,
  PRIMARY KEY (`id_mulai`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mulaikerja` */

insert  into `mulaikerja`(`id_mulai`,`mulai_kerja`) values 
(1,'Januari'),
(2,'Februari'),
(3,'Maret'),
(4,'April'),
(5,'Mei'),
(6,'Juni'),
(7,'Juli'),
(8,'Agustus'),
(9,'September'),
(10,'Oktober'),
(11,'November'),
(12,'Desember');

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `nip` int(11) NOT NULL AUTO_INCREMENT,
  `id_unitkerja` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama_pegawai` varchar(200) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_jeniskelamin` int(11) NOT NULL,
  `id_mulai` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id_gaji` int(11) NOT NULL,
  PRIMARY KEY (`nip`),
  KEY `Jabatan` (`id_jabatan`),
  KEY `Kerja` (`id_unitkerja`),
  KEY `JenisKelamin` (`id_jeniskelamin`),
  KEY `Status` (`id_status`),
  KEY `Alamat` (`id_mulai`),
  KEY `Gaji` (`id_gaji`),
  CONSTRAINT `Alamat` FOREIGN KEY (`id_mulai`) REFERENCES `mulaikerja` (`id_mulai`),
  CONSTRAINT `Gaji` FOREIGN KEY (`id_gaji`) REFERENCES `gaji` (`id_gaji`),
  CONSTRAINT `Jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`),
  CONSTRAINT `JenisKelamin` FOREIGN KEY (`id_jeniskelamin`) REFERENCES `jeniskelamin` (`id_jeniskelamin`),
  CONSTRAINT `Kerja` FOREIGN KEY (`id_unitkerja`) REFERENCES `unit_kerja` (`id_unitkerja`),
  CONSTRAINT `Status` FOREIGN KEY (`id_status`) REFERENCES `statuskerja` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pegawai` */

/*Table structure for table `statuskerja` */

DROP TABLE IF EXISTS `statuskerja`;

CREATE TABLE `statuskerja` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(100) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `statuskerja` */

insert  into `statuskerja`(`id_status`,`nama_status`) values 
(1,'Aktif'),
(2,'Tidak Aktif');

/*Table structure for table `unit_kerja` */

DROP TABLE IF EXISTS `unit_kerja`;

CREATE TABLE `unit_kerja` (
  `id_unitkerja` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unitkerja` varchar(100) NOT NULL,
  PRIMARY KEY (`id_unitkerja`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `unit_kerja` */

insert  into `unit_kerja`(`id_unitkerja`,`nama_unitkerja`) values 
(1,'Malang'),
(2,'Banjarbaru'),
(3,'Banjarmasin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
