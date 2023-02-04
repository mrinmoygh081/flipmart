<?php
session_start();
ob_start();
   require_once "include/db.php";
   require_once "include/header.php";
   require_once "include/topbar.php";
   require_once "include/search-area.php";
   require_once "include/dropdown-cart.php";
   require_once "include/navbar.php";
   ?>


<div class="body-content outer-top-xs">
   <div class="container">
      <div class="row ">
         <div class="shopping-cart">
            <div class="shopping-cart-table ">
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>User Name</th>
                           <th>Quality Rating</th>
                           <th>Price Rating</th>
                           <th>Value Rating</th>
                           <th>Review</th>
                           
                        </tr>
                     </thead>
                     <!-- /thead -->
                    
                     <tbody>
                        <?php
                          if(isset($_GET['id'])){
                            $id = $_GET['id'];
                                $Query = "SELECT * FROM review WHERE pro_id = '$id'";
                                  $Connection = mysqli_query($db_connection,$Query);
                                  while($dbrow = mysqli_fetch_assoc($Connection)){
                           ?>
                        <tr>
                           <td ><?php echo ($dbrow['user_name']); ?></td>
                           <td><?php echo ($dbrow['rate_quality']); ?> 
                           </td>
                           <td><?php echo ($dbrow['rate_price']); ?>
                           </td>
                           <td><?php echo ($dbrow['rate_price']); ?>
                           </td>
                           <td><?php echo ($dbrow['review']); ?></td>
                           
                        </tr>
                       
                        
                        <?php
                           }
                           }
                           ?>
                     </tbody>
                     <!-- /tbody -->
                  </table>
                  
                  <!-- /table -->
               </div>
            </div>
            <!-- /.shopping-cart-table -->				
            
            <!-- /.estimate-ship-tax -->
            
            <!-- /.cart-shopping-total -->			
         </div>
         <!-- /.shopping-cart -->
      </div>
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




<?php
   require_once "include/footer.php";
   ?>
</body>
</html>