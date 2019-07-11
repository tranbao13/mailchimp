<?php 
require_once "global.php";
session_start();
if(isset($_POST['addcontent'])){
    $content = $_POST['content'];
    $campid = $_POST['campid'];

    // MailChimp API URL
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/campaigns/'.$campid.'/content';

    // member information
    $json = json_encode([
        'plain_text' => $content
    ]);

    // send a HTTP POST request with curl
    $met = "PUT";
    callAPI($met,$url,$json,$apiKey);
}
header('location:send.php');