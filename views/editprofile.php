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
                $("header").css("background-image", "url('../../SSpotImages/UserImages/BannerImages/<?= $user->profile->bannerURL?>')");
                $("#imgprofile").css("background-image", "url('../../SSpotImages/UserImages/ProfileImages/<?= $user->profile->imageURL?>')");
            });
        </script>


    </head>

    <body>
        <div class="con">
            <form action="../controllers/UserController.php" enctype="multipart/form-data" method="post" class="frm">
                <header>
                    <div class="fullscreen">
                        <label for="prof-upload" class="subir">
                            <div class="img"></div> </label>
                        <input id="prof-upload" onchange='' type="file" name="imgBanner" style='display: none;' />
                    </div>
                </header>
                <div class="ftprofile abc" id="imgprofile"> 
                    <div class="fullscreen2">
                        <label for="bann-upload" class="subir">
                            <div class="img2"></div>
                        </label>
                        <input id="bann-upload" onchange='' type="file" name="imgProf" style='display: none;' />
                    </div>
                </div>
                <button type="submit" name="submit" value="img" class="btnImg">Cambiar Imagenes</button>
            </form>
        </div> 
        <main class="kl">
            <div class="container grid">
                <div class="center">          
                    <form action="../controllers/UserController.php"  method="post" class="editUser">
                        <h2 class="no-margin fonth2">Editar perfil</h2> 
                        <div class="asf">
                            <div class="field">
                                <div>
                                    <label class="label_field" for="file-upload">Nombre de Usuario</label>
                                </div>
                                <div class="a">
                                    <input type="text" class="input_field" value="<?= $user->username ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="asf">
                            <div class="field">
                                <div>
                                    <label class="label_field">Correo Electronico</label>
                                </div>
                                <div class="a">
                                    <input type="text" class="input_field" value="<?= $user->email ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="asf">
                            <div class="field">
                                <div>
                                    <label class="label_field">Nombre</label>
                                </div>
                                <div class="a">
                                    <input type="text" name="name" class="input_field" value="<?= $user->profile->name ?>">
                                </div>
                            </div>
                        </div>
                        <div class="asf">
                            <div class="field">
                                <div>
                                    <label class="label_field">Fecha de Nacimiento</label>
                                </div>
                                <div class="a">
                                    <input type="date" name="birth" class="input_field" value="<?= $user->profile->birthDate ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="asf">
                            <div class="field">
                                <div>
                                    <label class="label_field">Descripción</label>
                                </div>
                                <div class="a">
                                    <textarea name="desc" class="input_field txtarea"><?= $user->profile->description ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="check">
                            <div class="check_content">
                                <input type="checkbox" name="check" class="check_input" value="1" <?php if ($user->profile->check) {echo 'checked="true"';} ?>>
                                <label class="label_field">Mostrar en perfil</label>
                            </div>
                        </div>
                        <button type="submit" name="submit" value="edit" class="btn-update">Guardar Cambios</button>
                        
                    </form>
                </div>
                <hr>
                <form class="changePass" action="../controllers/UserController.php" method="post">
                    <div>
                        <h2 class="no-margin fonth2">Cambiar Contraseña</h2>
                        <div class="op">
                            <div class="field_pass">
                                <label class="label_field">Contraseña actual</label>
                                <input type="password" name="oldPass" class="input_field">
                            </div>
                        </div>
                        <div class="op">
                            <div class="field_pass">
                                <label class="label_field">Contraseña nueva</label>
                                <input type="password" name="pass" class="input_field">
                            </div>
                        </div>
                        <div class="op">
                            <div class="field_pass">
                                <label class="label_field">Confirmar contraseña</label>
                                <input type="password" name="pass" class="input_field">
                            </div>
                        </div>
                        
                        <button type="submit" name="submit" value="change" class="btn-updatePass">Cambiar Contraseña</button>
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>
