<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $oldpassword = md5($_POST['oldpassword']);
    $newpassword = md5($_POST['newpassword']);
    
      $query = mysqli_query($con, "SELECT id from tbladmin where  AdminEmail='$email' and UserName='$username' ");
      $ret = mysqli_num_rows($query);
      if ($ret > 0) {
        $query1 = mysqli_query($con, "UPDATE tbladmin set AdminPassword='$newpassword'  where  AdminEmail='$email' and UserName='$username' and  AdminPassword='$oldpassword'");
        if ($query1) {
          echo "<script type='text/javascript'>alert('Password successfully changed');</script>";
          header("location:dashboard.php");
        }
      } else {

        echo "<script type='text/javascript'>alert('Invalid Details. Please try again.');</script>";
      }

  }


  $login = $_SESSION['login'];
  $query = mysqli_query($con, "SELECT Username from tbladmin where UserName='$login'");
  if ($row = mysqli_fetch_array($query)) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">

      <title>Dashboard</title>
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
      <script src="assets/vendor/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
      <script>
        tinymce.init({
          selector: 'textarea#basic-example',
          menubar: 'edit insert view format table tools help',
          height: 500,
          // image_title: true,
          /* enable automatic uploads of images represented by blob or data URIs*/
          automatic_uploads: true,
          /*
            URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
            images_upload_url: 'postAcceptor.php',
            here we add custom filepicker only to Image dialog
          */
          file_picker_types: 'image',
          /* and here's our custom image picker*/
          file_picker_callback: (cb, value, meta) => {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.addEventListener('change', (e) => {
              const file = e.target.files[0];

              const reader = new FileReader();
              reader.addEventListener('load', () => {
                /*
                  Note: Now we need to register the blob in TinyMCEs image blob
                  registry. In the next release this part hopefully won't be
                  necessary, as we are looking to handle it internally.
                */
                const id = 'blobid' + (new Date()).getTime();
                const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                const base64 = reader.result.split(',')[1];
                const blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                /* call the callback and populate the Title field with the file name */
                cb(blobInfo.blobUri(), {
                  title: file.name
                });
              });
              reader.readAsDataURL(file);
            });

            input.click();
          },
          plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
          ],
          toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
          statusbar: false,
          content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
      </script>

    </head>

    <body>

      <!-- ======= Header ======= -->
      <?php include('includes/header.php'); ?>
      <!-- End Header -->

      <!-- ======= Sidebar ======= -->
      <?php include('includes/sidebar.php'); ?>

      <main id="main" class="main">
        <?php
        ?>
        <div class="pagetitle">
          <h1>Profile</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
          <div class="row">
            <div class="col-xl-4">

              <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                  <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                  <h2><?php echo htmlentities($row['UserName']); ?></h2>
                </div>
              </div>

            </div>

            <div class="col-xl-8">

              <div class="card">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">Ganti Password</h5>
                  <form method="post">
                  <?php if($err){ ?>
                    <div id="login-alert" class="alert alert-danger col-sm-12">
                        <ul><?php echo $err ?></ul>
                    </div>
                  <?php } ?> 
                    <div class="row mb-3">
                      <label for="UserName" class="col-md-4 col-lg-3 col-form-label">User Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="username" autocomplete="off">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" id="email" autocomplete="off">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="oldpassword" type="password" class="form-control" id="oldpassword" autocomplete="off">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newpassword" autocomplete="off">
                      </div>
                    </div>



                    <div class="text-center">
                      <button type="submit" name='submit' class="btn btn-primary">Ganti Password</button>
                    </div>
                  </form>


                </div>
              </div>

            </div>
          </div>
        </section>

      </main><!-- End #main -->

      <!-- ======= Footer ======= -->
      <?php include('includes/footer.php'); ?>
      <!-- End Footer -->

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
  <?php } ?>

    </html>
  <?php } ?>