<?php 
  session_start();
  include ('includes/db_connection.php');

  $query = mysqli_query($conn, "SELECT * FROM announcements LIMIT 30");
  $result= mysqli_fetch_array($query);
  if(!isset($_SESSION['username'])){
    header('Location: admin_login.php');

 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISTER | Student Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <style>
    .scroll{
      max-height: 600px;
      overflow-y: auto;
    }
  </style>
</head>
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/logo.png" alt="SISTERLogo" height="300" width="300">
  </div>
  <body>
        <?php 
function Greetings($hours)
{
    if ($hours >= 0 && $hours <= 12) {
        return "Good Morning.";
    } else {
        if ($hours > 12 && $hours <= 17) {
            return "Good Afternoon.";
        } else {
            if ($hours > 17 && $hours <= 20) {
                return "Good Evening";
            } else {
                return "Good Night";
            }
        }
    }
}
$hours = 13;
print Greetings($hours);
?>
    </body> 
    
<body  class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed ">
<div class="wrapper">
  <?php include('includes/student_nav.php');?>
    <div class="content-wrapper" >
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Welcome to SISTER!</h1>
            <a href= greeting.php>Hello!</a>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
      <div class="col-md-4">
        <div class="card card-row" style="background-color: #992129">
          <div class="card-header">
            <h3 class="card-title text-white">
            <i class="fas fa-scroll"></i>Announcements
            </h3>
            <div class="row float-right"><a href="announcements.php" class="fas fa-plus"></a></div>
          </div>
          <div class="card-body scroll" style="background-color: #992129">
            
          <?php 
              $query = "SELECT * FROM announcements ";
              $query_run = mysqli_query($conn, $query);
              if(mysqli_num_rows($query_run) > 0)
              {
                  foreach($query_run as $announcement){    
              ?>
              
            <div class="card card-danger card-outline">
              <div class="card-header">
                <h6 class="card-title">
                  <!--announcement title-->
                  <?= $announcement['Announcement_Subject'];?>
                </h6>
                  <div class="card-tools">
                    <a href="">#<!--announcement id--><?= $announcement['Announcement_ID'];?></a>
                    <a href="view_announcement.php?id=<?= $announcement['Announcement_ID']; ?>" class="btn btn-tool btn-link"><!--announcement link-->
                      <i class="fas fa-pen"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                <?= $announcement['Announcement_Paragraph'];?>
                <br>
                <div class="float-left">For: <?= $announcement['Announcement_For'];?></div>
                <div class="row float-right">
                <?= $announcement['Announcement_Date'];?>
                </div>
                </div>
              </div>
              </a>
              <?php
                    }
                }else{
                    echo "<h5> No records found </h5>";
                }
              ?>
            </div>
          </div>
        </div>
        </div>
      </section>
  </div>
</div>

<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
