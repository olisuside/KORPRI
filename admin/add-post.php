<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  // For adding post  
  if (isset($_POST['submit'])) {

    $posttittle = $_POST['posttittle'];
    $catid = $_POST['category'];
    $postdetails = $_POST['postdescription'];
    $postedby = $_SESSION['session_UserName'];
    $arr = explode(" ", $posttittle);
    $url = implode("-", $arr);

    $imgfile = $_FILES["postimage"]["name"];
    // get the image extension
    $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
    // allowed extensions
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if (!in_array($extension, $allowed_extensions)) {
      echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else {
      //rename the image file
      $imgnewfile = md5($imgfile) . $extension;
      // Code for move image into directory
      move_uploaded_file($_FILES["postimage"]["tmp_name"], "postimages/" . $imgnewfile);

      $status = 1;
      $query = mysqli_query($con, "insert into tblpost(PostTittle,Category,PostDetail,PostUrl,Is_Active,PostImg,PostKegby) values('$posttittle','$catid','$postdetails','$url','$status','$imgnewfile','$postedby')");
      if ($query) {
        $msg = "Data berhasil Ditambahkan";
      } else {
        $error = "Something went wrong . Please try again.";
      }
    }
  }

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
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    
  </head>

  <body>


    <!-- ======= Header ======= -->
    <?php include('includes/header.php'); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include('includes/sidebar.php'); ?>

    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Tambah Postingan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Tambah Postingan</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section dashboard">
        <div class="row ">

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <!---Success Message--->

                <?php if ($msg) { ?>

                  <div class="alert alert-success my-2" role="alert">
                    <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                  </div>
                  <meta http-equiv='refresh' content='2; url= add-post.php'/>
                <?php } ?>

                <!---Error Message--->
                <?php if ($error) { ?>
                  <div class="alert alert-danger my-2" role="alert">
                    <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                  </div>
                  <meta http-equiv='refresh' content='2; url= add-post.php'/>
                <?php } ?>
                <!-- Multi Columns Form -->
                <form name="addpost" method="post" enctype="multipart/form-data" class="row g-3 my-2 justify-content-center">
                  <div class="col-md-12">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="posttittle" name="posttittle" required>
                  </div>
                  <div class="col-md-12">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="category" id="category" onChange="getSubCat(this.value);" required>
                      <option value="">Select Category </option>
                      <?php
                      // Feching active categories
                      $ret = mysqli_query($con, "select id,CategoryName from  tblcategory");
                      while ($result = mysqli_fetch_array($ret)) {
                      ?>
                        <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['CategoryName']); ?></option>
                      <?php } ?>


                    </select>

                  </div>


                  <div class="col-md-12">
                    <label for="inputName5" class="form-label">Isi Berita</label>
                    <textarea id="editor" name="postdescription" required>

                </textarea>
                  </div>

                  <div class="col-md-12">
                    <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>

                    <input class="form-control" type="file" id="formFile" id="postimage" name="postimage" required>

                  </div>

                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
                </form><!-- End Multi Columns Form -->

              </div>
            </div>
          </div><!-- End columns -->


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
    <!-- <script src="assets/vendor/tinymce/tinymce.min.js"></script> -->
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

<!-- editorck -->
<script>
            ClassicEditor
    .create( document.querySelector( '#editor' ), {
      // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
    } )
    .then( editor => {
      window.editor = editor;
    } )
    .catch( err => {
      console.error( err.stack );
    } );
        </script>

  </body>

  </html>
<?php } ?>