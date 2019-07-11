<?php
// MailChimp API credentials
$apiKey = ''; //Put your api key
$dataCenter = substr($apiKey,strpos($apiKey,'-')+1); //Retrieve last 3 letters of api key

function checkAudience($apiKey,$dataCenter) {
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    
    //store List ID
    $de_result = json_decode($result, true);
    if($de_result["lists"])
    {
        $listID = $de_result["lists"][0]["id"];
        $stm = "<p>Already existed an audience list with ID ". $listID. ".</p>";
    }
    else {
        $stm = "No audience list existed. Create one <a href='/mailchimp/list.php'>here.</a>";
    }

    print_r($stm);
}

function checkCampaign($apiKey,$dataCenter) {
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/campaigns';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);

    //store List ID
    $de_result = json_decode($result, true);
    if($de_result["campaigns"])
    {   
        $i = 0;
        while($i<count($de_result["campaigns"])) {
            $campaignID = $de_result["campaigns"][$i]["id"];
            $createTime = $de_result["campaigns"][$i]["create_time"];
            echo "<p>Existed campaign with ID ". $campaignID. " created on ".$createTime.".</p>";
            $i+=1;
        }
        
    }
    else {
        echo "No audience list existed. Create one <a href='/mailchimp/list.php'>here.</a>";
    }
}

function callAPI($method, $url, $data, $apiKey) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    switch ($method) {
        case "POST":
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            if($data)
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"PUT");
            if($data)
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            break;
    }
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    //store the status message based on response code
        if ($httpCode == 200 || $httpCode == 204) {
            $_SESSION['msg'] = '<p style="color: #34A853">Succeeded</p>';
        } else {
                die('Failed. Status code: '.$httpCode);
            }

    curl_close($ch);
    return $result;
}
