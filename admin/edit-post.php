<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    
    // For adding post  
    if (isset($_POST['update'])) {

        $posttittle = $_POST['posttittle'];
        $catid = $_POST['category'];
        $postdetails = $_POST['postdescription'];
        $lastuptdby = $_SESSION['session_UserName'];
        $arr = explode(" ", $posttittle);
        $url = implode("-", $arr);
        $status = 1;
        $postid = $_GET['id'];
        $query = mysqli_query($con, "update tblpost set PostTittle='$posttittle',Category='$catid',PostDetail='$postdetails',PostUrl='$url',Is_Active='$status',LastUpBy='$lastuptdby' where id='$postid'");
        if ($query) {
            $msg = "Post updated ";
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
                <h1>Edit Postingan</h1>
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
                                <?php 
                                $postid = $_GET['id'];
    $que = mysqli_query($con, "SELECT tblpost.id AS postid,tblpost.PostImg,tblpost.PostTittle AS tittle,tblpost.PostDetail,tblcategory.CategoryName AS category,tblcategory.id AS catid FROM tblpost LEFT JOIN tblcategory ON tblpost.Category=tblcategory.id WHERE tblpost.id='$postid' AND tblpost.Is_Active=1 ");
    $row = mysqli_fetch_array($que);
    ?>
                                <?php if ($msg) { ?>

                                    <div class="alert alert-success my-2" role="alert">
                                        <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                    </div>
                                    <meta http-equiv='refresh' content='2; url= manage-post.php' />
                                <?php } ?>

                                <!---Error Message--->
                                <?php if ($error) { ?>
                                    <div class="alert alert-danger my-2" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                    </div>
                                    <meta http-equiv='refresh' content='2; url= manage-post.php' />
                                <?php } ?>

                                <!-- Multi Columns Form -->
                                <form id="addpost" name="addpost" method="post" enctype="multipart/form-data" class="row g-3 my-2 justify-content-center">
                                    <div class="col-md-12">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control" id="posttittle" name="posttittle" value="<?php echo htmlentities($row['tittle']); ?>" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-sm-2 col-form-label">Kategori</label>
                                        <select class="form-select" aria-label="Default select example" name="category" id="category" onChange="getSubCat(this.value);" required>
                                            <option value="<?php echo htmlentities($row['catid']); ?>"></option>
                                            <?php
                                            $ret = mysqli_query($con, "select id,CategoryName from  tblcategory");
                                            while ($result = mysqli_fetch_array($ret)) {
                                            ?>
                                                <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['CategoryName']); ?></option>
                                            <?php } ?>


                                        </select>

                                    </div>


                                    <div class="col-md-12">
                                        <label for="inputName5" class="form-label">Isi Berita</label>
                                        <textarea id="editor" name="postdescription" required><?php echo htmlentities($row['PostDetail']); ?></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                        <img src="postimages/<?php echo htmlentities($row['PostImg']); ?>" width="300" />

                                        <a href="change-image.php?id=<?php echo htmlentities($row['postid']); ?>">Update Image</a>
                                    </div>

                                    <div class="text-center">
                                        <button id="submit" type="submit" name="update" class="btn btn-primary">Update</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
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

        <script src="assets/summernote/summernote.min.js"></script>

    </body>

    </html>
<?php } ?>