<?php
if(isset($_POST['btn_tags'])){
session_start();
ob_start();
require_once "../include/db.php";
if(isset($_SESSION['user_id'])){
$userid = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['user_id']));
$tags = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['txt_tags']));    
$p_id = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['pro_id']));
print_r($each_tag = explode(" ",$tags));
foreach($each_tag as $values){
    $query = "INSERT INTO tags(pro_id,user_id,tag_name)";
    $query .= "VALUES ('$p_id','$userid','$values')";
    $connection = mysqli_query($db_connection,$query);
 }
header("Location: ../detail.php?id=$p_id");


}
else {
    $_SESSION['after_login'] = 4;
    header("Location: ../sign-in.php");
}
}
?>