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
<body class="no-margin">
    <?php include_once '../nav.php'; ?>
        <!-- <main class="container">
            <div class="container_flex">
                <div class="container_sdf">
                    <div class="post">
                        <div class="post__field">
                            <div class="img img-user"></div>
                            <input type="text" class="post__fiel-input" placeholder="Publicar" />
                            <div class="img img-photo"></div>
                            <div class="img img-point"></div>
                        </div>
                    </div>

                    <div class="post_most">
                        <div class="most most-grid">
                            <button class="most_btn">Mas nuevos</button>
                            <button class="most_btn">Destacado</button>
                            <button class="most_btn">Mas votado</button>
                        </div>
                    </div>
                    <?php foreach ($allPosts as $post): ?>
                        <div class="container_post">
                            <div class="container_p">
                                <div class="container_descr">
                                    <div class="img img-post"> <img style="height: 30px" src="../../SSpotImages/CategoryImages/CategoryImages/ProfileImages/<?= $post->category->imageURL ?>"></div>
                                    <div class="flex">
                                        <label class="label_post l_one"><?= $post->category->name ?></label>
                                        <div class="who l_two">
                                            <label class="label_post" >Posted by </label>
                                            <p class="p_post"><?= $post->userProfile->username ?></p>
                                        </div>
                                        <label class="label_post  l_three">difil</label>
                                        <label class="label_post l_four"><?= $post->date ?></label>
                                        <label class="l_five">hola</label>
                                    </div>
                                </div>
                            </div>
                         
                        <div class="container_info">
                            <div class="container_info-descrip">
                                <h2 class="h2_title"><?= $post->title ?></h2>
                                <p><?= $post->body ?> </p>
                            </div>
                        </div>
                            <?php foreach ($post->images as $image): ?>
                            
                        <div class="container_img">
                            <img src="../../SSpotImages/UserMedia/<?= $image->URL ?>" class="img img_post">
                        </div>
                            <?php endforeach; ?>
                            <?php foreach ($post->videos as $video): ?>
                            
                        <div class="container_img">
                            <img src="../../SSpotImages/UserMedia/<?= $video->URL ?>" class="img img_post">
                        </div>
                            <?php endforeach; ?>
                        <div class="flex_option">
                            <div class="container_option">
                                <div>
                                    <img src="" /><label>
                                        <3</label>
                                    <!--esto se saca-->
                                    <label>266</label>
                                </div>
                                <div>
                                    <img src="" /><label>[ ]</label>
                                    <!--esto se saca-->
                                    <label>232</label>
                                </div>
                                <div>
                                    <img src="" /><label>RUTA</label>
                                    <!--esto se saca-->
                                </div>
                            </div>
                        </div>             
                    </div>
                    <?php endforeach; ?>   
                </div>
            </div>
            <div>
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
                <div class="flex-footer">
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
            </div>
        </main> -->
    </body>

</html>