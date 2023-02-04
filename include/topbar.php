<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">
					
					<li><a href="my-wishlist.php"><i class="icon fa fa-heart"></i>Wishlist</a></li>
					<li><a href="shopping-cart.php"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
					<li><a href="product-comparison.php"><i class="icon fa fa-signal"></i>Compare</a></li>
					<?php
					if(isset($_SESSION['user_id'])){
					?>
					<li><a href="sign-in.php?logoutid=<?php echo ($_SESSION['user_id']); ?>"><i class="icon fa fa-lock"></i>Logout</a></li>
					<?php
					}
					else{
					?>
					<li><a href="sign-in.php"><i class="icon fa fa-lock"></i>Login</a></li>
					<?php
					}
					?>

				</ul>
			</div><!-- /.cnt-account -->

			<div class="cnt-block">
				<ul class="list-unstyled list-inline">
					

					
				</ul><!-- /.list-unstyled -->
			</div><!-- /.cnt-cart -->
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->
<!-- ============================================== TOP MENU : END ============================================== -->
	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
					<!-- ============================================================= LOGO ============================================================= -->
<div class="logo">
	<a href="index.php">
		
		<img src="assets/images/logo.png" alt="">

	</a>
</div><!-- /.logo -->
<!-- ============================================================= LOGO : END ============================================================= -->				</div><!-- /.logo-holder -->

				<div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
					<!-- /.contact-row -->
<!-- ============================================================= SEARCH AREA ============================================================= -->
