<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Interests
 *
 * @author Prybet
 */
class Interests {

    var $id;
    var $spot;
    var $hashtag;
    var $city;
    var $province;
    var $region;
    var $category;
    var $status;

    public function setInterest() {
        $conn = new Connection();
        $sen = $conn->mysql->prepare("INSERT INTO interests VALUES (null, :spot, :hashtag, :city, :province,:region, :category, 12)");
        $sen->bindParam(":spot", $this->spot);
        $sen->bindParam(":hashtag", $this->hashtag);
        $sen->bindParam(":city", $this->city);
        $sen->bindParam(":province", $this->province);
        $sen->bindParam(":region", $this->region);
        $sen->bindParam(":category", $this->category);
        if ($sen->execute()) {
            return true;
        }
    }

}
