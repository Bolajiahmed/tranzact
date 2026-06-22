
<?php
include "headeradmin.php";
$p=new Admin;
$product=$p->product_info();
// echo"<pre>";
// print_r($product);
// echo"</pre>";

?>
         <!-- navend -->
                
                

            <!-- </div>
            <div class="row">
                <div class="col-md-2 border border-2 rounded-3 modalbg">
                    <h5>Welcome BolajiAdmin!</h5>
                    <hr>
                    <a href="admin.php" class="m-3">Summary</a>
                    <hr>
                    <a href="adminuser.php" class="m-3">Users</a>
                    <hr>
                    <a href="admintransaction.php" class="m-3">Transactions</a>
                    <hr>
                    <a href="adminedit.php" class="m-3">Edit Profile</a>
                    <hr>
                    
                </div> -->
                <div class="col-md-10 border border-2 rounded-3">
                    <?php
                     if(isset($_SESSION['success'])){
                        echo "<p class='alert alert-success'>".$_SESSION['success']."</p>";
                        unset($_SESSION['success']);
                     }
                     
                     ?>
                    <div class="d-flex justify-content-between">
                        <h5 class="head1">Product</h5>
                        
                        <a href="adminsell.php" class="btn btn-dark">Add Product</a>
                    </div>
                  <table class="table table-striped table-bordered zebra-striping" data-sort-name="name" data-sort-order="asc">
                  <thead>  
                        <tr>
                            <th data-sortable="true">S/N</th>
                            <th data-sortable="true">Product</th>
                            <!-- <th data-sortable="true">Product ID</th> -->
                            <th data-sortable="true">Product Category</th>
                            <th data-sortable="true">Product Price</th>
                            <th data-sortable="true">Produc Seller</th>
                            <th data-sortable="true">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                        if($product){
                            $serial=1;
                            foreach($product as $pdt){
                                $product_name=$pdt['product_name'];
                                 $product_id=$pdt['product_id'];
                                $product_category=$pdt['category_name'];
                                $product_price=$pdt['product_price'];
                                $product_Sellerid=$pdt['user_first_name'];
                                
                                echo "<tr><td>$serial</td><td>$product_name</td><td>$product_category</td><td>&#8358;$product_price</td><td>$product_Sellerid</td><td><a href='admin_editproduct.php?id=$product_id'class='btn btn-primary'>Edit Product</a></td></tr>";
                                $serial++;
                                
                            }
                            
                        }
                       
  
                        ?>
                        
                    </tbody>
                            
                  </table>


                </div>
                
            </div>
            

        </div>
    </div>
    <?php
    include "footer.php";
    ?>

  
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script></script>
 

</body>
</html>