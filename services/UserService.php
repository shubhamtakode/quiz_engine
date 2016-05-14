<?php
class GetUserInfo{
    function authenticateUser(){
        $db = Database::connect();
        $arr['ab']="connected";
        $sql = 'SELECT * FROM domainusers';
        $a=array();
        foreach ($db->query($sql) as $row) {
            array_push($a,$row);
        }
        echo json_encode($a);
        Database::disconnect();
    }
    function Logout(){

    }
}


?>