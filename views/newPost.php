<!DOCTYPE html>
<?php
session_start();
$style = "grupe5Style.css";
require_once '../models/Sport.php';
$sports = Sport::getAllSports();
?>
<html>
    <head>
        <?php include_once '../header.php'; ?>
        <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("select[name=cate]").change(function () {
                    id = $("select[name=cate]").val();
                    if (id == -1) {
                        $("#catName").empty();
                        $("#catDesc").empty();
                        $("#catImage").empty();
                    } else {
                        $.ajax({
                            url: "../Controllers/AjaxController.php",
                            type: "post",
                            data: {"id": id},
                            dataType: "json",
                        }).done(function (data) {
                            $("#catName").empty();
                            $("#catName").append(data["name"]);

                            $("#catDesc").empty();
                            $("#catDesc").append(data["description"]);

                            $("#catImage").empty();
                            let url = "../../SSpotImages/CategoryImages/SportImages/ProfileImages/" + data["imageURL"];
                            console.log(url);
                            $("#catImage").attr("src", url);
                        });
                    }
                });
            });
        </script>
    </head>
    <body>
        <main class="container no-margin">
            <form class="post">
                <div>
                    <label>Crear nuevo Post</label>
                </div>
                <select name="cate">
                    <option value="-1">Elige categoria/deporte</option>
                    <?php foreach ($sports as $sport): ?>
                        <option value="<?= $sport->id ?>"><?= $sport->name ?></option>
                    <?php endforeach; ?>
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
                        <img id="catImage" src="" style="height: 30px"/>
                        <label id="catName" >/Name</label>
                    </div>
                    <div>
                        <label >Categoria/Sport Descripcion</label>
                        <p id="catDesc">Some description</p>
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
                    <label>4. Rule 34 </label>
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