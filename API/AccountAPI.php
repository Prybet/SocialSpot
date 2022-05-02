<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

require_once '../PDO/Connection.php';
require_once '../models/User.php';
require_once '../models/Profile.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $body = file_get_contents('php://input');
    $params = json_decode($body);
    $sub = isset($params->id) ? $params->id : 0; //"Log-In";
    $user = new User();
    switch ($sub) {
        case 0:
            if ($user->verifyPass($params->username, $params->password)) {
                $user->username = $params->username;
                $user->password = $params->password;
                if ($user->getLogin()) {
                    header("Content-Type: application/json; charset=UTF8");
                    echo json_encode($user, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                } else {
                    $user = null;
                    header("Content-Type: application/json; charset=UTF8");
                    echo json_encode($user, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                }
            } else {
                $user = null;
                header("Content-Type: application/json; charset=UTF8");
                echo json_encode($user, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            }
            break;
        case!0:
            if ($user->verifyPass($params->username, $params->password)) {
                $user->id = $params->id;
                $user->username = $params->username;
                $user->password = $params->password;
                $user->profile = new Profile();
                $user->profile->id = $params->profile->id;
                $user->profile->name = $params->profile->name;
                $user->profile->description = $params->profile->description;
                $date = date_create($params->profile->birthDate);
                $user->profile->birthDate = date_format($date, "Y-m-d");
                $user->profile->imageURL = $params->profile->imageURL;
                $user->profile->bannerURL = $params->profile->bannerURL;
                if ($user->profile->update()) {
                    header("Content-Type: application/json; charset=UTF8");
                    echo json_encode($user->getLogin(), JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                }
            }
            break;
        default:
            break;
    }
}


    