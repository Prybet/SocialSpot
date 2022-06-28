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
$norms = Norm::getAll();
$id = isset($_GET["id"]) ? $_GET["id"] : 1;

$inte = Category::getFullCategoy($id);

$imageCate = isset($inte->imageURL) ? "../../SSpotImages/CategoryImages/CategoryImages/BannerImages/" . $inte->bannerURL : "../img/perfil.png";
$bannerCate = isset($inte->bannerURL) ? "../../SSpotImages/CategoryImages/CategoryImages/ProfileImages/" . $inte->imageURL : "../img/banner.jpg";

$posts = $inte->posts;

$pos = 0;
foreach ($inte->members as $i){
    if($i->me == $_SESSION["user"]->id){
        $pos = 1;
    }
}
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
                $("#view").attr("value", "interests");
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
                    <input type="text" name="cate" value="<?= $inte->id ?>" hidden>
                    <button type="submit" name="submit" value="follCate" class="btn_follow" id="btn_editar">Ser Miembro</button>
                <?php endif;?>
                <?php if($pos == 1):?>
                    <input type="text" name="cate" value="<?= $inte->id  ?>" hidden>
                    <button type="submit" name="submit" value="follCate" class="btn_unfollow" id="btn_editar">Dejar de ser Miembro</button>
                <?php endif;?>
            </form>
        </header>
        <div class="contain-info-profile">
            <div class="name_user">
                <label><?= $inte->name  ?></label> 
            </div> 
            <div class="follow">
                <div class="contain-cont-prym">
                    <label class="cont pointer"><?= isset($inte->posts) ? count($inte->posts): 0 ?></label>
                    <label class="lbl-ligthgray">-</label>
                    <label class="lbl-ligthgray">Publicaciones</label>
                </div>
                <div class="contain-cont">
                    <label class="cont pointer"><?= isset($inte->members) ? count($inte->members): 0 ?></label>
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
                                    <p class="p_descrip"><?= isset($inte->description) ? $inte->description : "Sin Descripción" ?>
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
        <?php include_once '../modal.php'; ?>
    </body>
    <script src="../js/nav.js"></script>
</html>