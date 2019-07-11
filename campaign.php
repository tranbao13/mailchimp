<?php 
require_once "global.php";
session_start(); // place it on the top of the script ?>
<?php
    $statusMsg = !empty($_SESSION['msg'])?$_SESSION['msg']:'';
    unset($_SESSION['msg']);
    echo $statusMsg;
?>
<?php checkAudience($apiKey,$dataCenter); ?>
<form method="post" action="campaign-action.php">
    <p><label>Subject line: </label><input type="text" name="sline" /></p>
    <p><label>Preview Text: </label><input type="text" name="ptext" /></p>
    <p><label>Title: </label><input type="text" name="title" /></p>
    <p><label>From name: </label><input type="text" name="frname" /></p>
    <p><label>Reply to: </label><input type="text" name="rplto" /></p>
    <p><label>Audience List ID: </label><input type="text" name="list" /></p>
    <p><input type="submit" name="createcamp" value="CREATE CAMPAIGN"/></p>
</form>