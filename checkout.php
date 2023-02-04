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
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>
   
<form action="post/order_process.php" method="POST" class="info">
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						
							<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Firt Name</label>
	                   <input type="text"  name = "order_fname" class="form-control" placeholder="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
	                	<input type="text"  name = "order_lname" class="form-control" placeholder="">
	                  
	                </div> 
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">State / Country</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="order_state" id="" class="form-control" required>
		                  	<option value="France">France</option>
							<option value="India">India</option>
		                    <option value="Italy">Italy</option>
		                    <option value="Philippines">Philippines</option>
		                    <option value="South Korea">South Korea</option>
		                    <option value="Hongkong">Hongkong</option>
		                    <option value="Japan">Japan</option>
		                  </select>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress" >Street Address</label>
	                  <input type="text" name= "order_address" class="form-control" placeholder="">
	                </div>
		            </div>
		            
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity" >Town / City</label>
	                  <input type="text" name = "order_city" class="form-control" placeholder="">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip" >Postcode / ZIP *</label>
	                  <input type="text" name= "order_zip" class="form-control" placeholder="">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone" >Phone</label>
	                  <input type="text" name = "order_phone" class="form-control" placeholder="">
	                </div>
	              </div>
	              
                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
										<div class="radio">
										  <label class="mr-3"><input type="radio" name="optradio1"> Create an Account? </label>
										  <label><input type="radio" name="optradio1"> Ship to different address</label>
										</div>
									</div>
                </div>
	            </div>
	          <!-- END -->
					</div>
					
<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead>
			<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md"><?php if(isset($_SESSION['subtotal'])){
                                            echo ("$". $_SESSION['subtotal']);
                                            }
                                            else{
                                                echo("$ 0.00");
                                            }
						?></span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">
						<?php if(isset($_SESSION['TOTAL'])){
                	$Total = $_SESSION['TOTAL'];
                  echo ("Rs.". $Total);
                  }
                  else{
                  	echo("Rs. 0.00");
                  } ?>		</span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<!-- <tr>
					<td>
						<div class="cart-checkout-btn pull-right">
						<form method="POST" action="post/checkout_page.php">
							<button type="submit" name ="checkout" class="btn btn-primary checkout-btn">PROCEED TO CHEKOUT</button>
							<span class="">Checkout with multiples address!</span>
							</form>
						</div>
					</td>
				</tr> -->
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->			

	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2" value= "bank transfer" required> Direct Bank Tranfer</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2" value = "cod" required> Cash on Delivery</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2" value= "paypal" required> Paypal</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"required> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
									<p><button type="submit" name= "btn_order" class="btn btn-primary py-3 px-4">Proceed To Checkout</button></p>
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</form>
<?php
   require_once "include/footer.php";
   ?>
</body>
</html>