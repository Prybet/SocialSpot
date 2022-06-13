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
    $POST = $_POST;

    $formats = ["image/jpg", "image/jpeg", "image/gif", "image/png"];
    // New Account
    if ($POST["submit"] == "create") {
        $email = isset($POST["email"]) ? $POST["email"] : "";
        $usern = isset($POST["user"]) ? $POST["user"] : "";
        $pass = isset($POST["pass"]) ? $POST["pass"] : "";
        $name = isset($POST["name"]) ? $POST["name"] : "";
        $birth = isset($POST["birth"]) ? $POST["birth"] : "";

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
    } elseif ($POST["submit"] == "edit") {
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $check = isset($_POST["check"]) ? $_POST["check"] : false;
        $birth = isset($_POST["birth"]) ? $_POST["birth"] : "";
        $desc = isset($_POST["desc"]) ? $_POST["desc"] : "";
        
        $city = isset($_POST["city"]) ? $_POST["city"] : null ;
        if ($name != "" && $birth != "") {
            $user = $_SESSION["user"];
            $user->profile->name = $name;
            $user->profile->check = $check;
            $user->profile->description = $desc;
            $user->profile->birthDate = $birth;
            if($city == -1){
                $city = null;
            }
            $user->profile->city = $city;
            if ($user->profile->update()) {
                $_SESSION["user"] = $user->getLogin();
                header("Location: ../views/editprofile.php");
            }
        } else {
            header("Location: ../views/editprofile.php");
        }
        //Delete Account
    } elseif($POST["submit"] == "delete"){
        $user = $_SESSION["user"];
        if($user->delete()){
            $_SESSION["user"] = null;
            header("Location: ../views/index.php");
        }
        
        //Edit Images
    } elseif ($POST["submit"] == "img") {
        $user = $_SESSION["user"];
        $user->profile->imageURL = uploadProfileImage($user->profile, $formats);
        $user->profile->bannerURL = uploadBannerImage($user->profile, $formats);
        if ($user->profile->updateImages()) {
            header("Location: ../views/editprofile.php");
        }
    } elseif (($POST["submit"] == "change")) {

        $oldPass = isset($_POST["oldPass"]) ? $_POST["oldPass"] : "";
        $pass = isset($_POST["pass"]) ? $_POST["pass"] : "";
        if ($oldPass != "" && $pass != "") {
            $user = $_SESSION["user"];
            if ($user->verifyPass($user->username, $oldPass)) {
                if ($user->updatePass($pass, $user->id)) {
                    header("Location: ../views/editprofile.php");
                }
            } else {
                $_SESSION["err"] = "Contraseña actual INCORREECTA";
                header("Location: ../views/editprofile.php");
            }
        } else {
            $_SESSION["err"] = "Datos mal ingresados";
            header("Location: ../views/editprofile.php");
        }
        // Login
    } elseif ($POST["submit"] == "login") {
        $var1 = isset($_POST["user"]) ? $_POST["user"] : "";
        $var2 = isset($_POST["pass"]) ? $_POST["pass"] : "";
        $user = $_SESSION["user"];
        if ($user->verifyPass($var1, $var2)) {
            $user->username = $var1;
            $_SESSION["user"] = $user->getLogin();
            $_SESSION["err"] = "";
            header("Location: ../views/index.php");
        } else {
            $_SESSION["err"] = true;
            header("Location: ../views/login.php");
        }
    } elseif ($POST["submit"] == "singin") {
        header("Location: ../views/singin.php");
    } elseif ($POST["submit"] == "goUser") {
        $user = $_SESSION["user"];
        $_SESSION["user"] = $user->getLogin();
        header("Location: ../views/profile.php");
    } elseif ($POST["submit"] == "goEdit") {
        $user = $_SESSION["user"];
        $_SESSION["user"] = $user->getLogin();
        header("Location: ../views/editprofile.php");
    } elseif ($POST["submit"] == "close") {
        $_SESSION["user"] = null;
        header("Location: ../views/index.php");
    } elseif ($POST["submit"] == "goLogin") {
        header("Location: ../views/login.php");
    } else {
        header("Location: ../views/index.php");
    }
    //
} else {
    header("Location: ../views/index.php");
}

function uploadProfileImage($prof, $formats) {
    if (in_array($_FILES["imgProf"]["type"], $formats)) {
        switch ($_FILES["imgProf"]["type"]) {
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
        tryPath($prof);
        $_FILES["imgProf"]["name"] = $prof->username . "-ProfilePic" . $dot;
        move_uploaded_file($_FILES["imgProf"]["tmp_name"], "../../SSpotImages/UserMedia/".$prof->username."-Folder/ProfileImages/" . $_FILES["imgProf"]["name"]);
        return $prof->username . "-ProfilePic" . $dot;
    }
    return false;
}

function uploadBannerImage($prof, $formats) {
    if (in_array($_FILES["imgBanner"]["type"], $formats)) {
        switch ($_FILES["imgBanner"]["type"]) {
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
        $_FILES["imgBanner"]["name"] = $prof->username . "-BannerPic" . $dot;
        move_uploaded_file($_FILES["imgBanner"]["tmp_name"], "../../SSpotImages/UserMedia/".$prof->username."-Folder/BannerImages/" . $_FILES["imgBanner"]["name"]);
        return $prof->username . "-BannerPic" . $dot;
    }
    return false;
}

function tryPath($prof) {
    $path = "../../SSpotImages/UserMedia/" . $prof->username . "-Folder";
    if (!is_dir($path)) {
        mkdir($path);
    }
    $path = "../../SSpotImages/UserMedia/" . $prof->username . "-Folder/BannerImages";
    if (!is_dir($path)) {
        mkdir($path);
    }
    $path = "../../SSpotImages/UserMedia/" . $prof->username . "-Folder/ProfileImages";
    if (!is_dir($path)) {
        mkdir($path);
    }
}
