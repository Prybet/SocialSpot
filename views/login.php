<!--
SocialSpot 2022
Made by: 
 jasmet_generico1
 soulbroken
 Prybet
-->
<?php
session_start();
$style = "grupe6Style.css";

?>
<html>
    <head>
        <?php include_once '../header.php'; ?>
        <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("label[name=err]").css("display", "flex");
            });
        </script>
    </head>
    <body class="no-margin container-flex">
        <div class="aaa">
        <div class="container-grid">
            <div class="container-flex">
                <div class="cont">
                <img src="../img/logo.png" class="img_logo pointer" />
                    <p>SocialSpot es más que una red social, te ayuda a compartir
                        todos esos momento de adrenalina con todo el mundo
                    </p>
                </div>
            </div>
            <hr>
            <div class="no-margin  container-form">
                <form action="../controllers/UserController.php" method="post" class="login">
                    <h2 class="log">Inicia Sesión</h2>
                    <div class="field">
                        <input type="text" name="user" class="input_field" placeholder="Nombre usuario o correo">
                    </div>

                    <div class="field">
                        <input type="password" name="pass" class="input_field" placeholder="Contraseña">
                    </div>
                    <div class="error">
                        <label class="red" name="err">*Credenciales incorrectas</label>
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
            </div>
        </div>
        </div>
       
    </body>
</html>
