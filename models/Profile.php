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
require_once 'City.php';

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
    var $followers;
    var $follows;
    
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
            //$p->check = isset($rs[3])==1?true:false;
            $p->check = $rs[3];
            $p->description = $rs[4];
            $p->birthDate = $rs[5];
            $p->entryDate = $rs[6];
            $p->imageURL = $rs[7];
            $p->bannerURL = $rs[8];
            $p->city = City::getCity($rs[9]);
            $p->status = $p->status->getstatu($rs[10]);
            $p->myPosts = Post::getPostsForProfile($rs[0]);
            return $p;            
        }
    }
        // Profile for Replies
    public static function getProfileForReplies($id){
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM profile WHERE id = :id ");
        $sen->bindParam(":id", $id);
        if($sen->execute()){
            $rs = $sen->fetch();
            $p = new Profile();
            $p->id = $rs[0];
            $p->username = $rs[2];
            $p->imageURL = $rs[7];
            return $p;            
        }
    }
    
        // Profile for main
    public static function getProfileForMain($id){
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM profile WHERE id = :id ");
        $sen->bindParam(":id", $id);
        if($sen->execute()){
            $rs = $sen->fetch();
            $p = new Profile();
            $p->id = $rs[0];
            $p->username = $rs[2];
            return $p;            
        }
    }
    
    public function update() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE profile SET name = :name, Profile.Check = :check ,profile.Desc = :desc, BirthDate = :birth, City_ID = :city  WHERE id = :id");
        $sen->bindParam(":id", $this->id);
        $sen->bindParam(":name", $this->name);
        $sen->bindParam(":check", $this->check);
        $sen->bindParam(":desc", $this->description);
        $sen->bindParam(":birth", $this->birthDate);
        $sen->bindParam(":city", $this->city);
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
    
    public function getNumFollowers(){
        if($this->followers!=null){
            return count($this->followers);
        } else {
            return 0;
        }
    }
    
    public function getNumFollows(){
        if($this->follows!=null){
            return count($this->follows);
        } else {
            return 0;
        }
    }
    
    public function delete() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE profile SET  Status_ID = 6  WHERE id = :id");
        $sen->bindParam(":id", $this->id);
        if($sen->execute()){
            foreach ($this->myPosts as $p){
                $p->deleteThis();
            }
            return true;
        }
    }
    
    
    public function getThisPost($id) {
        foreach ($this->myPosts as $post){
            if($id == $post->id ){
                return $post;
            }
        }
    }
}
