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
$style = "grupe2Style.css";
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
                $("header").css("background-image", "url('../../SSpotImages/UserImages/ProfileImages/a-ProfilePic.jpeg')");
                $("div[class=ftprofile]").css("background-image", "url('../../SSpotImages/UserImages/ProfileImages/a-ProfilePic.jpeg')");
            });
        </script>


    </head>

    <body>
        <main>
            <div>
                <header>
        
                </header>
                <div class="ftprofile"> </div>
                <div class="con">
                    <form action="../controllers/UserController.php" enctype="multipart/form-data" method="post">
                        <div class="fullscreen">
                            <label for="prof-upload" class="subir">
                                <i class="fas fa-cloud-upload-alt"></i> Seleccionar foto de Portada
                            </label>
                            <input id="prof-upload" onchange='' type="file" name="imgBanner" style='display: none;' />
                        </div>

                        <div class="fullscreen2">
                            <label for="bann-upload" class="subir">
                                <i class="fas fa-cloud-upload-alt"></i> Seleccionar foto de Perfil
                            </label>
                            <input id="bann-upload" onchange='' type="file" name="imgProf" style='display: none;' />
                        </div>
                        <button type="submit" name="submit" value="img">Cambiar Imagenes</button>
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="contain main">

                    <h2 class="no-margin">Editar perfil</h2>                
                    <form action="../controllers/UserController.php"  method="post">
                        <div class="createUser">
                            <div class="field">
                                <label class="label_field" for="file-upload">Nombre de Usuario</label>
                                <div></div>
                                <div class="a">
                                    <input type="text" class="input_field" value="<?= $user->username ?>" disabled>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label_field">Correo Electronico</label>
                                <div></div>
                                <div class="a">
                                    <input type="text" class="input_field" value="<?= $user->email ?>" disabled>
                                </div>

                            </div>
                            <div class="field">
                                <label class="label_field">Nombre</label>
                                <div></div>
                                <div class="a">
                                    <input type="text" name="name" class="input_field" value="<?= $user->profile->name ?>">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label_field">Mostrar en perfil</label>
                                <div class="a">
                                    <input type="checkbox" name="check" class="input_field" value="1" <?php if ($user->profile->check) {
            echo 'checked="true"';
        } ?>>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label_field">Fecha de Nacimiento</label>
                                <div></div>
                                <div class="a">
                                    <input type="date" name="birth" class="input_field" value="<?= $user->profile->birthDate ?>" >
                                </div>
                            </div>
                            <div class="field">
                                <label class="label_field">Descripción</label>
                                <div></div>
                                <div class="a">
                                    <textarea name="desc" class="input_field txtarea"><?= $user->profile->description ?></textarea>
                                </div>
                            </div>
                            <button type="submit" name="submit" value="edit" class="btn-update">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
                </form>
                <hr>
                <form class="changePass" action="../controllers/UserController.php" method="post">
                    <h2 class="no-margin titleChange">Cambiar Contraseña</h2>
                    <div class="field_pass">
                        <label class="label_field au">Contraseña actual</label>
                        <input type="password" name="oldPass" class="input_field">
                    </div>
                    <div class="field_pass">
                        <label class="label_field">Contraseña nueva</label>
                        <input type="password" name="pass" class="input_field">
                    </div>
                    <div class="field_pass">
                        <label class="label_field">Confirmar contraseña</label>
                        <input type="password" name="pass" class="input_field" placeholder="Confirmar contraseña">
                    </div>
                    <button type="submit" name="submit" value="change" class="btn-updatePass">Cambiar Contraseña</button>
                </form>
            </div>
        </main>

    </body>

</html>
