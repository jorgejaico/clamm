-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2016 a las 11:14:24
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
-- Creación: 18-05-2016 a las 07:09:43
--

DROP TABLE IF EXISTS `tbl_anuncio`;
CREATE TABLE IF NOT EXISTS `tbl_anuncio` (
  `id_anuncio` int(11) NOT NULL,
  `titulo_anuncio` varchar(25) COLLATE utf8_bin NOT NULL,
  `texto_anuncio` varchar(250) COLLATE utf8_bin NOT NULL,
  `icono_anuncio` varchar(20) COLLATE utf8_bin NOT NULL,
  `imagen_anuncio` varchar(20) COLLATE utf8_bin NOT NULL,
  `usuario_anuncio` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_anuncio`:
--   `usuario_anuncio`
--       `tbl_usuario` -> `id_usuario`
--

--
-- Volcado de datos para la tabla `tbl_anuncio`
--

INSERT INTO `tbl_anuncio` (`id_anuncio`, `titulo_anuncio`, `texto_anuncio`, `icono_anuncio`, `imagen_anuncio`, `usuario_anuncio`) VALUES
(1, 'afsadgs', 'sagh', 'fgfdsfg', 'fdfgsf', 1),
(2, 'fasdfsdf', 'sadfsdf', 'sdfasfd', 'asfsadf', 1),
(3, 'asfdsdf', 'asfsad', 'fsdfadsfads', 'fsdfsd', 1),
(4, 'asfdasdf', 'asfdadsf', 'asdf', 'asdfasf', 2),
(5, 'asfadsf', 'adsdfasf', 'asdfasdf', 'asdfasdf', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_articulo`
--
-- Creación: 18-05-2016 a las 06:24:15
--

DROP TABLE IF EXISTS `tbl_articulo`;
CREATE TABLE IF NOT EXISTS `tbl_articulo` (
  `id_articulo` int(11) NOT NULL,
  `titulo_articulo` varchar(60) COLLATE utf8_bin NOT NULL,
  `texto_articulo` text COLLATE utf8_bin NOT NULL,
  `usuario_articulo` int(11) NOT NULL,
  `portada_articulo` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `fecha_articulo` datetime NOT NULL,
  `tipo_articulo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_articulo`:
--   `usuario_articulo`
--       `tbl_usuario` -> `id_usuario`
--

--
-- Volcado de datos para la tabla `tbl_articulo`
--

INSERT INTO `tbl_articulo` (`id_articulo`, `titulo_articulo`, `texto_articulo`, `usuario_articulo`, `portada_articulo`, `fecha_articulo`, `tipo_articulo`) VALUES
(11, 'Zara amplía su tallaje hasta la XXL', 'Zara ha ampliado su tallaje hasta la XXL esta semana y ya se pueden adquirir dichas prendas, que figuran entre las últimas novedades, en su página web. De momento, no toda la colección primavera-verano se ha diseñado en esta talla, pero podría ser cuestión de tiempo. La respuesta de la marca de Inditex a la longeva petición de sus clientas de ampliar el tallaje llega en la misma semana que un informe sobre los anuncios de esta temporada desvelaba que solo el 1,4% de las modelos superaban la talla 40. Mango es una de las primeras firmas españolas que dedicó un espacio a sus clientas con más tallaje creando la línea Violeta by Mango, que ya tiene incluso tienda propia.  \n\nEste cambio de ruta podría significar una nueva vuelta de hoja del mundo de la moda que, poco a poco, comienza a empoderar de nuevo las curvas como ya hiciera en los noventa. Modelos como Ashley Graham —quien utiliza sus redes sociales para demostrar que una top no tiene ninguna necesidad de un cuerpo huesudo— o Candice Huffine han revolucionado la industria y ya protagonizan campañas de lencería y moda de baño. ', 2, 'img1.png', '2016-05-17 00:00:00', 0),
(12, 'La corbata ya no es necesaria', 'La reputada periodista de moda Vanessa Friedman reflexionaba esta semana en The New York Timessobre el menguante uso de la corbata en la clase política mundial. Mientras el magnate y candidato republicano a la Casa Blanca Donald Trump se aferra con obstinación a sus corbatas rojas de Brioni, el presidente Barack Obama se la quita a la mínima ocasión. Políticos de todos los colores la usan cada vez menos. Símbolo de los hombres de bien y de las cosas serias, la desaparición de la corbata en el uniforme político no es un tema baladí. Si el incremento del uso del esmalte de uñas es un claro indicador de tiempos de crisis, ¿qué significados esconderá el destierro de este complemento sartorial por parte de los políticos? Economía sin corbatas se puede leer en la cubierta de la edición española de uno de los últimos libros de Yanis Varoufakis, el nuevo héroe de la izquierda. El ingenioso titular parecía anticipar también la nueva era de la política sin corbatas. Y es que durante las últimas elecciones en España, la corbata y la indumentaria de los nuevos candidatos ha ocupado más espacio que nunca en la prensa. Estilistas y personal shoppers de todo pelaje intentaban desencriptar los significados y mensajes por el uso y no uso de determinadas prendas por parte de los políticos y sus asesores. Al inicio de campaña cada uno parecía tener una etiqueta clara: Pablo Iglesias y sus ya famosas camisas compradas en Alcampo, en la línea desenfadada de sus compañeros de la marea lila como el griego Alexis Tsipras; Albert Rivera y sus inmaculados trajes chaqueta y corbatas estrechitas; Pedro Sánchez en busca de una corrección simpática con un uso intermitente de la corbata; y Rajoy, como Trump, aferrado a ellas de toda la vida.', 2, 'img1.png', '2016-05-27 00:00:00', 0),
(13, 'Beyoncé, acusada de fabricar con mano de obra esclava ', 'Beyoncé quiere que su línea de ropa deportiva, Ivy Park, “apoye” e “inspire” a las mujeres. El objetivo probablemente solo se cumple para las que pagan dinero por las prendas en Topshop y Nordstrom. Quienes las fabrican lo hacen en talleres clandestinos de Sri Lanka y cobran 5,46 euros al día. Necesitarían trabajar más de un mes para comprarse uno de los leggings que la diva vende por 145 euros. Según una investigación del diario británico The Sun, las costureras son mujeres jóvenes y pobres, originarias del campo, que solo pueden permitirse vivir en residencias atestadas y que necesitan laborar más de 60 horas a la semana para cubrir sus gastos Una chica de 22 años, que opera una máquina de coser, contó al periódico que vive en una residencia de 100 habitaciones cerca de la fábrica en la ciudad de Katunayake.“Todo lo que hago es trabajar, dormir, trabajar, dormir”, dice. La empleada asegura que no puede salir adelante con su salario de 110 euros al mes. La cantidad es poco más de la mitad del salario medio en Sri Lanka, que se calcula en 207 euros. La joven trabaja casi 10 horas al día, de lunes a viernes, con un descanso de 30 minutos para comer. Tiene que coser también los sábados y hacer horas extra entre semana para llegar a fin de mes. La chica, hija de un granjero de una aldea a más de 300 kilómetros de distancia, comparte una habitación de tres metros por tres metros con su hermana de 19 años. Cada una paga 24 euros al mes. “No tenemos nuestra propia cocina o ducha; solo es un pequeño dormitorio”, explicó a The Sun. “Tenemos que compartir el barracón de duchas con los hombres, así que no hay mucha privacidad. Es impactante y muchas de las mujeres tiene mucho miedo”, añadió.', 2, 'img2.png', '2016-05-22 00:00:00', 0),
(14, 'art4', 'sfra', 2, 'img2.png', '2016-05-19 00:00:00', 0),
(15, 'art5', 'fdsafsdf', 2, 'img3.png', '2016-05-20 00:00:00', 0),
(16, 'Historia de amor entre un vegano y una carnívora', 'Hace poco más de un mes decidí hacerme vegano. Llevaba bastante tiempo pensándolo, pero me animé del todo al ver que muchos de mis amigos optaban por dejar de comer carne. Es que lo de darle al tofu se ha puesto muy de moda últimamente en Malasaña. Pero no es mi caso, para nada. Lo mío fue más por conciencia, que cuando te enteras de cómo funciona la producción de carne y pescado da reparo. Así que después de una cena con mis amigos en la que todos me pusieron cara rara por ser el único que no se pedía la hamburguesa vegana, decidí dejar de hincarle el diente a los animales.\n\nLo hice en plan radical, de un día para otro, y hasta lo anuncié en mi Facebook. Jamás había conseguido tantos me gusta en un estado. Menos de mi madre, que me puso un emoticono lloroso. Ella dice que los veganos sólo comen guarnición y me iba a pasar todo el día con gripe por falta de nutrientes, pero mi médico de cabecera, la doctora Romaní, no lo ve así: “Los médicos recomendamos una dieta completa, y una vegana lo es añadiendo un suplemento de vitamina B12, que es lo que puede faltar. A nivel cardiovascular es muy favorable, reduce el colesterol y con ellas las posibilidades de tener un infarto. No es casualidad que el presidente de la Asociación Americana de Cardiología, el Dr. Kim Williams, sea vegano”.\n\nQuizá habría que explica lo que es ser vegano. Según la Asociación Vegana Española (UVE), “es una alternativa ética al consumo y a la dependencia de productos no adaptados a las necesidades físicas y espirituales del ser humano, como la carne, el pescado, los lácteos, los huevos, la miel, los productos derivados de los animales y otros artículos de origen animal como el cuero y las pieles”. ', 4, 'img3.png', '2016-05-10 04:00:00', 1),
(17, 'art7', 'asdfsaf', 4, 'img4.png', '2016-05-10 10:00:00', 1),
(18, 'art8', 'asfdsda', 4, 'img4.png', '2016-05-06 00:00:00', 1),
(19, 'art9', 'asdfsd', 4, 'img5.png', '2016-04-11 00:00:00', 1),
(20, 'art10', 'asfddsaf', 4, 'img5.png', '2016-05-18 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comentario`
--
-- Creación: 18-05-2016 a las 06:28:38
--

DROP TABLE IF EXISTS `tbl_comentario`;
CREATE TABLE IF NOT EXISTS `tbl_comentario` (
  `id_comentario` int(11) NOT NULL,
  `texto_comentario` varchar(250) COLLATE utf8_bin NOT NULL,
  `usuario_comentario` int(11) NOT NULL,
  `fecha_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `articulo_comentario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_comentario`:
--   `articulo_comentario`
--       `tbl_articulo` -> `id_articulo`
--

--
-- Volcado de datos para la tabla `tbl_comentario`
--

INSERT INTO `tbl_comentario` (`id_comentario`, `texto_comentario`, `usuario_comentario`, `fecha_comentario`, `articulo_comentario`) VALUES
(1, 'ghjfcgdsafersg', 0, '2016-05-18 10:39:24', 15),
(2, 'dsafsaref', 0, '2016-05-18 10:54:16', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imgarticulo`
--
-- Creación: 18-05-2016 a las 06:24:15
--

DROP TABLE IF EXISTS `tbl_imgarticulo`;
CREATE TABLE IF NOT EXISTS `tbl_imgarticulo` (
  `id_imgarticulo` int(11) NOT NULL,
  `nombre_imgarticulo` varchar(25) COLLATE utf8_bin NOT NULL,
  `articulo_imgarticulo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_imgarticulo`:
--   `articulo_imgarticulo`
--       `tbl_articulo` -> `id_articulo`
--

--
-- Volcado de datos para la tabla `tbl_imgarticulo`
--

INSERT INTO `tbl_imgarticulo` (`id_imgarticulo`, `nombre_imgarticulo`, `articulo_imgarticulo`) VALUES
(1, 'j,hmgncgh', 20),
(2, 'bvcfghjk,', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_likes`
--
-- Creación: 18-05-2016 a las 06:24:15
--

DROP TABLE IF EXISTS `tbl_likes`;
CREATE TABLE IF NOT EXISTS `tbl_likes` (
  `id_likes` int(11) NOT NULL,
  `articulo_likes` int(11) NOT NULL,
  `usuario_likes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_likes`:
--   `articulo_likes`
--       `tbl_articulo` -> `id_articulo`
--

--
-- Volcado de datos para la tabla `tbl_likes`
--

INSERT INTO `tbl_likes` (`id_likes`, `articulo_likes`, `usuario_likes`) VALUES
(1, 11, 4),
(2, 14, 3),
(3, 16, 3),
(4, 13, 3),
(5, 14, 4),
(6, 11, 3),
(7, 14, 3),
(8, 16, 3),
(9, 13, 3),
(10, 14, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_preciopublicacion`
--
-- Creación: 19-05-2016 a las 09:09:51
--

DROP TABLE IF EXISTS `tbl_preciopublicacion`;
CREATE TABLE IF NOT EXISTS `tbl_preciopublicacion` (
  `id_preciopublicacion` int(11) NOT NULL,
  `nombre_preciopublicacion` varchar(30) COLLATE utf8_bin NOT NULL,
  `codescuento_preciopublicacion` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `precio_preciopublicacion` double NOT NULL,
  `activo_preciopublicacion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_preciopublicacion`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_publicacion`
--
-- Creación: 19-05-2016 a las 09:13:16
--

DROP TABLE IF EXISTS `tbl_publicacion`;
CREATE TABLE IF NOT EXISTS `tbl_publicacion` (
  `id_publicacion` int(11) NOT NULL,
  `fechainicio_publicacion` date NOT NULL,
  `fechafinal_publicacion` date NOT NULL,
  `anuncio_publicacion` int(11) NOT NULL,
  `visitas_publicacion` int(11) NOT NULL,
  `precio_publicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_publicacion`:
--   `anuncio_publicacion`
--       `tbl_anuncio` -> `id_anuncio`
--   `precio_publicacion`
--       `tbl_preciopublicacion` -> `id_preciopublicacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tagarticulo`
--
-- Creación: 18-05-2016 a las 06:24:15
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
-- Creación: 18-05-2016 a las 06:24:15
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
-- Creación: 18-05-2016 a las 06:24:15
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
-- Creación: 18-05-2016 a las 06:24:15
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
  `tipousuario` int(11) NOT NULL DEFAULT '4'
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
(1, 'usadmin1', 'qwer1234', 'Jorge', 'Jaico', 'usadmin1@clamm.com', 'Usuario administrador p.web', 'admin1.jpg', 4),
(2, 'usedit1', 'qwer1234', 'Jose Luis', 'Maseda', 'usedit1@clamm.com', 'Usuario redactor de articulos.', 'edit1.jpg', 4),
(3, 'useditboss1', 'qwer1234', 'Eric', 'Sanchez', 'useditboss1@clamm.com', 'Usuario redactor-Jefe de articulos', 'editboss1.jpg', 4),
(4, 'useditblog1', 'qwer1234', 'Alenjandro', 'Moreno', 'useditblog1@clamm.com', 'Usuario editor de blogs', 'editblog1.jpg', 4);

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
  ADD KEY `usuario_articulo` (`usuario_articulo`);

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
-- Indices de la tabla `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD PRIMARY KEY (`id_likes`),
  ADD KEY `articulo_like` (`articulo_likes`);

--
-- Indices de la tabla `tbl_preciopublicacion`
--
ALTER TABLE `tbl_preciopublicacion`
  ADD PRIMARY KEY (`id_preciopublicacion`),
  ADD UNIQUE KEY `codescuento_preciopublicacion_2` (`codescuento_preciopublicacion`),
  ADD KEY `codescuento_preciopublicacion` (`codescuento_preciopublicacion`);

--
-- Indices de la tabla `tbl_publicacion`
--
ALTER TABLE `tbl_publicacion`
  ADD UNIQUE KEY `id_publicacion` (`id_publicacion`),
  ADD KEY `anuncio_publicacion` (`anuncio_publicacion`),
  ADD KEY `precio_publicacion` (`precio_publicacion`);

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
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbl_articulo`
--
ALTER TABLE `tbl_articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `tbl_comentario`
--
ALTER TABLE `tbl_comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_imgarticulo`
--
ALTER TABLE `tbl_imgarticulo`
  MODIFY `id_imgarticulo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_likes`
--
ALTER TABLE `tbl_likes`
  MODIFY `id_likes` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tbl_preciopublicacion`
--
ALTER TABLE `tbl_preciopublicacion`
  MODIFY `id_preciopublicacion` int(11) NOT NULL AUTO_INCREMENT;
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
  ADD CONSTRAINT `tbl_articulo_ibfk_1` FOREIGN KEY (`usuario_articulo`) REFERENCES `tbl_usuario` (`id_usuario`);

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
  ADD CONSTRAINT `tbl_publicacion_ibfk_1` FOREIGN KEY (`anuncio_publicacion`) REFERENCES `tbl_anuncio` (`id_anuncio`),
  ADD CONSTRAINT `tbl_publicacion_ibfk_2` FOREIGN KEY (`precio_publicacion`) REFERENCES `tbl_preciopublicacion` (`id_preciopublicacion`);

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
