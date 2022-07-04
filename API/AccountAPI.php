<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */


require_once '../PDO/Connection.php';
require_once '../models/User.php';
require_once '../models/Profile.php';
require_once '../models/Follow.php';

if ($_SERVER["REQUEST_METHOD"] == "PUT") {

    $body = file_get_contents('php://input');
    $action = json_decode($body);

    switch ($action) {
        case is_numeric($action):
            $prof = Profile::getProfile($action);
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($prof, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        default :
            break;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $body = file_get_contents('php://input');
    $params = json_decode($body);
    $user = new User();

    switch ($params->action) {
        case"user":
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode(isUser($params), JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        default:
            break;
    }
}

function isUser($params) {

    switch ($params->context) {
        case "logIn":
            return logIn($params->user);
        case "edit":
            return edit($params->user);
        case "singIn":
            return singIn($params->user);
        case "follow":
            return follow($params);
        default:
            break;
    }
}

function follow($params) {
    $follow = new Follow();
    if (User::verifyPass($params->var1, $params->var2)) {
        $follow->id = $params->follow->id;
        $follow->profile = $params->follow->profile;
        $follow->me = $params->follow->me;
        if ($follow->findFollow($follow)) {
            return Follow::getFollowers($follow->profile);
        }
    }
}

function logIn($params) {
    $user = new User();
    if ($user->verifyPass($params->username, $params->password)) {
        $user->username = $params->username;
        $user->password = $params->password;
        return $user->getLogin();
    } else {
        return null;
    }
}

function edit($params) {
    $user = new User();
    if ($user->verifyPass($params->username, $params->password)) {
        $user->id = $params->id;
        $user->username = $params->username;
        $user->password = $params->password;
        $user->profile = new Profile();
        $user->profile->id = $params->profile->id;
        $user->profile->name = $params->profile->name;
        $user->profile->description = $params->profile->description;
        $user->profile->birthDate = $params->profile->birthDate;
        if ($user->profile->update()) {
            return $user->getLogin();
        }
    }
}

function singIn($params) {
    $user = new User();
    $user->email = $params->email;
    $user->username = $params->username;
    $user->password = $params->password;
    $user->profile = new Profile();
    $user->profile->name = $params->profile->name;
    $user->profile->username = $params->profile->username;
    $user->profile->birthDate = $params->profile->birthDate;
    $user->profile->status = new Status();
    if ($user->setSingIn()) {
        return $user->getLogin();
    }
}
