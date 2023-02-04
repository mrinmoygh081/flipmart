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
?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Groups Page</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active" aria-current="page">Groups Page</li>
            </ol>
          </div>
          <?php
         if (isset($_SESSION['group_category'])){
           unset($_SESSION['group_category']);
          echo "<div class='alert alert-success alert-dismissible' role='alert'>";
             echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
               echo "<span aria-hidden='true'>&times;</span>";
                 echo "</button>";
                   echo "<h6><i class='fas fa-check'></i><b> Success!</b></h6>";
                    
                 echo "</div>";
         }
                  ?>
          <div class="card-body">
          <div class = "row">
               <div class = "col-md-4">
               <form method = "POST" action ="post/post.php">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" name = "group_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Name">
                    </div>
                    <div class="form-group">
                      <input type="hidden" name = "sub_id" value = "<?php 
                      if(isset($_GET['gid'])){
                      echo ($_GET['gid']);
                      } ?>">
                    </div>
                    <button type="submit" name = "group_submit" class="btn btn-primary">Submit</button>
                  </form>
          </div>

          <div class = "col-md-8">
              <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Sl no.</th>
                        <th>Name</th>
                        <th>Add Products</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_GET['gid'])){
                        $gid = $_GET['gid'];
                                        $Query = "SELECT * FROM groups WHERE sub_id = $gid ORDER BY group_id DESC";
                                        $Connection = mysqli_query($db_connection,$Query);
                                        $i = 1;
                                        while($row = mysqli_fetch_assoc($Connection))
                                        {
                                            echo "<tr>";
                                              echo "<td>".$i++."</td>";
                                              echo "<td>".$row["group_name"]."</td>";
                                              echo "<td><a href = 'product.php?pid=".$row["group_id"]."'>Add</a></td>";
                                            echo "</tr>";
                                        }
                                    }
                                        ?>
                    </tbody>
                  </table>
                </div>
          </div>
          </div>
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