<?php
session_start();
require_once "../classes/User.php";
$user=new User;
if(isset($_POST['subcategory'])&& isset($_POST['category'])){

    $category=(isset($_POST['category']))?$_POST['category']:"";
    $subcategory=(isset($_POST['subcategory']))?$_POST['subcategory']:"";
    $list=$user->list_allproduct($category,$subcategory);
     echo "<pre>";
     print_r($category,$subcategory);
     echo "</pre>";
     //die();
    if($list){
        foreach($list as $product){
            $productpix=$product['product_pix'];
            $productname=$product['product_name'];
            $productgrade=$product['product_grade'];
            $productprice=$product['product_price'];
            $id=$product['product_id'];

            echo " <div class='col-md-3 col-sm-6  feeds'>
                <a href='#'><img src='upload/$productpix'  class='' alt=''></a>
                <a href='product.php?id=$id'><p>$productname</p></a>
                <p>$productgrade</p>
                <p>$productprice</p>
                <a><i class='fa-regular fa-heart'></i></a>
             </div>";
        }
    }
    

}
else{
    
    //$_SESSION['errorlogmsg']="Please login to access your profile";
    
}
?>