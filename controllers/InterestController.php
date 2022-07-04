<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

require_once '../models/User.php';
require_once '../models/Interests.php';
require_once '../models/Search.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $POST = $_POST;

    if ($POST["submit"] == "follCate") {
        $cateID = isset($POST["cate"]) ? $POST["cate"] : "";
        $inte = new Interests();
        $inte->typeID = $cateID;
        $inte->profile = $_SESSION["user"]->profile->id;
        $inte->context = "Category";
        if($inte->findInterest()){
            header("Location: ../views/interests?id=$cateID");
        }else{
            echo 'fail';
        }
    } elseif($POST["submit"] == "search"){
        $nom = isset($POST["nom"]) ? $POST["nom"] : "";
        if($nom != ""){
            header("Location: ../views/search?nom=$nom");
        }else{
            header("Location: ../views/search?nom=$nom");
        }
    } elseif($POST["submit"] == "city"){
        
    } elseif($POST["submit"] == "region"){
        
    }elseif ($POST["submit"] == "hashtag") {
        
    }elseif($POST["submit"] == "province"){
        header("Location: ../views/search.php");
    }
} else {
    header("Location: ../views/index");
}



