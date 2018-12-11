<?php
/**
 * template_start.php
 *
 * Author: Emmanuel Santiz
 *
 * The first block of code used in every page of the template
 *
 */
?>
<!DOCTYPE html>
<html>
<head>
  <title>App</title>

  <link href="<?php echo base_url("assets/css/application.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/css/stylesMenu.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/css/datepicker.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/css/jquery.gritter.css"); ?>" rel="stylesheet">

  <link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.png"); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="App 1.0">
  <meta name="author" content="Emmanuel Sántiz">
  <meta charset="utf-8">

  <!--Include de scripts generales de la pagina-->
  <script src="<?php echo base_url("assets/lib/jquery/dist/jquery.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/lib/jquery-pjax/jquery.pjax.js"); ?>"></script>
  <script src="<?php echo base_url("assets/lib/bootstrap-sass/assets/javascripts/bootstrap.min.js") ?>"></script>
  <script src="<?php echo base_url("assets/lib/widgster/widgster.js"); ?>"></script>
  <script src="<?php echo base_url("assets/lib/underscore/underscore.js"); ?>"></script>
  <script src="<?php echo base_url("assets/lib/messenger/build/js/messenger.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/datepicker/bootstrap-datepicker.js"); ?>"></script>

  <!--Include del script general-->
  <script src="<?php echo base_url("assets/js/app.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/app/app.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/settings.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/numeric.js"); ?>"></script>
  <script src="<?php echo base_url("assets/lib/select2/select2.min.js") ?>"></script>

  <script src="<?php echo base_url("assets/js/zebraDate/zebra_datepicker.min.js"); ?>"></script>

  <!--NodeJS-->
  <!--script src="http://34.224.174.138/node_modules/socket.io/node_modules/socket.io-client/socket.io.js"></script-->
</head>
<body>
<script>
</script>