<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of User:
 *  
 * @author Prybet
 */
require_once '../PDO/Connection.php';
require_once 'Profile.php';
require_once 'Status.php';
require_once 'UserType.php';

class User {

    var $id;
    var $email;
    var $username;
    var $password;
    var $profile;
    var $status;
    var $userType;
    var $followers;
    var $follows;

    public function __construct() {
        $this->id = 0;
        $this->email = "";
        $this->username = "";
        $this->profile = new Profile();
        $this->status = new Status();
        $this->userType = new UserType();
    }
    //Hace un select de usuario, don
    public function getLogin() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT id, email, username, profile_id, status_id, usertype_id FROM user WHERE Status_ID = 1 AND username like :user OR email like :user ");
        $sen->bindParam(":user", $this->username);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                $res = $sen->fetch();
                $this->id = $res[0];
                $this->email = $res[1];
                $this->username = $res[2];
                $this->profile = $this->profile->getProfile($res[3]);
                $this->status = $this->status->getStatu($res[4]);
                $this->userType = $this->userType->getUserType($res[5]);
                return $this;
            } else {
                return null;
            }
        }
        return null;
    }

    public function setSingIn() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO user VALUES (null, :email, :uname, :pass, :prof, 1, 1)");
        $sen->bindParam(":email", $this->email);
        $sen->bindParam(":uname", $this->username);
        $hash = $this->encriptPass($this->password);
        $sen->bindParam(":pass", $hash);
        $prof = $this->profile->setProfile();
        $sen->bindParam(":prof", $prof);
        if ($sen->execute()) {
            return true;
        }
    }

    public function delete() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE user SET Status_ID = 6 WHERE id = :user");
        $sen->bindParam(":user", $this->id);
        if ($sen->execute()) {
            return $this->profile->delete();
        }
    }

    public function encriptPass($pass) {
        return password_hash($pass, PASSWORD_DEFAULT, ["cost" => 07]);
    }

    public static function verifyPass($user, $pass) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT password FROM user WHERE Status_ID = 1 AND username like :user OR email like :user");
        $sen->bindParam(":user", $user);
        if ($sen->execute()) {
            $rs = $sen->fetch();
            if (!$rs) {
                return false;
            }
            return password_verify($pass, $rs["password"]);
        }
    }

    public function updatePass($pass, $id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("UPDATE user SET password = :pass WHERE id = :user");
        $sen->bindParam(":pass", $this->encriptPass($pass));
        $sen->bindParam(":user", $id);
        if ($sen->execute()) {
            return true;
        }
    }

    public static function checkEmail($email) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT email FROM user WHERE email like :em");
        $sen->bindParam(":em", $email);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function checkUser($user) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT username FROM user WHERE username like :us");
        $sen->bindParam(":us", $user);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

}
