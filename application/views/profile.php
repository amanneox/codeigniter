<?php
require_once 'include/check_session.php';
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Profile</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
     <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/modernizr.js"></script>
     <script src="<?php echo base_url();?>assets/js/jquery.mixitup.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/bootstrap4.min.js"></script>
     <script src='<?php echo base_url();?>assets/js/popper.min.js'></script>
     <script src='<?php echo base_url();?>assets/js/profile.js'></script>
     <script src='<?php echo base_url();?>assets/js/moment.min.js'></script>
     <link href="<?php echo base_url();?>assets/css/bootstrap4.min.css" rel="stylesheet">
     <link href="<?php echo base_url();?>assets/css/pretty-checkbox.min.css" rel="stylesheet">
<style media="screen">
  html{
      font-size:62.5%;
  }
</style>
   </head>
   <body>
     <?php include_once 'include/nav.php'; ?>
     <div style='margin-top:1em;' class="container">
       <div id="updatemodal" class="modal fade" role="dialog">
       	<div class="modal-dialog">
       		<div class="modal-content">
       			<div class="modal-header">
       				<button type="button" class="close" data-dismiss="modal">&times;</button>
       				<h4 class="modal-title"></h4>
       			</div>
       			<div class="modal-body">
       					<p>Are you sure ? You want to continue.</p>
                <div class="message">
                </div>
                <div style='display:none;' id="loading" class="overlay">
                <img width="32" height="32" src='<?php echo base_url();?>assets/img/loader.gif' alt="loading">
                </div>
       			</div>
       			<div class="modal-footer">
       				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       		    <button  onclick="update()" class="btn btn-default">Continue</button></a>
       			</div>

       		</div>
       	</div>
       </div>
       <div class="card">
  <div class="card-body">
    <?php if (isset($userdata)){ ?>

    <?php foreach ($userdata as $row){ ?>
<form class="" id="profileform" method="post">
  <input type="hidden" name="user_name" value="<?php echo $row->user_name?>" required>
 <div class="form-group">
<label for="formGroupExampleInput">User Email</label>
<input type="email" name="email" class="form-control" id="user_email" value="<?php echo $row->user_email?>" required readonly>
</div>
<div class="row">
  <div class="col">
    <div class="form-group">
    <label for="formGroupExampleInput">Firstname</label>
    <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $row->firstname?>" required>
    </div>
  </div>
  <div class="col">
    <div class="form-group">
    <label for="formGroupExampleInput">Lastname</label>
    <input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo $row->lastname?>" required>
    </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="form-group">
    <label for="formGroupExampleInput">Mobile</label>
    <input type="text" name="mobile" class="form-control" id="mobile" value="<?php echo $row->mobile?>" required>
    </div>
  </div>
  <div class="col">
    <div class="form-group">
    <label for="formGroupExampleInput">Country</label>
    <input type="text" name="country" class="form-control" id="country" value="<?php echo $row->country?>" required>
    </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="form-group">
    <label for="formGroupExampleInput">Zip</label>
    <input type="text" name="zip" class="form-control" id="zip" value="<?php echo $row->pincode?>" required>
    </div>
  </div>
  <div class="col">
    <div class="form-group">
    <label for="formGroupExampleInput">City</label>
    <input type="text" name="city" class="form-control" id="city" value="<?php echo $row->city?>" required>
    </div>
  </div>
  <div class="col">
    <div class="form-group">
    <label for="formGroupExampleInput">State</label>
    <input type="text" name="state" class="form-control" id="state" value="<?php echo $row->state?>" required>
    </div>
  </div>
</div>
<div class="row">
  <div class="col">
  <div class="form-group">
  <label for="formGroupExampleInput">Street</label>
  <input type="text" name="address" class="form-control" id="address" value="<?php echo $row->address?>" required>
  </div>
</div>
</div>
<div class="form-group">
<label for="formGroupExampleInput">Password</label>
<input type="password" name="password" class="form-control" id="user_password" value="<?php echo $row->user_password?>" required>
</div>
<div class="row">
  <div class="col">
    <div class="form-group">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updatemodal" value="Update Profile">Update Profile</button>
    </div>
  </div>
</div>


</form>
    <?php }
  }
  else {
    echo "<p>Unable to fetch results</p>";
  } ?>
  </div>
</div>

     </div>
   </body>
 </html>
