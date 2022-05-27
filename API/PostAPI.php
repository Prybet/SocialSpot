<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */
require_once '../models/User.php';
require_once '../models/Profile.php';
require_once '../models/Report.php';
$method = $_SERVER["REQUEST_METHOD"];
$body = file_get_contents('php://input');
$params = json_decode($body);

if ($method == "POST") {
    $body = file_get_contents('php://input');
    $params = json_decode($body);
    $id = isset($params->id) ? $params->id : "err";

    switch ($id) {
        case "err":
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode(null, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        case 0:
            // Insert new Post
            if (User::verifyPass($params->userProfile->username, $params->userProfile->name)) {
                $post = new Post();
                $post->profID = $params->profID;
                $post->userProfile = $params->userProfile;
                $post->title = $params->title;
                $post->body = $params->body;
                $post->category = $params->category;
                $post->hashtags = $params->hashtags;
                if ($post->setPost() > 0) {
                    $user = new User();
                    $user->username = $params->userProfile->username;
                    $user->password = $params->userProfile->name;
                    if ($user->getLogin()) {
                        header("Content-Type: application/json; charset=UTF8");
                        echo json_encode($user, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                    }
                }
            } else {
                header("Content-Type: application/json; charset=UTF8");
                echo json_encode(false, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            }
            break;
        case $id > 0:
            //edit Post
            if (User::verifyPass($params->userProfile->username, $params->userProfile->name)) {
                $post = new Post();
                $post->profID = $params->profID;
                $post->userProfile = $params->userProfile;
                $post->title = $params->title;
                $post->body = $params->body;
                $post->category = $params->category;
                
                
            } else {
                header("Content-Type: application/json; charset=UTF8");
                echo json_encode(false, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            }
            break;
        case -1:
            if (User::verifyPass($params->userProfile->username, $params->userProfile->name)) {
                if (Post::delete($params)) {
                    header("Content-Type: application/json; charset=UTF8");
                    echo json_encode("true", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                } else {
                    header("Content-Type: application/json; charset=UTF8");
                    echo json_encode("false", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                }
            }

            break;
        default:
            break;
    }
} elseif ($method == "PUT") {
    $params = json_decode($body);
    $action = isset($params->action) ? $params->action : "error";
    switch ($action) {
        case "reply":
            $comms = Reply::getRepliesByPostId($action);
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($comms, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        case "report":
            if (Report::setReport($params)) {
                echo json_encode("si", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode("no", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "error":
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode("Callo en error", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        default :
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode("Default no fue ningun caso", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
    }
}

 