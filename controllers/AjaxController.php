<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sub = isset($_POST["sub"]) ? $_POST["sub"] : "";

    switch ($sub) {
        case "sport":

            $id = $_POST["id"];

            require_once '../models/Sport.php';
            $sport = Sport::getSport($id);
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($sport, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        case "email":
            $email = $_POST["email"];
            require_once '../models/User.php';
            $resp = User::checkEmail($email);
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($resp, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;  
        case"user":
            $user = $_POST["user"];
            require_once '../models/User.php';
             $resp = User::checkUser($user);
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($resp, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;

        default:
            break;
    }
}