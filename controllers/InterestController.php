<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

require_once '../models/User.php';
require_once '../models/Interests.php';
require_once '../models/Search.php';
session_start();
$ip = Connection::$ip;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $POST = $_POST;

    if ($POST["submit"] == "follInterest") {
        $id = isset($POST["inte"]) ? $POST["inte"] : "";
        $con = isset($POST["context"]) ? $POST["context"] : "";
        if ($con == "") {
            header("Location: ../views/index");
        }
        $inte = new Interests();
        $inte->typeID = $id;
        $inte->profile = $_SESSION["user"]->profile->id;
        $inte->context = $con;
        $inte->findInterest();
        header("Location:" . $ip . "/SocialSpot/views/interests?id=" . $id . "&context=" . $con);
    } elseif ($POST["submit"] == "search") {
        $nom = isset($POST["nom"]) ? $POST["nom"] : "";
        if ($nom != "") {
            header("Location: ../views/search?nom=$nom");
        } else {
            header("Location: ../views/search?nom=$nom");
        }
    } elseif ($POST["submit"] == "goLogin") {
        header("Location: ../views/login");
    }
} else {
    header("Location: ../views/index");
}



