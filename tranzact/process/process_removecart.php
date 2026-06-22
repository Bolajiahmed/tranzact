<?php
session_start();
require_once "../classes/User.php";
require_once "../user_guide.php";
$user=new User;
if(isset($_POST['btn'])&&isset($_POST['remove'])){
    $cart_id=$_POST['remove'];
    
    $rsp=$user->remove_cart($cart_id,$_SESSION['useronline']);
            
    if($rsp){
        $_SESSION['successmsg']="Item removed";
        header("location:../cart.php");exit();
    }
    else{
        $_SESSION['errormsg']="Item not removed yet";
        header("location:../cart.php");exit();
    }


}
else{
    $_SESSION['errormsg']="Try again";
    header("location:../cart.php");
    exit();
}
?>