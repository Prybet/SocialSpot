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
require_once '../models/Region.php';
require_once '../models/Province.php';
require_once '../models/City.php';
session_start();
$style = "grupe2Style.css";
if ($_SESSION["user"]->userType->id == 2) {
    header("location: ../views/index.php");
}
$user = $_SESSION["user"];
$regions = Region::getAllRegion();
$provinces = Province::getAllProvince();
$cities = City::getAllCities();
?>
<html>

<head>

    <?php include_once '../header.php'; ?>

    <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("header").css("background-image", "url('../../SSpotImages/UserMedia/<?= $user->profile->username?>-Folder/BannerImages/<?= $user->profile->bannerURL?>')");
            $("#imgprofile").css("background-image", "url('../../SSpotImages/UserMedia/<?= $user->profile->username?>-Folder/ProfileImages/<?= $user->profile->imageURL?>')");

            $("#btn_delete").click(function () {
                $(".contain_modal-profile").css({
                    "pointer-events": "auto",
                    "opacity": "1"
                });
            });
            $("#btn_cancel").click(function () {
                $(".contain_modal-profile").css({
                    "pointer-events": "none",
                    "opacity": "0"
                });
            });   
        });
    </script>
    <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/nav.js"></script>

</head>

    <body>
        <div class="nav">
            <?php include_once '../nav.php'; ?>
        </div>
        <div class="con">
            <form action="../controllers/UserController.php" enctype="multipart/form-data" method="post" class="frm">
                <header>
                    <div class="banner">
                        <label for="prof-upload">
                        <div class="img"></div> </label>
                        <input id="prof-upload" onchange='' type="file" name="imgBanner" class="input_file-banner" />
                    </div>
                </header>
                <div class="ftprofile abc" id="imgprofile"> 
                    <div class="fullscreen2">
                        <label for="bann-upload">
                            <div class="img2"></div>
                        </label>
                        <input id="bann-upload" onchange='' type="file" name="imgProf" class="input_file-profile" />
                    </div>
                    <button type="submit" name="submit" value="img" class="btnImg">Cambiar Imagenes</button>
                </div>
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
                                    <input type="text" class="input_field"  disabled value="<?= $user->username ?>">
                                </div>
                            </div>
                        </div>
                        <div class="asf">
                            <div class="field">
                                <div>
                                    <label class="label_field">Correo Electronico</label>
                                </div>
                                <div class="a">
                                    <input type="text" class="input_field"  disabled value="<?= $user->email ?>">
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
                        <div class="check">
                            <div class="check_content">
                                <input type="checkbox" name="check" class="check_input" value="1" id="check">
                                <label class="label_field" for="check">Mostrar en perfil</label>
                            </div>
                        </div>
                        <div class="asf">
                            <div class="field">
                                <div>
                                    <label class="label_field">Fecha de Nacimiento</label>
                                </div>
                                <div class="a">
                                    <input type="date" name="birth" class="input_field" value="<?= $user->profile->birthDate ?>">
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
                        <div class="asf">
                            <div class="asf-conta">
                                <div>
                                    <label class="label_field">
                                        Region
                                    </label>
                                </div>
                                <select class="select" name="regi">
                                    <option value="-1" class="opt">Seleccione una opcion</option>
                                    <?php foreach ($regions as $region): ?>
                                    <option value="<?= $region->id?>"><?= $region->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="asf">
                            <div class="asf-conta">
                                <div>
                                    <label class="label_field">
                                        Comuna
                                    </label>
                                </div>
                                <select class="select" name="provi">
                                    <option value="-1" class="opt">Seleccione una opcion</option>
                                    <?php foreach ($provinces as $province): ?>
                                    <option value="<?= $province->id?>"><?= $province->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="asf">
                            <div class="asf-conta">
                                <div>
                                    <label class="label_field">
                                        Cuidad
                                    </label>
                                </div>
                                <select class="select" name="city">
                                    <option value="-1" class="opt">Seleccione una opcion</option>
                                    <?php foreach ($cities as $city): ?>
                                    <option value="<?= $city->id?>"><?= $city->name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="submit" value="edit" class="btn-update">Guardar Cambios</button>
                        <div class="contain_drop">
                            <div id="btn_delete" name="submit" value="edit" class="btn-drop">Eliminar Cuenta</div>                        
                        </div>
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
        <div class="contain_modal-profile">
            <div class="contain_mod">
               <div>
                    <h2 class="lbl_h2">¿Esta seguro de eliminar su cuenta?</h2>
                    
                    <div class="contain_btn-profile" onclick="">
                        <button class="btn">Aceptar</button>
                    </div>
                    <div class="contain_btn-profile">
                        <button class="btn" id="btn_cancel">Cancelar</button>
                    </div>
               </div> 
            </div>
        </div>
        <?php include_once '../footer.php'; ?>
    </body>
    <script src="../js/nav.js"></script>
</html>
