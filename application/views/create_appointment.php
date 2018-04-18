<?php
require_once 'include/check_session.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Appointment</title>
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/modernizr.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.mixitup.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap4.min.js"></script>
  <script src='<?php echo base_url();?>assets/js/popper.min.js'></script>
  <script src='<?php echo base_url();?>assets/js/bulk-mail.js'></script>
  <script src='<?php echo base_url();?>assets/js/appointment.js'></script>
  <script src='<?php echo base_url();?>assets/js/moment.min.js'></script>
  <script src='<?php echo base_url();?>assets/js/bootstrap-datetimepicker.js'></script>
  <link href="<?php echo base_url();?>assets/css/pretty-checkbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/bootstrap4.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/bulk-mail.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <style media="screen">
    html{
      font-size: 62.5% !important;
    }
    #wrapper{
      max-height: 50em;
      overflow: scroll;
    }
    </style>
  </head>
  <script type="text/javascript">

  </script>
  <body>
<?php include_once 'include/nav.php'; ?>

<div style="margin-top:1em;" class="container-fluid">
  <div class="row">

  <div class="col-sm-4">
    <div class="card">
  <div class="card-body">
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label for="formGroupExampleInput">Filter</label>
        <input id="filterin" type="text"  class="form-control" placeholder="Try Lead Name...">
      </div>
    </div>
  <div class="col">
    <div class="form-group">

  <select id="status" class="form-control" id="status">
    <option>All</option>
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
  </div>
<div class="col-sm-2">
<button class="btn btn-warning" onclick="filter_status_app()" type="button" name="button">Filter</button>
</div>

  </div>
  <div id="wrapper">
    <table id="my-table" style="max-height:50em;overflow:auto;" class="table table-container">
        <thead>
          <tr>
            <th>Name</th>
            <th>Lead Status</th>
            <th>Select</th>

          </tr>
        </thead>
        <tbody class="scroll-container">
    <?php if (isset($results)) {
      if ($results!=FALSE) {
foreach ($results as $row) {?>

          <tr>
            <td><?php echo $row->firstname; ?>&nbsp;<?php echo $row->lastname ?></td>
            <td><?php echo $row->leadstatus; ?></td>
            <td><div class="pretty p-icon p-round">
              <input class="radiobox" type="radio" name="id"  value="<?php echo $row->scrm_id;?>"/>
              <div class="state p-success"><i class="icon mdi mdi-check"></i>
                <label>Select</label></div></div></td>
          </tr>


    <?php }
  }
  }
else {
  echo "<p>No results found</p>";
}
    ?>
    </tbody>
        </table>
        </div>
  </div>
</div>

  </div>
  <div class="col-sm-8">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">

      <div style="margin-top:1em;margin:1em;" class="row">
<form style="width:100%;" id="app" method="post">


    <input id="user_id" type="hidden" value="" name="user_id">
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Appointment Date</label>
        <input id="date" type="text" name="date" class="form-control" placeholder="Enter Date">
        </div>
        <script type="text/javascript">
        $(function () {
$('#date').datetimepicker()
});
        </script>
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea id="desc" name="desc" class="form-control"  rows="3"></textarea>
      </div>
      <div class="form-group">

    <select name="status" id="appstatus" class="form-control">
      <option value="All">All</option>
      <option value="Unable to connect">Unable to connect</option>
      <option value="Appointment Set by SDR">Appointment Set by SDR</option>
      <option value="Lead completed by SDR">Lead completed by SDR</option>
      <option value="Appointment reset by Lead">Appointment reset by Lead</option>
      <option value="Not Interested">Not Interested</option>
      <option value="Contact in Future">Contact in Future</option>
      <option value="Follow up">Follow up</option>
      <option value="Deal Closed">Deal Closed</option>
    </select>
  </div>
</form>
      </div>

      <div style="margin:.1em;" class="row">

        <div  class="col">
          <button type="button" onclick="create_temp()" class="btn btn-primary">Create Appointment</button>
        </div>
       

      </div>
      <div class="message">

      </div>
            </div>
          </div>
        </div>

      </div>
    </div>


  </div>
    </div>
</div>

  </body>
</html>
