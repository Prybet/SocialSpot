<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Commune
 *
 * @author Prybet
 */

require_once 'Status.php';
require_once 'Region.php';

class Province {

    var $id;
    var $name;
    var $description;
    var $region;
    var $status;

    public static function getProvince($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM province WHERE  id = :id");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetch();
            $p = new Province();
            $p->id = $res[0];
            $p->name = $res[1];
            $p->description = $res[2];
            $p->region = Region::getRegion($res[3]);
            $p->status = Status::getStatu($res[4]);
            return $p;
        }
    }

   

}