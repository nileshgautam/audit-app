<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel='icon' href="<?php echo base_url('assets/img/favicon.png') ?>" type="image/gif" sizes="16x16">

  <title>Aduit-App: Gennext IT</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="  <?php echo base_url('assets/js/bootstrap-notify.min.js') ?>"></script>
  <script src="  <?php echo base_url('assets/js/MyScriptLibrary.js') ?>"></script>
 
  <!-- for date range selecter
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
  <link href=" <?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

  <script>
    let baseUrl = "<?php echo base_url() ?>";
  </script>
  <style>
    #printpage {
      display: none;
    }

    @media print {


      #sidebar {
        display: none;
      }
      #nav {
        display: none;
      }
    }
  </style>
</head>
<body id="page-top ">