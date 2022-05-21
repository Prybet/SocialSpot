
<div class="contain_post">
    <div class="container_p">
        <img src="../../SSpotImages/CategoryImages/CategoryImages/ProfileImages/<?= $post->category->imageURL ?>" class="img-cate">
        <div class="name-prim">
            <label class="color-lig"><?= $post->category->name ?></label>
        </div>
        <div class="name-cate">
            <label class="color-lig">Publicado Por <span><?= $post->userProfile->username ?></span></label>
        </div>
        <div class="name-cate">
            <label class="color-lig"><?= $post->date ?></label>
        </div>
        <div class="name-cate">
            <label>Dificil</label>
        </div>
        <div class="more-post">
            <img src="../img/MenuPoints.png" class="pointer" id="btn_menu">
        </div>
    </div>

    <div class="container_info">
        <div class="container_info-descrip">
            <h2 class="color-ora"><?= $post->title ?></h2>
            <p class="color-lig cont-p"><?= $post->body ?></p>
        </div>
    </div>

    <?php foreach ($post->images as $image): ?>
    <div class="container_img">
        <img src="../../SSpotImages/UserMedia/<?= $image->URL ?>" class="img_post">
    </div>
    <?php endforeach; ?>
    
    <?php if($post->videos !=null):foreach ($post->videos as $video): ?>
    <div class="container_img">
        <img src="../../SSpotImages/UserMedia/<?= $video->URL ?>" class="img_post">
    </div>
    <?php endforeach;endif; ?>

    <div class="flex_option">
        <div class="container_option-post">
            <div class="flex_option">
                <img src="../img/Like.png" class="img_option-post pointer">
                <label class="cont-pst">1</label>
            </div>
            <div class="flex_option">
                <img src="../img/Replys.png" class="img_option-post pointer">
                <label class="cont-pst">1</label>
            </div>
            <div class="flex_option">
                <img src="../img/Spot.png" class="img_option-post pointer">
            </div>
        </div>
    </div> 
</div>
