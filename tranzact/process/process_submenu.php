<?php
require_once "../classes/User.php";
$user=new User;
if(isset($_GET['categoryname'])){
    $category_name=$_GET['categoryname'];
    $subcategory=$user->get_subcategory_name($category_name);
    $data="";
    
    foreach($subcategory as $sub){
        $subcategory_name=$sub['Subcategory_name'];
        $subcategory_id=$sub['Subcategory_id'];
        $data.="<li><a class='dropdown-item big-bgbtn' href='#'>$subcategory_name</a></li>";

    }
    echo $data;

}



?>