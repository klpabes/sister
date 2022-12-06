<?php
session_start();
require_once 'includes/db_connection.php';
$student_id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM student WHERE Student_ID='$student_id'");
$result= mysqli_fetch_array($query);
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

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
<?php include('includes/nav.php');?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Student Management</li>
              <li class="breadcrumb-item active">View Student Information</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"src="dist/img/user4-128x128.jpg" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?php echo $result['Student_Lastname']; ?>, <?php echo $result['Student_Firstname'];?></h3>
                <p class="text-muted text-center"><?php echo $result['Student_Program']; ?></p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Student ID</b><div class="float-right"><?php echo $result['Student_ID']; ?></div>
                  </li>
                  <li class="list-group-item">
                    <b>CGPA</b><div class="float-right"><?php echo $result['cgpa']; ?></div>
                  </li>
                  <li class="list-group-item">
                    <b>Year Level</b><div class="float-right"><?php echo $result['Student_Year_Level']; ?></div>
                  </li>
                  <li class="list-group-item">
                    <b>Scholastic Status</b><div class="float-right"><?php echo $result['Scholastic_Status']; ?></div>
                  </li>
                  <li class="list-group-item">
                    <b>Scholarship Status</b><div class="float-right"><?php echo $result['Scholarship_Status']; ?></div>
                  </li>
                </ul>
              </div>
            </div>
            </div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                  <h5>Student Information</h5>
              </div>
              <div class="card-body">
                <div class = "row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <h4><?php echo $result['Student_Lastname']; ?></h5>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="firstname">First Name</label>
                    <h4><?php echo $result['Student_Firstname']; ?></h4>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="middlename">Middle Name</label>
                    <h4><?php echo $result['Student_Middlename']; ?></h4>
                  </div>
                </div>
                <div class="col-md-4">
                <label for="gender">Gender</label>  
                  <div class="form-group">
                    <h4><?php echo $result['Student_Gender']; ?></h4>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="birthdate">Date of Birth</label>
                    <h4><?php echo $result['Student_Birthdate']; ?></h4>
                  </div>
                </div>
                </div>
                <hr>
                <h5>Address</h5>
                <div class = "row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="province">State/Province</label>
                    <h4><?php echo $result['province']; ?></h4>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="zip">Zip Code</label>
                    <h4><?php echo $result['zip']; ?></h4>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="city">City</label>
                    <h4><?php echo $result['city']; ?></h4>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="brgy">Barangay</label>
                    <h4><?php echo $result['barangay']; ?></h4>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="purok">Purok/Subdivision</label>
                    <h4><?php echo $result['purok']; ?></h4>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="street">Street/Blk No.</label>
                    <h4><?php echo $result['street']; ?></h4>
                  </div>
                </div>
                </div> 
                <hr>
                <h5>Contact</h5>
                <div class = "row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <h4><?php echo $result['Student_Phone']; ?></h4>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <h4><?php echo $result['Student_Email']; ?></h4>
                  </div>
                </div>
            </div>
        </div>
            
              </div><!-- /.card-body -->
     
            </div>
          </div>
        </div>
      </div>
    </section>




<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>