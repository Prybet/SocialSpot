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
    // Insert new Post
    if (User::verifyPass($params->userProfile->username, $params->userProfile->name)) {
        $post = new Post();
        $post->profID = $params->profID;
        $post->userProfile = $params->userProfile;
        $post->title = $params->title;
        $post->body = $params->body;
        $post->category = $params->category;
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
} elseif ($method == "PUT") {
    $params = json_decode($body);
    $action = $params->action;
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
        default :
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode("Poto", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
    }
}

 