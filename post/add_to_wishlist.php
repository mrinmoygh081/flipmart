<?php
session_start();
ob_start();
require_once "../include/db.php";
if(isset($_SESSION['user_id'])){
    $userid = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['user_id']));
    if(isset($_GET['p_id']) && !empty($_GET['p_id'])){
        $p_id = htmlspecialchars(mysqli_real_escape_string($db_connection,$_GET['p_id']));
            
            $Query = "SELECT * FROM wishlist WHERE user_id = $userid AND pro_id = $p_id";
            $Connection = mysqli_query($db_connection,$Query);
            $count = mysqli_num_rows($Connection);

            if($count == 0){
            $query = "INSERT INTO wishlist(user_id,pro_id)";
            $query .= "VALUES ('$userid','$p_id')";
             $connection = mysqli_query($db_connection,$query);
             if(!$connection){
                 die(mysqli_error($db_connection));
             }
             else{
                if(isset($_SESSION['after_add_to_wishlist']) && $_SESSION['after_add_to_wishlist'] == 1){
                    header("Location: ../index.php");
                    unset($_SESSION['after_add_to_wishlist']);
                 }
                 elseif(isset($_SESSION['after_add_to_wishlist']) && $_SESSION['after_add_to_wishlist'] == 2) {
                    $gid = $_SESSION['gid'];
                    header("Location: ../category.php.php?gid=$gid&page=1&sort=1&show=10");
                    unset($_SESSION['after_add_to_wishlist']);
                 }
                 elseif(isset($_SESSION['after_add_to_wishlist']) && $_SESSION['after_add_to_wishlist'] == 3) {
                    $id = $_SESSION['product_id'];
                    header("Location: ../detail.php?id=$id");
                    unset($_SESSION['after_add_to_wishlist']);
                    unset($_SESSION['product_id']);
                 }
                 elseif(isset($_SESSION['after_add_to_wishlist']) && $_SESSION['after_add_to_wishlist'] == 4){
                    header("Location: ../search.php");
                    unset($_SESSION['after_add_to_wishlist']);
                 }
             }
            }
            else {
                $_SESSION['wishlist'] = 1;
                header("Location: ../my-wishlist.php");
                echo "Already in the wishlist";
            }
        
    }
    
    else{
        $gid = $_SESSION['gid'];
        header("Location: ../category.php.php?gid=$gid&page=1&sort=1&show=10");
    }
}
else{
    $_SESSION['after_login'] = 2;
    header("Location: ../sign-in.php");
}
?>