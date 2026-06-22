         <?php
       include_once "headeradmin.php";
      $usertotal= $admin->total_user();
      $usertransaction=$admin->total_transaction();
      $completedtransaction=$admin->completed_transaction();
      
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
                <div class="col-md-10 border border-2 rounded-3 d-flex">
                   <div class=" border border-1 rounded-3 m-3" style="height:100px;width:20%;">
                       <a href="#"><h6 class="text-center modalbg">Total Users</h6></a>
                       <h6 class="text-center pt-3"><?php echo $usertotal['total'];?></h6>
                       
                    </div>
                    <div class=" border border-1 rounded-3 m-3" style="height:100px;width:20%;">
                       <a href="#"><h6 class="text-center modalbg">Active Users</h6></a>
                       <h6 class="text-center pt-3"><?php echo $usertotal['total'];?></h6>
                       
                    </div>
                    <div class=" border border-1 rounded-3 m-3" style="height:100px;width:20%;">
                       <a href="#"><h6 class="text-center modalbg"> Transactions</h6></a>
                       <h6 class="text-center pt-3"><?php echo (($usertransaction['total'])>=0)?$usertransaction['total']:0?></h6>
                       
                    </div>
                    <div class=" border border-1 rounded-3 m-3" style="height:100px;width:20%;">
                       <a href="#"><h6 class="text-center modalbg">Completed Transactions</h6></a>
                       <h6 class="text-center pt-3"><?php echo (($completedtransaction['total'])>=0)?$completedtransaction['total']:0?></h6>
                       
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