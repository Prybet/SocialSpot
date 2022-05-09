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

class Category {

    var $id;
    var $name;
    var $description;
    var $imageURL;
    var $bannerURL;
    var $status;
    
    var $members;
    var $onLine;

    public static function getListAllCategories() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM category WHERE status_id = 1");
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

    public static function getCategoy($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM category WHERE id = :id AND status_id = 1");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
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
            $conn = null;
            return $c;
        }
    }

    private function getMembers() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM interests WHERE category_id = :id");
        $sen->bindParam(":id", $this->id);
        if ($sen->execute()) {
            return $sen->rowCount();
        }
    }
    
    private function getOnline() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT profile.status_id FROM interests INNER JOIN user ON interests.user_id = user.id INNER JOIN profile ON user.profile_id = profile.id WHERE category_id = :id  AND profile.status_id = 2");
        $sen->bindParam(":id", $this->id);
        if ($sen->execute()) {
            return $sen->rowCount();
        }
    }

}
