<?php
session_start();
//require_once "../classes/User.php";
//$user=new User;
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $_SESSION['product'] = (int)$_GET['id'];
}




?>