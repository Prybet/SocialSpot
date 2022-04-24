<!DOCTYPE html>
<!--
SocialSpot 2022
Made by: 
 jasmet_generico1
 soulbroken
 Prybet
-->
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registro de usuario</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- style con perfomance-->
    <link rel="preload" href="../css/style.css" as="style">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="preload" href="../css/normalice.css" as="style">
    <link rel="stylesheet" href="../css/normalize.css">

    <link rel="preload" href="../css/fontColor.css" as="style">
    <link rel="stylesheet" href="../css/fontColor.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

</head>
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
                <input type="text" name="name" class="input_field" placeholder="Nombre de usuario">
            </div>
            <div class="field">
                <input type="name" name="user" class="input_field" placeholder="Nombre">
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
