<?php
session_start();
require_once "classes/User.php";
$user=new User;
$user->user_logout();
header("location:login.php");
exit();
?>