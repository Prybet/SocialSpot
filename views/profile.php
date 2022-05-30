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
require_once '../models/UserType.php';
session_start();
$posts = $_SESSION["user"]->profile->myPosts;
$style = "grupe7Style.css";
if ($_SESSION["user"]->userType->id == 2) {
    header("location: ../views/index.php");
}
$user = $_SESSION["user"];
$profile = $user->profile;
?>
<html>

    <head>
        <?php include_once '../header.php'; ?>

        <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".ftbanner").css("background-image", "url('../../SSpotImages/UserMedia/<?= $profile->username ?>-Folder/BannerImages/<?= $profile->bannerURL ?>')");
                $(".ftprofile").css("background-image", "url('../../SSpotImages/UserMedia/<?= $profile->username ?>-Folder/ProfileImages/<?= $profile->imageURL ?>')");
            });
        </script>
        <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/nav.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#btn_post-profile").click(function () {
                    $(".contain_modal-profile").css({
                        "pointer-events": "auto",
                        "opacity": "1"
                    });
                });
                $("#btn_cancel").click(function () {
                    $(".contain_modal-profile").css({
                        "pointer-events": "none",
                        "opacity": "0"
                    });
                });
                $(".btn_editar").click(function () {
                    window.location.href = "http://localhost/SocialSpot/views/editprofile.php";
                });
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
            <button href="editprofile.php" class="btn_editar" id="btn_editar">Editar Perfil</button>
        </header>
        <div class="contain-info-profile">
            <div class="name_user">
                <label><?= $profile->username ?></label>
                <label>/</label>
                <label><?= $profile->name ?></label>
            </div> 
            <div class="follow">
                <div class="pointer contain-cont-prym">
                    <label class="cont pointer"><?= count($profile->myPosts) ?></label>
                    <label class="lbl-ligthgray pointer">-</label>
                    <label class="lbl-ligthgray pointer">Publicaciones</label>
                </div>
                <div class="contain-cont">
                    <label class="cont pointer"><?= $profile->getNumFollowers() ?></label>
                    <label class="lbl-ligthgray pointer">-</label>
                    <label class="lbl-ligthgray pointer">Seguidores</label>
                </div>
                <div class="contain-cont">
                    <label class="cont pointer"><?= $profile->getNumFollows() ?></label>
                    <label class="lbl-ligthgray pointer">-</label>
                    <label class="lbl-ligthgray ">Seguidos</label>
                </div>
            </div>
        </div>
        <main class="contain_main">
            <div class="container-post-field">
                <div class="contain_public">
                    <a href="newPost.php" class="upload">
                        <div class="upload__field">
                            <img src="../../SSpotImages/UserMedia/<?= $profile->username ?>-Folder/ProfileImages/<?= $profile->imageURL ?>" class="img img-user"></img>
                            <input type="text" class="upload__fiel-input" placeholder="Publicar" disabled />
                            <div class="img img-photo"></div>
                            <div class="img img-maps"></div>
                        </div>
                    </a>
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
                                    <p class="p_descrip"><?= $profile->description ?>
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
    <script src="../js/nav.js"></script>
</html>
