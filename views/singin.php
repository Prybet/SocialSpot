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
<?php include '../header.php'; ?>
<body class="sig-in">
    <main class="container mainn">
        <h1 class="aa no-margin"><span>Social</span>Spots</h1>
        <div class="info">
            Registrate para poder participar en la comunidad
        </div> 
        <form action="../controllers/UserController.php" method="post" class="createUser">
            <div class="field">
                <input type="email" name="email" class="input_field" placeholder="Correo Electronico">
            </div>
            <div class="field">
                <input type="text" name="user" class="input_field" placeholder="Nombre de usuario">
            </div>
            <div class="field">
                <input type="name" name="name" class="input_field" placeholder="Nombre">
            </div>
            <div class="field">
                <input type="password" name="pass" class="input_field" placeholder="Contraseña">
            </div>
            <div class="field">
                <input type="date" name="birth" class="input_field" placeholder="Fecha Nacimiento">
            </div>
            <p class="u">
                Al registrarte Aceptas nuesta condiciones, la Politica de Moderacion y Politica de Privacidad      
            </p>
            <button type="submit" value="create" name="submit" class="btn-login">Registrarse</button>  
        </form>
        <div>
            <p class="p_in">¿Tienes Cuenta?
                <a href="login.php" class="link">Inicia Sesión</a>
            </p>
        </div>    
    </main>
</body>
</html>
