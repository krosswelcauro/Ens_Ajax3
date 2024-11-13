-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2020 a las 21:02:01
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbensend`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acompanante`
--

CREATE TABLE `acompanante` (
  `id_acompanante` int(11) NOT NULL,
  `cedula_acompanante` int(11) NOT NULL,
  `nombre_acompanante` varchar(20) NOT NULL,
  `apellido_acompanante` varchar(20) NOT NULL,
  `direccion_acompanante` varchar(90) NOT NULL,
  `telefono_acompanante` varchar(12) NOT NULL,
  `relacion` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `acompanante`
--

INSERT INTO `acompanante` (`id_acompanante`, `cedula_acompanante`, `nombre_acompanante`, `apellido_acompanante`, `direccion_acompanante`, `telefono_acompanante`, `relacion`) VALUES
(1, 27024967, 'Jolber', 'Chirinos', 'Barrio la paz calle 5 entre 1 y 2\r\n', '123456', 'Padre'),
(2, 999999, 'Ramon ', 'Colina', 'LA GALLERA', '989898', 'Hermano/a'),
(3, 26556789, 'Jennipher', 'Bello', 'asdaa', '123123', 'Madre'),
(4, 123, 'Yhon ', 'Salazar', 'cagua', '5206898', 'Padre'),
(5, 1231231, 'Carmen', 'COlina', 'asdasd', '213123123', 'Madre'),
(6, 123456789, 'Pruebá', 'Prueba', 'Prueba', '11111', 'Hermano/a'),
(7, 5585844, 'Carmen', 'Josefina', 'La paz', '091283', 'Madre'),
(8, 12312, 'asdas', 'asdas', 'asdasd', '12312', 'Madre'),
(9, 8888999, 'Jennipher', 'Salazar', 'lkjhgfda', '5206898', 'Madre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentes_f`
--

CREATE TABLE `antecedentes_f` (
  `id_antecedentes_fa` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspectos_evaluar`
--

CREATE TABLE `aspectos_evaluar` (
  `id_aspectos_evaluar` int(11) NOT NULL,
  `nombre_asp` varchar(90) NOT NULL,
  `descripcion_asp` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aspectos_evaluar`
--

INSERT INTO `aspectos_evaluar` (`id_aspectos_evaluar`, `nombre_asp`, `descripcion_asp`) VALUES
(1, 'cualquiera', 'nose'),
(2, 'nombre', 'datos'),
(3, 'nombre2', 'datos2'),
(4, 'Nombre3', 'Datos3'),
(5, 'asda', 'aklsdfjlk'),
(6, 'asd', 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspecto_consulta`
--

CREATE TABLE `aspecto_consulta` (
  `n_consulta` varchar(11) NOT NULL,
  `observacion_terapeuta` varchar(250) NOT NULL,
  `valoracion` varchar(10) DEFAULT NULL,
  `id_aspectos_evaluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aspecto_consulta`
--

INSERT INTO `aspecto_consulta` (`n_consulta`, `observacion_terapeuta`, `valoracion`, `id_aspectos_evaluar`) VALUES
('0', 'Observacion', '3', 2),
('F000001', 'Observaciones2', '7', 3),
('F000002', 'Obseervacion3', '3', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capa`
--

CREATE TABLE `capa` (
  `id_capa` int(11) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `lamina` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capa_item`
--

CREATE TABLE `capa_item` (
  `id_capa` int(11) NOT NULL,
  `id_dicc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nombre`, `id_estado`) VALUES
(1, 'Maroa', 1),
(2, 'Puerto Ayacucho', 1),
(3, 'San Fernando de Atabapo', 1),
(4, 'Anaco', 2),
(5, 'Aragua de Barcelona', 2),
(6, 'Barcelona', 2),
(7, 'Boca de Uchire', 2),
(8, 'Cantaura', 2),
(9, 'Clarines', 2),
(10, 'El Chaparro', 2),
(11, 'El Pao Anzoátegui', 2),
(12, 'El Tigre', 2),
(13, 'El Tigrito', 2),
(14, 'Guanape', 2),
(15, 'Guanta', 2),
(16, 'Lechería', 2),
(17, 'Onoto', 2),
(18, 'Pariaguán', 2),
(19, 'Píritu', 2),
(20, 'Puerto La Cruz', 2),
(21, 'Puerto Píritu', 2),
(22, 'Sabana de Uchire', 2),
(23, 'San Mateo Anzoátegui', 2),
(24, 'San Pablo Anzoátegui', 2),
(25, 'San Tomé', 2),
(26, 'Santa Ana de Anzoátegui', 2),
(27, 'Santa Fe Anzoátegui', 2),
(28, 'Santa Rosa', 2),
(29, 'Soledad', 2),
(30, 'Urica', 2),
(31, 'Valle de Guanape', 2),
(43, 'Achaguas', 3),
(44, 'Biruaca', 3),
(45, 'Bruzual', 3),
(46, 'El Amparo', 3),
(47, 'El Nula', 3),
(48, 'Elorza', 3),
(49, 'Guasdualito', 3),
(50, 'Mantecal', 3),
(51, 'Puerto Páez', 3),
(52, 'San Fernando de Apure', 3),
(53, 'San Juan de Payara', 3),
(54, 'Barbacoas', 4),
(55, 'Cagua', 4),
(56, 'Camatagua', 4),
(58, 'Choroní', 4),
(59, 'Colonia Tovar', 4),
(60, 'El Consejo', 4),
(61, 'La Victoria', 4),
(62, 'Las Tejerías', 4),
(63, 'Magdaleno', 4),
(64, 'Maracay', 4),
(65, 'Ocumare de La Costa', 4),
(66, 'Palo Negro', 4),
(67, 'San Casimiro', 4),
(68, 'San Mateo', 4),
(69, 'San Sebastián', 4),
(70, 'Santa Cruz de Aragua', 4),
(71, 'Tocorón', 4),
(72, 'Turmero', 4),
(73, 'Villa de Cura', 4),
(74, 'Zuata', 4),
(75, 'Barinas', 5),
(76, 'Barinitas', 5),
(77, 'Barrancas', 5),
(78, 'Calderas', 5),
(79, 'Capitanejo', 5),
(80, 'Ciudad Bolivia', 5),
(81, 'El Cantón', 5),
(82, 'Las Veguitas', 5),
(83, 'Libertad de Barinas', 5),
(84, 'Sabaneta', 5),
(85, 'Santa Bárbara de Barinas', 5),
(86, 'Socopó', 5),
(87, 'Caicara del Orinoco', 6),
(88, 'Canaima', 6),
(89, 'Ciudad Bolívar', 6),
(90, 'Ciudad Piar', 6),
(91, 'El Callao', 6),
(92, 'El Dorado', 6),
(93, 'El Manteco', 6),
(94, 'El Palmar', 6),
(95, 'El Pao', 6),
(96, 'Guasipati', 6),
(97, 'Guri', 6),
(98, 'La Paragua', 6),
(99, 'Matanzas', 6),
(100, 'Puerto Ordaz', 6),
(101, 'San Félix', 6),
(102, 'Santa Elena de Uairén', 6),
(103, 'Tumeremo', 6),
(104, 'Unare', 6),
(105, 'Upata', 6),
(106, 'Bejuma', 7),
(107, 'Belén', 7),
(108, 'Campo de Carabobo', 7),
(109, 'Canoabo', 7),
(110, 'Central Tacarigua', 7),
(111, 'Chirgua', 7),
(112, 'Ciudad Alianza', 7),
(113, 'El Palito', 7),
(114, 'Guacara', 7),
(115, 'Guigue', 7),
(116, 'Las Trincheras', 7),
(117, 'Los Guayos', 7),
(118, 'Mariara', 7),
(119, 'Miranda', 7),
(120, 'Montalbán', 7),
(121, 'Morón', 7),
(122, 'Naguanagua', 7),
(123, 'Puerto Cabello', 7),
(124, 'San Joaquín', 7),
(125, 'Tocuyito', 7),
(126, 'Urama', 7),
(127, 'Valencia', 7),
(128, 'Vigirimita', 7),
(129, 'Aguirre', 8),
(130, 'Apartaderos Cojedes', 8),
(131, 'Arismendi', 8),
(132, 'Camuriquito', 8),
(133, 'El Baúl', 8),
(134, 'El Limón', 8),
(135, 'El Pao Cojedes', 8),
(136, 'El Socorro', 8),
(137, 'La Aguadita', 8),
(138, 'Las Vegas', 8),
(139, 'Libertad de Cojedes', 8),
(140, 'Mapuey', 8),
(141, 'Piñedo', 8),
(142, 'Samancito', 8),
(143, 'San Carlos', 8),
(144, 'Sucre', 8),
(145, 'Tinaco', 8),
(146, 'Tinaquillo', 8),
(147, 'Vallecito', 8),
(148, 'Tucupita', 9),
(149, 'Caracas', 24),
(150, 'El Junquito', 24),
(151, 'Adícora', 10),
(152, 'Boca de Aroa', 10),
(153, 'Cabure', 10),
(154, 'Capadare', 10),
(155, 'Capatárida', 10),
(156, 'Chichiriviche', 10),
(157, 'Churuguara', 10),
(158, 'Coro', 10),
(159, 'Cumarebo', 10),
(160, 'Dabajuro', 10),
(161, 'Judibana', 10),
(162, 'La Cruz de Taratara', 10),
(163, 'La Vela de Coro', 10),
(164, 'Los Taques', 10),
(165, 'Maparari', 10),
(166, 'Mene de Mauroa', 10),
(167, 'Mirimire', 10),
(168, 'Pedregal', 10),
(169, 'Píritu Falcón', 10),
(170, 'Pueblo Nuevo Falcón', 10),
(171, 'Puerto Cumarebo', 10),
(172, 'Punta Cardón', 10),
(173, 'Punto Fijo', 10),
(174, 'San Juan de Los Cayos', 10),
(175, 'San Luis', 10),
(176, 'Santa Ana Falcón', 10),
(177, 'Santa Cruz De Bucaral', 10),
(178, 'Tocopero', 10),
(179, 'Tocuyo de La Costa', 10),
(180, 'Tucacas', 10),
(181, 'Yaracal', 10),
(182, 'Altagracia de Orituco', 11),
(183, 'Cabruta', 11),
(184, 'Calabozo', 11),
(185, 'Camaguán', 11),
(196, 'Chaguaramas Guárico', 11),
(197, 'El Socorro', 11),
(198, 'El Sombrero', 11),
(199, 'Las Mercedes de Los Llanos', 11),
(200, 'Lezama', 11),
(201, 'Onoto', 11),
(202, 'Ortíz', 11),
(203, 'San José de Guaribe', 11),
(204, 'San Juan de Los Morros', 11),
(205, 'San Rafael de Laya', 11),
(206, 'Santa María de Ipire', 11),
(207, 'Tucupido', 11),
(208, 'Valle de La Pascua', 11),
(209, 'Zaraza', 11),
(210, 'Aguada Grande', 12),
(211, 'Atarigua', 12),
(212, 'Barquisimeto', 12),
(213, 'Bobare', 12),
(214, 'Cabudare', 12),
(215, 'Carora', 12),
(216, 'Cubiro', 12),
(217, 'Cují', 12),
(218, 'Duaca', 12),
(219, 'El Manzano', 12),
(220, 'El Tocuyo', 12),
(221, 'Guaríco', 12),
(222, 'Humocaro Alto', 12),
(223, 'Humocaro Bajo', 12),
(224, 'La Miel', 12),
(225, 'Moroturo', 12),
(226, 'Quíbor', 12),
(227, 'Río Claro', 12),
(228, 'Sanare', 12),
(229, 'Santa Inés', 12),
(230, 'Sarare', 12),
(231, 'Siquisique', 12),
(232, 'Tintorero', 12),
(233, 'Apartaderos Mérida', 13),
(234, 'Arapuey', 13),
(235, 'Bailadores', 13),
(236, 'Caja Seca', 13),
(237, 'Canaguá', 13),
(238, 'Chachopo', 13),
(239, 'Chiguara', 13),
(240, 'Ejido', 13),
(241, 'El Vigía', 13),
(242, 'La Azulita', 13),
(243, 'La Playa', 13),
(244, 'Lagunillas Mérida', 13),
(245, 'Mérida', 13),
(246, 'Mesa de Bolívar', 13),
(247, 'Mucuchíes', 13),
(248, 'Mucujepe', 13),
(249, 'Mucuruba', 13),
(250, 'Nueva Bolivia', 13),
(251, 'Palmarito', 13),
(252, 'Pueblo Llano', 13),
(253, 'Santa Cruz de Mora', 13),
(254, 'Santa Elena de Arenales', 13),
(255, 'Santo Domingo', 13),
(256, 'Tabáy', 13),
(257, 'Timotes', 13),
(258, 'Torondoy', 13),
(259, 'Tovar', 13),
(260, 'Tucani', 13),
(261, 'Zea', 13),
(262, 'Araguita', 14),
(263, 'Carrizal', 14),
(264, 'Caucagua', 14),
(265, 'Chaguaramas Miranda', 14),
(266, 'Charallave', 14),
(267, 'Chirimena', 14),
(268, 'Chuspa', 14),
(269, 'Cúa', 14),
(270, 'Cupira', 14),
(271, 'Curiepe', 14),
(272, 'El Guapo', 14),
(273, 'El Jarillo', 14),
(274, 'Filas de Mariche', 14),
(275, 'Guarenas', 14),
(276, 'Guatire', 14),
(277, 'Higuerote', 14),
(278, 'Los Anaucos', 14),
(279, 'Los Teques', 14),
(280, 'Ocumare del Tuy', 14),
(281, 'Panaquire', 14),
(282, 'Paracotos', 14),
(283, 'Río Chico', 14),
(284, 'San Antonio de Los Altos', 14),
(285, 'San Diego de Los Altos', 14),
(286, 'San Fernando del Guapo', 14),
(287, 'San Francisco de Yare', 14),
(288, 'San José de Los Altos', 14),
(289, 'San José de Río Chico', 14),
(290, 'San Pedro de Los Altos', 14),
(291, 'Santa Lucía', 14),
(292, 'Santa Teresa', 14),
(293, 'Tacarigua de La Laguna', 14),
(294, 'Tacarigua de Mamporal', 14),
(295, 'Tácata', 14),
(296, 'Turumo', 14),
(297, 'Aguasay', 15),
(298, 'Aragua de Maturín', 15),
(299, 'Barrancas del Orinoco', 15),
(300, 'Caicara de Maturín', 15),
(301, 'Caripe', 15),
(302, 'Caripito', 15),
(303, 'Chaguaramal', 15),
(305, 'Chaguaramas Monagas', 15),
(307, 'El Furrial', 15),
(308, 'El Tejero', 15),
(309, 'Jusepín', 15),
(310, 'La Toscana', 15),
(311, 'Maturín', 15),
(312, 'Miraflores', 15),
(313, 'Punta de Mata', 15),
(314, 'Quiriquire', 15),
(315, 'San Antonio de Maturín', 15),
(316, 'San Vicente Monagas', 15),
(317, 'Santa Bárbara', 15),
(318, 'Temblador', 15),
(319, 'Teresen', 15),
(320, 'Uracoa', 15),
(321, 'Altagracia', 16),
(322, 'Boca de Pozo', 16),
(323, 'Boca de Río', 16),
(324, 'El Espinal', 16),
(325, 'El Valle del Espíritu Santo', 16),
(326, 'El Yaque', 16),
(327, 'Juangriego', 16),
(328, 'La Asunción', 16),
(329, 'La Guardia', 16),
(330, 'Pampatar', 16),
(331, 'Porlamar', 16),
(332, 'Puerto Fermín', 16),
(333, 'Punta de Piedras', 16),
(334, 'San Francisco de Macanao', 16),
(335, 'San Juan Bautista', 16),
(336, 'San Pedro de Coche', 16),
(337, 'Santa Ana de Nueva Esparta', 16),
(338, 'Villa Rosa', 16),
(339, 'Acarigua', 17),
(340, 'Agua Blanca', 17),
(341, 'Araure', 17),
(342, 'Biscucuy', 17),
(343, 'Boconoito', 17),
(344, 'Campo Elías', 17),
(345, 'Chabasquén', 17),
(346, 'Guanare', 17),
(347, 'Guanarito', 17),
(348, 'La Aparición', 17),
(349, 'La Misión', 17),
(350, 'Mesa de Cavacas', 17),
(351, 'Ospino', 17),
(352, 'Papelón', 17),
(353, 'Payara', 17),
(354, 'Pimpinela', 17),
(355, 'Píritu de Portuguesa', 17),
(356, 'San Rafael de Onoto', 17),
(357, 'Santa Rosalía', 17),
(358, 'Turén', 17),
(359, 'Altos de Sucre', 18),
(360, 'Araya', 18),
(361, 'Cariaco', 18),
(362, 'Carúpano', 18),
(363, 'Casanay', 18),
(364, 'Cumaná', 18),
(365, 'Cumanacoa', 18),
(366, 'El Morro Puerto Santo', 18),
(367, 'El Pilar', 18),
(368, 'El Poblado', 18),
(369, 'Guaca', 18),
(370, 'Guiria', 18),
(371, 'Irapa', 18),
(372, 'Manicuare', 18),
(373, 'Mariguitar', 18),
(374, 'Río Caribe', 18),
(375, 'San Antonio del Golfo', 18),
(376, 'San José de Aerocuar', 18),
(377, 'San Vicente de Sucre', 18),
(378, 'Santa Fe de Sucre', 18),
(379, 'Tunapuy', 18),
(380, 'Yaguaraparo', 18),
(381, 'Yoco', 18),
(382, 'Abejales', 19),
(383, 'Borota', 19),
(384, 'Bramon', 19),
(385, 'Capacho', 19),
(386, 'Colón', 19),
(387, 'Coloncito', 19),
(388, 'Cordero', 19),
(389, 'El Cobre', 19),
(390, 'El Pinal', 19),
(391, 'Independencia', 19),
(392, 'La Fría', 19),
(393, 'La Grita', 19),
(394, 'La Pedrera', 19),
(395, 'La Tendida', 19),
(396, 'Las Delicias', 19),
(397, 'Las Hernández', 19),
(398, 'Lobatera', 19),
(399, 'Michelena', 19),
(400, 'Palmira', 19),
(401, 'Pregonero', 19),
(402, 'Queniquea', 19),
(403, 'Rubio', 19),
(404, 'San Antonio del Tachira', 19),
(405, 'San Cristobal', 19),
(406, 'San José de Bolívar', 19),
(407, 'San Josecito', 19),
(408, 'San Pedro del Río', 19),
(409, 'Santa Ana Táchira', 19),
(410, 'Seboruco', 19),
(411, 'Táriba', 19),
(412, 'Umuquena', 19),
(413, 'Ureña', 19),
(414, 'Batatal', 20),
(415, 'Betijoque', 20),
(416, 'Boconó', 20),
(417, 'Carache', 20),
(418, 'Chejende', 20),
(419, 'Cuicas', 20),
(420, 'El Dividive', 20),
(421, 'El Jaguito', 20),
(422, 'Escuque', 20),
(423, 'Isnotú', 20),
(424, 'Jajó', 20),
(425, 'La Ceiba', 20),
(426, 'La Concepción de Trujllo', 20),
(427, 'La Mesa de Esnujaque', 20),
(428, 'La Puerta', 20),
(429, 'La Quebrada', 20),
(430, 'Mendoza Fría', 20),
(431, 'Meseta de Chimpire', 20),
(432, 'Monay', 20),
(433, 'Motatán', 20),
(434, 'Pampán', 20),
(435, 'Pampanito', 20),
(436, 'Sabana de Mendoza', 20),
(437, 'San Lázaro', 20),
(438, 'Santa Ana de Trujillo', 20),
(439, 'Tostós', 20),
(440, 'Trujillo', 20),
(441, 'Valera', 20),
(442, 'Carayaca', 21),
(443, 'Litoral', 21),
(444, 'Archipiélago Los Roques', 25),
(445, 'Aroa', 22),
(446, 'Boraure', 22),
(447, 'Campo Elías de Yaracuy', 22),
(448, 'Chivacoa', 22),
(449, 'Cocorote', 22),
(450, 'Farriar', 22),
(451, 'Guama', 22),
(452, 'Marín', 22),
(453, 'Nirgua', 22),
(454, 'Sabana de Parra', 22),
(455, 'Salom', 22),
(456, 'San Felipe', 22),
(457, 'San Pablo de Yaracuy', 22),
(458, 'Urachiche', 22),
(459, 'Yaritagua', 22),
(460, 'Yumare', 22),
(461, 'Bachaquero', 23),
(462, 'Bobures', 23),
(463, 'Cabimas', 23),
(464, 'Campo Concepción', 23),
(465, 'Campo Mara', 23),
(466, 'Campo Rojo', 23),
(467, 'Carrasquero', 23),
(468, 'Casigua', 23),
(469, 'Chiquinquirá', 23),
(470, 'Ciudad Ojeda', 23),
(471, 'El Batey', 23),
(472, 'El Carmelo', 23),
(473, 'El Chivo', 23),
(474, 'El Guayabo', 23),
(475, 'El Mene', 23),
(476, 'El Venado', 23),
(477, 'Encontrados', 23),
(478, 'Gibraltar', 23),
(479, 'Isla de Toas', 23),
(480, 'La Concepción del Zulia', 23),
(481, 'La Paz', 23),
(482, 'La Sierrita', 23),
(483, 'Lagunillas del Zulia', 23),
(484, 'Las Piedras de Perijá', 23),
(485, 'Los Cortijos', 23),
(486, 'Machiques', 23),
(487, 'Maracaibo', 23),
(488, 'Mene Grande', 23),
(489, 'Palmarejo', 23),
(490, 'Paraguaipoa', 23),
(491, 'Potrerito', 23),
(492, 'Pueblo Nuevo del Zulia', 23),
(493, 'Puertos de Altagracia', 23),
(494, 'Punta Gorda', 23),
(495, 'Sabaneta de Palma', 23),
(496, 'San Francisco', 23),
(497, 'San José de Perijá', 23),
(498, 'San Rafael del Moján', 23),
(499, 'San Timoteo', 23),
(500, 'Santa Bárbara Del Zulia', 23),
(501, 'Santa Cruz de Mara', 23),
(502, 'Santa Cruz del Zulia', 23),
(503, 'Santa Rita', 23),
(504, 'Sinamaica', 23),
(505, 'Tamare', 23),
(506, 'Tía Juana', 23),
(507, 'Villa del Rosario', 23),
(508, 'La Guaira', 21),
(509, 'Catia La Mar', 21),
(510, 'Macuto', 21),
(511, 'Naiguatá', 21),
(512, 'Archipiélago Los Monjes', 25),
(513, 'Isla La Tortuga y Cayos adyace', 25),
(514, 'Isla La Sola', 25),
(515, 'Islas Los Testigos', 25),
(516, 'Islas Los Frailes', 25),
(517, 'Isla La Orchila', 25),
(518, 'Archipiélago Las Aves', 25),
(519, 'Isla de Aves', 25),
(520, 'Isla La Blanquilla', 25),
(521, 'Isla de Patos', 25),
(522, 'Islas Los Hermanos', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `n_consulta` varchar(11) NOT NULL,
  `motivo` varchar(30) NOT NULL,
  `explicacion` varchar(250) DEFAULT NULL,
  `intensidad` varchar(10) NOT NULL,
  `escala` int(2) NOT NULL,
  `id_acompanante` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_terapeuta` int(11) NOT NULL,
  `cierre` enum('0','1') NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `n_consulta`, `motivo`, `explicacion`, `intensidad`, `escala`, `id_acompanante`, `id_paciente`, `id_terapeuta`, `cierre`, `fecha_hora`) VALUES
(1, 'F000001', 'Dolor de cabeza', 'Dolor excesivo en la cabeza con unas ganas de vomitar horrible', 'Leve', 3, 3, 1, 1, '1', '2020-01-16 22:11:20'),
(2, 'F000002', 'Dolor de barriga', 'Diarrea 5 veces por hora ', 'Leve', 8, 6, 1, 1, '1', '2020-01-17 16:32:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diccionario_bioemocional`
--

CREATE TABLE `diccionario_bioemocional` (
  `id_dicc` int(11) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `definicion` varchar(300) NOT NULL,
  `tecnico` varchar(400) NOT NULL,
  `sentidoBio` varchar(300) NOT NULL,
  `conflicto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `diccionario_bioemocional`
--

INSERT INTO `diccionario_bioemocional` (`id_dicc`, `nombre`, `definicion`, `tecnico`, `sentidoBio`, `conflicto`) VALUES
(1, 'cancer', 'cancer', 'cancer', 'cancer', 'cancer'),
(2, 'pááááncreas', 'pancreas', 'pancreas', 'pancreas', 'pancreas'),
(3, 'M', 'Locura Cronica', 'Cronica', 'Locura excesiva :V', 'locura'),
(5, 'Gastristis', 'Dolor excesivo en el estomago', 'Gastristis', 'Nose', 'Dolor de panza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

CREATE TABLE `enfermedad` (
  `id_enfermedad` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `enfermedad`
--

INSERT INTO `enfermedad` (`id_enfermedad`, `nombre`) VALUES
(1, 'Díabetes'),
(2, 'Cancer'),
(3, 'Hepatitis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `nombre` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `nombre`) VALUES
(1, 'Psicologo'),
(2, 'Terapeuta de apicultura'),
(3, 'Psicoanalisis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre`) VALUES
(1, 'Amazonas'),
(2, 'Anzoátegui'),
(3, 'Apure'),
(4, 'Aragua'),
(5, 'Barinas'),
(6, 'Bolívar'),
(7, 'Carabobo'),
(8, 'Cojedes'),
(9, 'Delta Amacuro'),
(10, 'Falcón'),
(11, 'Guárico'),
(12, 'Lara'),
(13, 'Mérida'),
(14, 'Miranda'),
(15, 'Monagas'),
(16, 'Nueva Esparta'),
(17, 'Portuguesa'),
(18, 'Sucre'),
(19, 'Táchira'),
(20, 'Trujillo'),
(21, 'Vargas'),
(22, 'Yaracuy'),
(23, 'Zulia'),
(24, 'Distrito Capital'),
(25, 'Dependencias Federales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `futura_visita`
--

CREATE TABLE `futura_visita` (
  `dia` date NOT NULL,
  `hora` int(2) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_terapeuta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `futura_visita`
--

INSERT INTO `futura_visita` (`dia`, `hora`, `id_paciente`, `id_terapeuta`) VALUES
('2020-01-24', 17, 1, 1),
('2020-02-24', 19, 1, 1),
('2000-01-01', 12, 1, 1),
('2000-01-01', 8, 1, 1),
('2020-01-17', 15, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `tratamientoMed` varchar(200) NOT NULL,
  `observacion` varchar(200) NOT NULL,
  `año` int(4) NOT NULL,
  `mes` varchar(50) NOT NULL,
  `n_consulta` varchar(11) NOT NULL,
  `id_enfermedad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `tratamientoMed`, `observacion`, `año`, `mes`, `n_consulta`, `id_enfermedad`) VALUES
(1, 'parcetamlo', 'Pongame cuidao', 2012, '5', '0', 3),
(2, 'asdjkhdkasjhk', 'lkasjdhka', 2014, '3', 'F000002', 2),
(3, 'asd', 'asd', 2014, '1', 'F000002', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficio`
--

CREATE TABLE `oficio` (
  `id_oficio` int(11) NOT NULL,
  `nombre` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `oficio`
--

INSERT INTO `oficio` (`id_oficio`, `nombre`) VALUES
(1, 'Ama de casa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organo`
--

CREATE TABLE `organo` (
  `id_organo` int(11) NOT NULL,
  `id_dicc` int(11) NOT NULL,
  `id_enfermedad` int(11) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `laminaDes` varchar(45) DEFAULT NULL,
  `laminaFoco` varchar(45) DEFAULT NULL,
  `laminaColor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `organo`
--

INSERT INTO `organo` (`id_organo`, `id_dicc`, `id_enfermedad`, `nombre`, `laminaDes`, `laminaFoco`, `laminaColor`) VALUES
(1, 1, 2, 'Higado', '1357880799.png', '1357880799.png', '1357880799.png'),
(2, 2, 1, 'Cancer de higado', '1176989067.png', '1176989067.png', '1176989067.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nacionalidad` varchar(4) NOT NULL,
  `cedula_paciente` int(11) NOT NULL,
  `nombre_paciente` varchar(20) NOT NULL,
  `apellido_paciente` varchar(20) NOT NULL,
  `direccion_paciente` varchar(100) NOT NULL,
  `codigo_cell` varchar(4) NOT NULL,
  `telefono_paciente` varchar(12) NOT NULL,
  `sexo_paciente` varchar(10) NOT NULL,
  `fecha_nac` date NOT NULL,
  `lugar_nac` varchar(30) NOT NULL,
  `con_quien_vive` varchar(100) NOT NULL,
  `lateralidad_biologica` varchar(20) NOT NULL,
  `hobbie` varchar(80) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `id_religion` int(11) NOT NULL,
  `id_oficio` int(11) NOT NULL,
  `id_trabajo` int(11) NOT NULL,
  `fecha_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nacionalidad`, `cedula_paciente`, `nombre_paciente`, `apellido_paciente`, `direccion_paciente`, `codigo_cell`, `telefono_paciente`, `sexo_paciente`, `fecha_nac`, `lugar_nac`, `con_quien_vive`, `lateralidad_biologica`, `hobbie`, `id_ciudad`, `id_religion`, `id_oficio`, `id_trabajo`, `fecha_reg`) VALUES
(1, 'V', 27024967, 'Jolber Ramon', 'Chirinos Colina', 'Barrio la paz calle 5 entre 1 y 2', '0424', '5277552', 'Masculino', '1999-01-18', 'Venezuela', 'Con mi madre', 'Derecho', 'Jugar LOL y Programar', 1, 1, 1, 1, '2020-01-10 01:55:28'),
(2, 'V', 12345678, 'Júan', 'Duarte', 'asdasdas', '0414', '254877811', 'Masculino', '2000-01-01', 'Venezuela', 'asdasdas', 'Derecho', 'Jugar futbol', 1, 3, 1, 1, '2020-01-20 14:04:00'),
(3, 'V', 951753, 'klajsdlk', 'daslkdjaskl', 'dasdasdóá', '0424', '23123123', 'Femenino', '2000-01-01', 'Venezuela', 'solo', 'Derecho', 'Jugar lol', 5, 1, 1, 1, '2020-01-20 14:24:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentesco`
--

CREATE TABLE `parentesco` (
  `id_parentesco` int(11) NOT NULL,
  `parentesco` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentesco_antecedentes_f`
--

CREATE TABLE `parentesco_antecedentes_f` (
  `id_antecedentes_fa` int(11) NOT NULL,
  `id_parentesco` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `religion`
--

CREATE TABLE `religion` (
  `id_religion` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `religion`
--

INSERT INTO `religion` (`id_religion`, `nombre`) VALUES
(1, 'Cristiano'),
(2, 'Catolico'),
(3, 'Budista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema_relacionado`
--

CREATE TABLE `tema_relacionado` (
  `id_relacionado` int(11) NOT NULL,
  `id_dicc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terapeuta`
--

CREATE TABLE `terapeuta` (
  `id_terapeuta` int(11) NOT NULL,
  `cedula_terapeuta` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `direccion` varchar(90) NOT NULL,
  `codigo_cell` varchar(4) NOT NULL,
  `telefono` varchar(8) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `imagen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `terapeuta`
--

INSERT INTO `terapeuta` (`id_terapeuta`, `cedula_terapeuta`, `nombre`, `apellido`, `direccion`, `codigo_cell`, `telefono`, `correo`, `descripcion`, `id_especialidad`, `imagen`) VALUES
(1, 5585844, 'Carmen ', 'Colina', 'Venezuela - Edo. Lara', '0424', '5277552', 'CarmenE&E@mail.com', 'Doctora en psicoanalisis y parte del cuerpo directivo de ens & end', 1, '1679475207.jpg\r\n'),
(2, 27024967, 'Jolber ', 'Chirinos', 'Venecuela - Estado Lara', '0414', '5277552', 'jolber_Ens&End@mail.com', 'Soy médico egresado de la UCLA por el area de Psicologia con postgrado en la universidad de Harvard y especialista en el area psiconeuronal', 3, '1594634192.jpg'),
(3, 12345678, 'Juan', 'Duarte', 'Colombia - Bogota', '0424', '2458796', 'Juan@mail.com', 'Un pro en programacion un ñerito', 2, '1136494849.jpg'),
(4, 753159, 'Henry', 'Sanchez', 'Venezuela - Estado Zulia', '0414', '9512365', 'Henry@ensend.com', 'El que realiza los exámenes de próstata', 1, '1444828993.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terapia`
--

CREATE TABLE `terapia` (
  `id_terapia` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `costo_refe` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `terapia`
--

INSERT INTO `terapia` (`id_terapia`, `nombre`, `descripcion`, `costo_refe`) VALUES
(1, 'Apicultura', 'Te puyán todo', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `id_trabajo` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `cargo` varchar(90) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajo`
--

INSERT INTO `trabajo` (`id_trabajo`, `nombre`, `cargo`, `direccion`, `telefono`) VALUES
(1, 'Educador', 'Coordinador', 'El ujano', '2514417788');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `cedula` varchar(8) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `cargo` varchar(15) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password2` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `apellidos`, `cedula`, `telefono`, `correo`, `direccion`, `cargo`, `usuario`, `password`, `password2`, `imagen`, `fecha_ingreso`, `estado`) VALUES
(7, 'Jolber Ramon', 'Chirinos Colina', '27024967', '5277552', 'jolber@mail.com', 'Barrio la paz', 'Administrador', 'JC', '123456', '123456', '41504277.jpg', '2020-01-09 03:58:10', '1'),
(8, 'Krosswel', 'Cauro', '123456', '9546789', 'kross@mail.com', 'La 60 av fuerzas armadas', 'Terapeuta', 'Krosswel', '1234', '1234', '466052013.jpg', '2020-01-17 14:54:04', '1'),
(14, 'Admin', 'Admin', '159357', '1234', 'man@mail.com', 'asdasd', 'Asistente', 'admin', '1234', '1234', '392886065.jpg', '2020-01-20 15:53:05', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `id_usuario_permiso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acompanante`
--
ALTER TABLE `acompanante`
  ADD PRIMARY KEY (`id_acompanante`);

--
-- Indices de la tabla `antecedentes_f`
--
ALTER TABLE `antecedentes_f`
  ADD PRIMARY KEY (`id_antecedentes_fa`);

--
-- Indices de la tabla `aspectos_evaluar`
--
ALTER TABLE `aspectos_evaluar`
  ADD PRIMARY KEY (`id_aspectos_evaluar`);

--
-- Indices de la tabla `aspecto_consulta`
--
ALTER TABLE `aspecto_consulta`
  ADD PRIMARY KEY (`n_consulta`),
  ADD KEY `fk_aspecto_consulta_aspectos_evaluar1_idx` (`id_aspectos_evaluar`);

--
-- Indices de la tabla `capa`
--
ALTER TABLE `capa`
  ADD PRIMARY KEY (`id_capa`);

--
-- Indices de la tabla `capa_item`
--
ALTER TABLE `capa_item`
  ADD KEY `fk_capaItem_capa1_idx` (`id_capa`),
  ADD KEY `fk_capaItem_DiccionarioBioemocional1_idx` (`id_dicc`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `fk_ciudad_estado1_idx` (`id_estado`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`n_consulta`),
  ADD UNIQUE KEY `id_consulta` (`id_consulta`),
  ADD KEY `fk_consulta_paciente1_idx` (`id_paciente`),
  ADD KEY `fk_consulta_terapeuta1_idx` (`id_terapeuta`),
  ADD KEY `fk_consulta_acompanante1_idx` (`id_acompanante`);

--
-- Indices de la tabla `diccionario_bioemocional`
--
ALTER TABLE `diccionario_bioemocional`
  ADD PRIMARY KEY (`id_dicc`);

--
-- Indices de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  ADD PRIMARY KEY (`id_enfermedad`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `futura_visita`
--
ALTER TABLE `futura_visita`
  ADD KEY `fk_futuraVisita_paciente1_idx` (`id_paciente`),
  ADD KEY `fk_futuraVisita_terapeuta1_idx` (`id_terapeuta`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `fk_historial_enfermedad1_idx` (`id_enfermedad`),
  ADD KEY `fk_historial_consulta1_idx` (`n_consulta`);

--
-- Indices de la tabla `oficio`
--
ALTER TABLE `oficio`
  ADD PRIMARY KEY (`id_oficio`);

--
-- Indices de la tabla `organo`
--
ALTER TABLE `organo`
  ADD PRIMARY KEY (`id_organo`),
  ADD KEY `fk_organo_DiccionarioBioemocional1_idx` (`id_dicc`),
  ADD KEY `fk_organo_enfermedad1_idx` (`id_enfermedad`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `fk_paciente_religion1_idx` (`id_religion`),
  ADD KEY `fk_paciente_oficio1_idx` (`id_oficio`),
  ADD KEY `fk_paciente_trabajo1_idx` (`id_trabajo`),
  ADD KEY `fk_paciente_ciudad1_idx` (`id_ciudad`);

--
-- Indices de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  ADD PRIMARY KEY (`id_parentesco`);

--
-- Indices de la tabla `parentesco_antecedentes_f`
--
ALTER TABLE `parentesco_antecedentes_f`
  ADD PRIMARY KEY (`id_antecedentes_fa`,`id_parentesco`,`id_paciente`),
  ADD KEY `fk_antecedentesF_has_parentesco_parentesco1_idx` (`id_parentesco`),
  ADD KEY `fk_antecedentesF_has_parentesco_antecedentesF_idx` (`id_antecedentes_fa`),
  ADD KEY `fk_parentesco_antecedentes_fa_paciente1_idx` (`id_paciente`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`id_religion`);

--
-- Indices de la tabla `tema_relacionado`
--
ALTER TABLE `tema_relacionado`
  ADD PRIMARY KEY (`id_dicc`,`id_relacionado`),
  ADD KEY `fk_temaRelacionado_DiccionarioBioemocional1_idx` (`id_relacionado`),
  ADD KEY `fk_temaRelacionado_DiccionarioBioemocional2_idx` (`id_dicc`);

--
-- Indices de la tabla `terapeuta`
--
ALTER TABLE `terapeuta`
  ADD PRIMARY KEY (`id_terapeuta`),
  ADD KEY `fk_terapeuta_especialidad1_idx` (`id_especialidad`);

--
-- Indices de la tabla `terapia`
--
ALTER TABLE `terapia`
  ADD PRIMARY KEY (`id_terapia`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`id_trabajo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`id_usuario_permiso`),
  ADD KEY `fk_usuario_permiso_usuarios1_idx` (`id_usuario`),
  ADD KEY `fk_usuario_permiso_permisos1_idx` (`id_permiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acompanante`
--
ALTER TABLE `acompanante`
  MODIFY `id_acompanante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `antecedentes_f`
--
ALTER TABLE `antecedentes_f`
  MODIFY `id_antecedentes_fa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aspectos_evaluar`
--
ALTER TABLE `aspectos_evaluar`
  MODIFY `id_aspectos_evaluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `capa`
--
ALTER TABLE `capa`
  MODIFY `id_capa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=523;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `diccionario_bioemocional`
--
ALTER TABLE `diccionario_bioemocional`
  MODIFY `id_dicc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  MODIFY `id_enfermedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `oficio`
--
ALTER TABLE `oficio`
  MODIFY `id_oficio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `organo`
--
ALTER TABLE `organo`
  MODIFY `id_organo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  MODIFY `id_parentesco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `religion`
--
ALTER TABLE `religion`
  MODIFY `id_religion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `terapeuta`
--
ALTER TABLE `terapeuta`
  MODIFY `id_terapeuta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `terapia`
--
ALTER TABLE `terapia`
  MODIFY `id_terapia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  MODIFY `id_trabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `id_usuario_permiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aspecto_consulta`
--
ALTER TABLE `aspecto_consulta`
  ADD CONSTRAINT `fk_aspecto_consulta_aspectos_evaluar1` FOREIGN KEY (`id_aspectos_evaluar`) REFERENCES `aspectos_evaluar` (`id_aspectos_evaluar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `capa_item`
--
ALTER TABLE `capa_item`
  ADD CONSTRAINT `fk_capaItem_DiccionarioBioemocional1` FOREIGN KEY (`id_dicc`) REFERENCES `diccionario_bioemocional` (`id_dicc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_capaItem_capa1` FOREIGN KEY (`id_capa`) REFERENCES `capa` (`id_capa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_ciudad_estado1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_consulta_acompanante1` FOREIGN KEY (`id_acompanante`) REFERENCES `acompanante` (`id_acompanante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consulta_paciente1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consulta_terapeuta1` FOREIGN KEY (`id_terapeuta`) REFERENCES `terapeuta` (`id_terapeuta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `futura_visita`
--
ALTER TABLE `futura_visita`
  ADD CONSTRAINT `fk_futuraVisita_paciente1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_futuraVisita_terapeuta1` FOREIGN KEY (`id_terapeuta`) REFERENCES `terapeuta` (`id_terapeuta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_historial_enfermedad1` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedad` (`id_enfermedad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `organo`
--
ALTER TABLE `organo`
  ADD CONSTRAINT `fk_organo_DiccionarioBioemocional1` FOREIGN KEY (`id_dicc`) REFERENCES `diccionario_bioemocional` (`id_dicc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_organo_enfermedad1` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedad` (`id_enfermedad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk_paciente_ciudad1` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paciente_oficio1` FOREIGN KEY (`id_oficio`) REFERENCES `oficio` (`id_oficio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paciente_religion1` FOREIGN KEY (`id_religion`) REFERENCES `religion` (`id_religion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paciente_trabajo1` FOREIGN KEY (`id_trabajo`) REFERENCES `trabajo` (`id_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `parentesco_antecedentes_f`
--
ALTER TABLE `parentesco_antecedentes_f`
  ADD CONSTRAINT `fk_antecedentesF_has_parentesco_antecedentesF` FOREIGN KEY (`id_antecedentes_fa`) REFERENCES `antecedentes_f` (`id_antecedentes_fa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_antecedentesF_has_parentesco_parentesco1` FOREIGN KEY (`id_parentesco`) REFERENCES `parentesco` (`id_parentesco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_parentesco_antecedentes_fa_paciente1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tema_relacionado`
--
ALTER TABLE `tema_relacionado`
  ADD CONSTRAINT `fk_temaRelacionado_DiccionarioBioemocional1` FOREIGN KEY (`id_relacionado`) REFERENCES `diccionario_bioemocional` (`id_dicc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_temaRelacionado_DiccionarioBioemocional2` FOREIGN KEY (`id_dicc`) REFERENCES `diccionario_bioemocional` (`id_dicc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `terapeuta`
--
ALTER TABLE `terapeuta`
  ADD CONSTRAINT `fk_terapeuta_especialidad1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD CONSTRAINT `fk_usuario_permiso_permisos1` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id_permiso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permiso_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
