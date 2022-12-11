<?php 
  session_start();
  include ('includes/db_connection.php');

  if(!isset($_SESSION['username'])){
    header('Location: logout.php');
 }

    if(isset($_POST['save']))
    {
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $term = mysqli_real_escape_string($conn, $_POST['term']);
    $start = mysqli_real_escape_string($conn, $_POST['start']);
    $end = mysqli_real_escape_string($conn, $_POST['end']);
    $session_status = mysqli_real_escape_string($conn, $_POST['session_status']);


    $query = "INSERT INTO school_session (Session_Name,Term,Session_Start,Session_End, Session_Status)
    VALUES ('$description','$term','$start','$end','$session_status')";

    $query_run = mysqli_query($conn, $query);

    if($query_run){
      $_SESSION['status'] = "Session added successfully!";
      header("Location: " . $_SERVER["REQUEST_URI"]);
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
  <title>SISTER</title>
  <!--Favicon-->
  <link rel="icon" type="image/x-icon" href="../dist/img/logo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.css">
  <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
                <li class="breadcrumb-item">Session Management</li>
                <li class="breadcrumb-item active">School Year Settings</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
      <div class="container-fluid">
                <?php
                    if(isset($_SESSION['status']))
                    {
                      ?>
                      <div class="col-sm-8">
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h5><i class="icon fas fa-check"></i><?php echo $_SESSION['status'];?></h5>
                        </div>
                      </div>
                    <?php
                      unset($_SESSION['status']);
                    }  
                  ?>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- form -->
              <form method="POST">
                <div class="card-body">
                  <div class="line"></div>
                  <h5>Add Session</h5>
                      <div class = "row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="lastname">School Year</label>
                            <input type="text" class="form-control" name="description" id="description"  placeholder="" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="term">Term</label>
                            <select name="term" id="term" class="form-control" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="S">S</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="start-date">Start Date</label>
                            <input type="date" class="form-control" name="start" id="start"  placeholder="" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="end-date">End Date</label>
                            <input type="date" class="form-control" name="end" id="end"  placeholder="" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-3">
                          <div class="form-group">
                            <label for="status">Status</label>
                            <select name="session_status" id="session_status" class="form-control" required>
                                <option value="Ongoing">Ongoing</option>
                                <option value="Ended">Ended</option>
                            </select>
                          </div>
                        </div>
                      </div>
                        <div class ="float-right">
                            <button type="submit" class="btn btn-success" name="save">Save</button>
                        </div>
                     </form>
              </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                      <th>School Year</th>
                      <th>Term</th>
                      <th>Date Start</th>
                      <th>Date End</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
		</thead>
    <tbody>
        <?php 
        $query = "SELECT * FROM school_session";
        $query_run = mysqli_query($conn,$query);
        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $session){    
        ?>
           <tr>
                <td><?= $session['Session_Name']; ?></td>
                <td><?= $session['Term']; ?></td>
                <td><?= $session['Session_Start']; ?></td>
                <td><?= $session['Session_End'];?></td>
                <td><?= $session['Session_Status'];?></td>
                <td>
                    <a href="view_faculty.php?id=<?= $faculty['Faculty_ID']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
            <?php
            }
        }else{
            echo "<h5> No records found </h5>";
        }
    ?>
    </tbody>
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
</div>
    </section>
</div>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#college').on('change', function(){
        var College_ID = $(this).val();
        if(College_ID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'College_ID='+College_ID,
                success:function(html){
                    $('#department').html(html);
                    $('#program').html('<option value="">Select department first</option>'); 
                }
            }); 
        }else{
            $('#department').html('<option value="">Select college first</option>');
            $('#program').html('<option value="">Select department first</option>'); 
        }
    });
    
    $('#department').on('change', function(){
        var Department_ID = $(this).val();
        if(Department_ID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'Department_ID='+Department_ID,
                success:function(html){
                    $('#program').html(html);
                }
            }); 
        }else{
            $('#program').html('<option value="">Select department first</option>'); 
        }
    });
});
</script>

<!--Username Generator-->
<script>
$(function() {
  $('#lastname , #firstname').on('input', function() {
    $('#username').val(
      $('#lastname, #firstname').map(function(){
        return $(this).val();
      }).get().join('.').replace(/\s+/g, '').toLocaleLowerCase(this)
    );
  });
});
</script>
<!--Password Generator-->
<script>
$(function() {
  $('#lastname , #firstname').on('input', function() {
    $('#password').val(
      $('#lastname, #firstname').map(function(){
        return $(this).val();
      }).get().join('.').replace(/\s+/g, '').toLocaleLowerCase(this)
    );
  });
});
</script>
