<?php
require_once 'include/check_session.php';
 ?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit</title>
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap4.min.js"></script>
	<script src='<?php echo base_url();?>assets/js/popper.min.js'></script>
	<link href="<?php echo base_url();?>assets/css/bootstrap4.min.css" rel="stylesheet">
	<script src='<?php echo base_url();?>assets/js/emp.js'></script>
	<link href="<?php echo base_url();?>assets/css/emp.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/pretty-checkbox.min.css" rel="stylesheet">
  <style media="screen">
    <?php include 'style/style.css'; ?>
    .curlink{
      margin: .2em !important;
    }
    .numlink,.nextlink,.lastlink,.prevlink{
      margin: .2em !important;
    }

    td,th{
      white-space: nowrap;    }
  </style>
</head>
<body>
<?php include_once 'include/nav.php'; ?>

<div class="container-fluid">
  <ul class="nav">
    <li style="margin:.5em;" class="nav-item">
      <form  id="sort" class="form my-2 my-lg-0">
      <input id="filterin" onkeyup="myfun()" class="form-control mr-sm-2" type="Filter" placeholder="Filter Lead Name" aria-label="Filter">
      </form>
    </li>
    <li class="nav-item">
      <form style="margin:.5em;" class=""  method="post">
        <div class="form-group">

      <select class="form-control" id="status">
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
      </form>
    </li>
    <li class="nav-item">
      <button style="margin:.5em;" onclick="filter_status()" type="button" class="btn btn-light">Filter</button>
    </li>
  <li class="nav-item">
      <div style="margin:.5em;" class="form-group">
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

    </li>
  <li class="nav-item">
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
    </li>
  <li class="nav-item">
      <button style="margin:.5em;" onclick="filter_date()" type="button" class="btn btn-warning">Filter Date</button>
    </li>
  </ul>
  <ul class="nav justify-content-end">
    <li class="nav-item">
      <button id="impform" style="margin:.5em;" class="btn btn-warning" type="button" name="button"><i class="fas fa-plus"></i>&nbsp;Import</button>
      <?php $attributes = array('class' => 'form my-2 my-lg-0', 'id' => 'import'); ?>
          <?php echo form_open_multipart('Emp/do_upload',$attributes,['role'=>'form']); ?>
          <div class="row">
            <div class="custom-file">
              <input name="file" type="file" class="custom-file-input" id="validatedCustomFile" required>
              <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
              <div class="invalid-feedback"> Invalid  file </div>
           </div>
          </div>
          <input style="margin:.21em;" type="submit" class="btn btn-primary " value="Import">
        <?php echo form_close(); ?>

    </li>
    <li class="nav-item">
      <a href="<?php echo base_url();?>/export"<button style="margin:.5em;" class="btn btn-warning" type="button" name="button"><i class="fas fa-download"></i>&nbsp;Export</button></a>
    </li>
  </ul>
  <main class="cd-main-content">
    <div class="cd-tab-filter-wrapper">
      <div class="cd-tab-filter">


      </div> <!-- cd-tab-filter -->
    </div> <!-- cd-tab-filter-wrapper -->

    <section class="cd-gallery">
    <div id="table" class="col-12">
      <div class="" id="wrapper">
      <table  data-role="table" id="my-table" data-mode="reflow" class="table  ">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th class="name" scope="col">Lead Name</th>
            <th class="company" scope="col">Company</th>
            <th class="firstname" scope="col">First Name</th>
            <th class="lastname" scope="col">Last Name</th>
            <th class="title" scope="col">Title</th>
            <th class="email" scope="col">Email</th>
            <th class="phone" scope="col">Phone</th>
            <th class="directphone" scope="col">Direct Phone</th>
            <th class="mobile" scope="col">Mobile</th>
            <th class="website" scope="col">Website</th>
            <th class="source" scope="col">Lead Source</th>
            <th class="status" scope="col">Lead Status</th>
            <th class="industry" scope="col">Industry</th>
            <th class="emprange" scope="col">Employee Range</th>
            <th class="revrange" scope="col">Revenue Range</th>
            <th class="skypeid" scope="col">Skype</th>
            <th class="leaddate" scope="col">Date Created</th>
            <th class="linkedinid" scope="col">Social</th>
            <th class="call" scope="col">Call</th>
            <th class="edit" scope="col">Edit</th>
          </tr>
        </thead>
        <tbody id="list">
          <?php $i=0; ?>
          <?php if (isset($leads)){?>
            <?php if ($leads==false){
              echo "<p>No results found</p>";
            }
            else{ ?>
          <?php foreach ($leads as $row) {  ?>
          <tr>
            <th scope="row"><?php echo ++$i ?></th>
            <td class="name"><?php echo $row->leadowner; ?></td>
            <td class="company"><a href="<?php echo site_url('Home/display').'/'.$row->scrm_id;?>"><?php echo $row->company; ?></a></td>
            <td class="firstname"><?php echo $row->firstname; ?></td>
            <td class="lastname"><?php echo $row->lastname; ?></td>
            <td class="title"><?php echo $row->title; ?></td>
            <td class="email"><?php echo $row->email; ?></td>
            <td class="phone"><?php echo $row->phone; ?></td>
            <td class="directphone"><?php echo $row->directphone; ?></td>
            <td class="mobile"><?php echo $row->mobile; ?></td>
            <td class="website"><?php echo $row->website; ?></td>
            <td class="source"><?php echo $row->leadsource; ?></td>
            <td class="status"><?php echo $row->leadstatus; ?></td>
            <td class="industry"><?php echo $row->industry; ?></td>
            <td class="emprange"><?php echo $row->emprange; ?></td>
            <td class="revrange"><?php echo $row->revrange; ?></td>
            <td class="skypeid"><?php echo $row->skypeid; ?></td>
            <td class="leaddate"><?php echo $row->datecreated; ?></td>

            <td class="linkedinid"><a href="http://www.linkedin.com/profile/view?id=<?php echo $row->linkedinid; ?>"><span><i class="fab fa-linkedin"></i></span></a></td>
            <td class="call"><a href="skype:<?php echo $row->skypeid; echo "?call"; ?>"><i class="fas fa-phone-square"></i></a></td>
            <td class="edit"><a href="<?php echo base_url()?>Edit/show_leads?user_id=<?php echo $row->scrm_id ?>"><i class="fas fa-edit"></i></a></td>

          </tr>
        <?php }
      }
      }else {
        echo "<p>No results found</p>";
      } ?>

        </tbody>
      </table>
    </div>
  </div>
  <div style="margin-left:2em;margin-top:1em;font-size:1.2em;" class="row">
    <div class="col">


    <?php if (isset($limit)) { ?>
              <?php echo "Showing ".$limit." Records"; ?>
          <?php } ?>
  </div>

    <div class="col-sm-2">
<?php echo form_open('Emp/index'); ?>
  <div class="form-group">
    <label for="exampleSelect1">Records</label>
    <select name="limit" class="form-control" id="record">
      <option  value="10">10</option>
      <option value="50">50</option>
      <option value="100">100</option>
    </select>
  </div>
  <input type="submit" class="btn btn-light" name="submit" value="Filter">
<?php echo form_close() ?>
    </div>
    <div class="col">
      <?php if (isset($links)) { ?>
              <?php echo $links ?>
          <?php } ?>
    </div>
</div>
</section>
<div class="cd-filter">
<div style="padding-top:10em;font-size:1.2em;">
      <div class="row">

      <div class="col-sm-6">

        <div class="pretty p-default">
         <input class="form-check-input"  type="checkbox" value="name" id="checkbox">
        <div class="state p-primary">
            <label>Lead Name</label>
        </div>
    </div>

      </div>

      <div class="col-sm-6">
        <div class="pretty p-default">
      <input class="form-check-input"  type="checkbox" value="company" id="checkbox">
        <div class="state p-primary">
            <label>Company</label>
        </div>
    </div>

      </div>

      </div>

      <div class="row">

      <div class="col-sm-6">
        <div class="pretty p-default">
    <input class="form-check-input"  type="checkbox" value="email"  id="checkbox">
        <div class="state p-primary">
            <label>Email</label>
        </div>
    </div>


      </div>

      <div class="col-sm-6">
        <div class="pretty p-default">
          <input class="form-check-input"  type="checkbox" value="phone"  id="checkbox">
        <div class="state p-primary">
            <label>Phone</label>
        </div>
    </div>

      </div>

      </div>

      <div class="row">

      <div class="col-sm-6">
        <div class="pretty p-default">
        <input class="form-check-input filter"  type="checkbox" value="source"  id="checkbox">
        <div class="state p-primary">
            <label>Lead Source</label>
        </div>
    </div>


      </div>

      <div class="col-sm-6">
        <div class="pretty p-default">
      <input class="form-check-input"  type="checkbox" value="owner"  id="checkbox">
        <div class="state p-primary">
            <label>Lead Owner</label>
        </div>
    </div>
      </div>
      </div>

      <div class="row">

      <div class="col-sm-6">
        <div class="pretty p-default">
    <input class="form-check-input"  type="checkbox" value="industry"  id="checkbox">
        <div class="state p-primary">
            <label>Industry</label>
        </div>
    </div>

      </div>

      <div class="col-sm-6">
        <div class="pretty p-default">
          <input class="form-check-input"  type="checkbox" value="directphone"  id="checkbox">
        <div class="state p-primary">
            <label>Direct</label>
        </div>
    </div>

      </div>

      </div>

      <div class="row">

      <div class="col-sm-6">
        <div class="pretty p-default">
        <input class="form-check-input"  type="checkbox" value="social"  id="checkbox">
        <div class="state p-primary">
            <label>Social</label>
        </div>
        </div>

      </div>

      <div class="col-sm-6">
        <div class="pretty p-default">
        <input class="form-check-input"  type="checkbox" value="website"  id="checkbox">
        <div class="state p-primary">
            <label>Website</label>
        </div>
    </div>

      </div>

      </div>

      <div class="row">

      <div class="col-sm-6">
        <div class="pretty p-default">
          <input class="form-check-input"  type="checkbox" value="revrange"  id="checkbox">
        <div class="state p-primary">
            <label>Revenue Range</label>
        </div>
    </div>
      </div>

      <div class="col-sm-6">
        <div class="pretty p-default">
        <input class="form-check-input"  type="checkbox" value="title"  id="checkbox">
        <div class="state p-primary">
            <label>Title</label>
        </div>
    </div>

      </div>

      </div>
      <div class="row">

      <div class="col-sm-6">
        <div class="pretty p-default">
        <input class="form-check-input"  type="checkbox" value="emprange"  id="checkbox">
        <div class="state p-primary">
            <label>Employee Range</label>
        </div>
    </div>
      </div>

      <div class="col-sm-6">
        <div class="pretty p-default">
<input class="form-check-input"  type="checkbox" value="skypeid"  id="checkbox">
        <div class="state p-primary">
            <label>Skype</label>
        </div>
    </div>

      </div>

      </div>
</div>
    <a href="#0" class="cd-close">Close</a>
</div>

		<a href="#0" class="cd-filter-trigger">Menu</a>
	</main>

</div>

</body>
</html>
