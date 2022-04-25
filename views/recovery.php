<!DOCTYPE html>
<!--
SocialSpot 2022
Made by: 
 jasmet_generico1
 soulbroken
 Prybet
-->
<?php $style = "style.css";
session_start(); ?>
<html>
        <?php include_once '../header.php'; ?>
    <body>
        <?php
        // put your code here
        ?>
        <form action="../controllers/MailerController.php" method="post" class="log">
            <main class="container">
                <div>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="field">
                    <a disabled class="input_link"></a>
                </div>
                <div>
                    <button type="submit" name="submit" value="recover"> Enviar </button>
                </div>  
            </main>
        </form>
    </body>
</html>
