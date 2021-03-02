-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-01-2020 a las 19:56:35
-- Versión del servidor: 10.2.30-MariaDB-cll-lve
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_serli`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen_fisico`
--

CREATE TABLE `examen_fisico` (
  `id_examen` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `cabeza` varchar(800) DEFAULT NULL,
  `torax` varchar(800) DEFAULT NULL,
  `abdomen` varchar(800) DEFAULT NULL,
  `extremidades` varchar(800) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `examen_fisico`
--

INSERT INTO `examen_fisico` (`id_examen`, `id_paciente`, `cabeza`, `torax`, `abdomen`, `extremidades`, `fecha`, `fecha_registro`, `fecha_modificacion`, `fecha_eliminacion`, `id_estado`) VALUES
(1, 2, 'en la cabeza', 'del torax', 'en el abdomen..', 'inferiores', '2020-01-24', '2020-01-24 13:38:14', NULL, NULL, 2),
(2, 8, 'Dolor de cabeza', 'Nada en el torax', 'Abdomen perfecto', 'Extremidades localizadas', '2020-01-27', '2020-01-27 13:20:10', NULL, NULL, 2),
(3, 11, 'Sin sintomas', 'con dolores', 'con dolores', 'sin sintomas', '2020-01-28', '2020-01-28 10:16:07', NULL, NULL, 1),
(4, 9, 'Sin describir', 'Sin describir', 'Sin describir', 'Sin describir', '2020-01-29', '2020-01-28 19:50:58', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_pacientes` int(11) NOT NULL,
  `cedula` varchar(23) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `fecha_nac` date DEFAULT NULL,
  `correo` varchar(120) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `celular1` varchar(13) DEFAULT NULL,
  `celular2` varchar(13) DEFAULT NULL,
  `id_estado` int(11) NOT NULL,
  `neuro` varchar(800) DEFAULT NULL,
  `alergia` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_pacientes`, `cedula`, `nombres`, `apellidos`, `fecha_nac`, `correo`, `direccion`, `telefono`, `celular1`, `celular2`, `id_estado`, `neuro`, `alergia`) VALUES
(2, '03928328392', 'Natalia', 'Streignar', '2018-09-03', 'sdsdsds@gmail.com', 'sjkdds', '', '', '', 1, NULL, NULL),
(6, '092828288', 'Padre', 'karras', '2019-10-02', 'karras@gmail.com', 'dsjsdd', '', '', '', 2, NULL, NULL),
(7, '044444444', 'David', 'Parcerisa', '1958-10-02', 'davidpa@gmail.com', 'EspaÃ±a', '', '', '', 2, NULL, NULL),
(8, '0238882188', 'Barby', 'Reyes', '2016-10-02', 'barby@gmail.com', '', '', '', '', 1, '', ''),
(9, '055555555', 'Jorge', 'Crespin', '2018-11-02', 'jorge@gmail.com', '', '', '', '', 1, 'Sin concretar', 'Sin argumentar'),
(10, '033881119', 'Sandra', 'Ruiz', '2019-11-02', 'sandrita@gmail.com', '', '', '', '', 2, 'nada', 'nada tambien'),
(11, '0928328348', 'Ernesto', 'Sevilla', '2019-12-02', 'enfs@outlook.com', '', '', '', '', 1, 'Nada que ver', 'Nada que ver'),
(12, '0998877227', 'Sherli', 'Capaz', '2019-11-02', 'sherli@gmail.com', 'Aqui y alla', '', '', '', 1, 'asdf', 'qwerty');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patologias`
--

CREATE TABLE `patologias` (
  `id_patologias` int(11) NOT NULL,
  `nombre_patologia` varchar(200) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `patologias`
--

INSERT INTO `patologias` (`id_patologias`, `nombre_patologia`, `id_estado`) VALUES
(1, 'Trauma Vascular', 1),
(2, 'Dislipemias', 1),
(14, 'Cardiopat&iacute;as', 1),
(15, 'Hipertensi&oacute;n Arterial', 1),
(16, 'Artrosis Tobillo', 1),
(17, 'Diabetes', 1),
(18, 'Obesidad', 1),
(19, 'Artritis Reum&aacute;tica', 1),
(20, 'Angiodisplasias', 1),
(21, 'Pie Plano', 1),
(22, 'Psoriasis', 1),
(23, 'Claudicaci&oacute;n Venosa', 1),
(24, 'Neuropat&iacute;a Perif&eacute;rica', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patologias_familiares`
--

CREATE TABLE `patologias_familiares` (
  `id_p_p` int(11) NOT NULL,
  `id_pacientes` int(11) NOT NULL,
  `id_patologias` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `patologias_familiares`
--

INSERT INTO `patologias_familiares` (`id_p_p`, `id_pacientes`, `id_patologias`, `id_estado`) VALUES
(1, 2, 1, 1),
(2, 2, 2, 1),
(3, 2, 21, 1),
(4, 2, 2, 1),
(5, 2, 2, 1),
(6, 2, 15, 1),
(7, 2, 1, 1),
(8, 2, 21, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patologias_pacientes`
--

CREATE TABLE `patologias_pacientes` (
  `id_p_p` int(11) NOT NULL,
  `id_pacientes` int(11) NOT NULL,
  `id_patologias` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `patologias_pacientes`
--

INSERT INTO `patologias_pacientes` (`id_p_p`, `id_pacientes`, `id_patologias`, `id_estado`) VALUES
(7, 2, 14, 1),
(8, 2, 24, 1),
(9, 2, 23, 1),
(10, 2, 24, 1),
(11, 2, 21, 1),
(12, 2, 2, 1),
(13, 2, 20, 1),
(14, 2, 21, 1),
(15, 2, 1, 1),
(16, 2, 21, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prescripcion`
--

CREATE TABLE `prescripcion` (
  `id_presc` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `categoria` varchar(80) NOT NULL,
  `descripcion` varchar(800) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prescripcion`
--

INSERT INTO `prescripcion` (`id_presc`, `id_paciente`, `categoria`, `descripcion`, `fecha`, `fecha_registro`, `fecha_modificacion`, `fecha_eliminacion`, `id_estado`) VALUES
(1, 8, 'Ginecologia', 'Peor portada', '2020-01-26', '2020-01-25 21:37:37', NULL, NULL, 1),
(2, 2, 'Ecografias', 'Para ecografias', '2020-01-26', '2020-01-25 23:47:43', NULL, NULL, 2),
(3, 2, 'Ortopedia', 'De la oftalmologia ', '2020-01-26', '2020-01-25 23:48:12', NULL, NULL, 1),
(4, 9, 'Radiografias', 'Con problemas en las cervicales..', '2020-01-28', '2020-01-28 10:17:14', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(100) DEFAULT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `id_estado`) VALUES
(1, 'Administrador', 1),
(2, 'Empleado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `passw` varchar(200) NOT NULL,
  `clv` varchar(200) DEFAULT NULL,
  `id_estado` int(11) NOT NULL,
  `intentos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol`, `correo`, `passw`, `clv`, `id_estado`, `intentos`) VALUES
(1, 1, 'crespin@outlook.es', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1234', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `examen_fisico`
--
ALTER TABLE `examen_fisico`
  ADD PRIMARY KEY (`id_examen`),
  ADD KEY `fk_examen_fisico_pacientes` (`id_paciente`),
  ADD KEY `fk_examen_fisico_estado` (`id_estado`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_pacientes`),
  ADD KEY `fk_pacientes_estado` (`id_estado`);

--
-- Indices de la tabla `patologias`
--
ALTER TABLE `patologias`
  ADD PRIMARY KEY (`id_patologias`),
  ADD KEY `fk_patologias_estado` (`id_estado`);

--
-- Indices de la tabla `patologias_familiares`
--
ALTER TABLE `patologias_familiares`
  ADD PRIMARY KEY (`id_p_p`),
  ADD KEY `fk_patologias_familiares_pacientes` (`id_pacientes`),
  ADD KEY `fk_patologias_familiares_patologias` (`id_patologias`),
  ADD KEY `fk_patologias_familiares_estado` (`id_estado`);

--
-- Indices de la tabla `patologias_pacientes`
--
ALTER TABLE `patologias_pacientes`
  ADD PRIMARY KEY (`id_p_p`),
  ADD KEY `fk_patologias_pacientes_pacientes` (`id_pacientes`),
  ADD KEY `fk_patologias_pacientes_patologias` (`id_patologias`),
  ADD KEY `fk_patologias_pacientes_estado` (`id_estado`);

--
-- Indices de la tabla `prescripcion`
--
ALTER TABLE `prescripcion`
  ADD PRIMARY KEY (`id_presc`),
  ADD KEY `fk_prescripcion_pacientes` (`id_paciente`),
  ADD KEY `fk_prescripcion_estado` (`id_estado`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD KEY `fk_roles_estado` (`id_estado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuarios_roles` (`rol`),
  ADD KEY `fk_usuarios_estado` (`id_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `examen_fisico`
--
ALTER TABLE `examen_fisico`
  MODIFY `id_examen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_pacientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `patologias`
--
ALTER TABLE `patologias`
  MODIFY `id_patologias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `patologias_familiares`
--
ALTER TABLE `patologias_familiares`
  MODIFY `id_p_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `patologias_pacientes`
--
ALTER TABLE `patologias_pacientes`
  MODIFY `id_p_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `prescripcion`
--
ALTER TABLE `prescripcion`
  MODIFY `id_presc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `examen_fisico`
--
ALTER TABLE `examen_fisico`
  ADD CONSTRAINT `fk_examen_fisico_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `fk_examen_fisico_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_pacientes`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `fk_pacientes_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `patologias`
--
ALTER TABLE `patologias`
  ADD CONSTRAINT `fk_patologias_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `patologias_familiares`
--
ALTER TABLE `patologias_familiares`
  ADD CONSTRAINT `fk_patologias_familiares_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `fk_patologias_familiares_pacientes` FOREIGN KEY (`id_pacientes`) REFERENCES `pacientes` (`id_pacientes`),
  ADD CONSTRAINT `fk_patologias_familiares_patologias` FOREIGN KEY (`id_patologias`) REFERENCES `patologias` (`id_patologias`);

--
-- Filtros para la tabla `patologias_pacientes`
--
ALTER TABLE `patologias_pacientes`
  ADD CONSTRAINT `fk_patologias_pacientes_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `fk_patologias_pacientes_pacientes` FOREIGN KEY (`id_pacientes`) REFERENCES `pacientes` (`id_pacientes`),
  ADD CONSTRAINT `fk_patologias_pacientes_patologias` FOREIGN KEY (`id_patologias`) REFERENCES `patologias` (`id_patologias`);

--
-- Filtros para la tabla `prescripcion`
--
ALTER TABLE `prescripcion`
  ADD CONSTRAINT `fk_prescripcion_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `fk_prescripcion_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_pacientes`);

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `fk_roles_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
