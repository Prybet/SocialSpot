<nav>
    <div class="contain_logo flex">
        <div class="contain_logo no-margin">
            <img src="../img/logo.png" class="img_logo pointer" />
        </div>
    </div>

    <div class="contain_search flex">
        <form class="no-margin flex" id="frm">
            <div class="conta">
                <input type="text" id="search" class="input_search no-margin" placeholder="Buscar" />
                <button class="btn_find">
                    <img src="../img/find.png" class="img_search size-img no-margin pointer" />
                </button>
                <scroll-container>
                    <p>1Some text some text some text some text..</p>
                </scroll-container>
            </div>
        </form>
    </div>

    <div class="contain_ico flex">
        <div class="contain_noti">
            <button class="img_noti btn-show pointer" id="btn_noti">
                <img src="../img/notify.png" class="size-img" />
                <div class="decorate_noti"></div>
            </button>

        </div>
        <scroll-container-noti>
             <p>1Some text some text some text some text..</p>
        </scroll-container-noti>

        <div class="contain_user btn-show flex">
            <button class="img_user flex" id="btn_user">
                <img src="../img/person.png" class="size-img img-user pointer" />
                <label class="lbluser pointer">Usuario</label>
                <div class="decorate_user"></div>
            </button>

            <div class="contain_option" id="conteiner_option">
                <div class="option flex">
                    <div class="op flex">
                        <img src="../img/user.png" class="separation size-img pointer">
                        <label class="pointer">Ver Perfil</label>
                    </div>
                </div>
                <label class="content-input option flex">
                    <div class="op flex">
                        <input type="checkbox">Conectado<i></i>
                    </div>
                </label>
                <div class="option flex">
                    <div class="xx op flex">
                        <img src="../img/configuration.png" class="separation size-img pointer">
                        <label class="pointer">Editar Perfil</label>
                    </div>
                </div>
                <div class="line"></div>
                <div class="option flex">
                    <div class="op flex">
                        <img src="../img/exit.png" class="separation size-img pointer">
                        <label class="lbl_c pointer">Cerrar Sesion</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</nav>
