<?php session_start(); // place it on the top of the script ?>
<?php
    $statusMsg = !empty($_SESSION['msg'])?$_SESSION['msg']:'';
    unset($_SESSION['msg']);
    echo $statusMsg;
?>
<form method="post" action="list-action.php">
    <p><label>Audience Name: </label><input type="text" name="auname" /></p>
    <p><label>Company: </label><input type="text" name="company" /></p>
    <p><label>Address: </label><input type="text" name="address" /></p>
    <p><label>City: </label><input type="text" name="city" /></p>
    <p><label>State: </label><input type="text" name="state" /></p>
    <p><label>Zip: </label><input type="number" name="zip" /></p>
    <p><label>Country: </label><input type="text" name="country" /></p>
    <p><label>Permission reminder: </label><input type="text" name="permit" /></p>
    <p><label>From name: </label><input type="text" name="fromname" /></p>
    <p><label>From email: </label><input type="text" name="fromemail" /></p>
    <p><input type="submit" name="addlist" value="ADD NEW LIST"/></p>
</form>