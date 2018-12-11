/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.21-MariaDB : Database - generico
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`generico` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `generico`;

/*Table structure for table `tbl_bitacora` */

DROP TABLE IF EXISTS `tbl_bitacora`;

CREATE TABLE `tbl_bitacora` (
  `id_bitacora` bigint(11) NOT NULL AUTO_INCREMENT,
  `char_url` varchar(200) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `text_descripcion` text,
  `date_registro` datetime DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_bitacora` */

insert  into `tbl_bitacora`(`id_bitacora`,`char_url`,`usuario_id`,`text_descripcion`,`date_registro`) values (1,'Welcome/logout',1,'Cierre de sesion','2018-12-11 16:29:47'),(2,'Welcome/login',1,'Inicio de Sesion','2018-12-11 16:50:10');

/*Table structure for table `tbl_cat_estatus` */

DROP TABLE IF EXISTS `tbl_cat_estatus`;

CREATE TABLE `tbl_cat_estatus` (
  `estatus_id` int(11) NOT NULL AUTO_INCREMENT,
  `char_nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`estatus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_cat_estatus` */

insert  into `tbl_cat_estatus`(`estatus_id`,`char_nombre`) values (1,'Activo');

/*Table structure for table `tbl_cat_menus` */

DROP TABLE IF EXISTS `tbl_cat_menus`;

CREATE TABLE `tbl_cat_menus` (
  `menus_id` int(11) NOT NULL AUTO_INCREMENT,
  `char_nombre` varchar(45) DEFAULT NULL,
  `text_descripcion` text,
  `id_padre` int(11) DEFAULT NULL,
  `int_nivel` int(11) DEFAULT NULL,
  `int_orden` int(11) DEFAULT NULL,
  `char_icon` varchar(45) DEFAULT NULL,
  `char_url` varchar(45) DEFAULT NULL,
  `date_registro` datetime DEFAULT NULL,
  `estatus_id` int(11) NOT NULL,
  `tbl_componente_id` int(11) NOT NULL,
  PRIMARY KEY (`menus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_cat_menus` */

/*Table structure for table `tbl_cat_plantilla` */

DROP TABLE IF EXISTS `tbl_cat_plantilla`;

CREATE TABLE `tbl_cat_plantilla` (
  `int_plantilla` int(11) NOT NULL AUTO_INCREMENT,
  `char_nombre` varchar(45) DEFAULT NULL,
  `char_descripcion` varchar(45) DEFAULT NULL,
  `text_head` varchar(45) DEFAULT NULL,
  `text_body` varchar(45) DEFAULT NULL,
  `text_footer` varchar(45) DEFAULT NULL,
  `urlt_js` varchar(45) DEFAULT NULL,
  `url_css` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`int_plantilla`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_cat_plantilla` */

/*Table structure for table `tbl_cat_sistemas` */

DROP TABLE IF EXISTS `tbl_cat_sistemas`;

CREATE TABLE `tbl_cat_sistemas` (
  `sistemas_id` int(11) NOT NULL AUTO_INCREMENT,
  `char_nombre` varchar(45) DEFAULT NULL,
  `text_descripcion` text,
  `date_registro` datetime DEFAULT NULL,
  `estatus_id` int(11) NOT NULL,
  `plantilla_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sistemas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_cat_sistemas` */

/*Table structure for table `tbl_cat_tipocomponente` */

DROP TABLE IF EXISTS `tbl_cat_tipocomponente`;

CREATE TABLE `tbl_cat_tipocomponente` (
  `tipoComponente_id` int(11) NOT NULL AUTO_INCREMENT,
  `char_tipoComponente` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tipoComponente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_cat_tipocomponente` */

/*Table structure for table `tbl_cat_tipousuario` */

DROP TABLE IF EXISTS `tbl_cat_tipousuario`;

CREATE TABLE `tbl_cat_tipousuario` (
  `tipoUsuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `char_tipoUsuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tipoUsuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_cat_tipousuario` */

insert  into `tbl_cat_tipousuario`(`tipoUsuario_id`,`char_tipoUsuario`) values (1,'Administrador');

/*Table structure for table `tbl_cat_usuarios` */

DROP TABLE IF EXISTS `tbl_cat_usuarios`;

CREATE TABLE `tbl_cat_usuarios` (
  `usuarios_id` int(11) NOT NULL AUTO_INCREMENT,
  `char_user` varchar(45) NOT NULL,
  `char_password` varchar(45) NOT NULL,
  `char_salt` varchar(45) NOT NULL,
  `char_nombres` varchar(45) NOT NULL,
  `char_app` varchar(45) DEFAULT NULL,
  `char_apm` varchar(45) DEFAULT NULL,
  `date_fecha_nacimiento` datetime DEFAULT NULL,
  `char_password_recordatorio` varchar(45) DEFAULT NULL,
  `char_correo` varchar(45) DEFAULT NULL,
  `int_telefono` int(11) DEFAULT NULL,
  `bit_conectado` int(11) NOT NULL DEFAULT '0',
  `estatus_id` int(11) NOT NULL,
  `tipoUsuario_id` int(11) NOT NULL,
  PRIMARY KEY (`usuarios_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_cat_usuarios` */

insert  into `tbl_cat_usuarios`(`usuarios_id`,`char_user`,`char_password`,`char_salt`,`char_nombres`,`char_app`,`char_apm`,`date_fecha_nacimiento`,`char_password_recordatorio`,`char_correo`,`int_telefono`,`bit_conectado`,`estatus_id`,`tipoUsuario_id`) values (1,'emmanuel','5232188870af46c7d112717138e8a54597020cf1','1111','Emmanuel de Jesús','Sántiz','Felipe','2018-12-24 00:00:00','nombre','sistemas1@vlt.mx',0,1,1,1);

/*Table structure for table `tbl_componenetedetalle` */

DROP TABLE IF EXISTS `tbl_componenetedetalle`;

CREATE TABLE `tbl_componenetedetalle` (
  `componenteDetalle_id` int(11) NOT NULL AUTO_INCREMENT,
  `char_nombre` varchar(45) DEFAULT NULL,
  `char_id` varchar(45) DEFAULT NULL,
  `text_descripcion` text,
  `tipoComponente_id` int(11) NOT NULL,
  `estatus_id` int(11) NOT NULL,
  PRIMARY KEY (`componenteDetalle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_componenetedetalle` */

/*Table structure for table `tbl_componente` */

DROP TABLE IF EXISTS `tbl_componente`;

CREATE TABLE `tbl_componente` (
  `componente_id` int(11) NOT NULL AUTO_INCREMENT,
  `char_nombre` varchar(45) DEFAULT NULL,
  `estatus_id` int(11) NOT NULL,
  `componenteDetalle_id` int(11) NOT NULL,
  PRIMARY KEY (`componente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_componente` */

/*Table structure for table `tbl_sistemas_sucursales` */

DROP TABLE IF EXISTS `tbl_sistemas_sucursales`;

CREATE TABLE `tbl_sistemas_sucursales` (
  `sistema_sucursales_id` int(11) NOT NULL AUTO_INCREMENT,
  `sistemas_id` int(11) NOT NULL,
  `sucursales_id` int(11) NOT NULL,
  `estatus_id` int(11) NOT NULL,
  PRIMARY KEY (`sistema_sucursales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_sistemas_sucursales` */

/*Table structure for table `tbl_sucursales` */

DROP TABLE IF EXISTS `tbl_sucursales`;

CREATE TABLE `tbl_sucursales` (
  `sucursales_id` int(11) NOT NULL AUTO_INCREMENT,
  `char_nombre` varchar(45) DEFAULT NULL,
  `estatus_id` int(11) NOT NULL,
  PRIMARY KEY (`sucursales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_sucursales` */

/*Table structure for table `tbl_usuarios_sistemas_sucursales_menus` */

DROP TABLE IF EXISTS `tbl_usuarios_sistemas_sucursales_menus`;

CREATE TABLE `tbl_usuarios_sistemas_sucursales_menus` (
  `usuarios_sistemas_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menus_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `tbl_sistema_sucursales_id` int(11) NOT NULL,
  PRIMARY KEY (`usuarios_sistemas_menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_usuarios_sistemas_sucursales_menus` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
