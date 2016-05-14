<?php
/**
 * Created by PhpStorm.
 * User: karwalkar
 * Date: 3/31/2016
 * Time: 11:52 AM
 */
include_once 'ConnectToDatabase.php';
include_once '../shared/Utilities.php';

class DomainService{
   private $connection;
   private $response;
   public function __construct(){
      $this->connection= Database::connect();
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->response=array();
   }
   function RegisterDomain($parameters){
      $statement=$this->connection->prepare("INSERT INTO domains (`domain_id`, `domain_name`, `domain_username`, `domain_password`) values(?, ?, ?, ?)");
      $b="guru";
      $c="abc";
      $d="asd";
      $statement->bindParam(1,Utilities::CreateUniqueId("dom"));
      $statement->bindParam(2,$b);
      $statement->bindParam(3,$c);
      $statement->bindParam(4,$d);
      $statement->execute();
      echo $statement->rowCount();
      Database::disconnect();
   }
   function  IsDomianPresent(){

   }
   function GetDomainList(){
      $statement=$this->connection->query("select domain_id,domain_name from domains");
      $statement->setFetchMode(PDO::FETCH_ASSOC);
      $response=array();
      while($row=$statement->fetch()){
         array_push($response,$row);
      }
      echo json_encode($response);
      Database::disconnect();
   }
   function RemoveDomain(){

   }
}
$simple=new DomainService();
//$simple->RegisterDomain("");
$simple->GetDomainList();
?>