<?php
session_start();
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    // For adding post  
    if (isset($_POST['update'])) {

        $alamat = $_POST['alamat'];
        $contact = $_POST['kontak'];
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];
        $youtube = $_POST['youtube'];
        $twitter = $_POST['twitter'];
        $postid = 1;
        $query = mysqli_query($con, "UPDATE tblabout set alamat='$alamat',contact='$contact',facebook='$facebook', instagram='$instagram',youtube='$youtube',twitter='$twitter' where id=1");
        if ($query) {
            $msg = "Post Feature Image updated ";
        } else {
            $error = "Something went wrong . Please try again.";
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
                <h1>Edit Kontak</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Kontak</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">

                <div class="row ">
                    <?php
                    $postid = 1;
                    $que = mysqli_query($con, "SELECT * from tblabout where id=1 ");
                    $row = mysqli_fetch_array($que);
                    ?>
                    <!-- Left side columns -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <!-- Multi Columns Form -->
                                <form name="addpost" method="post" enctype="multipart/form-data" class="row g-3 my-2 justify-content-center">
                                <!---Message--->
                                <div class="alert alert-danger col-12 mx-auto">
                        <p><strong>PERHATIAN :</strong> Masukkan link sosial media seperti contoh berikut "https://www.facebook.com/TwitterInc"</p>
                    </div>    
                    <!-- end message -->
                                <div class="col-md-12">
                                        <label for="inputName1" class="form-label">Alamat</label>
                                        <input name="alamat" type="text" class="form-control" id="alamat" value="<?php echo htmlentities($row['alamat']); ?>">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="inputName2" class="form-label">Kontak</label>
                                        <input name="kontak" type="text" class="form-control" id="kontak" value="<?php echo htmlentities($row['contact']); ?>">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="inputName3" class="form-label">Facebook</label>
                                        <input name="facebook" type="text" class="form-control" id="facebook" value="<?php echo htmlentities($row['facebook']); ?>">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="inputName4" class="form-label">Instagram</label>
                                        <input name="instagram" type="text" class="form-control" id="istagram" value="<?php echo htmlentities($row['instagram']); ?>">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="inputName5" class="form-label">Twitter</label>
                                        <input name="twitter" type="text" class="form-control" id="twitter" value="<?php echo htmlentities($row['twitter']); ?>">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="inputName5" class="form-label">Youtube</label>
                                        <input name="youtube" type="text" class="form-control" id="youtube" value="<?php echo htmlentities($row['youtube']); ?>">
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
                .create(document.querySelector('#editor'), {
                    // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
                })
                .then(editor => {
                    window.editor = editor;
                })
                .catch(err => {
                    console.error(err.stack);
                });
        </script>

    </body>

    </html>
<?php } ?>