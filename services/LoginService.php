<?php
include_once 'ConnectToDatabase.php';
class LoginService{
    function authenticateUser(){
        $db = Database::connect();
        $arr['ab']="connected";
        $sql = 'SELECT * FROM login';
        foreach ( as $row) {
            echo '<tr>';
            echo '<td>'. $row['username'] . '</td>';
            echo '<td>'. $row['password'] . '</td>';
            echo '</tr>';
        }
        Database::disconnect();
        echo json_encode($arr);
    }
    function Logout(){

    }
}
?>