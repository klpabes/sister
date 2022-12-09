<?php 
  session_start();
  include ('includes/db_connection.php');

  if(!isset($_SESSION['username'])){
    header('Location: logout.php');
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
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $program = mysqli_real_escape_string($conn, $_POST['program']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $brgy = mysqli_real_escape_string($conn, $_POST['brgy']);
    $purok = mysqli_real_escape_string($conn, $_POST['purok']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $status = "Active";


    $query = "INSERT INTO student (Student_Lastname,Student_Firstname,Student_Middlename,Student_Birthdate,Student_Gender,
    Student_Email,Student_Username,Student_Password,Student_Phone,Student_Program,country,zip,province,city,barangay,purok,street,Status) 
    VALUES ('$lastname','$firstname',' $middlename','$birth','$gender',' $email','$username',md5('$password'),'$phone','$program','$country','$zip','$province','$city','$brgy','$street','$purok','$status')";

    $query_run = mysqli_query($conn, $query);

    if($query_run){
      $_SESSION['status'] = "Student added successfully!";
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
              <h1>Student Admission</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Student Management</li>
                <li class="breadcrumb-item active">Student Admission</li>
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
                  <h5>Personal Information</h5>
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
                            <select class="form-control" id="gender" name="gender" data-placeholder="Select Gender" required>
                                <option></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="birthdate">Date of Birth</label>
                            <input type="date" class="form-control" name="birthdate" id="birthdate" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="religion">Religion</label>
                            <input type="text" class="form-control" name="religion" id="religion" required>
                          </div>
                        </div>
                        </div>
                        <hr>
                        <h5>Permanent Address</h5>
                        <div class = "row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name="country" id="country" required>
                          </div>
                        </div>
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
                              <input type="number" class="form-control" name="phone" id="phone" required max-length="11">
                            </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                              </div>
                            </div>
                        </div>
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
                              <button type="submit" name="save" id="save" class="btn btn-primary float-right">Save</button>
                            </div> 
                          </div>
                    </div>
                </div>
                                    </form>
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
