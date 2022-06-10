<?php

require_once "vendor/autoload.php";

session_start();

$fb=new \Facebook\Facebook([
    'app_id' => '1632968420406510',
    'app_secret' => 'ada6bee2d1fb4763e2998d395204383e',
    'default_graph_version' => 'v2.5',
]);

$helper=$fb->getRedirectLoginHelper();
if(isset($_GET['code'])){
if(isset($_SESSION['access_token'])){
    $access_token=$_SESSION['access_token'];
}else{
    $access_token=$helper->getAccessToken();
    $_SESSION['access_token']=$access_token;
    
    $fb->setDefaultAccessToken($_SESSION['access_token']);
}
$_SESSION['fname']='';
$_SESSION['email']='';
// $_SESSION['id']='';

$graph_response=$fb->get("/me?fields=name,email",$access_token);
$facebook_user_info=$graph_response->getGraphUser();

$_SESSION['fname']=$facebook_user_info['name'];
$_SESSION['email']=$facebook_user_info['email'];

}else{

$permissions=['email'];

$login_url=$helper->getLoginUrl('http://localhost/_draw_it/code/pages/login',$permissions);
}
?>