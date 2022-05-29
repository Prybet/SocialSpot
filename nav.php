<nav>
    <div class="contain_logo flex">
        <a class="a_logo" href="http://localhost/SocialSpot/views/index.php">
            <img src="../img/logo.png" class="img_logo pointer" />
        </a>
    </div>

    <div class="contain_search flex">
        <form class="no-margin flex" id="frm">
            <div class="conta" id="contain_search">
                <input type="text" id="search" class="input_search no-margin" placeholder="Buscar" />
                <button class="btn_find">
                    <img src="../img/find.png" class="img_search size-img no-margin pointer" />
                </button>
                <scroll-container class="ocultar" id="scroll">
                    <a class="search_user pointer">
                        <img src="../img/perfil.png" alt="usuario" class="img_noti pointer">
                        <div class="noti_follow-inf">
                            <label class="pointer">User/Username <span class="spn_date">10 seguidores</span></label>
                        </div>
                    </a>
                </scroll-container>
            </div>
        </form>
    </div>

    <div class="contain_ico flex">
        <div class="contain_map">
            <button>
                <img src="../img/map.png" class="size-img" />
            </button>
        </div>

        <div class="contain_noti">
            <button class="img_noti-ico btn-show pointer" id="btn_noti">
                <img src="../img/notify.png" class="img-noti size-img" />
                <div class="decorate_noti"></div>
            </button>

        </div>
        <scroll-container-noti>
            <div class="noti_none flex">
                <p>Actualmente sin notificaciones</p>
            </div>
            <a class="noti_follow pointer">
                <img src="../img/perfil.png" alt="usuario" class="img_noti pointer">
                <div class="noti_follow-inf">
                    <label class="pointer"><span>Marlene</span> comenzó a seguirte. <span class="spn_date">Hace 2 horas</span></label>
                </div>
                <div class="cont_noti-b">
                    <button class="pointer">Seguir</button>
                </div>
            </a>

        </scroll-container-noti>

        
        <div class="contain_user btn-show flex">
            <button class="btn_user-nav">
                <div class="img_user flex" id="btn_user" for="checkbox_menu">
                    <img src="../img/perfil.png" class="size-img img-user pointer" />
                    <div class="lbluser pointer">Usuario</div>
                    <div class="decorate_user "></div>
                </div>
            </button>
            
            
            <div class="contain_option " id="conteiner_option">
                <button class="option flex">
                    <div class="op flex" id="btn_userr">
                        <img src="../img/user.png" class="separation size-img pointer">
                        <label class="pointer">Ver Perfil</label>
                    </div>
                </button>
                <button class="option flex">
                    <label class="content-input">
                        <div class="op flex">
                            <input type="checkbox">Conectado<i></i>
                        </div>
                    </label>
                </button>
                <button class="option flex">
                    <div class="xx op flex">
                        <img src="../img/configuration.png" class="separation size-img pointer">
                        <label class="pointer">Editar Perfil</label>
                    </div>
                </button>
                <div class="line"></div>
                <button class="option flex">
                    <div class="op flex">
                        <img src="../img/exit.png" class="separation size-img pointer">
                        <label class="lbl_c pointer">Cerrar Sesion</label>
                    </div>
                </button>
            </div>
        </div>
    </div>
    
</nav>
