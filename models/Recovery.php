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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Recovery {

    var $id;
    var $hash;
    var $userId;
    var $status;

    public static function fillData($user) {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "smtp.office365.com";
        $mail->SMTPAuth = true;
        $mail->Username = "recovery.socialspot@outlook.com";
        $mail->Password = "skmaps88";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom("recovery.socialspot@outlook.com", "RECOVERY SocialSpotAPP");
        $mail->addAddress($user->email, "CONTACTO - " . $user->profile->name);
        $mail->addCC("contactus.sspot@gmail.com");

        $mail->isHTML(true);
        $mail->Subject = "Actualizar tu Password de SocialSpot";
        return $mail;
    }

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

    public static function getData($email) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT user.id, email, user.username, name FROM user inner join profile on user.profile_id = profile.id WHERE email like :email");
        $sen->bindParam(":email", $email);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                $u = new User();
                $rs = $sen->fetch();
                $u->id = $rs[0];
                $u->email = $rs[1];
                $u->profile->name = $rs[2];
                return $u;
            } else {
                return false;
            }
            return false;
        }
    }

    public static function verifyEmail($email) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT id FROM user WHERE email like :em  AND status_id = 1");
        $sen->bindParam(":em", $email);
        if ($sen->execute()) {
            if ($sen->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
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
        if ($sen->execute()) {
            return true;
        }
    }

}
