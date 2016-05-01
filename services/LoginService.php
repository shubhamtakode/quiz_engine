<?php
include_once 'ConnectToDatabase.php';
class LoginService{
    function authenticateUser(){
        $db = Database::connect();
        $arr['ab']="connected";
        $sql = 'SELECT * FROM domainusers';
        foreach ($db->query($sql) as $row) {
            print_r($row);
        }
        Database::disconnect();
    }
    function Logout(){

    }
}
?>