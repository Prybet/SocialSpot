<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */
$method = $_SERVER["REQUEST_METHOD"];
require_once '../models/Category.php';
require_once '../models/City.php';
require_once '../models/Province.php';
require_once '../models/Region.php';
require_once '../models/Status.php';
require_once '../models/Image.php';
require_once '../models/Video.php';
require_once '../models/Profile.php';

$body = file_get_contents('php://input');
$params = json_decode($body);

$list[] = array();

if ($method == "GET") {


    $list = Post::getAllPosts();

    header("Content-Type: application/json; charset=UTF8");
    echo json_encode($list, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
} elseif ($method == "PUT") {
    $object = json_decode($body);

    $action = $object->action;

    switch ($action) {
        case "search":
            $text = isset($ob->text) != "" ? $ob->text : "";
            $list = Profile::getProfileForSearch($text);
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($list, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        case "posts":
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode(isPosts($object), JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        case "all":
            $list = Category::getAllNames();
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($list, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        case "interest":
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode(isInterest($object), JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        default:
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode(null, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
    }
}

function isPosts($object) {
    switch ($object->context) {
        case "last":
            return Post::getAllPosts();
        case"custom":
            return Post::getCustomPosts();
        default:
            break;
    }
}

function isInterest($object) {
    switch ($object->context) {
        case"Category":
            return Category::getFullCategoy($object->id);
        case "City";
            return City::getFullCity($object->id);
        case "Province";
            return Province::getFullCity($object->id);
        case "Region";
            return City::getFullCity($object->id);

        default:
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode(null, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
    }
}
