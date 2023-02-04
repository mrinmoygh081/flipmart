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
                                                <th>Order Unique ID</th>
                                                <th>Order By</th>
                                                <th>Total Price</th>
                                                <th>Discount</th>
                                                <th>Tax</th>
                                                <th>Delivery Charge</th>
                                                <th>Payment Method</th>
                                                <th>Payment Status</th>
                                                <th>Order Date</th>
                                                <th>Delivery Status</th>
                                                <th>Delivery Date</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $Query = "SELECT * FROM orders LEFT JOIN delivery ON orders.order_id = delivery.order_id ORDER BY orders.order_id DESC";
                                        $Connection = mysqli_query($db_connection,$Query);
                                        $i = 1;
                                        while($row = mysqli_fetch_assoc($Connection))
                                        {
                                            
                                            
                                            echo "<tr id=".$row['order_id'].">";

                                              echo "<td>".$i++."</td>";
                                              echo "<td>".$row["order_unique_id"]."</td>";
                                              echo "<td>".$row["name"]."</td>";
                                              echo "<td>".$row["total_price"]."</td>";
                                              echo "<td>".$row["discount"]."</td>";
                                              echo "<td>".$row["tax"]."</td>";
                                              echo "<td>".$row["delivery_charge"]."</td>";
                                              echo "<td>".$row["payment_method"]."</td>";
                                              echo "<td>".$row["payment_status"]."</td>";
                                              echo "<td>".$row["order_date"]."</td>";
                                              echo "<td>".$row["delivery_status"]."</td>";
                                              echo "<td>".$row["delivery_date"]."</td>";
                                              echo "<td><a href='view.php?oid=".$row["order_id"]."'>View</a></td>";
                                              
                                            echo "</tr>";
                                        }
                                        
                                        ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                       


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
            