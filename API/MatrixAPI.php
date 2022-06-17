<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */
require_once '../models/Hashtag.php';
$body = file_get_contents('php://input');
$params = json_decode($body);
echo Hashtag::toHashTag($params);
/*
$response = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json', [
            'units' => 'metric',
            'origins' => 'Neuhöfer Damm 110,Germany',
            'destinations' => 'Vogelweide 8,Hamburg',
            'key' => 'AIzaSyDyW5Ude8yM4oeCjlwVLbAYE6XYG87OcGY'
        ]);
echo $response;
$_SESSION["user"]->profile->getThisPosgt($id);
*/