<?php

require_once '../models/User.php';
require_once '../models/Post.php';
require_once '../models/UserType.php';
session_start();
$_FILES = null;
$_SESSION["user"] = isset($_SESSION["user"]) ? $_SESSION["user"] : new User();
if ($_SESSION["user"]->userType->id == 2) {
    $posts = Post::getAllPosts();
    $_SESSION["order"] = "last";
    $_SESSION["posts"] = $posts;
}

header("location: ../views/main");
