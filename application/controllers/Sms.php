<?php
 header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends CI_Controller {
  function __construct() {
  parent::__construct();

  $this->load->helper('form');
  $this->load->helper('url');
  }

  public function sms_view()
  {
    $this->load->model("show_emp");
    $d=$this->show_emp->get_numbers();
    $data['message']=$d;

    $this->load->model('show_model');
    $rs=$this->show_model->get_templates('msg');
    $data['template']=$rs;
    $this->load->view('message',$data);
  }

  public function Bulk() {
try {

    $authKey = "193022AfyH9GFfQqt5a5a19ca";
    $mobiles_array = json_decode(stripslashes($_POST['numbers']));
    $mobiles_array = join(',',$mobiles_array);
    $senderId = "SALIND";

    $message = urlencode($_POST['msg']);


    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobiles_array,
        'message' => $message,
        'sender' => $senderId,

    );

    //API URL
    $url="http://api.msg91.com/api/sendhttp.php";

    // init the resource
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));


    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


    //get response
    $output = curl_exec($ch);

    //Print error if any
    if(curl_errno($ch))
    {
        echo 'notok';
        echo 'error:' . curl_error($ch);
    }

    echo "Message Sent";

    curl_close($ch);
}
catch(Exception $e){
  echo $e;
}

  }



    public function Send_sms()
    {
var_dump($_POST);
    $authKey = "193022AfyH9GFfQqt5a5a19ca";

    //Multiple mobiles numbers separated by comma
   $mobileNumber = $_POST['phone'];

    //Sender ID,While using route4 sender id should be 6 characters long.
    $senderId = "SALIND";

    //Your message to send, Add URL encoding here.
    $message = urlencode($_POST['message']);

    //Define route
    $route = "4";
    //Prepare you post parameters
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );

    //API URL
    $url="http://api.msg91.com/api/sendhttp.php";

    // init the resource
    $ch = curl_init();

    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));


    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


    //get response
    $output = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    //Print error if any
    if(curl_errno($ch))
    {
        echo 'notok';
        echo 'error:' . curl_error($ch);
    }

    curl_close($ch);
    $status = array("STATUS"=>"true");

     echo json_encode ($status) ;

     $id=$this->input->post('scrm_id');

     if (isset($id)){
     $date=date('Y-m-d');
     $this->load->model('show_appoint');
     $this->show_appoint->record_email($id,$message,$mobileNumber,$date);
   }

  }
}
?>
