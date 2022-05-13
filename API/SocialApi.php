<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */
require_once '../models/Category.php';
require_once '../models/Status.php';
require_once '../models/Image.php';
require_once '../models/Video.php';
require_once '../models/Profile.php';

$body = file_get_contents('php://input');
$params = json_decode($body);

$list[] = array();

if ($_SERVER["REQUEST_METHOD"] == "GET") {


    $list = Post::getAllPosts();

    header("Content-Type: application/json; charset=UTF8");
    echo json_encode($list, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
    $list = Post::getTopPosts();

    header("Content-Type: application/json; charset=UTF8");
    echo json_encode($list, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
}

