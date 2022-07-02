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
$style = "grupe10Style.css";
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
            <div class="contain_srch">
                <div class="conten_item">
                    <div class="conten_bn">
                        <img src="../img/banner.jpg" class="img_bn">
                    </div>
                    <img src="../img/perfil.png" class="img_pf">
                    <h2>Keku</h2>
                    <div class="contain_inf-user">
                        <label>?-<span>Publicaciones</span></label>
                        <label class="lbl_f">?-<span>Seguidores</span></label>
                        <label>?-<span>Seguidos</span></label>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <script src="../js/nav.js"></script>
</html>
