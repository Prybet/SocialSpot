<!DOCTYPE html>
<?php
require_once '../models/Post.php';
require_once '../PDO/Connection.php';
session_start();
$posts = Post::getAllPosts();
$norms = Norm::getAll();
$style = "grupe4Style.css";
$user = $_SESSION["user"]->getLogin();
$ip = Connection::$ip;
?>
<html>
    <head>
        <?php include_once '../header.php'; ?>
        <title>SocialSpot</title>
        <script lang="javascript" src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/model.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {

                document.getElementById("modal-delete_user").outerHTML = "";
                document.getElementById("modal-followers").outerHTML = "";
                document.getElementById("modal-edit").outerHTML = "";
                document.getElementById("modal-delete").outerHTML = "";
                document.getElementById("modal-editPost").outerHTML = "";
                document.getElementById("modal-deletePost").outerHTML = "";
                $("#view").attr("value", "main");
                
                let vali = $("#btn-vali").val();
                if(vali == 2){
                    $(".most-grid").css({
                        "grid-template-columns" : "1fr 1fr"
                    });
                }
                
                
                $(".btn_popular-cate").click(function (){
                    var id = $(this).val();
                    window.location.href = ip +"/SocialSpot/views/interests?id="+id+"&context=Category";
                });
            });

        </script>
    </head>
    <body>
        <div class="a">
            <?php include_once '../nav.php'; ?>
        </div>  
        <div class="container_post">
            <div class="contain_post-grid">
                <main class="contain_main">
                    <a href="<?= $ip ?>/SocialSpot/views/newpost" class="upload">
                        <div class="upload__field">
                            <img src="<?= $imgUser ?>" class="img img-user"></img>
                            <input type="text" class="upload__fiel-input" placeholder="Publicar" disabled />
                            <div class="img img-photo"></div>
                            <div class="img img-maps"></div>
                        </div>
                    </a>
                    <div class="post_most">
                        <div class="most most-grid">
                            <?php if($_SESSION["user"]->userType->id != 2): ?>
                            <button class="most_btn" id="btnme"><?=$_SESSION["user"]->profile->username ?>'s Feed</button>
                            <?php endif; ?>
                            <button class="most_btn" id="btn-vali" value="<?= ($_SESSION["user"]->userType->id) ?>">Nuevos</button>
                            <button class="most_btn">Destacados</button>
                        </div>
                    </div>
                    <?php
                    foreach ($posts as $ipts => $post):
                        include '../item.php';
                    endforeach;
                    ?>
                </main>
                <div class="contain_popular">
                    <div class="t">
                        <section class="contain_popular-fixed">
                            <div class="contain_pupular-content">
                                <div class="contain_h2-des">
                                    <h2 class="descrip_h2 no-margin">Categorias populares:</h2>
                                    <h2 class="lbl-hi-h2"></h2>
                                </div>
                                <?php foreach (Category::getTop() as $i => $cate) : ?>

                                    <div class="descrip_sport">
                                        <div class="contain_lbl-pupular">
                                            <label class="descrip_label"><span> <?= $i + 1 ?>  </span> <?= $cate->name ?></label>
                                        </div>
                                        <div class="flex">
                                            <button class="btn_popular-cate"  value="<?= $cate->id ?>">Ver mas</button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
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