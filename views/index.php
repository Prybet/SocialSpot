<?php
require_once '../models/User.php';
require_once '../models/UserType.php';
session_start();
$_SESSION["err"] = isset($_SESSION["err"])? $_SESSION["user"]  : "";
$_SESSION["user"] = isset($_SESSION["user"]) ? $_SESSION["user"]  : new User();

$to = "titato1001@richdn.com";
$subject = "Asunto del email";
$message = "Este es mi primer envío de email con PHP";
$headers = "From: titato1001@richdn.com" . "\r\n" . "CC: destinatarioencopia@email.com";
 
mail($to, $subject, $message, $headers);
 
mail($to, $subject, $message, $headers);
header("location: ../views/login.php");