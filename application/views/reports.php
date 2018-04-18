<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reports</title>
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
    <?php include_once 'include/nav.php';; ?>
<div style="margin-top:1em;" class="container-fluid">
  <div class="card">
    <div class="card-body">

<?php if (isset($emails)){
   if ($emails!=False){ ?>


     <div class="container-fluid">
       <div class="row">
         <div class="col-sm-2">
        <span><i style="font-size:4em;color:#f44336" class="far fa-envelope-open"></i></span>
         </div>
         <div class="col-sm-2">
          <p>Total Emails:&nbsp;<?php echo count($emails) ?></p>
          
          <p>Emails Opened:&nbsp;<?php ?></p>
         <p>Emails Acquired:&nbsp;<?php echo count($emails);  ?></p>
         </div>
         <div class="col-sm-4">
            <p>Report Generated:&nbsp;<?php $time_now=mktime(date('h')+3,date('i')+30,date('s')); echo date('d-m-Y H:i', $time_now); ?></p>
           <!-- <p>Last Email:&nbsp;<?php //echo $emails[0]['email']; ?></p> -->
         </div>
       </div>
     </div>


<?php

}
else {
  echo "No results found";
}

}else {
  echo "No results found";
}
 ?>
    </div>

  </div>
</div>


<div style="margin-top:3em;" class="container-fluid">
  <div class="card">
    <div class="card-body">

<?php if (isset($calls)){
   if ($calls!=False){ ?>


     <div class="container-fluid">
       <div class="row">
         <div class="col-sm-2">
           <span><i style="color:#2196F3;font-size:4em;" class="fas fa-chart-bar"></i></span>
         </div>
         <div class="col-sm-2">
          <p>Total Contacts:&nbsp;<?php echo count($calls) ?></p>
         
         <?php 
         $a=0; $b=0; $c=0;
         
         for ($i=0; $i< count($calls); $i++)
         { 
          
               if(($calls[$i]['leadstatus']=='Appointment Set by SDR')||($calls[$i]['leadstatus']=='Lead completed by SDR')||($calls[$i]['leadstatus']=='Deal Closed'))
               {
                 $a++;
               }
           }
           
           for ($i=0; $i< count($calls); $i++)
           {
               if(($calls[$i]['leadstatus']=='Follow up')||($calls[$i]['leadstatus']=='Appointment reset by Lead')||($calls[$i]['leadstatus']=='Contact in Future'))
               {
                 $b++;
               }
           }
             
             for ($i=0; $i< count($calls); $i++)
            {
               if(($calls[$i]['leadstatus']=='Unable to connect')||($calls[$i]['leadstatus']=='Not Interested'))
               {
                 $c++;
               }
           }
           
         ?>
         <p>Successful Contacts:&nbsp;<?php echo $a;?></p>
         <p>Positive Contacts:&nbsp;<?php echo $b;?></p>
         <p>Negative Contacts:&nbsp;<?php echo $c;?></p>

         </div>
         <div class="col-sm-4">
           <p>Report Generated:&nbsp;<?php $time_now=mktime(date('h')+3,date('i')+30,date('s')); echo date('d-m-Y H:i', $time_now); ?></p>
           <!-- <p>Last Call:&nbsp;<?php //echo $calls[0]['leadowner']; ?></p> -->

         </div>
       </div>
     </div>


<?php


}
else {
  echo "No results found";
}

}else {
  echo "No results found";
}
 ?>
    </div>

  </div>
</div>
  </body>
</html>
