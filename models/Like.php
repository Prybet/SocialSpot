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
    var $profID;
    var $postID;
    var $date;
    var $time;
    var $status;

    public static function setLike($like) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO .like VALUES (null, :prof, :post, :date, :time, 12)");
        $sen->bindParam(":prof", $like->profID);
        $sen->bindParam(":post", $like->postID);
        date_default_timezone_set("America/Santiago");
        $date = date("Y-m-d", $timestamp = time());
        $time = date("H:i:s", $timestamp = time());
        $sen->bindParam(":date", $date);
        $sen->bindParam(":time", $time);
        if ($sen->execute()) {
            return true;
        }
    }

    public static function getLikes($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM .like WHERE post_id = :post AND status_id = 12");
        $sen->bindParam(":post", $id);
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            $list = array();
            foreach ($res as $like) {
                $l = new Like();
                $l->id = $like[0];
                $l->profile = Profile::getProfileForReplies($like[1]);
                $l->profID = $like[1];
                $l->postID = $like[2];
                $l->date = $like[3];
                $l->time = $like[4];
                $l->status = Status::getStatu($like[5]);
                $list[] = $l;
            }
            return $list;
        }
    }

    public static function getLike($idUser, $idPost) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM .like WHERE User_ID = :idUser AND Post_ID = :idPost");
        $sen->bindParam(":idUser", $idUser);
        $sen->bindParam(":idPost", $idPost);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function updateLike($idUser, $idPost) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE .like SET status_id = 6 WHERE User_ID = :idUser AND Post_ID = :idPost");
        $sen->bindParam(":idUser", $idUser);
        $sen->bindParam(":idPost", $idPost);
        if ($sen->execute()) {
            return true;
        }
    }

    public static function updateLikeGiven($idUser, $idPost) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE .like SET status_id = 12 WHERE User_ID = :idUser AND Post_ID = :idPost");
        $sen->bindParam(":idUser", $idUser);
        $sen->bindParam(":idPost", $idPost);
        if ($sen->execute()) {
            return true;
        }
    }

    // TEST
    public static function findLike($idProf, $idPost) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM .like WHERE Profile_ID = :idprof AND Post_ID = :idPost");
        $sen->bindParam(":idprof", $idProf);
        $sen->bindParam(":idPost", $idPost);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                $rs = $sen->fetch();
                return self::updateLik($rs[0], $rs[5]);
            } else {
                $like = new Like();
                $like->profID = $idProf;
                $like->postID = $idPost;
                return self::setLike($like);
            }
        } else {
            return false;
        }
    }

    public static function updateLik($id, $sta) {
        $st = 1;
        
        if ($sta == 6) {
            $st = 12;
        }

        if ($sta == 12) {
            $st = 6;
        }

        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE .like SET status_id = :status WHERE id = :id");
        $sen->bindParam(":id", $id);
        $sen->bindParam(":status", $st);
        if ($sen->execute()) {
            return true;
        }
        
    }

}
