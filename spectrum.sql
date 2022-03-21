-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2022 a las 19:05:54
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spectrum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fase` varchar(200) DEFAULT NULL,
  `tarea` varchar(200) NOT NULL,
  `descripcion_tarea` varchar(200) NOT NULL,
  `fecha_agenda` date NOT NULL,
  `hora_agenda` varchar(200) NOT NULL,
  `id_tecnico` int(11) DEFAULT NULL,
  `id_ingeniero` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_regional` int(11) DEFAULT NULL,
  `id_subregional` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `id_usuario`, `fase`, `tarea`, `descripcion_tarea`, `fecha_agenda`, `hora_agenda`, `id_tecnico`, `id_ingeniero`, `id_cliente`, `id_regional`, `id_subregional`) VALUES
(1, 1, '1', 'Revision aparato', 'revision del estado del equipo, reportan no conexion', '2022-03-15', '08:20:00', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calidad`
--

CREATE TABLE `calidad` (
  `id_calidad` int(11) NOT NULL,
  `id_agenda` int(11) DEFAULT NULL,
  `estado_final_actividad` varchar(50) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `causal_puntualidad` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `novedad` varchar(200) DEFAULT NULL,
  `observacion_calidad` varchar(200) DEFAULT NULL,
  `novedad_puntualidad_terreno` varchar(200) DEFAULT NULL,
  `observacion_puntualidad_terreno` varchar(200) DEFAULT NULL,
  `falta` tinyint(1) DEFAULT NULL,
  `tipo_falta` varchar(100) DEFAULT NULL,
  `observaciones_faltas` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calidad`
--

INSERT INTO `calidad` (`id_calidad`, `id_agenda`, `estado_final_actividad`, `observaciones`, `causal_puntualidad`, `estado`, `novedad`, `observacion_calidad`, `novedad_puntualidad_terreno`, `observacion_puntualidad_terreno`, `falta`, `tipo_falta`, `observaciones_faltas`) VALUES
(1, 1, 'EXITOSO\r\n', 'PUNTUALIDAD 07 - EMPALMES FIBRA OPTICA; 01/06/2021 ; TÉCNICO: DILIER H. GRAJALES R.,  HORA VISITA: 09:00, HORA LLEGADA: 09:00, ATIENDE: CARLOS AVENDAÑO, CARGO: ADMINISTRADOR, TELEFONO: 3219367688\r\n', 'CONFIRMA CLIENTE\r\n', 'CUMPLIDA\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `apellido_cliente` varchar(50) NOT NULL,
  `telefono_cliente` varchar(50) NOT NULL,
  `correo_cliente` varchar(200) NOT NULL,
  `direccion_cliente` varchar(200) NOT NULL,
  `ciudad_cliente` varchar(200) NOT NULL,
  `fecha_vinculacion_cliente` date DEFAULT NULL,
  `nit` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre_cliente`, `apellido_cliente`, `telefono_cliente`, `correo_cliente`, `direccion_cliente`, `ciudad_cliente`, `fecha_vinculacion_cliente`, `nit`) VALUES
(1, 'Tadeo', 'Barrios', '3102240935', 'Barrios@gmail.com', 'Calle 24 N° 5-60', 'Bogota', '2020-01-28', '456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingeniero`
--

CREATE TABLE `ingeniero` (
  `id_ingeniero` int(11) NOT NULL,
  `nombre_ingeniero` varchar(50) NOT NULL,
  `apellido_ingeniero` varchar(50) NOT NULL,
  `telefono_ingeniero` varchar(50) NOT NULL,
  `correo_ingeniero` varchar(200) NOT NULL,
  `direccion_ingeniero` varchar(200) NOT NULL,
  `fecha_ingreso_ingeniero` date DEFAULT NULL,
  `area` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingeniero`
--

INSERT INTO `ingeniero` (`id_ingeniero`, `nombre_ingeniero`, `apellido_ingeniero`, `telefono_ingeniero`, `correo_ingeniero`, `direccion_ingeniero`, `fecha_ingreso_ingeniero`, `area`) VALUES
(1, 'Paulino', 'Roman', '3124827170', 'Roman@gmail.es', ' Av. Ciudad de Cali No. 6C-09', '1990-10-09', 'Soporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regional`
--

CREATE TABLE `regional` (
  `id_regional` int(11) NOT NULL,
  `nombre_regional` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `regional`
--

INSERT INTO `regional` (`id_regional`, `nombre_regional`) VALUES
(1, 'Bogota'),
(2, 'Cali'),
(3, 'Medellin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL,
  `descripcion_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`, `descripcion_rol`) VALUES
(1, 'Admin', 'Control total'),
(2, 'Consultor', 'Limitado a solo consultas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subregional`
--

CREATE TABLE `subregional` (
  `id_subregional` int(11) NOT NULL,
  `id_regional` int(11) DEFAULT NULL,
  `nombre_subregional` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `subregional`
--

INSERT INTO `subregional` (`id_subregional`, `id_regional`, `nombre_subregional`) VALUES
(1, 1, 'NORTE'),
(2, 1, 'SUR'),
(3, 1, 'CORPORATIVO'),
(4, 1, 'NORORIENTE'),
(5, 1, 'NOROCCIDENTE'),
(6, 2, 'NORTE'),
(7, 2, 'SUR'),
(8, 2, 'CORPORATIVO'),
(9, 2, 'NORORIENTE'),
(10, 2, 'NOROCCIDENTE'),
(11, 3, 'NORTE'),
(12, 3, 'SUR'),
(13, 3, 'CORPORATIVO'),
(14, 3, 'NORORIENTE'),
(15, 3, 'NOROCCIDENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE `tecnico` (
  `id_tecnico` int(11) NOT NULL,
  `nombre_tecnico` varchar(50) NOT NULL,
  `apellido_tecnico` varchar(50) NOT NULL,
  `telefono_tecnico` varchar(50) NOT NULL,
  `direccion_tecnico` varchar(200) NOT NULL,
  `ciudad_tecnico` varchar(200) NOT NULL,
  `nivel_educacion` varchar(200) NOT NULL,
  `fecha_vinculacion_tecnico` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tecnico`
--

INSERT INTO `tecnico` (`id_tecnico`, `nombre_tecnico`, `apellido_tecnico`, `telefono_tecnico`, `direccion_tecnico`, `ciudad_tecnico`, `nivel_educacion`, `fecha_vinculacion_tecnico`) VALUES
(1, 'Vito', 'Vidal Peral', '3204568745', 'Vito@gmail.com', 'Calle 48b sur No. 21-13', '1999-12-09', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `telefono_usuario` varchar(50) DEFAULT NULL,
  `direccion_usuario` varchar(200) DEFAULT NULL,
  `ciudad_usuario` varchar(200) DEFAULT NULL,
  `usuario` varchar(100) NOT NULL,
  `passwordUsuario` varchar(200) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `telefono_usuario`, `direccion_usuario`, `ciudad_usuario`, `usuario`, `passwordUsuario`, `id_rol`, `correo`) VALUES
(1, 'Mauricio ', 'Medina', '3103303060', 'calle 69 sur', 'Bogota', 'MMS', '202cb962ac59075b964b07152d234b70', 1, 'mauricio@gmail.com'),
(2, 'Kevin', 'NN', NULL, NULL, NULL, 'Kevin1', '202cb962ac59075b964b07152d234b70', 1, NULL),
(34, 'juan', 'Perez', '3054496454', 'calle 123', 'Bogota', 'juanPerez', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'juan@juan.com'),
(35, 'Andrea', 'lopez', '4856456', 'calle 25 sur', 'Cali', 'andy', '46902a89f290ec4bbf5e9b4223497d23', 1, 'json@gmail.com'),
(36, 'Alex', 'Hernandez', '589458', 'carreara 24', 'Cali', 'Alex96', '202cb962ac59075b964b07152d234b70', 2, 'Alex@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `id_tecnico` (`id_tecnico`),
  ADD KEY `id_ingeniero` (`id_ingeniero`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_subregional` (`id_subregional`),
  ADD KEY `id_regional` (`id_regional`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `calidad`
--
ALTER TABLE `calidad`
  ADD PRIMARY KEY (`id_calidad`),
  ADD KEY `id_agenda` (`id_agenda`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `ingeniero`
--
ALTER TABLE `ingeniero`
  ADD PRIMARY KEY (`id_ingeniero`);

--
-- Indices de la tabla `regional`
--
ALTER TABLE `regional`
  ADD PRIMARY KEY (`id_regional`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `subregional`
--
ALTER TABLE `subregional`
  ADD PRIMARY KEY (`id_subregional`),
  ADD KEY `id_regional` (`id_regional`);

--
-- Indices de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`id_tecnico`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `calidad`
--
ALTER TABLE `calidad`
  MODIFY `id_calidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ingeniero`
--
ALTER TABLE `ingeniero`
  MODIFY `id_ingeniero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `regional`
--
ALTER TABLE `regional`
  MODIFY `id_regional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `subregional`
--
ALTER TABLE `subregional`
  MODIFY `id_subregional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `id_tecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_tecnico`) REFERENCES `tecnico` (`id_tecnico`),
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`id_ingeniero`) REFERENCES `ingeniero` (`id_ingeniero`),
  ADD CONSTRAINT `agenda_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `agenda_ibfk_4` FOREIGN KEY (`id_subregional`) REFERENCES `subregional` (`id_subregional`),
  ADD CONSTRAINT `agenda_ibfk_5` FOREIGN KEY (`id_regional`) REFERENCES `regional` (`id_regional`),
  ADD CONSTRAINT `agenda_ibfk_6` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `calidad`
--
ALTER TABLE `calidad`
  ADD CONSTRAINT `calidad_ibfk_1` FOREIGN KEY (`id_agenda`) REFERENCES `agenda` (`id_agenda`);

--
-- Filtros para la tabla `subregional`
--
ALTER TABLE `subregional`
  ADD CONSTRAINT `subregional_ibfk_1` FOREIGN KEY (`id_regional`) REFERENCES `regional` (`id_regional`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
