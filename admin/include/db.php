<?php
$db_name = "achievex_flipmart";
$db_host = "localhost";
$db_user = "achievex_flipmart";
$db_password = "flipmart";

$db_connection =  mysqli_connect($db_host,$db_user,$db_password,$db_name);

// if($connection){
//     echo "Successfully connected";
// }else{
//     die(mysqli_error($connection));
// }

if(!$db_connection){
    die(mysqli_error($db_connection));
}

?>