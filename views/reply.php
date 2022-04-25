<!DOCTYPE html>
<!--
SocialSpot 2022
Made by: 
 jasmet_generico1
 soulbroken
 Prybet
-->
<?php
session_start();
$_SESSION["recov"] = isset($_SESSION["recov"]) ? $_SESSION["recov"] : "";
if ($_SESSION["recov"] != "") {
    $style = "style.css";
    ?>
    <html>
        <?php include_once '../header.php'; ?>
        <body>
            <form action="../controllers/RecoveryController.php" method="post" class="log">
                <main class="container">
                    <div>
                        <input type="password" name="pass" placeholder="Nueva Contraseña">
                    </div>
                    <div>
                        <input type="password" name="pass" placeholder="Confirmar Contraseña">
                    </div>
                    <div>
                        <button type="submit" name="submit" value="verify">Cambiar Contraseña</button>
                    </div>  
                </main>
            </form>
        </body>
    </html>

    <?php
    }
    //header("Location: ../views/index.php");
    