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
                     <!-- /thead -->
                     
                     <tbody>
                     <?php
                     $userid = $_SESSION['user_id'];
                                        $Query = "SELECT * FROM orders LEFT JOIN delivery ON orders.order_id = delivery.order_id WHERE orders.user_id = $userid ORDER BY orders.order_id DESC";
                                        $Connection = mysqli_query($db_connection,$Query);
                                        $i = 1;
                                        while($row = mysqli_fetch_assoc($Connection))
                                        {

                                            echo "<tr id=".$row['order_id'].">";

                                              
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
                     <!-- /tbody -->
                  </table>
                  
                  <!-- /table -->
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
