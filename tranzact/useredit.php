<?php
include "headeruser.php";
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
                    <a href="createmessage.php" class="m-3">Send Message</a>
                    <hr>


                </div> -->
                <div class="col-md-10 border border-2 rounded-3">
                    
                <form class="mb-3" id="formreg" action="process/process_userupdate.php?id=<?php echo $deets['user_id'];?>" method="post" enctype="multipart/form-data">
                    <div class=" form-floating">
                        <label class="">First Name</label>
                        <input type="text" class="form-control" name="firstname" value='<?php echo $deets['user_first_name'];?>'>
                    </div>
                    <div  class="form-floating">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" value='<?php echo $deets['user_last_name'];?>'>
                    </div>
                    <!-- <div class="d-flex mb-3">
                        <label class="px-5">Gender</label>
                        <label class="">Male</label>
                        <input type="radio" class="form-check" name="gender" value="male">
                        <label class="px-3">Female</label>
                        <input type="radio" class="form-check" name="gender" value="female">
                    </div> -->
                    <div  class="form-floating">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value='<?php echo $deets['user_email'];?>'>
                    </div>
                    <div  class="form-floating">
                        <label>Phone No</label>
                        <input type="text" class="form-control" name="phone" value='<?php echo $deets['user_phone'];?>'>
                    </div>
                    <div  class="form-floating">
                        <label>Address Line</label>
                        <input type="text" class="form-control" name="address" value='<?php echo $deets['user_address'];?>'>
                    </div>
                    <div class="form-floating">
                        <label>State/City</label>
                        <input type="text" class="form-control" name="state" value='<?php echo $deets['user_state'];?>'>
                    </div>
                                        
                    <div class="form-floating">
                        <label>Profile Picture</label>
                        <?php
                        if($deets['user_pix']){
                            $filename=$deets['user_pix'];
                            echo"<img src='upload/$filename' width='70px'>";
                        }
                        ?>
                        <input type="file" class="form-control" name="pix">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-lg btnlog" type="submit" name="btn">Save</button>
                    </div>
                </form>
                     </div>
                   


                </div>
                
            </div>
            
            

        </div>
    </div>
    <?php
    include "footer.php";
    ?>
  
<script src="bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="jquery.min.js"></script>
<script>
    
</script>
</body>
</html>