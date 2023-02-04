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
                                       <li><a href="category.php?gid=<?php echo($gRow['group_id']); ?>&page=1&sort=1&show=10"><?php echo($gRow['group_name']); ?></a></li>
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
            <div class="sidebar-module-container">
               <div class="sidebar-filter">
                  <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                  <div class="sidebar-widget wow fadeInUp">
                     <h3 class="section-title">shop by</h3>
                     <div class="widget-header">
                        <h4 class="widget-title">Category</h4>
                     </div>
                     <div class="sidebar-widget-body">
                        <div class="accordion">
                           <?php
                              $Query = "SELECT * FROM category ORDER BY RAND() LIMIT 6";
                              $Connection = mysqli_query($db_connection,$Query);
                              while($row = mysqli_fetch_assoc($Connection))
                              {
                              ?>
                           <div class="accordion-group">
                              <div class="accordion-heading"> <a href="#<?php echo($row['cat_id']); ?>" data-toggle="collapse" class="accordion-toggle collapsed"> <?php echo($row['cat_name']); ?> </a> </div>
                              <!-- /.accordion-heading -->
                              <div class="accordion-body collapse" id="<?php echo($row['cat_id']); ?>" style="height: 0px;">
                                 <div class="accordion-inner">
                                    <ul>
                                       <?php
                                          $id = $row['cat_id'];
                                          $query = "SELECT * FROM groups LEFT JOIN sub_category ON groups.sub_id = sub_category.sub_id LEFT JOIN category ON category.cat_id = sub_category.cat_id WHERE category.cat_id = '$id' ORDER BY RAND() LIMIT 5";
                                          $connection = mysqli_query($db_connection,$query);
                                          while($Row = mysqli_fetch_assoc($connection))
                                          {
                                          ?>
                                       <li><a href="category.php?gid=<?php echo($Row['group_id']); ?>&page=1&sort=1&show=10"><?php echo($Row['group_name']); ?></a></li>
                                       <?php
                                          }
                                          ?>
                                    </ul>
                                 </div>
                                 <!-- /.accordion-inner --> 
                              </div>
                              <!-- /.accordion-body --> 
                           </div>
                           <!-- /.accordion-group -->
                           <?php
                              }
                              ?>
                        </div>
                        <!-- /.accordion --> 
                     </div>
                     <!-- /.sidebar-widget-body --> 
                  </div>
                  <!-- /.sidebar-widget --> 
                  <!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
                  <!-- ============================================== PRICE SILDER============================================== -->
                  <form action = "post/priceslider.php" method = "POST">
                     <div class="sidebar-widget wow fadeInUp">
                        <div class="widget-header">
                           <h4 class="widget-title">Price Slider</h4>
                        </div>
                        <div class="sidebar-widget-body m-t-10">
                           <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$100.00</span> <span class="pull-right">$700.00</span> </span>
                              <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                              <input type="text" name = "price" class="price-slider" value="" >
                              <input type = "hidden" name = "gid" value = "<?php echo($_GET['gid']); ?>">
                           </div>
                           <!-- /.price-range-holder --> 
                           <button type = "submit" name = "btn_price" class="lnk btn btn-primary">Show Now</button>
                        </div>
                        <!-- /.sidebar-widget-body --> 
                     </div>
                  </form>
                  <!-- /.sidebar-widget --> 
                  <!-- ============================================== PRICE SILDER : END ============================================== --> 
                  <!-- ============================================== MANUFACTURES============================================== -->
                  <div class="sidebar-widget wow fadeInUp">
                     <div class="widget-header">
                        <h4 class="widget-title">Manufactures</h4>
                     </div>
                     <div class="sidebar-widget-body">
                        <ul class="list">
                        <?php
                              $Query = "SELECT man_name FROM manufacture UNION SELECT man_name FROM manufacture ORDER BY RAND() LIMIT 6";
                              $Connection = mysqli_query($db_connection,$Query);
                              while($row = mysqli_fetch_assoc($Connection))
                              {
                              ?>

                           <li><a href="tag_list.php?man=<?php echo($row['man_name']); ?>"><?php echo($row['man_name']); ?></a></li>
                          

<?php
                              }
                              ?>

                        </ul>
                        <!--<a href="#" class="lnk btn btn-primary">Show Now</a>--> 
                     </div>
                     <!-- /.sidebar-widget-body --> 
                  </div>
                  <!-- /.sidebar-widget --> 
                  <!-- ============================================== MANUFACTURES: END ============================================== --> 
                  <!-- ============================================== COLOR============================================== -->
                  <div class="sidebar-widget wow fadeInUp">
                     <div class="widget-header">
                        <h4 class="widget-title">Colors</h4>
                     </div>
                     <div class="sidebar-widget-body">
                        <ul class="list">


                        <?php
                              $Query = "SELECT color_name FROM colors UNION SELECT color_name FROM colors ORDER BY RAND() LIMIT 6";
                              $Connection = mysqli_query($db_connection,$Query);
                              while($row = mysqli_fetch_assoc($Connection))
                              {
                              ?>
                           <li><a href="tag_list.php?color=<?php echo($row['color_name']); ?>"><?php echo($row['color_name']); ?></a></li>
                           

                           <?php
                              }
                              ?>
                        </ul>
                     </div>
                     <!-- /.sidebar-widget-body --> 
                  </div>
                  <!-- /.sidebar-widget --> 
                  <!-- ============================================== COLOR: END ============================================== --> 
             
                  <!-- ============================================== PRODUCT TAGS ============================================== -->
                  <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
                     <h3 class="section-title">Product tags</h3>
                     <div class="sidebar-widget-body outer-top-xs">

                     <?php
                  $query = "SELECT tag_name FROM tags UNION SELECT tag_name FROM tags ORDER BY RAND()";
          $connection = mysqli_query($db_connection,$query);
          while($row = mysqli_fetch_assoc($connection)){
          ?>

                        <a class="item" title="Phone" href="tag_list.php?tag=<?php echo($row['tag_name']); ?>"><?php echo($row['tag_name']); ?></a>
                        <!-- /.tag-list --> 
                     
                        <?php
          }
          ?>     
                     
                     
                     </div>
                     <!-- /.sidebar-widget-body --> 
                  </div>
                  <!-- /.sidebar-widget --> 
                  <!----------- Testimonials------------->
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
               <!-- /.sidebar-filter --> 
            </div>
            <!-- /.sidebar-module-container --> 
         </div>
         <!-- /.sidebar -->
         <div class='col-md-9'>
            <!-- ========================================== SECTION – HERO ========================================= -->
            <div id="category" class="category-carousel hidden-xs">
               <div class="item">
               <?php
               if(isset($_GET['gid'])){
                  $grid = $_GET['gid'];
                  $Query = "SELECT * FROM category LEFT JOIN sub_category ON category.cat_id = sub_category.cat_id LEFT JOIN groups ON sub_category.sub_id = groups.sub_id WHERE groups.group_id = '$grid'";
                              $Connection = mysqli_query($db_connection,$Query);
                              $row = mysqli_fetch_assoc($Connection);
               
               ?>
                  <div class="image"> <img  height = 100 width = 1000 src="admin/img/<?php echo($row['cat_image']); ?>" alt="" class="img-responsive"> </div>
                  <?php
                  }
                  ?>
                  <!-- /.container-fluid --> 
               </div>
            </div>
            <div class="clearfix filters-container m-t-10">
               <div class="row">
                  <div class="col col-sm-6 col-md-2">
                     <div class="filter-tabs">
                        <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                           <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                           <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                        </ul>
                     </div>
                     <!-- /.filter-tabs --> 
                  </div>
                  <!-- /.col -->
                  <div class="col col-sm-12 col-md-6">
                     <div class="col col-sm-3 col-md-6 no-padding">
                        <div class="lbl-cnt">
                           <span class="lbl">Sort by</span>
                           <div class="fld inline">
                              <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                 <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"><?php 
                                    if(isset($_GET['sort'])){
                                      if($_GET['sort'] == 1){
                                        echo "position";
                                      }
                                      elseif ($_GET['sort'] == 2) {
                                        echo "Price:Lowest first";
                                      }
                                      elseif ($_GET['sort'] == 3) {
                                        echo("Price:HIghest first");
                                      }
                                      elseif ($_GET['sort'] == 4) {
                                        echo("Product Name:A to Z");
                                      }
                                    }
                                    else {
                                      echo "position";
                                    }
                                    ?><span class="caret"></span> </button>
                                 <ul role="menu" class="dropdown-menu">
                                    <?php
                                       if(isset($_GET['gid']) && isset($_GET['page'])){
                                         $Page = $_GET['page'];
                                         $Gid = $_GET['gid'];
                                       ?>
                                    <li role="presentation"><a href="category.php?page=1&gid=<?php echo($Gid); ?>&sort=1">position</a></li>
                                    <li role="presentation"><a href="category.php?page=1&gid=<?php echo($Gid); ?>&sort=2">Price:Lowest first</a></li>
                                    <li role="presentation"><a href="category.php?page=1&gid=<?php echo($Gid); ?>&sort=3">Price:HIghest first</a></li>
                                    <li role="presentation"><a href="category.php?page=1&gid=<?php echo($Gid); ?>&sort=4">Product Name:A to Z</a></li>
                                    <?php
                                       }
                                       elseif (isset($_GET['gid'])) {
                                         $Gid = $_GET['gid'];
                                         ?>
                                    <li role="presentation"><a href="category.php?gid=<?php echo($Gid); ?>&sort=1">position</a></li>
                                    <li role="presentation"><a href="category.php?gid=<?php echo($Gid); ?>&sort=2">Price:Lowest first</a></li>
                                    <li role="presentation"><a href="category.php?gid=<?php echo($Gid); ?>&sort=3">Price:HIghest first</a></li>
                                    <li role="presentation"><a href="category.php?gid=<?php echo($Gid); ?>&sort=4">Product Name:A to Z</a></li>
                                    <?php
                                       }
                                         ?>
                                 </ul>
                              </div>
                           </div>
                           <!-- /.fld --> 
                        </div>
                        <!-- /.lbl-cnt --> 
                     </div>
                     <!-- /.col -->
                     <div class="col col-sm-3 col-md-6 no-padding">
                        <div class="lbl-cnt">
                           <span class="lbl">Show</span>
                           <div class="fld inline">
                              <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                 <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"><?php if(isset($_GET['show'])){
                                    $show = $_GET['show'];
                                    echo($show);
                                    }
                                    else {
                                    echo("10");
                                    }
                                    ?><span class="caret"></span> </button>
                                 <ul role="menu" class="dropdown-menu">
                                    <?php
                                       if(isset($_GET['gid']) && isset($_GET['page']) && isset($_GET['sort'])){
                                         $Page = $_GET['page'];
                                         $Gid = $_GET['gid'];
                                         $sort = $_GET['sort'];
                                       for ($i=1; $i < 11; $i++) { 
                                         ?>
                                    <li role="presentation"><a href="category.php?page=1&gid=<?php echo($Gid); ?>&sort=<?php echo($sort); ?>&show=<?php echo($i); ?>"><?php echo($i); ?></a></li>
                                    <?php
                                       }
                                       }
                                       elseif(isset($_GET['gid']) && isset($_GET['page'])){
                                         $Page = $_GET['page'];
                                         $Gid = $_GET['gid'];
                                         for ($i=1; $i < 11; $i++) { 
                                           ?>
                                    <li role="presentation"><a href="category.php?page=1&gid=<?php echo($Gid); ?>&show=<?php echo($i); ?>"><?php echo($i); ?></a></li>
                                    <?php
                                       }
                                       }
                                       elseif (isset($_GET['gid']) && isset($_GET['sort'])) {
                                       $Gid = $_GET['gid'];
                                       $sort = $_GET['sort'];
                                       for ($i=1; $i < 11; $i++) { 
                                         ?>
                                    <li role="presentation"><a href="category.php?gid=<?php echo($Gid); ?>&sort=<?php echo($sort); ?>&show=<?php echo($i); ?>"><?php echo($i); ?></a></li>
                                    <?php
                                       }
                                       }
                                       elseif (isset($_GET['gid'])) {
                                       $Gid = $_GET['gid'];
                                       for ($i=1; $i < 11; $i++) { 
                                         ?>
                                    <li role="presentation"><a href="category.php?gid=<?php echo($Gid); ?>&show=<?php echo($i); ?>"><?php echo($i); ?></a></li>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </ul>
                              </div>
                           </div>
                           <!-- /.fld --> 
                        </div>
                        <!-- /.lbl-cnt --> 
                     </div>
                     <!-- /.col --> 
                  </div>
                  <!-- /.col -->
                  <!-- /.col --> 
               </div>
               <!-- /.row --> 
            </div>
            <div class="search-result-container ">
               <div id="myTabContent" class="tab-content category-list">
                  <div class="tab-pane active " id="grid-container">
                     <div class="category-product">
                        <div class="row">
                           <?php
                              if(isset($_GET['gid'])){
                                $gid = $_GET['gid'];
                              
                              
                                if(isset($_GET['price'])){
                                  $price = $_GET['price'];
                                  $Price = explode(",",$price);
                                  
                                }
                                else {
                                  $Price[0] = 0;
                                  $Price[1] = 10000;
                                }
                              
                                if(isset($_GET['page'])){
                                  $page = $_GET['page'];
                                }
                                else{
                                  $page = "";
                                }
                                if($page == "" || $page == 1){
                                  $productCount = 0;
                                }
                                else{
                                  if(isset($_GET['show'])){
                                    $show = $_GET['show'];
                                  $productCount = ($page*$show)-$show;
                                  }
                                  else {
                                    $productCount = ($page*10)-10;
                                  }
                                }
                                $Product = "SELECT * FROM product WHERE pro_gid = '$gid'";
                                $connection = mysqli_query($db_connection,$Product);
                                $count = mysqli_num_rows($connection);
                                if(isset($_GET['show'])){
                                  $show = $_GET['show'];
                                $count = ceil($count/$show);
                                }
                                else {
                                  $count = ceil($count/10);
                                }
                                if(isset($_GET['sort'])){
                                  if($_GET['sort'] == 1){
                                    if(isset($_GET['show'])){
                                      $show = $_GET['show'];
                                    $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] LIMIT $productCount,$show";
                                    }
                                    else {
                                      $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] LIMIT $productCount,10";
                                    }
                                  }
                                  elseif ($_GET['sort'] == 2) {
                                    if(isset($_GET['show'])){
                                      $show = $_GET['show'];
                                    $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] ORDER BY pro_price ASC LIMIT $productCount,$show";
                                    }
                                    else {
                                      $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] ORDER BY pro_price ASC LIMIT $productCount,10";
                                    }
                                  }
                                  elseif ($_GET['sort'] == 3) {
                                    if(isset($_GET['show'])){
                                      $show = $_GET['show'];
                                    $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] ORDER BY pro_price DESC LIMIT $productCount,$show";
                                    }
                                    else {
                                      $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] ORDER BY pro_price DESC LIMIT $productCount,10";
                                    }
                                  }
                                  elseif ($_GET['sort'] == 4) {
                                    if(isset($_GET['show'])){
                                      $show = $_GET['show'];
                                    $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] ORDER BY pro_name ASC LIMIT $productCount,$show";
                                    }
                                    else {
                                      $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] ORDER BY pro_name ASC LIMIT $productCount,10";
                                    }
                                  }
                                }
                                  else {
                                    if(isset($_GET['show'])){
                                      $show = $_GET['show'];
                                    $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] LIMIT $productCount,$show";
                                    }
                                    else {
                                      $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] LIMIT $productCount,10";
                                    }
                                  }
                              
                                $Connection = mysqli_query($db_connection,$Query);
                                while($row = mysqli_fetch_assoc($Connection))
                                {
                              
                              ?>
                           <div class="col-sm-6 col-md-4 wow fadeInUp">
                              <div class="products">
                                 <div class="product">
                                    <div class="product-image">
                                       <div class="image"> <a href="detail.php?id=<?php echo($row['pro_id']); ?>"><img  src="admin/img/<?php echo($row['pro_image']); ?>" alt=""></a> </div>
                                       <!-- /.image -->
                                       <div class="tag new"><span>new</span></div>
                                    </div>
                                    <!-- /.product-image -->
                                    <div class="product-info text-left">
                                       <h3 class="name"><a href="detail.php?id=<?php echo($row['pro_id']); ?>"><?php echo($row['pro_name']); ?></a></h3>
                                       <div class="rating rateit-small"></div>
                                       <div class="description"></div>
                                       <div class="product-price"> <span class="price"> <?php echo("$ ".($row['pro_price']-(($row['pro_disc']/100)*$row['pro_price']))); ?> </span> <span class="price-before-discount"><?php echo("$ ".$row['pro_price']); ?></span> </div>
                                       <!-- /.product-price --> 
                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                       <div class="action">
                                          <ul class="list-unstyled">
                                             <li class="add-cart-button btn-group">
                                                <a data-toggle="tooltip" href ="post/add_to_cart.php?p_id=<?php
                                                $_SESSION['gid'] = $gid;
                                                   $_SESSION['after_add_to_cart'] = 2;
                                                    echo ($row['pro_id']);
                                                    ?>" class="btn btn-primary icon" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                             </li>
                                             <li class="lnk wishlist"> <a class="add-to-cart" href="post/add_to_wishlist.php?p_id=<?php 
                                                echo ($row['pro_id']);
                                                $_SESSION['after_add_to_wishlist'] = 2;
                                                ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                             <li class="lnk"> <a class="add-to-cart" href="post/add_to_compare.php?p_id=<?php
                                                $_SESSION['after_add_to_compare'] = 2;
                                                 echo ($row['pro_id']);
                                                 ?>" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
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
                           <!-- /.item -->
                           <?php
                              }
                              
                              ?>
                        </div>
                        <!-- /.row --> 
                     </div>
                     <!-- /.category-product --> 
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane "  id="list-container">
                     <div class="category-product">
                        <?php
                           if(isset($_GET['price'])){
                             $price = $_GET['price'];
                             $Price = explode(",",$price);
                             
                           }
                           else {
                             $Price[0] = 0;
                             $Price[1] = 10000;
                           }
                               if(isset($_GET['page'])){
                                 $page = $_GET['page'];
                               }
                               else{
                                 $page = "";
                               }
                               if($page == "" || $page == 1){
                                 $productCount = 0;
                               }
                               else{
                                 if(isset($_GET['show'])){
                                   $show = $_GET['show'];
                                 $productCount = ($page*$show)-$show;
                                 }
                                 else {
                                   $productCount = ($page*10)-10;
                                 }
                               }
                               $Product = "SELECT * FROM product WHERE pro_gid = '$gid'";
                               $connection = mysqli_query($db_connection,$Product);
                               $count = mysqli_num_rows($connection);
                               if(isset($_GET['show'])){
                                 $show = $_GET['show'];
                               $count = ceil($count/$show);
                               }
                               else {
                                 $count = ceil($count/10);
                               }
                               if(isset($_GET['sort'])){
                                 if($_GET['sort'] == 1){
                                   if(isset($_GET['show'])){
                                     $show = $_GET['show'];
                                   $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] LIMIT $productCount,$show";
                                   }
                                   else {
                                     $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] LIMIT $productCount,10";
                                   }
                                 }
                                 elseif ($_GET['sort'] == 2) {
                                   if(isset($_GET['show'])){
                                     $show = $_GET['show'];
                                   $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] ORDER BY pro_price ASC LIMIT $productCount,$show";
                                   }
                                   else {
                                     $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] ORDER BY pro_price ASC LIMIT $productCount,10";
                                   }
                                 }
                                 elseif ($_GET['sort'] == 3) {
                                   if(isset($_GET['show'])){
                                     $show = $_GET['show'];
                                   $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] ORDER BY pro_price DESC LIMIT $productCount,$show";
                                   }
                                   else {
                                     $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] ORDER BY pro_price DESC LIMIT $productCount,10";
                                   }
                                 }
                                 elseif ($_GET['sort'] == 4) {
                                   if(isset($_GET['show'])){
                                     $show = $_GET['show'];
                                   $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] ORDER BY pro_name ASC LIMIT $productCount,$show";
                                   }
                                   else {
                                     $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] ORDER BY pro_name ASC LIMIT $productCount,10";
                                   }
                                 }
                               }
                                 else {
                                   if(isset($_GET['show'])){
                                     $show = $_GET['show'];
                                   $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] LIMIT $productCount,$show";
                                   }
                                   else {
                                     $Query = "SELECT * FROM product WHERE pro_gid = '$gid' AND pro_price >= $Price[0] AND pro_price <= $Price[1] LIMIT $productCount,10";
                                   }
                                 }
                           
                               $Connection = mysqli_query($db_connection,$Query);
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
                                                         $_SESSION['after_add_to_cart'] = 2;
                                                         $_SESSION['gid'] = $gid;
                                                          echo ($row['pro_id']);
                                                          ?>" class="btn btn-primary icon" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                   </li>
                                                   <li class="lnk wishlist"> <a class="add-to-cart" href="post/add_to_wishlist.php?p_id=<?php 
                                                      echo ($row['pro_id']);
                                                      $_SESSION['after_add_to_wishlist'] = 2;
                                                      ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                   <li class="lnk"> <a class="add-to-cart" href="post/add_to_compare.php?p_id=<?php
                                                      $_SESSION['after_add_to_compare'] = 2;
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
                        <!-- /.category-product-inner -->
                        <?php
                           }
                           
                           }
                           ?>
                     </div>
                     <!-- /.category-product --> 
                  </div>
                  <!-- /.tab-pane #list-container --> 
               </div>
               <!-- /.tab-content -->
               <div class="clearfix filters-container">
                  <div class="text-right">
                     <div class="pagination-container">
                        <ul class="list-inline list-unstyled">
                           <?php
                              if(isset($_GET['gid']) && isset($_GET['sort']) && isset($_GET['show']) && isset($_GET['page'])){
                                $gid = $_GET['gid'];
                                $sort = $_GET['sort'];
                                $show = $_GET['show'];
                                if($page == 1){
                                  $page = $page;
                                }
                                else {
                                  $page = $page-1;
                                }
                                
                                ?>
                           <li class="prev"><a href="<?php echo("category.php?page=".$page."&gid=".$gid."&sort=".$sort."&show=".$show); ?>"><i class="fa fa-angle-left"></i></a></li>
                           <?php
                              }
                              if(isset($_GET['gid']) && isset($_GET['sort']) && isset($_GET['show'])){
                              $gid = $_GET['gid'];
                              $sort = $_GET['sort'];
                              $show = $_GET['show'];
                              if($page == ""){
                              $page = 1;
                              }
                              for($i = 1; $i <= $count; $i++){
                              if($i == $page){
                              echo "<li class='active'><a href = 'category.php?page=".$i."&gid=".$gid."&sort=".$sort."&show=".$show."'>".$i."</a></li>";
                              }
                              else{
                              echo "<li><a href = 'category.php?page=".$i."&gid=".$gid."&sort=".$sort."&show=".$show."'>".$i."</a></li>";
                              }
                              }
                              }
                              ?>
                           <?php
                              if(isset($_GET['gid']) && isset($_GET['sort']) && isset($_GET['show']) && isset($_GET['page'])){
                                $gid = $_GET['gid'];
                                $sort = $_GET['sort'];
                                $show = $_GET['show'];
                                if($page == $count){
                                  $page = $page;
                                }
                                else {
                                  $page = $page+1;
                                }
                                
                                ?>
                           <li class="next"><a href="<?php echo("category.php?page=".$page."&gid=".$gid."&sort=".$sort."&show=".$show); ?>"><i class="fa fa-angle-right"></i></a></li>
                           <?php
                              }
                              ?>
                        </ul>
                        <!-- /.list-inline --> 
                     </div>
                     <!-- /.pagination-container --> 
                  </div>
                  <!-- /.text-right --> 
               </div>
               <!-- /.filters-container --> 
            </div>
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