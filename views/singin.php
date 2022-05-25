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
$style = "grupe1Style.css";
?>
<html>
    <head>
        <?php include_once '../header.php'; ?>
        <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
    </head>
    <body class="sig-in">
        <main class="container mainn">
            <h1 class="aa no-margin"><span>Social</span>Spots</h1>
            <div class="info">
                Registrate para poder participar en la comunidad
            </div> 
            <form action="../controllers/UserController.php" method="post" class="createUser">
                <div class="field">
                    <input type="email" name="email" class="input_field " placeholder="Correo Electronico" required>
                    <label class="lbl_email" hidden>*Correo Existente</label>
                </div>
                <div class="field">
                    <input type="text" name="user" class="input_field " placeholder="Nombre de usuario" required>
                    <label class="lbl_user" hidden>*Nombre Usuario Existente</label>
                </div>
                <div class="field">
                    <input type="name" name="name" class="input_field" placeholder="Nombre" required>
                </div>
                <div class="field">
                    <input type="password" name="pass" class="input_field" placeholder="Contraseña" required>
                </div>
                <div class="field">
                    <input type="date" name="birth" class="input_field" placeholder="Fecha Nacimiento" required>
                </div>
                <p class="u">
                    Al registrarte Aceptas nuesta condiciones, la Politica de Moderacion y Politica de Privacidad      
                </p>
                <label></label>
                <button type="submit" value="create" name="submit" class="btn-login">Registrarse</button>  
            </form>
            <div>
                <p class="p_in">¿Tienes Cuenta?
                    <a href="login.php" class="link">Inicia Sesión</a>
                </p>
            </div>    
        </main>
        <script src="../js/singin.js"></script>
    </body>
</html>
