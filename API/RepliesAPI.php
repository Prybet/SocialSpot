<?php

$method = $_SERVER["REQUEST_METHOD"];
if ($method == 'PUT') {

    $body = file_get_contents('php://input');
    $params = json_decode($body);
    require_once"../models/Reply.php";
    require_once"../models/Status.php";
    $reply = new Reply();

    $reply->id = $params->id;
    $reply->body = $params->body;
    $reply->reply = $params->reply;
    $reply->post = $params->post;
    $reply->profile = $params->profile;
    $reply->status = $params->status;

    $resp = Reply::setReplyApp($reply);
    if($resp!= null) {
        header("Content-Type: application/json; charset=UTF8");
        echo json_encode($resp, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
    }
}