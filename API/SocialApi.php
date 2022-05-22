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
    $action = json_decode($body);

    switch ($action) {
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
        case is_numeric($action):
            $cate = Category::getFullCategoy($action);
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($cate, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        default:
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode(null, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
    }
}

