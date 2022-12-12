<?php 
  session_start();
  include ('includes/db_connection.php');

  $student_id = $_SESSION['Student_ID'];
  $query = mysqli_query($conn, "SELECT * FROM student WHERE Student_ID='$student_id'");
  $result= mysqli_fetch_array($query);

  if(!isset($_SESSION['username'])){
    header('Location: student_login.php');

 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISTER</title>

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
</head>
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/logo.png" alt="SISTERLogo" height="300" width="300">
  </div>

<body  class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed ">
<div class="wrapper">
  <?php include('includes/student_nav.php');?>
  <div class="content-wrapper">
  <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</a></li>
                <li class="breadcrumb-item active">Clearance</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
        <!-- Main content -->
        <section class="content">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Status: <span class="text-green">Cleared</span> </h3>
              <span class="text float-right"><a href="clearance-archive.php">History</a></span>
            </div>
            <div class="card-body" >
                            <h2 class="text-center text-green"><i class="fa fa-check-square-o"></i>Good Job! You have no pending liabilities!</h2>              <!-- PHP Foreach loop here-->
                            <div class="row">
                              </div>
                            <!-- END PHP Foreach loop here-->
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->







</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
