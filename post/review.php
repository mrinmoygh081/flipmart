<?php
if(isset($_POST['submit_review'])){
session_start();
ob_start();
require_once "../include/db.php";
if(isset($_SESSION['user_id'])){
    $userid = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['user_id']));
    $product_id = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['pro_id']));
    $review = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['review']));
    $rateQuality = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['quality']));
    $ratePrice = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['price']));
    $rateValue = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['value']));
    $User_name = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['name']));
    $Summary = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['summary']));
    $Query = "SELECT * FROM orders LEFT JOIN order_product ON orders.order_id = order_product.order_id WHERE orders.user_id = '$userid' AND order_product.product_id = '$product_id'";
    $Connection = mysqli_query($db_connection,$Query);
    $count = mysqli_num_rows($Connection);

    if($count == 0){
        echo "You cannot review until you place order this item once.";
        
    }
    else {
        $query = "INSERT INTO review(user_id,pro_id,rate_quality,rate_price,rate_value,user_name,summary,review)";
        $query .= "VALUES ('$userid','$product_id','$rateQuality','$ratePrice','$rateValue','$User_name','$Summary','$review')";
        $connection = mysqli_query($db_connection,$query);
        if(!$connection){
            die(mysqli_error($db_connection));
        }
        else{
       header("Location: ../detail.php?id=$product_id");
        }
        
    }

}
else {
    $_SESSION['after_login'] = 4;
    header("Location: ../sign-in.php");
}
}
?>