<?php
session_start();
error_reporting(0);
include ('includes/db_connection.php');

    $query_college = "SELECT * FROM college ORDER BY College_Name ASC";
    
    $result = $conn->query($query_college); 

    if(isset($_POST['delete'])){
      $delete = "DELETE FROM faculty WHERE Faculty_ID='$faculty_id'";
      $delete_run = mysqli_query($conn, $delete);

      if($delete_run){
        $_SESSION['status'] = "Faculty deleted successfully!";
        header("Location: " . $_SERVER["REQUEST_URI"]);
        exit;
      }else{
        echo "Error, Something went wrong";
      }
    }
    
    if(isset($_POST['save']))
    {
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $college = mysqli_real_escape_string($conn, $_POST['college']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $status = "Active";


    $query = "INSERT INTO faculty (Faculty_Lastname,Faculty_Firstname,Faculty_Middle,
    Faculty_Username,Faculty_Password,College_ID,Department,Status) 
    VALUES ('$lastname','$firstname',' $middlename','$username',md5('$password'),'$college','$department','$status')";

    $query_run = mysqli_query($conn, $query);

    if($query_run){
      $_SESSION['status'] = "Faculty added successfully!";
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
  <title>SISTER | Admin Dashboard</title>
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
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
            <h1>List of Faculties</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Faculty Management</li>
              <li class="breadcrumb-item">Faculty List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                <button type="button" class="btn btn-success ml-auto mb-9 mb-sm-0" data-toggle="modal" data-target="#modal-lg">
                          Add Faculty
                </button>
                <div class="col-sm-12">
            </div>
            <br>
          </div>
                <thead>
                  <tr>
                      <th>ID No.</th>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>College</th>
                      <th>Department</th>
                      <th>Action</th>
                  </tr>
		</thead>
    <tbody>
        <?php 
        $query = "SELECT faculty.Faculty_ID, faculty.Faculty_Firstname, faculty.Faculty_Lastname, faculty.Department, faculty.College_ID, 
        college.College_ID, college.College_Name
        FROM faculty  
        JOIN college ON faculty.College_ID=college.College_ID;";
        $query_run = mysqli_query($conn,$query);
        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $faculty){    
        ?>
           <tr>
                <td><?= $faculty['Faculty_ID']; ?></td>
                <td><?= $faculty['Faculty_Lastname']; ?></td>
                <td><?= $faculty['Faculty_Firstname'];?></td>
                <td><?= $faculty['College_Name'];?></td>
                <td><?= $faculty['Department'];?></td>
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
		</table>

              </div>
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
              <h4 class="modal-title">Add Faculty</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST">
                <div class="card-body"> 
                   <h4>Basic Information</h4>
                <div class = "row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Enter Last Name" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="firstname"  placeholder="Enter First Name" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="middlename">Middle Initial</label>
                    <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Enter Middle Inital" required maxlength="1">
                  </div>
                </div>
                </div>
                <hr>
                <h5>College and Department Information</h5>
                <div class = "row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="college">College</label>
                    <select name="college" id="college" class="form-control" required>
                    <option>Select College</option>
                    <?php 
                      if($result->num_rows > 0){ 
                          while($row = $result->fetch_assoc()){  
                              echo '<option value="'.$row['College_ID'].'">'.$row['College_Name'].'</option>'; 
                          } 
                      }else{ 
                          echo '<option value="">College not available</option>'; 
                      } 
                    ?>

                      </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="department">Department</label>
                    <select class="form-control" id="department" name="department" required>
                    <option>--This will update after selecting a college--</option>
                   </select>
                  </div>
                </div>
                </div>
                <hr>
                <h5>System Generated Account</h5>
                <div class = "row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                  </div>
                </div> 
                </div>
                <!-- /.card-body -->

                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button type="submit" name="save" class="btn btn-primary float-right">Save</button>
                </div>
              </form>
            </div>
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
      <!-- /.modal -->
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
<!-- Page specific script -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
$(document).ready(function(){
    $('#college').on('change', function(){
        var College_ID = $(this).val();
        if(College_ID){
            $.ajax({
                type:'POST',
                url:'ajaxFaculty.php',
                data:'College_ID='+College_ID,
                success:function(html){
                    $('#department').html(html);
                }
            }); 
        }else{
            $('#department').html('<option value="">Select college first</option>');
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
</body>
</html>