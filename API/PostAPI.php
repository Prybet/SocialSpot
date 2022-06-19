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

header("Content-Type: application/json; charset=UTF8");
if ($method == "POST") {
    $body = file_get_contents('php://input');
    $params = json_decode($body);
    $id = isset($params->id) ? $params->id : "err";

    if ($id == "err") {
        $token = isset($_POST["token"]) ? $_POST["token"] : "err";
        echo $token;
        foreach ($_FILES as $i => $file) {
            $respuesta = "Imagen subida exitosamente:  : " . $_FILES[$i]["type"];
            echo json_encode($respuesta);
        }
    }

    switch ($id) {
        case "err":
            echo json_encode(null, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        case 0:
            // Insert new Post
            if (User::verifyPass($params->userProfile->username, $params->userProfile->name)) {
                $post = makePost($params);
                $id = $post->setPost();
                if ($id > 0) {
                    $user = new User();
                    $user->username = $params->userProfile->username;
                    $user->password = $params->userProfile->name;
                    if ($user->getLogin()) {
                        echo json_encode($id, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                    }
                }
            } else {
                echo json_encode(false, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            }
            break;
        case $id > 0:
            //edit Post
            if (User::verifyPass($params->userProfile->username, $params->userProfile->name)) {
                $post = makePost($params);
                if ($post->editPost()) {
                    echo json_encode("true", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                } else {
                    echo json_encode("false", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                }
            } else {
                echo json_encode("null", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            }
            break;
        case -1:
            if (User::verifyPass($params->userProfile->username, $params->userProfile->name)) {
                $post = makePost($params);
                if ($post->delete()) {
                    echo json_encode("true", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
                } else {
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
            echo json_encode("Callo en error", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        default :
            echo json_encode("Default no fue ningun caso", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
    }
}

function makePost($params) {
    $post = new Post();
    $post->id = $params->id;
    $post->profID = $params->profID;
    $post->userProfile = $params->userProfile;
    $post->title = $params->title;
    $post->body = $params->body;
    $post->category = $params->category;
    $post->hashtags = $params->hashtags;
    return $post;
}
