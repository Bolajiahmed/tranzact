<?php
session_start();
require_once "../classes/User.php";
require_once "../classes/common.php";
$user = new User;
if(isset($_POST['btn'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $state=$_POST['state'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    $photo=$_FILES['pix'];
    if(!is_email($email)){
        $_SESSION['errormsg']="Please enter a correct email";
        header("location:../login.php");
        exit();
    }
    elseif(empty($firstname)||empty($lastname||empty($phone)||empty($address)||empty($state)||empty($username)||empty($password)||empty($password2))){
        $_SESSION['errormsg']="Ensure you complete all fields";
        header("location:../login.php");
        exit();
    }
    elseif($password!==$password2){
        $_SESSION['errormsg']="Passwords does not match";
        header("location:../login.php");
        exit();
    }
    elseif($photo['error']!=0){
        $_SESSION['errormsg']="Invalid file uploaded";
        header("location:../login.php");
        exit();
    }
    else{
        $photoname=$photo['name'];
        $ext=pathinfo($photoname,PATHINFO_EXTENSION);
        $allowed=['jpg','jpeg','png'];
        $tmp=$photo['tmp_name'];
        if(!in_array($ext,$allowed)){
            $_SESSION['errormsg']="Invalid file uploaded";
            header("location:../login.php");
            exit();
        }
        $newname=uniqid().".$ext";

        $rsp=$user->register_user($firstname,$lastname,$email,$phone,$address,$state,$username,$password,$tmp,$newname);
        if($rsp!==false){
            $_SESSION['useronline']=$rsp;
        header("location:../login.php");
        exit();
        }
        else{
            $_SESSION['errormsg']="Registation unsuccessful";
            header("location:../login.php");
            exit();
        }
        
    }

}
else{
    header("location:../index.php");
    exit();
}
?>