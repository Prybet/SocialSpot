<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Hashtag
 *
 * @author Prybet
 */
require_once '../PDO/Connection.php';
class Hashtag {

    var $id;
    var $name;
    var $post_id;
    var $status;

    public static function toHashTag($text) {
        foreach (["\\s", "#", "'", "\"", " ", "|", "!", "$", "%", "&", "/", "(", ")", "=", "?", "¡", "¿", ",", ".", ";", ":", "´", "*", "<", ">", "°", "}", "{", "^"] as $v) {
            $text = str_replace($v, "", $text);
        }
        if ($text != "") {
            return "#" . $text;
        }
    }

    public static function setHashtag($pos, $hash) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO hashtagpost VALUES(null, :post, :hash, 1)");
        $sen->bindParam(":post", $pos);
        $sen->bindParam(":hash", $hash);
        if ($sen->execute()) {
            return true;
        }
    }

    public static function deleteHashtag($hash) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE hashtagpost SET status_id = 6 WHERE id = :hash");
        $sen->bindParam(":hash", $hash);
        if ($sen->execute()) {
            return true;
        }
    }

    public static function setNewHashtag($text) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO hashtag VALUES(null,:name)");
        $sen->bindParam(":name", $text);
        if ($sen->execute()) {
            $sen = $conn->mysql->prepare("SELECT id FROM hashtag WHERE name = :name");
            $sen->bindParam(":name", $text);
            if ($sen->execute()) {
                $rs = $sen->fetch();
                return $rs[0];
            }
        }
        return false;
    }

    public static function getHashTags($idp) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM hashtagpost INNER JOIN hashtag ON hashtag_id = hashtag.id WHERE post_id = :idp AND hashtagpost.status_id = 1");
        $sen->bindParam(":idp", $idp);
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            $list = array();
            foreach ($res as $ha) {
                $h = new Hashtag();
                $h->id = $ha[0];
                $h->name = $ha[5];
                $h->post_id = $ha[1];
                $h->status = $ha[3];
                $list[] = $h;
            }
            return $list;
        }
    }
    public function findHashtag($text) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM hashtag WHERE name = :name");
        $sen->bindParam(":name", $text);
        if ($sen->execute()) {
            if($sen->rowCount() > 0){
                $res = $sen->fetch();
                $hash = new Hashtag();
                $hash->id = $res[0];
                $hash->name = $res[1];
                return self::findHashtagpost($hash);
            }else{
                return self::setNewHashtag($text);
            }
        }
    }
   
    public function findHashtagpost($hash) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM hashtagpost WHERE id = :id");
        $sen->bindParam(":id", $hash);
        if ($sen->execute()) {
            $res = $sen->fetch();
            $h = new Hashtag();
            $hash->id = $res[0];
            $hash->status = $res[3];
            return self::deleteHashtag($hash);
        }
    }

}
