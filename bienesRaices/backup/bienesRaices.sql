/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `vendedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `propiedades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vendedorId` int NOT NULL,
  `titulo` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `habitaciones` int NOT NULL,
  `wc` int NOT NULL,
  `estacionamiento` int NOT NULL,
  `creado` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_propiedades_vendedores_idx` (`vendedorId`),
  CONSTRAINT `fk_propiedades_vendedores` FOREIGN KEY (`vendedorId`) REFERENCES `vendedores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(1, 'Cristian', 'Pan', '9993981242');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(2, 'Diana', 'Vazquez', '9995069754');

INSERT INTO `propiedades` (`id`, `vendedorId`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`) VALUES
(2, 1, 'Casa en la playa', 1200000.00, '../imagenes/0b944914392ab4ffd5edc7e76158ea64.jpg', 'Casa en la playa con excelente vista hacia el mar', 5, 2, 1, '2023-05-05');
INSERT INTO `propiedades` (`id`, `vendedorId`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`) VALUES
(3, 2, 'Casa en el bosque', 1500000.00, '../imagenes/47d8672efd7ffa4594e3db172aecc7ae.jpg', 'Casa en el bosque, ubicada cerca de un lago, perfecto para descansar', 7, 3, 1, '2023-05-05');
INSERT INTO `propiedades` (`id`, `vendedorId`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`) VALUES
(4, 1, 'Casa en renta', 789000.00, '../imagenes/1705f5c8f1570229b5ba5941339672f7.jpg', 'Casa en renta, ubicada en zona centro. ', 4, 1, 1, '2023-05-05');
INSERT INTO `propiedades` (`id`, `vendedorId`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`) VALUES
(5, 1, 'Casa en renta', 789000.00, '../imagenes/f86f948788bde9be5b7997de6bffb409.jpg', 'Casa en renta, ubicada en zona centro. ', 4, 1, 1, '2023-05-05'),
(6, 1, 'Casa en la playa', 12312312.00, '../imagenes/6f65f677da6913fff7b6f63b1088c99c.jpg', 'sdasdasdasdasdasdasd asdasda asdasdad', 3, 1, 1, '2023-05-05');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;