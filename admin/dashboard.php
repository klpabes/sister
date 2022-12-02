<?php 
  session_start();
  include ('includes/db_connection.php');

  $query = mysqli_query($conn, "SELECT * FROM announcements");
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
  <title>SISTER | Admin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
<?php include('includes/nav.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Welcome to SISTER!</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content wrapper">
        <div class="container-fluid h-100">
            <div class="row">
                 <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Number of Enrolled Students by Colleges</h3> 
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="card card-row card-default">
                <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Announcements</h3>
      
              </div>
                    <div class="card-body">
                        <div class="card card-light card-outline">
                            <div class="card-header">
                                <h5 class="card-title"><?php echo $result['Announcement_Subject']; ?></h5>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-tool btn-link">#<?php echo $result['Announcement_ID']; ?></a>
                                    <a href="view_announcement.php?id=<?= $result['Announcement_ID']; ?>" class="btn btn-tool"><i class="fas fa-pen"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>
                                <h5>For: <?php echo $result['Announcement_For']; ?></h5>
                                <?php echo $result['Announcement_Subject']; ?>
                                </p>
                            </div>
                        </div>
                      <?php
                  
                  ?>
                    </div>
                </div>  
            </div>  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData = {
      labels: [
          'CCS',
          'COET',
          'CED',
          'CASS',
          'CEBA',
          'CSM',
          'CON',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100,300],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#f56944'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

  })
</script>
</body>
</html>
