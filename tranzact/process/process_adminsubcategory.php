<?php
require_once "../admin/classes/Admin.php";
$user=new Admin;
if(isset($_GET['categoryid'])){
    $categoryid=$_GET['categoryid'];
    $subcategory=$user->get_subcategory($categoryid);

    $data="<option value=''>please select a category</option>";

    foreach($subcategory as $sub){
        $subcategory_name=$sub['Subcategory_name'];
        $subcategory_id=$sub['Subcategory_id'];
        $data=$data."<option value='$subcategory_id'>$subcategory_name</option>";

    }
    echo $data;

}



?>