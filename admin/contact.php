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
            <h1 class="h3 mb-0 text-gray-800">User Contact Details</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active" aria-current="page">Blank Page</li>
            </ol>
          </div>

          <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Sl no.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Sbject</th>
                        <th>Message</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                                        $Query = "SELECT * FROM contact ORDER BY contact_id DESC";
                                        $Connection = mysqli_query($db_connection,$Query);
                                        $i = 1;
                                        while($row = mysqli_fetch_assoc($Connection))
                                        {
                                            echo "<tr>";
                                              echo "<td>".$i++."</td>";
                                              echo "<td>".$row["contact_name"]."</td>";
                                              echo "<td>".$row["contact_email"]."</td>";
                                              echo "<td>".$row["contact_subject"]."</td>";
                                              echo "<td>".$row["contact_message"]."</td>";
                                            echo "</tr>";
                                        }
                                        
                                        ?>
                    </tbody>
                  </table>
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