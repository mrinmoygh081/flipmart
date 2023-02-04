<?php
if(isset($_POST['btn_order'])){
session_start();
ob_start();
require_once "../include/db.php";
$name = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['order_fname']))." ".htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['order_lname']));
$state = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['order_state']));
$address = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['order_address']));
$city = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['order_city']));
$zip = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['order_zip']));
$phone = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['order_phone']));
$payment_method = htmlspecialchars(mysqli_real_escape_string($db_connection,$_POST['optradio']));
$user_id = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['user_id']));
$total_price = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['TOTAL']));
$discount = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['discount']));
$delivery_charge = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['d_charge']));
date_default_timezone_set("Asia/Kolkata");
$order_date = date("Y-m-d h:i:sa");
$Order_date = date("Y-m-d");
$payment_status = htmlspecialchars(mysqli_real_escape_string($db_connection,"Pending"));
date_default_timezone_set("Asia/Kolkata");
$delivery_date = date("Y-m-d",strtotime($Order_date."+7 days"));


$query = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY order_id DESC";
$connection = mysqli_query($db_connection,$query);
$count = mysqli_num_rows($connection);

if($count == 0){
    $p_orderid = 0;
}
else{
    $row = mysqli_fetch_assoc($connection);
    $p_orderid = $row['order_id'];

}
$order_unique_id = $user_id.$p_orderid.rand(100,1000);

$query = "INSERT INTO orders(user_id,total_price,discount,tax,delivery_charge,payment_method,payment_status,order_unique_id,order_date,delivery_status,delivery_date)";
    $query .= "VALUES ('$user_id','$total_price','$discount','0','$delivery_charge','$payment_method','$payment_status','$order_unique_id','$order_date','Pending','$delivery_date')";
    $connection = mysqli_query($db_connection,$query);

    if(!$connection){
        die(mysqli_error($connection));
    
    }
    else {
        $query = "SELECT order_id FROM orders WHERE order_unique_id = '$order_unique_id'";
        $connection = mysqli_query($db_connection,$query);
        $row = mysqli_fetch_assoc($connection);
        $order_id = $row['order_id'];


        $query = "INSERT INTO delivery(order_id,name,state,address,city,zip,phone)";
    $query .= "VALUES ('$order_id','$name','$state','$address','$city','$zip','$phone')";
    $connection = mysqli_query($db_connection,$query);

    if(!$connection){
        die(mysqli_error($db_connection));
    
    }
    else {
        
        if(isset($_SESSION['user_id'])){


            $userid = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['user_id']));
			$Getquery = "SELECT * FROM cart WHERE user_id = '$userid'";
    		$Getconnection = mysqli_query($db_connection,$Getquery);
    		while($row = mysqli_fetch_assoc($Getconnection)){
                $key = $row['pro_id'];
                $Query = "SELECT * FROM product WHERE pro_id = '$key'";
                $Connection = mysqli_query($db_connection,$Query);
                $dbrow = mysqli_fetch_assoc($Connection);
                $product_price = $dbrow['pro_price'];
                $product_quan = $row['pro_quan'];

                $query = "INSERT INTO order_product(product_id,order_id,product_price,product_quan)";
                $query .= "VALUES ('$key','$order_id','$product_price','$product_quan')";
                $connection = mysqli_query($db_connection,$query);

                if(!$connection){
                    die(mysqli_error($db_connection));
                
                }
                else {
                    echo "ok";
                }

            }
        }
        if(isset($_SESSION['user_id'])){
            $userid = htmlspecialchars(mysqli_real_escape_string($db_connection,$_SESSION['user_id']));
            $query_for_delete = "DELETE FROM cart WHERE user_id = '$userid'" ;
            $delete_query =mysqli_query($db_connection,$query_for_delete);
        }
        else {
            unset($_SESSION['cart']);
        }
        unset($_SESSION['subtotal']);
        unset($_SESSION['d_charge']);
        unset($_SESSION['discount']);
        unset($_SESSION['TOTAL']);
        unset($_SESSION['coupon_discount']);
        header("Location: ../My_Orders.php");

    }


    }

}
?>