<?php 
  session_start();
  include ('includes/db_connection.php');

  $student_id = $_SESSION['Student_ID'];
  $query = mysqli_query($conn, "SELECT * FROM student WHERE Student_ID='$student_id'");
  $result= mysqli_fetch_array($query);

  if(!isset($_SESSION['username'])){
    header('Location: student_login.php');

 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISTER</title>

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
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/logo.png" alt="SISTERLogo" height="300" width="300">
  </div>

<body  class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed ">
<div class="wrapper">
  <?php include('includes/student_nav.php');?>
  <div class="content-wrapper">
  <section class="content">
          <!-- Your Page Content Here -->
          <div class="card">
            <div class="card-header">
            </div>
            <div class="box-body" id="dom2png">
              <p id="dom2png-title" class="hidden">
  <div class="container table-responsive">
    <table class="table table-condensed table-bordered">
      <tbody>
        <tr class="active">
          <th class="sked-time-col" width="11%">Time</th>
          <th width="11%">Monday</th>
          <th width="11%">Tuesday</th>
          <th width="11%">Wednesday</th>
          <th width="11%">Thursday</th>
          <th width="11%">Friday</th>
          <th width="11%">Saturday</th>
          <th width="11%">Sunday</th>
        </tr>
        <tr>
          <td class="sked-time-col">07:00AM-07:30AM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td rowspan="4" class="box-bg1" align="center"><a title="Course details" tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-content="<span>Course Title: <strong>Enterprise Networking</strong><br />Section: <strong>IT4N</strong><br />  Schedule: <strong>Sa 07:00-09:00 rm:ICT 3A ; Sa 01:00-04:00 rm:Network Lab(LAB) ;</strong></span>" class="pop"><small class="visible-xs text-muted">(sat)</small>ITN104<br/><small>IT4N</small><br/><small>ICT 3A</small></a></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">07:30AM-08:00AM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">08:00AM-08:30AM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">08:30AM-09:00AM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">09:00AM-09:30AM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td rowspan="6" class="box-bg2" align="center"><a title="Course details" tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-content="<span>Course Title: <strong>Social, Legal and Professional Issues in Computing</strong><br />Section: <strong>IT4N</strong><br />  Schedule: <strong>W 09:00-12:00 rm:ICT 3A ;</strong></span>" class="pop"><small class="visible-xs text-muted">(wed)</small>ITE184<br/><small>IT4N</small><br/><small>ICT 3A</small></a></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td rowspan="6" class="box-bg3" align="center"><a title="Course details" tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-content="<span>Course Title: <strong>Startup Essentials: Fundamentals of Innovation-driven Entrepreneurship</strong><br />Section: <strong>IT4N</strong><br />  Schedule: <strong>Sa 09:00-12:00 rm:CBA-101 ;</strong></span>" class="pop"><small class="visible-xs text-muted">(sat)</small>ENT101<br/><small>IT4N</small><br/><small>CBA-101</small></a></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">09:30AM-10:00AM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">10:00AM-10:30AM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">10:30AM-11:00AM</td>
                      <td align="center"></td>
                        <td rowspan="4" class="box-bg4" align="center"><a title="Course details" tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-content="<span>Course Title: <strong>Web Systems and Technologies</strong><br />Section: <strong>IT4N</strong><br />  Schedule: <strong>T 10:30-12:30 rm:ICT 3A ; M 04:00-07:00 rm:Network Lab(LAB) ;</strong></span>" class="pop"><small class="visible-xs text-muted">(tue)</small>ITE183<br/><small>IT4N</small><br/><small>ICT 3A</small></a></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">11:00AM-11:30AM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">11:30AM-12:00PM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">12:00PM-12:30PM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">12:30PM-01:00PM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">01:00PM-01:30PM</td>
                      <td align="center"></td>
                        <td rowspan="4" class="box-bg5" align="center"><a title="Course details" tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-content="<span>Course Title: <strong>Information Assurance and Security</strong><br />Section: <strong>IT4N</strong><br />  Schedule: <strong>T 01:00-03:00 rm:ICT 3A ; Th 01:00-04:00 rm:Network Lab(LAB) ;</strong></span>" class="pop"><small class="visible-xs text-muted">(tue)</small>ITE185<br/><small>IT4N</small><br/><small>ICT 3A</small></a></td>
                        <td align="center"></td>
                        <td rowspan="6" class="box-bg5" align="center"><a title="Course details" tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-content="<span>Course Title: <strong>Information Assurance and Security</strong><br />Section: <strong>IT4N</strong><br />  Schedule: <strong>T 01:00-03:00 rm:ICT 3A ; Th 01:00-04:00 rm:Network Lab(LAB) ;</strong></span>" class="pop"><small class="visible-xs text-muted">(thu)</small>ITE185<br/><small>IT4N</small><br/><small>Network Lab</small></a></td>
                        <td align="center"></td>
                        <td rowspan="6" class="box-bg6" align="center"><a title="Course details" tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-content="<span>Course Title: <strong>Enterprise Networking</strong><br />Section: <strong>IT4N</strong><br />  Schedule: <strong>Sa 07:00-09:00 rm:ICT 3A ; Sa 01:00-04:00 rm:Network Lab(LAB) ;</strong></span>" class="pop"><small class="visible-xs text-muted">(sat)</small>ITN104<br/><small>IT4N</small><br/><small>Network Lab</small></a></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">01:30PM-02:00PM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">02:00PM-02:30PM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">02:30PM-03:00PM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">03:00PM-03:30PM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">03:30PM-04:00PM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">04:00PM-04:30PM</td>
                      <td rowspan="6" class="box-bg7" align="center"><a title="Course details" tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-content="<span>Course Title: <strong>Web Systems and Technologies</strong><br />Section: <strong>IT4N</strong><br />  Schedule: <strong>T 10:30-12:30 rm:ICT 3A ; M 04:00-07:00 rm:Network Lab(LAB) ;</strong></span>" class="pop"><small class="visible-xs text-muted">(mon)</small>ITE183<br/><small>IT4N</small><br/><small>Network Lab</small></a></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">04:30PM-05:00PM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">05:00PM-05:30PM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">05:30PM-06:00PM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">06:00PM-06:30PM</td>
                      <td rowspan="4" class="box-bg8" align="center"><a title="Course details" tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-content="<span>Course Title: <strong>Information Security</strong><br />Section: <strong>IT4N</strong><br />  Schedule: <strong>T 06:00-08:00 rm:ICT 3A ; MTh 07:00-08:30 rm:Network Lab(LAB) ;</strong></span>" class="pop"><small class="visible-xs text-muted">(tue)</small>ITN111<br/><small>IT4N</small><br/><small>ICT 3A</small></a></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">06:30PM-07:00PM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">07:00PM-07:30PM</td>
                      <td rowspan="3" class="box-bg9" align="center"><a title="Course details" tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-content="<span>Course Title: <strong>Information Security</strong><br />Section: <strong>IT4N</strong><br />  Schedule: <strong>T 06:00-08:00 rm:ICT 3A ; MTh 07:00-08:30 rm:Network Lab(LAB) ;</strong></span>" class="pop"><small class="visible-xs text-muted">(mon)</small>ITN111<br/><small>IT4N</small><br/><small>Network Lab</small></a></td>
                        <td align="center"></td>
                        <td rowspan="3" class="box-bg9" align="center"><a title="Course details" tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-content="<span>Course Title: <strong>Information Security</strong><br />Section: <strong>IT4N</strong><br />  Schedule: <strong>T 06:00-08:00 rm:ICT 3A ; MTh 07:00-08:30 rm:Network Lab(LAB) ;</strong></span>" class="pop"><small class="visible-xs text-muted">(thu)</small>ITN111<br/><small>IT4N</small><br/><small>Network Lab</small></a></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">07:30PM-08:00PM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                <tr>
          <td class="sked-time-col">08:00PM-08:30PM</td>
                      <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
              </tbody>
    </table>
  </div>  
 
            </div>
          </div>
        </section><!-- /.content -->
</div>




<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
