<?php
session_start();
error_reporting(0);
include('includes/db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISTER | Home</title>
  <!--Swiper-->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/style.css">
  <style>

div.transbox {
  margin: 60px;
  background-color: #777;
  opacity: 0.5;
}

div.transbox p {
  margin: 10%;
  font-weight: bold;
  color: #000000;
}
  </style>
</head>
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/logo.png" alt="SISTERLogo" height="300" width="300">
  </div>

<body class="hold-transition layout-top-nav">
  
<div id="menu-btn" class="fas fa-bars"></div>

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="dist/img/logo.png" alt="SISTERLogo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Student Information System for Enrollment and Rating</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3 justify-content-end" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="contact.php" class="nav-link">Contact</a>
          </li>
          <li class="nav-item align-items-end">
            <a href="sign_up.php" class="nav-link">Sign Up</a>
          </li>
          <!-- <li class="nav-item align-items-end">
            <a href="admin/admin_login.php" class="nav-link">Admin Log In</a>
          </li>
          <li class="nav-item align-items-end">
            <a href="student/student_login.php" class="nav-link">Student Log In</a>
          </li> -->
        </ul>
        <!-- SEARCH FORM -->
<!--<form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> -->
      </div>
    </div>
  </nav>
  <div class="content-wrapper">
    <section class="content">
    <section class="home">

<div class="swiper home-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide" style="background:url(images/explore.jpg) no-repeat">
         <div class="content">
  
             
             <span>Mindanao State University - Iligan Institute of Technology</span>

            <h3>explore</h3>

            

         </div>
      </div>

      <div class="swiper-slide slide" style="background:url(images/learn.jpg) no-repeat">
         <div class="content">
         <span>Mindanao State University - Iligan Institute of Technology</span>
            <h3>discover</h3>

         </div>
      </div>

      <div class="swiper-slide slide" style="background:url(images/discover.png) no-repeat">
         <div class="content">
         <span>Mindanao State University - Iligan Institute of Technology</span>
            <h3>learn</h3>
         </div>
      </div>
      
   </div>

   <div class="swiper-button-next"></div>
   <div class="swiper-button-prev"></div>

</div>

</section>

<!-- home section ends -->

<!-- section starts  -->

<section class="services">

<h1 class="heading-title">welcome to sister!</h1>

<div class="box-container">

   <div class="box">
   <a href="faculty/faculty_login.php">
      <img src="images/fac.png" alt="">
      <h3>faculty login</h3>
   </a>
   </div>

   <div class="box">
   <a href="student/student_login.php">
      <img src="images/icon-3.png" alt="">
      <h3>student login</h3>
   </a>
   </div>

   <div class="box">
     <a href="admin/admin_login.php">
      <img src="images/Admin.png" alt="">
      <h3>admin login</h3>
     </a>
   </div>
<!-- 
   <div class="box">
      <img src="images/icon-4.png" alt="">
      <h3>camp fire</h3>
   </div>

   <div class="box">
      <img src="images/icon-5.png" alt="">
      <h3>off road</h3>
   </div>

   <div class="box">
      <img src="images/icon-6.png" alt="">
      <h3>camping</h3>
   </div> -->

</div>

</section>

<!-- section ends -->


<!-- section starts  -->

<section class="home-packages">

<h1 class="heading-title"> Course Offering</h1>

<div class="box-container">

   <div class="box">
      <div class="image">
         <img src="images/ccs.png" alt="">
      </div>
      <div class="content">
         <h3>CCS</h3>
         <p>College of Computer Studies</p>
         <a href="colleges/ccs.php" class="btn">Learn More</a>
      </div>
   </div>

   <div class="box">
      <div class="image">
         <img src="images/csm.png" alt="">
      </div>
      <div class="content">
         <h3>CSM</h3>
         <p>College of Science and Mathematics</p>
         <a href="colleges/csm.php" class="btn">Learn More</a>
      </div>
   </div>
   
   <div class="box">
      <div class="image">
         <img src="images/ced.png" alt="">
      </div>
      <div class="content">
         <h3>CED</h3>
         <p>College of Education</p>
         <br></br>
         <a href="colleges/ced.php" class="btn">Learn More</a>
      </div>
   </div>
   <div class="box">
      <div class="image">
         <img src="images/cass.jpg" alt="">
      </div>
      <div class="content">
         <h3>CASS</h3>
         <p>College of Arts and Social Sciences</p>
         <a href="colleges/cass.php" class="btn">Learn More</a>
      </div>
   </div>
   <div class="box">
      <div class="image">
         <img src="images/con.png" alt="">
      </div>
      <div class="content">
         <h3>CON</h3>
         <p>College of Nursing</p>
         <br></br>
         <br></br>
         <a href="colleges/cons.php" class="btn">Learn More</a>
      </div>
   </div>
   <div class="box">
      <div class="image">
         <img src="images/ceba.png" alt="">
      </div>
      <div class="content">
         <h3>CEBA</h3>
         <p>College of Economics, Business and Accountancy</p>
         <br></br>
         <a href="colleges/ceba.php" class="btn">Learn More</a>
      </div>
   </div>
   <div class="box">
      <div class="image">
         <img src="images/coet.png" alt="">
      </div>
      <div class="content">
         <h3>COET</h3>
         <p>College of Engineering and Technology</p>
         <br></br>
         <a href="colleges/coet.php" class="btn">Learn More</a>
      </div>
   </div>
   <!-- <div class="box">
      <div class="image">
         <img src="images/img-1.jpg" alt="">
      </div>
      <div class="content">
         <h3>Graduate Studies</h3>
         <a href="book.php" class="btn">Enroll now!</a>
      </div>
   </div> -->

</div>


</section>

<!-- section ends -->

<!-- home about section starts  -->

<section class="home-about">

<div class="image">
   <img src="dist/img/moving-logo.gif" alt="">
</div>

<div class="content">
   <h3>about us</h3>
   <p>SISTER is a Website Project in ITE 183 - Web Systems and Application. The aim of this project is to design and develop a web-based school management system that will integrate the admission, registration, and evaluation modules in accordance with the students and faculty information (i.e., clearance, advising, assessment in enrolment, etc.) presented in the school system. 
</p>
   <a href="aboutus.php" class="btn">read more</a>
</div>

</section>

<!-- home about section ends -->

<!-- home offer section starts  -->


<!-- home offer section ends -->

















<!-- footer section starts  -->

<section class="footer" style="background:url('images/footer-bg.jpg')">

<div class="box-container">

   <div class="box">
      <h3>quick links</h3>
      <a href="../sister-main/index.php"> <i class="fas fa-angle-right"></i> MSU - IIT Vision, Mission, Core Values</a>
      <a href="about.php"> <i class="fas fa-angle-right"></i> Sign - up</a>
      <a href="../sister-main/student/student_login.php"> <i class="fas fa-angle-right"></i> Student Login</a>
      <a href="../sister-main/admin/admin_login.php"> <i class="fas fa-angle-right"></i> Admin Login</a>
   </div>

   <div class="box">
      <h3>extra links</h3>
      <a href="#"> <i class="fas fa-angle-right"></i> FAQs</a>
      <a href="aboutus.php"> <i class="fas fa-angle-right"></i> about us</a>
      <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
      <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
   </div>

   <div class="box">
      <h3>contact info</h3>
      <a href="#"> <i class="fas fa-phone"></i> +221-0495</a>
      <a href="#"> <i class="fas fa-phone"></i> +639761653539 </a>
      <a href="#"> <i class="fas fa-envelope"></i> sister@gmail.com </a>
      <a href="#"> <i class="fas fa-map"></i> iligan city- philippines 9200</a>
   </div>

   <div class="box">
      <h3>follow us</h3>
      <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
      <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
      <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
      <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
   </div>

</div>



</section>

<!-- footer section ends -->






    </section>
  </div>
</div>


<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="dist/js/script.js"></script>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>