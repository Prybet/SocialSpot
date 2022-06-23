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
                $res = $sen->fetch();
                $p = new Province();
                $p->id = $res[0];
                $p->name = $res[1];
                $p->description = $res[2];
                $p->region = Region::getRegion($res[3]);
                $p->status = Status::getStatu($res[4]);
                return $p;
            } else {
                return $this->setProvince();
            }
        }
    }

    public function setProvince() {
        $reg = $this->region->findRegion();
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO province values(null, :name, '', :prov, 1)");
        $sen->bindParam(":name", $this->name);
        $sen->bindParam(":prov", $reg->id);
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

}
