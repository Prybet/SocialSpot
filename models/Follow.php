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
require_once 'Profile.php';

class Follow {
    var $id;
    var $follower; 
    var $date;
    var $status;
    
    
    
    public static function getFollowers($id){
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM follow WHERE profile_ID = :id");
        $sen->bindParam(":id", $id);
        if($sen->execute()){
            $rs = $sen->fetchAll();
            $list = array();
            foreach ($rs as $f){
                $p = new Profile();
                $p = Profile::getProfileForReplies($f[2]);
                $list[] = $p;
            }
            return $list;       
        }
    }
    
    public static function getFollows($id){
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM follow WHERE Follower_ID = :id");
        $sen->bindParam(":id", $id);
        if($sen->execute()){
            $rs = $sen->fetchAll();
            foreach ($rs as $f){
                $p = new Profile();
                $p = Profile::getProfileForReplies($f[1]);
                $list[] = $p;
            }
            return $list;       
        }
    }
    
}
