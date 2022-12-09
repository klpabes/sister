<?php
session_start();
require_once 'includes/db_connection.php';
$faculty_id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM faculty WHERE Faculty_ID='$faculty_id'");
$result= mysqli_fetch_array($query);

if(isset($_POST['delete'])){
  $del_query = mysqli_query($conn, "DELETE FROM faculty WHERE Faculty_ID='$faculty_id'");

  if($del_query){
    $_SESSION['status'] = "Faculty deleted!";
    header("Location: faculty_list.php");
    exit;
  }else{
    echo "Error, Something went wrong";
  }
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
            <h5>Faculty Information</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Faculty Management</li>
              <li class="breadcrumb-item active">View Faculty Information</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- Profile Image -->
            <div class="card card-danger card-outline" style="background: url('../images/header-bg-1.png');">
              
              <div class="card-body box-profile">
                <div class="text">
                  <img class="profile-user-img img-fluid img-square"
                       src="../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>
                <h3 class="text-red"><?php echo $result['Faculty_Firstname']; ?> <?php echo $result['Faculty_Middle']; ?>. <?php echo $result['Faculty_Lastname']; ?></h3>
                <p class="text-red"> <?php echo $result['Department'];?></p>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#schedule_data" data-toggle="tab">Class Schedule</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="schedule_data">
                    <div class="card-body">
                        <div class = "row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas fa-user"></i>
                                     Class Schedule
                                    </h3>
                                </div>
                                <div class="card-body">
                                  
                                <!--put calendar-->

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <div class="tab-pane" id="settings">
                  <section class="content">
                <!-- Your Page Content Here -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Change Password</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form name="update-password" method="post" action="settings.php" role="form">
                                <div class="box-body">
                                                                                                            <div class="form-group">
                                        <label for="password">Old Password <span class="text-red">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Old Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password2">New Password <span class="text-red">*</span></label>
                                        <input type="password" class="form-control" name="password2" id="password2" placeholder="New Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password3">Retype New Password <span class="text-red">*</span></label>
                                        <input type="password" class="form-control" name="password3" id="password3" placeholder="Retype New Password">
                                    </div>
                                    <input name="btnUpdate" type="submit" id="btnUpdate" class="btn btn-primary" value="Update Password" onclick="this.disabled=true; hidden1.name=this.name; hidden1.value=this.value; this.value='Saving... Please wait...'; this.form.submit();"/>
                                    <input type="button" name="btnCancel" class="btn btn-default" value="Cancel" onclick="javascript:history.back();"/>
                                    <input name="hidden1" type="hidden" id="hidden1" value="None"/>
                                </div><!-- /.box-body -->
                            </form>
                        </div>
                        <hr>
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Delete Faculty</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form name="pass-recovery" method="post" role="form">
                                <div class="box-body">
                                  <div class="form-group">
                                    <button name="delete" type="delete" id="delete" class="btn btn-danger" value="Delete">
                                      Delete
                                    </button>
                                  </div>

                                </div><!-- /.box-body -->
                            </form>
                        </div>
                    </div>
                </div>
            </section>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>
</div>



<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>