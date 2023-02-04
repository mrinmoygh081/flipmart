<?php
session_start();
ob_start();
require_once "include/db.php";
require_once "include/header.php";
if(isset($_SESSION['admin_id'])){
echo "<body id='page-top'>";
echo "<div id='wrapper'>";
require_once "include/navbar.php";
echo "<div id='content-wrapper' class='d-flex flex-column'>";
echo "<div id='content'>";
require_once "include/topbar.php";



if(isset($_GET['id'])){
    $pro_id = $_GET['id'];
    
    $getQuery = "SELECT * FROM product WHERE pro_id = $pro_id";
    $pro_data = mysqli_query($db_connection,$getQuery);
    $pro_row = mysqli_fetch_assoc($pro_data);
    $pro_name =  $pro_row['pro_name'];
    $pro_image = $pro_row['pro_image'];
    $pro_price = $pro_row['pro_price'];
    $pro_disc = $pro_row['pro_disc'];
    $pro_description = $pro_row['pro_description'];
    $pro_available = $pro_row['pro_available'];
    $pro_cat_id = $pro_row['pro_gid'];
    //unset($_GET['id']);
}
?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Product Page</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active" aria-current="page">Add Product Page</li>
            </ol>
          </div>
          <?php
         if (isset($_SESSION['product'])){
           unset($_SESSION['product']);
          echo "<div class='alert alert-success alert-dismissible' role='alert'>";
             echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
               echo "<span aria-hidden='true'>&times;</span>";
                 echo "</button>";
                   echo "<h6><i class='fas fa-check'></i><b> Success!</b></h6>";
                    
                 echo "</div>";
         }
                  ?>
          <div class="card-body">
                  <form method = "POST" action ="post/post.php" enctype = "multipart/form-data">
                  <div class="form-group">
                  <?php
                  if(isset($_GET['id'])){
                      echo "<input type='hidden' name = 'category_id'  value = ".$_GET['id']." >";
                  }
                  ?>
                                
                                </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" name = "pro_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Name" value = "<?php if(isset($_GET['id'])){echo $pro_name;}?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Price</label>
                      <input type="text" name = "pro_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Price" value = "<?php if(isset($_GET['id'])){echo $pro_price;}?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Discount</label>
                      <input type="text" name = "pro_disc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Discount" value = "<?php if(isset($_GET['id'])){echo $pro_disc;}?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Available</label>
                      <input type="text" name = "pro_available" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Available" value = "<?php if(isset($_GET['id'])){echo $pro_available;}?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea type="text" name = "pro_description" class="form-control" id="exampleInputPassword1" placeholder="Description"><?php if(isset($_GET['id'])){echo $pro_description;}?></textarea>
                    </div>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name = "pro_image" >
                        
                      </div>
                      <div class="form-group">
                      <div class="custom-file">
                      <label>Multiple images</label><br>
                        <input type="file" name = "pro_image_multiple[]" multiple>
                        
                      </div>
                    </div>
                  
                    <?php
                    if(isset($_GET['gro_id'])){
                      $group_id = $_GET['gro_id'];
                      ?>

                      <input type = "hidden" name = "category" value = "<?php echo($group_id); ?>">

                      <?php
                    }
                    else {
                      ?>
                      <input type = "hidden" name = "category" value = "<?php echo($pro_cat_id); ?>">

                      <?php
                    }
                    ?>
                    
                    <button type='submit' name = 'pro_submit' class='btn btn-primary'>Submit</button>
                
                    
                  </form>
                </div>
                           


        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <?php
require_once "include/footer.php";
}
else{
  header("Location: login.php");
}
?>