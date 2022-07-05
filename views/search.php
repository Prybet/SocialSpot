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
session_start();
$ip = Connection::$ip;
$style = "grupe10Style.css";
$text = isset($_GET["nom"]) ? $_GET["nom"] : "";
if ($text != "") {
    $contents = Search::setSearch($text);
} else {
    $contents = null;
}
?>
<html>
    <head>
        <?php include_once '../header.php'; ?>
        <title>Search</title>
        <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/model.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {

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
    </head>
    <body>
        <div class="a">
            <?php include_once '../nav.php'; ?>
        </div>
        <main>
            <?php if ($contents == null): ?>
                <div class="contain_notSe">
                    <h2 class="notSearch">Sin Resultado en la busqueda</h2>
                </div>
            <?php endif; ?>
            <?php if ($contents != null): ?>
                <div class="contain_srch">
                    <?php foreach ($contents as $cont):?>
                        <div class="conten_item" data-value="<?= $cont->id ?>">
                            <div class="conten_bn">
                                <img src="<?= $cont->getBanner($cont->context, $cont->bannerURL, $cont->username) ?>" class="img_bn">
                            </div>
                            <img src="<?= $cont->getImages($cont->context, $cont->imageURL, $cont->username) ?>" class="img_pf">
                            <h2 class="h2_search"><?= $cont->getNom() ?></h2>
                            <div class="contain_inf-user">
                                <label><?= count($cont->posts)?>-<span><?= $cont->getNomPost()?></span></label>
                                <label class="lbl_f"><?= count($cont->followers) ?>-<span><?= $cont->getNomFollowers()?></span></label>
                                <?php if($cont->context == "Profile" || $cont->context == "Category"):?>
                                <label><?= $cont->getFollow()?>-<span><?= $cont->getNomFollow()?></span></label>
                                <?php endif;?>
                            </div>
                            <div class="cont_ty cont_ty<?= $cont->id ?>" value="<?= $cont->context ?>">
                                <span><?= $cont->getContext() ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </main>
    </body>
    <script src="../js/nav.js"></script>
</html>
