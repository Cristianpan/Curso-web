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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `propiedades` (`id`, `vendedorId`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`) VALUES
(32, 1, 'Casa en renta', 500000.00, '../imagenes/6bd905519538d57ed8e46c1d2e9868ca.jpg', 'Casa de dos pisos ubicada en zona privada', 3, 2, 1, '2023-05-14');
INSERT INTO `propiedades` (`id`, `vendedorId`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`) VALUES
(33, 1, 'Casa en la playa', 1230000.00, '../imagenes/e0db5c0af2f6aa392a4045cb7c60fd5d.jpg', 'Casa en la playa con piscina incluida. Cuenta con lo indispensable para tener una buena estadía', 5, 3, 2, '2023-05-14');
INSERT INTO `propiedades` (`id`, `vendedorId`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`) VALUES
(34, 1, 'Departamento en renta', 70000.00, '../imagenes/6b1e1ae47d8f16f8108e76f8b5ece968.jpg', 'Departamento amueblado. Ideal para joven estudiante', 2, 1, 1, '2023-05-14');
INSERT INTO `propiedades` (`id`, `vendedorId`, `titulo`, `precio`, `imagen`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`) VALUES
(35, 6, 'Casa en el bosque', 2500000.00, '../imagenes/6ddd91c6084ca0bbec09755a2e6a8463.jpg', 'Casa en el bosque, excelente lugar para descansar', 4, 2, 2, '2023-05-14');

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(1, 'panza@gmail.com', '$2y$10$jaCcMqEEn4g0dgzoqDs3dOXTy./S//WNqJMpFWUAorBZ81yKvNtru');


INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(1, 'Cristian', 'Pan', '9993981242');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(6, 'Diana', 'Vazquez', '9993955071');
INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(7, 'Mauricio', 'Carrillo', '9993981242');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;