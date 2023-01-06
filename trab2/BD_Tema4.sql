/*
SQLyog Community Edition- MySQL GUI v5.23 Beta 1
Host - 5.0.41-community-nt : Database - webforum
*********************************************************************
Server version : 5.0.41-community-nt
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `webforum`;

USE `webforum`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idUsuario` int(10) unsigned NOT NULL auto_increment,
  `nome` char(50) NOT NULL,
  `email` char(25) NOT NULL,
  `login` char(13) NOT NULL,
  `senha` char(10) NOT NULL,
  PRIMARY KEY  (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */
insert into usuario (nome, email, login, senha) values("excluido", "email@excluido", "ex", "cluido");
update usuario set idUsuario = "0" where idUsuario = "2" and email = 'email@excluido';
/*Primeiro usuario com id = 0 para mensagens excluidas `usuario` */

/*Table structure for table `mensagem` */
DROP TABLE IF EXISTS `mensagem`;

CREATE TABLE `mensagem` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `titulo` char(128) NOT NULL,
  `conteudo` text,
  `lido` boolean,
  `idEnvia` int(10) unsigned NOT NULL,
  `idRecebe` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mensagem` */

ALTER TABLE `mensagem` ADD CONSTRAINT `fk_envia` FOREIGN KEY ( `idEnvia` ) REFERENCES `usuario` ( `idUsuario` ) ;
ALTER TABLE `mensagem` ADD CONSTRAINT `fk_recebe` FOREIGN KEY ( `idRecebe` ) REFERENCES `usuario` ( `idUsuario` ) ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
