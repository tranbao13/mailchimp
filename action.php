<?php
require_once "global.php";
session_start();
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $listID  = $_POST['list'];
    if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        // MailChimp API URL
        $memberID = md5(strtolower($email)); //Hash of email
        $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;
        // subscriber information
        $json = json_encode([
            'email_address' => $email,
            'status'        => 'subscribed',
            'merge_fields'  => [
                'FNAME'     => $fname,
                'LNAME'     => $lname
            ]
        ]);    
        // send a HTTP POST request with curl
        $met = "PUT"; //Specify request METHOD
        callAPI($met,$url,$json,$apiKey);
    }
}
// redirect to homepage
header('location:index.php');