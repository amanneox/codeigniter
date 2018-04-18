<?php
   require 'include/check_session.php';
    ?>
<!doctype html>
<html lang="en" class="no-js">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Home</title>
  <style media="screen">
    html{
      font-size: 62.5%;
    }
    .prevlink,.nextlink,.curlink,.firstlink,.lastlink,.numlink{
      margin: .3em;
    }
  </style>
      <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
      <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
      <script src='<?php echo base_url();?>assets/js/popper.min.js'></script>
      <script src="<?php echo base_url();?>assets/js/bootstrap4.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/home.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.mixitup.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/appointment.js"></script>
      <link href="<?php echo base_url();?>assets/css/bootstrap4.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/pretty-checkbox.min.css" rel="stylesheet">
   </head>
   <body>
      <?php include_once 'include/nav.php'; ?>
      <div style="margin-top:1em;" class="container-fluid text-center">
      <div class="row">
      <div class="col-sm-2">
         <div class="card">
            <div class="card-body">
               <div class="container-fluid">
                  <div style="background-color:#222;display:flex; align-items:center;justify-content:center;" class="row">

                        <p class="text-center font-weight-bold" style="color:#fff;margin-left:1em;font-size:1.6em;">Filters</p>

                  </div>

                  <form style="margin-top:1.6em;" class=""  method="post">

                        <div class="form-group">
                           <label for="exampleFormControlFile1">Show Leads Updated</label>
                           <select class="form-control" id="date">
                              <option>Anytime</option>
                              <option>Today</option>
                              <option>Yesterday</option>
                              <option>This week</option>
                              <option>Last Week</option>
                              <option>This Month</option>
                              <option>Last Month</option>
                              <option>This Year</option>
                              <option>Last Year</option>
                              <option>Date Range</option>
                           </select>

                     </div>
                     <div  class="form-group">
                        <label for="exampleFormControlFile1"></label>
                        <button style="font-size:1.3em;width:100%;" type="submit" onclick="filter_date()" value="Filter" class="btn btn-warning">Filter Date</button>
                     </div>

                        <div style="margin-top:1.6em;" class="form-group">
                           <label for="exampleFormControlFile1">Contact Status</label>
                           <select class="form-control" id="status">
                              <option value="All">All</option>
                              <option value="Unable to connect">Unable to connect</option>
                              <option value="Appointment Set By SDR">Appointment Set By SDR</option>
                              <option value="Lead Completed By SDR">Lead Completed By SDR</option>
                              <option value="Appointment reset by Lead">Appointment reset by Lead</option>
                              <option value="Not Interested">Not Interested</option>
                              <option value="Contact in Future">Contact in Future</option>
                              <option value="Follow up">Follow up</option>
                              <option value="Deal Closed">Deal Closed</option>
                           </select>
                        </div>


                        <div  class="form-group">
                           <label for="exampleFormControlFile1"></label>
                           <button style="font-size:1.3em;width:100%;" type="submit" onclick="filter_status()" value="Filter" class="btn btn-warning">Filter</button>
                        </div>
                    </form>
               </div>
            </div>
         </div>
      </div>

      <div class="col-sm-7">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="panel panel-default text-left">
                     <div class="panel-body">
                       <?php if (isset($results)){ ?>
                       <?php if ($results==false){
                          echo '<p>No results found</p>';}
                           else { foreach ($results as $row)
                                 {?>
                        <div class="row list">
                           <div class="col-sm-12">
                            <div class="col-sm-12">
                                    <div style="margin-top:2em;"  class="card">
                                       <div style="font-size:1.2em;" class="card-body">
                                          <div class="container">
                                             <div class="row">
                                               <div class="col-md-2">
                                                <span><i style="font-size:5em;color:#4CAF50;" class="fas fa-bullseye"></i></span>
                                               </div>
                                                <div class="col-sm-10">
                                                   <div class="row">
                                                      <div class="col">
                                                          <span><?php echo $row->email ?></span>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col">
                                                        <b><span style="color:#212121;"><?php echo $row->firstname;?></span>&nbsp;<span style="color:#212121;"><?php echo $row->lastname; ?></span></b>
                                                      </div>
                                                      <div class="col">
                                                         <span class="leadstatus"><?php echo $row->leadstatus ?></span>
                                                      </div>

                                                   </div>

                                                   <div class="row">
                                                      <div class="col">
                                                        <span style="color:#212121;"><?php echo $row->company ?></span>
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="col">
                                                        <span style="color:#757575;"><?php echo $row->address; ?></span>
                                                      </div>
                                                    </div>
                              </div>
                              </div>
                              </div>
                              </div>
                              </div>
                              </div>
                              </a>
                           </div>
                        </div>
                        <?php
                           } }?>
                        <?php }  else {
                           echo '<p>No result found</p>';
                           }?>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      
</body>
</html>