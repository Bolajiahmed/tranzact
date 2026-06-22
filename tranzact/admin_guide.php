<?php
if(!isset($_SESSION['adminonline'])){
    $_SESSION['errormsg']="You will need to login to access this page";
    header("location:adminlogin.php");
    exit();
}
?>