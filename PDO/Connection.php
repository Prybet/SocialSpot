<?php

/*
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

/**
 * Description of Connection
 *
 * @author Prybet
 */
class Connection {
    private $dsn = "mysql:host=localhost;dbname=socialspotdb";
    private $username = "root";
    private $password = "root";
    public $mysql = null;
    //public static $ip = "http://socialspot.cl";
    public static $ip = "http://localhost";

    function __construct() {
        try {
            $this->mysql = new PDO($this->dsn, $this->username, $this->password);
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }
    
}
