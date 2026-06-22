<?php
session_start();
require_once "../classes/User.php";
$user=new User;
if(isset($_GET['id'])&& isset($_POST['btn'])){
    $sellerid=$_SESSION['useronline'];
    $productname=$_POST['name'];
    $productprice=$_POST['price'];
    $pix=$_FILES['pix'];
    $pix1=$_FILES['pix1'];
    $pix2=$_FILES['pix2'];
    $category=$_POST['category'];
    $subcategory=$_POST['subcategory'];
    $description=$_POST['desc'];
    $condition=(isset($_POST['condition']))?$_POST['condition']:"";
    if(empty($category)||empty($subcategory)||empty($description)||empty($productname)){
        $_SESSION['errormsg']="Please complete the form for your product";
        header("location:../sell.php");exit;
    }
    elseif($pix['error']!=0||$pix1['error']!=0||$pix2['error']!=0){
        $_SESSION['errormsg']="Error in pictures upload";
        header("location:../sell.php");exit;
    }
    else{
        $pixname=$pix['name'];
        $pixname1=$pix1['name'];
        $pixname2=$pix2['name'];
        $ext=pathinfo($pixname,PATHINFO_EXTENSION);
        $ext1=pathinfo($pixname1,PATHINFO_EXTENSION);
        $ext2=pathinfo($pixname2,PATHINFO_EXTENSION);
        $allowed=["jpg","png","jpeg"];
        $tmp=$pix['tmp_name'];
        $tmp1=$pix1['tmp_name'];
        $tmp2=$pix2['tmp_name'];
        if(!in_array($ext,$allowed)||!in_array($ext1,$allowed)||!in_array($ext2,$allowed)){
            $_SESSION['errormsg']="Invalid file";
            header("location:../sell.php");exit;
        }
        $newname=uniqid().".$ext";
        $newname1=uniqid().".$ext1";
        $newname2=uniqid().".$ext2";
        //echo "$productname,$category,$productprice,$sellerid,$description,$condition,$tmp,$tmp1,$tmp2,$newname,$newname1,$newname2";
        //die();
        $rsp=$user->add_product($productname,$category,$productprice,$sellerid,$description,$condition,$tmp,$tmp1,$tmp2,$newname,$newname1,$newname2);
        if($rsp!==false){
            $_SESSION['product']=$rsp;
            $_SESSION['successmsg']="$productname was added successfully";
            header("location:../sell.php");exit;
            exit;
        }
        else{
           $_SESSION['errormsg']="Error adding $productname";
           echo $rsp; 
           header("location:../sell.php");
            exit; 
        }

    }

    
}
else{
        $_SESSION['errormsg']="Please login to post your product";
        header("location:../sell.php");
        exit;
    }


    

    


?>