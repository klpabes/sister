<nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #992129">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">0 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i>0 new messages
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i>0 new reports
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-angle-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <i class="fas fa-cogs mr-2"></i>Settings
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item">
            <i class="fas fa-power-off mr-2"></i>Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-light-danger elevation-4" style="background-color: #F8E4C7;">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link" style="background-color: #F8E4C7">
      <img src="../dist/img/logo.png" alt="SISTERLogo" class="brand-image" style="opacity: .8">
      <span class="brand-text" style="color: #992129;"><b>SISTER</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="me.php" class="d-block"><?php echo $_SESSION['name'];?></a>
            </div>
        </div>

        <!--TEST-->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" >
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item active">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-header">Academics</li>
            <li class="nav-item">
                <a href="admission.php" class="nav-link">
                  <i class="fa fa-user-plus nav-icon"></i>
                  <p>Teaching Load</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="advising.php" class="nav-link">
                <i class="fas fa-book-open nav-icon"></i>
                  <p>Subjects Handled</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="advising.php" class="nav-link">
                <i class="fas fa-calendar nav-icon"></i>
                  <p>Class Schedule</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="advising.php" class="nav-link">
                <i class="fas fa-user-graduate nav-icon"></i>
                  <p>INC Grade Monitor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="advising.php" class="nav-link">
                <i class="fas fa-user-graduate nav-icon"></i>
                  <p>Class Advisees</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="advising.php" class="nav-link">
                <i class="fas fa-user-graduate nav-icon"></i>
                  <p>Course Enlistment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="advising.php" class="nav-link">
                <i class="fas fa-user-graduate nav-icon"></i>
                  <p>Student Clearance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="advising.php" class="nav-link">
                <i class="fas fa-user-graduate nav-icon"></i>
                  <p>Department Course Offering</p>
                </a>
              </li>
          </li>
          <li class="nav-header">ANNOUNCEMENT MANAGEMENT</li>
          <li class="nav-item">
            <a href="announcements.php" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Announcements
              </p>
            </a>
          </li> 
          <li class="nav-header">CLEARANCE & LIABILITIES</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                List of Clearance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li> 
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>