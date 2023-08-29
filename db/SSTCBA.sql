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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla articulos' ROW_FORMAT=COMPACT;

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
-- Estructura de tabla para la tabla `extintorimagenes`
--

CREATE TABLE `extintorimagenes` (
  `ID` int(11) NOT NULL,
  `NombreArchivo` varchar(255) NOT NULL,
  `TipoArchivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Volcado de datos para la tabla `observacion`
--

INSERT INTO `observacion` (`id`, `nombre`, `Condicion`, `Lugar`, `Foto`, `contexto`, `fecha`) VALUES
(1, 'Louren ramirez', 'vi que las escaleras estaban mal construidas', 'en el bloque a', 0xffd8ffe000104a46494600010100000100010000ffdb0084000a0708151615181616161819181a1a1c1c181c1a1c1e1c1c1a1a1e1c1a1c1d1c191c1c212e251c1e2b1f1c1a2638262b2f313535351a243b403b343f2e343531010c0c0c100f101e12121e342b24243434343434343434343434343431343434343434343434343434343434343434343434343434343434343434363434343134ffc0001108011300b703012200021101031101ffc4001b00000105010100000000000000000000000400020305060107ffc400451000010301050407060305060603000000010002110304051221314151619106227181a1b1f0133252c1d1e142629214337282f115162353b2c2244363a2d2e2077383ffc400190101010101010100000000000000000000000102030405ffc40026110002020202020104030100000000000000010211122103314151041322326142718133ffda000c03010002110311003f00b9e81d3eb563c183c5ca86f6eb557ff1bbccfd1683a0b386abbf3347fa8aa37b31d479dcf703def742d71fe2892fc98674d6c85efa0035c70d2d9b2433e881b25ccec86172d65bea53656ebbc34fb36344ee8d477a9a85bace3fe6339a4a36c46548a3a1704eb2a6feef6918b3e5dfb9689b79d9ff00cd67ea0a4178d0ff00359fa8298a1919c67472769527f774ef3c96805be8cfef19fa87d53996ca33954667f98298a193334ee8e9f888509e8f3f3eb9f5dcb5edb551ff00319fadbf5527ed14fe367ea1f54c1172662bfbbf53e2776e49bfd8153e33c82da3ab336399fa87d53bda33e267ea0a6086461bfb06b0fc67f48cfc50aebaeae70fd3f28dbdebd171b37b7984d867e5e61304323cf5d73563f8ff00edfba86adc35f4c40f72f423646492224f1097b08feaa605c8f3a7dcf5f205e38437d4212d3773da09c638c01f32bd32ad9d8468154dbeed6b8658786fdb32772625b2b3a2430d9408cc639ed972b5bc7df7ff000b0f3050372c06d460d1ae81d908ebc8f5c9df4e9ffb9758fe2739761afd893171c9f4c27929d73a08f5b124cac92029ba0d952a9bf1fc82ced85e4bdcc01bd6a826667370191074ee5a6e86b22cf5091f8ddfe86aca5d626a6e3ed187bb1291e907db0de9bb9e2d300e418d1df9aa96079ce4f87d15f749ec6fa96a7399a081de27eaa065d754ececc9739395b3714a8af663f8bc07d14cc0fce1d3db0ac45cb50ff45d6dcf5449f929722520021e368f5dca418f7807b279a3db75554f37554e0973148ab06a4ecedf4575af7ee0ac4ddd538273aeea9c132996a255bdefdc358fba7637f0e5f746baeda9bbcd42fb0d68d026522e31067d478ddcbeea27577c69af0ffd94c6c75c7e11cd46ea15fe01cd3291314303ddc397dd31d5dc36787dd4a28573f807ea5c759abff943f526722e2885d6a3bbc4a6b2f72c33831921c00277889d3252bac35a27d98e7f642da6cd55a336003899e699c8628d1f462da6a0792d0d3224093b379d7eeadef419b78d361e45673a09386acebed23bb081f5e6b477ab27d99df49be0e03e6bac1fda7397618d32a66282866076221a32540cac3ab3c7d7924b8dcf2ed3f2faaea14ade8cbc8b23f897ff00a7ecb29713c3ab46f2cf0737eab5374002c04e7eebff00dc1657a3ec1fb5531a7580e046bf2523d223ed9e80da21ce7bb7bcfd14fec0468bce6feb5385aaa81393a3231b06e4232deff89dfa8a392093a3d430295a38782f306de8f1f89fc3ae47cd4acbe6a7c557f59faa96bd8a67a77b35df65c179ab6fca9f1d5fd4efaa9db7d55d43eafea3f55725ec533d0c501c3925fb33772c00bf2be98ea73fbae8bfebfc6fe63e696bd8a66f5d41a9a6ced585fedfadf1bbbcb5747482b4fef0ff00d896bd8a66e7f676ae9b2b7705837f492aff0099fe85233a4d5644d4047f269dca6bd9366d1d6266e0982cacf848581b0f486a532e02a001cf7993065cd7c62323225a59de09da8efef555db51bc9bf4574569a35168b18821bef7f4c8c68abad57738ccc4790edd65543ba535363dbfa5ba724eb374a5c5e3da546e1db93473c94a4361160b30a555cd020100fae68eb7b7f75ffd4e1c9d2ab9f78d3a9691ecde1dd4ce3b77772b1b6e948fe478f19561d30fb413653d51d83c914fd10b61f71bd81115fdd540da2730770cfbff00a849329e8524295f6721b60fff003778b8ebcd677a394c9b6300d84b968aa362c0379a6df123eaa9ba331fb534fe57790f1517823f256de8c2eb454701f8cc7285495adec692d041339c4403bb11313c25683a7cd7b2ccd7532d69a8f38f387b9a73ea709d48ce3b4af36a56071f79d80710e8f0192e4e3f76ce916a8d054b5c8c9cd19c6b277e63723ed56b6134053c78a30bc4616b9c742049333b5655d6578c2d739a0123ac0888cc1e248cb25a7e8d5b69d36b0bacec384e26ba65f3bcc839c6e3c345d610728bdd1994945f565831953e0778291a2a4fb8e5bf6589840708208907610730549fb03370e4b9e0323cff00af1181dc9343dfb58e8e017a19b0377048ddecf84260323cddf6b2dd58efd2a2fdb0e5d47fe939af4b7dd8c3ab415055bad804e4d1b4cc477a60c648f3c7576fc0edfee9415aad4d675b099886c8313c56cef0b758e9cff8e1eef86990f3cfddf1585e935f61c1becc3baa4e30709041230c9c33a8d3795a5c4d8cd205a4d77b5682e067139d8730247d632576cc119cf255760b5536bdaf221d81d30722fc4d2dec10bd25977388060c168208e3dbf759c6f68dc9d3a316d2c9dbc94756ab068d24f62ddb2eb70d860ef327fa216dd75bcb4860cf9153164c919de89331567bf7300e6656ced67ab4bb5e3e6551dd763f655e0882f64bbb4473daafad2dea53e0fa9e2d2bac15267393d93583dc6f67cd4d683b14360f707adaa67899e0150719a0e33e092e336762480afb682db0b32c8b5839e1553d1c67f8e0e5fbb73bb3de1f21cd5bdf6f8b231b1b298e507e4a9fa2f95479fc8ef24fe44f0c8abf493461a6c706f544ceccb7a0abde2c765eca9e7b89543697f5dffc4e3e289a0f1867d6ab9b9af46d47f6097bd263c39aca4c692241971339c9d63765080b9ebcb60ea323da325636d7ed0336f88da3bc7c956e1c2fc4dcdafce446bb67c174e3927b46249aecdfdc7d267329b69960760c9a7141c3b069b34ec856ade959ff002c7ebffd579e1cdba9eec8a1d8f2369e6559fdac91567a61e95c67ecc7ebff00d5075ba78d1a502ee21c7e4c2579b5b2d4e69897193a03e027251b1ef702039a4ee78190fe2699f3091a6acb2d1b2b6fff00205574863994bb58e07f53c11e0b39795f351fd6a98aa0df8b1b7bb600a8edafa8d1d66b80e3d66eccdaed46a3541d9d8e2e90706f8313dc3e6ab6a244ac2ed36c61d00e504222e3607be5ee180870734118c820fba0820671af15ca76461324c9e3f3de8da565a79406f20b9fd4dd9bc4eb2e7639d0facec3b30b1a1ddf2617a759ba514dac6b431d9002646702179e328341d9c11cc6ee2b2a697834d37db376ce93d21ff2de369cdabaee91b1c40c0e13d8b1400dea3793b1ee9ed4fa8bd13166cadcc22d14ce6419ce3734f8668eac66933854239b61626e0b4bdf686b4bdc4358e241248d83ccadb54fdd76566f885b83bb3325449603d4e7e6a769c8f680a0b10ea1ed2a6a7a0e249540eb3b735d4eb3ed490149d2a9166001897363b903d166c7b43b7d99f1c95874aff74d1f9e23b8a0ae4185954ffd36f8a7f22782a2cf75e36870125c279a3e8dc640cd80eed4792b2bb1f4d8c6b318eaed7644ab716ea3b5ece63e6b9e08de4cc5df37390c385a7d715e755def63c8cc099c32bdc6b5ae838105ec3fcc3eabcefa677653c3ed18f648d4073731cf328a38bb42ed5329ecb682446d85aee8f582957a648873d8ec2f8839c489ee3e0579e32a4f530c839bc9263808199ecc95b5d6e14892c7bd85d12187064349c11319eb3aaeed64a8e7d1a4e94dc6c6d3710d33acc441ee589b0da48c8364ce7b00de495ae7dfb55cc2c7bc3c7e6009fd4333deb3b56eda78b107b9a4ec111ca2548c5c58724c2e93f16bde3b88f9a8ad576b5c25a007781edfaaed1b2468ff00044963b218c0e31e59ae8d5aa6613a7a2a69ddcf3f811f4aea7eef356561b67b339c39bb47d3715b1b25969bda1ec20b5c247adebcd2e268ed19d985a5735527dd3db255a52b8dfb43bf515bab359983778237d8b782ca815c8c0ff621004b5c7f98a8ad57388393818da495e82eb3372ce3828ad1418e69103c96b144c8c2746ec582b877c4c20739f92d9d670f64e3ff005699f2555686063e90db88839efd3cd58d56cd1a9fc4c3dc0c7c8ad415688dd8458dfd4776f9807c88535339c70fa2acb9281636a309247b4716c92eeac3401277423d8732ab01b4c40ed497772ea033dd2d70c0ccbf11f2435d753fc1b4123dd661ed86c8f30a5e959c99fcc7c90d6269fd9ad1132e240ef0214f23c1966db1c4fba66721392258f2402729d3e5b54f67ba5fb012792205d55b2eac2e59c8e9510224ecd6777dd435e835e087467f97eead9d75d53a042beebaa0493e09948628c75a2e67b2703c3b70220c76cc13da8115dcc30e041e2b596db1d46efe4a86d30ec9c247667da155c8d11c6c859682742a07da88765b35e24ece4a2af4dc3dc396e42fecef00b8f13eb8aeb9a68c6145e52bc5b1ac3b7413df92905b89d863f3403dc04f89546cab84969d6738cf99dbe488656da72dcb4a46712d05747ddf6a80e6924e62384ff455163bb6d35bf774dc44c623937b89d4764ab0b2dd55e902e7e18711a1260e79181aad4a32a72a741637565bb2a225ce1f8786a7867b10b4ec7520186f8aeb5b504886f32bcf948e94829b508d9e29a6ddc1c4777d54619537333d334c7d9eac190d8f5c5673917145abaf8a755d45818f6bb1373eaea3bf4dab4b8c7b1abc18c77374ff00b979edd8c77ed34b48cce5a080616f286746b9d9ecdbe0e0174e36dbd99924832c1963ed9f5c94d44789086b39f7fbbe68ca4326f35a204b5249a9203277edb19530e0735c06460ce64a2ae86ff82e19e751a3fd3f4593bb9fef0de5a7915ad73cd3b317b632a9971cc28b7b0f48b7a5671b948697672591674aaae79379725dfef6563b29f23ff925035c6c80ed8d9235edcd0f5a8103313391dbb772cdb7a59546ca7c8ffe4a43d2ba863136991b6241e729880caf7562c5af0d3c1666f5e8e9d40cd5bbba54f130c646c99279ca12d3d257ba4e1678fd54712a9331168b0398ecc4ae3c08885796dbc5ce9ea33911f35595ad460f519ccfd573c5a35760d725dd45cf21e04921ac9cda1c76b84e627088d332afaeaa0fa4f33666388261ec6b58e034ea16ede484b92ef73c17ba99ccf570e448204c13901f9b64883392b775dad764fab5d8dcfaadc6183b5d0477e8bec7c6e34b8d36b679392572d32ca9dbe931e0bea69996bdc03daecb22264edd3727592f0a6faaca4d870c32f3ac388903b723e0b3f5ee0a0dc98233cce28e641525c94194743888324b7493b2769d02ef28da699852a66e996364e427bb6ca99b7731db003a10a929f4948cbd9891c4f7ec4ffef43be06f0eb1f0c97c6713d565a3ee66ec942da6e705a40cb24333a4e76b3feefa045d9afa7d57616502e3c1c4c7692321da54c4b650d1bb4b1b8e3477f5f9abfb2b3fc378da699f9152df14cb2ce4bc06bb58041ccce53b4c6796e4db00c6d701b58f1e0122a986ed0a83b5e384f84ab1a3a8e002a9b36ad1ff004c73c95b53dbdb0a808624b8d4901e5f6624bc0c8408d8dd06dde789cd6aefb01b60a6df89c09e72b2ef645523f3ba3bcf8ec5b4bf6cd8d94a9fe507d72595f8b2bed181c236725335e34c969197089dbeb6a9db70b27615ca99bb4650d66ef51bad44693cd6bdf7237713c0268b859198f0c96b19132464ff006b3bdd3eb8ae0b41273279ad79e8f3266171f7033e10a548648c8d5abb9cee650352b1394ebc56d5d7130025c1a00d49d8a898da4f7f5180b5ae8c476907568dc3795db83827c92d75e4ccb922917573595c29331138b089e1c3ba5135831cd2080e8e60ff00b4aaefedd61258c0318d1aecb17f09d2781fa4d7d7be5c5d3870bdb9104448dad70da3c97da48f1da4475acac63d98da1cc321ae70c45994c13a91e48bbbac8d6ba5b044920ebd9087ad4fdbe0731c0309eb03f80c131dfbd1776c329b9cd7e211d59d64988e199192d195d99f7beb6271c0e8c47381a49cc6dd1585d542d1697450663880e7980c6cfc4f3c366bc11949ad00b40924931e324f78569d02a6ea21ef64196b5e5bb1cd0487013b7acd20f0e257ccf95c2a14d793d3c7372bb2dee5e84e187da5e1eef8298c2c1daef79dda30f62bfb65b6cf66606973293468d10076e1689280bf7a4ac6321873224b8e8d046edaee0bcf2d6f1689717bb271c53abb2d66578e52a5a3b28df66b2f4bfecd69a2fa748bdc48743c3600227392e0446f8527475f2299f8b2e60fd165ac44370b19eece64eae3c4ee074e7d9a5ba3aad6fe57c72714849bec928d0eb3838c83f87abe24f942b6a3a2afb73d8cac41305cf184679974081bb6947335ee95b7d9113b0e52baa305250a602a33fe240d715461d93b3ea56dadb02b36481858067d87eab1f7dbdccaed7b4c1c20f6904fd93af6b73ea536bdceeb17eba6419a78a917a125b366c1b72d1263338f5eb25e6cd7ba0cbe3bc9d7b1595c9d2f6d2ff0ea5230320f666359cda76ef20fe1d37ea34c8d1bf608ca3b36ca998c035ef41dd978d1ae3151aac711aed2dfe26e4e6a3ab50738101d849040736244ed12227b42e8648ad0c1393610d692d634b9c6000493b80cd1946b34c3412760241eb61c8f58882579ff004bfa43ed1eea14a0b1825e48ea933a651ee98e032fe5b08a94922374acadbeba4751efc05b8180e40199cf2c7c78683c566ecf6ec03038c4120f17088e39ea212b557249206ed08307b464471f24351a350f5c3097ec78d63677c2f4f2f22e28e2b48e718e6ec22d96a712d0e696bc666446bc77abab3deb46ab436a10e7b720f6e4ff001c9dcd67ac973d4a9503ead4149939b9eecdd024b58d99263cc222df7759bfe5636b77bcc127f2f0d764f05ce3f31aed1d25c1a2da9b9d42a35cd782c7ce7b0f020ed98e48f6546b88708031179037c98f1cd63cb1d4fab8b1b5d9807ac438409075063c95b51b57546f8cf8f15ea8fc88cb670941c745a5b6d501a1a4e2c43091acc465e23bd6fee9bb810c0d7617618e3046d1da0725e5749ae73c39c70b5a66498188e9dc16cee87da03d951b8dc016124c8c4d904b65da8ef5e3f91cca7249748ebc717157ec36fdbb4b35eb378e9aebc167aeebbdf8df9000b847100c4f895bdbd6d2caa080d73a013a004f01275ed8586bc2fca94e594acb0e035aae33c3a8c107b712f1c92f0774dd16f42ed0d8dfa1465de3a8efe27f9954b6ae99d3631ae6d17beab980bdbee31af8189a5c649833a0ef56f725a0d4b3b1ee01ae78c440d0176640e19a46ac3b25e90b18fad45edc25edc064664364621c272e415bb3deee554fb335b9b5a013998daad298c815bbb66495a9241242987e93b0973235eb0f23f255f6b7ff00c330fe777835bf556bd21612013101c3c642ada54454a6c691385ef3cc339ae69fdacd79452bed275f844f79c878e7dc86a720c8445e8c6b1f81a00882e8dfa0f9f343af77c58546fd9e6e695bfe89db5fac1c643868f612c78e2085a9baba6d68a318ddedd87221c21edddd603ac3b413c5640314ec649037aef2e18cbf4728f2c91a9e91f4cd8e6459d981d526496c16308ce33225ce939448d78e56ed7c97341188e6d2e275ce4133b4139eb283bcda6a5a0b1a4c5301808db87de3fa8b910fbbcd300ba62462ec3b49d817cfe3e471e55fa67ae514e0d035ba9b710710439a730e707113b88f9ee46d1b56407926de364c9984462c8899cfb4fac93997591acadfcdff00a7f84e0e89fa460865087ce44968c882edc00cfb7d0cd5e155c40d74cc7d635445e41e1d0e04ec6cce834ee55bed1c7288e10bcd17a3b4b6c9ac15897531324546c6eca3e4b5f63b2b1ef6b5c0759d070756777667b965eebbbdd38b4ce46f9f92d0596efa81cd782eea383b5d709048f051b77a64d793d0aedbb6952682c635a742e8971fe774bbc51ce84ca466409765b04fafba95b62a8ed81bda7e8ba2462c1054eb70391ef54b7cd5682c69d808f21f22b526e71912e71cf4194e5a1d4f2dc83bf6e6a2e6179044660e6e827288dc4c766bb14945b2a923cdef82d00b86bb3b56e6e7661a0c68f8401e1f29584bc6c664e2072322018e017a05d8dff0d9eb6429054cd482dcd45d981c19ef3e70a103245d3f7574398e2d493b62485323d216c30facc190abba3d48bcb84e9a7aee08bbf6acb606933c820fa2ee38de049113967001ccf99faae4bd1a665af6b356a551c6b30b711307569ec70c8a1e91c4bd6ed3666b9a43faec23304823be566eddd12a4e9345c69bb5c3ef33b86a3b8f72f671fc951d3479a7c57d1926a2accfc21d53e01238bce4c1fa88e49d6fb9ad14737b0e1f8d9d66f7919b7bc047dcf771ab807e0071bccea730c6cfea3de176e5e78fd36e2fb31083c95a1746ae58873b53aceaaeedf73e3611073073d3e6afac96268c94b6d7358d2e74e0689300931f95a3324e400da57cdad1ecbb666ac975b8d001cdcc069d33ca176a59401a7665eb82d2d5aac6b600eb61710dda70b4388edcc054cec65a31d30d2739a6ec63b1c0819f11237aca36f6642f7a673c9521a6b5b7ad909246e548cb1bb600b2fb0ba27baace3291e1f75afb0599b021525d56231985aab0510d192dc4c48b8b9eae581d1204b78b77768f2856d85503489047bcd32dfbf03a1e053ead6acf106a601ba90c1cdc4977285d93d18a2dad2e630627b9ac6ef710df35496abf29416b18fad391c2d8667af59d0394a632c0c0670e277c4f25eee6e24a91edcf451c98a32b7cd94612636e40e591dfeb62b7bab3637f87d79257b59c9a6f3b709238119fc93eea1d41d90b2bb35e03098011548a1d4d4f55b324ee292e38aeaa0c77485b0c3234cf2ddea111d1dbb9949a2a678aa37393b0c1204e59e49b7f47b274c67037ed95634980b58d9680d68d499190d9a2f3db4cdbe82de5bb23bd71844ecd8857bda0c483b8c6aa50e1ae7dc0a59282b1cfd826d3a4d6830009ccc08ccedcb55c0ec977109d8aa04f4cc67aec4cb48c5c633038fd7b7b5263797af05d2361895400bacee7198eb34bdc3f9f513a18cf4dc8a7d0443069eb35c34e4668915caca7af63c5263d7f4418bbbd47d9683d903f78cbbd33d981ac70fb2622c06cf65cb4f0fb23a9538d89cda63bfc3c94f0233c954896330ae97849edc9718c5483b7a4f192e881b7d7af249c78aa012d6c96900ec23ba2103747eedbbfecac9ec55b757bae07639de69e4782c1baa9692858755230ad1092a14971fb0a4853297c825ac1bde35df061691a1a06703b4acbdeb38e8b48cf1824e80e634ec192bb167c59cf207e4b82d1a64afc249cc6fc884f6bc6c8e3ea531963c31999fe6faaeba9c6d3cfeea0086bc46a3bc7a94c6ba4ea390d544d13a1f0fa14e2d2379e6a8266cf05206f628d93e8fd54cd72d220808d9c8290109b20e8538334f5f25a0702e3980c64175edd08f5eb34e6bb3dc841869c27e129d881ed4f66cc8a0232d8f5926387af34461c93300dd9a0226b47aee49c14f823e490673f592a084b15358c10e703f1bbbb3fbabc3c478f8e4a9ea08aaf1c411dedfa84610468a567c946e09e1680f71c82498e49019ab4c3ebd268100073f5db9e79ecea85a5a5423373bb7fa6cc9679ed69b4c0d1acdc387d55eb0f5753c276ae4524796ceadd9942e183fd1479c69e29f247e199dc7eaa14eb18d1b4a760dc9a1a744e6f69402c196c5331b96a13183b54a1aaa20e6534f8dc171abb39ad108482774fcd46ea6e27e68923bbbfb78ae332ca5011d2a65a3bd4ac79f5e69c0a663244c0f3e08094195c0d7240466bb982a813da622606dd86782690ba5e9b3966440ddbd08276e54b692318d7dd1aeb938eee055c620465d99e4abef1f79a7811e4423e8a87ae94ca45395075a924d495051d8d9368aa488c218d13c738f0572598b4397adeaaeed7126ab81d6a7fa442b3f68e1a9dbbbeeb89a272c000133ebb539cd1dca21504089f0cfd77a90d491a9f5daa90ec21ad1696b0b43bf19c2d804e7c63453e2cc0939ceefa2587b900fa42731f4533428d8632f454ad9cb5d15404c0bae1c177b076e9df3cd38b7b9520d072483b8a6c94999ebcb5403c66324df6596d0a509ae39a0067e21a494fa751fb7846c531726093b7c100dc077ae9a66209f5c549a6698e33a7cd5042401969b7d1505e718411b08f98c91208f5af8a82d44398e1c09e51f64f0102d23a7605321683f2453ce8aae80f6a4b8dd17550535c8d380bb639ef3a718f30ad5ac13af9782afb9583d8326743a769e48fc5190061723448ea703224ae3b105df687d7f54e6976d12841a0b866a5634ed0902368e2a4670f592a80d20ce997afb223115107e7f65dc7c1521303d9c935c4c8c93054331a7a09f26754075a64ff0055d0ccbd15c610936a0d8807011cd71b5038482083a11f55c6ba7382b8d60021a00cf41967399f3541d238f8792ec7f5f4134931e5a2eb4840279e3daa3dbc76ed4f238fd146f0a818f263eca220e639a9036013ac6ed74dcb8e78dfdf280aab2ed1b8a28e7cd094843dc38faf346b36a8ba2b246a49a5d9a4b4401ba7f754ff0085be48f8ccfadcb892e46890ecec5d2924841aed0f629d9b7bfcd249540e9faa63759492541d4f1aa492024a4dc827060dc9248438cd9dfe693be4924806d2d9de93352924a83aed9d8a33f34925408a89c92480a87fef1dda3c91b4b549251159c292492d03ffd9, 'vi a alguien caerse, que se mejore', '2023-07-03 02:29:12'),
(2, 'Walas roice greice segundo', 'vi un techo que se encontraba en unas puperrimas condiciones', 'en el bloque c', 0xffd8ffe000104a46494600010100000100010000ffdb0084000a07081615151816151518181818181818181a191a18181a18181818191a181a18181c212e251c1e2b2118192638262b2f313535351a243b403b333f2e343531010c0c0c100f101812121834211821313434313434343134313131343431313431313434343f3434343131313134343f3f343f3f313434343f3131343f34343f34ffc000110800ca00fa03012200021101031101ffc4001c0000020203010100000000000000000000020300010405060708ffc400431000020200040305030a04020a03000000010200110312213104415105062261711381913242525392a1b1c1d1f0071623e1143315173443727382a2b3f162b2e2ffc40017010101010100000000000000000000000000010203ffc4001d110101010100030101010000000000000000011102122131415122ffda000c03010002110311003f00d82bdea447a54044e90848d1a008c55d2255a311bce04f6728dd8ad4731cfd6e32fce154205b0ef698c8801cd9755d3cc0e7532c83caa25f08856b6d3ad6a2fa4c74b0c5ea0e8758c1ee98f84da81974f2e55321135f5894b0c48552944251368a8371d9601c3814564c90c084b08505932c68590aca1404b30829e9177ac09964292e0907ac816c2a1281d61badf28230ab5854712c0b96a6eb5932ca0461cbc92d7d6426440012c887521128a292aa5ae90b3881a7c368c0625748e432346003acb0b054186b02c0968645d3943d264404107788d8e8c4f918fd35893c2d92411a8e733d5fe2f2ac3706cd697eff007cca407a5cc3f6040d76ada3f0cec351312fb6ac343575e52f071098bacc68afbfac6612d09a959b190a65dcc4c5e2d1080f888a4ec19d5493e409d664e1e20616083d08d41f4226e54c32a2e88875206eb348a10ae4025c2045c0648649e904ac000241bc60104ac0a61008f3844c5b3d9ab804beb2ea0aac20205112ee5d4bcb2811eb0b25ca12cc012b254bb92a06a32dcb5b828d180c8d095bac68a8b8690088e916af676b8cda2d987ef9ce7d10d51e52c40c26f5fc66276cf6baf0e97943b1d72960b4050b3a752a3d4ccc69b1bf587af4fc27149dfd57ca1304a906ded815cbff00c1f4d6eb7117c477f70cdaaf0ce4f46c4082c6f796e5c24ad97787bce305c61e132338d5c1b39450a0288167ee9aae0fbf18eeec9ec914d9a22ce80d1bbd056f3945419ac8a6ca2aae8e663c8ec37d6020657cd46faaaafdc735fc635bf1f8cac52f89c6abe2826dd94b13774a4556c2ba0004da2afb3c57019d6d14a2867516ece3358db6134abc6057ba62c2d8dad72d74cd5ce6760f1f6ecfa92c5472f9bd06ba7ba4b6b5cf2eb7b07bc4570db330c5443468b7b45d0923c5f2a8e9d7ce65707df9c07bcd878a9a6998212c74b50036e2c6fd6737dd9ca30dc15299d9b4719998b50a14a2afdfee995c4f764665c55cf68cb6b90015ad957bb3eb2f96337896ba7c0ef32313fd370056b6bb13cd6ec759be06c023507513ce30b8bfea3e5cd94d0d6cdd6fd34d869379dc9ed2e21d9f0f191b227895d96a9589a517a91a69ce5e7ab7eb3d7327c7580416109fcbdfcbe02a5289d1cc3962b12eb435322a23116e063fb4e841237fdf28e55f74c76c117a8fc631069436f8c0367e92d0194b874047d83016b2cc22b21950ba960890c1d6018a30abd228093340d52ac202554251d6468c51ef841652c3cb00a25d46fb47c4715839d0add120d1e8663af84fad2f6d77930b054a290f88c282a11e11b12c7973ae73cef1b8928ceaeace1f552ce438b1bdf3af8588fed6e01d3183146f975d4d0e640bd7df17daa158a906c8b0413668556bf198d759cb13b35cb315cb60f3d49d0680fad4c87a5623221cad5f45b4de981a63f7f94d7e1e395716495074049207a099bda2835bb0cc8af5a10d7cc56db6c66a915c576953784022a8861a839aeb5fc62d3b49b5dc2ef943100127aee660aa683a9d87c7796d59686baefd77967312f5d363c07120b12c280537cf7a1ef8e4ed342c15d1851000140e9b7a6bce69f0b9d7382b86cc6954b13c8024fdd33e32d5f3ea475984aab87994b16652410f9990863a83d68f5d2ac4c8e1f8ec7652b898d885401f28283beec41b71b6f7359c2e1e261610616acaca01f0da925abcc1d0cbe1711ddd4390c5c9cc4aa7304d9d372666fec74e7de56d709d8abae725a9b2592ab7b007ca8f28fe0f8be270f0fc0f41b1033b0b0e5828fe985af91a6fa8de733da1c33a36a481c88276e835d267f659404ba3b3b283f2db279eba9076927a87523d47b2bb7d3148460531350548d2c0bf0b73bd489b761e53ca786e26f0ce2bbec772c0d51a5a72b5cf91fd26f7b3fb5ce005071d459ff2f11892dd698edcb69d79ebfae1d73fc770c225c50eb30fb37b48e296b0832e520292df2af73b723b4cd737ca6b759b3092091d0c2c343d6501ac60d254565321b8762091089048a8525180260912da4b815524b32ae06b00f38401820cb00c3462f9c62c40be83f08e101820e2835e63a73f29003262380a49e42cfba4a4701deb38989e3186f82e17404d170b77594d5d79de9350e2f043663a85cc0eb66b5df6ebee9d371dde5c0e254a61e6675a750c8466a34dceec0bf8739a0e2f2b06c873aa901bc2343ade800235138f532bbf37d39ac7501c6fe7f1e536fc76196c218b472a008cd60ea5b4046f7e2df6f7cd5712833784e615cc56fe5325ace1a28bcdc88e858f9ebade9d66e7e317ed61e10f093cfe481e546ff7e70b195797d01ee3faccc7e11d14a11575777b8b3a7a5d7ba0e1f0ac41000208b3cbe063cb1a9cec616061dd8b1f190bb29344af23949162869a4cf4ecf719b416741af2e7ca278be19c502b57ade9a8aafca3cbd9e3fe5b3e1b852b82a4b3656c8c575acc736bd0e9f8c986dfd45ca280527d341331437b1c352ad5482811ae55a26ba5e9bcc1e133863e16d050272ed677fba62cf76ba7372480ed4e24bd2b5583bec28e83d368fe070b2e1bae740ef4a8d9cd6a68d15066af8c2c5ab29be437b9bae1b069b0505e9e26daed474e8188f8c4f89d7bb8ddf118784abc3e029f0230c4c45a39dd5068458aacd57666b3bc182b8d8e1b39a14111b2b12342c68d5ee34f4997c371c0363e3b907220c25d06b94166a1e6cc04d0f616397619d969450f092d988a009dc03aeb73727a73bf71d107c447c36c070b9393007369968f885e93d0bb3f1ce2612395a2ca091caf9d794f371c512b4d8630f52a2cb0cf5b0f11af3d4cebbb9ae470f90b3dab1f965588563628ae8474e91cd67a9fae81cd4ab8b65ad49969753a398ec4596d65e6918030281979a09c3e72c2420ae4a940c9a408441a30f34acb0358ca7461a5f5de1068e51984494a996840c608a06314cd03bf395a4a909a99479d76cf0383c3e3160ee5c82682d0018d017fa5ed34e529c55e671761a89b366a8fad8fed3d13b53b0b0b8a39999ac0cbe13555676e5bfdc2709de3e0fd862e5cc4a80194dea09f4153167b76e7a8c17519aa869a35d824ebaed293088aaca7c56a03026eae80deb4985898cc5b30cc3dd7aebce3b038a743987ca2342cb645f4bfdeb1962ecadc70d8d8a4e4015831360904017f1b83fe25037c9200cdf2b51601394e520d6dae934cfc530d3369419761b8d75f8c5e1e392c32d5926abaf28f1dfabe59f1bde0f8d66cc6d464ca74176753775a0d0687ce1f6ae287397567201144d667d800051fce62708c5863663e26cbaf56ae9e79a6676d712d84130eed8a155d0a84463ad73cc6cefb59eba4b3d93af40e15ea9002c41a35542802729e62c9d7ca656187605d70c95ae447de0cc45c63824a9ea5977f0ed7a1dfff0071389c7034db961640f08f4b92cbf8d4a7f1ee722ab295048b6208a0356d8ea348be0b8c184eef9589202ad5694493d2acd437ed3f69903228cb9ab56342aa21fb482d8f66b64566b2091e912dccc2f33eeb21f0ff00a791831068920d12cde221af4bb8dec0ece75462696c93ad1d36d7ca81f889a7c7e2d710286cab47416e6ceda80a7f19bde0132b20269517dab72f93a28cbcf5cdbf49af78e7eb75b2e26db28f6842210c55e99580141729fdf2b9d27761182333017a0196c52a8d54f2d0deda4e0cf6c101b18a025d8aa75d1484f76f7ebe73a4ee1f6936217b40818fca0492ec00b07a00069ea63989d58ed5ce61520b03480537fbff0028bd6fca6dccf4e7a485a0dd4bcc2691331e908aca3081f3845132e51820c02a92a55cacd03111aa1362283aa937e7157138ee6b4dff00099699a98987f448fdfac30d867e97df35285fe97dc2355dfafdc206d17d9fd23fbf743544fa67f7ee9ac25b991f084a5bca686c5f8742347d7dd397ef2777971422ab8ccecd6400468a5adb5eaa05f9cdc5b797df251bba1a4cd9ab2e3803dd5e243505214553017caf5553b83d261e3f05888e54a369cd9193351dfc5444f4dd7e88f8d7e517c461e75caca6bc8ea0f5125e5674f3403101d720197e70aad4f91a8be27812cab8accb608aca509df9a8a22b49db711d8398e6566141801e1e6742481afbc4c73d86e45644bd00f16c2b5dd4d4ce56e58e41015ce40a0ce86cf2008d34eb03b497dbbae5dfe682d66aecd0d4f52674987ddde20b3001140dbc560dea397e421bf76b1cfcb00d1f9b97ee06245b66341c4b60bae77b0402065b6bf11bd6c0e93170707048e846a15af5a1d4729d2af603f887b32281607420b6b42869b1dea52761bb05211aeba022bdd189b1cfe1f0b84c412ca013cb3000f4bfdef16fd980ed7e7a923e337dc47775d883ecc8144501e7b91a79fc63303b199053613904827463a7dabb8c3c9c870fc365c416a481ae9fa9136bc77134461a90c4e8c58b04034f4bda6eb1b84c42caeb84eb9760eba7c00d7dfd7dd363d85d8385c4676c428a41ca45b2b1b506f5db98a97ed3723914c37c47cb848ac8b4a09553ad7f6d277ddd7e0ce0a146c9b0d57422f522abadfc04ceecfeec6160b87464256e81c43975144e5a9bb5523e6617dbfed2c8c5ac463437be700250bbb3f099c6be8e1fdb1158a0fd043ff58e52a109aef1c17a489c6a8d322e9d0d8f8c7af183e82cd32554122650e2d7e82fc7fb4a3c72fd01fbf7423172cbcb3287690fabfbc7e920ed41f43ef1fa40c502154c8ff490fa1fbf84bff490fa03eefd2068d8c5b426304c34515ada4ce794b71a45135b6b321aef7a56bd6e5a3d41bb8c580e47b8cb880d0834d078962243420f01aa34851231258c480d45abf337f701f94b262f34acc60304a55a152b3481e05980de90b34130138ada4d60e1d8336be1602fcc8cdcfde7e3368c22d96f49935af7cab47216dc9f136ca2c9ab17cb4f39903017e8ff00dc631f0e9d49d8aba7bce561f72997c3fc91d4687d54d1fc2314b3c221f99ff71fd244e0935f055efa9fd264d435d23226b13b3785ca944102f453672d1374c77077996d842166825a0a1f67fbb9470c79fc6597945e691470c79cbf663a9f89959ee517844ca7a9f89928fd26f89825a5668052a0a936790d879f53fbe92c9850629ad624ed1eeb7158932051ee3434c67d21a3c29e1a186890d08180f0d2ee2734b0d341cad0834486961a03734bcd159a16680ccd2ae0e6824c06132b340b92e0322ea40d281803c51f012375f10ffa75afb8cd2f0dde6c02e52dc167140a9d9a80248e44ebef9be659a9e1bb1f09715b102d38b5a1a2956f10254684ea45f94cdd258db4b062c0ada5669a0c2d28b402d04dc0617805fca016839a1045e55c1632668044c9706e55c232251942430aa630489660b180971af944bb8526f68f79a0edf77ca5518ab7223acc558dc0e313e9afda11c98a0ec41e5a1b9e54d88cd999985ae86cf889268d75ebe5a9995c376c3a1054d5117a7b8ebd39cbab8f4e0d0c34e7bb1fb695f2a3de737af868d7a7e626ebda4ba9661e58f597ed227da481c1e72072e24606880fd610680ecd2ee20b4bcf01d7058c5e7959a10cb92e28bc99a037318bcf4faf35ff00ea7ffd4acf158afaa9f3fc41fed0acacd019a017897680f2f2862cc6f680cb558d1905e09789065e684333c97177216a80c920c967ce06461e202348666ab0dc8d44cfc3e2011e7d2681980d0c9804c0079a0ed516de937cc673bda82cb01e6bfbf8cc74b1cfe3f00ad86ce8352e4d68741cfcb7fc661b61a5135cd6bd3e703e93748f93c3e8260be0000281e1676727a28034bfdef22c08c55445625b36fa6e05529be7ff00a8f7ef563a5688c08045820fc41fca6a388c70cad6bcf6e841d07c0d4c47c41940e84fc0d7f79642d74abdf37e782a7d1c8fca09ef61aff240f473a0f2f0e9398cd0862695c8cd626bb1c7ef614d061de8377ebe826770bde62ec0141545890e3455d4d02066357a0d6710eeb9509276aebb18671542a5d9a6661f1e733edaf4f4be1bb451f63f38aebd47a4cccd3cdf82c619465661a8b02c106c9367ad69e86755d89c5120a92c4a92492d6059b02e4952c6fb3c99e2ae4b9a4116945a0930498d0dcd2851201ea3e3cbef8a2d289bde2873e868ee2298dcbc565f9b75e7ac566812a183e702e40601d79c3062734bb80c2e2eb9c60504452d6f1c860c455a933f91fbbf59644acfe508d7f0b8b6d935f23466dd384eadaf94ea784eeb6162ae1e30250ba231500100b286a04faccdfe544fac6f80970d710da73b824ceccf7353eb5becacafe4b4fad6fb2b1838a63341c7a788ff00c57f9cf53fe4a4fad6fb2b3178afe1f613ef8ce0f50ab25956578e71ce545f3d4c5e2a93841472403de75e7ea27aaf11fc29c27df89c51a568a91a9fc2fc202bfc4626f7f2539003f293c692bc48f0b882c94d08a61a6be63ce61e2f0ccbad69b5cf7cc7fe196130a3c4620f3ca9a7a4c7c1fe13e02b066e2311c8db32a50f3a025929b1e149c239d918fb8c31c0bd5e46af4fca7d03feaeb0febdfecac8dfc3ac23be3bfd958ff49e9f3ce5f9a41df9fe933178517546fd188fb84f68ff0054b819f30e23100fa2170f2d1df95f3de6c307f86f808811715e80a0485276abb3ce5b2aec7851e1dd41d0f5b0180adb5d3d7e332f8177f996a41175d341afc27b7f05fc3fc3c34545c77a5142d563f03b908828633ee4de55dcc9e34f279eaf68a57335a1a1cfa8f2f38dff00169d77f233d0ff0093d3eb9fe0b04f7353eb9fe0b1e34d701edd7a9f837e904710a76bfb2dfa4f41fe4c4d7faadb55e55917b9883fdf3fd958f1a6bce1f8e51f35cfa61b9fca57f8c5df2b8f547fd27a4ff26a7d73fd9595fc989f5cff00656329ae000db4dc5fc64cb3d04773907fbd6fb2b2ff0093d3eb5becac78d4d79e54a227a19ee727d6b7d9589c4ee3e19d7dab03ff000ac78d5d7044d4126ccef7f9130feb9fecaca1dc3c3fae7fb2b1e34d710a6350ced077153eb9fecac21dc84fae7fb2b2e52d71b2b2ced477293eb9fecac9fc949f5cff006564ca9ade760ffb2f0fff00270bff001acd84d7f60ffb2f0fff00270bff001acd84da24924902492490249249031f8ccd91b21a6a394d06a35a1ca48bf49cd62e1718336261e70ec8aa430c239884c6f11f08a21b269a0f16a0ceb0c82072bc52712ecec0e3a02182aa8c21e15c446160a9f115cd5aeb54664610e2d9c8677507100d130c65c3b7d558d8625425d8d09355b4e8a5081cbe20e2ec3038859538851e1c20aec461b6192b974029c0d77516483a8f129c53a62a30720e1b8c2b5c3f19b6d71e80ca7e4d04ab075d741d5ca81a5c4c5c7f66808c40f9bfaa50216af1ff0096082a57305dc5e522f59865b8d2c402c05b963970a94818a51534d54d61d93675dc6b5d3c90359c00c7ca43b7883ad332af8b0e919852500757507950bbe69e2f0cfb6639311d4e0b0201390b02ac8aa2c00c69b5f3d4ed3722430393e27b3b1d02ae1666c4386431d722337b467386e5bc2d6c14020e8176d4862f0f8c1832235673ec93109caaa461e62cc1ad0e65c42346d1b6e53a89207203038d04e6507fabed3c2ed88aedecf0405248529859bda1d2e8a8d08f941fe1f8a50c007a2cacd6335b2fb460806716a5b202c08b142b7aeca481a6ecac3c418b88594d30cc588a218b13914e621940d8d0d86f66b752a5c09249240924924092492409249240ffd9, 'yo que me fijo en detalles antes de entrar a cualquier aula, no pude evitar mirar tan horripilante obra que genero la mala administracion de esta...institución', '2023-07-03 02:31:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indices de la tabla `extintorimagenes`
--
ALTER TABLE `extintorimagenes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

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
-- AUTO_INCREMENT de la tabla `extintorimagenes`
--
ALTER TABLE `extintorimagenes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
