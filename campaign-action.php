<?php 
require_once "global.php";
session_start();
if(isset($_POST['createcamp'])){
    $sline = $_POST['sline'];
    $ptext = $_POST['ptext'];
    $title = $_POST['title'];
    $frname = $_POST['frname'];
    $rplto = $_POST['rplto'];
    $listID = $_POST['list'];

    // MailChimp API URL
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/campaigns/';

    // member information
    $json = json_encode([
        'type' => 'plaintext',
        'recipients'  => [
            'list_id'     => $listID
        ],
        'settings' => [
            'subject_line' => $sline,
            'preview_text' => $ptext,
            'title' => $title,
            'from_name' => $frname,
            'reply_to' => $rplto
        ]
    ]);

    // send a HTTP POST request with curl
    $met = "POST";
    callAPI($met,$url,$json,$apiKey);
    
}
header('location:content.php');