/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `confirmado` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `citas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuarioId` int NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarioId` (`usuarioId`),
  CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `servicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `citasservicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `servicioId` int NOT NULL,
  `citaId` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `servicioId` (`servicioId`),
  KEY `citaId` (`citaId`),
  CONSTRAINT `citasservicios_ibfk_1` FOREIGN KEY (`servicioId`) REFERENCES `servicios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `servicios` (`id`, `nombre`, `precio`) VALUES
(1, 'Corte de Cabello Mujer', 90.00);
INSERT INTO `servicios` (`id`, `nombre`, `precio`) VALUES
(2, 'Corte de Cabello Hombre', 80.00);
INSERT INTO `servicios` (`id`, `nombre`, `precio`) VALUES
(3, 'Corte de Cabello Niño', 60.00);
INSERT INTO `servicios` (`id`, `nombre`, `precio`) VALUES
(4, 'Peinado Mujer', 80.00),
(5, 'Peinado Hombre', 60.00),
(6, 'Peinado Niño', 60.00),
(7, 'Corte de Barba', 60.00),
(8, 'Tinte Mujer', 300.00),
(9, 'Uñas', 400.00),
(10, 'Lavado de Cabello', 50.00),
(11, 'Tratamiento Capilar', 150.00);

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `telefono`, `admin`, `confirmado`, `token`) VALUES
(1, 'Cristian David', 'Pan Zaldivar', 'panzaldivarcristian@gmail.com', '$2y$10$jUL/N0Drzox9hfsfhn91/.i0Y2nRuZnyADu28fnVaJ79Z5nLhQrJ6', '9993981242', 0, 1, NULL),
(3, 'Cristian David', 'Pan Zaldivar', 'cristianpanzaldivar60101@hotmail.com', '$2y$10$kUcVKFrUm09ZutJwIjFyWeumAzIKlDmKVcDjW5yFnUWDtBw5.pxFa', '9993981242', 0, 1, NULL),
(4, 'Cristian', 'Pan', 'a16003566@gmail.com', '$2y$10$kiD43LEuX.3d0UZYFNQ6GOaIenjJl9WZMKjC1VZwIYPzXmZqDdxDO', '9993981242', 0, 1, NULL);

INSERT INTO `citas` (`id`, `usuarioId`, `fecha`, `hora`) VALUES
(16, 1, '2023-06-08', '11:12:00'),
(17, 1, '2023-06-27', '11:19:00');

INSERT INTO `citasservicios` (`id`, `servicioId`, `citaId`) VALUES
(1, 1, 16),
(2, 2, 16),
(3, 1, 17),
(4, 3, 17),
(5, 4, 17),
(6, 2, 17);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;