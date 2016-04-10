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
class user {
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


    //call carefully
    public function createSuperAdmin($email,$password,$fname,$lname,$dob)
    {
        
    }
    
    
    public function createExamAdmin($email,$password,$fname,$lname,$dob)
    {
        
    }
    
    public function createStudent($email,$password,$fname,$lname,$dob)
    {
        
    }
    
    public function verifyDetails($email,$password)
    {
        return false; //should return boolean
    }
    
}
