<?php
session_start();
require_once "classes/User.php";
require_once "user_guide.php";
$user=new User;
$transactionid=$_SESSION['transactionid'];
$buyerid=$_SESSION['useronline'];
$payref=$_SESSION['payref'];

if(isset($transactionid)&& isset($buyerid)){
    $payres=$user->payment_verify($payref);
    if($payres){
        $paystatus="paid";
        $_SESSION['success']="payment with reference $payref is successful";
        $user->delete_cart($buyerid);
    }
    else{
        $paystatus="fail";
        $_SESSION['errormsg']="payment with reference $payref failed";
    }
    $paydata=json_encode($payres);
    $user->update_payment($paystatus,$paydata,$payref);
    header("location:userprofile.php");exit;
}
else{
    $_SESSION['errormsg']="check out or continue shopping";
    header("location:cart.php");exit;
}

?>