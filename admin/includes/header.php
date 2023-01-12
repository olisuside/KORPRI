<!-- ======= Header ======= -->
<?php
$login = $_SESSION['login'];
$query = mysqli_query($con, "SELECT * from tbladmin where UserName='$login'");
if ($row = mysqli_fetch_array($query)) {
?>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn"></i>
      <a href="../" class="logo d-flex align-items-center">
        <img src="assets/img/logoskh.png" alt="" />
        <span class="d-none d-lg-block">KORPRI SUKOHARJO</span>
      </a>

    </div>
    <!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/avatar1.png" alt="Profile" class="rounded-circle" />
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo htmlentities($row['UserName']); ?></span> </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo htmlentities($row['UserName']); ?></h6>
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="change-password.php">
                <i class="bi bi-gear"></i>
                <span>Change Password</span>
              </a>
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul>
          <!-- End Profile Dropdown Items -->
        </li>
        <!-- End Profile Nav -->
      </ul>
    </nav>
    <!-- End Icons Navigation -->
  </header>
  <!-- End Header -->
<?php } ?>