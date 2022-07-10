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
require_once 'Follow.php';
require_once 'Interests.php';

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
        $sen = $conn->mysql->prepare("INSERT INTO profile VALUES (null, :name, :user, 0, '', :birth, CURRENT_TIMESTAMP,'', '', null, 2)");
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
    //hace un select para buscar el profile retornando un objeto de Profile
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
            $check = $rs[3];
            if($rs[3]== 0){
                $check = "0";
            }
            if($rs[3]== 1){
                $check = "1";
            }
            $p->check = $check;
            $p->description = $rs[4];
            $p->birthDate = $rs[5];
            $p->entryDate = $rs[6];
            $p->imageURL = $rs[7];
            $p->bannerURL = $rs[8];
            $p->city = City::getCity($rs[9]);
            $p->status = $p->status->getstatu($rs[10]);
            $p->myPosts = Post::getPostsForProfile($rs[0]);
            $p->followers = Follow::getFollowers($rs[0]);
            $p->follows = Follow::getFollows($rs[0]);
            $p->interests = Interests::getInterests($rs[0]);
            return $p;            
        }
    }
        //Busca el profile con la id, retornando el objeto Profile
    public static function getProfileForReplies($id){
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM profile WHERE id = :id");
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
    //Busca el profile retornando un objeto de profile
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
    
    // Busca una lista que contenga cierto caracter que tenga el estado a On-Line
    public static function getProfileForSearch($nom){
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM profile WHERE username LIKE :username AND Status_ID = 2");
        $param = $nom."%";
        $sen->bindParam(":username", $param);
        if($sen->execute()){
            $res = $sen->fetchAll();
            $list = array(); 
            foreach ($res as $prof){
                $p = new Profile();
                $p->id = $prof[0];
                $p->name = $prof[1];
                $p->username = $prof[2];
                $p->description = $prof[4];
                $check = $prof[3];
                if($prof[3]== 0){
                    $check = "0";
                }
                 if($prof[3]== 1){
                    $check = "1";
                }
                $p->check = $check;
                $p->imageURL = $prof[7];
                $p->bannerURL = $prof[8];
                $p->followers = Follow::getFollowers($prof[0]);
                $p->follows = Follow::getFollows($prof[0]);
                $p->myPosts = Post::getPostsForProfile($prof[0]);
                $p->status = Status::getStatu($prof[10]);
                $list[] = $p;
            }    
            return $list; 
        }
    }
    //Actualiza profile retornando true
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
    //Actualiza el la iagen del Profile y Banner
    public function updateCompletImages() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE profile SET ImageURL = :img , BannerURL = :bnr WHERE id = :id");
        $sen->bindParam(":id", $this->id);
        $sen->bindParam(":img", $this->imageURL);
        $sen->bindParam(":bnr", $this->bannerURL);
        if($sen->execute()){
            return true;
        }
    }
    public function updateImages() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE profile SET ImageURL = :img WHERE id = :id");
        $sen->bindParam(":id", $this->id);
        $sen->bindParam(":img", $this->imageURL);
        if($sen->execute()){
            return true;
        }
    }
    public function updateBanner() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE profile SET  BannerURL = :bnr WHERE id = :id");
        $sen->bindParam(":id", $this->id);
        $sen->bindParam(":bnr", $this->bannerURL);
        if($sen->execute()){
            return true;
        }
    }
    
    public function findImg($img, $bnr) {
        if($img != "" && $bnr != ""){
            $this->updateCompletImages($img, $bnr);
        }
        if($img != ""){
            $this->updateImages($img, $bnr);
        }
        if($bnr != ""){
            $this->updateBanner($img, $bnr);
        }
        return false;
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
            return rowCount($this->follows);
        } else {
            return 0;
        }
    }
    //Cambia el estado a Removed del Profile, 
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
    //El metodo obtiene el parametro la id del post, para poder retonar un post 
    public function getThisPost($id) {
        foreach ($this->myPosts as $post){
            if($id == $post->id ){
                return $post;
            }
        }
    } 
    //Busca de todos los seguidores el que coincida la id del Profile, retonando el objeto
     public function getThisFollow($pid) {
        foreach ($this->follows as $f){
            if($f->id == $pid){
                return $f;
            }
        }
    }
    
}
