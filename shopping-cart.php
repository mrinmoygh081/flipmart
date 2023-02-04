<?php
session_start();
ob_start();
   require_once "include/db.php";
   require_once "include/header.php";
   require_once "include/topbar.php";
   require_once "include/search-area.php";
   require_once "include/dropdown-cart.php";
   require_once "include/navbar.php";
   $subtotal = 0;
   ?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
   <div class="container">
      <div class="breadcrumb-inner">
         <ul class="list-inline list-unstyled">
            <li><a href="#">Home</a></li>
            <li class='active'>Shopping Cart</li>
         </ul>
      </div>
      <!-- /.breadcrumb-inner -->
   </div>
   <!-- /.container -->
</div>
<!-- /.breadcrumb -->



<div class="body-content outer-top-xs">
   <div class="container">
      <div class="row ">
         <div class="shopping-cart">
            <div class="shopping-cart-table ">
               <div class="table-responsive">
               <form action = "post/update_cart.php" method = "POST">
                  <table class="table">
                     <thead>
                        <tr>
                           <th class="cart-romove item">Remove</th>
                           <th class="cart-description item">Image</th>
                           <th class="cart-product-name item">Product Name</th>
                           <th class="cart-qty item">Quantity</th>
                           <th class="cart-sub-total item">Product Price</th>
                           <th class="cart-total last-item">Grandtotal</th>
                        </tr>
                     </thead>
                     <!-- /thead -->
                     <tfoot>
                        <tr>
                           <td colspan="7">
                              <div class="shopping-cart-btn">
                                 <span class="">
                                 <a href="index.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                 <button type = "submit" name = "btn_update" class="btn btn-upper btn-primary outer-left-xs" >Update shopping cart</button>
                                 
                                 </span>
                              </div>
                              <!-- /.shopping-cart-btn -->
                           </td>
                        </tr>
                     </tfoot>
                     <tbody>
                        <?php
                           if(isset($_SESSION['cart'])){
                           	foreach($_SESSION['cart'] as $key=>$value){
                           		$Query = "SELECT * FROM product WHERE pro_id = '$key'";
                                      					$Connection = mysqli_query($db_connection,$Query);
                                      					$dbrow = mysqli_fetch_assoc($Connection);
                           ?>
                           <tr>
                           <?php
if(isset($_SESSION['cart_error'])){
   unset($_SESSION['cart_error']);
?>
<div class="container">
  
  <div class="alert alert-success">
    <strong><?php echo ($dbrow['pro_name']); ?> already in the cart</strong></a>.
  </div>

</div>

<?php
}
?>
                           </tr>
                        <tr>
                           <td class="romove-item"><a href="shopping-cart.php?delete=<?php echo ($dbrow['pro_id']); ?>" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
                           <td class="cart-image">
                              <a class="entry-thumbnail" href="detail.php?id=<?php echo ($dbrow['pro_id']); ?>">
                              <img src="admin/img/<?php echo ($dbrow['pro_image']); ?>" alt="">
                              </a>
                           </td>
                           <td class="cart-product-name-info">
                              <h4 class='cart-product-description'><a href="detail.html"><?php echo ($dbrow['pro_name']); ?></a></h4>
                              <div class="row">
                                 <div class="col-sm-4">
                                    <div class="rating rateit-small"></div>
                                 </div>
                                 <div class="col-sm-8">
                                    <div class="reviews">
                                       (06 Reviews)
                                    </div>
                                 </div>
                              </div>
                              <!-- /.row -->
                           </td>
                           <td class="cart-product-quantity">
                              <div class="quant-input">
                                 <input type="number" name = "<?php echo($key);?>" value="<?php echo $value['p_quan']?>">
                              </div>
                           </td>
                           <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php  
                              echo ("$ ".$dbrow['pro_price']);
                              ?></span></td>
                           <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php 
                              $total = ($dbrow['pro_price']*$value['p_quan']); 
                              echo "$ ".$total;
                              $subtotal += $total;
                              ?></span></td>
                        </tr>
                        <?php
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
                           ?>
                           <tr>
                           <?php
if(isset($_SESSION['cart_error'])){
   unset($_SESSION['cart_error']);
?>
<div class="container">
  
  <div class="alert alert-success">
    <strong><?php echo ($dbrow['pro_name']); ?> already in the cart</strong></a>.
  </div>

</div>

<?php
}
?>
                           </tr>
                        <tr>
                           <td class="romove-item"><a href="shopping-cart.php?delete=<?php echo ($dbrow['pro_id']); ?>" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
                           <td class="cart-image">
                              <a class="entry-thumbnail" href="detail.php?id=<?php echo ($dbrow['pro_id']); ?>">
                              <img src="admin/img/<?php echo ($dbrow['pro_image']); ?>" alt="">
                              </a>
                           </td>
                           <td class="cart-product-name-info">
                              <h4 class='cart-product-description'><a href="detail.html"><?php echo ($dbrow['pro_name']); ?></a></h4>
                              <div class="row">
                                 <div class="col-sm-4">
                                    <div class="rating rateit-small"></div>
                                 </div>
                                 <div class="col-sm-8">
                                    <div class="reviews">
                                       (06 Reviews)
                                    </div>
                                 </div>
                              </div>
                              <!-- /.row -->
                           </td>
                           <td class="cart-product-quantity">
                              <div class="quant-input">
                                 <input type="number" name = "<?php echo $row['pro_id'];?>" value="<?php echo $row['pro_quan']?>">
                              </div>
                           </td>
                           <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php  
                              echo ("$ ".$dbrow['pro_price']);
                              ?></span></td>
                           <td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php 
                              $total = ($dbrow['pro_price']*$row['pro_quan']); 
                              echo "$ ".$total;
                              $subtotal += $total;
                              ?></span></td>
                        </tr>
                        <?php
                           }
                           }
                           ?>
                     </tbody>
                     <!-- /tbody -->
                  </table>
                  </form>
                  <!-- /table -->
               </div>
            </div>
            <!-- /.shopping-cart-table -->				
            <div class="col-md-4 col-sm-12 estimate-ship-tax">
               <table class="table">
                  <thead>
                     <tr>
                        <th>
                           <span class="estimate-title">Estimate shipping and tax</span>
                           <p>Enter your destination to get shipping and tax.</p>
                        </th>
                     </tr>
                  </thead>
                  <!-- /thead -->
                  <tbody>
                  <form action="post/delivery_charge.php" method = "POST">
                     <tr>
                        <td>
                           <div class="form-group">
                              <label class="info-title control-label">Country <span>*</span></label>
                              <select class="form-control unicase-form-control selectpicker">
                                 <option>--Select options--</option>
                                 <option>India</option>
                                 <option>SriLanka</option>
                                 <option>united kingdom</option>
                                 <option>saudi arabia</option>
                                 <option>united arab emirates</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label class="info-title control-label">State/Province <span>*</span></label>
                              <select name = "estimate_state" class="form-control unicase-form-control selectpicker">
                                 
                                 <?php
				  $getCat = "SELECT * FROM d_charge";
				  $data = mysqli_query($db_connection,$getCat);
				  echo "<option value=''>Select State</option>";
				  while($row = mysqli_fetch_assoc($data)){
					
					echo "<option value=".$row['charge'].">".$row['state']."</option>";

				  }
				  ?>
                              </select>
                           </div>
                           <div class="form-group">
                              <label class="info-title control-label">Zip/Postal Code</label>
                              <input type="text" class="form-control unicase-form-control text-input" placeholder="">
                           </div>
                           <div class="pull-right">
                              <button type="submit" name = "btn_estimate" class="btn-upper btn btn-primary">GET A QOUTE</button>
                           </div>
                        </td>
                     </tr>
                     </form>
                  </tbody>
               </table>
            </div>
            <!-- /.estimate-ship-tax -->
            <div class="col-md-4 col-sm-12 estimate-ship-tax">
               <table class="table">
                  <thead>
                     <tr>
                        <th>
                           <span class="estimate-title">Discount Code</span>
                           <p>Enter your coupon code if you have one..</p>
                           <?php
						if(isset($_SESSION['coupon_error'])){
							echo ("<p>".$_SESSION['coupon_error']."</p>");
							unset($_SESSION['coupon_error']);
						}
						?>
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                  <form action="post/coupon.php" method = "POST">
                     <tr>
                        <td>
                           <div class="form-group">
                              <input type="text" name = "txt_coupon" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                           </div>
                           <div class="clearfix pull-right">
                              <button type="submit" name = "btn_coupon" class="btn-upper btn btn-primary">APPLY COUPON</button>
                           </div>
                        </td>
                     </tr>
                     </form>
                  </tbody>
                  <!-- /tbody -->
               </table>
               <!-- /table -->
            </div>
            <!-- /.estimate-ship-tax -->
            <div class="col-md-4 col-sm-12 cart-shopping-total">
               <table class="table">
                  <thead>
                     <tr>
                        <th>
                           <div class="cart-sub-total">
                              Subtotal<span class="inner-left-md"><?php echo ("$ ".$subtotal); ?></span>
                           </div>
                           <div class="cart-grand-total">
                              Grand Total<span class="inner-left-md"><?php 
                              if($subtotal == 0){
                                 $d_charge = 0;
                                
                              }
                              else{
                              if(isset($_SESSION['charge']))
                              {
                                 $d_charge = $_SESSION['charge'];
                               
                              }
                              else{
                                 $d_charge = 0.00;
                                 
                              }}
                              if($subtotal == 0){
                                 $discount = 0;
                                 
                              }
                              else{
                              if(isset($_SESSION['coupon_discount'])){
                                 $discount = ($subtotal * (10/100))+$_SESSION['coupon_discount'];
                                 
                              }
                              else {
                                 $discount = $subtotal * (10/100);
                              }
                           }
							$TOTAL = $subtotal+$d_charge-$discount;
							$_SESSION['subtotal'] = $subtotal;
							$_SESSION['d_charge'] = $d_charge;
							$_SESSION['discount'] = $discount;
							$_SESSION['TOTAL'] = $TOTAL;
							echo ("$ ".$TOTAL); ?></span>
                           </div>
                           <?php
                           if(isset($_SESSION['coupon_discount'])){
                              echo ("<br>(Coupon applied!!)");
                           }
                           ?>
                        </th>
                     </tr>
                  </thead>
                  <!-- /thead -->
                  <tbody>
                     <tr>
                        <td>
                           <div class="cart-checkout-btn pull-right">
                           <form action = "post/checkout_btn.php" method = "POST">
                              <button type="submit" name = "btn_check" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
                              </form>
                              <span class="">Checkout with multiples address!</span>
                           </div>
                        </td>
                     </tr>
                  </tbody>
                  <!-- /tbody -->
               </table>
               <!-- /table -->
            </div>
            <!-- /.cart-shopping-total -->			
         </div>
         <!-- /.shopping-cart -->
      </div>
      <!-- /.row -->
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
   <!-- /.container -->
</div>
<!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
<?php
   require_once "include/footer.php";
   ?>
</body>
</html>
<?php
   if(isset($_GET['delete'])){
   	if(isset($_SESSION['user_id'])){
   		$userid = $_SESSION['user_id'];
   		$delete = $_GET['delete'];
   		$query_for_delete = "DELETE FROM cart WHERE pro_id = '$delete' AND user_id = '$userid'" ;
   		$delete_query =mysqli_query($db_connection,$query_for_delete);
   	}
   	else{
   	unset($_SESSION['cart'][$_GET['delete']]);
   	}
   }
   ?>