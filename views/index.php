<?php
require_once '../models/User.php';
require_once '../models/UserType.php';
session_start();
$_SESSION["err"] = isset($_SESSION["err"])? $_SESSION["err"]  : "";
$_SESSION["user"] = isset($_SESSION["user"]) ? $_SESSION["user"]  : new User();


header("location: ../views/login.php");