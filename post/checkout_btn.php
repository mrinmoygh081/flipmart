<?php
session_start();
ob_start();
require_once "../include/db.php";

if(isset($_POST['btn_check'])){
    if(isset($_SESSION['user_id'])){
        if(isset($_SESSION['charge'])){
        header("Location: ../checkout.php");
        }
        else{
            header("Location: ../shopping-cart.php");
        }
    }
    else{
        $_SESSION['after_login'] = 1;
        header("Location: ../sign-in.php");
    }
}
?>