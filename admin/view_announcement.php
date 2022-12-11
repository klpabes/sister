<?php
session_start();
include('includes/db_connection.php');

$announcement_id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM announcements WHERE Announcement_ID='$announcement_id'");
$result= mysqli_fetch_array($query);

if(isset($_POST['submit'])){
    $classid = mysqli_real_escape_string($conn,$_POST['classid']);
    $subject = mysqli_real_escape_string($conn,$_POST['subject']);
    $announce = mysqli_real_escape_string($conn,$_POST['announce']);

    $query = "UPDATE announcements  SET Announcement_For='$classid', Announcement_Subject='$subject', Announcement_Paragraph='$announce' WHERE Announcement_ID='$announcement_id'";

    $query_run = mysqli_query($conn, $query);

    if($query_run){
    $_SESSION['status'] = "Announcement updated successfully!";
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
  <!--Favicon-->
  <link rel="icon" type="image/x-icon" href="../dist/img/logo.png">
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
            <h1>Edit Announcement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Announcement</a></li>
              <li class="breadcrumb-item active">Compose</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
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
            <form method="POST">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Announcement ID: <?php echo $result['Announcement_ID']; ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                <label for="to">Announce To:</label>
                  <select name="classid" class="form-control" required='true' placeholder="To:">
                        <option value="Student">All Students</option>
                        <option value="Faculty">All Faculties</option>
                        <option value="Public">Public</option>
                  </select>
                </div>
                <div class="form-group">
                  <input class="form-control" value="<?php echo $result['Announcement_Subject']; ?>"name="subject" placeholder="Subject:">
               
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" name="announce" class="form-control" style="height: 300px">
                    <?php echo $result['Announcement_Paragraph']; ?>
                    </textarea>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="submit" name="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Submit</button>
                </div>
              </div>
                </form>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>








<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</body>
</html>
