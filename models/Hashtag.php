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
class Hashtag {
    var $id;
    var $name;
    var $post_id;    
    
    
    public static function setHashtag($pos,$hash){
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO hashtagpost VALUES(null, :post, :hash, 1)");
        $sen->bindParam(":post", $pos);
        $sen->bindParam(":hash", $hash);
         if($sen->execute()){
            return true;
         }
    }
    
    public static function setNewHashtag($text) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO hashtag VALUES(null,:name)");
        $sen->bindParam(":name", $text);
        if($sen->execute()){
            $sen = $conn->mysql->prepare("SELECT id FROM hashtag WHERE name = :name");
            $sen->bindParam(":name", $text);
            if($sen->execute()){
                $rs = $sen->fetch();
                return  $rs[0];
            }
        }
        return false;
    }
    
    public static function getHashTags($idp) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM hashtagpost INNER JOIN hashtag ON hashtag_id = hashtag.id WHERE post_id = :idp");
        $sen->bindParam(":idp", $idp);
        if($sen->execute()){
            $res =$sen->fetchAll();
            $list =  array();
            foreach ($res as $ha){
                $h = new Hashtag();
                $h->id = $ha[4];
                $h->name = $ha[5];
                $h->post_id = $ha[1];
                $list[] = $h;
            }
            return $list;
        }
    }
}
