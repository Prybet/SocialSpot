<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Interests
 *
 * @author Prybet
 */
require_once 'Profile.php';
require_once 'Category.php';

class Interests {

    var $id;
    var $me;
    var $spot;
    var $hashtag;
    var $city;
    var $province;
    var $region;
    var $category;
    var $status;

    public static function getInterests($idP) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM interests WHERE profile_id = :idP");
        $sen->bindParam(":idP", $idP);
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            $list = array();
            foreach ($res as $inte) {
                $i = new Interests();
                $i->id = $inte[0];
                $i->profile = $inte[1];
                $i->spot = $inte[2];
                $i->hashtag = $inte[3];
                $i->city = $inte[4];
                $i->province = $inte[5];
                $i->region = $inte[6];
                $i->category = $inte[7];
                $i->status = Status::getStatu($inte[8]);
                $list[] = $i;
            }
            return $list;
        }
    }

    public function setInterest($typeInte, $inter) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO interests (profile_id, {$typeInte}, status_id) VALUES (:prof, :inte, 12)");
        $sen->bindParam(":prof", $this->me);
        $sen->bindParam(":inte", $inter);
        if ($sen->execute()) {
            return true;
        }
    }

    public function findInterest($action, $interest) {
        $typeInte = self::getIntername($action);
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * from interests WHERE Profile_ID = :prof AND {$typeInte} = :inte");
        $sen->bindParam(":prof", $this->me);
        $sen->bindParam(":inte", $interest);
        print_r($sen);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                $res = $sen->fetch();
                $i = new Interests();
                $i->id = $res[0];
                $i->status = Status::getStatu($res[8]);
                return self::updateInterest($i);
            } else {
                return self::setInterest($typeInte, $interest);
            }
        }
    }

    public function getIntername($action) {
        switch ($action) {
            case "cate":
                return 'category_id';
            case "city":
                return 'city_id';
            case "prov":
                return 'province_id';
            case "reg":
                return 'region_id';
            case "spot":
                return 'spot_id';
            default :
                return "non";
        }
    }

    function updateInterest($i) {
        $conn = new Connection();
        if ($i->status->id == 12) {
            $status = 6;
        }
        if ($i->status->id == 6) {
            $status = 12;
        }
        print_r($i->status->id);
        $sen = $conn->mysql->prepare("UPDATE interests SET Status_ID = :status WHERE id = :id");
        $sen->bindParam(":id", $i->id);
        $sen->bindParam(":status", $status);
        if ($sen->execute()) {
            return true;
        }
    }

    public static function getMembers($type, $id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT id, Profile_ID, {$type} FROM interests WHERE {$type} = :id AND status_id = 12");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $rs = $sen->fetchAll();
            $list = array();
            foreach ($rs as $i) {
                $in = new Interests();
                $in->id = $i[0];
                $in->me = Profile::getProfileForReplies($i[1]);
                $list[] = $in;
            }
            return $list;
        }
    }

    private function getOnline($type, $id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM interests INNER JOIN profile ON interests.profile_id = profile.id WHERE {$type} = :id  AND profile.status_id = 2");
        $sen->bindParam(":id", $this->id);
        if ($sen->execute()) {
            return $sen->rowCount();
        }
    }

}
