-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 24-08-2023 a las 15:14:20
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quiz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problema`
--

CREATE TABLE `problema` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(200) NOT NULL,
  `respuesta` text NOT NULL,
  `falsa1` text NOT NULL,
  `falsa2` text NOT NULL,
  `falsa3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `problema`
--

INSERT INTO `problema` (`id`, `pregunta`, `respuesta`, `falsa1`, `falsa2`, `falsa3`) VALUES
(1, '¿Qué es el objetivo principal de la Seguridad y Salud en el Trabajo (SST)?', 'Garantizar condiciones seguras y saludables en el entorno laboral.', 'Maximizar la producción de la empresa.', 'Mejorar la calidad de los productos.', 'Reducir el tiempo de trabajo.'),
(2, '¿Cuál es el propósito de un Comité de SST en una organización?', 'Promover la participación de empleados y empleadores en la mejora de la seguridad laboral.', 'Organizar eventos sociales para los trabajadores.', 'Gestionar la nómina y los beneficios laborales.', 'Supervisar el marketing de la empresa.'),
(3, '¿Qué es un EPI (Equipo de Protección Individual)?', 'Un implemento que protege al trabajador de riesgos específicos durante su labor.', 'Un programa de entretenimiento para los empleados.', 'Un software de gestión de proyectos.', 'Un método de promoción de productos.'),
(4, '¿Cuál es el propósito de un plan de evacuación en SST?', 'Facilitar la salida segura de los trabajadores en caso de emergencias.', 'Organizar fiestas de la empresa.', 'Planificar reuniones de marketing.', 'Coordinar las vacaciones de los empleados.'),
(5, '¿Qué significa la sigla SDS en el contexto de SST?', 'Hoja de Datos de Seguridad, proporciona información sobre sustancias químicas peligrosas.', 'Sistema de Desarrollo Sostenible.', 'Servicio de Distribución de Suministros.', 'Software de Diseño y Simulación.'),
(6, '¿Qué es un riesgo laboral?', 'Una condición o situación que tiene el potencial de causar daño a los trabajadores.', 'Una oportunidad de ascenso en la empresa.', 'Un nuevo producto en el mercado.', 'Una actividad recreativa para los empleados.'),
(7, '¿Qué se entiende por ergonomía en el contexto laboral?', 'El diseño de lugares de trabajo y tareas para que se ajusten a las capacidades humanas.', 'El estudio de los ecosistemas naturales.', 'Una técnica de marketing digital.', 'La administración de recursos financieros.'),
(8, '¿Cuál es la importancia de realizar evaluaciones de riesgos laborales?', 'Identificar peligros potenciales y tomar medidas para prevenir accidentes.', 'Realizar revisiones de productos para su lanzamiento.', 'Determinar el horario de trabajo de los empleados.', 'Seleccionar nuevos proveedores para la empresa.'),
(9, '¿Qué es la prevención de riesgos laborales?', 'Conjunto de medidas y acciones destinadas a evitar accidentes y enfermedades laborales', 'Un sistema de recompensas para los trabajadores.', 'Un plan de marketing para aumentar las ventas.', 'Una estrategia de expansión global.'),
(10, '¿Cuál es el propósito de la señalización de seguridad en el lugar de trabajo?', 'Informar y advertir sobre posibles riesgos y acciones de seguridad.', 'Decorar las instalaciones de la empresa.', 'Indicar las áreas de recreación para los empleados.', 'Promover eventos culturales en la empresa.'),
(11, '¿Qué es el riesgo biológico en SST?', 'La exposición a microorganismos patógenos en el entorno laboral.', 'Un término para describir la presión atmosférica en el lugar de trabajo.', 'Un enfoque en la ergonomía del lugar de trabajo.', 'Una técnica de resolución de conflictos en equipo.'),
(12, '¿Qué es el concepto de \"exposición ocupacional\" en SST?', 'La entrada de sustancias peligrosas al cuerpo durante el trabajo.', 'El tiempo que los empleados pasan socializando en el lugar de trabajo.', 'Un término para describir la relación entre empleados y empleadores.', 'La planificación de eventos de integración en la empresa.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `problema`
--
ALTER TABLE `problema`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `problema`
--
ALTER TABLE `problema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
