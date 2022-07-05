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
    var $profile;
    var $spot;
    var $hashtag;
    var $city;
    var $province;
    var $region;
    var $category;
    var $status;
    var $context;

    public static function reload($interests) {
        return self::getInterests($interests[0]->profileID);
    }

    public static function getInterests($idP) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM interests WHERE profile_id = :idP AND status_id = 12");
        $sen->bindParam(":idP", $idP);
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            $list = array();
            foreach ($res as $inte) {
                $i = new Interests();
                $i->context = Self::getContext($inte);
                $i->id = $inte[0];
                $i->typeID = $inte[$i->getIntername($i->context)];
                $i->profileID = $inte[1];
                $i->spotID = $inte[2];
                $i->hashtagID = $inte[3];
                $i->cityID = $inte[4];
                $i->provinceID = $inte[5];
                $i->regionID = $inte[6];
                $i->categoryID = $inte[7];
                $i->status = Status::getStatu($inte[8]);
                $list[] = $i;
            }
            return $list;
        }
    }

    public function setInterest() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO interests (profile_id, {$this->context}, status_id) VALUES (:prof, :inte, 12)");
        $sen->bindParam(":prof", $this->profile);
        $sen->bindParam(":inte", $this->typeID);
        if ($sen->execute()) {
            return self::getInterests($this->profile);
        }
    }

    public function findInterest() {
        $this->context = self::getIntername($this->context);
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * from interests WHERE Profile_ID = :prof AND {$this->context} = :inte");
        $sen->bindParam(":prof", $this->profile);
        $sen->bindParam(":inte", $this->typeID);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                $res = $sen->fetch();
                $i = new Interests();
                $i->id = $res[0];
                $i->profile = $this->profile;
                $i->status = Status::getStatu($res[8]);
                return self::updateInterest($i);
            } else {
                return $this->setInterest();
            }
        }
    }

    public static function getIntername($action) {
        switch ($action) {
            case "Category":
                return 'Category_ID';
            case "City":
                return 'City_ID';
            case "Province":
                return 'Province_ID';
            case "Region":
                return 'Region_ID';
            case "Spot":
                return 'Spot_ID';
            default :
                return;
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
        $sen = $conn->mysql->prepare("UPDATE interests SET Status_ID = :status WHERE id = :id");
        $sen->bindParam(":id", $i->id);
        $sen->bindParam(":status", $status);
        if ($sen->execute()) {
            return self::getInterests($i->profile);
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

    public static function getContext($inter) {
        $pos = Self::getPos($inter);
        switch ($pos) {
            case "Spot_ID":
                return "Spot";
            case "HashtagPost_ID":
                return "Hashtag";
            case "City_ID":
                return "City";
            case "Province_ID":
                return "Province";
            case "Region_ID":
                return "Region";
            case "Category_ID":
                return "Category";
            default:
                break;
        }
    }

    public static function getPos($inter) {
        $inter[0] = null;
        $inter[1] = null;
        $inter[8] = null;
        $inter["ID"] = null;
        $inter["Profile_ID"] = null;
        $inter["Status_ID"] = null;
        foreach ($inter as $i => $col) {

            if ($col != null) {
                return $i;
            }
        }
    }

}
