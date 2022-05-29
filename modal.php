<div class="contain_modal-profile">
    <div class="contain_mod">
        <div>         
            <div class="contain_btn-profile">
                <button class="btn btn-gotospot" id="" name="btn-gopost">Ir a la publicacion</button>
            </div> 
            <div class="contain_btn-profile">
                <button class="btn">Dejar de seguir/seguir</button>
            </div>
            <div class="contain_btn-profile">
                <button class="btn" id="btn_report" value="">Reportar</button>
            </div>
            <div class="contain_btn-profile">
                <button class="btn_cancel btn" id="btn_cancel">Cancelar</button>
            </div>
        </div> 
    </div>
</div> 

<div class="contain_modal-report">
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