<?php
class Database
{
    private static $dbName = 'sample';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    private static $cont = null;
    public function __construct()
    {
        die('Init function is not allowed');
    }
    public static function connect()
    {
        // One connection through whole application
        if (null == self::$cont) {
            try {
                self::$cont = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}
class student{
    public $fname;
    public $mname;
    public $fullname;
    public function __construct(){
        $this->fullname=$this->fname.' '.$this->mname;
    }
}

class sampleClass{
    function getData(){
        $db=Database::connect();
        $sql="select * from student";
        $st=$db->query($sql);
        $st->setFetchMode(PDO::FETCH_CLASS,student);

        while($row=$st->fetch()){
            echo $row->fullname;
            print_r($row);
        }
    }
}
$obj=new sampleClass();
$obj->getData();



?>