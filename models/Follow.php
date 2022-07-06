<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Follow
 *
 * @author Prybet
 */
require_once '../PDO/Connection.php';
require_once 'Profile.php';

class Follow {

    var $id;
    var $profile;
    var $me;
    var $date;
    var $time;
    var $status;
    //Inserta el seguido retornando un true
    public function setFollow() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO follow VALUES(null, :prof, :me, :date, :time, 12)");
        $sen->bindParam(":prof", $this->profile);
        $sen->bindParam(":me", $this->me);
        date_default_timezone_set("America/Santiago");
        $date = date("Y-m-d", $timestamp = time());
        $time = date("H:i:s", $timestamp = time());
        $sen->bindParam(":date", $date);
        $sen->bindParam(":time", $time);
        if ($sen->execute()) {
            return true;
        }
    }
    //busca todos los seguidores que tiene cierto profile con el estado a Given
    public static function getFollowers($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM follow WHERE profile_ID = :id AND Status_ID = 12");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $rs = $sen->fetchAll();
            $list = array();
            foreach ($rs as $fo) {
                $f = new Follow();
                $f->profile = Profile::getProfileForReplies($fo[2]);
                $f->date = $fo[3];
                $f->time = $fo[4];
                $f->status = Status::getStatu($fo[5]);
                $list[] = $f;
            }
            return $list;
        }
    }
    //busca todos los seguidos que tiene cierto profile con el estado a Given
    public static function getFollows($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM follow WHERE Follower_ID = :id AND Status_ID = 12");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $rs = $sen->fetchAll();
            $list = array();
            foreach ($rs as $fo) {
                $f = new Follow();
                $f->profile = Profile::getProfileForReplies($fo[1]);
                $f->date = $fo[3];
                $f->time = $fo[4];
                $f->status = Status::getStatu($fo[5]);
                $list[] = $f;
            }
            return $list;
        }
    }
    //Hace validaciones para objetener la id del status que queramos cambiar
    public function updateFollow($follow) {
        $conn = new Connection();
        if ($follow->status->id == 12) {
            $status = 6;
        }
        if ($follow->status->id == 6) {
            $status = 12;
        }
        $sen = $conn->mysql->prepare("UPDATE follow SET Status_ID = :status  WHERE id = :id");
        $sen->bindParam(":id", $follow->id);
        $sen->bindParam(":status", $status);
        if ($sen->execute()) {
            return true;
        }
    }
    //Busca el seguidos, si no hay se va a insertar, si no va acutalizarse, evitando crear otro nuevo dato en el objeto follow
    public function findFollow($follow) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT id, status_id FROM follow WHERE Follower_ID = :foll AND profile_ID = :prof");
        $sen->bindParam(":foll", $follow->me);
        $sen->bindParam(":prof", $follow->profile);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                $res = $sen->fetch();
                $follow = new Follow();
                $follow->id = $res[0];
                $follow->status = Status::getStatu($res[1]);
                return self::updateFollow($follow);
            }else{
                return self::setFollow();
            }
            
        }
    }
    
    

}
