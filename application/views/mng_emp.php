<?php require_once 'include/check_session.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create Manager | Employee</title>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src='<?php echo base_url();?>assets/js/popper.min.js'></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.mixitup.min.js"></script>
    <link href="<?php echo base_url();?>assets/css/bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/pretty-checkbox.min.css" rel="stylesheet">
    <style media="screen">
      html{
        font-size: 62.5%;
      }
    </style>
  </head>
  <body>
    <?php include_once 'include/nav.php'; ?>
<div style="margin-top:2em;" class="container">
  <div class="text text-warning">
    <?php if (isset($msg)) {
  echo "<p class='text text-warning'>$msg</p>";
    } ?>
  </div>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">

          <?php $s_data=$_SESSION['logged_in']['u_data'];
          $value = json_decode(json_encode($s_data), true);
        $id= $value[0]['id'];
           ?>
          <?php echo form_open('Home/gen_mng'); ?>

          <div class="form-group">

<input type="hidden" class="form-control" value="<?php echo $id ?>" name="u_id">
</div>
<div class="form-group">
 <label for="formGroupExampleInput">Manager Name</label>
  <input type="text" class="form-control" name="mname" required >
  <span class="help-block error text-danger" ><?php echo form_error('mname')?></span>

  </div>
  <div class="form-group">
 <label for="formGroupExampleInput">Manager Email</label>
  <input type="email" class="form-control" name="memail" required >
  <span class="help-block error text-danger" ><?php echo form_error('memail')?></span>

  </div>
  <div class="form-group">
 <label for="formGroupExampleInput">Manager Password</label>
  <input type="password" class="form-control" name="mepass" required >
  <span class="help-block error text-danger" ><?php echo form_error('mepass')?></span>

  </div>
  <div class="form-group">
 <label for="formGroupExampleInput">Confirm Password</label>
  <input type="password" class="form-control" name="mecpass" required >
  <span class="help-block error text-danger" ><?php echo form_error('mecpass')?></span>

  </div>
  <div class="form-group">
 <label for="formGroupExampleInput">Manager Number</label>
  <input type="number" class="form-control" name="mnum"  required >
  <span class="help-block error text-danger" ><?php echo form_error('mnum')?></span>

  </div>

  <div class="form-group">
  <input class="btn btn-primary" type="submit" class="form-control" name="submit" value="Create Manager"  required >
  </div>

          <?php echo form_close(); ?>
        </div>

      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">

          <?php echo form_open('Home/gen_emp'); ?>

          <div class="form-group">

<input type="hidden" class="form-control" value="<?php echo $id ?>" name="u_id">
</div>
<div class="form-group">
 <label for="formGroupExampleInput">Employee Name</label>
  <input type="text" class="form-control" name="empname" required >
  <span class="help-block error text-danger" ><?php echo form_error('empname')?></span>

  </div>
  <div class="form-group">
 <label for="formGroupExampleInput">Employee Email</label>
  <input type="email" class="form-control" name="empmail" required >
  <span class="help-block error text-danger" ><?php echo form_error('empmail')?></span>

  </div>
  <div class="form-group">
 <label for="formGroupExampleInput">Employee Password</label>
  <input type="password" class="form-control" name="emppass" required >
  <span class="help-block error text-danger" ><?php echo form_error('emppass')?></span>

  </div>
  <div class="form-group">
 <label for="formGroupExampleInput">Employee Password</label>
  <input type="password" class="form-control" name="empcpass" required >
  <span class="help-block error text-danger" ><?php echo form_error('empcpass')?></span>

  </div>
  <div class="form-group">
 <label for="formGroupExampleInput">Employee Number</label>
  <input type="number" class="form-control" name="empnum"  required >
  <span class="help-block error text-danger" ><?php echo form_error('empnum')?></span>

  </div>
  <div class="form-group">
  <input class="btn btn-primary" type="submit" class="form-control" name="submit" value="Create Employee" required >
  </div>

          <?php echo form_close(); ?>
        </div>

      </div>
    </div>
  </div>

</div>
  </body>
</html>
