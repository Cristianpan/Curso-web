/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `ponentes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `redes` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmado` tinyint(1) NOT NULL,
  `token` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ponentes` (`id`, `nombre`, `apellido`, `ciudad`, `pais`, `imagen`, `tags`, `redes`) VALUES
(1, ' Julian', 'Muñoz', 'Madrid', 'España', '6764a74ccf2b4b5b74e333016c13388a', 'React,PHP,Laravel', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}');
INSERT INTO `ponentes` (`id`, `nombre`, `apellido`, `ciudad`, `pais`, `imagen`, `tags`, `redes`) VALUES
(2, ' Israel', 'González', 'CDMX', 'México', '6497c66bcc464e26871c046dd5bb86c8', 'Vue,Node.js,MongoDB', '{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"https://github.com/codigoconjuan\"}');
INSERT INTO `ponentes` (`id`, `nombre`, `apellido`, `ciudad`, `pais`, `imagen`, `tags`, `redes`) VALUES
(3, ' Isabella', 'Tassis', 'Buenos Aires', 'Argentina', '55c7866df31370ec3299eed6eb63daa1', 'UX / UI,HTML,CSS,TailwindCSS', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"\"}');
INSERT INTO `ponentes` (`id`, `nombre`, `apellido`, `ciudad`, `pais`, `imagen`, `tags`, `redes`) VALUES
(4, ' Jazmín', 'Hurtado', 'CDMX', 'México', 'de6e3fa0cde8402de4c28e6be0903ada', 'Django,React, Vue.js', '{\"facebook\":\"\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'),
(5, ' María Camila', 'Murillo', 'Guadalajara', 'México', 'cec8c9d7bcb4c19e87d1164bce8fe176', 'Devops,Git,CI CD', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'),
(6, ' Tomas', 'Aleman', 'Bogotá', 'Colombia', '5332118b8d7690a1b992431802eafab1', 'WordPress,PHP,React', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'),
(7, ' Lucía', 'Velázquez', 'Buenos Aires', 'Argentina', '90956ece4adbd9f9ccb8f4ae80dc1537', 'React,Angular,Svelte', '{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"https://github.com/codigoconjuan\"}'),
(8, ' Catarina', 'Pardo', 'Lima', 'Perú', '9886ffc0d31e4c20a04acc1464630527', 'Next.js,Laravel,MERN', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"\"}'),
(9, ' Raquel', 'Ros', 'Madrid', 'España', 'd697f6c454c36252d70abacd7599566c', 'Next.js,Remix,Vue.js', '{\"facebook\":\"\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'),
(10, ' Sofía', 'Amengual', 'Santiago', 'Chile', '414ffd61380bbf0e9f45cbde4d0cbb7f', 'UX / UI,Figma,TailwindCSS', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'),
(11, ' María José', 'Leoz', 'NY', 'Estados Unidos', 'c8b3a77bce7a6efb6e6872db67cfa553', 'React,TypeScript,JavaScript', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'),
(12, ' Alexa', 'Mina', 'Bogotá', 'Colombia', '6eac63d88743bbb9ee0bfd8c60cf4186', 'HTML,CSS,React,TailwindCSS', '{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"https://github.com/codigoconjuan\"}'),
(13, ' Jesus', 'López', 'Madrid', 'España', 'e481bca0c512f5b4d8f76ccea2548f0d', 'PHP,WordPress,HTML,CSS', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"\"}'),
(14, ' Irene ', 'Dávalos', 'CDMX', 'México', '6727e8ee7f6c642026247fe0556d866d', 'Node.js,Vue.js,Angular', '{\"facebook\":\"\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'),
(15, ' Brenda', ' Ocampo', 'Santiago', 'Chile', '40e01f5c023c7e74c9c372a8126edd97', 'Laravel,Next.js,GraphQL,Flutter', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'),
(16, ' Julián ', 'Noboa', 'Las Vegas', 'EU', '6d4629dacbed2e4f5a344282ec2f4f76', 'iOS,Figma,REST API\'s', '{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"https://github.com/codigoconjuan\"}'),
(17, ' Vicente ', 'Figueroa', 'CDMX', 'México', '2a41a781d8ae8f0f7a1969c766276b08', 'React,Tailwind,JavaScript,TypeScript,Node', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'),
(18, ' Nico ', 'Fraga', 'Buenos Aires', 'Argentina', '222dc6502643afa2f4a55acaecd93221', 'PHP,Laravel,Flutter,React Native', '{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'),
(19, 'Cristian', 'Pan', 'Mérida', 'México', '869c52bc3309f9458acf4aaf4e019a88', 'Php,JS,CSS,HTML', '{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'),
(20, 'Mauricio', 'Carrillo', 'Mérida', 'México', '37fc55b22cfb6c2c222e061680d09bcd', 'Php,Express,HTML,CSS,JS', '{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}');

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `confirmado`, `token`, `admin`) VALUES
(1, 'Cristian David', 'Pan Zaldivar', 'panzaldivarcristian@gmail.com', '$2y$10$590n5U5lImAhuUK4DsjIyu1SStHiKcSXDziBSVwnm0KK6nhFgjBY6', 1, NULL, 0);
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `confirmado`, `token`, `admin`) VALUES
(2, 'Cristian', 'David', 'admin@gmail.com', '$2y$10$zLp51eM8IQRjfpQpDfUhWOOOiFI/fn5JLXrUq997Spym5w4jQSKeq', 1, NULL, 1);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;