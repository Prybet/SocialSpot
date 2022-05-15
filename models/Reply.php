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

class Reply {

    var $id;
    var $body;
    var $date;
    var $replies;
    var $profile;
    var $status;

    public static function getRepliesByPostId($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM reply WHERE post_id = :id AND status_id = 8");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            $list = array();
            foreach ($res as $com) {
                $r = new Reply();
                $r->id = $com[0];
                $r->body = $com[1];
                $r->date = $com[2];
                $r->replies = self::getRepliesByReplyId($com[0]);
                $r->profile = Profile::getProfile($com[5]);
                $r->status = Status::getStatu($com[6]);
                $list[] = $r;
            }
            return $list;
        }
    }
    
    public static function getRepliesByReplyId($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM reply WHERE reply_id = :id AND status_id = 12");
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
                $r->profile = Profile::getProfile($com[5]);
                $r->status = Status::getStatu($com[6]);
                $list[] = $r;
            }
            return $list;
        }
    }
        
    

}
