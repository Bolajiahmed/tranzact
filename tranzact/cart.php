<?php
session_start();
require_once "classes/User.php";
$user= new User;
$deets=$user->user_info($_SESSION['useronline']);
require_once "user_guide.php";
// echo"<pre>";
$cart_item=$user->get_mycart($_SESSION['useronline']);
//  echo"<pre>";
//  print_r($cart_item);
//  echo"</pre>";

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
  </div>
</nav>
<?php
if(isset($_SESSION['errormsg'])){
    echo "<p class='alert alert-danger'>".$_SESSION['errormsg']."</p>";
}
?>
                <div class='row border border-2 rounded-3 d-flex'>
<?php
if($cart_item){
    foreach($cart_item as $item){
        $cartid=$item['cart_id'];
        $photo=$item['product_pix'];
        $name=$item['product_name'];
        $price=$item['product_price'];
        $seller=$item['product_seller_id'];
        $product_id=$item['cart_product_id'];
        $category_id=$item['product_category_id'];
        
        echo "<div class='col'>
                
                
                
                <div class='row'> 
                    <div>
                        <h4 class='head1'>Cart No: $cartid </h4>
                    </div>   
                   <div class='col-md-4 border border-1 rounded-3'>
                       <a href='#'><img src='upload/$photo' class='' alt='' width='205px'></a>
                    </div>
                    <div class='col-md-4 mb-2 p-2'>
                        <h6>$name </h6>
                        <p>Price: &#8358;$price</p>
                        <p>Sold By:$seller</p>

                   </div>
                   <div class='col-md-4'>
                        
                        <form  id='remform' action='process/process_removecart.php' method='post'><button class='btn btn-danger' id='rbtn' name='btn'>Remove</button><input type='hidden' name='remove' value='$cartid'></form>
                   </div>
                   
                </div>   


               
                
            ";
    }
}
else{
    echo "<p class='alert headeruser'>No Item available in your cart</p>";
}
?>
                
                <div class="row d-flex ">
                    <div class='col text-center'>
                        <form action='process/process_transaction.php' method='post'><button class='btn btn-success mb-3' name='btn'>Buy</button><input type='hidden' name='productid' value='$product_id'><input type='hidden' name='seller' value='$seller'><input type='hidden' name='category' value='$category_id'></form>
                        
                   </div>
                    <div class='col text-center'>
                        <a class='btn btn-dark head1' href="list.php">continue shopping</a>
                        
                   </div>

                </div>
             </div>
            
                
            
            

        
    <?php
    include "footer.php";
    ?>
  
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src='jquery.min.js'></script> 
<!-- <script>
    $(document).ready(
        $('#rbtn').click(function(){
            var data2send=$('#remform').serialize();
            $.ajax({
                url:"process/process_removecart.php",
                data:data2send,
                dataType:"text",
                Type:"post",
                success:function(res){

                }
            });
        });

    )
</script> -->

</body>
</html>