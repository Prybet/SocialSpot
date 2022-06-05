<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of City
 *
 * @author Prybet
 */

require_once 'Status.php';
require_once 'Province.php';

class City {
    var $id;
    var $name;
    var $description;
    var $province;
    var $status;
    
    public static function getAllCities() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM city WHERE status_id = 1");
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            foreach ($res as $city) {
                $c = new City();
                $c->id = $city[0];
                $c->name = $city[1];
                $c->description = $city[2];
                $c->province = Province::getProvince($city[3]);
                $c->status = Status::getStatu($city[4]);
                $list[] = $c;
            }
            return $list;
        }
    }
}
