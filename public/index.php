<?php 
require_once "../src/templates/config.php";
include FRONTEND . "header.php";
?>
    <!-- Page Content -->
    <div class="container my-5">

      <div class="row">
        
        <div class="col-lg-3">
          <!-- Sidebar -->
          <?php include FRONTEND . "sidebar.php"; ?>
        </div>
        
        <div class="col-lg-9">
          <!-- carousel -->
          <?php include FRONTEND . "carousel.php"; ?>
          <div class="row">
            <!-- catalog -->
            <?php include FRONTEND . "catalog.php" ?>
          </div>
        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include FRONT . "footer.php"; ?>