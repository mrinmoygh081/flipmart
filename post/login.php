<?php
require_once "../include/db.php";
session_start();
ob_start();
if(isset($_POST['login_submit'])){
    if(!empty($_POST['user_email'])&& !empty($_POST['user_pass'])){
        $useremail = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['user_email']));
        $userPassword = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['user_pass']));
        $query = "SELECT * FROM register WHERE user_email = '$useremail'";
        $connection = mysqli_query($db_connection,$query);
        $count = mysqli_num_rows($connection);
        if($count == 1){
            $row = mysqli_fetch_assoc($connection);
            $db_pass = $row['user_password'];
            if($userPassword == $db_pass){
               
               $user_id = $row['user_id'];
               $Query = "UPDATE register SET login_time = NOW() WHERE user_id = '$user_id'";
               $Connection = mysqli_query($db_connection,$Query);
               if(!$Connection){
                   die(mysqli_error($Connection));
               }
               else{
                if(isset($_SESSION['cart'])){
                    foreach($_SESSION['cart'] as $key=>$value){
                        $p_quan = htmlspecialchars(mysqli_real_escape_string($db_connection,$value['p_quan']));
                        $query = "INSERT INTO cart(user_id,pro_id,pro_quan)";
                        $query .= "VALUES ('$user_id','$key','$p_quan')";
                        $connection = mysqli_query($db_connection,$query);
                    }
                }
                $_SESSION['time'] = $row['login_time'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
                unset($_SESSION['login_error']);
                unset($_SESSION['cart']);
                if(isset($_SESSION['after_login']) && $_SESSION['after_login'] == 1){
                    header("Location: ../shopping-cart.php");
                    unset($_SESSION['after_login']);
                }
                elseif(isset($_SESSION['after_login']) && $_SESSION['after_login'] == 2){
                    header("Location: ../my-wishlist.php");
                    unset($_SESSION['after_login']);
                }elseif(isset($_SESSION['after_login']) && $_SESSION['after_login'] == 3){
                    header("Location: ../product-comparison.php");
                    unset($_SESSION['after_login']);
                }
                elseif(isset($_SESSION['after_login']) && $_SESSION['after_login'] == 4){
                    $id = $_SESSION['product_id'];
                    header("Location: ../detail.php?id=$id");
                    unset($_SESSION['after_login']);
                }
                else {
                    header("Location: ../index.php");
                }
                    
               
               }
               

            }
            else{
             echo $_SESSION['login_error'] = "Please check your password";
        header("Location: ../sign-in.php");
            }
        }
        else{
           echo $_SESSION['login_error'] = "Please register yourself";
        header("Location: ../sign-in.php");
        }
    }
    else{
       echo $_SESSION['login_error'] = "Please fill all the field";
        header("Location: ../sign-in.php");
    }
}
?>