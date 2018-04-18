<?php
require_once 'include/check_session.php';
 ?>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Template</title>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/modernizr.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.mixitup.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap4.min.js"></script>
    <script src='<?php echo base_url();?>assets/js/popper.min.js'></script>
    <script src='<?php echo base_url();?>assets/js/moment.min.js'></script>
    <link href="<?php echo base_url();?>assets/css/pretty-checkbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap4.min.css" rel="stylesheet">
    <style media="screen">
      html{
        font-size: 62.5%;
      }
    </style>
  </head>
  <body>
    <?php include_once 'include/nav.php'; ?>
<div style="margin-top:1em;" class="container">
<div class="card">
  <div class="card-body">
    <?php echo form_open('Home/create_temp'); ?>
      <div class="form-group">
        <label for="header">Header</label>
        <input type="text" name="head" class="form-control" id="head"  placeholder="Enter Header" required>
      </div>
      <div class="form-group">
        <label for="footer">Footer</label>
        <input type="text" name="foot" class="form-control" id="footer" placeholder="Enter Footer" required>
      </div>
      <div class="form-group">
   <label for="body">Body</label>
   <textarea class="form-control" name="body" id="body" rows="3"required></textarea>
   </div>
   <div class="form-group">
   <label for="type">Template Type</label>
   <select  name="type" class="form-control" id="type">
     <option value="msg">message</option>
     <option value="email">email</option>
   </select>
 </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  <?php echo form_close(); ?>
  <?php if (isset($result)): ?>
    <?php echo $result ?>
  <?php endif; ?>
  </div>
</div>
</div>
  </body>
</html>
