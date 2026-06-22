
<?php
include "headeradmin.php";
$userstat=$admin->user_info();
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
                        <h5 class="head1">Users</h5>
                        <h5><a href="#">Add New User</a></h5>
                        <?php
                        if(isset($_SESSION['successmsg'])){
                            echo "<p class='alert alert-success'>".$_SESSION['successmsg']."</p>";
                            unset($_SESSION['successmsg']);
                        }
                        ?>
                    </div>
                  <table class="table table-striped table-bordered zebra-striping" data-sort-name="name" data-sort-order="asc">
                  <thead>  
                        <tr>
                            <th data-sortable="true">S/N</th>
                            <th data-sortable="true">USER</th>
                            <th data-sortable="true">USER EMAIL</th>
                            <th data-sortable="true">USER PHONE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($userstat){
                            $serial=1;
                            foreach($userstat as $user){
                                $user_name=$user['user_first_name']." ".$user['user_last_name'];
                                $useremail=$user['user_email'];
                                $userphone=$user['user_phone'];
                                echo "<tr>
                                    <td>$serial</td>
                                    <td>$user_name</td>
                                    <td>$useremail</td>
                                    <td>$userphone</td>
                                    
                                </tr>";
                                $serial++;
                            }
                        }
                        ?>
                        <!-- <tr>
                            <td>1</td>
                            <td>Bolaji1990</td>
                            <td>Active</td>
                            <td><button class="btn btn-danger">Delete</button><button class="btn btn-dark">Edit</button></td>
                        </tr> -->
                        <!-- <tr>
                            <td>2</td>
                            <td>Adeleke23</td>
                            <td>Disable</td>
                            <td><button class="btn btn-danger">Delete</button><button class="btn btn-dark">Edit</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>simi1990</td>
                            <td>Active</td>
                            <td><button class="btn btn-danger">Delete</button><button class="btn btn-dark">Edit</button></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Bolaji1890</td>
                            <td>Active</td>
                            <td><button class="btn btn-danger">Delete</button><button class="btn btn-dark">Edit</button></td>
                        </tr> -->
                    </tbody>
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