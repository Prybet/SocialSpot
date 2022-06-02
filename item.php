
<div class="contain_post" id="<?= $post->id?>"  data-val="<?= $post->id?>">
    <div class="contain_post-top">
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
            <button class="more-post" value="<?= $post->id?>" id="id_<?= $post->id?>">
                <img src="../img/MenuPoints.png" class="pointer">
            </button>
        </div>

        <div class="container_info">
            <div class="container_info-descrip">
                <h2 class="color-ora"><?= $post->title ?></h2>
                <p class="color-lig cont-p"><?= $post->body ?></p>
            </div>
        </div>
    </div>
    
    <div class="contain-img contain-img_<?= $post->id?>" id="<?= $post->id?>" data-val="0">
        <input type="text" value="1" id="input" hidden>
        <div class="img_images-ico cont-left img_ico_<?= $post->id?>" id="<?= $post->id?>">
            <img src="../img/left.png" class="img-left img-left_<?= $post->id?>">
        </div>
        <div class="img_images-ico cont-right img_ico_<?= $post->id?>" id="<?= $post->id?>">
            <img src="../img/right.png" class="img-right img-right_<?= $post->id?>">
        </div>

        <?php foreach ($post->images as $i => $image): ?>
        <div class="container_img container_img_<?= $post->id?>">          
            <img src="../../SSpotImages/UserMedia/<?= $image->URL ?>" class="img_post group_<?= $post->id ?>">
        </div>
        <?php endforeach; ?>
    </div>
    
    
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
                <button class="divcom" value="<?= $post->id?>">
                    <img src="../img/Replys.png" class="img_option-post pointer">
                    <label class="cont-pst">1</label>
                </button> 
            </div>
            <div class="flex_option">
                <img src="../img/Spot.png" class="img_option-post pointer">
            </div>
        </div>
    </div> 
</div>

