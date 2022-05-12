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

    public function setPost() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO post VALUES (null, :prof, :title , :body, :date, :time, :cate, 1, null)");
        $sen->bindParam(":prof", $this->profID);
        $sen->bindParam(":title", $this->title);
        $sen->bindParam(":body", $this->body);
        $date = date("Y-m-d",$timestamp = time());
        $time = date("H:i:s",$timestamp = time());
        $sen->bindParam(":date", $date);
        $sen->bindParam(":time", $time);
        $sen->bindParam(":cate", $this->category);
        if ($sen->execute()) {
            $sen = $conn->mysql->prepare("SELECT id FROM post WHERE time = :time");
            $sen->bindParam(":time", $time);
            if ($sen->execute()) {
                $res = $sen->fetch();
                return $res[0];
            }
        }
    }

    public static function getPost($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM post WHERE id = :id ");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetch();
            $p = new Post();
            $p->id = $res[0];
            $p->profID = $res[1];
            $p->title = $res[2];
            $p->body = $res[3];
            $p->date = $res[4];
            $p->time = $res[5];
            $p->category = Category::getCategoy($res[6]);
            $p->status = Status::getStatu($res[7]);
            $p->images = Image::getImages($res[0]);
        }
        return $p;
    }

    public static function getAllPosts() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM post WHERE status_id = 1 ");
        if ($sen->execute()) {
            $posts = $sen->fetchAll();
            $list = array();
            foreach ($posts as $post) {
                $p = new Post();
                $p->id = $post[0];
                $p->profID = $post[1];
                $p->userProfile = Profile::getProfile($post[1]);
                $p->title = $post[2];
                $p->body = $post[3];
                $p->date = $post[4];
                $p->time = $post[5];
                $p->category = Category::getCategoy($post[6]);
                $p->status = Status::getStatu($post[7]);
                $p->images = Image::getImages($post[0]);
                $p->videos = Video::getVideos($post[0]);
                $list[] = $p;
            }
        }
        return $list;
    }

    public static function getPostsForProfile($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM post WHERE profile_id = :id ");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            $list = array();
            foreach ($res as $post) {
                $p = new Post();
                $p->id = $post[0];
                $p->profID = $post[1];
                $p->title = $post[2];
                $p->body = $post[3];
                $p->date = $post[4];
                $p->time = $post[5];
                $p->category = Category::getCategoy($post[6]);
                $p->status = Status::getStatu($post[7]);
                $p->images = Image::getImages($post[0]);
                $list[] = $p;
            }
            return $list;
        } 
    }
}
