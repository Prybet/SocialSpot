<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */


/**
 * Description of Like
 *
 * @author Prybet
 */

require_once '../PDO/Connection.php';
require_once '../models/Status.php';
require_once 'Profile.php';
require_once 'Post.php';
class Like {
    var $id;
    var $userID;
    var $postID;
    var $date;
    var $time;
    var $status;
    
    
    public function setLike() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO socialspotdb.like VALUES (null, :user, :post, :date, :time, 12)");
        $sen->bindParam(":user", $this->userID);
        $sen->bindParam(":post", $this->postID);
        date_default_timezone_set("America/Santiago");
        $date = date("Y-m-d",$timestamp = time());
        $time = date("H:i:s",$timestamp = time());
        $sen->bindParam(":date", $date);
        $sen->bindParam(":time", $time);
        if ($sen->execute()) {
            return true;
        }
    }
    
    public static function getLikes($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM socialspotdb.like WHERE post_id = :post AND status_id = 12");
        $sen->bindParam(":post", $id);
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            $list = array();
            foreach ($res as $likes) {
                $l = new Like();
                $l->id = $likes[0];
                $l->userID = $likes[1];
                $l->postID = $likes[2];
                $l->date = $likes[3];
                $l->time = $likes[4];
                $l->status = $likes[5];
                $list[] = $l;
            }
            return $list;
        }
    }

    public static function setLikeApp($like){
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO socialspotdb.like VALUES(null, :userID, :postID, :date, :time, :status)");
        
        $u = $like->userID->id;
        $sen->bindParam(":userID", $u);
        $sen->bindParam(":postID", $like->postID);
        $sen->bindParam(":date", $like->date);
        $sen->bindParam(":time", $like->time);
        $s = $like->status->id;
        $sen->bindParam(":status", $s);
        if($sen->execute()){
            return true;
        }
    }
    
}
