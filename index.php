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
</head>

<body>

  <!-- Header -->
  <?php include('includes/header.php'); ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row gy-2 justify-content-center">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-in">
          <h1>WEBSITE RESMI KORPRI KABUPATEN SUKOHARJO</h1>
          <!-- <h2>We are team of talented designers making websites with Bootstrap</h2>
          <div>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div> -->
        </div>
        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-in">
          <img src="assets/img/logo.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- berita terbaru -->
    <section id="news" class="news">
      <div class="container">

        <div class="row justify-content-center" style="margin-top: 4%">

          <!-- Blog Entries Column -->
          <div class="col-md-7">
            <h3 data-aos="fade-up">KEGIATAN TERBARU</h3>
            <div class="card mb-4" data-aos="fade-up">
              <img class="card-img-top img-fluid" style="max-height: 300px; object-fit:cover; width: 100%;" src="assets/img/post/asn.jpg" alt="asn">
              <div class="card-body">
                <h4 class="card-title">Kegiatan hari ini
                </h4>


                <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="btn btn-light">Read More
                  &rarr;</a>
              </div>
              <div class="ms-2 text-muted">
                Posted on
                <?php echo htmlentities($row['postingdate']); ?>

              </div>

            </div>
            <div class="card mb-4" data-aos="fade-up">
              <img class="card-img-top img-fluid" style="max-height: 300px; object-fit:cover; width: 100%;" src="assets/img/post/asn.jpg" alt="asn">
              <div class="card-body">
                <h4 class="card-title">Kegiatan hari ini
                </h4>

                <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="btn btn-light">Read More
                  &rarr;</a>
              </div>
              <div class="ms-2 text-muted">
                Posted on
                <?php echo htmlentities($row['postingdate']); ?>

              </div>
            </div>
            <!-- Pagination -->


            <ul class="pagination justify-content-center mb-4">
              <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
              <li class="<?php if ($pageno <= 1) {
                            echo 'disabled';
                          } ?> page-item">
                <a href="<?php if ($pageno <= 1) {
                            echo '#';
                          } else {
                            echo " ?pageno=" . ($pageno - 1);
                          } ?>" class="page-link">Prev</a>
              </li>
              <li class="<?php if ($pageno >= $total_pages) {
                            echo 'disabled';
                          } ?> page-item">
                <a href="<?php if ($pageno >= $total_pages) {
                            echo '#';
                          } else {
                            echo " ?pageno=" . ($pageno + 1);
                          } ?> " class="page-link">Next</a>
              </li>
              <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
            </ul>
          </div>


          <!-- Pengumuman Column -->
          <div class="col-md-4">
            <h3 data-aos="fade-up">PENGUMUMAN</h3>
            <div class="card mb-4" data-aos="fade-up">
              <img class="card-img-top img-fluid" style="max-height: 250px; object-fit:cover; width: 100%;" src="assets/img/post/asn.jpg" alt="asn">
              <div class="card-body">
                <h4 class="card-title"><a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>">Pengumuman</a>
                </h4>
              </div>
              <div class="ms-2 text-muted">
                Posted on
                <?php echo htmlentities($row['postingdate']); ?>

              </div>

            </div>

            <!-- Search Widget -->
            <div class="card mb-4">
              <h5 class="card-header">Search</h5>
              <div class="card-body">
                <form name="search" action="search.php" method="post">
                  <div class="input-group">

                    <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="submit">Go!</button>
                    </span>
                </form>
              </div>
            </div>
          </div>


        </div>

      </div>
      <!-- /.row -->

      </div>

    </section>


  </main><!-- End #main -->

  <!-- Footer -->
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