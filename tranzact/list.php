<?php
include('header.php');
require_once "classes/User.php";
$user= new User;
$products=$user->get_allproduct();
//  echo "<pre>";
//  print_r($search);
//  echo "</pre>";
//die();
$category=$user->get_category();
$subcategory=$user->get_allsubcategory();
//echo print_r();
//die();
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
    <title>Tranzact|list</title>
</head>
<body class="logbody">
    <div class="container">
        <div class="row">
            <div class="col">
                <a class="social" href="">items</a>
                <h3 class="head1">items</h3>
                <?php
                if(isset($_SESSION['errormsg'])){
                  echo "<p class='alert alert-danger'>".$_SESSION['errormsg']."</p>";
                  unset($_SESSION['errormsg']);
                }
                ?>
            </div>

        </div>
        <div class="row">
            <div class="col border border-dark-1 border-start-0 border-end-0">
                <!-- dropdown start -->
<div class="btn-group mx-2">
   <form action="process/process_product" id="form" method="GET" >
  <button type="button" class="btn searchbtn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Category
  </button>
  
  <ul class="dropdown-menu">
   <?php
   if($category){
                                foreach($category as $cat){
                                $category_id=$cat['category_id'];
                                $category_name=$cat['category_name'];
                                echo "<li><a class='dropdown-item' href='#'><label>$category_name</label><input type='radio' name='category' value='$category_id' style='width: 20px;height: 20px;' class='mx-5'></a></li>";

                            }
                            }
   
   ?>
    
  </ul>
</div>
<div class="btn-group mx-2">
  <button type="button" class="btn searchbtn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Sub-category
  </button>
  
  <ul class="dropdown-menu">
   <?php
   if($subcategory){
                                foreach($subcategory as $subcat){
                                $subcategory_id=$subcat['Subcategory_id'];
                                $subcategory_name=$subcat['Subcategory_name'];
                                echo "<li><a class='dropdown-item' href='#'><label>$subcategory_name</label><input type='radio' name='subcategory' value='$subcategory_id'  style='width: 20px;height: 20px;' class='mx-5'></a></li>";

                            }
                            }
   
   ?>
   </ul>
</div>
<div class="btn-group mx-2">
  <button type="button" class="btn searchbtn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Condition
  </button>
  
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#"><label>Excellent</label><input type="radio" value="Excellent"style="width: 20px;height: 20px;" class="mx-5" name="grade"></a></li>
    <li><a class="dropdown-item" href="#"><label>Very Good</label><input type="radio" value="Very good"style="width: 20px;height: 20px;" class="mx-5" name="grade"></a></li>
    <li><a class="dropdown-item" href="#"><label>Good</label><input type="radio" value="good" style="width: 20px;height: 20px;" class="mx-5" name="grade"></a></li>
 </ul>
</div>

<div class="btn-group mx-2">
  <button type="button" class="btn searchbtn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Color
  </button>
  
  <ul class="dropdown-menu ">
    <li><a class="dropdown-item" href="#"><label>white</label><input type="radio" value="white" style="width: 20px;height: 20px;" class="mx-5" name="color"></a></li>
    <li><a class="dropdown-item" href="#"><label>black</label><input type="radio" value="black" style="width: 20px;height: 20px;" class="mx-5" name="color"></a></li>
    <li><a class="dropdown-item" href="#"><label>blue</label><input type="radio" value="blue" style="width: 20px;height: 20px;" class="mx-5" name="color"></a></li>
    <li><a class="dropdown-item" href="#"><label>red</label><input type="radio" value="red" style="width: 20px;height: 20px;" class="mx-5" name="color"></a></li>
    <li><a class="dropdown-item" href="#"><label>yellow</label><input type="radio" value="yellow" style="width: 20px;height: 20px;" class="mx-5" name="color"></a></li>
    <li><a class="dropdown-item" href="#"><label>green</label><input type="radio" value="green" style="width: 20px;height: 20px;" class="mx-5" name="color"></a></li>
    <li><a class="dropdown-item" href="#"><label>Multi-color</label><input type="radio" value="Multi-color" style="width: 20px;height: 20px;" class="mx-5" name="color"></a></li>
    <li><a class="dropdown-item" href="#"><label>pink</label><input type="radio" value="pink" style="width: 20px;height: 20px;" class="mx-5" name="color"></a></li>
    <li><a class="dropdown-item" href="#"><label>others</label><input type="radio" value="others" style="width: 20px;height: 20px;" class="mx-5" name="color"></a></li>
 </ul>
 <button type="button" class="btn searchbtn mx-5" id="btn">
    Search
  </button>
</form>
</div>

        <div class="row border border-dark-1 border-start-0 border-end-0">
            <div class="col mb-3 ">
                <a href="#" class="m-5">Phones</a>
                <a href="#" class="m-5">I.T Electronics</a>
               <a href="#" class="m-5">Appliances</a>
                <a href="#" class="m-5">Clothing</a>
                
            </div>
        </div>
        <div class="row" id="product">
         <?php
         if(isset($_GET['btn'])){
              
      $input=$_GET['tran'];
  $chs=$_GET['user'];
  $search=$user->get_search($chs,$input);
//  echo "<pre>";
//  print_r($search);
//  echo "</pre>";
// die();
  
  if($search){
    foreach($search as $product){
                $name=$product['product_name'];
               $grade=$product['product_grade'];
               $price=$product['product_price'];
               $photo=$product['product_pix'];
               $id=$product['product_id'];
               //echo $photo;
               //die();

               echo "<div class='col-md-3 col-sm-6  feeds'>
                <a href='#'><img src='upload/$photo' width='250'></a>
                <a href='product.php?id=$id'><p>$name</p></a>
                <p>$grade</p>
                <p>&#8358;$price</p>
                <i class='fa-regular fa-heart wishlist-heart' data-product='$id'></i>
                <form action='process/process_wishlist.php' method='post' id='wishlist-form-$id'>
                  <input type='hidden' value='$id' name='product'>
                </form>";
                }
  }
}

elseif(isset($_GET['cat'])){
            $categoryid=$_GET['cat'];
            $catproduct=$user->get_cat_product($categoryid);
              // echo "<pre>";
              // print_r($catproduct);
              // echo "</pre>";
              //  die();

            foreach($catproduct as $product){
               
               $name=$product['product_name'];
               $grade=$product['product_grade'];
               $price=$product['product_price'];
               $photo=$product['product_pix'];
               $id=$product['product_id'];
               //echo $photo;
               //die();

               echo "<div class='col-md-3 col-sm-6  feeds'>
                <a href='#'><img src='upload/$photo' width='250'></a>
                <a href='product.php?id=$id'><p>$name</p></a>
                <p>$grade</p>
                <p>&#8358;$price</p>
                <i class='fa-regular fa-heart wishlist-heart' data-product='$id'></i>
                <form action='process/process_wishlist.php' method='post' id='wishlist-form-$id'>
                  <input type='hidden' value='$id' name='product'>
                </form>
             </div>";
            }
           
         }

         elseif($products){
            foreach($products as $product){
               
               $name=$product['product_name'];
               $grade=$product['product_grade'];
               $price=$product['product_price'];
               $photo=$product['product_pix'];
               $id=$product['product_id'];
                 //echo $photo;
                 //die();

                 echo "<div class='col-md-3 col-sm-6  feeds'>
                <a href='#'><img src='upload/$photo' width='250' class='img-fluid'></a>
                <a href='product.php?id=$id'><p>$name</p></a>
                <p>$grade</p>
                <p>&#8358;$price</p>
                <i class='fa-regular fa-heart wishlist-heart' data-product='$id'></i>
                <form action='process/process_wishlist.php' method='post' id='wishlist-form-$id'>
                  <input type='hidden' value='$id' name='product'>
                </form>
               </div>";
              }
               
             }

              

              
              
             ?>
              
            </div>
            <div class="row">
              <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center page">
          <li class="page-item disabled">
      <a class="page-link page">Previous</a>
    </li>
    <li class="page-item"><a class="page-link page" href="list.html">1</a></li>
    <li class="page-item"><a class="page-link page" href="#">2</a></li>
    <li class="page-item"><a class="page-link page" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link page" href="#">Next</a>
    </li>
  </ul>
</nav>
        </div>
        

        

    </div>
    <?php
include('footer.php');
?>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="jquery.min.js"></script>
<script>
   $(document).ready(function(){
      //$('input[type="checkbox"]').on('change',function(){
        // $('#selection').html('');
         //$('input[type="radio"]:radio').each(function(){
            //var output  = $(this).val();
           // var button = $('<Button></Button>').attr('type','button').text(output)
           // });
        // $('#selection').append(button);
                  
     // });
   $('#btn').click(function(){
      var cat = $('input[name="category"]:checked').val();
      //alert(cat);
      //die();
      var sub = $('input[name="subcategory"]:checked').val()
      //var cat= $('#cat').val();
      //var sub= $('#sub').val();
      var data2send={category:cat,subcategory:sub};
      console.log(data2send);
      //alert(data2send);
      //die();
      $('#product').load("process/process_product.php",data2send)

      });
      $('.fa-regular').click(function(){
        $(this).css({color: 'palevioletred'})
        var data2send1 = $('#form').serialize();
        $.ajax({
          url:"process/process_wishlist.php",
          data:data2send1,
          dataType:'text',
          Type:'Post',
          success:function(){
           // $('.fa-regular').css({color: 'palevioletred'});
          }

        });
        
      });
   });

//})
</script> 
</body>
</html>