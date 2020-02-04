-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2020 a las 16:28:38
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_de_cachimbas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cachimbas`
--

CREATE TABLE `cachimbas` (
  `id` int(11) NOT NULL,
  `marca` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` double NOT NULL,
  `stock` int(11) NOT NULL,
  `f_create` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cachimbas`
--

INSERT INTO `cachimbas` (`id`, `marca`, `modelo`, `color`, `precio`, `stock`, `f_create`) VALUES
(1, 'Kaya', 'PNX480', 'Verde', 41.95, 5, '2020-02-03'),
(2, 'Kaya', 'SPN-480', 'Azul', 44.95, 23, '2020-02-04'),
(3, 'Kaya', 'SPN-480', 'Rosa', 44.95, 17, '2020-02-04'),
(4, 'Kaya', 'Elox-730', 'Azul', 119.95, 10, '2020-02-04'),
(5, 'Kaya', 'Elox-730', 'Negra', 119.95, 10, '2020-02-04'),
(6, 'Kaya', 'Elox-730', 'Roja', 119.95, 10, '2020-02-04'),
(7, 'Starbuzz', 'Wood', 'Negra', 169.95, 7, '2020-02-04'),
(8, 'Starbuzz', 'Challanger', 'Azul', 169.95, 7, '2020-02-04'),
(9, 'Starbuzz', 'Wood', 'Roja', 169.95, 7, '2020-02-04'),
(10, 'Starbuzz', 'Blanca', 'Negra', 169.95, 7, '2020-02-04'),
(11, 'Caesar', 'Kaiser', 'Negra', 89, 34, '2020-02-04'),
(12, 'Caesar', 'Kaiser', 'Azul', 89, 24, '2020-02-04'),
(13, 'Caesar', 'Kaiser', 'Roja', 89, 34, '2020-02-04'),
(14, 'Caesar', 'Final', 'Negra', 59.9, 14, '2020-02-04'),
(15, 'Caesar', 'Final', 'Roja', 59.9, 14, '2020-02-04'),
(16, 'Caesar', 'Final', 'Naranja', 59.9, 12, '2020-02-04'),
(17, 'Aladin', 'MVP', 'Negra', 99.9, 11, '2020-02-04'),
(18, 'Aladin', 'MVP', 'Blanca', 99.9, 8, '2020-02-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `importe` double NOT NULL,
  `f_create` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_usuarios`, `direccion`, `importe`, `f_create`) VALUES
(1, 1, 'C/ nombre n: 17', 69.95, '2020-02-04'),
(3, 2, 'C/ nombreParolo n: 13', 69.95, '2020-02-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_cachimbas`
--

CREATE TABLE `pedido_cachimbas` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_cachimba` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `f_create` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedido_cachimbas`
--

INSERT INTO `pedido_cachimbas` (`id`, `id_pedido`, `id_cachimba`, `cantidad`, `f_create`) VALUES
(1, 1, 4, 2, '2020-02-04'),
(2, 1, 5, 1, '2020-02-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `f_create` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `f_create`) VALUES
(1, 'Daniel', 'Luque Castro', 'daniluquecastro@gmail.com', 'passwordprueba', '2020-02-03'),
(2, 'Pablo', 'Rodriguez Lopez', 'pablo.rodriguez@adaits.es', 'password', '2020-02-04'),
(3, 'Ricardo', 'Cabrera Valero', 'ricardo.cabrera@adaits.es', 'password', '2020-02-04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cachimbas`
--
ALTER TABLE `cachimbas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `pedido_cachimbas`
--
ALTER TABLE `pedido_cachimbas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_cachimba` (`id_cachimba`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cachimbas`
--
ALTER TABLE `cachimbas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedido_cachimbas`
--
ALTER TABLE `pedido_cachimbas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `pedido_cachimbas`
--
ALTER TABLE `pedido_cachimbas`
  ADD CONSTRAINT `pedido_cachimbas_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `pedido_cachimbas_ibfk_2` FOREIGN KEY (`id_cachimba`) REFERENCES `cachimbas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
