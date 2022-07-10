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
    // Crea una cuenta de usuario y profile
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
                header("Location: ../views/EditProfile");
            }
        } else {
            header("Location: ../views/singin");
        }


        //Edita ell Profile entregandole sus respectivos datos, 
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
                header("Location: ../views/editprofile");
            }
        } else {
            header("Location: ../views/editprofile");
        }
        //Elimina el usuario con el metodo delete() y cambia la session de user a null
    } elseif($POST["submit"] == "delete"){
        $user = $_SESSION["user"];
        if($user->delete()){
            $_SESSION["user"] = null;
            header("Location: ../views/index");
        }
        
        //Editar iamgenes, solo se permite acutalizar la imagen, si se 
    } elseif ($POST["submit"] == "img") {
        $user = $_SESSION["user"];
        $img = uploadProfileImage($user->profile, $formats);
        $bner = uploadBannerImage($user->profile, $formats);
        if($user->profile->findImg($img, $bner)){
            $user = $_SESSION["user"];
            $_SESSION["user"] = $user->getLogin();
            header("Location: ../views/editprofile");
        }else{
            header("Location: ../views/editprofile");
        }
        
        echo json_encode($user->profile->findImg($img, $bner), JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
        //Edit Password
    } elseif (($POST["submit"] == "change")) {

        $oldPass = isset($_POST["oldPass"]) ? $_POST["oldPass"] : "";
        $passN = isset($_POST["passNew"]) ? $_POST["passNew"] : "";
        $passV = isset($_POST["passVrf"]) ? $_POST["passVrf"] : "";
        if ($oldPass != "" && $passN != "") {
            $user = $_SESSION["user"];
            if ($user->verifyPass($user->username, $oldPass)) {
                if($passN == $passV){
                    if ($user->updatePass($passN, $user->id)) {
                        header("Location: ../views/editprofile");
                    }
                }else{
                    $_SESSION["errPassVrf"] = true;
                    header("Location: ../views/editprofile");
                }
            } else {
                $_SESSION["errPass"] = true;
                header("Location: ../views/editprofile");
            }
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
            header("Location: ../views/index");
        } else {
            $_SESSION["err"] = true;
            header("Location: ../views/login");
        }
        // Follow User
    } elseif($POST["submit"] == "follow"){
        $profID = isset($_POST["prof"]) ? $_POST["prof"] : "";
        $follow = new Follow();
        $follow->profile = $profID;
        $follow->me = $_SESSION["user"]->profile->id;
        if($follow->findFollow($follow)){
            $user = $_SESSION["user"];
            $_SESSION["user"] = $user->getLogin();
            header("Location: ../views/profilepublic?id=$profID");
        }else{
            echo 'fail';
            //header("Location: ../views/index.php");
        }
    } elseif ($POST["submit"] == "singin") {
        header("Location: ../views/singin");
    } elseif ($POST["submit"] == "goUser") {
        $user = $_SESSION["user"];
        $_SESSION["user"] = $user->getLogin();
        header("Location: ../views/profile");
    } elseif ($POST["submit"] == "goEdit") {
        $user = $_SESSION["user"];
        $_SESSION["user"] = $user->getLogin();
        header("Location: ../views/editprofile");
    } elseif ($POST["submit"] == "close") {
        $_SESSION["user"] = null;
        header("Location: ../views/index");
    } elseif ($POST["submit"] == "goLogin") {
        header("Location: ../views/login");
    } else {
        header("Location: ../views/index");
    }
    //
} else {
    header("Location: ../views/index");
}

//refime el tipo de formato del archivo
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
        return hash(). $prof->username . "-ProfilePic" . $dot;
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
        return hash(). $prof->username . "-BannerPic" . $dot;
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
