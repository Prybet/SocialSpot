-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 09:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialspotdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Desc` varchar(300) NOT NULL,
  `ImageURL` varchar(300) NOT NULL,
  `BannerURL` varchar(300) NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `Name`, `Desc`, `ImageURL`, `BannerURL`, `Status_ID`) VALUES
(1, 'Skateboarding', 'El skateboarding es un deporte que se basa en la propulsión con un skate –elemento compuesto por una tabla de madera, ejes, rodamientos y ruedas- a la vez que se realizan distintos trucos o maniobras', 'Skate-ProfilePic.jpg', 'Skate-BannerPic.jpg', 1),
(2, 'Ciclismo', 'El ciclismo es un deporte en el que se utiliza una bicicleta​ para recorrer circuitos al aire libre o en pista cubierta y que engloba diferentes especialidades.', 'Ciclism-ProfilePic.jpg', 'Ciclism-BannerPic.jpg', 1),
(3, 'Mountain Bike', 'La bicicleta de montaña es un tipo de bicicleta diseñada para viajes por la montaña o el campo. Se caracteriza por componentes más resistentes a los impactos del terreno ', 'Mountainbike-ProfilePic.jpg', 'Mountainbike-BannerPic.jpg', 1),
(4, 'Downhill Longboard', 'El downhill es la modalidad más peligrosa de longboard. Consiste en bajar una cuesta, normalmente una carretera de curvas, a toda velocidad con tu tabla de longboard', 'Downhill-ProfilePic.jpg', 'Downhill-BannerPic.jpg', 1),
(5, 'Inline Downhill', 'Esta categoría es una  prueba de patinaje en descenso, se caracteriza por patines de velocidad, bajando en línea recta a toda velocidad', 'Inlinedownhill-ProfilePic.jpg', 'Inlinedownhill-BannerPic.jpg', 1),
(6, 'Bmx', 'La categoría se hace a travez de una bicicleta ligera, que permite sostenerlas en el aire, haciendo diferentes trucos o freestyle', 'BMX-ProfilePic.jpg', 'BMX-BannerPic.jpg', 1),
(7, 'Scooter', 'Scooter tambien llamado monopatín, consiste en una plataforma alargada sobre dos ruedas en línea y una barra de dirección, con la que se deslizan los patinadores tras impulsarse con un pie contra el suelo', 'Scooter-ProfilePic.jpg', 'Scooter-BannerPic.jpg', 1),
(8, 'Cruiser', 'Estás suelen ser de ruedas anchas y más suaves, permitiendo ser más practica, ágiles, rápidas y de gran agarre', 'Cruise-ProfilePic.jpg', 'Cruise-BannerPic.jpg', 1),
(9, 'Longboard', ' Se utilizan comúnmente para bajar cuestas, en carreras que se llevan a cabo en todo el mundo. La forma de la tabla es larga, tiene ruedas anchas y largas', 'Longboard-ProfilePic.jpg', 'Longboard-BannerPic.jpg', 1),
(10, 'Patines', 'Son unos paratos deportivos o de entretenimiento que  consiste en una plataforma ajustable a la suela del calzado o una bota con esta plataforma adherida, permitiendo hacer trucos en el aire', 'Patines-ProfilePic.png', 'Patines-BannerPic.jpg', 1),
(11, 'Bike Thriathlon', 'Estas son similares a una bicicleta de carretera, pero en ella se busca una posición muy aerodinámica, la cual gana potencia o velocidad, reduciendo el esfuerzo.', 'Thriathlon-ProfilePic.jpg', 'Thriathlon-BannerPic.jpg', 1),
(12, 'Cross Country', 'Esta categoría son especialidad más común del ciclismo de montaña, aunque menos difundido que el descenso de montaña ya que es más difícil de televisar. Es la modalidad más extendida y popular.', 'Crosscountry-ProfilePic.jpg', 'Crosscountry-BannerPic.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Desc` varchar(400) NOT NULL,
  `ImageURL` varchar(300) DEFAULT NULL,
  `BannerURL` varchar(300) DEFAULT NULL,
  `Province_ID` int(11) NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ID`, `Name`, `Desc`, `ImageURL`, `BannerURL`, `Province_ID`, `Status_ID`) VALUES
(1, 'Iquique', 'es una ciudad-puerto y comuna ubicada en el norte grande de Chile, capital de la provincia homónima y de la Región de Tarapacá.', '', '', 1, 1),
(2, 'Alto Hospicio', 'Es una comuna chilena situada en la Provincia de Iquique, en la Región de Tarapacá, en el Norte Grande de Chile.', '', '', 1, 1),
(3, 'Pozo Almonte', 'Se dice que el origen del topónimo Pozo Almonte es colonial, aunque también existen ciertos mitos. Era un pueblo de parada por ciertas razones ya que junto a él se encontraban pueblos mineros aledaños.', '', '', 2, 1),
(4, 'Camiña', 'La comuna de Camiña se encuentra ubicada en la región de Tarapacá, en la precordillera también llamada «la sierra», a lo largo de la quebrada de Tana en la provincia del Tamarugal.', '', '', 2, 1),
(5, 'Antofagasta', 'Antofagasta, también conocida como La Perla del norte, es una ciudad, puerto y comuna del Norte Grande de Chile y es la capital de la provincia y de la región homónima.', '', '', 3, 1),
(6, 'Mejillones', 'Mejillones es una comuna y ciudad del Norte Grande de Chile, situada a 65 kilómetros al norte de la ciudad de Antofagasta, en la provincia y región del mismo nombre.', '', '', 3, 1),
(7, 'Calama', 'Se ubica en un área minera y es conocida como una vía de acceso al desierto de Atacama. Justo al norte, está la extensa mina de cobre a tajo abierto de Chuquicamata.', '', '', 4, 1),
(8, 'Tocopilla', 'Tocopilla se encuentra a 180 km al norte de la ciudad de  Antofagasta, situado en la Región de antofagasta y tiene 24.574 habitantes. se ubica en una estrecha plataforma rodeada por la cordillera de la Costa.', '', '', 5, 1),
(9, 'Chañaral', 'La comuna fue fundada el 26 de octubre de 1833 como Chañaral de las Animas. Está ubicada a 167 Km. de Copiapó en la, Provincia de Chañaral, Región de Atacama.', '', '', 6, 1),
(10, 'Copiapó', 'Es conocida por ser un oasis donde florece el desierto y además, por poseer en su valle la primera exportación de uvas del país, lo que aporta grandes beneficios a este.', '', '', 7, 1),
(11, 'Caldera', 'Es puerto minero, pesquero y agrícola, ubicado a 75 kilómetros de la ciudad de Copiapó (capital regional). Además Caldera está situada en una zona de interés turístico.', '', '', 7, 1),
(12, 'Vallenar', 'Es una ciudad y comuna del Norte Chico de Chile, capital de la Provincia de Huasco en la Región de Atacama, ubicada a 147 kilómetros (91 mi) de Copiapó, la capital regional. Se encuentra en el fondo del cajón del Río Huasco y tiene una población aproximada de 51 917 habitantes.', '', '', 8, 1),
(13, 'Illapel', 'Illapel es una comuna de la Provincia de Choapa y se emplaza en la ribera norte y valle del río Illapel, el principal tributario del río Choapa.', '', '', 9, 1),
(14, 'Coquimbo', 'Limita al oeste con el océano Pacífico, al norte con la comuna de La Serena, al este con la comuna de Andacollo, y al sur con la comuna de Ovalle. Forma parte de una conurbación con la vecina ciudad de La Serena.', '', '', 10, 1),
(15, 'Andacollo', 'Andacollo es una ciudad y comuna del Norte Chico de Chile ubicada en la provincia de Elqui, en la región de Coquimbo.', '', '', 10, 1),
(16, 'Ovalle', 'Se encuentra a 412 kilómetros al norte de Santiago y a 86 kilómetros de La Serena, la capital regional.', '', '', 11, 1),
(17, 'Isla de Pascua', 'Es la única comuna que pertenece a la provincia de Isla de Pascua y agrupa a Isla de Pascua y la Isla Salas y Gómez.', '', '', 12, 1),
(18, 'Los Andes', 'La comuna es capital de la provincia homónima y fue fundada como Santa Rosa de Los Andes el 31 de julio de 1791. Tiene una superficie de 1248,3 km² y una población de 66.708 habitantes', '', '', 13, 1),
(19, 'Quilpué', 'La Comuna de Quilpué tiene una poblacion aproximada de 150 mil habitantes, y es capital de la provincia de Marga-Marga. Con 536,90 km², la comuna de Quilpué es la suma de las unidades territoriales de Quilpué y El Belloto.', '', '', 14, 1),
(20, 'La Ligua', 'La Ligua es una comuna y ciudad ubicada en la Región de Valparaíso, en la zona central de Chile, capital de la provincia de Petorca. Se ubica 154 km al norte de Santiago, capital del país, y 110 km al norte de Valparaíso, capital regional.', '', '', 15, 1),
(21, 'Rancagua', 'Debido a la gran expansión de la ciudad durante los últimos años, ha llegado a formar junto a Machalí y Gultro la llamada Conurbación Rancagua, que es la octava aglomeración urbana más poblada del país.', '', '', 16, 1),
(22, 'La Estrella', 'La comuna de La Estrella abarca una superficie de 435 km² y una población de 3.041 habitantes (Censo INE Año 2017), correspondientes a un 0,54 % de la población total de la región y una densidad de 9,70 hab/km². Del total de la población, 1.537 son mujeres y 3.007 son hombres. Un 51,09 % corresponde a población rural y un 48,91 % a población urbana.', '', '', 17, 1),
(23, 'Pichilemu', 'La playa de Pichilemu es una zona de práctica de surf, específicamente el sector de Punta de Lobos, donde por sus break points se han desarrollado campeonatos con participación y relevancia internacional que han provocado que Pichilemu sea conocida como la capital chilena del surf.', '', '', 17, 1),
(24, 'San Fernando', 'Es capital de la actual provincia de Colchagua. Entre 1826 y 1976 fue capital de la Provincia de Colchagua y del departamento de San Fernando.', '', '', 18, 1),
(25, 'Cauquenes', 'Se ubica a 355 kilómetros (221 mi) de Santiago y limita al norte con las comunas de Empedrado y San Javier al sur con Cobquecura, Quirihue, Ninhue y San Carlos, al oeste con Chanco y Pelluhue, y al este con Parral y Retiro.', '', '', 18, 1),
(26, 'Curicó', 'El área de la ciudad de Curicó alcanza a 1.000 km². Son productos característicos de la ciudad las tortas, frutas, cemento, azúcar, salsa de tomates y vinos de exportación de calidad internacional. Es uno de los centros de servicios más importantes de la zona central y está considerada como la capital agroindustrial de Chile debido a su constante crecimiento económico.', '', '', 19, 1),
(27, 'Linares', 'La ciudad de Linares recibe su nombre de don Francisco Espinoza Muñoz de la Mata Linares, quien se desempeñaba como Intendente de Concepción al momento de fundarse la villa.', '', '', 20, 1),
(28, 'Talca', 'Se encuentra 255 kilómetros al sur de la capital Santiago. La ciudad es el corazón de la zona agrícola chilena por excelencia.', '', '', 21, 1),
(29, 'Arauco', 'Es una ciudad y comuna de la zona sur de Chile, ubicada en la provincia homónima en la región del Biobío, a 70 km al sur de Concepción. Su geografía se caracteriza por emplazarse sobre la cuenca del río Carampangue hasta su desembocadura con el océano Pacífico, al costado norponiente de la cordillera de Nahuelbuta.', '', '', 22, 1),
(30, 'Los Ángeles', 'Los Ángeles es una comuna y ciudad de la zona central de Chile, capital de la provincia de Biobío, en la región homónima. Se encuentra ubicada a 510 kilómetros de Santiago, la capital del país, y a 127 kilómetros de Concepción, la capital regional.', '', '', 23, 1),
(31, 'Concepción', 'El núcleo urbano de Concepción ejerce un significativo impacto en el comercio nacional al ser parte de la región con más industrialización del país.', '', '', 24, 1),
(32, 'Chiguayante', 'Su nombre proviene de la toponimia del lugar, conocida por los mapuches como Chiwayantü, palabra en lengua mapuche o mapudungun compuesta de las palabras chiway y antü, cuyo significado es sol entre neblina.', '', '', 24, 1),
(33, 'Temuco', 'La comuna de Temuco cuenta, según el censo de 2017, con una población de 282 415 habitantes, la cual forma junto a Padre Las Casas la conurbación llamada Gran Temuco, conformada en total por 358 541 habitantes, siendo el área metropolitana más poblada del sur del país.', '', '', 25, 1),
(34, 'Villarrica', 'Fundada en el año 1552, por el Adelantado Gerónimo de Alderete, esta localidad no ha mantenido una continuidad histórica, debido a que ha sido destruida en varias oportunidades por los conflictos territoriales entre el Estado y el Pueblo Mapuche , fue refundada en dos ocasiones , siendo la última el año 1883 y la definitiva.', '', '', 25, 1),
(35, 'Angol', 'Se ubica 569 kilómetros al sur de Santiago, capital del país, 148 kilómetros al sureste de Concepción, capital de la Región del Biobío, y 142 kilómetros al norte de Temuco, capital de la Región de La Araucanía.', '', '', 26, 1),
(36, 'Purén', 'Purén es una ciudad y comuna de la zona sur de Chile ubicada al noroeste de la Provincia de Malleco, en la Región de la Araucanía.', '', '', 26, 1),
(37, 'Castro', 'La superficie comunal es de 473 km² y la población total, según el censo de 2017, es de 43 807 habitantes, de los cuales el 77,7 % vive en la ciudad de Castro.', '', '', 27, 1),
(38, 'Puerto Montt', 'Capital de la provincia de Llanquihue y de la Región de Los Lagos. Se encuentra en frente al seno de Reloncaví y posee una población urbana y rural de 245 902 habitantes.', '', '', 28, 1),
(39, 'Osorno', 'Tiene una superficie de 951,3 km² y, según el censo del año 2017, una población de 161 460 habitantes; siendo la decimosexta ciudad más poblada del país, y la segunda ciudad más importante de la Región de Los Lagos, tras la capital regional de Puerto Montt.', '', '', 30, 1),
(40, 'Chaitén', 'Tiene una superficie de 8470,5 km², lo que la convierte en la comuna más grande de la región, de similar tamaño a la Isla Grande de Chiloé. Su población, al año 2017, es de 5071 habitantes.', '', '', 30, 1),
(41, 'Aysén', 'Se ubica a orillas del río Aysén, 3 km al interior del fiordo de Aysén. Solo en la ciudad tiene una población estimada de 27 000 habitantes en 2017, transformándola en la segunda ciudad de importancia en la región después de la Capital Regional: Coyhaique.', '', '', 31, 1),
(42, 'Cochrane', 'Tiene una superficie aproximada de 8500 km² y una población estimada de 3.490 habitantes (1.588 mujeres y 1.902 varones), la cual representa el 3% de la población regional.', '', '', 32, 1),
(43, 'Coyhaique', 'Se ubica al oriente de la cordillera de los Andes, en la Patagonia chilena, a una altura media de 310 m s. n. m., en el lugar donde confluyen los ríos Simpson y Coyhaique.', '', '', 33, 1),
(44, 'Chile Chico', 'es una ciudad y comuna de la zona austral de Chile ubicada en la Provincia General Carrera, Región de Aysén del General Carlos Ibáñez del Campo, Chile. La localidad de Chile Chico, que tiene 4865 habitantes (2017), es la capital de la comuna homónima y de la Provincia General Carrera.', '', '', 34, 1),
(45, 'Cabo de Hornos', 'creada en 1927, denominada Navarino hasta el año 2001. Pertenece a la provincia Antártica Chilena, la que a su vez forma parte de la Región de Magallanes y de la Antártica Chilena. La comuna debe su nombre al punto geográfico situado dentro de su jurisdicción, denominado de igual forma cabo de Hornos.', '', '', 35, 1),
(46, 'Punta Arenas', 'Es una comuna, ciudad y puerto interoceánico de la Zona Austral de Chile. Es la capital de la Provincia de Magallanes, de la Región de Magallanes y de la Antártica Chilena y, en forma no oficial, de la llamada Patagonia chilena.', '', '', 36, 1),
(47, 'Porvenir', 'Es una ciudad y comuna de la zona austral de Chile, situada en la Provincia de Tierra del Fuego, una de las provincias que componen la Región de Magallanes y de la Antártica Chilena. La ciudad de Porvenir es la capital de la provincia chilena de Tierra del Fuego, y es la ciudad más habitada de la porción chilena de la Isla Grande de Tierra del Fuego.', '', '', 37, 1),
(48, 'Puerto Natales', ' Es una ciudad y puerto chileno situado en el extremo austral del país, a orillas del Canal Señoret, entre el Golfo Almirante Montt y el Seno Última Esperanza, en la Región de Magallanes y de la Antártica Chilena. Es la capital de la comuna de Natales y de la provincia de Última Esperanza.', '', '', 38, 1),
(49, 'Colina ', 'Es una comuna y ciudad chilena ubicada al norte de la Región Metropolitana de Santiago, en la zona central de Chile. Es la capital de la Provincia de Chacabuco. Dentro de la comuna se encuentran localidades como la ciudad de Colina (capital comunal), Chicureo, Las Canteras y Esmeralda.', '', '', 39, 1),
(50, 'Puente Alto', 'Es una comuna y ciudad de Chile, capital de la provincia de Cordillera, perteneciente a la región Metropolitana de Santiago. Además, forma parte de la conurbación urbana del Gran Santiago, ubicándose en el sector suroriente del área urbana.', '', '', 40, 1),
(51, 'San Bernardo', 'Es una comuna y ciudad chilena, ubicada en la zona sur de la conurbación de Santiago. Administrativamente, es capital de la Provincia de Maipo, en la Región Metropolitana de Santiago.', '', '', 41, 1),
(52, 'Melipilla', ' Es una comuna y ciudad capital de la provincia de Melipilla. Forma parte de la Región Metropolitana de Santiago siendo una importante ciudad satélite de la capital nacional chilena, está situada al suroeste de Santiago de Chile y de la Cordillera de la Costa.', '', '', 42, 1),
(53, 'La Unión', 'es una pequeña ciudad de 26 000 habitantes que es parte de la Comuna de La Unión y Capital de la Provincia del Ranco en el territorio sur de la Región de Los Ríos. Está ubicada a 40 km al norte de Osorno y a 80 km al sureste de su Capital Regional —Valdivia.', '', '', 43, 1),
(54, 'Río Bueno', 'Es una comuna chilena de la provincia del Ranco, en la Región de Los Ríos, en la zona sur de Chile. Integra junto con las comunas de Futrono, Lago Ranco, Los Lagos, Paillaco, Panguipulli y La Unión.', '', '', 43, 1),
(55, 'Valdivia', 'Es una comuna y ciudad de la zona sur de Chile, capital de la provincia homónima y de la Región de Los Ríos. Se encuentra a 847,6 km al sur de Santiago, la capital de Chile. Está emplazada en la confluencia de los ríos Calle-Calle, Cau-cau y el río Cruces, y se encuentra a 15 km de la bahía de Corral. Según el censo nacional realizado en 2017 por el Instituto Nacional de Estadísticas de Chile, Val', '', '', 44, 1),
(56, 'Corral ', 'es una comuna y ciudad de la zona sur de Chile, ubicada en la Región de los Ríos. Su capital, la ciudad y puerto del mismo nombre se ubica entre la bahía de Corral y la desembocadura del río Valdivia, a 15 km de Valdivia, capital regional, comuna de la cual se separó por ley de municipios del 22 de diciembre de 1891.[cita requerida] Es el puerto más antiguo del sur de Chile y el más importante del', '', '', 44, 1),
(57, 'Arica', 'es una ciudad, comuna y puerto del Norte Grande de Chile, capital de la provincia homónima y de la región de Arica y Parinacota, ubicada en la frontera septentrional de Chile, a solo 18 kilómetros (11 millas) al sur de la frontera con Perú. Se encuentra en el recodo de la costa occidental de América del Sur conocida como la Curva de Arica, la cual se considera un punto de inflexión del Cono Sur, s', '', '', 45, 1),
(58, 'Camarones', 'Es una comuna perteneciente a la Provincia de Arica, en la Región de Arica y Parinacota, en el Norte Grande de Chile. Su municipalidad tiene asiento en el caserío de Cuya, en la ribera sur del río Camarones.', '', '', 45, 1),
(59, 'Putre', 'Está ubicada a 145 km de Arica, en el altiplano andino, siendo una de las localidades más altas de Chile. Tiene una superficie de 5902,5 km² y una población total de 2765 habitantes.', '', '', 46, 1),
(60, 'General Lagos', 'Ubicada en el extremo norte del altiplano chileno, es la comuna más septentrional y la octava menos poblada del país, con una población de 684 habitantes. Su municipalidad tiene asiento en Visviri. Su nombre indígena es Takura.', '', '', 46, 1),
(61, 'Bulnes', 'Es una comuna ubicada en la provincia de Diguillín, perteneciente a la Región de Ñuble, en la zona central de Chile. Su capital, al igual que de la provincia, es la ciudad de Bulnes. Se ubica a 25 km de Chillán, capital regional. Limita al norte con la comuna de Chillán Viejo, al sur con la comuna de Pemuco, al este con San Ignacio y al oeste con Quillón.', '', '', 47, 1),
(62, 'Chillán', 'Es una comuna de la zona central de Chile, capital de la Región de Ñuble, ubicada a 403 Km al sur de Santiago. Su área urbana, en conjunto a la de la comuna de Chillán Viejo, conforman la Conurbación Chillán.', '', '', 47, 1),
(63, 'Quirihue', 'Es una ciudad y comuna, capital de la provincia de Itata, Región de Ñuble, en la zona central de Chile. Está situada a unos 72 kilómetros al noroeste de Chillán, a 82 kilómetros al norte de Concepción y a 398 kilómetros al sur de Santiago. Limita al norte con Cauquenes, al oeste con Cobquecura, al sur con Trehuaco y al este con Ninhue.', '', '', 48, 1),
(64, 'San Carlos', 'Es una ciudad y comuna, capital de la provincia de Punilla, Región de Ñuble en Chile. Según el censo de 2017, la comuna de San Carlos posee una población total de 53 024 habitantes. lo que corresponde tanto al área urbana de la ciudad, como a los sectores rurales y semirurales de la misma.', '', '', 49, 1),
(65, 'Río Negro', 'Not Description', 'socialspot.cl', 'socialspot.cl', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `difficulty`
--

CREATE TABLE `difficulty` (
  `ID` int(11) NOT NULL,
  `Number` int(11) NOT NULL,
  `Spot_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Recovery_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `ID` int(11) NOT NULL,
  `Profile_ID` int(11) NOT NULL,
  `Follower_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`ID`, `Profile_ID`, `Follower_ID`, `Date`, `Time`, `Status_ID`) VALUES
(1, 3, 4, '2022-07-03', '21:46:05', 12),
(2, 1, 4, '2022-07-03', '21:49:01', 12),
(3, 4, 1, '2022-07-03', '23:43:50', 12);

-- --------------------------------------------------------

--
-- Table structure for table `hashtag`
--

CREATE TABLE `hashtag` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hashtag`
--

INSERT INTO `hashtag` (`ID`, `Name`) VALUES
(1, '#skate'),
(2, '#extreme'),
(3, '#norwaytest');

-- --------------------------------------------------------

--
-- Table structure for table `hashtagpost`
--

CREATE TABLE `hashtagpost` (
  `ID` int(11) NOT NULL,
  `Post_ID` int(11) NOT NULL,
  `Hashtag_ID` int(11) NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hashtagpost`
--

INSERT INTO `hashtagpost` (`ID`, `Post_ID`, `Hashtag_ID`, `Status_ID`) VALUES
(1, 4, 1, 1),
(2, 4, 2, 1),
(3, 6, 1, 1),
(4, 6, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `ID` int(11) NOT NULL,
  `URL` varchar(300) NOT NULL,
  `Post_ID` int(11) NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`ID`, `URL`, `Post_ID`, `Status_ID`) VALUES
(2, 'App-Folder/Post-2Folder/App-Post-2File-0.jpg', 2, 6),
(3, 'App-Folder/Post-3Folder/App-Post-3File-0.jpg', 3, 1),
(4, 'Prybet-Folder/Post-5Folder/Prybet-Post-5File-0.jpg', 5, 1),
(5, 'Prybet-Folder/Post-5Folder/Prybet-Post-5File-1.jpg', 5, 1),
(6, 'Prybet-Folder/Post-5Folder/Prybet-Post-5File-2.jpg', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `ID` int(11) NOT NULL,
  `Profile_ID` int(11) NOT NULL,
  `Spot_ID` int(11) DEFAULT NULL,
  `Hashtag_ID` int(11) DEFAULT NULL,
  `City_ID` int(11) DEFAULT NULL,
  `Province_ID` int(11) DEFAULT NULL,
  `Region_ID` int(11) DEFAULT NULL,
  `Category_ID` int(11) DEFAULT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`ID`, `Profile_ID`, `Spot_ID`, `Hashtag_ID`, `City_ID`, `Province_ID`, `Region_ID`, `Category_ID`, `Status_ID`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, 1, 12),
(2, 1, NULL, NULL, 65, NULL, NULL, NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `ID` int(11) NOT NULL,
  `Profile_ID` int(11) NOT NULL,
  `Post_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `marker`
--

CREATE TABLE `marker` (
  `ID` int(11) NOT NULL,
  `Lat` double NOT NULL,
  `Lng` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marker`
--

INSERT INTO `marker` (`ID`, `Lat`, `Lng`) VALUES
(3, -40.581396059116656, -73.11163235007325),
(6, -40.574109123794905, -73.1041307374835),
(14, -40.79488011250558, -73.21435913443565);

-- --------------------------------------------------------

--
-- Table structure for table `norm`
--

CREATE TABLE `norm` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Des` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `norm`
--

INSERT INTO `norm` (`ID`, `Name`, `Des`) VALUES
(1, 'Spam', ' Cualquier forma de comunicación no solicitada que se envía de forma masiva.'),
(2, 'Incitar al odio', 'Cometer actos de odio o de desprecio contra una o más personas en razón del color de su piel, su raza, religión u origen nacional o étnico.'),
(3, 'Violencia o organizaciones peligrosas', 'Cometer actos de violencia moral o física.'),
(4, 'Informacion falsa', 'Contenido que presenta deliberadamente una mentira como verdad. Su finalidad es confundir a las personas, haciendo que crean que ciertos datos ficticios son reales.'),
(5, 'Estafa o fraude', 'Utiliza engaño bastante para producir error en otro, induciéndolo a realizar un acto de disposición en perjuicio propio o ajeno.'),
(6, 'Bullying o acoso', 'Acoso físico o psicológico al que someten, de forma continuada.'),
(7, 'Suicidio o autolesion', 'Se muestra contenido gore o de autolesiones (Se omiten los accidentes leves.)'),
(8, 'Venta de articulos ilegales o regulados', 'Prohibido la venta de drogas, armas u otros articulos no regulados.'),
(9, 'Desnudos o contenido para mayores', 'Fotos o videos donde de muestra contenido pornografico.'),
(10, 'Otro motivo', 'Otra razon.');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Profile_S` int(11) NOT NULL,
  `Profile_R` int(11) NOT NULL,
  `NotyType_ID` int(11) NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notytype`
--

CREATE TABLE `notytype` (
  `ID` int(11) NOT NULL,
  `Reply` int(11) DEFAULT NULL,
  `Post` int(11) DEFAULT NULL,
  `Follow` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `Profile_ID` int(11) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `Body` varchar(300) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Status_ID` int(11) NOT NULL,
  `Spot_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID`, `Profile_ID`, `Title`, `Body`, `Date`, `Time`, `Category_ID`, `Status_ID`, `Spot_ID`) VALUES
(1, 1, 'Test', 'Test', '2022-07-03', '18:00:51', 7, 6, NULL),
(2, 1, 'Test2', 'Test2', '2022-07-03', '18:06:28', 12, 6, NULL),
(3, 1, 'Post en Inacap', 'Foto de la sede', '2022-07-03', '18:23:13', 7, 1, 1),
(4, 2, 'Un dia de pana', 'alegre de patinar el dia de hoy', '2022-07-03', '18:40:17', 1, 6, 2),
(5, 3, 'Mas vistas', 'Not my location', '2022-07-03', '19:04:36', 12, 1, 3),
(6, 4, 'Skating', 'Video upload', '2022-07-03', '19:11:16', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Check` tinyint(4) NOT NULL,
  `Desc` varchar(100) DEFAULT NULL,
  `BirthDate` date NOT NULL,
  `EntryDate` date NOT NULL,
  `ImageURL` varchar(300) DEFAULT NULL,
  `BannerURL` varchar(300) DEFAULT NULL,
  `City_ID` int(11) DEFAULT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`ID`, `Name`, `Username`, `Check`, `Desc`, `BirthDate`, `EntryDate`, `ImageURL`, `BannerURL`, `City_ID`, `Status_ID`) VALUES
(1, 'Social App', 'App', 0, '', '2000-01-01', '2022-07-03', '', '', NULL, 2),
(2, 'nacho', 'Pedro', 0, '', '2022-07-28', '2022-07-03', 'Pedro-ProfilePic.jpeg', 'Pedro-BannerPic.jpeg', NULL, 2),
(3, 'Benja Leal', 'Prybet', 0, 'Admin accoount', '1998-08-29', '2022-07-03', 'Prybet-ProfilePic.png', '', NULL, 2),
(4, 'test', 'test', 0, 'Test Account', '2021-09-22', '2022-07-03', 'test-ProfilePic.png', 'test-BannerPic.png', NULL, 2),
(5, 'jasmet', 'jasmet', 0, '', '2007-07-03', '2022-07-03', '', '', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Desc` varchar(400) NOT NULL,
  `ImageURL` varchar(300) DEFAULT NULL,
  `BannerURL` varchar(300) DEFAULT NULL,
  `Region_ID` int(11) NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`ID`, `Name`, `Desc`, `ImageURL`, `BannerURL`, `Region_ID`, `Status_ID`) VALUES
(1, 'Iquique', 'limita al norte y al este con la provincia del Tamarugal; al sur con la provincia de Tocopilla (región de Antofagasta); y al oeste con el océano Pacífico. La provincia de Iquique está integrada por las comunas de Iquique y Alto Hospicio.', 'socialspot.cl', 'socialspot.cl', 1, 1),
(2, 'Tamarugal', 'El origen de esta provincia de Chile se encuentra en la Ley N°20175, que también crea la región de Arica y Parinacota, mediante la división de la antigua I Región de Tarapacá en 2 provincias, provincia de Iquique y Provincia del Tamarugal.', 'socialspot.cl', 'socialspot.cl', 1, 1),
(3, 'Antofagasta', 'Tiene una superficie de 65 987 km², posee una población de 318 779 habitantes y su capital provincial es el puerto de Antofagasta.', 'socialspot.cl', 'socialspot.cl', 2, 1),
(4, 'El Loa', 'Tiene una superficie de 42 934,1 km² y posee una población de 177 048 habitantes. Su capital es la ciudad de Calama. De ella se extrae el cobre, uno de los minerales más importantes del país.', 'socialspot.cl', 'socialspot.cl', 2, 1),
(5, 'Tocopilla', 'Tiene una superficie de 16.385,2 km² y posee una población de 29.684 habitantes. Su capital provincial es la ciudad de Tocopilla.', 'socialspot.cl', 'socialspot.cl', 2, 1),
(6, 'Chañaral', 'Cuenta con una superficie de 24.436,2 km² y posee una población de 30.598 habitantes. Su capital provincial es la ciudad de Chañaral.', 'socialspot.cl', 'socialspot.cl', 3, 1),
(7, 'Copiapó', 'Cuenta con una superficie de 32.538,5 km² y posee una población de 188.323 habitantes. Su capital provincial es la ciudad de Copiapó.', 'socialspot.cl', 'socialspot.cl', 3, 1),
(8, 'Huasco', 'Cuenta con una superficie de 19.066 km² y posee una población de 73.133 habitantes. Su capital provincial es la ciudad de Vallenar.', 'socialspot.cl', 'socialspot.cl', 3, 1),
(9, 'Choapa', 'La provincia de Choapa es la más austral de las tres que conforman a la región de Coquimbo en Chile. La capital provincial es la ciudad de Illapel.', 'socialspot.cl', 'socialspot.cl', 4, 1),
(10, 'Elqui', 'La capital provincial es la ciudad de Coquimbo. Debe su nombre al principal río de la provincia: el río Elqui.', 'socialspot.cl', 'socialspot.cl', 4, 1),
(11, 'Limarí', 'La capital provincial es la ciudad de Ovalle. Está nombrada por el principal río de la provincia: el río Limarí.', 'socialspot.cl', 'socialspot.cl', 4, 1),
(12, 'Isla de Pascua', 'tiene una superficie de 163,6 km² y posee una población de 5761 habitantes. Su capital es Hanga Roa.', 'socialspot.cl', 'socialspot.cl', 5, 1),
(13, 'Los Andes', 'Está ubicada en el sector este de la Región de Valparaíso y cuenta con una superficie de 3054 km². Posee una población de 110.602 habitantes y su capital provincial es la ciudad de Los Andes', 'socialspot.cl', 'socialspot.cl', 5, 1),
(14, 'Marga Marga', 'La Provincia de Marga-Marga está conformada por las comunas de Quilpué, Villa Alemana, Limache y Olmué, con una superficie total de 1179,4 km² y una población de 330.814 habitantes (preliminar Censo 2012). Los límites comunales no fueron alterados.', 'socialspot.cl', 'socialspot.cl', 5, 1),
(15, 'Petorca', 'Posee una superficie de 4588,9 km² y posee una población de 78 299 habitantes. Su capital provincial es la ciudad de La Ligua.', 'socialspot.cl', 'socialspot.cl', 5, 1),
(16, 'Cachapoal', 'Se encuentra ubicada al sur de la Región Metropolitana de Santiago y su superficie es de 7516,7 km². Cuenta con una población de cerca de 646 133 habitantes, que se concentran en su capital, Rancagua, y en otras ciudades como Rengo, San Vicente y Graneros.', 'socialspot.cl', 'socialspot.cl', 6, 1),
(17, 'Cardenal Caro', 'Es la única provincia de la Región del Libertador General Bernardo O\'Higgins que tiene salida al mar. Tiene una población de 41.160 habitantes y una superficie de 3.295,07 km². Su capital es Pichilemu, principal ciudad turística y balneario de la región en los meses de verano.', 'socialspot.cl', 'socialspot.cl', 6, 1),
(18, 'Colchagua', 'Su capital provincial es la ciudad de San Fernando. Tiene una superficie de 5.678,0 km², y una población de 222 556 habitantes, según el censo de 2017. El 81.6% de la población es rural y su gentilicio es colchagüino/a.', 'socialspot.cl', 'socialspot.cl', 6, 1),
(19, 'Cauquenes', 'Es una provincia eminentemente agraria y, como tal, posee una alta proporción de población rural. Su Capital es la ciudad de Cauquenes.', 'socialspot.cl', 'socialspot.cl', 7, 1),
(20, 'Curicó', 'Tiene una superficie de 7486,7 km², y posee una población de 288 880 habitantes.​ Su capital provincial es la ciudad de Curicó.', 'socialspot.cl', 'socialspot.cl', 7, 1),
(21, 'Linares', 'La Provincia de Linares es una provincia chilena localizada en la Región del Maule, en la zona central de Chile, cuya capital y centro más poblado es la ciudad de Linares.', 'socialspot.cl', 'socialspot.cl', 7, 1),
(22, 'Talca', 'Talca es una provincia chilena, en la zona central del país y parte de la Región del Maule. Su Capital es la Ciudad de Talca.', 'socialspot.cl', 'socialspot.cl', 7, 1),
(23, 'Arauco', 'Limita al norte con la provincia de Concepción, al oriente con la de Biobío y la de Malleco, al sur con la provincia de Cautín y al oeste con el océano Pacífico.', 'socialspot.cl', 'socialspot.cl', 8, 1),
(24, 'Biobío', 'Su capital es la ciudad de Los Ángeles. Tiene una población de 394 802 habitantes según el censo de 2017 y una superficie de 14 987,9 km².', 'socialspot.cl', 'socialspot.cl', 8, 1),
(25, 'Concepción', 'De acuerdo al censo chileno de 2017, su población es de 1 105 658 habitantes,1​ lo que la convierte en la segunda provincia más poblada del país, después de la provincia de Santiago. Posee una superficie de 3439 km² y su capital es la comuna de Concepción.', 'socialspot.cl', 'socialspot.cl', 8, 1),
(26, 'Cautín', 'Su población es de 668 560 habitantes. Las ciudades más importantes son Temuco, Villarrica, Lautaro y Nueva Imperial. Dentro de sus economías principales se puede encontrar la forestal, agrícola y ganadera. Su clima es húmedo, lluvioso en invierno y generalmente cálido en verano.', 'socialspot.cl', 'socialspot.cl', 9, 1),
(27, 'Malleco', 'Es una provincia de la República de Chile situada entre los 37º33\'S y los 38º55\'S, al norte de la Provincia de Cautín, conformando ambas la Región de la Araucanía. La población estimada al 30 de junio de 2005 es de 223 184 habitantes', 'socialspot.cl', 'socialspot.cl', 9, 1),
(28, 'Chiloé', 'está compuesto por la isla Grande de Chiloé y una serie de otras más pequeñas, con una extensión de 9181 km². Está situada en la Región de Los Lagos y su capital es la ciudad de Castro', 'socialspot.cl', 'socialspot.cl', 10, 1),
(29, 'Llanquihue', 'La provincia de Llanquihue se ubica en el centro de la Región de Los Lagos, tiene una superficie de 14 876,4 km² y posee una población de 321 493 habitantes.', 'socialspot.cl', 'socialspot.cl', 10, 1),
(30, 'Osorno', 'Tiene una superficie de 9223,7 km², y posee una población, al año 2017, de 234 122 habitantes', 'socialspot.cl', 'socialspot.cl', 10, 1),
(31, 'Palena', 'Tiene una superficie de 15 301,9 km² y posee una población de 18 349 habitantes según el censo de 2017.', 'socialspot.cl', 'socialspot.cl', 10, 1),
(32, 'Aysén', 'Las cumbres de las montañas incluyen el cerro Castillo, de 2,675 m de altura y terreno serrado, ubicado dentro de una reserva natural del mismo nombre.', 'socialspot.cl', 'socialspot.cl', 11, 1),
(33, 'Capitán Prat', 'Su capital es Cochrane. Tiene una superficie de 37 247,2 km² y una población de 3837 habitantes.', 'socialspot.cl', 'socialspot.cl', 11, 1),
(34, 'Coyhaique', 'Perteneciente a la Región de Aysén del General Carlos Ibáñez del Campo, y que limita al norte con la provincia de Palena; al sur con la provincia General Carrera; al este con Argentina; y al oeste con la provincia de Aysén.', 'socialspot.cl', 'socialspot.cl', 11, 1),
(35, 'General Carrera', 'Cuenta con una superficie de 12406,5 km² y una población de 6921 habitantes. Su capital es Chile Chico.', 'socialspot.cl', 'socialspot.cl', 11, 1),
(36, 'Antártica Chilena', 'Tiene una superficie de 14 146 km² y posee una población de 2262 habitantes. Su capital provincial es la ciudad de Puerto Williams.', 'socialspot.cl', 'socialspot.cl', 12, 1),
(37, 'Magallanes', 'tiene una superficie de 36 994,7 km² y posee una población de 131 592 habitantes. Su capital provincial es la ciudad de Punta Arenas.', 'socialspot.cl', 'socialspot.cl', 12, 1),
(38, 'Tierra del Fuego', 'Tiene una superficie de 22 593 km² y posee una población de 8364 habitantes. Su capital provincial es la ciudad de Porvenir.', 'socialspot.cl', 'socialspot.cl', 12, 1),
(39, 'Última Esperanza', 'Su capital es Puerto Natales. Su superficie es de 55 443,9 km² y cuenta con una población de 19 855 habitantes.', 'socialspot.cl', 'socialspot.cl', 12, 1),
(40, 'Chacabuco', 'Tiene una superficie de 5.615,2 km² y posee una población según el Censo 2017​ de 267 553 habitantes.', 'socialspot.cl', 'socialspot.cl', 13, 1),
(41, 'Cordillera ', 'Ocupa una pequeña área de la depresión intermedia, rellena de sedimentos glaciares, fluviales y volcánicos, y de la cordillera de los Andes hasta la frontera internacional con Argentina. Su capital es la comuna de Puente Alto.', 'socialspot.cl', 'socialspot.cl', 13, 1),
(42, 'Maipo', 'Su superficie es de 1120,5 km² y posee una población de 496 078 habitantes. La capital provincial es la ciudad de San Bernardo, la cual forma parte del denominado Gran Santiago.', 'socialspot.cl', 'socialspot.cl', 13, 1),
(43, 'Melipilla', 'Tiene una superficie de 4065,7 km² y según censo 2017 posee una población de 185 966 habitantes, para 2020 se proyectan 212.326 habitantes.​ Su capital provincial es la ciudad de Melipilla.', 'socialspot.cl', 'socialspot.cl', 13, 1),
(44, 'Ranco', 'Tiene una superficie de 8232,3 km² y una población de 97 153 habitantes, según los datos del Censo de 2002. Su capital es la ciudad de La Unión.', 'socialspot.cl', 'socialspot.cl', 14, 1),
(45, 'Valdivia', 'Tiene una superficie de 10 197,2 km², y posee una población de 259 243 habitantes. Su capital provincial es la ciudad de Valdivia.', 'socialspot.cl', 'socialspot.cl', 14, 1),
(46, 'Arica', 'Limita al norte con la provincia de Tacna en el Perú; al sur con la provincia del Tamarugal, en la región de Tarapacá; al este con la provincia de Parinacota; y al oeste con el océano Pacífico. Su capital es la ciudad de Arica.', 'socialspot.cl', 'socialspot.cl', 15, 1),
(47, 'Parinacota', 'Limita al norte con la provincia de Tacna perteneciente al departamento de Tacna, en el Perú; al sur con la provincia del Tamarugal en la región de Tarapacá; al este con los departamentos de La Paz y Oruro, en Bolivia; y al oeste con la provincia de Arica.', 'socialspot.cl', 'socialspot.cl', 15, 1),
(48, 'Diguillín', 'Tiene una superficie de 5229,5 km². Su capital es la ciudad de Bulnes', 'socialspot.cl', 'socialspot.cl', 16, 1),
(49, 'Itata', 'Su actual territorio tiene una superficie 2746,5 km², su capital provincial es Quirihue.', 'socialspot.cl', 'socialspot.cl', 16, 1),
(50, 'Punilla', 'Tiene una superficie de 5202,5 km². Su capital es la ciudad de San Carlos', 'socialspot.cl', 'socialspot.cl', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE `recovery` (
  `ID` int(11) NOT NULL,
  `Hash` varchar(300) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Status_ID` int(11) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Desc` varchar(400) NOT NULL,
  `ImageURL` varchar(300) DEFAULT NULL,
  `BannerURL` varchar(300) DEFAULT NULL,
  `Country` varchar(45) NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`ID`, `Name`, `Desc`, `ImageURL`, `BannerURL`, `Country`, `Status_ID`) VALUES
(1, 'Tarapacá', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1),
(2, 'Antofagasta', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1),
(3, 'Atacama', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1),
(4, 'Coquimbo', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1),
(5, 'Valparaiso', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1),
(6, 'O\'Higgins', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1),
(7, 'Maule', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1),
(8, 'Bío Bío', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1),
(9, 'Araucanía', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1),
(10, 'Los Lagos', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1),
(11, 'Aysén', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1),
(12, 'Magallanes y Antártica Chilena', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1),
(13, 'Metropolitana', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1),
(14, 'Los Ríos', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1),
(15, 'Arica-Parinacota', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1),
(16, 'Ñuble', 'Not Description', 'socialspot.cl', 'socialspot.cl', 'Chile', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `ID` int(11) NOT NULL,
  `Body` varchar(300) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Reply_ID` int(11) DEFAULT NULL,
  `Post_ID` int(11) NOT NULL,
  `Profile_ID` int(11) NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ID` int(11) NOT NULL,
  `Norm_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Post_ID` int(11) DEFAULT NULL,
  `Reply_ID` int(11) DEFAULT NULL,
  `Spot_ID` int(11) DEFAULT NULL,
  `CommentReport` varchar(100) NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `ID` int(11) NOT NULL,
  `MarkerStart` int(11) NOT NULL,
  `MarkerEnd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `spot`
--

CREATE TABLE `spot` (
  `ID` int(11) NOT NULL,
  `Profile_ID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Desc` varchar(300) NOT NULL,
  `ImageURL` varchar(300) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Marker_ID` int(11) NOT NULL,
  `City_ID` int(11) NOT NULL,
  `Route_ID` int(11) DEFAULT NULL,
  `Status_ID` int(11) NOT NULL,
  `Count` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spot`
--

INSERT INTO `spot` (`ID`, `Profile_ID`, `Name`, `Desc`, `ImageURL`, `Address`, `Marker_ID`, `City_ID`, `Route_ID`, `Status_ID`, `Count`, `Date`, `Time`) VALUES
(1, 1, 'Inacap Osorno', 'Sede donde se entrega ese proyecto', '../../SSpotImages/SpotMedia/Spots-Folder-App/Spot--40.581396059116656-73.11163235007325-Folder/-40.581396059116656-73.11163235007325-Image.png', 'Osorno, Los Lagos, Chile', 3, 39, NULL, 1, 0, '2022-07-03', '18:18:57'),
(2, 1, 'Parque Chuyaca', 'Parque Pleistocenico', '../../SSpotImages/SpotMedia/Spots-Folder-App/Spot--40.574109123794905-73.1041307374835-Folder/-40.574109123794905-73.1041307374835-Image.jpg', 'Sta. María 601-699, Osorno, Los Lagos, Chile', 6, 39, NULL, 1, 0, '2022-07-03', '18:21:54'),
(3, 1, 'Views', 'Ciudad de Rio Negro', '../../SSpotImages/SpotMedia/Spots-Folder-App/Spot--40.79488011250558-73.21435913443565-Folder/-40.79488011250558-73.21435913443565-Image.jpeg', 'Pedro Montt 70, Río Negro, Los Lagos, Chile', 14, 65, NULL, 1, 0, '2022-07-03', '19:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `ID` int(11) NOT NULL,
  `Status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`ID`, `Status`) VALUES
(1, 'Active'),
(2, 'On-Line'),
(3, 'Away'),
(4, 'Disconnected'),
(5, 'Hidden'),
(6, 'Removed'),
(7, 'Edited'),
(8, 'Visible'),
(9, 'Pending'),
(10, 'Closed'),
(11, 'Resolved'),
(12, 'Given'),
(13, 'Banned'),
(14, 'Comment'),
(15, 'Reply');

-- --------------------------------------------------------

--
-- Table structure for table `step`
--

CREATE TABLE `step` (
  `ID` int(11) NOT NULL,
  `Lat` double NOT NULL,
  `Lng` double NOT NULL,
  `Coords_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Profile_ID` int(11) NOT NULL,
  `Status_ID` int(11) NOT NULL,
  `UserType_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Email`, `Username`, `Password`, `Profile_ID`, `Status_ID`, `UserType_ID`) VALUES
(1, 'socialapp@socialspot.cl', 'App', '$2y$07$d9tndZMh.pJDn8dXn6HMQOeKia67nf.aaW5uxMOHNGoGHzA8sN1ye', 1, 1, 1),
(2, 'pedroale328@gmail.com', 'Pedro', '$2y$07$5vPq4SWZCS3Sh4NBxCFPpuQ0qZW4.xto/pWNdcRUTO2OIKh0hcvWi', 2, 1, 1),
(3, 'mrprybet@socialspot.cl', 'Prybet', '$2y$07$KUhCjNMt5jPLFam0Yy1/ZO29SOM0NF0tNV3fAfHHKOvtRbtzNjujW', 3, 1, 1),
(4, 'test@socialspot.cl', 'test', '$2y$07$cTkLo3u3GpXbLT1zswDfcunUEZ7VT605CUWegP15L31XYtyJLqFT6', 4, 1, 1),
(5, 'jasmet@gmail.com', 'jasmet', '$2y$07$L8GYOae.jchR0czZFYN9oeHv8A81SBy6Et8m/nmvvF6r0g7q/I.gy', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `ID` int(11) NOT NULL,
  `Tipe` varchar(45) NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`ID`, `Tipe`, `Status_ID`) VALUES
(1, 'User', 1),
(2, 'Guess', 1),
(3, 'Client', 1),
(4, 'Modder', 1),
(5, 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `ID` int(11) NOT NULL,
  `URl` varchar(300) NOT NULL,
  `Post_ID` int(11) NOT NULL,
  `Status_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`ID`, `URl`, `Post_ID`, `Status_ID`) VALUES
(1, 'test-Folder/Post-6Folder/test-Post-6File-0.mp4', 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Category_Status1_idx` (`Status_ID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_City_Status1_idx` (`Status_ID`),
  ADD KEY `fk_City_Province1_idx` (`Province_ID`);

--
-- Indexes for table `difficulty`
--
ALTER TABLE `difficulty`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Dificulty_Spot1_idx` (`Spot_ID`),
  ADD KEY `fk_Quali_User1_idx` (`User_ID`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Email_User1_idx` (`User_ID`),
  ADD KEY `fk_Email_Recovery1_idx` (`Recovery_ID`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Follow_Status1_idx` (`Status_ID`),
  ADD KEY `fk_Follow_Profile1_idx` (`Profile_ID`),
  ADD KEY `fk_Follow_Profile2_idx` (`Follower_ID`);

--
-- Indexes for table `hashtag`
--
ALTER TABLE `hashtag`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hashtagpost`
--
ALTER TABLE `hashtagpost`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_HashtagPost_Post1_idx` (`Post_ID`),
  ADD KEY `fk_HashtagPost_Hashtag1_idx` (`Hashtag_ID`),
  ADD KEY `fk_HashtagPost_Status1_idx` (`Status_ID`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Images_Status1_idx` (`Status_ID`),
  ADD KEY `fk_Images_Post1_idx` (`Post_ID`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Interes_Spot1_idx` (`Spot_ID`),
  ADD KEY `fk_Interes_City1_idx` (`City_ID`),
  ADD KEY `fk_Interes_Region1_idx` (`Region_ID`),
  ADD KEY `fk_Interes_Category1_idx` (`Category_ID`),
  ADD KEY `fk_Interests_Profile1_idx` (`Profile_ID`),
  ADD KEY `fk_Interests_Province1_idx` (`Province_ID`),
  ADD KEY `fk_Interests_Status1_idx` (`Status_ID`),
  ADD KEY `fk_Interests_Hashtag1_idx` (`Hashtag_ID`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Likes_Post1_idx` (`Post_ID`),
  ADD KEY `fk_Likes_Status1_idx` (`Status_ID`),
  ADD KEY `fk_Like_Profile1_idx` (`Profile_ID`);

--
-- Indexes for table `marker`
--
ALTER TABLE `marker`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `norm`
--
ALTER TABLE `norm`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Notify_Status1_idx` (`Status_ID`),
  ADD KEY `fk_Notify_Profile1_idx` (`Profile_S`),
  ADD KEY `fk_Notify_Profile2_idx` (`Profile_R`),
  ADD KEY `fk_Notify_NotyType1_idx` (`NotyType_ID`);

--
-- Indexes for table `notytype`
--
ALTER TABLE `notytype`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Noty_Reply1_idx` (`Reply`),
  ADD KEY `fk_Noty_Post1_idx` (`Post`),
  ADD KEY `fk_Noty_Follow1_idx` (`Follow`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Post_Category1_idx` (`Category_ID`),
  ADD KEY `fk_Post_Status1_idx` (`Status_ID`),
  ADD KEY `fk_Post_Spot1_idx` (`Spot_ID`),
  ADD KEY `fk_Post_Profile1_idx` (`Profile_ID`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username_UNIQUE` (`Username`),
  ADD KEY `fk_Profile_City1_idx` (`City_ID`),
  ADD KEY `fk_Profile_Status1_idx` (`Status_ID`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Commune_Region1_idx` (`Region_ID`),
  ADD KEY `fk_Commune_Status1_idx` (`Status_ID`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Recovery_User1_idx` (`User_ID`),
  ADD KEY `fk_Recovery_Status1_idx` (`Status_ID`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Region_Status1_idx` (`Status_ID`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Reply_Reply1_idx` (`Reply_ID`),
  ADD KEY `fk_Reply_Post1_idx` (`Post_ID`),
  ADD KEY `fk_Reply_Status1_idx` (`Status_ID`),
  ADD KEY `fk_Reply_Profile1_idx` (`Profile_ID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_PostReport_Norm1_idx` (`Norm_ID`),
  ADD KEY `fk_PostReport_User1_idx` (`User_ID`),
  ADD KEY `fk_PostReport_Post1_idx` (`Post_ID`),
  ADD KEY `fk_Report_Reply1_idx` (`Reply_ID`),
  ADD KEY `fk_Report_Spot1_idx` (`Spot_ID`),
  ADD KEY `fk_Report_Status1_idx` (`Status_ID`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Coords_Marker2_idx` (`MarkerEnd`),
  ADD KEY `fk_Coords_Marker1_idx` (`MarkerStart`);

--
-- Indexes for table `spot`
--
ALTER TABLE `spot`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Route_City1_idx` (`City_ID`),
  ADD KEY `fk_Route_Coords1_idx` (`Route_ID`),
  ADD KEY `fk_Route_Status1_idx` (`Status_ID`),
  ADD KEY `fk_Spot_Marker1_idx` (`Marker_ID`),
  ADD KEY `fk_Spot_Profile1_idx` (`Profile_ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `step`
--
ALTER TABLE `step`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Step_Coords1_idx` (`Coords_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email_UNIQUE` (`Email`),
  ADD UNIQUE KEY `Username_UNIQUE` (`Username`),
  ADD KEY `fk_User_Status1_idx` (`Status_ID`),
  ADD KEY `fk_User_UserTipe1_idx` (`UserType_ID`),
  ADD KEY `fk_User_Profile1_idx` (`Profile_ID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_UserTipe_Status1_idx` (`Status_ID`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Videos_Status1_idx` (`Status_ID`),
  ADD KEY `fk_Videos_Post1_idx` (`Post_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `difficulty`
--
ALTER TABLE `difficulty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hashtag`
--
ALTER TABLE `hashtag`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hashtagpost`
--
ALTER TABLE `hashtagpost`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marker`
--
ALTER TABLE `marker`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `norm`
--
ALTER TABLE `norm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notytype`
--
ALTER TABLE `notytype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spot`
--
ALTER TABLE `spot`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `step`
--
ALTER TABLE `step`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_Category_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_City_Province1` FOREIGN KEY (`Province_ID`) REFERENCES `province` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_City_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `difficulty`
--
ALTER TABLE `difficulty`
  ADD CONSTRAINT `fk_Dificulty_Spot1` FOREIGN KEY (`Spot_ID`) REFERENCES `spot` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Quali_User1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `fk_Email_Recovery1` FOREIGN KEY (`Recovery_ID`) REFERENCES `recovery` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Email_User1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `fk_Follow_Profile1` FOREIGN KEY (`Profile_ID`) REFERENCES `profile` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Follow_Profile2` FOREIGN KEY (`Follower_ID`) REFERENCES `profile` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Follow_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hashtagpost`
--
ALTER TABLE `hashtagpost`
  ADD CONSTRAINT `fk_HashtagPost_Hashtag1` FOREIGN KEY (`Hashtag_ID`) REFERENCES `hashtag` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_HashtagPost_Post1` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_HashtagPost_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_Images_Post1` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Images_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `interests`
--
ALTER TABLE `interests`
  ADD CONSTRAINT `fk_Interes_Category1` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Interes_City1` FOREIGN KEY (`City_ID`) REFERENCES `city` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Interes_Region1` FOREIGN KEY (`Region_ID`) REFERENCES `region` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Interes_Spot1` FOREIGN KEY (`Spot_ID`) REFERENCES `spot` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Interests_Hashtag1` FOREIGN KEY (`Hashtag_ID`) REFERENCES `hashtag` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Interests_Profile1` FOREIGN KEY (`Profile_ID`) REFERENCES `profile` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Interests_Province1` FOREIGN KEY (`Province_ID`) REFERENCES `province` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Interests_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `fk_Like_Profile1` FOREIGN KEY (`Profile_ID`) REFERENCES `profile` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Likes_Post1` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Likes_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notify`
--
ALTER TABLE `notify`
  ADD CONSTRAINT `fk_Notify_NotyType1` FOREIGN KEY (`NotyType_ID`) REFERENCES `notytype` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Notify_Profile1` FOREIGN KEY (`Profile_S`) REFERENCES `profile` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Notify_Profile2` FOREIGN KEY (`Profile_R`) REFERENCES `profile` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Notify_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notytype`
--
ALTER TABLE `notytype`
  ADD CONSTRAINT `fk_Noty_Follow1` FOREIGN KEY (`Follow`) REFERENCES `follow` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Noty_Post1` FOREIGN KEY (`Post`) REFERENCES `post` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Noty_Reply1` FOREIGN KEY (`Reply`) REFERENCES `reply` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_Post_Category1` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Post_Profile1` FOREIGN KEY (`Profile_ID`) REFERENCES `profile` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Post_Spot1` FOREIGN KEY (`Spot_ID`) REFERENCES `spot` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Post_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_Profile_City1` FOREIGN KEY (`City_ID`) REFERENCES `city` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Profile_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `province`
--
ALTER TABLE `province`
  ADD CONSTRAINT `fk_Commune_Region1` FOREIGN KEY (`Region_ID`) REFERENCES `region` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Commune_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recovery`
--
ALTER TABLE `recovery`
  ADD CONSTRAINT `fk_Recovery_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Recovery_User1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `fk_Region_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `fk_Reply_Post1` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reply_Profile1` FOREIGN KEY (`Profile_ID`) REFERENCES `profile` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reply_Reply1` FOREIGN KEY (`Reply_ID`) REFERENCES `reply` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reply_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `fk_PostReport_Norm1` FOREIGN KEY (`Norm_ID`) REFERENCES `norm` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PostReport_Post1` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PostReport_User1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Report_Reply1` FOREIGN KEY (`Reply_ID`) REFERENCES `reply` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Report_Spot1` FOREIGN KEY (`Spot_ID`) REFERENCES `spot` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Report_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `fk_Coords_Marker1` FOREIGN KEY (`MarkerStart`) REFERENCES `marker` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Coords_Marker2` FOREIGN KEY (`MarkerEnd`) REFERENCES `marker` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `spot`
--
ALTER TABLE `spot`
  ADD CONSTRAINT `fk_Route_City1` FOREIGN KEY (`City_ID`) REFERENCES `city` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Route_Coords1` FOREIGN KEY (`Route_ID`) REFERENCES `route` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Route_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Spot_Marker1` FOREIGN KEY (`Marker_ID`) REFERENCES `marker` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Spot_Profile1` FOREIGN KEY (`Profile_ID`) REFERENCES `profile` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `step`
--
ALTER TABLE `step`
  ADD CONSTRAINT `fk_Step_Coords1` FOREIGN KEY (`Coords_ID`) REFERENCES `route` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_User_Profile1` FOREIGN KEY (`Profile_ID`) REFERENCES `profile` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_UserTipe1` FOREIGN KEY (`UserType_ID`) REFERENCES `usertype` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usertype`
--
ALTER TABLE `usertype`
  ADD CONSTRAINT `fk_UserTipe_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `fk_Videos_Post1` FOREIGN KEY (`Post_ID`) REFERENCES `post` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Videos_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
