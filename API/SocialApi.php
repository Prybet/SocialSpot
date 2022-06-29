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

        case "last":
            $list = Post::getAllPosts();
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($list, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        case "top":
            $list = Post::getTopPosts();
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($list, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        case "all":
            $list = Category::getAllCategories();
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($list, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        case "interest":
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode(isInterest($object->context, $object), JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        default:
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode(null, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
    }
}

function isInterest($context, $object) {
    switch ($context) {
        case"Category":
            return Category::getFullCategoy($object->id);
        case "City";
            break;
        default:
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode(null, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
    }
}
