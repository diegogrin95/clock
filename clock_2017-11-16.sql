# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.35)
# Base de datos: clock
# Tiempo de Generación: 2017-11-17 00:07:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `apellido` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `contrasena` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `contrasena`)
VALUES
	(1,'diego','diegogrin@gmail.com','22',''),
	(2,'ines','ines','inecas@meamo.com','ines123'),
	(3,'mich','mich','mich@hotmail.com','mich123'),
	(4,'test','test','test@test.com','test1111'),
	(5,'test','test','test@test.com','test1111'),
	(6,'michmich','michmich','mich@mich.com','Michelle'),
	(7,'gian','gian','gian@gian.com','11111111111'),
	(8,'michelle','michelle','michelle@mich.com','Michelle'),
	(9,'diegoo','diegoo','diegoo@diegoo.com','$2y$10$rK9PzKPKN7v44a7zVUCloeoDqvAQnhtijfgNV7wXT9pVEMMVNApHG'),
	(10,'alguien','maria','maria@alguein.com','$2y$10$AeTCgsuAHvqQHQbwWRd70.bglQS758So7X3vsMWhYTSCDqKmsecE.'),
	(11,'tu vieja','garcia','tuvieja@tuviejo.com','$2y$10$L1nSeSHngnAWm5CJ8JzJceQ3JWsTjlvPfwscR4zanmQSPe9Fnb14a'),
	(12,'gasti','grinblat','gastigrin@hotmail.com','$2y$10$zw7bjKLwcLAG2j5wQdNBRu2tDM.ABy0c4dUZGLAaC6yyXeAF6xJuq');

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
