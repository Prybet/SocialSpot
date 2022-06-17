<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */
require_once '../models/User.php';
require_once '../models/Post.php';
require_once '../models/Image.php';
session_start();
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "GET") {

    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    if ($id > 0) {
        $_SESSION["post"] = Post::getPost($id);
        header("Location: ../views/post.php");
    } else {
        header("Location: ../views/index.php");
    }
} elseif ($method == "POST") {

    $formats = ["image/jpg", "image/jpeg", "image/gif", "image/png", "video/mp4", "video/mov"];

    if ($_POST["submit"] == "post") {
        $cate = isset($_POST["cate"]) ? $_POST["cate"] : "";
        $title = isset($_POST["title"]) ? $_POST["title"] : "";
        $body = isset($_POST["body"]) ? $_POST["body"] : "";
        $check = isset($_POST["check"]) ? $_POST["check"] : "";

        if ($cate != "" && $title != "") {

            $user = $_SESSION["user"];
            $post = new Post();
            $post->profID = $user->profile->id;
            $post->title = $title;
            $post->body = $body;
            $post->category = new Category();
            $post->category->id = $cate;
            $idp = $post->setPost();
            if (uploadFiles($idp)) {
                $_SESSION["post"] = Post::getPost($idp);
                header("Location: ../views/post.php");
            } else {
                header("Location: ../views/index.php");
            }
        }
    } elseif ($_POST["submit"] == "comm") {
        $user = $_SESSION["user"];
        if ($user != null) {
            $comm = isset($_POST["comm"]) ? $_POST["comm"] : "";
        }
        
        //Edit Post
    } elseif($_POST["submit"] == "edit"){
        $id = isset($_POST["postID"]) ? $_POST["postID"] : "";
        $title = isset($_POST["title"]) ? $_POST["title"] : "";
        $body = isset($_POST["body"]) ? $_POST["body"] : "";
        if($title != "" && $body != ""){
            $post = $_SESSION["user"]->profile->getThisPost($id);
            $post->title = $title;
            $post->body = $body;
            
            if($post->editPost()){
                header("Location: ../views/profile.php");
            }
        }
        //Delete Post
    }elseif($_POST["submit"] == "delete"){
        $id = isset($_POST["postID"]) ? $_POST["postID"] : "";
        $post = $_SESSION["user"]->profile->getThisPost($id);
        $user = $_SESSION["user"];
        if($post->deleteThis()){
            $_SESSION["user"] = $user->getLogin();
            header("Location: ../views/profile.php");
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
            insertMedia($dot, $idp, $prof->username . "-Folder/Post-" . $idp . "Folder/" . $file["name"]);
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
