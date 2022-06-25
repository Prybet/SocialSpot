<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Spot
 *
 * @author Prybet
 */
require_once '../PDO/Connection.php';
require_once 'Profile.php';
require_once 'Marker.php';
require_once 'City.php';
require_once 'Status.php';

class Spot {

    var $id;
    var $profile;
    var $name;
    var $description;
    var $imageURL;
    var $address;
    var $commune;
    var $province;
    var $region;
    var $country;
    var $route;
    var $marker;
    var $status;
    var $count;
    var $difdiculty;

    public static function getAll() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM spot WHERE status_id = 1");
        if ($sen->execute()) {
            $rs = $sen->fetchAll();
            $list = array();
            foreach ($rs as $spot) {
                $s = new Spot();
                $s->id = $spot[0];
                $s->profile = Profile::getProfileForReplies($spot[1]);
                $s->name = $spot[2];
                $s->description = $spot[3];
                $s->imageURL = $spot[4];
                $s->address = $spot[5];
                $s->marker = Marker::getMarker($spot[6]);
                $s->commune = City::getCity($spot[7]);
                $s->route = $spot[8];
                $s->status = Status::getStatu($spot[9]);
                $s->count = $spot[10];
                $s->date = $spot[11];
                $s->time = $spot[12];
                $list[] = $s;
            }
            return $list;
        }
    }

    public static function setSpot($spot) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO spot VALUES (null, :prof, :name, :desc, :url, :add, :mark, :city, null, 1 , 1, :date, :time)");
        $sen->bindParam(":prof", $spot->prof);
        $sen->bindParam(":name", $spot->name);
        $sen->bindParam(":desc", $spot->description);
        $sen->bindParam(":url", $spot->imageURL);
        $sen->bindParam(":add", $spot->address);
        $mark = Marker::setMarker($spot->marker);
        $sen->bindParam(":mark", $mark);
        $city = City::findCity($spot->commune);
        $sen->bindParam(":city", $city->id);
        date_default_timezone_set("America/Santiago");
        $date = date("Y-m-d", $timestamp = time());
        $time = date("H:i:s", $timestamp = time());
        $sen->bindParam(":date", $date);
        $sen->bindParam(":time", $time);
        if ($sen->execute()) {
            $sen = $conn->mysql->prepare("SELECT * FROM spot WHERE date = :date AND time = :time");
            $sen->bindParam(":date", $date);
            $sen->bindParam(":time", $time);
            if ($sen->execute()) {
                $rs = $sen->fetch();
                $s = new Spot();
                $s->id = $rs[0];
                $s->profile = Profile::getProfileForReplies($rs[1]);
                $s->name = $rs[2];
                $s->description = $rs[3];
                $s->imageURL = $rs[4];
                $s->address = $rs[5];
                $s->marker = Marker::getMarker($rs[6]);
                $s->commune = City::getCity($rs[7]);
                $s->route = $rs[8];
                $s->status = Status::getStatu($rs[9]);
                $s->count = $rs[10];
                $s->date = $rs[11];
                $s->time = $rs[12];
                return $s;
            }
        }
    }

    function fetchSpot($rs) {
        $s = new Spot();
        $s->id = $rs[0];
        $s->prof = Profile::getProfileForReplies($rs[1]);
        $s->name = $rs[2];
        $s->description = $rs[3];
        $s->imageURL = $rs[4];
        $s->address = $rs[5];
        $s->marker = Marker::getMarker($rs[6]);
        $s->commune = City::getCity($rs[7]);
        $s->route = $rs[8];
        $s->status = $rs[9];
        $s->count = $rs[10];
        $s->date = $rs[11];
        $s->time = $rs[12];
        return $s;
    }

    public static function deleteById($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE spot SET status_id = 6 WHERE id = :id");
        $sen->bindParam(":id", $id);
        if($sen->execute()){
            return true;
        }else{
            return false;
        }
    }

}
