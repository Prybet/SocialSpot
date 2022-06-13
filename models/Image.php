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

    public static function getImages($idp) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM image WHERE post_id = :idp ");
        $sen->bindParam(":idp", $idp);
        if ($sen->execute()) {
            $images = $sen->fetchAll();
            $list = array();
            foreach ($images as $image) {
                $im = new Image();
                $im->id = $image[0];
                $im->URL = $image[1];
                $im->post = $image[2];
                $im->status = $image[3];
                $list[] = $im;
            }
            return $list;
        }
    }
    
    public function delete() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE image SET Status_ID = 6  WHERE id = :id");
        $sen->bindParam(":id", $this->id);
        if($sen->execute()){
            return true;
        }
    }

}
