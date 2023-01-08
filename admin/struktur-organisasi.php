<?php
session_start();
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    
    // For adding post  
    if (isset($_POST['update'])) {
        $desc = $_POST['postdescription'];
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
            move_uploaded_file($_FILES["postimage"]["tmp_name"], "strukimages/" . $imgnewfile);

            $postid = 1;
            $query = mysqli_query($con, "UPDATE tblstruk set Strukturimg='$imgnewfile', StrukturDesc='$desc' where id=1");
            if ($query) {
                $msg = "Post Feature Image updated ";
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

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">
        <script src="assets/vendor/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
        
        <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

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
<?php
$postid = 1;
$que = mysqli_query($con, "SELECT Strukturimg, StrukturDesc from tblstruk where id=1 ");
$row = mysqli_fetch_array($que);
?>
                    <!-- Left side columns -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!---Success Message--->

                                <!-- Multi Columns Form -->
                                <form name="addpost" method="post" enctype="multipart/form-data" class="row g-3 my-2 justify-content-center">
                                <div class="col-md-12">
                                        <label for="inputName5" class="form-label">Deskripsi</label>
                                        <textarea id="editor" name="postdescription" required><?php echo htmlentities($row['StrukturDesc']); ?></textarea>
                                    </div>
                                   

                                    <div class="col-md-12">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">Gambar Lama</label>
                                        <img src="strukimages/<?php echo htmlentities($row['Strukturimg']); ?>" width="300" />

                                        
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">Ganti Gambar</label>
                            

                                        <input class="form-control" type="file" id="formFile" id="postimage" name="postimage" required>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" name="update" class="btn btn-primary">update</button>
                                        
                                    </div>
                                </form><!-- End Multi Columns Form -->

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
        <!-- <script src="assets/vendor/tinymce/tinymce.min.js"></script> -->
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

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