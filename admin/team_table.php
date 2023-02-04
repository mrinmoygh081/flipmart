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
                                                <th>Designation</th>
                                                <th>Image</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $Query = "SELECT * FROM team ORDER BY team_id DESC";
                                        $Connection = mysqli_query($db_connection,$Query);
                                        $i = 1;
                                        while($row = mysqli_fetch_assoc($Connection))
                                        {
                                            echo "<tr id=".$row['team_id'].">";

                                              echo "<td>".$i++."</td>";
                                              echo "<td>".$row["team_name"]."</td>";
                                              echo "<td>".$row["team_designation"]."</td>";
                                              echo "<td><img height = 100 width = 100 alt = 'Image not found' src = 'img/".$row["team_image"]."'></td>";
                                              echo "<td><a href='team.php?id=".$row["team_id"]."'>Edit</td>";
                                              echo "<td><a href = 'team_table.php?delete=".$row["team_id"]."'>delete </a> </td>";
                                            echo "</tr>";
                                        }
                                        
                                        ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <a href = "team.php">ADD TEAM MEMBER</a>


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
                $query_for_delete = "DELETE FROM team WHERE team_id = $delete" ;
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
            