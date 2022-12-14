<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Dashboard</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/logoskh.png" rel="icon" />
    <link href="assets/img/logoskh.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  </head>

  <body>
    <!-- ======= Header ======= -->
    <?php include('includes/header.php'); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include('includes/sidebar.php'); ?>
    <!-- End Sidebar-->

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">
          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">
            
              <!-- Kegiatan Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                <?php $query=mysqli_query($con,"SELECT * from tblpost where Is_Active=1 and Category=1");
$countpost=mysqli_num_rows($query);
?>
                  <div class="card-body">
                    <h5 class="card-title">Kegiatan</h5>
                    <div class="d-flex align-items-center">
                      <div
                        class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                      >
                        <i class="bi bi-calendar-week"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?php echo htmlentities($countpost);?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Kegiatan Card -->

              <!-- Pengumuman Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                <?php $query=mysqli_query($con,"SELECT * from tblpost where Is_Active=1 and Category=4");
$countan=mysqli_num_rows($query);
?>
                  <div class="card-body">
                    <h5 class="card-title">Pengumuman</h5>
                    <div class="d-flex align-items-center">
                      <div
                        class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                      >
                        <i class="bi bi-envelope"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?php echo htmlentities($countan);?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Pengumuman Card -->

              <!-- Trash Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                <?php $query=mysqli_query($con,"SELECT * from tblpost where Is_Active=0");
$counttrash=mysqli_num_rows($query);
?>
                  <div class="card-body">
                    <h5 class="card-title">Trash</h5>
                    <div class="d-flex align-items-center">
                      <div
                        class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                      >
                        <i class="bi bi-trash"></i>
                      </div>
                      <div class="ps-3">
                        <h6><?php echo htmlentities($counttrash);?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Trash Card -->
            </div>
          </div>
          <!-- End Left side columns -->
        </div>
      </section>
    </main>
    <!-- End #main -->
<!-- ======= Footer ======= -->
<?php include('includes/footer.php'); ?>
    <!-- End Footer -->

    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
<?php } ?>