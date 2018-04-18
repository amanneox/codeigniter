<?php
require_once 'include/check_session.php';
 ?>
<!DOCTYPE html>
<html>
  <head>

    <title>Edit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<style media="screen">
html{
  font-size: 62.5%;
}
#buttons{
  margin: .5em !important;
}

#save{
  font-size: 1.6em;
  margin: .5em !important;
}
input{
  font-size:1.6em !important;
}
#buttons{
  font-size: 1.6em;
}
</style>

<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap4.min.js"></script>
<script src='<?php echo base_url();?>assets/js/popper.min.js'></script>
<link href="<?php echo base_url();?>assets/css/bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/pretty-checkbox.min.css" rel="stylesheet">
  </head>

  <body>
    <?php include_once 'include/nav.php'; ?>
<div class="container-fluid">

  	<div class="row">


<div class="col-sm-12">

    <ul class="nav justify-content-end">
    <li class="nav-item">
      <a id="save" class="nav-link active btn btn-primary">Save</a>
    </li>

    <li class="nav-item">
      <a id="buttons" class="nav-link btn btn-danger"  href="#">Cancel</a>
    </li>
  </ul>

  <div class="row">
<?php $attributes = array('class' => 'col-sm-12', 'id' => 'myform'); ?>
    <?php echo form_open('edit/new_lead',$attributes,['role'=>'form']); ?>



      <div class="row">

      <div class="col-sm-6">

                      <div class="form-group">
                        <label for="leadowner">Lead Owner</label>
                        <input type="text" class="form-control" name="leadowner"  placeholder="Enter Lead Owner">
                        <span class="help-block error text-danger text-danger" ><?php echo form_error('leadowner')?></span>
                      </div>

                      <div class="form-group">
                        <label for="leadownerid">Saletancy ID</label>
                        <input type="text" class="form-control" name="leadownerid"  placeholder="Enter Saletancy ID">
                        <span class="help-block error text-danger text-danger" ><?php echo form_error('leadownerid')?></span>
                      </div>

                  <div class="form-group">
                     <label for="company">Company</label>
                     <input class="form-control" type="text" name="company"  placeholder="Enter Company">
                     <span class="help-block error text-danger" ><?php echo form_error('company')?></span>
                   </div>

                   <div class="form-group">
                     <select name="salutation"  placeholder="Enter Salutation" class="form-control">
                       <option>Mr</option>
                       <option>Ms</option>
                       <option>Mrs</option>
                        <span class="help-block error text-danger" ><?php echo form_error('salutation')?></span>
                     </select>
                    </div>

                      <div class="form-group">
                     <label for="firstname">First Name</label>
                     <input class="form-control" type="text" name="firstname"  placeholder="Enter First Name">
                     <span class="help-block error text-danger" ><?php echo form_error('firstname')?></span>
                   </div>

                   <div class="form-group">
                     <label for="lastname">Last Name</label>
                     <input class="form-control" type="text" name="lastname"  placeholder="Enter Last Name">
                     <span class="help-block error text-danger" ><?php echo form_error('lastname')?></span>
                   </div>


                   <div class="form-group">
                     <label for="title">Title</label>
                     <input type="text" class="form-control" name="title"  placeholder="Enter Title">
                     <span class="help-block error text-danger" ><?php echo form_error('title')?></span>
                   </div>

                   <div class="form-group">
                     <label for="email">Email</label>
                     <input type="text" class="form-control" name="email"  placeholder="Enter Email">
                     <span class="help-block error text-danger"><?php echo form_error('email')?></span>
                  </div>

              <div class="form-group">
                     <label for="phone">Phone</label>
                     <input type="text" class="form-control" name="phone"  placeholder="Enter Phone">
                     <span class="help-block error text-danger"><?php echo form_error('phone')?></span>
                  </div>

              <div class="form-group">
                     <label for="directphone">Direct Phone</label>
                     <input type="text" class="form-control" name="directphone"  placeholder="Enter Direct Phone">
                     <span class="help-block error text-danger"><?php echo form_error('directphone')?></span>
                  </div>

                  <div class="form-group">
                     <label for="mobile">Mobile</label>
                     <input type="text" class="form-control" name="mobile"  placeholder="Enter Mobile">
                     <span class="help-block error text-danger"><?php echo form_error('mobile')?></span>
                  </div>

                  <div class="form-group">
                     <label for="website">Website</label>
                     <input type="text" class="form-control" name="website"  placeholder="Enter Webiste">
                     <span class="help-block error text-danger"><?php echo form_error('website')?></span>
                  </div>

              <div class="form-group">
                  <label for="industry">Industry</label>
                  <input type="text" class="form-control" name="industry" placeholder="Enter Industry">
                  <span class="help-block error text-danger" ><?php echo form_error('industry')?></span>
                </div>
              

                <div class="form-group">
                  <label for="subindustry">Sub Industry</label>
                  <input type="text" class="form-control" name="subindustry"  placeholder="Enter Sub Industry">
                  <span class="help-block error text-danger" ><?php echo form_error('subindustry')?></span>
                </div>
                
                  
               </div>
               <div class="col-sm-6">
 
           
                    <div class="form-group">
                    <label for="leadsource">Lead Source</label>
                    <select name="leadsource"  placeholder="Enter Lead Source" class="form-control">
                <option>Select</option>
                   <option>Cold call</option>
                   <option>Cold email</option>
                   <option>Cold sms</option>
                   <option>Sales chat</option>
                   <option>Landing page</option>
                   <option>Social invite</option>
                    <span class="help-block error text-danger" ><?php echo form_error('leadsource')?></span>
                 </select>
                  </div>
                  <div class="form-group">
                        <label for="leadstatus">Lead Status</label>
                        <select name="leadstatus" placeholder="Enter Lead Status" class="form-control">
                    <option>Select</option>
                       <option>Unable to connect</option>
                       <option>Appointment Set by SDR</option>
                       <option>Lead completed by SDR</option>
                       <option>Appointment reset by Lead</option>
                       <option>Not Interested</option>
                       <option>Contact in Future</option>
                       <option>Follow up</option>
                       <option>Deal Closed</option>
                        <span class="help-block error text-danger" ><?php echo form_error('leadstatus')?></span>
                     </select>
                      </div>

                 <div class="form-group">
                <label for="desc">Description</label>
                <input type="text" class="form-control" name="desc"  placeholder="Enter Description">
                <span class="help-block error text-danger" ><?php echo form_error('desc')?></span>
              </div>

              <div class="form-group">
          <label for="revrange">Revenue range</label>
               <select name="revrange"  placeholder="Enter Revenue range" class="form-control">
                <option>Select</option>
                 <option>0-1 Cr</option>
                 <option>1-10 Cr</option>
                 <option>10-100 Cr</option>
                 <option>100-250 Cr</option>
                 <option>250-500 Cr</option>
                 <option>500-1000 Cr</option>
                 <option>1000-2500 Cr</option>
                 <option>2500-5000 Cr</option>
                 <option>50000+ Cr</option>
                  <span class="help-block error text-danger" ><?php echo form_error('revrange')?></span>
               </select>
              </div>

              <div class="form-group">
                <label for="emprange">Employee range</label>
               <select name="emprange" placeholder="Enter Revenue range" class="form-control">
                <option>Select</option>
                 <option>0-50 Cr</option>
                 <option>50-100 Cr</option>
                 <option>10-100 Cr</option>
                 <option>100-250 Cr</option>
                 <option>250-500 Cr</option>
                 <option>500-1000 Cr</option>
                 <option>1000-2500 Cr</option>
                 <option>2500-5000 Cr</option>
                 <option>50000+ Cr</option>
                  <span class="help-block error text-danger" ><?php echo form_error('emprange')?></span>
               </select>
              </div>

              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter Address">
                <span class="help-block error text-danger" ><?php echo form_error('address')?></span>
              </div>

              <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city"  placeholder="Enter City">
                <span class="help-block error text-danger" ><?php echo form_error('city')?></span>
              </div>

              <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" name="state"  placeholder="Enter State">
                <span class="help-block error text-danger" ><?php echo form_error('state')?></span>
              </div>

              <div class="form-group">
                <label for="pincode">Pincode</label>
                <input type="text" class="form-control" name="pincode"  placeholder="Enter Pincode">
                <span class="help-block error text-danger" ><?php echo form_error('pincode')?></span>
              </div>

              <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" name="country"  placeholder="Enter Country">
                <span class="help-block error text-danger" ><?php echo form_error('country')?></span>
              </div>


              <div class="form-group">
                <label for="skypeid">Skype ID</label>
                <input type="text" class="form-control" name="skypeid"  placeholder="Enter Skype ID">
                <span class="help-block error text-danger" ><?php echo form_error('skypeid')?></span>
              </div>

              <div class="form-group">
                <label for="secondry">Secondry</label>
                <input class="form-control" type="text" name="secondry" placeholder="Enter Secondry">
                <span class="help-block error text-danger" ><?php echo form_error('secondry')?></span>
              </div>

              <div class="form-group">
                <label for="linkedinid">LinkedIn ID</label>
                <input type="text" class="form-control" name="linkedinid"  placeholder="Enter LinkedIn ID">
                <span class="help-block error text-danger" ><?php echo form_error('linkedinid')?></span>
              </div>

                    <div class="form-group">
                      <label for="notes">Notes</label>
                      <textarea class="form-control" rows='4' cols='50' name="notes"  placeholder="Enter Notes"></textarea>
                      <span class="help-block error text-danger" ><?php echo form_error('notes')?></span>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <?php echo form_close(); ?>

  </div>

<script type="text/javascript">
$(document).ready(function(){


  var form = document.getElementById("myform");

  document.getElementById("save").addEventListener("click", function () {
    form.submit();
  });
});
</script>
  </body>
</html>
