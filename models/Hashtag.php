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

    public static function setHashtag($idH, $idP) {
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

    public static function deleteHashtag($hash) {
        $conn = new Connection();
        if($hash->status == 6){
            $status = 1;
        }
        if($hash->status == 1){
            $status = 6;
        }
        $sen = $conn->mysql->prepare("UPDATE hashtagpost SET status_id = :status WHERE id = :id");
        $sen->bindParam(":status", $status);
        $sen->bindParam(":hash", $hash->id);
        if ($sen->execute()) {
            return true;
        }
    }

    public static function setNewHashtag($text, $idP) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO hashtag VALUES(null,:name)");
        $sen->bindParam(":name", $text);
        if ($sen->execute()) {
            $sen = $conn->mysql->prepare("SELECT id FROM hashtag WHERE name = :name");
            $sen->bindParam(":name", $text);
            if ($sen->execute()) {
                $rs = $sen->fetch();
                $h = self::setHashtag($rs[0], $idP);
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
        $sen = $conn->mysql->prepare("SELECT * FROM hashtag WHERE name = :name");
        $sen->bindParam(":name", $text);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                $res = $sen->fetch();
                $hash = new Hashtag();
                $hash->id = $res[0];
                $hash->name = $res[1];
                $h = self::findHashtagpost($hash, $idpost);
                if ($h->postID == $idpost) {
                    return deleteHashtag($h);
                } else {
                    // Si lo encuentra y el estado es 12 solo lo enevia, no crear un
                    //Nueevo hashtagPost
                    //si el estado ees 6 lo cambia a 12 een la db y lo envia con 12 dee eestado
                   return self::setHashtag($h->idT, $idpost);
                }
            } else {
                return self::setNewHashtag($text, $idpost);
            }
        }
    }

    public static function findHashtagpost($hash, $idpost) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM hashtagpost WHERE Hashtag_ID = :id");
        $sen->bindParam(":id", $hash->id);
        if ($sen->execute()) {
            $hashs = $sen->fetchAll();
            foreach ($hashs as $ha) {
                if($idpost == $ha[1]){
                    $h = new Hashtag(); 
                    $h->id = $ha[0];
                    $h->postID = $ha[1];
                    $h->idT = $ha[2];
                    $h->status = $ha[3];
                    return $h;
                }
            }
            //preguntar si el return funciona colocarlo aca
        }
    }

}
