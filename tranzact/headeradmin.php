<?php
session_start();
require_once "admin/classes/Admin.php";
$admin= new Admin;
$data=$admin->admin_info($_SESSION['adminonline']);

// echo "<pre>";
// print_r($data['admin_username']);
// echo "</pre>";
require_once "admin_guide.php";
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
     
    <title>Tranzact|admin</title>
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
    <a class="nav-link active head1" aria-current="page" href="#">Summary</a>
  </li>
  
  <li class="nav-item dropdown mx-5">
          <a class="nav-link dropdown-toggle head1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hi <?php echo $data['admin_username'];?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item headeruser" href="useredit.php">Edit Profile</a></li>
            <li><a class="dropdown-item" href="admin_logout.php">Sign Out</a></li>
            <li><hr class="dropdown-divider"></li>
            
          </ul>
    </li>
</ul>
  </div>
</nav>
 </div>
            <div class="row">
                <div class="col-md-2 border border-2 rounded-3 modalbg">
                    
                    <a href="admin.php" class="m-3">Summary</a>
                    <hr>
                    <a href="adminuser.php" class="m-3">Users</a>
                    <hr>
                    <a href="admintransaction.php" class="m-3">Transactions</a>
                    <hr>
                    <a href="admincategory.php" class="m-3">Product Category</a>
                    <hr>
                    <a href="adminsubcategory.php" class="m-3">Product Subcategory</a>
                    <hr>
                    <a href="adminproduct.php" class="m-3">Products</a>
                    <hr>
                    
                    
                </div>
