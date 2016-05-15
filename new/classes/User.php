<?php
/**
 * Created by PhpStorm.
 * User: WEB
 * Date: 5/15/2016
 * Time: 6:01 AM
 */
// $_DATABASE_CLASS_PATH defined in conf.php
require_once($_DATABASE_CLASS_PATH);

class User {
    private $email ="";
    private $password ="";
    private $database="";

    public function __construct(){

    }

    public function login($email,$pass)
    {
        $this->email = $email;
        $this->password = $pass;
        $this->database = Database::getSingletonInstance();
        $result = $this->database->fire("SELECT * FROM users WHERE email='$this->email' AND pass_hash='$this->password'");
        if(count($result)>0)
        {
            //print_r($result);
            $_SESSION['UID'] = $result[0]['uid'];
            $_SESSION['TYPE'] = $result[0]['type_id'];
            $_SESSION['EMAIL'] = $result[0]['email'];
            return true;
        }else
        {
            return false;
        }

    }

}