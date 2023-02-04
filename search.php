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
<div class="breadcrumb">
   <div class="container">
      <div class="breadcrumb-inner">
         <ul class="list-inline list-unstyled">
            <li><a href="#">Home</a></li>
            <li class='active'>Handbags</li>
         </ul>
      </div>
      <!-- /.breadcrumb-inner --> 
   </div>
   <!-- /.container --> 
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
   <div class='container'>
      <div class='row'>
         <div class='col-md-3 sidebar'>
            <!-- ================================== TOP NAVIGATION ================================== -->
            <!-- /.side-menu --> 
            <!-- ================================== TOP NAVIGATION : END ================================== -->
            <!-- /.sidebar-module-container --> 
         </div>
         <!-- /.sidebar -->
         <div class='col-md-9'>
            <!-- ========================================== SECTION – HERO ========================================= -->
           
            
               
                  <!-- /.tab-pane -->
                  <div class="tab-pane "  id="list-container">
                     <div class="category-product">
                        <?php
                           if(isset($_POST['btn_search'])) {
                              $key = $_POST['search_txt'];
                              $_SESSION['text'] = $key;
                              $query =  "SELECT * FROM product WHERE pro_name LIKE '%$key%' OR pro_description LIKE '%$key%' ORDER BY pro_id DESC";
                              $Connection = mysqli_query($db_connection,$query);
                           while($row = mysqli_fetch_assoc($Connection))
                           {
                           
                             ?>
                        <div class="category-product-inner wow fadeInUp">
                           <div class="products">
                              <div class="product-list product">
                                 <div class="row product-list-row">
                                    <div class="col col-sm-4 col-lg-4">
                                       <div class="product-image">
                                          <div class="image"> <img src="admin/img/<?php echo($row['pro_image']); ?>" alt=""> </div>
                                       </div>
                                       <!-- /.product-image --> 
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-sm-8 col-lg-8">
                                       <div class="product-info">
                                          <h3 class="name"><a href="detail.php?id=<?php echo($row['pro_id']); ?>"><?php echo($row['pro_name']); ?></a></h3>
                                          <div class="rating rateit-small"></div>
                                          <div class="product-price"> <span class="price">  <?php echo("$ ".($row['pro_price']-(($row['pro_disc']/100)*$row['pro_price']))); ?> </span> <span class="price-before-discount"><?php echo("$ ".$row['pro_price']); ?></span> </div>
                                          <!-- /.product-price -->
                                          <div class="description m-t-10"><?php echo($row['pro_description']); ?></div>
                                          <div class="cart clearfix animate-effect">
                                             <div class="action">
                                                <ul class="list-unstyled">
                                                   <li class="add-cart-button btn-group">
                                                      <a data-toggle="tooltip" href ="post/add_to_cart.php?p_id=<?php
                                                         $_SESSION['after_add_to_cart'] = 4;
                                                          echo ($row['pro_id']);
                                                          ?>" class="btn btn-primary icon" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                   </li>
                                                   <li class="lnk wishlist"> <a class="add-to-cart" href="post/add_to_wishlist.php?p_id=<?php 
                                                      echo ($row['pro_id']);
                                                      $_SESSION['after_add_to_wishlist'] = 4;
                                                      ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                   <li class="lnk"> <a class="add-to-cart" href="post/add_to_compare.php?p_id=<?php
                                                      $_SESSION['after_add_to_compare'] = 4;
                                                       echo ($row['pro_id']);
                                                       ?>" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                                </ul>
                                             </div>
                                             <!-- /.action --> 
                                          </div>
                                          <!-- /.cart --> 
                                       </div>
                                       <!-- /.product-info --> 
                                    </div>
                                    <!-- /.col --> 
                                 </div>
                                 <!-- /.product-list-row -->
                                 
                              </div>
                              <!-- /.product-list --> 
                           </div>
                           <!-- /.products --> 
                        </div>
                        <!-- /.category-product-inner -->
                        <?php
                           }  
                           }     
                           elseif(isset($_SESSION['text'])){
                            $key = $_SESSION['text'];
                           $query =  "SELECT * FROM product WHERE pro_name LIKE '%$key%' OR pro_description LIKE '%$key%' ORDER BY pro_id DESC";
                           $Connection = mysqli_query($db_connection,$query);
                           while($row = mysqli_fetch_assoc($Connection))
                           {
                              
                              ?>
                        <div class="category-product-inner wow fadeInUp">
                           <div class="products">
                              <div class="product-list product">
                                 <div class="row product-list-row">
                                    <div class="col col-sm-4 col-lg-4">
                                       <div class="product-image">
                                          <div class="image"> <img src="admin/img/<?php echo($row['pro_image']); ?>" alt=""> </div>
                                       </div>
                                       <!-- /.product-image --> 
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-sm-8 col-lg-8">
                                       <div class="product-info">
                                          <h3 class="name"><a href="detail.php?id=<?php echo($row['pro_id']); ?>"><?php echo($row['pro_name']); ?></a></h3>
                                          <div class="rating rateit-small"></div>
                                          <div class="product-price"> <span class="price">  <?php echo("$ ".($row['pro_price']-(($row['pro_disc']/100)*$row['pro_price']))); ?> </span> <span class="price-before-discount"><?php echo("$ ".$row['pro_price']); ?></span> </div>
                                          <!-- /.product-price -->
                                          <div class="description m-t-10"><?php echo($row['pro_description']); ?></div>
                                          <div class="cart clearfix animate-effect">
                                             <div class="action">
                                                <ul class="list-unstyled">
                                                   <li class="add-cart-button btn-group">
                                                      <a data-toggle="tooltip" href ="post/add_to_cart.php?p_id=<?php
                                                         $_SESSION['after_add_to_cart'] = 4;
                                                          echo ($row['pro_id']);
                                                          ?>" class="btn btn-primary icon" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                   </li>
                                                   <li class="lnk wishlist"> <a class="add-to-cart" href="post/add_to_wishlist.php?p_id=<?php 
                                                      echo ($row['pro_id']);
                                                      $_SESSION['after_add_to_wishlist'] = 4;
                                                      ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                   <li class="lnk"> <a class="add-to-cart" href="post/add_to_compare.php?p_id=<?php
                                                      $_SESSION['after_add_to_compare'] = 4;
                                                       echo ($row['pro_id']);
                                                       ?>" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                                </ul>
                                             </div>
                                             <!-- /.action --> 
                                          </div>
                                          <!-- /.cart --> 
                                       </div>
                                       <!-- /.product-info --> 
                                    </div>
                                    <!-- /.col --> 
                                 </div>
                                 <!-- /.product-list-row -->
                                 <div class="tag new"><span>new</span></div>
                              </div>
                              <!-- /.product-list --> 
                           </div>
                           <!-- /.products --> 
                        </div>
                        <?php
                           }
                           }
                           
                           ?>
                     </div>
                     <!-- /.category-product --> 
                  </div>
                  <!-- /.tab-pane #list-container --> 
              
               <!-- /.tab-content -->
               <!-- /.filters-container --> 
            
            <!-- /.search-result-container --> 
         </div>
         <!-- /.col --> 
      </div>
      <!-- /.row --> 
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
      <div id="brands-carousel" class="logo-slider wow fadeInUp">
         <div class="logo-slider-inner">
            <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
               <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
               <!--/.item-->
               <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
               <!--/.item-->
               <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt=""> </a> </div>
               <!--/.item-->
               <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
               <!--/.item-->
               <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
               <!--/.item-->
               <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt=""> </a> </div>
               <!--/.item-->
               <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
               <!--/.item-->
               <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
               <!--/.item-->
               <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
               <!--/.item-->
               <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
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