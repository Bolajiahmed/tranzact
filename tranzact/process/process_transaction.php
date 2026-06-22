<?php
session_start();
require_once "../user_guide.php";
require_once "../classes/User.php";
$user=new User;
if(isset($_POST['btn'])){
    $buyerid=$_SESSION['useronline'];
    $product_id=$_POST['productid'];
    $seller_id=$_POST['seller'];
    $category_id=$_POST['category'];
    $transactionid=$user->insert_transaction($buyerid);
    $_SESSION['transactionid']=$transactionid;
    header("location:../confirm_payment.php");exit();

}
else{
    $_SESSION['errormsg']="Try again";
    header("location:../cart.php");
    exit();
}
?>