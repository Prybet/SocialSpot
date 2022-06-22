
<!-- DELETE USER -->
<div class="contain_modal-profile">
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

<!-- MAIN CONTAIN -->
<div class="modal contain_modal">
    <div class="contain_mod">
        <div>         
            <div class="contain_btn-profile">
                <button class="btn btn-gotospot" name="btn-gopost">Ir a la publicacion</button>
            </div>
            <div class="contain_btn-profile contain_btn-follow">
                <button class="btn">Dejar de seguir/seguir</button>
            </div>
            <div class="contain_btn-profile contain_btn-report">
                <button class="btn" id="btn_report" value="">Reportar</button> 
            </div>
             <div class="contain_btn-profile contain_btn-editPost">
                <button class="btn" value="" name="showEdit">Editar Post</button>
            </div>
            <div class="contain_btn-profile contain_btn-deletePost">
                <button class="btn" id="btn_delete-post" value="" name="showDelete">Eliminar Post</button>
            </div> 
            <div class="contain_btn-profile">
                <button class="btn_cancel btn" id="btn_cancel">Cancelar</button>
            </div>
        </div> 
    </div>
</div> 
<!-- MODAL REPORT-->
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
<!-- DELETE POST -->
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
<!-- EDIT POST -->
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
                    <input type="text" id="hashtags"/>
                    <button type="button" value="1" name="hash" class="btnAddHash" >Añadir Hashtag</button>
                </div>
                </div>
                <div class="contin-edit" id="conthashs">
                
                </div>
                <div class="contain-btnedit">
                    <button type="button" id="cancelEdit">Cancelar</button>
                </div>
            </div>
            
            
        </div>
    </form>
    <script src="../js/viewpost.js"></script>
</div>

<!-- VIEW FOLLOWERS -->
<div class="contain_modal modal-followers" id="modal-followers">
    <div class="contain_fs">
        <h2>Seguidores</h2>
        <div class="div-follow">
            <a class="contain-a">
                <?php 
                if($followers != null):
                foreach ($followers as $fs){ ?>
                <div class="contain-foll" data-prof="<?= $fs->id?>">
                    <?php if($fs->imageURL === ""){
                      echo "<img src='../img/perfil.png' alt='usuariooo' class='img_noti pointer'>";
                    }else{
                        echo "<img src='../../SSpotImages/UserMedia/$fs->username-Folder/ProfileImages/$fs->imageURL' alt='usuario' class='img_noti pointer'>";
                     } ?>
                    <div class="noti_follow-inf">
                        <label class="pointer"><?= $fs->username?></label>
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
                foreach ($follows as $f){ ?>
                <div class="contain-foll" data-prof="<?= $f->id?>">
                    <?php if($f->imageURL === ""){
                      echo "<img src='../img/perfil.png' alt='usuariooo' class='img_noti pointer'>";
                    }else{
                        echo "<img src='../../SSpotImages/UserMedia/$f->username-Folder/ProfileImages/$f->imageURL' alt='usuario' class='img_noti pointer'>";
                     } ?>
                    <div class="noti_follow-inf">
                        <label class="pointer"><?= $f->username?></label>
                    </div>
                </div>
                <?php }endif; ?>
            </a>
            <button type="button" class="btn_exit-followers">Salir</button>
        </div>
    </div>
    
</div>