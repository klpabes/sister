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

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
<?php include('includes/student_nav.php');?>
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Dashboard</a></li>
                    <li class="breadcrumb-item active">Evaluation of Grades</li>
                </ol>
                </div>
            </div>
            </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-body">
                        <p><strong>Cumulative GPA: <span class="text-danger">1.68812</span></strong></p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped table-evaluation">
                                <tbody>
                                    <tr class="active">
                                        <th width="3%">SubjCode</th>
                                        <th width="25%">Description</th>
                                        <th width="5%">Grade</th>
                                    </tr>
                                    <tr><td colspan="3" class="danger"><strong>SY: 2019-2020   SEM: 1</strong> (<span class="text-muted">BSIT:BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY</span>)</td></tr>                                    <tr id="2019-20201CCC100">
                                        <td>CCC100      </td>
                                        <!-- <td>IT1B.1    </td> -->
                                        <td>Fundamentals of Computing</td>
                                        <td><span class="badge" style="background-color:#CDDC39">1.75</span> <i title="Grade is locked" class="fa fa-lock text-gray"></i> </td>
                                    </tr>
                                                                        <tr id="2019-20201CCC101">
                                        <td>CCC101      </td>
                                        <!-- <td>IT1B.1    </td> -->
                                        <td>Computer Programming 1</td>
                                        <td><span class="badge" style="background-color:#F39C12">2.50</span> <i title="Grade is locked" class="fa fa-lock text-gray"></i> </td>
                                    </tr>
                                                                        <tr id="2019-20201GEC101">
                                        <td>GEC101      </td>
                                        <!-- <td>B8-3      </td> -->
                                        <td>Understanding the Self</td>
                                        <td><span class="badge" style="background-color:#4CAF50">1.25</span> <i title="Grade is locked" class="fa fa-lock text-gray"></i> </td>
                                    </tr>
                                                                        <tr id="2019-20201GEC102">
                                        <td>GEC102      </td>
                                        <!-- <td>A8-4      </td> -->
                                        <td>Purposive Communication</td>
                                        <td><span class="badge" style="background-color:#4CAF50">1.25</span> <i title="Grade is locked" class="fa fa-lock text-gray"></i> </td>
                                    </tr>
                                                                        <tr id="2019-20201GEC104">
                                        <td>GEC104      </td>
                                        <!-- <td>B3-5      </td> -->
                                        <td>Mathematics in the Modern World</td>
                                        <td><span class="badge" style="background-color:#CDDC39">1.75</span> <i title="Grade is locked" class="fa fa-lock text-gray"></i> </td>
                                    </tr>
                                                                        <tr id="2019-20201MAT104">
                                        <td>MAT104      </td>
                                        <!-- <td>B4        </td> -->
                                        <td>Discrete Structure</td>
                                        <td><span class="badge" style="background-color:#C86400">3.00</span> <i title="Grade is locked" class="fa fa-lock text-gray"></i> </td>
                                    </tr>
                                                                        <tr id="2019-20201NST001">
                                        <td>NST001      </td>
                                        <!-- <td>RO-I      </td> -->
                                        <td>National Service Training Program 1</td>
                                        <td><span class="badge" style="background-color:#8BC349">1.50</span> <i title="Grade is locked" class="fa fa-lock text-gray"></i> </td>
                                    </tr>
                                                                        <tr id="2019-20201PED001">
                                        <td>PED001      </td>
                                        <!-- <td>BS IT2    </td> -->
                                        <td>Exercise Prescription and Management</td>
                                        <td><span class="badge" style="background-color:#8BC349">1.50</span> <i title="Grade is locked" class="fa fa-lock text-gray"></i> </td>
                                    </tr>
                                    <tr>
                                <td colspan="2" class="text-right text-danger">GPA</td>
                                <td class="text-danger">1.875</td>













<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
