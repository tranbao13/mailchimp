<?php
require_once "global.php";
session_start(); // place it on the top of the script ?>
<?php
    $statusMsg = !empty($_SESSION['msg'])?$_SESSION['msg']:'';
    unset($_SESSION['msg']);
    echo $statusMsg;
?>
<?php checkCampaign($apiKey,$dataCenter); ?>
<p>You must add content into the email before sending it to subscribers</p>
<form method="post" action="content-action.php">
    <p><label>Campaign ID: </label><input type="text" name="campid" /></p>
    <p><label>Content: </label><input type="textarea" name="content" /></p>
    <p><input type="submit" name="addcontent" value="ADD CONTENT"/></p>
</form>