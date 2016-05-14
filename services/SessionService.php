<?php
class SessionManager{
    function isLogged(){
        session_start();

        //if user logged in
        return true;
    }
}

?>