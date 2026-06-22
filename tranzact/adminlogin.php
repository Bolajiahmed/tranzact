<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="fontawesome/css/all.min.css">
    <link type="text/css" rel="stylesheet" href="animate.min.css">
    
    
    <title>Tranzact|login</title>
</head>
<body class="logbody">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h1 class="text-center head1">Tranzact-Admin</h1>
                <?php
                if(isset($_SESSION['errorlogmsg'])){
                    echo "<p class='alert alert-danger'>".$_SESSION['errormsg']."</p>";
                    unset($_SESSION['errorlogmsg']);
                }
                if(isset($_SESSION['errormsg'])){
                    echo "<p class='alert alert-danger'>".$_SESSION['errormsg']."</p>";
                    unset($_SESSION['errormsg']);
                }
                 if(isset($_SESSION['adminonline'])){
                    echo "<p class='alert alert-success'> Registration successful for user:".$_SESSION['adminonline']."</p>";
                    unset($_SESSION['adminonline']);
                }
                ?>
                
                    <div class="d-flex mb-3">
                        <label class="px-2">Sign In</label>
                        <input type="radio" class="form-check" name="user" value="signin" checked id="signin">
                        <label class="px-3">Register</label>
                        <input type="radio" class="form-check" name="user" value="register" id="register">
                    </div>
                <form class="mb-3" id="formsignin" action="admin/process/process_adminlogin.php" method="post">
                    
                    <div class="form-floating">
                        <label class="">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class=" form-floating">
                        <label class="">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div>
                        <button class="btn btn-lg btnlog" name="btn">Sign in</button>
                    </div>
                </form>
                <form class="mb-3" id="formreg" action="admin/process/process_adminsignup.php" method="post">
                    <!-- <div class=" form-floating">
                        <label class="">First Name</label>
                        <input type="text" class="form-control" name="firstname">
                    </div>
                    <div  class="form-floating">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname">
                    </div>
                    <div class="d-flex mb-3">
                        <label class="px-5">Gender</label>
                        <label class="">Male</label>
                        <input type="radio" class="form-check" name="gender" value="male">
                        <label class="px-3">Female</label>
                        <input type="radio" class="form-check" name="gender" value="female">
                    </div> --> 
                    <div  class="form-floating">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    
                    <div  class="form-floating">
                        <label>Create Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-floating">
                        <label>Create Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-floating">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password2">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-lg btnlog" type="submit" name="btn">Register me</button>
                    </div>
                </form>


            </div>

        </div>
    </div>
    <?php
    include('footer.php');
    ?>


<script src="bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#formreg').hide()
    
        $('input[type="radio"]').click(function(){
            var register= $(this).val()
            if(register=='register'){
                $('#formreg').show().addClass('animate__animated animate__bounceInLeft');
                $('#formsignin').hide()
                
            }
            else{
                $('#formsignin').show().addClass('animate__animated animate__bounceInLeft')
                $('#formreg').hide().removeClass('animate__animated animate__bounceInLeft');
            
            }
        })
    })
    
</script>
</body>
</html>