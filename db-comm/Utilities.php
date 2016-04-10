<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilities
 *
 * @author WEB
 */
class Utilities {

private $connection = FALSE;
function __construct($conn) {
$this->connection = $conn;
}

public function filter_input($string)
{
if($this->connection){
   
$string = mysqli_real_escape_string ( $this->connection, $string );
$string = trim($string);
$string = htmlspecialchars($string);
$string = stripcslashes($string);
return string;
}
else
{
    return FALSE;
}



}





















}
