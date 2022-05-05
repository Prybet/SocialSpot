<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$body = file_get_contents('php://input');
   // $params = json_decode($body);
   // $id = $params->id;
    
    $id = $_POST["id"];

    require_once '../models/Sport.php';
    $sport = Sport::getSport($id);
    header("Content-Type: application/json; charset=UTF8");
    echo json_encode($sport, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
}