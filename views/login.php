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
            
            var counter = 1;
            setInterval(function(){
                document.getElementById("radio" + counter).checked = true;
                counter++;
                if(counter > 4){
                    counter = 1;
                }
            },5000);
            
        </script>
    </head>
    <body class="no-margin container-flex">
        <div class="aaa">
        <div class="container-grid">
            <div class="container-flex">
                <div class="cont">
                    <div class="flex">
                        <img src="../img/logo.png" class="img_logoo" />
                    </div>
                    <p>SocialSpot es más que una red social, te ayuda a compartir
                        todos esos momento de adrenalina con todo el mundo
                    </p>
                    <div class="contain_slide">
                        <div class="slider">
                            <div class="slides">
                                <input type="radio" name="radio-btn" id="radio1">
                                <input type="radio" name="radio-btn" id="radio2">
                                <input type="radio" name="radio-btn" id="radio3">
                                <input type="radio" name="radio-btn" id="radio4">

                                <div class="slide first">
                                    <img src="../img/img1.png" alt="">
                                </div>
                                <div class="slide ">
                                    <img src="../img/img2.png" alt="">
                                </div>
                                <div class="slide ">
                                    <img src="../img/img3.jpg" alt="">
                                </div>
                                <div class="slide ">
                                    <img src="../img/img4.jpg" alt="">
                                </div>

                                <div class="navigation-auto">
                                    <div class="auto-btn1"></div>
                                    <div class="auto-btn2"></div>
                                    <div class="auto-btn3"></div>
                                    <div class="auto-btn4"></div>
                                </div>

                                <div class="navigation-manual">
                                    <label for="radio1" class="manual-btn"></label>
                                    <label for="radio2" class="manual-btn"></label>
                                    <label for="radio3" class="manual-btn"></label>
                                    <label for="radio4" class="manual-btn"></label>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <?php 
                    $err = isset($_SESSION["err"]) ? $_SESSION["err"] : false;
                    if($err == true){
                        echo "<div class='error'><label class='red'>*Credenciales incorrectas</label></div>";
                        $_SESSION["err"] = null;
                    }else{
                        echo "<div class='error hidden'><label class='red hidden'></label></div>";
                        
                    }
                    ?>
                    
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
