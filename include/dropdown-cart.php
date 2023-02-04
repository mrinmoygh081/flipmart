<div class="dropdown dropdown-cart">
		<a href="shopping-cart.php" class="dropdown-toggle lnk-cart" >
			<div class="items-cart-inner">
            <div class="basket">
					<i class="glyphicon glyphicon-shopping-cart"></i>
				</div>
				<div class="basket-item-count"><span class="count"><?php
			  if(isset($_SESSION['cart'])){
				 $count = count($_SESSION['cart']);
				 echo $count;
			  }
			  elseif(isset($_SESSION['user_id'])){
				$userid = $_SESSION['user_id'];
				$Query = "SELECT * FROM cart WHERE user_id = $userid";
				$Connection = mysqli_query($db_connection,$Query);
				$count = mysqli_num_rows($Connection);
				echo $count;

			  }
			  ?></span></div>
				<div class="total-price-basket">
					<span class="lbl">cart -</span>
					<span class="total-price">
						<span class="sign">$</span><span class="value"><?php 
						if(isset($_SESSION['TOTAL'])){
							echo($_SESSION['TOTAL']);
						}
						else {
							require_once "db.php";
							
							if(isset($_SESSION['cart'])){
								foreach($_SESSION['cart'] as $key=>$value){
									$Query = "SELECT * FROM product WHERE pro_id = '$key'";
									$Connection = mysqli_query($db_connection,$Query);
									$dbrow = mysqli_fetch_assoc($Connection);
									echo $total = ($dbrow['pro_price']*$value['p_quan']); 
								}
							}
							elseif(isset($_SESSION['user_id'])){
								$userid = $_SESSION['user_id'];
								$query = "SELECT * FROM cart WHERE user_id = '$userid'";
								$connection = mysqli_query($db_connection,$query);
								while($row = mysqli_fetch_assoc($connection)){
								
									$product_id = $row['pro_id'];
									$Query = "SELECT * FROM product WHERE pro_id = '$product_id'";
									$Connection = mysqli_query($db_connection,$Query);
									$dbrow = mysqli_fetch_assoc($Connection);

									echo $total = ($dbrow['pro_price']*$row['pro_quan']);
											}
										}
						}
						?></span>
					</span>
				</div>
				
			
		    </div>
		</a>
		<ul class="dropdown-menu">
			<li>
				<div class="cart-item product-summary">
					<div class="row">
						<div class="col-xs-4">
							<div class="image">
								<a href="detail.html"><img src="assets/images/cart.jpg" alt=""></a>
							</div>
						</div>
						<div class="col-xs-7">
							
							<h3 class="name"><a href="index.php?page-detail">Simple Product</a></h3>
							<div class="price">$600.00</div>
						</div>
						<div class="col-xs-1 action">
							<a href="#"><i class="fa fa-trash"></i></a>
						</div>
					</div>
				</div><!-- /.cart-item -->
				<div class="clearfix"></div>
			<hr>
		
			<div class="clearfix cart-total">
				<div class="pull-right">
					
						<span class="text">Sub Total :</span><span class='price'>$600.00</span>
						
				</div>
				<div class="clearfix"></div>
					
				<a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>	
			</div><!-- /.cart-total-->
					
				
		</li>
		</ul><!-- /.dropdown-menu-->
	</div><!-- /.dropdown-cart -->

<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
			</div><!-- /.row -->

		</div><!-- /.container -->

	</div><!-- /.main-header -->

	<!-- ============================================== NAVBAR ============================================== -->