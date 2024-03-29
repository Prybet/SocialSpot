<!DOCTYPE html>
<?php
require_once '../models/User.php';
require_once '../models/UserType.php';
require_once '../models/Category.php';
require_once '../models/Spot.php';
require_once '../models/City.php';
require_once '../models/Norm.php';
session_start();
$ip = Connection::$ip;
if ($_SESSION["user"]->userType->id == 2) {
    header("location: ../views/index");
}
$style = "grupe5Style.css";
$categories = Category::getListAllCategories();
$spots = Spot::getAll();
$norms = Norm::getAll();
$count = 1;
$err = isset($_SESSION["errCate"]) ? $_SESSION["errCate"] : false;
$errT = isset($_SESSION["errTit"]) ? $_SESSION["errTit"] : false;
$errB = isset($_SESSION["errBod"]) ? $_SESSION["errBod"] : false;
?>
<html>
    <head>
        <?php include_once '../header.php'; ?>
        <title>Crear Nuevo Post</title>
        <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/model.js"></script>
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
                        <?php
                        if ($err == true) {
                            echo "<div class='error'><label class='red'>*Seleccione una Categoría</label></div>";
                            $_SESSION["errCate"] = null;
                        } else {
                            echo "<div class='error hidden'><label class='red hidden'></label></div>";
                        }
                        ?>
                        <div class="contain_info-post">
                            <div class="contain_post-input">
                                <div class="contain_input-title">
                                    <input type="text" id="title" placeholder="Titulo" class="input_title" name="title">
                                    <?php
                                    if ($errT == true) {
                                        echo "<div class='error'><label class='pop'>*Campo Obligatotio</label></div>";
                                        $_SESSION["errTit"] = null;
                                    } else {
                                        echo "<div class='error hidden'><label class='pop hidden'></label></div>";
                                    }
                                    ?>
                                </div>
                                <div class="top">
                                    <textarea placeholder="Texto(opcional)" class="textarea" name="body" id="body"></textarea>
                                    <?php
                                    if ($errB == true) {
                                        echo "<div class='error'><label class='pop'>*Campo Obligatotio</label></div>";
                                        $_SESSION["errBod"] = null;
                                    } else {
                                        echo "<div class='error hidden'><label class='pop hidden'></label></div>";
                                    }
                                    ?>
                                </div>
                                <div class="top">
                                    <div class="contain_lbl-hash">
                                        <label class="lbl-hash">Hashtags separado por coma","</label>
                                    </div>
                                    <div>
                                        <input type="text" class="input_hash" placeholder="#vidaExtrema, #skate..." name="hashtags"/>
                                    </div>
                                </div>
                                <div class="top">
                                    <div class="contain_dif">
                                        <select name="spot" class="select">
                                            <option value="0">Selecciona Spot(Opcional)</option>
                                            <?php foreach ($spots as $spot): ?>
                                                <option value="<?= $spot->id ?>"><?= $spot->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="top">
                                    <label class="lbl_img">Imagenes y Videos</label>
                                </div>

                                <!-- ----------- -->


                                <div  id="container">
                                    <input type="file" class="input_file" id="row-0" name="file-0"/>
                                </div>
                                <!-- 
                                div class="drop-area">
                                    <h2>Arrastra y suelta imágenes</h2>
                                    <span>o</span>
                                    <button type="button">Seleccione tus archivos</button>
                                    <input type="file" name="file-0" id="row-0" hidden multiple>
    
                                    
                                </div>
                                <div id="preview"></div> 
                                -->
                                <!-- ----------- -->

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
                            <div class="cont_de">
                                <div class="contai">
                                    <div class="contain_img-cate">
                                        <img id="catImage" src="../img/perfil.png" class="img_cate" alt="Imagen de Perfil"/>
                                    </div>
                                    <div>
                                        <h2 id="catName" class="cate_name">/Categoria</h2>
                                    </div>
                                </div>
                                <h2 class="hidenh2"></h2>
                            </div>
                            <div class="contain_descrip">
                                <label >Categoria/Sport Descripcion</label>
                                <p id="catDesc">Some description</p>
                                <div class="contain_follow">
                                    <div class="grid_follow">
                                        <div>
                                            <div class="flex">
                                                <label class="lbl_cont" id="members">0</label>
                                            </div>
                                            <div>
                                                <label >Miembros</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="flex">
                                                <label class="lbl_cont" id="online">0</label>
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
                                    <h2 class="h2_rule">Reglas</h2>
                                </div> 
                                <?php $i = 0;
                                foreach ($norms as $n) {
                                    $i++; ?>
                                    <div class="lbl_rule">
                                        <label><?= $i ?>-<?= $n->name ?>: </label><span class="spnNum"><?= $n->desc ?></span>
                                    </div>
                                <?php } ?>
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
                                        <label>SocialSpot Inc 2022</label>
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
    <script src="../js/nav.js"></script>
</html>