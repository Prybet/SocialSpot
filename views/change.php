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
    <!DOCTYPE html>
    <html>
        <?php include_once '../header.php'; ?>
        <body class="sig-in">
            <main class="container mainn">
                <h1 class="aa no-margin"><span>Social</span>Spots</h1>
                <div class="info info_p">
                    Ingrese nueva contraseña
                </div>
                <form action="../controllers/RecoveryController.php" method="post" class="createUser">
                    <div class="field">
                        <input type="password" name="pass" class="input_field inp_p" placeholder="Contraseña">
                    </div>
                    <div class="field">
                        <input type="password" name="pass" class="input_field inp_p" placeholder="Contraseña">
                    </div>
                    <button type="submit" value="verify" name="submit" class="btn-login ">Guardar</button>
                </form>
            </main>
        </body>
    </html>

    <?php
} else {
    header("Location: ../views/indexa.php");
}

