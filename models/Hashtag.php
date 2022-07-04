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
    var $postID;
    var $status;

    public static function toHashTag($text) {
        foreach (["\\s", "#", "'", "\"", " ", "|", "!", "$", "%", "&", "/", "(", ")", "=", "?", "¡", "¿", ",", ".", ";", ":", "´", "*", "<", ">", "°", "}", "{", "^"] as $v) {
            $text = str_replace($v, "", $text);
        }
        if ($text != "") {
            return "#" . $text;
        }
    }

    public static function setHashtagPost($idH, $idP) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO hashtagpost VALUES(null, :post, :hash, 1)");
        $sen->bindParam(":post", $idP);
        $sen->bindParam(":hash", $idH);
        if ($sen->execute()) {
            $sen = $conn->mysql->prepare("SELECT * FROM hashtagpost WHERE post_id = :idp AND hashtag_id = :idh");
            $sen->bindParam(":idp", $idP);
            $sen->bindParam(":idh", $idH);
            if ($sen->execute()) {
                $rs = $sen->fetch();
                $h = new Hashtag();
                $h->id = $rs[0];
                $h->postID = $rs[1];
                $h->status = $rs[3];
                return $h;
            }
        }
    }

    public static function updateHashtagPost($st, $id) {
        $conn = new Connection();
        if ($st == 1) {
            $status = 6;
        }
        if ($st == 6) {
            $status = 1;
        }
        $sen = $conn->mysql->prepare("UPDATE hashtagpost SET status_id = :status WHERE id = :id");
        $sen->bindParam(":status", $status);
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            return self::getHashPost($id);
        }
    }

    public static function setHashtag($text, $idP) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO hashtag VALUES(null,:name)");
        $sen->bindParam(":name", $text);
        if ($sen->execute()) {
            $sen = $conn->mysql->prepare("SELECT id FROM hashtag WHERE name = :name");
            $sen->bindParam(":name", $text);
            if ($sen->execute()) {
                $rs = $sen->fetch();
                $h = self::setHashtagPost($rs[0], $idP);
                $h->name = $text;
                return $h;
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
                $h->postID = $ha[1];
                $h->status = $ha[3];
                $list[] = $h;
            }
            return $list;
        }
    }

    public static function findHashtag($text, $idpost) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM hashtag WHERE name LIKE :name");
        $sen->bindParam(":name", $text);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                $res = $sen->fetch();
                $hash = new Hashtag();
                $hash->id = $res[0];
                $hash->name = $res[1];
                $h = self::findHashtagpost($hash, $idpost);
                $pstID = $h->postID;
                $sttus = $h->status;
                $idH = $h->id;
                if ($pstID == $idpost) {
                    if ($sttus == 1) {
                        return true;
                    } else {
                        return self::updateHashtagPost($sttus, $idH);
                    }
                }
                return self::setHashtagPost($hash->id, $idpost);
            } else {
                return self::setHashtag($text, $idpost);
            }
        }
    }

    public static function findHashtagpost($hash, $idpost) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM hashtagpost WHERE Hashtag_ID = :id AND Post_ID = :idpost");
        $sen->bindParam(":id", $hash->id);
        $sen->bindParam(":idpost", $idpost);
        if ($sen->execute()) {
            $ha = $sen->fetch();
            $h = new Hashtag();
            if ($sen->rowCount() > 0) {
                $h->id = $ha[0];
                $h->postID = $ha[1];
                $h->status = $ha[3];
                return $h;
            } else {
                $h->postID = 0;
                return $h;
            }
        }
    }

    public static function getHashPost($idhp) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM hashtagpost INNER JOIN hashtag ON hashtagpost.hashtag_id = hashtag.id WHERE hashtagpost.id = :id");
        $sen->bindParam(":id", $idhp);
        if ($sen->execute()) {
            $res = $sen->fetch();
            $h = new Hashtag();
            $h->id = $res[0];
            $h->name = $res[5];
            $h->postID = $res[1];
            $h->status = $res[3];
            return $h;
        }
    }

    public static function makeHashtags($text) {
        $list = array();
        if($text != null){
            $texts = explode(",", $text);
            foreach ($texts as $t){
                $list[] = Hashtag::toHashTag($t);
            }
            return $list;
        }
    }

}
