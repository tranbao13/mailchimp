<?php
require_once "global.php";
session_start();
if(isset($_POST['addlist'])){
    $auname = $_POST['auname'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $country = $_POST['country'];
    $permit = $_POST['permit'];
    $fromname = $_POST['fromname'];
    $fromemail = $_POST['fromemail'];
        
        // MailChimp API URL
        $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists';
        
        // member information
        $json = json_encode([
            'name' => $auname,
            'contact'  => [
                'company'     => $company,
                'address1'     => $address,
                'city'  => $city,
                'state' => $state,
                'zip' => $zip,
                'country' => $country
            ],
            'permission_reminder' => $permit,
            'campaign_defaults' => [
                'from_name' => $fromname,
                'from_email'    => $fromemail,
                'subject' => 'default subject',
                'language'  => 'en'
            ],
            'email_type_option' => true,
            'visibility' => 'pub',
            'double_optin' => false,
            'marketing_permissions' => true
        ]);
        
        // send a HTTP POST request with curl
        $met = "POST"; //Specify request METHOD
        callAPI($met,$url,$json,$apiKey);

}
// redirect to homepage
header('location:index.php');