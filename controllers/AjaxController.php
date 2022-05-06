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

        default:
            break;
    }
}