<?php
session_start();
ob_start();
require_once "../include/db.php";
if(isset($_POST['btn_coupon'])){
    $Coupon = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['txt_coupon']));
    $query = "SELECT * FROM coupon WHERE coupon = '$Coupon'";
    $connection = mysqli_query($db_connection,$query);
    $row = mysqli_fetch_assoc($connection);
    $count = mysqli_num_rows($connection);
    if($count == 1){
        $_SESSION['coupon_discount'] = $row['coupon_price'];
        header("Location: ../shopping-cart.php");
    }
    else{
        $_SESSION['coupon_error'] = "Coupon not Matched";
        header("Location: ../shopping-cart.php");
    }
}
?>