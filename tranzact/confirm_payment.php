<?php
session_start();
require_once "classes/User.php";
require_once "user_guide.php";
$user=new User;
$deets=$user->user_info($_SESSION['useronline']);
$email=$deets['user_email'];
$transactionid=$_SESSION['transactionid'];
$buyerid=$_SESSION['useronline'];
$payref=uniqid(10);
$_SESSION['payref']=$payref;
//$sellerid=$user->get_trans_seller($transactionid);//get all stransaction
$amount=$user->get_trans_amount($transactionid);////

$pay_id=$user->insert_payment($transactionid,$amount,$buyerid,$payref);

// echo "<pre>";
// print_r($pay_id);
// echo"</pre>";
// die();

if($pay_id){
    $paystack=$user->payment_initialise($email,$payref,$transactionid,$amount);
    if($paystack->status){
        $auth_url=$paystack->data->authorization_url;
        header("location:$auth_url");exit;
    }
    else{
        $_SESSION['errormsg']=$paystack->message;
        header("location:cart.php");
    }
}
else{
    $_SESSION['errormsg']="Error in processing payment..Please try again";
    header("location:cart.php");
}


?>