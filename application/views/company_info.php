<?php
if (isset($result)) {
  $value= json_decode(json_encode($result), true);
  $pro_id=$value[0]['AppID'];
  $value1= json_decode(json_encode($details), true);
  $lid=$value1[0]['scrm_id'];
}


 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company Info</title>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/modernizr.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.mixitup.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap4.min.js"></script>
    <script src='<?php echo base_url();?>assets/js/popper.min.js'></script>
    <script src='<?php echo base_url();?>assets/js/edit.js'></script>
      <script src='<?php echo base_url();?>assets/js/appointment.js'></script>
    <script src='<?php echo base_url();?>assets/js/moment.min.js'></script>
    <link href="<?php echo base_url();?>assets/css/bootstrap4.min.css" rel="stylesheet">
    <style media="screen">

    html{
      font-size: 62.5%;
    }
    button{
      margin: .3em;
    }
    #option{
      margin-right: 1.6em;
    }
    </style>
  </head>
  <body>
<?php include 'include/nav.php'; ?>

<div style="margin:2em;" class="container-fluid">
<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div style="background-color:#FFFBDC" class="card-body">
        <div class="container">
      <?php if (isset($details)){
        if ($details==FALSE){
          echo "<p>No results found</p>";  }
      else{
        foreach ($details as $row)
          {?>
            <div class="row">
              <span style="font-size:1.6em;"><strong><?php echo $row->firstname?>&nbsp;<?php echo $row->lastname ; ?></strong></span>
            </div>
            <div class="row">
              <span style="font-size:1.6em;"><strong><?php echo $row->company ?></strong></span>
            </div>
            <div class="row">
              <span style="color:#607D8B"><?php echo $row->address ?>&nbsp;,<?php echo $row->city;?>&nbsp;,<?php echo $row->country;?>&nbsp;,<?php echo $row->pincode; ?></span>
            </div>
            <br>
            <span class="font-weight-bold">Contact Information</span>

            <div class="row">
              <div class="col">
             <div class="form-group">
               <label for="email">Email</label>
               <input type="text" class="form-control" name="email" value="<?php echo $row->email?>" placeholder="Enter Email">
               <span class="help-block error text-danger"><?php echo form_error('email')?></span>
            </div>
              </div>
            </div>
            <div class="row">
              <div class="col">

                    <div class="form-group">
                           <label for="phone">Phone</label>
                           <input type="text" class="form-control" name="phone" value="<?php echo $phone= $row->phone ?>" placeholder="Enter Phone">
                           <span class="help-block error text-danger"><?php echo form_error('phone')?></span>
                        </div>
              </div>
            </div>
            <div class="row">
              <div class="col">


                    <div class="form-group">
                           <label for="directphone">Direct Phone</label>
                           <input type="text" class="form-control" name="directphone" value="<?php echo $row->directphone ?>" placeholder="Enter Direct Phone">
                           <span class="help-block error text-danger"><?php echo form_error('directphone')?></span>
                        </div>

              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                   <label for="mobile">Mobile</label>
                   <input type="text" class="form-control" name="mobile" value="<?php echo $row->mobile ?>" placeholder="Enter Mobile">
                   <span class="help-block error text-danger"><?php echo form_error('mobile')?></span>
                </div>
              </div>
            </div>

            <span class="font-weight-bold">Company Information</span>

            <div class="row">
              <div class="col">


                    <div class="form-group">
                          <label for="leadstatus">Lead Status</label>
                          <input name="leadstatus" value="<?php echo $row->leadstatus ?>" placeholder="Enter Lead Status" class="form-control">

                          <span class="help-block error text-danger" ><?php echo form_error('leadstatus')?></span>

                        </div>
              </div>
            </div>
            <div class="row">

              <div class="col">
                <div class="form-group">
                  <label for="emprange">Employee range</label>
                 <input name="emprange" value="<?php echo $row->emprange?>" placeholder="Enter Revenue range" class="form-control">

                    <span class="help-block error text-danger" ><?php echo form_error('emprange')?></span>

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">

                <div class="form-group">
            <label for="revrange">Revenue range</label>
                 <input name="revrange" value="<?php echo $row->revrange ?>" placeholder="Enter Revenue range" class="form-control">

                    <span class="help-block error text-danger" ><?php echo form_error('revrange')?></span>

                </div>

              </div>
            </div>

            <div class="row">
              <div class="col">
                <?php $value= json_decode(json_encode($details), true);?>
                <a href="<?php echo base_url();?>Edit/show_leads?user_id=<?php echo $value[0]['scrm_id']?>"><button class="btn btn-warning">Edit Lead</button></a>

              </div>
                </div>


    </div>

<?php
          }
        }
   } ?>
</div>
    </div>
  </div>
  <div class="col">
    <div class="collapse" id="collapseExample">
    <?php if (isset($result)){
      if ($result==FALSE){
        foreach ($details as $row)
          {?>
            <div class="container-fluid">

              <div class="card">
                <div class="card-body">
                  <p>Current Status</p>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                          <label for="notes">Company</label>
                  <input class="form-control" type="text" value='<?php echo $row->company ?>' readonly>
                  </div>
                </div>
                  <div class="col">
                    <div class="form-group">
                          <label for="notes">Email</label>
                  <input class="form-control" type="text" value='<?php echo $row->email ?>' readonly>
                  </div>
                </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                          <label for="notes">Firstname</label>
                    <input class="form-control" type="text" value='<?php echo $row->firstname ?>' readonly>
                  </div>
                </div>
                  <div class="col">
                    <div class="form-group">
                          <label for="notes">Lastname</label>
                    <input class="form-control" type="text" value='<?php echo $row->lastname ?>' readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                    <div class="form-group">
                          <label for="notes">Lead Status</label>
                          <?php $value= json_decode(json_encode($details), true);
                           $lstatus=$value[0]['leadstatus']; ?>
                    <input class="form-control" type="text" value='<?php echo $lstatus ?>' readonly >
                  </div>
                <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample5" aria-
                 expanded="false" aria-controls="collapseExample">
                 Change Lead Status
                </button>
                </div>

                  <div class="col">
                    <div class="form-group">
                      <label for="notes">Last Update</label>
                    <input class="form-control" type="text" value='<?php echo $row->datecreated ?>' readonly>
                  </div>
                </div>

              </div>


                 <div class="row">
                  <div class="col">
                    <div class="form-group">
                    <label for="notes">Description</label>
                          <?php $value= json_decode(json_encode($details), true);
                           $lnotes=$value[0]['notes']; ?>
                     <input class="form-control" type="text" value='<?php echo $lnotes ?>' readonly>

                  </div>
                </div>

                </div>
                </div>
              </div>


          </div>
          <?php
                    }
                  }

    else{
      foreach ($result as $row)
        {?>
          <div class="container-fluid">

              <div class="card">
                <div class="card-body">
                  <p>Appointement Details</p>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                          <label for="notes">Lead Owner</label>
                  <input class="form-control" type="text" value='<?php echo $row->leadowner ?>' readonly>
                  </div>
                </div>
                  <div class="col">
                    <div class="form-group">
                          <label for="notes">Company</label>
                  <input class="form-control" type="text" value='<?php echo $row->company ?>' readonly>
                  </div>
                </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                          <label for="notes">Firstname</label>
                    <input class="form-control" type="text" value='<?php echo $row->firstname ?>' readonly>
                  </div>
                </div>
                  <div class="col">
                    <div class="form-group">
                          <label for="notes">Lastname</label>
                    <input class="form-control" type="text" value='<?php echo $row->lastname ?>' readonly>
                  </div>
                </div>

                </div>
                <div class="row">
                 <div class="col">
                  <div class="form-group">

                    <label for="notes">Address</label>
                    <input class="form-control" type="text" value='<?php echo $row->address ?>' readonly>
                  </div>
                </div>

                  <div class="col">
                    <div class="form-group">
                          <label for="notes">Status</label>
                    <input class="form-control" type="text" value='<?php echo $row->status ?>' readonly>
                  </div>
                </div>
               </div>
              <div class="row">
                  <div class="col">
                    <div class="form-group">
                          <label for="notes">Appointement Date</label>
                    <input class="form-control" type="text" value='<?php echo $row->AppDate ?>' readonly>
                  </div>
                </div>



                  <div class="col">
                    <div class="form-group">
                          <label for="notes">Date Created</label>
                    <input class="form-control" type="text" value='<?php echo $row->datecreated ?>' readonly>
                  </div>
                </div>
               </div>
              <div class="row">
                  <div class="col">
                    <div class="form-group">
                          <label for="notes">Description</label>
                          <?php $value= json_decode(json_encode($details), true);
                          $lnotes=$value[0]['notes']; ?>
                    <input class="form-control" type="text" value='<?php echo $lnotes ?>' readonly>
                  </div>
                </div>

                </div>
              <div class="row">
                  <div class="col">
                    <div class="form-group">
                          <label for="notes">Notes</label>
                    <input class="form-control" type="text" value='<?php echo $row->AppDesc ?>' readonly>
                  </div>
                </div>

                </div>
                </div>
              </div>


          </div>
          <?php
                    }
                  }
             } ?>

</div>
<div class="collapse" id="collapseExample3">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <p >Add Note</p>
        <form id="addnote" class="" method="post">
          <input type="hidden" name="appid" value='<?php print_r($pro_id[0]); ?>'>
        <div style="font-size:1.6em;" class="form-group">
     <label for="exampleFormControlTextarea1">Note</label>
     <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
     </div>
      <button onclick="addnote()" type="submit" class="btn btn-primary">Submit</button>
    </form>
      </div>

    </div>
  </div>
</div>

<div class="collapse" id="collapseExample2">
  <div class="container-fluid">

      <div class="card">
        <div class="card-body">
  <form id="changestatus" class="" method="post">
    <input type="hidden" name="appid" value='<?php print_r($pro_id); ?>'>
    <div style="font-size:1.6em;" class="form-group">
  <label for="exampleFormControlSelect1">Select Status</label>
  <select name="status" class="form-control" id="">
     <option>Select</option>
     <option>Unable to connect</option>
     <option>Appointment Set by SDR</option>
     <option>Lead completed by SDR</option>
     <option>Appointment reset by Lead</option>
     <option>Not Interested</option>
     <option>Contact in Future</option>
     <option>Follow up</option>
     <option>Deal Closed</option>
  </select>
  </div>
    <div style="font-size:1.6em;" class="form-group">
         <label for="exampleFormControlTextarea1">Change Time</label>
        <input type="datetime-local" name="apptime" value="">
         </div>
  <div style="font-size:1.6em;" class="form-group">
<label for="exampleFormControlTextarea1">Add Note</label>
<textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>

<button type="submit" onclick="update()" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>


<div class="collapse" id="collapseExample5">
  <div class="container-fluid">

      <div class="card">
        <div class="card-body">
<?php echo form_open('Home/changestatus1'); ?>
<?php $value= json_decode(json_encode($details), true);
$lid=$value[0]['scrm_id']; ?>
    <input type="hidden" name="scrm_id" value='<?php echo $lid ?>'>
    <div style="font-size:1.6em;" class="form-group">
  <label for="exampleFormControlSelect1">Select Status</label>
<?php $value= json_decode(json_encode($details), true);
$lstatus=$value[0]['leadstatus']; ?>
  <select name="leadstatus"  class="form-control" id="">
     <option>Select</option>
     <option value="unabletoconn">Unable to connect</option>
     <option value="appsetbysdr">Appointment Set by SDR</option>
     <option value="leadcompbysdr">Lead completed by SDR</option>
     <option value="appresetbylead">Appointment reset by Lead</option>
     <option value="contactinfuture">Contact in Future</option>
     <option value="followup">Follow up</option>
     <option value="dealclosed">Deal Closed</option>
  </select>
  </div>
  <div style="font-size:1.6em;" class="form-group">
<label for="exampleFormControlTextarea1">Add Note</label>
<?php $value= json_decode(json_encode($details), true);
$lnotes=$value[0]['notes']; ?>
<input type="text" name="note" value="<?php echo $lnotes; ?>" class="form-control" id="exampleFormControlTextarea1">
</div>

<input type="submit" value="Change Status"  class="btn btn-primary"/>
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>


<div class="collapse" id="collapseExample4">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">

        <?php if ($email_log!=FALSE) {
       ?>
       <h1 class="display-4">Touchpoints</h1>
      <p>Email:</p>
       <?php foreach ($email_log as $row)
        {?>
          <br>

       <div id="accordion">
    <div class="card">
     <div class="card-header" id="headingOne">
       <h5 class="mb-0">
         <button class="btn btn-link" data-toggle="collapse" data-target='#<?php echo $row->log_id; ?>' aria-expanded="true" aria-controls="collapseOne">
         <i class="fas fa-chevron-right"></i>
         </button>
       </h5>
     </div>

     <div id='<?php echo $row->log_id; ?>' class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">

       <div class="card-body">
         <div class="container">
         <div class="row">
             <div class="col">
               <span>Send to:</span>&nbsp;&nbsp;<?php echo $row->send_to; ?>
             </div>
             <div class="col">
                   <span>Date:</span>&nbsp;&nbsp;<?php echo $row->send_date; ?>
             </div>
         </div>
         <div class="row">
         <p>Message:&nbsp;&nbsp;<?php echo $row->email_text; ?></p>
         </div>
           </div>

       </div>
     </div>
    </div>
   </div>
       <?php }
          }
          else {
           echo '<p>No results found</p>';
          }
        ?>

      </div>
<?php if ($call_log!=FALSE) {
       ?>
      <p>Calls:</p>
       <?php foreach ($call_log as $row)
        {?>
          <br>

       <div id="accordion">
    <div class="card">
     <div class="card-header" id="headingOne">
       <h5 class="mb-0">
         <button class="btn btn-link" data-toggle="collapse" data-target='#<?php echo $row->log_id; ?>' aria-expanded="true" aria-controls="collapseOne">
         <i class="fas fa-chevron-right"></i>
         </button>
       </h5>
     </div>

     <div id='<?php echo $row->log_id; ?>' class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
       <div class="card-body">
         <div class="container">
         <div class="row">
             <div class="col">
               <span>Send to:</span>&nbsp;&nbsp;<?php echo $row->log_date; ?>
             </div>

           </div>

       </div>
     </div>
    </div>
   </div>
       <?php }
          }
          else {
           echo '<p>No results found</p>';
          }
        ?>

      </div>

    </div>
  </div>
</div>

  </div>
  <div id="option" class="col-sm-2">

    <button style="width:100%;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  Current Status
  </button>

  <button  style="width:100%;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
  Change Status
  </button>
  <button  style="width:100%;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
  Add Notes
  </button>
  <button  style="width:100%;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample">
  Touchpoints
  </button>
  <button  style="width:100%;" button class="btn btn-primary" type="button" data-toggle="modal" data-target="#emailModal">
  Send Mail
  </button>
  <button  style="width:100%;" button class="btn btn-primary" type="button" data-toggle="modal" data-target="#smsmodal">
  Send Message
  </button>
  <a href="http://www.linkedin.com/profile/view?id=<?php echo $row->linkedinid; ?>">
  <button  style="width:100%;" button class="btn btn-primary" type="button">Social</button>
  </a>
  </div>
</div>
  </body>
</html>
