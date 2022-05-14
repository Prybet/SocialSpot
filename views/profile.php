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
$style = "grupe7Style.css";
if ($_SESSION["user"]->userType->id == 2) {
    header("location: ../views/index.php");
}
$user = $_SESSION["user"];
?>
<html>

    <head>

        <?php include_once '../header.php'; ?>

        <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("header").css("background-image", "url('../../SSpotImages/UserMedia/<?= $user->profile->username?>-Folder/BannerImages/<?= $user->profile->bannerURL?>')");
                $("#imgprofile").css("background-image", "url('../../SSpotImages/UserMedia/<?= $user->profile->username?>-Folder/ProfileImages/<?= $user->profile->imageURL?>')");
            });
        </script>


    </head>

    <body>
        <div>
            <header></header>
            <div class="ftprofile abc" id="imgprofile"></div>
            
        </div> 
        
    </body>
</html>
