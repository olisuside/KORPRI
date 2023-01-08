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
    <!-- fancybox -->
    <link href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" rel="stylesheet">
</head>

<body>

    <!-- Header -->
    <?php include('includes/header.php'); ?>
    <!-- ======= Header ======= -->

    <main id="main">
        <!-- Ini Gallery -->
        <section id="portfolio" class="portfolio">
      <div class="container">
        <div class="row justify-content-center">

          <!-- Blog Entries Column -->
        <div class="col-md-8 flex flex-wrap gap-5 justify-center max-w-5xl mx-auto px-6">
                <?php
                $query = mysqli_query($con, "SELECT id as postid,PostImg,PostTittle as title from tblpost where Is_Active=1 and Category=1 order by id Desc LIMIT 30");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                <a data-fancybox="gallery" href="admin/postimages/<?php echo htmlentities($row['PostImg']); ?>">
  <img class='rounded' src="admin/postimages/<?php echo htmlentities($row['PostImg']); ?>" style="max-height: 200px; object-fit:cover; width:33%">
</a>
                
            

        <?php } ?></div>
        </div></section>
        <!-- script javascript -->
        <script src="script.js"></script>

    </main><!-- End #main -->


    <!-- ======= Footer ======= -->
    <?php include('includes/footer.php'); ?><!-- End Footer -->

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


    <!-- fancybox -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {
  dragToClose: false,

  Toolbar: false,
  closeButton: "top",

  Image: {
    zoom: false,
  },

  on: {
    initCarousel: (fancybox) => {
      const slide = fancybox.Carousel.slides[fancybox.Carousel.page];

      fancybox.$container.style.setProperty(
        "--bg-image",
        `url("${slide.$thumb.src}")`
      );
    },
    "Carousel.change": (fancybox, carousel, to, from) => {
      const slide = carousel.slides[to];

      fancybox.$container.style.setProperty(
        "--bg-image",
        `url("${slide.$thumb.src}")`
      );
    },
  },
});

    </script>


</body>

</html>