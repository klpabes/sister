<?php
session_start();
include('includes/db_connection.php');
if (!isset($_SESSION['username'])) {
  header('Location: logout.php');
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
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
              <h1>Student Advising</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Students</li>
                <li class="breadcrumb-item active">Student Advising</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <strong>Search Student:</strong>

                      <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Search by Student ID">
                    </div>

                    <button type="submit" class="btn btn-primary" name="search" id="submit">Search</button>
                  </form>
                  <div class="d-sm-flex align-items-center mb-4">

                    <?php
                    if (isset($_POST['search'])) {

                      $sdata = $_POST['searchdata'];
                    ?>
                  </div>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID No.</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Last Program Enrolled</th>
                        <th>Year Level</th>
                        <th>Date of Admission</th>
                        <th>Status</th>
                        <th>Advise</th>
                      </tr>
                    </thead>
                    <?php
                      // $query = "SELECT *
                      // FROM student WHERE Student_ID LIKE '$sdata%'";
                      $query = "SELECT 
        student.Student_ID, student.Student_Firstname, student.Student_Lastname, student.Student_Middlename,  student.Admission_Date, student.Status,
        student.Program, academic_history.year, academic_history.Program_Name, academic_history.Scholastic_Status, academic_history.Scholarship_Status,
        academic_history.GPA
        FROM student 
        INNER JOIN academic_history ON academic_history.Student_ID=student.Student_ID 
        WHERE student.Student_ID LIKE '$sdata'";
                      $query_run = mysqli_query($conn, $query);
                      if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $student) {
                    ?>
                        <tr>
                          <td><?= $student['Student_ID']; ?></td>
                          <td><?= $student['Student_Lastname']; ?></td>
                          <td><?= $student['Student_Firstname']; ?></td>
                          <td><?= $student['Program_Name']; ?></td>
                          <td><?= $student['year']; ?></td>
                          <td><?= $student['Admission_Date']; ?></td>
                          <td><?= $student['Status']; ?></td>
                          <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                              Enroll Student
                            </button>
                          </td>
                        </tr>
                  <?php
                        }
                      }
                    } else {
                      echo "<h5> No records found </h5>";
                    }
                  ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Enroll Student</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form method="POST">
                <div class="card-body">
                  <h4>Basic Information</h4>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?= $student['Student_Lastname']; ?>" placeholder="Last Name" required>

                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?= $student['Student_Firstname']; ?>" placeholder="First Name" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="middlename">Middle Name</label>
                        <input type="text" class="form-control" name="middlename" id="middlename" value="<?= $student['Student_Middlename']; ?>" placeholder="Middle Name" required>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <h5>Academic Information</h5>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="program">Program</label>
                        <input type="text" class="form-control" name="program" id="program" value="<?= $student['Program']; ?>" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="gpa">Previous GPA</label>
                        <input type="text" class="form-control" name="gpa" id="gpa" value="<?= $student['GPA']; ?>" placeholder="Previous GPA" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="year">Year Level</label>
                        <select class="form-control" id="year" name="year" required>
                          <option value="<?= $student['year']; ?>"><?= $student['year']; ?></option>
                          <option value="1st Year">1st Year</option>
                          <option value="2nd Year">2nd Year</option>
                          <option value="3rd Year">3rd Year</option>
                          <option value="4th Year">4th Year</option>
                          <option value="5th Year">5th Year</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="scholastic">Scholastic Status</label>
                        <input type="text" class="form-control" name="scholastic" id="scholastic" value="<?= $student['Scholastic_Status']; ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="scholarship">Scholarship Status</label>
                        <input type="text" class="form-control" name="scholarship" id="scholarship" value="<?= $student['Scholarship_Status']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="scholastic">Scholastic Status</label>
                        <input type="text" class="form-control" name="scholastic" id="scholastic" value="<?= $student['Scholastic_Status']; ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="scholarship">Scholarship Status</label>
                        <input type="text" class="form-control" name="scholarship" id="scholarship" value="<?= $student['Scholarship_Status']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="scholastic">Scholastic Status</label>
                        <input type="text" class="form-control" name="scholastic" id="scholastic" value="<?= $student['Scholastic_Status']; ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="scholarship">Scholarship Status</label>
                        <input type="text" class="form-control" name="scholarship" id="scholarship" value="<?= $student['Scholarship_Status']; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="save" class="btn btn-primary float-right"><i class="fas fa-print"></i> Enroll and Print</button>
                  </div>

              </form>
              <!-- /.card-->
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
  <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  </div>

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../plugins/jszip/jszip.min.js"></script>
  <script src="../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
</body>

</html>