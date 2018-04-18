<?php
require_once 'include/check_session.php';
if (isset($results)) {
  $value= json_decode(json_encode($results), true);
  $pro_id=$value[0]['AppID'];

}
 ?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Appointement</title>

<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap4.min.js"></script>
<script src='<?php echo base_url();?>assets/js/popper.min.js'></script>
<script src="<?php echo base_url();?>assets/js/jquery.mixitup.min.js"></script>
<script src="<?php echo base_url();?>assets/js/appointment.js"></script>
<link href="<?php echo base_url();?>assets/css/bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/appointment.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/pretty-checkbox.min.css" rel="stylesheet">
<style media="screen">

html{
  overflow-x: hidden;
 font-size: 62.5% !important;
}
.header{
  font-size: 62.5% !important;
}
#navbarDropdownMenuLink{
  font-size: 1.6em;
}
</style>
</head>
<body>
<?php include_once 'include/nav.php'; ?>


      <div style="margin:2em;" class="container-fluid">
			<div class="row">
			  <div class="col-sm-4">
			    <div style="background-color:#FFFBDC" class="card">
			      <div class="card-body">
			      <?php if (isset($details)){
			        if ($details==FALSE){
			          echo "<p>No results found</p>";  }
			      else{
			        foreach ($details as $row)
			          {?>
			           <div class="row">
			              <div class="col">
			                <div class="form-group">
			                  <label for="leadowner">Lead Owner</label>
			                  <input type="text" class="form-control" name="leadowner" value="<?php echo $row->leadowner ?>" placeholder="Enter Lead Owner">
			                  <span class="help-block error text-danger text-danger" ><?php echo form_error('leadowner')?></span>
			              </div>
			            </div>
			              <div class="col">
			                <div class="form-group">
			                  <label for="leadownerid">Lead Owner ID</label>
			                  <input type="text" class="form-control" name="leadownerid" value="<?php echo $row->leadownerid ?>" placeholder="Enter Lead Owner ID">
			                  <span class="help-block error text-danger text-danger" ><?php echo form_error('leadownerid')?></span>
			                </div>
			              </div>
			            
			            
			              <div class="col">
			                <div class="form-group">
			                   <label for="company">Company</label>
			                   <input class="form-control" type="text" name="company" value="<?php echo $row->company ?>" placeholder="Enter Company">
			                   <span class="help-block error text-danger" ><?php echo form_error('company')?></span>
			                 </div>
			              </div>
			          </div>
			          <div class="row">
			              <div class="col">

			                         <div class="form-group">
			                         	<label for="firstname">Name</label>
			                           <select name="salutation" value="<?php $row->salutation ?>" placeholder="Enter Salutation" class="form-control">
			                             <option>Mr</option>
			                             <option>Ms</option>
			                             <option>Mrs</option>
			                              <span class="help-block error text-danger" ><?php echo form_error('salutation')?></span>
			                           </select>
			                          </div>
			              </div>
			              <div class="col">

			                            <div class="form-group">
			                           <label for="firstname">First Name</label>
			                           <input class="form-control" type="text" name="firstname" value="<?php echo $row->firstname ?>" placeholder="Enter First Name">
			                           <span class="help-block error text-danger" ><?php echo form_error('firstname')?></span>
			                         </div>

			              </div>
			            
			            
			              <div class="col">
			                <div class="form-group">
			                  <label for="lastname">Last Name</label>
			                  <input class="form-control" type="text" name="lastname" value="<?php echo $row->lastname ?>" placeholder="Enter Last Name">
			                  <span class="help-block error text-danger" ><?php echo form_error('lastname')?></span>
			                </div>
			              </div>
			          </div>
			          <div class="row">
			              <div class="col">
			                <div class="form-group">
			                  <label for="title">Title</label>
			                  <input type="text" class="form-control" name="title" value="<?php echo $row->title ?>" placeholder="Enter Title">
			                  <span class="help-block error text-danger" ><?php echo form_error('title')?></span>
			                </div>
			              </div>
			              <div class="col">


			             <div class="form-group">
			               <label for="email">Email</label>
			               <input type="text" class="form-control" name="email" value="<?php echo $row->email?>" placeholder="Enter Email">
			               <span class="help-block error text-danger"><?php echo form_error('email')?></span>
			            </div>
			              </div>
			            
			            
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
			              <div class="col">
			                <div class="form-group">
			                   <label for="mobile">Mobile</label>
			                   <input type="text" class="form-control" name="mobile" value="<?php echo $row->mobile ?>" placeholder="Enter Mobile">
			                   <span class="help-block error text-danger"><?php echo form_error('mobile')?></span>
			                </div>
			              </div>
			           
			            
			              <div class="col">
			                <div class="form-group">
			                   <label for="website">Website</label>
			                   <input type="text" class="form-control" name="website" value="<?php echo $row->website ?>" placeholder="Enter Webiste">
			                   <span class="help-block error text-danger"><?php echo form_error('website')?></span>
			                </div>

			              </div>
			          </div>
			          <div class="row">
			              <div class="col">

			                  <div class="form-group">
			                  <label for="leadsource">Lead Source</label>
			                  <input type="text" class="form-control" name="leadsource" value="<?php echo $row->leadsource ?>" placeholder="Enter  Lead Source">
			                  <span class="help-block error text-danger" ><?php echo form_error('leadsource')?></span>
			                </div>

			              </div>
			              <div class="col">

			                  <div class="form-group">
			                      <label for="leadstatus">Lead Status</label>
			                      <input type="text" class="form-control" name="leadstatus" value="<?php echo $row->leadstatus ?>" placeholder="Enter  Lead Status">
			                      <span class="help-block error text-danger" ><?php echo form_error('leadstatus')?></span>
			                    </div>

			              </div>
			            
			              <div class="col">


			                    <div class="form-group">
			                        <label for="industry">Industry</label>
			                        <input type="text" class="form-control" name="industry" value="<?php echo $row->industry ?>" placeholder="Enter Industry">
			                        <span class="help-block error text-danger" ><?php echo form_error('industry')?></span>
			                      </div>

			              </div>
			          </div>
			          <div class="row">
			              <div class="col">
			                <div class="form-group">
			                  <label for="subindustry">Sub Industry</label>
			                  <input type="text" class="form-control" name="subindustry" value="<?php echo $row->subindustry ?>" placeholder="Enter Sub Industry">
			                  <span class="help-block error text-danger" ><?php echo form_error('subindustry')?></span>
			                </div>
			              </div>
			              <div class="col">
									  <div class="form-group">
			                          <label for="leadsource">Lead Source</label>
			                          <select name="leadsource" value="<?php echo $row->leadsource ?>" placeholder="Enter Lead Source" class="form-control">
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
			                    
			              </div>
			           
			              <div class="col">


			                    <div class="form-group">
			                          <label for="leadstatus">Lead Status</label>
			                          <select name="leadstatus" value="<?php echo $row->leadstatus ?>" placeholder="Enter Lead Status" class="form-control">
			                      <option>Select</option>
			                         <option>Unable to connect</option>
			                         <option>Appointement Set by SDR</option>
			                         <option>Lead completed by SDR</option>
			                         <option>Appointement reset by Lead</option>
			                         <option>Not Interested</option>
			                         <option>Contact in Future</option>
			                         <option>Follow up</option>
			                         <option>Deal Closed</option>
			                          <span class="help-block error text-danger" ><?php echo form_error('leadstatus')?></span>
			                       </select>
			                        </div>
			              </div>
			            </div>
			            <div class="row">
			            
			              <div class="col">
			                <div class="form-group">
			               <label for="desc">Description</label>
			               <input type="text" class="form-control" name="desc" value="<?php echo $row->desc ?>" placeholder="Enter Description">
			               <span class="help-block error text-danger" ><?php echo form_error('desc')?></span>
			             </div>

			              </div>
			              <div class="col">

			                <div class="form-group">
			            <label for="revrange">Revenue range</label>
			                 <select name="revrange" value="<?php echo $row->revrange ?>" placeholder="Enter Revenue range" class="form-control">
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

			              </div>
			         
			              <div class="col">
			                <div class="form-group">
			                  <label for="emprange">Employee range</label>
			                 <select name="emprange" value="<?php echo $row->emprange?>" placeholder="Enter Revenue range" class="form-control">
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
			              </div>
			            </div>
			            <div class="row">
			            
			              <div class="col">

			                    <div class="form-group">
			                      <label for="address">Address</label>
			                      <input type="text" class="form-control" name="address" value="<?php echo $row->address ?>" placeholder="Enter Address">
			                      <span class="help-block error text-danger" ><?php echo form_error('address')?></span>
			                    </div>

			              </div>
			              <div class="col">


			                    <div class="form-group">
			                      <label for="city">City</label>
			                      <input type="text" class="form-control" name="city" value="<?php echo $row->city; ?>" placeholder="Enter City">
			                      <span class="help-block error text-danger" ><?php echo form_error('city')?></span>
			                    </div>

			              </div>
			          
			              <div class="col">
			                <div class="form-group">
			                  <label for="state">State</label>
			                  <input type="text" class="form-control" name="state" value="<?php echo $row->state ?>" placeholder="Enter State">
			                  <span class="help-block error text-danger" ><?php echo form_error('state')?></span>
			                </div>
			              </div>
			          </div>
			          <div class="row">
			            
			            
			              <div class="col">
			                <div class="form-group">
			                  <label for="pincode">Pincode</label>
			                  <input type="text" class="form-control" name="pincode" value="<?php echo $row->pincode?>" placeholder="Enter Pincode">
			                  <span class="help-block error text-danger" ><?php echo form_error('pincode')?></span>
			                </div>

			              </div>
			              <div class="col">

			                  <div class="form-group">
			                    <label for="country">Country</label>
			                    <input type="text" class="form-control" name="country" value="<?php echo $row->country ?>" placeholder="Enter Country">
			                    <span class="help-block error text-danger" ><?php echo form_error('country')?></span>
			                  </div>

			              </div>
			          
			              <div class="col">
			                <div class="form-group">
			                  <label for="skypeid">Skype ID</label>
			                  <input type="text" class="form-control" name="skypeid" value="<?php echo $row->skypeid ?>" placeholder="Enter Skype ID">
			                  <span class="help-block error text-danger" ><?php echo form_error('skypeid')?></span>
			                </div>
			              </div>
			          </div>
			          <div class="row">
			            
			            
			              <div class="col">
			                <div class="form-group">
			                  <label for="secondry">Secondry</label>
			                  <input class="form-control" type="text" name="secondry" value="<?php echo $row->secondry?>" placeholder="Enter Secondry">
			                  <span class="help-block error text-danger" ><?php echo form_error('secondry')?></span>
			                </div>

			              </div>
			              <div class="col">

			                    <div class="form-group">
			                      <label for="linkedinid">LinkedIn ID</label>
			                      <input type="text" class="form-control" name="linkedinid" value="<?php echo$row->linkedinid ?>" placeholder="Enter LinkedIn ID">
			                      <span class="help-block error text-danger" ><?php echo form_error('linkedinid')?></span>
			                    </div>
			              </div>
			         
			              <div class="col">

			                          <div class="form-group">
			                            <label for="notes">Notes</label>
			                            <textarea class="form-control" rows='4' cols='50' name="notes" value="<?php echo $row->notes ?>"  placeholder="Enter Notes"></textarea>
			                            <span class="help-block error text-danger" ><?php echo form_error('notes')?></span>
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
			  <div class="col-sm-5">
					<div class="collapse" id="collapseExample2">
						<div class="container-fluid">

								<div class="card">
									<div class="card-body">

						<form id="changestatus" class="" method="post">
							<input type="hidden" name="appid" value='<?php print_r($pro_id[0]); ?>'>
							<div style="font-size:1.6em;" class="form-group">
						<label for="exampleFormControlSelect1">Select Status</label>
						<select name="status" class="form-control" id="">
							<option>active</option>
							<option>completed</option>
							<option>pending</option>
						</select>
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
		<div class="collapse" id="collapseExample4">
			<div class="container-fluid">
				<div class="card">
					<div class="card-body">
						<p >Touchpoints</p>
						<?php if ($email_log!=FALSE) {
	 				 ?>
	 				 <h1 class="display-4">Touchpoints</h1>
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

				</div>
			</div>
		</div>
					<div class="collapse" id="collapseExample">

			    <?php if (isset($results)){
			      if ($results==FALSE){
			        echo "<p>No results found</p>";  }
			    else{
			      foreach ($results as $row)
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
			                  <div class="form-group">
			                  <div class="col-sm-12">
			                    <label for="notes">Address</label>
			                    <input class="form-control" type="text" value='<?php echo $row->address ?>' readonly>
			                  </div>
			                </div>
			                </div>
			                <div class="row">
			                  <div class="col">
			                    <div class="form-group">
			                          <label for="notes">Status</label>
			                    <input class="form-control" type="text" value='<?php echo $row->status ?>' readonly>
			                  </div>
			                </div>
			                  <div class="col">
			                    <div class="form-group">
			                          <label for="notes">Appointement Date</label>
			                    <input class="form-control" type="text" value='<?php echo $row->AppDate ?>' readonly>
			                  </div>
			                </div>

			                </div>
			                <div class="row">
			                  <div class="col">
			                    <div class="form-group">
			                          <label for="notes">Date Created</label>
			                    <input class="form-control" type="text" value='<?php echo $row->datecreated ?>' readonly>
			                  </div>
			                </div>
			                  <div class="col">
			                    <div class="form-group">
			                          <label for="notes">Description</label>
			                    <input class="form-control" type="text" value='<?php echo $row->AppDesc ?>' readonly>
			                  </div>
			                </div>

			                </div>
			                </div>
			              </div>


			          </div>
			         

			  </div>
</div>

				<div class="col-sm-2">

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
				<a href="<?php echo base_url('email'); ?>"><button  style="width:100%;" class="btn btn-primary" type="button">
		        Send Mail
		        </button></a>
				<button  style="width:100%;" button class="btn btn-primary" type="button" data-toggle="modal" data-target="#smsmodal">
				Send Message
				</button>
				<a href="http://www.linkedin.com/profile/view?id=<?php echo $row->linkedinid; ?>">
				<button  style="width:100%;" button class="btn btn-primary" type="button">Social</button>
				</a>
				<?php
			                    }
			                  }
			             } ?>

				</div>
			</div>
			</div>








</html>
