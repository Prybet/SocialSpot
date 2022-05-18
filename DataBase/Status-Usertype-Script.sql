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

/** Categories **/

INSERT INTO category VALUES (null, "Skateboarding", "El skateboarding es un deporte que se basa en la propulsión con un skate –elemento compuesto por una tabla de madera, ejes, rodamientos y ruedas- a la vez que se realizan distintos trucos o maniobras", "Skate-ProfilePic.jpg", "Skate-BannerPic.jpg",1);
INSERT INTO category VALUES (null, "Ciclismo", "El ciclismo es un deporte en el que se utiliza una bicicleta​ para recorrer circuitos al aire libre o en pista cubierta y que engloba diferentes especialidades.", "Ciclism-ProfilePic.jpg", "Ciclism-BannerPic.jpg",1);
INSERT INTO category VALUES (null, "Mountain Bike", "La bicicleta de montaña es un tipo de bicicleta diseñada para viajes por la montaña o el campo. Se caracteriza por componentes más resistentes a los impactos del terreno ", "Mountainbike-ProfilePic.jpg", "Mountainbike-BannerPic.jpg");
INSERT INTO category VALUES (null, "Downhill Longboard", "El downhill es la modalidad más peligrosa de longboard. Consiste en bajar una cuesta, normalmente una carretera de curvas, a toda velocidad con tu tabla de longboard", "Downhill-ProfilePic.jpg", "Downhill-BannerPic.jpg");
INSERT INTO category VALUES (null, "Inline Downhill", "Esta categoría es una  prueba de patinaje en descenso, se caracteriza por patines de velocidad, bajando en línea recta a toda velocidad", "Inlinedownhill-ProfilePic.jpg", "Inlinedownhill-BannerPic.jpg");
INSERT INTO category VALUES (null, "Bmx", "La categoría se hace a travez de una bicicleta ligera, que permite sostenerlas en el aire, haciendo diferentes trucos o freestyle", "BMX-ProfilePic.jpg", "BMX-BannerPic.jpg");
INSERT INTO category VALUES (null, "Scooter", "Scooter tambien llamado monopatín, consiste en una plataforma alargada sobre dos ruedas en línea y una barra de dirección, con la que se deslizan los patinadores tras impulsarse con un pie contra el suelo", "Scooter-ProfilePic.jpg", "Scooter-BannerPic.jpg"); 
INSERT INTO category VALUES (null, "Cruiser", "Estás suelen ser de ruedas anchas y más suaves, permitiendo ser más practica, ágiles, rápidas y de gran agarre", "Cruise-ProfilePic.jpg", "Cruise-BannerPic.jpg");
INSERT INTO category VALUES (null, "Longboard"," Se utilizan comúnmente para bajar cuestas, en carreras que se llevan a cabo en todo el mundo. La forma de la tabla es larga, tiene ruedas anchas y largas", "Longboard-ProfilePic.jpg", "Longboard-BannerPic.jpg");
INSERT INTO category VALUES (null, "Patines", "Son unos paratos deportivos o de entretenimiento que  consiste en una plataforma ajustable a la suela del calzado o una bota con esta plataforma adherida, permitiendo hacer trucos en el aire", "Patines-ProfilePic.jpg", "Patines-BannerPic.jpg");
INSERT INTO category VALUES (null, "Bike Thriathlon", "Estas son similares a una bicicleta de carretera, pero en ella se busca una posición muy aerodinámica, la cual gana potencia o velocidad, reduciendo el esfuerzo.", "Thriathlon-ProfilePic.jpg", "Thriathlon-BannerPic.jpg");
INSERT INTO category VALUES (null, "Cross Country", "Esta categoría son especialidad más común del ciclismo de montaña, aunque menos difundido que el descenso de montaña ya que es más difícil de televisar. Es la modalidad más extendida y popular.", "Crosscountry-ProfilePic.jpg", "Crosscountry-BannerPic.jpg");


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

/** Provinces of chile*/

INSERT INTO province VALUES (NULL, "Iquique", "limita al norte y al este con la provincia del Tamarugal; al sur con la provincia de Tocopilla (región de Antofagasta); y al oeste con el océano Pacífico. La provincia de Iquique está integrada por las comunas de Iquique y Alto Hospicio.",1,1),
(NULL, "Tamarugal", "El origen de esta provincia de Chile se encuentra en la Ley N°20175, que también crea la región de Arica y Parinacota, mediante la división de la antigua I Región de Tarapacá en 2 provincias, provincia de Iquique y Provincia del Tamarugal.",1,1);

INSERT INTO province VALUES (NULL, "Antofagasta", "Tiene una superficie de 65 987 km², posee una población de 318 779 habitantes y su capital provincial es el puerto de Antofagasta.",2,1),
(NULL, "El Loa", "Tiene una superficie de 42 934,1 km² y posee una población de 177 048 habitantes. Su capital es la ciudad de Calama. De ella se extrae el cobre, uno de los minerales más importantes del país.",2,1),
(NULL, "Tocopilla", "Tiene una superficie de 16.385,2 km² y posee una población de 29.684 habitantes. Su capital provincial es la ciudad de Tocopilla.",2,1);

INSERT INTO province VALUES (NULL, "Chañaral", "Cuenta con una superficie de 24.436,2 km² y posee una población de 30.598 habitantes. Su capital provincial es la ciudad de Chañaral.",3,1),
(NULL, "Copiapó", "Cuenta con una superficie de 32.538,5 km² y posee una población de 188.323 habitantes. Su capital provincial es la ciudad de Copiapó.",3,1),
(NULL, "Huasco", "Cuenta con una superficie de 19.066 km² y posee una población de 73.133 habitantes. Su capital provincial es la ciudad de Vallenar.",3,1);

INSERT INTO province VALUES (NULL, "Choapa", "La provincia de Choapa es la más austral de las tres que conforman a la región de Coquimbo en Chile. La capital provincial es la ciudad de Illapel.",4,1),
(NULL, "Elqui", "La capital provincial es la ciudad de Coquimbo. Debe su nombre al principal río de la provincia: el río Elqui.",4,1),
(NULL, "Limarí", "La capital provincial es la ciudad de Ovalle. Está nombrada por el principal río de la provincia: el río Limarí.",4,1);

INSERT INTO province VALUES (NULL, "Isla de Pascua", "tiene una superficie de 163,6 km² y posee una población de 5761 habitantes. Su capital es Hanga Roa.",5,1),
(NULL, "Los Andes", "Está ubicada en el sector este de la Región de Valparaíso y cuenta con una superficie de 3054 km². Posee una población de 110.602 habitantes y su capital provincial es la ciudad de Los Andes",5,1),
(NULL, "Marga Marga", "La Provincia de Marga-Marga está conformada por las comunas de Quilpué, Villa Alemana, Limache y Olmué, con una superficie total de 1179,4 km² y una población de 330.814 habitantes (preliminar Censo 2012). Los límites comunales no fueron alterados.",5,1),
(NULL, "Petorca", "Posee una superficie de 4588,9 km² y posee una población de 78 299 habitantes. Su capital provincial es la ciudad de La Ligua.",5,1);

INSERT INTO province VALUES (NULL, "Cachapoal", "Se encuentra ubicada al sur de la Región Metropolitana de Santiago y su superficie es de 7516,7 km². Cuenta con una población de cerca de 646 133 habitantes, que se concentran en su capital, Rancagua, y en otras ciudades como Rengo, San Vicente y Graneros.",6,1),
(NULL, "Cardenal Caro", "Es la única provincia de la Región del Libertador General Bernardo O'Higgins que tiene salida al mar. Tiene una población de 41.160 habitantes y una superficie de 3.295,07 km². Su capital es Pichilemu, principal ciudad turística y balneario de la región en los meses de verano.",6,1),
(NULL, "Colchagua", "Su capital provincial es la ciudad de San Fernando. Tiene una superficie de 5.678,0 km², y una población de 222 556 habitantes, según el censo de 2017. El 81.6% de la población es rural y su gentilicio es colchagüino/a.",6,1);

INSERT INTO province VALUES (NULL, "Cauquenes", "Es una provincia eminentemente agraria y, como tal, posee una alta proporción de población rural. Su Capital es la ciudad de Cauquenes.",7,1),
(NULL, "Curicó", "Tiene una superficie de 7486,7 km², y posee una población de 288 880 habitantes.​ Su capital provincial es la ciudad de Curicó.",7,1),
(NULL, "Linares", "La Provincia de Linares es una provincia chilena localizada en la Región del Maule, en la zona central de Chile, cuya capital y centro más poblado es la ciudad de Linares.",7,1),
(NULL, "Talca", "Talca es una provincia chilena, en la zona central del país y parte de la Región del Maule. Su Capital es la Ciudad de Talca.",7,1);

INSERT INTO province VALUES (NULL, "Arauco", "Limita al norte con la provincia de Concepción, al oriente con la de Biobío y la de Malleco, al sur con la provincia de Cautín y al oeste con el océano Pacífico.",8,1),
(NULL, "Biobío", "Su capital es la ciudad de Los Ángeles. Tiene una población de 394 802 habitantes según el censo de 2017 y una superficie de 14 987,9 km².",8,1),
(NULL, "Concepción", "De acuerdo al censo chileno de 2017, su población es de 1 105 658 habitantes,1​ lo que la convierte en la segunda provincia más poblada del país, después de la provincia de Santiago. Posee una superficie de 3439 km² y su capital es la comuna de Concepción.",8,1);

INSERT INTO province VALUES (NULL, "Cautín", "Su población es de 668 560 habitantes. Las ciudades más importantes son Temuco, Villarrica, Lautaro y Nueva Imperial. Dentro de sus economías principales se puede encontrar la forestal, agrícola y ganadera. Su clima es húmedo, lluvioso en invierno y generalmente cálido en verano.",9,1),
(NULL, "Malleco", "Es una provincia de la República de Chile situada entre los 37º33'S y los 38º55'S, al norte de la Provincia de Cautín, conformando ambas la Región de la Araucanía. La población estimada al 30 de junio de 2005 es de 223 184 habitantes",9,1);

INSERT INTO province VALUES (NULL, "Chiloé", "está compuesto por la isla Grande de Chiloé y una serie de otras más pequeñas, con una extensión de 9181 km². Está situada en la Región de Los Lagos y su capital es la ciudad de Castro",10,1),
(NULL, "Llanquihue", "La provincia de Llanquihue se ubica en el centro de la Región de Los Lagos, tiene una superficie de 14 876,4 km² y posee una población de 321 493 habitantes.",10,1),
(NULL, "Osorno", "Tiene una superficie de 9223,7 km², y posee una población, al año 2017, de 234 122 habitantes",10,1),
(NULL, "Palena", "Tiene una superficie de 15 301,9 km² y posee una población de 18 349 habitantes según el censo de 2017.",10,1);

INSERT INTO province VALUES (NULL, "Aysén", "Las cumbres de las montañas incluyen el cerro Castillo, de 2,675 m de altura y terreno serrado, ubicado dentro de una reserva natural del mismo nombre.",11,1),
(NULL, "Capitán Prat", "Su capital es Cochrane. Tiene una superficie de 37 247,2 km² y una población de 3837 habitantes.",11,1),
(NULL, "Coyhaique", "Perteneciente a la Región de Aysén del General Carlos Ibáñez del Campo, y que limita al norte con la provincia de Palena; al sur con la provincia General Carrera; al este con Argentina; y al oeste con la provincia de Aysén.",11,1),
(NULL, "General Carrera", "Cuenta con una superficie de 12406,5 km² y una población de 6921 habitantes. Su capital es Chile Chico.",11,1);

INSERT INTO province VALUES (NULL, "Antártica Chilena", "Tiene una superficie de 14 146 km² y posee una población de 2262 habitantes. Su capital provincial es la ciudad de Puerto Williams.",12,1),
(NULL, "Magallanes", "tiene una superficie de 36 994,7 km² y posee una población de 131 592 habitantes. Su capital provincial es la ciudad de Punta Arenas.",12,1),
(NULL, "Tierra del Fuego", "Tiene una superficie de 22 593 km² y posee una población de 8364 habitantes. Su capital provincial es la ciudad de Porvenir.",12,1),
(NULL, "Última Esperanza", "Su capital es Puerto Natales. Su superficie es de 55 443,9 km² y cuenta con una población de 19 855 habitantes.",12,1);

INSERT INTO province VALUES (NULL, "Chacabuco", "Tiene una superficie de 5.615,2 km² y posee una población según el Censo 2017​ de 267 553 habitantes.",13,1),
(NULL, "Cordillera ", "Ocupa una pequeña área de la depresión intermedia, rellena de sedimentos glaciares, fluviales y volcánicos, y de la cordillera de los Andes hasta la frontera internacional con Argentina. Su capital es la comuna de Puente Alto.",13,1),
(NULL, "Maipo", "Su superficie es de 1120,5 km² y posee una población de 496 078 habitantes. La capital provincial es la ciudad de San Bernardo, la cual forma parte del denominado Gran Santiago.",13,1),
(NULL, "Melipilla", "Tiene una superficie de 4065,7 km² y según censo 2017 posee una población de 185 966 habitantes, para 2020 se proyectan 212.326 habitantes.​ Su capital provincial es la ciudad de Melipilla.",13,1);

INSERT INTO province VALUES (NULL, "Ranco", "Tiene una superficie de 8232,3 km² y una población de 97 153 habitantes, según los datos del Censo de 2002. Su capital es la ciudad de La Unión.",14,1),
(NULL, "Valdivia", "Tiene una superficie de 10 197,2 km², y posee una población de 259 243 habitantes. Su capital provincial es la ciudad de Valdivia.",14,1);

INSERT INTO province VALUES (NULL, "Arica", "Limita al norte con la provincia de Tacna en el Perú; al sur con la provincia del Tamarugal, en la región de Tarapacá; al este con la provincia de Parinacota; y al oeste con el océano Pacífico. Su capital es la ciudad de Arica.", 15,1),
(NULL, "Parinacota", "Limita al norte con la provincia de Tacna perteneciente al departamento de Tacna, en el Perú; al sur con la provincia del Tamarugal en la región de Tarapacá; al este con los departamentos de La Paz y Oruro, en Bolivia; y al oeste con la provincia de Arica.", 15,1);

INSERT INTO province VALUES (NULL, "Diguillín", "Tiene una superficie de 5229,5 km². Su capital es la ciudad de Bulnes",16,1),
(NULL, "Itata", "Su actual territorio tiene una superficie 2746,5 km², su capital provincial es Quirihue.",16,1),
(NULL, "Punilla", "Tiene una superficie de 5202,5 km². Su capital es la ciudad de San Carlos",16,1);


/**City**/

INSERT INTO city VALUES (NULL, "Iquique", "es una ciudad-puerto y comuna ubicada en el norte grande de Chile, capital de la provincia homónima y de la Región de Tarapacá.",1,1),
(NULL, "Alto Hospicio", "Es una comuna chilena situada en la Provincia de Iquique, en la Región de Tarapacá, en el Norte Grande de Chile.",1,1),
(NULL, "Pozo Almonte", "Se dice que el origen del topónimo Pozo Almonte es colonial, aunque también existen ciertos mitos. Era un pueblo de parada por ciertas razones ya que junto a él se encontraban pueblos mineros aledaños.",2,1),
(NULL, "Camiña", "La comuna de Camiña se encuentra ubicada en la región de Tarapacá, en la precordillera también llamada «la sierra», a lo largo de la quebrada de Tana en la provincia del Tamarugal.",2,1);

INSERT INTO city VALUES (NULL, "Antofagasta", "Antofagasta, también conocida como La Perla del norte, es una ciudad, puerto y comuna del Norte Grande de Chile y es la capital de la provincia y de la región homónima.",3,1),
(NULL, "Mejillones", "Mejillones es una comuna y ciudad del Norte Grande de Chile, situada a 65 kilómetros al norte de la ciudad de Antofagasta, en la provincia y región del mismo nombre.",3,1),
(NULL, "Calama", "Se ubica en un área minera y es conocida como una vía de acceso al desierto de Atacama. Justo al norte, está la extensa mina de cobre a tajo abierto de Chuquicamata.",4,1),
(NULL, "Tocopilla", "Tocopilla se encuentra a 180 km al norte de la ciudad de  Antofagasta, situado en la Región de antofagasta y tiene 24.574 habitantes. se ubica en una estrecha plataforma rodeada por la cordillera de la Costa.",5,1);

INSERT INTO city VALUES (NULL, "Chañaral", "La comuna fue fundada el 26 de octubre de 1833 como Chañaral de las Animas. Está ubicada a 167 Km. de Copiapó en la, Provincia de Chañaral, Región de Atacama.",6,1),
(NULL, "Copiapó", "Es conocida por ser un oasis donde florece el desierto y además, por poseer en su valle la primera exportación de uvas del país, lo que aporta grandes beneficios a este.",7,1),
(NULL, "Caldera", "Es puerto minero, pesquero y agrícola, ubicado a 75 kilómetros de la ciudad de Copiapó (capital regional). Además Caldera está situada en una zona de interés turístico.",7,1),
(NULL, "Vallenar", "Es una ciudad y comuna del Norte Chico de Chile, capital de la Provincia de Huasco en la Región de Atacama, ubicada a 147 kilómetros (91 mi) de Copiapó, la capital regional. Se encuentra en el fondo del cajón del Río Huasco y tiene una población aproximada de 51 917 habitantes.",8,1);

INSERT INTO city VALUES (NULL, "Illapel", "Illapel es una comuna de la Provincia de Choapa y se emplaza en la ribera norte y valle del río Illapel, el principal tributario del río Choapa.",9,1),
(NULL, "Coquimbo", "Limita al oeste con el océano Pacífico, al norte con la comuna de La Serena, al este con la comuna de Andacollo, y al sur con la comuna de Ovalle. Forma parte de una conurbación con la vecina ciudad de La Serena.",10,1),
(NULL, "Andacollo", "Andacollo es una ciudad y comuna del Norte Chico de Chile ubicada en la provincia de Elqui, en la región de Coquimbo.",10,1),
(NULL, "Ovalle", "Se encuentra a 412 kilómetros al norte de Santiago y a 86 kilómetros de La Serena, la capital regional.",11,1);

INSERT INTO city VALUES (NULL, "Isla de Pascua", "Es la única comuna que pertenece a la provincia de Isla de Pascua y agrupa a Isla de Pascua y la Isla Salas y Gómez.",12,1),
(NULL, "Los Andes", "La comuna es capital de la provincia homónima y fue fundada como Santa Rosa de Los Andes el 31 de julio de 1791. Tiene una superficie de 1248,3 km² y una población de 66.708 habitantes",13,1),
(NULL, "Quilpué", "La Comuna de Quilpué tiene una poblacion aproximada de 150 mil habitantes, y es capital de la provincia de Marga-Marga. Con 536,90 km², la comuna de Quilpué es la suma de las unidades territoriales de Quilpué y El Belloto.",14,1),
(NULL, "La Ligua", "La Ligua es una comuna y ciudad ubicada en la Región de Valparaíso, en la zona central de Chile, capital de la provincia de Petorca. Se ubica 154 km al norte de Santiago, capital del país, y 110 km al norte de Valparaíso, capital regional.",15,1);

INSERT INTO city VALUES (NULL, "Rancagua", "Debido a la gran expansión de la ciudad durante los últimos años, ha llegado a formar junto a Machalí y Gultro la llamada Conurbación Rancagua, que es la octava aglomeración urbana más poblada del país.",16,1),
(NULL, "La Estrella", "La comuna de La Estrella abarca una superficie de 435 km² y una población de 3.041 habitantes (Censo INE Año 2017), correspondientes a un 0,54 % de la población total de la región y una densidad de 9,70 hab/km². Del total de la población, 1.537 son mujeres y 3.007 son hombres. Un 51,09 % corresponde a población rural y un 48,91 % a población urbana.",17,1),
(NULL, "Pichilemu", "La playa de Pichilemu es una zona de práctica de surf, específicamente el sector de Punta de Lobos, donde por sus break points se han desarrollado campeonatos con participación y relevancia internacional que han provocado que Pichilemu sea conocida como la capital chilena del surf.",17,1),
(NULL, "San Fernando", "Es capital de la actual provincia de Colchagua. Entre 1826 y 1976 fue capital de la Provincia de Colchagua y del departamento de San Fernando.",18,1);

INSERT INTO city VALUES (NULL, "Cauquenes", "Se ubica a 355 kilómetros (221 mi) de Santiago y limita al norte con las comunas de Empedrado y San Javier al sur con Cobquecura, Quirihue, Ninhue y San Carlos, al oeste con Chanco y Pelluhue, y al este con Parral y Retiro.",18,1),
(NULL, "Curicó", "El área de la ciudad de Curicó alcanza a 1.000 km². Son productos característicos de la ciudad las tortas, frutas, cemento, azúcar, salsa de tomates y vinos de exportación de calidad internacional. Es uno de los centros de servicios más importantes de la zona central y está considerada como la capital agroindustrial de Chile debido a su constante crecimiento económico.",19,1),
(NULL, "Linares", "La ciudad de Linares recibe su nombre de don Francisco Espinoza Muñoz de la Mata Linares, quien se desempeñaba como Intendente de Concepción al momento de fundarse la villa.",20,1),
(NULL, "Talca", "Se encuentra 255 kilómetros al sur de la capital Santiago. La ciudad es el corazón de la zona agrícola chilena por excelencia.",21,1);

INSERT INTO city VALUES (NULL, "Arauco", "Es una ciudad y comuna de la zona sur de Chile, ubicada en la provincia homónima en la región del Biobío, a 70 km al sur de Concepción. Su geografía se caracteriza por emplazarse sobre la cuenca del río Carampangue hasta su desembocadura con el océano Pacífico, al costado norponiente de la cordillera de Nahuelbuta.",22,1),
(NULL, "Los Ángeles", "Los Ángeles es una comuna y ciudad de la zona central de Chile, capital de la provincia de Biobío, en la región homónima. Se encuentra ubicada a 510 kilómetros de Santiago, la capital del país, y a 127 kilómetros de Concepción, la capital regional.",23,1),
(NULL, "Concepción", "El núcleo urbano de Concepción ejerce un significativo impacto en el comercio nacional al ser parte de la región con más industrialización del país.",24,1),
(NULL, "Chiguayante", "Su nombre proviene de la toponimia del lugar, conocida por los mapuches como Chiwayantü, palabra en lengua mapuche o mapudungun compuesta de las palabras chiway y antü, cuyo significado es sol entre neblina.",24,1);

INSERT INTO city VALUES (NULL, "Temuco", "La comuna de Temuco cuenta, según el censo de 2017, con una población de 282 415 habitantes, la cual forma junto a Padre Las Casas la conurbación llamada Gran Temuco, conformada en total por 358 541 habitantes, siendo el área metropolitana más poblada del sur del país.",25,1),
(NULL, "Villarrica", "Fundada en el año 1552, por el Adelantado Gerónimo de Alderete, esta localidad no ha mantenido una continuidad histórica, debido a que ha sido destruida en varias oportunidades por los conflictos territoriales entre el Estado y el Pueblo Mapuche , fue refundada en dos ocasiones , siendo la última el año 1883 y la definitiva.",25,1),
(NULL, "Angol", "Se ubica 569 kilómetros al sur de Santiago, capital del país, 148 kilómetros al sureste de Concepción, capital de la Región del Biobío, y 142 kilómetros al norte de Temuco, capital de la Región de La Araucanía.",26,1),
(NULL, "Purén", "Purén es una ciudad y comuna de la zona sur de Chile ubicada al noroeste de la Provincia de Malleco, en la Región de la Araucanía.",26,1);

INSERT INTO city VALUES (NULL,"Castro","La superficie comunal es de 473 km² y la población total, según el censo de 2017, es de 43 807 habitantes, de los cuales el 77,7 % vive en la ciudad de Castro.",27,1),
(NULL,"Puerto Montt","Capital de la provincia de Llanquihue y de la Región de Los Lagos. Se encuentra en frente al seno de Reloncaví y posee una población urbana y rural de 245 902 habitantes.",28,1),
(NULL,"Osorno","Tiene una superficie de 951,3 km² y, según el censo del año 2017, una población de 161 460 habitantes; siendo la decimosexta ciudad más poblada del país, y la segunda ciudad más importante de la Región de Los Lagos, tras la capital regional de Puerto Montt.",29,1),
(NULL,"Chaitén","Tiene una superficie de 8470,5 km², lo que la convierte en la comuna más grande de la región, de similar tamaño a la Isla Grande de Chiloé. Su población, al año 2017, es de 5071 habitantes.",30,1);

INSERT INTO city VALUES (NULL,"Aysén","Se ubica a orillas del río Aysén, 3 km al interior del fiordo de Aysén. Solo en la ciudad tiene una población estimada de 27 000 habitantes en 2017, transformándola en la segunda ciudad de importancia en la región después de la Capital Regional: Coyhaique.",31,1),
(NULL,"Cochrane","Tiene una superficie aproximada de 8500 km² y una población estimada de 3.490 habitantes (1.588 mujeres y 1.902 varones), la cual representa el 3% de la población regional.",32,1),
(NULL,"Coyhaique","Se ubica al oriente de la cordillera de los Andes, en la Patagonia chilena, a una altura media de 310 m s. n. m., en el lugar donde confluyen los ríos Simpson y Coyhaique.",33,1),
(NULL,"Chile Chico","es una ciudad y comuna de la zona austral de Chile ubicada en la Provincia General Carrera, Región de Aysén del General Carlos Ibáñez del Campo, Chile. La localidad de Chile Chico, que tiene 4865 habitantes (2017), es la capital de la comuna homónima y de la Provincia General Carrera.",34,1);

INSERT INTO city VALUES (NULL,"Cabo de Hornos","creada en 1927, denominada Navarino hasta el año 2001. Pertenece a la provincia Antártica Chilena, la que a su vez forma parte de la Región de Magallanes y de la Antártica Chilena. La comuna debe su nombre al punto geográfico situado dentro de su jurisdicción, denominado de igual forma cabo de Hornos.",35,1),
(NULL,"Punta Arenas","Es una comuna, ciudad y puerto interoceánico de la Zona Austral de Chile. Es la capital de la Provincia de Magallanes, de la Región de Magallanes y de la Antártica Chilena y, en forma no oficial, de la llamada Patagonia chilena.",36,1),
(NULL,"Porvenir","Es una ciudad y comuna de la zona austral de Chile, situada en la Provincia de Tierra del Fuego, una de las provincias que componen la Región de Magallanes y de la Antártica Chilena. La ciudad de Porvenir es la capital de la provincia chilena de Tierra del Fuego, y es la ciudad más habitada de la porción chilena de la Isla Grande de Tierra del Fuego.",37,1),
(NULL,"Puerto Natales"," Es una ciudad y puerto chileno situado en el extremo austral del país, a orillas del Canal Señoret, entre el Golfo Almirante Montt y el Seno Última Esperanza, en la Región de Magallanes y de la Antártica Chilena. Es la capital de la comuna de Natales y de la provincia de Última Esperanza.",38,1);

INSERT INTO city VALUES (NULL,"Colina ","Es una comuna y ciudad chilena ubicada al norte de la Región Metropolitana de Santiago, en la zona central de Chile. Es la capital de la Provincia de Chacabuco. Dentro de la comuna se encuentran localidades como la ciudad de Colina (capital comunal), Chicureo, Las Canteras y Esmeralda.",39,1),
(NULL,"Puente Alto","Es una comuna y ciudad de Chile, capital de la provincia de Cordillera, perteneciente a la región Metropolitana de Santiago. Además, forma parte de la conurbación urbana del Gran Santiago, ubicándose en el sector suroriente del área urbana.",40,1),
(NULL,"San Bernardo","Es una comuna y ciudad chilena, ubicada en la zona sur de la conurbación de Santiago. Administrativamente, es capital de la Provincia de Maipo, en la Región Metropolitana de Santiago.",41,1),
(NULL,"Melipilla"," Es una comuna y ciudad capital de la provincia de Melipilla. Forma parte de la Región Metropolitana de Santiago siendo una importante ciudad satélite de la capital nacional chilena, está situada al suroeste de Santiago de Chile y de la Cordillera de la Costa.",42,1);

INSERT INTO city VALUES (NULL,"La Unión","es una pequeña ciudad de 26 000 habitantes que es parte de la Comuna de La Unión y Capital de la Provincia del Ranco en el territorio sur de la Región de Los Ríos. Está ubicada a 40 km al norte de Osorno y a 80 km al sureste de su Capital Regional —Valdivia.",43,1),
(NULL,"Río Bueno","Es una comuna chilena de la provincia del Ranco, en la Región de Los Ríos, en la zona sur de Chile. Integra junto con las comunas de Futrono, Lago Ranco, Los Lagos, Paillaco, Panguipulli y La Unión.",43,1),
(NULL,"Valdivia","Es una comuna y ciudad de la zona sur de Chile, capital de la provincia homónima y de la Región de Los Ríos. Se encuentra a 847,6 km al sur de Santiago, la capital de Chile. Está emplazada en la confluencia de los ríos Calle-Calle, Cau-cau y el río Cruces, y se encuentra a 15 km de la bahía de Corral. Según el censo nacional realizado en 2017 por el Instituto Nacional de Estadísticas de Chile, Valdivia tiene una población de 166 080 habitantes.",44,1),
(NULL,"Corral ","es una comuna y ciudad de la zona sur de Chile, ubicada en la Región de los Ríos. Su capital, la ciudad y puerto del mismo nombre se ubica entre la bahía de Corral y la desembocadura del río Valdivia, a 15 km de Valdivia, capital regional, comuna de la cual se separó por ley de municipios del 22 de diciembre de 1891.[cita requerida] Es el puerto más antiguo del sur de Chile y el más importante del periodo colonial del país.",44,1);

INSERT INTO city VALUES (NULL,"Arica","es una ciudad, comuna y puerto del Norte Grande de Chile, capital de la provincia homónima y de la región de Arica y Parinacota, ubicada en la frontera septentrional de Chile, a solo 18 kilómetros (11 millas) al sur de la frontera con Perú. Se encuentra en el recodo de la costa occidental de América del Sur conocida como la Curva de Arica, la cual se considera un punto de inflexión del Cono Sur, siendo Arica un punto clave de este último.",45,1),
(NULL,"Camarones","Es una comuna perteneciente a la Provincia de Arica, en la Región de Arica y Parinacota, en el Norte Grande de Chile. Su municipalidad tiene asiento en el caserío de Cuya, en la ribera sur del río Camarones.",45,1),
(NULL,"Putre","Está ubicada a 145 km de Arica, en el altiplano andino, siendo una de las localidades más altas de Chile. Tiene una superficie de 5902,5 km² y una población total de 2765 habitantes.",46,1),
(NULL,"General Lagos","Ubicada en el extremo norte del altiplano chileno, es la comuna más septentrional y la octava menos poblada del país, con una población de 684 habitantes. Su municipalidad tiene asiento en Visviri. Su nombre indígena es Takura.",46,1);

INSERT INTO city VALUES (NULL,"Bulnes","Es una comuna ubicada en la provincia de Diguillín, perteneciente a la Región de Ñuble, en la zona central de Chile. Su capital, al igual que de la provincia, es la ciudad de Bulnes. Se ubica a 25 km de Chillán, capital regional. Limita al norte con la comuna de Chillán Viejo, al sur con la comuna de Pemuco, al este con San Ignacio y al oeste con Quillón.",47,1),
(NULL,"Chillán","Es una comuna de la zona central de Chile, capital de la Región de Ñuble, ubicada a 403 Km al sur de Santiago. Su área urbana, en conjunto a la de la comuna de Chillán Viejo, conforman la Conurbación Chillán.",47,1),
(NULL,"Quirihue","Es una ciudad y comuna, capital de la provincia de Itata, Región de Ñuble, en la zona central de Chile. Está situada a unos 72 kilómetros al noroeste de Chillán, a 82 kilómetros al norte de Concepción y a 398 kilómetros al sur de Santiago. Limita al norte con Cauquenes, al oeste con Cobquecura, al sur con Trehuaco y al este con Ninhue.",48,1),
(NULL,"San Carlos","Es una ciudad y comuna, capital de la provincia de Punilla, Región de Ñuble en Chile. Según el censo de 2017, la comuna de San Carlos posee una población total de 53 024 habitantes. lo que corresponde tanto al área urbana de la ciudad, como a los sectores rurales y semirurales de la misma.",49,1);