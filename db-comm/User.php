<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author WEB
 */
/*
 * User Types Can Be: 
 *  1. super_admin ( access to whole website )
 *  2. exam_admin  ( rights to create and schedule test )
 *  3. student
 *  4. 
 *   
 */
class User {

    //put your code here
    private $type;
    private $password;
    private $email;
    private $dob;
    private $fname;
    private $mname;
    private $lname;
    private $creation_date;
    private $account_status;  // pending or active
    private $connection = FALSE;
    private $security = FALSE;

    function __construct($conn) {
        $db = new Database;
        $this->connection = $db->getConnection();
        if ($connection) {
            $this->security = new Utilities($this->connection);
        }
    }

    //call carefully

    public function createSuperAdmin($email, $password, $fname, $lname, $dob) {

        if ($this->connection && $this->validateDetails($email, $password, $fname, $lname, $dob)) {

            $password = md5($password);
            $sql = "INSERT INTO user (firstname, lastname, email, password, dob)
            VALUES ('" . $fname . "', '" . $lname . "','" . $email . "','" . $password . "','" . $dob . "','superadmin')";

            if ($connection->query($sql) === TRUE) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function createExamAdmin($email, $password, $fname, $lname, $dob) {
        if ($this->connection && $this->validateDetails($email, $password, $fname, $lname, $dob)) {

            $password = md5($password);
            $sql = "INSERT INTO user (firstname, lastname, email, password, dob)
            VALUES ('" . $fname . "', '" . $lname . "','" . $email . "','" . $password . "','" . $dob . "','examadmin')";

            if ($connection->query($sql) === TRUE) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function createStudent($email, $password, $fname, $lname, $dob) {
        if ($this->connection && $this->validateDetails($email, $password, $fname, $lname, $dob)) {

            $password = md5($password);
            $sql = "INSERT INTO user (firstname, lastname, email, password, dob, type)
            VALUES ('" . $fname . "', '" . $lname . "','" . $email . "','" . $password . "','" . $dob . "','student')";

            if ($connection->query($sql) === TRUE) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function validateDetails($email, $password, $fname, $lname, $dob) {

        if ($this->security->filter_input($email) && $this->security->filter_input($fname) && $this->security->filter_input($lname)) {
            return TRUE;
        }  else {
            return FALSE;    
        }
    }

    public function verifyDetails($email, $password) {
        return false; //should return boolean
    }

}
