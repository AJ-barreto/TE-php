-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2025 a las 23:07:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `te`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `usuario`, `comentario`, `fecha`) VALUES
(1, 'Formateo', 'Comentario solo para ver que funcionan luego de formatear el pc y descargar todo', '2025-02-20 21:05:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `contra` varchar(80) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `contra`, `Nombres`, `Telefono`, `Estado`, `Usuario`, `Correo`) VALUES
(2, '9b871512327c09ce91dd649b3f96a63b7408ef267c8cc57101', 'sujeto1', '2', '2', 'El sujeto', 'elsujeto@gmail.com'),
(3, '2', 'Andrés', '3167196374', 'Soltero', 'aj', 'andres@gmail.com'),
(4, 'a4ayc/80/OGda4BO/1o/V0etpOqiLx1JwB5S3beHW0s=', 'Maty', '3167196374', 'Soltera', 'Lamaga67', 'Maty@gmail.com'),
(5, '043a718774c572bd8a25adbeb1bfcd5c0256ae11cecf9f9c3f', 'a', NULL, NULL, 'a', 'a'),
(6, 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9', 'b', '', '', 'b', 'b'),
(7, '594e519ae499312b29433b7dd8a97ff068defcba9755b6d5d0', 'x', NULL, NULL, 'x', 'x'),
(8, '$2y$10$V0tR2hQT0qKyzf7n7To.quWCM7Y2kn4azZ/thTzuIP4', 'q', NULL, NULL, 'q', 'q'),
(9, '$2y$10$uZxOWoUs8WyB0HK7iSIjbueTxJzsYHhl0i6OAMK1T67dgSZnQc6hi', 'w', NULL, NULL, 'w', 'w'),
(10, '$2y$10$TI/ncLP1yPMo4ifkffUnr.MfouEKIaMZkbtlP.DjUG2NV12WZuqgG', 'e', NULL, NULL, 'e', 'e'),
(11, 'L?H^!?lA??{k???Z??@?GoP ?RoP`?', 'r', NULL, NULL, 'r', 'r'),
(19, '252f10c83610ebca1a059c0bae8255eba2f95be4d1d7bcfa89d7248a82d9f111', 'f', NULL, NULL, 'f', 'f'),
(20, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Andres Barreto', NULL, NULL, 'AJ-BP', 'andres@gmail.com'),
(21, 'b9d5d8eaf27e55734042ae02207cb3683ea4e63297e443545df80fa767e6f0e4', 'qw', '123', '123', 'qw', 'maestrozen190497@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlace`
--

CREATE TABLE `enlace` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `url` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enlace`
--

INSERT INTO `enlace` (`id`, `nombre`, `tipo`, `url`) VALUES
(1, '1', '1', '1'),
(4, 'Hola', 'Hola', 'Hola'),
(5, 'Formateo', 'Prueba Edit', 'Formateo ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 'Comentarios Luego del formateo', 'Este comentario va a funcionar solamente para observar que todo funciona', '2025-02-20 20:53:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `enlace`
--
ALTER TABLE `enlace`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `enlace`
--
ALTER TABLE `enlace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
