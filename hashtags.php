<!DOCTYPE html>
<!--
SocialSpot 2022
Made by: 
 jasmet_generico1
 soulbroken
 Prybet
-->
<div>
    <?php foreach ($post->hashtags as $hashtag): ?>
        <button type="button" value="<?= $hashtag->id ?>"><?= $hashtag->name ?></button>
    <?php endforeach; ?>
</div>
