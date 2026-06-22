<?php
session_start();
require_once "../classes/User.php";
require_once "../user_guide.php";
$user=new User;
if(isset($_POST['btn'])){
    $id=$_GET['id'];
    $name=$_POST['name'];
    $category=$_POST['category'];
    $subcategory=$_POST['subcategory'];
    $description=$_POST['desc'];
    $condition=$_POST['condition'];
    $price=$_POST['price'];
    $pix=$_FILES['pix'];
    $pix2=$_FILES['pix2'];
    $pix1=$_FILES['pix1'];

    // echo"<pre>";
    // print_r($pix);
    // echo"</pre>";
    // die();
    if(empty($name)||empty($price)||empty($description)||empty($category)||empty($subcategory)||empty($condition)){
        $_SESSION['errormsg']="please complete the form ";
        header("location:../sell_update.php?id=$id");
    }
    elseif($pix['name']!=""||$pix1['name']!=""||$pix2['name']!=""){
        $allowed=['jpg','png','jpeg'];
        $ext=pathinfo($pix['name'],PATHINFO_EXTENSION);
        echo"<pre>";
    // print_r($ext);
    // echo"</pre>";
    // die();

        $ext1=pathinfo($pix1['name'],PATHINFO_EXTENSION);
        $ext2=pathinfo($pix2['name'],PATHINFO_EXTENSION);
       $newname=uniqid().".$ext";
        $newname1=uniqid().".$ext1";
        $newname2=uniqid().".$ext2";
   
        $tmp=$pix['tmp_name'];
        $tmp1=$pix1['tmp_name'];
        $tmp2=$pix2['tmp_name'];
        $user->upload_sellupdate($name,$price,$category,$description,$condition,$tmp,$tmp1,$tmp2,$newname,$newname1,$newname2,$id);
        $_SESSION['success']="Product $name is edited successfully";
         header("location:../userselling.php");exit;

    }
    else{
         $user->update_sellupdate($name,$price,$category,$description,$condition,$id);
         $_SESSION['success']="Product $name is edited successfully";
         header("location:../userselling.php");exit;
    }


}
else{
    $_SESSION['errormsg']="please login to edit product";
    header("location:login.php");exit;
}
?>