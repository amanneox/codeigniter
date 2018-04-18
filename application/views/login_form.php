<?php
if (isset($this->session->userdata['logged_in'])) {
header("Location:home");
}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="description" content="Love Authority." />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/modernizr.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.mixitup.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrap4.min.js"></script>
        <script src='<?php echo base_url();?>assets/js/popper.min.js'></script>
        <script src='<?php echo base_url();?>assets/js/login.js'></script>
        <script src='<?php echo base_url();?>assets/js/moment.min.js'></script>
        <link href="<?php echo base_url();?>assets/css/bootstrap4.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/login.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/pretty-checkbox.min.css" rel="stylesheet">
    </head>
    <body>

        <!--hero section-->
        <section class="hero">

            <div class="container">

                <div class="row">

                    <div class="col-md-6 col-sm-8 mx-auto">
                        <div class="card border-none">
                            <div class="card-body">
                                <div class="mt-2">
                                    <img src='<?php echo base_url()?>assets/img/male.svg'  alt="Male" class="brand-logo mx-auto d-block img-fluid rounded-circle"/>
                                </div>
                                <p class="mt-4 text-white lead text-center">
                                    Sign in to access your account
                                </p>
                                <?php
                                if (isset($logout_message)) {
                                  echo "<div class='message'>";
                                  echo $logout_message;
                                  echo "</div>";
                                }
                                ?>
                                <?php
                                if (isset($message_display)) {
                                  echo "<div class='message'>";
                                  echo $message_display;
                                  echo "</div>";
                                }
                                ?>
                                <div class="mt-4">
                                <?php echo form_open('User_auth/user_login_process'); ?>
                                  <div class="message">

                                  </div>
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username')?>" placeholder="Enter user name" required>
									  <span class="help-block error text-danger" ><?php echo form_error('username')?></span>
                                    </div>
                                        <div class="form-group">
                                          <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email')?>" placeholder="Enter email address" required>
										  <span class="help-block error text-danger" ><?php echo form_error('email')?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password')?>" placeholder="Enter password" required>
											<span class="help-block error text-danger" ><?php echo form_error('password')?></span>
                                        </div>
                                        <label class="custom-control custom-checkbox mt-2">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <div class="pretty p-default p-round">
                                              <input type="checkbox" />
                                                <div class="state p-success-o">
                                                  <label>Keep me logged in</label>
                                                </div>
                                              </div>

                                        </label>
                                        <div class="row">
                                          <div class="col">
                                            <div style="display:none;" id="loading" class="overlay">
                                            <img style="max-width:32px;max-height:32px;" src='<?php echo base_url();?>assets/img/loader-2.gif' alt="">
                                            </div>
                                          </div>
                                        <div class="col">
                                          <input name="submit" value="Sign in" type="submit"  class="btn btn-primary float-right">
                                        </div>
                                        </div>

                              <?php echo form_close(); ?>
                                    <div class="clearfix"></div>
                                    <p class="content-divider center mt-4"><span>or</span></p>
                                </div>

                                <p class="text-center">
                                    Don't have an account yet? <a href="<?php echo base_url('register'); ?>">Sign Up Now</a>
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
</html>
