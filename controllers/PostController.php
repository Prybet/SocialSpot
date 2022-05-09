<?php

/* 
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    if ($_POST["submit"] == "posst") {
        $cate = isset($_POST["cate"]) ? $_POST["cate"] : "";
        $title = isset($_POST["title"]) ? $_POST["title"] : "";
        $body = isset($_POST["body"]) ? $_POST["body"] : "";
        $file = isset($_POST["file"]) ? $_POST["file"] : "";
        $check = isset($_POST["check"]) ? $_POST["check"] : "";
        
        if($cate != "" && $title != ""){
            require_once '../models/User.php';
            require_once '../models/Post.php';
            $user = $_SESSION["user"];
            $post = new Post();
            $post->userId = $user->id;
            $post->title = $title;
            $post->body = $body;
            $post->category = $cate;
            if($post->setPost()){
                
            }
        }
    }
    
    
    foreach ($_FILES as $file) {
        echo '</br>';
        print_r($file);
        echo '</br>';
    }
    
    
}
