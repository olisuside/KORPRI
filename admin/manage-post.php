<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    
?>
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

            <div class="pagetitle">
                <h1>Kelola Postingan</h1>

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Kelola Postingan</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row ">

                    <!-- Left side columns -->
                    <div class="col-lg-12 ">
                        <div class="card justify-content-center">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Postingan</h5>
                                    <a class="btn btn-primary btn-sm col-md-2 mx-2" href="add-post.php">Tambah Postingan</a>
                                </div>
                                <div class="table-responsive text-nowrap">

                                    <!-- Table with hoverable rows -->
                                    <table class="table table-hover datatable">
                                        <thead>
                                            <tr class="table-light">
                                                <th class="class=w-75" scope="col">Judul Kegiatan</th>
                                                <th scope="col">Gambar</th>

                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($con, "SELECT id as postid,PostImg,PostTittle as title from tblpost where Is_Active=1 and Category=1  order by tblpost.id desc");
                                            $rowcount = mysqli_num_rows($query);
                                            if ($rowcount == 0) {
                                            ?>
                                                <tr>

                                                    <td colspan="3" align="center">
                                                        <h3 style="color:red">No record found</h3>
                                                    </td>
                                                <tr>
                                                    <?php
                                                } else {
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                <tr>

                                                    <td class="w-75"><?php echo htmlentities($row['title']); ?></td>
                                                    <td><img src="postimages/<?php echo htmlentities($row['PostImg']); ?>" height="100" /></td>
                                                    <td><a href="edit-post.php?id=<?php echo htmlentities($row['postid']); ?>"><i class="bi bi-pencil-fill" style="color: #29b6f6;"></i></a>
                                                        &nbsp;<a href="remove-post.php?id=<?php echo htmlentities($row['postid']); ?>" onclick="return confirm('Do you reaaly want to delete ?')"> <i class="bi bi-trash" style="color: #f05050"></i></a> </td>

                                                </tr>


                                        <?php }
                                                } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- End columns -->


                </div>
            </section>

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
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

    </body>

    </html>
<?php } ?>