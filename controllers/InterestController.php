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
        $typeInte = "category";
        if($inte->findInterest($typeInte)){
            header("Location: ../views/interests.php?id=$cateID");
        }else{
            echo 'fail';
        }
    } 
} else {
    header("Location: ../views/index.php");
}



