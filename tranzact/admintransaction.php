<?php
include "headeradmin.php";
$usertransaction=$admin->transaction_info();
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
                        <h5 class="head1">Transactions</h5>
                        
                    </div>
                  <table class="table table-striped table-bordered zebra-striping" data-sort-name="name" data-sort-order="asc">
                  <thead>  
                        <tr>
                            <th data-sortable="true">S/N</th>
                            <th data-sortable="true">Payment Reference</th>
                            <th data-sortable="true">Status</th>
                            
                            <th data-sortable="true">Seller</th>
                            <th data-sortable="true">Amount(&#8358;)</th>
                            <th data-sortable="true">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $serial=0;
                        foreach($usertransaction as $transaction){
                            $transaction_id=$transaction['payment_ref'];
                            $transaction_status=$transaction['payment_status'];
                           
                            $transaction_seller=$transaction['user_first_name'];
                            $transaction_amount=$transaction['product_price'];
                            $product_id=$transaction['product_id'];
                            $serial++;
                            echo"<tr>
                                <td>$serial</td>
                                <td>$transaction_id</td>
                                <td>$transaction_status</td>
                                
                                <td>$transaction_seller</td>
                                <td>&#8358;$transaction_amount</td>
                                <td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
  Edit
</button><div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h1 class='modal-title fs-5' id='exampleModalLabel'>Edit Price</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        <form action='process/process_editprice.php?id=' >
            <label>Price</label>
            <input type='number' name='price' class='form-control' value='$transaction_amount'>
        </form>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
        <button type='button' class='btn btn-primary'>Save changes</button>
      </div>
    </div>
  </div>
</div>
                                
                                </td>

                            </tr>";
                        }
                        ?>
                        <!-- <tr>
                            <td>1</td>
                            <td>001</td>
                            <td>processing</td>
                            <td>Bolaji1890</td>
                            <td>Adeleke23</td>
                            <td><button class="btn btn-danger">Delete</button><button class="btn btn-dark">Edit</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>002</td>
                            <td>processing</td>
                            <td>Bolaji1890</td>
                            <td>Adeleke23</td>
                            <td><button class="btn btn-danger">Delete</button><button class="btn btn-dark">Edit</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>003</td>
                            <td>processing</td>
                            <td>Bolaji1890</td>
                            <td>Adeleke23</td>
                            <td><button class="btn btn-danger">Delete</button><button class="btn btn-dark">Edit</button></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>004</td>
                            <td>processing</td>
                            <td>Bolaji1890</td>
                            <td>Adeleke23</td>
                            <td><button class="btn btn-danger">Delete</button><button class="btn btn-dark">Edit</button></td>
                        </tr> -->
                        
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

</body>
</html>