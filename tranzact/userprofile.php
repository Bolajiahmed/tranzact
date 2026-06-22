<?php
include "headeruser.php";
?>
            <!-- <div class="row">
                <div class="col-md-2 border border-2 rounded-3">
                    <a href="#" class="m-3">Orders</a>
                    <hr>
                    <a href="userselling.php" class="m-3 dropdown dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Selling</a>
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
                <div class="col-md-10 border border-2 rounded-3 d-flex">
                   <div class=" border border-1 rounded-3">
                        <?php
                            if($deets['user_pix']){
                                $filename=$deets['user_pix'];
                                echo"<img src='upload/$filename'  alt='images/noproduct.jpg' width='205px'>";
                            }
                        ?>
                            
                    </div>
                    <div class="mb-2 p-2">
                        <p>Firstname:<span><?php echo $deets['user_first_name']?></span></p>
                        <p>Lastname:<span><?php echo $deets['user_last_name']?></span></p>
                        <p>Username:<span><?php echo $deets['user_username']?></span></p>
                        <p>Phone:<span><?php echo $deets['user_phone']?></span></p>
                        <p>Address:<span><?php echo $deets['user_address']?></span></p>
                        <p>State:<span><?php echo $deets['user_state']?></span></p>
                        <a class='btn col-12 btnlog mb-5' href='useredit.php?id=<?php echo $deets['user_id']?>'>Edit product</a>

                        <?php
                    if(isset($_SESSION['success'])){
                        echo"<p class='alert alert-success'>".$_SESSION['success']."</p>";
                        unset($_SESSION['success']);
                    }
                    if(isset($_SESSION['errormsg'])){
                        echo"<p class='alert alert-danger'>".$_SESSION['errormsg']."</p>";
                        unset($_SESSION['errormsg']);
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