<?php
/*
* Mysql database class - only one connection is Allowed
*/
class Database {
    private $_connection;
    private static $_instance; //The single instance
    private $_host = "localhost";
    private $_username = "root";
    private $_password = "";
    private $_database = "quiz_engine_db";
    /*
    Get an instance of the Database
    @return Instance
    */
    public static function getSingletonInstance() {
        if(!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    // Constructor
    private function __construct() {
        $this->_connection = new PDO("mysql:host=".$this->_host.";dbname=".$this->_database, $this->_username, $this->_password);

        // Error handling
        if(mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
                E_USER_ERROR);
        }
    }
    // Magic method clone is empty to prevent duplication of connection
    private function __clone() { }
    // Get mysqli connection
    public function getConnection() {
        return $this->_connection;
    }


    public function execUpdate()
    {

    }
    public function  execCreate()
    {

    }

    public function fire($string)
    {

        $result = $this->_connection->query($string,PDO::FETCH_ASSOC);
        //print_r();
        return $result->fetchAll();

    }


}
