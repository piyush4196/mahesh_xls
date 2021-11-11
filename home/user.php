<?php
include '../include/header.php'; 
?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include '../include/nav-items.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include '../include/topbar.php';?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <div class="show_xls card shadow mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Score</h6>
              </div>
            <div class="card-body">
              <div id="table">
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include '../include/footer.php'; ?>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include '../include/modal.php' ?>

    <!-- Bootstrap core JavaScript-->
    <!-- Bootstrap core JavaScript-->
    <script src="<?= STATIC_FILES ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= STATIC_FILES ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= STATIC_FILES ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= STATIC_FILES ?>assets/js/sb-admin-2.js"></script>

    <script src="<?= STATIC_FILES ?>assets/js/sweetalert.min.js"></script>
    <link href="https://unpkg.com/tabulator-tables@4.1.4/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.1.4/dist/js/tabulator.min.js"></script>
    <?php  if($_SESSION['acc_type'] == 1) { ?>
    <script src="<?= STATIC_FILES ?>assets/js/custom/dashboard.js"></script>
    <?php  } else { ?>
        <script>
            $tl_id = '<?= $_SESSION['employee_id'] ?>'
        </script>
        <script src="<?= STATIC_FILES ?>assets/js/custom/user.js"></script>
    <?php } ?>

</body>

</html>