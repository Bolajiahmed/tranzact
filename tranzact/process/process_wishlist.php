<?php
session_start();
require_once "../classes/User.php";
require_once "../user_guide.php";

$user = new User;

if (isset($_POST['product']) && isset($_SESSION['useronline'])) {
    $product_id = $_POST['product'];
    $buyerid = $_SESSION['useronline'];

    // Attempt to add to wishlist
    if ($user->add_wishlist($product_id, $buyerid)) {
        $_SESSION['successmsg'] = "Product added to wishlist successfully.";
    } else {
        $_SESSION['errormsg'] = "Failed to add product to wishlist.";
    }
    
    header("location:../wishlist.php"); // Redirect to wishlist page
    exit();
} else {
    $_SESSION['errorlogmsg'] = "Please login to access your profile";
    header("location:../login.php");
    exit();
}
?>