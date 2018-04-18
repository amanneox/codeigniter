<?php
require_once 'include/check_session.php';
 ?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">

	<title>Calendar</title>
  <link href="<?php echo base_url();?>assets/css/bootstrap4.min.css" rel="stylesheet">
  <link href='<?php echo base_url();?>assets/css/fullcalendar.css' rel='stylesheet' />
  <link href="<?php echo base_url();?>assets/css/bootstrapValidator.min.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
  <!-- Custom css  -->
  <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />
  <script src='<?php echo base_url();?>assets/js/moment.min.js'></script>
  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap4.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrapValidator.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/fullcalendar.min.js"></script>
  <script src='<?php echo base_url();?>assets/js/bootstrap-colorpicker.min.js'></script>
  <script src='<?php echo base_url();?>assets/js/main.js'></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<style media="screen">
html{
  font-size: 62.5%;
}
</style>

</head>
<body>
<?php include_once 'include/nav.php'; ?>


        <div class="container-fluid">
                <!-- Notification -->

                <div class="alert"></div>
            <div class="row clearfix">
                <div class="col-md-9 column">
                        <div id='calendar'></div>
                </div>
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                     <p class="h5">Add Reminder</p>
                      <?php if (isset($msg)){ ?>
                        <div class="alert alert-success"><?php echo $msg['msg_display']; ?></div>
                      <?php }?>
                      <?php echo form_open('Cal/create_rem'); ?>
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="title">Title</label>
                          <div class="col-md-12">
                              <input id="remtitle" name="remtitle" class="form-control input-md"/>

                          </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="date">Date</label>
                          <div class="col-md-12">
                              <input id="remdate" name="remdate" type="datetime-local" class="form-control input-md"/>

                          </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="desc">Description</label>
                          <div class="col-md-12">
                              <input id="remdesc" name="remdesc" class="form-control input-md"/>

                          </div>
                      </div>


                      <div class="form-group">
                          <div class="col-md-6">
                              <input id="reminder" type="submit" value="Add Reminder" name="reminder" class="form-control input-md btn btn-warning"/>
                          </div>
                      </div>
                      <?php echo form_close(); ?>
                    </div>

                    </div>

                               <div class="card">
                      <div class="card-body">
                        <div style="max-height:30em;overflow:auto;" class="wrapper">


                        <table class="table table-bordered">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($rem)){
        if ($rem!=false) {
          foreach ($rem as $row) {?>
            <tr>
            <td>  <?php echo $row->rem_title; ?></td>
            <td>  <?php echo $row->rem_desc; ?></td>
            <td><?php echo $row->rem_date; ?></td>
            </tr>
        <?php
      }
    }
        else {
          echo "No resutls found";
        }
      } else {
        echo "No resutls found";
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
        <div id="modal" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="error"></div>
                        <form class="form-horizontal" id="crud-form">
                        <input type="hidden" id="start">
                        <input type="hidden" id="end">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="title">Title</label>
                                <div class="col-md-4">
                                    <input id="title" name="title" type="text" class="form-control input-md" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="description">Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="color">Color</label>
                                <div class="col-md-4">
                                    <input id="color" name="color" type="text" class="form-control input-md" readonly="readonly" />
                                    <span class="help-block">Click to pick a color</span>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="color">Time</label>
                                    <div class="col-md-6">
                                        <input id="time" name="time" type="datetime-local" class="form-control input-md"/>

                                    </div>
                                </div>
                              </div>

                            </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label" for="color">Previous Time</label>
                                <div class="col-md-6">
                                    <input id="settime" name="settime" type="text" class="form-control input-md" readonly/>

                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

  <script type="text/javascript">

  $(document).ready(function(){

		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		var options={
			format: 'YYYY-MM-DDTHH:MM:SSZ',
			container: container,
			todayHighlight: true,
			autoclose: true,
		};
		date_input.datepicker(options);


    });

  jQuery(document).ready(function($){
    $('.cd-filter-trigger').on('click', function(){
      triggerFilter(true);
    });
    $('.cd-filter .cd-close').on('click', function(){
      triggerFilter(false);
    });

    function triggerFilter($bool) {
      var elementsToTrigger = $([$('.cd-filter-trigger'), $('.cd-filter'), $('.cd-tab-filter'), $('.cd-gallery')]);
      elementsToTrigger.each(function(){
        $(this).toggleClass('filter-is-visible', $bool);
      });
    }
  });
  </script>
</body>
</html>
