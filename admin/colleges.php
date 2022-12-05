<?php
session_start();
include ('includes/db_connection.php');
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
    <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
            <h1>List of Colleges</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">College & Department Management</li>
              <li class="breadcrumb-item">College List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                <div class="col-sm-12">
            <br>
          </div>
                <thead>
            <tr>
                <th>College Code</th>
                <th>College Name</th>
                <th>Action</th>
            </tr>
		</thead>
        <?php 
        $query = "SELECT * FROM college ";
        $query_run = mysqli_query($conn, $query);
        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $college){    
        ?>
           <tr>
                <td><?= $college['College_Code']; ?></td>
                <td><?= $college['College_Name']; ?></td>
                <td>
                    <a href="view.php?id=<?= $faculty['Faculty_ID']; ?>" class="btn btn-primary">View</a>
                </td>
            </tr>
            <?php
            }
        }else{
            echo "<h5> No records found </h5>";
        }
    ?>
		</table>

              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
   
      <!-- /.modal -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
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
</body>
</html>