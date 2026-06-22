<?php
session_start();
$id=isset($_GET['id'])?$_GET['id']:0;
if($id==0){
    header("location:admindeleteproduct.php");
    exit;
}
require_once "admin/classes/Admin.php";
$subcat=new Admin;
$subcat->delete_product($id);
$_SESSION['successmsg']="Category ".$id." has been deleted successfully";
header("location:admindeleteproduct.php");
exit;


?>