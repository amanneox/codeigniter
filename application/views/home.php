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
                     <div id="daterange" style="display:none" class="form-group">
                       <div class="row">
                         <div style="margin-top:.5em;" class="col">
                           <input id="start" type="date" name="start" value="">
                         </div>
                         <div style="margin-top:.5em;" class="col">
                           <input id="end" type="date" name="end" value="">
                         </div>
                       </div>
                     </div>
                     <div  class="form-group">
                        <label for="exampleFormControlFile1"></label>
                        <button style="font-size:1.3em;width:100%;" type="submit" onclick="filter_date()" value="Filter" class="btn btn-warning">Filter Date</button>
                     </div>

                        <div style="margin-top:1.6em;" class="form-group">
                           <label for="exampleFormControlFile1">Contact Status</label>
                           <select class="form-control" id="status">
                              <option value="All">All</option>
                              <option value="Appointment Set By SDR">Appointment Set By SDR</option>
                              <option value="Lead Completed By SDR">Lead Completed By SDR</option>
                              <option value="Appointment reset by Lead">Appointment reset by Lead</option>
                              <option value="Deal Closed">Deal Closed</option>
                           </select>
                        </div>


                        <div  class="form-group">
                           <label for="exampleFormControlFile1"></label>
                           <button style="font-size:1.3em;width:100%;" type="submit" onclick="filter_status()" value="Filter" class="btn btn-warning">Filter</button>
                        </div>
                    </form>
                    <div  class="form-group">
                       <label for="exampleFormControlFile1"></label>
                       <button style="font-size:1.3em;width:100%;" onclick="reset_filter();" type="button" class="btn btn-default">Reset</button>
                    </div>
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
                       <?php    //  var_dump($results['today']);?>
                       <?php if (isset($results['today'])){ ?>
                       <?php if ($results['today']==false){
                         echo '<nav style="margin-top: 1em;" aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item active" aria-current="page">Today No result found</li>
</ol>
</nav>';}
                           else {
                             echo '<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Today</li>
  </ol>
</nav>';
                              foreach ($results['today'] as $row)
                                 {?>
                        <div class="row list">
                           <div class="col-sm-12">

                              <a style="text-decoration:none;"  href="<?php echo site_url('Home/display').'/'.$row->scrm_id;?>">
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
                                                         <span class="app-date"><?php echo $row->AppDate;?></span>
                                                      </div>
                                                      <div class="col">
                                                          <span><?php echo $row->email ?></span>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col">
                                                        <b><span style="color:#212121;"><?php echo $row->firstname;?></span>&nbsp;<span style="color:#212121;"><?php echo $row->lastname; ?></span></b>
                                                      </div>
                                                      <div class="col">
                                                         <span class="leadstatus"><?php echo $row->status ?></span>
                                                      </div>

                                                   </div>

                                                   <div class="row">
                                                      <div class="col">
                                                        <span style="color:#212121;"><?php echo $row->company ?></span>
                                                      </div>
                                                      <div class="col">
                                                        <a style="float:right;font-size:1.6em;" href="http://www.linkedin.com/profile/view?id=<?php echo $row->linkedinid; ?>"><span><i class="fab fa-linkedin"></i></span></a>
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


            <div class="row">
               <div class="col-sm-12">
                  <div class="panel panel-default text-left">
                     <div class="panel-body">
                       <?php    //  var_dump($results['today']);?>
                       <?php if (isset($results['yesterday'])){ ?>
                       <?php if ($results['yesterday']==false){
                          echo '<nav style="margin-top: 1em; aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Yesterday &nbsp; No result found</li>
  </ol>
</nav>';}
                           else {
                             echo '<nav style="margin-top: 1em;" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Yesterday</li>
  </ol>
</nav>';
                              foreach ($results['yesterday'] as $row)
                                 {?>
                        <div class="row list">
                           <div class="col-sm-12">

                              <a style="text-decoration:none;"  href="<?php echo site_url('Home/display').'/'.$row->scrm_id;?>">
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
                                                         <span class="app-date"><?php echo $row->AppDate;?></span>
                                                      </div>
                                                      <div class="col">
                                                          <span><?php echo $row->email ?></span>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col">
                                                        <b><span style="color:#212121;"><?php echo $row->firstname;?></span>&nbsp;<span style="color:#212121;"><?php echo $row->lastname; ?></span></b>
                                                      </div>
                                                      <div class="col">
                                                         <span class="leadstatus"><?php echo $row->status ?></span>
                                                      </div>

                                                   </div>

                                                   <div class="row">
                                                      <div class="col">
                                                        <span style="color:#212121;"><?php echo $row->company ?></span>
                                                      </div>
                                                      <div class="col">
                                                        <a style="float:right;font-size:1.6em;" href="http://www.linkedin.com/profile/view?id=<?php echo $row->linkedinid; ?>"><span><i class="fab fa-linkedin"></i></span></a>
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

            <div class="row">
               <div class="col-sm-12">
                  <div class="panel panel-default text-left">
                     <div class="panel-body">
                       <?php    //  var_dump($results['today']);?>
                       <?php if (isset($results['previous'])){ ?>
                       <?php if ($results['previous']==false){
                         echo '<nav style="margin-top: 1em;" aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item active" aria-current="page">Previous No results found</li>
</ol>
</nav>';}
                           else {
                             echo '<nav style="margin-top: 1em;" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Previous</li>
  </ol>
</nav>';
                              foreach ($results['previous'] as $row)
                                 {?>
                        <div class="row list">
                           <div class="col-sm-12">

                              <a style="text-decoration:none;"  href="<?php echo site_url('Home/display').'/'.$row->scrm_id;?>">
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
                                                         <span class="app-date"><?php echo $row->AppDate;?></span>
                                                      </div>
                                                      <div class="col">
                                                          <span><?php echo $row->email ?></span>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col">
                                                        <b><span style="color:#212121;"><?php echo $row->firstname;?></span>&nbsp;<span style="color:#212121;"><?php echo $row->lastname; ?></span></b>
                                                      </div>
                                                      <div class="col">
                                                         <span class="leadstatus"><?php echo $row->status ?></span>
                                                      </div>

                                                   </div>

                                                   <div class="row">
                                                      <div class="col">
                                                        <span style="color:#212121;"><?php echo $row->company ?></span>
                                                      </div>
                                                      <div class="col">
                                                        <a style="float:right;font-size:1.6em;" href="http://www.linkedin.com/profile/view?id=<?php echo $row->linkedinid; ?>"><span><i class="fab fa-linkedin"></i></span></a>
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

            <div class="row">
               <div class="col-sm-12">
                  <div class="panel panel-default text-left">
                     <div class="panel-body">
                       <?php    //  var_dump($results['today']);?>
                       <?php if (isset($results['upcoming'])){ ?>
                       <?php if ($results['upcoming']==false){
                         echo '<nav style="margin-top: 1em;" aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item active" aria-current="page">Upcoming No results found</li>
</ol>
</nav>';}
                           else {
                             echo '<nav style="margin-top: 1em;" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Upcoming</li>
  </ol>
</nav>';
                              foreach ($results['upcoming'] as $row)
                                 {?>
                        <div class="row list">
                           <div class="col-sm-12">

                              <a style="text-decoration:none;"  href="<?php echo site_url('Home/display').'/'.$row->scrm_id;?>">
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
                                                         <span class="app-date"><?php echo $row->AppDate;?></span>
                                                      </div>
                                                      <div class="col">
                                                          <span><?php echo $row->email ?></span>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col">
                                                        <b><span style="color:#212121;"><?php echo $row->firstname;?></span>&nbsp;<span style="color:#212121;"><?php echo $row->lastname; ?></span></b>
                                                      </div>
                                                      <div class="col">
                                                         <span class="leadstatus"><?php echo $row->status ?></span>
                                                      </div>

                                                   </div>

                                                   <div class="row">
                                                      <div class="col">
                                                        <span style="color:#212121;"><?php echo $row->company ?></span>
                                                      </div>
                                                      <div class="col">
                                                        <a style="float:right;font-size:1.6em;" href="http://www.linkedin.com/profile/view?id=<?php echo $row->linkedinid; ?>"><span><i class="fab fa-linkedin"></i></span></a>
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
         <div style="float:right;margin-top:1em;font-size:1.2em;" class="row">
           <?php if (isset($links)) { ?>
                   <?php echo $links ?>
               <?php } ?>
         </div>

      </div>
      <div class="col-sm-3">
         <div class="card">
            <div class="card-body">
               <div class="container">
                  <div class="row">
                    <b><p style="font-size:2em;">Live Touchpoints</p></b>
                  </div>
                  <div class="row">
                     <div class="col">
                        <a><span class="phone-log"><i class="fas fa-phone"></i>&nbsp;Calls</span></a>
                     </div>
                     <div class="col">
                        <a><span class="email-log"><i class="fas fa-envelope"></i>&nbsp;Email</span><a/>
                     </div>
                  </div>
                  <div class="row">
                  </div>
               </div>
               <hr style="border:1px solid black;">
               <div style="display:none;" class="touch-email">

               <?php
                  if (isset($touch) && isset($results)) {

                  if ($touch!=FALSE){ ?>
               <?php foreach ($touch as $row) {?>
               <br>
               <div class="card">
                  <div class="card-body">
                     <div class="container">
                        <div class="row">
                           <?php echo $row->send_date; ?>
                        </div>
                        <div class="row">
                           <?php echo $row->send_to; ?>
                        </div>
                        <div class="row">
                           <?php echo $row->firstname; ?>&nbsp;<?php echo $row->lastname; ?>
                        </div>
                        <div class="row">
                           <?php echo $row->mobile; ?>
                        </div>
                     </div>
                  </div>
               </div>
               <?php }
                  }
                  else {
                  echo '<p>No results found</p>';
                  }  }?>
 </div>
<div  class="touch-phone">

                <?php
                  if (isset($calls) && isset($results)) {
                  if ($calls!=FALSE){ ?>
               <?php foreach ($calls as $row) {?>
               <br>
               <div class="card">
                  <div class="card-body">
                     <div class="container">

                        <div class="row">
                           <?php echo $row->firstname; ?>&nbsp;<?php echo $row->lastname; ?>
                        </div>
                        <div class="row">
                         <span><?php echo $row->company; ?></span>
                        </div>
                        <div class="row">
                           <?php echo $row->mobile; ?>
                        </div>
                          <div class="row">
                          <?php echo $row->leadstatus; ?>
                        </div>
                     </div>
                  </div>
               </div>
               <?php }
                  }
                  else {
                  echo '<p>No results found</p>';
                  }
                  } ?>
                  </div>
            </div>
         </div>
      </div>
   </body>
</html>
