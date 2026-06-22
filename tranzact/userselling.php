<?php
include "headeruser.php";
$selling=$user->get_listproduct($_SESSION['useronline']);
//  echo"<pre>";
//  print_r($selling);
//  echo"</pre>";

?>
            <!-- <div class="row">
                <div class="col-md-2 border border-2 rounded-3">
                    <a href="user.php" class="m-3">Orders</a>
                    <hr>
                    <a href="#" class="m-3 dropdown dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Selling</a>
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
                    <a href="inbox.php" class="m-3">Inbox</a>
                    <hr>
                    <a href="creatmessage.php" class="m-3">Send Message</a>
                    <hr>


                </div> -->
                <div class="col-md-10 border border-2 rounded-3 ">
                     <h3 class="head1">My products</h3>
                     <?php
                     if(isset($_SESSION['success'])){
                        echo "<p class='alert alert-success'>".$_SESSION['success']."</p>";
                        unset($_SESSION['success']);
                     }
                     
                     ?>
                    <div class='row'>
                    <?php
                    if($selling){
            foreach($selling as $product){
                $name=$product['product_name'];
               $grade=$product['product_grade'];
               $price=$product['product_price'];
               $photo=$product['product_pix'];
               $id=$product['product_id'];
               //echo $photo;
               //die();

               echo "
              
               <div class='col-3 mb-2 feeds'>
                <a href='#'><img src='upload/$photo' width='250'></a>
                <a href='product.php?id=$id'><p>$name</p></a>
                <p>$grade</p>
                <p>&#8358;$price</p>
                <a class='btn col-12 btnlog mb-5' href='sell_update.php?id=$id'>Edit product</a>
                
                
             </div>
            ";
                }
  }

                   ?>
                   
                    </div>

                </div>
                
            </div>
            
            

        </div>
    </div>
    <?php
    include "footer.php";
    ?>
  
<script src="bootstrap/js/bootstrap.bundle.min.js"></script> 


</body>
</html>