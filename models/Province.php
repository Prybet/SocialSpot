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

    public static function getFullProvince($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM province WHERE status_id = 1 AND id = :id");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $prov = $sen->fetch();
            if ($prov != null) {
                $p = new Province();
                $p->id = $prov[0];
                $p->name = $prov[1];
                $p->description = $prov[2];
                $p->imageURL = $prov[3];
                $p->bannerURL = $prov[4];
                $p->posts = Post::getCustomProvince("Province_ID", $prov[0]);
                $p->members = Interests::getMembers("Province_ID", $prov[0]);
                $p->region = Region::getRegion($prov[5]);
                $p->status = Status::getStatu($prov[6]);
                return $p;
            }
        }
    }

    //Hace un select de Province retonando un onjeto Province
    public static function getProvince($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM province WHERE  id = :id");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $prov = $sen->fetch();
            $p = new Province();
            $p->id = $prov[0];
            $p->name = $prov[1];
            $p->description = $prov[2];
            $p->imageURL = $prov[3];
            $p->bannerURL = $prov[4];
            $p->region = Region::getRegion($prov[5]);
            $p->status = Status::getStatu($prov[6]);
            return $p;
        }
    }

    public static function getProvincesForRegion($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM province WHERE status_id = 1 AND Region_ID = :id");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetchAll();
            foreach ($res as $provi) {
                $p = new Province();
                $p->id = $provi[0];
                $p->name = $provi[1];
                $list[] = $p;
            }

            return $list;
        }
    }

    public function findProvince() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM province WHERE name LIKE :name");
        $sen->bindParam(":name", $this->name);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                $prov = $sen->fetch();
                $p = new Province();
                $p->id = $prov[0];
                $p->name = $prov[1];
                $p->description = $prov[2];
                $p->imageURL = $prov[3];
                $p->bannerURL = $prov[4];
                $p->region = Region::getRegion($prov[5]);
                $p->status = Status::getStatu($prov[6]);
                return $p;
            } else {
                return $this->setProvince();
            }
        }
    }

    public function setProvince() {
        $reg = $this->region->findRegion();
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO province values(null, :name, 'Not Description', 'socialspot.cl', 'socialspot.cl', :reg, 1)");
        $sen->bindParam(":name", $this->name);
        $sen->bindParam(":reg", $reg->id);
        if ($sen->execute()) {
            return $this->findProvince();
        }
    }

    public function fetchProvince($res) {
        $p = new Province();
        $p->id = $res[0];
        $p->name = $res[1];
        $p->description = $res[2];
        $p->region = Region::getRegion($res[3]);
        $p->status = Status::getStatu($res[4]);
        return $p;
    }
    
    public static function getProvinceForSearch($nom){
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM province WHERE name LIKE :name AND Status_ID = 1");
        $param = $nom."%";
        $sen->bindParam(":name", $param);
        if($sen->execute()){
            $res = $sen->fetchAll();
            $list = array(); 
            foreach ($res as $prov){
                $p = new Province();
                $p->id = $prov[0];
                $p->name = $prov[1];
                $p->description = $prov[2];
                $p->imageURL = $prov[3];
                $p->bannerURL = $prov[4];
                $p->region = Region::getRegion($prov[5]);
                $p->posts = Post::getCustomProvince("Province_ID", $prov[0]);
                $p->followers = Interests::getMembers("Province_ID", $prov[0]);
                $p->status = Status::getStatu($prov[6]);
                $list[] = $p;
            }    
            return $list; 
        }
    }

}
