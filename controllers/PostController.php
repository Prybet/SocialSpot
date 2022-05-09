<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $formats = ["image/jpg", "image/jpeg", "image/gif", "image/png", "video/mp4", "video/mov"];
    require_once '../models/User.php';
    require_once '../models/Post.php';
    require_once '../models/Image.php';
    session_start();
    if ($_POST["submit"] == "post") {
        $cate = isset($_POST["cate"]) ? $_POST["cate"] : "";
        $title = isset($_POST["title"]) ? $_POST["title"] : "";
        $body = isset($_POST["body"]) ? $_POST["body"] : "";
        $check = isset($_POST["check"]) ? $_POST["check"] : "";

        if ($cate != "" && $title != "") {

            $user = $_SESSION["user"];
            $post = new Post();
            $post->userId = $user->id;
            $post->title = $title;
            $post->body = $body;
            $post->category = $cate;
            $idp = $post->setPost();
            if (uploadFiles($idp)) {
                header("Location: ../views/post.php");
            } else {
                header("Location: ../views/index.php");
            }
        }
    }
}

function uploadFiles($idp) {
    $prof = $_SESSION["user"]->profile;
    $id = 0;
    foreach ($_FILES as $file) {
        $dot = getDot($file);
        if ($dot == "NotMedia") {
            $_SESSION["err"] = "Archivo no soportado: " . $file["name"];
        } else {
            tryPath($prof, $idp);
            $path = "../../SSpotImages/UserMedia/" . $prof->username . "-Folder/Post-" . $idp . "Folder";
            $file["name"] = $prof->username . "-Post-" . $idp . "File-" . $id . $dot;
            move_uploaded_file($file["tmp_name"], $path . "/" . $file["name"]);
            Image::setImage($idp, $file["name"]);
            $id++;
        }
    }
    return true;
}

function tryPath($prof, $idp) {
    $path = "../../SSpotImages/UserMedia/" . $prof->username . "-Folder";
    if (!is_dir($path)) {
        mkdir($path);
    }
    $path = "../../SSpotImages/UserMedia/" . $prof->username . "-Folder/Post-" . $idp . "Folder";
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
