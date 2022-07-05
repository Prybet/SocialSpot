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
$ip = Connection::$ip;
$user = $_SESSION["user"]->getLogin();

$style = "grupe2Style.css";
if ($user->userType->id == 2) {
    header("location: ../views/index");
}
$city = $user->profile->city;
$regions = Region::getListAllRegion();

$profile = $user->profile;
$imgUser = isset($profile->imageURL) ? "../../SSpotImages/UserMedia/" . $profile->username . "-Folder/ProfileImages/" . $profile->imageURL : "../img/perfil.png";
if ($profile->imageURL === "-" || $profile->imageURL === "") {
    $imgUser = "../img/perfil.png";
}
$imgBanner = isset($profile->bannerURL) ? "../../SSpotImages/UserMedia/" . $profile->username . "-Folder/BannerImages/" . $profile->bannerURL : "../img/banner.jpg";
if ($profile->bannerURL === "-" || $profile->bannerURL === "") {
    $imgBanner = "../img/banner.jpg";
}

$err = isset($_SESSION["errPass"]) ? $_SESSION["errPass"] : false;

$errVrf = isset($_SESSION["errPassVrf"]) ? $_SESSION["errPassVrf"] : false;
?>
<html>

    <head>

        <?php include_once '../header.php'; ?>
        <title>Editar Perfil</title>
        <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/model.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {

                $("header").css("background-image", "url('<?= $imgBanner ?>')");
                $("#imgprofile").css("background-image", "url('<?= $imgUser ?>')");


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

                $("#btn_ubi").click(function () {
                    showSelectorRegion();
                });

                var $idCity = $(".contain_region").prop("id");
                if ($idCity === "0") {
                    showSelectorRegion();
                } else {
                    var containRegion = ".contain_region";
                    var containCity = ".contain_city";
                    remove(containRegion);
                    show(containCity);
                }

                $("select[name=regi]").change(function () {
                    id = $("select[name=regi]").val();
                    if (id === "-1") {
                        $("#provi").empty();
                        var containProvi = ".contain_provi";
                        var containCity = ".contain_city";
                        remove(containProvi);
                        remove(containCity);
                    } else {
                        $.ajax({
                            url: "../Controllers/AjaxController.php",
                            type: "post",
                            data: {"id": id, "sub": "province"},
                            dataType: "json"
                        }).done(function (data) {
                            if (data !== null) {
                                $("#provi").empty();
                                var element = $("#provi");
                                fill(data, element);
                                var containProvi = ".contain_provi";
                                show(containProvi);
                            }
                        });
                    }
                });

                $("select[name=provi]").change(function () {
                    id = $("select[name=provi]").val();
                    if (id === "-1") {
                        $("#city").empty();
                        var containCity = ".contain_city";
                        remove(containCity);
                    } else {
                        $.ajax({
                            url: "../Controllers/AjaxController.php",
                            type: "post",
                            data: {"id": id, "sub": "city"},
                            dataType: "json"
                        }).done(function (data) {
                            if (data !== null) {
                                $("#city").empty();
                                var element = $("#city");
                                fill(data, element);
                                var containCity = ".contain_city";
                                show(containCity);
                            }
                        });
                    }

                });
                $("input[name=check]").click(function () {
                    let id = $(this).val();
                    if (id === "0") {
                        $(this).attr("value", 1);
                    } else {
                        $(this).attr("value", 0);
                    }
                });
                function showSelectorRegion() {
                    var containRegion = ".contain_region";
                    var containCity = ".contain_city";
                    var btnUbi = "#btn_ubi";
                    show(containRegion);
                    remove(containCity);
                    remove(btnUbi);
                }
                function show(b) {
                    $(b).css({
                        "visibility": "visible",
                        "display": "flex"
                    });
                }
                function remove(a) {
                    $(a).css({
                        "visibility": "hidden",
                        "display": "none"
                    });
                }
                function fill(data, element) {
                    $(element).append('<option value=-1>Seleccione una opcion</option>');
                    for (var i = 0; i < data.length; i++) {
                        $(element).append('<option value=' + data[i].id + '>' + data[i].name + '</option>');
                    }

                }
                
                $(document).on('keyup', '#desc', function () {
                    if (document.querySelector("#desc").value.startsWith(" ")) {
                        document.querySelector("#desc").value = document.querySelector("#desc").value.replace(/\s+/g, "");
                    }
                });

            });
        </script>
    </head>

    <body>
        <div class="nav">
            <?php include_once '../nav.php'; ?>
        </div>
        <div class="contain_images">
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
                                <?php if ($user->profile->check == "1") { ?>
                                    <input type="checkbox" name="check" class="check_input" value="1" id="check" checked>     
                                <?php } else { ?>
                                    <input type="checkbox" name="check" class="check_input" value="0" id="check">
                                <?php } ?>
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
                                    <textarea name="desc" id="desc" class="input_field txtarea"><?= $user->profile->description ?></textarea>
                                </div>
                            </div>
                        </div>  
                        <div class="asf contain_region" id="<?= isset($city->id) ? $city->id : 0 ?>">
                            <div class="asf-conta">
                                <div>
                                    <label class="label_field">
                                        Region
                                    </label>
                                </div>
                                <select class="select" name="regi">

                                    <option value="-1" class="opt">Seleccione una opcion</option>

                                    <?php foreach ($regions as $region): ?>
                                        <option value="<?= $region->id ?>"><?= $region->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="asf contain_provi">
                            <div class="asf-conta">
                                <div>
                                    <label class="label_field">
                                        Comuna
                                    </label>
                                </div>
                                <select class="select" name="provi" id="provi">
                                    <option value="-1">Seleccione una opción</option>
                                </select>
                            </div>
                        </div>
                        <div class="asf contain_city">
                            <div class="asf-conta">
                                <div>
                                    <label class="label_field">
                                        Cuidad
                                    </label>
                                </div>
                                <select class="select" name="city" id="city">
                                    <?php if ($city->id === NULL) { ?>
                                        <option value="-1" class="opt">Seleccione una opcion</option>
                                    <?php } else { ?>
                                        <option value="<?= $city->id ?>" class="opt"><?= $city->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="contain_btn-flex">
                            <div class="contain_btn-edit">
                                <button type="button" class="btn_edit-ubi" id="btn_ubi">+Editar mi ubicación</button>
                            </div>
                        </div>
                        <button type="submit" name="submit" value="edit" class="btn-update">Guardar Cambios</button>
                        <div class="contain_drop">
                            <div id="btn_delete" class="btn-drop">Eliminar Cuenta</div>                        
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
                                <input type="password" name="oldPass" class="input_field" required value-data="<?php $err ?>">
                                <?php
                                if ($err == true) {
                                    echo "<div class='error'><label class='red'>*Contraseña incorrecta</label></div>";
                                    $_SESSION["errPass"] = null;
                                } else {
                                    echo "<div class='error hidden'><label class='red hidden'></label></div>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="op">
                            <div class="field_pass">
                                <label class="label_field">Contraseña nueva</label>
                                <input type="password" name="passNew" class="input_field" required>
                            </div>
                        </div>
                        <div class="op">
                            <div class="field_pass">
                                <label class="label_field">Confirmar contraseña</label>
                                <input type="password" name="passVrf" class="input_field" required>
                                <?php
                                if ($errVrf == true) {
                                    echo "<div class='error'><label class='red'>*Las contraseñas no coinciden</label></div>";
                                    $_SESSION["errPassVrf"] = null;
                                } else {
                                    echo "<div class='error hidden'><label class='red hidden'></label></div>";
                                }
                                ?>

                            </div>
                        </div>
                        <button type="submit" name="submit" value="change" class="btn-updatePass">Cambiar Contraseña</button>
                    </div>
                </form>
            </div>
        </main>
        <?php include_once '../footer.php'; ?>
        <?php include_once '../modal.php'; ?>
    </body>

    <script src="../js/nav.js"></script>
</html>
