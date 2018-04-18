<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Error</title>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/modernizr.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.mixitup.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap4.min.js"></script>
    <script src='<?php echo base_url();?>assets/js/popper.min.js'></script>
    <script src='<?php echo base_url();?>assets/js/moment.min.js'></script>
    <link href="<?php echo base_url();?>assets/css/bootstrap4.min.css" rel="stylesheet">
  </head>
  <body>
<div class="container">
  <div class="card">
  <div class="card-body">
    <div class="alert alert-warning" role="alert">
   Internal Server Error
  </div>
  <div class="alert alert-danger" role="alert">
<?php if (isset($msg)) {
  echo $msg;
} ?>
</div>
  <div class="row">
    <a href="<?php echo base_url('home'); ?>"><button type="button" class="btn btn-primary">Back To Home</button></a>
  </div>
  </div>
</div>
</div>
  </body>
</html>
