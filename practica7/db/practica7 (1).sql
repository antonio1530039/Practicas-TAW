-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2018 a las 02:52:06
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica7`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio_unitario`, `deleted`) VALUES
(5, 'Coca cola 600 ml', '20.00', 0),
(6, 'Cigarros Marlboro 100s', '50.00', 0),
(7, 'Galletas Emperador', '12.00', 0),
(8, 'Crunch', '5.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `deleted`) VALUES
(11, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0),
(14, 'mario', 'de2f15d014d40b93578d255e6221fd60', 0),
(15, 'test', '098f6bcd4621d373cade4e832627b4f6', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `monto`, `fecha`, `deleted`) VALUES
(21, '124.00', '2018-05-15', 0),
(22, '5200.00', '2018-05-15', 0),
(23, '82.00', '2018-05-15', 0),
(25, '605.00', '2018-05-15', 0),
(26, '142.00', '2018-05-15', 0),
(27, '256.00', '2018-05-15', 0),
(28, '180.00', '2018-05-15', 0),
(29, '44.00', '2018-05-17', 0),
(30, '640.00', '2018-05-17', 0),
(31, '880.00', '2018-05-17', 0),
(32, '200.00', '2018-05-17', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_producto`
--

CREATE TABLE `venta_producto` (
  `id` int(11) NOT NULL,
  `folio_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `importe` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta_producto`
--

INSERT INTO `venta_producto` (`id`, `folio_venta`, `id_producto`, `cantidad`, `precio_venta`, `importe`) VALUES
(6, 21, 6, 2, '52.00', '104.00'),
(7, 21, 5, 1, '20.00', '20.00'),
(8, 22, 6, 100, '52.00', '5200.00'),
(9, 23, 5, 1, '20.00', '20.00'),
(10, 23, 6, 1, '50.00', '50.00'),
(11, 23, 7, 1, '12.00', '12.00'),
(12, 25, 5, 30, '20.00', '600.00'),
(13, 25, 8, 1, '5.00', '5.00'),
(14, 26, 7, 1, '12.00', '12.00'),
(15, 26, 6, 2, '50.00', '100.00'),
(16, 26, 8, 2, '5.00', '10.00'),
(17, 26, 5, 1, '20.00', '20.00'),
(18, 27, 5, 8, '20.00', '160.00'),
(19, 27, 7, 8, '12.00', '96.00'),
(20, 28, 5, 9, '20.00', '180.00'),
(21, 29, 5, 1, '20.00', '20.00'),
(22, 29, 7, 1, '12.00', '12.00'),
(23, 29, 7, 1, '12.00', '12.00'),
(24, 30, 5, 8, '20.00', '160.00'),
(25, 30, 5, 8, '20.00', '160.00'),
(26, 30, 5, 8, '20.00', '160.00'),
(27, 30, 5, 8, '20.00', '160.00'),
(28, 31, 5, 20, '20.00', '400.00'),
(29, 31, 7, 20, '12.00', '240.00'),
(30, 31, 7, 20, '12.00', '240.00'),
(31, 32, 5, 10, '20.00', '200.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folio_venta` (`folio_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  ADD CONSTRAINT `venta_producto_ibfk_1` FOREIGN KEY (`folio_venta`) REFERENCES `venta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `venta_producto_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
