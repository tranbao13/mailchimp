<?php
session_start(); // place it on the top of the script ?>
<?php
    $statusMsg = !empty($_SESSION['msg'])?$_SESSION['msg']:'';
    unset($_SESSION['msg']);
    echo $statusMsg;
?>
<p>Paste in the ID you've just copied</p>
<form method="post" action="send-action.php">
    <p><label>Campaign ID: </label><input type="text" name="campid" value=<?php $campid ?> /></p>
    <p><input type="submit" name="send" value="SEND CAMPAIGN"/></p>
</form>