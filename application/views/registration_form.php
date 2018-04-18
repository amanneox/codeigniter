<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/modernizr.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.mixitup.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap4.min.js"></script>
    <script src='<?php echo base_url();?>assets/js/popper.min.js'></script>
    <script src='<?php echo base_url();?>assets/js/register.js'></script>
    <script src='<?php echo base_url();?>assets/js/moment.min.js'></script>
    <link href="<?php echo base_url();?>assets/css/bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/login.css" rel="stylesheet">

  </head>
  <body>
    <body>
        <!--hero section-->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8 mx-auto">
                        <div class="card border-none">
                            <div class="card-body">
                                <div class="mt-2 text-center">
                                    <h2>Create Your Account</h2>
                                </div>
                                <p class="mt-4 text-white lead text-center">
                                    Sign up to get started with Saletancy
                                </p>
                                <?php
                                if (isset($message_display)) {
                                  echo "<div class='message'>";
                                  echo $message_display;
                                  echo "</div>";
                                }
                                ?>
                                <div class="mt-4">

                                    <?php echo form_open('User_auth/new_user_registration'); ?>
                                    <?php
                                    //echo "<div class='error_msg'>";
                                    //echo validation_errors();
                                    //echo "</div>";?>
                                    <div class="row">
                                    <div class="col">
                                      <div class="form-group">

                                          <input id="firstname" type="text" class="form-control" name="firstname" value="<?php echo set_value('firstname'); ?>" placeholder="Enter First Name" required>
										  <span class="help-block error text-danger" ><?php echo form_error('firstname')?></span>
                                      </div>
                                    </div>
                                    <div class="col">
                                      <div class="form-group">
                                          <input id="lastname" type="text" class="form-control" name="lastname" value="<?php echo set_value('lastname'); ?>" placeholder="Enter Last Name" required>
										  <span class="help-block error text-danger" ><?php echo form_error('lastname')?></span>
                                      </div>
                                    </div>
                                        </div>
                                        <div class="row">
                                          <div class="col">
                                            <div class="form-group">
                                                <input id="username" type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" placeholder="Enter User Name" required>
												<span class="help-block error text-danger" ><?php echo form_error('username')?></span>
                                            </div>
                                          </div>
                                          <div class="col">
                                            <div class="form-group">
                                                <input id="mobile" type="text" class="form-control" name="mobile" value="<?php echo set_value('mobile'); ?>" placeholder="Enter Mobile Number" required>
												<span class="help-block error text-danger" ><?php echo form_error('mobile')?></span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col">
                                            <div class="form-group">
                                                <input id="country" type="text" class="form-control" name="country" value="<?php echo set_value('country'); ?>" placeholder="Enter Country Name" required>
												<span class="help-block error text-danger" ><?php echo form_error('country')?></span>
                                            </div>
                                          </div>
                                          <div class="col">
                                            <div class="form-group">
                                                <input id="city" type="text" class="form-control" name="city" value="<?php echo set_value('city'); ?>" placeholder="Enter City Name" required>
												<span class="help-block error text-danger" ><?php echo form_error('city')?></span>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col">
                                            <div class="form-group">
                                                <input id="state" type="text" class="form-control" name="state" value="<?php echo set_value('state'); ?>" placeholder="State Name" required>
												<span class="help-block error text-danger" ><?php echo form_error('state')?></span>
                                            </div>
                                          </div>
                                          <div class="col">
                                            <div class="form-group">
                                                <input id="zip" type="text" class="form-control" name="zip" value="<?php echo set_value('zip'); ?>" placeholder="Enter Zip Code" required>
												<span class="help-block error text-danger" ><?php echo form_error('zip')?></span>
                                            </div>
                                          </div>
                                          <div class="col-sm-6">
                                            <div class="form-group">
                                                <input id="address" type="text" class="form-control" name="address" value="<?php echo set_value('address'); ?>" placeholder="Enter Street Name" required>
												<span class="help-block error text-danger" ><?php echo form_error('address')?></span>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Enter email address" required>
											<span class="help-block error text-danger" ><?php echo form_error('email')?></span>
                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control" name="password" value="" placeholder="Enter password" required>
											<span class="help-block error text-danger" ><?php echo form_error('password')?></span>
                                        </div>
                                        <div class="form-group">
                                            <input id="confirm-pass" type="password" class="form-control" name="confirm-password" value="" placeholder="Confirm password" required>
											<span class="help-block error text-danger" ><?php echo form_error('confirm-password')?></span>
                                        </div>
                                        <div class="row">
                                          <div class="col">
                                            <div style="display:none;" id="loading" class="overlay">
                                            <img style="max-width:32px;max-height:32px;" src='<?php echo base_url();?>assets/img/loader-2.gif' alt="">
                                            </div>
                                          </div>
                                          <div class="col">
                                            <input type="submit" value="Create Account" class="btn btn-primary btn-block">
                                          </div>
                                        </div>
                                            <?php echo form_close(); ?>
                                    <div class="clearfix"></div>
                                    <p class="content-divider center mt-4"><span>or</span></p>
                                </div>

                                <p class="text-center">
                                    Already have an account? <a href="<?php echo base_url('login')?>">Login Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12 mt-5 footer">

                    </div>
                </div>
            </div>
        </section>

    </body>
  </body>
</html>
