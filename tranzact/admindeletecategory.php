<?php
session_start();
$id=isset($_GET['id'])?$_GET['id']:0;
if($id==0){
    header("location:dmincategory.php");
    exit;
}
require_once "admin/classes/Admin.php";
$cat=new Admin;
$cat->delete_category($id);
$_SESSION['successmsg']="Category".$id."has been deleted successfully";
header("location:admincategory.php");
exit;


?>