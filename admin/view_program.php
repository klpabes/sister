<?php
session_start();
require_once 'includes/db_connection.php';
$program_id = $_GET['id'];

$query = mysqli_query($conn, "SELECT program.Program_Name, program.Slots, program.Department_ID,
department.Department_Name 
FROM department 
JOIN program 
ON program.Department_ID=department.Department_ID WHERE Program_ID='$program_id'");
$result = mysqli_fetch_array($query);

if (isset($_POST['delete'])) {
  $del_query = mysqli_query($conn, "DELETE FROM program WHERE Program_ID='$program_id'");

  if ($del_query) {
    $_SESSION['status'] = "Program deleted!";
    header("Location: programs.php");
    exit;
  } else {
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
    <?php include('includes/nav.php'); ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h5>Program Information</h5>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Program Management</li>
                <li class="breadcrumb-item active">View Program Information</li>
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
                  <br>
                  <h1 class="text-white"><i class="fas fa-book-open"></i> <?php echo $result['Program_Name']; ?></h1>
                  <h4 class="text-white"><i class="fas fa-map-marker"></i> <?php echo $result['Department_Name']; ?> Department</h4>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link" href="#schedule_data" data-toggle="tab">Program Syllabus</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="schedule_data">
                      <div class="card-body">
                        <form action="#" method="post">
                          <table id="emptbl" class="table table-striped">
                            <tr>
                              <th>Course No.</th>
                              <th>Course Title</th>
                              <th>Units</th>
                              <th>Hours/Weeks</th>
                              <th>Action</th>
                            </tr>
                            <tr>
                            <td class="col-md-2" id="col0">
                                <select name="course[]" class="form-control" id="course">

                                  <option value=""></option>
                                  <?php
                                  $query_course = "SELECT * FROM course";
                                  $query_run = mysqli_query($conn,$query_course);
                                  if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $course) {
                                        echo '<option value="' . $course['Course_Number'] . '">' . $course['Course_Number'] . '</option>';
                                      }
                                    } else {
                                      echo '<option value="">Course not available</option>';
                                    }
                                    ?>
                                </select>
                              </td>
                              <td id="col1"><input type="text" class="form-control" name="title[]" value="<?= $course['Course_name']; ?>"/></td>
                              <td id="col2"><input type="text" class="form-control" name="units[]" value="" /></td>
                              <td id="col3"><input type="text" class="form-control" name="hours[]" value="" /></td>
                              <td><input type="button" class="btn btn-info" value="Delete" onclick="deleteRows()" /></td>
                            </tr>
                          </table>
                          <table>
                            <tr>
                              <td><input type="button" value="Add Row" onclick="addRows()" /></td>
                              <td><input type="submit" value="Submit" /></td>
                            </tr>
                          </table>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


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
  <script type="text/javascript">
    function addRows() {
      var table = document.getElementById('emptbl');
      var rowCount = table.rows.length;
      var cellCount = table.rows[0].cells.length;
      var row = table.insertRow(rowCount);
      for (var i = 0; i <= cellCount; i++) {
        var cell = 'cell' + i;
        cell = row.insertCell(i);
        var copycel = document.getElementById('col' + i).innerHTML;
        cell.innerHTML = copycel;
      }
    }

    function deleteRows() {
      var table = document.getElementById('emptbl');
      var rowCount = table.rows.length;
      if (rowCount > '2') {
        var row = table.deleteRow(rowCount - 1);
        rowCount--;
      } else {
        alert('There should be atleast one row');
      }
    }
  </script>