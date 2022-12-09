<?php
session_start();
require_once 'includes/db_connection.php';
$student_id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM student WHERE Student_ID='$student_id'");
$result= mysqli_fetch_array($query);
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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Student Management</li>
              <li class="breadcrumb-item active">View Student Information</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-danger card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-square"
                       src="../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?php echo $result['Student_Firstname']; ?> <?php echo $result['Student_Middlename']; ?>. <?php echo $result['Student_Lastname']; ?></h3>
                <p class="text-muted text-center"><?php echo $result['Student_Year_Level'];?> <?php echo $result['Student_Program'];?></p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Previous GPA</b> <a class="float-right"></a>
                  </li>
                  <li class="list-group-item">
                    <b>Cumulative GPA</b> <a class="float-right"></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Contact Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
                <p class="text-muted"><?php echo $result['street'];?> <?php echo $result['barangay'];?>, 
                <?php echo $result['city'];?>, <?php echo $result['province'];?> <?php echo $result['zip']; ?></p>
                <hr>
                <strong><i class="fas fa-phone mr-1"></i> Phone</strong>
                <p class="text-muted"><?php echo $result['Student_Phone'];?></p>
                <hr>
                <strong><i class="fas fa-at mr-1"></i>Email</strong>
                <p class="text-muted"><?php echo $result['Student_Email'];?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#student_data" data-toggle="tab">Student Data</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="student_data">
                    <div class="card-body">
                        <div class = "row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    <i class="fas fa-user"></i>
                                    Personal Information
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <dt class="col-sm-8">ID Number</dt>
                                    <dd class="col-sm-8"><?php echo $result['Student_ID'];?></dd>
                                    <dt class="col-sm-4">Last Enrolled</dt>
                                    <dd class="col-sm-8"></dd>
                                    <dt class="col-sm-4">Gender</dt>
                                    <dd class="col-sm-8"><?php echo $result['Student_Gender'];?></dd>
                                    <dt class="col-sm-4">Civil Status</dt>
                                    <dd class="col-sm-8"></dd>
                                    <dt class="col-sm-4">Citizenship</dt>
                                    <dd class="col-sm-8"></dd>
                                    <dt class="col-sm-4">Religion</dt>
                                    <dd class="col-sm-8"></dd>
                                    <dt class="col-sm-4">Ethnic Group</dt>
                                    <dd class="col-sm-8"></dd>
                                    <dt class="col-sm-4">Date of Birth</dt>
                                    <dd class="col-sm-8"><?php echo $result['Student_Birthdate'];?></dd>
                                    <dt class="col-sm-4">Name of Father</dt>
                                    <dd class="col-sm-8"></dd>
                                    <dt class="col-sm-4">Name of Mother</dt>
                                    <dd class="col-sm-8"></dd>
                                    </dl>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  <section class="content">
                <!-- Your Page Content Here -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Student Mobile Phone Number</h3>
                            </div>
                            <form name="frm-update-contactno" id="frm-update-contactno" method="post" action="" role="form">
                                <div class="box-body">
                                                                                                            <div class="form-group">
                                        <input name="contactno" class="form-control" id="contactno" value="" type="text" size="15" maxlength="11" placeholder="Mobile Phone Number">
                                        <input name="contactno_old" type="hidden" value="">
                                    </div>
                                                                                                            <input name="btnUpdate3" type="submit" id="btnUpdate3" class="btn btn-primary" value="Update" onclick="this.disabled=true; hidden3.name=this.name; hidden3.value=this.value; this.value='Saving... Please wait...'; return validate_contact_form(this);"/>
                                    <input type="button" name="btnCancel" class="btn btn-default" value="Cancel" onclick="javascript:history.back();"/>
                                                                        <input name="hidden3" type="hidden" id="hidden3" value="None"/>
                                </div><!-- /.box-body -->   
                            </form>
                            <hr>
                        </div>
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Change Password</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form name="update-password" method="post" action="settings.php" role="form">
                                <div class="box-body">
                                                                                                            <div class="form-group">
                                        <label for="password">Old Password <span class="text-red">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Old Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password2">New Password <span class="text-red">*</span></label>
                                        <input type="password" class="form-control" name="password2" id="password2" placeholder="New Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password3">Retype New Password <span class="text-red">*</span></label>
                                        <input type="password" class="form-control" name="password3" id="password3" placeholder="Retype New Password">
                                    </div>
                                    <input name="btnUpdate" type="submit" id="btnUpdate" class="btn btn-primary" value="Update Password" onclick="this.disabled=true; hidden1.name=this.name; hidden1.value=this.value; this.value='Saving... Please wait...'; this.form.submit();"/>
                                    <input type="button" name="btnCancel" class="btn btn-default" value="Cancel" onclick="javascript:history.back();"/>
                                    <input name="hidden1" type="hidden" id="hidden1" value="None"/>
                                </div><!-- /.box-body -->
                            </form>
                        </div>
                        <hr>
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Password Recovery Email</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form name="pass-recovery" method="post" action="settings.php" role="form">
                                <div class="box-body">
                                        <div class="form-group">
                                        <label>Password <span class="text-red">*</span></label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                    </div>
                                    <div class="form-group">
                                        <label>New Recovery Email <span class="text-red">*</span></label>
                                        <input name="recovery_email" id="recovery_email" class="form-control" value="penalescjay@gmail.com" type="text" maxlength="50">
                                    </div>
                                    <input name="btnUpdate2" type="submit" id="btnUpdate2" class="btn btn-primary" value="Update" onclick="this.disabled=true; hidden2.name=this.name; hidden2.value=this.value; this.value='Saving... Please wait...'; this.form.submit();"/>
                                    <input type="button" name="btnCancel" class="btn btn-default" value="Cancel" onclick="javascript:history.back();"/>
                                    <input name="hidden2" type="hidden" id="hidden2" value="None"/>
                                </div><!-- /.box-body -->
                            </form>
                        </div>
                    </div>
                </div>
            </section>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>
</div>



<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>