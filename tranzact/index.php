<?php
 include('header.php');
 $pagepro=$user->index_product();
//  echo"<pre>";
//  print_r($pagepro);
//  echo"</pre>";

?>
        <div class="big-bg">
            <div class="col big-bg1 mt-3">
                <h2 class="head1 m-1 text-center">Ready to Transact?</h2><br>
                <button class="btn btn-lg headbtn2 col-12 m-1 "><a href='sell.php'>Sell Now</a></button><br>
                <button class="btn btn-lg big-bgbtn col-12 m-1"><a>How it works</a></button>
            </div>
            

        </div>
        <div>
            <h2 class="head1">Recent</h2>
        </div>
        <Div class="row  justify-content-between">
         <?php
         if($pagepro){
            foreach($pagepro as $recent){
               $pix=$recent['product_pix'];
               $name=$recent['product_name'];
               $cond=$recent['product_grade'];
               $price=$recent['product_price'];
               $id=$recent['product_id'];
               echo"<div class='col-md-3 col-sm-6  feeds'>";
         ?>
         <?php
            if(empty($pix)){
               echo"<a href='#'><img src='images/noproduct.jpg' width='200'></a>";
               
            }
            else{
                echo"<a href='#'><img src='upload/$pix' width='200'></a>";
            }
         ?>
         <?php
         echo"                
                <a href='product.php?id=$id'><p>$name</p></a>
                <p>$cond</p>
                <p>&#8358;$price</p>
                <i class='fa-regular fa-heart'></i>
             </div>";
            }
         }
         ?>
            <!-- <div class="col-md-3 col-sm-6  feeds">
                <a href="#"><img src="images/kenny1.jpg" class="" alt=""></a>
                <p>Design</p>
                <p>condition</p>
                <p>£50</p>
                <i class="fa-regular fa-heart"></i>
             </div>
             <div class="col-md-3 col-sm-6 feeds">
               <a href="#"><img src="images/kenny1.jpg" class="" alt=""></a>
                <p>Design</p>
                <p>condition</p>
                <p>£50</p>
                <i class="fa-regular fa-heart"></i>
             </div>
             <div class="col-md-3 col-sm-6 feeds">
                <a href="#"><img src="images/kenny1.jpg" class="" alt=""></a>
                <p>Design</p>
                <p>condition</p>
                <p>£50</p>
                <i class="fa-regular fa-heart"></i>
             </div>
             <div class="col-md-3 col-sm-6 feeds">
                <a href="#"><img src="images/kenny1.jpg" class="" alt=""></a>
                <p>Design</p>
                <p>condition</p>
                <p>£50</p>
                <i class="fa-regular fa-heart"></i>
             </div>
             <div class="col-md-3 col-sm-6 feeds">
                <a href="#"><img src="images/kenny1.jpg" class="" alt=""></a>
                <p>Design</p>
                <p>condition</p>
                <p>£50</p>
                <i class="fa-regular fa-heart"></i>
             </div>
             <div class="col-md-3 col-sm-6 feeds">
                <a href="#"><img src="images/kenny1.jpg" class="" alt=""></a>
                <p>Design</p>
                <p>condition</p>
                <p>£50</p>
                <i class="fa-regular fa-heart"></i>
             </div>
             <div class="col-md-3 col-sm-6 feeds">
                <a href="#"><img src="images/kenny1.jpg" class="" alt=""></a>
                <p>Design</p>
                <p>condition</p>
                <p>£50</p>
                <i class="fa-regular fa-heart"></i>
             </div>
             <div class="col-md-3 col-sm-6 feeds">
                <a href="#"><img src="images/kenny1.jpg" class="" alt=""></a>
                <p>Design</p>
                <p>condition</p>
                <p>£50</p>
                <i class="fa-regular fa-heart"></i>
             </div>                    -->
        </div>
        <?php
        include('footer.php')
        ?>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script> 
</body>
</html>