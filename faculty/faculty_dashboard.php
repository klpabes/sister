<?php 
  session_start();
  include ('includes/db_connection.php');

  if(!isset($_SESSION['username'])){
    header('Location: logout.php');

 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISTER | Admin Dashboard</title>
  <!--Favicon-->
  <link rel="icon" type="image/x-icon" href="../dist/img/logo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../dist/css/adminlte.css">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  
  <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Theme style -->
  <style>
  .scroll {
    max-height: 400px;
    overflow-y: auto;
  } 
  </style>
</head>
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/logo.png" alt="SISTERLogo" height="300" width="300">
  </div>
<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <?php include('includes/nav.php');?>
    <div class="content-wrapper" style="background-color: #F8E4C7;">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
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
        <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar-alt"></i></i></span>

              <div class="info-box-content">
                <span class="info-box-text">School Year</span>
                <span class="info-box-number">
                  2022-2023
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Faculties</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Courses</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Enrolled Students</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
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
      </div>
    </section>
  </div>
  <script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../plugins/filterizr/jquery.filterizr.min.js"></script>
</body>
</html>
