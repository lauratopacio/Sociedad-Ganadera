-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2016 a las 22:45:25
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cosecha`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `pk_almacen` smallint(6) NOT NULL,
  `fk_sucursal` smallint(6) NOT NULL,
  `fk_nombre_producto` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_existencia` int(11) NOT NULL,
  `fk_proveedor` smallint(6) NOT NULL,
  `fecha_entrada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`pk_almacen`, `fk_sucursal`, `fk_nombre_producto`, `cantidad_existencia`, `fk_proveedor`, `fecha_entrada`) VALUES
(1, 2, 'fertilizante f5430 500grm', 0, 1, '2016-10-05'),
(2, 1, 'fertilizante TS430 ', 0, 1, '2016-10-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidad_asignada`
--

CREATE TABLE `cantidad_asignada` (
  `pk_cantidad_asignada` smallint(6) NOT NULL,
  `fk_productor` smallint(6) NOT NULL,
  `fk_usuario` smallint(6) NOT NULL,
  `cantidad` float NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `pk_carrito` smallint(6) NOT NULL,
  `fk_venta` smallint(6) NOT NULL,
  `fk_nombre_producto` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo_sugerido` float NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`pk_carrito`, `fk_venta`, `fk_nombre_producto`, `cantidad`, `costo_sugerido`, `subtotal`) VALUES
(5, 1, 'fertilizante f5430 500grm', 5, 200, 300),
(7, 1, 'fertilizante f5430 500grm', 2, 40, 80),
(8, 1, 'fertilizante TS430 ', 4, 60, 240),
(9, 1, 'fertilizante f5430 500grm', 3, 40, 120),
(10, 1, 'fertilizante TS430 ', 4, 60, 240),
(11, 1, 'fertilizante f5430 500grm', 3, 40, 120),
(12, 1, 'fertilizante f5430 500grm', 3, 40, 120),
(13, 1, 'fertilizante f5430 500grm', 6, 40, 240),
(14, 14, 'fertilizante f5430 500grm', 3, 40, 120),
(15, 14, 'fertilizante TS430 ', 2, 60, 120),
(16, 16, 'fertilizante f5430 500grm', 3, 40, 120),
(17, 17, 'fertilizante f5430 500grm', 3, 40, 120),
(18, 19, 'fertilizante f5430 500grm', 5, 40, 200),
(19, 26, 'fertilizante f5430 500grm', 2, 40, 80),
(20, 26, 'fertilizante f5430 500grm', 2, 40, 80),
(21, 26, 'fertilizante f5430 500grm', 2, 40, 80),
(22, 26, 'fertilizante f5430 500grm', 3, 40, 120),
(23, 26, 'fertilizante f5430 500grm', 3, 40, 120),
(24, 26, 'fertilizante f5430 500grm', 2, 40, 80),
(25, 26, 'fertilizante f5430 500grm', 2, 40, 80),
(26, 26, 'fertilizante f5430 500grm', 5, 40, 200),
(27, 26, 'herbisida de 500grm Fuerte', 2, 360, 720),
(28, 26, 'Arroz Rojo', 3, 400, 1200),
(29, 26, 'fertilizante TS430 ', 3, 60, 180),
(30, 27, 'fertilizante TS430 ', 2, 60, 120),
(31, 27, 'herbisida de 500grm Fuerte', 4, 360, 1440),
(32, 27, 'Arroz Rojo', 3, 400, 1200),
(33, 27, 'fertilizante TS430 ', 1, 60, 60),
(34, 27, 'herbisida de 500grm Fuerte', 1, 360, 360),
(36, 27, 'fertilizante f5430 500grm', 1, 40, 40),
(37, 29, 'herbisida de 500grm Fuerte', 1, 360, 360),
(38, 30, 'fertilizante TS430 ', 1, 60, 60),
(39, 31, 'fertilizante TS430 ', 2, 60, 120),
(40, 32, 'Arroz Rojo', 3, 400, 1200),
(41, 33, 'fertilizante TS430 ', 2, 60, 120),
(42, 33, 'fertilizante TS430 ', 3, 60, 180),
(47, 37, 'fertilizante TS430 ', 2, 60, 120),
(48, 37, 'Arroz Rojo', 2, 400, 800),
(49, 37, 'herbisida de 500grm Fuerte', 4, 360, 1440),
(50, 38, 'herbisida de 500grm Fuerte', 1, 360, 360),
(52, 40, 'fertilizante TS430 ', 2, 60, 120),
(53, 41, 'Arroz Rojo', 2, 400, 800),
(67, 43, 'herbisida de 500grm Fuerte', 3, 360, 1080),
(88, 48, 'fertilizante f5430 500grm', 1, 40, 40),
(89, 48, 'fertilizante f5430 500grm', 1, 40, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `pk_nombre_producto` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `costo_compra` float NOT NULL,
  `costo_venta` float NOT NULL,
  `fk_categoria` smallint(6) NOT NULL,
  `imagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `status` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`pk_nombre_producto`, `descripcion`, `costo_compra`, `costo_venta`, `fk_categoria`, `imagen`, `status`) VALUES
('Arroz Rojo', 'arroz de tierra finas', 230, 400, 3, '../img/arroz.jpg', 'activo'),
('asd', 'dsa', 12, 32, 4, '../img/page4-img3.jpg', 'no activo'),
('fertilizante f5430 500grm', 'plaga', 20, 40, 1, '../img/fertilizante.jpg', 'no activo'),
('fertilizante TS430 ', 'hormigas', 30, 60, 1, '../img/fertilizante_all_purpose.jpg', 'no activo'),
('herbisida de 500grm Fuerte', 'Para plaga ', 300, 360, 1, '../img/herbicida.jpg', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `pk_categoria` smallint(6) NOT NULL,
  `categoria` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`pk_categoria`, `categoria`) VALUES
(1, 'Abono y fertilizantes'),
(2, 'cereales'),
(3, 'semillas'),
(4, 'Ganaderia'),
(5, 'Fitosanitario'),
(6, 'Cuidado del cultivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_proveedor`
--

CREATE TABLE `compra_proveedor` (
  `pk_compra` smallint(6) NOT NULL,
  `no_factura` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fk_proveedor` smallint(6) NOT NULL,
  `fk_usuario` smallint(6) NOT NULL,
  `fk_nombre_producto` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo_compra` float NOT NULL,
  `fecha_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `folio` smallint(6) NOT NULL,
  `fk_usuario` smallint(6) NOT NULL,
  `fk_productor` smallint(6) DEFAULT NULL,
  `total_vendido` float NOT NULL,
  `fecha_venta` date NOT NULL,
  `status` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entrega`
--

INSERT INTO `entrega` (`folio`, `fk_usuario`, `fk_productor`, `total_vendido`, `fecha_venta`, `status`) VALUES
(1, 1, 1, 400, '2016-10-05', 'entregado'),
(2, 1, 1, 0, '2016-10-06', ''),
(3, 1, 1, 0, '2016-10-06', 'en proceso'),
(4, 1, 1, 0, '2016-10-06', 'en proceso'),
(5, 1, 1, 0, '2016-10-06', 'en proceso'),
(6, 1, 1, 0, '2016-10-06', 'en proceso'),
(9, 2, 1, 0, '2016-10-06', 'en proceso'),
(10, 2, 1, 0, '2016-10-06', 'en proceso'),
(11, 2, NULL, 0, '2016-10-06', 'en proceso'),
(12, 2, NULL, 0, '2016-10-07', 'en proceso'),
(13, 2, NULL, 0, '2016-10-07', 'en proceso'),
(14, 2, 1, 240, '2016-10-19', 'entregado'),
(15, 2, NULL, 0, '2016-10-20', 'en proceso'),
(16, 2, 1, 120, '2016-10-21', 'entregado'),
(17, 2, 1, 120, '2016-10-22', 'entregado'),
(18, 2, NULL, 0, '2016-10-24', 'en proceso'),
(19, 2, 1, 200, '2016-10-25', 'entregado'),
(20, 2, NULL, 0, '2016-10-27', 'en proceso'),
(22, 2, NULL, 0, '2016-10-27', 'en proceso'),
(23, 2, NULL, 0, '2016-10-27', 'en proceso'),
(25, 2, NULL, 0, '2016-10-27', 'en proceso'),
(26, 2, 1, 1560, '2016-10-27', 'entregado'),
(27, 2, 1, 2820, '2016-10-28', 'entregado'),
(28, 2, NULL, 0, '2016-10-28', 'en proceso'),
(29, 2, NULL, 0, '2016-10-28', 'en proceso'),
(30, 2, NULL, 0, '2016-10-28', 'en proceso'),
(31, 2, NULL, 0, '2016-10-28', 'en proceso'),
(32, 2, NULL, 0, '2016-10-28', 'en proceso'),
(33, 2, 1, 300, '2016-10-28', 'entregado'),
(37, 2, 1, 2360, '2016-10-28', 'entregado'),
(38, 2, 1, 360, '2016-10-28', 'entregado'),
(40, 2, 1, 120, '2016-10-28', 'entregado'),
(41, 2, 1, 800, '2016-10-28', 'entregado'),
(42, 2, NULL, 0, '2016-10-28', 'en proceso'),
(43, 2, 1, 1080, '2016-10-30', 'entregado'),
(46, 2, NULL, 0, '2016-10-30', 'en proceso'),
(47, 2, NULL, 0, '2016-10-30', 'en proceso'),
(48, 2, 1, 80, '2016-10-30', 'entregado'),
(49, 2, NULL, 0, '2016-10-30', 'en proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `pk_gasto` smallint(6) NOT NULL,
  `folio_gastos` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `folio_factura` text COLLATE utf8_spanish_ci,
  `empresa` varchar(59) COLLATE utf8_spanish_ci NOT NULL,
  `concepto` text COLLATE utf8_spanish_ci NOT NULL,
  `total` float NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci,
  `status` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_gasto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`pk_gasto`, `folio_gastos`, `folio_factura`, `empresa`, `concepto`, `total`, `observaciones`, `status`, `fecha_gasto`) VALUES
(14, '2', '', 'kevin', 'desarrollo', 123, '', 'Pendiente', '2016-10-18'),
(15, '27', '', 'tabacos ', 'pago a jornaleros ', 3000, 'NINGUNA', 'No Pagado', '2016-10-18'),
(16, '35', '9098434', 'topacio', 'ninguno', 323444, 'ninguno', 'Pagado', '2016-10-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productor`
--

CREATE TABLE `productor` (
  `pk_productor` smallint(6) NOT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellidop` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellidom` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `calle` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `colonia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `localidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productor`
--

INSERT INTO `productor` (`pk_productor`, `rfc`, `nombre`, `apellidop`, `apellidom`, `calle`, `numero`, `colonia`, `localidad`, `telefono`) VALUES
(1, '434drifgdf', 'grecia perlita', 'valdez ', 'morones', 'juan escutia', 39, 'juan escutia', 'tuxpan nayarit', 2322112);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `pk_proveedor` smallint(6) NOT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellidop` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellidom` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `calle` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `localidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `municipio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `fecha_registro` date NOT NULL,
  `correo_electronico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fk_tipo_proveedor` smallint(6) NOT NULL,
  `status` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`pk_proveedor`, `rfc`, `nombre`, `apellidop`, `apellidom`, `calle`, `numero`, `localidad`, `municipio`, `telefono`, `fecha_registro`, `correo_electronico`, `fk_tipo_proveedor`, `status`) VALUES
(1, '8283DG4', 'laura topacio', 'valdez', 'morones', 'juan escutia', 23, 'tuxpan ', 'tuxpan', 2322112, '2016-10-05', 'laurita@hotmail.com', 1, 'disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `pk_sucursal` smallint(6) NOT NULL,
  `sucursal` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`pk_sucursal`, `sucursal`) VALUES
(1, 'santiago'),
(2, 'ruiz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proveedor`
--

CREATE TABLE `tipo_proveedor` (
  `pk_tipo_proveedor` smallint(6) NOT NULL,
  `tipo_proveedor` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_proveedor`
--

INSERT INTO `tipo_proveedor` (`pk_tipo_proveedor`, `tipo_proveedor`) VALUES
(1, 'fertilizantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `pk_tipo_usuario` smallint(6) NOT NULL,
  `tipo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`pk_tipo_usuario`, `tipo`) VALUES
(1, 'administrador'),
(2, 'empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `pk_usuario` smallint(6) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellidop` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellidom` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `user` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `fk_tipo_usuario` smallint(6) NOT NULL,
  `fk_sucursal` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`pk_usuario`, `nombre`, `apellidop`, `apellidom`, `user`, `pass`, `fk_tipo_usuario`, `fk_sucursal`) VALUES
(1, 'cecilio', 'martinez', 'santiago', 'chilo', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1),
(2, 'laura topacio', 'valdez', 'morones', 'laurita', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`pk_almacen`),
  ADD KEY `fk_sucursal` (`fk_sucursal`),
  ADD KEY `fk_nombre_producto` (`fk_nombre_producto`),
  ADD KEY `fk_proveedor` (`fk_proveedor`);

--
-- Indices de la tabla `cantidad_asignada`
--
ALTER TABLE `cantidad_asignada`
  ADD PRIMARY KEY (`pk_cantidad_asignada`),
  ADD KEY `fk_productor` (`fk_productor`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`pk_carrito`),
  ADD KEY `fk_venta` (`fk_venta`),
  ADD KEY `fk_nombre_producto` (`fk_nombre_producto`);

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`pk_nombre_producto`),
  ADD KEY `fk_categoria` (`fk_categoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`pk_categoria`);

--
-- Indices de la tabla `compra_proveedor`
--
ALTER TABLE `compra_proveedor`
  ADD PRIMARY KEY (`pk_compra`),
  ADD KEY `fk_proveedor` (`fk_proveedor`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `fk_nombre_producto` (`fk_nombre_producto`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `fk_productor` (`fk_productor`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`pk_gasto`);

--
-- Indices de la tabla `productor`
--
ALTER TABLE `productor`
  ADD PRIMARY KEY (`pk_productor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`pk_proveedor`),
  ADD KEY `fk_tipo_proveedor` (`fk_tipo_proveedor`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`pk_sucursal`);

--
-- Indices de la tabla `tipo_proveedor`
--
ALTER TABLE `tipo_proveedor`
  ADD PRIMARY KEY (`pk_tipo_proveedor`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`pk_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`pk_usuario`),
  ADD KEY `fk_tipo_usuario` (`fk_tipo_usuario`),
  ADD KEY `fk_sucursal` (`fk_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `pk_almacen` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cantidad_asignada`
--
ALTER TABLE `cantidad_asignada`
  MODIFY `pk_cantidad_asignada` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `pk_carrito` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `pk_categoria` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `compra_proveedor`
--
ALTER TABLE `compra_proveedor`
  MODIFY `pk_compra` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `folio` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `pk_gasto` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `productor`
--
ALTER TABLE `productor`
  MODIFY `pk_productor` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `pk_proveedor` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `pk_sucursal` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_proveedor`
--
ALTER TABLE `tipo_proveedor`
  MODIFY `pk_tipo_proveedor` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `pk_tipo_usuario` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `pk_usuario` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD CONSTRAINT `almacen_ibfk_1` FOREIGN KEY (`fk_sucursal`) REFERENCES `sucursal` (`pk_sucursal`),
  ADD CONSTRAINT `almacen_ibfk_2` FOREIGN KEY (`fk_nombre_producto`) REFERENCES `catalogo` (`pk_nombre_producto`),
  ADD CONSTRAINT `almacen_ibfk_3` FOREIGN KEY (`fk_proveedor`) REFERENCES `proveedor` (`pk_proveedor`);

--
-- Filtros para la tabla `cantidad_asignada`
--
ALTER TABLE `cantidad_asignada`
  ADD CONSTRAINT `cantidad_asignada_ibfk_1` FOREIGN KEY (`fk_productor`) REFERENCES `productor` (`pk_productor`),
  ADD CONSTRAINT `cantidad_asignada_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`pk_usuario`);

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`fk_venta`) REFERENCES `entrega` (`folio`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`fk_nombre_producto`) REFERENCES `catalogo` (`pk_nombre_producto`);

--
-- Filtros para la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD CONSTRAINT `catalogo_ibfk_1` FOREIGN KEY (`fk_categoria`) REFERENCES `categoria` (`pk_categoria`);

--
-- Filtros para la tabla `compra_proveedor`
--
ALTER TABLE `compra_proveedor`
  ADD CONSTRAINT `compra_proveedor_ibfk_1` FOREIGN KEY (`fk_proveedor`) REFERENCES `proveedor` (`pk_proveedor`),
  ADD CONSTRAINT `compra_proveedor_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`pk_usuario`),
  ADD CONSTRAINT `compra_proveedor_ibfk_3` FOREIGN KEY (`fk_nombre_producto`) REFERENCES `catalogo` (`pk_nombre_producto`);

--
-- Filtros para la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `entrega_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`pk_usuario`),
  ADD CONSTRAINT `entrega_ibfk_2` FOREIGN KEY (`fk_productor`) REFERENCES `productor` (`pk_productor`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`fk_tipo_proveedor`) REFERENCES `tipo_proveedor` (`pk_tipo_proveedor`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fk_tipo_usuario`) REFERENCES `tipo_usuario` (`pk_tipo_usuario`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`fk_sucursal`) REFERENCES `sucursal` (`pk_sucursal`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
