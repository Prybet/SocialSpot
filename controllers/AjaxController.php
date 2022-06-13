<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sub = isset($_POST["sub"]) ? $_POST["sub"] : "";

    switch ($sub) {
        case "category":

            $id = $_POST["id"];

            require_once '../models/Category.php';
            $category = Category::getCategoy($id);
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($category, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        case "email":
            $email = $_POST["email"];
            require_once '../models/User.php';
            $resp = User::checkEmail($email);
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($resp, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;  
        case"user":
            $user = $_POST["user"];
            require_once '../models/User.php';
             $resp = User::checkUser($user);
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($resp, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        case "province":
            $id = $_POST["id"];
            require_once '../models/Province.php';
            $provices = Province::getProvincesForRegion($id);
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($provices, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        case "city":
            $id = $_POST["id"];
            require_once '../models/City.php';
            $cities = City::getCitiesForProvice($id);
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($cities, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        case "getPost":
            $id = $_POST["id"];
            require_once '../models/Post.php';
            $post = Post::getPost($id);
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($post, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        case "editPost":
            $post = $_SESSION["post"];
            $post->title = isset($_POST["title"]) ? $_POST["title"] : "";
            $post->body = isset($_POST["body"]) ? $_POST["body"] : "";
            if($post->title != "" && $post->body != ""){
                $post->editPost();
            }
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode($post, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
        default:
            header("Content-Type: application/json; charset=UTF8");
            echo json_encode("cayo en default", JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
            break;
    }
}