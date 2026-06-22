<?php
require_once "Db.php";
Class User extends Db{
    private $dbconn;
    public function __construct(){
        $this->dbconn=$this->connect();
    }

    public function add_wishlist($buyer_id,$product_id){
        $check=$this->check_wishlist($buyer_id,$product_id);
        if($check==0){
            try{
                $sql="INSERT INTO wishlist(user_id,product_id)VALUES (?,?)";
                $stmt=$this->dbconn->prepare($sql);
                $stmt->execute([$buyer_id,$product_id]);
                $wish_id=$this->dbconn->lastInsertId();
                return $wish_id;
            }
            catch(PDOException $e){
                return false;
            }
        }
    }

    public function check_wishlist($buyer_id,$product_id){
        $sql="SELECT * from wishlist where user_id=? and product_id=? ";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$buyer_id,$product_id]);
        $total=$stmt->rowCount();
        return $total;

    }

    public function seller_info($product_id){
        $sql="SELECT * FROM product join users on product.product_seller_id=users.user_id where product_id=?";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$product_id]);
        $data=$stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function update_userupdate($firstname,$lastname,$email,$phone,$address,$state,$id){
       
        $sql="UPDATE users set user_first_name=?,user_last_name=?,user_email=?,user_phone=?,user_address=?,user_state=? where user_id=?";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$firstname,$lastname,$email,$phone,$address,$state,$id]);
        return true;
    }

    public function upload_userupdate($firstname,$lastname,$email,$phone,$address,$state,$tmp,$newname,$id){
        move_uploaded_file($tmp,"../upload/$newname");
        $sql="UPDATE users set user_first_name=?,user_last_name=?,user_email=?,user_phone=?,user_address=?,user_state=?,user_pix=? where user_id=?";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$firstname,$lastname,$email,$phone,$address,$state,$newname,$id]);
        return true;
    }

    public function update_sellupdate($name,$price,$category,$subcategory,$description,$condition,$id){
       
        $sql="UPDATE product SET product_name=?,product_price=?,product_category=?,product_subcategory=?,product_description=?,product_grade=?where product_id=?";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$name,$price,$category,$subcategory,$description,$condition,$id]);
        return true;

    }

    public function upload_sellupdate($name,$price,$category,$description,$condition,$tmp,$tmp1,$tmp2,$newname,$newname1,$newname2,$id){
        move_uploaded_file($tmp,"../upload/$newname");
        move_uploaded_file($tmp1,"../upload/$newname1");
        move_uploaded_file($tmp2,"../upload/$newname2");
        $sql="UPDATE product SET product_name=?,product_price=?,product_category_id=?,product_description=?,Product_grade=?,product_pix=?,product_pix1=?,product_pix2=? where product_id=?";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$name,$price,$category,$description,$condition,$newname,$newname1,$newname2,$id]);
        return true;

    }
    public function get_product_user($id){
       try{
            $sql="SELECT*FROM product WHERE product_id=?";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $data=$stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
       }
       catch(PDOException $e){
            //$e->getMessage();
            return false;
       }
        
    }
    public function get_listproduct($id){
        $sql="SELECT* FROM product where product_seller_id=? order by product_registration_time desc";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$id]);
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;

    }
    public function get_transactiondetails($id){
        $sql="SELECT* FROM transaction_details join transaction on transaction_details.transaction_id=transaction.transaction_id join product on transaction_details.product_id=product.product_id where buyer_id=?";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$id]);
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function get_search($user,$tran){
        $sql="SELECT* from product join users on product.product_seller_id=users.user_id where product_name like ? or user_first_name like ?";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute(["%$user%","%$tran%"]);
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function update_payment($paystatus,$paydata,$payref){
        $sql="UPDATE payment SET payment_status=?,payment_data=? where payment_ref=?";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$paystatus,$paydata,$payref]);
        return true;
    }

    public function delete_cart($buyerid){
        try{
            $sql2="DELETE from cart where cart_user_id=?";
            $stmt=$this->dbconn->prepare($sql2);
            $stmt->execute([$buyerid]);
            return true;

        }
        catch(PDOException $e){
            return false;
        }
    }

    public function payment_verify($payref){
        $url="https://api.paystack.co/transaction/verify/:$payref";
        $header=["Authorization: Bearer sk_test_dfd36f769e0f07f9c57d771aad9e352ee699e531","Cache-Control: no-cache"];

        $payver=curl_init($url);

        curl_setopt($payver,CURLOPT_URL, $url);
        
        curl_setopt($payver, CURLOPT_HTTPHEADER, $header);
        curl_setopt($payver,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($payver,CURLOPT_CUSTOMREQUEST,"GET");
        // curl_setopt($payver,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($payver,CURLOPT_ENCODING, "");
        curl_setopt($payver,CURLOPT_MAXREDIRS, 10);
        curl_setopt($payver,CURLOPT_TIMEOUT,30);
        curl_setopt($payver,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
        
         
        $data=curl_exec($payver);

        if($data){
            curl_close($payver);
            return json_decode($data);
        }
        else{
            curl_error($data);
            return false;

        }
    }
    public function payment_initialise($email,$payref,$transactionid,$amount){
        $url="https://api.paystack.co/transaction/initialize";
        $request=[
            'email'=>$email,
            'amount'=>$amount*100,
            'transactionid'=>$transactionid,
            'callback_url'=>"http://localhost/tranzact/payment_landing.php"
        ];
        $header=["Authorization: Bearer sk_test_dfd36f769e0f07f9c57d771aad9e352ee699e531","Content-Type: application/json"];

        $fields_string = json_encode($request);

        $curlrsp = curl_init($url);
  
  //set the url, number of POST vars, POST data
        curl_setopt($curlrsp,CURLOPT_URL, $url);
        curl_setopt($curlrsp,CURLOPT_POST, true);
        curl_setopt($curlrsp,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($curlrsp, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curlrsp,CURLOPT_RETURNTRANSFER, true); 
  
  //execute post
        $data = curl_exec($curlrsp);
        if($data){
            curl_close($curlrsp);
            return json_decode($data);
        }
         else{
            curl_error($curlrsp);
            return false;
         };

    }
    public function insert_payment($transactionid,$amount,$buyerid,$payref){
        try{
            $sql="INSERT INTO payment (transaction_id,payment_amount,buyer_id,payment_ref) VALUES(?,?,?,?)";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute([$transactionid,$amount,$buyerid,$payref]);
            $payment_id=$this->dbconn->lastInsertId();
            return $payment_id;
        }
        catch(PDOException $e){
            return false;
        }
       
    }

    public function get_trans_amount($transactionid){
        try{
             $sql="SELECT * FROM transaction WHERE transaction_id=?";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute([$transactionid]);
            $data=$stmt->fetch(PDO::FETCH_ASSOC);
            return $data['transaction_amount'];
        }
        catch(PDOException $e){
            //$e->getMessage();
            return false;
        }
       
    }
    // public function get_trans_seller($transactionid){
    //     try{
    //          $sql="SELECT * FROM transaction WHERE transaction_id=?";
    //         $stmt=$this->dbconn->prepare($sql);
    //         $stmt->execute([$transactionid]);
    //         $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return $data['seller_id'];
    //     }
    //     catch(PDOException $e){
    //         //$e->getMessage();
    //         return false;
    //     }
       
    // }

    public function insert_transaction($buyerid){

        $sql="INSERT INTO transaction(buyer_id)VALUES(?)";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$buyerid]);
        $transactionid=$this->dbconn->lastInsertId();

        $sql1="SELECT* FROM cart join product on cart.cart_product_id=product.product_id where cart_user_id=?";
        $stmt=$this->dbconn->prepare($sql1);
        $stmt->execute([$buyerid]);
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);

        if($data){
            $sum=0;
            
            foreach($data as $item){
                $product_id=$item['product_id'];
                $sellerid=$item['product_seller_id'];
                $categoryid=$item['product_category_id'];
                $price=$item['product_price'];
                $sum=$sum+$price;

                $sql2="INSERT INTO transaction_details (transaction_id,product_id,amount) VALUES(?,?,?)";
                $stmt=$this->dbconn->prepare($sql2);
                $stmt->execute([$transactionid,$product_id,$sum]);

            }
            $sql3="UPDATE transaction SET transaction_amount=? WHERE transaction_id=?";
            $stmt=$this->dbconn->prepare($sql3);
            $stmt->execute([$sum,$transactionid]);

            
            return $transactionid;
            
        }
        return false;
    }
    
    public function remove_cart($product_id,$user_id){
        try{
            $sql="DELETE FROM cart WHERE cart_id=? AND cart_user_id=?";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute([$product_id,$user_id]);
            return true;

        }
        catch(PDOException $e){
            return false;
        }
    }
    Public function get_mycart($id){
        try{
            $sql="SELECT * FROM cart JOIN product on cart.cart_product_id=product.product_id WHERE cart_user_id=?";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch(PDOException $e){
            //$e->getMessage();
            return false;
        }
        
    }
    public function add_cart($product_id,$user_id){
        $check=$this->check_cart($product_id,$user_id);
        if($check==0){
            try{
                $sql="INSERT INTO cart(cart_product_id,cart_user_id)VALUES (?,?)";
                $stmt=$this->dbconn->prepare($sql);
                $stmt->execute([$product_id,$user_id]);
                $cart_id=$this->dbconn->lastInsertId();
                return $cart_id;
            }
            catch(PDOException $e){
                return false;
            }
        }
    }
    public function check_cart($product_id,$user_id){
        try{
            $check=$this->check_buyer($product_id,$user_id);
            if($check==0){
            $sql="SELECT* from cart where cart_product_id=? AND cart_user_id=?";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute([$product_id,$user_id]);
            $total= $stmt->rowCount();
            return $total;
            }
            $_SESSION['errormsg']='this cannot be purchased';
            header("location:../product.php");
            
        }
        catch(PDOException $e){
            return false;
        }
    }
    public function check_buyer($product_id,$user_id){
        try{
            $sql="SELECT* from procuct where product_id=? AND product_seller_id=?";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute([$product_id,$user_id]);
           $total= $stmt->rowCount();
           return $total;
        }
        catch(PDOException $e){
            return false;
        }
    }
    
    public function get_subcategory_menu(){
       try{
        $sql="SELECT * FROM category join subcategory on category.category_id = subcategory.category_id where category_name=?";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute();
        $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
       }
       catch(PDOEXCEPTION $e){
            $e->getMessage();
            return false;
       }

    }
    public function list_allproduct($category,$subcategory){
       try{
            $sql="SELECT*FROM product JOIN subcategory ON product.product_category_id=subcategory.category_id WHERE product_category_id=? AND subcategory_id=?";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute([$category,$subcategory]);
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
       }
       catch(PDOException $e){
            //$e->getMessage();
            return false;
       }
        
    }
    public function get_sameseller_total($id){
        try{
            $sql="SELECT count(product_id) FROM product JOIN users ON product.product_seller_id=users.user_id WHERE product_id=?";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch(PDOException $e){
            return false;
        }
        
    }
    
    public function get_seller_product($id){
        try{
            $sql="SELECT*FROM product JOIN users ON product.product_seller_id=users.user_id WHERE product_id=?";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $data=$stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        catch(PDOException $e){
            return false;
        }
        
    }
    public function get_sameseller_product($sellerid){
        try{
            $sql="SELECT*FROM product WHERE product_seller_id=?";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute([$sellerid]);
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch(PDOException $e){
            return false;
        }
        
    }
    public function get_cat_product($categoryid){
        try{
            $sql="SELECT*FROM product WHERE product_category_id=?";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute([$categoryid]);
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch(PDOException $e){
            return false;
        }
        
    }

    public function get_product($id){
       try{
            $sql="SELECT*FROM product WHERE product_id=?";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
       }
       catch(PDOException $e){
            //$e->getMessage();
            return false;
       }
        
    }

    public function add_product($productname,$category,$productprice,$sellerid,$description,$condition,$tmp,$tmp1,$tmp2,$newname,$newname1,$newname2){
       
        try{
            move_uploaded_file($tmp,"../upload/$newname");
            move_uploaded_file($tmp1,"../upload/$newname1");
            move_uploaded_file($tmp2,"../upload/$newname2");
            $sql="INSERT INTO product(product_name,product_category_id,product_price,product_seller_id,product_grade,product_description,product_pix,product_pix1,product_pix2) values(?,?,?,?,?,?,?,?,?)";
       
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute([$productname,$category,$productprice,$sellerid,$condition,$description,$newname,$newname1,$newname2]);
            $productid=$this->dbconn->lastInsertId();
        
            return $productid; 
        }
        catch(PDOException $e){
            return false;

        }
        
     }

     public function index_product(){
        try{
            $sql="SELECT * FROM product order by product_registration_time desc limit 8";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute();
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch(PDOException $e){
            return false;
        }
       
    }
    
    public function get_allproduct(){
        try{
            $sql="SELECT * FROM product";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute();
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch(PDOException $e){
            return false;
        }
       
    }
    public function get_category(){
       try{
        $sql="SELECT * FROM category";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute();
        $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
       }
       catch(PDOEXCEPTION $e){
            $e->getMessage();
            return false;
       }

    }

    public function get_allsubcategory(){
       try{
        $sql="SELECT * FROM subcategory";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute();
        $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
       }
       catch(PDOEXCEPTION $e){
            $e->getMessage();
            return false;
       }

    }

    public function get_subcategory($categoryid){
       try{
        $sql="SELECT * FROM subcategory WHERE category_id=?";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$categoryid]);
        $data= $stmt->fetchAll(PDO::FETCH_ASSOC);

       // print_r($data);
        return $data;
       }
       catch(PDOException $e){
            //$e->getMessage();
            return false;
       }

    }
    public function register_user($firstname,$lastname,$email,$phone,$address,$state,$username,$password,$tmp,$newname){
       try{
        move_uploaded_file($tmp,"../upload/$newname");
        $hash=password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO users (user_first_name,user_last_name,user_email,user_phone,user_address,user_state,user_username,user_password,user_pix) VALUES(?,?,?,?,?,?,?,?,?)";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$firstname,$lastname,$email,$phone,$address,$state,$username,$hash,$newname]);
        $userid=$this->dbconn->lastInsertId();
        return $userid;
       }
       catch(PDOException $e){
            $e->getMessage();
            return false;
       }
    }
    public function login_user($username,$password){
       
        $sql="SELECT * FROM users WHERE user_username=?";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$username]);
        $data=$stmt->fetch(PDO::FETCH_ASSOC);
        // print_r($data);
        // die();
        if($data){
            $stored_password=$data['user_password'];
            $userid=$data['user_id'];
            $check=password_verify($password,$stored_password);
           
            if($check){
                $_SESSION['useronline']=$userid;return true;
            }
            else{
                $_SESSION['errorlogmsg']="Password is incorrect";return false;
            }
        }
        else{
            $_SESSION['errorlogmsg']="Incorrect username";return false;
        }
    }
    public function user_info($userid){
       try{
        $sql="SELECT * FROM users WHERE user_id=?";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$userid]);
        $data= $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
       }
       catch(PDOEXCEPTION $e){
            $e->getMessage();
            return false;
       }

    }
    public function user_logout(){
        unset($_SESSION['useronline']);
        session_destroy();
    }
    
}
?>