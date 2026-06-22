<?php
session_start();
require_once "../classes/User.php";
require_once "../user_guide.php";
$user=new User;
if(isset($_POST['btncart'])){
    $product_id=$_POST['cart'];
    $buyerid=$_SESSION['useronline'];
    //   echo "<pre>";
    //   print_r($product_id);
    //   echo "</pre>";
    //   die();
    
    $rsp=$user->add_cart($product_id,$buyerid);
    // echo "<pre>";
    //  print_r($rsp);
    //  echo "</pre>";
    //  die();
        
    if($rsp){
        
        header("location:../cart.php");exit();
    }
    else{
        $_SESSION['errormsg']="Item not added to cart";
        header("location:../list.php");exit();
    }


}
else{
    $_SESSION['errorlogmsg']="Please login to access your profile";
    header("location:../login.php");
    exit();
}
?>