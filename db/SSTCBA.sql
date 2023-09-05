-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 29-08-2023 a las 14:51:03
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sstcba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta`
--

CREATE TABLE `alerta` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Lorena', 'Alfonso', 1001201876, 'Aprendiz', 'Cuadernos', 5, '2023-08-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brigalerta`
--

CREATE TABLE `brigalerta` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `total_brigadistas` varchar(255) NOT NULL,
  `total_alertas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Estructura de tabla para la tabla `extintores`
--

CREATE TABLE `extintores` (
  `ExtintorID` int(11) NOT NULL,
  `NumeroDeSerie` int(11) NOT NULL,
  `TipoDeExtintor` varchar(100) NOT NULL,
  `FechaDeFabricacion` date NOT NULL,
  `FechaDeCompra` date NOT NULL,
  `Ubicacion` varchar(100) NOT NULL,
  `UbicacionEspecifica` varchar(100) NOT NULL,
  `UltimaRecarga` date NOT NULL,
  `ProximaRecarga` date NOT NULL,
  `Comentarios` varchar(500) NOT NULL,
  `ImagenReferencia` longblob NOT NULL,
  `FechaDeRegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `extintores`
--

INSERT INTO `extintores` (`ExtintorID`, `NumeroDeSerie`, `TipoDeExtintor`, `FechaDeFabricacion`, `FechaDeCompra`, `Ubicacion`, `UbicacionEspecifica`, `UltimaRecarga`, `ProximaRecarga`, `Comentarios`, `ImagenReferencia`, `FechaDeRegistro`) VALUES
(7, 678678, 'Agua', '2023-08-02', '2023-08-05', 'Biblioteca', 'Sistemas 1', '2023-08-26', '2023-09-30', 'Para apagar incendios electricos.', '', '2023-08-25'),
(8, 85656, 'Agua', '2023-08-02', '2023-08-05', 'Auditorio', 'Segundo piso', '2023-08-27', '2023-09-27', 'Para apagar incendios electricos.', '', '2023-08-27'),
(9, 2147483647, 'Agua', '2023-07-30', '2023-08-03', 'Administracion', 'Primer piso', '2023-08-27', '2023-09-27', 'Para apagar incendios electricos.', '', '2023-08-27'),
(11, 34324, 'Agua', '2023-07-30', '2023-08-04', 'Biblioteca', 'Segundo piso', '2023-08-27', '2023-11-27', 'dfsgdfsgdsf', '', '2023-08-28'),
(13, 86758657, 'Extintor de halón', '2023-08-01', '2023-08-05', 'Bloque A', 'Segundo piso', '2023-08-05', '2023-08-27', 'Para apagar incendios.', '', '2023-08-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `imagen` longblob NOT NULL,
  `cantidad` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `fech_ven` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `normas_apren`
--

CREATE TABLE `normas_apren` (
  `id` int(11) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla cursos' ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `normas_apren`
--

INSERT INTO `normas_apren` (`id`, `concepto`, `descripcion`) VALUES
(1, 'Uso de Equipos de Protección Personal (EPP)', 'Los aprendizajes deben utilizar los EPP proporcionados según las indicaciones, como cascos, guantes, gafas de seguridad, entre otros, cuando sea necesario para prevenir riesgos laborales.'),
(2, 'Identificación y Reporte de Peligros', 'Los aprendices deben estar atentos a cualquier situación peligrosa y reportarla de inmediato a su supervisor o instructor.'),
(3, 'Participación en Capacitaciones de SST', 'Los aprendices pueden recibir capacitación en temas de seguridad y salud en el trabajo y deben participar en estas sesiones.'),
(4, 'Cumplimiento de Procedimientos de Emergencia', 'Los aprendices deben conocer y seguir los procedimientos de emergencia establecidos, como evacuación en caso de incendio o primeros auxilios.'),
(5, 'Participación en Investigaciones de Incidentes', ' Si ocurre un incidente o accidente, los aprendices deben cooperar en la investigación para determinar las causas y prevenir futuras ocurrencias.'),
(6, 'Evaluación de Riesgos y Controles', ' Los aprendizajes pueden ser instruidos en la identificación y evaluación de riesgos laborales, así como en la implementación de medidas de control.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `normas_hig`
--

CREATE TABLE `normas_hig` (
  `id` int(11) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `normas_hig`
--

INSERT INTO `normas_hig` (`id`, `concepto`, `descripcion`) VALUES
(1, 'Temperaturas de Almacenamiento y Cocinado', 'Mantener los alimentos refrigerados a temperaturas seguras y cocinarlos a las temperaturas recomendadas para garantizar su cocción completa.'),
(2, 'Higiene de Equipos y Superficies', 'Limpiar y desinfectar periódicamente equipos, utensilios y superficies de trabajo para prevenir la contaminación.'),
(3, 'Agua Potable', 'Use agua potable para la preparación de alimentos, lavado de utensilios y limpieza en general.'),
(4, 'Plan de Emergencia', 'Establecer un plan de emergencia que incluya procedimientos para incendios, evacuaciones y otras situaciones de crisis.'),
(5, 'Primeros Auxilios', 'Tener un botiquín de primeros auxilios y personal capacitado para responder en caso de emergencias médicas.'),
(6, 'Prevención de Enfermedades', 'Capacitar al personal sobre la prevención de enfermedades transmitidas por alimentos y asegurarse de que los empleados enfermos no manipulen los alimentos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `normas_ica`
--

CREATE TABLE `normas_ica` (
  `id` int(11) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `normas_ica`
--

INSERT INTO `normas_ica` (`id`, `concepto`, `descripcion`) VALUES
(1, 'Higiene y Limpieza', 'Mantener las instalaciones y el entorno limpio para prevenir la propagación de enfermedades y reducir el estrés en los animale'),
(2, 'Salud y Atención Veterinaria', 'Establecer un programa de atención veterinaria que incluya vacunaciones, desparasitaciones y detección temprana de enfermedades. Brindar atención médica adecuada a los animales enfermos.'),
(3, 'Bioseguridad', 'Implementar medidas de bioseguridad para prevenir la introducción y propagación de enfermedades en la explotación ganadera.'),
(4, 'Higiene Personal', 'Los trabajadores que manipulan alimentos deben mantener una higiene personal estricta, incluyendo el lavado de manos frecuente, el uso de ropa y equipo de protección adecuado, y la prevención de enfermedades contagiosas.\r\n'),
(5, 'Transporte Seguro', 'Si se realiza transporte de alimentos, asegúrese de que se cumplan las normas de seguridad alimentaria durante el transporte para evitar la contaminación y el deterioro.'),
(6, 'Etiquetado y Rotulación', 'Los alimentos deben ser etiquetados de manera clara y precisa, incluyendo información sobre ingredientes, fecha de caducidad, instrucciones de almacenamiento y preparación, y advertencias sobre alérgenos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `normas_trab`
--

CREATE TABLE `normas_trab` (
  `id` int(11) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `normas_trab`
--

INSERT INTO `normas_trab` (`id`, `concepto`, `descripcion`) VALUES
(1, 'Ventilación y Condiciones Ambientales', ' Mantener una ventilación adecuada y un ambiente cómodo en términos de temperatura y humedad.'),
(2, 'Manejo de Cables y Enchufes', 'Organizar y asegurar los cables eléctricos para evitar riesgos de tropiezos o daños.'),
(3, 'Prevención de Contaminación del Aire', 'Evitar el uso excesivo de productos químicos o de limpieza que pueden afectar la calidad del aire en el entorno de oficina.'),
(4, 'Prevención de Riesgos', 'Identificar y abordar los posibles riesgos en el entorno de oficina, como cables sueltos, objetos que pueden causar tropiezos, etc.'),
(5, 'Higiene Persona', 'Los instructores deben mantener una higiene personal adecuada y seguir las pautas de salud pública, especialmente en situaciones en las que trabajan en estrecho contacto con los aprendices.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion`
--

CREATE TABLE `observacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `Condicion` text NOT NULL,
  `Lugar` text NOT NULL,
  `Foto` longblob NOT NULL,
  `contexto` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Lector'),
(3, 'brigadista'),
(4, 'administrador');

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
(1, 'Lorena', 'Alfonso', 1001201876, 'Femenino', 2, 'Ninguna', 'Ninguna', 'S', '54', '2023-06-26'),
(4, 'Pedro', 'Alfonso', 767676876, 'Masculino', 2, 'Ninguna', 'Ninguna', 'XL', '39', '2023-06-26'),
(5, 'Marco', 'Polo', 1, 'Masculino', 2, 'Ninguna', 'Ninguna', 'M', '35', '2023-06-26');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` longblob DEFAULT NULL,
  `creado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--


CREATE TABLE `revision` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `id_Observacion` int(11) NOT NULL,
  `Fecha_revision` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `revision`
--

INSERT INTO `revision` (`id`, `nombre`, `Estado`, `id_Observacion`, `Fecha_revision`) VALUES
(1, 'antiwalas manuel primero', 'arreglado', 2, '2023-07-03 02:34:44'),
(2, 'Ener valencia', 'En espera', 1, '2023-07-03 02:34:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `significados`
--

CREATE TABLE `significados` (
  `ID_Significado` int(11) NOT NULL,
  `Palabra` varchar(30) NOT NULL,
  `Definicion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `significados`
--

INSERT INTO `significados` (`ID_Significado`, `Palabra`, `Definicion`) VALUES
(2, 'productiva', 'Etapa Productiva: Es aquella en la que el aprendiz aplica, complementa, fortalece y consolida sus competencias en términos de conocimiento, habilidades, destrezas, actitudes y valores. Esta etapa hace parte de la formación, con su culminación termina su formación.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblentradas`
--

CREATE TABLE `tblentradas` (
  `ID_Entradas` int(11) NOT NULL,
  `ID_Implementos` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Fecha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblentradas`
--

INSERT INTO `tblentradas` (`ID_Entradas`, `ID_Implementos`, `Cantidad`, `Descripcion`, `Fecha`) VALUES
(1, 3, 10, 'Hola', '2023-08-24 17:43:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblimplementos`
--

CREATE TABLE `tblimplementos` (
  `ID_Implementos` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(300) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Ubicacion` varchar(50) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblimplementos`
--

INSERT INTO `tblimplementos` (`ID_Implementos`, `Nombre`, `Descripcion`, `Categoria`, `Cantidad`, `Ubicacion`, `Fecha`) VALUES
(1, 'Guantes', 'OOOOOOOOO', 'Seguridad', 13, 'Almacen', '2023-08-16'),
(2, 'Casco', 'OOOOOOOOOO', 'Seguridad', 12, 'Almacen', '2023-08-10'),
(3, 'Overol', 'Para proteger las manos', 'Seguridad', 10, 'Almacen', '2023-08-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblsalidas`
--

CREATE TABLE `tblsalidas` (
  `ID_Salidas` int(11) NOT NULL,
  `ID_Implementos` int(11) NOT NULL,
  `ID_Empleado` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Fecha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tobservacion`
--

CREATE TABLE `tobservacion` (
  `id` int(11) NOT NULL,
  `regional` varchar(50) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(20) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Volcado de datos para la tabla `tblsalidas`
--

INSERT INTO `tblsalidas` (`ID_Salidas`, `ID_Implementos`, `ID_Empleado`, `Cantidad`, `Descripcion`, `Fecha`) VALUES
(1, 3, 1, 10, 'Para proteger las manos', '2023-08-24 17:44:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tobservacion`
--

CREATE TABLE `tobservacion` (
  `id` int(11) NOT NULL,
  `regional` varchar(50) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(20) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `correo`, `telefono`, `password`, `fecha`, `rol`) VALUES
(1, 'user', 'ronald@gmail.com', '3234567894', '12345', '2023-08-23 22:30:20', 2),
(2, 'sst', 'jesus@gmail.com', '3112345678', '12345', '2023-08-23 22:30:12', 1),
(12, 'Admin', 'admin@admin.com', '123213342', '12345', '2023-08-23 20:56:41', 4),
(13, 'Brigadista', 'brigadista@brigadista.com', '3112412', '12345', '2023-08-23 20:58:03', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `brigalerta`
--
ALTER TABLE `brigalerta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `extintores`
--
ALTER TABLE `extintores`
  ADD PRIMARY KEY (`ExtintorID`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `normas_apren`
--
ALTER TABLE `normas_apren`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `normas_apren` ADD FULLTEXT KEY `Buscar` (`concepto`,`descripcion`);

--
-- Indices de la tabla `normas_hig`
--
ALTER TABLE `normas_hig`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `normas_ica`
--
ALTER TABLE `normas_ica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `normas_trab`
--
ALTER TABLE `normas_trab`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_per`);

--
-- Indices de la tabla `problema`
--
ALTER TABLE `problema`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `revision`
--
ALTER TABLE `revision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Observacion` (`id_Observacion`);

--
-- Indices de la tabla `significados`
--
ALTER TABLE `significados`
  ADD PRIMARY KEY (`ID_Significado`);

--
-- Indices de la tabla `tblentradas`
--
ALTER TABLE `tblentradas`
  ADD PRIMARY KEY (`ID_Entradas`),
  ADD KEY `ID_Implementos` (`ID_Implementos`);

--
-- Indices de la tabla `tblimplementos`
--
ALTER TABLE `tblimplementos`
  ADD PRIMARY KEY (`ID_Implementos`);

--
-- Indices de la tabla `tblsalidas`
--
ALTER TABLE `tblsalidas`
  ADD PRIMARY KEY (`ID_Salidas`),
  ADD KEY `ID_Empleado` (`ID_Empleado`),
  ADD KEY `ID_Implementos` (`ID_Implementos`);

--
-- Indices de la tabla `tobservacion`
--
ALTER TABLE `tobservacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permisos` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alerta`
--
ALTER TABLE `alerta`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `brigalerta`
--
ALTER TABLE `brigalerta`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `extintores`
--
ALTER TABLE `extintores`
  MODIFY `ExtintorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `normas_apren`
--
ALTER TABLE `normas_apren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `normas_hig`
--
ALTER TABLE `normas_hig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `normas_ica`
--
ALTER TABLE `normas_ica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `normas_trab`
--
ALTER TABLE `normas_trab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `observacion`
--
ALTER TABLE `observacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `problema`
--
ALTER TABLE `problema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `revision`
--
ALTER TABLE `revision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `significados`
--
ALTER TABLE `significados`
  MODIFY `ID_Significado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblentradas`
--
ALTER TABLE `tblentradas`
  MODIFY `ID_Entradas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblimplementos`
--
ALTER TABLE `tblimplementos`
  MODIFY `ID_Implementos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblsalidas`
--
ALTER TABLE `tblsalidas`
  MODIFY `ID_Salidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tobservacion`
--
ALTER TABLE `tobservacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tobservacion`
--
ALTER TABLE `tobservacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `revision`
--
ALTER TABLE `revision`
  ADD CONSTRAINT `revision_ibfk_1` FOREIGN KEY (`id_Observacion`) REFERENCES `observacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblentradas`
--
ALTER TABLE `tblentradas`
  ADD CONSTRAINT `tblentradas_ibfk_1` FOREIGN KEY (`ID_Implementos`) REFERENCES `tblimplementos` (`ID_Implementos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblsalidas`
--
ALTER TABLE `tblsalidas`
  ADD CONSTRAINT `tblsalidas_ibfk_1` FOREIGN KEY (`ID_Empleado`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblsalidas_ibfk_2` FOREIGN KEY (`ID_Implementos`) REFERENCES `tblimplementos` (`ID_Implementos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `permisos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
