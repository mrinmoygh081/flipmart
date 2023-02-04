<?php
session_start();
ob_start();
   require_once "include/db.php";
   require_once "include/header.php";
   require_once "include/topbar.php";
   require_once "include/search-area.php";
   require_once "include/dropdown-cart.php";
   require_once "include/navbar.php";
   $k =120;
   ?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
   <div class="container">
      <div class="row">
         <!-- ============================================== SIDEBAR ============================================== -->
         <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
            <!-- ================================== TOP NAVIGATION ================================== -->
            <div class="side-menu animate-dropdown outer-bottom-xs">
               <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
               <nav class="yamm megamenu-horizontal">
                  <ul class="nav">
                     <?php
                        $Query = "SELECT * FROM category";
                        $Connection = mysqli_query($db_connection,$Query);
                        while($row = mysqli_fetch_assoc($Connection))
                        {
                        ?>
                     <li class="dropdown menu-item">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-<?php echo($row['cat_logo']); ?>" aria-hidden="true"></i><?php echo($row['cat_name']); ?></a>
                        <ul class="dropdown-menu mega-menu">
                           <li class="yamm-content">
                              <div class="row">
                                 <?php
                                    $id = $row['cat_id'];
                                    $query = "SELECT * FROM sub_category WHERE cat_id = $id";
                                    $connection = mysqli_query($db_connection,$query);
                                    while($Row = mysqli_fetch_assoc($connection))
                                    {
                                    ?>
                                 <div class="col-sm-12 col-md-3">
                                    <h2 class="title"><?php echo($Row['sub_name']); ?></h2>
                                    <?php
                                       $gid = $Row['sub_id'];
                                       $gquery = "SELECT * FROM groups WHERE sub_id = $gid";
                                       $gconnection = mysqli_query($db_connection,$gquery);
                                       while($gRow = mysqli_fetch_assoc($gconnection))
                                       {
                                       ?>
                                    <ul class="links">
                                       <li><a href="category.php?gid=<?php $_SESSION['gid'] = $gRow['group_id']; echo($gRow['group_id']); ?>&page=1&sort=1&show=10"><?php echo($gRow['group_name']); ?></a></li>
                                    </ul>
                                    <?php
                                       }
                                       ?>
                                 </div>
                                 <!-- /.col -->
                                 <?php
                                    }
                                    ?> 
                                 <!-- /.col --> 
                              </div>
                              <!-- /.row --> 
                           </li>
                           <!-- /.yamm-content -->
                        </ul>
                        <!-- /.dropdown-menu --> 
                     </li>
                     <!-- /.menu-item -->
                     <?php
                        }
                        ?>
                  </ul>
                  <!-- /.nav --> 
               </nav>
               <!-- /.megamenu-horizontal --> 
            </div>
            <!-- /.side-menu --> 
            <!-- ================================== TOP NAVIGATION : END ================================== --> 
            <!-- ============================================== HOT DEALS ============================================== -->
            <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
               <h3 class="section-title">hot deals</h3>
               <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                  <?php
                     $query = "SELECT * FROM product ORDER BY pro_disc DESC LIMIT 3";
                     $connection = mysqli_query($db_connection,$query);
                     while($Row = mysqli_fetch_assoc($connection))
                     {
                     
                     ?>
                  <div class="item">
                     <div class="products">
                        <div class="hot-deal-wrapper">
                           <div class="image"> <img src="admin/img/<?php echo($Row['pro_image']); ?>" alt=""> </div>
                           <div class="sale-offer-tag"><span><?php echo($Row['pro_disc']); ?>%<br>
                              off</span>
                           </div>
                           <div class="timing-wrapper">
                              <div class="box-wrapper">
                                 <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                              </div>
                              <div class="box-wrapper">
                                 <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                              </div>
                              <div class="box-wrapper">
                                 <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                              </div>
                              <div class="box-wrapper hidden-md">
                                 <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                              </div>
                           </div>
                        </div>
                        <!-- /.hot-deal-wrapper -->
                        <div class="product-info text-left m-t-20">
                           <h3 class="name"><a href="detail.php?id=<?php echo($Row['pro_id']); ?>"><?php echo($Row['pro_name']); ?></a></h3>
                           <div class="rating rateit-small"></div>
                           <div class="product-price"> <span class="price"> <?php echo("$ ".($Row['pro_price']-(($Row['pro_disc']/100)*$Row['pro_price']))); ?> </span> <span class="price-before-discount"><?php echo("$ ".$Row['pro_price']); ?></span> </div>
                           <!-- /.product-price --> 
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                           <div class="action">
                              <div class="add-cart-button btn-group">
                              <form action = "post/add_to_cart.php" method = "GET">
                                 <button class="btn btn-primary icon" data-toggle="dropdown" type="submit"> <i class="fa fa-shopping-cart"></i> </button>
                                 <input type = "hidden" name = "p_id" value = "<?php $_SESSION['after_add_to_cart'] = 1; echo ($Row['pro_id']); ?>">
                                 
                                 <button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
                                 </form>
                              </div>
                           </div>
                           <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                     </div>
                  </div>
                  <?php
                     }
                     ?>
               </div>
               <!-- /.sidebar-widget --> 
            </div>
            <!-- ============================================== HOT DEALS: END ============================================== --> 
            <!-- ============================================== SPECIAL OFFER ============================================== -->
            <div class="sidebar-widget outer-bottom-small wow fadeInUp">
               <h3 class="section-title">Special Offer</h3>
               <div class="sidebar-widget-body outer-top-xs">
                  <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">




                  
                     <div class="item">
                        <div class="products special-product">
                           <div class="product">
                           <?php
                           
                     $query = "SELECT * FROM product ORDER BY pro_price DESC LIMIT 3";
                     $connection = mysqli_query($db_connection,$query);
                     while($Row = mysqli_fetch_assoc($connection))
                     {
                     
                     ?>


                              <div class="product-micro">
                                 <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                       <div class="product-image">
                                          <div class="image"> <a href="#"> <img src="admin/img/<?php echo($Row['pro_image']); ?>" alt=""> </a> </div>
                                          <!-- /.image --> 
                                       </div>
                                       <!-- /.product-image --> 
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-xs-7">
                                       <div class="product-info">
                                          <h3 class="name"><a href="detail.php?id=<?php echo($Row['pro_id']); ?>"><?php echo($Row['pro_name']); ?></a></h3>
                                          <div class="rating rateit-small"></div>
                                          <div class="product-price"> <span class="price"> <?php echo("$ ".$Row['pro_price']); ?> </span> </div>
                                          <!-- /.product-price --> 
                                       </div>
                                    </div>
                                    <!-- /.col --> 
                                 </div>
                                 <!-- /.product-micro-row --> 
                              </div>
                              <!-- /.product-micro --> 
                              
<?php } ?>


                           </div>
                        </div>
                     </div>





                  </div>
               </div>
               <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
            <!-- ============================================== PRODUCT TAGS ============================================== -->
            <div class="sidebar-widget product-tag wow fadeInUp">
               <h3 class="section-title">Product tags</h3>
               <div class="sidebar-widget-body outer-top-xs">
                  <div class="tag-list"> 

<?php
                  $query = "SELECT tag_name FROM tags UNION SELECT tag_name FROM tags ORDER BY RAND()";
          $connection = mysqli_query($db_connection,$query);
          while($row = mysqli_fetch_assoc($connection)){
          ?>

                  <a class="item" title="Phone" href="tag_list.php?tag=<?php echo($row['tag_name']); ?>"><?php echo($row['tag_name']); ?></a> 
                  
             <?php
          }
          ?>     
                  
                  
                  </div>
                  <!-- /.tag-list --> 
               </div>
               <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== PRODUCT TAGS : END ============================================== --> 
            <!-- ============================================== SPECIAL DEALS ============================================== -->
            <div class="sidebar-widget outer-bottom-small wow fadeInUp">
               <h3 class="section-title">Special Deals</h3>
               <div class="sidebar-widget-body outer-top-xs">
                  <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

                 

                     <div class="item">
                        <div class="products special-product">
                        <?php
                  $query = "SELECT * FROM deals ORDER BY RAND()";
                  $connection = mysqli_query($db_connection,$query);
                  while($row = mysqli_fetch_assoc($connection)){
                     $pro_id = $row['pro_id'];
                     $Query = "SELECT * FROM product WHERE pro_id = $pro_id";
                     $Connection = mysqli_query($db_connection,$Query);
                     $Row = mysqli_fetch_assoc($Connection);

          ?>

                           <div class="product">
                              <div class="product-micro">
                                 <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                       <div class="product-image">
                                          <div class="image"> <a href="detail.php?id=<?php echo($Row['pro_id']); ?>"> <img src="admin/img/<?php echo($Row['pro_image']); ?>"  alt=""> </a> </div>
                                          <!-- /.image --> 
                                       </div>
                                       <!-- /.product-image --> 
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-xs-7">
                                       <div class="product-info">
                                          <h3 class="name"><a href="detail.php?id=<?php echo($Row['pro_id']); ?>"><?php echo($Row['pro_name']); ?></a></h3>
                                          <div class="rating rateit-small"></div>
                                          <div class="product-price"> <span class="price"> <?php echo("$ ".$Row['pro_price']); ?> </span> </div>
                                          <div class="product-price"> <span class="price"> <?php echo($row['deal']); ?> </span> </div>
                                          <!-- /.product-price --> 
                                       </div>
                                    </div>
                                    <!-- /.col --> 
                                 </div>
                                 <!-- /.product-micro-row --> 
                              </div>
                              <!-- /.product-micro --> 
                           </div>

<?php
                  }
                  ?>
                        </div>
                     </div>
                     



                  </div>
               </div>
               <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
            <!-- ============================================== NEWSLETTER ============================================== -->
            <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
               <h3 class="section-title">Newsletters</h3>
               <div class="sidebar-widget-body outer-top-xs">
                  <p>Sign Up for Our Newsletter!</p>
                  <form>
                     <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                     </div>
                     <button class="btn btn-primary">Subscribe</button>
                  </form>
               </div>
               <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== NEWSLETTER: END ============================================== --> 
            <!-- ============================================== Testimonials============================================== -->
            <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
               <div id="advertisement" class="advertisement">
                  <div class="item">
                     <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
                     <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                     <div class="clients_author">John Doe <span>Abc Company</span> </div>
                     <!-- /.container-fluid --> 
                  </div>
                  <!-- /.item -->
                  <div class="item">
                     <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
                     <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                     <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                  </div>
                  <!-- /.item -->
                  <div class="item">
                     <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
                     <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                     <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                     <!-- /.container-fluid --> 
                  </div>
                  <!-- /.item --> 
               </div>
               <!-- /.owl-carousel --> 
            </div>
            <!-- ============================================== Testimonials: END ============================================== -->
            <div class="home-banner"> <img src="assets/images/banners/LHS-banner.jpg" alt="Image"> </div>
         </div>
         <!-- /.sidemenu-holder --> 
         <!-- ============================================== SIDEBAR : END ============================================== --> 
         <!-- ============================================== CONTENT ============================================== -->
         <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
            <!-- ========================================== SECTION – HERO ========================================= -->
            <div id="hero">
               <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                  <?php
                     $Query = "SELECT * FROM slider";
                     $Connection = mysqli_query($db_connection,$Query);
                     while($row = mysqli_fetch_assoc($Connection))
                     {
                     ?>
                  <div class="item" style="background-image: url(<?php echo ("admin/img/".$row['slider_image']); ?>);">
                     <div class="container-fluid">
                        <div class="caption bg-color vertical-center text-left">
                           <div class="big-text fadeInDown-1"> <?php echo ($row['slider_heading']); ?> </div>
                           <div class="excerpt fadeInDown-2 hidden-xs"> <span><?php echo ($row['slider_content']); ?></span> </div>
                           <div class="button-holder fadeInDown-3"> <a href="category.php" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                        </div>
                        <!-- /.caption --> 
                     </div>
                     <!-- /.container-fluid --> 
                  </div>
                  <!-- /.item -->
                  <?php
                     }
                     ?>
               </div>
               <!-- /.owl-carousel --> 
            </div>
            <!-- ========================================= SECTION – HERO : END ========================================= --> 
            <!-- ============================================== INFO BOXES ============================================== -->
            <div class="info-boxes wow fadeInUp">
               <div class="info-boxes-inner">
                  <div class="row">
                     <div class="col-md-6 col-sm-4 col-lg-4">
                        <div class="info-box">
                           <div class="row">
                              <div class="col-xs-12">
                                 <h4 class="info-box-heading green">money back</h4>
                              </div>
                           </div>
                           <h6 class="text">30 Days Money Back Guarantee</h6>
                        </div>
                     </div>
                     <!-- .col -->
                     <div class="hidden-md col-sm-4 col-lg-4">
                        <div class="info-box">
                           <div class="row">
                              <div class="col-xs-12">
                                 <h4 class="info-box-heading green">free shipping</h4>
                              </div>
                           </div>
                           <h6 class="text">Shipping on orders over $99</h6>
                        </div>
                     </div>
                     <!-- .col -->
                     <div class="col-md-6 col-sm-4 col-lg-4">
                        <div class="info-box">
                           <div class="row">
                              <div class="col-xs-12">
                                 <h4 class="info-box-heading green">Special Sale</h4>
                              </div>
                           </div>
                           <h6 class="text">Extra $5 off on all items </h6>
                        </div>
                     </div>
                     <!-- .col --> 
                  </div>
                  <!-- /.row --> 
               </div>
               <!-- /.info-boxes-inner --> 
            </div>
            <!-- /.info-boxes --> 
            <!-- ============================================== INFO BOXES : END ============================================== --> 
            <!-- ============================================== SCROLL TABS ============================================== -->
            <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
               <div class="more-info-tab clearfix ">
                  <h3 class="new-product-title pull-left">New Products</h3>
                  <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                     <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                     <?php
                        $Query = "SELECT * FROM category LIMIT 3";
                        $Connection = mysqli_query($db_connection,$Query);
                        while($row = mysqli_fetch_assoc($Connection))
                        {
                        ?>
                     <li><a data-transition-type="backSlide" href="<?php echo("#".$row['cat_id']); ?>" data-toggle="tab"><?php echo($row['cat_name']); ?></a></li>
                     <?php
                        }
                        ?>
                  </ul>
                  <!-- /.nav-tabs --> 
               </div>
               <div class="tab-content outer-top-xs">
                  <div class="tab-pane in active" id="all">
                     <div class="product-slider">
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                           <?php
                              $Query = "SELECT * FROM product ORDER BY pro_id DESC";
                              $Connection = mysqli_query($db_connection,$Query);
                              while($row = mysqli_fetch_assoc($Connection))
                              {
                              ?>
                           <div class="item item-carousel">
                              <div class="products">
                                 <div class="product">
                                    <div class="product-image">
                                       <div class="image"> <a href="detail.php?id=<?php echo($row['pro_id']); ?>"><img height =150 width = 150  src="admin/img/<?php echo($row['pro_image']); ?>" alt=""></a> </div>
                                       <!-- /.image -->
                                       <div class="tag new"><span>new</span></div>
                                    </div>
                                    <!-- /.product-image -->
                                    <div class="product-info text-left">
                                       <h3 class="name"><a href="detail.php?id=<?php echo($row['pro_id']); ?>"><?php echo($row['pro_name']); ?></a></h3>
                                       <div class="rating rateit-small"></div>
                                       <div class="description"></div>
                                       <div class="product-price"> <span class="price"><?php echo("$ ".($row['pro_price']-(($row['pro_disc']/100)*$row['pro_price']))); ?></span> <span class="price-before-discount"><?php echo("$ ".$row['pro_price']); ?></span> </div>
                                       <!-- /.product-price --> 
                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                       <div class="action">
                                          <ul class="list-unstyled">
                                             <li class="add-cart-button btn-group">
                                                <a data-toggle="tooltip" href ="post/add_to_cart.php?p_id=<?php
                                                   $_SESSION['after_add_to_cart'] = 1;
                                                    echo ($row['pro_id']);
                                                    ?>" class="btn btn-primary icon" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                             </li>
                                             <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="post/add_to_wishlist.php?p_id=<?php 
                                                echo ($row['pro_id']);
                                                $_SESSION['after_add_to_wishlist'] = 1;
                                                ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                             <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="post/add_to_compare.php?p_id=<?php
                                                $_SESSION['after_add_to_compare'] = 1;
                                                 echo ($row['pro_id']);
                                                 ?>" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                          </ul>
                                       </div>
                                       <!-- /.action --> 
                                    </div>
                                    <!-- /.cart --> 
                                 </div>
                                 <!-- /.product --> 
                              </div>
                              <!-- /.products --> 
                           </div>
                           <?php
                              }
                              ?>
                        </div>
                        <!-- /.home-owl-carousel --> 
                     </div>
                     <!-- /.product-slider --> 
                  </div>
                  <?php
                     $Query = "SELECT * FROM category LIMIT 3";
                     $Connection = mysqli_query($db_connection,$Query);
                     while($row = mysqli_fetch_assoc($Connection))
                     {
                     ?>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="<?php echo($row['cat_id']); ?>">
                     <div class="product-slider">
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                           <?php
                              $id = $row['cat_id'];
                              $pro = "SELECT * FROM product LEFT JOIN groups ON product.pro_gid = groups.group_id LEFT JOIN sub_category ON groups.sub_id = sub_category.sub_id LEFT JOIN category ON sub_category.cat_id = category.cat_id WHERE category.cat_id = $id ORDER BY product.pro_id DESC";
                              $ProConnection = mysqli_query($db_connection,$pro);
                              while($Prow = mysqli_fetch_assoc($ProConnection))
                              {
                              ?>
                           <div class="item item-carousel">
                              <div class="products">
                                 <div class="product">
                                    <div class="product-image">
                                       <div class="image"> <a href="detail.php"><img height =150 width = 150  src="admin/img/<?php echo($Prow['pro_image']); ?>" alt=""></a> </div>
                                       <!-- /.image -->
                                       <div class="tag sale"><span>sale</span></div>
                                    </div>
                                    <!-- /.product-image -->
                                    <div class="product-info text-left">
                                       <h3 class="name"><a href="detail.php?id=<?php echo($Prow['pro_id']); ?>"><?php echo($Prow['pro_name']); ?></a></h3>
                                       <div class="rating rateit-small"></div>
                                       <div class="description"></div>
                                       <div class="product-price"> <span class="price"><?php echo("$ ".($Prow['pro_price']-(($Prow['pro_disc']/100)*$Prow['pro_price']))); ?></span> <span class="price-before-discount"><?php echo("$ ".$Prow['pro_price']); ?></span> </div>
                                       <!-- /.product-price --> 
                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                       <div class="action">
                                          <ul class="list-unstyled">
                                             <li class="add-cart-button btn-group">
                                                <a data-toggle="tooltip" href ="post/add_to_cart.php?p_id=<?php
                                                   $_SESSION['after_add_to_cart'] = 1;
                                                    echo ($row['pro_id']);
                                                    ?>" class="btn btn-primary icon" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                             </li>
                                             <li class="lnk wishlist"> <a class="add-to-cart" href="post/add_to_wishlist.php?p_id=<?php 
                                                echo ($row['pro_id']);
                                                $_SESSION['after_add_to_wishlist'] = 1;
                                                ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                             <li class="lnk"> <a class="add-to-cart" href="post/add_to_compare.php?p_id=<?php
                                                $_SESSION['after_add_to_compare'] = 1;
                                                 echo ($row['pro_id']);
                                                 ?>" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                          </ul>
                                       </div>
                                       <!-- /.action --> 
                                    </div>
                                    <!-- /.cart --> 
                                 </div>
                                 <!-- /.product --> 
                              </div>
                              <!-- /.products --> 
                           </div>
                           <?php
                              }
                              ?>
                        </div>
                        <!-- /.home-owl-carousel --> 
                     </div>
                     <!-- /.product-slider --> 
                  </div>
                  <!-- /.tab-pane -->
                  <?php
                     }
                     ?>
               </div>
               <!-- /.tab-content --> 
            </div>
            <!-- /.scroll-tabs --> 
            <!-- ============================================== SCROLL TABS : END ============================================== --> 
            <!-- ============================================== WIDE PRODUCTS ============================================== -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
               <div class="row">
                  <?php
                     $Query = "SELECT * FROM adds ORDER BY RAND() LIMIT 1";
                     $Connection = mysqli_query($db_connection,$Query);
                     while($row = mysqli_fetch_assoc($Connection)){
                     ?>
                  <div class="col-md-6 col-sm-6">
                     <div class="wide-banner cnt-strip">
                        <div class="image"> <img class="img-responsive"  src="admin/img/<?php echo($row['add_image']); ?>" alt=""> </div>
                     </div>
                     <!-- /.wide-banner --> 
                  </div>
                  <!-- /.col -->
                  <?php
                     $addid = $row['add_id'];
                     }
                     $Query = "SELECT * FROM adds WHERE add_id != $addid ORDER BY RAND() LIMIT 1";
                     $Connection = mysqli_query($db_connection,$Query);
                     while($row = mysqli_fetch_assoc($Connection)){
                     ?>
                  <div class="col-md-6 col-sm-6">
                     <div class="wide-banner cnt-strip">
                        <div class="image"> <img class="img-responsive" src="admin/img/<?php echo($row['add_image']); ?>" alt=""> </div>
                     </div>
                  </div>
                  <?php
                     }
                     ?>
                  <!-- /.col --> 
               </div>
               <!-- /.row --> 
            </div>
            <!-- /.wide-banners --> 
            <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
            <!-- ============================================== FEATURED PRODUCTS ============================================== -->
            <section class="section featured-product wow fadeInUp">
               <h3 class="section-title">Featured products</h3>
               <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                  <?php
                     if(isset($_SESSION['user_id'])){
                       $userid = $_SESSION['user_id'];
                       $Query = "SELECT * FROM register WHERE user_id = $userid";
                       $Connection = mysqli_query($db_connection,$Query);
                       $row = mysqli_fetch_assoc($Connection);
                       $gender = $row['gender'];
                     
                       if($gender == "Male"){
                     
                         $FQuery = "SELECT * FROM product LEFT JOIN groups ON product.pro_gid = groups.group_id LEFT JOIN sub_category ON groups.sub_id = sub_category.sub_id WHERE sub_category.sub_name = 'Men' OR sub_category.sub_name = 'Boys'";
                       $FConnection = mysqli_query($db_connection,$FQuery);
                       while($Frow = mysqli_fetch_assoc($FConnection)){
                     ?>
                  <div class="item item-carousel">
                     <div class="products">
                        <div class="product">
                           <div class="product-image">
                              <div class="image"> <a href="detail.php?id=<?php echo($Frow['pro_id']); ?>"><img height =150 width = 150 src="admin/img/<?php echo($Frow['pro_image']); ?>" alt=""></a> </div>
                              <!-- /.image -->
                              <div class="tag hot"><span>hot</span></div>
                           </div>
                           <!-- /.product-image -->
                           <div class="product-info text-left">
                              <h3 class="name"><a href="detail.php?id=<?php echo($Frow['pro_id']); ?>"><?php echo($Frow['pro_name']); ?></a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              <div class="product-price"> <span class="price"> <?php echo("$ ".($Frow['pro_price']-(($Frow['pro_disc']/100)*$Frow['pro_price']))); ?> </span> <span class="price-before-discount"><?php echo("$ ".$Frow['pro_price']); ?></span> </div>
                              <!-- /.product-price --> 
                           </div>
                           <!-- /.product-info -->
                           <div class="cart clearfix animate-effect">
                           <div class="action">
                                          <ul class="list-unstyled">
                                             <li class="add-cart-button btn-group">
                                                <a data-toggle="tooltip" href ="post/add_to_cart.php?p_id=<?php
                                                   $_SESSION['after_add_to_cart'] = 1;
                                                    echo ($row['pro_id']);
                                                    ?>" class="btn btn-primary icon" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                             </li>
                                             <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="post/add_to_wishlist.php?p_id=<?php 
                                                echo ($row['pro_id']);
                                                $_SESSION['after_add_to_wishlist'] = 1;
                                                ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                             <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="post/add_to_compare.php?p_id=<?php
                                                $_SESSION['after_add_to_compare'] = 1;
                                                 echo ($row['pro_id']);
                                                 ?>" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                          </ul>
                                       </div>
                              <!-- /.action --> 
                           </div>
                           <!-- /.cart --> 
                        </div>
                        <!-- /.product --> 
                     </div>
                     <!-- /.products --> 
                  </div>
                  <?php
                     }
                     }
                     elseif ($gender == "Female") {
                       
                       $FQuery = "SELECT * FROM product LEFT JOIN groups ON product.pro_gid = groups.group_id LEFT JOIN sub_category ON groups.sub_id = sub_category.sub_id WHERE sub_category.sub_name = 'Women' OR sub_category.sub_name = 'Girls'";
                       $FConnection = mysqli_query($db_connection,$FQuery);
                       while($Frow = mysqli_fetch_assoc($FConnection)){
                     ?>
                  <div class="item item-carousel">
                     <div class="products">
                        <div class="product">
                           <div class="product-image">
                              <div class="image"> <a href="detail.php?id=<?php echo($Frow['pro_id']); ?>"><img height =150 width = 150 src="admin/img/<?php echo($Frow['pro_image']); ?>" alt=""></a> </div>
                              <!-- /.image -->
                              <div class="tag hot"><span>hot</span></div>
                           </div>
                           <!-- /.product-image -->
                           <div class="product-info text-left">
                              <h3 class="name"><a href="detail.php?id=<?php echo($Frow['pro_id']); ?>"><?php echo($Frow['pro_name']); ?></a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              <div class="product-price"> <span class="price"> <?php echo("$ ".($Frow['pro_price']-(($Frow['pro_disc']/100)*$Frow['pro_price']))); ?> </span> <span class="price-before-discount"><?php echo("$ ".$Frow['pro_price']); ?></span> </div>
                              <!-- /.product-price --> 
                           </div>
                           <!-- /.product-info -->
                           <div class="cart clearfix animate-effect">
                           <div class="action">
                                          <ul class="list-unstyled">
                                             <li class="add-cart-button btn-group">
                                                <a data-toggle="tooltip" href ="post/add_to_cart.php?p_id=<?php
                                                   $_SESSION['after_add_to_cart'] = 1;
                                                    echo ($row['pro_id']);
                                                    ?>" class="btn btn-primary icon" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                             </li>
                                             <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="post/add_to_wishlist.php?p_id=<?php 
                                                echo ($row['pro_id']);
                                                $_SESSION['after_add_to_wishlist'] = 1;
                                                ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                             <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="post/add_to_compare.php?p_id=<?php
                                                $_SESSION['after_add_to_compare'] = 1;
                                                 echo ($row['pro_id']);
                                                 ?>" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                          </ul>
                                       </div>
                              <!-- /.action --> 
                           </div>
                           <!-- /.cart --> 
                        </div>
                        <!-- /.product --> 
                     </div>
                     <!-- /.products --> 
                  </div>
                  <?php
                     }
                     }
                     }
                     else{
                     $FQuery = "SELECT * FROM product ORDER BY RAND()";
                     $FConnection = mysqli_query($db_connection,$FQuery);
                     while($Frow = mysqli_fetch_assoc($FConnection)){
                     
                     ?>
                  <div class="item item-carousel">
                     <div class="products">
                        <div class="product">
                           <div class="product-image">
                              <div class="image"> <a href="detail.php?id=<?php echo($Frow['pro_id']); ?>"><img height =150 width = 150 src="admin/img/<?php echo($Frow['pro_image']); ?>" alt=""></a> </div>
                              <!-- /.image -->
                              <div class="tag hot"><span>hot</span></div>
                           </div>
                           <!-- /.product-image -->
                           <div class="product-info text-left">
                              <h3 class="name"><a href="detail.php?id=<?php echo($Frow['pro_id']); ?>"><?php echo($Frow['pro_name']); ?></a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              <div class="product-price"> <span class="price"> <?php echo("$ ".($Frow['pro_price']-(($Frow['pro_disc']/100)*$Frow['pro_price']))); ?> </span> <span class="price-before-discount"><?php echo("$ ".$Frow['pro_price']); ?></span> </div>
                              <!-- /.product-price --> 
                           </div>
                           <!-- /.product-info -->
                           <div class="cart clearfix animate-effect">
                           <div class="action">
                                          <ul class="list-unstyled">
                                             <li class="add-cart-button btn-group">
                                                <a data-toggle="tooltip" href ="post/add_to_cart.php?p_id=<?php
                                                   $_SESSION['after_add_to_cart'] = 1;
                                                    echo ($Frow['pro_id']);
                                                    ?>" class="btn btn-primary icon" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                             </li>
                                             <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="post/add_to_wishlist.php?p_id=<?php 
                                                echo ($Frow['pro_id']);
                                                $_SESSION['after_add_to_wishlist'] = 1;
                                                ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                             <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="post/add_to_compare.php?p_id=<?php
                                                $_SESSION['after_add_to_compare'] = 1;
                                                 echo ($Frow['pro_id']);
                                                 ?>" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                          </ul>
                                       </div>
                              <!-- /.action --> 
                           </div>
                           <!-- /.cart --> 
                        </div>
                        <!-- /.product --> 
                     </div>
                     <!-- /.products --> 
                  </div>
                  <?php
                     }
                     }
                     ?>
               </div>
               <!-- /.home-owl-carousel --> 
            </section>
            <!-- /.section --> 
            <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
            <!-- ============================================== WIDE PRODUCTS ============================================== -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
               <div class="row">
                  <div class="col-md-12">
                     <div class="wide-banner cnt-strip">
                        <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner.jpg" alt=""> </div>
                        <div class="strip strip-text">
                           <div class="strip-inner">
                              <h2 class="text-right">New Mens Fashion<br>
                                 <span class="shopping-needs">Save up to 40% off</span>
                              </h2>
                           </div>
                        </div>
                        <div class="new-label">
                           <div class="text">NEW</div>
                        </div>
                        <!-- /.new-label --> 
                     </div>
                     <!-- /.wide-banner --> 
                  </div>
                  <!-- /.col --> 
               </div>
               <!-- /.row --> 
            </div>
            <!-- /.wide-banners --> 
            <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
            <!-- ============================================== BEST SELLER ============================================== -->
            <div class="best-deal wow fadeInUp outer-bottom-xs">
               <h3 class="section-title">Best seller</h3>
               <div class="sidebar-widget-body outer-top-xs">
                  <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">

                  <?php
                      $Query = "SELECT product_id, COUNT(product_id) AS MOST_FREQUENT FROM order_product GROUP BY product_id ORDER BY COUNT(product_id) DESC";
                      $Connection = mysqli_query($db_connection,$Query);
                      while($row = mysqli_fetch_assoc($Connection)){
                        $id = $row['product_id'];
 
                       $query = "SELECT * FROM product WHERE pro_id = $id";
                       $connection = mysqli_query($db_connection,$query);
                       $Row = mysqli_fetch_assoc($connection);
                     ?>

                     <div class="item">
                        <div class="products best-product">
                           <div class="product">
                              <div class="product-micro">
                                 <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                       <div class="product-image">
                                          <div class="image"> <a href="detail.php?id=<?php echo($Row['pro_id']); ?>"> <img  src="admin/img/<?php echo ($Row['pro_image']); ?>" alt=""> </a> </div>
                                          <!-- /.image --> 
                                       </div>
                                       <!-- /.product-image --> 
                                    </div>
                                    <!-- /.col -->
                                    <div class="col2 col-xs-7">
                                       <div class="product-info">
                                          <h3 class="name"><a href="detail.php?id=<?php echo($Row['pro_id']); ?>"><?php echo ($Row['pro_name']); ?></a></h3>
                                          <div class="rating rateit-small"></div>
                                          <div class="product-price"> <span class="price"> <?php echo ("$ ".$Row['pro_price']); ?> </span> </div>
                                          <!-- /.product-price --> 
                                       </div>
                                    </div>
                                    <!-- /.col --> 
                                 </div>
                                 <!-- /.product-micro-row --> 
                              </div>
                              <!-- /.product-micro --> 
                           </div>
                           
                        </div>
                     </div>

<?php
                     }
?>
                  </div>
               </div>
               <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== BEST SELLER : END ============================================== --> 
            <!-- ============================================== BLOG SLIDER ============================================== -->
            <section class="section latest-blog outer-bottom-vs wow fadeInUp">
               <h3 class="section-title">latest form blog</h3>
               <div class="blog-slider-container outer-top-xs">
                  <div class="owl-carousel blog-slider custom-carousel">
                     <?php
                        $query = "SELECT * FROM blog ORDER BY blog_id DESC";
                        $connection = mysqli_query($db_connection,$query);
                        while($row = mysqli_fetch_assoc($connection)){
                        ?>
                     <div class="item">
                        <div class="blog-post">
                           <div class="blog-post-image">
                              <div class="image"> <a href="blog-details.php?blogid=<?php echo ($row['blog_id']);?>"><img src="admin/img/<?php echo ($row['blog_image']); ?>" alt=""></a> </div>
                           </div>
                           <!-- /.blog-post-image -->
                           <div class="blog-post-info text-left">
                              <h3 class="name"><a href="blog-details.php?blogid=<?php echo ($row['blog_id']);?>"><?php echo ($row['blog_heading']);?></a></h3>
                              <span class="info"><?php echo ("By ".$row['blog_auth']);?> &nbsp;|&nbsp; <?php echo ($row['blog_date']);?> </span>
                              <p class="text"><?php echo (substr($row['blog_content'],0,100).".......");?></p>
                              <a href="blog-details.php?blogid=<?php echo ($row['blog_id']);?>" class="lnk btn btn-primary">Read more</a> 
                           </div>
                           <!-- /.blog-post-info --> 
                        </div>
                        <!-- /.blog-post --> 
                     </div>
                     <!-- /.item -->
                     <?php
                        }
                        ?>
                  </div>
                  <!-- /.owl-carousel --> 
               </div>
               <!-- /.blog-slider-container --> 
            </section>
            <!-- /.section --> 
            <!-- ============================================== BLOG SLIDER : END ============================================== --> 
            <!-- ============================================== FEATURED PRODUCTS ============================================== -->
            <section class="section wow fadeInUp new-arriavls">
               <h3 class="section-title">New Arrivals</h3>
               <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                  <?php
                     $Query = "SELECT * FROM product ORDER BY pro_id DESC";
                     $Connection = mysqli_query($db_connection,$Query);
                     while($row = mysqli_fetch_assoc($Connection))
                     {
                     ?>
                  <div class="item item-carousel">
                     <div class="products">
                        <div class="product">
                           <div class="product-image">
                              <div class="image"> <a href="detail.php?id=<?php echo($row['pro_id']); ?>"><img height =150 width = 150 src="admin/img/<?php echo($row['pro_image']); ?>" alt=""></a> </div>
                              <!-- /.image -->
                              <div class="tag new"><span>new</span></div>
                           </div>
                           <!-- /.product-image -->
                           <div class="product-info text-left">
                              <h3 class="name"><a href="detail.php?id=<?php echo($row['pro_id']); ?>"><?php echo($row['pro_name']); ?></a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              <div class="product-price"> <span class="price"><?php echo("$ ".($row['pro_price']-(($row['pro_disc']/100)*$row['pro_price']))); ?></span> <span class="price-before-discount"><?php echo("$ ".$row['pro_price']); ?></span> </div>
                              <!-- /.product-price --> 
                           </div>
                           <!-- /.product-info -->
                           <div class="cart clearfix animate-effect">
                           <div class="action">
                                          <ul class="list-unstyled">
                                             <li class="add-cart-button btn-group">
                                                <a data-toggle="tooltip" href ="post/add_to_cart.php?p_id=<?php
                                                   $_SESSION['after_add_to_cart'] = 1;
                                                    echo ($row['pro_id']);
                                                    ?>" class="btn btn-primary icon" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                             </li>
                                             <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="post/add_to_wishlist.php?p_id=<?php 
                                                echo ($row['pro_id']);
                                                $_SESSION['after_add_to_wishlist'] = 1;
                                                ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                             <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="post/add_to_compare.php?p_id=<?php
                                                $_SESSION['after_add_to_compare'] = 1;
                                                 echo ($row['pro_id']);
                                                 ?>" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                          </ul>
                                       </div>
                              <!-- /.action --> 
                           </div>
                           <!-- /.cart --> 
                        </div>
                        <!-- /.product --> 
                     </div>
                     <!-- /.products --> 
                  </div>
                  <?php
                     }
                     ?>
               </div>
               <!-- /.home-owl-carousel --> 
            </section>
            <!-- /.section --> 
            <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
         </div>
         <!-- /.homebanner-holder --> 
         <!-- ============================================== CONTENT : END ============================================== --> 
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
<!-- /#top-banner-and-menu --> 
<!-- ============================================================= FOOTER ============================================================= -->
<?php
   require_once "include/footer.php";
   ?>
</body>
</html>