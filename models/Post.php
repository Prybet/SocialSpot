<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Post
 *
 * @author Prybet
 */
class Post {
    var $id;
    var $userId;
    var $title;
    var $body;
    var $date;
    var $category;
    var $status;
    var $hashtags;
    
    //Optional
    var $spot;
    var $images;
    var $videos;
    
    //Interactions
    var $likes;
    var $replies;
    
    public function setPost() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO post VALUES (null, :user, :title , :body, :time, :cate, 1, null)");
        $sen->bindParam(":user", $this->userId);
        $sen->bindParam(":title", $this->title);
        $sen->bindParam(":body", $this->body);
        $time = date("Y-m-d H:i:s");
        $sen->bindParam(":time",$time );
        $sen->bindParam(":cate", $this->category);
        if ($sen->execute()) {
            $sen = $conn->mysql->prepare("SELECT id FROM post WHERE date = :time");
            $sen->bindParam(":time",$time );
            if ($sen->execute()) {
                $res = $sen->fetch();
                return $res[0];
            }
        }
    }
    
    
}
