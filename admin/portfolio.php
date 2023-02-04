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
            <h1 class="h3 mb-0 text-gray-800">Portfolio Page</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active" aria-current="page">Portfolio Page</li>
            </ol>
          </div>
          <?php
         if (isset($_SESSION['portfolio'])){
           unset($_SESSION['portfolio']);
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
                      <label for="exampleInputEmail1">Heaading</label>
                      <input type="text" name = "portfolio_heading" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Heading">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Sub Heading</label>
                      <textarea type="text" name = "portfolio_sub_heading" class="form-control" id="exampleInputPassword1" placeholder="Sub Heading"></textarea>
                    </div>
                  
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name = "portfolio_image" >
                        
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-file">
                      <select name="portfolio_filter">
                          <option value="filter-app">filter-app</option>
                          <option value="filter-card">filter-card</option>
                          <option value="filter-web">filter-web</option>
                      </select>
                        
                      </div>
                    </div>
                  
                    <button type="submit" name = "portfolio_submit" class="btn btn-primary">Submit</button>
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