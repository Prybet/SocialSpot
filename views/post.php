<!DOCTYPE html>
<?php
require_once '../models/User.php';
require_once '../models/Post.php';
require_once '../models/Reply.php';
require_once '../models/Category.php';
session_start();
$style = "grupe3Style.css";
$user = $_SESSION["user"];
$post = $_SESSION["post"];
$post->userProfile = $user->profile;
if ($post == null) {
    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    header("Location: ../controllers/postController.php?id=" . $id);
}
?>
<html>
<head>
    <?php include '../header.php'; ?>

    <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/nav.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#btn_reply-show").click(function () {
                $(".textarea_reply").css({
                    "visibility": "visible",
                    "display": "flex"
                });
                $(".lbl_reply").css({
                    "visibility": "none",
                    "display": "none"
                });
                $(".btn_reply-right").css({
                    "visibility": "visible",
                    "display": "flex"
                });
            });  
            $("#btn_com").click(function () {
                $(".textarea_reply").css({
                    "visibility": "hidden",
                    "display": "none"
                });
                $(".lbl_reply").css({
                    "visibility": "visible",
                    "display": "flex"
                });
                $(".btn_reply-right").css({
                    "visibility": "hidden",
                    "display": "none"
                });
            }); 
            
            
        });
    </script>
</head>
<body>
    <div class="nav">
        <?php include_once '../nav.php'; ?>
    </div>
    <main>
        <div class="container_post">
            <div class="contain_post-grid">
                <div class="contain_post-general">
                    <?php include '../item.php'; ?>
                    <div class="container_reply">
                        <form action="../controllers/PostController.php" method="post" class="container_reply_field">
                            <label>Comentar como <span><?= $user->username ?></span></label>
                            <div class="container_color">
                                <div>
                                    <textarea name="comm" class="input_textarea" placeholder="¿En que estas pensando?"></textarea>
                                </div>
                                <div class="flexo">
                                    <button type="submit" name="submit" value="comm" class="btn_reply">Comentar</button>
                                </div>
                            </div>
                        </form>
                        <hr />
                        <div class="contain_reply">
                            <div class="contain_reply-profile">
                                <img src="../img/perfil.png" class="img_profile-reply">
                                <div class="contain_reply_details">
                                    <div class="nom_time">
                                        <label class="lbl_nom-repl">Usuario</label>
                                        <label>Hace 1 min</label>
                                    </div>
                                    <p class="reply_comm">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum quam pariatur nostrum nobis doloremque eveniet facere in repellat id accusamus possimus ratione, quod delectus itaque, officiis voluptates aliquid fuga quas?</p>
                                    <label class="lbl_reply" id="btn_reply-show">Responder</label>
                                    <form action="">
                                        <textarea class="input_textarea textarea_reply"></textarea>
                                        <div class="flexrigth">
                                            <button type="submit" name="submit" value="comm" class="btn_reply-right" id="btn_com">Comentar</button>
                                        </div>
                                    </form>
                                    
                                    <div class="contan_rep">
                                        <img src="../img/perfil.png" class="img_profile-reply">
                                        <div class="contain_rep">
                                            <div class="nom_time">
                                                <label class="lbl_nom-repl">Usuario</label>
                                                <label>Hace 1 min</label>
                                            </div>
                                            <p class="reply_comm">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorum quam pariatur nostrum nobis doloremque eveniet facere in repellat id accusamus possimus ratione, quod delectus itaque, officiis voluptates aliquid fuga quas?</p>
                                        </div>
                                    </div>
                                    
                                </div>  
                            </div>
                        </div>
                        <!-- <?php foreach ($post->replies as $comm) : ?>
                            <div class="c">
                                <div>
                                    <img src="../../SSpotImages/UserMedia/<?= $comm->profile->username ?>-Folder/ProfileImages/<?= $comm->profile->imageURL ?>">
                                    <label><?= $comm->profile->username ?></label>
                                    <label><?= $comm->date ?></label>
                                </div> 
                                <p><?= $comm->body ?></p>
                                
                                <?php foreach ($comm->replies as $reply) : ?>
                                <div class="c">
                                    <div>
                                        <img src="../../SSpotImages/UserMedia/<?= $reply->profile->username ?>-Folder/ProfileImages/<?= $reply->profile->imageURL ?>">
                                        <label><?= $reply->profile->username ?></label>
                                        <label><?= $reply->date ?></label>
                                    </div> 
                                    <p><?= $reply->body ?></p>
                                    
                                </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?> -->
                    </div>
                </div>
                
                <div class="contain_right">
                    <section class="details_cate">
                        <div class="contai">
                            <div class="contain_img">
                                <img id="catImage" src="../img/perfil.png" class="img_cate" alt="Imagen de Perfil"/>
                            </div>
                            <div>
                                <h2 id="catName" class="cate_name">/Name</h2>
                            </div>
                        </div>
                        <div class="contain_descrip">
                            <div class="contain_descrip">
                                <p class="p_descrip">Lorem ipsum dolor sit amet consectetur adipisicing 
                                    elit. Delectus repellendus laborum corporis veritatis
                                    odit animi officiis blanditiis necessitatibus 
                                    commodi incidunt ad facilis fuga asperiores, 
                                    doloribus iste quo nam sint nesciunt.
                                </p>
                                <div class="contain_btn-foll">
                                    <button class="btn_foll">Seguir</button>
                                </div>
                            </div>
                        </div>         
                    </section> 
                    <div class="contain_spot">
                        <h2 class="h2_dif">/Dificil</h2>
                        <div class="contain_map">
                            <!-- FALTA MAPA -->
                        </div>
                        <div class="contain_vote">
                            <div class="contain_vote-tittle">
                                <label class="who_vote">Vota dificultad</label>
                            </div>
                            <div class="contain_voted">
                                <div class="flex-column">
                                    <label>Fácil</label>
                                    <input type="radio" name="dif">
                                </div>
                                <div class="flex-column">
                                    <label>Medio</label>
                                    <input type="radio"  name="dif">
                                </div>
                                <div class="flex-column">
                                    <label>Difícil</label>
                                    <input type="radio"  name="dif">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container_mode">
                        <h2 class="h2_mode">Moderadores</h2>
                        <div class="mode_contain">
                            <div class="flex_mode">
                                <div class="img_mode img"></div>
                                <label class="lbl_mode">Contactar con Moderadores</label>
                            </div>
                        </div>
                        <div class="mode_email">
                            <label class="lbl_mode-email">u/modder0001</label>
                        </div>
                    </div>
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
    </main>
        
    </body>
</html>