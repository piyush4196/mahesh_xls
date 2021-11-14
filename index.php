<?php 

include 'models/config.php';

if(login_check()) { header("Location: home/"); }

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="PIYUSH KUMAR SAHAY">

  <link rel="stylesheet" href="<?= STATIC_FILES ?>assets/login/style.css">

  <link rel="shortcut icon" type="image/x-icon" href="<?= STATIC_FILES ?>assets/img/favicon_io/favicon.ico"/> 

  <title>TITLE</title>

  <link href="<?= STATIC_FILES ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= STATIC_FILES ?>assets/css/custom.css" rel="stylesheet">
  <style>
    #background { width: 100% !important; position: absolute; height: 350px !important; bottom: 0;}

    </style>
</head>
<div class="loadingDiv" style="display:none"></div>
<canvas id="background"></canvas>
<body class="bg-gradient-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image">
              <div class="user-icon"><img src="<?= STATIC_FILES ?>assets/img/logo.png" style="margin: 0 auto;" width="320">
                 </div>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                <div id="show_msg"></div>
                   <br/>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form id="login">
                  <input type="hidden" id="noiseInput" value="85">
                  <input type="hidden" id="heightInput" value="60">
                    <div class="form-group">
                      <input type="text" required class="form-control form-control-user" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter Your Employee ID">
                    </div>
                    <input type="submit" class = "btn btn-primary btn-user btn-block" value="Login">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js" integrity="sha512-mULnawDVcCnsk9a4aG1QLZZ6rcce/jSzEGqUkeOLy0b6q0+T6syHrxlsAGH7ZVoqC93Pd0lBqd6WguPWih7VHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/three.js/100/three.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/simplex-noise/2.4.0/simplex-noise.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.0.3/chroma.min.js'></script>
  <script src="assets/js/sweetalert.min.js"></script>

  <script>
    $('form#login').submit(e => {
      e.preventDefault();
      $.post('controller/login.php', { username : $('#username').val()}, function(data) {
        if(data == 0) {
          swal("Error", "Employee ID is incorrect", "error");
        } else {
          location.href = "home"
        }
      })
    })
  </script>

</body>

</html>