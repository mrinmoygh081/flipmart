<?php
session_start();
ob_start();
   require_once "include/db.php";
   require_once "include/header.php";
   require_once "include/topbar.php";
   require_once "include/search-area.php";
   require_once "include/dropdown-cart.php";
   require_once "include/navbar.php";
   $subtotal = 0;
   ?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
   <div class="container">
      <div class="breadcrumb-inner">
         <ul class="list-inline list-unstyled">
            <li><a href="#">Home</a></li>
            <li class='active'>Shopping Cart</li>
         </ul>
      </div>
      <!-- /.breadcrumb-inner -->
   </div>
   <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
   <div class="container">
      
         
            
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
            <!-- /.shopping-cart-table -->				
           
            <!-- /.cart-shopping-total -->			
        
         <!-- /.shopping-cart -->
      
      <!-- /.row -->
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
      <div id="brands-carousel" class="logo-slider wow fadeInUp">
         <div class="logo-slider-inner">
            <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
               <div class="item m-t-15">
                  <a href="#" class="image">
                  <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                  </a>	
               </div>
               <!--/.item-->
               <div class="item m-t-10">
                  <a href="#" class="image">
                  <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                  </a>	
               </div>
               <!--/.item-->
               <div class="item">
                  <a href="#" class="image">
                  <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
                  </a>	
               </div>
               <!--/.item-->
               <div class="item">
                  <a href="#" class="image">
                  <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                  </a>	
               </div>
               <!--/.item-->
               <div class="item">
                  <a href="#" class="image">
                  <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                  </a>	
               </div>
               <!--/.item-->
               <div class="item">
                  <a href="#" class="image">
                  <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
                  </a>	
               </div>
               <!--/.item-->
               <div class="item">
                  <a href="#" class="image">
                  <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                  </a>	
               </div>
               <!--/.item-->
               <div class="item">
                  <a href="#" class="image">
                  <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                  </a>	
               </div>
               <!--/.item-->
               <div class="item">
                  <a href="#" class="image">
                  <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                  </a>	
               </div>
               <!--/.item-->
               <div class="item">
                  <a href="#" class="image">
                  <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                  </a>	
               </div>
               <!--/.item-->
            </div>
            <!-- /.owl-carousel #logo-slider -->
         </div>
         <!-- /.logo-slider-inner -->
      </div>
      <!-- /.logo-slider -->
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
   </div>
   <!-- /.container -->
</div>
<!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
<?php
   require_once "include/footer.php";
   ?>
</body>
</html>
