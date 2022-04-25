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
        <body class="sig-in">
    <main class="container mainn">
        <h1 class="aa no-margin"><span>Social</span>Spots</h1>
        <div class="info info-h">
            ¿Tienes problemas para iniciar sesión?
        </div> 
        <div class="info info-r">
            Ingresa tu correo electrónico y te enviaremos un enlace para que recuperes el acceso a tu cuenta.

        </div> 
        <form action="../controllers/MailerController.php" method="post" class="log" class="createUser">
            <div class="field">
                <input type="email" class="input_field input_reco" placeholder="Correo Electronico" name="email">
            </div>
            <button type="submit" value="recover" name="submit" class="btn-login">Enviar Enlace</button>  
        </form>
        <div>
            <p class="p_in">¿Quieres crear una cuenta?
                <a href="#" class="link">Crear Cuenta </a>
            </p>
            
        </div>
    </main>
</body>
</html>
