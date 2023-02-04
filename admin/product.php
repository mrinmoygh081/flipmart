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
            <h1 class="h3 mb-0 text-gray-800">Blank Page</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active" aria-current="page">Blank Page</li>
            </ol>
          </div>

          <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Basic Table</h4>
                                <h6 class="card-subtitle">Add class <code>.table</code></h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>S No.</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Description</th>
                                                <th>Available</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if(isset($_GET['pid'])){
                                          $pid = $_GET['pid'];
                                        $Query = "SELECT * FROM product WHERE pro_gid = $pid ORDER BY pro_id DESC";
                                        $Connection = mysqli_query($db_connection,$Query);
                                        $i = 1;
                                        while($row = mysqli_fetch_assoc($Connection))
                                        {
                                            echo "<tr id=".$row['pro_id'].">";

                                              echo "<td>".$i++."</td>";
                                              echo "<td>".$row["pro_name"]."</td>";
                                              echo "<td><img height = 100 width = 100 alt = 'Image not found' src = 'img/".$row["pro_image"]."'></td>";
                                              echo "<td>".$row["pro_price"]."</td>";
                                              echo "<td>".$row["pro_disc"]."</td>";
                                              echo "<td>".$row["pro_description"]."</td>";
                                              echo "<td>".$row["pro_available"]."</td>";
                                              echo "<td><a href='add_product.php?id=".$row["pro_id"]."'>Edit</td>";
                                              echo "<td><a href = 'product.php?delete=".$row["pro_id"]."'>delete </a> </td>";
                                            echo "</tr>";
                                        }
                                      }
                                        
                                        ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                        if(isset($_GET['pid'])){
                          $gro_id = $_GET['pid'];
                          ?>
                        <a href = "add_product.php?gro_id=<?php echo($gro_id); ?>">ADD PRODUCT</a>
                        <?php
                        }
                        ?>


        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <?php
require_once "include/footer.php";
?>
<?php
            if(isset($_GET['delete']))
            {
            $delete = $_GET['delete'];
                $query_for_delete = "DELETE FROM product WHERE pro_id = $delete" ;
            $delete_query =mysqli_query($db_connection,$query_for_delete);
             if(!$delete_query)
             {
    
             die(mysqli_error($db_connection));   
             }
             else{
                
                
             }
            }
          }
          else{
            header("Location: login.php");
          }
            ?>
            