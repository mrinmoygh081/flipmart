<?php
session_start();
ob_start();
require_once "include/header.php";
if(isset($_SESSION['admin_id'])){
echo "<body id='page-top'>";
echo "<div id='wrapper'>";
require_once "include/navbar.php";
echo "<div id='content-wrapper' class='d-flex flex-column'>";
echo "<div id='content'>";
require_once "include/topbar.php";
?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pricing Page</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active" aria-current="page">Pricing Page</li>
            </ol>
          </div>
          <?php
         if (isset($_SESSION['price'])){
           unset($_SESSION['price']);
          echo "<div class='alert alert-success alert-dismissible' role='alert'>";
             echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
               echo "<span aria-hidden='true'>&times;</span>";
                 echo "</button>";
                   echo "<h6><i class='fas fa-check'></i><b> Success!</b></h6>";
                    
                 echo "</div>";
         }
                  ?>
          <div class="card-body">
          <form method = "POST" action ="post/post.php">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" name = "p_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Price</label>
                      <input type="text" name = "p_price" class="form-control" id="exampleInputPassword1" placeholder="Price">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Line 1</label>
                      <input type="text" name = "p_line1" class="form-control" id="exampleInputPassword1" placeholder="Line 1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Line 2</label>
                      <input type="text" name = "p_line2" class="form-control" id="exampleInputPassword1" placeholder="Line 2">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Line 3</label>
                      <input type="text" name = "p_line3" class="form-control" id="exampleInputPassword1" placeholder="Line 3">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Line 4</label>
                      <input type="text" name = "p_line4" class="form-control" id="exampleInputPassword1" placeholder="Line 4">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Line 5</label>
                      <input type="text" name = "p_line5" class="form-control" id="exampleInputPassword1" placeholder="Line 5">
                    </div>

                    <button type="submit" name = "p_submit" class="btn btn-primary">Submit</button>
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