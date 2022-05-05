<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Sport
 *
 * @author Prybet
 */
require_once '../PDO/Connection.php';
require_once 'Status.php';

class Sport {

    var $id;
    var $name;
    var $description;
    var $imageURL;
    var $bannerURL;
    var $status;
    var $members;
    var $online;

    public static function getAllSports() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM sport WHERE status_id = 1");
        if ($sen->execute()) {
            $res = $sen->fetchAll();

            foreach ($res as $sprt) {
                $s = new Sport();
                $s->id = $sprt[0];
                $s->name = $sprt[1];
                $s->description = $sprt[2];
                $s->imageURL = $sprt[3];
                $s->bannerURL = $sprt[4];
                $s->status = Status::getStatu($sprt[5]);
                $list[] = $s;
            }

            return $list;
        }
    }

    public static function getSport($id) {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM sport WHERE id = :id AND status_id = 1");
        $sen->bindParam(":id", $id);
        if ($sen->execute()) {
            $res = $sen->fetch();
            $s = new Sport();
            $s->id = $res[0];
            $s->name = $res[1];
            $s->description = $res[2];
            $s->imageURL = $res[3];
            $s->bannerURL = $res[4];
            $s->status = Status::getStatu($res[5]);
            return $s;
        }
    }

}
