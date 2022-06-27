<!DOCTYPE html>
<!--
SocialSpot 2022
Made by: 
 jasmet_generico1
 soulbroken
 Prybet
-->
<div class="contain_hashtag">
    <div id="cont-hash">

    </div>
    <?php foreach ($post->hashtags as $hashtag): ?>
    <label class="conten_lbl-hash" id="conten_lbl-hash_<?= $hashtag->id ?>">
        <?= $hashtag->name ?>
        <div class="conten_btn-hashtag">
            <button type="button" class="btn_hashtag" value="<?= $hashtag->id ?>">x</button>
        </div>
    </label>
    <?php endforeach; ?>
</div>
