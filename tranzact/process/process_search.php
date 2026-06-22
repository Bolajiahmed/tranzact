<?php
session_start();
require_once "../classes/User.php";
//require_once "../user_guide.php";
$user=new User;
if(isset($_POST['btn'])){
    $input=$_POST['user'];
    $chs=(isset($_POST['tran']))?$_POST['tran']:'';

    $search=$user->get_search($input,$chs);
    if($search){
        $_SESSION['search']=$search;
        header("location:../list.php");exit;
    }
    else{
        header("location:../index.php");exit;
    }

    
    
    


}
else{
    $_SESSION['errorlogmsg']="Please login to access your profile";
    header("location:../login.php");
    exit();
}
?>