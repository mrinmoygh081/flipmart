<?php
session_start();
ob_start();
require_once "include/db.php";
require_once "include/header.php";
if(isset($_SESSION['admin_id'])){
echo "<body id='page-top'>";
echo "<div id='wrapper'>";
require_once "include/navbar.php";
echo "<div id='content-wrapper' class='d-flex flex-column'>";
echo "<div id='content'>";
require_once "include/topbar.php";
?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Blank Page</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active" aria-current="page">Blank Page</li>
            </ol>
          </div>

          <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Basic Table</h4>
                                <h6 class="card-subtitle">Add class <code>.table</code></h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>S No.</th>
                                                <th>Product Name</th>
                                                <th>Product Price</th>
                                                <th>Product Quantity</th>
                                                <th>Product Total Price</th>
                                                <th>Product Discount</th>
                                                <th>Subtotal Price</th>
                                                <th>Coupon Discount</th>
                                                <th>Delivery Charge</th>
                                                <th>Total</th>
                                                <th>User Name</th>
                                                <th>User Address</th>
                                                <th>User State</th>
                                                <th>User City</th>
                                                <th>User Zip</th>
                                                <th>User Phone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        if(isset($_GET['oid'])){
                                          $Order_id = $_GET['oid'];

                                        $Query = "SELECT * FROM orders LEFT JOIN delivery ON orders.order_id = delivery.order_id LEFT JOIN order_product ON orders.order_id = order_product.order_id WHERE orders.order_id = $Order_id";
                                        $Connection = mysqli_query($db_connection,$Query);
                                        $i = 1;
                                        while($row = mysqli_fetch_assoc($Connection))
                                        {
                                          $product_id = $row['product_id'];
                                          $query = "SELECT * FROM product WHERE pro_id = '$product_id'";
                                          $connection = mysqli_query($db_connection,$query);
                                          $Row = mysqli_fetch_assoc($connection);
                                          $Product_total_Price = $row["product_price"]*$row["product_quan"];
                                          $Subtotal_Price = $row['total_price']+$row['discount']-$row['delivery_charge'];
                                            

                                            echo "<tr id=".$row['order_id'].">";

                                              echo "<td>".$i++."</td>";
                                              echo "<td>".$Row["pro_name"]."</td>";
                                              echo "<td>".$row["product_price"]."</td>";
                                              echo "<td>".$row["product_quan"]."</td>";
                                              echo "<td>".$Product_total_Price."</td>";
                                              echo "<td>".$Row["pro_disc"]."</td>";
                                              echo "<td>".$Subtotal_Price."</td>";
                                              echo "<td>".$row['discount']."</td>";
                                              echo "<td>".$row['delivery_charge']."</td>";
                                              echo "<td>".$row['total_price']."</td>";
                                              echo "<td>".$row["name"]."</td>";
                                              echo "<td>".$row["address"]."</td>";
                                              echo "<td>".$row["state"]."</td>";
                                              echo "<td>".$row["city"]."</td>";
                                              echo "<td>".$row["zip"]."</td>";
                                              echo "<td>".$row["phone"]."</td>";
                                              
                                            echo "</tr>";
                                        }
                                      }
                                        
                                        ?>
                                            
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                        <button onclick="window.print()">Print this page</button>
                       


        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <?php
require_once "include/footer.php";
?>
<?php
            
          }
          else{
            header("Location: login.php");
          }
            ?>
            