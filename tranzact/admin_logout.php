<?php
session_start();
require_once "admin/classes/Admin.php";
$admin=new Admin;
$admin->admin_logout();
header("location:adminlogin.php");
exit();
?>