-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2023 a las 16:29:27
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id_per` int(11) NOT NULL,
  `nom_per` varchar(50) DEFAULT NULL,
  `ape_per` varchar(50) DEFAULT NULL,
  `doc_per` int(11) DEFAULT NULL,
  `nom_cargo` varchar(50) NOT NULL,
  `Dotacion` varchar(50) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id_per`, `nom_per`, `ape_per`, `doc_per`, `nom_cargo`, `Dotacion`, `Cantidad`, `Fecha`) VALUES
(1, 'Lorena', 'Alfonso', 1001201876, 'Aprendiz', 'Uniforme', 2, '2023-08-22'),
(1, 'Lorena', 'Alfonso', 1001201876, 'Aprendiz', 'Utiles', 1, '2023-08-22'),
(1, 'Lorena', 'Alfonso', 1001201876, 'Aprendiz', 'Cuadernos', 5, '2023-08-22'),
(2, 'Cristian', 'Álvarez', 1234, 'Limpieza', 'Escoba', 2, '2023-08-19'),
(2, 'Cristian', 'Álvarez', 1234, 'Limpieza', 'Traperos', 2, '2023-08-19'),
(2, 'Cristian', 'Álvarez', 1234, 'Limpieza', 'Canecas', 4, '2023-08-19'),
(2, 'Cristian', 'Álvarez', 1234, 'Limpieza', 'Traperos', 2, '2023-08-22'),
(3, 'Manuel', 'Bejarano', 656566, 'Instructor', 'Marcador', 2, '2023-08-19'),
(3, 'Manuel', 'Bejarano', 656566, 'Instructor', 'Borrador', 1, '2023-08-19'),
(3, 'Manuel', 'Bejarano', 656566, 'Instructor', 'Bata', 2, '2023-08-19'),
(3, 'Manuel', 'Bejarano', 656566, 'Instructor', 'Borrador', 5, '2023-08-22');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nom_cargo` varchar(50) NOT NULL,
  `Codigo_ele` varchar(5) DEFAULT NULL,
  `elemento` longtext NOT NULL,
  `cantidad_ele` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nom_cargo`, `Codigo_ele`, `elemento`, `cantidad_ele`) VALUES
(1, 'Instructor', '001', 'Marcador', 99),
(1, 'Instructor', '002', 'Borrador', 99),
(1, 'Instructor', '003', 'Bata', 99),
(2, 'Aprendiz', '001', 'Uniforme', 99),
(2, 'Aprendiz', '002', 'Utiles', 99),
(2, 'Aprendiz', '003', 'Cuadernos', 99),
(3, 'Limpieza', '001', 'Escoba', 99),
(3, 'Limpieza', '002', 'Traperos', 99),
(3, 'Limpieza', '003', 'Canecas', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_per` int(11) NOT NULL,
  `nom_per` varchar(50) DEFAULT NULL,
  `ape_per` varchar(50) DEFAULT NULL,
  `doc_per` int(11) DEFAULT NULL,
  `gen_per` varchar(20) DEFAULT NULL,
  `id_cargo_per` int(11) DEFAULT NULL,
  `cpe_per` varchar(250) DEFAULT NULL,
  `cpd_per` varchar(250) DEFAULT NULL,
  `talla_torso_per` varchar(4) DEFAULT NULL,
  `talla_zapatos_per` varchar(4) DEFAULT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_per`, `nom_per`, `ape_per`, `doc_per`, `gen_per`, `id_cargo_per`, `cpe_per`, `cpd_per`, `talla_torso_per`, `talla_zapatos_per`, `Fecha`) VALUES
(3, 'Manuel', 'Bejarano', 656566, 'Masculino', 1, 'Ninguna', 'Ninguna', 'M', '37', '2023-06-26'),
(1, 'Lorena', 'Alfonso', 1001201876, 'Femenino', 2, 'Ninguna', 'Ninguna', 'S', '35', '2023-06-26'),
(4, 'Pedro', 'Alfonso', 767676876, 'Masculino', 2, 'Ninguna', 'Ninguna', 'XL', '39', '2023-06-26'),
(2, 'Cristian', 'Álvarez', 1234, 'Masculino', 3, 'Ninguna', 'Ninguna', 'M', '35', '2023-06-26'),
(5, 'Marco', 'Polo', 1, 'Masculino', 2, 'Ninguna', 'Ninguna', 'M', '35', '2023-06-26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_per`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
