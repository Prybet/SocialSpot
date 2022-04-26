<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Recovery
 *
 * @author Prybet
 */
require_once '../PDO/Connection.php';
require_once 'Status.php';
require_once 'User.php';
require_once 'Profile.php';

class Recovery {

    var $id;
    var $hash;
    var $userId;
    var $status;

    public function __construct() {
        $this->id = 0;
        $this->hash = 0;
        $this->userId = 0;
        $status = new Status();
        $status->id = 9;
        $status->name = "Pending";
        $this->status = $status;
    }

    public function setRecovery() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO recovery VALUES(null,:hash , :user, :sta, CURRENT_TIMESTAMP)");
        $sen->bindParam(":user", $this->userId);
        $sen->bindParam(":hash", $this->hash);
        $sen->bindParam(":sta", $this->status->id);
        if ($sen->execute()) {
            return true;
        }
    }

    public function getData($user) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT user.id, email, user.username, name FROM user inner join profile on user.profile_id = profile.id WHERE email like :email");
        $sen->bindParam(":email", $user->email);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                $rs = $sen->fetch();
                $user->id = $rs[0];
                $user->email = $rs[1];
                $user->profile->name = $rs[2];
                return $user;
            } else {
                return false;
            }
            return false;
        }
    }

    public function getVerify($tkn) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT id, user_id FROM recovery WHERE hash like :tkn AND status_id = 9");
        $sen->bindParam(":tkn", $tkn);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                $rs = $sen->fetch();
                $this->id = $rs[0];
                $this->userId = $rs[1];
                return $this;
            } else {
                return false;
            }
        }
    }

    public function setClose() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE recovery SET status_id = 10 WHERE user_id = :id");
        $sen->bindParam(":id", $this->userId);
        if($sen->execute()){
            return true;
        }
    }
}
