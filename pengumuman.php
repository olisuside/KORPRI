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

  <!-- ======= Header ======= -->
  <?php include('includes/header.php'); ?><!-- End Header -->

  <main id="main">
    <!-- berita terbaru -->
    <section id="portfolio" class="portfolio">
      <div class="container">
        <div class="row justify-content-center">

          <!-- Blog Entries Column -->
          <div class="col-md-9">
            <h3>KEGIATAN TERBARU</h3><br>
            <?php 
     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblpost";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"SELECT tblpost.id AS postid,tblpost.PostImg,tblpost.PostTittle AS tittle,tblpost.PostDetail,tblcategory.CategoryName AS category,tblcategory.id AS catid,tblpost.Postingdetail as PostDate, tblpost.PostUrl FROM tblpost LEFT JOIN tblcategory ON tblpost.Category=tblcategory.id WHERE tblpost.Is_Active=1 AND tblpost.Category=4 order by tblpost.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
        

          <!-- Blog Entries Column -->
         
            <div class="card mb-4" data-aos="fade-up">
              <img class="card-img-top img-fluid" style="max-height: 350px; object-fit:cover; width: 100%;" src="admin/postimages/<?php echo htmlentities($row['PostImg']);?>" alt="asn">
              <div class="card-body">
                <h4 class="card-title"><?php echo htmlentities($row['tittle']);?>
                </h4>


                <a href="inner-page.php?id=<?php echo htmlentities($row['postid']) ?>" class="btn btn-light">Read More
                  &rarr;</a>
              </div>
              <div class="ms-2 text-muted">
                Posted on
                <?php echo htmlentities($row['PostDate']); ?>

              </div>

            </div>
            <?php } ?>
            <!-- Pagination -->


            <ul class="pagination justify-content-center mb-4" data-aos="fade-up">
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


          </div>
          
        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <?php include('includes/footer.php'); ?>
      
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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