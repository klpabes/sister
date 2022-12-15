<?php
session_start();
include('includes/db_connection.php');
$username_err = $password_err = '';
if (isset($_SESSION['Faculty_ID']) != "") {
  header("Location: faculty_dashboard.php");
}

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $result = mysqli_query($conn, "SELECT * FROM `faculty` WHERE Faculty_Username = '" . $username . "' and Faculty_Password = '" . md5($password) . "'");
  if (!empty($result)) {
    if ($row = mysqli_fetch_array($result)) {
      $_SESSION['Faculty_ID'] = $row['Faculty_ID'];
      $_SESSION['username'] = $row['Faculty_Username'];
      $_SESSION['name'] = $row['Faculty_Firstname'];
      header("Location: faculty_dashboard.php");
    } else {
      $username_err = 'Please enter your username';
      $password_err = 'Please enter your password';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css\login.css">
  <title>SISTER | Admin Login</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../dist/css/login.css">
</head>
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="../dist/img/logo.png" alt="SISTERLogo" height="300" width="300">
</div>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="./index.php" class="navbar-brand">
          <img src="../dist/img/logo.png" alt="SISTERLogo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">SISTER</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3 justify-content-end" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="../index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="contact.php" class="nav-link">Contact</a>
            </li>
            <li class="nav-item align-items-end">
              <a href="sign_up.php" class="nav-link">Sign Up</a>
            </li>
            <li class="nav-item align-items-end">
              <a href="../student/student_login.php" class="nav-link">Student Log In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    </head>
    <div class="container d-flex justify-content-center">

      <div class="login-wrapper p-3">
        <div class="card-header text-center">
          <a href="../index.php" class="h1"><img src="../dist/img/logo.png" alt="sister logo" width="120px" height="120px" ;>
          </a>
          <h4>Faculty - Log In</h4>
        </div>
        <div class="login-div">
          <div class="login-form">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
              <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label for="username">Username/Email:</label>
                <input type="text" class="form-control" name="username" id="email" placeholder="e.g. juan.delacruz">
                <span class="help-block"><?php echo $username_err; ?></span>
              </div>
              <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="*****">
                <span class="help-block"><?php echo $password_err; ?></span>
                <div class="div-forgot-pass d-flex justify-content-center">
                  <button type="submit" name="login" class="btn btn-primary mt-3">Submit</button>
                </div>
            </form>
          </div>

        </div>

        <div class="login-div">
          <div class="register text-center mt-2 mb-2">New to SISTER portal? <a href="registration.php">Create an account</a></div>
        </div>
      </div>


    </div>

    <!-- swiper js link  -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="../dist/js/script.js"></script>

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>
</body>

</html>