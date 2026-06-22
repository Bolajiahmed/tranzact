<?php
include('header.php');
$id=($_GET['id']);
$product=$user->get_product($id);
//  echo"<pre>";
//  print_r($product);
//  echo"</pre>";
//  die();
if($product){
    foreach($product as $product){
        $seller_id=$product['product_seller_id'];
        $category_id=$product['product_category_id'];
        $price=$product['product_price'];
        $condition=$product['product_grade'];
        $description=$product['product_description'];
        $photo=$product['product_pix'];
        $photo1=$product['product_pix1'];
        $photo2=$product['product_pix2'];
        $name=$product['product_name'];
        $time=$product['product_registration_time'];
        $product_id=$product['product_id'];

    }
}
$productuser=$user->get_sameseller_product($seller_id);
//echo"<pre>";
//print_r($productuser);
//echo"</pre>";
 //die();
 
$seller=$user->get_seller_product($id);
// echo"<pre>";
// print_r($seller);
// echo"</pre>";
// die();


$total=$user->get_sameseller_total($id);
// echo"<pre>";
// print_r($total);
// echo"</pre>";
// //die();
$category=$user->get_cat_product($category_id);
$sp=$user->seller_info($id);
// echo"<pre>";
// print_r($sp);
// echo"</pre>";
// // die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="fontawesome/css/all.min.css">
    <title>tranzact|product</title>
</head>
<body class="logbody">
    <div class="container">
        <div class="row offset-1">
            <div class="col-md-6">
                <i class="fa-solid fa-backward prevpro" id="prevpro"></i>
                <i class="fa-solid fa-forward nextpro" id="nextpro"></i>
                <img src="<?php echo 'upload/'.$photo;//"images/kenny3.jpg"?>" class="imgproduct border border-1 rounded-3 mb-2 mx-5" id="proimg">
                <div>
                   <img src='<?php echo "upload/".$photo//images/kenny3.jpg;?>' class="imgproduct1 border border-1 rounded-3 mx-2" id="proimg1" width="200"> 
                   <img src="<?php echo 'upload/'.$photo1; //images/kenny4.jpg?>" class="imgproduct1 border border-1 rounded-3 mx-2" id="proimg2"> 
                   <img src="<?php echo 'upload/'.$photo2;//images/kenny5.jpg?>" class="imgproduct1 border border-1 rounded-3" id="proimg3"> 
                </div>
            </div>
            <div class="col-md-5 border border-2 rounded-3">
                <p><?php echo $name;?></p>
                <p><?php echo $condition;?></p>
                <p>&#8358;<?php echo $price;?></p>
                <hr>
                <p>Condition:<span><?php echo $condition;?></span></p>
                
                <p>Time Uploaded:<span><?php echo $time;?></span></p>
                <hr>
                <p>Description</p>
                <p><?php echo $description;?></p>
                <hr>
                    <form action='process/process_addtocart.php' method='post'><button class="col-12 btnlog mb-5" name='btncart'>Add to cart</button><input type='hidden' name='cart' value='<?php echo $product_id; ?>'></form>
                    <button class="col-12 btn-lg btn-light big-bgbtn rounded-3" id='ask'>Ask Seller</button><br><br><br>
                    
                    <div  class='mb-5 border border-3 rounded-3 headeruser' id='contact'>
                        <h6 class="text-center">Contact Seller</h6>
                        <p style="text-decoration:bold;">Seller Name:  <span><?php echo $sp['user_first_name'];?></span></p>
                        <p>Seller Phone: <?php echo $sp['user_phone'];?></p>
                        <p>Seller Email: <?php echo $sp['user_email'];?></p>
                    </div>
                    
            </div>

        </div>
        <div class="row">
            <div class="col">
                <h5 class="head1 justify-content-between mb-2">User's items</h5>
            </div>
        </div>
        <div class="row  justify-content-between ">
            <div class="col-md-6 d-flex">
                <div class='row'>
                     <?php
            if($productuser){
                foreach($productuser as $product){
                    $product_pix=$product['product_pix'];
                    $product_name=$product['product_name'];
                    $product_grade=$product['product_grade'];
                    $product_price=$product['product_price'];

                    echo "<div class='col-md-3 useritems'>
                    <a><img src='upload/$product_pix' width='150'></a>
                    <a href=''><p>$product_name</p></a>
                    <p>$product_grade</p>
                    <p>&#8358;$product_price</p>
                    <a href=''><i class='fa-regular fa-heart text-danger'></i></a>
            </div> ";
                }
            }
            ?>
                </div>
           
           </div>
            
            <div class="col-md-6 border border-2 rounded-3">
                <div class="border border-2 my-3 d-flex">
                    <i class="fa-solid fa-shield-virus pe-3"></i>
                    <p><span>Buyer Protection fee Our Buyer Protection is added for a fee to every purchase made with the “Buy now” button. Buyer Protection includes our Refund Policy.</span></p>
                    <p></p>
                </div>
                <div class="border border-2 my-3 d-flex">
                    <div class="d-flex" >
                        <div class="userimage rounded-circle overflow-hidden" style="height:60px;width:60px" >
                            <img src='<?php echo "upload/".$seller['user_pix'] ;?>' alt='photo'>
                        </div>
                        <div class="m-3">
                            <h4 class="mx-5"><?php echo $seller['user_first_name'];?></h4>
                        </div>
                        
                    </div>
                    
                </div>
                 <div class="border border-2 my-3">
                    <p><i class="fa-solid fa-location-dot px-2"></i><?php echo $seller['user_state'];?></p>
                    <!-- <p><i class="fa-solid fa-timer px-2"></i><?php// echo $seller['user_state'];?></p> -->

                </div>
                <div class="border border-2 my-3 d-flex">
                    <p><i class="fa-solid fa-upload px-2"></i>Number of Uploads</p>
                    <p class="px-2"><?php echo $total[0]['count(product_id)'] ;?>items uploaded </p>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col">
                    <h5 class="head1 justify-content-between mb-2">Similar items</h5>
                </div>
            </div>
            <div class="row">
                <?php
                if($category){
                    foreach($category as $cat ){
                        $product_name=$cat['product_name'];
                        $product_condition=$cat['product_grade'];
                        $product_price=$cat['product_price'];
                        $product_pix=$cat['product_pix'];

                        echo "<div class='col-md-3 feeds'>
                <a><img src='upload/$product_pix' width='150'></a>
                <p>$product_name</p>
                <p>$product_condition</p>
                <a href='#'><p>&#8358;$product_price</p></a>
                <i class='fa-regular fa-heart'></i></div>";
                    }
                }
                ?>
                
            </div>
        </div>

    </div>
    

    </div>
    <?php
    include('footer.php');
    ?>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    var photo1=document.getElementById('proimg1').src
    var photo2=document.getElementById('proimg2').src
    var photo3=document.getElementById('proimg3').src
    var photo=[photo1,photo2,photo3]
    photodisplay=0
    var prevpro=document.getElementById('prevpro')
     var nextpro=document.getElementById('nextpro')
    prevpro.addEventListener('click',function(){
         document.getElementById('proimg').src=photo[photodisplay];
         photodisplay=(photodisplay+1)%photo.length
    })
    nextpro.addEventListener('click',function(){
         document.getElementById('proimg').src=photo[photodisplay];
         photodisplay=(photodisplay-1+photo.length)%photo.length
    })
    </script>
    <script src='jquery.min.js'></script>
    <script>
    $(document).ready(function(){
        $('#contact').hide();
        $('#ask').click(function(){
            $('#contact').show();
            
        })
        
        
        
    })
    </script>
    

</script> 
</body>
</html>