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
  <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</a></li>
                <li class="breadcrumb-item active">Attendance</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
          <div class="card">
            <div class="card-header with-border form-inline">
              <span>School Year:</span>
              <select name="sy" id="sy" class="sy form-control">
                <option value="">- - Select - -</option>
                                <option value="class-attendance.php?sy=2022-2023" selected>2022-2023</option>
                               <option value="class-attendance.php?sy=2021-2022">2021-2022</option>
                               <option value="class-attendance.php?sy=2020-2021">2020-2021</option>
                               <option value="class-attendance.php?sy=2019-2020">2019-2020</option>
                             </select>
              <div class="btn-group  hidden-print toolbar visible-md visible-lg" role="group" aria-label="...">
                <button type="button" class="btn btn-default btn-float-right" onclick="history.back()"><i class="fa fa-arrow-left"></i> Back</button>
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive-myiit">
                                <div class="alert alert-info-light visible-lg">
                  <p><strong>ATTENDANCE POLICY</strong> (Articles 333-338, MSU Code)</p>
                  <p>Any student who, for unavoidable cause, absents himself from class, must
                  obtain an excuse slip from his Dean to be presented to the instructor concerned not
                  later than the second class session following the students return.</p>
                  <p>Absence due to illness must be reported by the student concerned to the
                  MSU-IIT Clinic (University Infirmary in MSU) within three days after his absence in
                  which case a certificate if illness must be secured from the MSU-IIT Clinic.</p>
                  <p>Excuses are for time missed only. All class work missed must be made up for
                  to the satisfaction for the instructor concerned within a reasonable time from date of
                  absence.</p>
                  <p><strong>A student shall be dropped from his/her class when his/her absences reach 20% of
                  the scheduled hours of that particular subject.</strong></p>
                </div>
                <p class="legend">
                  <i class="fa fa-square text-green-light"></i> Current Subjects
                  <span class="pull-right">
                    <span class="label label-success" title="Present">&nbsp;&nbsp;</span> Present &nbsp; 
                    <span class="label label-danger" title="Absent">&nbsp;&nbsp;</span> Absent &nbsp;
                    <span class="label label-warning" title="Late">&nbsp;&nbsp;</span> Late &nbsp;
                    <span class="label label-info" title="Excused">&nbsp;&nbsp;</span> Excused 
                  </span>
                </p>
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="active">
                      <th>Sem</th>
                      <th>Subject Code</th>
                      <th>Section</th>
                      <th width="25%">Description / Online Classroom</th>
                      <th>Batch</th>
                      <th>Type</th>
                      <th>Schedule</th>
                      <th>Room</th>
                      <th>Teacher</th>
                      <th>Status</th>
                    </tr> 
                  </thead>
                  <tbody>
                                        <tr class="success">
                      <td data-label="Sem">1</td>
                      <td data-label="Subject Code">ENT101      </td>
                      <td data-label="Section">IT4N      </td>
                      <td data-label="Description">
                        <a title="View details" href="class-attendance-detail.php?semsubjid=261010&amp;sy=2022-2023">Startup Essentials: Fundamentals of Innovation-driven Entrepreneurship</a>
                        <span class="text-danger"><br>MOLE Classroom: 
N/A</span>                        <span class="text-danger"><br>Google Classroom: N/A</span>                      </td>
                      <td data-label="Batch">1&nbsp;</td>
                      <td data-label="Type">LEC&nbsp;</td>
                      <td data-label="Schedule">09:00AM-12:00PM - Sa&nbsp;</td>
                      <td data-label="Room">CBA-101     &nbsp;</td>
                      <td data-label="Teacher">NARIT, SHINY ROSE S.&nbsp;</td>
                      <td data-label="Status">
                        <span class="label label-success" title="Present">0</span>
                        <span class="label label-danger" title="Absent">0</span> 
                        <span class="label label-warning" title="Late">0</span>
                        <span class="label label-info" title="Excused">0</span>
                      </td>
                    </tr>
                                        <tr class="success">
                      <td data-label="Sem">1</td>
                      <td data-label="Subject Code">ITE183      </td>
                      <td data-label="Section">IT4N      </td>
                      <td data-label="Description">
                        <a title="View details" href="class-attendance-detail.php?semsubjid=257372&amp;sy=2022-2023">Web Systems and Technologies</a>
                        <br><hr/><a href="https://online.msuiit.edu.ph/moodle/course/view.php?id=6588" target="_blank">&middot; 
MOLE 
Classroom</a> <i class="fa fa-arrow-right"></i> Enrollment Key: ws&t4N47                        <span class="text-danger"><br>Google Classroom: N/A</span>                      </td>
                      <td data-label="Batch">1&nbsp;</td>
                      <td data-label="Type">LEC&nbsp;</td>
                      <td data-label="Schedule">10:30AM-12:30PM - T&nbsp;</td>
                      <td data-label="Room">ICT 3A      &nbsp;</td>
                      <td data-label="Teacher">LUA, HARON HAKEEN D.&nbsp;</td>
                      <td data-label="Status">
                        <span class="label label-success" title="Present">0</span>
                        <span class="label label-danger" title="Absent">0</span> 
                        <span class="label label-warning" title="Late">0</span>
                        <span class="label label-info" title="Excused">0</span>
                      </td>
                    </tr>
                                        <tr class="success">
                      <td data-label="Sem">1</td>
                      <td data-label="Subject Code">ITE183      </td>
                      <td data-label="Section">IT4N      </td>
                      <td data-label="Description">
                        <a title="View details" href="class-attendance-detail.php?semsubjid=257372&amp;sy=2022-2023"></a>
                        <br><hr/><a href="https://online.msuiit.edu.ph/moodle/course/view.php?id=6588" target="_blank">&middot; 
MOLE 
Classroom</a> <i class="fa fa-arrow-right"></i> Enrollment Key: ws&t4N47                        <span class="text-danger"><br>Google Classroom: N/A</span>                      </td>
                      <td data-label="Batch">1&nbsp;</td>
                      <td data-label="Type">LAB&nbsp;</td>
                      <td data-label="Schedule">04:00PM-07:00PM - M&nbsp;</td>
                      <td data-label="Room">Network Lab &nbsp;</td>
                      <td data-label="Teacher">LUA, HARON HAKEEN D.&nbsp;</td>
                      <td data-label="Status">
                        <span class="label label-success" title="Present">0</span>
                        <span class="label label-danger" title="Absent">0</span> 
                        <span class="label label-warning" title="Late">0</span>
                        <span class="label label-info" title="Excused">0</span>
                      </td>
                    </tr>
                                        <tr class="success">
                      <td data-label="Sem">1</td>
                      <td data-label="Subject Code">ITE184      </td>
                      <td data-label="Section">IT4N      </td>
                      <td data-label="Description">
                        <a title="View details" href="class-attendance-detail.php?semsubjid=257386&amp;sy=2022-2023">Social, Legal and Professional Issues in Computing</a>
                        <span class="text-danger"><br>MOLE Classroom: 
N/A</span>                        <span class="text-danger"><br>Google Classroom: N/A</span>                      </td>
                      <td data-label="Batch">&nbsp;</td>
                      <td data-label="Type">LEC&nbsp;</td>
                      <td data-label="Schedule">09:00AM-12:00PM - W&nbsp;</td>
                      <td data-label="Room">ICT 3A      &nbsp;</td>
                      <td data-label="Teacher">PALAD, EDDIE BOUY B.&nbsp;</td>
                      <td data-label="Status">
                        <span class="label label-success" title="Present">2</span>
                        <span class="label label-danger" title="Absent">0</span> 
                        <span class="label label-warning" title="Late">0</span>
                        <span class="label label-info" title="Excused">0</span>
                      </td>
                    </tr>
                                        <tr class="success">
                      <td data-label="Sem">1</td>
                      <td data-label="Subject Code">ITE185      </td>
                      <td data-label="Section">IT4N      </td>
                      <td data-label="Description">
                        <a title="View details" href="class-attendance-detail.php?semsubjid=257387&amp;sy=2022-2023">Information Assurance and Security</a>
                        <br><hr/><a href="https://online.msuiit.edu.ph/moodle/course/view.php?id=6680" target="_blank">&middot; 
MOLE 
Classroom</a> <i class="fa fa-arrow-right"></i> Enrollment Key: ITE185_1                        <span class="text-danger"><br>Google Classroom: N/A</span>                      </td>
                      <td data-label="Batch">1&nbsp;</td>
                      <td data-label="Type">LEC&nbsp;</td>
                      <td data-label="Schedule">01:00PM-03:00PM - T&nbsp;</td>
                      <td data-label="Room">ICT 3A      &nbsp;</td>
                      <td data-label="Teacher">LLAMAS, MARIA CAMILLA ANN R.&nbsp;</td>
                      <td data-label="Status">
                        <span class="label label-success" title="Present">0</span>
                        <span class="label label-danger" title="Absent">0</span> 
                        <span class="label label-warning" title="Late">0</span>
                        <span class="label label-info" title="Excused">0</span>
                      </td>
                    </tr>
                                        <tr class="success">
                      <td data-label="Sem">1</td>
                      <td data-label="Subject Code">ITE185      </td>
                      <td data-label="Section">IT4N      </td>
                      <td data-label="Description">
                        <a title="View details" href="class-attendance-detail.php?semsubjid=257387&amp;sy=2022-2023"></a>
                        <br><hr/><a href="https://online.msuiit.edu.ph/moodle/course/view.php?id=6680" target="_blank">&middot; 
MOLE 
Classroom</a> <i class="fa fa-arrow-right"></i> Enrollment Key: ITE185_1                        <span class="text-danger"><br>Google Classroom: N/A</span>                      </td>
                      <td data-label="Batch">1&nbsp;</td>
                      <td data-label="Type">LAB&nbsp;</td>
                      <td data-label="Schedule">01:00PM-04:00PM - Th&nbsp;</td>
                      <td data-label="Room">Network Lab &nbsp;</td>
                      <td data-label="Teacher">LLAMAS, MARIA CAMILLA ANN R.&nbsp;</td>
                      <td data-label="Status">
                        <span class="label label-success" title="Present">0</span>
                        <span class="label label-danger" title="Absent">0</span> 
                        <span class="label label-warning" title="Late">0</span>
                        <span class="label label-info" title="Excused">0</span>
                      </td>
                    </tr>
                                        <tr class="success">
                      <td data-label="Sem">1</td>
                      <td data-label="Subject Code">ITE199      </td>
                      <td data-label="Section">PBB       </td>
                      <td data-label="Description">
                        <a title="View details" href="class-attendance-detail.php?semsubjid=257469&amp;sy=2022-2023">Undergraduate Thesis</a>
                        <span class="text-danger"><br>MOLE Classroom: 
N/A</span>                        <span class="text-danger"><br>Google Classroom: N/A</span>                      </td>
                      <td data-label="Batch">&nbsp;</td>
                      <td data-label="Type">&nbsp;</td>
                      <td data-label="Schedule"> - &nbsp;</td>
                      <td data-label="Room">&nbsp;</td>
                      <td data-label="Teacher">BOKINGKITO, PAUL, JR. B.&nbsp;</td>
                      <td data-label="Status">
                        <span class="label label-success" title="Present">0</span>
                        <span class="label label-danger" title="Absent">0</span> 
                        <span class="label label-warning" title="Late">0</span>
                        <span class="label label-info" title="Excused">0</span>
                      </td>
                    </tr>
                                        <tr class="success">
                      <td data-label="Sem">1</td>
                      <td data-label="Subject Code">ITN104      </td>
                      <td data-label="Section">IT4N      </td>
                      <td data-label="Description">
                        <a title="View details" href="class-attendance-detail.php?semsubjid=261847&amp;sy=2022-2023">Enterprise Networking</a>
                        <span class="text-danger"><br>MOLE Classroom: 
N/A</span>                        <span class="text-danger"><br>Google Classroom: N/A</span>                      </td>
                      <td data-label="Batch">&nbsp;</td>
                      <td data-label="Type">LEC&nbsp;</td>
                      <td data-label="Schedule">07:00AM-09:00AM - Sa&nbsp;</td>
                      <td data-label="Room">ICT 3A      &nbsp;</td>
                      <td data-label="Teacher">AGAD, RANIE BOY B.&nbsp;</td>
                      <td data-label="Status">
                        <span class="label label-success" title="Present">0</span>
                        <span class="label label-danger" title="Absent">0</span> 
                        <span class="label label-warning" title="Late">0</span>
                        <span class="label label-info" title="Excused">0</span>
                      </td>
                    </tr>
                                        <tr class="success">
                      <td data-label="Sem">1</td>
                      <td data-label="Subject Code">ITN104      </td>
                      <td data-label="Section">IT4N      </td>
                      <td data-label="Description">
                        <a title="View details" href="class-attendance-detail.php?semsubjid=261847&amp;sy=2022-2023"></a>
                        <span class="text-danger"><br>MOLE Classroom: 
N/A</span>                        <span class="text-danger"><br>Google Classroom: N/A</span>                      </td>
                      <td data-label="Batch">&nbsp;</td>
                      <td data-label="Type">LAB&nbsp;</td>
                      <td data-label="Schedule">01:00PM-04:00PM - Sa&nbsp;</td>
                      <td data-label="Room">Network Lab &nbsp;</td>
                      <td data-label="Teacher">AGAD, RANIE BOY B.&nbsp;</td>
                      <td data-label="Status">
                        <span class="label label-success" title="Present">0</span>
                        <span class="label label-danger" title="Absent">0</span> 
                        <span class="label label-warning" title="Late">0</span>
                        <span class="label label-info" title="Excused">0</span>
                      </td>
                    </tr>
                                        <tr class="success">
                      <td data-label="Sem">1</td>
                      <td data-label="Subject Code">ITN111      </td>
                      <td data-label="Section">IT4N      </td>
                      <td data-label="Description">
                        <a title="View details" href="class-attendance-detail.php?semsubjid=257398&amp;sy=2022-2023">Information Security</a>
                        <span class="text-danger"><br>MOLE Classroom: 
N/A</span>                        <span class="text-danger"><br>Google Classroom: N/A</span>                      </td>
                      <td data-label="Batch">&nbsp;</td>
                      <td data-label="Type">LEC&nbsp;</td>
                      <td data-label="Schedule">06:00PM-08:00PM - T&nbsp;</td>
                      <td data-label="Room">ICT 3A      &nbsp;</td>
                      <td data-label="Teacher">VILLAVER, REXAN E.&nbsp;</td>
                      <td data-label="Status">
                        <span class="label label-success" title="Present">11</span>
                        <span class="label label-danger" title="Absent">0</span> 
                        <span class="label label-warning" title="Late">0</span>
                        <span class="label label-info" title="Excused">0</span>
                      </td>
                    </tr>
                                        <tr class="success">
                      <td data-label="Sem">1</td>
                      <td data-label="Subject Code">ITN111      </td>
                      <td data-label="Section">IT4N      </td>
                      <td data-label="Description">
                        <a title="View details" href="class-attendance-detail.php?semsubjid=257398&amp;sy=2022-2023"></a>
                        <span class="text-danger"><br>MOLE Classroom: 
N/A</span>                        <span class="text-danger"><br>Google Classroom: N/A</span>                      </td>
                      <td data-label="Batch">&nbsp;</td>
                      <td data-label="Type">LAB&nbsp;</td>
                      <td data-label="Schedule">07:00PM-08:30PM - MTh&nbsp;</td>
                      <td data-label="Room">Network Lab &nbsp;</td>
                      <td data-label="Teacher">VILLAVER, REXAN E.&nbsp;</td>
                      <td data-label="Status">
                        <span class="label label-success" title="Present">3</span>
                        <span class="label label-danger" title="Absent">0</span> 
                        <span class="label label-warning" title="Late">0</span>
                        <span class="label label-info" title="Excused">0</span>
                      </td>
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
