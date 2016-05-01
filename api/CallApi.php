<?php
//var_dump($config); //to delete object after use
if(isset($_POST['myData'])&&is_ajax()){
    $mydata=json_decode($_POST["myData"]);
    switch($mydata->service){
        case "LoginService":
            //include file necessary for login services
            require_once "../services/LoginService.php";
            switch($mydata->method){
                case "AuthenticateUser":
                    $loginObj=new LoginService();
                    $loginObj->authenticateUser();
                    break;
            }
            break;
        case "TestService":

            break;
        default:

    };
}

function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
?>