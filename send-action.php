<?php 
require_once "global.php";
session_start();
if(isset($_POST['send'])){
    $campid = $_POST['campid'];

    // MailChimp API URL
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/campaigns/'.$campid.'/actions/send';

    // send a HTTP POST request with curl
    $met = "POST";
    $json = null;
    callAPI($met,$url,$json,$apiKey);

}
header('location:index.php');