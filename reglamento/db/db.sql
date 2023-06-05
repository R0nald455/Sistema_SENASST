-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 10-02-2023 a las 20:38:22
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `buscador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `articulo` varchar(2000) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabla articulos' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `articulo`, `descripcion`) VALUES
(1, '1', 'La Formación Profesional integral que orienta el Servicio Nacional de Aprendizaje (Sena), constituye un proceso educativo teórico-práctico de carácter integral orientado al desarrollo de conocimientos técnicos, tecnológicos y de actitudes y valores para el desarrollo humano y la convivencia social, que le permiten a la persona actuar crítica y creativamente en los contextos productivo y social, es decir, en el Mundo de la Vida colombia'),
(2, '2', 'En la Formación Profesional integral participa la Comunidad Educativa constituida por aprendices, Instructores, padres de familia o acudientes, egresados, personal administrativo y de apoyo, directivos, gremios de la producción y representantes de los trabajadores, de los sectores económicos y sociales y de la comunidad científica colombia.'),
(3, '7', 'El derecho es la potestad que tiene el aprendiz de gozar de libertades y oportunidades sin exclusión por razones de género, raza, origen familiar, discapacidad, nacionalidad, lengua, religión, opinión  política o filosófica. Principalmente todas las personas tienen derecho a la educación y al desarrollo de su personalidad, garantizando a su vez, su desarrollo armónico e integral Colombia.'),
(4, '9', 'Se entiende por deber, la obligación legal, social y moral que compromete a la persona a cumplir con determinada actuación, asumiendo con responsabilidad todos sus actos, para propiciar la armonía, el respeto, la integración, el bienestar común, la sana convivencia, el servicio a los demás, la seguridad de las personas y de los bienes de la institución Colombia.'),
(5, '11', 'La etapa productiva del programa de formación es aquella en la cual el Aprendiz Sena aplica, complementa, fortalece y consolida sus competencias, en términos de conocimiento, habilidades, destrezas, actitudes y valores.\r\n\r\nLa etapa productiva debe permitirle al aprendiz aplicar en la resolución de problemas reales del sector productivo, los conocimientos, habilidades y destrezas pertinentes a las competencias del programa de formación, asumiendo estrategias y metodologías de autogestión Colombia.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
