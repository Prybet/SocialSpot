<nav>
    <?php
    $user = $_SESSION["user"];
    $profile = $user->profile;
    $imgUser = isset($profile->imageURL) ? "../../SSpotImages/UserMedia/" . $profile->username . "-Folder/ProfileImages/" . $profile->imageURL : "../img/perfil.png";
    if($profile->imageURL === "-" || $profile->imageURL === ""){
        $imgUser = "../img/perfil.png";
    }
    $username = isset($profile->username) ? $profile->username : "Usuario";
    ?>
    <div class="x_search">
        X
    </div>
    <div class="contain_logo flex">
        <a class="a_logo" href="<?= $ip ?>/SocialSpot/views/index.php">
            <img src="../img/Social.png" class="img_logo pointer" />
        </a>
    </div>

    <div class="contain_search">
        <form action="../controllers/InterestController.php" method="post" class="no-margin flex" id="frm">
            <div class="conta" id="contain_search">
                <input type="text" id="search" autocomplete="off" name="nom" class="input_search no-margin" placeholder="Buscar" />
                <button type="submit" name="submit" value="search" class="btn_find">
                    <img src="../img/find.png" class="img_search size-img no-margin pointer" />
                </button>
                <scroll-container class="ocultar" id="scroll-find" data-user="<?= $user->id ?>">
                    
                </scroll-container>
            </div>
        </form>
    </div>

    <div class="contain_ico flex">
        <form action="../controllers/UserController.php" method="post">
            <div class="contain_user btn-show flex">
                <?php if ($_SESSION["user"]->userType->id != 2): ?>
                    <button type="button" class="btn_user-nav">
                        <div class="img_user flex pointer" id="btn_user" for="checkbox_menu">
                            <div class="contain_user-ft">
                                <img src="<?= $imgUser ?>" class="imgUSer pointer" />
                            </div>
                            
                            <div class="lbluser pointer"><?= $username ?></div>
                            <div class="decorate_user "></div>
                        </div>
                    </button>

                    <div class="contain_option " id="conteiner_option">
                        <button type="submit" name="submit" value="goUser" class="option flex pointer">
                            <div class="op flex" id="btn_userr">
                                <img src="<?= $imgUser ?>" class="separation size-img ">
                                <span>Ver Perfil</span>
                            </div>
                        </button>
                        <button  class="option flex">
                            <label class="content-input">
                                <div class="op flex">
                                    <input type="checkbox">Conectado<i></i>
                                </div>
                            </label>
                        </button>
                        <button type="submit" name="submit" value="goEdit" class="option flex pointer">
                            <div class="xx op flex">
                                <img src="../img/configuration.png" class="separation size-img pointer">
                                <span class="pointer">Editar Perfil</span>
                            </div>
                        </button>
                        <div class="line"></div>
                        <button type="submit" name="submit" value="close" class="option flex pointer">
                            <div class="op flex">
                                <img src="../img/exit.png" class="separation size-img pointer">
                                <span class="lbl_c pointer">Cerrar Sesion</span>
                            </div>
                        </button>
                    </div>
                <?php else: ?>
                    <button type="submit" name="submit" value="goLogin" class="btn_goLogin pointer">
                        Iniciar Sesión
                    </button>
                <?php endif; ?>
            </div>
        </form>
    </div>

</nav>
