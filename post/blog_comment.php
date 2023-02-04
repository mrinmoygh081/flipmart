<?php
session_start();
ob_start();
require_once "../include/db.php";
if(isset($_SESSION['user_id'])){
    $userid = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['user_id']));
    if(isset($_POST['cmt_submit'])){
        $name = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['cmt_name']));
        $email = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['cmt_email']));
        $title = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['cmt_title']));
        $comments = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['cmt_comments']));
        $blog_id = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['blog_id']));
        date_default_timezone_set("Asia/Kolkata");
        $date = date("Y-m-d h:i:sa");


        $getQuery = "SELECT * FROM blog_comment WHERE blog_id = '$blog_id' AND user_id = '$userid'";
        $Connection = mysqli_query($db_connection,$getQuery);
        $count = mysqli_num_rows($Connection);

        if($count == 0){

        $query = "INSERT INTO blog_comment(blog_id,user_id,name,comment,email_id,title,date)";
            $query .= "VALUES ('$blog_id','$userid','$name','$comments','$email','$title','$date')";
             $connection = mysqli_query($db_connection,$query);
             if(!$connection){
                 die(mysqli_error($db_connection));
             }
             else{
                 header("Location: ../blog-details.php?blogid=$blog_id");
             }
            }
            else {
                $_SESSION['comment'] = "You have already commented in this blog";
                header("Location: ../blog-details.php?blogid=$blog_id");
            }

    }

}
else{
    $_SESSION['after_login'] = 2;
    header("Location: ../sign-in.php");
}
?>