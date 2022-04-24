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
if ($_SESSION["user"]->userType->id == 2) {
    header("location: ../views/index.php");
}
$user = $_SESSION["user"];
?>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Editar Usuario</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <!-- style con perfomance-->
        <link rel="preload" href="../css/style.css" as="style">
        <link rel="stylesheet" href="../css/style.css">

        <link rel="preload" href="../css/normalize.css" as="style">
        <link rel="stylesheet" href="../css/normalize.css">

        <link rel="preload" href="../css/fontColor.css" as="style">
        <link rel="stylesheet" href="../css/fontColor.css">
    </head>
    <body>
        <main class="container main">
            <form action="../controllers/UserController.php" enctype="multipart/form-data" method="post" class="createUser">
                <h1>Editar perfil</h1>
                <div>
                    <img src="../../SSpotImages/ProfileImages/<?= $user->profile->imageURL?>" >
                    <input type="file" name="image">
                </div>
                <div class="field">
                    <label class="label_field">Nombre de Usuario</label>
                    <input type="text" name="user" class="input_field" value="<?= $user->username ?>" disabled>
                </div>
                <div class="field">
                    <label class="label_field">Correo Electronico</label>
                    <input type="email" name="email" class="input_field" value="<?= $user->email ?>" disabled>
                </div>
                <div class="field">
                    <label class="label_field">Nombre</label>
                    <input type="text" name="name" class="input_field" value="<?= $user->profile->name ?>">
                </div>
                <div class="field">
                    <label class="label_field">Fecha de Nacimiento</label>
                    <input type="date" name="birth" class="input_field" value="<?= $user->profile->birthDate ?>">
                </div>
                <div>
                    <label class="label_field">Descripción</label>
                    <textarea name="desc" value=""><?= $user->profile->description ?></textarea>
                </div>

                <button type="submit" name="submit" value="edit" class="btn-create">Guardar Cambios</button>

                <div class="field">
                    <label class="label_field">Contraseña actual</label>
                    <input type="password" name="oldPass" class="input_field" placeholder="Antigua contraseña">
                </div>
                <div class="field">
                    <label class="label_field">Contraseña nueva</label>
                    <input type="password" name="newPass" class="input_field"placeholder="Nueva contraseña">
                    <input type="password" name="newPass" class="input_field" placeholder="Confirmar contraseña">
                </div>
                <button type="submit" name="submit" value="change" class="btn-create">Cambiar contraseña</button>
            </form>
        </main>
    </body>
</html>
