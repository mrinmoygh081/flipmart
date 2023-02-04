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
            <h1 class="h3 mb-0 text-gray-800">Slider Page</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active" aria-current="page">Slider Page</li>
            </ol>
          </div>
          <?php
         if (isset($_SESSION['slider'])){
           unset($_SESSION['slider']);
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
                      <input type="text" name = "slider_heading" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Heading">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Content</label>
                      <textarea type="text" name = "slider_content" class="form-control" id="exampleInputPassword1" placeholder="Content"></textarea>
                    </div>
                  
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name = "slider_image" >
                        
                      </div>
                    </div>
                  
                    <button type="submit" name = "slider_submit" class="btn btn-primary">Submit</button>
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