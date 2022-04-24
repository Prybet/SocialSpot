<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Status
 *
 * @author Prybet
 */

require_once '../PDO/Connection.php';

class Status {
    var $id;
    var $name;
    
    public function __construct() {
        $this->id = 1;
        $this->name = "Active";
    }
    
    public function getStatu($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM status WHERE id = :id");
        $sen->bindParam(":id", $id);
        if($sen->execute()){
            $rs = $sen->fetch();
            $this->id = $rs[0];
            $this->name = $rs[1];
            return $this;
        }
    }
}
