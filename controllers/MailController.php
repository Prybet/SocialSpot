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
        if(Recovery::verifyEmail($email)){
            $user = Recovery::getData($user);
        }else{
            $_SESSION["err"] = "El correo electronico no se encuenta en nuestros registros";
            header("Location: ../views/recovery.php");
        }
        $recov = new Recovery();
        $recov->userId = $user->id;
        $recov->hash = bin2hex(random_bytes(20));
        $link = "http://localhost/SocialSpot/Controllers/RecoveryController.php?token=".$recov->hash;
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
                $mail->Body = "Hola <b>" . $user->profile->name . "</b> <br/> Has solicitad una nueva contraseña. Para restablecerla pincha <a href=".$link.">acá</a> ";
                $mail->send();
                header("Location: ../views/reply.php");
            } catch (Exception $ex) {
                echo $ex->getTraceAsString() . $mail->ErrorInfo;
            }
        }
    }
    header("Location: ../views/index.php");
}
header("Location: ../views/index.php");