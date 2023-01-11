<?php

$que = mysqli_query($con, "SELECT * from tblabout where id=1 ");
$row = mysqli_fetch_array($que);
?>
<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="footer-top">
    <div class="container mx-lg-auto justify-content-center">
      <div class="row">
        <div class="col-lg-6 col-md-6 footer-contact">
          <h3>KORPRI SUKOHARJO</h3>
          <p><?php echo htmlentities($row['contact']); ?></p>
            <p><?php echo htmlentities($row['alamat']); ?></p>
        </div>
        <div class="col-lg-6 col-md-6 footer-links">
          <div class="social-links mt-3">
            <a href="<?php echo htmlentities($row['twitter']); ?>" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="<?php echo htmlentities($row['facebook']); ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="<?php echo htmlentities($row['instagram']); ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="<?php echo htmlentities($row['youtube']); ?>" class="youtube"><i class="bx bxl-youtube"></i></a>
          </div>
        </div>

      </div>
    </div>
  </div>

</footer><!-- End Footer -->