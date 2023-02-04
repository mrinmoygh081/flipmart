<?php
$db_name = "achievex_flipmart";
$db_host = "localhost";
$db_user = "achievex_flipmart";
$db_password = "flipmart";

$db_connection =  mysqli_connect($db_host,$db_user,$db_password,$db_name);

if(!$db_connection){
    die(mysqli_error($db_connection));
}

?>