<?php
session_start();
require_once "../classes/User.php";
require_once "../user_guide.php";
$user=new User;
if(isset($_POST['btn'])){
    $id=$_GET['id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $state=$_POST['state'];
    $pix=$_FILES['pix'];
    

    // echo"<pre>";
    // print_r($pix);
    // echo"</pre>";
    // die();
    if(empty($firstname)||empty($lastname)||empty($email)||empty($phone)||empty($address)||empty($state)){
        $_SESSION['errormsg']="No changes made ";
        header("location:../userprofile.php");
    }
    elseif($pix['name']!=""){
        $allowed=['jpg','png','jpeg'];
        $ext=pathinfo($pix['name'],PATHINFO_EXTENSION);
    
       $newname=uniqid().".$ext";
        echo"<pre>";
    //  print_r($newname);
    //  echo"</pre>";
    //  die();
   
        $tmp=$pix['tmp_name'];
        
        $user->upload_userupdate($firstname,$lastname,$email,$phone,$address,$state,$tmp,$newname,$id);
        $_SESSION['success']="Profile  is edited successfully";
        header("location:../userprofile.php");exit;

    }
    else{
         $user->update_userupdate($firstname,$lastname,$email,$phone,$address,$state,$id);
         $_SESSION['success']="Profile is edited successfully";
        header("location:../userprofile.php");exit;
    }


}
else{
    $_SESSION['errormsg']="please login to edit your profile";
    header("location:login.php");exit;
}
?>