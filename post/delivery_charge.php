<?php
session_start();
ob_start();
require_once "../include/db.php";
if(isset($_POST['btn_estimate'])){
    $country = htmlspecialchars($_POST['estimate_country']);
    $charge = htmlspecialchars($_POST['estimate_state']);
    $zip = htmlspecialchars($_POST['estimate_zip']);
    if(isset($_SESSION['TOTAL'])){
        $total = $_SESSION['TOTAL'];
        if($total < 1000){
            $_SESSION['charge'] = $charge;
            header("Location: ../shopping-cart.php");
        }
        else{
            $_SESSION['charge'] = 0;
            header("Location: ../shopping-cart.php");
        }
    }
   

}
?>