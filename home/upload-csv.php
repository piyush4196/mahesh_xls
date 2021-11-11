<?php
include '../include/header.php'; 
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/jszip.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
<link href="https://unpkg.com/tabulator-tables@4.1.4/dist/css/tabulator.min.css" rel="stylesheet">
<script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.1.4/dist/js/tabulator.min.js"></script>

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
          <h1 class="h3 mb-2 text-gray-800">Users</h1>
          <div class="dropdown-divider"></div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Upload XLS</h6>
            </div>
            <div class="card-body">
              <div id="searchError"></div>
              <form id ="search-user">
              <div class="form-row">
                <div class="form-group col-md-12">
                <div class="form-group">
                    <input type="file" class="form-control-file" id="upload_xls" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" >
                </div>
                </div>
              </div>
             </form>
            </div>
          </div>

          <!-- DataTales Without Search -->
          <div class="show_xls card shadow mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Excel Data <small>You can edit your data by clicking on column</small></h6>
                  <button type="submit" id="edited_data" style="display:none" class="btn btn-primary">Submit Edited Data</button>
              </div>
            <div class="card-body">
              <div id="table">
              </div>
            </div>
          </div>

      
      </div>
    </div>
   

      <!-- Footer -->
      <?php include '../include/footer.php'; ?>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <?php include '../include/modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= STATIC_FILES ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= STATIC_FILES ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= STATIC_FILES ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= STATIC_FILES ?>assets/js/sb-admin-2.js"></script>

<script src="<?= STATIC_FILES ?>assets/js/sweetalert.min.js"></script>
<script src="<?= STATIC_FILES ?>assets/js/custom/upload.js"></script>
  

</body>

</html>
