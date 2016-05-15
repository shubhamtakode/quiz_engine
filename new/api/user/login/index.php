<?php
/**
 * Created by PhpStorm.
 * User: WEB
 * Date: 5/15/2016
 * Time: 7:47 AM
 *
 * Response Format
 *
 */
require_once('../../../conf.php');
require_once( $_USER_CLASS_PATH );

$response =array( 'result'=> array('login-status'=>'','error'=>'') );


$user = new User();

if($user->login()){
    // success
    $response['result']['login-status']='success';

}else{
    //failed
    $response['result']['login-status']='failed';
    $response['result']['error']='Invalid Credentials';
}
//print_r($response);
echo json_encode($response);

