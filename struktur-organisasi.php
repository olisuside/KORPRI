<?php
session_start();
include('includes/config.php');

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
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
    rel="stylesheet">

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

  <!-- Header -->
  <?php include('includes/header.php'); ?>

  <main id="main">
    <!-- berita terbaru -->
    <section id="portfolio" class="portfolio">
      <div class="container">
        <div class="row justify-content-center">
        <?php
$postid = 1;
$que = mysqli_query($con, "SELECT Strukturimg, StrukturDesc from tblstruk where id=1 ");
$row = mysqli_fetch_array($que);
?>
          <!-- Blog Entries Column -->
        <div class="col-md-9">
            <h3><strong>STRUKTUR ORGANISASI KORPRI SUKOHARJO</strong></h3>
            <img class="imgcenter" style="object-fit:cover;" src="admin/strukimages/<?php echo htmlentities($row['Strukturimg']); ?>" alt="struktu organisasi">
            <div class="card-body">
                <br>
                <p class="card-text"><?php
                                                    $pt = $row['StrukturDesc'];
                                                    echo (substr($pt, 0)); ?></p>
            </div>
            
        </div>
        </div>
        
        </section>
    </main><!-- End #main -->
    <!-- Footer -->
    <?php include('includes/footer.php'); ?>

    <a href="#" class="back-to-top d-flex align-items-center
                            justify-content-center"><i class="bi
                                bi-arrow-up-short"></i></a>

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