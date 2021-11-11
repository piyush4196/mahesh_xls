<?php 
include '../models/config.php';

if(!login_check()) { header("Location: ."); }

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="PIYUSH KUMAR SAHAY">

  <link rel="shortcut icon" type="image/png" href="<?= STATIC_FILES ?>assets/img/favicon_io/favicon-32*32.png"/>

  <link rel="shortcut icon" type="image/x-icon" href="<?= STATIC_FILES ?>assets/img/favicon_io/favicon.ico"/> 

  <title>SmartRural OSS</title>

  

  <link href="<?= STATIC_FILES ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="<?= STATIC_FILES ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= STATIC_FILES ?>assets/css/custom.css" rel="stylesheet">





</head>



<div class="loadingDiv" style="display:none"></div>