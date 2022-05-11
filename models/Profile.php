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
require_once 'Post.php';


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
    
    var $myPosts;
    
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
    
    public static function getProfile($id){
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM profile WHERE id = :id");
        $sen->bindParam(":id", $id);
        if($sen->execute()){
            $rs = $sen->fetch();
            $p = new Profile();
            $p->id = $rs[0];
            $p->name = $rs[1];
            $p->username = $rs[2];
            $p->check = $rs[3];   
            $p->description = $rs[4];
            $p->birthDate = $rs[5];
            $p->entryDate = $rs[6];
            $p->imageURL = $rs[7];
            $p->bannerURL = $rs[8];
            $p->city = null;
            $p->status = $p->status->getstatu($rs[10]);
            $p->myPosts = Post::getPostsForProfile($rs[0]);
            return $p;            
        }
    }
    
    public static function getProfileForPost($id){
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT profile.id, name, username, profile.check, profile.desc, birthdate, entrydate, imageurl, bannerurl, city_id, profile.status_id FROM profile INNER JOIN post ON profile.id = post.profile_id WHERE post.id = :id");
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
