<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */
require_once '../PDO/Connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$ip = Connection::$ip;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../models/User.php';
    require_once '../models/Recovery.php';
    session_start();
    if ($_POST["submit"] == "recover") {
        $user = $_SESSION["user"];
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $user->email = $email;
        if(Recovery::verifyEmail($email)){
            $user = Recovery::getData($email);
        }else{
            $_SESSION["err"] = "El correo electronico no se encuenta en nuestros registros";
            header("Location: ../views/recovery");
        }
        $recov = new Recovery();
        $recov->userId = $user->id;
        $recov->hash = bin2hex(random_bytes(20));
        $link = $ip."/SocialSpot/Controllers/RecoveryController.php?token=".$recov->hash;
        if ($recov->setRecovery()) {
            require_once '../mailer/vendor/autoload.php';

            $mail = new PHPMailer(true);
            try {
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host = "smtp.office365.com";
                $mail->SMTPAuth = true;
                $mail->Username = "recovery.socialspot@outlook.com";
                $mail->Password = "skmaps88";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom("recovery.socialspot@outlook.com", "RECOVERY SOCIALSPOT");
                $mail->addAddress($user->email, "CONTACTO" . $user->profile->name);
                $mail->addCC("contactus.sspot@gmail.com");

                $mail->isHTML(true);
                $mail->Subject = "Actualizar tu contraseña de SocialSpot";
                $mail->Body = "Hola <b>" . $user->profile->name . "</b> <br/> Has solicitad una nueva contraseña. Para restablecerla pincha <a href=".$link.">acá</a> ";
                $mail->send();
                header("Location: ../views/reply");
            } catch (Exception $ex) {
                echo $ex->getTraceAsString() . $mail->ErrorInfo;
            }
        }
    }
    header("Location: ../views/index");
}
header("Location: ../views/index");