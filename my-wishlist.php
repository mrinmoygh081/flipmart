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
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Wishlist</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4" class="heading-title">My Wishlist</th>
				</tr>
			</thead>
			<tbody>
			<?php
							if(isset($_SESSION['user_id'])){
								$userid = $_SESSION['user_id'];
								$query = "SELECT * FROM wishlist WHERE user_id = '$userid'";
    							$connection = mysqli_query($db_connection,$query);
    							while($row = mysqli_fetch_assoc($connection)){

									$product_id = $row['pro_id'];
									$Query = "SELECT * FROM product WHERE pro_id = '$product_id'";
                  					$Connection = mysqli_query($db_connection,$Query);
                  					$dbrow = mysqli_fetch_assoc($Connection);

									  ?>
									  <tr>
                           <?php
if(isset($_SESSION['wishlist'])){
   unset($_SESSION['wishlist']);
?>
<div class="container">
  
  <div class="alert alert-success">
    <strong><?php echo ($dbrow['pro_name']); ?> already in the wishlist</strong></a>.
  </div>

</div>

<?php
}
?>
                           </tr>
				<tr>
					<td class="col-md-2"><img src="admin/img/<?php echo ($dbrow['pro_image']); ?>" alt="imga"></td>
					<td class="col-md-7">
						<div class="product-name"><a href="#"><?php echo ($dbrow['pro_name']); ?></a></div>
						<div class="rating">
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star non-rate"></i>
							<span class="review">( 06 Reviews )</span>
						</div>
						<div class="price">
						<?php echo("$ ".($dbrow['pro_price']-(($dbrow['pro_disc']/100)*$dbrow['pro_price']))); ?>
							<span><?php echo ("$ ".$dbrow['pro_price']); ?></span>
						</div>
					</td>
					<td class="col-md-2">
						<a href="post/add_to_cart.php?p_id=<?php echo ($dbrow['pro_id']);?>" class="btn-upper btn btn-primary">Add to cart</a>
					</td>
					<td class="col-md-1 close-btn">
						<a href="my-wishlist.php?delete=<?php echo ($dbrow['pro_id']); ?>" class=""><i class="fa fa-times"></i></a>
					</td>
				</tr>
				<?php
								}
							}
							?>
			</tbody>
		</table>
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
<?php
require_once "include/footer.php";
?>
<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
    </script>
    </body>
</html>
<?php
if(isset($_GET['delete'])){
	if(isset($_SESSION['user_id'])){
		$userid = $_SESSION['user_id'];
		$delete = $_GET['delete'];
		$query_for_delete = "DELETE FROM wishlist WHERE pro_id = '$delete' AND user_id = '$userid'" ;
		$delete_query =mysqli_query($db_connection,$query_for_delete);
	}
	
}
?>