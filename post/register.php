<?php
require_once "../include/db.php";
session_start();
ob_start();

if(isset($_POST['signup_btn'])){
    $UserName = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['name']));
    $UserEmail = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['email']));
    $UserPhone = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['phone']));
    $UserGender = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['gender']));
    $UserPassword = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['password']));
    $User_confirm_Password = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['confirm_password']));

    if(strlen($UserPassword) >= 6){
    if($UserPassword == $User_confirm_Password){
        $getQuery = "SELECT * FROM register WHERE user_email = '$UserEmail'";
        $connection = mysqli_query($db_connection,$getQuery);
        $count = mysqli_num_rows($connection);
        if($count == 0){
            $_SESSION['UserName'] = $UserName;
            $_SESSION['UserEmail'] = $UserEmail;
            $_SESSION['UserPhone'] = $UserPhone;
            $_SESSION['UserGender'] = $UserGender;
            $_SESSION['confirm_password'] = $User_confirm_Password;
            $_SESSION['code'] = 12345;
            unset($_SESSION['Register_error']);
               header("Location: ../verification.php");
        }
        else{
            echo $_SESSION['Register_error'] = "You are already registered";
             header("Location: ../sign-in.php");
        }
    }
    else{
        $_SESSION['Register_error'] = "Password Not Matched";
        header("Location: ../sign-in.php");
    } 
}
else{
    $_SESSION['Register_error'] = "Password should be greater than 6";
    header("Location: ../sign-in.php");
}
}
elseif(isset($_POST['btn_verify'])){
    $code = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['code']));
    $Username = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['UserName']));
    $Useremail = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['UserEmail']));
    $UserPhone = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['UserPhone']));
    $UserGender = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['UserGender']));
    $password = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['confirm_password']));
    $Date = date("Y-m-d h:i:s");
    if($code == $_SESSION['code']){
        unset($_SESSION['code_error']);
        $query = "INSERT INTO register(user_name,user_email,user_phone,gender,user_password,login_time,logout_time)";
        $query .= "VALUES ('$Username','$Useremail','$UserPhone','$UserGender','$password','$Date','0')";
             $connection = mysqli_query($db_connection,$query);
             if(!$connection){
                 die(mysqli_error($connection));
             }
             else{
                $_SESSION['user_name'] = $Username;
                 $query = "SELECT * FROM register WHERE user_email = '$Useremail'";
        $connection = mysqli_query($db_connection,$query);
        $row = mysqli_fetch_assoc($connection);
        $_SESSION['user_id'] = $row['user_id'];
             header("Location: ../index.php");
             }
    }
    else{
        $_SESSION['code_error'] = "Code not matched";
        header("Location: ../verification.php");
    }
}
?>