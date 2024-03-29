<?php
session_start();
include('includes/config.php');
error_reporting(0);
//atur variabel
$err        = "";

if (isset($_SESSION['UserName'])) {
  header("Location: dashboard.php");
}

if(isset($_POST['login'])){
  $UserName   = mysqli_real_escape_string($con,$_POST['UserName']);
  $AdminPassword   = mysqli_real_escape_string($con,$_POST['AdminPassword']);

  if($UserName == '' or $AdminPassword == ''){
      $err .= "<li>Silakan masukkan UserName dan juga Password.</li>";
  }else{
      $sql1 = "select * from tbladmin where UserName = '$UserName'";
      $q1   = mysqli_query($con,$sql1);
      $r1   = mysqli_fetch_array($q1);
      if($r1['UserName'] == ''){
        $err .= "<li>UserName <b>$UserName</b> tidak tersedia.</li>";
      }
      elseif (password_verify($AdminPassword, $r1['AdminPassword'])) {
        session_start();
        $_SESSION['UserName'] = $UserName;
        $_SESSION['session_UserName'] = $UserName; //server
        $_SESSION['session_AdminPassword'] = md5($AdminPassword);
        $_SESSION['login']=$_POST['UserName'];
        header("location:dashboard.php");
      }else {
        $err .= "<li>Username atau Password yang dimasukkan tidak sesuai.</li>";
        
    }     
      
          
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login Admin Korpri Sukoharjo</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logoskh.png" rel="icon">
  <link href="assets/img/logoskh.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logoskh.png" alt="">
                  <span class="d-none d-lg-block">KORPRI SUKOHARJO</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Masukkan User Name dan Password</p>
                  </div>

                  <form class="row g-3 needs-validation" action="" method="post" role="form" id="formlogin">
                  <?php if($err){ ?>
                    <div id="login-alert" class="alert alert-danger col-sm-12">
                        <ul><?php echo $err ?></ul>
                    </div>
                  <?php } ?> 
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="UserName" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Masukkan username anda.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="AdminPassword" class="form-control" id="yourPassword"  required>
                      <div class="invalid-feedback">Masukkan password anda</div>
                    </div>

                    
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login" value="login">Login</button>
                    </div>
                    
                  </form>

                </div>
              </div>

            

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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