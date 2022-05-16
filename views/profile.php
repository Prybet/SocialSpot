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
$style = "grupe7Style.css";
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
            $("header").css("background-image", "url('../../SSpotImages/UserMedia/<?= $user->profile->username?>-Folder/BannerImages/<?= $user->profile->bannerURL?>')");
            $("#imgprofile").css("background-image", "url('../../SSpotImages/UserMedia/<?= $user->profile->username?>-Folder/ProfileImages/<?= $user->profile->imageURL?>')");
        });
    </script>
    <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/nav.js"></script>
</head>

<body>
    <div class="a">
        <?php include_once '../nav.php'; ?>
    </div>
    <header>
        <div class="ftprofile">

        </div>
        <button class="btn_editar">Editar Perfil</button>
    </header>
    <div class="contain-info-profile">
       <div class="name_user">
           <label>Username</label>
           <label>/</label>
           <label>Name</label>
       </div> 
       <div class="follow">
            <div>
                <label class="cont">2</label>
                <label class="lbl-ligthgray">-</label>
                <label class="lbl-ligthgray">Publicaciones</label>
            </div>
            <div>
                <label class="cont">30</label>
                <label class="lbl-ligthgray">-</label>
                <label class="lbl-ligthgray">Seguidores</label>
            </div>
            <div>
                <label class="cont">127</label>
                <label class="lbl-ligthgray">-</label>
                <label class="lbl-ligthgray">Seguidos</label>
            </div>
       </div>
    </div>
    
    <div class="contain">
        <div class="contain_grid">
            <main>
                <div class="upload">
                    <div class="upload__field">
                        <div class="img img-user"></div>
                        <input type="text" class="upload__fiel-input" placeholder="Publicar" />
                        <div class="img img-photo"></div>
                        <div class="img img-maps"></div>
                    </div>
                </div>

                <div class="post_most">
                    <div class="most most-grid">
                        <button class="most_btn">Mas nuevos</button>
                        <button class="most_btn">Destacado</button>
                        <button class="most_btn">Mas votado</button>
                    </div>
                </div>
                
                <div class="container_post">
                    <div class="container_p">
                        <div class="container_descr">
                            <div class="flex_desc">
                            <div class="img img-post"> 
                                <img></div>
                                <label class="label_post l_one">Skate</label>
                                <div class="l_two">
                                    <label class="label_post_by" >Posted by </label>
                                    <p class="p_post">Juan pepe moco</p>
                                </div>
                                <label>difil</label>
                                <label class="l_four">hora</label>
                                <div class="l_five img"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="container_info">
                        <div class="container_info-descrip">
                            <h2>Mi primer Post</h2>
                            <p>Aca se escribe una wea?</p>
                        </div>
                    </div>

                    <div class="container_img">
                        <img src="../img/banner.jpg" class="img img_post">
                    </div>
                   
                    <div class="flex_option">
                        <div class="container_option">
                            <div class="flex_img">
                                <img class="img_like img">
                            </div>
                            <div class="flex_img">
                                <img class="img_comen img">
                            </div>
                            <div class="flex_img">
                                <img class="img_pointer img">
                            </div>
                        </div>
                    </div>             
                </div> 
            </main>

            <div class="conten">
                <section>
                    <h2 class="h2_descrip">Descripcion</h2>
                    <div class="contain_descrip">
                        <p class="p_descrip">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed facilis qui fugit totam sint earum dolor molestiae neque, ad nesciunt facere. Dicta obcaecati cupiditate at, dolorem soluta iusto laudantium sint?</p>
                    </div>
                </section>
                
                <footer>
                    <div class="flex-footer flex">
                        <div class="container_footer">
                            <div class="footer_grid">
                                <label>Ayuda</label>
                                <a href="#">Acerca De</a>
                            </div>
                            <div class="footer_grid">
                                <label>Comunidades</label>
                                <a href="#">Empleo</a>
                            </div>
                            <div class="footer_relleno">
                                <label>Temas</label>
                                <div>
                                    <div class="rell"><a href="#" >Blog</a></div>
                                    <div class="rell"><a href="#" >Anunciarse</a></div>
                                    <div class="rell"><a href="#" >Politica de Privacidad</a></div>
                                    <div class="rell"><a href="#" >Politica de Moderación</a></div>
                                </div>
                            </div>
                            <div class="esp">
                                <label>Naxhinternational Inc 2022</label>
                            </div>
                            <div class="esp">
                                <label>Todos los derechos Reservados.</label>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div> 
    </div>
        
</body>
</html>
