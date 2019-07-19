 -- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 08, 2018 at 08:39 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `10en8codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficios`
--

CREATE TABLE `beneficios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `beneficios`
--

INSERT INTO `beneficios` (`id`, `nombre`, `telefono`, `direccion`, `link`, `filename`) VALUES
(1, 'SoyUnBeneficio', '42424242424', 'lacalle rota 5444', 'http://wwww.eselugar.co', '60d3b6_LISA-FLORIDA.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `categoria_eventos`
--

CREATE TABLE `categoria_eventos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categoria_eventos`
--

INSERT INTO `categoria_eventos` (`id`, `nombre`, `slug`) VALUES
(3, 'CAtEventoUnoE', 'cateventounoe'),
(4, 'catEvento2', 'catevento2'),
(5, 'Una categoria de evento adcional', 'una-categoria-de-evento-adcional');

-- --------------------------------------------------------

--
-- Table structure for table `categoria_notas`
--

CREATE TABLE `categoria_notas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `categoria_notas`
--

INSERT INTO `categoria_notas` (`id`, `nombre`, `slug`) VALUES
(1, 'Categoria Uno', 'categoria-uno');

-- --------------------------------------------------------

--
-- Table structure for table `citas`
--

CREATE TABLE `citas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `evento_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `cita` int(11) NOT NULL,
  `clasificacion_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `citas`
--

INSERT INTO `citas` (`id`, `evento_id`, `usuario_id`, `cita`, `clasificacion_id`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 0, 0, '2018-02-03 04:02:48', '2018-02-03 01:02:48'),
(2, 2, 5, 0, 0, '2018-02-03 04:02:48', '2018-02-03 01:02:48'),
(3, 2, 5, 1, 33, '2018-02-03 04:02:48', '2018-02-03 01:02:48'),
(4, 2, 5, 2, 0, '2018-02-03 04:02:48', '2018-02-03 01:02:48'),
(5, 2, 5, 3, 55, '2018-02-03 04:02:48', '2018-02-03 01:02:48'),
(6, 2, 5, 1, 2, '2018-02-03 04:02:57', '2018-02-03 01:02:57'),
(7, 2, 5, 2, 3, '2018-02-03 04:02:57', '2018-02-03 01:02:57'),
(8, 2, 5, 3, 4, '2018-02-03 04:02:57', '2018-02-03 01:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('21f63640f9c90834053fb8e04a3276ed8d3a88ac', '127.0.0.1', 1523055957, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333035353935373b6572726f727c733a34363a224e656365736974617320696e67726573617220636f6e20747520656d61696c207920636f6e7472617365c3b1612e223b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d),
('429fabb76c9040c2e9ecdedf776281f9a96f7d2c', '127.0.0.1', 1523056702, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333035363635373b757365725f69647c733a323a223137223b757365725f656d61696c7c733a31393a2268756265726d616e6e40676d61696c2e636f6d223b757365725f6e69636b6e616d657c733a31373a2268756265726d616e6e342d656469746564223b757365725f7365786f7c733a313a2231223b),
('dbf08a8c3a9f5f3ae853a551bad0782ee3eab56f', '127.0.0.1', 1523057508, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333035373238313b757365725f69647c733a323a223137223b757365725f656d61696c7c733a31393a2268756265726d616e6e40676d61696c2e636f6d223b757365725f6e69636b6e616d657c733a31373a2268756265726d616e6e342d656469746564223b757365725f7365786f7c733a313a2231223b6c6f676765645f696e7c613a323a7b733a323a226964223b733a313a2231223b733a353a22656d61696c223b733a31353a2261646d696e40656d61696c2e636f6d223b7d),
('3d03c1426392e3c75cc836969abb1dcd2aeabf09', '127.0.0.1', 1523057742, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333035373631393b757365725f69647c733a323a223137223b757365725f656d61696c7c733a31393a2268756265726d616e6e40676d61696c2e636f6d223b757365725f6e69636b6e616d657c733a31373a2268756265726d616e6e342d656469746564223b757365725f7365786f7c733a313a2231223b6c6f676765645f696e7c613a323a7b733a323a226964223b733a313a2231223b733a353a22656d61696c223b733a31353a2261646d696e40656d61696c2e636f6d223b7d),
('1568ce3f36d7779142dca23400169075561962c8', '127.0.0.1', 1523058779, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333035383736333b757365725f69647c733a323a223137223b757365725f656d61696c7c733a31393a2268756265726d616e6e40676d61696c2e636f6d223b757365725f6e69636b6e616d657c733a31373a2268756265726d616e6e342d656469746564223b757365725f7365786f7c733a313a2231223b6c6f676765645f696e7c613a323a7b733a323a226964223b733a313a2231223b733a353a22656d61696c223b733a31353a2261646d696e40656d61696c2e636f6d223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(20) NOT NULL,
  `lugar` varchar(150) NOT NULL,
  `precio` text NOT NULL,
  `precio_hombres` int(10) NOT NULL,
  `edad_minima` int(2) NOT NULL,
  `edad_maxima` int(2) NOT NULL,
  `edad_minina_hombre` int(2) NOT NULL,
  `edad_maxima_hombre` int(2) NOT NULL,
  `estado_hombres` int(1) NOT NULL,
  `estado_mujeres` int(1) NOT NULL,
  `coincidencias_habilitadas` int(2) NOT NULL,
  `tipo_evento` int(1) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `duracion_session` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `categoria_id`, `fecha`, `hora`, `lugar`, `precio`, `precio_hombres`, `edad_minima`, `edad_maxima`, `edad_minina_hombre`, `edad_maxima_hombre`, `estado_hombres`, `estado_mujeres`, `coincidencias_habilitadas`, `tipo_evento`, `localidad`, `duracion_session`, `created_at`, `updated_at`) VALUES
(2, 4, '2017-03-03', '22:40', '1', '35', 49, 24, 54, 54, 67, 2, 2, 4, 4, 'Pergamino', 12, '2017-12-10 03:41:28', '0000-00-00 00:00:00'),
(3, 5, '2017-10-12', '22:15', '1', '99.90', 100, 21, 78, 40, 55, 0, 0, 1, 3, 'Junin', 10, '2017-12-10 03:59:00', '0000-00-00 00:00:00'),
(4, 4, '2018-02-17', '7:55', '1', '100', 120, 20, 90, 20, 98, 0, 0, 0, 2, 'Lujan de cullio', 10, '2018-02-13 15:02:37', '2018-02-13 12:02:37'),
(5, 4, '2018-05-05', '12:30', '8', '100', 120, 18, 99, 19, 99, 1, 1, 0, 5, 'porahi', 12, '2018-04-06 11:04:42', '2018-04-06 08:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `eventos_tipos`
--

CREATE TABLE `eventos_tipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `eventos_tipos`
--

INSERT INTO `eventos_tipos` (`id`, `nombre`, `created_at`) VALUES
(2, 'Tipo ese', '2017-12-09 21:59:02'),
(3, 'Y tipo bart', '2017-12-09 21:59:12'),
(4, 'Tipo Nah', '2017-12-09 22:01:55'),
(5, 'Evento Toyota', '2017-12-09 22:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `imagenes_lugares`
--

CREATE TABLE `imagenes_lugares` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lugar_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `imagenes_lugares`
--

INSERT INTO `imagenes_lugares` (`id`, `lugar_id`, `filename`) VALUES
(1, 1, 'd8f077_Screen-Shot-2017-03-29-at-16.38.11.png');

-- --------------------------------------------------------

--
-- Table structure for table `imagenes_notas`
--

CREATE TABLE `imagenes_notas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nota_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `imagenes_notas`
--

INSERT INTO `imagenes_notas` (`id`, `nota_id`, `filename`) VALUES
(1, 1, '8a1e4a_Screen-Shot-2017-11-02-at-17.49.20.png');

-- --------------------------------------------------------

--
-- Table structure for table `imagenes_usuarios`
--

CREATE TABLE `imagenes_usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `avatar` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;




--
-- Dumping data for table `imagenes_usuarios`
--

INSERT INTO `imagenes_usuarios` (`id`, `usuario_id`, `filename`, `avatar`) VALUES
(1, 1, '01eb70_shocked.jpg', NULL),
(3, 2, '17e3e5_DBBra0MXcAA2X2A.jpg', NULL),
(4, 2, 'e76cce_sarcasm_for_dummies_by_poisonheart555.jpg', NULL),
(5, 3, '4013b9_PbbFu7V0.jpg', NULL),
(6, 5, '92833f_images.jpeg', NULL),
(7, 5, '5a27ca_C_kvRZjWAAErssS.jpg', NULL),
(8, 5, '4636bd_cuadro.jpg', NULL),
(15, 17, 'ea15cb_WWW.YTS.AG.jpg', 0),
(16, 17, 'c56af2_Screen-Shot-2018-01-25-at-09.50.02.png', 0),
(17, 17, 'a87d1b_Screen-Shot-2018-01-29-at-19.25.57.png', 0),
(18, 17, 'cd2ea8_complicado.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lugares`
--

CREATE TABLE `lugares` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `visible` int(1) NOT NULL,
  `beneficio_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `lugares`
--

INSERT INTO `lugares` (`id`, `nombre`, `direccion`, `telefono`, `link`, `visible`, `beneficio_id`, `filename`) VALUES
(1, 'Un lugar cualquiera', 'Avenida de mayo 334', '44444444', 'http://www.algunaurl.com', 1, 1, 'e41213_Screen-Shot-2018-03-08-at-15.05.33.png'),
(2, 'Lugar sin benefico', 'ladireccion 8787', '342424222', 'http://link.com', 1, 0, 'e41213_Screen-Shot-2018-03-08-at-15.05.33.png'),
(3, 'La Baladora de rodriguez', 'Ruta 8 Km 433', '082394729384792837492347444444', 'labaila.com', 1, 1, 'e41213_Screen-Shot-2018-03-08-at-15.05.33.png'),
(4, 'ElLUgarDeporahi', 'la calle 4', '23434342323', 'www.ellugardeporahi.com', 1, 0, 'e41213_Screen-Shot-2018-03-08-at-15.05.33.png'),
(5, 'demo com logo', 'ladire 234', '34343544545', 'ellink.com', 1, 0, 'e41213_Screen-Shot-2018-03-08-at-15.05.33.png'),
(6, 'demo com logo', 'ladire 234', '34343544545', 'ellink.com', 1, 0, 'e41213_Screen-Shot-2018-03-08-at-15.05.33.png'),
(7, 'demo com logo', 'ladire 234', '34343544545', 'ellink.com', 1, 0, '8c58b6_mimimim.jpg'),
(8, 'asdasd', 'asdasd', '23234', 'asdasdasd', 1, 0, '99102f_Photo-on-7-21-17-at-13.07.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(16);

-- --------------------------------------------------------

--
-- Table structure for table `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `notas`
--

INSERT INTO `notas` (`id`, `titulo`, `categoria_id`, `descripcion`, `fecha_desde`, `fecha_hasta`) VALUES
(1, 'Just kidding', 1, 'la nota es e prueba', '1927-01-01', '1927-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(2) NOT NULL,
  `modulo_id` int(11) NOT NULL,
  `view` int(1) NOT NULL,
  `build` int(1) NOT NULL,
  `modify` int(1) NOT NULL,
  `destroy` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `permisos`
--

INSERT INTO `permisos` (`id`, `role_id`, `modulo_id`, `view`, `build`, `modify`, `destroy`) VALUES
(1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registros`
--

CREATE TABLE `registros` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `evento_id` int(11) NOT NULL,
  `pago` int(1) NOT NULL,
  `neto` int(10) NOT NULL,
  `comision` int(10) NOT NULL,
  `asistio` int(1) NOT NULL,
  `confirmado` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `role_id` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`id`, `email`, `password`, `salt`, `role_id`) VALUES
(1, 'admin@email.com', 'password', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(80) NOT NULL,
  `email` varchar(120) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `dni` varchar(25) NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `nacimiento` varchar(80) NOT NULL,
  `edad` int(10) NOT NULL,
  `telcontacto` varchar(40) NOT NULL,
  `barrio` varchar(100) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `piso` varchar(20) NOT NULL,
  `depto` varchar(20) NOT NULL,
  `conocio` varchar(100) NOT NULL,
  `profesion` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `fuma` int(1) NOT NULL,
  `toma` int(1) NOT NULL,
  `descripcion` text NOT NULL,
  `bio` text NOT NULL,
  `telcelular` varchar(80) NOT NULL,
  `estado_civil` int(1) NOT NULL,
  `educacion` int(1) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `zodiaco` varchar(20) NOT NULL,
  `busco` int(2) NOT NULL,
  `ocupacion` varchar(120) NOT NULL,
  `celular_cia` varchar(80) NOT NULL,
  `tel_citas` varchar(80) NOT NULL,
  `validado` int(1) NOT NULL,
  `hijos` varchar(80) NOT NULL,
  `codigo_verificacion` varchar(25) NOT NULL,
  `negocios` varchar(180) NOT NULL,
  `cod_postal` varchar(10) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `foto_main` varchar(255) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `activo` int(1) NOT NULL,
  `estatura` int(3) NOT NULL,
  `peso` int(3) NOT NULL,
  `contextura_fisica` int(11) NOT NULL,
  `color_pelo` int(11) NOT NULL,
  `color_ojos` int(11) NOT NULL,
  `convivencia` varchar(100) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `myspace` varchar(255) NOT NULL,
  `badoo` varchar(255) NOT NULL,
  `msn` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `whatsapp` varchar(120) NOT NULL,
  `google` varchar(255) NOT NULL,
  `tipo_busuqeda` varchar(255) NOT NULL,
  `completa_signin` varchar(255) NOT NULL,
  `claves_erroneas` int(10) NOT NULL,
  `id_paises` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nickname`, `password`, `salt`, `email`, `apellido`, `nombre`, `dni`, `sexo`, `nacimiento`, `edad`, `telcontacto`, `barrio`, `calle`, `numero`, `piso`, `depto`, `conocio`, `profesion`, `localidad`, `fuma`, `toma`, `descripcion`, `bio`, `telcelular`, `estado_civil`, `educacion`, `provincia`, `zodiaco`, `busco`, `ocupacion`, `celular_cia`, `tel_citas`, `validado`, `hijos`, `codigo_verificacion`, `negocios`, `cod_postal`, `religion`, `foto_main`, `nacionalidad`, `activo`, `estatura`, `peso`, `contextura_fisica`, `color_pelo`, `color_ojos`, `convivencia`, `facebook`, `twitter`, `linkedin`, `youtube`, `myspace`, `badoo`, `msn`, `skype`, `whatsapp`, `google`, `tipo_busuqeda`, `completa_signin`, `claves_erroneas`, `id_paises`, `score`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Elniko', 'password', '$2y$10$iKusgtPDSPuzPh34AnjkHev0quiH2IdjeqhJXApKMW/o5.KcvnswW', 'email@mail.com', 'elapellido', 'elnombre', '2355555555', 0, '2016-12-12', 21, '123123123', 'porabi', 'lacalle 123', '123', '3', '123', 'si', 'peluquero', 'Baires', 1, 1, 'la descripción de un usuario', '', '15 132233333', 0, 0, '2', '4', 0, 'esa ocupación', '', '', 0, '0', '', '', '', '', '', 'uruguayo', 0, 198, 78, 1, 1, 1, '0', '', '', '', '', '', '', '', '', '', '', 'girls', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Elniko', 'password', '$2y$10$iKusgtPDSPuzPh34AnjkHev0quiH2IdjeqhJXApKMW/o5.KcvnswW', 'email@mail.com', 'elapellido', 'elnombre', '2355555555', 0, '2016-12-12', 21, '123123123', 'porabi', 'lacalle 123', '123', '3', '123', 'si', 'peluquero', 'Baires', 1, 1, 'la descripción de un usuario', '', '15 132233333', 0, 0, '2', '4', 0, 'esa ocupación', '', '', 0, '0', '', '', '', '', '', 'uruguayo', 0, 198, 78, 1, 1, 1, '0', '', '', '', '', '', '', '', '', '', '', 'boys', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'hubermann2', 'plokij', '$2y$10$iMI3DZGMhKR9edhU4QacZOkoYlM77Q28/VN3m9kT6iJ.UQVRF/ICO', 'hubermann2@gmail.com', 'aa', 'Gabriel', '', 0, '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', 0, '', '', '', 0, '0', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '0', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'huberto', '2503e6b53316804268b43fcce4b5f43857836af562fed332eac58e7691724f398eb4d96e5b58756328e236d988d8fdfce51332b70937f9e9879e10702afb9bc4', '279ce99a7fbc5ba62dff9c8ae044f4b5', 'hubermann-@gmail.com', 'aa', 'gabriel', '', 0, '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', 0, '', '', '', 0, '0', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '0', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'huberto2', '9ba872f3f2121a63447537a45463b07c904101fcc9084f0de84b30428ccc59880e124dab5115f7a8d265a8576a2e3d9964d8ff2ec42656fb0d6ae433877f2251', '9d014ab588a82e7922c3d74bc0c27ae7', 'hubermann0@gmail.com', 'aa', 'otro huberto', '', 0, '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', 0, '', '', '', 0, '0', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '0', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'pepe', 'a13308038b4b45a6dfc035b806338bc9fe72725c25428b23f7b6184fd8190046e0afbde1808fdb026b3ea18f8ee053bbf5bcca816b888ae880af3445f49dc7f0', 'fc1f398b9cc684354eeb2a0c8e629f0a', 'hubermann3@gmail.com', 'aa', 'elgato', '', 0, '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', 0, '', '', '', 0, '0', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '0', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'jil', '18bf1983c025222917de525a10384cc11d761d6fb203a30dcd7fd68404a4834775e9f2dc0503332aa5657777de5295553a1ce2b37270a6ab5f70c14a12ec61e3', '6627223ef1393728f43ee7b4166746c9', 'huber@mail.com', 'aa', 'jilibert', '', 0, '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', 0, '', '', '', 0, '0', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '0', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'peresl', 'f3ff3f34c2b819deed192c75fc6b745a73a880c7f2a1eac8952c573fb1a980a534677d9660da22021891e800066b7596f5080b862334352337a66d41ae428508', 'c3544ce9c83038ac39ae920231bc100d', 'luz@perez.com', 'aa', 'luz', '', 0, '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', 0, '', '', '', 0, '0', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '0', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'emailusermailcom', 'a9d0c4de87a50f8d0254703470acc205a08f8775e18c7f9156eb0f959a98d5da55c08579cdd67a2855412252e298769a88b781bcd573f63dc91ef4dbcfdf15e3', '9734d3ff1b9506ddc53e364d8c173f56', 'user@mail.com', 'aa', 'conplokij', '', 0, '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', 0, '', '', '', 0, '0', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '0', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'aa', '7be9dd29695103c002c8055afaf0591d8cf4e530a64bd26232b1083aacc1a283fba6544fc0a962dd8b852bdc310a569fe11688448c1956e1dd13846b44fc1c60', 'af1f9046a16042ad57e67f15a877fb02', 'aa@mail.com', 'aa', 'aa', '', 0, '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', 0, '', '', '', 0, '0', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '0', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'bb', 'f6739e110ed7d9d3b347674e8e090d8e8e069db726eb53a82f5aa1a8c1b7d13bba417e74680af358d6de5a316e1c2092dd0923ef2ae481e5f9e1ac74361df17b', '7e485af7410041d880b9cc761b9b475c', 'bb@mail.com', 'aa', 'bb', '', 0, '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', 0, '', '', '', 0, '0', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '0', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'hub3rto', '593bc923d0cc74fd32cacf97c89babe9fb0a919a5b5fa5db1282d5920a3f8f3181293392d643d9388f03e54789e3f53fac41a01e0169fbfae77f4a1ec1ca78f1', 'f2162fb19fb1d95292e7ed065959b99f', 'hubermann4@gmail.com', 'aa', 'Gabriel', '', 0, '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', 0, '', '', '', 0, '0', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '0', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'hubermann4-edited', '1dadd046fdbd8092b6b4bed180088db763b1a044372f295d50bbf83725699429b87f1064ead12cf1ac9dd30f3916fe44bc250f1ec7c501d476e0b0b90e5ea67e', 'f131a02cb269409c0541696d6a36eda2', 'hubermann@gmail.com', 'Hubermann Hernandezmm', 'Gabriel Adolfog', '', 1, '', 0, '', '', '', '', '', '', '', 'soy naranjero de chascomus', '', 1, 1, '', 'Soy de river y tengo todas las vacunas', '', 1, 0, '', '', 1, '', '', '', 0, 'tres', '', '', '', '', '', '', 0, 2, 5, 3, 1, 1, 'con el gato', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '2018-04-05 23:35:36', '2018-04-05 20:35:36'),
(18, 'fakeuseruno', '5ea4e71d936bc7bdbb99f1ed34825c9238c254a2c39cca8619e85f0e9f70175f2d55f38c471d9700402c9fb03a5872f9a37f6f90b05a7858f542e3ec89e7d550', '0bbbd368835f642a9fb31ad9be3f71a6', 'fake@uno.com', 'usuario', 'Fake ', '', 0, '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'dosfakeuser', 'd4e18383f0482f411d0c871416363d0d3ef43ca8aebc777f26c6262371832c64a41aac93ab0104aa2a8d2db57bbd370621d1019e657c6e394fd5203aec0491bf', '15317869365c59c9ea59c352f192eb1a', 'fake2@dos.com', 'dosfake', 'fakedos', '', 0, '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_eventos`
--

CREATE TABLE `usuarios_eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `evento_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `feedback_payment` text NOT NULL,
  `observaciones` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `usuarios_eventos`
--

INSERT INTO `usuarios_eventos` (`id`, `usuario_id`, `evento_id`, `status`, `feedback_payment`, `observaciones`, `created_at`, `updated_at`) VALUES
(32, 17, 3, 4, '', '', '2018-04-05 10:04:38', '2018-04-05 10:04:38'),
(33, 17, 2, 1, '', '', '2018-04-05 11:04:48', '2018-04-05 11:04:48'),
(43, 17, 5, 5, '', '', '2018-04-06 08:04:58', '2018-04-06 08:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_eventos_preferidos`
--

CREATE TABLE `usuario_eventos_preferidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `evento_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `usuario_eventos_preferidos`
--

INSERT INTO `usuario_eventos_preferidos` (`id`, `user_id`, `evento_id`) VALUES
(25, 17, 4),
(26, 17, 3);

-- --------------------------------------------------------

--
-- Table structure for table `usuario_tipos_relacion`
--

CREATE TABLE `usuario_tipos_relacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tipo_relacion_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `usuario_tipos_relacion`
--

INSERT INTO `usuario_tipos_relacion` (`id`, `user_id`, `tipo_relacion_id`) VALUES
(3, 18, 2),
(4, 18, 3),
(69, 17, 1),
(70, 17, 2),
(71, 17, 3);
