<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Profile
 *
 * @author Prybet
 */

require_once '../PDO/Connection.php';
require_once 'User.php';
require_once 'Status.php';


class Profile {
    var $id;
    var $name;
    var $username;
    var $check;
    var $description;
    var $birthDate;
    var $entryDate;
    var $imageURL;
    var $bannerURL;
    var $city;
    var $status;
    
    public function __construct() {
        $this->status = new Status();
    }

    
    public function setProfile() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO profile VALUES (null, :name, :user, 0, '', :birth, CURRENT_TIMESTAMP,'-', '-', null, 2)");
        $sen->bindParam(":name", $this->name);
        $sen->bindParam(":user", $this->username);
        $sen->bindParam(":birth", $this->birthDate);
        if ($sen->execute()) {
            $sen = $conn->mysql->prepare("SELECT * FROM profile WHERE username = :user");
            $sen->bindParam(":user", $this->username);
            if($sen->execute()){
                $rs = $sen->fetch();
                return $rs[0];
            }
        }
    }
    
    public function getProfile($id){
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM profile WHERE id = :id");
        $sen->bindParam(":id", $id);
        if($sen->execute()){
            $rs = $sen->fetch();
            $this->id = $rs[0];
            $this->name = $rs[1];
            $this->username = $rs[2];
            $this->check = $rs[3];   
            $this->description = $rs[4];
            $this->birthDate = $rs[5];
            $this->entryDate = $rs[6];
            $this->imageURL = $rs[7];
            $this->bannerURL = $rs[8];
            $this->city = null;
            $this->status = $this->status->getstatu($rs[10]);
            return $this;            
        }
    }
    
    public function update() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE profile SET name = :name, Profile.Check = :check ,profile.Desc = :desc, BirthDate = :birth WHERE id = :id");
        $sen->bindParam(":id", $this->id);
        $sen->bindParam(":name", $this->name);
        $sen->bindParam(":check", $this->check);
        $sen->bindParam(":desc", $this->description);
        $sen->bindParam(":birth", $this->birthDate);
        if($sen->execute()){
            return true;
        }
    }
    
    public function updateImages() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE profile SET ImageURL = :img , BannerURL = :bnr WHERE id = :id");
        $sen->bindParam(":id", $this->id);
        $sen->bindParam(":img", $this->imageURL);
        $sen->bindParam(":bnr", $this->bannerURL);
        if($sen->execute()){
            return true;
        }
    }
}
