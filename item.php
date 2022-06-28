<?php
$veri = 0;
foreach($post->likes as $like):
    if($like->userID == $_SESSION["user"]->id){
         $veri = 1;
    }
endforeach; 

if($post->userProfile->id != $_SESSION["user"]->id){
    $urlUser = $ip ."/SocialSpot/views/profilepublic.php?id=" . $post->userProfile->id;
}else{
    $urlUser = $ip ."/SocialSpot/views/profile.php?";
}
?>
<div class="contain_post" id="<?= $post->id ?>"> <!-- data-val="<?= $post->id ?> -->
    <div class="contain_post-top">
        <div class="container_p">
            <a href="<?= $ip ?>/SocialSpot/views/interests.php?id=<?=$post->category->id?>" class="container_p conta-p">
                <img src="../../SSpotImages/CategoryImages/CategoryImages/ProfileImages/<?= $post->category->imageURL ?>" class="img-cate">
                <div class="name-prim">
                    <span class="color-lig"><?= $post->category->name ?></span>
                </div>
            </a>
            
            <div class="name-cate">
                <label class="color-lig">Publicado Por 
                    <a href="<?= $urlUser ?>" class="conta_a-user">
                        <span><?= $post->userProfile->username ?></span>
                    </a>
                    
                </label>
            </div>
            <div class="name-cate">
                <label class="color-lig"><?= $post->date ?></label>
            </div>
            <div class="name-cate">
                <label>Dificil</label>
            </div>
            <?php if($post->status->id === 7):?>
            <div class="name-cate">
                <label class="lbl_edit-post">(Editado)</label>
            </div>
            <?php endif;?>
            <?php if ($_SESSION["user"]->userType->id != 2): ?>
                <button class="more-post" value="<?= $post->id ?>" id="id_<?= $post->id ?>">
                    <img src="../img/MenuPoints.png" class="pointer">
                </button>
            <?php else: ?>
                <form action="../controllers/PostController.php" method="post">
                    <button type="submit" name="submit" value="goLogin" class="more-post">
                        <img src="../img/MenuPoints.png" class="pointer">
                    </button>
                </form>
            <?php endif; ?>
            
        </div>
        <div class="container_info">
            <div class="container_info-descrip">
                <h2 class="color-ora"><?= $post->title ?></h2>
                <p class="color-lig cont-p"><?= $post->body ?></p>
            </div>
        </div>
    </div>

    <div class="contain-img contain-img_<?= $post->id ?>" id="<?= $post->id ?>" data-val="0">
        <button class="img_images-ico cont-left img_ico_<?= $post->id ?>" id="<?= $post->id ?>">
            <img src="../img/left.png" class="img-left img-left_<?= $post->id ?>">
        </button>
        <button class="img_images-ico cont-right img_ico_<?= $post->id ?>" id="<?= $post->id ?>">
            <img src="../img/right.png" class="img-right img-right_<?= $post->id ?>">
        </button>
        <?php if ($post->videos != null):foreach ($post->videos as $video): ?>
                <div class="container_img container_img_<?= $post->id ?>">
                    <video controls class="img_post group_<?= $post->id ?>">
                        <source src="../../SSpotImages/UserMedia/<?= $video->URL ?>" type="video/mp4"/>
                    </video>
                </div>
                <?php
            endforeach;
        endif;
        ?>
        <?php foreach ($post->images as $i => $image): ?>
            <div class="container_img container_img_<?= $post->id ?>">          
                <img src="../../SSpotImages/UserMedia/<?= $image->URL ?>" class="img_post group_<?= $post->id ?>">
            </div>
        <?php endforeach; ?>


    </div>
    <div class="flex_option">
        <div class="container_option-post">
            <div class="flex_option">
                <?php if ($_SESSION["user"]->userType->id != 2): ?>
                <button class="heartLike btnHeartOff_<?= $post->id ?>" data-post="<?= $post->id ?>" data-user="<?= $_SESSION["user"]->id ?>"style="display: flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512">
                        <path d="M429.9 95.6c-40.4-42.1-106-42.1-146.4 0L256 124.1l-27.5-28.6c-40.5-42.1-106-42.1-146.4 0-45.5 47.3-45.5 124.1 0 171.4L256 448l173.9-181c45.5-47.3 45.5-124.1 0-171.4z" fill="#bd93f9" class="color000 svgShape"/>
                    </svg>
                    <label class="cont-pst lblOff_<?= $post->id ?>" for="checkLike"><?= count($post->likes)?></label>
                </button>
                <?php else: ?>
                <form action="../controllers/PostController.php" method="post">
                    <button class="heartLike btnHeartOff_<?= $post->id ?>" data-post="<?= $post->id ?>" data-user="<?= $_SESSION["user"]->id ?>"style="display: flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512">
                            <path d="M429.9 95.6c-40.4-42.1-106-42.1-146.4 0L256 124.1l-27.5-28.6c-40.5-42.1-106-42.1-146.4 0-45.5 47.3-45.5 124.1 0 171.4L256 448l173.9-181c45.5-47.3 45.5-124.1 0-171.4z" fill="#bd93f9" class="color000 svgShape"/>
                        </svg>
                        <label class="cont-pst lblOff_<?= $post->id ?>" for="checkLike"><?= count($post->likes)?></label>
                    </button>
                </form>
                <?php endif; ?>
                
                
            </div>
            <div class="flex_option">
                <button class="divcom" value="<?= $post->id ?>">
                    <img src="../img/reply.png" class="img_option-post pointer">
                    <label class="cont-pst"><?= isset($post->replies) ? count($post->replies): 0 ?></label>
                </button> 
            </div>
            <div class="flex_option">
                <img src="../img/map.png" class="img_option-post pointer">
            </div>
        </div>
        
    </div>
</div>

