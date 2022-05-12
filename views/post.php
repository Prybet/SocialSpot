<!DOCTYPE html>
<?php
require_once '../models/User.php';
require_once '../models/Post.php';
require_once '../models/Category.php';
session_start();
$style = "grupe4Style.css";
$user = $_SESSION["user"];
$post = $_SESSION["post"];
?>
<html>
    <?php include '../header.php'; ?>
    <body class="no-margin">
        <main class="container">
            <div class="a">
                <div class="i">
                    <div class="j">
                        <img height="30px" src="../../SSpotImages/CategoryImages/CategoryImages/ProfileImages/<?= $post->category->imageURL?>"><label>imagen</label>
                        <label>/<?= $post->category->name?></label>
                        <label class="j">Posted by <p> /<?= $user->username ?></p></label>
                        <label><?= $post->date ?></label>
                        <label>difil</label>
                        <img src=""/>imagenTRESPUNTOS<!--esto se saca-->
                    </div>
                    <div>
                        <h2><?= $post->title ?></h2>
                        <p><?= $post->body ?></p>    
                    </div>
                    <div class="k">
                        <img>
                        <label >imagen</label><!--esto se saca-->
                    </div>
                    <div class="p">
                        <?php foreach ($post->images as $image) : ?>
                            <div>

                                <img style="height: 300px" src="../../SSpotImages/UserMedia/<?= $image->URL ?>"/><label><3</label><!--esto se saca-->
                                <label>266</label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <form class="b">
                    <div>
                        <label>Comentar como <span><?= $user->username ?></span></label>
                    </div>
                    <div>
                        <textarea placeholder="¿En que estas pensando?"></textarea>
                    </div>
                    <button>Comentar</button>
                </form>
                <hr/>
                <div class="c">
                    <div>
                        <img src="">
                        <label>imagen</label>
                        <label>User123</label>
                        <label>Hacer 4 h</label>
                    </div> 
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                    <img src="">
                </div>
            </div>
            <div>
                <form class="descrip">
                    <div>
                        <img src=""/> 
                        <label>X---imagen ---x</label><!--esto se saca-->
                        <label>/MountainBike</label>
                    </div>
                    <div>
                        <p>ads fs dafd sds dfdsasd ssdf f sdds dsfdsda sfsda sa dssd sfsfs fsfdsasdfd adsfdsaf sdf dsaf dsf sadf sdaf dsaf sdaf sdaf dsagfddgfd gds</p>
                    </div>
                    <div>
                        <button>Siguiendo</button>
                    </div>
                </form>
                <div class="e">
                    <h2>/DIFicil</h2>
                    <div class="g">

                    </div>
                </div>
                <div class="l">
                    <h2>Moderadores</h2>
                    <div>
                        <button>Contactar con Moderadores</button>
                    </div>
                    <label>u/modder0001</label>
                    <label>u/modder0354</label>
                </div>
                <div class="d">
                    <div>
                        <label>Ayuda</label>
                        <a href="#">Acerca De</a>
                    </div>
                    <div>
                        <label>Comunidades</label>
                        <a href="#">Empleo</a>
                    </div>
                    <div class="o">
                        <label>Temas</label>
                        <div>                        
                            <div><a href="#">Blog</a></div>                        
                            <div><a href="#">Anunciarse</a></div>                        
                            <div><a href="#">Politica de Privacidad</a></div>        
                            <div>
                                <a href="#">Politica de Moderación</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>SocialStreme Inc 2022</label>
                    </div>
                    <div>
                        <label>Todos los derechos Reservados.</label>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>