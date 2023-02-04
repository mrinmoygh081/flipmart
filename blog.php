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
            <li class='active'>Blog</li>
         </ul>
      </div>
      <!-- /.breadcrumb-inner -->
   </div>
   <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content">
   <div class="container">
      <div class="row">
         <div class="blog-page">
            <div class="col-md-9">
<?php

if(isset($_POST['btn_search'])){
   $keyword = $_POST['keyword'];
 $query =  "SELECT * FROM blog WHERE blog_heading LIKE '%$keyword%' OR blog_content LIKE '%$keyword%' ORDER BY blog_id DESC";
 unset($_POST['btn_search']);
 }
elseif(isset($_GET['id'])){
	$id = $_GET['id'];
	$query = "SELECT * FROM blog WHERE blog_cat_id = $id";
  }
  else{
	$query = "SELECT * FROM blog";
  }
  $connection = mysqli_query($db_connection,$query);
  
  while($row = mysqli_fetch_assoc($connection)){
   $blog = $row['blog_id'];
   $CountQuery = "SELECT * FROM blog_comment WHERE blog_id = $blog";
   $CountConnection = mysqli_query($db_connection,$CountQuery);
   $count = mysqli_num_rows($CountConnection);
	?>

               <div class="blog-post  wow fadeInUp">
                  <a href="blog-details.php?blogid=<?php echo ($row['blog_id']);?>"><img class="img-responsive" src="admin/img/<?php echo ($row['blog_image']); ?>" alt=""></a>
                  <h1><a href="blog-details.php?blogid=<?php echo ($row['blog_id']);?>"><?php echo ($row['blog_heading']);?></a></h1>
                  <span class="author"><?php echo ($row['blog_auth']);?></span>
                  <span class="review"><?php echo($count); ?> Comments</span>
                  <span class="date-time"><?php echo ($row['blog_date']);?></span>
                  <p><?php echo (substr($row['blog_content'],0,200).".......");?></p>
                  <a href="blog-details.php?blogid=<?php echo ($row['blog_id']);?>" class="btn btn-upper btn-primary read-more">read more</a>
               </div>
			   <?php
			}
?>

               
               <!-- /.filters-container -->				
            </div>
            <div class="col-md-3 sidebar">
               <div class="sidebar-module-container">
                  <div class="search-area outer-bottom-small">
                     <form action="blog.php" method = "POST">
                        <div class="control-group">
                           <input placeholder="Type to search" name = "keyword" class="search-field">
                           <button type="submit" name = "btn_search" class="search-button">Search</button>
                        
                        </div>
                     </form>
                  </div>
                  <div class="home-banner outer-top-n outer-bottom-xs">
                     <img src="assets/images/banners/LHS-banner.jpg" alt="Image">
                  </div>
                  <!-- ==============================================CATEGORY============================================== -->
                  <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                     <h3 class="section-title">Category</h3>
					 <?php
        $Query = "SELECT * FROM category ORDER BY cat_id DESC LIMIT 6";
        $Connection = mysqli_query($db_connection,$Query);
        while($row = mysqli_fetch_assoc($Connection))
        {
          $blogid = $row['cat_id'];
          $CountQuery = "SELECT * FROM blog WHERE blog_cat_id = '$blogid'";
          $connection = mysqli_query($db_connection,$CountQuery);
        $count = mysqli_num_rows($connection);
            echo "<a href='blog.php?id=".$row['cat_id']."'>".$row['cat_name']."</a><br>";
        }
        ?>
                                
                  </div>
                  <!-- /.sidebar-widget -->
                  <!-- ============================================== CATEGORY : END ============================================== -->						
                  <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                     <h3 class="section-title">tab widget</h3>
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
                        <li><a href="#recent" data-toggle="tab">recent post</a></li>
                     </ul>
                     <div class="tab-content" style="padding-left:0">
                        <div class="tab-pane active m-t-20" id="popular">
                        <?php
              $Query = "SELECT blog_id, COUNT(blog_id) AS MOST_FREQUENT FROM blog_comment GROUP BY blog_id ORDER BY COUNT(blog_id) DESC LIMIT 2";
			  $Connection = mysqli_query($db_connection,$Query);
              while($row = mysqli_fetch_assoc($Connection))
              {
				$id = $row['blog_id'];
 
				$query = "SELECT * FROM blog WHERE blog_id = $id";
				$connection = mysqli_query($db_connection,$query);
				$Row = mysqli_fetch_assoc($connection);

				$CountQuery = "SELECT * FROM blog_comment WHERE blog_id = $id";
				$CountConnection = mysqli_query($db_connection,$CountQuery);
				$count = mysqli_num_rows($CountConnection);
				?>

<div class="blog-post inner-bottom-30 " >
						   <img class="img-responsive" src="admin/img/<?php echo ($Row['blog_image']); ?>" alt="">
                              <h4><a href="blog-details.php?blogid=<?php echo ($Row['blog_id']);?>"><?php echo ($Row['blog_heading']); ?></a></h4>
                              <span class="review"><?php echo ($count);?> Comments</span>
                              <span class="date-time"><?php echo ($Row['blog_date']); ?></span>
                              <p><?php echo (substr($Row['blog_content'],0,30).".......");?></p>
                           </div>
						   <?php
			}
			  ?>
                        </div>
                        <div class="tab-pane m-t-20" id="recent">

                        <?php
              $Query = "SELECT * FROM blog ORDER BY blog_id DESC LIMIT 2";
              $Connection = mysqli_query($db_connection,$Query);
              while($row = mysqli_fetch_assoc($Connection))
              {
				  $blog = $row['blog_id'];
				$CountQuery = "SELECT * FROM blog_comment WHERE blog_id = $blog";
				$CountConnection = mysqli_query($db_connection,$CountQuery);
				$count = mysqli_num_rows($CountConnection);
				?>
                           <div class="blog-post inner-bottom-30" >
                              <img class="img-responsive" src="admin/img/<?php echo ($row['blog_image']); ?>" alt="">
                              <h4><a href="blog-details.php?blogid=<?php echo ($row['blog_id']);?>"><?php echo ($row['blog_heading']); ?></a></h4>
                              <span class="review"><?php echo ($count);?> Comments</span>
                              <span class="date-time"><?php echo ($row['blog_date']); ?></span>
                              <p><?php echo (substr($row['blog_content'],0,30).".......");?></p>
                           </div>
						   <?php
			}
			  ?>
                           
                        </div>
                     </div>
                  </div>
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
               </div>
            </div>
         </div>
      </div>
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
</div>
<!-- ============================================================= FOOTER ============================================================= -->
<?php
   require_once "include/footer.php";
   ?>