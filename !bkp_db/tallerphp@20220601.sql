-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2022 a las 15:56:46
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tallerphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` tinyint(2) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido`, `email`, `telefono`, `estado`) VALUES
(1, 'Gaston', 'Giménez', 'gimenezga@gmail.com', '4444-5555', 1),
(2, 'Maria', 'Perez', 'maria@perez.com', '5555-9999', 1),
(3, 'Paula', 'Juarez', 'paulincha@lala.com.ar', '9999-5555', 1),
(4, 'Tomas', 'Alvarez', 'tomy@alraverz.com', '', 1),
(5, 'Pepe', 'Pepito', 'pepe@pepe.com', '999-1111', 0),
(6, 'Macarena', 'Villante', 'maca@villante.com', '15 1234 5678', 1),
(7, 'Sofia', 'Giménez', 'sofi@gmail.com', '4567-8969', 1),
(8, 'Ramiro', 'Chechile', 'ramiro@chechile.com', '', 1),
(9, 'Javier', 'González', 'javi@javier.com', '455569822', 1),
(10, 'Adriana', 'Del Molino', 'adriana@adriana.com', '', 1),
(11, 'Karina', 'Lopez', 'karina@gmail.com', '', 1),
(12, 'Francisco', 'Duarte', 'pancho@duarte.com', '6564-5111', 1),
(20, 'Lucas Ramón', 'Ramos', 'lukas@ramos.com', '15-9999-5555', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` tinyint(2) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `codigo` char(3) NOT NULL,
  `anio` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`, `horario`, `codigo`, `anio`, `estado`) VALUES
(1, 'Programación Multimedial 1', 'Jueves 9 a 13', 'PM1', '1', 1),
(2, 'Programación Multimedial 2', 'Jueves 9 a 13', 'PM2', '2', 1),
(3, 'Programación Multimedial 3', 'Jueves 18 a 22', 'PM3', '3', 1),
(4, 'Programación Multimedial 4', 'Jueves 18 a 22', 'PM4', '4', 1),
(5, 'Diseño Aplicado', 'Miércoles de 9 a 13', 'DAP', '3', 1),
(6, 'Tesis', 'Martes de 18 a 20', 'TES', '4', 1),
(7, 'Proyecto Senior 2', 'Martes de 18 a 20', 'PS2', '4', 1),
(8, 'Matemáticas Aplicadas', 'Lunes de 9 a 11', 'MAT', '1', 1),
(9, 'Marketing Aplicado', 'Martes de 11 a 13', 'MAP', '2', 1),
(10, 'Videojuegos', 'Lunes 11 a 13', 'VID', '3', 1),
(11, 'Arquitectura de Sistemas', 'Lunes de', 'ARQ', '1', 0),
(12, 'Taller de Diseño', 'Lunes de 11 a 13', 'TDI', '1', 1),
(15, 'Prueba Materia', 'Jueves 19 a 21', 'MA2', '1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` tinyint(2) NOT NULL,
  `id_alumno` tinyint(2) NOT NULL,
  `id_materia` tinyint(2) NOT NULL,
  `nota` tinyint(2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `id_alumno`, `id_materia`, `nota`, `fecha`, `estado`) VALUES
(1, 1, 4, 8, '2022-06-01 13:08:07', 1),
(2, 3, 5, 9, '2022-05-16 14:00:00', 1),
(3, 4, 8, 4, '2022-06-01 13:03:11', 1),
(4, 5, 8, 9, '2022-05-19 22:21:08', 1),
(5, 6, 1, 10, '2022-05-19 22:21:08', 1),
(6, 2, 4, 4, '2022-06-01 13:08:21', 1),
(7, 10, 10, 6, '2022-06-01 13:54:35', 1),
(8, 5, 2, 7, '2022-05-19 22:21:22', 1),
(9, 4, 3, 6, '2022-05-19 22:21:57', 1),
(10, 7, 9, 10, '2022-05-19 22:21:57', 1),
(11, 6, 8, 8, '2022-05-19 22:21:57', 1),
(12, 1, 1, 2, '2022-06-01 13:08:14', 1),
(13, 5, 6, 8, '2022-05-19 22:59:47', 1),
(15, 8, 5, 9, '2022-05-19 23:13:25', 1),
(16, 2, 1, 7, '2022-05-31 20:46:41', 1),
(17, 12, 8, 7, '2022-06-01 13:07:57', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` tinyint(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `clave`, `nombre`, `estado`) VALUES
(1, 'admin@admin.com', '202cb962ac59075b964b07152d234b70', 'Administrador', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
