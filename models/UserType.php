<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of UserType
 *
 * @author Prybet
 */

require_once 'Status.php';
class UserType {
    var $id;
    var $type;
    var $status;
    
    public function __construct() {
        $this->id = 2;
        $this->type = "Guess";
        $this->status = new Status();
    }
    
     public function getUserType($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM usertype WHERE id = :id");
        $sen->bindParam(":id", $id);
        if($sen->execute()){
            $rs = $sen->fetch();
            $this->id = $rs[0];
            $this->type = $rs[1];
            return $this;
        }
    }
}
