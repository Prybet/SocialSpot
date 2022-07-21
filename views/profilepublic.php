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
$ip = Connection::$ip;
$style = "grupe9Style.css";
$norms = Norm::getAll();
$id = isset($_GET["id"]) ? $_GET["id"] : 1;

$prof = Profile::getProfile($id);

$posts = $prof->myPosts;
$followers = $prof->followers;
$follows = $prof->follows;

$imgUser = isset($prof->imageURL) ? "../../SSpotImages/UserMedia/" . $prof->username . "-Folder/ProfileImages/" . $prof->imageURL : "../img/perfil.png";
if($prof->imageURL == "-" || $prof->imageURL == ""){
    $imgUser = "../img/perfil.png";
}
$imgBanner = isset($profile->bannerURL) ? "../../SSpotImages/UserMedia/" . $prof->username . "-Folder/BannerImages/" . $prof->bannerURL : "../img/banner.jpg";
if($prof->bannerURL == "-" || $prof->bannerURL == ""){
    $imgBanner = "../img/banner.jpg";
}

if($prof->description == ""){
    $prof->description = "Sin descripción";
}

$pos = 0;
foreach($followers as $foll):
    if($foll->profile->id == $_SESSION["user"]->id){
        $pos = 1;
    }
endforeach; 

?>

<html>
    <head>
        <?php include_once '../header.php'; ?>
        <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
        <title>Perfil Publico</title>
        <script src="../js/model.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".ftbanner").css("background-image", "url('<?= $imgBanner ?>')");
                $(".ftprofile").css("background-image", "url('<?= $imgUser ?>')"); 
                
                document.getElementById("modal-delete_user").outerHTML = "";
                document.getElementById("modal-followers").outerHTML = "";
                document.getElementById("modal-edit").outerHTML = "";
                document.getElementById("modal-delete").outerHTML = "";
                document.getElementById("modal-editPost").outerHTML = "";
                document.getElementById("modal-deletePost").outerHTML = "";
                $("#view").attr("value", "profilepublic");
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
            <form action="../controllers/UserController.php" method="post">
                <?php if ($_SESSION["user"]->userType->id != 2): ?>
                    <?php if($pos == 0):?>
                        <input type="text" name="prof" value="<?= $prof->id ?>" hidden>
                        <button type="submit" name="submit" value="follow" class="btn_follow" id="btn_editar">Seguir</button>
                    <?php endif;?>
                    <?php if($pos == 1):?>
                        <input type="text" name="prof" value="<?= $prof->id  ?>" hidden>
                        <button type="submit" name="submit" value="follow" class="btn_unfollow" id="btn_editar">Dejar de seguir</button>
                    <?php endif;?>
                <?php else: ?>
                        <button type="submit" name="submit" value="goLogin" class="btn_follow" id="btn_editar">Seguir</button>
                <?php endif; ?>  
            </form>
        </header>
        <div class="contain-info-profile">
            <div class="name_user">
                <label><?= $prof->username  ?></label> 
                <?php if($prof->check == "1"){?>
                <label class="lbl-">/</label>
                <label class="lblname"><?= $prof->name ?></label>
                <?php } ?>
            </div> 
            <div class="follow">
                <div class="contain-cont-prym">
                    <label class="cont"><?= isset($prof->myPosts) ? count($prof->myPosts): 0 ?></label>
                    <label class="lbl-ligthgray">-</label>
                    <label class="lbl-ligthgray">Publicaciones</label>
                </div>
                <div class="contain-conte">
                    <label class="cont"><?= isset($prof->followers) ? count($prof->followers): 0 ?></label>
                    <label class="lbl-ligthgray">-</label>
                    <label class="lbl-ligthgray">Seguidores</label>
                </div>
                <div class="contain-conte">
                    <label class="cont"><?= isset($prof->follows) ? count($prof->follows): 0 ?></label>
                    <label class="lbl-ligthgray">-</label>
                    <label class="lbl-ligthgray">Seguidos</label>
                </div>
            </div>
        </div>
        <main class="contain_main">
            <div class="container-post-field">
                <div class="contain_public">
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
                                    <p class="p_descrip"><?= isset($prof->description) ? $prof->description : "Sin Descripción" ?>
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
