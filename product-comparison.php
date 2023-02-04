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
				<li class='active'>Compare</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
    <div class="product-comparison">
		<div>
			<h1 class="page-title text-center heading-title">Product Comparison</h1>
			<div class="table-responsive">
				<table class="table compare-table inner-top-vs">


					<tr>
						<th>Products</th>

						<?php
							if(isset($_SESSION['user_id'])){
								$userid = $_SESSION['user_id'];
								$query = "SELECT * FROM comparison WHERE user_id = '$userid'";
    							$connection = mysqli_query($db_connection,$query);
    							while($row = mysqli_fetch_assoc($connection)){

									$product_id = $row['pro_id'];
									$Query = "SELECT * FROM product WHERE pro_id = '$product_id'";
                  					$Connection = mysqli_query($db_connection,$Query);
                  					$dbrow = mysqli_fetch_assoc($Connection);

									  ?>
						<td>
							<div class="product">
								<div class="product-image">
									<div class="image">
										<a href="detail.html">
										    <img alt="" src="admin/img/<?php echo ($dbrow['pro_image']); ?>">
										</a>
									</div>

									<div class="product-info text-left">
										<h3 class="name"><a href="detail.html"><?php echo ($dbrow['pro_name']); ?></a></h3>
										<div class="action">
										    <a class="lnk btn btn-primary" href="post/add_to_cart.php?p_id=<?php echo ($dbrow['pro_id']);?>">Add To Cart</a>
										</div>

									</div>
								</div>
							</div>
						</td>
<?php
								}
							}
							?>

					</tr>

					<tr>
						<th>Price</th>
						<?php
							if(isset($_SESSION['user_id'])){
								$userid = $_SESSION['user_id'];
								$query = "SELECT * FROM comparison WHERE user_id = '$userid'";
    							$connection = mysqli_query($db_connection,$query);
    							while($row = mysqli_fetch_assoc($connection)){

									$product_id = $row['pro_id'];
									$Query = "SELECT * FROM product WHERE pro_id = '$product_id'";
                  					$Connection = mysqli_query($db_connection,$Query);
                  					$dbrow = mysqli_fetch_assoc($Connection);

									  ?>
						<td>
							<div class="product-price">
								<span class="price"> <?php echo("$ ".($dbrow['pro_price']-(($dbrow['pro_disc']/100)*$dbrow['pro_price']))); ?> </span>
								<span class="price-before-discount"><?php echo ("$ ".$dbrow['pro_price']); ?></span>
							</div>
						</td>
<?php
								}
							}
							?>
					</tr>

					<tr>
						<th>Description</th>
						<?php
							if(isset($_SESSION['user_id'])){
								$userid = $_SESSION['user_id'];
								$query = "SELECT * FROM comparison WHERE user_id = '$userid'";
    							$connection = mysqli_query($db_connection,$query);
    							while($row = mysqli_fetch_assoc($connection)){

									$product_id = $row['pro_id'];
									$Query = "SELECT * FROM product WHERE pro_id = '$product_id'";
                  					$Connection = mysqli_query($db_connection,$Query);
                  					$dbrow = mysqli_fetch_assoc($Connection);

									  ?>
						<td><p class="text"><?php echo ($dbrow['pro_description']); ?><p></td>
					<?php
								}
							}
							?>
					</tr>

					<tr>
						 <th>Availability</th>
						 <?php
							if(isset($_SESSION['user_id'])){
								$userid = $_SESSION['user_id'];
								$query = "SELECT * FROM comparison WHERE user_id = '$userid'";
    							$connection = mysqli_query($db_connection,$query);
    							while($row = mysqli_fetch_assoc($connection)){

									$product_id = $row['pro_id'];
									$Query = "SELECT * FROM product WHERE pro_id = '$product_id'";
                  					$Connection = mysqli_query($db_connection,$Query);
                  					$dbrow = mysqli_fetch_assoc($Connection);

									  ?>
						 <td><p class="in-stock"><?php
						 if($dbrow['pro_available']>0){
						  echo ("In Stock");
						 }
						 else{
							echo ("Out of Stock");
						 }
						   ?></p></td>
						 <?php
								}
							}
							?>
					</tr>

					<tr >
						<th>Remove</th>
						<?php
							if(isset($_SESSION['user_id'])){
								$userid = $_SESSION['user_id'];
								$query = "SELECT * FROM comparison WHERE user_id = '$userid'";
    							$connection = mysqli_query($db_connection,$query);
    							while($row = mysqli_fetch_assoc($connection)){

									$product_id = $row['pro_id'];
									$Query = "SELECT * FROM product WHERE pro_id = '$product_id'";
                  					$Connection = mysqli_query($db_connection,$Query);
                  					$dbrow = mysqli_fetch_assoc($Connection);

									  ?>
						<td class='text-center'><a href="product-comparison.php?delete=<?php echo ($dbrow['pro_id']); ?>" class="remove-icon"><i class="fa fa-times"></i></a></td>
						<?php
								}
							}
							?>
					</tr>


				</table>
			</div>
            </div>
		</div>
	</div>
</div>
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
		$query_for_delete = "DELETE FROM comparison WHERE pro_id = '$delete' AND user_id = '$userid'" ;
		$delete_query =mysqli_query($db_connection,$query_for_delete);
	}
	
}
?>