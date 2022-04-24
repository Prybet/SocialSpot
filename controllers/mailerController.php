<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../models/User.php';
    require_once '../models/Recovery.php';
    session_start();
    if ($_POST["submit"] == "recover") {
        $user = $_SESSION["user"];
        $user->email = isset($_POST["email"]) ? $_POST["email"] : "";
        $recov = new Recovery();
        $user = $recov->getData($user);
        $recov->userId = $user->id;
        $recov->hash = password_hash($user->username . $user->profile->name, PASSWORD_DEFAULT, ["cost" => 05]);
        $link = "http://localhost/SocialSpot/views/reply.php?token=".$recov->hash;
        if ($recov->setRecovery()) {
            require_once '../mailer/vendor/autoload.php';

            $mail = new PHPMailer(true);
            try {
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "contactus.sspot@gmail.com";
                $mail->Password = "skmaps88";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom("contactus.sspot@gmail.com", "RECOVERY SOCIALSPOT");
                $mail->addAddress($user->email, "CONTACTO" . $user->profile->name);
                $mail->addCC("contactus.sspot@gmail.com");

                $mail->isHTML(true);
                $mail->Subject = "Actualizar tu contraseña de SocialSpot";
                $mail->Body = "Hola <b>" . $user->profile->name . "</b> <br> Has solicitad una nueva contraseña. Para restablecerla pincha <a href=".$link.">acá</a> ";
                $mail->send();
                header("Location: ../views/reply.php");
            } catch (Exception $ex) {
                echo $ex->getTraceAsString() . $mail->ErrorInfo;
            }
        }
    }
    if ($_POST["submit"] == "verify") {
        
    }
    header("Location: ../views/index.php");
}
header("Location: ../views/index.php");
