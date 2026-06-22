<?php
session_start();
require_once "classes/User.php";
$user= new User;
$deets=$user->user_info($_SESSION['useronline']);
require_once "user_guide.php";
// echo"<pre>";
// print_r($deets);
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
    <link type="text/css" rel="stylesheet" href="animate.min.css">
    
    
    <title>Tranzact|login</title>
</head>
<body class="logbody">
    <div class="container">
         <div class="row">
            <div class="col">
                 <!-- navbar start -->
         <nav class="navbar navbar-expand-lg bg-white" >
  <div class="container-fluid">
    <a class="navbar-brand head1 " href="index.php">Tranzact</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active head1" aria-current="page" href="list.php">Product List</a>
  </li>
  <li class="nav-item dropdown mx-5">
          <a class="nav-link active head1" aria-current="page" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>my cart</a>
          
    </li>
  <li class="nav-item dropdown mx-5">
          <a class="nav-link dropdown-toggle head1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hi <?php echo $deets['user_username']; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item headeruser" href="useredit.php">Edit Profile</a></li>
            <li><a class="dropdown-item" href="user_logout.php">Sign Out</a></li>
            <li><hr class="dropdown-divider"></li>
            
          </ul>
    </li>
</ul>
  </div>
</nav>
         <!-- navend -->
                
                

            </div>
            <div class="row">
                <div class="col-md-2 border border-2 rounded-3">
                    <a href="user.php" class="m-3">Orders</a>
                    <hr>
                    <a href="userselling.php" class="m-3 dropdown dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Selling</a>
                    <hr>
                    <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="sell.php">Upload Item</a></li>
            <li><a class="dropdown-item" href="userselling.php">Transactions</a></li>
           
          </ul>

                    <a href="userwishlist.php" class="m-3">Wishlist</a>
                    <hr>
                    <a href="userprofile.php" class="m-3">Profile</a>
                    <hr>
                    <a href="useredit.php" class="m-3">Edit Profile</a>
                    <hr>
                    <!-- <a href="inbox.php" class="m-3">Inbox</a>
                    <hr>
                    <a href="creatmessage.php" class="m-3">Send Message</a>
                    <hr> -->


                </div>