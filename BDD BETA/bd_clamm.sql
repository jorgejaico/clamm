-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2016 a las 11:58:49
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_clamm`
--
CREATE DATABASE IF NOT EXISTS `bd_clamm` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `bd_clamm`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_anuncio`
--
-- Creación: 04-05-2016 a las 08:44:27
--

DROP TABLE IF EXISTS `tbl_anuncio`;
CREATE TABLE IF NOT EXISTS `tbl_anuncio` (
  `id_anuncio` int(11) NOT NULL,
  `titulo_anuncio` varchar(25) COLLATE utf8_bin NOT NULL,
  `texto_anuncio` varchar(250) COLLATE utf8_bin NOT NULL,
  `icono_anuncio` varchar(20) COLLATE utf8_bin NOT NULL,
  `imagen_anuncio` varchar(20) COLLATE utf8_bin NOT NULL,
  `usuario_anuncio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_anuncio`:
--   `usuario_anuncio`
--       `tbl_usuario` -> `id_usuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_articulo`
--
-- Creación: 09-05-2016 a las 09:56:11
--

DROP TABLE IF EXISTS `tbl_articulo`;
CREATE TABLE IF NOT EXISTS `tbl_articulo` (
  `id_articulo` int(11) NOT NULL,
  `titulo_articulo` varchar(30) COLLATE utf8_bin NOT NULL,
  `texto_articulo` varchar(1500) COLLATE utf8_bin NOT NULL,
  `usuario_articulo` int(11) NOT NULL,
  `menu_articulo` int(11) NOT NULL,
  `fecha_articulo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_articulo`:
--   `usuario_articulo`
--       `tbl_usuario` -> `id_usuario`
--   `menu_articulo`
--       `tbl_menu` -> `id_menu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comentario`
--
-- Creación: 04-05-2016 a las 08:26:27
--

DROP TABLE IF EXISTS `tbl_comentario`;
CREATE TABLE IF NOT EXISTS `tbl_comentario` (
  `id_comentario` int(11) NOT NULL,
  `texto_comentario` varchar(250) COLLATE utf8_bin NOT NULL,
  `usuario_comentario` int(11) NOT NULL,
  `articulo_comentario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_comentario`:
--   `articulo_comentario`
--       `tbl_articulo` -> `id_articulo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imgarticulo`
--
-- Creación: 04-05-2016 a las 08:26:27
--

DROP TABLE IF EXISTS `tbl_imgarticulo`;
CREATE TABLE IF NOT EXISTS `tbl_imgarticulo` (
  `id_imgarticulo` int(11) NOT NULL,
  `nombre_imgarticulo` varchar(25) COLLATE utf8_bin NOT NULL,
  `articulo_imgarticulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_imgarticulo`:
--   `articulo_imgarticulo`
--       `tbl_articulo` -> `id_articulo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_menu`
--
-- Creación: 04-05-2016 a las 08:26:27
--

DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `nombre_menu` varchar(25) COLLATE utf8_bin NOT NULL,
  `padre_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_menu`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_publicacion`
--
-- Creación: 04-05-2016 a las 08:44:51
--

DROP TABLE IF EXISTS `tbl_publicacion`;
CREATE TABLE IF NOT EXISTS `tbl_publicacion` (
  `id_publicacion` int(11) NOT NULL,
  `fechainicio_publicacion` date NOT NULL,
  `fechafinal_publicacion` date NOT NULL,
  `anuncio_publicacion` int(11) NOT NULL,
  `visitas_publicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_publicacion`:
--   `anuncio_publicacion`
--       `tbl_anuncio` -> `id_anuncio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tagarticulo`
--
-- Creación: 04-05-2016 a las 08:26:27
--

DROP TABLE IF EXISTS `tbl_tagarticulo`;
CREATE TABLE IF NOT EXISTS `tbl_tagarticulo` (
  `id_tagarticulo` int(11) NOT NULL,
  `tag_tagarticulo` int(11) NOT NULL,
  `articulo_tagarticulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_tagarticulo`:
--   `articulo_tagarticulo`
--       `tbl_articulo` -> `id_articulo`
--   `tag_tagarticulo`
--       `tbl_tags` -> `id_tag`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tags`
--
-- Creación: 04-05-2016 a las 08:26:27
--

DROP TABLE IF EXISTS `tbl_tags`;
CREATE TABLE IF NOT EXISTS `tbl_tags` (
  `id_tag` int(11) NOT NULL,
  `nombre_tag` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_tags`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipousuario`
--
-- Creación: 04-05-2016 a las 08:26:27
--

DROP TABLE IF EXISTS `tbl_tipousuario`;
CREATE TABLE IF NOT EXISTS `tbl_tipousuario` (
  `id_tipoUsuario` int(11) NOT NULL,
  `nombre_tipousuario` varchar(15) COLLATE utf8_bin NOT NULL,
  `desc_tipousuario` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_tipousuario`:
--

--
-- Volcado de datos para la tabla `tbl_tipousuario`
--

INSERT INTO `tbl_tipousuario` (`id_tipoUsuario`, `nombre_tipousuario`, `desc_tipousuario`) VALUES
(1, 'Administrador', 'Este usuario puede gestionar todos los apartados de la página web.'),
(2, 'Redactor', 'Este usuario puede crear artículos y blogs en nuestra web, también puede modificar sus creaciones. '),
(3, 'Redactor-Jefe', 'Este usuario puede crear artículos y blogs en nuestra web, también puede modificar cualquier articulo y blog '),
(4, 'Blogger', 'Este usuario puede visitar toda la página web, crear sus propios artículos y modificarlos.'),
(5, 'Moderador-Blog', 'Este usuario puede borrar cualquier blog.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--
-- Creación: 04-05-2016 a las 08:26:27
--

DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_bin NOT NULL,
  `pass` varchar(20) COLLATE utf8_bin NOT NULL,
  `nombre_usuario` varchar(30) COLLATE utf8_bin NOT NULL,
  `apellido_usuario` varchar(30) COLLATE utf8_bin NOT NULL,
  `correo_usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `bio_usuario` varchar(150) COLLATE utf8_bin NOT NULL,
  `img_usuario` varchar(25) COLLATE utf8_bin NOT NULL,
  `tipousuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_usuario`:
--   `tipousuario`
--       `tbl_tipousuario` -> `id_tipoUsuario`
--

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `usuario`, `pass`, `nombre_usuario`, `apellido_usuario`, `correo_usuario`, `bio_usuario`, `img_usuario`, `tipousuario`) VALUES
(1, 'usadmin1', 'qwer1234', 'Jorge', 'Jaico', 'usadmin1@clamm.com', 'Usuario administrador p.web', 'admin1.jpg', 1),
(2, 'usedit1', 'qwer1234', 'Jose Luis', 'Maseda', 'usedit1@clamm.com', 'Usuario redactor de articulos.', 'edit1.jpg', 2),
(3, 'useditboss1', 'qwer1234', 'Eric', 'Sanchez', 'useditboss1@clamm.com', 'Usuario redactor-Jefe de articulos', 'editboss1.jpg', 3),
(4, 'useditblog1', 'qwer1234', 'Alenjandro', 'Moreno', 'useditblog1@clamm.com', 'Usuario editor de blogs', 'editblog1.jpg', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_anuncio`
--
ALTER TABLE `tbl_anuncio`
  ADD PRIMARY KEY (`id_anuncio`),
  ADD KEY `usuario_anuncio` (`usuario_anuncio`);

--
-- Indices de la tabla `tbl_articulo`
--
ALTER TABLE `tbl_articulo`
  ADD PRIMARY KEY (`id_articulo`),
  ADD KEY `usuario_articulo` (`usuario_articulo`),
  ADD KEY `menu_articulo` (`menu_articulo`);

--
-- Indices de la tabla `tbl_comentario`
--
ALTER TABLE `tbl_comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `articulo_comentario` (`articulo_comentario`);

--
-- Indices de la tabla `tbl_imgarticulo`
--
ALTER TABLE `tbl_imgarticulo`
  ADD PRIMARY KEY (`id_imgarticulo`),
  ADD KEY `articulo` (`articulo_imgarticulo`),
  ADD KEY `articulo_imgarticulo` (`articulo_imgarticulo`);

--
-- Indices de la tabla `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `tbl_publicacion`
--
ALTER TABLE `tbl_publicacion`
  ADD KEY `anuncio_publicacion` (`anuncio_publicacion`);

--
-- Indices de la tabla `tbl_tagarticulo`
--
ALTER TABLE `tbl_tagarticulo`
  ADD PRIMARY KEY (`id_tagarticulo`),
  ADD KEY `tag_tagarticulo` (`tag_tagarticulo`),
  ADD KEY `articulo_tagarticulo` (`articulo_tagarticulo`);

--
-- Indices de la tabla `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indices de la tabla `tbl_tipousuario`
--
ALTER TABLE `tbl_tipousuario`
  ADD PRIMARY KEY (`id_tipoUsuario`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `correo_usuario` (`correo_usuario`),
  ADD KEY `tipousuario` (`tipousuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_anuncio`
--
ALTER TABLE `tbl_anuncio`
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_articulo`
--
ALTER TABLE `tbl_articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_comentario`
--
ALTER TABLE `tbl_comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_imgarticulo`
--
ALTER TABLE `tbl_imgarticulo`
  MODIFY `id_imgarticulo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_tagarticulo`
--
ALTER TABLE `tbl_tagarticulo`
  MODIFY `id_tagarticulo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_tipousuario`
--
ALTER TABLE `tbl_tipousuario`
  MODIFY `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_anuncio`
--
ALTER TABLE `tbl_anuncio`
  ADD CONSTRAINT `tbl_anuncio_ibfk_1` FOREIGN KEY (`usuario_anuncio`) REFERENCES `tbl_usuario` (`id_usuario`);

--
-- Filtros para la tabla `tbl_articulo`
--
ALTER TABLE `tbl_articulo`
  ADD CONSTRAINT `tbl_articulo_ibfk_1` FOREIGN KEY (`usuario_articulo`) REFERENCES `tbl_usuario` (`id_usuario`),
  ADD CONSTRAINT `tbl_articulo_ibfk_2` FOREIGN KEY (`menu_articulo`) REFERENCES `tbl_menu` (`id_menu`);

--
-- Filtros para la tabla `tbl_comentario`
--
ALTER TABLE `tbl_comentario`
  ADD CONSTRAINT `tbl_comentario_ibfk_1` FOREIGN KEY (`articulo_comentario`) REFERENCES `tbl_articulo` (`id_articulo`);

--
-- Filtros para la tabla `tbl_imgarticulo`
--
ALTER TABLE `tbl_imgarticulo`
  ADD CONSTRAINT `tbl_imgarticulo_ibfk_1` FOREIGN KEY (`articulo_imgarticulo`) REFERENCES `tbl_articulo` (`id_articulo`);

--
-- Filtros para la tabla `tbl_publicacion`
--
ALTER TABLE `tbl_publicacion`
  ADD CONSTRAINT `tbl_publicacion_ibfk_1` FOREIGN KEY (`anuncio_publicacion`) REFERENCES `tbl_anuncio` (`id_anuncio`);

--
-- Filtros para la tabla `tbl_tagarticulo`
--
ALTER TABLE `tbl_tagarticulo`
  ADD CONSTRAINT `tbl_tagarticulo_ibfk_1` FOREIGN KEY (`articulo_tagarticulo`) REFERENCES `tbl_articulo` (`id_articulo`),
  ADD CONSTRAINT `tbl_tagarticulo_ibfk_2` FOREIGN KEY (`tag_tagarticulo`) REFERENCES `tbl_tags` (`id_tag`);

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`tipousuario`) REFERENCES `tbl_tipousuario` (`id_tipoUsuario`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
