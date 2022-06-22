
<div class="contain_post" id="<?= $post->id ?>"> <!-- data-val="<?= $post->id ?> -->
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
            <?php if($post->status->id === 7):?>
            <div class="name-cate">
                <label class="lbl_edit-post">(Editado)</label>
            </div>
            <?php endif;?>
            <button class="more-post" value="<?= $post->id ?>" id="id_<?= $post->id ?>">
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
                
                <button class="heartNotLike btnHeartOn_<?= $post->id ?>" data-post="<?= $post->id ?>" data-user="<?= $_SESSION["user"]->id ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512">
                        <path d="M349.6 64c-36.4 0-70.718 16.742-93.6 43.947C233.117 80.742 198.8 64 162.4 64 97.918 64 48 114.221 48 179.095c0 79.516 70.718 143.348 177.836 241.694L256 448l30.164-27.211C393.281 322.442 464 258.61 464 179.095 464 114.221 414.082 64 349.6 64zm-80.764 329.257l-4.219 3.873-8.617 7.773-8.616-7.772-4.214-3.869c-50.418-46.282-93.961-86.254-122.746-121.994C92.467 236.555 80 208.128 80 179.095c0-22.865 8.422-43.931 23.715-59.316C118.957 104.445 139.798 96 162.4 96c26.134 0 51.97 12.167 69.11 32.545L256 157.661l24.489-29.116C297.63 108.167 323.465 96 349.6 96c22.603 0 43.443 8.445 58.686 23.778C423.578 135.164 432 156.229 432 179.095c0 29.033-12.467 57.459-40.422 92.171-28.784 35.74-72.325 75.709-122.742 121.991z" fill="#bd93f9" class="color000 svgShape"/>
                    </svg>
                    <label class="cont-pst lblOn_<?= $post->id ?>" for="checkLike"><?= count($post->likes)?></label>
                </button>
                
                <button class="heartLike btnHeartOff_<?= $post->id ?>" data-post="<?= $post->id ?>" data-user="<?= $_SESSION["user"]->id ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512">
                        <path d="M429.9 95.6c-40.4-42.1-106-42.1-146.4 0L256 124.1l-27.5-28.6c-40.5-42.1-106-42.1-146.4 0-45.5 47.3-45.5 124.1 0 171.4L256 448l173.9-181c45.5-47.3 45.5-124.1 0-171.4z" fill="#bd93f9" class="color000 svgShape"/>
                    </svg>
                    <label class="cont-pst lblOff_<?= $post->id ?>" for="checkLike"><?= count($post->likes)?></label>
                </button>
                
            </div>
            <div class="flex_option">
                <button class="divcom" value="<?= $post->id ?>">
                    <img src="../img/Replys.png" class="img_option-post pointer">
                    <label class="cont-pst"><?= isset($post->replies) ? count($post->replies): 0 ?></label>
                </button> 
            </div>
            <div class="flex_option">
                <img src="../img/Spot.png" class="img_option-post pointer">
            </div>
        </div>
        
    </div>
</div>

