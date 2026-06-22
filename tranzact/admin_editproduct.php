<?php
session_start();
require_once "admin/classes/Admin.php";
require_once "admin_guide.php";
$user=new Admin;
$deets=$user->admin_info($_SESSION['adminonline']);
//echo $_SESSION['useronline'];
//die();
$category=$user->get_category();
$product_id=htmlspecialchars($_GET['id']);
$product=$user->get_product($product_id);
//  echo "<pre>";
//  print_r($product);
//  echo"</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="fontawesome/css/all.min.css">
    <title>Tranzact|sell</title>
</head>
<body class="logbody">
    <div class="container-fluid">
        <div class="row justify-content-center " style="height: 700px;">
            <div class="col-md-8 sellbg  d-inline">
                <h4 class="text-center dark p-2">You are Editing <?php echo $product['product_name'];?></h4>
            </div>
            <div class="col-md-8 sellbg1" style="position:relative; top:1px;">
                <?php
                if(isset($_SESSION['errormsg'])){
                    echo "<p class='alert alert-danger'>".$_SESSION['errormsg']."</p>";
                    unset($_SESSION['errormsg']);
                }
                if(isset($_SESSION['successmsg'])){
                    echo "<p class='alert alert-success'>".$_SESSION['successmsg']."</p>";
                    unset($_SESSION['successmsg']);
                }
                ?>
                <form action="process/process_adminproductedit.php?id=<?php echo $product_id?>" method="post" enctype="multipart/form-data">
                    <div class="">
                    <div class="">
                        <label class="">Product Name</label>
                        <input type="text"  class="form-control" name="name" value="<?php echo $product['product_name']; ?>" >
                    </div clas>
                        <label class="">Category</label>
                                   
                        <select class="form-select" id="category" name="category">
                            <option value="">Select</option>
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
                    <div>
                        <label>Sub-Category</label>
                        <div>
                            <select class="form-select" id="sub" name="subcategory">
                                <option value="">Please select category</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="mt-1">
                        <label>Product Description</label>
                        <div>
                            <textarea cols="5" rows="1" class="form-control" name="desc" ></textarea>
                        </div>
                    </div>
                    <div class="mt-1">
                        <label class="">Product Condition</label>
                        <input type="radio" class="" name="condition" value="Excellent">Excellent
                        <input type="radio" class="" name="condition" value="Very Good">Very Good
                        <input type="radio" class="" name="condition" value="Good">Good
                    </div>
                    <div class="mt-1">
                        <label class="">Price</label>
                        <input type="number" placeholder="amount" class="form-control" name="price" value="<?php echo $product['product_price']; ?>">
                    </div>

                    <div class="mt-1">
                        <label class="">Upload</label>
                        
                        <input type="file" placeholder="upload1" class="form-control" name="pix">
                        <?php
                        if($product['product_pix']){
                            $filename=$product['product_pix'];
                            echo"<img src='upload/$filename' width='60'>";
                        }
                        ?>
                        <input type="file" placeholder="upload2" class="form-control" name="pix1">
                        <?php
                        if($product['product_pix1']){
                            $filename=$product['product_pix1'];
                            echo"<img src='upload/$filename' width='60'>";
                        }
                        ?>
                        <input type="file" placeholder="upload3" class="form-control" name="pix2">
                        <?php
                        if($product['product_pix2']){
                            $filename=$product['product_pix2'];
                            echo"<img src='upload/$filename' width='60'>";
                        }
                        ?>
                    </div>
                    <div class="text-center">
                         <button type="submit"class="btn btnlog" name="btn">Submit</button>
                         <button  type="reset" class="btnlog">Clear</button>
                   </div>
                </form>
            </div>

        </div>

    </div>
    <?php
    include "footer.php";
    ?>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="jquery.min.js"></script> 
<script>
    $(document).ready(function(){
        $('#category').change(function(){
            var categoryid=$('#category').val();
            var data2send="categoryid="+categoryid;
            $('#sub').load('process/process_subcategory.php',data2send,function(response){
                //alert("hello");
            });
        });
    });
</script>
</body>
</html>
