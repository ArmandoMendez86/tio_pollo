-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2024 a las 07:54:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tio_pollo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_venta`
--

CREATE TABLE `detalles_venta` (
  `id` int(11) NOT NULL,
  `productos` text NOT NULL,
  `n_orden` varchar(10) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `metodo_pago` varchar(20) NOT NULL,
  `cliente` varchar(150) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalles_venta`
--

INSERT INTO `detalles_venta` (`id`, `productos`, `n_orden`, `fecha`, `metodo_pago`, `cliente`, `telefono`) VALUES
(3, '[{\"id_producto\":\"4\",\"id_especialidad\":\"1\",\"cantidad\":\"1\",\"descuento\":0,\"n_orden\":\"41473\",\"id_empleado\":1},{\"id_producto\":\"3\",\"id_especialidad\":\"9\",\"cantidad\":\"1\",\"descuento\":0,\"n_orden\":\"41473\",\"id_empleado\":1},{\"id_producto\":\"6\",\"id_especialidad\":\"1\",\"cantidad\":\"1\",\"descuento\":0,\"n_orden\":\"41473\",\"id_empleado\":1},{\"id_producto\":\"12\",\"id_especialidad\":\"1\",\"cantidad\":\"2\",\"descuento\":0,\"n_orden\":\"41473\",\"id_empleado\":1}]', '41473', '2024-08-06 01:48:04', '', '', ''),
(4, '[{\"id_producto\":\"11\",\"id_especialidad\":\"1\",\"cantidad\":\"1\",\"descuento\":0,\"n_orden\":\"93138\",\"id_empleado\":1},{\"id_producto\":\"12\",\"id_especialidad\":\"1\",\"cantidad\":\"1\",\"descuento\":0,\"n_orden\":\"93138\",\"id_empleado\":1},{\"id_producto\":\"18\",\"id_especialidad\":\"1\",\"cantidad\":\"3\",\"descuento\":0,\"n_orden\":\"93138\",\"id_empleado\":1}]', '93138', '2024-08-06 01:50:40', '', '', ''),
(5, '[{\"id_producto\":\"13\",\"id_especialidad\":\"1\",\"cantidad\":\"1\",\"descuento\":0,\"n_orden\":\"76815\",\"id_empleado\":1},{\"id_producto\":\"12\",\"id_especialidad\":\"1\",\"cantidad\":\"2\",\"descuento\":0,\"n_orden\":\"76815\",\"id_empleado\":1}]', '76815', '2024-08-06 03:01:48', 'efectivo', 'Mirna luz', '+527474592723'),
(6, '[{\"id_producto\":\"13\",\"id_especialidad\":\"1\",\"cantidad\":\"1\",\"descuento\":0,\"n_orden\":\"45573\",\"id_empleado\":1},{\"id_producto\":\"16\",\"id_especialidad\":\"1\",\"cantidad\":\"1\",\"descuento\":0,\"n_orden\":\"45573\",\"id_empleado\":1}]', '45573', '2024-08-06 03:20:29', 'efectivo', 'Gumercindo mendez lopez', '+527471306291'),
(7, '[{\"id_producto\":\"7\",\"id_especialidad\":\"1\",\"cantidad\":\"2\",\"descuento\":0,\"n_orden\":\"67949\",\"id_empleado\":1},{\"id_producto\":\"9\",\"id_especialidad\":\"1\",\"cantidad\":\"1\",\"descuento\":0,\"n_orden\":\"67949\",\"id_empleado\":1}]', '67949', '2024-08-06 03:22:12', 'efectivo', 'Mario mendez rios', '+52747122457');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `usuario` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `usuario`, `password`, `estado`) VALUES
(1, 'Armando ', 'Méndez rios', 'Iory86', '', 1),
(2, 'Mirna luz', 'Rios leyva', 'Miss', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `sabor` varchar(150) NOT NULL,
  `producto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `sabor`, `producto`) VALUES
(1, 'Natural', 'pollo'),
(2, 'Habanero', 'pollo'),
(3, 'Adobado', 'pollo'),
(4, 'Enchilado', 'pollo'),
(5, 'BBQ', 'pollo'),
(6, 'BBQ Picante', 'pollo'),
(7, 'Piña - Habanero', 'pollo'),
(8, 'Mango - Habanero', 'pollo'),
(9, 'Tamarindo - Chipotle', 'pollo'),
(10, 'A la mayonesa', 'pollo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `porcion` varchar(10) NOT NULL,
  `unidad` varchar(10) NOT NULL,
  `categoria` varchar(10) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `producto`, `porcion`, `unidad`, `categoria`, `precio`, `descripcion`, `img`) VALUES
(1, 'pollo', '1', 'pza', 'carne', 250, 'Entero', 'pollos/generica.jpg'),
(2, 'pollo', '0.75', 'pza', 'carne', 175, 'Tres cuartos', 'pollos/generica.jpg'),
(3, 'pollo', '0.5', 'pza', 'carne', 125, 'Medio', 'pollos/generica.jpg'),
(4, 'pollo', '0.25', 'pza', 'carne', 70, 'Un cuarto', 'pollos/generica.jpg'),
(5, 'carne asada', '1', 'platillo', 'carne', 120, 'Sirloin', 'carnes/sirloin.jpg'),
(6, 'costilla de cerdo', '1', 'kg', 'carne', 230, 'Un kilogramo', 'carnes/costilla_cerdo.jpg'),
(7, 'costilla de cerdo', '0.5', 'kg', 'carne', 165, 'Medio', 'carnes/costilla_cerdo.jpg'),
(9, 'costilla de cerdo', '0.25', 'kg', 'carne', 80, 'Un cuarto', 'carnes/costilla_cerdo.jpg'),
(10, 'arroz', '1', 'lt', 'extras', 50, 'Un litro', 'extras/generica.jpg'),
(11, 'arroz', '0.5', 'lt', 'extras', 25, 'Medio litro', 'extras/generica.jpg'),
(12, 'arroz', '1', 'bolsita', 'extras', 15, 'Bolsita de arroz', 'extras/generica.jpg'),
(13, 'espaguetti', '1', 'lt', 'extras', 50, 'Un litro', 'extras/spaguetti.jpg'),
(14, 'espaguetti', '0.5', 'lt', 'extras', 25, 'Medio litro', 'extras/spaguetti.jpg'),
(15, 'espaguetti', '1', 'bolsita', 'extras', 15, 'Bolsita de spaguetti', 'extras/spaguetti.jpg'),
(16, 'Frijoles charros', '1', 'lt', 'extras', 75, 'Un litro', 'extras/frijoles_charros.jpg'),
(17, 'Frijoles charros', '0.5', 'lt', 'extras', 35, 'Medio litro', 'extras/frijoles_charros.jpg'),
(18, 'Salsa verde', '1', 'pza', 'extras', 10, 'Bolsita', 'extras/salsa_verde.jpg'),
(19, 'Salsa roja', '1', 'pza', 'extras', 10, 'Bolsita', 'extras/salsa_roja.jpg'),
(20, 'carne asada', '1', 'kg', 'carne', 230, 'Sirloin', 'carnes/sirloin.jpg'),
(21, 'carne asada', '0.5', 'kg', 'carne', 165, 'Sirloin', 'carnes/sirloin.jpg'),
(23, 'arrachera', '1', 'kg', 'carne', 230, 'Un kilo', 'carnes/arrachera.jpg'),
(24, 'arrachera', '0.5', 'kg', 'carne', 165, 'Medio kilo', 'carnes/arrachera.jpg'),
(25, 'arrachera', '0.25', 'kg', 'carne', 80, 'Un cuarto', 'carnes/arrachera.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `n_orden` varchar(10) NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `id_producto`, `id_especialidad`, `cantidad`, `descuento`, `fecha`, `n_orden`, `id_empleado`) VALUES
(69, 4, 1, 1, 0, '2024-08-06 01:48:04', '41473', 1),
(70, 3, 9, 1, 0, '2024-08-06 01:48:04', '41473', 1),
(71, 6, 1, 1, 0, '2024-08-06 01:48:04', '41473', 1),
(72, 12, 1, 2, 0, '2024-08-06 01:48:04', '41473', 1),
(73, 11, 1, 1, 0, '2024-08-06 01:50:40', '93138', 1),
(74, 12, 1, 1, 0, '2024-08-06 01:50:40', '93138', 1),
(75, 18, 1, 3, 0, '2024-08-06 01:50:40', '93138', 1),
(76, 13, 1, 1, 0, '2024-08-06 03:01:48', '76815', 1),
(77, 12, 1, 2, 0, '2024-08-06 03:01:48', '76815', 1),
(78, 13, 1, 1, 0, '2024-08-06 03:20:29', '45573', 1),
(79, 16, 1, 1, 0, '2024-08-06 03:20:29', '45573', 1),
(80, 7, 1, 2, 5, '2024-08-06 04:45:06', '67949', 1),
(81, 9, 1, 1, 5, '2024-08-06 04:45:10', '67949', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_especialidad` (`id_especialidad`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
