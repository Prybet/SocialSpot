<!DOCTYPE html>
<?php
require_once '../models/User.php';
require_once '../models/UserType.php';
session_start();
if ($_SESSION["user"]->userType->id == 2) {
    header("location: ../views/index.php");
}
$style = "grupe5Style.css";
require_once '../models/Category.php';
require_once '../models/City.php';
$categories = Category::getListAllCategories();
$cities = City::getAllCities();
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
                        $("#catImage").attr("src", "");
                    } else {
                        $.ajax({
                            url: "../Controllers/AjaxController.php",
                            type: "post",
                            data: {"id": id, "sub": "category"},
                            dataType: "json",
                        }).done(function (data) {
                            console.log(data);
                            $("#catName").empty();
                            $("#catName").append(data["name"]);

                            $("#catDesc").empty();
                            $("#catDesc").append(data["description"]);

                            $("#catImage").empty();
                            $("#catImage").attr("src", "../../SSpotImages/CategoryImages/SportImages/ProfileImages/" + data["imageURL"]);

                            $("#members").empty();
                            $("#members").append(data["members"]);
                            $("#online").empty();
                            $("#online").append(data["onLine"]);
                        });
                    }
                });
                var id = 0;
                $("#row-" + id).change(function () {
                    id++;
                    clone = $("input[name=file-0]").clone();
                    $(clone).attr("name", "file-" + id);
                    $(clone).attr("id", "row-" + id);
                    $(clone).appendTo("#container");
                    
                    $("input[name=file-0]").val(null);
                });

            });
        </script>
    </head>
    <body> 
        <main class="container no-margin">
            <form action="../controllers/PostController.php" enctype="multipart/form-data" method="post" class="post">
                <div>
                    <label>Crear nuevo Post</label>
                </div>
                <select name="cate">
                    <option value="-1">Elige categoria/deporte</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php endforeach; ?>
                </select>
                <div>
                    <input type="text" name="title" placeholder="titilo">
                </div>
                <textarea name="body" placeholder="texto(opcional)">Texto</textarea>
                <div>
                    <input type="text" name="hashtags"/>
                    <label>Hashtags separado por coma","</label>
                    <div>
                        <select name="city">
                            <option value="-1">-- Ciudad --</option>
                            <!-- <php foreach ($cities as $city): ?>
                                <option value="<= $city->id ?>"><= $city->name ?></option>
                            <php endforeach; ?> -->
                        </select>
                        <select>
                            <option>Spots</option>
                        </select>
                    </div>
                </div>
                <label>Imagenes y Videos</label>
                <div id="container">
                </div>
                <div>
                    <input id="row-0" name="file-0" type="file" />
                </div>
                
                <div>
                    <input name="check" type="checkbox"><label>Recibir notificaciones de comentarios y respuestas</label>
                </div>
                <div>
                    <button type="submit" name="submit" value="back">Calcelar</button>
                    <button type="submit" name="submit" value="post">Publicar</button>
                </div> 
            </form>
            <div>
                <div class="descrip">
                    <div>
                        <img id="catImage" src="" style="height: 100px" alt="Imagen de Perfil"/>
                        <h2 id="catName" >/Name</h2>
                    </div>
                    <div>
                        <label >Categoria/Sport Descripcion</label>
                        <p id="catDesc">Some description</p>
                    </div>
                    <div class="b">
                        <div>
                            <div>
                                <label id="members">0</label>
                                <div></div>
                                <label>Miembros</label>
                            </div>
                            <div>
                                <label id="online">0</label>
                                <div></div>
                                <label>En linea</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c">
                    <div>
                        <h2>Reglas de</h2><h2 id="catName"></h2>
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