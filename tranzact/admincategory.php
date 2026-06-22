
<?php
include "headeradmin.php";
$d=new Admin;
$category=$d->get_category();

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
                    <div class="d-flex justify-content-between">
                        <h5 class="head1">Product Category</h5>
                        <?php if(isset($_SESSION['categoryid'])){echo "<p>".$category['category_name']." Category added successfully</p>";Unset($_SESSION['categoryid']);}?>
                        <?php if(isset($_SESSION['errormsg'])){ echo "<p>".$_SESSION['errormsg']."</p>";Unset($_SESSION['errormsg']);}?>
                        
                        <!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Category
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="admin/process/process_addcategory.php" method="post" class="my-4">
                    <div class="">
                        <label class="">Category</label>
                        <input type="text" name="category" class="form-control">          
                        
                    </div>
                    
                    <div class="d-flex">
                         <button class="btn btn-dark" name="btn">Submit</button>
                         
                   </div>
                </form>
      </div>
      
    </div>
  </div>
</div>
                    </div>
                  <table class="table table-striped table-bordered zebra-striping" data-sort-name="name" data-sort-order="asc">
                  <thead>  
                        <tr>
                            <th data-sortable="true">S/N</th>
                            <!-- <th data-sortable="true">category_id</th> -->
                            <th data-sortable="true">category_name</th>
                            <th data-sortable="true">number of Product</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        if($category){
                            $serial=1;
                            foreach($category as $cat){
                                $category_id=$cat['category_id'];
                                $category_name=$cat['category_name'];
                                if($category_id){
                                  $total_category=$d->total_category($category_id);
                                  $total=$total_category['total'];
                                }
                                echo "<tr>
                                    <td>$serial</td>
                                    
                                    <td>$category_name</td>
                                    <td>$total</td>
                                </tr>";
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