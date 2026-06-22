<?php
include "headeruser.php";
$orders=$user->get_transactiondetails($_SESSION['useronline']);
//  echo"<pre>";
//  print_r($orders);
//  echo"</pre>";

?>
                <div class='col-md-10 border border-2 rounded-3'>
                    <h3 class="head1">My orders</h3>
                    <div>
<?php
if($orders){
    foreach($orders as $trans){
        $name=$trans['product_name'];
        $time=$trans['transaction_date'];
        $price=$trans['product_price'];
        $pix=$trans['product_pix'];
        $desc=$trans['product_description'];
        echo"
                   <div class='border border-1 rounded-3>
                       <a href='#'><img src='upload/$pix' class='' alt='images/noproduct.jpg' width='205px'></a>
                    </div>
                    <div class='mb-2 p-2'>
                        <p>Transaction Date:<span>$time</span></p>
                        
                        <h6>$name </h6>
                        <p>&#8358;$price</p>
                        <p>Description: $desc</p>
                        

                   </div>
                   


               ";
    }
}
?>
                    
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