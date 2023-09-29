-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-09-2023 a las 00:15:36
-- Versión del servidor: 10.5.19-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u632157300_SSTCBA`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

CREATE TABLE `aprendiz` (
  `cod_estudiante` int(11) NOT NULL,
  `UsuName` varchar(100) NOT NULL,
  `UsuContraseña` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `articulo` varchar(2000) NOT NULL,
  `descripcion` text NOT NULL,
  `interpretacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabla articulos' ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `botiquines`
--

CREATE TABLE `botiquines` (
  `ID` int(11) NOT NULL,
  `ImagenReferencia` longblob NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Ubicacion` varchar(100) NOT NULL,
  `UbicacionEspecifica` varchar(100) NOT NULL,
  `FechaUltima` date NOT NULL,
  `FechaRevision` date NOT NULL,
  `Responsable` varchar(100) NOT NULL,
  `Comentarios` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camillas`
--

CREATE TABLE `camillas` (
  `CamillaID` int(11) NOT NULL,
  `ImagenReferencia` longblob NOT NULL,
  `TipoCamilla` varchar(100) NOT NULL,
  `Señalizacion` varchar(100) NOT NULL,
  `Acceso` varchar(100) NOT NULL,
  `EstadoSoporte` varchar(100) NOT NULL,
  `CorreasSeguridad` varchar(100) NOT NULL,
  `Inmovilizador` varchar(100) NOT NULL,
  `Limpieza` varchar(100) NOT NULL,
  `InstalacionPared` varchar(100) NOT NULL,
  `UbicacionActual` varchar(200) NOT NULL,
  `FechaAdquisicion` date NOT NULL,
  `FechaUltimoMantenimiento` date NOT NULL,
  `FechaProximoMantenimiento` date NOT NULL,
  `Observaciones` varchar(1000) NOT NULL,
  `FechaRegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementosbotiquines`
--

CREATE TABLE `elementosbotiquines` (
  `id_elementos` int(11) NOT NULL,
  `id_botiquin` int(11) NOT NULL,
  `ImagenReferencia` longblob NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `ubicacion` varchar(200) NOT NULL,
  `ubicacionEspecifica` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `comentarios` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradasbotiquin`
--

CREATE TABLE `entradasbotiquin` (
  `id_entradas` int(11) NOT NULL,
  `id_elementos` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fechaEntra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `InsCode` int(11) NOT NULL,
  `InsName` varchar(100) NOT NULL,
  `InsContraseña` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventariosalon`
--

CREATE TABLE `inventariosalon` (
  `id` int(11) NOT NULL,
  `articulo` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `normas_apren`
--

CREATE TABLE `normas_apren` (
  `id` int(11) NOT NULL,
  `fech_ingre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `num_resol` varchar(30) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabla cursos' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `normas_hig`
--

CREATE TABLE `normas_hig` (
  `id` int(11) NOT NULL,
  `fech_ingre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `num_resol` varchar(30) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `normas_ica`
--

CREATE TABLE `normas_ica` (
  `id` int(11) NOT NULL,
  `fech_ingre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `num_resol` varchar(25) NOT NULL,
  `concepto` text NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `normas_trab`
--

CREATE TABLE `normas_trab` (
  `id` int(11) NOT NULL,
  `fech_ingre` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `num_resol` varchar(30) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_per`, `nom_per`, `ape_per`, `doc_per`, `gen_per`, `id_cargo_per`, `cpe_per`, `cpd_per`, `talla_torso_per`, `talla_zapatos_per`, `Fecha`) VALUES
(7, 'Pedro', 'Sanchez', 1234, 'Masculino', 2, 'Ninguna', 'Ninguna', 'M', '38', '2023-09-18'),
(8, 'Maria', 'Rodrigues', 7466398, 'Femenino', 3, 'Ninguna', 'Ninguna', 'M', '37', '2023-09-18'),
(9, 'Stephanie', 'Cuellar', 68452, 'Femenino', 2, 'Ninguna', 'Ninguna', 'S', '38', '2023-09-18'),
(10, 'Cristian', 'Alvarez', 6026810, 'Masculino', 2, 'Ninguna', 'Ninguna', 'M', '37', '2023-09-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `PreID` int(11) NOT NULL,
  `PreNumPrueba` int(11) NOT NULL,
  `PreNumPregunta` int(11) NOT NULL,
  `PreArchivo` blob DEFAULT NULL,
  `PrePreguntaEnun` text DEFAULT NULL,
  `PreComplejidad` varchar(255) NOT NULL,
  `PreDificultad` varchar(255) NOT NULL,
  `PreTiempo` int(11) NOT NULL,
  `PrePuntos` int(11) NOT NULL,
  `PreA` varchar(255) NOT NULL,
  `PreB` varchar(255) NOT NULL,
  `PreC` varchar(255) NOT NULL,
  `PreD` varchar(255) NOT NULL,
  `PreKeyA` int(11) DEFAULT NULL,
  `PreKeyB` int(11) DEFAULT NULL,
  `PreKeyC` int(11) DEFAULT NULL,
  `PreKeyD` int(11) DEFAULT NULL,
  `PrePuntoA` int(11) DEFAULT NULL,
  `PrePuntoB` int(11) DEFAULT NULL,
  `PrePuntoC` int(11) DEFAULT NULL,
  `PrePuntoD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `color` varchar(20) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` varchar(3) NOT NULL,
  `cantidad_min` int(11) NOT NULL,
  `categorias` varchar(50) NOT NULL,
  `imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE `pruebas` (
  `PruID` int(11) NOT NULL,
  `PruNumero` int(11) NOT NULL,
  `PruTema` varchar(255) NOT NULL,
  `PruComplejidad` varchar(255) NOT NULL,
  `PruDificultad` varchar(255) NOT NULL,
  `PruTiempo` int(11) NOT NULL,
  `PruPuntos` int(11) NOT NULL,
  `PruFecha` date DEFAULT NULL,
  `PruNumPreguntas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retro`
--

CREATE TABLE `retro` (
  `RetroID` int(11) NOT NULL,
  `RetroPrueba` int(11) NOT NULL,
  `RetroPruebaId` int(11) NOT NULL,
  `RetroNumPregunta` int(11) NOT NULL,
  `RetroRetroali` text DEFAULT NULL,
  `RetroReferencia` text DEFAULT NULL,
  `RetroOpcionPregABCD` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision`
--

CREATE TABLE `revision` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `id_Observacion` int(11) NOT NULL,
  `Fecha_revision` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidasbotiquin`
--

CREATE TABLE `salidasbotiquin` (
  `id_salidas` int(11) NOT NULL,
  `id_elementos` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fechaSale` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `significados`
--

CREATE TABLE `significados` (
  `ID_Significado` int(11) NOT NULL,
  `Palabra` varchar(30) NOT NULL,
  `Definicion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblentradas`
--

CREATE TABLE `tblentradas` (
  `ID_Entradas` int(11) NOT NULL,
  `ID_Implementos` int(11) NOT NULL,
  `ID_Empleado` varchar(100) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Fecha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblimplementos`
--

CREATE TABLE `tblimplementos` (
  `ID_Implementos` int(11) NOT NULL,
  `ImagenReferencia` longblob NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(300) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Ubicacion` varchar(50) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblsalidas`
--

CREATE TABLE `tblsalidas` (
  `ID_Salidas` int(11) NOT NULL,
  `ID_Implementos` int(11) NOT NULL,
  `ID_Empleado` varchar(100) NOT NULL,
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
(1, 'user', 'ronald@gmail.com', '3124314567', '12345', '2023-09-18 14:50:40', 2),
(2, 'sst', 'jesus@gmail.com', '3112345678', '12345', '2023-08-23 22:30:12', 1),
(12, 'Admin', 'admin@admin.com', '123213342', '12345', '2023-08-23 20:56:41', 4),
(13, 'Brigadista', 'brigadista@brigadista.com', '3112412', '12345', '2023-08-23 20:58:03', 3),
(20, 'Pepito perez', 'pepito@soy.sena.edu.co', '32145566678', 'Ratona', '2023-09-19 00:00:00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL COMMENT '\r\n',
  `registro` timestamp NULL DEFAULT current_timestamp() COMMENT 'CURRENT_TIMESTAMP'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `correo`, `password`, `telefono`, `registro`) VALUES
(1, 'Priscafer Emmanuel', 'andydzulchan02@gmail.com', '54321', '45885544444444', '2021-06-13 17:08:46'),
(2, 'Priscafer Emmanuel', 'mugarte5672@gmail.com', '12345', '9981571220', '2021-06-13 17:13:22'),
(3, 'ernesto', 'usuario@gmail.com', '147852', '9900258789', '2021-06-13 17:13:36'),
(4, 'Rodolfo', 'rodo.mugarte@gmail.com', '888888', '1234567891', '2021-06-13 17:14:56'),
(5, 'Priscafer', 'Priscafer@gmail.com', '123456', '9987568921', '2021-06-13 17:17:36'),
(6, 'Mugarte', 'mugarte@gmail.com', '2001145', '9911165670', '2021-06-13 17:21:38'),
(8, 'Emma14', 'Emma23@gmail.com', '123456', '9987582563', '2021-06-13 17:29:13'),
(9, 'Jose Alejandro', 'me@gmail.com', '12345', '9981276091', '2021-06-13 20:41:46'),
(10, 'Samuel', 'itiosami01@gmail.com', '123456789', '3142276939', '2023-08-23 22:13:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`cod_estudiante`),
  ADD UNIQUE KEY `UsuName` (`UsuName`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `botiquines`
--
ALTER TABLE `botiquines`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `brigalerta`
--
ALTER TABLE `brigalerta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `camillas`
--
ALTER TABLE `camillas`
  ADD PRIMARY KEY (`CamillaID`);

--
-- Indices de la tabla `elementosbotiquines`
--
ALTER TABLE `elementosbotiquines`
  ADD PRIMARY KEY (`id_elementos`),
  ADD KEY `id_botiquin` (`id_botiquin`);

--
-- Indices de la tabla `entradasbotiquin`
--
ALTER TABLE `entradasbotiquin`
  ADD PRIMARY KEY (`id_entradas`),
  ADD KEY `id_elementos` (`id_elementos`);

--
-- Indices de la tabla `extintores`
--
ALTER TABLE `extintores`
  ADD PRIMARY KEY (`ExtintorID`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`InsCode`),
  ADD UNIQUE KEY `InsName` (`InsName`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventariosalon`
--
ALTER TABLE `inventariosalon`
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
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`PreID`),
  ADD KEY `PreNumPrueba` (`PreNumPrueba`);

--
-- Indices de la tabla `problema`
--
ALTER TABLE `problema`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`PruID`),
  ADD UNIQUE KEY `PruNumero` (`PruNumero`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `retro`
--
ALTER TABLE `retro`
  ADD PRIMARY KEY (`RetroID`),
  ADD KEY `RetroPrueba` (`RetroPrueba`),
  ADD KEY `RetroPruebaId` (`RetroPruebaId`);

--
-- Indices de la tabla `revision`
--
ALTER TABLE `revision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Observacion` (`id_Observacion`);

--
-- Indices de la tabla `salidasbotiquin`
--
ALTER TABLE `salidasbotiquin`
  ADD PRIMARY KEY (`id_salidas`),
  ADD KEY `id_elementos` (`id_elementos`);

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
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alerta`
--
ALTER TABLE `alerta`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  MODIFY `cod_estudiante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `botiquines`
--
ALTER TABLE `botiquines`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `brigalerta`
--
ALTER TABLE `brigalerta`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `camillas`
--
ALTER TABLE `camillas`
  MODIFY `CamillaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `elementosbotiquines`
--
ALTER TABLE `elementosbotiquines`
  MODIFY `id_elementos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entradasbotiquin`
--
ALTER TABLE `entradasbotiquin`
  MODIFY `id_entradas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `extintores`
--
ALTER TABLE `extintores`
  MODIFY `ExtintorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `InsCode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventariosalon`
--
ALTER TABLE `inventariosalon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `normas_apren`
--
ALTER TABLE `normas_apren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `normas_hig`
--
ALTER TABLE `normas_hig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `normas_ica`
--
ALTER TABLE `normas_ica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `normas_trab`
--
ALTER TABLE `normas_trab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `observacion`
--
ALTER TABLE `observacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `PreID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `problema`
--
ALTER TABLE `problema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  MODIFY `PruID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `retro`
--
ALTER TABLE `retro`
  MODIFY `RetroID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `revision`
--
ALTER TABLE `revision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salidasbotiquin`
--
ALTER TABLE `salidasbotiquin`
  MODIFY `id_salidas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `significados`
--
ALTER TABLE `significados`
  MODIFY `ID_Significado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblentradas`
--
ALTER TABLE `tblentradas`
  MODIFY `ID_Entradas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblimplementos`
--
ALTER TABLE `tblimplementos`
  MODIFY `ID_Implementos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblsalidas`
--
ALTER TABLE `tblsalidas`
  MODIFY `ID_Salidas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tobservacion`
--
ALTER TABLE `tobservacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `elementosbotiquines`
--
ALTER TABLE `elementosbotiquines`
  ADD CONSTRAINT `elementosbotiquines_ibfk_1` FOREIGN KEY (`id_botiquin`) REFERENCES `botiquines` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entradasbotiquin`
--
ALTER TABLE `entradasbotiquin`
  ADD CONSTRAINT `entradasbotiquin_ibfk_1` FOREIGN KEY (`id_elementos`) REFERENCES `elementosbotiquines` (`id_elementos`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`PreNumPrueba`) REFERENCES `pruebas` (`PruNumero`);

--
-- Filtros para la tabla `retro`
--
ALTER TABLE `retro`
  ADD CONSTRAINT `retro_ibfk_1` FOREIGN KEY (`RetroPrueba`) REFERENCES `pruebas` (`PruNumero`),
  ADD CONSTRAINT `retro_ibfk_2` FOREIGN KEY (`RetroPruebaId`) REFERENCES `preguntas` (`PreID`);

--
-- Filtros para la tabla `revision`
--
ALTER TABLE `revision`
  ADD CONSTRAINT `revision_ibfk_1` FOREIGN KEY (`id_Observacion`) REFERENCES `observacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `salidasbotiquin`
--
ALTER TABLE `salidasbotiquin`
  ADD CONSTRAINT `salidasbotiquin_ibfk_1` FOREIGN KEY (`id_elementos`) REFERENCES `elementosbotiquines` (`id_elementos`);

--
-- Filtros para la tabla `tblentradas`
--
ALTER TABLE `tblentradas`
  ADD CONSTRAINT `tblentradas_ibfk_1` FOREIGN KEY (`ID_Implementos`) REFERENCES `tblimplementos` (`ID_Implementos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblsalidas`
--
ALTER TABLE `tblsalidas`
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
