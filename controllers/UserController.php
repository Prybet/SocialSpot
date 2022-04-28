<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

require_once '../models/User.php';
require_once '../models/UserType.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // New Account
    if ($_POST["submit"] == "create") {
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $usern = isset($_POST["user"]) ? $_POST["user"] : "";
        $pass = isset($_POST["pass"]) ? $_POST["pass"] : "";
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $birth = isset($_POST["birth"]) ? $_POST["birth"] : "";

        if ($email != "" && $name != "" && $usern != "" && $pass != "" && $birth != "") {
            $user = new User();
            $user->email = $email;
            $user->username = $usern;
            $user->password = $pass;
            $user->profile->name = $name;
            $user->profile->username = $usern;
            $user->profile->birthDate = $birth;
            $user->profile->status = new Status();
            if ($user->setSingIn()) {
                $_SESSION["user"] = $user->getLogin();
                header("Location: ../views/EditProfile.php");
            }
        } else {
            header("Location: ../views/singin.php");
        }
        
    // Edit Account
    } elseif ($_POST["submit"] == "edit") {
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $birth = isset($_POST["birth"]) ? $_POST["birth"] : "";
        $desc = isset($_POST["desc"]) ? $_POST["desc"] : "";

        if ($name != "" && $birth != "") {
            $user = $_SESSION["user"];
            $user->profile->imageURL = uploadImage($user->profile);
            $user->profile->name = $name;
            $user->profile->description = $desc;
            $user->profile->birthDate = $birth;
            if($user->profile->update()){
                header("Location: ../views/editprofile.php");
            }
        } else {
            header("Location: ../views/editprofile.php");
        }
    
    // Login
    } elseif ($_POST["submit"] == "login") {
        $var1 = isset($_POST["user"]) ? $_POST["user"] : "";
        $var2 = isset($_POST["pass"]) ? $_POST["pass"] : "";
        $user = $_SESSION["user"];
        if ($user->verifyPass($var1, $var2)) {
            $user->username = $var1;
            $_SESSION["user"] = $user->getLogin();
            $_SESSION["err"] = "";
            header("Location: ../views/editprofile.php");
        } else {
            $_SESSION["err"] = "Credenciales incorrectas";
            header("Location: ../views/login.php");
        }
    } elseif ($_POST["submit"] == "singin") {
        header("Location: ../views/singin.php");
    } else {
        header("Location: ../views/index.php");
    }
    //
} else {
    header("Location: ../views/index.php");
}

function uploadImage($prof) {
    $formats = ["image/jpg", "image/jpeg", "image/gif", "image/png"];

    if (in_array($_FILES["image"]["type"], $formats)) {
        switch ($_FILES["image"]["type"]) {
            case "image/jpg":
                $dot = ".jpg";
                break;
            case "image/jpeg":
                $dot = ".jpeg";
                break;
            case "image/gif":
                $dot = ".gif";
                break;
            default:
                $dot = ".png";
                break;
        }
        $_FILES["image"]["name"] = $prof->username."-ProfilePic".$dot;
        $route = "../../SSpotImages/ProfileImages/" . $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], $route);
        return $prof->username."-ProfilePic".$dot;
    } else {
        return false;
    }
}
