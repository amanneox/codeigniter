<?php
require_once 'include/check_session.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Message</title>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/modernizr.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.mixitup.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap4.min.js"></script>
    <script src='<?php echo base_url();?>assets/js/popper.min.js'></script>
    <script src='<?php echo base_url();?>assets/js/bulk-message.js'></script>
    <script src='<?php echo base_url();?>assets/js/moment.min.js'></script>
    <link href="<?php echo base_url();?>assets/css/pretty-checkbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bulk-message.css" rel="stylesheet">

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
<button class="btn btn-warning" onclick="filter_status()" type="button" name="button">Filter</button>
</div>

  </div>
  <div id="wrapper">
    <table id="my-table" style="max-height:50em;overflow:auto;" class="table table-container">
        <thead>
          <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Lead Status</th>
            <th>Select</th>

          </tr>
        </thead>
        <tbody class="scroll-container">
    <?php if (isset($message)) {
      if ($message!=FALSE) {
foreach ($message as $row) {?>

          <tr>
            <td><?php echo $row->firstname; ?>&nbsp;<?php echo $row->lastname ?></td>
            <td><?php echo $row->mobile; ?></td>
            <td><?php echo $row->leadstatus; ?></td>
            <td> <div class="pretty p-default">
                 <input class="selectbox" type="checkbox" value='<?php echo $row->mobile?>' /><div class="state p-success"><label>Select</label></div></div>
            </td>
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
        <div class="col-sm-7">
          <div class="card">
            <div class="card-body">
      <div style="margin:1em;" class="row">

            <div class="pretty p-default p-curve p-toggle">
                <input id="allcontrol" type="checkbox" />
                <div class="state p-success p-off">
                    <label>Select All</label>
                </div>
                <div class="state p-danger p-on">
                    <label>Unselect All </label>
                </div>
            </div>
      </div>
      <div style="margin-top:1em;margin:1em;" class="row">
      <form style="width:100%;" class="" id="bulk_mail" method="post">
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Message</label>
        <textarea name="message" class="form-control temp-data" id="message"  rows="3"></textarea>
      </div>

      </form>
      </div>
      <div style="margin:.1em;" class="row">
        <div  class="col">
          <button type="button" onclick="send_bulk()" class="btn btn-primary">Send Message</button>
        </div>
        

      </div>
      <div class="message">

      </div>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
        <div class="card">
          <div class="card-body">

    <form id="txt" method="post">
      <div class="form-group">
      <label for="Number">Number</label>
      <input id="phone" type="text" name="phone" class="form-control" placeholder="Enter Number">
      </div>
      <div class="form-group">
       <label for="Message">Message</label>
       <textarea id="datasend" name="message" class="form-control temp-data" rows="3"></textarea>
      </div>

      <button onclick="sender_sms()" type="button" class="btn btn-primary">Submit</button>
      <div class="message">

      </div>
    </form>
          </div>

        </div>
        </div>
      </div>
    </div>

    <div style="margin-top:1em;" class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <div class="container">
                <div class="row">
                  <a href="<?php echo base_url('template'); ?>"><button type="button" class="btn btn-primary" name="button">Create New</button></a>
                </div>
              </div>
            </div>
            <div style="max-height:50em;overflow-y:scroll;" class="template">
              <table class="table">
                <thead>
                  <tr>
                    <th>Head</th>
                    <th>Body</th>
                    <th>Footer</th>
                    <td>Select</td>
                  </tr>
                </thead>
                  <tbody>

                    <?php if (isset($template)){
                      if ($template!=false) {
                     foreach ($template as $row){ ?>
                         <tr>
                    <td><?php echo $head= $row->t_head; ?></td>
                    <td><?php echo $body= $row->t_body; ?></td>
                    <td><?php echo $foot= $row->t_end; ?></td>
                    <td><div class="pretty p-icon p-round">
                      <input class="radiobox" type="radio" name="temp"  value="<?php echo $head."\n".$body."\n".$foot;?>"/>
                      <div class="state p-success"><i class="icon mdi mdi-check"></i>
                        <label>Select</label></div></div></td>
                      </tr>
                    <?php }
                  }
                }else {
                  echo "No results found";
                }
                ?>
                  </tbody>
              </table>
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
