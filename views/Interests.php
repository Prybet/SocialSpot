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
require_once '../models/Search.php';
require_once '../models/Norm.php';
session_start();
$ip = Connection::$ip;
$style = "grupe9Style.css";
$norms = Norm::getAll();
$id = isset($_GET["id"]) ? $_GET["id"] : 1;
$context = isset($_GET["context"]) ? $_GET["context"] : "";
if ($context != "") {
    $inte = Search::getThis($id, $context);
    $posts = $inte->posts;
    $pos = 0;
    foreach ($inte->members as $m){
        if($m->me->username == $_SESSION["user"]->profile->username){
            $pos = 1;
        }
    }
}
?>
<html>
    <head>
        <?php include_once '../header.php'; ?>
        <title><?= $context ?></title>
        <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/model.js"></script>

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
                 <input type="text" name="context" value="<?= $context ?>" hidden>
                <input type="text" name="inte" value="<?= $inte->id ?>" hidden>
                <button type="submit" name="submit" value="follInterest" class="btn_follow" id="btn_editar">Seguir</button>
                <?php endif;?>
                <?php if($pos == 1):?>
                 <input type="text" name="context" value="<?= $context ?>" hidden>
                <input type="text" name="inte" value="<?= $inte->id ?>" hidden>
                <button type="submit" name="submit" value="follInterest" class="btn_unfollow" id="btn_editar">Dejar de Seguir</button>
                <?php endif;?>
               
            </form>
        </header>
        <div class="contain-info-profile">
            <div class="name_user">
                <label><?= $inte->name ?></label> 
            </div> 
            <div class="follow">
                <div class="contain-cont-prym">
                    <label class="cont"><?= isset($inte->posts) ? count($inte->posts) : 0 ?></label>
                    <label class="lbl-ligthgray">-</label>
                    <label class="lbl-ligthgray">Publicaciones</label>
                </div>
                <div class="contain-contt">
                    <label class="cont"><?= isset($inte->members) ? count($inte->members) : 0 ?></label>
                    <label class="lbl-ligthgray">-</label>
                    <label class="lbl-ligthgray">Miembros</label>
                </div>
                <?php if ($context == "Category"): ?>
                    <div class="contain-contt">
                        <label class="cont"><?= $inte->onLine ?></label>
                        <label class="lbl-ligthgray">-</label>
                        <label class="lbl-ligthgray">Online</label>
                    </div>
                <?php endif; ?>
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
                                    <label>SocialSpot Inc 2022</label>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $(".ftbanner").css("background-image", "url('<?= Search::getBanner($context, $inte->bannerURL, $inte->name) ?>')");
            $(".ftprofile").css("background-image", "url('<?= Search::getImages($context, $inte->imageURL, $inte->name) ?>')");

            document.getElementById("modal-delete_user").outerHTML = "";
            document.getElementById("modal-followers").outerHTML = "";
            document.getElementById("modal-edit").outerHTML = "";
            document.getElementById("modal-delete").outerHTML = "";
            document.getElementById("modal-editPost").outerHTML = "";
            document.getElementById("modal-deletePost").outerHTML = "";
            document.getElementById("modal-follow-user").outerHTML = "";
            $("#view").attr("value", "interests");
        });
    </script>
</html>
