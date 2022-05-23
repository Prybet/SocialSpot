<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Report
 *
 * @author Prybet
 */

require_once '../PDO/Connection.php';
require_once 'Norm.php';
class Report {
    var $id;
    var $norm;
    var $userId;
    var $postId;
    var $replyId;
    var $spotId;
    var $commentary;
    var $action;
    
    
    public static function setReport($report) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO report VALUES(null, :norm, :user, :post, :rep, :spo, :comm, 9)");
        $id = $report->norm->id;
        $sen->bindParam(":norm", $id);
        $user = $report->userId;
        $sen->bindParam(":user", $user);
        $post = $report->postId;
        $sen->bindParam(":post", $post);
        $rep = isset($report->replyId)== 0?$report->replyId:null;
        $sen->bindParam(":rep", $rep);
        $spo = isset($report->spotId)==0 ? $report->spotId : null;
        $sen->bindParam(":spo", $spo);
        $com = isset($report->commentary)?$report->commentary:"";
        $sen->bindParam(":comm", $com);
        
        if ($sen->execute()) {
            return true;
        } else {
             return false;
        }
    }
}
