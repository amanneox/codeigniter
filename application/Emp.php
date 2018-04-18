<?php

class Emp extends CI_Controller {
  function __construct() {
parent::__construct();
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<?php
include_once APPPATH.'\views\include\nav.php';

}

        public function index()
        {

                $this->load->view('employee');
        }
        public function import()
        {
          $this->load->database();
          //validate whether uploaded file is a csv file
      $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
      if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
          if(is_uploaded_file($_FILES['file']['tmp_name'])){

              //open uploaded csv file with read only mode
              $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

              //skip first line
              fgetcsv($csvFile);

              //parse data from csv file line by line
              while(($line = fgetcsv($csvFile)) !== FALSE){
                  //check whether member already exists in database with same email
                  $prevQuery = "SELECT id FROM members WHERE email = '".$line[1]."'";
                  $prevResult = $db->query($prevQuery);
                  if($prevResult->num_rows > 0){
                      //update member data
                      $db->query("UPDATE members SET name = '".$line[0]."', phone = '".$line[2]."', created = '".$line[3]."', modified = '".$line[3]."', status = '".$line[4]."' WHERE email = '".$line[1]."'");
                  }else{
                      //insert member data into database
                      $db->query("INSERT INTO members (name, email, phone, created, modified, status) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[3]."','".$line[4]."')");
                  }
              }

              //close opened csv file
              fclose($csvFile);

              $qstring = '?status=succ';
          }else{
              $qstring = '?status=err';
          }
      }else{
          $qstring = '?status=invalid_file';
      }
  }

        }

 ?>
