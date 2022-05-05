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
    </head>
    <body class="log-in">
        <main class="container main">
            <div>
                <h1 class="a no-margin"> <span>Social</span>Spot</h1>
                <div class="info">
                    SocialSpot es más que una red social, te ayuda a compartir todos esos
                    momento de adrenalina con todo el mundo.
                </div>
            </div>

            <hr class="line-index">
            <form action="../controllers/UserController.php" method="post" class="login">
                <h2 class="log">Inicia Sesión</h2>
                <div class="field">
                    <input type="text" name="user" class="input_field" placeholder="Nombre usuario o correo">
                </div>

                <div class="field">
                    <input type="password" name="pass" class="input_field" placeholder="Contraseña">
                </div>

                <div class="field">
                    <a href="recovery.php" class="input_link">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="field">
                    <button type="submit" name="submit" value="login" class="btn-login">Iniciar Sesión</button>
                </div>
                <div class="field">
                    <button type="submit" name="submit" value="singin" class="btn-singIn">Crear Cuenta</button>
                </div>
            </form>
        </main>
    </body>
</html>
