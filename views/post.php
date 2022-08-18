<!DOCTYPE html>
<?php
require_once '../models/User.php';
require_once '../models/Post.php';
require_once '../models/Reply.php';
require_once '../models/Category.php';
$id = isset($_GET["id"]) ? $_GET["id"] : "";
if ($id != "") {
    header("Location: ../controllers/postController?id=" . $id);
}
session_start();
$ip = Connection::$ip;
$style = "grupe3Style.css";
$user = $_SESSION["user"];
$post = $_SESSION["post"]->reload();
$category = $post->category;
$norms = Norm::getAll();
?>
<html>
    <head>
        <?php include '../header.php'; ?>
        <title>Post</title>
        <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/model.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".lbl_reply").click(function () {
                    let val = $(this).attr("value");
                    console.log(val);
                    $(".txt_" + val).css({
                        "visibility": "visible",
                        "display": "flex"
                    });
                    $(".lbl_reply_" + val).css({
                        "visibility": "none",
                        "display": "none"
                    });
                    $(".btn_reply-right_" + val).css({
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
                $("#view").attr("value", "post");
                $(".contain_post").attr("data-val", "p");
                document.getElementById("modal-follow-user").outerHTML = "";
                document.getElementById("modal-followers").outerHTML = "";
                document.getElementById("modal-editPost").outerHTML = "";
                document.getElementById("modal-deletePost").outerHTML = "";
                document.getElementById("modal-delete_user").outerHTML = "";
                document.getElementById("modal-delete").outerHTML = "";
                document.getElementById("modal-edit").outerHTML = "";
                document.getElementById("btn-modal-gotopost").outerHTML = "";

              
                $(".btn_foll").click(function () {
                    var id = $(this).val();
                        window.location.href = "http://localhost/SocialSpot/views/interests?id=" + id + "&context=Category";
                });
                $(".contain_post").css({
                   "margin" : "0" 
                });

            });

        </script>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

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
                        <div>
                            <?php include_once "../hashtags.php"; ?>
                        </div>
                        <div class="container_reply">
                            <form action="../controllers/PostController.php" method="post" class="container_reply_field">
                                <label class="com">Comentar como <span><?= $user->username ?></span></label>
                                <div class="container_color">
                                    <div>
                                        <textarea name="comm" class="input_textarea" placeholder="¿En que estas pensando?"></textarea>
                                    </div>
                                    <?php if ($_SESSION["user"]->userType->id != 2): ?>
                                        <div class="flexo">
                                            <button type="submit" name="submit" value="comm" class="btn_reply">Comentar</button>
                                        </div>
                                    <?php else: ?>
                                        <div class="flexo">
                                            <button type="submit" name="submit" value="goLogin" class="btn_reply">Comentar</button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </form>
                            <hr />
                            <?php
                            foreach ($post->replies as $i => $comm) :
                                $imgg = isset($comm->profile->imageURL) ? "../../SSpotImages/UserMedia/" . $comm->profile->username . "-Folder/ProfileImages/" . $comm->profile->imageURL : "../img/perfil.png";
                                if ($comm->profile->imageURL == "-" || $comm->profile->imageURL == "") {
                                    $imgg = "../img/perfil.png";
                                }
                                ?>
                                <div class="contain_reply">

                                    <div class="contain_reply-profile">
                                        <img src="<?= $imgg ?>" class="img_profile-reply">
                                        <div class="contain_reply_details">
                                            <div class="nom_time">
                                                <label class="lbl_nom-repl"><?= $comm->profile->username ?></label>
                                                <label><?= Post::getDate($comm->date, $comm->time) ?></label>
                                            </div>
                                            <p class="reply_comm"><?= $comm->body ?></p>
                                            <label class="lbl_reply lbl_reply_<?= $i ?>" value="<?= $i ?>">Responder</label>                                    
                                            <form action="../controllers/PostController.php" method="post" class="frm-reply" >
                                                <input name="comId" value="<?= $comm->id ?>" hidden>
                                                <textarea class="input_textarea textarea_reply txt_<?= $i ?>" name="body"></textarea>
                                                <?php if ($_SESSION["user"]->userType->id != 2): ?>
                                                    <div class="flexrigth">
                                                        <button type="submit" name="submit" value="reply" class="btn_reply-right btn_reply-right_<?= $i ?>" id="btn_com">Comentar</button>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="flexrigth">
                                                        <button type="submit" name="submit" value="goLogin" class="btn_reply-right btn_reply-right_<?= $i ?>" id="btn_com">Comentar</button>

                                                    </div>
                                                <?php endif; ?>

                                            </form>
                                            <?php
                                            foreach ($comm->replies as $reply) :
                                                $img = isset($reply->profile->imageURL) ? "../../SSpotImages/UserMedia/" . $reply->profile->username . "-Folder/ProfileImages/" . $reply->profile->imageURL : "../img/perfil.png";
                                                if ($reply->profile->imageURL == "-" || $reply->profile->imageURL == "") {
                                                    $img = "../img/perfil.png";
                                                }
                                                ?>
                                                <div class="contan_rep">
                                                    <img src="<?= $img ?>" class="img_profile-reply">
                                                    <div class="contain_rep">
                                                        <div class="nom_time">
                                                            <label class="lbl_nom-repl"><?= $reply->profile->username ?></label>
                                                            <label><?= Post::getDate($reply->date, $reply->time) ?></label>
                                                        </div>
                                                        <p class="reply_comm"><?= $reply->body ?></p>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>  
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="contain_right">
                        <section class="details_cate">
                            <div class="contai">
                                <div class="contain_img-post">
                                    <img id="catImage" src="../../SSpotImages/InterestsImages/CategoryImages/ProfileImages/<?= $post->category->imageURL ?>" class="img_cate" alt="Imagen de Perfil"/>
                                </div>
                                <div>
                                    <h2 id="catName" class="cate_name"><?= $post->category->name ?></h2>
                                </div>
                            </div>
                            <div class="contain_descrip">
                                <div class="contain_descrip">
                                    <p class="p_descrip"> <?= $post->category->description ?> </p>
                                    <div class="contain_btn-foll">
                                        <button class="btn_foll" value="<?= $post->category->id ?>">Ver Categoría</button>
                                    </div>
                                </div>
                            </div>         
                        </section> 
                        <?php if ($post->spot != null): ?>
                            <div class="contain_spot">
                                <div class="contain_spot-info">
                                    <div class="con_imgSpot">
                                        <img src="<?= $post->spot->imageURL ?>" class="imgSpot"/>
                                    </div>
                                    <div>
                                        <h2 class="h2_dif">/<?= $post->spot->name ?></h2>
                                        <h2 class="h2_dif">/<?= $post->spot->description ?></h2>
                                    </div>
                                </div>
                                <div class="contain-map">
                                    <div id="map" class="maps" style="height: 100%; width: 100%;">
                                        <img src="https://maps.googleapis.com/maps/api/staticmap?center=<?= $post->spot->marker->LAT ?>,<?= $post->spot->marker->LNG ?>&markers=size:mid%7Ccolor:red%7C<?= $post->spot->marker->LAT ?>,<?= $post->spot->marker->LNG ?>&zoom=16&size=400x400&key=AIzaSyAoIk1JmdYKisyQO66mBl1ZTUT8B71pYIY" alt="alt"/>
                                    </div> 
                                </div>
                            </div>
                        <?php endif; ?>
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
                                    <label>SocialSpot Inc 2022</label>
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
        <?php include_once '../modal.php'; ?>
    </body>
    <script src="../js/nav.js"></script>

</html>
