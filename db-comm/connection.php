<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connection
 *
 * @author WEB
 */
class connection {
// database details
private $DB_HOST = "";
private $DB_USER = "";
private $DB_PASSWORD = "";

//put your code here
public function getConnection() {
        // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
        if ($conn->connect_error) {

            return 0;
          //  die("Connection failed: " . $conn->connect_error);
        }
    
    }

    public function closeConnection() {
        
    }

}
