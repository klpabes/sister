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
    <div class="content-wrapper" >
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</a></li>
                <li class="breadcrumb-item active">Certificate of Registration</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8">
              <!-- Your Page Content Here -->
              <div class="card">
                  <!-- <button type="button" class="btn btn-sm btn-default pull-right btn-print-cor"><span class="fa fa-print"></span> Print COR</button> -->

                <div class="card card-danger card-outline">
                <div class="card-header">
                  <h3 class="card-title">
                    Enrollment Information
                  </h3>
                  <div class="card-tools">
                        <ul class="pagination pagination-sm float-right">
                        <li class="page-item"><span>School Year:</span>
                            <select name="sy" id="sy" class="sy form-control">
                                <option value="cor.php?sy=2022-2023&sem=1" selected>2022-2023</option>
                                <option value="cor.php?sy=2021-2022&sem=1">2021-2022</option>
                            </select>
                        </li>
                        <li class="page-item"><span>Semester:</span>
                            <select name="sem" id="sem" class="sem form-control">
                            <option value="cor.php?sy=2022-2023&sem=1" selected>1</option>
                            <option value="cor.php?sy=2022-2023&sem=2">2</option>
                            <option value="cor.php?sy=2022-2023&sem=S">S</option>
                            </select>
                        </li>
                        </ul>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tbody>
                      <tr>
                         <th>Registration Date</th>
                        <td>August 18, 2022</td>
                      </tr>
                      <tr>
                        <th>ID Number</th>
                        <td>><?php echo $result['Student_ID']; ?></td>
                      </tr>
                      <tr>
                        <th>Fullname</th>
                        <td><?php echo $result['Student_Firstname']; ?><?php echo $result['Student_Lastname']; ?> </td>
                      </tr>
                      <tr>
                        <th>Term / School Year</th>
                        <td>1 / 2022-2023</td>
                      </tr>
                      <tr>
                        <th>Course</th>
                        <td>BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY (BSIT)</td>
                      </tr>
                      <tr>
                      <th>Year Level</th>
                        <td>4</td>
                      </tr>
                      <tr>
                      <th>Scholarship Status</th>
                        <td>Dean's Award</td>
                      </tr>
                      <tr>
                      <th>Scholastic Status</th>
                        <td>REGULAR</td>
                      </tr>
                      <tr>
                      <th>Previous GPA</th>
                        <td>1.54167</td>
                      </tr>
                      <tr>
                      <th>Cumulative GPA</th>
                        <td>1.68812</td>
                      </tr>
                      <tr>
                      <th>Total Load</th>
                        <td>21 units</td>
                      </tr>
                    </tbody>
                  </table>
                   <div class="table-responsive">
                    <table class="table table-striped  table-hover table-condensed">
                        <tbody>
                            <tr>
                                <th>SubjCode</th>
                                <th>Section</th>
                                <th>Description / Virtual Classroom</th>
                                <th>Batch</th>
                                <th>Days</th>
                                <th>Time</th>
                                <th>Bldg/Room</th>
                                <th>Grade</th>
                            </tr>   
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                  </div>  
                </div>
              </div>    
            </div>
            <div class="col-lg-4">
            <div class="card card-danger card-outline">
              <div class="card-header">
                  <div class="card-title">Assessment of Fees (SY: <span class="text-warning">2022-2023</span>, Sem: <span class="text-warning">1</span>)</h3>
                </div>
                <div class="box-body">
                                    <table class="table table-bordered m-b10">
                    <tr class="active">
                      <th>Total</th>
                      <th>Paid</th>
                      <th>Balance</th>
                    </tr>
                    <tr>
                      <td><strong class="text-info">Php 4,043</strong></td>
                      <td><strong class="text-success">Php 0</strong></td>
                      <td><strong class="text-danger">Php 4,043</strong></td>
                    </tr>
                  </table>
                                    
                  <table class="table table-hover table-striped table-condensed">
                    <thead>
                      <tr class="active">
                        <th colspan="2">Breakdown of fees</th>
                      </tr>
                    </thead>
                    <tbody>
                                            <tr>
                        <td>Tuition Fee (1800.00)</td>
                        <td>0.00</td>
                      </tr>
                                            <tr>
                        <td>Lab Fee</td>
                        <td>0.00</td>
                      </tr>
                                            <tr>
                        <td>Comp. Lab Fee</td>
                        <td>1500.00</td>
                      </tr>
                                            <tr>
                        <td>Reg Fee</td>
                        <td>40.00</td>
                      </tr>
                                            <tr>
                        <td>Athletics</td>
                        <td>100.00</td>
                      </tr>
                                            <tr>
                        <td>Guidance</td>
                        <td>20.00</td>
                      </tr>
                                            <tr>
                        <td>Medical/Dental</td>
                        <td>50.00</td>
                      </tr>
                                            <tr>
                        <td>Lib Fee</td>
                        <td>150.00</td>
                      </tr>
                                            <tr>
                        <td>Stud Pub</td>
                        <td>40.00</td>
                      </tr>
                                            <tr>
                        <td>Stud Gov</td>
                        <td>18.00</td>
                      </tr>
                                            <tr>
                        <td>Student Fee</td>
                        <td>0.00</td>
                      </tr>
                                            <tr>
                        <td>ID Fee</td>
                        <td>0.00</td>
                      </tr>
                                            <tr>
                        <td>ID Validation</td>
                        <td>5.00</td>
                      </tr>
                                            <tr>
                        <td>Internet Fee</td>
                        <td>100.00</td>
                      </tr>
                                            <tr>
                        <td>CHED Misc Fee</td>
                        <td>0.00</td>
                      </tr>
                                            <tr>
                        <td>Facilities Fee</td>
                        <td>0.00</td>
                      </tr>
                                            <tr>
                        <td>Technology Fee</td>
                        <td>0.00</td>
                      </tr>
                                            <tr>
                        <td>Research Related Fee</td>
                        <td>0.00</td>
                      </tr>
                                            <tr>
                        <td>Instruction Related Fee</td>
                        <td>0.00</td>
                      </tr>
                                            <tr>
                        <td>Specialized Lab Fee</td>
                        <td>0.00</td>
                      </tr>
                                            <tr>
                        <td>RLE Fee (Nursing)</td>
                        <td>0.00</td>
                      </tr>
                                            <tr>
                        <td>Late Fee</td>
                        <td>0.00</td>
                      </tr>
                                            <tr>
                        <td>Thesis Advising</td>
                        <td>0.00</td>
                      </tr>
                                            <tr>
                        <td>NSTP Fee</td>
                        <td>0.00</td>
                      </tr>
                                            <tr>
                        <td>Affiliation Fee</td>
                        <td>0.00</td>
                      </tr>
                                            <tr>
                        <td>Cultural Fee</td>
                        <td>100.00</td>
                      </tr>
                                            <tr>
                        <td>Insurance Fee</td>
                        <td>80.00</td>
                      </tr>
                                            <tr>
                        <td>KASAMA Medical</td>
                        <td>40.00</td>
                      </tr>
                                            <tr>
                        <td>Re-Assessment</td>
                        <td>0.00</td>
                      </tr>
                                          </tbody>
                    <tfoot>
                        <tr class="warning">
                          <td><strong>Total</strong></td>
                          <td><strong>Php 2,243</strong></td>
                        </tr>
                    </tfoot>
                  </table>
                                  </div>
              </div>
            </div>
          </div>  
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
</div>

<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
