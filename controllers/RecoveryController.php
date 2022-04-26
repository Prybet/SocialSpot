<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $tkn = isset($_GET["token"]) ? $_GET["token"] : "";
    if ($tkn != "") {
        require_once '../models/Recovery.php';
        $re = new Recovery();
        if ($re->getVerify($tkn)) {
            session_start();
            $_SESSION["recov"] = $re;
            header("Location: ../views/reply.php");
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass = isset($_POST["pass"]) ? $_POST["pass"] : "";
    require_once '../models/User.php';
    require_once '../models/Recovery.php';
    session_start();
    $user = new User();
    if ($_SESSION["recov"]->setClose()) {
        if ($user->updatePass($pass, $_SESSION["recov"]->userId)) {
            $_SESSION["recov"]= "";
            header("Location: ../views/index.php");
        }
    }
}