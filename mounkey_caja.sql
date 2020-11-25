-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2020 a las 22:05:40
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sis_inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(8, 'herramientas', '2020-07-08 20:27:07'),
(10, 'tecnología', '2020-07-06 21:12:37'),
(33, 'otros', '2020-07-08 20:21:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `rut` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `rut`, `email`, `telefono`, `direccion`, `compras`, `ultima_compra`, `fecha`) VALUES
(1, 'gladys gomez', '10943365-9', 'gladys2020@gmail.com', '+56962451318', 'san rafael 125', 4, '0000-00-00 00:00:00', '2020-07-09 22:02:12'),
(2, 'victor soto', '96363262-5', 'victor2020@yahoo.es', '+56975813695', 'avenida ibañez', 3, '0000-00-00 00:00:00', '2020-07-09 21:44:54'),
(3, 'ricardo bustos', '12550689-9', 'ricardob@gmail.com', '+56975885658', 'villa los esteros 777', 0, '0000-00-00 00:00:00', '2020-07-09 22:09:49'),
(4, 'juan grover', '15677898-5', 'mounkey@gmail.com', '+56998565478', 'los notros 25', 0, '0000-00-00 00:00:00', '2020-07-09 22:09:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_ventas`
--

CREATE TABLE `historial_ventas` (
  `id_historial` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text NOT NULL,
  `total_pagado` float NOT NULL,
  `total_pendiente_pago` float NOT NULL,
  `descuento` float NOT NULL,
  `observacion` varchar(100) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_ventas`
--

INSERT INTO `historial_ventas` (`id_historial`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `total_pagado`, `total_pendiente_pago`, `descuento`, `observacion`, `fecha`) VALUES
(1, 1, 1, 1, '[{\"id\":\"6\",\"descripcion\":\"lector código de barras\",\"cantidad\":\"3\",\"stock\":\"27\",\"precio\":\"25000\",\"total\":\"75000\"}]', 0, 75000, 75000, 'Efectivo', 75000, 0, 0, 'ninguna', '2020-07-04 01:18:12'),
(2, 2, 2, 1, '[{\"id\":\"8\",\"descripcion\":\"impresora termica\",\"cantidad\":\"1\",\"stock\":\"49\",\"precio\":\"180000\",\"total\":\"180000\"},{\"id\":\"7\",\"descripcion\":\"martillo\",\"cantidad\":\"2\",\"stock\":\"48\",\"precio\":\"5000\",\"total\":\"10000\"}]', 0, 190000, 190000, 'Efectivo', 190000, 0, 0, 'ninguna', '2020-07-06 20:45:32'),
(4, 3, 1, 1, '[{\"id\":\"6\",\"descripcion\":\"lector código de barras\",\"cantidad\":\"1\",\"stock\":\"26\",\"precio\":\"25000\",\"total\":\"25000\"}]', 0, 25000, 25000, 'Efectivo', 10000, 15000, 0, 'ninguna', '2020-07-06 21:46:50'),
(5, 3, 1, 1, '[{\"id\":\"6\",\"descripcion\":\"lector código de barras\",\"cantidad\":\"1\",\"stock\":\"26\",\"precio\":\"25000\",\"total\":\"25000\"}]', 0, 25000, 25000, 'Cheque', 5000, 10000, 0, 'ninguna', '2020-07-06 21:59:15'),
(6, 3, 1, 1, '[{\"id\":\"6\",\"descripcion\":\"lector código de barras\",\"cantidad\":\"1\",\"stock\":\"26\",\"precio\":\"25000\",\"total\":\"25000\"}]', 0, 25000, 25000, 'Efectivo', 10000, 0, 0, 'ninguna', '2020-07-06 21:59:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `codigoBarra` text COLLATE utf8_spanish_ci NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `codigoBarra`, `id_proveedor`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(3, 8, '50234887', '50234887', 1, 'prueba', 'vistas/img/productos/default/anonymous.png', 15, 80000, 15000, 0, '2020-07-01 21:45:37'),
(4, 10, '92364696', '', 1, 'smartphone Huawei', 'vistas/img/productos/92364696/780.jpg', 15, 1500000, 50000, 0, '2020-07-06 20:39:24'),
(5, 10, '987456321', '', 1, 'notebook', 'vistas/img/productos/987456321/596.jpg', 50, 500000, 15000, 0, '2020-07-06 20:37:39'),
(6, 10, '129785', '', 2, 'lector código de barras', 'vistas/img/productos/129785/246.jpg', 26, 450000, 25000, 4, '2020-07-06 21:46:50'),
(7, 8, '490369', '', 1, 'martillo', 'vistas/img/productos/490369/520.jpg', 48, 150000, 5000, 2, '2020-07-06 21:11:15'),
(8, 10, '106893047125', '', 2, 'impresora termica', 'vistas/img/productos/106893047125/483.jpg', 49, 2000000, 180000, 1, '2020-07-06 21:46:15'),
(9, 33, '047895110263', '', 8, 'manantial', 'vistas/img/productos/047895110263/237.jpg', 50, 500000, 15990, 0, '2020-07-09 20:25:31'),
(10, 33, '9780829753622', '', 1, 'libro cristiano', 'vistas/img/productos/9780829753622/383.jpg', 8, 500000, 15000, 0, '2020-07-09 22:25:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `rut` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nro_cuenta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `banco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `rut`, `ciudad`, `nro_cuenta`, `banco`, `telefono`, `email`) VALUES
(1, 'sodimac', '50882999-0', 'puerto montt', '2569845686', 'banco bci', '+56995080618', 'sodimac@gmail.com'),
(2, 'pc factory', '88887568-9', 'puerto montt', '569522952299', 'banco condell', '+56975813695', 'pcfactory@gmail.com'),
(8, 'aguas mantial', '999999959-0', 'puerto montt', '25665658534', 'banco bci', '+56962451318', 'victor2020@yahoo.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `foto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'rodrigo', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/795.jpg', 1, '0000-00-00 00:00:00', '2020-07-11 19:45:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `total_pagado` float NOT NULL,
  `total_pendiente_pago` float NOT NULL,
  `descuento` int(50) NOT NULL,
  `costo_extra` int(11) NOT NULL,
  `observacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `total_pagado`, `total_pendiente_pago`, `descuento`, `costo_extra`, `observacion`, `fecha`) VALUES
(1, 1, 1, 1, '[{\"id\":\"6\",\"descripcion\":\"lector código de barras\",\"cantidad\":\"3\",\"stock\":\"27\",\"precio\":\"25000\",\"total\":\"75000\"}]', 0, 75000, 75000, 'Efectivo', 75000, 0, 0, 0, 'ninguna', '2020-07-04 01:18:12'),
(2, 2, 2, 1, '[{\"id\":\"8\",\"descripcion\":\"impresora termica\",\"cantidad\":\"1\",\"stock\":\"49\",\"precio\":\"180000\",\"total\":\"180000\"},{\"id\":\"7\",\"descripcion\":\"martillo\",\"cantidad\":\"2\",\"stock\":\"48\",\"precio\":\"5000\",\"total\":\"10000\"}]', 0, 190000, 190000, 'Efectivo', 190000, 0, 0, 0, 'ninguna', '2020-07-06 20:45:32'),
(4, 3, 1, 1, '[{\"id\":\"6\",\"descripcion\":\"lector código de barras\",\"cantidad\":\"1\",\"stock\":\"26\",\"precio\":\"25000\",\"total\":\"25000\"}]', 0, 25000, 25000, 'Efectivo', 10000, 0, 0, 0, 'ninguna', '2020-07-06 21:59:47');

--
-- Disparadores `ventas`
--
DELIMITER $$
CREATE TRIGGER `eliminar_Ventas` AFTER DELETE ON `ventas` FOR EACH ROW BEGIN
    DELETE 
      FROM historial_ventas
     WHERE codigo = old.codigo;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertaVentas` AFTER INSERT ON `ventas` FOR EACH ROW BEGIN
    
        DECLARE existe INT;
    
        SELECT COUNT(*) INTO existe FROM historial_ventas WHERE codigo = new.codigo;
    
          IF (existe>0) THEN
	UPDATE historial_ventas a 
    SET a.id_cliente = new.id_cliente,
    a.id_vendedor = new.id_vendedor,
    a.productos = new.productos,
    a.impuesto = new.impuesto,
    a.neto = new.neto,
    a.total = new.total,
    a.metodo_pago = new.metodo_pago,
    a.total_pagado = new.total_pagado,
    a.total_pendiente_pago = new.total_pendiente_pago,
    a.descuento = new.descuento,
    a.observacion = new.observacion,
    a.fecha = new.fecha
    WHERE a.codigo=new.codigo;
	ELSE
	INSERT INTO historial_ventas (codigo, id_cliente, id_vendedor, productos, impuesto, neto, total, metodo_pago, total_pagado, total_pendiente_pago, descuento, observacion, fecha) VALUES (new.codigo, new.id_cliente, new.id_vendedor, new.productos, new.impuesto, new.neto, new.total, new.metodo_pago, new.total_pagado, new.total_pendiente_pago, new.descuento, new.observacion, new.fecha);
      END IF;
   
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `modifica_insertaVentas` AFTER UPDATE ON `ventas` FOR EACH ROW BEGIN
    
        DECLARE existe INT;
    
        SELECT COUNT(*) INTO existe FROM historial_ventas WHERE codigo = new.codigo;
     
     
    
	INSERT INTO historial_ventas (codigo, id_cliente, id_vendedor, productos, impuesto, neto, total, metodo_pago, total_pagado, total_pendiente_pago, descuento, observacion, fecha) VALUES (new.codigo, new.id_cliente, new.id_vendedor, new.productos, new.impuesto, new.neto, new.total, new.metodo_pago, new.total_pagado, new.total_pendiente_pago, new.descuento, new.observacion, new.fecha);
	
   
    END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial_ventas`
--
ALTER TABLE `historial_ventas`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historial_ventas`
--
ALTER TABLE `historial_ventas`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
