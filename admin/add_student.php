<?php 
  session_start();
  include ('includes/db_connection.php');

  if(!isset($_SESSION['username'])){
    header('Location: admin_login.php');
 }
    $query_college = "SELECT * FROM college ORDER BY College_Name ASC";
    $result = $conn->query($query_college); 


    if(isset($_POST['save']))
    {
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $birth = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $program = mysqli_real_escape_string($conn, $_POST['program']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
    $purok = mysqli_real_escape_string($conn, $_POST['purok']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $status = "Active";


    $query = "INSERT INTO student (Student_Lastname,Student_Firstname,Student_Middlename,Student_Birthdate,Student_Gender,
    Student_Email,Student_Password,Student_Phone,Student_Program,zip,province,city,barangay,purok,street,Status) 
    VALUES ('$lastname','$firstname',' $middlename','$birth','$gender',' $email',md5('$password'),'$phone','$program','$zip','$province','$city','$brgy','$street','$purok','$status')";

    $query_run = mysqli_query($conn, $query);

    if($query_run){
      $_SESSION['status'] = "Student added successfully!";
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

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          <div class="col-sm-6">
            <h1>Student Admission</h1>
          </div>
          <div class="col-sm-6">
            
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Student Management</li>
              <li class="breadcrumb-item active">Student Admission</li>
            </ol>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
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
                    <label for="middlename">Middle Name</label>
                    <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Enter Middle Name" required>
                  </div>
                </div>
                <div class="col-md-4">
                <label for="gender">Gender</label>
                  <div class="form-group">
                    <input type="radio" id="male " name="gender" value="Male" required>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="Female" required>
                    <label for="female">Female</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="birthdate">Date of Birth</label>
                    <input type="date" class="form-control" name="birthdate" id="birthdate" required>
                  </div>
                </div>
                </div>
                <hr>
                <h5>Address</h5>
                <div class = "row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="province">State/Province</label>
                    <input type="text" class="form-control" name="province" id="province" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="zip">Zip Code</label>
                    <input type="text" class="form-control" name="zip" id="zip" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" id="city" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="brgy">Barangay</label>
                    <input type="text" class="form-control" name="brgy" id="brgy" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="purok">Purok/Subdivision</label>
                    <input type="text" class="form-control" name="purok" id="purok" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="street">Street/Blk No.</label>
                    <input type="text" class="form-control" name="street" id="street" required>
                  </div>
                </div>
                </div> 
                <hr>
                <h5>Contact</h5>
                <div class = "row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="number" class="form-control" name="phone" id="phone" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                  </div>
                </div>
                </div>
                <h5>Academic Information</h5>
                <div class = "row">
                <div class="col-md-4">
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
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="department">Department</label>
                    <select class="form-control" id="department" name="department" required>
                    <option>--This will update after selecting a college--</option>
                   </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="program">Program</label>
                    <select class="form-control" id="program" name="program" required>
                    <option>--This will update after selecting a department--</option>
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
                    <label for="password">Temporary Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                  </div>
                </div> 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
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
