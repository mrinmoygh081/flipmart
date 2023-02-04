<?php
session_start();
ob_start();
require_once "../include/db.php";
if(isset($_POST['btn_update'])){
if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $key=>$value){
        echo $pro_quan = $_POST[$key];

        $_SESSION['cart'][$key] = array('p_quan'=>($pro_quan));
        header("Location: ../shopping-cart.php");
    }
}
elseif(isset($_SESSION['user_id'])){
    $userid = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['user_id']));
    $query = "SELECT * FROM cart WHERE user_id = '$userid'";
    $connection = mysqli_query($db_connection,$query);
    while($row = mysqli_fetch_assoc($connection)){
    
        $product_id = $row['pro_id'];
        echo $pro_quan = $_POST[$product_id];

        $query_of_update = "UPDATE cart SET pro_quan = '{$pro_quan}' WHERE user_id = '$userid' AND pro_id = '$product_id'";
        $Connection = mysqli_query($db_connection,$query_of_update);
        header("Location: ../shopping-cart.php");
                }
            }
        }
?>