<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Video
 *
 * @author Prybet
 */

require_once '../PDO/Connection.php';

class Video {

    var $id;
    var $URL;
    var $post;
    var $status;

    public static function setVideo($idp, $url) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO video VALUES (null, :url, :idp , 1)");
        $sen->bindParam(":url", $url);
        $sen->bindParam(":idp", $idp);
        if ($sen->execute()) {
            return true;
        }
    }

    public static function getVideos($idp) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM video WHERE post_id = :idp ");
        $sen->bindParam(":idp", $idp);
        if ($sen->execute()) {
            $videos = $sen->fetchAll();
            $list = array();
            foreach ($videos as $video) {
                $vid = new Video();
                $vid->id = $video[0];
                $vid->URL = $video[1];
                $vid->post = $video[2];
                $vid->status = $video[3];
                $list[] = $vid;
            }
            return $list;
        }
    }

}
