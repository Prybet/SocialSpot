<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */


$METHOD = $_SERVER["REQUEST_METHOD"];
if ($METHOD == "PUT") {
    require_once '../models/User.php';
    require_once '../models/Spot.php';

    $body = file_get_contents('php://input');
    $params = json_decode($body);

    if ($params->var3 != null) {
        if (User::verifyPass(isset($params->var1) ? $params->var1 : "", isset($params->var2) ? $params->var2 : "")) {
            if (Spot::deleteByID($params->var3)) {
                header("Content-Type: application/json");
                echo json_encode("True", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode("False", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            }
        }
    }
} elseif ($METHOD == "GET") {
    require_once '../models/Spot.php';
    header("Content-Type: application/json");

    echo json_encode(Spot::getAll(), JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
} elseif ($METHOD == "POST") {
    require_once '../models/User.php';
    require_once '../models/Spot.php';
    require_once '../models/Marker.php';
    $POST = $_POST;

    $name = isset($POST["name"]) ? $POST["name"] : "";
    if ($name != "") {
        header("Content-Type: application/json");
        if (User::verifyPass(isset($POST["var1"]) ? $POST["var1"] : "", isset($POST["var2"]) ? $POST["var2"] : "")) {
            $user = $POST["var1"];
            $spot = new Spot();
            $spot->prof = $POST["prof"];
            $spot->name = $POST["name"];
            $spot->description = $POST["description"];
            $spot->address = $POST["address"];

            $region = new Region();
            $region->name = $POST["level1"];
            $region->country = $POST["country"];

            $prov = new Province();
            $prov->name = $POST["level2"];

            $spot->commune = new City();
            $spot->commune->name = $POST["level3"];
            $spot->commune->province = $prov;
            $spot->commune->province->region = $region;

            $spot->marker = new Marker($POST["LAT"], $POST["LNG"]);
            $spot->imageURL = uploadImage($POST["LAT"] . $POST["LNG"], $user);
            $resp = Spot::setSpot($spot);
            if ($resp != null) {
                echo json_encode($resp, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            }
        } else {
            echo json_encode("Wrong Credentials", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
        }
    }
}

function uploadImage($latlng, $username) {
    $file = $_FILES["imgSpot"];
    $dot = getDot($file);
    if ($dot == "NotMedia") {
        echo json_encode("Not Suported Extension", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
    } else {
        $path = tryPathSpot($username, $latlng);
        $file["name"] = $latlng . "-Image" . $dot;
        move_uploaded_file($file["tmp_name"], $path . "/" . $file["name"]);
        return $path . "/" . $file["name"];
    }

    return true;
}

function tryPathSpot($username, $latlng) {
    $path = "../../SSpotImages/SpotMedia/Spots-Folder-" . $username;
    if (!is_dir($path)) {
        mkdir($path);
    }
    $path = "../../SSpotImages/SpotMedia/Spots-Folder-" . $username . "/Spot-" . $latlng . "-Folder";
    if (!is_dir($path)) {
        mkdir($path);
    }
    return $path;
}

function getDot($file) {
    switch ($file["type"]) {
        case "image/jpg":
            return ".jpg";
        case "image/jpeg":
            return ".jpeg";
        case "image/gif":
            return ".gif";
        case "image/png":
            return ".png";
        default:
            return "NotMedia";
    }
}
