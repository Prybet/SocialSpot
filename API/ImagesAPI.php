<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */
$METHOD = $_SERVER["REQUEST_METHOD"];
if ($METHOD == "POST") {
    require_once '../models/User.php';
    require_once '../models/Image.php';
    require_once '../models/Video.php';
    $POST = $_POST;

    $token = isset($POST["token"]) ? $POST["token"] : 0;
    header("Content-Type: application/json");
    if ($token != 0) {
        if (User::verifyPass(isset($POST["var1"]) ? $POST["var1"] : "", isset($POST["var2"]) ? $POST["var2"] : "")) {
            if (uploadFiles($token, $var1)){
                $user = new User();
                $user->username = $POST["var1"];
                echo json_encode($user->getLogin(), JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            }
        }
    }
}

function uploadFiles($idp, $username) {
    $id = 0;
    foreach ($_FILES as $file) {
        $dot = getDot($file);
        if ($dot == "NotMedia") {
            echo json_encode("Not Suported Extension", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
        } else {
            tryPath($username, $idp);
            $path = "../../SSpotImages/UserMedia/" . $username . "-Folder/Post-" . $idp . "Folder";
            $file["name"] = $username . "-Post-" . $idp . "File-" . $id . $dot;
            move_uploaded_file($file["tmp_name"], $path . "/" . $file["name"]);
            insertMedia($dot, $idp, $username . "-Folder/Post-" . $idp . "Folder/" . $file["name"]);
            $id++;
        }
    }
    return true;
}

function insertMedia($dot, $idp, $name) {
    if ($dot == ".mp4" || $dot == ".mov") {
        Video::setVideo($idp, $name);
    } else {
        Image::setImage($idp, $name);
    }
}

function tryPath($username, $idp) {
    $path = "../../SSpotImages/UserMedia/" . $username . "-Folder";
    if (!is_dir($path)) {
        mkdir($path);
    }
    $path = "../../SSpotImages/UserMedia/" . $username . "-Folder/Post-" . $idp . "Folder";
    if (!is_dir($path)) {
        mkdir($path);
    }
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
        case "video/mp4":
            return ".mp4";
        case "video/mov":
            return ".mov";
        default:
            return "NotMedia";
    }
}
