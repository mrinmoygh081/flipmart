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
				<li class='active'>Blog Details</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					<div class="blog-post wow fadeInUp">
					<?php
            if(isset($_GET['id'])){
              $id = $_GET['id'];
              $query = "SELECT * FROM blog WHERE blog_cat_id = '$id'";
            }
            elseif(isset($_GET['blogid'])){
              $blogid = $_GET['blogid'];
              $query = "SELECT * FROM blog WHERE blog_id = '$blogid'";
            }
            $connection = mysqli_query($db_connection,$query);
            
            while($row = mysqli_fetch_assoc($connection)){
              ?>

	<img class="img-responsive" src="admin/img/<?php echo ($row['blog_image']); ?>" alt="">
	<h1><?php echo ($row['blog_heading']);?></h1>
	<span class="author"><?php echo ($row['blog_auth']); ?></span>
	<span class="review"><?php
		$blog_id = htmlspecialchars($_GET['blogid']);
        $Query = "SELECT * FROM blog_comment WHERE blog_id = $blog_id ORDER BY bc_id DESC LIMIT 6";
		$Connection = mysqli_query($db_connection,$Query);
		$count = mysqli_num_rows($Connection);
		echo($count);	?> Comments</span>
	<span class="date-time"><?php echo ($row['blog_date']); ?></span>
	<p><?php echo ($row['blog_content']);?></p>
	

	<div class="social-media">
		<span>share post:</span>
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href=""><i class="fa fa-rss"></i></a>
		<a href="" class="hidden-xs"><i class="fa fa-pinterest"></i></a>
	</div>
</div>
<div class="blog-post-author-details wow fadeInUp">
	<div class="row">
		<div class="col-md-2">
			<img src="assets/images/testimonials/member3.png" alt="Responsive image" class="img-circle img-responsive">
		</div>
		<div class="col-md-10">
			<h4><?php echo ($row['blog_auth']);?></h4>
			<div class="btn-group author-social-network pull-right">
				<span>Follow me on</span>
			    <button type="button" class="dropdown-toggle" data-toggle="dropdown">
			    	<i class="twitter-icon fa fa-twitter"></i>
			    	<span class="caret"></span>
			    </button>
			    <ul class="dropdown-menu" role="menu">
			    	<li><a href="#"><i class="icon fa fa-facebook"></i>Facebook</a></li>
			    	<li><a href="#"><i class="icon fa fa-linkedin"></i>Linkedin</a></li>
			    	<li><a href=""><i class="icon fa fa-pinterest"></i>Pinterst</a></li>
			    	<li><a href=""><i class="icon fa fa-rss"></i>RSS</a></li>
			    </ul>
			</div>
			<span class="author-job">Web Designer</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
		</div>
	</div>
</div>
<?php
            }
            ?>
					<div class="blog-review wow fadeInUp">
	<div class="row">
	<?php
		$blog_id = htmlspecialchars($_GET['blogid']);
        $Query = "SELECT * FROM blog_comment WHERE blog_id = $blog_id ORDER BY bc_id DESC LIMIT 6";
		$Connection = mysqli_query($db_connection,$Query);
		$count = mysqli_num_rows($Connection);
			?>
		<div class="col-md-12">
			<h3 class="title-review-comments"><?php echo($count); ?> comments</h3>
		</div>

		<?php
		$blog_id = htmlspecialchars($_GET['blogid']);
        $Query = "SELECT * FROM blog_comment WHERE blog_id = $blog_id ORDER BY bc_id DESC LIMIT 6";
		$Connection = mysqli_query($db_connection,$Query);
		$count = mysqli_num_rows($Connection);
        while($row = mysqli_fetch_assoc($Connection))
        {
			?>

		<div class="col-md-2 col-sm-2">
			<img src="assets/images/testimonials/member4.png" alt="Responsive image" class="img-rounded img-responsive">
		</div>
		<div class="col-md-10 col-sm-10">
			<div class="blog-comments inner-bottom-xs outer-bottom-xs">
				<h4><?php echo($row['name']); ?></h4>
				<span class="review-action pull-right">
				<?php echo($row['date']); ?>
				</span>
				<p><?php echo($row['comment']); ?></p>
			</div>
		</div>



<?php
		}
		?>
	</div>
</div>					<div class="blog-write-comment outer-bottom-xs outer-top-xs">
	<div class="row">
	<?php if(isset($_SESSION['comment'])){
		echo ($_SESSION['comment']);
		unset($_SESSION['comment']);
	} ?>
		<div class="col-md-12">
			<h4>Leave A Comment</h4>
		</div>

<form action = "post/blog_comment.php" method = "POST">
		<div class="col-md-4">			
				<div class="form-group">
			    <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
			    <input type="text" name = "cmt_name" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
			  </div>
		</div>
		<div class="col-md-4">
				<div class="form-group">
			    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
			    <input type="email" name = "cmt_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
				<input type = "hidden" name = "blog_id" value = "<?php if(isset($_GET['blogid'])){ echo $_GET['blogid'];} ?>">
			  </div>
		</div>
		<div class="col-md-4">			
				<div class="form-group">
			    <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
			    <input type="text" name = "cmt_title" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="">
			  </div>
		</div>
		<div class="col-md-12">
				<div class="form-group">
			    <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
			    <textarea name = "cmt_comments" class="form-control unicase-form-control" id="exampleInputComments" ></textarea>
			  </div>
		</div>
		<div class="col-md-12 outer-bottom-small m-t-20">
			<button type="submit" name = "cmt_submit" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
		</div>

</form>


	</div>
</div>
				</div>
				<div class="col-md-3 sidebar">
                
                
                
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
    <form>
        <div class="control-group">
            <input placeholder="Type to search" class="search-field">
            <a href="#" class="search-button"></a>   
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
	            
</div><!-- /.sidebar-widget -->
	<!-- ============================================== CATEGORY : END ============================================== -->						<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
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
		</div><!-- /.tag-list -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ============================================================= FOOTER ============================================================= -->
<?php
require_once "include/footer.php";
?>
