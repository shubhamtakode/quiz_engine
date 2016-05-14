<?php
/**
 * Created by PhpStorm.
 * User: karwalkar
 * Date: 3/31/2016
 * Time: 11:52 AM
 */
class LoginService{
    private $db1;
    private $response;
    public function __construct(){
        $this->db1= Database::connect();
        $this->response=array();
    }
    function authenticateUser(){
        $db = Database::connect();
        $arr['ab']="connected";
        $sql = 'SELECT * FROM `users`';
        $s=$db->query($sql);
        //$row=$s->fetch()
        //echo "<pre>"
        //echo "<pre>"
        //print_r($row)
        $sth = $db->query ('SELECT * FROM `users`');
        printf ("Number of columns in result set: %d\n", $sth->columnCount());
        $count1 = 0;
        //PDO::FETCH_NUM
        //PDO::FETCH_ASSOC
        //PDO::FETCH_OBJ    $row->firstname
        while ($row = $sth->fetch (PDO::FETCH_BOTH))
        {
            print_r($row);
            $count1++;
        }
        printf ("Number of rows in result set: %d\n", $count1);
        foreach ($db->query($sql) as $row) {
            print_r($row);
        }
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (id,username,password) values(?, ?, ?)";
        /*  $sql->bindParam(1,'');
          $sql->bindParam(2,'roshan');
          $sql->bindParam(3,'123');*/
        $q = $db->prepare($sql);
        $count=$q->execute(array('',"roshan","123"));
        echo "affected rows".$count;
        Database::disconnect();
    }
    function  verify(){
        $username="roshan";
        $password="123";
        $statement=$this->db1->prepare("select * from users where username=? and password=?");
        $statement->bindParam(1,$username);
        $statement->bindParam(2,$password);
        $statement->execute();
        echo $statement->rowCount();
        Database::disconnect();
        // print_r($statement->fetchAll());
    }
    function CheckUsername($username){
        $statement=$this->db1->prepare("select * from `users` where username=?");
        $statement->bindParam(1,$username);
        $statement->execute();
        echo $statement->rowCount();
        if($statement->rowCount()){
            $this->response=array("data"=>["present"=>true],"error"=>null);
        }else{
            $this->response=array("data"=>["present"=>false],"error"=>null);
        }
        Database::disconnect();
        echo json_encode($this->response);
    }
}

?>