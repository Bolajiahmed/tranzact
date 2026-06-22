<?php
session_start();
require_once "classes/User.php";
//require_once "user_guide.php";
$user= new User;
if(isset($_SESSION['useronline'])){
  $idty=$user->user_info($_SESSION['useronline']);
}

$categorymenu=$user->get_category();

// echo"<pre>";
// print_r($categorymenu);
// echo"</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="fontawesome/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h2 class="head1"><a href='index.php' class='head1'>Tranzact</a></h2>
            </div>
            <div class="col-md-4">
              <form action='list.php' method='get'>
                <Select class="head2" name="tran">
                    <option value="Catalogue" ><a href="">Catalogue</a></option>
                    <option value="members" ><a href="">members</a></option>
                </Select>
                <input type="search" placeholder="search for item" class="head3" name="user">
                <button class="searchbtn col-md-auto" name="btn">search</button>
              </form>
            </div>
            <div class="col-md-4">
              <?php
              if(isset($_SESSION['useronline'])&&isset($idty)){
                echo"<a class='headbtn col-4' href='user.php'> Hi ". $idty['user_first_name']."</a>";
              }
              else{
                echo "<button class='headbtn'><a href='login.php' >Sign Up|Log In</a></button>";
              }
                
              ?>
                <button class="headbtn2"><a href="sell.php">Sell Now</a></button>
                <button class="headbtn2"><a href="list.php">Products</a></button>
            </div>
        </div>
        <div class="row navbar navbar-expand-lg modalbg">
            <div class="col d-flex ">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- navbar -->
            <ul class="navbar-nav me-5 mb-2 mb-lg-0 ">
              <?php
              if($categorymenu){
                foreach($categorymenu as $menu){
                  $id=$menu['category_id'];
                  $category_menu=$menu['category_name'];
                  echo"<li class='nav-item id='category' value='$id'>
   <a class='nav-link  me-5  category'  href='list.php?cat=$id' >$category_menu</a>";

     }
              }
              ?>

                <li class='nav-item'><a class='nav-link  me-5' href='#'>About Us</a></li>
                <li class='nav-item'><a class='nav-link  me-5' href='#' >Contact</a></li>
             </ul>
      
<!--   
               
  
  <li class="nav-item dropdown">
    <a class="nav-link me-5 text-dark " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Electronics</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item big-bgbtn" href="#">Laptops</a></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Desktop</a></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Printers</a></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Accessories</a></li>
      <li><hr class="dropdown-divider big-bgbtn"></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Separated link</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link me-5 text-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Appliances</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item big-bgbtn" href="#">TV</a></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Home Theatre</a></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Kitchen Appliances</a></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Other Gadgets</a></li>
      <li><hr class="dropdown-divider big-bgbtn"></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Separated link</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link me-5 text-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Clothing</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item big-bgbtn" href="#">Men</a></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Women</a></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Girls</a></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Boys</a></li>
      <li><hr class="dropdown-divider big-bgbtn"></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Separated link</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link me-5 text-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">About US</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item big-bgbtn" href="#">About us</a></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Our Value</a></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Our Partners</a></li>
      <li><hr class="dropdown-divider big-bgbtn"></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Separated link</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link me-5 text-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">How it works</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item big-bgbtn" href="#">Buy</a></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Sell</a></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Delivery</a></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Payment</a></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Return</a></li>
      <li><hr class="dropdown-divider big-bgbtn"></li>
      <li><a class="dropdown-item big-bgbtn" href="#">Separated link</a></li>
    </ul>
  </li>
</ul>  -->
             <!-- navbar -->
                </div>            
            </div>
        </div>
<script src="jquery.min.js"></script>
<script>
$('#category').click(function(){
var category_name=$('#category').val();
var data2send={category:category_name};
$('#subcategory').load("process/process_submenu.php",data2send,function(res){

})

});
</script>

