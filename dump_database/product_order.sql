/*
SQLyog Community v12.5.1 (64 bit)
MySQL - 5.6.49 : Database - product_order
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`product_order` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `product_order`;

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `fecNacimiento` date DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `client` */

insert  into `client`(`id`,`nombre`,`apellido`,`dni`,`fecNacimiento`,`correo`,`estado`) values 
(3,'Marina','Pierdominici','31313757','2021-07-09','m@autex-open.com',1),
(4,'Marcos','O\'Dwyer','333896987','2021-07-22','d@autex-open.com',1);

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `client_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_po` (`client_id`),
  CONSTRAINT `client_po` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

/*Data for the table `order` */

insert  into `order`(`id`,`data`,`status`,`client_id`) values 
(71,'2021-07-25 22:15:38',0,3),
(72,'2021-07-25 22:16:13',1,4),
(73,'2021-07-25 22:16:27',1,3),
(74,'2021-07-26 20:58:27',1,3),
(75,'2021-07-26 20:58:35',1,4);

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(45) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `descricao` longtext,
  `preco` decimal(10,2) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `product` */

insert  into `product`(`id`,`sku`,`nome`,`descricao`,`preco`,`status`) values 
(4,'Sku','Nome','1',10.00,'0'),
(5,'tee','tste','<p>12</p>',12.00,'0'),
(6,'ss','form','<p>tesete</p>',12.00,'0'),
(7,'a','a','<p>a</p>',1.00,'0'),
(8,'as','as','<p><b>as</b></p>',1.00,'0'),
(9,'botao','novo','<p>sdad</p>',123213.00,'0'),
(10,'ex','ex','ex',2.00,'0'),
(11,'novos','novos','<p>aaa</p>',12.00,'0'),
(12,'100010','Camiseta','<p>Camiseta vermelha</p>',50.00,'0'),
(13,'Gol G2 96 1.0','Carro','<p>Motor CHT</p>',5000.00,'0'),
(14,'19022','Tenis Adidas','<p><b><span style=\"font-size: 36px;\">Bonitao</span></b><span style=\"font-size: 36px;\">﻿</span></p>',212.90,'0'),
(15,'001','Produto 1','<p><b>Produto - 1: </b>Descriptions<br></p>',10.00,'0'),
(16,'002','Produto 2','',13.90,'0'),
(17,'003','Produto 3','',17.23,'0'),
(18,'004','Produto 4','',5.15,'1'),
(19,'excluir','Produto 5','',12.00,'0'),
(20,'003','Product A','',100.00,'1'),
(21,'004','Product A','<p>test</p><p><br></p>',0.03,'1');

/*Table structure for table `product_order` */

DROP TABLE IF EXISTS `product_order`;

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qtd` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `order_po_idx` (`order_id`),
  KEY `product_po_idx` (`product_id`),
  CONSTRAINT `order_po` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `product_po` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `product_order` */

insert  into `product_order`(`id`,`order_id`,`product_id`,`product_qtd`) values 
(9,71,18,1),
(10,71,20,2),
(11,71,21,3),
(12,72,18,12),
(13,72,20,13),
(14,72,21,14),
(15,73,18,10),
(16,73,20,2),
(17,73,21,5),
(18,75,18,1),
(19,75,20,2),
(20,75,21,3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
