<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

$METHOD = $_SERVER["REQUEST_METHOD"];
if($METHOD == "GET"){
    require_once '../models/Spot.php';
    header("Content-Type: application/json");
    
    echo json_encode( Spot::getAll(), JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
    
    
}elseif ($METHOD == "POST") {
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
            $spot->address =  $POST["address"];
            
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
            $spot->imageURL = uploadImage(0, $user);
            $resp = Spot::setSpot($spot);
            if ($resp != null) {
                echo json_encode($resp, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            }
        } else {
            echo json_encode("Wrong Credentials", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
        }
    }
}

function uploadImage($idsp, $username) {
    $id = 0;
    foreach ($_FILES as $file) {
        $dot = getDot($file);
        if ($dot == "NotMedia") {
            echo json_encode("Not Suported Extension", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
        } else {
            tryPathSpot($username, $idsp);
            $path = "../../SSpotImages/UserMedia/" . $username . "-Folder/Spot-" . $idsp . "Folder";
            $file["name"] = $username . "-Spot-" . $idsp . "Image-" . $id . $dot;
            move_uploaded_file($file["tmp_name"], $path . "/" . $file["name"]);
            $id++;
            return $username . "-Folder/Spot-" . $idsp . "Folder/" . $file["name"];
        }
    }
    return true;
}

function tryPathSpot($username, $idsp) {
    $path = "../../SSpotImages/UserMedia/" . $username . "-Folder";
    if (!is_dir($path)) {
        mkdir($path);
    }
    $path = "../../SSpotImages/UserMedia/" . $username . "-Folder/Spot-" . $idsp . "Folder";
    if (!is_dir($path)) {
        mkdir($path);
    }
}

function getDot($file) {
    switch ($file["type"]) {
        case "*/jpg":
            return ".jpg";
        case "image/jpg":
            return ".jpg";
        case "*/jpeg":
            return ".jpeg";
        case "image/jpeg":
            return ".jpeg";
        case "*/gif":
            return ".gif";
        case "image/gif":
            return ".gif";
        case "*/png":
            return ".png";
        case "image/png":
            return ".png";
        case "image/mp4":
            return ".mp4";
        case "*/mp4":
            return ".mp4";
        case "image/mov":
            return ".mov";
        case "*/mov":
            return ".mov";
        default:
            return "NotMedia";
    }
}
