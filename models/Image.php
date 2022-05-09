<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Image
 *
 * @author Prybet
 */
require_once '../PDO/Connection.php';

class Image {

    var $id;
    var $URL;
    var $post;
    var $status;

    public static function setImage($idp, $url) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO image VALUES (null, :url, :idp , 1)");
        $sen->bindParam(":url", $url);
        $sen->bindParam(":idp", $idp);
        if ($sen->execute()) {
            return true;
        }
    }

}
