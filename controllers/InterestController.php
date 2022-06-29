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
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $POST = $_POST;

    // New Account
    if ($POST["submit"] == "follCate") {
        $cateID = isset($POST["cate"]) ? $POST["cate"] : "";
        $inte = new Interests();
        $inte->category = $cateID;
        $inte->me = $_SESSION["user"]->id;
        $typeInte = "cate";
        $inter = $cateID;
        if($inte->findInterest($typeInte, $inter)){
            header("Location: ../views/interests?id=$cateID");
        }else{
            echo 'fail';
        }
    } elseif($POST["submit"] == "province"){
    
    } elseif($POST["submit"] == "city"){
        
    } elseif($POST["submit"] == "region"){
        
    }elseif ($POST["submit"] == "hashtag") {
        
    }
} else {
    header("Location: ../views/index");
}



