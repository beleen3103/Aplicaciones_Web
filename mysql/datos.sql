-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2021 a las 01:40:36
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
-- Volcado de datos para la tabla `categoriatour`
--

INSERT INTO `categoriatour` (`nombrecategoria`, `urlcct`) VALUES
('Deportes', 'img/categorias/deporte.jpg'),
('Gastronomia', 'img/categorias/gastronomia.jpg'),
('Musica', 'img/categorias/musica.jpg'),
('Shopping', 'img/categorias/shopping.jpg'),
('Terror', 'img/categorias/terror.jpg');

--
-- Volcado de datos para la tabla `tiendatours`
--

INSERT INTO `tiendatours` (`nombretour`, `precio`, `numreferencia`, `numeroplazas`, `descripcion`, `categoriatour`, `urltour`) VALUES
('Calle 13', '7', 1, 19, 'Tour por las calles más tenebrosas de Madrid.', 'Terror', 'img/tours/calle-13.jpg'),
('Tapeo', '19', 2, 9, 'Visitaremos los mejores bares del centro madrileño, los gastos corren a nuestra cuenta...', 'Gastronomia', 'img/tours/tapeo.jpg'),
('Madrid Musical', '14', 3, 30, 'Recorreremos las calles más conectadas con el mundo de la música, pasaremos por el teatro de Los Sueños, Lavapiés y demás barrios y lugares con una importacia musical.', 'Musica', 'img/tours/madrid-musical.jpg'),
('Madrid olimpico', '12', 4, 11, 'En este tour recorreremos los lugares más emblemáticos de Madrid relacionados con el deporte, desde el COI, pasando por el Santiago Bernabéu y el viejo Calderón semiderruido.', 'Deportes', 'img/tours/madrid-olimpico.jpg'),
('Mercado central', '7', 5, 20, 'Visitaremos el mítico mercado de San Miguel, recorriendo sus stands y aprovechando a degustar la exquisita gastronomía madrileña.', 'Gastronomia', 'img/tours/mercado-central.jpg'),
('Asylum', '11', 6, 6, 'En este tour vamos a recorrer lugares tenebrosos como son el asilo abandonado de Santa Eugenia, cerca de la iglesia de San Bernardo el cual fue testigo del terrible asesinato del fraile José Juan. Por último concluiremos visitando las distintas sedes de los partidos políticos, lugares realmente terroríficos.', 'Terror', 'img/tours/asylum.jpg'),
('De compras por el centro', '6', 7, 14, 'Visita las tiendas más populares en el centro de Madrid, acompañado por nuestro guía especialista en imagen para asesorarte en tus compras.', 'Shopping', 'img/tours/primark.jpg');



--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombreusuario`, `correo`, `contrasenia`, `rol`, `telefono`, `direccion`, `nick`, `urlfoto`) VALUES
('Carlos', 'admin@admin.com', '$2y$10$UTeNhLslCtE4efgnqUhi9eUATDt4ORJUzBUMsmwDSWor7H8R15FV2', 'admin', 0, 'c', 'Carlos', 'img/usuarios/default.png'),
('Aldair Maldonado Honores', 'aldairfm@ucm.es', '$2y$10$UHUIOjH.6v44SC0ETbzQk.uwHVC4ynGVHmj91FDVNQZlAfWvPDwYG', 'registrado', 123456789, 'C/ Santesmases', 'Aldair', 'img/usuarios/aldair.jpeg'),
('Belén García Puente', 'beleng11@ucm.es', '$2y$10$pzt8hiA/JZIk0o3aTCYu.eJC/j.VYu9t56e6LY18MTKwtHOUZLcA.', 'registrado', 0, '', 'Belén', 'img/usuarios/belen.jpeg'),
('Gonzalo Meneses Vicente', 'gmeneses@ucm.es', '$2y$10$a2nhBd/IejXbGTZF9bQpc.QVlCaT6P.AhlsyumyamAfEaiKn6WARK', 'guia', 0, '', 'Gonzalo', 'img/usuarios/gonzalo.jpeg'),
('Miquel Vera Ramis', 'mivera@ucm.es', '$2y$10$QoHp1lD6GCxjqwX9lFc5h.woJJoE/MhrVelA1SHSqsPvPWjARe/7.', 'guia', 0, '', 'Miquel', 'img/usuarios/miquel.jpeg'),
('Silvia Egido Díaz', 'segido@ucm.es', '$2y$10$LtPJiwjAY4vadgKDZcfI/OHHI7arIyhilO71hfW0xskjPwNEowWH6', 'registrado', 0, '', 'Silvia', 'img/usuarios/silvia.jpeg');



--
-- Volcado de datos para la tabla `categorianovedades`
--

INSERT INTO `categorianovedades` (`nombrecategoria`) VALUES
('Equipo'),
('Monumentos'),
('Nuevos Tours'),
('Política');



--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`identificador`, `idusuario`, `idtour`) VALUES
(4, 'aldairfm@ucm.es', 4),
(5, 'aldairfm@ucm.es', 1),
(8, 'gmeneses@ucm.es', 5),
(13, 'gmeneses@ucm.es', 4);

--
-- Volcado de datos para la tabla `foroprincipal`
--

INSERT INTO `foroprincipal` (`idforo`, `idusuario`, `titulo`, `texto`) VALUES
(1, 'mivera@ucm.es', 'Me gusta mucho esta página', 'Desde el primer momento que compré un tour aquí quedé maravillado ante la web. Muy bien chicos :)'),
(2, 'aldairfm@ucm.es', 'Buen tour el Madrid Olímpico', 'Me encantó este recorrido, el guía fue muy agradable y ameno.'),
(3, 'gmeneses@ucm.es', 'Tour por el Wanda Metropolitano', 'Me encantaría saber si en la web tenías pensado hacer un tour por el estadio del Atlético para poder ver todos sus trofeos.'),
(5, 'mivera@ucm.es', 'Búsqueda de nuevos guías', 'Recientemente hemos abierto un nuevo plazo para inscripciones a nuevos guías en Madrid Mad Tour.\r\n\r\nCualquier interesado en recibir más información al respecto puede enviarnos un mensaje a través de la herramienta interna de contacto en nuestra web.');

--
-- Volcado de datos para la tabla `fororespuesta`
--

INSERT INTO `fororespuesta` (`idrespuesta`, `idforoprincipal`, `iduserpublica`, `iduserresponde`, `texto`) VALUES
(4, 1, 'admin@admin.com', NULL, 'Me encanta vuestro proyecto.'),
(5, 2, 'admin@admin.com', NULL, 'Sí la verdad es que fue un buen fichaje para guiarnos por Madrid'),
(6, 3, 'admin@admin.com', NULL, 'No será para ver sus Champions, ¿verdad?'),
(8, 2, 'beleng11@ucm.es', 'admin@admin.com', 'Totalmente de acuerdo'),
(10, 5, 'mivera@ucm.es', NULL, 'También puede enviar un mail a mivera@ucm.es'),
(11, 5, 'aldairfm@ucm.es', 'mivera@ucm.es', 'No encuentro la opción de contacto en mi perfil'),
(12, 1, 'segido@ucm.es', NULL, 'Espero ver todos vuestros progresos'),
(13, 2, 'segido@ucm.es', 'beleng11@ucm.es', 'Pues a mi no me gustó'),
(14, 5, 'segido@ucm.es', NULL, 'Me encantaaaaaaa');

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`idmensaje`, `correo`, `nombre`, `fecha`, `asunto`, `contenido`) VALUES
(12, 'aldairfm@ucm.es', 'Aldair', '2021-06-04', 'Información nuevos guías', 'He visto en el foro que estáis buscando a nuevos guías y estaría interesado en tener más información. Gracias');

--
-- Volcado de datos para la tabla `novedades`
--

INSERT INTO `novedades` (`identificador`, `autor`, `titulo`, `descripcion`, `fecha`, `categorianovedades`) VALUES
(1, 'Belén Garcia', 'Nueva escultura a Unamuno', 'El ayuntamiento de Madrid ha creado y emplazado una escultura al escritor y dramaturgo Miguel de Unamuno, en honor a su centenario. ', '2021-04-01', 'Monumentos'),
(2, 'Jesús Anacleto', 'Descubre el Madrid más musical', 'Desde ayer, en nuestra Web disponemos de un nuevo y maravilloso tour. Este te recorrerá las lugares más recónditos de esta ciudad, y además relacionados con la música desde lo mas clásico hasta lo más actual y urbano.', '2021-04-12', 'Nuevos Tours'),
(3, 'Marcos de La Fuente', 'Elecciones de la comunidad', 'Desde esta web queremos decirte que nuestra maravillo ciudad va a ser testigo de unas nuevas elecciones este 4 de Mayo. En estos comicios nuestros conciudadanos tendrán que elegir entre comunismo y libertad, según las palabra de la actual presidenta Ayuso.', '2021-04-15', 'Política'),
(7, 'Carlos', 'Un 10 chicos, tremendo', 'Increíble, mis dieses', '2021-06-04', 'Monumentos'),
(9, 'Carlos', 'Nuevos miembros MadridMadTour', 'Tras un duro trabajo de selección, hemos incorporado nuevos miembros a nuestro equipo de desarrollo que nos ayudarán a mantener el nivel de calidad de la web', '2021-06-04', 'Equipo');

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idpedido`, `idcorreo`, `fecha`, `precio`, `plazas`, `idtour`) VALUES
(19, 'aldairfm@ucm.es', '2021-05-12', 12, 4, 4),
(21, 'segido@ucm.es', '2021-05-13', 19, 3, 2),
(22, 'segido@ucm.es', '2021-05-13', 11, 2, 6),
(23, 'segido@ucm.es', '2021-05-13', 7, 3, 5),
(24, 'segido@ucm.es', '2021-05-13', 12, 2, 4),
(25, 'segido@ucm.es', '2021-05-13', 7, 1, 1);



--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`idvaloracion`, `idusuario`, `idtour`, `valoracion`) VALUES
(1, 'admin@admin.com', 4, 4),
(7, 'mivera@ucm.es', 3, 3),
(8, 'mivera@ucm.es', 4, 1),
(9, 'mivera@ucm.es', 2, 3),
(10, 'mivera@ucm.es', 5, 5),
(11, 'mivera@ucm.es', 1, 2),
(12, 'mivera@ucm.es', 6, 4),
(13, 'aldairfm@ucm.es', 2, 0),
(14, 'aldairfm@ucm.es', 4, 0),
(15, 'gmeneses@ucm.es', 4, 4),
(19, 'admin@admin.com', 3, 5),
(20, 'admin@admin.com', 2, 0),
(21, 'segido@ucm.es', 3, 0),
(22, 'segido@ucm.es', 6, 5),
(23, 'admin@admin.com', 3, 0),
(24, 'segido@ucm.es', 1, 4);
COMMIT;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idcomentario`, `idtour`, `correousuario`, `fecha`, `contenido`) VALUES
(4, 3, 'mivera@ucm.es', '2021-05-12', 'Buen recorrido musical, me falta un poco de variedad de estilos, pero en general muy bueno.'),
(5, 4, 'mivera@ucm.es', '2021-05-12', 'Sería mejor si no pasara por el Bernabéu, pero bueno...'),
(6, 2, 'mivera@ucm.es', '2021-05-12', 'Lo mejor fue el agua madrileña'),
(7, 5, 'mivera@ucm.es', '2021-05-12', 'Me gusta porque el mercado tiene mi nombre'),
(8, 1, 'mivera@ucm.es', '2021-05-12', 'Me asusté uwu'),
(9, 6, 'mivera@ucm.es', '2021-05-12', 'Realmente terrorífico'),
(10, 2, 'aldairfm@ucm.es', '2021-05-12', 'La comida peruana mola más'),
(11, 4, 'aldairfm@ucm.es', '2021-05-12', 'Lo mejor fue ver las 13 shempions del Real Madrid');



--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`idcompra`, `idcorreo`, `fecha`, `precio`, `plazas`, `idtour`) VALUES
(37, 'mivera@ucm.es', '2021-05-29', 14, 3, 3),
(38, 'mivera@ucm.es', '2021-06-03', 12, 1, 4),
(39, 'mivera@ucm.es', '2021-06-03', 19, 1, 2),
(40, 'mivera@ucm.es', '2021-06-03', 7, 1, 5),
(41, 'mivera@ucm.es', '2021-06-03', 7, 1, 1),
(42, 'beleng11@ucm.es', '2021-06-03', 19, 2, 2),
(43, 'beleng11@ucm.es', '2021-06-03', 12, 1, 4),
(44, 'beleng11@ucm.es', '2021-06-03', 11, 1, 6),
(45, 'admin@admin.com', '2021-05-13', 19, 3, 2),
(46, 'admin@admin.com', '2021-06-03', 7, 1, 5),
(47, 'admin@admin.com', '2021-06-03', 11, 3, 6);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
