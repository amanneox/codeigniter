<script type="text/javascript">
$(document).ready(function() {
    setInterval(timestamp, 1000);
});

function timestamp() {
    $.ajax({
        url: base_url+"Home/timestamp",
        success: function(data) {
            $('#timestamp').html(data);
        },
    });
}
<?php

  //$udata=$_SESSION['logged_in']['u_data'];
    //$udata= json_decode(json_encode($udata), true);

    //$uid=$udata[0]['id'];

 ?>
</script>
<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>

<script src='<?php echo base_url();?>assets/js/quick.js'></script>
<div class="header">
<nav style="background-color:#222;" class="navbar navbar-expand-lg">
<ul class="navbar-nav mr-auto">
  <li class="nav-item">
<span style="color:#fff"><?php echo Date('l');?></span>&nbsp;<span style="color:#fff"><?php echo Date('y-m-d'); ?></span>&nbsp;
  </li>
    <li class="nav-item">
<span style="color:#fff;" id="timestamp"></span>
    </li>
</ul>
<ul class="navbar-nav">
  <li class="nav-item"><button class="btn btn-warning" data-toggle="modal" data-target="#logout"><b style="color:#fff;">LOG OFF</b></button>
  </li>
</ul>
  </nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>/assets/img/logo.png" width="80" class="img-fluid" alt="Responsive image"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">

      <a class="nav-link" href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url();?>/assets/img/home.png" class="img-fluid" alt="Responsive image"><span class="sr-only">(current)</span></a>

    </li>
    <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url('leads'); ?>"><img src="<?php echo base_url();?>/assets/img/leads.png" class="img-fluid" alt="Responsive image"></a>

    </li>
    <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url('message'); ?>"><img src="<?php echo base_url();?>/assets/img/messages.png" class="img-fluid" alt="Responsive image"></a>

    </li>
     <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url('cal'); ?>"><img src="<?php echo base_url();?>/assets/img/calendar.png" class="img-fluid" alt="Responsive image"></a>

    </li>
     <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url('reports'); ?>"><img src="<?php echo base_url();?>/assets/img/reports.png" class="img-fluid" alt="Responsive image"></a>

    </li>
     <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url('email'); ?>"><img src="<?php echo base_url();?>/assets/img/email.png" class="img-fluid" alt="Responsive image"></a>

   </li>
  </ul>
  <ul class="navbar-nav">
  <div class="my-2 my-lg-0" id="new2">
  <img src="<?php echo base_url()?>/assets/img/male.svg" width="80">
  <strong><p style="margin:.5em;"><?php echo $username = ($this->session->userdata['logged_in']['username']); ?></p></strong>
</div>
</ul>
</div>
</nav>
<nav  style="padding-right:3em;background-color:#4CAF50;" class="navbar navbar-expand-lg navbar-light bg-faded">

       <div id="navbarNavDropdown" class="navbar-collapse">
           <ul class="navbar-nav mr-auto">
           </ul>
           <ul class="navbar-nav">
             <li class="nav-item">
               <?php

    echo form_open('search/execute_search');

    echo form_input(array('name'=>'search'));

    echo form_submit('search_submit','Search',"class='btn btn-warning'");


?>
             </li>
               <li style="padding-right:6em;" class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Quick Links
                   </a>
                   <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <a class="dropdown-item" href="<?php echo base_url('edit')?>">Add Accont</a>
                     <a class="dropdown-item" href="<?php echo base_url('appointment'); ?>">Add Appointment</a>
                     <a class="dropdown-item" data-toggle="modal" data-target="#smsmodal">Write Message</a>
                     <a class="dropdown-item" href="<?php echo base_url('email')?>">Send Mail</a>
                    <a class="dropdown-item" href="<?php echo base_url('message')?>">Send Msg</a>
                     <a class="dropdown-item" href="<?php echo base_url('profile')?>">Edit Profile</a>
                      <a class="dropdown-item" href="<?php echo base_url('template')?>">Create Template</a>
                      <a class="dropdown-item" href="<?php echo base_url('mngemp')?>">Create Manager/Employee</a>
                     <a class="dropdown-item" href="#">Generate Report</a>
                     <a class="dropdown-item" href="#">Email Report</a>
                    <a class="dropdown-item" href="#">Pipeline Summary</a>
                   </div>
            </li>

           </ul>
       </div>
   </nav>

</div>
<div id="logout" class="modal fade" role="dialog">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
       <h4 class="modal-title"></h4>
     </div>
     <div class="modal-body">
         <p>Are you sure ?</p>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     <a class="btn btn-default" href="<?php echo base_url();?>/User_auth/logout">Logout</a>
     </div>
   </div>
 </div>
</div>


<div id="emailModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
       <h4 class="modal-title"></h4>
     </div>
     <div class="modal-body">
         <form id="mailform" class="" method="post">

           <div class="form-group">
          <input type="hidden" id="scrm_id" class="form-control" name="scrm_id" value=<?php if (isset($_GET['user_id'])) {echo $_GET['user_id'];} ?>">
           </div>

           <div class="form-group">
             <?php if (isset($manager_emp)){?>
    <label for="exampleFormControlSelect1">Project Manager Name</label>
    <select name="name" class="form-control" id="name">

    <?php foreach ($manager_emp as $row) {?>

<option value="<?php echo $row->name;?>"><?php echo $row->name; ?></option>

      <?php }
      echo '</select>';
    }else {
      echo ' <input id="name" type="text" class="form-control"  name="name" placeholder="Enter Name">
      ';
    } ?>


  </div>
  <div class="form-group">
    <?php if (isset($manager_emp)){?>
<label for="exampleFormControlSelect1">Project Manager Email</label>
<select name="name" class="form-control" id="emailmsg">

<?php foreach ($manager_emp as $row) {?>

<option value="<?php echo $row->email;?>"><?php echo $row->email; ?></option>

<?php }
echo '</select>';
}
else {
echo ' <input id="emailmsg" type="email" class="form-control"  name="email" placeholder="Enter Email">
';
} ?>



</div>

           <input id="emailtext" type="text" class="form-control"  name="subject" placeholder="Enter Subject">
           <br>

           <textarea  name="message" class="ckeditor" placeholder="Enter Email here..." rows="8" cols="60"></textarea>
         </form>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="submit" onclick="email()" class="btn btn-default">Send</button>
     </div>
     <div class="message">
     </div>

   </div>
 </div>
</div>
<div id="smsmodal" class="modal fade" role="dialog">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
       <h4 class="modal-title"></h4>
     </div>
     <div class="modal-body">
           <form class="" id="messageform"  method="post">
             <div class="form-group">
               <input type="text" class="form-control"  name="phone" placeholder="Enter Phone Number">

             </div>
        <div class="form-group">
          <textarea name="message"  name="message" placeholder="Enter Message here..." rows="8" cols="80"></textarea>

        </div>

          </form>
          <div class="message">
          </div>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="submit" onclick="sms()" class="btn btn-default">Submit</button>
     </div>
     <div class="message">
     </div>
   </div>

 </div>
</div>
