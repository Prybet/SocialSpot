<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Region
 *
 * @author Prybet
 */

require_once 'Status.php';
require_once 'City.php';

class Region {
    var $id;
    var $name;
    var $description;
    var $country;
    var $status;
    
    public static function getRegion($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM region WHERE  id = :id");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetch();
            $r = new Region();
            $r->id = $res[0];
            $r->name = $res[1];
            $r->description = $res[2];
            $r->country = $res[3];
            $r->status = Status::getStatu($res[4]);
            return $r;
        }
    }
}
