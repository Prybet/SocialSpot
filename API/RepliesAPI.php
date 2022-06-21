<?php
$method = $_SERVER["REQUEST_METHOD"];
if($method == 'PUT'){
    
    $body = file_get_contents('php://input');
    $params = json_decode($body);
    require_once"../models/Reply.php";
    $reply = new Reply();

    $reply->id =$params->id;
    $reply->body = $params->body;
    $reply->date = $params->date;
    $reply->time = $params->time;
    $reply->reply = $params->reply;
    $reply->post = $params->post;
    $reply->profile = $params->profile;
    $reply->status = $params->status;

    if(Reply::setReplyApp($reply)){
        header("Content-Type: application/json; charset=UTF8");
        echo json_encode('true', JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);

    }
}