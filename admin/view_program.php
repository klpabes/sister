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
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5>Program Syllabus</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <h5>First Year - 1st Semester</h5>
                        </div>
                        <table id="firstyear-firstsem" name="firstyear-firstsem" class="table table-striped">
                          <thead>
                            <th>Course No.</th>
                            <th>Course Title</th>
                            <th>Units</th>
                            <th>Lec</th>
                            <th>Lab</th>
                            <th>Total</th>
                            <th>Prerequisite</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $query = "SELECT program_syllabus.Syllabus_ID, program_syllabus.Course_ID,  program_syllabus.Program_ID, program_syllabus.Lec,  program_syllabus.Lab,  program_syllabus.Total,
                    course.Course_ID, course.Course_Name,course.Credits,course.Course_Number, course.Prerequisite
                    FROM program_syllabus 
                    INNER JOIN course ON program_syllabus.Course_ID=course.Course_ID
                    WHERE program_syllabus.Program_ID='$program_id' AND program_syllabus.Semester_ID='1'";

                            $query_run = mysqli_query($conn, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                              foreach ($query_run as $course) {
                            ?>
                                <tr>
                                  <td><?= $course['Course_Number']; ?></td>
                                  <td><?= $course['Course_Name']; ?></td>
                                  <td><?= $course['Credits']; ?></td>
                                  <td><?= $course['Lec']; ?></td>
                                  <td><?= $course['Lab']; ?></td>
                                  <td><?= $course['Total']; ?></td>
                                  <td><?= $course['Prerequisite']; ?></td>
                                </tr>
                            <?php
                              }
                            } else {
                              echo "<td> No records found </td>";
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                          <h5>First Year - 2nd Semester</h5>
                        </div>
                        <table id="firstyear-firstsem" name="firstyear-firstsem" class="table table-striped">
                          <tr>
                            <th>Course No.</th>
                            <th>Course Title</th>
                            <th>Units</th>
                            <th>Lec</th>
                            <th>Lab</th>
                            <th>Total</th>
                            <th>Prerequisite</th>
                          </tr>
                          <?php
                          $query = "SELECT program_syllabus.Syllabus_ID, program_syllabus.Course_ID,  program_syllabus.Program_ID, program_syllabus.Lec,  program_syllabus.Lab,  program_syllabus.Total,
                    course.Course_ID, course.Course_Name,course.Credits,course.Course_Number, course.Prerequisite
                    FROM program_syllabus 
                    INNER JOIN course ON program_syllabus.Course_ID=course.Course_ID
                    WHERE program_syllabus.Program_ID='$program_id' AND program_syllabus.Semester_ID='2'";
                          $query_run = mysqli_query($conn, $query);
                          if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $course) {
                          ?>
                              <tr>
                                <td><?= $course['Course_Number']; ?></td>
                                <td><?= $course['Course_Name']; ?></td>
                                <td><?= $course['Credits']; ?></td>
                                <td><?= $course['Lec']; ?></td>
                                <td><?= $course['Lab']; ?></td>
                                <td><?= $course['Total']; ?></td>
                                <td><?= $course['Prerequisite']; ?></td>
                              </tr>
                          <?php
                            }
                          } else {
                            echo "<td> No records found </td>";
                          }
                          ?>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  </div>
  </div>
  </div>
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
