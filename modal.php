
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
                <button class="btn" id="btn_delete-post" value="" >Eliminar Post</button>
            </div> 
            <div class="contain_btn-profile">
                <button class="btn_cancel btn" id="btn_cancel">Cancelar</button>
            </div>
        </div> 
    </div>
</div> 
<!-- MODAL REPORT-->
<div class="contain_modal">
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
<!-- DELETE POST -->
<div class="contain_modal" id="modal-delete">
    <div class="contain_mod">
        <form action="" method="" class="flex">
            <div class="div-delete">
                <div>
                    <label>¿Esta seguro de eliminar el Post?</label>
                </div>
                <div>
                    <button type="button">Eliminar</button>
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
        <button type="button" name="post" value="1"></button>
            <div class="div-edit">
                <div class="contin-edit">
                    <h2 class="lbledit">Editar Post</h2>
                </div>
                <div class="contin-edit">
                    <label>Titulo</label>
                    <textarea name="title" id="textTitle"></textarea>
                </div>
                <div class="contin-edit">
                    <label>Descripción</label>
                    <textarea name="body" id="textDesc"></textarea>
                </div>
                <div class="contain-edit-btn">
                    <div class="contain-btnedit">
                        <button type="submit" name="submit" value="edit">Editar</button>
                    </div>
                    <div class="contain-btnedit">
                        <button type="submit" name="submit" value="cancelEdit">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    
</div>