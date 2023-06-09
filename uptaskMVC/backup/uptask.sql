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
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `proyectos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuarioId` int DEFAULT NULL,
  `proyecto` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarioId` (`usuarioId`),
  CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tareas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `proyectoId` int NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `proyectoId` (`proyectoId`),
  CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`proyectoId`) REFERENCES `proyectos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `token`, `confirmado`) VALUES
(2, 'Cristian David', 'panzaldivarcristian@gmail.com', '$2y$10$BVo9MHH659ed7TGgy7NE6.EdajiA9XfltETE6SvPNANMA8Jr/33KG', NULL, 1);


INSERT INTO `proyectos` (`id`, `usuarioId`, `proyecto`, `url`) VALUES
(1, 2, 'Tienda virtual', 'deb97f9eddf3cc594ac4b7148b19b980');
INSERT INTO `proyectos` (`id`, `usuarioId`, `proyecto`, `url`) VALUES
(4, 2, 'API para bank system', 'f5060fb04fb1fa2ca42307115f9c37d6');
INSERT INTO `proyectos` (`id`, `usuarioId`, `proyecto`, `url`) VALUES
(5, 2, 'Frond end para administrador de pacientes', '60f26bd17aa07df49616ceaf1f72d83d');
INSERT INTO `proyectos` (`id`, `usuarioId`, `proyecto`, `url`) VALUES
(6, 2, 'Portafolio personal ', '38895791b299ec7ed1bdacf2643b4a5c');

INSERT INTO `tareas` (`id`, `proyectoId`, `nombre`, `descripcion`, `estado`) VALUES
(1, 1, 'Crear vistas principales', 'Creas vistas de: \n- Listado de productos\n- Nosotros\n- Contacto', 0);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;