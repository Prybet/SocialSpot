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

    public function setInterest($typeInte, $inter) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO interests (profile_id, {$typeInte}, status_id) VALUES (:prof, :inte, 12)");
        $sen->bindParam(":prof", $this->me);
        $sen->bindParam(":inte", $inter);
        if ($sen->execute()) {
            return true;
        }
    }
    
    public function findInterest($action) {
        switch ($action){
            case "category":
                $typeInte = 'category_id';
                $inter = $this->category;
            break;
        }
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * from interests WHERE Profile_ID = :prof AND {$typeInte} = :inte");
        $sen->bindParam(":prof", $this->me);
        $sen->bindParam(":inte", $inter);
        if($sen->execute()){
            if ($sen->rowCount() > 0) {
                $res = $sen->fetch();
                $i = new Interests();
                $i->id = $res[0];
                $i->status = Status::getStatu($res[8]);
                return self::updateInterest($i);
            }else{
                return self::setInterest($typeInte, $inter);
            }
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

}
