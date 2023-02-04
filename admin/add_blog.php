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
    $blog_id = $_GET['id'];
    
    $getQuery = "SELECT * FROM blog WHERE blog_id = $blog_id";
    $blog_data = mysqli_query($db_connection,$getQuery);
    $blog_row = mysqli_fetch_assoc($blog_data);
    $blog_heading =  $blog_row['blog_heading'];
    $blog_auth = $blog_row['blog_auth'];
    $blog_date = $blog_row['blog_date'];
    $blog_content = $blog_row['blog_content'];
    $blog_cat_id = $blog_row['blog_cat_id'];
    //unset($_GET['id']);
}
?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Blog Page</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active" aria-current="page">Add Blog Page</li>
            </ol>
          </div>
          <?php
         if (isset($_SESSION['blog'])){
           unset($_SESSION['blog']);
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
                      echo "<input type='hidden' name = 'blog_id'  value = ".$_GET['id']." >";
                  }
                  ?>
                                
                                </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Heaading</label>
                      <input type="text" name = "blog_heading" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Heading" value = "<?php if(isset($_GET['id'])){echo $blog_heading;}?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Author</label>
                      <input type="text" name = "blog_auth" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Author Name" value = "<?php if(isset($_GET['id'])){echo $blog_auth;}?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Date</label>
                      <input type="text" name = "blog_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Date" value = "<?php if(isset($_GET['id'])){echo $blog_date;}?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Content</label>
                      <textarea type="text" name = "blog_content" class="form-control" id="exampleInputPassword1" placeholder="Content"><?php if(isset($_GET['id'])){echo $blog_content;}?></textarea>
                    </div>
                  
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name = "blog_image" >
                        
                      </div>
                    </div>
                  
                    <div class="form-group">
                      <div class="custom-file">
                      <select name="category">
                      <?php
                      if(isset($_GET['id'])){
                        $getCat = "SELECT * FROM category";
                    $data = mysqli_query($db_connection,$getCat);
                    while($row = mysqli_fetch_assoc($data)){
                    $blog_cat = $row['cat_id'];
                    if($blog_cat_id == $blog_cat){
                    echo "<option value=".$row['cat_id']." selected>".$row['cat_name']."</option>";
                    }
                    else{
                      echo "<option value=".$row['cat_id'].">".$row['cat_name']."</option>";
                    }
                  }
                      }
                      else{
                    $getCat = "SELECT * FROM category";
                    $data = mysqli_query($db_connection,$getCat);
                    echo "<option value=''>Select Category</option>";
                    while($row = mysqli_fetch_assoc($data)){
                      
                      echo "<option value=".$row['cat_id'].">".$row['cat_name']."</option>";

                    }
                  }
                          ?>
                      </select>
                        
                      </div>
                    </div>
                    
                    <button type='submit' name = 'blog_submit' class='btn btn-primary'>Submit</button>
                
                    
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