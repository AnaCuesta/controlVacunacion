-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2016 a las 19:47:16
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controlvacunacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autoidetnica`
--

CREATE TABLE `autoidetnica` (
  `CODAUTOIDETNICA` int(11) NOT NULL,
  `AUTOIDETNICA` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='autoidentificación étnica';

--
-- Volcado de datos para la tabla `autoidetnica`
--

INSERT INTO `autoidetnica` (`CODAUTOIDETNICA`, `AUTOIDETNICA`) VALUES
(1, 'Indígena'),
(2, 'Afro ecuatoriano/ Afro descendiente'),
(3, 'Negro/a'),
(4, 'Mulato/ a'),
(5, 'Montubio/a'),
(6, 'Mestizo/a'),
(7, 'Blanco/a'),
(8, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canton`
--

CREATE TABLE `canton` (
  `CODCANTON` varchar(11) NOT NULL,
  `CANTON` varchar(30) NOT NULL,
  `CODPROVINCIA` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `canton`
--

INSERT INTO `canton` (`CODCANTON`, `CANTON`, `CODPROVINCIA`) VALUES
('01', 'Esmeraldas', '08'),
('02', 'Eloy Alfaro', '08'),
('03', 'Muisne', '08'),
('04', 'Quinindé', '08'),
('05', 'San Lorenzo', '08'),
('06', 'Atacames', '08'),
('07', 'Rioverde', '08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadano`
--

CREATE TABLE `ciudadano` (
  `N_HISTCLINIC` varchar(10) NOT NULL,
  `CEDULA` varchar(10) NOT NULL,
  `APELLIDOS` varchar(30) NOT NULL,
  `NOMBRES` varchar(30) NOT NULL,
  `CODSEXO` int(11) NOT NULL,
  `CODEDAD` int(11) NOT NULL,
  `CODNACIONALIDAD` int(11) NOT NULL,
  `CODAUTOIDETNICA` int(11) NOT NULL,
  `CODLUGARRESIDE` int(11) NOT NULL,
  `CODTARCONTVAC` int(11) DEFAULT NULL,
  `CODPROVINCIA` int(11) NOT NULL,
  `CODCANTON` int(11) NOT NULL,
  `CODPARROQUIA` int(11) NOT NULL,
  `CODLOCALIDAD` int(11) NOT NULL,
  `DIRCIUD` varchar(120) NOT NULL,
  `LONGITUD` varchar(20) NOT NULL,
  `LAT` varchar(20) NOT NULL,
  `TELFCIUD` varchar(25) NOT NULL,
  `CORREOCIUD` varchar(120) NOT NULL,
  `SNPERTENECEUO` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadanoregd`
--

CREATE TABLE `ciudadanoregd` (
  `CODREGISTRODIARIO` int(11) NOT NULL,
  `N_HISTCLINIC` varchar(10) NOT NULL,
  `CODCIUDADANOREGD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadanovacuna`
--

CREATE TABLE `ciudadanovacuna` (
  `ID_CIUDADANOVAC` int(11) NOT NULL,
  `CODVACUNA` int(11) NOT NULL,
  `N_HISTCLINIC` varchar(10) NOT NULL,
  `FECHAVAC` date NOT NULL,
  `FECHAPROXVAC` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentausuario`
--

CREATE TABLE `cuentausuario` (
  `CODCUENTA` int(11) NOT NULL,
  `APEUSUARIO` varchar(30) NOT NULL,
  `NOMUSUARIO` varchar(30) NOT NULL,
  `CEDULAUSUARIO` varchar(10) NOT NULL,
  `LOGINUSUARIO` varchar(25) NOT NULL,
  `PWDUSUARIO` varchar(15) NOT NULL,
  `FECHAREG` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `CODDISTRITO` varchar(11) NOT NULL,
  `DISTRITO` varchar(10) NOT NULL,
  `CODZONA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`CODDISTRITO`, `DISTRITO`, `CODZONA`) VALUES
('08D01', '08D01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dosis`
--

CREATE TABLE `dosis` (
  `CODDOSIS` int(11) NOT NULL,
  `CODVACUNA` int(11) DEFAULT NULL,
  `DOSIS` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dosis`
--

INSERT INTO `dosis` (`CODDOSIS`, `CODVACUNA`, `DOSIS`) VALUES
(1, 1, 'Dosis única'),
(2, 2, 'Primera dosis'),
(3, 2, 'Segunda dosis'),
(4, 3, 'Primera dosis'),
(5, 3, 'Segunda dosis'),
(6, 3, 'Tercera dosis'),
(7, 3, 'Cuarta dosis'),
(8, 4, 'Primera dosis'),
(9, 4, 'Segunda dosis'),
(10, 4, 'Tercera dosis'),
(11, 5, 'Primera dosis'),
(12, 5, 'Segunda dosis'),
(13, 5, 'Tercera dosis'),
(14, 6, 'Primera dosis'),
(15, 6, 'Segunda dosis'),
(16, 6, 'Tercera dosis'),
(17, 6, 'Cuarta dosis'),
(18, 7, 'Primera dosis'),
(19, 7, 'Segunda dosis'),
(20, 8, 'Primera dosis'),
(21, 8, 'Segunda dosis'),
(22, 9, 'Dosis única'),
(23, 10, 'Primera dosis'),
(24, 10, 'Segunda dosis'),
(25, 10, 'Tercera dosis'),
(26, 10, 'Cuarta dosis'),
(27, 10, 'Quinta dosis'),
(28, 11, 'Dosis única'),
(29, 11, 'Primera dosis'),
(30, 11, 'Segunda dosis'),
(31, 11, 'Tercera dosis'),
(32, 12, 'Primera dosis'),
(33, 12, 'Segunda dosis'),
(34, 12, 'Tercera dosis'),
(35, 12, 'Cuarta dosis'),
(36, 12, 'Quinta Dosis'),
(37, 12, 'Sexta dosis'),
(38, 13, 'Primera dosis'),
(39, 14, 'Primera dosis'),
(40, 15, 'Primera dosis'),
(41, 15, 'Segunda dosis'),
(42, 16, 'Primera dosis'),
(43, 16, 'Segunda dosis'),
(44, 17, 'Primera dosis'),
(45, 17, 'Segunda dosis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edad`
--

CREATE TABLE `edad` (
  `CODEDAD` int(11) NOT NULL,
  `EDADRMA` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escenariovac`
--

CREATE TABLE `escenariovac` (
  `CODLUGARVACUNACION` int(11) NOT NULL,
  `LUGARVACUNACION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='escenario de la vacunacion: institucional, extramural, comun';

--
-- Volcado de datos para la tabla `escenariovac`
--

INSERT INTO `escenariovac` (`CODLUGARVACUNACION`, `LUGARVACUNACION`) VALUES
(1, 'Institucional'),
(2, 'Extramural'),
(3, 'Comunidad Indígena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento`
--

CREATE TABLE `establecimiento` (
  `UNICODIGOES` varchar(11) NOT NULL,
  `NOMBREESTABLECIMIENTO` varchar(30) NOT NULL,
  `CODDISTRITO` varchar(11) NOT NULL,
  `CODZONAUBIC` int(11) NOT NULL,
  `TIPOESTABLECIMIENTO` varchar(30) NOT NULL,
  `CODLUGARVACUNACION` int(11) NOT NULL,
  `CODPARROQUIA` varchar(11) DEFAULT NULL,
  `DESCRIPCIONLUGARVAC` varchar(40) NOT NULL,
  `LOCALIDADEST` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `CODSEXO` int(11) NOT NULL,
  `SEXO` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`CODSEXO`, `SEXO`) VALUES
(1, 'Hombre'),
(2, 'Mujer'),
(3, 'Intersexual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `CODLOCREC` varchar(11) NOT NULL,
  `LOCALREC` varchar(30) NOT NULL,
  `CODPARROQUIA` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugarresidencia`
--

CREATE TABLE `lugarresidencia` (
  `CODLUGARRESIDE` int(11) NOT NULL,
  `CODLOCREC` varchar(11) DEFAULT NULL,
  `LUGARRESIDENCIA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Lugar de residencia: cada uno de los sectores que conforman ';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1480177876),
('m130524_201442_init', 1480177917);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE `nacionalidad` (
  `CODNACIONALIDAD` int(11) NOT NULL,
  `NACIONALIDAD` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nacionalidad`
--

INSERT INTO `nacionalidad` (`CODNACIONALIDAD`, `NACIONALIDAD`) VALUES
(1, 'Ecuatoriano'),
(2, 'Colombiano'),
(3, 'Peruano'),
(4, 'Cubano'),
(5, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE `parroquia` (
  `CODPARROQUIA` varchar(11) NOT NULL,
  `PARROQUIA` varchar(30) NOT NULL,
  `CODCANTON` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`CODPARROQUIA`, `PARROQUIA`, `CODCANTON`) VALUES
('01', 'Bartolomé Ruíz', '01'),
('02', '5 de Agosto', '01'),
('03', 'Esmeraldas', '01'),
('04', 'Luis Tello', '01'),
('51', 'Atacames', '01'),
('52', 'Camarones', '01'),
('53', 'Coronel Carlos Concha Torres', '01'),
('54', 'Chinca', '01'),
('55', 'Chontaduro', '01'),
('56', 'Chumundé', '01'),
('57', 'Lagarto', '01'),
('58', 'La Unión', '01'),
('59', 'Mujua', '01'),
('60', 'Montalvo', '01'),
('61', 'Rio Verde', '01'),
('62', 'Rocafuerte', '01'),
('63', 'San Mateo', '01'),
('64', 'Súa', '01'),
('65', 'Tabiazo', '01'),
('66', 'Tachina', '01'),
('67', 'Tonchigue', '01'),
('68', 'Vuelta Larga', '01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_u`
--

CREATE TABLE `perfil_u` (
  `ID_PERFIL` int(11) NOT NULL,
  `CODCUENTA` int(11) DEFAULT NULL,
  `NOMBREPERFIL` varchar(30) NOT NULL,
  `ATRIBUTOPERFIL` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='perfil de usuario';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE `profesional` (
  `CEDPROF` varchar(10) NOT NULL,
  `UNICODIGOES` varchar(11) DEFAULT NULL,
  `PROFESIONP` varchar(30) NOT NULL,
  `APELLIDOSP` varchar(30) NOT NULL,
  `NOMBRESP` varchar(30) NOT NULL,
  `CODSEXO` int(11) NOT NULL,
  `DIRECCIONPROF` varchar(70) NOT NULL,
  `TELFPROF` varchar(25) NOT NULL,
  `CORREOPROF` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Profesional responsable del control y seguimiento del plan d';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `CODPROVINCIA` varchar(11) NOT NULL,
  `PROVINCIA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`CODPROVINCIA`, `PROVINCIA`) VALUES
('08', 'Esmeraldas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regdiario`
--

CREATE TABLE `regdiario` (
  `CODREGISTRODIARIO` int(11) NOT NULL,
  `UNICODIGOES` varchar(11) DEFAULT NULL,
  `CODTIPODOC` int(11) DEFAULT NULL,
  `NUMORDENR` int(11) NOT NULL,
  `DIASVACMES` int(11) NOT NULL,
  `TOTALRD` int(11) NOT NULL,
  `NOMBREVACUNADOR` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Registro Diario';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_edad_vac`
--

CREATE TABLE `r_edad_vac` (
  `CODRANGOEDAD` int(11) NOT NULL,
  `CODVACUNA` int(11) DEFAULT NULL,
  `RANGOEDAD` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `r_edad_vac`
--

INSERT INTO `r_edad_vac` (`CODRANGOEDAD`, `CODVACUNA`, `RANGOEDAD`) VALUES
(0, NULL, ''),
(1, 1, 'Menor de 28 días'),
(2, 1, 'Menor de 365 días'),
(3, 2, '2 meses'),
(4, 2, '4 meses'),
(5, 3, '2 meses'),
(6, 3, '4 meses'),
(7, 3, '6 meses'),
(8, 3, '18 meses'),
(9, 3, '*1 año'),
(10, 3, '*2 años'),
(11, 3, '*3 años'),
(12, 3, '*4 años'),
(13, 4, '2 meses'),
(14, 4, '4 meses'),
(15, 4, '6 meses'),
(16, 5, '2 meses'),
(17, 5, '4 meses'),
(18, 5, '6 meses'),
(19, 6, '18 meses'),
(20, 6, '*1 año'),
(21, 6, '*2 años'),
(22, 6, '*3 años'),
(23, 6, '*4 años'),
(24, 7, '12 a 23 meses'),
(25, 7, '6 años'),
(26, 8, '15 meses'),
(27, 8, '6 años'),
(28, 9, '15 meses'),
(29, 9, 'De 2 a 4 años'),
(30, 9, 'De 5 a 14 años'),
(31, 9, 'De 15 a 59 años'),
(32, 10, '5 años'),
(33, 10, '6 años'),
(34, 11, 'Menor de 28 días'),
(35, 11, '*1 año'),
(36, 11, '*2 años'),
(37, 11, '*3 años'),
(38, 11, '*4 años'),
(39, 12, '*7 años'),
(40, 12, '15 años'),
(41, 12, '15 a 49 años'),
(42, 13, '6 a 11 meses'),
(43, 13, '12 a 23 meses'),
(44, 13, '2 a 4 años'),
(45, 13, '65 a 74 años'),
(46, 13, '75 y más'),
(47, 14, '65 y más'),
(48, 14, 'ninguno'),
(49, 15, '6 a 11 meses'),
(50, 15, '7 a 14 años'),
(51, 15, '15 a 29 años'),
(52, 15, '30 a 50 años'),
(53, 16, 'ninguno'),
(54, 17, '9 años');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarj_controlvac`
--

CREATE TABLE `tarj_controlvacs` (
  `CODTARCONTVAC` int(11) NOT NULL,
  `CODTIPODOC` int(11) DEFAULT NULL,
  `NUMORDENTAR` varchar(10) NOT NULL,
  `FECREGTAR` date NOT NULL,
  `FECHNAC` date NOT NULL,
  `LUGARNAC` varchar(50) NOT NULL,
  `LUGARINSCRIPCION` varchar(30) NOT NULL,
  `EDADINGRESO` varchar(15) NOT NULL,
  `APELLIDOSNOMBRESMADRE` varchar(50) NOT NULL,
  `APELLIDOSNOMBRESPADRE` varchar(50) NOT NULL,
  `APELLIDOSNOMBRESTUTOR` varchar(50) DEFAULT NULL,
  `OBSERV` text,
  `CODCALENDARIOVAC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tarjeta de control de vacunacion';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `CODTIPODOC` int(11) NOT NULL,
  `NOMTIPODOC` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `Apellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Profesion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Sexo` int(11) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `Apellido`, `Nombre`, `Profesion`, `Sexo`, `fechaRegistro`) VALUES
(1, 'juan', 'W20cM1Id4UUo32EaygZCy0OGyBwAJgVt', '$2y$13$MPh1sKFXFyVOebIEFZAM/e32txwiv94wELKuVRzR9h7U0KLWwZ1xi', NULL, 'juan@gmail.com', 10, 1480177932, 1480177932, '', '', '', 0, '2016-11-26 17:28:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE `vacuna` (
  `CODVACUNA` int(11) NOT NULL,
  `VACUNA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacuna`
--

INSERT INTO `vacuna` (`CODVACUNA`, `VACUNA`) VALUES
(1, 'BGG'),
(2, 'Rotavirus'),
(3, 'OPV'),
(4, 'Pentavalente'),
(5, 'Neumococo conjugada'),
(6, 'DPT'),
(7, 'SRP'),
(8, 'Varicela'),
(9, 'FA'),
(10, 'DT(Pediátrico)'),
(11, 'HB'),
(12, 'dT(Adulto)'),
(13, 'Influenza estacional'),
(14, 'Neumococo 23 polisacárido'),
(15, 'SR'),
(16, 'Meningocócica B-C'),
(17, 'HPV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `CODZONA` int(11) NOT NULL,
  `ZONA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`CODZONA`, `ZONA`) VALUES
(1, '1 Ibarra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_ubic`
--

CREATE TABLE `zona_ubic` (
  `CODZONAUBIC` int(11) NOT NULL,
  `ZONAUBICACION` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='zona ubicación: Urbano o Rural';

--
-- Volcado de datos para la tabla `zona_ubic`
--

INSERT INTO `zona_ubic` (`CODZONAUBIC`, `ZONAUBICACION`) VALUES
(1, 'Urbano'),
(2, 'Rural');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autoidetnica`
--
ALTER TABLE `autoidetnica`
  ADD PRIMARY KEY (`CODAUTOIDETNICA`);

--
-- Indices de la tabla `canton`
--
ALTER TABLE `canton`
  ADD PRIMARY KEY (`CODCANTON`),
  ADD KEY `FK_EXISTE` (`CODPROVINCIA`);

--
-- Indices de la tabla `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD PRIMARY KEY (`N_HISTCLINIC`),
  ADD KEY `FK_ES_REGISTRADO_TARJETA` (`CODTARCONTVAC`),
  ADD KEY `FK_PERTENECE_ETNIA` (`CODAUTOIDETNICA`),
  ADD KEY `FK_PERTENECE_GENERO` (`CODSEXO`),
  ADD KEY `FK_RESIDE` (`CODLUGARRESIDE`),
  ADD KEY `FK_TIENE_EDAD` (`CODEDAD`),
  ADD KEY `FK_TIENE_NACIONALIDAD` (`CODNACIONALIDAD`);

--
-- Indices de la tabla `ciudadanoregd`
--
ALTER TABLE `ciudadanoregd`
  ADD PRIMARY KEY (`CODREGISTRODIARIO`,`N_HISTCLINIC`,`CODCIUDADANOREGD`),
  ADD KEY `FK_RELATIONSHIP_30` (`N_HISTCLINIC`);

--
-- Indices de la tabla `ciudadanovacuna`
--
ALTER TABLE `ciudadanovacuna`
  ADD PRIMARY KEY (`ID_CIUDADANOVAC`,`CODVACUNA`,`N_HISTCLINIC`),
  ADD KEY `FK_APLICARSE` (`CODVACUNA`),
  ADD KEY `FK_SE_APLICA` (`N_HISTCLINIC`);

--
-- Indices de la tabla `cuentausuario`
--
ALTER TABLE `cuentausuario`
  ADD PRIMARY KEY (`CODCUENTA`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`CODDISTRITO`),
  ADD KEY `FK_PERTENECE_ZONA` (`CODZONA`);

--
-- Indices de la tabla `dosis`
--
ALTER TABLE `dosis`
  ADD PRIMARY KEY (`CODDOSIS`),
  ADD KEY `FK_TIENE_DOSIS` (`CODVACUNA`);

--
-- Indices de la tabla `edad`
--
ALTER TABLE `edad`
  ADD PRIMARY KEY (`CODEDAD`);

--
-- Indices de la tabla `escenariovac`
--
ALTER TABLE `escenariovac`
  ADD PRIMARY KEY (`CODLUGARVACUNACION`);

--
-- Indices de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD PRIMARY KEY (`UNICODIGOES`),
  ADD KEY `FK_EXISTE_EST` (`CODPARROQUIA`),
  ADD KEY `FK_PERTENECE_DISTRITO` (`CODDISTRITO`),
  ADD KEY `FK_RESIDE_ZONA` (`CODZONAUBIC`),
  ADD KEY `FK_VACUNA_EN_LUGAR` (`CODLUGARVACUNACION`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`CODSEXO`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`CODLOCREC`),
  ADD KEY `FK_TIENE` (`CODPARROQUIA`);

--
-- Indices de la tabla `lugarresidencia`
--
ALTER TABLE `lugarresidencia`
  ADD PRIMARY KEY (`CODLUGARRESIDE`),
  ADD KEY `FK_EXISTE_LUGAR` (`CODLOCREC`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  ADD PRIMARY KEY (`CODNACIONALIDAD`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`CODPARROQUIA`),
  ADD KEY `FK_HAY` (`CODCANTON`);

--
-- Indices de la tabla `perfil_u`
--
ALTER TABLE `perfil_u`
  ADD PRIMARY KEY (`ID_PERFIL`),
  ADD KEY `FK_DISPONE` (`CODCUENTA`);

--
-- Indices de la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`CEDPROF`),
  ADD KEY `FK_ATIENDE` (`UNICODIGOES`),
  ADD KEY `FK_CORRESPONDE_GENERO` (`CODSEXO`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`CODPROVINCIA`);

--
-- Indices de la tabla `regdiario`
--
ALTER TABLE `regdiario`
  ADD PRIMARY KEY (`CODREGISTRODIARIO`),
  ADD KEY `FK_ES_TIPO_DOCUMENTO` (`CODTIPODOC`),
  ADD KEY `FK_UTILIZA_REGISTRO` (`UNICODIGOES`);

--
-- Indices de la tabla `r_edad_vac`
--
ALTER TABLE `r_edad_vac`
  ADD PRIMARY KEY (`CODRANGOEDAD`),
  ADD KEY `FK_TIENE_RANGO` (`CODVACUNA`);

--
-- Indices de la tabla `tarj_controlvac`
--
ALTER TABLE `tarj_controlvac`
  ADD PRIMARY KEY (`CODTARCONTVAC`),
  ADD KEY `FK_ES_DOCUMENTO` (`CODTIPODOC`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`CODTIPODOC`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indices de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD PRIMARY KEY (`CODVACUNA`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`CODZONA`);

--
-- Indices de la tabla `zona_ubic`
--
ALTER TABLE `zona_ubic`
  ADD PRIMARY KEY (`CODZONAUBIC`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canton`
--
ALTER TABLE `canton`
  ADD CONSTRAINT `FK_EXISTE` FOREIGN KEY (`CODPROVINCIA`) REFERENCES `provincia` (`CODPROVINCIA`);

--
-- Filtros para la tabla `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD CONSTRAINT `FK_ES_REGISTRADO_TARJETA` FOREIGN KEY (`CODTARCONTVAC`) REFERENCES `tarj_controlvac` (`CODTARCONTVAC`),
  ADD CONSTRAINT `FK_PERTENECE_ETNIA` FOREIGN KEY (`CODAUTOIDETNICA`) REFERENCES `autoidetnica` (`CODAUTOIDETNICA`),
  ADD CONSTRAINT `FK_PERTENECE_GENERO` FOREIGN KEY (`CODSEXO`) REFERENCES `genero` (`CODSEXO`),
  ADD CONSTRAINT `FK_RESIDE` FOREIGN KEY (`CODLUGARRESIDE`) REFERENCES `lugarresidencia` (`CODLUGARRESIDE`),
  ADD CONSTRAINT `FK_TIENE_EDAD` FOREIGN KEY (`CODEDAD`) REFERENCES `edad` (`CODEDAD`),
  ADD CONSTRAINT `FK_TIENE_NACIONALIDAD` FOREIGN KEY (`CODNACIONALIDAD`) REFERENCES `nacionalidad` (`CODNACIONALIDAD`);

--
-- Filtros para la tabla `ciudadanoregd`
--
ALTER TABLE `ciudadanoregd`
  ADD CONSTRAINT `FK_RELATIONSHIP_30` FOREIGN KEY (`N_HISTCLINIC`) REFERENCES `ciudadano` (`N_HISTCLINIC`),
  ADD CONSTRAINT `FK_RELATIONSHIP_31` FOREIGN KEY (`CODREGISTRODIARIO`) REFERENCES `regdiario` (`CODREGISTRODIARIO`);

--
-- Filtros para la tabla `ciudadanovacuna`
--
ALTER TABLE `ciudadanovacuna`
  ADD CONSTRAINT `FK_APLICARSE` FOREIGN KEY (`CODVACUNA`) REFERENCES `vacuna` (`CODVACUNA`),
  ADD CONSTRAINT `FK_SE_APLICA` FOREIGN KEY (`N_HISTCLINIC`) REFERENCES `ciudadano` (`N_HISTCLINIC`);

--
-- Filtros para la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD CONSTRAINT `FK_PERTENECE_ZONA` FOREIGN KEY (`CODZONA`) REFERENCES `zona` (`CODZONA`);

--
-- Filtros para la tabla `dosis`
--
ALTER TABLE `dosis`
  ADD CONSTRAINT `FK_TIENE_DOSIS` FOREIGN KEY (`CODVACUNA`) REFERENCES `vacuna` (`CODVACUNA`);

--
-- Filtros para la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD CONSTRAINT `FK_EXISTE_EST` FOREIGN KEY (`CODPARROQUIA`) REFERENCES `parroquia` (`CODPARROQUIA`),
  ADD CONSTRAINT `FK_PERTENECE_DISTRITO` FOREIGN KEY (`CODDISTRITO`) REFERENCES `distrito` (`CODDISTRITO`),
  ADD CONSTRAINT `FK_RESIDE_ZONA` FOREIGN KEY (`CODZONAUBIC`) REFERENCES `zona_ubic` (`CODZONAUBIC`),
  ADD CONSTRAINT `FK_VACUNA_EN_LUGAR` FOREIGN KEY (`CODLUGARVACUNACION`) REFERENCES `escenariovac` (`CODLUGARVACUNACION`);

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `FK_TIENE` FOREIGN KEY (`CODPARROQUIA`) REFERENCES `parroquia` (`CODPARROQUIA`);

--
-- Filtros para la tabla `lugarresidencia`
--
ALTER TABLE `lugarresidencia`
  ADD CONSTRAINT `FK_EXISTE_LUGAR` FOREIGN KEY (`CODLOCREC`) REFERENCES `localidad` (`CODLOCREC`);

--
-- Filtros para la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `FK_HAY` FOREIGN KEY (`CODCANTON`) REFERENCES `canton` (`CODCANTON`);

--
-- Filtros para la tabla `perfil_u`
--
ALTER TABLE `perfil_u`
  ADD CONSTRAINT `FK_DISPONE` FOREIGN KEY (`CODCUENTA`) REFERENCES `cuentausuario` (`CODCUENTA`);

--
-- Filtros para la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD CONSTRAINT `FK_ATIENDE` FOREIGN KEY (`UNICODIGOES`) REFERENCES `establecimiento` (`UNICODIGOES`),
  ADD CONSTRAINT `FK_CORRESPONDE_GENERO` FOREIGN KEY (`CODSEXO`) REFERENCES `genero` (`CODSEXO`);

--
-- Filtros para la tabla `regdiario`
--
ALTER TABLE `regdiario`
  ADD CONSTRAINT `FK_ES_TIPO_DOCUMENTO` FOREIGN KEY (`CODTIPODOC`) REFERENCES `tipodocumento` (`CODTIPODOC`),
  ADD CONSTRAINT `FK_UTILIZA_REGISTRO` FOREIGN KEY (`UNICODIGOES`) REFERENCES `establecimiento` (`UNICODIGOES`);

--
-- Filtros para la tabla `r_edad_vac`
--
ALTER TABLE `r_edad_vac`
  ADD CONSTRAINT `FK_TIENE_RANGO` FOREIGN KEY (`CODVACUNA`) REFERENCES `vacuna` (`CODVACUNA`);

--
-- Filtros para la tabla `tarj_controlvac`
--
ALTER TABLE `tarj_controlvac`
  ADD CONSTRAINT `FK_ES_DOCUMENTO` FOREIGN KEY (`CODTIPODOC`) REFERENCES `tipodocumento` (`CODTIPODOC`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
