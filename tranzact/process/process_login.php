<?php
session_start();
require_once "../classes/User.php";
$user=new User;
if(isset($_POST['btn'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $rsp=$user->login_user($username,$password);
    echo"<pre>";
    print_r($rsp);
    // echo"</pre>";
    // die();
    if($rsp){
        header("location:../user.php");exit();
    }
    else{
        header("location:../login.php");exit();
    }


}
else{
    $_SESSION['errorlogmsg']="Please login to access your profile";
    header("location:../login.php");
    exit();
}
?>