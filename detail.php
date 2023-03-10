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

<!-- ===== ======== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Clothing</a></li>
				<li class='active'>Floral Print Buttoned</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
				<div class="home-banner outer-top-n">
<img src="assets/images/banners/LHS-banner.jpg" alt="Image">
</div>		
  
    
    
    	<!-- ============================================== HOT DEALS ============================================== -->
<div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
	<h3 class="section-title">hot deals</h3>
	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">

	<?php
          $query = "SELECT * FROM product ORDER BY pro_disc DESC LIMIT 3";
          $connection = mysqli_query($db_connection,$query);
          while($Row = mysqli_fetch_assoc($connection))
          {

?>
		
														<div class="item">
					<div class="products">
						<div class="hot-deal-wrapper">
							<div class="image">
								<img src="admin/img/<?php echo($Row['pro_image']); ?>" alt="">
							</div>
							<div class="sale-offer-tag"><span><?php echo($Row['pro_disc']); ?>%<br>off</span></div>
							<div class="timing-wrapper">
								<div class="box-wrapper">
									<div class="date box">
										<span class="key">120</span>
										<span class="value">Days</span>
									</div>
								</div>
				                
				                <div class="box-wrapper">
									<div class="hour box">
										<span class="key">20</span>
										<span class="value">HRS</span>
									</div>
								</div>

				                <div class="box-wrapper">
									<div class="minutes box">
										<span class="key">36</span>
										<span class="value">MINS</span>
									</div>
								</div>

				                <div class="box-wrapper hidden-md">
									<div class="seconds box">
										<span class="key">60</span>
										<span class="value">SEC</span>
									</div>
								</div>
							</div>
						</div><!-- /.hot-deal-wrapper -->

						<div class="product-info text-left m-t-20">
							<h3 class="name"><a href="detail.php?id=<?php echo($Row['pro_id']); ?>"><?php echo($Row['pro_name']); ?></a></h3>
							<div class="rating rateit-small"></div>

							<div class="product-price">	
								<span class="price">
								<?php echo("$ ".($Row['pro_price']-(($Row['pro_disc']/100)*$Row['pro_price']))); ?>
								</span>
									
							    <span class="price-before-discount"><?php echo("$ ".$Row['pro_price']); ?></span>					
							
							</div><!-- /.product-price -->
							
						</div><!-- /.product-info -->

						<div class="cart clearfix animate-effect">
							<div class="action">
								
								<div class="add-cart-button btn-group">


								<form action = "post/add_to_cart.php" method = "GET">
                                 <button class="btn btn-primary icon" data-toggle="dropdown" type="submit"> <i class="fa fa-shopping-cart"></i> </button>
                                 <input type = "hidden" name = "p_id" value = "<?php $_SESSION['after_add_to_cart'] = 3; echo ($Row['pro_id']); ?>">
                                 
                                 <button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
                                 </form>
															


								</div>
								
							</div><!-- /.action -->
						</div><!-- /.cart -->
					</div>	
					</div>		        
						
	    <?php
		  }
		  ?>
    </div><!-- /.sidebar-widget -->
</div>
<!-- ============================================== HOT DEALS: END ============================================== -->					

<!-- ============================================== NEWSLETTER ============================================== -->
<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
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
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== NEWSLETTER: END ============================================== -->

<!-- ============================================== Testimonials============================================== -->
<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
	<div id="advertisement" class="advertisement">
        <div class="item">
            <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
		<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

         <div class="item">
         	<div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
		<div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>    
        </div><!-- /.item -->

        <div class="item">
            <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
		<div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		<div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->

    </div><!-- /.owl-carousel -->
</div>
    
<!-- ============================================== Testimonials: END ============================================== -->

 

				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">
	<div id="owl-single-product">
	<?php
if(isset($_GET['id'])){
	$id = htmlspecialchars($_GET['id']);
          $query = "SELECT * FROM product WHERE pro_id = '$id'";
          $connection = mysqli_query($db_connection,$query);
          $row = mysqli_fetch_assoc($connection);
          ?>
		  <div class="single-product-gallery-item" id="<?php echo($row['pro_id']); ?>">
                <a data-lightbox="image-1" data-title="Gallery" href="admin/img/<?php echo($row['pro_image']); ?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/img/<?php echo($row['pro_image']); ?>" />
                </a>
            </div><!-- /.single-product-gallery-item -->
		  <?php
		  $proquery = "SELECT * FROM product_image WHERE pro_id = '$id'";
		  $pconnection = mysqli_query($db_connection,$proquery);
		  $i = 1;
		  while($prow = mysqli_fetch_assoc($pconnection))
			  {
?>


        
            <div class="single-product-gallery-item" id="<?php echo($prow['pro_im_id']); ?>">
                <a data-lightbox="image-1" data-title="Gallery" href="admin/img/<?php echo($prow['pro_image']); ?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/img/<?php echo($prow['pro_image']); ?>" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            

        

<?php 
			  }
			  ?>
			  </div><!-- /.single-product-slider -->
        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">

			<?php
            $Query = "SELECT * FROM product WHERE pro_id = '$id'";
            $Connection = mysqli_query($db_connection,$Query);
			$Row = mysqli_fetch_assoc($Connection);
			?>
			 <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#<?php echo($Row['pro_id']); ?>">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="admin/img/<?php echo($Row['pro_image']); ?>" />
                    </a>
                </div>
			<?php
		$cat_id = $Row['pro_gid'];
		$Proquery = "SELECT * FROM product_image WHERE pro_id = '$id' ORDER BY RAND()";
		$Pconnection = mysqli_query($db_connection,$Proquery);
		$i = 1;
        while($Prow = mysqli_fetch_assoc($Pconnection))
            {
            ?>
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="<?php echo($i++); ?>" href="#<?php echo($Prow['pro_im_id']); ?>">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="admin/img/<?php echo($Prow['pro_image']); ?>" />
                    </a>
                </div>

<?php
			}
			?>

				
            </div><!-- /#owl-single-product-thumbnails -->
        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->  




					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name"><?php echo($row['pro_name']); ?></h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										<div class="rating rateit-small"></div>
									</div>
									<div class="col-sm-8">
										<div class="reviews">
											<a href="all_review.php?id=<?php echo $id; ?>" class="lnk"><?php 
                  $query = "SELECT rate_price FROM review WHERE pro_id = '$id'";
                  $connection = mysqli_query($db_connection,$query);
                  $count = mysqli_num_rows($connection);
                  echo $count." "; 
                  ?> Rating</a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value"><?php
											if($row['pro_available']>0){
											 echo("In Stock"); 
											}
											else {
												echo("Not in Stock");
											}?></span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
							<?php echo($row['pro_description']); ?>
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											<span class="price"><?php echo("$ ".($row['pro_price']-(($row['pro_disc']/100)*$row['pro_price']))); ?></span>
											<span class="price-strike"><?php echo("$ ".$row['pro_price']); ?></span>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="post/add_to_wishlist.php?p_id=<?php 
									echo ($row['pro_id']);
									$_SESSION['after_add_to_wishlist'] = 3;
									?>">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="post/add_to_compare.php?p_id=<?php
									$_SESSION['after_add_to_compare'] = 3;
									 echo ($row['pro_id']);
									 ?>">
											   <i class="fa fa-signal"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->

							<div class="quantity-container info-container">
								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">Qty :</span>
									</div>
									<form method = "GET" action = "post/add_to_cart.php">
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
											<input type = "hidden" name = "p_id" value = "<?php echo ($row['pro_id']); ?>">
								                <input type="number" name="p_quan" value="1">
							              </div>
							            </div>
									</div>

									<div class="col-sm-7">
										<input type = "submit" name = "cart_btn" value = "ADD TO CART" class="btn btn-primary"> 
									</div>
</form>
									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->

							
<?php
}
?>
							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->


				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
								<li><a data-toggle="tab" href="#tags">TAGS</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text"><?php echo($row['pro_description']); ?></p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>

											<div class="reviews">
												<div class="review">
													<div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
													<div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
																										</div>
											
											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->
										

										<form role="form" action = "post/review.php" method = "POST" class="cnt-form">
										<div class="product-add-review">
											<h4 class="title">Write your own review</h4>
											<div class="review-table">
												<div class="table-responsive">
													<table class="table">	
														<thead>
															<tr>
																<th class="cell-label">&nbsp;</th>
																<th>1 star</th>
																<th>2 stars</th>
																<th>3 stars</th>
																<th>4 stars</th>
																<th>5 stars</th>
															</tr>
														</thead>	
														<tbody>
															<tr>
																<td class="cell-label">Quality</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Price</td>
																<td><input type="radio" name="price" class="radio" value="1"></td>
																<td><input type="radio" name="price" class="radio" value="2"></td>
																<td><input type="radio" name="price" class="radio" value="3"></td>
																<td><input type="radio" name="price" class="radio" value="4"></td>
																<td><input type="radio" name="price" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Value</td>
																<td><input type="radio" name="value" class="radio" value="1"></td>
																<td><input type="radio" name="value" class="radio" value="2"></td>
																<td><input type="radio" name="value" class="radio" value="3"></td>
																<td><input type="radio" name="value" class="radio" value="4"></td>
																<td><input type="radio" name="value" class="radio" value="5"></td>
															</tr>
														</tbody>
													</table><!-- /.table .table-bordered -->
												</div><!-- /.table-responsive -->
											</div><!-- /.review-table -->
											
											<div class="review-form">
												<div class="form-container">
													
														
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="exampleInputName">Your Name <span class="astk">*</span></label>
																	<input type="text" name = "name" class="form-control txt" id="exampleInputName" placeholder="">
																</div><!-- /.form-group -->
																<div class="form-group">
																	<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																	<input type="text" name = "summary" class="form-control txt" id="exampleInputSummary" placeholder="">
																</div><!-- /.form-group -->
																<input type = "hidden" name = "pro_id" value = "<?php $_SESSION['product_id'] = $_GET['id']; echo ($_GET['id']);?>">
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span class="astk">*</span></label>
																	<textarea class="form-control txt txt-review" name = "review" id="exampleInputReview" rows="4" placeholder=""></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														
														<div class="action text-right">
															<button type = "submit" name = "submit_review" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->

													<!-- /.cnt-form -->
												</div><!-- /.form-container -->
											</div><!-- /.review-form -->

										</div><!-- /.product-add-review -->	

										</form>

										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

								<div id="tags" class="tab-pane">
									<div class="product-tag">
										
										<h4 class="title">Product Tags</h4>
										<form role="form" action = "post/tags.php" method = "POST" class="form-inline form-cnt">
											<div class="form-container">
									
												<div class="form-group">
													<label for="exampleInputTag">Add Your Tags: </label>
													<input type="text" id="exampleInputTag" name = "txt_tags" class="form-control txt">
													<input type = "hidden" name = "pro_id" value = "<?php $_SESSION['product_id'] = $_GET['id']; echo ($_GET['id']);?>">

												</div>

												<button class="btn btn-upper btn-primary" name = "btn_tags" type="submit">ADD TAGS</button>
											</div><!-- /.form-container -->
										</form><!-- /.form-cnt -->

										<form role="form" class="form-inline form-cnt">
											<div class="form-group">
												<label>&nbsp;</label>
												<span class="text col-md-offset-3">Use spaces to separate tags.</span>
											</div>
										</form><!-- /.form-cnt -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
   <h3 class="section-title">upsell products</h3>
   <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">


   <?php
                      $Query = "SELECT product_id, COUNT(product_id) AS MOST_FREQUENT FROM order_product GROUP BY product_id ORDER BY COUNT(product_id) DESC";
                      $Connection = mysqli_query($db_connection,$Query);
                      while($row = mysqli_fetch_assoc($Connection)){
                        $id = $row['product_id'];
 
                       $query = "SELECT * FROM product WHERE pro_id = $id";
                       $connection = mysqli_query($db_connection,$query);
                       $Row = mysqli_fetch_assoc($connection);
                     ?>



      <div class="item item-carousel">
         <div class="products">
            <div class="product">
               <div class="product-image">
                  <div class="image">
                     <a href="detail.html"><img height =200 width = 200 src="admin/img/<?php echo ($Row['pro_image']); ?>" alt=""></a>
                  </div>
                  <!-- /.image -->			
                  <div class="tag sale"><span>sale</span></div>
               </div>
               <!-- /.product-image -->
               <div class="product-info text-left">
                  <h3 class="name"><a href="detail.php?id=<?php echo($Row['pro_id']); ?>"><?php echo ($Row['pro_name']); ?></a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="description"></div>
                  <div class="product-price">	
                     <span class="price">
                     <?php echo("$ ".($Row['pro_price']-(($Row['pro_disc']/100)*$Row['pro_price']))); ?></span> 
                     <span class="price-before-discount"><?php echo("$ ".$Row['pro_price']); ?></span>
                  </div>
                  <!-- /.product-price -->
               </div>
               <!-- /.product-info -->
               <div class="cart clearfix animate-effect">
                  <div class="action">
                     <ul class="list-unstyled">


					 <li class="add-cart-button btn-group">
                            <a data-toggle="tooltip" href ="post/add_to_cart.php?p_id=<?php
                           $_SESSION['after_add_to_cart'] = 3;
                             echo ($Row['pro_id']);
                          ?>" class="btn btn-primary icon" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="post/add_to_wishlist.php?p_id=<?php 
                        echo ($Row['pro_id']);
                         $_SESSION['after_add_to_wishlist'] = 3;
                         ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="post/add_to_compare.php?p_id=<?php
                       $_SESSION['after_add_to_compare'] = 3;
                     echo ($Row['pro_id']);
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
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->

























		<!-- ==== ================== BRANDS CAROUSEL ============================================== -->
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
<!-- == = BRANDS CAROUSEL : END = -->	</div><!-- /.container -->
</div><!-- /.body-content -->

<!-- ============================================================= FOOTER ============================================================= -->
<?php
require_once "include/footer.php";
?>
    </body>
</html>
