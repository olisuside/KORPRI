<?php
session_start();
include('includes/config.php');

$postid = $_GET['id'];

$sql = "SELECT ViewCounter FROM tblpost WHERE id = '$postid'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $visits = $row["viewCounter"];
        $sql = "UPDATE tblpost SET viewCounter = $visits+1 WHERE id ='$postid'";
        $con->query($sql);
    }
} else {
    echo "no results";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>KORPRI SUKOHARJO</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logoskh.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <?php include('includes/header.php'); ?><!-- End Header -->

    <main id="main">
        <!-- berita terbaru -->
            <div class="container">
                <div class="row justify-content-center">
                    
                    <?php
                    $pid = $_GET['id'];
                    $query = mysqli_query($con, "SELECT tblpost.PostTittle as tittle,tblpost.PostImg,tblcategory.CategoryName as category,tblcategory.id as cid,tblpost.PostDetail as postdetail,tblpost.PostingDetail as postingdate,tblpost.PostUrl as url,tblpost.PostKegBy,tblpost.LastUpBy,tblpost.UpdationDate from tblpost left join tblcategory on tblcategory.id=tblpost.Category  where tblpost.id='$pid'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="col-10">
                        <div class="card mb-4">

                            <div class="card-body">
                                <h2 class="card-title"><?php echo htmlentities($row['tittle']); ?></h2>

                                <p>

                                    <b>Posted by </b> <?php echo htmlentities($row['PostKegBy']); ?> on </b><?php echo htmlentities($row['postingdate']); ?> |
                                    <?php if ($row['LastUpBy'] != '') : ?>
                                        <b>Last Updated by </b> <?php echo htmlentities($row['LastUpBy']); ?> on </b><?php echo htmlentities($row['UpdationDate']); ?>
                                </p>
                            <?php endif; ?>

                            <hr />

                            <img class="img-fluid rounded" style="max-height: 450px; object-fit:cover; width: 100%;" src="admin/postimages/<?php echo htmlentities($row['PostImg']); ?>" alt="<?php echo htmlentities($row['tittle']); ?>">

                            <p class="card-text"><?php
                                                    $pt = $row['postdetail'];
                                                    echo (substr($pt, 0)); ?></p>

                            </div>
                            


                            </div>
                        </div>
                        </div>
                    <?php } ?>

                <!-- Sidebar Widgets Column -->

                </div>
            </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include('includes/footer.php'); ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>