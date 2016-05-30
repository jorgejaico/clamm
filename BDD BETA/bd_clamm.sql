-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2016 a las 12:40:50
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
-- Creación: 30-05-2016 a las 09:42:09
--

DROP TABLE IF EXISTS `tbl_anuncio`;
CREATE TABLE IF NOT EXISTS `tbl_anuncio` (
  `id_anuncio` int(11) NOT NULL,
  `titulo_anuncio` varchar(25) COLLATE utf8_bin NOT NULL,
  `texto_anuncio` varchar(250) COLLATE utf8_bin NOT NULL,
  `imagen_anuncio` varchar(150) COLLATE utf8_bin NOT NULL,
  `usuario_anuncio` int(11) NOT NULL,
  `enlace_anuncio` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_anuncio`:
--   `usuario_anuncio`
--       `tbl_usuario` -> `id_usuario`
--

--
-- Volcado de datos para la tabla `tbl_anuncio`
--

INSERT INTO `tbl_anuncio` (`id_anuncio`, `titulo_anuncio`, `texto_anuncio`, `imagen_anuncio`, `usuario_anuncio`, `enlace_anuncio`) VALUES
(1, 'QIYUN.Z', 'Las Mujeres Sin Mangas Profunda Atractiva Del Cuello En V Vestidos Sin Espalda Bodycon Del Lapiz Del Coctel', 'Vestido1.jpg', 9, 'www.amazon.es/QIYUN-Z-Mujeres-Profunda-Atractiva-Vestidos/dp/B01DTZWC80?ie=UTF8&creative=24526&creativeASIN=B01DTZWC80&hvdev=c&hvnetw=g&hvqmt=&linkCode=df0&ref_=asc_df_B01DTZWC8034076192&tag=googshopes-21'),
(2, 'Naf Naf EZON', 'vestido Mujer', 'Vestido2.jpg', 9, 'www.amazon.es/Naf-EZON-vestido-Mujer-Bleu-Imprim%C3%A9/dp/B01ABIBN10?ie=UTF8&creative=24538&creativeASIN=B01ABIBN10&hvdev=c&hvnetw=g&hvqmt=&linkCode=df0&ref_=asc_df_B01ABIBN1034076197&tag=googshopes-21'),
(3, 'Madonna 74-2559', 'vestido Mujer', 'Vestido3.jpg', 9, 'www.amazon.es/Madonna-74-2559-vestido-Mujer/dp/B01BKH31DY/ref=pd_sim_sbs_193_3?ie=UTF8&dpID=31pZYF9k9sL&dpSrc=sims&preST=_AC_UL200_SR154%2C200_&refRID=YJDN006GCDBZ3TZZ59T8'),
(4, 'Vestido halter plisado', 'Vestido corto y plisado con cuello halter, tirantes finos que se cruzan en la espalda, escote profundo delante y cintura elástica entallada. Forro de punto.', 'hmvest.jpg', 5, 'www2.hm.com/es_es/productpage.0383339002.html'),
(5, 'Camisa en mezcla de lino', 'Camisa en tejido suave de mezcla de lino y algodón. Modelo de manga larga con cuello americano, un bolsillo superior, y canesú con pliegue y trabilla detrás. Corte estándar.', 'hmcamisa.jpg', 5, 'www2.hm.com/es_es/productpage.0363947007.html'),
(6, 'Vestido', 'Largo estampado volante pecho', 'bers1.jpg', 8, 'www.bershka.com/es/promos/mujer/ver-todo-/vestido-largo-estampado-volante-pecho-c1010075037p100195004.html?colorId=800'),
(7, 'Zapato Tacón', 'Zapato Tacón Grabado', 'berszapato.jpg', 5, 'www.bershka.com/es/zapatos/mujer/zapato-tac%C3%B3n/zapato-tac%C3%B3n-grabado-c1521701p100083017.html?colorId=001##crossSellingModule');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_articulo`
--
-- Creación: 30-05-2016 a las 09:42:09
--

DROP TABLE IF EXISTS `tbl_articulo`;
CREATE TABLE IF NOT EXISTS `tbl_articulo` (
  `id_articulo` int(11) NOT NULL,
  `titulo_articulo` varchar(140) COLLATE utf8_bin NOT NULL,
  `texto_articulo` text COLLATE utf8_bin NOT NULL,
  `usuario_articulo` int(11) NOT NULL,
  `portada_articulo` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `fecha_articulo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo_articulo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_articulo`:
--   `usuario_articulo`
--       `tbl_usuario` -> `id_usuario`
--

--
-- Volcado de datos para la tabla `tbl_articulo`
--

INSERT INTO `tbl_articulo` (`id_articulo`, `titulo_articulo`, `texto_articulo`, `usuario_articulo`, `portada_articulo`, `fecha_articulo`, `tipo_articulo`) VALUES
(16, 'Historia de amor entre un vegano y una carnívora', 'Hace poco más de un mes decidí hacerme vegano. Llevaba bastante tiempo pensándolo, pero me animé del todo al ver que muchos de mis amigos optaban por dejar de comer carne. Es que lo de darle al tofu se ha puesto muy de moda últimamente en Malasaña. Pero no es mi caso, para nada. Lo mío fue más por conciencia, que cuando te enteras de cómo funciona la producción de carne y pescado da reparo. Así que después de una cena con mis amigos en la que todos me pusieron cara rara por ser el único que no se pedía la hamburguesa vegana, decidí dejar de hincarle el diente a los animales.\n\nLo hice en plan radical, de un día para otro, y hasta lo anuncié en mi Facebook. Jamás había conseguido tantos me gusta en un estado. Menos de mi madre, que me puso un emoticono lloroso. Ella dice que los veganos sólo comen guarnición y me iba a pasar todo el día con gripe por falta de nutrientes, pero mi médico de cabecera, la doctora Romaní, no lo ve así: “Los médicos recomendamos una dieta completa, y una vegana lo es añadiendo un suplemento de vitamina B12, que es lo que puede faltar. A nivel cardiovascular es muy favorable, reduce el colesterol y con ellas las posibilidades de tener un infarto. No es casualidad que el presidente de la Asociación Americana de Cardiología, el Dr. Kim Williams, sea vegano”.\n\nQuizá habría que explica lo que es ser vegano. Según la Asociación Vegana Española (UVE), “es una alternativa ética al consumo y a la dependencia de productos no adaptados a las necesidades físicas y espirituales del ser humano, como la carne, el pescado, los lácteos, los huevos, la miel, los productos derivados de los animales y otros artículos de origen animal como el cuero y las pieles”. ', 9, 'imgvegano.jpg', '2016-05-25 10:21:39', 1),
(27, 'Zara amplí­a su tallaje hasta la XXL', '<p>Zara ha ampliado su tallaje hasta la <strong>XXL</strong> esta semana y ya se pueden adquirir dichas prendas, que figuran entre las &uacute;ltimas novedades, en su p&aacute;gina web. De momento, no toda la colecci&oacute;n primavera-verano se ha dise&ntilde;ado en esta talla, pero podr&iacute;a ser cuesti&oacute;n de tiempo. La respuesta de la marca de Inditex a la longeva petici&oacute;n de sus clientas de ampliar el tallaje llega en la misma semana que un informe sobre los anuncios de esta temporada desvelaba que solo el<strong> 1,4%</strong> de las modelos superaban la <strong>talla 40</strong>. Mango es una de las primeras firmas espa&ntilde;olas que dedic&oacute; un espacio a sus clientas con m&aacute;s tallaje creando la l&iacute;nea Violeta by Mango, que ya tiene incluso tienda propia. &nbsp;</p>\n<p style="text-align: center;">&nbsp;</p>\n<p style="text-align: center;"><strong>Este cambio de ruta podr&iacute;a significar una nueva vuelta de hoja del mundo</strong> de la moda que, poco a poco, comienza a empoderar de nuevo las curvas como ya hiciera en los noventa. Modelos como Ashley Graham &mdash;quien utiliza sus redes sociales para demostrar que una top no tiene ninguna necesidad de un cuerpo huesudo&mdash; o Candice Huffine han revolucionado la industria y ya protagonizan campa&ntilde;as de lencer&iacute;a y moda de ba&ntilde;o.&nbsp;</p>', 9, 'imgzara.jpg', '2016-05-28 00:44:16', 1),
(28, 'La corbata ya no es necesaria', '<p>La reputada periodista de <em>moda Vanessa</em> Friedman reflexionaba esta semana en <em>The New York Timessobre</em> el menguante uso de la corbata en la clase <em>pol&iacute;tica mundial</em>. Mientras el magnate y candidato republicano a la Casa Blanca Donald Trump se aferra con obstinaci&oacute;n a sus corbatas rojas de Brioni, el presidente Barack Obama se la quita a la m&iacute;nima ocasi&oacute;n. Pol&iacute;ticos de todos los colores la usan cada vez menos. S&iacute;mbolo de los hombres de bien y de las cosas serias, la desaparici&oacute;n de la corbata en el uniforme pol&iacute;tico no es un tema balad&iacute;. Si el incremento del uso del esmalte de u&ntilde;as es un claro indicador de tiempos de crisis, &iquest;qu&eacute; significados esconder&aacute; el destierro de este complemento sartorial por parte de los pol&iacute;ticos? Econom&iacute;a sin corbatas se puede leer en la cubierta de la edici&oacute;n espa&ntilde;ola de uno de los &uacute;ltimos libros de Yanis Varoufakis, el nuevo h&eacute;roe de la izquierda. El ingenioso titular parec&iacute;a anticipar tambi&eacute;n la nueva era de la pol&iacute;tica sin corbatas. Y es que durante las &uacute;ltimas elecciones en Espa&ntilde;a, la corbata y la indumentaria de los nuevos candidatos ha ocupado m&aacute;s espacio que nunca en la prensa. Estilistas y personal shoppers de todo pelaje intentaban desencriptar los significados y mensajes por el uso y no uso de determinadas prendas por parte de los pol&iacute;ticos y sus asesores. Al inicio de campa&ntilde;a cada uno parec&iacute;a tener una etiqueta clara: Pablo Iglesias y sus ya famosas camisas compradas en Alcampo, en la l&iacute;nea desenfadada de sus compa&ntilde;eros de la marea lila como el griego Alexis Tsipras; Albert Rivera y sus inmaculados trajes chaqueta y corbatas estrechitas; Pedro S&aacute;nchez en busca de una correcci&oacute;n simp&aacute;tica con un uso intermitente de la corbata; y <strong>Rajoy</strong>, <strong>como Trump</strong>, <span style="text-decoration: underline;"><em>aferrado a ellas de toda la vida</em></span>.</p>', 2, 'imgcorbata.jpg', '2016-05-25 10:35:02', 0),
(29, 'Beyoncé, acusada de fabricar con mano de obra esclava ', '<p><strong>Beyoncé</strong> quiere que su l&iacute;nea de ropa deportiva, Ivy Park, &ldquo;apoye&rdquo; e &ldquo;inspire&rdquo; a las mujeres. El objetivo probablemente solo se cumple para las que pagan dinero por las prendas en Topshop y Nordstrom. Quienes las fabrican lo hacen en <strong>talleres clandestinos de Sri Lanka</strong> y cobran<strong> 5,46 euros</strong> <strong>al d&iacute;a</strong>. Necesitar&iacute;an trabajar m&aacute;s de un mes para comprarse uno de los leggings que la diva vende por 145 euros. Seg&uacute;n una investigaci&oacute;n del diario brit&aacute;nico The Sun, las costureras son mujeres j&oacute;venes y pobres, originarias del campo, que solo pueden permitirse vivir en residencias atestadas y que necesitan laborar m&aacute;s de 60 horas a la semana para cubrir sus gastos.\nUna chica de 22 a&ntilde;os, que opera una m&aacute;quina de coser, cont&oacute; al peri&oacute;dico que vive en una residencia de 100 habitaciones cerca de la f&aacute;brica en la ciudad de Katunayake.&ldquo;Todo lo que hago es trabajar, dormir, trabajar, dormir&rdquo;, dice. La empleada asegura que no puede salir adelante con su salario de 110 euros al mes. La cantidad es poco m&aacute;s de la mitad del salario medio en Sri Lanka, que se calcula en 207 euros. La joven trabaja casi 10 horas al d&iacute;a, de lunes a viernes, con un descanso de 30 minutos para comer. Tiene que coser tambi&eacute;n los s&aacute;bados y hacer horas extra entre semana para llegar a fin de mes. La chica, hija de un granjero de una aldea a m&aacute;s de 300 kil&oacute;metros de distancia, comparte una habitaci&oacute;n de tres metros por tres metros con su hermana de 19 a&ntilde;os. Cada una paga 24 euros al mes. &ldquo;No tenemos nuestra propia cocina o ducha; solo es un peque&ntilde;o dormitorio&rdquo;, explic&oacute; a The Sun. &ldquo;Tenemos que compartir el barrac&oacute;n de duchas con los hombres, as&iacute; que no hay mucha privacidad. Es impactante y muchas de las mujeres tiene mucho miedo&rdquo;, a&ntilde;adi&oacute;.<p>', 7, 'imgbeyonce.jpg', '2016-05-28 00:44:30', 1),
(31, 'Los secretos que se esconden tras la alfombra roja', '<p>Un vestido de corte victoriano, adornado <strong>2.000 perlas</strong> y <strong>2.500 cristales</strong> Swarovski cosidos a mano con hilo de seda corona la habitaci&oacute;n 329 del H&ocirc;tel Martinez, en Cannes. El emblem&aacute;tico hotel, situado en el coraz&oacute;n de La Croisette, alberga cada a&ntilde;o -desde ya hace 11- una suite triple dedicada al universo Elie Saab.</p>\n<p>El idilio de la marca con el cine va m&aacute;s all&aacute; del precioso vestido color champagne que Kendall Jenner eligi&oacute; para una de las after parties que se suceden tras las premi&egrave;res del <strong>Festival</strong>. Los dise&ntilde;os de Saab son uno de los grandes reclamos de la alfombra roja, s&iacute;, y adem&aacute;s en un evento twenty four/seven como lo es Cannes, tambi&eacute;n los podemos ver en ruedas de prensa, en shootings que tienen lugar en las terrazas de los majestuosos hoteles de esta ciudad, en los <strong>photocalls</strong> de las fiestas e incluso en los fotogramas de las pel&iacute;culas que se estrenan.</p>', 3, 'imgalfombra.jpg', '2016-05-25 10:37:46', 0),
(35, 'El vestido de novia de Kate Middleton: ¿fue una copia?', '<p>La boda se celebr&oacute; el 29 de abril de 2011. <strong>1.900 invitados</strong> y <strong>2.200 millones de espectadores</strong> en todo el mundo vieron en directo el &uacute;ltimo cuento de hadas hecho realidad: la boda real entre el <strong>pr&iacute;ncipe Guillermo</strong> de Inglaterra y su novia, <strong>Kate Middleton</strong>. La novia lleg&oacute; puntual a Westminster con un impresionante vestido decorado con encaje, creado para ella especialmente por Sarah Burton, la directora creativa de Alexander McQueen y heredera del puesto que dej&oacute; vac&iacute;o el dise&ntilde;ador brit&aacute;nico. La imagen dio la vuelta al mundo en cuesti&oacute;n de segundos pero es ahora, cinco a&ntilde;os despu&eacute;s, cuando vuelve a ser noticia. La dise&ntilde;adora de novias brit&aacute;nica Christine Kendall asegura que en noviembre de 2010 envi&oacute; a Kate Middleton varias ideas de vestidos de novia de <strong>inspiraci&oacute;n a&ntilde;os 50</strong>.</p>\r\n<p>Seg&uacute;n mantiene, poco despu&eacute;s recibi&oacute; una carta de agradecimiento desde la oficina de los pr&iacute;ncipes Guillermo y Enrique, y que su sorpresa fue may&uacute;scula cuando vio a la novia llegar a la abad&iacute;a con un dise&ntilde;o pr&aacute;cticamente igual al que ella hab&iacute;a dibujado. Kendall ha emprendido acciones legales y quiere reclamar la propiedad intelectual del dise&ntilde;o.</p>\r\n<p>El vestido de novia de Kate Middleton: &iquest;<strong>fue una copia</strong>?</p>\r\n<p>25-04-2016 &nbsp;Por Glamour.es</p>\r\n<p>2.200 millones de espectadores en todo el mundo vieron en directo el vestido de la novia. Ahora Alexander <strong>McQueen aclara la pol&eacute;mica</strong>.</p>\r\n<p>&nbsp;</p>\r\n<p>Getty ImagesDetalle del velo de Kate.</p>\r\n<p>Etiquetas Novias, Kate Middleton</p>\r\n<p>La boda se celebr&oacute; el 29 de abril de 2011. 1.900 invitados y 2.200 millones de espectadores en todo el mundo vieron en directo el &uacute;ltimo cuento de hadas hecho realidad: la boda real entre el pr&iacute;ncipe Guillermo de Inglaterra y su novia, Kate Middleton. La novia lleg&oacute; puntual a Westminster con un impresionante vestido decorado con encaje, creado para ella especialmente por Sarah Burton, la directora creativa de Alexander McQueen y heredera del puesto que dej&oacute; vac&iacute;o el dise&ntilde;ador brit&aacute;nico. La imagen dio la vuelta al mundo en cuesti&oacute;n de segundos pero es ahora, cinco a&ntilde;os despu&eacute;s, cuando vuelve a ser noticia. La dise&ntilde;adora de novias brit&aacute;nica Christine Kendall asegura que en noviembre de 2010 envi&oacute; a Kate Middleton varias ideas de vestidos de novia de inspiraci&oacute;n a&ntilde;os 50.</p>\r\n<p>Seg&uacute;n mantiene, poco despu&eacute;s recibi&oacute; una carta de agradecimiento desde la oficina de los pr&iacute;ncipes Guillermo y Enrique, y que su sorpresa fue may&uacute;scula cuando vio a la novia llegar a la abad&iacute;a con un dise&ntilde;o pr&aacute;cticamente igual al que ella hab&iacute;a dibujado. Kendall ha emprendido acciones legales y quiere reclamar la propiedad intelectual del dise&ntilde;o.</p>\r\n<p>Ver 28 fotos | Los vestidos de novia de las pel&iacute;culas y series</p>\r\n<p>Galer&iacute;a</p>\r\n<p>Kate Middleton</p>\r\n<p>&nbsp;Getty ImagesKate, con su vestido de novia royal.</p>\r\n<p>En Alexander McQueen, que pertenece al grupo de lujo Kering, dicen estar &ldquo;totalmente desconcertados&rdquo; por las acusaciones, que la dise&ntilde;adora (que tiene un peque&ntilde;o taller ubicado en el condado ingl&eacute;s de Hertfordshire) ya les hizo llegar un a&ntilde;o despu&eacute;s de la boda de los duques de Cambridge. &ldquo;Sarah Burton nunca vio los dise&ntilde;os de Kendall, y no la conoc&iacute;a antes de que se pusiera en contacto con nosotros.</p>', 7, 'imgbodakate.jpg', '2016-05-25 10:38:56', 1),
(37, 'Una segunda piel elástica promete ser el lifting del futuro', '<p>Pasar por quir&oacute;fano para rejuvenecer la piel podr&iacute;a ser historia. Tambi&eacute;n las combinaciones imposibles de cosm&eacute;ticos, las listas interminables de cremas o los elixires de juventud que usan las celebrities... La revista cient&iacute;fica Nature Materials ha presentado un nuevo material creado por el MIT (Instituto Tecnol&oacute;gico de Massachusetts) que, solo al ser aplicado sobre la piel, la tensa, <strong>elimina su flacidez</strong> y <strong>suaviza sus arrugas</strong> siendo completamente imperceptible.</p>\r\n<p>Parece magia pero no lo es: se trata de un pol&iacute;mero creado a partir de mol&eacute;culas de silicona y ox&iacute;geno que imita las caracter&iacute;sticas de una piel joven y saludable. Es artifical pero totalmente biocompatible, sint&eacute;tico pero transpirable, y se ha probado sobre la piel de numerosos voluntarios. Seg&uacute;n el Dr. Arias, m&eacute;dico especialista de la AEDV (Academia Espa&ntilde;ola de Dermatolog&iacute;a y Venereolog&iacute;a), "el producto a&uacute;n no ha sido probado en usos cl&iacute;nicos como en curaci&oacute;n de heridas, pero s&iacute; en el uso cosm&eacute;tico y la mejora de las bolsas de los p&aacute;rpados con resultados de &eacute;xito".</p>\r\n<p>Como si de una crema com&uacute;n se tratase, se aplic&oacute; en las bolsas de los ojos, en antebrazos y piernas, y se consigui&oacute; una capa protectora que hidrat&oacute; e impuls&oacute; la elasticidad de la piel haci&eacute;ndola parecer m&aacute;s firme y suave. "Se administra una crema transparente con el pol&iacute;mero y, posteriormente, un catalizador que permite la formaci&oacute;n de una ret&iacute;cula no visible que se adhiere f&aacute;cilmente y proporciona protecci&oacute;n, contractilidad, elasticidad y resistencia a la deformaci&oacute;n", a&ntilde;ade <strong>el doctor</strong>.</p>', 3, 'imgoperaciones.jpg', '2016-05-25 10:40:48', 0),
(39, 'Beauty Scoop: las noticias de belleza de la semana', '<p>Nueva embajadora para Chanel.La joven y prometedora actriz Lily-Rose Depp ha sido elegida como Egerie del nuevo perfume LEau de Chanel. la protagonista de una campan prevista para el mes de septiembre, tras haberlo sido tambi&eacute;n de la colecci de gafas de la firma francesa. Depp encarna a la perdecci los valores de su generacion y el frescor y belleza que la casa quiere transmitir con su nueva creacion.</p>', 6, 'imgscoop.jpg', '2016-05-28 00:41:58', 1),
(40, 'Ondas surferas con David Mallett', '<p>La sal de Murray River, conocida hasta ahora por los grandes chefs del mundo entero, es el ingrediente base de la nueva creaci&oacute;n de David Mallett. Australian Salt Spray (30 &euro;) aporta al cabello un aspecto voluminoso y salvaje ideal para tus ondas surferas de verano. Con un ligero perfume de yuzu y bergamota proporciona el frescor vibrante y la textura que estabas buscando.</p>', 2, 'imgondassurferas.jpg', '2016-05-25 10:45:34', 0),
(41, 'Velas de verano, por Baobab Collection', '<p>Baobab Collection celebra la llegada del verano con Eden Trillogy (desde 68 &euro;), una edici&oacute;n limitada de tres nuevas velas destinadas a formar parte de las casas vacacionales m&aacute;s espectaculares. Los paisajes ex&oacute;ticos de la costa africana son los protagonistas y la inspiraci&oacute;n para cada una de las velas, ilustradas por Cyril Destrade, que nos trasladan a un mundo de colores intensos y salvajes.</p>', 6, 'imgvelas.jpg', '2016-05-25 10:45:39', 1),
(42, 'Pestle & Mortar en Laconium', '<p>El s&eacute;rum de &aacute;cido hialur&oacute;nico de Pestle &amp; Mortar (45.90 &euro;), una firma irlandesa, se convirti&oacute; al poco tiempo de su nacimiento en 2014 en un producto de culto en el mercado anglosaj&oacute;n. Y ahora llega a Laconium para sorprender con su eficacia. Cuenta con hasta un 80% de &aacute;cido hialur&oacute;nico en su f&oacute;rmula y penetra en la piel logrando los mejores efectos hidratantes y anti-edad.</p>', 3, 'imgpestle.jpg', '2016-05-25 10:45:44', 0),
(43, 'Aceite de noche de Germinal', '<p>Germinal presenta su nuevo producto de noche para uso diario: el Aceite Nutrituvo de Tacto Seco (26 €), un tratamiento que complementa la rutina básica hidratando, nutriendo y rejuveneciendo la piel consiguiendo un aspecto suave, terso e iluminado. Sus 5 aceites de origen vegetal componen una novedosa fórmula apta para todo tipo de pieles.</p>', 2, 'imgaceite.jpg', '2016-05-25 10:45:50', 0),
(44, 'La mafia de las modelos', '<p> Las cinco principales agencias de modelos que operan en el Reino Unido están siendo oficialmente investigadas por formar un cartel para fijar los abultados precios de un sector que mueve millones. El organismo regulador de la competencia (CMA, en sus siglas inglesas) acusa a estas compañías, entre ellas las descubridoras de la top Cara Delevingne o en su día Kate Moss, de “intercambiar información confidencial y sensible para la competencia, incluidos los planes de futuro”. Las alertas comenzaron a sonar el año pasado, a raíz de las quejas de algunas de las grandes empresas de la industria ante el disparado caché de las modelos. La CMA confirmó entonces que tres agencias, Models 1, Premier y Storm, estaban en el punto de mira, lista ahora ampliada con Viva y FM Models. La Autoridad de la Competencia y Mercados del Reino Unido les acusa de ponerse de acuerdo —a través de un “regular y sistemático” intercambio de emails— para rechazar las cifras ofrecidas por sus clientes y negociar precios más altos. </p>', 4, 'mafiaportada.jpg', '2016-05-27 14:44:57', 1),
(45, 'Estas son las ''zapas'' más exclusivas del mundo', '<p>\r\nUna sencilla búsqueda en Instagram nos informa de que en la red social del "mira lo que tengo" hay actualmente más de 10 millones de imágenes con el hashtag #sneakers. Está claro: si antes las zapatillas servían para identificar la pertenencia a un grupo social, ahora la intención es que representen únicamente a su portador. Cuanto más exclusivas sean, mejor (y más likes generarán). Algo parecido pensó Dominic Chambrone cuando, a los 16 años, empezó a pintar las suyas con aerógrafo. "No quería llevar las mismas Jordans que todos mis compañeros", asegura este californiano que no tardó en ir un poco más allá. Tras iniciarse en el mundo del calzado, comenzó a destripar algunos de los modelos de zapatillas más célebres para crear mutaciones a golpe de tijera, reinterpretándolas con materiales lujosos (como piel de serpiente) o transformando unas simples Air Force 1 en mocasines. Había nacido The Shoe Surgeon, el cirujano (o el Doctor Frankenstein) de las sneakers.\r\n</p>', 4, 'nikeportada.jpg', '2016-05-27 14:44:57', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comentario`
--
-- Creación: 30-05-2016 a las 09:42:09
--

DROP TABLE IF EXISTS `tbl_comentario`;
CREATE TABLE IF NOT EXISTS `tbl_comentario` (
  `id_comentario` int(11) NOT NULL,
  `texto_comentario` varchar(250) COLLATE utf8_bin NOT NULL,
  `usuario_comentario` int(11) NOT NULL,
  `fecha_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `articulo_comentario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_comentario`:
--   `articulo_comentario`
--       `tbl_articulo` -> `id_articulo`
--

--
-- Volcado de datos para la tabla `tbl_comentario`
--

INSERT INTO `tbl_comentario` (`id_comentario`, `texto_comentario`, `usuario_comentario`, `fecha_comentario`, `articulo_comentario`) VALUES
(1, 'ghjfcgdsafersg', 6, '2016-05-25 11:02:35', 29),
(2, 'dsafsaref', 6, '2016-05-25 11:02:40', 29),
(3, 'Esta rechevere', 1, '2016-05-25 08:40:45', 29),
(4, 'Me ha gustado mucho tu blog', 7, '2016-05-25 11:03:40', 29),
(5, 'ohhhh, es super precioso!!!! <3', 9, '2016-05-25 11:10:20', 16),
(6, 'No me a gustado nada, creo que los veganos son el diablo.', 6, '2016-05-25 11:10:20', 16),
(7, 'Super de acuerdo con esta elección', 9, '2016-05-25 11:23:12', 27),
(8, 'Quien ha escrito esto? No me puedo creer que esta noticia salga aquí. Populismo por parte de ZARA para recivir publicidad gratis ', 6, '2016-05-25 11:23:12', 27),
(9, 'De todas formas la continuaré utilizando. Es un gran complemento.', 7, '2016-05-25 11:23:12', 28),
(10, 'La corbata es super sexy, no es necesaria pero es un buen complemento.', 8, '2016-05-25 11:23:12', 28),
(11, 'Buena publicación', 9, '2016-05-25 11:23:12', 28),
(12, 'No puedo creerlo ella es una diva.', 9, '2016-05-25 21:58:21', 29),
(13, 'Deberían detenerla, que pague como el resto', 6, '2016-05-25 21:58:21', 29),
(14, 'uhhhh secretitos :$ Me encantan este tipo de Artículos ', 5, '2016-05-25 22:01:17', 31),
(15, 'Mis felicitaciones al editor <3', 5, '2016-05-25 22:01:17', 31),
(16, 'Me encanta, una boda estilo 70''s me encanta :D', 5, '2016-05-26 08:44:15', 35),
(17, 'Enserio, no me pondría ese vestido jamas.', 6, '2016-05-26 08:44:15', 35),
(18, 'No puedo creer que gente se someta a esos tratamientos..', 9, '2016-05-26 08:48:26', 37),
(19, 'Me indigna profundamente...', 5, '2016-05-26 08:48:26', 37),
(20, 'Me encanta este apartado :)', 6, '2016-05-26 08:53:00', 39),
(21, 'Es fantástico, informada en todo momento. ', 5, '2016-05-26 08:53:00', 39),
(22, 'Gracias Chic@s. :)', 9, '2016-05-26 08:53:00', 39),
(23, 'Creo que esta pagina empieza a tomar forma  :)', 6, '2016-05-26 08:53:00', 39),
(24, 'Cada cuanto lo repetiras :$', 5, '2016-05-26 08:53:00', 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imgarticulo`
--
-- Creación: 30-05-2016 a las 09:42:09
--

DROP TABLE IF EXISTS `tbl_imgarticulo`;
CREATE TABLE IF NOT EXISTS `tbl_imgarticulo` (
  `id_imgarticulo` int(11) NOT NULL,
  `nombre_imgarticulo` varchar(150) COLLATE utf8_bin NOT NULL,
  `articulo_imgarticulo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_imgarticulo`:
--   `articulo_imgarticulo`
--       `tbl_articulo` -> `id_articulo`
--

--
-- Volcado de datos para la tabla `tbl_imgarticulo`
--

INSERT INTO `tbl_imgarticulo` (`id_imgarticulo`, `nombre_imgarticulo`, `articulo_imgarticulo`) VALUES
(3, 'vegano1.jpg', 16),
(4, 'vegano2.jpg', 16),
(5, 'tallaxxl1.jpg', 27),
(6, 'tallaxxl2.jpg', 27),
(7, 'tallaxxl3.jpg', 27),
(26, 'aceite3.jpg', 43),
(27, 'corbata1.jpg', 28),
(28, 'corbata2.jpg', 28),
(29, 'corbata3.jpg', 28),
(30, 'ondasurferas1.jpg', 40),
(31, 'ondasurferas2.jpg', 40),
(32, 'aceite1.jpg', 43),
(33, 'aceite2.jpg', 43),
(34, 'beyonce1.jpg', 29),
(35, 'beyonce2.jpg', 29),
(36, 'beyonce3.jpg', 29),
(37, 'bodakate1.jpg', 35),
(38, 'bodakate2.jpg', 35),
(39, 'bodakate3.jpg', 35),
(50, 'alfombra4.jpg', 31),
(51, 'alfombra1.jpg', 31),
(52, 'alfombra2.jpg', 31),
(53, 'alfombra3.jpg', 31),
(54, 'lifting1.jpg', 37),
(55, 'lifting2.jpg', 37),
(56, 'lifting3.jpg', 37),
(57, 'pestle1.jpg', 42),
(58, 'pestle2.jpg', 42),
(59, 'pestle3.jpg', 42),
(60, 'pestle4.jpg', 42),
(61, 'velas1.jpg', 41),
(62, 'velas2.jpg', 41),
(63, 'velas3.jpg', 41),
(64, 'scoop1.jpg', 39),
(65, 'scoop1.jpg', 39),
(66, 'mafia1.jpg', 44),
(67, 'mafia2.jpg', 44),
(68, 'nike1.jpg', 45),
(69, 'nike2.jpg', 45),
(70, 'nike3.jpg', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_likes`
--
-- Creación: 30-05-2016 a las 09:42:09
--

DROP TABLE IF EXISTS `tbl_likes`;
CREATE TABLE IF NOT EXISTS `tbl_likes` (
  `id_likes` int(11) NOT NULL,
  `articulo_likes` int(11) NOT NULL,
  `usuario_likes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_likes`:
--   `articulo_likes`
--       `tbl_articulo` -> `id_articulo`
--

--
-- Volcado de datos para la tabla `tbl_likes`
--

INSERT INTO `tbl_likes` (`id_likes`, `articulo_likes`, `usuario_likes`) VALUES
(1, 16, 4),
(2, 16, 3),
(3, 16, 3),
(4, 27, 3),
(5, 28, 4),
(6, 28, 3),
(7, 27, 3),
(8, 31, 3),
(9, 31, 3),
(10, 31, 4),
(11, 44, 5),
(12, 44, 6),
(13, 44, 7),
(14, 45, 9),
(15, 45, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_publicacion`
--
-- Creación: 30-05-2016 a las 09:42:09
--

DROP TABLE IF EXISTS `tbl_publicacion`;
CREATE TABLE IF NOT EXISTS `tbl_publicacion` (
  `id_publicacion` int(11) NOT NULL,
  `fechainicio_publicacion` date NOT NULL,
  `fechafinal_publicacion` date NOT NULL,
  `anuncio_publicacion` int(11) NOT NULL,
  `visitas_publicacion` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_publicacion`:
--   `anuncio_publicacion`
--       `tbl_anuncio` -> `id_anuncio`
--

--
-- Volcado de datos para la tabla `tbl_publicacion`
--

INSERT INTO `tbl_publicacion` (`id_publicacion`, `fechainicio_publicacion`, `fechafinal_publicacion`, `anuncio_publicacion`, `visitas_publicacion`) VALUES
(1, '2016-05-03', '2016-06-06', 2, 0),
(2, '2016-05-04', '2016-06-06', 3, 0),
(3, '2016-05-26', '2016-06-06', 4, 0),
(4, '2016-05-10', '2016-06-06', 3, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tagarticulo`
--
-- Creación: 30-05-2016 a las 09:42:09
--

DROP TABLE IF EXISTS `tbl_tagarticulo`;
CREATE TABLE IF NOT EXISTS `tbl_tagarticulo` (
  `id_tagarticulo` int(11) NOT NULL,
  `tag_tagarticulo` int(11) NOT NULL,
  `articulo_tagarticulo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_tagarticulo`:
--   `articulo_tagarticulo`
--       `tbl_articulo` -> `id_articulo`
--   `tag_tagarticulo`
--       `tbl_tags` -> `id_tag`
--

--
-- Volcado de datos para la tabla `tbl_tagarticulo`
--

INSERT INTO `tbl_tagarticulo` (`id_tagarticulo`, `tag_tagarticulo`, `articulo_tagarticulo`) VALUES
(61, 1, 16),
(62, 1, 31),
(63, 1, 35),
(64, 2, 27),
(65, 2, 28),
(66, 2, 31),
(67, 2, 35),
(68, 2, 37),
(69, 3, 40),
(70, 3, 41),
(71, 3, 42),
(72, 4, 35),
(73, 5, 31),
(74, 5, 39),
(75, 5, 43),
(76, 6, 29),
(77, 2, 44),
(78, 5, 44),
(79, 2, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tags`
--
-- Creación: 30-05-2016 a las 09:42:09
--

DROP TABLE IF EXISTS `tbl_tags`;
CREATE TABLE IF NOT EXISTS `tbl_tags` (
  `id_tag` int(11) NOT NULL,
  `nombre_tag` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- RELACIONES PARA LA TABLA `tbl_tags`:
--

--
-- Volcado de datos para la tabla `tbl_tags`
--

INSERT INTO `tbl_tags` (`id_tag`, `nombre_tag`) VALUES
(1, 'Amor'),
(2, 'belleza'),
(3, 'Vela'),
(4, 'boda'),
(5, 'noche'),
(6, 'Beyoncé');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipousuario`
--
-- Creación: 30-05-2016 a las 09:42:09
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
-- Creación: 30-05-2016 a las 09:42:09
--

DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_bin NOT NULL,
  `pass` varchar(20) COLLATE utf8_bin NOT NULL,
  `nombre_usuario` varchar(30) COLLATE utf8_bin NOT NULL,
  `apellido_usuario` varchar(30) COLLATE utf8_bin NOT NULL,
  `correo_usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `bio_usuario` varchar(250) COLLATE utf8_bin NOT NULL,
  `img_usuario` varchar(150) COLLATE utf8_bin NOT NULL,
  `tipousuario` int(11) NOT NULL DEFAULT '4'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(2, 'usedit1', 'qwer1234', 'Jose Luis', 'Maseda', 'usedit1@clamm.com', 'Usuario redactor de articulos.', 'edit1.png', 4),
(3, 'useditboss1', 'qwer1234', 'Eric', 'Sanchez', 'useditboss1@clamm.com', 'Usuario redactor-Jefe de articulos', 'editboss1.png', 4),
(4, 'useditblog1', 'qwer1234', 'Alenjandro', 'Moreno', 'useditblog1@clamm.com', 'Usuario editor de blogs', 'editblog1.png', 4),
(5, 'alexgarci', 'qwer1234', 'Alexia', 'Garcia', 'alegarcia@hotmail.com', 'Enamorado de la moda juvenil \r\nde los precios y rebajas que yo vi,\r\nenamorado de la moda juvenil.de los chicos, de las chicas, de los maniquís.\r\n', 'imagen.png', 4),
(6, 'AitorB', 'qwer1234', 'Aitor', 'Rodriguez', 'aitble@hotmail.com', 'No controles mi forma de vestir \r\nporque es total y a todo el mundo gusto.', 'imagen.png', 4),
(7, 'AlbertRR', 'qwer1234', 'Alberto', 'Ramirez', 'Curaj@gmail.com', 'Amante de la moda, preocupado por estar en la onda. Diseño mi propia ropa y posteo blogs', 'imagen.png', 4),
(8, 'jelingu', 'qwer1234', 'MariaJesus', 'Gutierrez', 'jelingu84@gmail.com', 'Interesado conocer nuevos estilos, gente y la actualidad en moda.', 'imagen.png', 4),
(9, 'TinaTirolina', 'qwer1234', 'Tina', 'Suave', 'tinatirolina@outlook.net', 'No me interesa la moda actual, tengo mi propia forma de vestir, mirad mis articulos y podras ser una Tirolain.', 'imagen.png', 4);

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
  ADD KEY `articulo_like` (`articulo_likes`),
  ADD KEY `articulo_likes` (`articulo_likes`);

--
-- Indices de la tabla `tbl_publicacion`
--
ALTER TABLE `tbl_publicacion`
  ADD PRIMARY KEY (`id_publicacion`),
  ADD UNIQUE KEY `id_publicacion` (`id_publicacion`),
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
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tbl_articulo`
--
ALTER TABLE `tbl_articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `tbl_comentario`
--
ALTER TABLE `tbl_comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `tbl_imgarticulo`
--
ALTER TABLE `tbl_imgarticulo`
  MODIFY `id_imgarticulo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT de la tabla `tbl_likes`
--
ALTER TABLE `tbl_likes`
  MODIFY `id_likes` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tbl_publicacion`
--
ALTER TABLE `tbl_publicacion`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbl_tagarticulo`
--
ALTER TABLE `tbl_tagarticulo`
  MODIFY `id_tagarticulo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT de la tabla `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tbl_tipousuario`
--
ALTER TABLE `tbl_tipousuario`
  MODIFY `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
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
-- Filtros para la tabla `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD CONSTRAINT `tbl_likes_ibfk_1` FOREIGN KEY (`articulo_likes`) REFERENCES `tbl_articulo` (`id_articulo`);

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
