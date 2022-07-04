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
require_once '../models/Report.php';
require_once '../models/Hashtag.php';
session_start();
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "GET") {

    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    if ($id > 0) {
        $_SESSION["post"] = Post::getPost($id);
        header("Location: ../views/post");
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
        $spot = isset($_POST["spot"]) ? $_POST["spot"] : 0;
        $hash = isset($_POST["hashtags"]) ? $_POST["hashtags"] : null;
        if ($cate != "" && $title != "") {
            if ($cate != -1) {
                $user = $_SESSION["user"];
                $post = new Post();
                $post->profID = $user->profile->id;
                $post->title = $title;
                $post->body = $body;
                $post->category = new Category();
                $post->category->id = $cate;
                $post->spot = new Spot();
                $post->spot->id = $spot;
                $post->hashtags = Hashtag::makeHashtags($hash);
                $idp = $post->setPost();
                if (uploadFiles($idp)) {
                    $_SESSION["post"] = Post::getPost($idp);
                    header("Location: ../views/post.php");
                } else {
                    header("Location: ../views/index.php");
                }
            } else {
                $_SESSION["errCate"] = true;
                header("Location: ../views/Newpost.php");
            }
        }
        //Reply For Post
    } elseif ($_POST["submit"] == "comm") {
        $user = $_SESSION["user"];
        if ($user != null) {
            $comm = isset($_POST["comm"]) ? $_POST["comm"] : "";
            if ($comm != "") {
                $rep = new Reply();
                $rep->post = $_SESSION["post"]->id;
                $rep->profile = $_SESSION["user"]->profile->id;
                $rep->body = $comm;
                if ($rep->setReply()) {
                    header("Location: ../views/post.php");
                }
            } else {
                header("Location: ../views/post.php");
            }
        }
        //Reply For Reply
    } elseif ($_POST["submit"] == "reply") {
        $user = $_SESSION["user"];
        if ($user != null) {
            $body = isset($_POST["body"]) ? $_POST["body"] : "";
            $id = isset($_POST["comId"]) ? $_POST["comId"] : "";
            if ($body != "") {
                $rep = new Reply();
                $rep->post = $_SESSION["post"]->id;
                $rep->profile = $_SESSION["user"]->profile->id;
                $rep->body = $body;
                $rep->replies = $id;
                if ($rep->setReplyForReply()) {
                    header("Location: ../views/post.php");
                }
            } else {
                header("Location: ../views/post.php");
            }
        }

        //Edit Post
    } elseif ($_POST["submit"] == "edit") {
        $id = isset($_POST["postID"]) ? $_POST["postID"] : "";
        $title = isset($_POST["title"]) ? $_POST["title"] : "";
        $body = isset($_POST["body"]) ? $_POST["body"] : "";
        if ($title != "" && $body != "") {
            $post = $_SESSION["user"]->profile->getThisPost($id);
            $post->title = $title;
            $post->body = $body;

            if ($post->editPost()) {
                header("Location: ../views/profile.php");
            }
        }
        //Delete Post
    } elseif ($_POST["submit"] == "delete") {
        $id = isset($_POST["postID"]) ? $_POST["postID"] : "";
        $post = $_SESSION["user"]->profile->getThisPost($id);
        $user = $_SESSION["user"];
        if ($post->deleteThis()) {
            $_SESSION["user"] = $user->getLogin();
            header("Location: ../views/profile.php");
        }
        //Report Post
    } elseif ($_POST["submit"] == "report_post") {
        $user = $_SESSION["user"];
        if ($user != null) {
            $com = isset($_POST["com"]) ? $_POST["com"] : "";
            $idPost = isset($_POST["idpost"]) ? $_POST["idpost"] : "";
            $rReport = isset($_POST["radio_report"]) ? $_POST["radio_report"] : "";
            $view = isset($_POST["goView"]) ? $_POST["goView"] : "";
            $id = isset($_POST["when"]) ? $_POST["when"] : "";
            if ($rReport != "") {
                $rprt = new Report();
                $norm = new Norm();
                $norm->id = $rReport;
                $rprt->norm = $norm;
                $rprt->userId = $_SESSION["user"]->id;
                $rprt->postId = $idPost;
                $rprt->replyId = null;
                $rprt->spotId = null;
                $rprt->commentary = $com;
                if ($rprt->setReport($rprt)) {
                    $_SESSION["modalReport"] = true;
                    if ($view == "profilepublic") {
                        header("Location: ../views/profilepublic.php?id=$id");
                    } elseif ($view == "main") {
                        header("Location: ../views/main.php");
                    } elseif ($view == "post") {
                        header("Location: ../views/post.php");
                    } elseif ($view == "interests") {
                        header("Location: ../views/interests.php?id=$id");
                    }
                } else {
                    echo 'malooooooo';
                }
            } else {
                echo 'faaaaillll';
            }

            //print_r($_POST);
        }
    } elseif ($_POST["submit"] == "goLogin") {
        header("Location: ../views/login.php");
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
        case "image/mov":
            return ".mov";
        default:
            return "NotMedia";
    }
}
