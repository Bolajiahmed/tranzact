<?php
if(!isset($_SESSION['useronline'])){
    $_SESSION['errorlogmsg']="You need to log in to access this page";
    header("location:login.php");
    exit();
}
?>