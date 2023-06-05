-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-01-2023 a las 18:17:58
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.29

CREATE DATABASE TO;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
    `id` int(11) primary key  NOT NULL,
    `regional` varchar(50) NOT NULL,
    `centro` varchar(50) NOT NULL,
    `direccion` varchar(50) NOT NULL,
    `lugar` varchar(50) NOT NULL,
    `fecha` varchar(50) NOT NULL,
    `nombre` varchar(50) NOT NULL,
    `cargo` varchar(50) NOT NULL,
    `tipo` varchar(50) NOt NULL,
    `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
