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
    //Only for Maps
    var $region;
    var $country;
    //Only for Interests
    var $posts;

    public static function getCity($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM city WHERE status_id = 1 AND id = :id");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $city = $sen->fetch();
            if ($city != null) {
                $c = new City();
                $c->id = $city[0];
                $c->name = $city[1];
                $c->description = $city[2];
                $c->imageURL = $city[3];
                $c->bannerURL = $city[4];
                $c->province = Province::getProvince($city[5]);
                $c->status = Status::getStatu($city[6]);
                return $c;
            }
        }
    }

    public static function getFullCity($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM city WHERE status_id = 1 AND id = :id");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $city = $sen->fetch();
            if ($city != null) {
                $c = new City();
                $c->id = $city[0];
                $c->name = $city[1];
                $c->description = $city[2];
                $c->imageURL = $city[3];
                $c->bannerURL = $city[4];
                $c->posts = Post::getCustomCity("City_ID", $city[0]);
                $c->province = Province::getProvince($city[5]);
                $c->status = Status::getStatu($city[6]);
                return $c;
            }
        }
    }

    public static function getCitiesForProvice($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM city WHERE status_id = 1 AND Province_ID = :id");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            foreach ($res as $city) {
                $c = new City();
                $c->id = $city[0];
                $c->name = $city[1];
                $list[] = $c;
            }

            return $list;
        }
    }

    public static function getListCity($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM city WHERE status_id = 1 AND province_id = :id");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            foreach ($res as $city) {
                $c = new City();
                $c->id = $city[0];
                $c->name = $city[1];
                $list[] = $c;
            }
            return $list;
        }
    }

    public static function findCity($city) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM city WHERE name = :name");
        $sen->bindParam(":name", $city->name);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                $city = $sen->fetch();
                $c = new City();
                $c->id = $city[0];
                $c->name = $city[1];
                $c->description = $city[2];
                $c->imageURL = $city[3];
                $c->bannerURL = $city[4];
                $c->province = Province::getProvince($city[5]);
                $c->status = Status::getStatu($city[6]);
                return $c;
            } else {
                return $city->setCity();
            }
        }
    }

    public function setCity() {
        $prov = $this->province->findProvince();
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO city  values(null, :name, 'Not Description', 'socialspot.cl' ,'socialspot.cl', :prov, 1)");
        $sen->bindParam(":name", $this->name);
        $sen->bindParam(":prov", $prov->id);
        if ($sen->execute()) {
            return self::findCity($this);
        }
    }

    function fetchCity($city) {
        $c = new City();
        $c->id = $city[0];
        $c->name = $city[1];
        $c->description = $city[2];
        $c->province = Province::getProvince($city[3]);
        $c->status = Status::getStatu($city[4]);
        return $c;
    }
    
    public static function getCityForSearch($nom){
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM city WHERE name LIKE :name AND Status_ID = 1");
        $param = $nom."%";
        $sen->bindParam(":name", $param);
        if($sen->execute()){
            $res = $sen->fetchAll();
            $list = array(); 
            foreach ($res as $city){
                $c = new City();
                $c->id = $city[0];
                $c->name = $city[1];
                $c->description = $city[2];
                $c->imageURL = $city[3];
                $c->bannerURL = $city[4];
                $c->province = Province::getProvince($city[5]);
                $c->posts = Post::getCustomCity("City_ID", $city[0]);
                $c->followers = Interests::getMembers("City_ID", $city[0]);
                $c->status = Status::getStatu($city[6]);
                $list[] = $c;
            }    
            return $list; 
        }
    }

}
