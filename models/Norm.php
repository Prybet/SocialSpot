<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Norm
 *
 * @author Prybet
 */
require_once '../PDO/Connection.php';

class Norm {

    var $id;
    var $name;

    public static function getAll() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("SELECT * FROM norm");
        if ($sen->execute()) {
            $rs = $sen->fetchAll();
            $list = array();
            foreach ($rs as $norm) {
                $n = new Norm();
                $n->id = $norm[0];
                $n->name = $norm[1];
                $list[] = $n;
            }
            return $list;
        }
    }

}
