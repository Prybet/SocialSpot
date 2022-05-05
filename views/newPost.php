<!DOCTYPE html>
<?php
session_start();
$style = "grupe5Style.css";
?>
<html>
    <?php include '../header.php'; ?>
<body>
<main class="container no-margin">
        <form class="post">
            <div>
                <label>Crear nuevo Post</label>
            </div>
            <select>
                <option>Elige categoria/deporte</option>
                <option>tu cachai que va aca po</option>
                <option>Esto es un option uwu</option>
            </select>
            <div>
                <input type="text" placeholder="titilo">
            </div>
            <textarea placeholder="texto(opcional)">Texto</textarea>
            <div>
                <label>Hashtags separado por coma","</label>
                <div>
                    <select>
                        <option>Difultad</option>
                    </select>
                    <select>
                        <option>Spots</option>
                    </select>
                </div>
            </div>
            <label>Imagenes y Videos</label>
            <div>
                <input type="file"/>
            </div>
            <div>
                <input type="checkbox"><label>Recibir notificaciones de comentarios y respuestas</label>
            </div>
            <div>
                <button type="submit">Calcelar</button>
                <button type="submit">Publicar</button>
            </div> 
        </form>
        <div>
            <div class="descrip">
                <div>
                    <img src=""/> 
                    <label>X---imagen ---x</label>
                    <label>/Name</label>
                </div>
                <div>
                    <label>Cateforia/Sport Descripcion</label>
                    <p>ads fs dafd sds dfdsasd ssdf f sdds dsfdsda sfsda sa dssd sfsfs fsfdsasdfd</p>
                </div>
                <div class="b">
                    <div>
                        <div>
                            <label>1.3K</label>
                            <div></div>
                            <label>mientras</label>
                        </div>
                        <div>
                            <label>93</label>
                            <div></div>
                            <label>En linea</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="c">
                <div>
                    <h2>Reglas de /Name</h2>
                </div>
                <label>1. Rule 1</label>
                <div></div>
                <label>2. Rule 2</label>
                <div></div>
                <label>3. Rule 3</label>
                <div></div>
                <label>4. Rule 4</label>
            </div>
            <div class="d">
                <div>
                    <label>Ayuda</label>
                    <a href="#">Acerca De</a>
                </div>
                <div>
                    <label>Comunidades</label>
                    <a href="#">Empleo</a>
                </div>
                <div class="o">
                    <label>Temas</label>
                    <div>                        
                        <div><a href="#">Blog</a></div>                        
                        <div><a href="#">Anunciarse</a></div>                        
                        <div><a href="#">Politica de Privacidad</a></div>        
                        <div>
                            <a href="#">Politica de Moderación</a>
                        </div>
                    </div>
                </div>
                <div>
                    <label>SocialStreme Inc 2022</label>
                </div>
                <div>
                    <label>Todos los derechos Reservados.</label>
                </div>
            </div>
        </div>
    </main>
</body>
</html>