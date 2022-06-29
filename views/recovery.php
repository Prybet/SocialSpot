<!DOCTYPE html>
<!--
SocialSpot 2022
Made by: 
 jasmet_generico1
 soulbroken
 Prybet
-->
<?php
$style = "grupe1Style.css";
session_start();
$_SESSION["err"] = isset($_SESSION["err"]) ? $_SESSION["err"] : "ss"
?>
<html>
    <head>
        <?php include_once '../header.php'; ?>
        <title>Recuperar Contraseña</title>
    </head>
    <body class="sig-in">
        <main class="container mainn">
            <h1 class="aa no-margin"><span>Social</span>Spots</h1>
            <div class="info info-h">
                ¿Tienes problemas para iniciar sesión?
            </div> 
            <div class="info info-r">
                Ingresa tu correo electrónico y te enviaremos un enlace para que recuperes el acceso a tu cuenta.
            </div> 
            <!-- <div class="info info-r">
                <?php echo $_SESSION["err"]; ?>
            </div> -->
            <form action="../controllers/MailController.php" method="post" class="log" class="createUser">
                <div class="field">
                    <input type="email" class="input_field input_reco" placeholder="Correo Electronico" name="email">
                </div>
                <button type="submit" value="recover" name="submit" class="btn-login">Enviar Enlace</button>  
            </form>
            <div>
                <p class="p_in">¿Quieres crear una cuenta?
                    <a href="singin" class="link">Crear Cuenta </a>
                </p>

            </div>
        </main>
    </body>
</html>
