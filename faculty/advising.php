<?php
session_start();
include('includes/db_connection.php');

if (!isset($_SESSION['username'])) {
    header('Location: logout.php');
}

$query_student = "SELECT * FROM student ORDER BY Student_Lastname ASC";
$result = $conn->query($query_student);


if (isset($_POST['save'])) {
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

    if ($query_run) {
        $_SESSION['status'] = "Student added successfully!";
        header("Location: " . $_SERVER["REQUEST_URI"]);
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
                                <li class="breadcrumb-item">Student Management</li>
                                <li class="breadcrumb-item active">Student Advising</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <?php
                    if (isset($_SESSION['status'])) {
                    ?>
                        <div class="col-sm-8">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i><?php echo $_SESSION['status']; ?></h5>
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
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="id">Student ID No.: </label>
                                                    <select class="form-control" id="student" name="student" data-placeholder="Select Gender" required>
                                                        <option>Select Student</option>
                                                        <?php
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo '<option value="' . $row['Student_ID'] . '">' . $row['Student_ID'] . '</option>';
                                                            }
                                                        } else {
                                                            echo '<option value="">Student not available</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="term">Term: </label>
                                                    <select class="form-control" id="term" name="term" required>
                                                        <option>Select Term</option>
                                                        <?php
                                                        $query_sessions = "SELECT * FROM school_session";
                                                        $resultq = $conn->query($query_sessions);

                                                        if ($resultq->num_rows > 0) {
                                                            while ($rows = $resultq->fetch_assoc()) {
                                                                echo '<option value="' . $rows['Session_ID'] . '">' . $rows['Session_Name'] . ' - ' . $rows['Term'] . ' Term </option>';
                                                            }
                                                        } else {
                                                            echo '<option value="">Session not available</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="lastname">Last Name</label>
                                                    <input type="text" name="lastname" id="lastname" value="<?echo $result['Student_Name'];?>"class="form-control">
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
    <script>
        // onkeyup event will occur when the user 
        // release the key and calls the function
        // assigned to this event
        function GetDetail(str) {
            if (str.length == 0) {
                document.getElementById("firstname").value = "";
                document.getElementById("lastname").value = "";
                document.getElementById("middlename").value = "";
                return;
            } else {

                // Creates a new XMLHttpRequest object
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {

                    // Defines a function to be called when
                    // the readyState property changes
                    if (this.readyState == 4 &&
                        this.status == 200) {

                        // Typical action to be performed
                        // when the document is ready
                        var myObj = JSON.parse(this.responseText);

                        // Returns the response data as a
                        // string and store this array in
                        // a variable assign the value 
                        // received to first name input field

                        document.getElementById("first_name").value = myObj[0];

                        // Assign the value received to
                        // last name input field
                        document.getElementById(
                            "last_name").value = myObj[1];
                    }
                };

                // xhttp.open("GET", "filename", true);
                xmlhttp.open("GET", "gfg.php?user_id=" + str, true);

                // Sends the request to the server
                xmlhttp.send();
            }
        }
    </script>