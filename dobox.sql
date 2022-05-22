-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2022 a las 21:02:33
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dobox`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_avisos`
--

CREATE TABLE `tbl_avisos` (
  `ID` int(11) NOT NULL,
  `TITULO` varchar(255) NOT NULL,
  `DESCRIPCION` varchar(500) NOT NULL,
  `FECHA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_avisos`
--

INSERT INTO `tbl_avisos` (`ID`, `TITULO`, `DESCRIPCION`, `FECHA`) VALUES
(7, 'Alerta de documentación', 'Entregar nóminas firmadas al Departamento RRHH ', '2022-05-10'),
(12, 'Aviso de inicio de horario de verano', 'A partir del próximo 01 de junio el horario será de 8:00 a 15:00 horas.', '2022-05-20'),
(13, 'Aviso de coordinación de vacaciones', 'Entregar propuesta de vacaciones de verano (15 de junio a 15 de septiembre)  al supervisor de departamento para su aprobación.', '2022-06-01'),
(14, 'Aviso de entrega de documentación', 'Entrega de certificados para elaboración de modelos de retenciones IRPF', '2022-05-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_documentos`
--

CREATE TABLE `tbl_documentos` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(255) DEFAULT NULL,
  `TIPO` varchar(50) DEFAULT NULL,
  `DESCRIPCION` varchar(500) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `FECHA_VTO` date DEFAULT NULL,
  `ARCHIVO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_documentos`
--

INSERT INTO `tbl_documentos` (`ID`, `NOMBRE`, `TIPO`, `DESCRIPCION`, `FECHA`, `FECHA_VTO`, `ARCHIVO`) VALUES
(22, 'Contrato de Prestación de Servicios', 'Contrato', 'Contrato de Prestación de Servicios de software y consultoría TIC', '2022-01-01', '2023-01-01', 'ANEXO 1.pdf'),
(23, 'Convenio de Colaboración', 'Convenio', 'Convenio de Colaboración con la Universidad de Huelva', '2022-01-01', '2025-01-01', 'DOC. COMPL1.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_entidades`
--

CREATE TABLE `tbl_entidades` (
  `ID_ENTIDAD` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CIF` varchar(10) NOT NULL,
  `TELEFONO` varchar(12) NOT NULL,
  `EMAIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_entidades`
--

INSERT INTO `tbl_entidades` (`ID_ENTIDAD`, `NOMBRE`, `CIF`, `TELEFONO`, `EMAIL`) VALUES
(10, 'BIOCLIM S.L', 'B00000002', '12345789', 'bioclim@email.com'),
(11, 'DATAGRAM CONSULTORES S.L', 'B12345678', '902 902 902', 'dtg@terra.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `ID` int(11) NOT NULL,
  `USUARIO` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASS` varchar(20) NOT NULL,
  `ROL` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`ID`, `USUARIO`, `EMAIL`, `PASS`, `ROL`) VALUES
(5, 'navinesa', 'navinesa@gmail.com', '1234*', 'Administrador'),
(7, 'marcos XXY', 'marcosXXY@gmail.com', '123456', 'Gestor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_avisos`
--
ALTER TABLE `tbl_avisos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_entidades`
--
ALTER TABLE `tbl_entidades`
  ADD PRIMARY KEY (`ID_ENTIDAD`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_avisos`
--
ALTER TABLE `tbl_avisos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tbl_entidades`
--
ALTER TABLE `tbl_entidades`
  MODIFY `ID_ENTIDAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
