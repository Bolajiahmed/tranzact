<?php
session_start();
$id=isset($_GET['id'])?$_GET['id']:0;
if($id==0){
    header("location:adminuser.php");
    exit;
}
require_once "admin/classes/Admin.php";
$admin=new Admin;
$admin->delete_user($id);
$_SESSION['successmsg']="User have succesfully been deleted";
header("location:adminuser.php");
exit;

?>