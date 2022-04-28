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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $body = file_get_contents('php://input');
    $params = json_decode($body);
    $sub = $params->action;
    
    switch ($sub) {
        case "Log-In":
            $user = new User();
            if ($user->verifyPass($params->user, $params->pass)) {
                $user->username = $params->user;
                $user->password = $params->pass;
                if ($user->getLogin()) {
                    header("Content-Type: application/json; charset=UTF8");
                    echo json_encode($user, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                } else {
                    $user = null;
                    header("Content-Type: application/json; charset=UTF8");
                    echo json_encode($user, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                }
            }
            break;

        default:
            break;
    }
}


    