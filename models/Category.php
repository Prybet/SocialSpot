<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Category
 *
 * @author Prybet
 */
require_once '../PDO/Connection.php';
require_once 'Status.php';
require_once 'Norm.php';
require_once 'Interests.php';

class Category {

    var $id;
    var $name;
    var $description;
    var $imageURL;
    var $bannerURL;
    var $status;
    var $members;
    var $onLine;
    var $posts;
    var $norms;

    public static function getListAllCategories() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM category WHERE status_id = 1 ORDER BY id DESC");
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            foreach ($res as $cate) {
                $c = new Category();
                $c->id = $cate[0];
                $c->name = $cate[1];
                $list[] = $c;
            }

            return $list;
        }
    }

    public static function getAllCategories() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM category WHERE status_id = 1 ORDER BY id DESC ");
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            foreach ($res as $cate) {
                $c = new Category();
                $c->id = $cate[0];
                $c->name = $cate[1];
                $c->description = $cate[2];
                $c->imageURL = $cate[3];
                $c->bannerURL = $cate[4];
                $c->status = Status::getStatu($cate[5]);
                $c->members = $c->getMembers();
                $c->onLine = $c->getOnline();
                $c->norms = Norm::getAll();
                $list[] = $c;
            }

            return $list;
        }
    }

    public static function getCategoy($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM category WHERE id = :id AND status_id = 1");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            if ($sen->rowcount() > 0) {
                $res = $sen->fetch();
                $c = new Category();
                $c->id = $res[0];
                $c->name = $res[1];
                $c->description = $res[2];
                $c->imageURL = $res[3];
                $c->bannerURL = $res[4];
                $c->status = Status::getStatu($res[5]);
                $c->members = $c->getMembers();
                $c->onLine = $c->getOnline();
                  $c->norms = Norm::getAll();
                $conn = null;
                return $c;
            } else {
                return null;
            }
        }
    }
    
    public static function getFullCategoy($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM category WHERE id = :id AND status_id = 1");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            if ($sen->rowcount() > 0) {
                $res = $sen->fetch();
                $c = new Category();
                $c->id = $res[0];
                $c->name = $res[1];
                $c->description = $res[2];
                $c->imageURL = $res[3];
                $c->bannerURL = $res[4];
                $c->status = Status::getStatu($res[5]);
                $c->members = Interests::getMembers("Category_ID", $id);
                $c->onLine = $c->getOnline();
                $c->posts = Post::getPostsForCategory($res[0]);
                $conn = null;
                return $c;
            } else {
                return null;
            }
        }
    }

    public function getMembers() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM interests WHERE category_id = :id AND status_id = 12");
        $sen->bindParam(":id", $this->id);
        if ($sen->execute()) {
            $rs = $sen->fetchAll();
            $list = array();
            foreach ($rs as $i) {
                $in = new Category();
                $in->id = $i[0];
                $in->me = $i[1];
                $list[] = $in;
            }
            return $list;
        }
    }

    private function getOnline() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM interests INNER JOIN profile ON interests.profile_id = profile.id WHERE category_id = :id  AND profile.status_id = 2");
        $sen->bindParam(":id", $this->id);
        if ($sen->execute()) {
            return $sen->rowCount();
        }
    }
    
    
    public static function getAllNames() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT id, name FROM category WHERE status_id = 1 ORDER BY id DESC");
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            foreach ($res as $cate) {
                $c = new Category();
                $c->id = $cate[0];
                $c->name = $cate[1];
                $list[] = $c;
            }
            return $list;
        }
    }
    
    public static function getCategoryForSearch($nom){
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM category WHERE name LIKE :name AND Status_ID = 1");
        $param = $nom."%";
        $sen->bindParam(":name", $param);
        if($sen->execute()){
            $res = $sen->fetchAll();
            $list = array(); 
            foreach ($res as $cate){
                $c = new Category();
                $c->id = $cate[0];
                $c->name = $cate[1];
                $c->description = $cate[2];
                $c->imageURL = $cate[3];
                $c->bannerURL = $cate[4];
                $c->followers = Interests::getMembers("Category_ID", $cate[0]);
                $c->posts = Post::getPostsForCategory($cate[0]);
                $c->onLine = $c->getOnline();
                $c->status = Status::getStatu($cate[5]);
                $list[] = $c;
            }    
            return $list; 
        }
    }
    
    
}
