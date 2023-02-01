-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2021 a las 01:42:33
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `madridmadtour`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorianovedades`
--

CREATE TABLE `categorianovedades` (
  `nombrecategoria` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriatour`
--

CREATE TABLE `categoriatour` (
  `nombrecategoria` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `urlcct` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idcomentario` int(10) NOT NULL,
  `idtour` int(8) NOT NULL,
  `correousuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `contenido` varchar(15000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idcompra` int(10) NOT NULL,
  `idcorreo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `precio` int(10) NOT NULL,
  `plazas` int(10) NOT NULL,
  `idtour` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `identificador` int(11) NOT NULL,
  `idusuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `idtour` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foroprincipal`
--

CREATE TABLE `foroprincipal` (
  `idforo` int(10) NOT NULL,
  `idusuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `texto` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fororespuesta`
--

CREATE TABLE `fororespuesta` (
  `idrespuesta` int(10) NOT NULL,
  `idforoprincipal` int(10) NOT NULL,
  `iduserpublica` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `iduserresponde` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `texto` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idmensaje` int(10) NOT NULL,
  `correo` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `asunto` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contenido` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `identificador` int(10) NOT NULL,
  `autor` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `titulo` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(15000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `categorianovedades` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` int(10) NOT NULL,
  `idcorreo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `precio` int(10) NOT NULL,
  `plazas` int(10) NOT NULL,
  `idtour` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendatours`
--

CREATE TABLE `tiendatours` (
  `nombretour` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `numreferencia` int(8) NOT NULL,
  `numeroplazas` int(5) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `categoriatour` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `urltour` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombreusuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contrasenia` varchar(3000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol` enum('registrado','guia','admin','') COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'registrado',
  `telefono` int(11) NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nick` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `urlfoto` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `idvaloracion` int(100) NOT NULL,
  `idusuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `idtour` int(8) NOT NULL,
  `valoracion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorianovedades`
--
ALTER TABLE `categorianovedades`
  ADD PRIMARY KEY (`nombrecategoria`);

--
-- Indices de la tabla `categoriatour`
--
ALTER TABLE `categoriatour`
  ADD PRIMARY KEY (`nombrecategoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idcomentario`),
  ADD KEY `idtour` (`idtour`),
  ADD KEY `correousuario` (`correousuario`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idcompra`),
  ADD KEY `idcorreo` (`idcorreo`) USING BTREE,
  ADD KEY `idtour` (`idtour`) USING BTREE;

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`identificador`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idtour` (`idtour`);

--
-- Indices de la tabla `foroprincipal`
--
ALTER TABLE `foroprincipal`
  ADD PRIMARY KEY (`idforo`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `fororespuesta`
--
ALTER TABLE `fororespuesta`
  ADD PRIMARY KEY (`idrespuesta`),
  ADD KEY `idforoprincipal` (`idforoprincipal`),
  ADD KEY `iduserpublica` (`iduserpublica`),
  ADD KEY `iduserresponde` (`iduserresponde`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idmensaje`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`identificador`),
  ADD KEY `categorianovedades` (`categorianovedades`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `idcorreo` (`idcorreo`) USING BTREE,
  ADD KEY `idtour` (`idtour`) USING BTREE;

--
-- Indices de la tabla `tiendatours`
--
ALTER TABLE `tiendatours`
  ADD PRIMARY KEY (`numreferencia`),
  ADD KEY `categoriatour` (`categoriatour`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`idvaloracion`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idtour` (`idtour`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idcomentario` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idcompra` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `identificador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `foroprincipal`
--
ALTER TABLE `foroprincipal`
  MODIFY `idforo` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fororespuesta`
--
ALTER TABLE `fororespuesta`
  MODIFY `idrespuesta` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idmensaje` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `identificador` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiendatours`
--
ALTER TABLE `tiendatours`
  MODIFY `numreferencia` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `idvaloracion` int(100) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`correousuario`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`idtour`) REFERENCES `tiendatours` (`numreferencia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`idcorreo`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`idtour`) REFERENCES `tiendatours` (`numreferencia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_3` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favoritos_ibfk_4` FOREIGN KEY (`idtour`) REFERENCES `tiendatours` (`numreferencia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `foroprincipal`
--
ALTER TABLE `foroprincipal`
  ADD CONSTRAINT `foroprincipal_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fororespuesta`
--
ALTER TABLE `fororespuesta`
  ADD CONSTRAINT `fororespuesta_ibfk_1` FOREIGN KEY (`idforoprincipal`) REFERENCES `foroprincipal` (`idforo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fororespuesta_ibfk_2` FOREIGN KEY (`iduserpublica`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fororespuesta_ibfk_3` FOREIGN KEY (`iduserresponde`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD CONSTRAINT `novedades_ibfk_1` FOREIGN KEY (`categorianovedades`) REFERENCES `categorianovedades` (`nombrecategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`idcorreo`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_4` FOREIGN KEY (`idtour`) REFERENCES `tiendatours` (`numreferencia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tiendatours`
--
ALTER TABLE `tiendatours`
  ADD CONSTRAINT `tiendatours_ibfk_1` FOREIGN KEY (`categoriatour`) REFERENCES `categoriatour` (`nombrecategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `valoracion_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoracion_ibfk_3` FOREIGN KEY (`idtour`) REFERENCES `tiendatours` (`numreferencia`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
