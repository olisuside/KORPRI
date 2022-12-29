<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    $postid = $_GET['id'];
    $que = mysqli_query($con, "SELECT PostImg,PostTittle from tblpost where id='$postid' and Is_Active=1 ");
    $row = mysqli_fetch_array($que);
    // For adding post  
    if (isset($_POST['update'])) {

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



            $postid = $_GET['id'];
            $query = mysqli_query($con, "UPDATE tblpost set PostImg='$imgnewfile' where id='$postid'");
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
        <script>
            tinymce.init({
                selector: 'textarea#postdescription',
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
        <!-- <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#postdescription',
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table paste codesample"
            ],
            toolbar:
                "undo redo | fontselect styleselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | codesample action section button | custom_button",
            content_css: [window.location.origin+"/assets/css/custom_css_tinymce.css"],
            font_formats:"Segoe UI=Segoe UI;",
            fontsize_formats: "8px 9px 10px 11px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 52px 54px 56px 58px 60px 62px 64px 66px 68px 70px 72px 74px 76px 78px 80px 82px 84px 86px 88px 90px 92px 94px 94px 96px",
            codesample_languages: [
                {text: 'HTML/XML', value: 'markup'},
                {text: 'JavaScript', value: 'javascript'},
                {text: 'CSS', value: 'css'},
                {text: 'PHP', value: 'php'},
                {text: 'Ruby', value: 'ruby'},
                {text: 'Python', value: 'python'},
                {text: 'Java', value: 'java'},
                {text: 'C', value: 'c'},
                {text: 'C#', value: 'csharp'},
                {text: 'C++', value: 'cpp'}
            ],
            height: 600,
            setup: function (editor) {
                editor.ui.registry.addButton('custom_button', {
                    text: 'Add Button',
                    onAction: function() {
                        // Open a Dialog
                        editor.windowManager.open({
                            title: 'Add custom button',
                            body: {
                                type: 'panel',
                                items: [{
                                    type: 'input',
                                    name: 'button_label',
                                    label: 'Button label',
                                    flex: true
                                },{
                                    type: 'input',
                                    name: 'button_href',
                                    label: 'Button href',
                                    flex: true
                                },{
                                    type: 'selectbox',
                                    name: 'button_target',
                                    label: 'Target',
                                    items: [
                                        {text: 'None', value: ''},
                                        {text: 'New window', value: '_blank'},
                                        {text: 'Self', value: '_self'},
                                        {text: 'Parent', value: '_parent'}
                                    ],
                                    flex: true
                                },{
                                    type: 'selectbox',
                                    name: 'button_rel',
                                    label: 'Rel',
                                    items: [
                                        {text: 'No value', value: ''},
                                        {text: 'Alternate', value: 'alternate'},
                                        {text: 'Help', value: 'help'},
                                        {text: 'Manifest', value: 'manifest'},
                                        {text: 'No follow', value: 'nofollow'},
                                        {text: 'No opener', value: 'noopener'},
                                        {text: 'No referrer', value: 'noreferrer'},
                                        {text: 'Opener', value: 'opener'}
                                    ],
                                    flex: true
                                },{
                                    type: 'selectbox',
                                    name: 'button_style',
                                    label: 'Style',
                                    items: [
                                        {text: 'Success', value: 'success'},
                                        {text: 'Info', value: 'info'},
                                        {text: 'Warning', value: 'warning'},
                                        {text: 'Error', value: 'error'}
                                    ],
                                    flex: true
                                }]
                            },
                            onSubmit: function (api) {

                                var html = '<a href="'+api.getData().button_href+'" class="btn btn-'+api.getData().button_style+'" rel="'+api.getData().button_rel+'" target="'+api.getData().button_target+'">'+api.getData().button_label+'</a>';

                                // insert markup
                                editor.insertContent(html);

                                // close the dialog
                                api.close();
                            },
                            buttons: [
                                {
                                    text: 'Close',
                                    type: 'cancel',
                                    onclick: 'close'
                                },
                                {
                                    text: 'Insert',
                                    type: 'submit',
                                    primary: true,
                                    enabled: false
                                }
                            ]
                        });
                    }
                });
            }
        });

        $(document).ready(function() {
            $('#save-content-form').on('submit', function(e) {
                e.preventDefault();

                var data = $('#save-content-form').serializeArray();
                data.push({name: 'content', value: tinyMCE.get('tinymce').getContent()});

                $.ajax({
                    type: 'POST',
                    url: window.location.origin+'/save.php',
                    data: data,
                    success: function (response, textStatus, xhr) {
                        console.log(response)
                    },
                    complete: function (xhr) {

                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        var response = XMLHttpRequest;

                    }
                }); 
            });
        });
    </script> -->

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
                                    <meta http-equiv='refresh' content='2; url= edit-post.php?id=<?php echo htmlentities($postid); ?>' />
                                <?php } ?>

                                <!---Error Message--->
                                <?php if ($error) { ?>
                                    <div class="alert alert-danger my-2" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                    </div>
                                    <meta http-equiv='refresh' content='2; url= edit-post.php?id=<?php echo htmlentities($postid); ?>' />
                                <?php } ?>

                                <!-- Multi Columns Form -->
                                <form name="addpost" method="post" enctype="multipart/form-data" class="row g-3 my-2 justify-content-center">
                                    <div class="col-md-12">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control" id="posttittle" name="posttittle" value="<?php echo htmlentities($row['PostTittle']); ?>" readonly>
                                    </div>
                                   

                                    <div class="col-md-12">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">Current Image</label>
                                        <img src="postimages/<?php echo htmlentities($row['PostImg']); ?>" width="300" />

                                        
                                    </div>
                                    <div class="col-md-12">
                                        <label for="inputNumber" class="col-sm-2 col-form-label">New Image</label>
                            

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
        <footer id="footer" class="footer">
            <div class="copyright">
                &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </footer><!-- End Footer -->

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