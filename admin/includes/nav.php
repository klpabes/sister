<nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
  <aside class="main-sidebar main-sidebar-custom sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="../dist/img/logo.png" alt="SISTERLogo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>SISTER</b></span>
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
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-header">STUDENT MANAGEMENT</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Students
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="student_list.php" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Enrolled Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="archived_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Archived Students</p>
                </a>
             </li>
            </ul>
            <li class="nav-item">
                <a href="add_student.php" class="nav-link">
                  <i class="fa fa-user-plus nav-icon"></i>
                  <p>Student Admission</p>
                </a>
              </li>
          </li>
          <li class="nav-header">FACULTY MANAGEMENT</li>
          <li class="nav-item">
            <a href="../calendar.html" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Faculties</p>
            </a>
          </li>
          <li class="nav-header">COLLEGE & DEPT. MANAGEMENT</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Colleges
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>CCS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>CSM</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>COET</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>CEBA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>CON</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>CED</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>CASS</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">PROGRAM & SUBJ. MANAGEMENT</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-certificate"></i>
                <p>Programs</p>
            </a> 
         </li>
         <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Subjects</p>
            </a> 
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
          <li class="nav-header">CLEARANCE & LIABILITIES MGMT.</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                List of Clearance
              </p>
            </a>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom">
      <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a>
      <a href="logout.php" class="btn btn-secondary hide-on-collapse pos-right">Logout</a>
    </div>
    <!-- /.sidebar-custom -->
  </aside>