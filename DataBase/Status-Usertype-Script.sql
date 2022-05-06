/** Status **/
INSERT INTO status VALUES(null, "Active");
INSERT INTO status VALUES(null, "On-Line");
INSERT INTO status VALUES(null, "Away");
INSERT INTO status VALUES(null, "Disconnected");
INSERT INTO status VALUES(null, "Hidden");
INSERT INTO status VALUES(null, "Removed");
INSERT INTO status VALUES(null, "Edited");
INSERT INTO status VALUES(null, "Visible");
INSERT INTO status VALUES(null, "Pending");
INSERT INTO status VALUES(null, "Closed");
INSERT INTO status VALUES(null, "Resolved");
INSERT INTO status VALUES(null, "Given");
INSERT INTO status VALUES(null, "Banned");
INSERT INTO status VALUES(null, "Banned");


/** User types **/
INSERT INTO usertype VALUES(null, "User",1);
INSERT INTO usertype VALUES(null, "Guess",1);
INSERT INTO usertype VALUES(null, "Client",1);
INSERT INTO usertype VALUES(null, "Modder",1);
INSERT INTO usertype VALUES(null, "Admin",1);

/** Sports **/

INSERT INTO sport VALUES (null, "Skate", "El skateboarding es un deporte que se basa en la propulsión con un skate –elemento compuesto por una tabla de madera, ejes, rodamientos y ruedas- a la vez que se realizan distintos trucos o maniobras", "Skate-ProfilePic.jpg", "Skate-BannerPic.jpg",1);
INSERT INTO sport VALUES (null, "Ciclismo", "El ciclismo es un deporte en el que se utiliza una bicicleta​ para recorrer circuitos al aire libre o en pista cubierta y que engloba diferentes especialidades.", "Ciclism-ProfilePic.jpg", "Ciclism-BannerPic.jpg",1);

/** Regions of Chile **/
INSERT INTO region VALUES(null,"Tarapacá", "se ubica en el norte del país, a una distancia superior a 1.800 kilómetros de la capital de Chile." , "Chile", 1);
INSERT INTO region VALUES(null,"Antofagasta", "se ubica en el norte. La superficie regional abarca un área de 126.049,10 kilómetros cuadrados." , "Chile", 1);
INSERT INTO region VALUES(null,"Atacama", "se caracteriza por un clima semiárido y por la presencia de desiertos." , "Chile", 1);
INSERT INTO region VALUES(null,"Coquimbo", "Esta región se caracteriza por un clima donde predomina la escasez de precipitaciones.Tiene una superficie de 40.579 kilómetros cuadrados, equivalentes al 5,37% del territorio nacional." , "Chile", 1);
INSERT INTO region VALUES(null,"Valparaiso", "La Región de Valparaíso está formada por las Provincias de Isla de Pascua, Los Andes, Marga Marga, Petorca, Quillota, San Antonio, San Felipe de Aconcagua y Valparaíso." , "Chile", 1);
INSERT INTO region VALUES(null,"O'Higgins", "La Región del Libertador Bernardo O'Higgins forma parte de la macro zona central del país, se localiza aproximadamente entre los 34° y 35° de latitud sur, abarcando una superficie de 16 mil 387 kilómetros cuadrados, que constituyen el 2,2 por ciento del territorio nacional continental." , "Chile", 1);
INSERT INTO region VALUES(null, "Maule", "La Región del Maule se extiende entre los 34º41' y 36º33' de latitud Sur y desde los 70º20´ de longitud Oeste hasta el Océano Pacífico, cuenta con 30.469,1 km2 de superficie y una población de 908.097 hab.", "Chile", 1);
INSERT INTO region VALUES(null, "Bío Bío", "La Región del Biobío se localiza en el límite sur de la zona central específicamente entre los 36º26' y los 38º29' de latitud sur. Limita al norte con la Región de Ñuble, al sur con la Región de la Araucanía, al oeste con el Océano Pacífico y al este con la República Argentina.", "Chile", 1);
INSERT INTO region VALUES(null, "Araucanía", "La Región de la Araucanía se caracteriza por la presencia de dos hoyas hidrográficas, las del río Imperial y la del río Toltén. La capital regional es Temuco, una de las ciudades de mayor desarrollo en el país. Las principales actividades económicas se vinculan a la agricultura de cultivos tradicionales.", "Chile", 1);
INSERT INTO region VALUES(null, "Los Lagos", "La región está compuesta por las provincias de Chiloé, Llanquihue, Osorno y Palena y la capital regional es la ciudad de Puerto Montt. Su principal centro urbano es el Gran Puerto Montt con 290.480 habitantes, seguida de Osorno con 172.336 habitantes.", "Chile", 1);
INSERT INTO region VALUES(null, "Aysén", "La Región de Aysén (XI) se ubica entre los 43º38' por el norte y 49º16' por el sur, y desde los 71°06' oeste hasta las aguas territoriales del Océano Pacifico. Esta región tiene una superficie de 108.494,40 km2, representando un 14,3% de Chile continental e insular.", "Chile", 1);
INSERT INTO region VALUES(null, "Magallanes y Antártica Chilena", "La Región de Magallanes y de la Antártica Chilena,​​​ también denominada simplemente Región de Magallanes, es una de las dieciséis regiones en que se divide Chile. Se ubica en el extremo austral del continente sudamericano, en la parte sur de la Patagonia. Su capital y centro urbano con mayor población es Punta Arenas.", "Chile", 1);
INSERT INTO region VALUES(null,"Metropolitana", "La Región Metropolitana (RM) es la única región mediterránea y la segunda más pequeña del país." , "Chile", 1);
INSERT INTO region VALUES(null, "Los Ríos", "La región de Los Ríos se desarrolla entre los 39°16' y los 40°41' de latitud Sur, y desde 71°35' de longitud Oeste, hasta el Océano Pacífico. Comprende una superficie total de 18.429 kilómetros cuadrados, dividida administrativamente en dos grandes provincias; Valdivia y la provincia del Ranco.", "Chile", 1);
INSERT INTO region VALUES(null,"Arica-Parinacota", "Esta región se caracteriza por un clima donde predomina la escasez de precipitaciones." , "Chile", 1);
INSERT INTO region VALUES(null, "Ñuble", "La Región del Ñuble se localiza cercana al límite sur de la zona central, específicamente entre los 36º00' y los 37º12' de latitud sur. Limita al norte con la Región del Maule, al sur con la Región del Biobío, al oeste con el Océano Pacífico y al este con la República Argentina.", "Chile", 1);

/** communes of chile*/

INSERT INTO Commune VALUES (NULL, "Iquique", "es una ciudad-puerto y comuna ubicada en el norte grande de Chile, capital de la provincia homónima y de la Región de Tarapacá.",1,1),
(NULL, "Alto Hospicio", "Es una comuna chilena situada en la Provincia de Iquique, en la Región de Tarapacá, en el Norte Grande de Chile.",1,1),
(NULL, "Pozo Almonte", "Se dice que el origen del topónimo Pozo Almonte es colonial, aunque también existen ciertos mitos. Era un pueblo de parada por ciertas razones ya que junto a él se encontraban pueblos mineros aledaños.",1,1),
(NULL, "Camiña", "La comuna de Camiña se encuentra ubicada en la región de Tarapacá, en la precordillera también llamada «la sierra», a lo largo de la quebrada de Tana en la provincia del Tamarugal.",1,1);

INSERT INTO Commune VALUES (NULL, "Antofagasta", "Antofagasta, también conocida como La Perla del norte, es una ciudad, puerto y comuna del Norte Grande de Chile y es la capital de la provincia y de la región homónima.",2,1),
(NULL, "Mejillones", "Mejillones es una comuna y ciudad del Norte Grande de Chile, situada a 65 kilómetros al norte de la ciudad de Antofagasta, en la provincia y región del mismo nombre.",2,1),
(NULL, "Calama", "Se ubica en un área minera y es conocida como una vía de acceso al desierto de Atacama. Justo al norte, está la extensa mina de cobre a tajo abierto de Chuquicamata.",2,1),
(NULL, "Tocopilla", "Tocopilla se encuentra a 180 km al norte de la ciudad de  Antofagasta, situado en la Región de antofagasta y tiene 24.574 habitantes. se ubica en una estrecha plataforma rodeada por la cordillera de la Costa.",2,1);

INSERT INTO Commune VALUES (NULL, "Chañaral", "La comuna fue fundada el 26 de octubre de 1833 como Chañaral de las Animas. Está ubicada a 167 Km. de Copiapó en la, Provincia de Chañaral, Región de Atacama.",3,1),
(NULL, "Copiapó", "Es conocida por ser un oasis donde florece el desierto y además, por poseer en su valle la primera exportación de uvas del país, lo que aporta grandes beneficios a este.",3,1),
(NULL, "Caldera", "Es puerto minero, pesquero y agrícola, ubicado a 75 kilómetros de la ciudad de Copiapó (capital regional). Además Caldera está situada en una zona de interés turístico.",3,1),
(NULL, "Vallenar", "Es una ciudad y comuna del Norte Chico de Chile, capital de la Provincia de Huasco en la Región de Atacama, ubicada a 147 kilómetros (91 mi) de Copiapó, la capital regional. Se encuentra en el fondo del cajón del Río Huasco y tiene una población aproximada de 51 917 habitantes.",3,1);

INSERT INTO Commune VALUES (NULL, "Illapel", "Illapel es una comuna de la Provincia de Choapa y se emplaza en la ribera norte y valle del río Illapel, el principal tributario del río Choapa.",4,1),
(NULL, "Coquimbo", "Limita al oeste con el océano Pacífico, al norte con la comuna de La Serena, al este con la comuna de Andacollo, y al sur con la comuna de Ovalle. Forma parte de una conurbación con la vecina ciudad de La Serena.",4,1),
(NULL, "Andacollo", "Andacollo es una ciudad y comuna del Norte Chico de Chile ubicada en la provincia de Elqui, en la región de Coquimbo.",4,1),
(NULL, "Ovalle", "Se encuentra a 412 kilómetros al norte de Santiago y a 86 kilómetros de La Serena, la capital regional.",4,1);

INSERT INTO Commune VALUES (NULL, "Isla de Pascua", "Es la única comuna que pertenece a la provincia de Isla de Pascua y agrupa a Isla de Pascua y la Isla Salas y Gómez.",5,1),
(NULL, "Los Andes", "La comuna es capital de la provincia homónima y fue fundada como Santa Rosa de Los Andes el 31 de julio de 1791. Tiene una superficie de 1248,3 km² y una población de 66.708 habitantes",5,1),
(NULL, "Quilpué", "La Comuna de Quilpué tiene una poblacion aproximada de 150 mil habitantes, y es capital de la provincia de Marga-Marga. Con 536,90 km², la comuna de Quilpué es la suma de las unidades territoriales de Quilpué y El Belloto.",5,1),
(NULL, "La Ligua", "La Ligua es una comuna y ciudad ubicada en la Región de Valparaíso, en la zona central de Chile, capital de la provincia de Petorca. Se ubica 154 km al norte de Santiago, capital del país, y 110 km al norte de Valparaíso, capital regional.",5,1);

INSERT INTO Commune VALUES (NULL, "", "",6,1),
(NULL, "", "",6,1),
(NULL, "", "",6,1),
(NULL, "", "",6,1);

INSERT INTO Commune VALUES (NULL, "", "",7,1),
(NULL, "", "",7,1),
(NULL, "", "",7,1),
(NULL, "", "",7,1);

INSERT INTO Commune VALUES (NULL, "", "",8,1),
(NULL, "", "",8,1),
(NULL, "", "",8,1),
(NULL, "", "",8,1);

INSERT INTO Commune VALUES (NULL, "", "",9,1),
(NULL, "", "",9,1),
(NULL, "", "",9,1),
(NULL, "", "",9,1);

INSERT INTO Commune VALUES (NULL, "", "",10,1),
(NULL, "", "",10,1),
(NULL, "", "",10,1),
(NULL, "", "",10,1);

INSERT INTO Commune VALUES (NULL, "", "",11,1),
(NULL, "", "",11,1),
(NULL, "", "",11,1),
(NULL, "", "",11,1);

INSERT INTO Commune VALUES (NULL, "", "",12,1),
(NULL, "", "",12,1),
(NULL, "", "",12,1),
(NULL, "", "",12,1);

INSERT INTO Commune VALUES (NULL, "", "",13,1),
(NULL, "", "",13,1),
(NULL, "", "",13,1),
(NULL, "", "",13,1);

INSERT INTO Commune VALUES (NULL, "", "",14,1),
(NULL, "", "",14,1),
(NULL, "", "",14,1),
(NULL, "", "",14,1);

INSERT INTO Commune VALUES (NULL, "Arica", "Ubicada en la frontera septentrional de Chile, a solo 18 kilómetros (11 millas) al sur de la frontera con Perú", 15,1),
(NULL, "Camarones", "Su municipalidad tiene asiento en el caserío de Cuya, en la ribera sur del río Camarones.", 15,1),
(NULL, "Putre", "Capital de la Provincia de Parinacota, en la Región de Arica y Parinacota, en el Norte Grande de Chile.", 15,1),
(NULL, "General Lagos", "Perteneciente al Norte Grande de Chile. Administrativamente, forma parte de la Provincia de Parinacota.", 15,1);

INSERT INTO Commune VALUES (NULL, "", "",16,1),
(NULL, "", "",16,1),
(NULL, "", "",16,1),
(NULL, "", "",16,1);