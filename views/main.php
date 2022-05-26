<!DOCTYPE html>
<?php
require_once '../models/Post.php';
session_start();
$allPosts = Post::getAllPosts();
$style = "grupe4Style.css";
?>
<html>
    <head>
        <?php include_once '../header.php'; ?>
        <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/nav.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".more-post").click(function(){

                    let id = $(this).val();
                    console.log(id);
                    
                    $("button[name=btn_report]").val(id);


                    $(".contain_modal-profile").css({
                        "pointer-events": "auto",
                        "opacity" : "1"
                    });
                    $("body").css({
                        "overflow" : "hidden",
                        "height" : "100vh",
                        "padding-right" : "17px"
                        
                    });
                    
                });
                $(".btn_cancel").click(function(){
                    $(".contain_modal-profile").css({
                        "pointer-events": "none",
                        "opacity" : "0"
                    });
                    $("body").css({
                        "overflow" : "auto",
                        "height" : "auto",
                        "padding-right" : "0"
                    });
                });
                $("#btn_report").click(function(){
                    $(".contain_modal-profile").css({
                    "pointer-events": "none",
                    "opacity" : "0"
                    });
                    $(".contain_modal-report").css({
                    "pointer-events": "auto",
                    "opacity" : "1"
                    });
                    
                });
                
                $(".btn_cancel-report").click(function(){
                    $(".contain_modal-report").css({
                    "pointer-events": "none",
                    "opacity" : "0"
                    });
                    $("body").css({
                        "overflow" : "auto",
                        "height" : "auto",
                        "padding-right" : "0"
                    });
                });
                $(".btn-gotospot").click(function(){
                    
                });

                
                
            })
        </script>
    </head>
    <body>
        <div class="a">
            <?php include_once '../nav.php'; ?>
        </div>  
        <div class="container_post">
            <div class="contain_post-grid">
                <main class="contain_main">
                    <a href="http://localhost/SocialSpot/views/newpost.php" class="upload">
                        <div class="upload__field">
                            <img src="../img/perfil.png" class="img img-user"></img>
                            <input type="text" class="upload__fiel-input" placeholder="Publicar" disabled />
                            <div class="img img-photo"></div>
                            <div class="img img-maps"></div>
                        </div>
                    </a>
                    <div class="post_most">
                        <div class="most most-grid">
                            <button class="most_btn">Mas nuevos</button>
                            <button class="most_btn">Mas votado</button>
                        </div>
                    </div>
                    <?php
                    foreach ($allPosts as $post):
                        include '../item.php';
                       
                    endforeach;
                    ?>
                </main>
                <div class="contain_popular">
                    <div class="t">
                        <section class="contain_popular-fixed">
                            <div class="contain_pupular-content">
                                <h2 class="descrip_h2 no-margin">Deportes populares:</h2>
                                <div class="descrip_sport">
                                    <div class="contain_lbl-pupular">
                                        <label class="descrip_label"><span>1. </span>Skate</label>
                                    </div>
                                    <div class="flex">
                                        <button class="btn_popular-cate">Unirse</button>
                                    </div>
                                </div>
                            </div>
                            
                        </section>
                        <footer class="flex-footer">
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
                        </fotter>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="contain_modal-profile">
            <div class="contain_mod">
                <div>         
                    <div class="contain_btn-profile">
                        <button class="btn btn-gotospot" id="btn_post">Ir a la publicacion</button>
                    </div> 
                    <div class="contain_btn-profile">
                        <button class="btn">Dejar de seguir</button>
                    </div>
                    <div class="contain_btn-profile">
                        <button class="btn" id="btn_report" value="">Reportar</button>
                    </div>
                    <div class="contain_btn-profile">
                        <button class="btn_cancel btn" id="btn_cancel">Cancelar</button>
                    </div>
                </div> 
            </div>
        </div> 

        <div class="contain_modal-report">
            <div class="contain_report">
                <div>
                    <div class="center">
                        <label class="question">
                            ¿Por que quieres reportar esta publicacion?
                        </label>
                    </div>
                    <form action="PostController" method="get" class="contain-form">
                        <div class="conta_rep">
                            <input type="checkbox">
                            <label>Contenido molestoso<label>
                        </div>  
                        <div class="second-div">
                            <label class="lbl-ques">Escriba su molestia de la publicacion<label>
                            <div class>
                                <input type="text" name="comm" placeholder="(Opcional)" class="upload__fiel-input input_report">
                            </div>
                        </div>          
                        <div class="contain_btn-profile">
                            <button type="submit" class="btn" id="btn_report" value="" name="btn_report">Reportar</button>
                        </div>
                        <div class="contain_btn-profile">
                            <button type="button" class="btn_cancel-report btn" id="btn_cancel" value="" name="cancel-report">Cancelar</button>
                        </div>
                    </form>
                </div> 
            </div> 
        </div> 
        
        <!-- <div class="modal-container">
            <div class="modal modal-close">
                <div>
                    <p>reportar</p>
                    <p class="close">cancelar</p>
                </div>
            </div>
        </div> -->
        <!-- <script lang="javascript" src="../js/model.js"></script> -->
    </body>
    
</html>