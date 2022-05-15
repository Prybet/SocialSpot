<?php foreach ($allPosts as $post): ?>
    <div class="container_post">
        <div class="container_p">
            <div class="container_descr">
                <div class="flex_desc">
                <div class="img img-post"> <img style="height: 30px" src="../../SSpotImages/CategoryImages/CategoryImages/ProfileImages/<?= $post->category->imageURL ?>"></div>
                    <label class="label_post l_one"><?= $post->category->name ?></label>
                    <div class="l_two">
                        <label class="label_post_by" >Posted by </label>
                        <p class="p_post"><?= $post->userProfile->username ?></p>
                    </div>
                    <label>difil</label>
                    <label class="l_four"><?= $post->date ?></label>
                    <div class="l_five img"></div>
                </div>
            </div>
        </div>
        
        <div class="container_info">
            <div class="container_info-descrip">
                <h2><?= $post->title ?></h2>
                <p><?= $post->body ?></p>
            </div>
        </div>

        <?php foreach ($post->images as $image): ?>
        <div class="container_img">
            <img src="../../SSpotImages/UserMedia/<?= $image->URL ?>" class="img img_post">
        </div>
        <?php endforeach; ?>

        <?php foreach ($post->videos as $video): ?>
        <div class="container_img">
            <img src="../../SSpotImages/UserMedia/<?= $video->URL ?>" class="img img_post">
        </div>
        <?php endforeach; ?>
        <div class="flex_option">
            <div class="container_option">
                <div class="flex_img">
                    <img class="img_like img">
                </div>
                <div class="flex_img">
                    <img class="img_comen img">
                </div>
                <div class="flex_img">
                    <img class="img_pointer img">
                </div>
            </div>
        </div>             
    </div>
<?php endforeach; ?>  