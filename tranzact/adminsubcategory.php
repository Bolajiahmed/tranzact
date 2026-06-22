
<?php
include "headeradmin.php";
$d=new Admin;
$category=$d->get_category();
$subcategory=$d->get_subcategory();

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
                        <?php if(isset($_SESSION['categoryid'])){echo "<p>".$_SESSION['categoryid']."Category added successfully</p>";Unset($_SESSION['categoryid']);}?>
                        <?php if(isset($_SESSION['errormsg'])){ echo "<p>".$_SESSION['errormsg']."</p>";Unset($_SESSION['errormsg']);}?>
                        
                        <!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Subcategory
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Subcategory</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="admin/process/process_addsubcategory.php" method="post" class="my-4">
                    <div class="">
                        <label class="">Subcategory</label>
                        <input type="text" name="subcategory" class="form-control">          
                    </div>
                    <div class="">
                        <select class="form-select" name="category">
                            <option value="">please select category</option>
                            
                        <?php
                        if($category){
                            foreach($category as $cat){
                                $category_id=$cat['category_id'];
                                $category_name=$cat['category_name'];
                                echo "<option value='$category_id'>$category_name</option>";
                                
                            }
                        }
                        ?>
                        </select>
                                  
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
                            <!-- <th data-sortable="true">subcategory_id</th> -->
                            <th data-sortable="true">Subcategory name</th>
                            <th data-sortable="true">category name</th>
                            <th data-sortable="true">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        if($subcategory){
                            $serial=1;
                            foreach($subcategory as $sub){
                                $subcategory_id=$sub['Subcategory_id'];
                                $subcategory_name=$sub['Subcategory_name'];
                                $category_id=$sub['category_name'];
                                if($subcategory_id){
                                    $sum=$d->total_subcategory($subcategory_id);
                                    $total=$sum['total'];
                                }
                                echo "<tr>
                                    <td>$serial</td>
                                    
                                    <td>$subcategory_name</td>
                                    <td>$category_id</td>"
                        ?>
                        <?php
                        if($total){
                                echo "<td>&#8358;$total</td>
                                </tr>";
                        }
                        else{
                            echo "<td>&#8358;0</td>
                                </tr>";
                        }
                                
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