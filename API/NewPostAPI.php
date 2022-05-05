<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $body = file_get_contents('php://input');
    $params = json_decode($body);
    $sub = $params->sub;

    switch ($sub) {
        case "sports":
            require_once '../models/Sport.php';
            $sports = Sport::getAllSports();
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($sports, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        default:
            break;
    }
}