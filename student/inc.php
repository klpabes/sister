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
  <title>SISTER | Admin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.css">
</head>
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/logo.png" alt="SISTERLogo" height="300" width="300">
  </div>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
                <li class="breadcrumb-item">Dashboard</a></li>
                <li class="breadcrumb-item active">INC Grades</li>
              </ol>
            </div>
            </div>
            </div>
            </section>
        <!-- Main content -->
        <section class="content">
          <div class="card">
            <div class="card-header with-border">
            <i class="nav-icon fas fa-circle text-info"></i>New &middot; <span data-toggle="tooltip" data-placement="bottom" title="One semester before deadline">
            <i class="nav-icon fas fa-circle text-warning"></i> One sem after</span> &middot; <span data-toggle="tooltip" data-placement="bottom" title="Must be completed within the current semester">
            <i class="nav-icon fas fa-circle text-orange"></i> Two sems after</span> &middot; <span data-toggle="tooltip" data-placement="bottom" title="INC has not been completed before the deadline">
            <i class="nav-icon fas fa-circle text-red"></i> Lapsed</span>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr class="active">
                      <th>S.Y.</th>
                      <th>Sem</th>
                      <th>Subj Code</th>
                      <th>Section</th>
                      <th>Subject Description</th>
                      <th>Credit</th>
                      <th>Grade</th>
                      <th>Faculty</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr><td colspan="8" class="text-info">You have no Incomplete Grades.</td></tr>                  </tbody>
                </table>
              </div>  
            </div>
          </div>
        </section><!-- /.content -->
      </div>




<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
