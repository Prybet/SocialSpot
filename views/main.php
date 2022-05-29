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
        <script src="../js/model.js"></script>
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

        <?php include_once '../modal.php'; ?>
        
    </body>    
    <script src="../js/nav.js"></script>
</html>