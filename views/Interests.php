<!DOCTYPE html>
<!--
SocialSpot 2022
Made by: 
 jasmet_generico1
 soulbroken
 Prybet
-->
<?php 
require_once '../models/User.php';
session_start();
$style = "grupe9Style.css";
$id = isset($_GET["id"]) ? $_GET["id"] : 1;

$cate = Category::getFullCategoy($id);

$imageCate = isset($cate->imageURL) ? "../../SSpotImages/CategoryImages/CategoryImages/BannerImages/" . $cate->bannerURL : "../img/perfil.png";
$bannerCate = isset($cate->bannerURL) ? "../../SSpotImages/CategoryImages/CategoryImages/ProfileImages/" . $cate->imageURL : "../img/banner.jpg";

$posts = $cate->posts;
?>
<html>
    <head>
        <?php include_once '../header.php'; ?>
        <title>Categoria</title>
        <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/model.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".ftbanner").css("background-image", "url('<?= $imageCate ?>')");
                $(".ftprofile").css("background-image", "url('<?= $bannerCate ?>')"); 
            });
        </script>
    </head>
    <body>
        <div class="a">
            <?php include_once '../nav.php'; ?>
        </div>
        <header>
            <div class="contain_bann " >
                <div class="ftbanner">
                </div>
            </div>

            <div class="ftprofile pointer">

            </div>
            <form action="../controllers/InterestController.php" method="post">
                <?php if($pos == 0):?>
                    <input type="text" name="cate" value="<?= $cate->id ?>" hidden>
                    <button type="submit" name="submit" value="follCate" class="btn_follow" id="btn_editar">Seguir</button>
                <?php endif;?>
                <?php if($pos == 1):?>
                    <input type="text" name="cate" value="<?= $cate->id  ?>" hidden>
                    <button type="submit" name="submit" value="follCate" class="btn_unfollow" id="btn_editar">Dejar de seguir</button>
                <?php endif;?>
            </form>
        </header>
        <div class="contain-info-profile">
            <div class="name_user">
                <label><?= $cate->name  ?></label> 
            </div> 
            <div class="follow">
                <div class="contain-cont-prym">
                    <label class="cont pointer"><?= isset($cate->posts) ? count($cate->posts): 0 ?></label>
                    <label class="lbl-ligthgray">-</label>
                    <label class="lbl-ligthgray">Publicaciones</label>
                </div>
                <div class="contain-cont">
                    <label class="cont pointer">?</label>
                    <label class="lbl-ligthgray pointer">-</label>
                    <label class="lbl-ligthgray pointer">Miembros</label>
                </div>
                <div class="contain-cont">
                    <label class="cont pointer">?</label>
                    <label class="lbl-ligthgray pointer">-</label>
                    <label class="lbl-ligthgray pointer">Online</label>
                </div>
            </div>
        </div>
        <main class="contain_main">
            <div class="container-post-field">
                <div class="contain_public">
                    <div class="post_most">
                        <div class="most most-grid">
                            <button class="most_btn">Mas nuevos</button>
                            <button class="most_btn">Mas votado</button>
                        </div>
                    </div>
                    <?php
                    foreach ($posts as $post):
                        include '../item.php';
                    endforeach;
                    ?>
                </div>
                <div class="descrip_user">
                    <div class="descrip_user-contain">
                        <section class="contain_descrip-fixed">
                            <div class="contain_descrip-content">
                                <h2 class="h2_descrip">Descripción</h2>
                                <div class="contain_descrip">
                                    <p class="p_descrip"><?= isset($cate->description) ? $cate->description : "Sin Descripción" ?>
                                    </p>
                                </div>
                            </div>
                        </section>
                        <footer class="flex-footer">
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
                            </fotter>
                    </div>  
                </div>
            </div>
        </main> 
    </body>
</html>
