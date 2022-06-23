<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Marker
 *
 * @author Prybet
 */
class Marker {

    var $id;
    var $LAT;
    var $LNG;

    public function __construct($LAT, $LNG) {
        $this->LAT = $LAT;
        $this->LNG = $LNG;
    }

    public static function setMarker($mrk) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO marker VALUES (null, :lat, :lng)");
        $sen->bindParam(":lat", $mrk->LAT);
        $sen->bindParam(":lng", $mrk->LNG);
        if ($sen->execute()) {
            $sen = $conn->mysql->prepare("SELECT id FROM marker WHERE lat = :lat AND lng = :lng");
            $sen->bindParam(":lat", $mrk->LAT);
            $sen->bindParam(":lng", $mrk->LNG);
            if ($sen->execute()) {
                $rs = $sen->fetch();
                return $rs[0];
            } else {
                return 0;
            }
        }
    }

    public static function getMarker($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM marker WHERE id = :id");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetch();
            $m = new Marker($res[1],$res[2]);
            $m->id = $res[0];
            return $m;
        }
    }

}
