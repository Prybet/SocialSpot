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
require_once 'Category.php';
require_once 'Status.php';
require_once 'Image.php';
require_once 'Video.php';
require_once 'Profile.php';
require_once 'Reply.php';
require_once 'Like.php';
require_once 'Hashtag.php';
require_once 'Spot.php';

class Post {

    var $id;
    var $profID;
    var $userProfile;
    var $title;
    var $body;
    var $date;
    var $time;
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

    private function insertHashtags($pos) {
        foreach ($this->hashtags as $hash) {
            if ($hash->id == 0) {
                $id = Hashtag::setNewHashtag($hash->name);
                Hashtag::setHashtag($pos, $id);
            } else {
                Hashtag::setHashtag($pos, $hash->id);
            }
        }
    }

    public function setPost() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO post VALUES (null, :prof, :title , :body, :date, :time, :cate, 1, :spot)");
        $sen->bindParam(":prof", $this->profID);
        $sen->bindParam(":title", $this->title);
        $sen->bindParam(":body", $this->body);
        date_default_timezone_set("America/Santiago");
        $date = date("Y-m-d", $timestamp = time());
        $time = date("H:i:s", $timestamp = time());
        $sen->bindParam(":date", $date);
        $sen->bindParam(":time", $time);
        $catID = $this->category->id;
        $sen->bindParam(":cate", $catID);
        $spot = $this->spot->id;
        if($spot == 0){
            $spot = null;
        }
        $sen->bindParam(":spot", $spot);
        if ($sen->execute()) {
            $sen = $conn->mysql->prepare("SELECT id FROM post WHERE time = :time AND date = :date");
            $sen->bindParam(":time", $time);
            $sen->bindParam(":date", $date);
            if ($sen->execute()) {
                $res = $sen->fetch();
                $this->insertHashtags($res[0]);
                return $res[0];
            }
        }
    }

    public function editPost() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE post SET title = :tit, body = :body, status_id = 7 WHERE id = :id");
        $sen->bindParam(":tit", $this->title);
        $sen->bindParam(":body", $this->body);
        $sen->bindParam(":id", $this->id);
        if ($sen->execute()) {
            foreach ($this->hashtags as $hash) {
                if($hash->status == 6){
                    Hashtag::deleteHashtag($hash->id);
                }elseif($hash->status ===0){
                    $id = Hashtag::setNewHashtag($hash->name);
                  Hashtag::setHashtag($this->id,$id);
                }
            }
           return true;
        }
    }

    // For views/post.php
    public static function getPost($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM post WHERE id = :id ");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetch();
            $p = new Post();
            $p->id = $res[0];
            $p->profID = $res[1];
            $p->userProfile = Profile::getProfileForMain($res[1]);
            $p->title = $res[2];
            $p->body = $res[3];
            $p->date = $res[4];
            $p->time = $res[5];
            $p->category = Category::getCategoy($res[6]);
            $p->status = Status::getStatu($res[7]);
            $p->spot = Spot::getSpot($res[8]);
            $p->hashtags = Hashtag::getHashTags($res[0]);
            $p->images = Image::getImages($res[0]);
            $p->likes = Like::getLikes($res[0]);
            $p->replies = Reply::getRepliesByPostId($res[0]);
        }
        return $p;
    }

    //Main Posts
    public static function getAllPosts() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM post WHERE status_id = 1 OR status_id = 7 ORDER BY id DESC");
        if ($sen->execute()) {
            $posts = $sen->fetchAll();
            $list = array();
            foreach ($posts as $post) {
                $p = new Post();
                $p->id = $post[0];
                $p->profID = $post[1];
                $p->userProfile = Profile::getProfileForMain($post[1]);
                $p->title = $post[2];
                $p->body = $post[3];
                $p->date = $post[4];
                $p->time = $post[5];
                $p->category = Category::getCategoy($post[6]);
                $p->status = Status::getStatu($post[7]);
                $p->spot = Spot::getSpot($post[8]);
                $p->images = Image::getImages($post[0]);
                $p->videos = Video::getVideos($post[0]);
                $p->likes = Like::getLikes($post[0]);
                $p->replies = Reply::getRepliesByPostId($post[0]);
                $list[] = $p;
            }
        }
        return $list;
    }
    
     public static function getCustomPosts() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM post WHERE status_id = 1 OR status_id = 7 ORDER BY id DESC");
        if ($sen->execute()) {
            $posts = $sen->fetchAll();
            $list = array();
            foreach ($posts as $post) {
                $p = new Post();
                $p->id = $post[0];
                $p->profID = $post[1];
                $p->userProfile = Profile::getProfileForMain($post[1]);
                $p->title = $post[2];
                $p->body = $post[3];
                $p->date = $post[4];
                $p->time = $post[5];
                $p->category = Category::getCategoy($post[6]);
                $p->status = Status::getStatu($post[7]);
                $p->spot = Spot::getSpot($post[8]);
                $p->images = Image::getImages($post[0]);
                $p->videos = Video::getVideos($post[0]);
                $p->likes = Like::getLikes($post[0]);
                $p->replies = Reply::getRepliesByPostId($post[0]);
                $list[] = $p;
            }
        }
        return $list;
    }

    public static function getPostsForProfile($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM post WHERE profile_id = :id AND (status_id = 1 OR status_id = 7)  ORDER BY id DESC");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            $list = array();
            foreach ($res as $post) {
                $p = new Post();
                $p->id = $post[0];
                $p->profID = $post[1];
                $p->userProfile = Profile::getProfileForMain($post[1]);
                $p->title = $post[2];
                $p->body = $post[3];
                $p->date = $post[4];
                $p->time = $post[5];
                $p->category = Category::getCategoy($post[6]);
                $p->status = Status::getStatu($post[7]);
                $p->hashtags = Hashtag::getHashTags($post[0]);
                $p->images = Image::getImages($post[0]);
                $p->videos = Video::getVideos($post[0]);
                $p->likes = Like::getLikes($post[0]);
                $p->replies = Reply::getRepliesByPostId($post[0]);
                $list[] = $p;
            }
            return $list;
        }
    }


 

    public  function delete() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE post SET status_id = 6 WHERE date = :date AND time = :time ");
        $sen->bindParam(":date", $this->date);
        $sen->bindParam(":time", $this->time);
        if ($sen->execute()) {
            foreach ($this->images as $i){
                if($i->delete()){
                    return true;
                }
            }
        } else {
            return false;
        }
    }
    
    public  function deleteThis() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE post SET status_id = 6 WHERE id = :id ");
        $sen->bindParam(":id", $this->id);
        if ($sen->execute()) {
            foreach ($this->images as $i){
                $i->delete();
            }
            return true;
        } else {
            return false;
        }
    }
    public function reload() {
       return self::getPost($this->id);
    }
    
    
    //For Interests
    
    public static function getPostsForCategory($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM post WHERE category_id = :id AND (status_id = 1 OR status_id = 7)  ORDER BY id DESC ");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            $list = array();
            foreach ($res as $post) {
                $p = new Post();
                $p->id = $post[0];
                $p->profID = $post[1];
                $p->userProfile = Profile::getProfileForMain($post[1]);
                $p->title = $post[2];
                $p->body = $post[3];
                $p->date = $post[4];
                $p->time = $post[5];
                $p->category = Category::getCategoy($post[6]);
                $p->status = Status::getStatu($post[7]);
                $p->images = Image::getImages($post[0]);
                $p->likes = Like::getLikes($post[0]);
                $p->replies = Reply::getRepliesByPostId($post[0]);
                $list[] = $p;
            }
            return $list;
        }
    }
    
    public static function getPostsForCity($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM post INNER JOIN spot ON post.spot_id = spot.id WHERE city_id = :id AND (post.status_id = 1 OR post.status_id = 7)  ORDER BY post.id DESC ");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            $list = array();
            foreach ($res as $post) {
                $p = new Post();
                $p->id = $post[0];
                $p->profID = $post[1];
                $p->userProfile = Profile::getProfileForMain($post[1]);
                $p->title = $post[2];
                $p->body = $post[3];
                $p->date = $post[4];
                $p->time = $post[5];
                $p->category = Category::getCategoy($post[6]);
                $p->status = Status::getStatu($post[7]);
                $p->images = Image::getImages($post[0]);
                $p->likes = Like::getLikes($post[0]);
                $p->replies = Reply::getRepliesByPostId($post[0]);
                $list[] = $p;
            }
            return $list;
        }
    }
}
