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
      $statement=$this->connection->prepare("select domain_id from domains where domain_username=?");
      $statement->bindParam(1,$parameters->UserName);
      $statement->execute();
      if($statement->rowCount()){
         $this->response["SUCCESS"]=0;
         $this->response["REASON"]="UserName Is Already Present!";
      }else{
      $statement=$this->connection->prepare("INSERT INTO domains (`domain_id`, `domain_name`, `domain_username`, `domain_password`) values(?, ?, ?, ?)");
      $statement->bindParam(1,Utilities::CreateUniqueId("dom"));
      $statement->bindParam(2,$parameters->DomainName);
      $statement->bindParam(3,$parameters->UserName);
      $statement->bindParam(4,Utilities::EncryptPassword($parameters->Password));
      $statement->execute();
      if($statement->rowCount()){
         $this->response["SUCCESS"]=1;
      }else{
         $this->response["SUCCESS"]=0;
         $this->resonse["REASON"]="Cant create domain";
      }
      }
      echo json_encode($this->response);
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
   function VerifyDomain($parameters){
      //get password
      $statement = $this->connection->prepare("select domain_password from domains where domain_username=?");
      $statement->bindParam(1, $parameters->UserName);
      $statement->execute();
      $statement->setFetchMode(PDO::FETCH_ASSOC);
      $row=$statement->fetch();
      if(Utilities::DecryptPassword($row["domain_password"])==$parameters->Password){
         $this->response["SUCCESS"] = 1;
      }
      else{
         $this->response["SUCCESS"] = 0;
         $this->response["REASON"]="We could not found you in our system!";
      }
      echo json_encode($this->response);
      Database::disconnect();
      // print_r($statement->fetchAll());
   }
}
//(new DomainService())->RegisterDomain("");
//$simple->RegisterDomain("");
//$simple->GetDomainList();
?>