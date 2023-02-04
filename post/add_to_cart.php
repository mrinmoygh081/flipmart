<?php
session_start();
ob_start();
require_once "../include/db.php";
if(isset($_SESSION['user_id'])){
    $userid = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['user_id']));
    if(isset($_GET['p_id']) && !empty($_GET['p_id'])){
        $p_id = htmlspecialchars(mysqli_real_escape_string($db_connection,$_GET['p_id']));
        if(isset($_GET['p_quan']) && !empty($_GET['p_quan'])){
            $p_quan = htmlspecialchars(mysqli_real_escape_string($db_connection,$_GET['p_quan']));

            $Query = "SELECT * FROM cart WHERE user_id = $userid AND pro_id = $p_id";
            $Connection = mysqli_query($db_connection,$Query);
            $count = mysqli_num_rows($Connection);

            if($count == 0){
            $query = "INSERT INTO cart(user_id,pro_id,pro_quan)";
            $query .= "VALUES ('$userid','$p_id','$p_quan')";
             $connection = mysqli_query($db_connection,$query);
             if(!$connection){
                 die(mysqli_error($db_connection));
             }
             else{
            header("Location: ../detail.php?id=$p_id");
             }
            }
            else {
                $_SESSION['cart_error'] = 1;
                header("Location: ../shopping-cart.php");
                echo "Already in the cart";
            }
        }
        else{
            $p_quan = 1;
            
            $Query = "SELECT * FROM cart WHERE user_id = $userid AND pro_id = $p_id";
            $Connection = mysqli_query($db_connection,$Query);
            $count = mysqli_num_rows($Connection);

            if($count == 0){
            $query = "INSERT INTO cart(user_id,pro_id,pro_quan)";
            $query .= "VALUES ('$userid','$p_id','$p_quan')";
             $connection = mysqli_query($db_connection,$query);
             if(!$connection){
                 die(mysqli_error($db_connection));
             }
             else{
                 if(isset($_SESSION['after_add_to_cart']) && $_SESSION['after_add_to_cart'] == 1){
                    header("Location: ../index.php");
                    unset($_SESSION['after_add_to_cart']);
                 }
                 elseif(isset($_SESSION['after_add_to_cart']) && $_SESSION['after_add_to_cart'] == 2) {
                    $gid = $_SESSION['gid'];
                    header("Location: ../category.php?gid=$gid&page=1&sort=1&show=10");
                    unset($_SESSION['after_add_to_cart']);
                 }
                 elseif(isset($_SESSION['after_add_to_cart']) && $_SESSION['after_add_to_cart'] == 3) {
                    $id = $_SESSION['product_id'];
                    header("Location: ../detail.php?id=$id");
                    unset($_SESSION['after_add_to_cart']);
                    unset($_SESSION['product_id']);
                 }
                 elseif(isset($_SESSION['after_add_to_cart']) && $_SESSION['after_add_to_cart'] == 4){
                    header("Location: ../search.php");
                    unset($_SESSION['after_add_to_cart']);
                 }
             }
            }
            else {
                $_SESSION['cart_error'] = 1;

                header("Location: ../shopping-cart.php");
                echo "Already in the cart";
            }
        }
    }
    
    else{
        $gid = $_SESSION['gid'];
        header("Location: ../category.php?gid=$gid&page=1&sort=1&show=10");
    }
}
else{
if(isset($_GET['p_id']) && !empty($_GET['p_id'])){
    $p_id = htmlspecialchars($_GET['p_id']);
    if(isset($_GET['p_quan']) && !empty($_GET['p_quan'])){
        $p_quan = htmlspecialchars($_GET['p_quan']);
        $_SESSION['cart'][$p_id] = array('p_quan'=>$p_quan);
        header("Location: ../detail.php?id=$p_id");
    }
    else{
        $p_quan = 1;
        $_SESSION['cart'][$p_id] = array('p_quan'=>$p_quan);
        $gid = $_SESSION['gid'];
        //header("Location: ../category.php?gid=$gid&page=1&sort=1&show=10");
        if(isset($_SESSION['after_add_to_cart']) && $_SESSION['after_add_to_cart'] == 1){
            header("Location: ../index.php");
            unset($_SESSION['after_add_to_cart']);
         }
         elseif(isset($_SESSION['after_add_to_cart']) && $_SESSION['after_add_to_cart'] == 2) {
            $gid = $_SESSION['gid'];
            header("Location: ../category.php?gid=$gid&page=1&sort=1&show=10");
            unset($_SESSION['after_add_to_cart']);
         }
         elseif(isset($_SESSION['after_add_to_cart']) && $_SESSION['after_add_to_cart'] == 3) {
            $id = $_SESSION['product_id'];
            header("Location: ../detail.php?id=$id");
            unset($_SESSION['after_add_to_cart']);
            unset($_SESSION['product_id']);
         }
         elseif(isset($_SESSION['after_add_to_cart']) && $_SESSION['after_add_to_cart'] == 4){
            header("Location: ../search.php");
            unset($_SESSION['after_add_to_cart']);
         }
        
    }
}

else{
    $gid = $_SESSION['gid'];
    header("Location: ../category.php?gid=$gid&page=1&sort=1&show=10");
}
}
?>