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
    require_once '../models/Profile.php';
    require_once '../models/Image.php';
    require_once '../models/Video.php';
    $POST = $_POST;

    $action = isset($POST["action"]) ? $POST["action"] : "";
    switch ($action) {
        case "post":
            $token = isset($POST["token"]) ? $POST["token"] : 0;
            header("Content-Type: application/json");
            if ($token != 0) {
                if (User::verifyPass(isset($POST["var1"]) ? $POST["var1"] : "", isset($POST["var2"]) ? $POST["var2"] : "")) {
                    if (uploadFiles($token, $POST["var1"])) {
                        $user = new User();
                        $user->username = $POST["var1"];
                        echo json_encode($user->getLogin(), JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                    }
                }
            }
            break;
        case "profile":
            if (User::verifyPass(isset($POST["var1"]) ? $POST["var1"] : "", isset($POST["var2"]) ? $POST["var2"] : "")) {
                $formats = ["image/jpg", "image/jpeg", "image/gif", "image/png"];
                $url = uploadProfileImage($POST["var1"], $formats);
                if (Profile::updateProfImage($POST["prof"], $url)) {
                    echo json_encode("true", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                } else {
                    echo json_encode("false", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                }
            }
            break;
        case "banner":
            if (User::verifyPass(isset($POST["var1"]) ? $POST["var1"] : "", isset($POST["var2"]) ? $POST["var2"] : "")) {
                $formats = ["image/jpg", "image/jpeg", "image/gif", "image/png"];
                $url = uploadBannerImage($POST["var1"], $formats);
                if (Profile::updateBannImage($POST["prof"], $url)) {
                    echo json_encode("true", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                } else {
                    echo json_encode("false", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                }
            }
            break;
        case "spot":
            $token = isset($POST["token"]) ? $POST["token"] : 0;
            
            echo json_encode(Image::getImagesForSpot($token), JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            
            
            break;
        default:
            echo json_encode("false", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
    }
}

function uploadFiles($idp, $username) {
    $id = 0;
    foreach ($_FILES as $file) {
        $dot = getDot($file);
        if ($dot == "NotMedia") {
            echo json_encode("Not Suported Extension", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
        } else {
            tryPathPost($username, $idp);
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

function tryPathPost($username, $idp) {
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

//Images From User

function tryPathUser($user) {
    $path = "../../SSpotImages/UserMedia/" . $user . "-Folder";
    if (!is_dir($path)) {
        mkdir($path);
    }
    $path = "../../SSpotImages/UserMedia/" . $user . "-Folder/BannerImages";
    if (!is_dir($path)) {
        mkdir($path);
    }
    $path = "../../SSpotImages/UserMedia/" . $user . "-Folder/ProfileImages";
    if (!is_dir($path)) {
        mkdir($path);
    }
}

function uploadProfileImage($user, $formats) {
    if (in_array($_FILES["imgProf"]["type"], $formats)) {
        $dot = getDot($_FILES["imgProf"]);
        tryPathUser($user);
        $_FILES["imgProf"]["name"] = $user . "-ProfilePic" . $dot;
        move_uploaded_file($_FILES["imgProf"]["tmp_name"], "../../SSpotImages/UserMedia/" . $user . "-Folder/ProfileImages/" . $_FILES["imgProf"]["name"]);
        return $user . "-ProfilePic" . $dot;
    }
    return false;
}

function uploadBannerImage($user, $formats) {
    if (in_array($_FILES["imgBann"]["type"], $formats)) {
        $dot = getDot($_FILES["imgBann"]);
        tryPathUser($user);
        $_FILES["imgBann"]["name"] = $user . "-BannerPic" . $dot;
        move_uploaded_file($_FILES["imgBann"]["tmp_name"], "../../SSpotImages/UserMedia/" . $user . "-Folder/BannerImages/" . $_FILES["imgBann"]["name"]);
        return $user . "-BannerPic" . $dot;
    }
    return false;
}
