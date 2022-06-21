<?php
$method = $_SERVER["REQUEST_METHOD"];
if($method == 'PUT'){
    
    $body = file_get_contents('php://input');
    $params = json_decode($body);
    require_once"../models/Like.php";
    $like = new Like();

    $like->id = $params->id;
    $like->userID = $params->profile;
    $like->postID = $params->post;
    $like->date = $params->date;
    $like->time = $params->time;
    $like->status = $params->status;


    if(Like::setLikeApp($like)){
        header("Content-Type: application/json; charset=UTF8");
        echo json_encode('true', JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);

    }
}