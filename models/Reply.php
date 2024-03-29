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
require_once 'Status.php';
require_once 'Profile.php';
require_once 'Post.php';

class Reply {

    var $id;
    var $body;
    var $date;
    var $time;
    var $replies;
    var $reply;
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
        if ($sen->execute()) {
            return true;
        }
    }

    public function setReplyForReply() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO reply VALUES (null, :body, CURRENT_DATE, CURRENT_TIME, :replyID, :postID, :profID, 15)");
        $sen->bindParam(":body", $this->body);
        $ReplyID = $this->replies;
        $sen->bindParam(":replyID", $ReplyID);
        $postID = $this->post;
        $sen->bindParam(":postID", $postID);
        $profID = $this->profile;
        $sen->bindParam(":profID", $profID);
        if ($sen->execute()) {
            return true;
        }
    }
    //Busca el comentario por la id, y estado a Comment, retornando la lista de Reply
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
                $r->post = $com[5];
                $r->profile = Profile::getProfileForReplies($com[6]);
                $r->status = Status::getStatu($com[7]);
                $list[] = $r;
            }
            return $list;
        }
    }
    //Busca una lista de comemtarios, en el objeto Reply que tenga el estado Reply
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
                $r->time = $com[3];
                $r->reply = $com[4];
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
        if ($sen->execute()) {
            return true;
        }
    }

    public static function setReplyApp($reply) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO reply VALUES(null, :body, :date, :time, :reply , :post, :profile, :status)");
        date_default_timezone_set("America/Santiago");
        $date = date("Y-m-d", $timestamp = time());
        $time = date("H:i:s", $timestamp = time());
        $sen->bindParam(":date", $date);
        $sen->bindParam(":time", $time);
        $sen->bindParam(":body", $reply->body);
        $comm = $reply->reply;
        if ($reply->reply == 0) {
            $comm = null;
        }
        $sen->bindParam(":reply", $comm);
        $sen->bindParam(":post", $reply->post);
        $p = $reply->profile->id;
        $sen->bindParam(":profile", $p);
        $s = $reply->status->id;
        $sen->bindParam(":status", $s);
        if ($sen->execute()) {
            return self::getRepliesByPostId($reply->post);
        }
    }

    public static function findThisReply($date, $time) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM reply WHERE date = :date AND time = :time");
        $sen->bindParam(":date", $date);
        $sen->bindParam(":time", $time);
        if ($sen->execute()) {
            $rs = $sen->fetch();
            $r = new Reply();
            $r->id = $rs[0];
            $r->body = $rs[1];
            $r->date = $rs[2];
            $r->time = $rs[3];
            if ($rs[4] != null) {
                $r->reply = $rs[4];
            } else {
                $r->reply = 0;
            }
            $r->replies = Reply::getRepliesByReplyId($rs[0]);
            $r->post = $rs[5];
            $r->profile = Profile::getProfileForReplies($rs[6]);
            $r->status = Status::getStatu($rs[7]);
            return $r;
        }
    }

}
