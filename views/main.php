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
</head>
<body>
    <div class="a">
        <?php include_once '../nav.php'; ?>
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
                <?php include_once '../pst.php'; ?>
            </main>
            <div class="conten">
                <section>
                    <div class="flex">
                        <div class="qwe">
                            <div class="container__descrip">
                                <div class="descrip">
                                    <h2 class="descrip_h2 no-margin">Deportes populares:</h2>
                                    <div class="descrip_sport">
                                        <label class="descrip_label">1. Skate</label>
                                        <button class="descrip_btn">Unirse</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
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
                                <label>SocialStreme Inc 2022</label>
                            </div>
                            <div class="esp">
                                <label>Todos los derechos Reservados.</label>
                            </div>
                        </div>
                    </div>
                </fotter>
            </div>
        </div> 
    </div>
</body>

</html>