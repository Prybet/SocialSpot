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
                        if (data !== null) {
                            console.log(data);
                            $("#catName").empty();
                            $("#catName").append(data["name"]);

                            $("#catDesc").empty();
                            $("#catDesc").append(data["description"]);

                            $("#catImage").empty();
                            $("#catImage").attr("src", "../../SSpotImages/CategoryImages/CategoryImages/ProfileImages/" + data["imageURL"]);

                            $("#members").empty();
                            $("#members").append(data["members"]);
                            $("#online").empty();
                            $("#online").append(data["onLine"]);
                        }
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
    <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/newpost.js"></script>
</head>
<body> 
    <div class="a"> 
        <?php include_once '../nav.php'; ?>
    </div>
    <main>
        <div class="contain_newpost">
            <div class="contain_form-newpost">
                <form action="../controllers/PostController.php" enctype="multipart/form-data" method="post" class="post">
                    <div>
                        <h2 class="h2_tittle">Crear nuevo Post</h2>
                    </div>
                    <select name="cate" class="option_cate">
                        <option value="-1">Elige categoria/deporte</option>
                        <?php foreach ($categories as $category): ?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="contain_post">
                        <div class="contain_post-input">
                            <div class="contain_input-title">
                                <input type="text" placeholder="Titulo" class="input_title" name="title">
                            </div>
                            <div class="top">
                                <textarea placeholder="Texto(opcional)" class="textarea" name="body"></textarea>
                            </div>
                            <div class="top">
                                <div class="contain_lbl-hash" name="hashtags">
                                    <label class="lbl-hash">Hashtags separado por coma","</label>
                                </div>
                                <div>
                                    <input type="text" class="input_hash" placeholder="#vidaExtrema, #skate..."/>
                                </div>
                            </div>
                            <div class="top">
                                <div class="contain_dif">
                                    <select class="select">
                                        <option>Difultad</option>
                                    </select>
                                    <select class="select">
                                        <option>Spots</option>
                                    </select>
                                </div>
                            </div>
                            <div class="top">
                                <label class="lbl_img">Imagenes y Videos</label>
                            </div>

                            <div class="drop-area">
                                <h2>Arrastra y suelta imágenes</h2>
                                <span>o</span>
                                <button type="button">Seleccione tus archivos</button>
                                <input type="file" name="file-0" id="row-0" hidden multiple>

                                <div  id="container">
                                    <input type="file" class="input_file" id="row-0" name="file-0"/>
                                </div>
                            </div>
                            <div id="preview"></div>

                            <div class="top">
                                <input type="checkbox" name="check"><label class="lbl_noti">Recibir notificaciones de comentarios y respuestas</label>
                            </div>
                            <div class="contain_btn top">
                                <div class="nel">

                                </div>
                                <div class="contain_btn-grid">
                                    <button type="submit" name="submit" class="btn_cancel" value="back">Cancelar</button>
                                    <button type="submit" name="submit" class="btn_public" value="post">Postear</button>
                                </div>
                            </div> 
                        </div>
                    </div>
                </form>
            </div>
            <div class="contain_detail">
                <div class="contain_detail-cate">
                    <section class="details_cate">
                        <div class="contai">
                            <div class="contain_img">
                                <img id="catImage" src="../img/perfil.png" class="img_cate" alt="Imagen de Perfil"/>
                            </div>
                            <div>
                                <h2 id="catName" class="cate_name">/Name</h2>
                            </div>
                        </div>
                        <div class="contain_descrip">
                            <label >Categoria/Sport Descripcion</label>
                            <p id="catDesc">Some description</p>
                            <div class="contain_follow">
                                <div class="grid_follow">
                                    <div>
                                        <div class="flex">
                                            <label class="lbl_cont" id="members">1.3K</label>
                                        </div>
                                        <div>
                                            <label >Miembros</label>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex">
                                            <label class="lbl_cont" id="online">93</label>
                                        </div>
                                        <div>
                                            <label>En linea</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>         
                    </section>  
                    <section class="section_rules">
                        <div class="contain_rules">
                            <div class="flex">
                                <h2 class="h2_rule">Reglas de </h2><h2 id="catName" class="h2_rule"></h2>
                            </div>  
                            <div class="lbl_rule">
                                <label>1. Rule 1</label>
                            </div>
                            <div class="lbl_rule">
                                <label>2. Rule 2</label>
                            </div>
                            <div class="lbl_rule">
                                <label>3. Rule 3</label>
                            </div>
                        </div>
                    </section>
                    <footer>
                        <div class="flex-footer flex">
                            <div class="container_footer">
                                <div class="footer_grid">
                                    <label>Ayuda</label>
                                    <a href="#">Acerca De</a>
                                </div>
                                <div class="footer_grid">
                                    <label>Comunidades</label>
                                    <a href="#">Empleo</a>
                                </div>
                                <div class="footer_relleno">
                                    <label>Temas</label>
                                    <div>
                                        <div class="rell"><a href="#" >Blog</a></div>
                                        <div class="rell"><a href="#" >Anunciarse</a></div>
                                        <div class="rell"><a href="#" >Politica de Privacidad</a></div>
                                        <div class="rell"><a href="#" >Politica de Moderación</a></div>
                                    </div>
                                </div>
                                <div class="esp">
                                    <label>Naxhinternational Inc 2022</label>
                                </div>
                                <div class="esp">
                                    <label>Todos los derechos Reservados.</label>
                                </div>
                            </div>
                        </div>
                    </fotter>
                </div>
            </div>
        </div>
    </main>
</body>
</html>