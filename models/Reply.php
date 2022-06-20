<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Reply
 *
 * @author Prybet
 */
require_once '../PDO/Connection.php';
require_once '../models/Status.php';
require_once 'Profile.php';
require_once 'Post.php';

class Reply {

    var $id;
    var $body;
    var $date;
    var $time;
    var $replies;
    var $post;
    var $profile;
    var $status;

    public function setReply() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO reply VALUES (null, :body, CURRENT_DATE, CURRENT_TIME, null, :postID, :profID, 14)");
        $sen->bindParam(":body", $this->body);
        $postID = $this->post;
        $sen->bindParam(":postID", $postID);
        $profID = $this->profile;
        $sen->bindParam(":profID", $profID);
        if($sen->execute()){
            return true;
        }
    }


    public static function getRepliesByPostId($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM reply WHERE post_id = :id AND status_id = 14");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            $list = array();
            foreach ($res as $com) {
                $r = new Reply();
                $r->id = $com[0];
                $r->body = $com[1];
                $r->date = $com[2];
                $r->time = $com[3];
                $r->replies = self::getRepliesByReplyId($com[0]);
                $r->profile = Profile::getProfileForReplies($com[6]);
                $r->status = Status::getStatu($com[7]);
                $list[] = $r;
            }
            return $list;
        }
    }
    
    public static function getRepliesByReplyId($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM reply WHERE reply_id = :id AND status_id = 15");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            $list = array();
            foreach ($res as $com) {
                $r = new Reply();
                $r->id = $com[0];
                $r->body = $com[1];
                $r->date = $com[2];
                $r->reply = $com[3];
                $r->profile = Profile::getProfileForReplies($com[6]);
                $r->status = Status::getStatu($com[7]);
                $list[] = $r;
            }
            return $list;
        }
    }
    
    public function deleteReplyForProfile($param) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE reply SET  Status_ID = 6  WHERE Profile_ID = :id ");
        $sen->bindParam(":id", $this->id);
        if($sen->execute()){
            return true;
        }
    }
        
    public static function setReplyApp($reply){
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO reply VALUES(null,:body,:date,:time, null,:post,:profile,:status)");
        $sen->bindParam(":body", $reply->body);
        $sen->bindParam(":date", $reply->date);
        $sen->bindParam(":time", $reply->time);
        $sen->bindParam(":post", $reply->post);
        $p = $reply->profile->id;
        $sen->bindParam(":profile", $p);
        $s = $reply->status->id;
        $sen->bindParam(":status", $s);
        if($sen->execute()){
            return true;
        }
    }
    

}
