
<div class="modal contain_modal">
    <div class="contain_mod">
        <div>         
            <div class="contain_btn-profile">
                <button class="btn btn-gotospot" name="btn-gopost"id="btn-modal-gotopost">Ir a la publicacion</button>
            </div>
            <div class="contain_btn-profile contain_btn-follow" id="modal-follow-user">
                <form action="../controllers/UserController.php" method="post" class="frm-follow">
                    <?php if($pos == 0):?>
                        <input type="text" name="prof" value="<?= $prof->id ?>" hidden>
                        <button type="submit" name="submit" value="follow" class="btn_modal-follow" id="btn_editar">Seguir</button>
                    <?php endif;?>
                    <?php if($pos == 1):?>
                        <input type="text" name="prof" value="<?= $prof->id  ?>" hidden>
                        <button type="submit" name="submit" value="follow" class="btn_modal-follow" id="btn_editar">Dejar de Seguir</button>
                    <?php endif;?>
                </form>
            </div>
            <div class="contain_btn-profile contain_btn-report" id="modal-report-user">
                <button class="btn" id="btn_report">Reportar</button> 
            </div>
            <div class="contain_btn-profile contain_btn-editPost" id="modal-editPost">
                <button class="btn" value="" name="showEdit">Editar Post</button>
            </div>
            <div class="contain_btn-profile contain_btn-deletePost" id="modal-deletePost">
                <button class="btn" id="btn_delete-post" value="" name="showDelete">Eliminar Post</button>
            </div> 
            <div class="contain_btn-profile">
                <button class="btn_cancel btn" id="btn_cancel">Cancelar</button>
            </div>
        </div> 
    </div>
</div> 


<div class="contain_modal-profile" id="modal-delete_user">
    <div class="contain_mod">
       <div>
            <h2 class="lbl_h2">¿Esta seguro de eliminar su cuenta?</h2>

            <div class="contain_btn-profile" onclick="">
                <form action="../controllers/UserController.php" method="post">
                    <button type="submit" value="delete" name="submit" class="btn pointer" id="<?= $user->profile->id?>">Aceptar</button>
                </form>
            </div>
            <div class="contain_btn-profile">
                <button class="btn pointer" id="btn_cancel">Cancelar</button>
            </div>
       </div> 
    </div>
</div>


<div class="contain_modal" id="modal-report">
    <div class="contain_report">
        <div>
            <div class="center">
                <label class="question">
                    ¿Por que quieres reportar esta publicacion?
                </label>
            </div>
            <div class="contain-form">
                
            </div>
            <form action="../controllers/PostController.php" method="post" >
                <?php $i=0; foreach($norms as $n){ $i++;?>
                <div class="conta_rep">
                    <input type="radio" name="radio_report" class="checkReport" value="<?= $n->id ?>">
                    <label><?= $n->name ?><label>
                </div>  
                <?php }?>
                <div class="second-div">
                    <label class="lbl-ques">Escriba su molestia de la publicacion<label>
                    <div class>
                        <input type="text" name="when" value="<?= $id ?>" hidden>
                        <input type="text" name="goView" value="" id="view" hidden>
                        <input type="text" name="idpost" value="" id="inputIdPost" hidden>
                        <input type="text" name="com" placeholder="(Opcional)" class="upload__fiel-input input_report">
                    </div>
                </div>          
                <div class="contain_btn-profile">
                    <button type="submit" class="btn btn_report" value="report_post" name="submit">Reportar</button>
                </div>
                <div class="contain_btn-profile">
                    <button type="button" class="btn_cancel-report btn" id="btn_cancel" value="" name="cancel-report">Cancelar</button>
                </div>
            </form>
        </div> 
    </div> 
</div> 

<div class="contain_modal" id="modal-delete">
    <div class="contain_mod">
        <form action="../controllers/PostController.php" method="post" class="flex">
            <textarea name="postID" hidden></textarea>
            <div class="div-delete">
                <div>
                    <label name="postID" value="">¿Esta seguro de eliminar el Post?</label>
                </div>
                <div>
                    <button type="submit" name="submit" value="delete">Eliminar</button>
                </div>
                <div>
                    <button type="button" class="btn_cancel">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="contain_modal" id="modal-edit">
    <form action="../controllers/PostController.php" method="post" class="contain_mod" >
        <textarea name="postID" hidden></textarea>
        <div class="div-edit">
            <div class="contin-edit">
                <h2 class="lbledit">Editar Post</h2>
            </div>
            <div class="contin-edit">
                <label>Titulo</label>
                <textarea name="title" id="textTitle" required=""></textarea>
            </div>
            <div class="contin-edit">
                <label>Descripción</label>
                <textarea name="body" id="textDesc" required=""></textarea>
            </div>
            <div class="contain-edit-btn">
                <div class="contain-btnedit">
                    <button type="submit" name="submit" value="edit">Editar</button>
                </div>
            </div>
            <div class="contin-edit">
                <label>Hashtags</label>
                <div>
                    <input type="text" id="hashtags" name="inputHash"/>
                    <button type="button" value="1" name="hash" class="btnAddHash" >Añadir Hashtag</button>
                </div>
                </div>
                <div class="contain-hash">
                    <div id="oldHash" class="conten_oldHash">
                        
                        <div id="contnew" class="contin-hNew">
                        
                        </div>
                    </div>
                    
                </div>
                <div class="contain-btnedit">
                    <button type="button" id="cancelEdit">Cancelar</button>
                </div>
            </div>
            
            
        </div>
    </form>
    <script src="../js/viewpost.js"></script>
</div>


<div class="contain_modal modal-followers" id="modal-followers">
    <div class="contain_fs">
        <h2>Seguidores</h2>
        <div class="div-follow">
            <a class="contain-a">
                <?php 
                if($followers != null):
                foreach ($followers as $fs){ 
                    $profi = $fs->profile?>
                <div class="contain-foll" data-prof="<?= $profi->id?>">
                    <?php if($profi->imageURL === ""){
                      echo "<img src='../img/perfil.png' alt='usuariooo' class='img_noti pointer'>";
                    }else{
                        echo "<img src='../../SSpotImages/UserMedia/$profi->username-Folder/ProfileImages/$profi->imageURL' alt='usuario' class='img_noti pointer'>";
                     } ?>
                    <div class="noti_follow-inf">
                        <label class="pointer"><?= $profi->username?></label>
                    </div>
                </div>
                <?php }endif; ?>
            </a>
        </div>
    </div>
    <div class="contain_f">
        <h2>Seguidos</h2>
        <div class="div-follow">
            <a class="contain-a">
                <?php 
                if($follows != null):
                foreach ($follows as $f){ 
                    $profi = $f->profile?>
                <div class="contain-foll" data-prof="<?= $profi->id?>">
                    <?php if($profi->imageURL === ""){
                      echo "<img src='../img/perfil.png' alt='usuariooo' class='img_noti pointer'>";
                    }else{
                        echo "<img src='../../SSpotImages/UserMedia/$profi->username-Folder/ProfileImages/$profi->imageURL' alt='usuario' class='img_noti pointer'>";
                     } ?>
                    <div class="noti_follow-inf">
                        <label class="pointer"><?= $profi->username?></label>
                    </div>
                </div>
                <?php }endif; ?>
            </a>
            <button type="button" class="btn_exit-followers">Salir</button>
        </div>
    </div>
</div>


<?php 
$err = isset($_SESSION["modalReport"]) ? $_SESSION["modalReport"] : false;
if($err == true){
    echo '<div class="contain_modal modal-warning" id="modal-warning">
            <div class="contain_mod">
                <div class="div-warning">
                    <div class="conta_warn">
                        <img src="../img/check.png">
                        <label class="lblWar">Reporte enviado</label>
                        <button type="button" class="btn-warning">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>';
    $_SESSION["modalReport"] = null;
}else{
    echo '';
    
}
?>
