<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dbConnection
 *
 * @author saji
 */
class dbConnection {
    
    private $username = "budgetrip";
    private $password = "root";
    private $server = "localhost";


    public function __construct() {
        ;
    }
    
    public function connect()
    {
        $db_link = mysql_connect($server, $username, $password);
        
        if (!$db_link)
        {
            die("Could not connect to database".mysql_errno());
        }
        else 
        {
            echo"connected successfuly!!!";
        }
    }
}
