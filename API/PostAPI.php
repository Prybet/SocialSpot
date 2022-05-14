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
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "POST") {
    $body = file_get_contents('php://input');
    $params = json_decode($body);

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
}

 